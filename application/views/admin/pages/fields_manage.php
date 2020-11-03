<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Custom Fields
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Site</label>
                            <select class="form-control">
                                <option> - Select - </option>
                                <option>Nursing Job Now</option>
                                <option>44 Careers</option>
                                <option>Titus Transport</option>
                                <option>The Driver Board</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-30">
                    <div class="col-lg-12">
                        <table id="import_employers" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Employers</th>
                                    <th>Field Names</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
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
                                        <div class="employer-custom-fields">
                                            <div class="employer-custom-field-row">Phone (required)</div>
                                            <div class="employer-custom-field-row">City (required)</div>
                                            <div class="employer-custom-field-row">State</div>
                                            <div class="employer-custom-field-row">Zip</div>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="employer-action">
                                            <a type="button" href="/admin/fields_edit" class="btn btn-info">Edit</a>
                                            <button type="button" class="btn btn-danger">Delete</button>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
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
                                        <div class="employer-custom-fields">
                                            <div class="employer-custom-field-row">Phone (required)</div>
                                            <div class="employer-custom-field-row">City</div>
                                            <div class="employer-custom-field-row">State</div>
                                            <div class="employer-custom-field-row">Zip</div>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="employer-action">
                                            <a type="button" href="/admin/fields_edit" class="btn btn-info">Edit</a>
                                            <button type="button" class="btn btn-danger">Delete</button>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
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
                                        <div class="employer-custom-fields">
                                            <div class="employer-custom-field-row">Phone</div>
                                            <div class="employer-custom-field-row">City (required)</div>
                                            <div class="employer-custom-field-row">State</div>
                                            <div class="employer-custom-field-row">Zip</div>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="employer-action">
                                            <a type="button" href="/admin/fields_edit" class="btn btn-info">Edit</a>
                                            <button type="button" class="btn btn-danger">Delete</button>
                                        </div>
                                    </th>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Employers</th>
                                    <th>Field Names</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
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