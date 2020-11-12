<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Employers
    </h1>
</section>
<!-- Main content -->
<section class="content content--employers-management">
    <div class="row">
        <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Site</label>
                            <select class="form-control" id="site">
                                <option value=""> - Select - </option>
                                <?php
                                foreach($sites as $site){
                                    ?>
                                    <option value="<?php echo $site['id']?>" <?php echo isset($site_id) && $site_id == $site['id'] ? "selected" : ""?>><?php echo $site['name']?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary" id="btn_employers_load">Load</button>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="site_id">
                <div class="row mt-30">
                    <div class="col-lg-12">
                        <table id="load_employers" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Employers</th>
                                    <th>Teenstreet</th>
                                    <th>Company ID</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
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
                                        <div class="employer__status text-green">
                                            <i class="fa fa-check"></i>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="employer-ts-id-wrap">
                                        13500
                                        </div>
                                    </th>
                                    <th>
                                        <div class="employer-action">
                                            <a type="button" href="/admin/employer_edit" class="btn btn-info">Edit</a>
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
                                        <div class="employer__status text-red">
                                            <i class="fa fa-close"></i>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="employer-ts-id-wrap">
                                        13500
                                        </div>
                                    </th>
                                    <th>
                                        <div class="employer-action">
                                            <a type="button" href="/admin/employer_edit" class="btn btn-info">Edit</a>
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
                                        <div class="employer__status text-green">
                                            <i class="fa fa-check"></i>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="employer-ts-id-wrap">
                                        13500
                                        </div>
                                    </th>
                                    <th>
                                        <div class="employer-action">
                                            <a type="button" href="/admin/employer_edit" class="btn btn-info">Edit</a>
                                            <button type="button" class="btn btn-danger">Delete</button>
                                        </div>
                                    </th>
                                </tr> -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Employers</th>
                                    <th>Teenstreet</th>
                                    <th>Company ID</th>
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
<div class="table-cell-templates" style="display: none">
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
    <div id="tp_col_tsid">
        <div class="employer-ts-id-wrap">
            13500
        </div>
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
var load_employers_table;
load_employers_table = $("#load_employers").DataTable({
    // iDisplayLength: 25,
    "columnDefs": [ 
        {
            "targets": 0,
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
            "targets": 1,
            "data": 'ts_integrate',
            "render": function(data, type, row, meta){
                var tp_col_status_green = $('#tp_col_status_green').clone();
                var tp_col_status_red = $('#tp_col_status_red').clone();

                var tp_col_status = '';

                if(data == 'true'){
                    tp_col_status = tp_col_status_green;
                }
                else{
                    tp_col_status = tp_col_status_red;
                }            
                
                return $(tp_col_status).html()
            }
        },
        {
            "targets": 2,
            "data": 'ts_id',
            "render": function(data, type, row, meta){
                var tp_col_tsid = $('#tp_col_tsid').clone();
                $(tp_col_tsid).find('.employer-ts-id-wrap').text(data);
                return $(tp_col_tsid).html()
            }
        },
        {
            "targets": 3,
            "data": 'db_id',
            "render": function(data, type, row, meta){
                var btn_edit_html = '<a type="button" href="/admin/employer_edit/' + data + '" class="btn btn-info action-edit-btn">Edit</a>';
                var btn_delete_html = '<button type="button" class="btn btn-danger btn-employer-delete" id="' + data + '">Delete</button>';
                
                return btn_edit_html + btn_delete_html;
            }
        }
    ]
});
<?php
if(isset($employers)){
    ?>
    load_employers_table.clear().draw();
    $('body').addClass('loading');
                
    <?php
    foreach($employers as $employer){
        ?>
        load_employers_table.row.add({
            employer: {
                logo: "<?php echo $employer['logo'] ?>",
                name: "<?php echo $employer['name'] ?>",
                email: "<?php echo $employer['email'] ?>",
                location: "<?php echo $employer['location'] ?>"
            },
            ts_integrate: "<?php echo $employer['ts_integrate'] ?>",
            ts_id: "<?php echo $employer['ts_id'] ?>",
            db_id: "<?php echo $employer['id'] ?>"
        });
        <?php
    }
    ?>

    load_employers_table.draw(false);

    $('body').removeClass('loading');
    <?php
}
?>
</script>