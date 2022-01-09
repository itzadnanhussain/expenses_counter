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
                        action="<?php echo SERVER_ROOT_PATH.'admin/add_expense_process' ?>"
                        enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="exampleSelectGender">Select Expense Type</label>
                            <select class="form-control" name="exp_type_id" id="exampleSelectGender">
                                <?php echo GetExpensesList(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Add Date</label>
                            <input type="text" id="datepicker" name="date" class="form-control"
                                placeholder="Select Date">

                        </div>
                        <div class="form-group">
                            <label for="">Add Amount</label>
                            <input type="number" name="amount" min=0 class="form-control" placeholder="0">

                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Description</label>
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