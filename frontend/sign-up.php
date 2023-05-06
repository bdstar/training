<?php 
require_once 'header.php'; 

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

if(!isset($country_id_value)) $country_id_value=18;
if(isset($details->country)){
  foreach ($country as $key => $value) {
    if($details->country == $value['iso'])
      $country_id_value = $value['id'];
  }
}
?>



<!--http://localhost:8080/training/admin/save3.php?table=registration-->



    <!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s" style="margin: 20px 0;">
                <h6 class="section-title bg-white text-center text-primary px-3">Sign-Up</h6>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light signup-form">
                        <form id="save-one" data-type="<?php echo $page_type ?>" data-table="<?php echo $table ?>" class="needs-validation" novalidate>
                            
                            <div class="form-group row">
                                <div class="input-group flex-nowrap">
                                    <label id="error-msg" for="error-msg"></label>
                                </div>
                            </div>

                            <!--========== START: Full Name =============-->
                            <div class="form-group row">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text"><i class="fas fa-user"></i> <span class="required-sign">*</span></span>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Your Full Name" name="name" maxlength="200" value="" required>
                                </div>
                                <i id="name-error-msg" class="col-md-12 input-danger-label"></i>
                            </div>
                            <!--========== END: Full Name =============-->

                            <!--========== START: Email =============-->
                            <div class="form-group row">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i> <span class="required-sign">*</span></span>
                                    <input type="email" class="form-control" id="email" placeholder="Please enter your email address correctly!" name="email" maxlength="100" value="" required>
                                </div>
                                <i id="email-error-msg" class="col-md-12 input-danger-label"></i>
                                <i class="input-info-label">We will sent schedule, instruction and invitation through your email address</i>
                            </div>
                            <!--========== END: Email =============-->

                            <!--========== START: Password =============-->
                            <div class="form-group row">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text"><i class="fas fa-unlock-alt"></i> <span class="required-sign">*</span></span>
                                    <input type="password" class="form-control" id="password" placeholder="Enter Password correctly!" name="password" maxlength="100" value="" required>
                                </div>
                                <i id="password-error-msg" class="col-md-12 input-danger-label"></i>
                                <i class="col-md-12 input-info-label">Password should be 6 character or long.</i>
                                <i class="col-md-12 input-danger-label"> Use STRONG password(Capital-Small alphabet, number and special character combination)</i>
                            </div>
                            <!--========== END: Password =============-->


                            <!--========== START: Gender =============-->
                            <div class="form-group row">
                                <label for="gender" class="col-sm-2 col-form-label" style="margin-top: -7px;">Gender <span class="required-sign">*</span> </label>
                                <div class="col-sm-10">
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" id="radio-male" name="gender" value="male" required> Male
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" id="radio-female" name="gender" value="female" required> Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!--========== END: Gender =============-->


                            <!--========== START: Address =============-->
                            <div class="form-group row">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text"><i class="fas fa-map-marked-alt"></i> <span class="required-sign">*</span></span>
                                    <input type="text" class="form-control" id="address" placeholder="Enter Your Current Address" name="address" maxlength="200" value="" required>
                                </div>
                                <i id="address-error-msg" class="col-md-12 input-danger-label"></i>
                                <i class="col-sm-12 input-info-label">Write your Current Address formate can be "Area, City"</i>
                            </div>
                            <!--========== END: Address =============-->



                            <!--========== START: Country =============-->
                            <div class="form-group row">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text"><i class="fas fa-globe"></i> <span class="required-sign">*</span></span>
                                    <select class="form-control selectpicker" name="country_id" id="country-id" data-show-subtext="true" data-live-search="true" style="border: 1px solid #e9ecef;">
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
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text"><i class="fas fa-university"></i> <span class="required-sign">*</span></span>
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



                            <!--========== START: Other Institution =============-->
                            <div id="other-institution-box" class="form-group row">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text"><i class="fas fa-school"></i> <span class="required-sign">*</span></span>
                                    <input type="text" class="form-control" id="other-institution" placeholder="Enter Your Institution Name" name="other_institution" maxlength="200" value="" required>
                                </div>
                                <i id="other-institution-error-msg" class="col-md-12 input-danger-label"></i>
                                <i class="col-sm-12 input-info-label">Specify Institution Name if you don't find your institution from the above dropdown.</i>
                            </div>
                            <!--========== END: Other Institution =============-->



                            <!--========== START: Admission Year =============-->
                            <div class="form-group row">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text"><i class="fas fa-calendar-week"></i> <span class="required-sign">&nbsp; &nbsp;</span></span>
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
                                </div>
                                <i class="col-sm-12 input-info-label">Please tell me your admission year of Institution</i>
                            </div>
                            <!--========== END: Admission Year =============-->




                            <!--========== START: Study =============-->
                            <div class="form-group row">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text"><i class="fas fa-book"></i> <span class="required-sign">*</span></span>
                                    <input type="text" class="form-control" id="study" placeholder="Field of Study" name="study" maxlength="200" value="" required>
                                </div>
                                <i id="other-institution-error-msg" class="col-md-12 input-danger-label"></i>
                                <i class="col-sm-12 input-info-label">Mention your Field of Study/Department</i>
                            </div>
                            <!--========== END: Study =============-->



                            <!--========== START: Profession =============-->
                            <div class="form-group row">
                                <label for="profession" class="col-sm-2 col-form-label" style="margin-top: -7px;">Job <span class="required-sign">*</span> </label>
                                <div class="col-sm-10">
                                <?php foreach ($profession as $key => $value) { ?>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                        <?php echo '<input type="radio" class="form-check-input" id="radio-'.$value["name"].'" name="profession_id" value="'.$value["id"].'" required> '.$value["name"].' '; ?>
                                        </label>
                                    </div>
                                    <?php } ?>
                                    <br><i class="col-sm-12 input-info-label">Tell me your current Profession</i>
                                </div>
                            </div>
                            <!--========== END: Profession =============-->



                            <!--========== START: if Professional =============-->
                            <div id="other-professional-box" class="form-group row">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text"><i class="fas fa-briefcase"></i> <span class="required-sign">*</span></span>
                                    <input type="text" class="form-control" id="other-professional" placeholder="Enter Your Company Name" name="other_professional" maxlength="200" value="" required>
                                </div>
                                <i id="other-institution-error-msg" class="col-md-12 input-danger-label"></i>
                                <i class="col-sm-12 input-info-label">Specify Current Company Name if you are a professional person.</i>
                            </div>
                            <!--========== END: if Professional =============-->


                            <!--========== START: Like =============-->
                            <div class="form-group row">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text"><i class="fas fa-thumbs-up"></i></span>
                                    <label for="like" class="col-sm-11 input-social-label"> Like on our Official Facebook Page
                                        <a href="https://www.facebook.com/icoldcofe/" target="_blank"><i class="fab fa-facebook-square"></i>/icoldcofe</a>
                                    </label>
                                </div>
                                <i class="col-sm-12 input-danger-label">Every update, We will notify through our Facebook Page</i>
                            </div>
                            <!--========== END: Like =============-->


                            <!--========== START: Subscribe =============-->
                            <div class="form-group row">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text"><i class="fas fa-hand-point-up"></i></span>
                                    <label for="like" class="col-sm-11 input-social-label"> Subscribe our YouTube Channel
                                        <a href="https://www.youtube.com/@ColdCofe" target="_blank"><i class="fab fa-youtube"></i>/icoldcofe</a>
                                    </label>
                                </div>
                                <i class="col-sm-12 input-danger-label">We will publish every session videos to our Official YouTube Channel</i>
                            </div>
                            <!--========== END: Subscribe =============-->



                            <!--========== START: Connect =============-->
                            <div class="form-group row">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text"><i class="fab fa-connectdevelop"></i></span>
                                    <label for="like" class="col-sm-11 input-social-label"> Connect our Linkedin Account
                                        <a href="https://www.linkedin.com/in/coldcofe/" target="_blank"><i class="fab fa-linkedin-square"></i>/coldcofe</a>
                                    </label>
                                </div>
                                <i class="col-sm-12 input-danger-label">To sharing knowledge connect to our Official Linkedin Account</i>
                            </div>
                            <!--========== END: Connect =============-->


                            <!--========== START: Checkbox Terms and Conditions =============-->
                            <div class="form-group row">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" required>
                                        &nbsp;<span class="required-sign">*</span>
                                    </span>
                                    <label class="form-check-label col-sm-11 input-social-label" for="flexCheckChecked">Creating your account and you accepting 
                                        <a href="terms-conditions" target="_blank">Terms and Conditions</a>
                                    </label>
                                </div>
                            </div>
                            <!--========== END: Checkbox Terms and Conditions =============-->

                            
                            <!--========== START: Submit Button =============-->
                            <div class="form-group row">
                                <div class="position-relative d-flex justify-content-center">
                                    <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                        <button type="submit" class="btn btn-sm-square btn-primary mx-1" style="width: 220px; background-color: darkcyan;">Registred</button>
                                    </div>
                                </div>
                            </div>
                            <!--========== END: Submit Button =============-->
                        </form>

                        <div class="d-flex border-top sign-form-bottom">
                            <div class="flex-fill text-center border-end py-2">
                                <a class="btn btn-sm-square btn-primary mx-1" href="login" style="width: 175px; background-color: steelblue;">Login</a>
                            </div>
                            <div class="flex-fill text-center py-2">
                                <a class="btn btn-sm-square btn-primary mx-1" href="forget-password" style="width: 175px; background-color: darkslategray; float: right;">Forget Password</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- Courses End -->


        

    <?php require_once 'footer.php'; ?>