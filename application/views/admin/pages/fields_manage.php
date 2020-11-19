<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Custom Fields
    </h1>
</section>
<!-- Main content -->
<section class="content content--fields-management">
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
                <div class="row mt-30">
                    <div class="col-lg-12">
                        <table id="load_employers" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Employers</th>
                                    <th>Field Names</th>
                                    <th>Zapier Webhook</th>
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
                                </tr> -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Employers</th>
                                    <th>Field Names</th>
                                    <th>Zapier Webhook</th>
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
    <div id="tp_col_fields">
        <div class="employer-custom-fields">
            <div class="employer-custom-field-row">Phone (required)</div>
            <div class="employer-custom-field-row">City (required)</div>
            <div class="employer-custom-field-row">State</div>
            <div class="employer-custom-field-row">Zip</div>
        </div>
    </div>
    <div id="tp_col_zapier_webhook_url">
        <div class="zapier-webhook-url-wrap">
        https://hooks.zapier.com/hooks/catch/2403839/olssiz2/
        </div>
        <div class="zapier-data-name-list">
            <div class="zapier-data-name-row">
                <span class="jb-field-name">Test1</span> - 
                <span class="jb-field-name">Zapier Test1</span>
            </div>
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
            "data": 'fields',
            "render": function(data, type, row, meta){
                if(data.length == 0){
                    return "No Fields";
                }

                var fields_html = '';
                for(var index = 0; index < data.length; index++){
                    var required = data[index]['required'];
                    if(required == 'true'){
                        required = '<span class="text-red">(Required)</span>';
                    }
                    else{
                        required = '<span class="text-green">(Optional)</span>';
                    }
                    fields_html += '<div class="employer-custom-field-row">' + data[index]['name'] + required + '</div>';
                }
                
                var tp_col_fields = $('#tp_col_fields').clone();
                $(tp_col_fields).find('.employer-custom-fields').html(fields_html);
                return $(tp_col_fields).html()
            }
        },
        {
            "targets": 2,
            "data": 'zapier_webhook_url',
            "render": function(data, type, row, meta){
                var tp_col_zapier = $('#tp_col_zapier_webhook_url').clone();
                if(data == null){
                    data = '';
                }
                $(tp_col_zapier).find('.zapier-webhook-url-wrap').text(data);

                console.log('row:', row);
                var fields = row['fields'];
                var zapier_data_name_list_html = '';
                for(var index = 0; index < fields.length; index++){
                    var field_name = fields[index]['name'];
                    var zapier_data_name = fields[index]['zapier_data_name'];
                    if(zapier_data_name == '' || zapier_data_name == null){
                        zapier_data_name = field_name;
                        continue;
                    }
                    zapier_data_name_list_html += '<div class="zapier-data-name-row"><span class="jb-field-name">' + field_name + '</span> - <span class="jb-field-name">' + zapier_data_name + '</span></div>';
                }

                $(tp_col_zapier).find('.zapier-data-name-list').html(zapier_data_name_list_html);
                return $(tp_col_zapier).html()
            }
        },  
        {
            "targets": 3,
            "data": 'db_id',
            "render": function(data, type, row, meta){
                var btn_edit_html = '<a type="button" href="/admin/fields_edit/' + data + '" class="btn btn-info action-edit-btn">Edit</a>';
                var btn_delete_html = '<button type="button" class="btn btn-danger btn-fields-delete" id="' + data + '">Delete</button>';
                btn_delete_html = '';
                var btn_zapier_test_html = '<button type="button" class="btn btn-success btn-zapier-test" id="' + data + '">Zapier Test</button>';

                if(row['zapier_webhook_url'] == null || row['zapier_webhook_url'] == ''){
                    btn_zapier_test_html = '';
                }
                
                return btn_edit_html + btn_delete_html + btn_zapier_test_html;
            }
        }
    ]
});
</script>