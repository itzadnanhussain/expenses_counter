@include('admin.header')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">payment</h4>
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
                                            <th>payment #</th>
                                            <th>Customer</th>
                                            <th>Ship to</th>
                                            <th>Base Price</th>
                                            <th>Purchased Price</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>WD-61</td>
                                            <td>Edinburgh</td>
                                            <td>New York</td>
                                            <td>$1500</td>
                                            <td>$3200</td>
                                            <td>
                                                <label class="badge badge-info">On hold</label>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-light">
                                                    <i class="mdi mdi-eye text-primary"></i>View
                                                </button>
                                                <button class="btn btn-light">
                                                    <i class="mdi mdi-close text-danger"></i>Remove
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>WD-61</td>
                                            <td>Edinburgh</td>
                                            <td>New York</td>
                                            <td>$1500</td>
                                            <td>$3200</td>
                                            <td>
                                                <label class="badge badge-info">On hold</label>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-light">
                                                    <i class="mdi mdi-eye text-primary"></i>View
                                                </button>
                                                <button class="btn btn-light">
                                                    <i class="mdi mdi-close text-danger"></i>Remove
                                                </button>
                                            </td>
                                        </tr>

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