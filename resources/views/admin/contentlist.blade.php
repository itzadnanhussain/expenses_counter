@include('admin.header')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">content</h4>
                    <div class="row grid-margin">
                        <div class="col-12">
                            <a type="button"
                                href="<?php echo SERVER_ROOT_PATH.'admin/add_content'; ?>"
                                class="btn btn-primary btn-rounded btn-fw" style="float: right;">New
                                Record</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table listing">
                                    <thead>
                                        <tr class="bg-primary text-white">
                                            <th>Cms_id #</th>
                                            <th>Page Name</th>
                                            <th>Content</th>
                                            <th>Created_at</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($cms_list) && !empty($cms_list)) { ?>
                                        <?php foreach ($cms_list as $key => $cms) { ?>

                                        <tr>
                                            <td><?php echo $cms->cms_id ?>
                                            </td>
                                            <td><?php echo $cms->page_name ?>
                                            </td>
                                            <td><?php echo $cms->content ?>
                                            </td>
                                            <td><?php echo $cms->updated_at ?>
                                            </td>

                                            <td>
                                                <a href="<?php echo SERVER_ROOT_PATH.'admin/edit_content/'.$cms->cms_id ?>"
                                                    class="btn btn-light ad-mr-5">
                                                    <i class="mdi mdi-eye text-primary"></i>
                                                </a>
                                                <a href="<?php echo SERVER_ROOT_PATH.'admin/edit_content/'.$cms->cms_id ?>"
                                                    class="btn btn-light ad-mr-5">
                                                    <i class="mdi mdi-pencil text-primary"></i>
                                                </a>
                                                <a class="btn btn-light ad-mr-5"
                                                    onclick="delete_cms('<?php echo $cms->cms_id ?>')">
                                                    <i class="mdi mdi-delete-forever text-danger"></i>
                                                </a>
                                                <!-- <a class="btn btn-light ad-mr-5" id="show">
                                                    <i class="mdi mdi-delete-forever text-danger"></i>
                                                </a> -->
                                            </td>
                                        </tr>
                                        <?php } } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')