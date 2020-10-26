<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Import Employers From Jobboard
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary">Import</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
            <div class="row mt-30">
                <div class="col-lg-12">
                    <table id="import_employers" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Employers</th>
                                <th>Registered</th>
                                <th>Jobs</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    <div class="employer-check-wrap">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <div class="employer-wrap">
                                        <img class="employer__img" src="https://www.healthcarejobnow.com/uploads/employer/logo/522185/onlineassignmentwriter-logo.png">
                                        <div class="employe-meta">
                                            <div class="employer__name">Online assignment writer</div>
                                            <div class="employer__email">iaustinrex@gmail.com</div>
                                            <div class="employer__location">Woking, UK</div>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <div class="employer__date">05/03/2020</div>
                                </th>
                                <th>
                                    <div class="employer__jobs">3</div>
                                </th>
                                <th>
                                    <div class="employer__status text-green">
                                        <i class="fa fa-check"></i>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="employer-check-wrap">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <div class="employer-wrap">
                                        <img class="employer__img" src="https://www.healthcarejobnow.com/uploads/employer/logo/460617/logo_co.uk-icon.png">
                                        <div class="employe-meta">
                                            <div class="employer__name">My Assignment Help</div>
                                            <div class="employer__email">adam.hebrew1993@gmail.com</div>
                                            <div class="employer__location">United Kingdom</div>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <div class="employer__date">05/03/2020</div>
                                </th>
                                <th>
                                    <div class="employer__jobs">4</div>
                                </th>
                                <th>
                                    <div class="employer__status text-red">
                                        <i class="fa fa-close"></i>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="employer-check-wrap">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <div class="employer-wrap">
                                        <img class="employer__img" src="https://www.healthcarejobnow.com/uploads/employer/logo/419938/0.png">
                                        <div class="employe-meta">
                                            <div class="employer__name">Folio3 - E commerce Development</div>
                                            <div class="employer__email">travoltajohn633@gmail.com</div>
                                            <div class="employer__location">Woking, UK</div>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <div class="employer__date">05/03/2020</div>
                                </th>
                                <th>
                                    <div class="employer__jobs">0</div>
                                </th>
                                <th>
                                    <div class="employer__status text-red">
                                        <i class="fa fa-close"></i>
                                    </div>
                                </th>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>Employers</th>
                                <th>Registered</th>
                                <th>Jobs</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
<script>
  $(function () {
    $("#import_employers").DataTable();
  });
</script>