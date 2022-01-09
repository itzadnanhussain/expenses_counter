@include('admin.header')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">email</h4>
                    <div class="row grid-margin">
                        <div class="col-12">
                            <a type="button"
                                href="<?php echo SERVER_ROOT_PATH.'admin/add_email_temp' ?>"
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
                                            <th>Temp_id #</th>
                                            <th>Temp Name</th>
                                            <th>Temp Subject</th>
                                            <th>Updated_at</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($email_templates) && !empty($email_templates)) { ?>
                                        <?php foreach ($email_templates as $key => $template) { ?>

                                        <tr>
                                            <td><?php echo $template->etemp_id ?>
                                            </td>
                                            <td><?php echo $template->etemp_name ?>
                                            </td>
                                            <td><?php echo $template->etemp_subject ?>
                                            </td>
                                            <td><?php echo $template->updated_at ?>
                                            </td>

                                            <td>
                                                <a href="<?php echo SERVER_ROOT_PATH.'admin/edit_email_temp/'.$template->etemp_id ?>"
                                                    class="btn btn-light ad-mr-5">
                                                    <i class="mdi mdi-eye text-primary"></i>
                                                </a>
                                                <a href="<?php echo SERVER_ROOT_PATH.'admin/edit_email_temp/'.$template->etemp_id ?>"
                                                    class="btn btn-light ad-mr-5">
                                                    <i class="mdi mdi-pencil text-primary"></i>
                                                </a>
                                                <a class="btn btn-light ad-mr-5"
                                                    onclick="delete_email_temp('<?php echo $template->etemp_id ?>')">
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