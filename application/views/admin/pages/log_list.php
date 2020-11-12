<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Log List
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
                            <label>Type</label>
                            <select class="form-control" id="log_type">
                                <option value=''> - Select - </option>
                                <option value='ts'> Teenstreet </option>
                            </select>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary" id="btn_logs_load">Load</button>
                        </div>
                    </div>
                </div>
                <div class="row mt-30">
                    <div class="col-lg-12">
                        <div class="table-wrap">
                            <table id="log_list" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>DriverName</th>
                                        <th>ApplicationId</th>
                                        <th>TenstreetLogId</th>
                                        <th>Status</th>
                                        <th>CompanyPostedToId</th>
                                        <th>DateTime</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>DriverName</th>
                                        <th>ApplicationId</th>
                                        <th>TenstreetLogId</th>
                                        <th>Status</th>
                                        <th>CompanyPostedToId</th>
                                        <th>DateTime</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
<!-- /.content -->
<script>
var log_list_table;
log_list_table = $("#log_list").DataTable({
    "columnDefs": [ 
        {
            "targets": 0,
            "data": 'DriverName'
        },
        {
            "targets": 1,
            "data": 'ApplicationId'
        },
        {
            "targets": 2,
            "data": 'TenstreetLogId'
        },
        {
            "targets": 3,
            "data": 'Status'
        },
        {
            "targets": 4,
            "data": 'CompanyPostedToId'
        },
        {
            "targets": 5,
            "data": 'DateTime'
        }
    ]
});
  
</script>