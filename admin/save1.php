<?php 
require "header.php"; 

if(!isset($_GET['action'])){$_GET['action']='add';}

if(!strcmp($_GET['action'],'update')){$page_type = "Update";}
elseif(!strcmp($_GET['action'],'view')){$page_type = "View";}
else{$page_type = "Add";}

$table = $_GET['table'];

//$page_type = (isset($_GET['action'])=='update')? "Update": ((isset($_GET['action'])=='view')? "View": "Add");
if(!strcmp($_GET['action'],'update') || !strcmp($_GET['action'],'view')){
  $data = $obj->fetch($table, array(), array("id"=>$_GET['id']));

  $id_value = $data[0]['id'];
  $name_value = $data[0]['name'];
  $description_value = $data[0]['description'];
  $created_value = $data[0]['created_at'];
  $updated_value = $data[0]['updated_at'];
}
?>

<div class="jumbotron text-center" style="margin-bottom:0">
  <h1> <?php echo $page_type." ".ucfirst($table); ?></h1>
</div>

<div class="container" style="margin-top:30px">
  <div class="row">
    
    <div class="col-sm-8">
      <div id="operation-result" class="alert">
      </div>
    </div>

    <div class="col-sm-8">
      <form id="save-one" data-type="<?php echo $page_type ?>" data-table="<?php echo $table ?>" class="needs-validation" novalidate>

        <?php if($page_type=="Update"){ ?>
          <input type="hidden" id="id" name="id" value="<?php echo isset($id_value) ? $id_value : ""; ?>">
          <input type="hidden" id="table" name="table" value="<?php echo isset($table) ? $table : ""; ?>">
        <?php } ?>

        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Name: </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" maxlength="200" value="<?php echo isset($name_value) ? $name_value : ""; ?>" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
        </div>

        <div class="form-group row">
          <label for="description" class="col-sm-2 col-form-label">Description: </label>
          <div class="col-sm-10">
          <input type="text" class="form-control" id="description" placeholder="Enter Description" name="description" maxlength="100" value="<?php echo isset($description_value) ? $description_value : ""; ?>" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
        </div>

        <?php if(strcmp($_GET['action'],'view')){ ?>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label"> </label>
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
        <?php } ?>

    </form>
    </div>
  </div>
</div>

<?php require "footer.php"; ?>