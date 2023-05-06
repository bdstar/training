<?php 
require "browser.php";
require "header.php"; 

if(!isset($_GET['action'])){$_GET['action']='add';}

if(!strcmp($_GET['action'],'update')){$page_type = "Update";}
elseif(!strcmp($_GET['action'],'view')){$page_type = "View";}
else{$page_type = "Add";}

$table = $_GET['table'];

$courses = $obj->fetch('courses', array(), array());
$institutions = $obj->fetch('institutions', array(), array(), array('description'=>'ASC'));
$profession = $obj->fetch('profession', array(), array());
$country = $obj->fetch('country', array(), array(), array('name'=>'ASC'));


$address_value = "";
if(isset($details->region)){
  $address_value .= $details->region;
} if(isset($details->city)){
  $address_value .= $details->city;
}

//$page_type = (isset($_GET['action'])=='update')? "Update": ((isset($_GET['action'])=='view')? "View": "Add");
if(!strcmp($_GET['action'],'update') || !strcmp($_GET['action'],'view')){
  $data = $obj->fetch($table, array(), array("id"=>$_GET['id']));

  $id_value = $data[0]['id'];
  $course_id_value = $data[0]['course_id'];
  $name_value = $data[0]['name'];
  $email_value = $data[0]['email'];
  $phone_value = $data[0]['phone'];
  $gender_value = $data[0]['gender'];
  $address_value = $data[0]['address'];
  $country_id_value = $data[0]['country_id'];
  $institution_id_value = $data[0]['institution_id'];
  $admission_value = $data[0]['admission'];
  $study_value = $data[0]['study'];
  $profession_id_value = $data[0]['profession_id'];
  $company_value = $data[0]['company'];
  $job_value = $data[0]['job'];
  $verified_value = $data[0]['verified'];
  $approved_value = $data[0]['approved'];
  $created_value = $data[0]['created_at'];
  $updated_value = $data[0]['updated_at'];

  $dateTime = new DateTime($updated_value);
  $updated_at = $dateTime->format('Y-m-d');
  //`id`, `name`, `description`, `categories_id`, `amount`, `created_at`, `updated_at`
  //`id`, `course_id`, `name`, `email`, `phone`, `gender`, `address`, `country_id`, `institution_id`, `admission`, `study`, `profession_id`, `verified`, `approved`, `created_at`, `updated_at` FROM `registration`
}

if(!isset($country_id_value)) $country_id_value=18;
if(isset($details->country)){
  foreach ($country as $key => $value) {
    if($details->country == $value['iso'])
      $country_id_value = $value['id'];
  }
}


//echo "country=".$country_id_value;
/*
Course Name <hidden>
-Full Name <text>
-Email <email>
-phone <text>
-Gender <radio>
-Address <text>
-Country <dropdown>
-Institution <dropdown: Institute>
-Admission Year <dropdown>
-Field of Study <text>
-Professional Type <dropdown: professional>

Like: FB Page <label>
Subscribe: YouTube <label>
Connect: Linkedin <label>

Email will sent to user for -> verify
Admin action to user -> Approved
*/
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

        <!--========== START: Name =============-->
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Full Name <span class="required-sign">*</span> </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="name" placeholder="Enter Your Full Name" name="name" maxlength="200" value="<?php echo isset($name_value) ? $name_value : ""; ?>" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
        </div>
        <!--========== END: Name =============-->


        <!--========== START: Email =============-->
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">Email <span class="required-sign">*</span> </label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="email" placeholder="Please enter your email address correctly!" name="email" maxlength="100" value="<?php echo isset($email_value) ? $email_value : ""; ?>" required>
            <i class="col-sm-12 input-info-label">We will sent schedule, instruction and invitation through your email address</i>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
        </div>
        <!--========== END: Email =============-->


        <!--========== START: Password =============-->
        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Password <span class="required-sign">*</span> </label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="password" placeholder="Enter Password correctly!" name="password" maxlength="100" value="<?php echo isset($password_value) ? $password_value : ""; ?>" required>
            <i class="col-sm-12 input-info-label">Password should be 6 character or long.</i> <br>
            <i class="col-sm-12 input-danger-label">N.B: Use STRONG password(Capital-Small alphabet, number and special character combination)</i>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
        </div>
        <!--========== END: Password =============-->


        <!--========== START: Gender =============-->
        <div class="form-group row">
          <label for="gender" class="col-sm-2 col-form-label">Gender <span class="required-sign">*</span> </label>
          <div class="col-sm-10">
            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" id="radio-male" name="gender" value="male" required>Male
              </label>
            </div>
            <div class="form-check-inline">
              <label class="form-check-label">
              <input type="radio" class="form-check-input" id="radio-female" name="gender" value="female" required>Female
              </label>
            </div>
          </div>
        </div>
        <!--========== END: Gender =============-->


        <!--========== START: Address =============-->
        <div class="form-group row">
          <label for="address" class="col-sm-2 col-form-label">Address <span class="required-sign">*</span> </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="address" placeholder="Enter Your Current Address" name="address" maxlength="200" value="<?php echo isset($address_value) ? $address_value : ""; ?>" required>
            <i class="col-sm-12 input-info-label">Write your Current Address formate can be "Area, City"</i>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
        </div>
        <!--========== END: Address =============-->


        <!--========== START: Country =============-->
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Country <span class="required-sign">*</span> </label>
          <div class="col-sm-10">
            <select class="form-control selectpicker" name="country_id" id="country-id" data-show-subtext="true" data-live-search="true">
              <?php
              foreach ($country as $key => $value) {
                if($value['id']==$country_id_value)
                  echo '<option data-subtext="'.$value['iso'].'" value="'.$value['id'].'" selected>'.$value['name'].'</option>';
                else
                  echo '<option data-subtext="'.$value['iso'].'" value="'.$value['id'].'">'.$value['name'].'</option>';
              }
              ?>
            </select>
          </div>
        </div>
        <!--========== END: Country =============-->


        <!--========== START: Institution =============-->
        <div class="form-group row">
          <label for="institution" class="col-sm-2 col-form-label">Institution <span class="required-sign">*</span> </label>
          <div class="col-sm-10">
            <select class="form-control selectpicker" name="institution_id" id="institution-id" data-show-subtext="true" data-live-search="true">
              <?php
              foreach ($institutions as $key => $value) {
                if($value['id']==$institution_id_value)
                  echo '<option data-subtext="'.$value['name'].'" value="'.$value['id'].'" selected>'.$value['description'].'</option>';
                else
                  echo '<option data-subtext="'.$value['name'].'" value="'.$value['id'].'">'.$value['description'].'</option>';
              }
              ?>
            </select>
          </div>
        </div>
        <!--========== END: Institution =============-->


        <!--========== START: Admission Year =============-->
        <div class="form-group row">
          <label for="admission" class="col-sm-2 col-form-label">Admission </label>
          <div class="col-sm-10">
            <select class="form-control selectpicker" name="admission_id" id="admission-id" data-live-search="true">
              <?php
              $y = intval(date("Y"));

              for($i=$y; $i>1980; $i--){
                if($i==$admission_value)
                  echo '<option value="'.$i.'" selected>'.$i.'</option>';
                else
                  echo '<option value="'.$i.'">'.$i.'</option>';
              }
              ?>
            </select>
            <i class="col-sm-12 input-info-label">Please tell me your admission year of Institution</i>
          </div>
        </div>
        <!--========== END: Admission Year =============-->



        <!--========== START: Study =============-->
        <div class="form-group row">
          <label for="study" class="col-sm-2 col-form-label">Study </label>
          <div class="col-sm-10">
          <input type="text" class="form-control" id="study" placeholder="Field of Study" name="study" maxlength="200" value="<?php echo isset($study_value) ? $study_value : ""; ?>" required>
          <i class="col-sm-12 input-info-label">Mention your Field of Study/Department</i>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
          </div>
        </div>
        <!--========== END: Study =============-->



        <!--========== START: Profession =============-->
        <div class="form-group row">
          <label for="profession" class="col-sm-2 col-form-label">Profession <span class="required-sign">*</span> </label>
          <div class="col-sm-10">

          <?php foreach ($profession as $key => $value) { ?>
            <div class="form-check-inline">
              <label class="form-check-label">
              <?php echo '<input type="radio" class="form-check-input" id="radio-'.$value["name"].'" name="profession_id" value="'.$value["id"].'" required>'.$value["name"].''; ?>
              </label>
            </div>
            <?php } ?>
            <br><i class="col-sm-12 input-info-label">Tell me your current profession</i>
          </div>
        </div>
        <!--========== END: Gender =============-->


        <!--========== START: Like =============-->
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Like </label>
          <div class="col-sm-10">
            <b class="col-sm-12 input-info-label">Like on our Facebook Page</b> 
            <a href="https://www.facebook.com/icoldcofe/" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i>/icoldcofe</a>
            <br>
            <i class="col-sm-12 input-danger-label">We will notify you through our Official Facebook Page</i>
          </div>
        </div>
        <!--========== END: Like =============-->


        <!--========== START: Subscribe =============-->
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Subscribe </label>
          <div class="col-sm-10">
            <b class="col-sm-12 input-info-label">Subscribe our YouTube Channel</b> 
            <a href="https://www.youtube.com/@ColdCofe" target="_blank"><i class="fa fa-youtube-square" aria-hidden="true"></i>/@ColdCofe</a>
            <br>
            <i class="col-sm-12 input-danger-label">We will publish every session videos to our Official YouTube Channel</i>
          </div>
        </div>
        <!--========== END: Subscribe =============-->



        <!--========== START: Connect =============-->
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Connect </label>
          <div class="col-sm-10">
            <b class="col-sm-12 input-info-label">Connect our Linkedin Account</b> 
            <a href="https://www.linkedin.com/in/coldcofe/" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i>/coldcofe</a>
            <br>
            <i class="col-sm-12 input-danger-label">To sharing knowledge connect to our Official Linkedin Account</i>
          </div>
        </div>
        <!--========== END: Connect =============-->


        <!--========== START: Submit Button =============-->
        <?php if(strcmp($_GET['action'],'view')){ ?>
        <div class="form-group row form-group-btn">
          <label for="" class="col-sm-2 col-form-label"> </label>
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
        <?php } ?>
        <!--========== END: Submit Button =============-->

    </form>
    </div>
  </div>
</div>

<?php require "footer.php"; ?>