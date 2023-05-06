<?php 
require "header.php"; 
if(isset($_GET['page'])){$page = $_GET['page'];}
if(isset($_GET['date'])){$date = $_GET['date'];}

$categories = $obj->fetch('categories', array(), array());

/************* Start: Budget Table ***************/
// Fatch Data from Budget Table according to the Categoriy wise
$query = "SELECT c.name AS category_name, d.budget AS total_amount FROM budget d JOIN categories c ON d.categories_id = c.id WHERE d.date='".$date."' GROUP BY c.id;";
$pdata = $obj->cquery($query);

$bcategory = array();
foreach ($pdata as $data) {
  $bcategory[$data['category_name']] = $data['total_amount'];
}

$dailys = array();
foreach ($categories as $category) {
  $key = $category['name'];
  
  if(isset($bcategory[$key])){
    $dailys['budget'][$key]=$bcategory[$key];
  }
  else{
    $dailys['budget'][$key]=0;
  }
}
/************* End: Budget Table *****************/

/************* Start: Daily Table ***************/
// Fatch Data from Daily Table according to the Categoriy wise
$query = "SELECT c.name AS category_name, SUM(d.amount) AS total_amount FROM daily d JOIN categories c ON d.categories_id = c.id WHERE d.updated_at BETWEEN '".$date."-01 00:00:00' AND '".$date."-31 23:59:59' GROUP BY c.id;";
$qdata = $obj->cquery($query);

$dcategory = array();
foreach ($qdata as $data) {
  $dcategory[$data['category_name']] = $data['total_amount'];
}

//$dailys = array();
foreach ($categories as $category) {
  $key = $category['name'];
  
  if(isset($dcategory[$key])){
    $dailys['daily'][$key]=$dcategory[$key];
  }
  else{
    $dailys['daily'][$key]=0;
  }
}
/************* End: Daily Table ***************/

/*echo "<pre>";
print_r($dailys);
echo "</pre>"; *///die;
?>

<div class="jumbotron text-center" style="margin-bottom:0">
  <h1><?php echo ucfirst($page) ?></h1>
  <p>Show all <?php echo ucfirst($page) ?>
  <?php
  $idate = new DateTime($date);
  $formattedDate = $idate->format('F, Y');
  echo $formattedDate;
  ?>
  </p>
</div>

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-12">
        <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Spend</th>
                    <th>Budget</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                  $i=1;
                  foreach ($dailys['budget'] as $key => $value) {
                    //$btn = "<a href=\"save2.php?table=".$page."&action=update&id=".$key."\" class=\"btn btn-info\" onclick='UpdateData(".$value.",".$page.")'><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i> Save </a>";
                    $btn = "<button class=\"btn btn-info\" onclick=\"UpdateData('".$key."', '".$page."', '".$date."')\"><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i> Save </button>";
                    
                    $v = isset($value) ? $value : 0;
                    $b = isset($dailys['daily'][$key]) ? $dailys['daily'][$key] : 0;
                    $bg = "red";
                    $color = "white";

                    $parcent = 0;
                    if($v!=0)
                      $parcent = ($b * 100)/$v;

                    $bg = "red"; $color = "white";
                    if($parcent<40){ $bg = "white"; $color = "black"; }
                    else if($parcent>40 && $parcent<70){ $bg = "green"; $color = "white"; }
                    else if($parcent>70 && $parcent<100){ $bg = "red"; $color = "white"; }
                    else if($parcent>100){ $bg = "black"; $color = "white"; }

                    /*0-40 = white; black
                    41-70 = green; white
                    71-100 = red; white
                    >101 = black white*/


                    $id = str_replace(' ', '-', strtolower($key));
                    $input = "<input type=\"number\" id='".$id."' class=\"form-control\" name=\"amount\" maxlength=\"10\" value='".$v."'>";

                    echo "
                    <tr style='background-color: ".$bg."; color: ".$color.";'>
                      <td>".$i++."</td>
                      <td>".$key."</td>
                      <td>".$b."/".$v."(".$parcent."%)</td>
                      <td>".$input."</td>
                      <td>".$btn."</td>
                    </tr>
                    ";
                  }
                ?>
            </tbody>
        </table>
    </div>

  </div>
</div>

<?php require "footer.php"; ?>