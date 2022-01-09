<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title; ?>
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- base:css -->
    <link rel="stylesheet"
        href="<?php echo ADMIN_ASSETS; ?>vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet"
        href="<?php echo ADMIN_ASSETS; ?>vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet"
        href="<?php echo ADMIN_ASSETS; ?>css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon"
        href="<?php echo ADMIN_ASSETS; ?>images/favicon.png" />
</head>

<body class="sidebar-fixed">
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">



                            <h3 class="text-center">Only For Administrator</h3>
                            <hr class="login-border">
                            <!-- success message -->
                            <div class="alert alert-success" id="alert-success" style="display: none;" role="alert">

                            </div>
                            <!-- warning message -->
                            <div class="alert alert-warning" id="alert-warning" style="display: none;" role="alert">

                            </div>
                            <form class="simple-form"
                                action="<?php echo SERVER_ROOT_PATH.'admin/login' ?>">

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" name="email"
                                        placeholder="Email Address">
                                </div>

                                <div class="input-group">
                                    <input type="password" id="password" class="form-control form-control-lg"
                                        name="password" placeholder="Password">
                                    <div class="input-group-append">
                                        <span class="input-group-text" onclick="password_info()"><i class="mdi mdi-eye"
                                                id="eye-icon"></i></span>
                                    </div>
                                </div>

                                <span class="input-group-error" style="display: none; color:red; font-size:12px"></span>

                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" name="remember_me" class="form-check-input">
                                            Remember Me
                                        </label>
                                    </div>
                                    <a href="<?php echo SERVER_ROOT_PATH.'forgot_password' ?>"
                                        class="forgot-label">Forgot password?</a>
                                </div>


                                <!-- <div class="form-group terms text-center mt-5 mb-4">
                                    <p><a href="javascript:void(0)">Terms and Conditions</a> | <a
                                            href="javascript:void(0)"> Privacy
                                            Policy</a> </p>

                                </div> -->

                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        id="submit_btn">SIGN IN</a>
                                </div>


                                <div class="text-center mt-4 font-weight-light forgot-label">
                                    Don't have an account? <a
                                        href="<?php echo SERVER_ROOT_PATH.'register' ?>">Register</a>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->




        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="<?php echo ADMIN_ASSETS; ?>vendors/base/vendor.bundle.base.js">
    </script>
    <script src="<?php echo ADMIN_ASSETS; ?>js/custom.js">
    </script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="<?php echo ADMIN_ASSETS; ?>js/off-canvas.js"></script>
    <script src="<?php echo ADMIN_ASSETS; ?>js/hoverable-collapse.js"></script>
    <script src="<?php echo ADMIN_ASSETS; ?>js/template.js"></script>
    <script src="<?php echo ADMIN_ASSETS; ?>js/settings.js"></script>
    <script src="<?php echo ADMIN_ASSETS; ?>js/todolist.js"></script>
    <!-- endinject -->

</body>

</html>