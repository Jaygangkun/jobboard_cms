<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Employer Custom Fields
    </h1>
</section>
<!-- Main content -->
<!-- Modal -->
<input type="hidden" id="employer_id" value="<?php echo $employer_id?>">
<div class="modal fade" id="fields_dlg" tabindex="-1" role="dialog" aria-labelledby="fields_dlg" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="fields_dlg_title">New Custom Field</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="field_label">Jobboard Field Label</label>
                    <input type="email" class="form-control" id="field_name" placeholder="" value="">
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="field_required">
                            Required?
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field_label">Zapier Data Name</label>
                    <input type="email" class="form-control" id="zapier_data_name" placeholder="" value="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_field_add">Add</button>
                <button type="button" class="btn btn-primary" id="btn_field_update" db-id="">Update</button>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <?php
    if(isset($employer)){
        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <img class="employer__img" src="<?php echo $employer['logo']?>">
                        <div class="employe-meta">
                            <div class="employer__name"><?php echo $employer['name']?></div>
                            <div class="employer__email"><?php echo $employer['email']?></div>
                            <div class="employer__location"><?php echo $employer['location']?></div>
                        </div>
                        <div class="mt-20">
                            <button type="button" class="btn btn-primary" id="btn_fields_new">New</button>
                        </div>

                        <div class="row mt-30">
                            <div class="col-lg-12">
                                <table id="load_fields" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Field Name</th>
                                            <th>Field Required</th>
                                            <th>Zapier Data Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <tr>
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
                                        </tr> -->
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Field Name</th>
                                            <th>Field Required</th>
                                            <th>Zapier Data Name</th>
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
        <?php
    }
    else{
        ?>
        No Available Employer
        <?php
    }
    ?>
    
</section>
<!-- /.content -->
<div class="table-cell-templates" style="display: none">
    <div id="tp_col_name">
        <div class="field-name-wrap">
            Phone
        </div>
    </div>
    <div id="tp_col_zapier_data_name">
        <div class="zapier-data-name-wrap">
            Test1
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
var load_fields_table;
load_fields_table = $("#load_fields").DataTable({
    // iDisplayLength: 25,
    "columnDefs": [ 
        {
            "targets": 0,
            "data": 'name',
            "render": function(data, type, row, meta){
                var tp_col_name = $('#tp_col_name').clone();
                $(tp_col_name).find('.field-name-wrap').text(data);
                return $(tp_col_name).html()
            }
        },
        {
            "targets": 1,
            "data": 'required',
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
            "data": 'zapier_data_name',
            "render": function(data, type, row, meta){
                var tp_col_zapier_data_name = $('#tp_col_zapier_data_name').clone();
                if(data == null){
                    data = '';
                }

                $(tp_col_zapier_data_name).find('.zapier-data-name-wrap').text(data);
                return $(tp_col_zapier_data_name).html()
            }
        },
        {
            "targets": 3,
            "data": 'db_id',
            "render": function(data, type, row, meta){
                var btn_edit_html = '<button type="button" class="btn btn-info action-edit-btn btn-field-edit" id="' + data + '" row="' + meta.row + '">Edit</button>';
                var btn_delete_html = '<button type="button" class="btn btn-danger btn-field-delete" id="' + data + '" row="'+ meta.row + '">Delete</button>';
                
                return btn_edit_html + btn_delete_html;
            }
        }
    ]
});
<?php
if(isset($fields)){
    ?>
    load_fields_table.clear().draw();
    $('body').addClass('loading');
                
    <?php
    foreach($fields as $field){
        ?>
        load_fields_table.row.add({
            name: "<?php echo $field['name'] ?>",
            required: "<?php echo $field['required'] ?>",
            zapier_data_name: "<?php echo $field['zapier_data_name'] ?>",
            db_id: "<?php echo $field['id'] ?>"
        });
        <?php
    }
    ?>

    load_fields_table.draw(false);

    $('body').removeClass('loading');
    <?php
}
?>
</script>