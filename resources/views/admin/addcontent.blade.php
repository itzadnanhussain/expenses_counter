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

                    <form class="editor-form" action="<?php echo SERVER_ROOT_PATH.'admin/add_content_process' ?>" enctype="multipart/form-data">
 
                        <div class="form-group">
                            <label for="exampleSelectGender">Select Page</label>
                            <select class="form-control" name="page_name" id="exampleSelectGender">
                                <option value="about us">About Us</option>
                                <option value="how it works">How It Works</option>
                                <option value="faqs">FAQs</option>
                                <option value="terms and conditions">Terms and Conditions</option>
                            </select>
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
                            <label for="exampleTextarea1">Textarea</label>
                            <textarea class="form-control summernote" rows="4"></textarea>
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
<script>

</script>