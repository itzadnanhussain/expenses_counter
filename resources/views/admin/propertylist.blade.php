@include('admin.header')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">property</h4>
                    <div class="row grid-margin">
                        <!-- <div class="col-12">
                            <button type="button" class="btn btn-primary btn-rounded btn-fw" style="float: right;">New
                                Record</button>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table listing">
                                    <thead>
                                        <tr class="bg-primary text-white">
                                            <th>S.NO</th>
                                            <th>Name</th>
                                            <th>Host Name</th>
                                            <th>Location</th>
                                            <th>Status</th>
                                            <th>Added Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($property_data) && !empty($property_data)) { ?>
                                        <?php foreach ($property_data as $key => $property) { ?>

                                        <tr>
                                            <td><?php echo $property->property_id ?>
                                            </td>
                                            <td><?php echo $property->pro_name ?>
                                            </td>
                                            <td><?php echo GetUserFullName($property->host_id) ?>
                                            </td>
                                            <td><?php echo $property->pro_location ?>
                                            </td>
                                            <td><?php echo $property->pro_status ?>
                                            </td>
                                            <td><?php echo $property->created_at ?>
                                            </td>


                                            <td>
                                                <a href="<?php echo SERVER_ROOT_PATH.'admin/property_profile/'.encryption($property->property_id) ?>"
                                                    class="btn btn-light ad-mr-5">
                                                    <i class="mdi mdi-eye text-primary"></i>
                                                </a>
                                                <a class="btn btn-light ad-mr-5"
                                                    onclick="delete_property('<?php echo $property->property_id ?>')">
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