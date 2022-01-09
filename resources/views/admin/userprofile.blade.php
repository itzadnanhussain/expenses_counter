@include('admin.header')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User Details</h4>
                    <!-- <p class="card-description">Horizontal bootstrap tab</p> -->
                    <ul class="nav nav-tabs" role="tablist">
                        <!-- profile tab -->
                        <li class="nav-item">
                            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile-1" role="tab"
                                aria-controls="profile-1" aria-selected="true">Profile</a>
                        </li>


                        <!-- booking tab -->
                        <li class="nav-item">
                            <a class="nav-link" id="booking-tab" data-toggle="tab" href="#booking-1" role="tab"
                                aria-controls="booking-1" aria-selected="false">Booking</a>
                        </li>


                        <!-- payment tab -->
                        <li class="nav-item">
                            <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment-1" role="tab"
                                aria-controls="payment-1" aria-selected="false">Payment</a>
                        </li>

                        <!-- contact tab -->
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact-1" role="tab"
                                aria-controls="contact-1" aria-selected="false">Contact</a>
                        </li>

                        <!-- Setting tab -->
                        <li class="nav-item">
                            <a class="nav-link" id="setting-tab" data-toggle="tab" href="#setting-1" role="tab"
                                aria-controls="setting-1" aria-selected="false">Setting</a>
                        </li>



                    </ul>
                    <div class="tab-content">


                        <!-- profile tab -->
                        <div class="tab-pane fade show active" id="profile-1" role="tabpanel"
                            aria-labelledby="profile-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="border-bottom text-center pb-4">
                                                <!-- <img src="https://via.placeholder.com/92x92" alt="profile"
                                                    class="img-lg rounded-circle mb-3"> -->

                                                <form enctype="multipart/form-data"
                                                    action="<?php echo SERVER_ROOT_PATH.'admin/image_upload_process'; ?>"
                                                    method="post" name="image_upload_form" id="image_upload_form">
                                                    <div id="imgArea">
                                                        <input type="hidden" name="user_id"
                                                            value="<?php echo $user_data[0]->user_id ?>">
                                                        <img
                                                            src="<?php echo SERVER_ROOT_PATH.'Admin/profiles/'.$user_data[0]->user_id.'/'.$user_data[0]->profile_image; ?>">

                                                        <div class="progressBar">
                                                            <div class="bar"></div>
                                                            <div class="percent">0%</div>
                                                        </div>
                                                        <div id="imgChange">
                                                            <div class="ellipse-camera">
                                                                <i class="fa fa-camera"></i>
                                                                <input type="file" accept="image/*"
                                                                    name="image_upload_file" id="image_upload_file">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </form>

                                                <div class="mb-3">
                                                    <h3><?php echo GetUserFullName($user_data[0]->user_id) ?>
                                                    </h3>

                                                </div>

                                            </div>

                                            <div class="border-bottom py-4">
                                                <div class="d-flex mb-3">
                                                    <div class="progress progress-md flex-grow">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                            aria-valuenow="55" style="width: 55%" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="progress progress-md flex-grow">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            aria-valuenow="75" style="width: 75%" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="py-4">
                                                <p class="clearfix">
                                                    <span class="float-left">
                                                        Profile Status
                                                    </span>
                                                    <span class="float-right text-muted">
                                                        <?php echo $user_data[0]->profile_status ?>
                                                    </span>
                                                </p>
                                                <p class="clearfix">
                                                    <span class="float-left">
                                                        Profile Type
                                                    </span>
                                                    <span class="float-right text-muted">
                                                        <?php echo $user_data[0]->user_type ?>
                                                    </span>
                                                </p>
                                                <p class="clearfix">
                                                    <span class="float-left">
                                                        Profile Verification
                                                    </span>
                                                    <span class="float-right text-muted">
                                                        <?php echo $user_data[0]->user_verified ?>
                                                    </span>
                                                </p>




                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- booking tab -->
                        <div class="tab-pane fade" id="booking-1" role="tabpanel" aria-labelledby="booking-tab">
                            <h4 class="mt-0">Coming Soon</h4>
                        </div>

                        <!-- payment tab -->
                        <div class="tab-pane fade" id="payment-1" role="tabpanel" aria-labelledby="payment-tab">
                            <h4 class="mt-0">Coming Soon</h4>
                        </div>


                        <!-- contact tab -->
                        <div class="tab-pane fade" id="contact-1" role="tabpanel" aria-labelledby="contact-tab">
                            <h4>Contact Detail </h4>
                            <p>
                                Feel free to contact me if you have any questions!
                            </p>
                            <p>
                                <i class="mdi mdi-phone text-info"></i>
                                <?php echo $user_data[0]->phone ?>
                            </p>
                            <p>
                                <i class="mdi mdi-email-outline text-success"></i>
                                <?php echo $user_data[0]->email ?>
                            </p>
                            <p>
                                <i class="mdi mdi-home text-success"></i>
                                <?php echo $user_data[0]->address ?>
                            </p>
                        </div>

                        <!-- setting tab -->
                        <div class="tab-pane fade" id="setting-1" role="tabpanel" aria-labelledby="setting-tab">
                            <h4>Update Profile Info </h4>
                            <form class="file-form"
                                action="<?php echo SERVER_ROOT_PATH.'admin/update_user_process' ?>"
                                enctype="multipart/form-data">
                                <input type="hidden" name="user_id"
                                    value="<?php echo $user_data[0]->user_id; ?>">

                                <div class="form-group">
                                    <label for="exampleTextarea1">First Name</label>
                                    <input type="text" name="first_name" class="form-control"
                                        value="<?php echo $user_data[0]->first_name ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleTextarea1">Last Name</label>
                                    <input type="text" name="last_name" class="form-control"
                                        value="<?php echo $user_data[0]->last_name ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleTextarea1">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="<?php echo $user_data[0]->email ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleTextarea1">Address</label>
                                    <input type="text" name="address" class="form-control"
                                        value="<?php echo $user_data[0]->address ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleTextarea1">Phone</label>
                                    <input type="number" name="phone" class="form-control"
                                        value="<?php echo $user_data[0]->phone ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleTextarea1">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>



                                <div class="form-group">
                                    <label for="exampleSelectGender">Select User Type</label>
                                    <select class="form-control" name="user_type" id="exampleSelectGender">
                                        <option value="Host" <?php echo ($user_data[0]->user_type =="Host") ? 'selected': '' ?>
                                            >Host</option>
                                        <option value="Guest" <?php echo ($user_data[0]->user_type =="Guest") ? 'selected': '' ?>>Guest
                                        </option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleSelectGender">Select User Verification</label>
                                    <select class="form-control" name="user_verified" id="exampleSelectGender">
                                        <option value="Yes" <?php echo ($user_data[0]->user_verified =="Yes") ? 'selected': '' ?>
                                            >Yes</option>
                                        <option value="No" <?php echo ($user_data[0]->user_verified =="No") ? 'selected': '' ?>>No
                                        </option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectGender">Profile Status</label>
                                    <select class="form-control" name="profile_status" id="exampleSelectGender">
                                        <option value="active" <?php echo ($user_data[0]->profile_status =="active") ? 'selected': '' ?>
                                            >Active</option>
                                        <option value="inactive" <?php echo ($user_data[0]->profile_status =="inactive") ? 'selected': '' ?>>Inactive
                                        </option>

                                    </select>
                                </div>

                                <!-- success message -->
                                <div class="alert alert-success" id="alert-success" style="display: none;" role="alert">

                                </div>
                                <!-- warning message -->
                                <div class="alert alert-warning" id="alert-warning" style="display: none;" role="alert">
                                </div>


                                <input type="submit" class="btn btn-primary mr-2" value="Update">
                                <a href="<?php echo SERVER_ROOT_PATH.'admin/users_list' ?>"
                                    class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@include('admin.footer')

<style>
    .ellipse-camera {

        display: inline-block;
        background-color: #61a11b;
        cursor: pointer;
        width: 100%;
        height: 100%;



        text-align: center !important;
        border-radius: 50%;

        margin-left: 55px;
    }

    .ellipse-camera i {
        margin-top: 8px;
        font-size: 15px;
    }

    #imgArea {
        display: inline-block;
        margin: 0 auto;
        position: relative;
        background-color: #005996;
        margin-bottom: 10px;
    }



    #imgArea img {
        background-color: white;
        height: 122px;
        width: 120px;
        border-radius: 50%;

    }

    #imgChange {
        /* background: url("../img/overlay.png") repeat scroll 0 0 rgba(0, 0, 0, 0); */
        bottom: 0;
        color: #ffffff;
        display: block;
        top: 13px;
        left: 20px;


        line-height: 32px;
        position: absolute;
        text-align: center;
        width: 30px;
        height: 30px;

    }

    #imgChange input[type="file"] {
        bottom: 0;
        height: 100%;
        left: 50px;
        margin: 0;
        opacity: 0;
        cursor: pointer;
        padding: 0;
        font-size: 0px;
        position: absolute;
        width: 40px;
        z-index: 0;
    }

    /* Progressbar */
    .progressBar {
        background: none repeat scroll 0 0 #e0e0e0;
        left: 0;
        padding: 3px 0;
        position: absolute;
        top: 50%;
        width: 100%;
        display: none;
    }

    .progressBar .bar {
        background-color: #ff6c67;
        width: 0%;
        height: 14px;
    }

    .progressBar .percent {
        display: inline-block;
        left: 0;
        position: absolute;
        text-align: center;
        top: 2px;
        width: 100%;
    }
</style>

<!-- remove active class from nav -->
<script>
    $(window).on('load', function() {
        $('.nav-item').removeClass('active')
        $('#user').addClass('active');
    });
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"
    integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous">
</script>

<script>
    $(document).on('change', '#image_upload_file', function() {
        var progressBar = $('.progressBar'),
            bar = $('.progressBar .bar'),
            percent = $('.progressBar .percent');

        $('#image_upload_form').ajaxForm({
            beforeSend: function() {
                progressBar.fadeIn();
                var percentVal = '0%';
                bar.width(percentVal)
                percent.html(percentVal);
            },
            uploadProgress: function(event, position, total, percentComplete) {
                var percentVal = percentComplete + '%';
                bar.width(percentVal)
                percent.html(percentVal);
            },
            success: function(html, statusText, xhr, $form) {
                obj = $.parseJSON(html);
                if (obj.status) {
                    var percentVal = '100%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                    $("#imgArea>img").prop('src', obj.output);

                    window.location.reload();

                } else {
                    alert('Profile Not Updated!')

                }
            },
            complete: function(xhr) {
                progressBar.fadeOut();
            }
        }).submit();

    });
</script>