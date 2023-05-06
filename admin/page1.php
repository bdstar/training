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
        <a href="save1.php?table=<?php echo $page; ?>" class="btn btn-info pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add <?php echo ucfirst($page) ?></a>
        <table id="word-list" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $datas = $obj->fetch($page, array(), array());

                $sn = 1;
                foreach($datas as $data){
                    $dateTime = new DateTime($data['updated_at']);
                    $updated_at = $dateTime->format('Y-m-d');
                    echo '
                        <tr>
                            <td>'.$sn++.'</td>
                            <td>'.$data['name'].'</td>
                            <td>'.$data['description'].'</td>
                            <td>'.$updated_at.'</td>
                            <td class="pull-right">
                                <a href="save1.php?table='.$page.'&action=update&id='.$data['id'].'" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="save1.php?table='.$page.'&action=view&id='.$data['id'].'" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a id="delete-tag" data-id="'.$data['id'].'" onclick="deleteData('.$data['id'].',\''.$page.'\')" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    ';
                }
                ?>
            </tbody>
        </table>
    </div>

  </div>
</div>

<?php require "footer.php"; ?>