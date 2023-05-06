<?php 
require "header.php"; 
if(isset($_GET['page'])){$page = $_GET['page'];}
?>

<div class="jumbotron text-center" style="margin-bottom:0">
  <h1><?php echo ucfirst($page) ?></h1>
  <p>Show all <?php echo ucfirst($page) ?></p> 
</div>

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-12">

        <?php 
        $categories = $obj->fetch('categories', array(), array());

        $current_month_year = date('F, Y'); // Get current Month Name, Year value
        $months = array(); // Initialize array to hold Month-Year values
        $current_month_year_value = date('Y-m'); // Get current Month-Year value
        $tmonths = array(); // Initialize array to hold Month Name, Year values
        
        $budgets = array();
        $tsum = array();
        //$index = 0;
        for ($i = -3; $i <= 3; $i++) {
            $months_value = date('Y-m', strtotime("$current_month_year_value $i month")); // Calculate Month-Year value
            $months_text = date('F, Y', strtotime("$current_month_year $i month")); // Calculate Month Name, Year value
            array_push($months,$months_value);
            array_push($tmonths,$months_text);

            //$budgets[$index]['value'] = $months_value;
            //$budgets[$index]['text'] = $months_text;

            /************* Start: Daily Table ***************/
            $query = "SELECT c.name AS category_name, SUM(d.amount) AS total_amount FROM daily d JOIN categories c ON d.categories_id = c.id WHERE d.updated_at BETWEEN '".$months_value."-01 00:00:00' AND '".$months_value."-31 23:59:59' GROUP BY c.id;";
            $qdata = $obj->cquery($query);

            $dcategory = array();
            foreach ($qdata as $data) {
              $dcategory[$data['category_name']] = $data['total_amount'];
            }

            $sum = 0;
            foreach ($categories as $category) {
              $key = $category['name'];
              if(isset($dcategory[$key])){
                $budgets['daily'][$months_value][$key]=$dcategory[$key];
              }
              else{
                $budgets['daily'][$months_value][$key]=0;
              }
              $sum = $sum + $budgets['daily'][$months_value][$key];
            }
            $tsum['daily'][$months_value] = $sum;

            /************* End: Daily Table ***************/

            /************* Start: Budget Table ***************/
            $query = "SELECT c.name AS category_name, d.budget AS total_amount FROM budget d JOIN categories c ON d.categories_id = c.id WHERE d.date='".$months_value."' GROUP BY c.id;";
            $pdata = $obj->cquery($query);

            $bcategory = array();
            foreach ($pdata as $data) {
              $bcategory[$data['category_name']] = $data['total_amount'];
            }

            $sum = 0;
            foreach ($categories as $category) {
              $key = $category['name'];
              
              if(isset($bcategory[$key])){
                $budgets['budget'][$months_value][$key]=$bcategory[$key];
              }
              else{
                $budgets['budget'][$months_value][$key]=0;
              }
              $sum = $sum + $budgets['budget'][$months_value][$key];
            }
            $tsum['budget'][$months_value] = $sum;
            /************* End: Budget Table ***************/

            /*echo "<pre>";
            print_r($budgets);
            echo "</pre>";
            echo "<br>=======================<br>";*/
        }

        /*echo "<pre>";
        print_r($months);
        echo "</pre>";

        echo "<pre>";
        print_r($tmonths);
        echo "</pre>";

        echo "<pre>";
        print_r($budgets);
        echo "</pre>";

        echo "<pre>";
        print_r($tsum);
        echo "</pre>";*/
        ?>

        <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
          <?php 
          echo "<tr><th>Name</th>";
          foreach ($tmonths as $k=>$value) {
            $btn = "<a href=\"page-budget-save.php?page=".$page."&action=modify&date=".$months[$k]."\" class=\"btn btn-info\" target=\"_blank\">".$value."</a>";
            echo "<th>".$btn."</th>";
          }
          echo "</tr>";

          foreach ($categories as $category) {
            echo "<tr><th>".$category['name']."</th>";
            foreach ($months as $month) {

              $v = isset($budgets['budget'][$month][$category['name']]) ? $budgets['budget'][$month][$category['name']] : 0;
              $b = isset($budgets['daily'][$month][$category['name']]) ? $budgets['daily'][$month][$category['name']] : 0;
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

              $parcent = number_format((float)$parcent, 2, '.', '');

              echo "<td style='background-color: ".$bg."; color: ".$color.";'>".$b."/".$v."(".$parcent."%)</td>";
            }//End of foreach month
            echo "</tr>";
          }//End of foreach Category

          echo "<tr style='background-color: #B0B0B0;'><td> Total </td>";
          foreach ($tsum['daily'] as $key => $value) {
            echo "<td>".$tsum['daily'][$key]."/".$tsum['budget'][$key]."</td>";
          }
          echo "</tr>";
          ?>
        </table>
    </div>
  </div>
</div>

<?php require "footer.php"; ?>