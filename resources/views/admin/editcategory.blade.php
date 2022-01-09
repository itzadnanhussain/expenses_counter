@include('admin.header')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Category Details</h4>
                    <!-- success message -->
                    <div class="alert alert-success" id="alert-success" style="display: none;" role="alert"></div>
                    <!-- warning message -->
                    <div class="alert alert-warning" id="alert-warning" style="display: none;" role="alert">

                    </div>

                    <form class="simple-form"
                        action="<?php echo SERVER_ROOT_PATH.'admin/update_category_process' ?>">



                        <!-- <div class="form-group">
                            <label for="exampleSelectGender">Select User Type</label>
                            <select class="form-control" name="user_type" id="exampleSelectGender">
                                <option value="host">Host</option>
                                <option value="guest">Guest</option>
                               
                            </select>
                        </div> -->

                        <div class="form-group">
                            <label>Add Category</label>
                            <input type="hidden" name="cat_id"
                                value="<?php echo $category[0]->cat_id ?>">
                            <input type="text" name="cat_name" class="form-control"
                                value="<?php echo $category[0]->cat_name; ?>">
                        </div>
                        <input type="submit" class="btn btn-primary mr-2" value="Update">
                        <a href="<?php echo SERVER_ROOT_PATH.'admin/category_list' ?>"
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