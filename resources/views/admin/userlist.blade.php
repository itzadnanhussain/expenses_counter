@include('admin.header')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">users</h4>
                    <div class="row grid-margin">
                        <div class="col-12">
                            <a type="button"
                                href="<?php echo SERVER_ROOT_PATH.'admin/add_user'; ?>"
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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Type</th>
                                            <th>Verified</th>
                                            <th>Join Us</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($users_list) && !empty($users_list)) { ?>
                                        <?php foreach ($users_list as $key => $user) { ?>

                                        <tr>
                                            <td><?php echo GetUserFullName($user->user_id) ?>
                                            </td>
                                            <td><?php echo $user->email ?>
                                            </td>
                                            <td><?php echo $user->user_type ?>
                                            </td>
                                            <td><?php echo $user->user_verified ?>
                                            </td>
                                            <td><?php echo $user->created_at ?>
                                            </td>

                                            <td>
                                                <a href="<?php echo SERVER_ROOT_PATH.'admin/user_profile/'.encryption($user->user_id) ?>"
                                                    class="btn btn-light ad-mr-5">
                                                    <i class="mdi mdi-eye text-primary"></i>
                                                </a>
                                                <!-- <a href="<?php echo SERVER_ROOT_PATH.'admin/edit_user/'.encryption($user->user_id) ?>"
                                                class="btn btn-light ad-mr-5">
                                                <i class="mdi mdi-pencil text-primary"></i>
                                                </a> -->
                                                <a class="btn btn-light ad-mr-5"
                                                    onclick="delete_user('<?php echo $user->user_id ?>')">
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