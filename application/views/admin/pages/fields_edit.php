<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Employer Custom Fields
    </h1>
</section>
<!-- Main content -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">New Custom Field</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Field Label</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="" value="Phone">
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox">
                            Required?
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="row">
        <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-body">
                <h3 class="site-name">Nursing Jobs</h3>
                <img class="employer__img" src="https://www.healthcarejobnow.com/uploads/employer/logo/522185/onlineassignmentwriter-logo.png">
                <div class="employe-meta">
                    <div class="employer__name">Online assignment writer</div>
                    <div class="employer__email">iaustinrex@gmail.com</div>
                    <div class="employer__location">Woking, UK</div>
                </div>
                <div class="mt-20">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">New</button>
                </div>

                <div class="row mt-30">
                    <div class="col-lg-12">
                        <table id="import_employers" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Field Name</th>
                                    <th>Field Required</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>
                                        <div class="field-name-wrap">
                                            Phone
                                        </div>
                                    </th>
                                    <th>
                                        <div class="field-required-wrap">
                                            <span class="text-red">false</span>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="employer-action">
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Edit</button>
                                            <button type="button" class="btn btn-danger">Delete</button>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <div class="field-name-wrap">
                                            City
                                        </div>
                                    </th>
                                    <th>
                                        <div class="field-required-wrap">
                                            <span class="text-green">true</span>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="employer-action">
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Edit</button>
                                            <button type="button" class="btn btn-danger">Delete</button>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <div class="field-name-wrap">
                                            State
                                        </div>
                                    </th>
                                    <th>
                                        <div class="field-required-wrap">
                                            <span class="text-red">false</span>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="employer-action">
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Edit</button>
                                            <button type="button" class="btn btn-danger">Delete</button>
                                        </div>
                                    </th>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Field Name</th>
                                    <th>Field Required</th>
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