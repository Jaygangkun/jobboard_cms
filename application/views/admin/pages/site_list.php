<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Site List
    </h1>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
        <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-body">
                <table id="site_list" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Site Name</th>
                            <th>Employers</th>
                            <th>API Key</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>
                                <div class="site-name-wrap">
                                    <a href="https://www.healthcarejobnow.com/">Nursing Job Now</a>
                                </div>
                            </th>
                            <th>
                                <div class="site-employers-wrap">
                                    30
                                </div>
                            </th>
                            <th>
                                <div class="site-api-status text-green">
                                    <i class="fa fa-check"></i>
                                </div>
                            </th>
                            <th>
                                <div class="site-action">
                                    <a type="button" href="/admin/site_edit" class="btn btn-info">Edit</a>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <div class="site-name-wrap">
                                    <a href="https://www.44careers.com/">44 Careers</a>
                                </div>
                            </th>
                            <th>
                                <div class="site-employers-wrap">
                                    17
                                </div>
                            </th>
                            <th>
                                <div class="site-api-status text-green">
                                    <i class="fa fa-check"></i>
                                </div>
                            </th>
                            <th>
                                <div class="site-action">
                                    <a type="button" href="/admin/site_edit" class="btn btn-info">Edit</a>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <div class="site-name-wrap">
                                    <a href="https://www.drivefortitus.com/">Titus Transport</a>
                                </div>
                            </th>
                            <th>
                                <div class="site-employers-wrap">
                                    23
                                </div>
                            </th>
                            <th>
                                <div class="site-api-status text-red">
                                    <i class="fa fa-close"></i>
                                </div>
                            </th>
                            <th>
                                <div class="site-action">
                                    <a type="button" href="/admin/site_edit" class="btn btn-info">Edit</a>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <div class="site-name-wrap">
                                    <a href="https://www.drivefortitus.com/">The Driver Board</a>
                                </div>
                            </th>
                            <th>
                                <div class="site-employers-wrap">
                                    10
                                </div>
                            </th>
                            <th>
                                <div class="site-api-status text-green">
                                    <i class="fa fa-check"></i>
                                </div>
                            </th>
                            <th>
                                <div class="site-action">
                                    <a type="button" href="/admin/site_edit" class="btn btn-info">Edit</a>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </div>
                            </th>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Site URL</th>
                            <th>Employers</th>
                            <th>API Key</th>
                            <th>Action</th>
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
    $("#site_list").DataTable();
  });
</script>