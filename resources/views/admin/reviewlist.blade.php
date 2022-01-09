@include('admin.header')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">review</h4>
                    <div class="row grid-margin">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary btn-rounded btn-fw" style="float: right;">New
                                Record</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table listing">
                                    <thead>
                                        <tr class="bg-primary text-white">
                                            <th>review_id #</th>
                                            <th>Review User Id</th>
                                            <th>Description</th>
                                            <th>Posted Date</th>

                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($reviews_list) && !empty($reviews_list)) { ?>
                                        <?php foreach ($reviews_list as $key => $review) { ?>

                                        <tr>
                                            <td><?php echo $review->review_id ?>
                                            </td>
                                            <td><?php echo $review->review_user_id ?>
                                            </td>
                                            <td><?php echo ReadMore($review->review_description) ?>
                                            </td>
                                            <td><?php echo $review->created_at ?>
                                            </td>

                                            <td>
                                                <a onclick="show_review_detail('<?php echo $review->review_id ?>')"
                                                    class="btn btn-light ad-mr-5">
                                                    <i class="mdi mdi-eye text-primary"></i>
                                                </a>
                                                <a href="<?php echo SERVER_ROOT_PATH.'admin/edit_review/'.$review->review_id ?>"
                                                    class="btn btn-light ad-mr-5">
                                                    <i class="mdi mdi-pencil text-primary"></i>
                                                </a>
                                                <a class="btn btn-light ad-mr-5"
                                                    onclick="delete_review('<?php echo $review->review_id ?>')">
                                                    <i class="mdi mdi-delete-forever text-danger"></i>
                                                </a>
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