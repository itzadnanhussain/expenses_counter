@include('admin.header')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">category</h4>
                    <div class="row grid-margin">
                        <div class="col-12">
                            <a type="button"
                                href="<?php echo SERVER_ROOT_PATH.'admin/add_category'; ?>"
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
                                            <th>Category_id #</th>
                                            <th>Category Name</th>
                                            <th>Created_At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($category_list) && !empty($category_list)) { ?>
                                        <?php foreach ($category_list as $key => $category) { ?>

                                        <tr>
                                            <td><?php echo $category->cat_id ?>
                                            </td>
                                            <td><?php echo $category->cat_name ?>
                                            </td>
                                            <td><?php echo $category->created_at ?>
                                            </td>

                                            <td>
                                                <a href="<?php echo $category->cat_id ?>"
                                                    class="btn btn-light ad-mr-5">
                                                    <i class="mdi mdi-eye text-primary"></i>
                                                </a>
                                                <a href="<?php echo SERVER_ROOT_PATH.'admin/edit_category/'.$category->cat_id ?>"
                                                    class="btn btn-light ad-mr-5">
                                                    <i class="mdi mdi-pencil text-primary"></i>
                                                </a>
                                                <a class="btn btn-light ad-mr-5"
                                                    onclick="delete_category('<?php echo $category->cat_id ?>')">
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