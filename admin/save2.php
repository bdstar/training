<?php 
require "header.php"; 

if(!isset($_GET['action'])){$_GET['action']='add';}

if(!strcmp($_GET['action'],'update')){$page_type = "Update";}
elseif(!strcmp($_GET['action'],'view')){$page_type = "View";}
else{$page_type = "Add";}

$table = $_GET['table'];
$banks = $obj->fetch('banks', array(), array());

//$page_type = (isset($_GET['action'])=='update')? "Update": ((isset($_GET['action'])=='view')? "View": "Add");
if(!strcmp($_GET['action'],'update') || !strcmp($_GET['action'],'view')){
  $data = $obj->fetch($table, array(), array("id"=>$_GET['id']));

  $id_value = $data[0]['id'];
  $bank_value = $data[0]['bank_id'];
  $amount_value = $data[0]['amount'];
  $created_value = $data[0]['created_at'];
  $updated_value = $data[0]['updated_at'];

  $dateTime = new DateTime($updated_value);
  $updated_at = $dateTime->format('Y-m-d');
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
          <label for="name" class="col-sm-2 col-form-label">Bank Name: </label>
          <div class="col-sm-10">
            <select class="form-control" name="bank_id" id="bank-id">
              <?php
              foreach ($banks as $key => $value) {
                if($value['id']==$bank_value)
                  echo '<option value="'.$value['id'].'" selected>'.$value['name'].'</option>';
                else
                echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
              }
              ?>
            </select>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
        </div>

        <div class="form-group row">
          <label for="amount" class="col-sm-2 col-form-label">Amount: </label>
          <div class="col-sm-10">
          <input type="number" class="form-control" id="amount" placeholder="Enter Amount" name="amount" maxlength="100" value="<?php echo isset($amount_value) ? $amount_value : ""; ?>" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
        </div>

        <div class="form-group row">
          <label for="updated_at" class="col-sm-2 col-form-label">Date: </label>
          <div class="col-sm-10">
          <input type="date" class="form-control" id="updated_at" placeholder="Enter Date" name="updated_at" maxlength="100" value="<?php echo isset($updated_at) ? $updated_at : ""; ?>" required>
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