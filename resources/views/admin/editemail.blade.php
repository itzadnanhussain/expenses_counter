@include('admin.header')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Email Template Details</h4>
                    <!-- success message -->
                    <div class="alert alert-success" id="alert-success" style="display: none;" role="alert"></div>
                    <!-- warning message -->
                    <div class="alert alert-warning" id="alert-warning" style="display: none;" role="alert">

                    </div>

                    <form class="editor-form"
                        action="<?php echo SERVER_ROOT_PATH.'admin/update_email_temp_process' ?>">

                        <input type="hidden" name="etemp_id"
                            value="<?php echo $email_temp_data[0]->etemp_id ?>">

                        <div class="form-group">
                            <label>Email Template Name</label>
                            <input type="text" name="etemp_name" class="form-control"
                                value="<?php echo $email_temp_data[0]->etemp_name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Subject Name</label>
                            <input type="text" name="etemp_subject" class="form-control"
                                value="<?php echo $email_temp_data[0]->etemp_subject; ?>">
                        </div>

                        <!-- Template add here -->
                        <div class="form-group">
                            <label for="">Message</label>
                            <textarea class="form-control summernote"
                                rows="4"><?php echo $email_temp_data[0]->etemp_data ?></textarea>


                        </div>

                        <input type="submit" class="btn btn-primary mr-2" value="Update">
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