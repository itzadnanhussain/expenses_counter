@include('admin.header')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Expenses List</h4>
                    <div class="row grid-margin">
                        <div class="col-12">
                            <a type="button"
                                href="<?php echo SERVER_ROOT_PATH.'admin/add_expense'; ?>"
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
                                            <th>Date</th>
                                            <th>Expenses Name</th>
                                            <th>Description</th>
                                            <th>Amount</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($expense_list) && !empty($expense_list)) { ?>
                                        <?php foreach ($expense_list as $key => $expense) { ?>

                                        <tr>
                                            <td><?php echo $expense->date ?>
                                            </td>
                                            <td><?php echo GetExpenseName($expense->exp_type_id) ?>
                                            </td>
                                            <td><?php echo $expense->description ?>
                                            </td>
                                            <td><?php echo $expense->amount ?>
                                            </td>

                                            <td>
                                                <a href="<?php echo SERVER_ROOT_PATH.'admin/edit_expense/'.$expense->exp_id ?>"
                                                    class="btn btn-light ad-mr-5">
                                                    <i class="mdi mdi-eye text-primary"></i>
                                                </a>
                                                <a href="<?php echo SERVER_ROOT_PATH.'admin/edit_expense/'.$expense->exp_id ?>"
                                                    class="btn btn-light ad-mr-5">
                                                    <i class="mdi mdi-pencil text-primary"></i>
                                                </a>
                                                <a class="btn btn-light ad-mr-5"
                                                    onclick="delete_expense('<?php echo $expense->exp_id ?>')">
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