@include('admin.header')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Review Details</h4>
                    <!-- success message -->
                    <div class="alert alert-success" id="alert-success" style="display: none;" role="alert"></div>
                    <!-- warning message -->
                    <div class="alert alert-warning" id="alert-warning" style="display: none;" role="alert">

                    </div>

                    <form class="simple-form"
                        action="<?php echo SERVER_ROOT_PATH.'admin/update_review_process' ?>">

                        <div class="form-group">
                            <input type="hidden" name="review_id"
                                value="<?php echo $review[0]->review_id ?>">
                        </div>
                        <div class="form-group">
                            <textarea name="review_description" class="form-control" id="" cols="30" rows="10"><?php echo $review[0]->review_description ?>
                            </textarea>

                        </div>
                        <input type="submit" class="btn btn-primary mr-2" value="Update">
                        <a href="<?php echo SERVER_ROOT_PATH.'admin/review_list' ?>"
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