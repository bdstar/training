<?php 
require "header.php"; 
$page = "";
if(isset($_GET['page'])){$page = $_GET['page'];}
?>

<div class="jumbotron text-center" style="margin-bottom:0">
  <h1><?php echo ucfirst($page) ?></h1>
  <p>Show all <?php echo ucfirst($page) ?></p> 
</div>

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-12">
        <a href="save3.php?table=<?php echo $page; ?>" class="btn btn-info pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add <?php echo ucfirst($page) ?></a>
        <table id="word-list" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Amount</th>
                    <?php if($page == "daily") echo "<th>Payment By</th>"; ?>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if($page){
                    $datas = array();
                    $categories = array();
                    $banks = array();
                    /*$datas = $obj->fetch($page, array(), array());
                    $categories = $obj->fetch('categories', array(), array());
                    $banks = $obj->fetch('banks', array(), array());*/

                $category = array();
                foreach ($categories as $key => $value) {
                    $category[$value['id']] = $value['name'];
                }

                $bank = array();
                foreach ($banks as $key => $value) {
                    $bank[$value['id']] = $value['sname'];
                }

                $sn = 1;
                foreach($datas as $data){ 
                    $dateTime = new DateTime($data['updated_at']);
                    $updated_at = $dateTime->format('Y-m-d');
                    echo '
                        <tr>
                            <td>'.$sn++.'</td>
                            <td>'.$data['name'].'</td>
                            <td>'.$category[$data['categories_id']].'</td>
                            <td align="right">'.number_format($data['amount']).'</td>';
                    if($page == "daily") echo "<td>".$bank[$data['banks_id']]."</td>";
                    echo '<td>'.$updated_at.'</td>
                            <td class="pull-right">
                                <a href="save3.php?table='.$page.'&action=update&id='.$data['id'].'" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="save3.php?table='.$page.'&action=view&id='.$data['id'].'" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a id="delete-tag" data-id="'.$data['id'].'" onclick="deleteData('.$data['id'].',\''.$page.'\')" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    ';
                }
                }//End if page
                ?>
            </tbody>
        </table>
    </div>

  </div>
</div>

<?php require "footer.php"; ?>


<!--<form id="delete-form-'.$tag['id'].'" action="database.php?page=tag&action=delete&id='.$tag['id'].'" method="POST"></form>-->
<!-- https://sweetalert2.github.io/ -->

