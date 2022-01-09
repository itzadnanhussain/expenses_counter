@include('admin.header')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Page Content</h4>
                    <!-- success message -->
                    <div class="alert alert-success" id="alert-success" style="display: none;" role="alert"></div>
                    <!-- warning message -->
                    <div class="alert alert-warning" id="alert-warning" style="display: none;" role="alert">

                    </div>

                    <form class="editor-form"
                        action="<?php echo SERVER_ROOT_PATH.'admin/update_content_process' ?>"
                        enctype="multipart/form-data">
                        <input type="hidden" name="cms_id"
                            value="<?php echo $cms[0]->cms_id; ?>">
                        <div class="form-group">
                            <label for="exampleSelectGender">Select Page</label>
                            <select class="form-control" name="page_name" id="exampleSelectGender">
                                <option value="about us" <?php echo ($cms[0]->page_name == 'about us') ? 'selected' : '' ?>>About
                                    Us</option>
                                <option value="how it works" <?php echo ($cms[0]->page_name == 'how it works') ? 'selected' : '' ?>>How
                                    It Works</option>
                                <option value="faqs" <?php echo ($cms[0]->page_name == 'faq') ? 'selected' : '' ?>
                                    >FAQs</option>
                                <option value="terms and conditions" <?php echo ($cms[0]->page_name == 'terms and conditions') ? 'selected' : '' ?>>Terms
                                    and Conditions</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleTextarea1">Textarea</label>
                            <textarea class="form-control summernote"
                                rows="4"><?php echo $cms[0]->content ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Banners</label>
                            <input type="file" name="filenames[]" class="file-upload-default" multiple>
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php if (isset($cms_banners) && !empty($cms_banners)) { ?>
                            <?php foreach ($cms_banners as $key => $value) { ?>
                            <div class="img-wrap">
                                <span class="close">&times;</span>
                                <img src="<?php echo SERVER_ROOT_PATH.$value->banner ?>"
                                    alt="" width="100"
                                    data-id="<?php echo $value->banner_id ?>">
                            </div>

                            <?php } ?>
                            <?php } ?>

                        </div>

                        <input type="submit" class="btn btn-primary mr-2" value="Submit">
                        <button class="btn btn-light">Cancel</button>
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