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
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Site</label>
                        <select class="form-control" id="site">
                            <option value=''> - Select - </option>
                            <?php
                            foreach($sites as $site){
                                ?>
                                <option value="<?php echo $site['id']?>"><?php echo $site['name']?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary" id="btn_employers_import">Import</button>
                        <button type="button" class="btn btn-success" id="btn_employers_save">Save</button>
                    </div>
                </div>
            </div>
            <div class="row mt-30">
                <div class="col-lg-12">
                    <div class="table-wrap">
                        <table id="import_employers" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Employer</th>
                                    <th>Registered</th>
                                    <th>Jobs</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
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
                                </tr> -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Employer</th>
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
    </div>
</section>
<!-- /.content -->
<div class="table-cell-templates" style="display: none">
    <div id="tp_col_check">
        <div class="employer-check-wrap">
            <div class="checkbox">
                <label>
                    <input type="checkbox">
                </label>
            </div>
        </div>
    </div>
    <div id="tp_col_employer">
        <div class="employer-wrap">
            <img class="employer__img" src="https://www.healthcarejobnow.com/uploads/employer/logo/522185/onlineassignmentwriter-logo.png">
            <div class="employe-meta">
                <div class="employer__name">Online assignment writer</div>
                <div class="employer__email">iaustinrex@gmail.com</div>
                <div class="employer__location">Woking, UK</div>
            </div>
        </div>
    </div>
    <div id="tp_col_date">
        <div class="employer__date">05/03/2020</div>
    </div>
    <div id="tp_col_jobs">
        <div class="employer__jobs">3</div>
    </div>
    <div id="tp_col_status_green">
        <div class="employer__status text-green">
            <i class="fa fa-check"></i>
        </div>
    </div>
    <div id="tp_col_status_red">
        <div class="employer__status text-red">
            <i class="fa fa-close"></i>
        </div>
    </div>
</div>
<script>
var import_employers_table;
import_employers_table = $("#import_employers").DataTable({
    // iDisplayLength: 25,
    "columnDefs": [ 
        {
            "targets": 0,
            "data": 'checked',
            "render": function(data, type, row, meta){
                var tp_col_checkbox = $('#tp_col_check').clone();
                if(data){
                    $(tp_col_checkbox).find('[type="checkbox"]').attr('checked', 'checked');
                }
                $(tp_col_checkbox).find('[type="checkbox"]').attr('row', meta.row);
                return $(tp_col_checkbox).html();
            }
        },
        {
            "targets": 1,
            "data": 'employer',
            "render": function(data, type, row, meta){
                var tp_col_employer = $('#tp_col_employer').clone();
                $(tp_col_employer).find('.employer__img').attr('src', data['logo']);
                $(tp_col_employer).find('.employer__name').text(data['name']);
                $(tp_col_employer).find('.employer__email').text(data['email']);
                $(tp_col_employer).find('.employer__location').text(data['location']);
                return $(tp_col_employer).html()
            }
        },
        {
            "targets": 2,
            "data": 'register_date',
            "render": function(data, type, row, meta){
                var tp_col_date = $('#tp_col_date').clone();
                var date = new Date(Date.parse(data));
                $(tp_col_date).find('.employer__date').text(((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + '/' + ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())) + '/' + date.getFullYear());
                return $(tp_col_date).html()
            }
        },
        {
            "targets": 3,
            "data": 'jobs',
            "render": function(data, type, row, meta){
                var tp_col_jobs = $('#tp_col_jobs').clone();
                $(tp_col_jobs).find('.employer__jobs').text(data);
                return $(tp_col_jobs).html()
            }
        },
        {
            "targets": 4,
            "data": 'status',
            "render": function(data, type, row, meta){
                var tp_col_status_green = $('#tp_col_status_green').clone();
                var tp_col_status_red = $('#tp_col_status_red').clone();

                var tp_col_status = '';

                if(data){
                    tp_col_status = tp_col_status_green;
                }
                else{
                    tp_col_status = tp_col_status_red;
                }            
                
                return $(tp_col_status).html()
            }
        }
    ]
});
</script>