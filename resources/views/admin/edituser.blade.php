@include('admin.header')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit User Detail</h4>
                    <!-- success message -->
                    <div class="alert alert-success" id="alert-success" style="display: none;" role="alert"></div>
                    <!-- warning message -->
                    <div class="alert alert-warning" id="alert-warning" style="display: none;" role="alert">

                    </div>

                    <form class="file-form"
                        action="<?php echo SERVER_ROOT_PATH.'admin/update_user_process' ?>"
                        enctype="multipart/form-data">
                        <input type="hidden" name="user_id"
                            value="<?php echo $user[0]->user_id; ?>">



                        <div class="form-group">
                            <label for="exampleSelectGender">Select User Type</label>
                            <select class="form-control" name="user_type" id="exampleSelectGender">
                                <option value="host" <?php echo ($user[0]->user_type =="Host") ? 'selected': '' ?>
                                    >Host</option>
                                <option value="guest" <?php echo ($user[0]->user_type =="Guest") ? 'selected': '' ?>>Guest
                                </option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleTextarea1">Email</label>
                            <input type="email" name="email" class="form-control"
                                value="<?php echo $user[0]->email ?>">
                        </div>
                        <div class="form-group">
                            <label>Profile</label>
                            <input type="file" name="profile" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload Profile">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload
                                        Profile</button>
                                </span>
                            </div>
                        </div>

                        <!-- Show Profile -->
                        <?php if (($user[0]->profile) && !empty($user[0]->profile)) { ?>
                        <div class="form-group">
                            <img src="<?php echo SERVER_ROOT_PATH.$user[0]->profile; ?>"
                                alt="" width="34px" height="34px">

                        </div>
                        <?php } ?>



                        <input type="submit" class="btn btn-primary mr-2" value="Submit">
                        <a href="<?php echo SERVER_ROOT_PATH.'admin/users_list' ?>"
                            class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@include('admin.footer')


<!-- remove active class from nav -->
<script>
    $(window).on('load', function() {
        $('.nav-item').removeClass('active');
    });
</script>