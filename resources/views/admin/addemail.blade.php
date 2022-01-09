@include('admin.header')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Email Template Details</h4>
                    <!-- success message -->
                    <div class="alert alert-success" id="alert-success" style="display: none;" role="alert"></div>
                    <!-- warning message -->
                    <div class="alert alert-warning" id="alert-warning" style="display: none;" role="alert">

                    </div>

                    <form class="editor-form"
                        action="<?php echo SERVER_ROOT_PATH.'admin/add_email_temp_process' ?>"
                        enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Email Template Name</label>
                            <input type="text" name="etemp_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Subject Name</label>
                            <input type="text" name="etemp_subject" class="form-control">
                        </div>

                        <!-- Template add here -->
                        <div class="form-group">
                            <label for="">Message</label>
                            <textarea class="form-control summernote" rows="4"></textarea>


                        </div>

                        <input type="submit" class="btn btn-primary mr-2" value="Submit">
                        <a href="<?php echo SERVER_ROOT_PATH.'admin/email_temp_list' ?>"
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