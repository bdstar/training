<?php require_once 'header.php'; ?>







    <!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s" style="margin: 20px 0;">
                <h6 class="section-title bg-white text-center text-primary px-3">Login</h6>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light sign-form">
                        
                        <div class="input-group flex-nowrap">
                            <label id="error-msg" for="error-msg"></label>
                        </div>

                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping-email"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" placeholder="Email Address" aria-label="Username" aria-describedby="addon-wrapping-email">
                        </div>

                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping-password"><i class="fas fa-unlock-alt"></i></span>
                            <input type="password" class="form-control" placeholder="Enter Password" aria-label="Password" aria-describedby="addon-wrapping-password">
                        </div>

                        <div class="position-relative d-flex justify-content-center">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <button type="submit" class="btn btn-sm-square btn-primary mx-1" style="width: 220px; background-color: darkcyan;">Login</button>
                            </div>
                        </div>

                        <div class="d-flex border-top sign-form-bottom">
                            <div class="flex-fill text-center border-end py-2">
                                <a class="btn btn-sm-square btn-primary mx-1" href="sign-up" style="width: 175px; background-color: steelblue;">SignUp</a>
                            </div>
                            <div class="flex-fill text-center py-2">
                                <a class="btn btn-sm-square btn-primary mx-1" href="forget-password" style="width: 175px; background-color: darkslategray;">Forget Password</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- Courses End -->


        

    <?php require_once 'footer.php'; ?>