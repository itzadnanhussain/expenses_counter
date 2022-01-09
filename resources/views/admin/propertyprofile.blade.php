@include('admin.header')
<?php error_reporting(0); ?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">property Details</h4>
                    <!-- <p class="card-gallery">Horizontal bootstrap tab</p> -->
                    <ul class="nav nav-tabs" role="tablist">
                        <!-- profile tab -->
                        <li class="nav-item">
                            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile-1" role="tab"
                                aria-controls="profile-1" aria-selected="true">Profile</a>
                        </li>


                        <!-- gallery tab -->
                        <li class="nav-item">
                            <a class="nav-link" id="gallery-tab" data-toggle="tab" href="#gallery-1" role="tab"
                                aria-controls="gallery-1" aria-selected="false">Gallery</a>
                        </li>


                        <!-- features tab -->
                        <li class="nav-item">
                            <a class="nav-link" id="features-tab" data-toggle="tab" href="#features-1" role="tab"
                                aria-controls="features-1" aria-selected="false">Features</a>
                        </li>

                        <!-- contact tab -->
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact-1" role="tab"
                                aria-controls="contact-1" aria-selected="false">Contact</a>
                        </li>

                        <!-- others tab -->
                        <li class="nav-item">
                            <a class="nav-link" id="others-tab" data-toggle="tab" href="#others-1" role="tab"
                                aria-controls="others-1" aria-selected="false">Others</a>
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
                                                        <input type="hidden" name="property_id"
                                                            value="<?php echo $property_data[0]->property_id ?>">
                                                        <img
                                                            src="<?php echo SERVER_ROOT_PATH.'Admin/profiles/'.$property_data[0]->property_id.'/'.$property_data[0]->profile_image; ?>">

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
                                                    <h3><?php echo $property_data[0]->pro_name ?>
                                                    </h3>
                                                    <p><?php echo $property_data[0]->pro_description ?>
                                                    </p>

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
                                                        Property ID
                                                    </span>
                                                    <span class="float-right text-muted">
                                                        <?php echo $property_data[0]->property_id ?>
                                                    </span>
                                                </p>
                                                <p class="clearfix">
                                                    <span class="float-left">
                                                        Host Name
                                                    </span>
                                                    <span class="float-right text-muted">
                                                        <?php echo GetUserFullName($property_data[0]->property_id) ?>
                                                    </span>
                                                </p>
                                                <p class="clearfix">
                                                    <span class="float-left">
                                                        Category
                                                    </span>
                                                    <span class="float-right text-muted">
                                                        <?php echo $property_data[0]->pro_category ?>
                                                    </span>
                                                </p>
                                                <p class="clearfix">
                                                    <span class="float-left">
                                                        Total Size
                                                    </span>
                                                    <span class="float-right text-muted">
                                                        <?php echo $property_data[0]->pro_size ?>
                                                    </span>
                                                </p>
                                                <p class="clearfix">
                                                    <span class="float-left">
                                                        Price
                                                    </span>
                                                    <span class="float-right text-muted">
                                                        <?php echo $property_data[0]->pro_price ?>
                                                    </span>
                                                </p>
                                                <p class="clearfix">
                                                    <span class="float-left">
                                                        Bedrooms
                                                    </span>
                                                    <span class="float-right text-muted">
                                                        <?php echo $property_data[0]->pro_bedrooms ?>
                                                    </span>
                                                </p>
                                                <p class="clearfix">
                                                    <span class="float-left">
                                                        Capacity
                                                    </span>
                                                    <span class="float-right text-muted">
                                                        <?php echo $property_data[0]->pro_capacity ?>
                                                    </span>
                                                </p>
                                                <p class="clearfix">
                                                    <span class="float-left">
                                                        House Type
                                                    </span>
                                                    <span class="float-right text-muted">
                                                        <?php echo $property_data[0]->pro_house_type ?>
                                                    </span>
                                                </p>
                                                <p class="clearfix">
                                                    <span class="float-left">
                                                        Pet Allow
                                                    </span>
                                                    <span class="float-right text-muted">
                                                        <?php echo $property_data[0]->pro_pet_allow ?>
                                                    </span>
                                                </p>
                                                <p class="clearfix">
                                                    <span class="float-left">
                                                        Status
                                                    </span>
                                                    <span class="float-right text-muted">
                                                        <?php echo $property_data[0]->pro_status ?>
                                                    </span>
                                                </p>




                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- gallery tab -->
                        <div class="tab-pane fade" id="gallery-1" role="tabpanel" aria-labelledby="gallery-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Property Gallery</h4>
                                    <p class="card-text">
                                        Click on any image to open in lightbox gallery
                                    </p>
                                    <div id="lightgallery" class="row lightGallery">
                                        <a href="https://via.placeholder.com/813x488" class="image-tile"><img
                                                src="https://via.placeholder.com/248x248" alt="image small"></a>
                                        <a href="https://via.placeholder.com/813x488" class="image-tile"><img
                                                src="https://via.placeholder.com/248x248" alt="image small"></a>
                                        <a href="https://via.placeholder.com/813x488" class="image-tile"><img
                                                src="https://via.placeholder.com/248x248" alt="image small"></a>
                                        <a href="https://via.placeholder.com/813x488" class="image-tile"><img
                                                src="https://via.placeholder.com/248x248" alt="image small"></a>
                                        <a href="https://via.placeholder.com/813x488" class="image-tile"><img
                                                src="https://via.placeholder.com/248x248" alt="image small"></a>
                                        <a href="https://via.placeholder.com/813x488" class="image-tile"><img
                                                src="https://via.placeholder.com/248x248" alt="image small"></a>
                                        <a href="https://via.placeholder.com/813x488" class="image-tile"><img
                                                src="https://via.placeholder.com/248x248" alt="image small"></a>
                                        <a href="https://via.placeholder.com/813x488" class="image-tile"><img
                                                src="https://via.placeholder.com/248x248" alt="image small"></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- features tab -->
                        <div class="tab-pane fade" id="features-1" role="tabpanel" aria-labelledby="features-tab">
                            <p><?php echo $property_data[0]->pro_features ?>
                            </p>
                        </div>

                        <!-- contact tab -->
                        <div class="tab-pane fade" id="contact-1" role="tabpanel" aria-labelledby="contact-tab">
                            <p>
                                Feel free to others me if you have any questions!
                            </p>
                            <!-- <p>
                                <i class="mdi mdi-phone text-info"></i>
                                <?php echo $property_data[0]->phone ?>
                            </p> -->
                            <!-- <p>
                                <i class="mdi mdi-email-outline text-success"></i>
                                <?php echo $property_data[0]->email ?>
                            </p> -->
                            <p>
                                <i class="mdi mdi-home text-success"></i>
                                <?php echo $property_data[0]->pro_location ?>
                            </p>
                            <p>
                                Property Distance From Public Transit
                            </p>
                            <p>
                                <i class="mdi mdi-home text-success"></i>
                                <?php echo $property_data[0]->pro_distance_from_public_transit ?>
                            </p>
                        </div>


                        <!-- others tab -->
                        <div class="tab-pane fade" id="others-1" role="tabpanel" aria-labelledby="others-tab">
                            <div class="form">
                                <div class="form-group">
                                    <label for="">Property Terms Rules</label>
                                    <textarea name="" class="form-control" id="" cols="30" rows="10"
                                        disabled><?php echo $property_data[0]->pro_terms_rules ?></textarea>

                                </div>
                                <div class="form-group">
                                    <label for="">Property Cancellation Policy</label>
                                    <textarea name="" class="form-control" id="" cols="30" rows="10"
                                        disabled><?php echo $property_data[0]->pro_cancellation_policy ?></textarea>

                                </div>

                            </div>

                        </div>

                        <!-- setting tab -->
                        <div class="tab-pane fade" id="setting-1" role="tabpanel" aria-labelledby="setting-tab">
                            <h4>Update Profile Info </h4>
                            <form class="file-form"
                                action="<?php echo SERVER_ROOT_PATH.'admin/update_property_process' ?>"
                                enctype="multipart/form-data">
                                <input type="hidden" name="property_id"
                                    value="<?php echo $property_data[0]->property_id; ?>">

                                <div class="form-group">
                                    <label for="exampleTextarea1">First Name</label>
                                    <input type="text" name="first_name" class="form-control"
                                        value="<?php echo $property_data[0]->first_name ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleTextarea1">Last Name</label>
                                    <input type="text" name="last_name" class="form-control"
                                        value="<?php echo $property_data[0]->last_name ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleTextarea1">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="<?php echo $property_data[0]->email ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleTextarea1">Address</label>
                                    <input type="text" name="address" class="form-control"
                                        value="<?php echo $property_data[0]->address ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleTextarea1">Phone</label>
                                    <input type="number" name="phone" class="form-control"
                                        value="<?php echo $property_data[0]->phone ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleTextarea1">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>



                                <div class="form-group">
                                    <label for="exampleSelectGender">Select property Type</label>
                                    <select class="form-control" name="property_type" id="exampleSelectGender">
                                        <option value="Host" <?php echo ($property_data[0]->property_type =="Host") ? 'selected': '' ?>
                                            >Host</option>
                                        <option value="Guest" <?php echo ($property_data[0]->property_type =="Guest") ? 'selected': '' ?>>Guest
                                        </option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleSelectGender">Select property Verification</label>
                                    <select class="form-control" name="property_verified" id="exampleSelectGender">
                                        <option value="Yes" <?php echo ($property_data[0]->property_verified =="Yes") ? 'selected': '' ?>
                                            >Yes</option>
                                        <option value="No" <?php echo ($property_data[0]->property_verified =="No") ? 'selected': '' ?>>No
                                        </option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectGender">Profile Status</label>
                                    <select class="form-control" name="profile_status" id="exampleSelectGender">
                                        <option value="active" <?php echo ($property_data[0]->profile_status =="active") ? 'selected': '' ?>
                                            >Active</option>
                                        <option value="inactive" <?php echo ($property_data[0]->profile_status =="inactive") ? 'selected': '' ?>>Inactive
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
                                <a href="<?php echo SERVER_ROOT_PATH.'admin/propertys_list' ?>"
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
        $('#property').addClass('active');
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

                    window.contact.reload();

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