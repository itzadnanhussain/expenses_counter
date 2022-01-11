@include('admin.header')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-6 col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Todays Income</h4>
                    <div class="d-flex justify-content-between">
                        <p class="text-muted">Amount</p>
                        <p class="text-muted">RS: 15000</p>
                    </div>
                    <div class="progress progress-md">
                        <div class="progress-bar bg-info w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Total Expenses</h4>
                    <div class="d-flex justify-content-between">
                        <p class="text-muted">Amount</p>
                        <p class="text-muted">RS: <?php echo GetSumOfTable('expenses', 'amount') ?>
                        </p>
                    </div>
                    <div class="progress progress-md">
                        <div class="progress-bar bg-success w-25" role="progressbar" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Remaining Amount</h4>
                    <div class="d-flex justify-content-between">
                        <p class="text-muted">Amount</p>
                        <p class="text-muted">RS:  120
                        </p>
                    </div>
                    <div class="progress progress-md">
                        <div class="progress-bar bg-danger w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@include('admin.footer')