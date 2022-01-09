@include('admin.header')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New User</h4>


                    <form class="file-form"
                        action="<?php echo SERVER_ROOT_PATH.'admin/add_user_process' ?>"
                        enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="exampleTextarea1">First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email Address">
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Phone</label>
                            <input type="number" name="phone" class="form-control" placeholder="Enter Contact Number">
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Enter Home Address">
                        </div>

                        <div class="form-group">
                            <label for="exampleTextarea1">Password</label>
                            <input type="password" name="simple_password" class="form-control"
                                placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Select User Type</label>
                            <select class="form-control" name="user_type" id="exampleSelectGender">
                                <option value="Host">Host</option>
                                <option value="Guest">Guest</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Select User Verified</label>
                            <select class="form-control" name="user_verified" id="exampleSelectGender">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>

                            </select>
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

                        <!-- success message -->
                        <div class="alert alert-success" id="alert-success" style="display: none;" role="alert"></div>
                        <!-- warning message -->
                        <div class="alert alert-warning" id="alert-warning" style="display: none;" role="alert">

                        </div>

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
        $('#user').addClass('active');
    });
</script>