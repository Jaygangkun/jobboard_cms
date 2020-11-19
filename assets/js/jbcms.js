(function($){
    // for sites pages
    $(document).on('click', '#btn_site_add', function(){
        if($('#site_name').val() == ''){
            alert('Input Site Name');
            $('#site_name').focus();
            return;
        }

        if($('#site_url').val() == ''){
            alert('Input Site URL');
            $('#site_url').focus();
            return;
        }

        if($('#jobboard_url').val() == ''){
            alert('Input Jobboard URL');
            $('#jobboard_url').focus();
            return;
        }

        if($('#site_api_key').val() == ''){
            alert('Input Site API Key');
            $('#site_api_key').focus();
            return;
        }

        $.ajax({
            url: '/admin_api/site_new',
            type: 'POST',
            data: {
                name: $("#site_name").val(),
                url: $("#site_url").val(),
                jobboard_url: $("#jobboard_url").val(),
                api_key: $("#site_api_key").val()
            },
            success: function(response){
                alert('Successfully Added!');
                location.href="/admin/site_list";
            }
        })
    })

    $(document).on('click', '#btn_site_update', function(){
        if($('#site_name').val() == ''){
            alert('Input Site Name');
            $('#site_name').focus();
            return;
        }

        if($('#site_url').val() == ''){
            alert('Input Site URL');
            $('#site_url').focus();
            return;
        }

        if($('#jobboard_url').val() == ''){
            alert('Input Jobboard URL');
            $('#jobboard_url').focus();
            return;
        }

        if($('#site_api_key').val() == ''){
            alert('Input Site API Key');
            $('#site_api_key').focus();
            return;
        }

        $.ajax({
            url: '/admin_api/site_update',
            type: 'POST',
            data: {
                id: $('#site_id').val(),
                name: $("#site_name").val(),
                url: $("#site_url").val(),
                jobboard_url: $("#jobboard_url").val(),
                api_key: $("#site_api_key").val()
            },
            success: function(response){
                alert('Successfully Updated!');
                location.href="/admin/site_list";
            }
        })
    })

    $(document).on('click', '.btn-site-delete', function(){
        if(confirm('Are you sure to delete')){
            $.ajax({
                url: '/admin_api/site_delete',
                type: 'POST',
                data: {
                    id: $(this).attr('site-id'),
                },
                success: function(response){
                    alert('Successfully Deleted!');
                    location.href="/admin/site_list";
                }
            })
        }
    })

    $(document).on('click', '.btn-site-view-code', function(){
        $.ajax({
            url: '/admin_api/jb_integrate_code',
            type: 'POST',
            data: {
                site_id: $(this).attr('site-id'),
            },
            success: function(response){
                $('#site_code').html(response);
                $('#site_code_dlg').modal('toggle');
            }
        })
    })

    // for employers pages
    $(document).on('click', '#btn_employers_import', function(){
        if($('#site').val() == ''){
            alert('Please Select Site');
            $('#site').focus();
            return;
        }

        import_employers_table.clear().draw();
        $('body').addClass('loading');

        $.ajax({
            url: '/admin_api/employers_import',
            // url: '/employers.json', 
            type: 'POST',
            data: {
                site_id: $('#site').val(),
            },
            success: function(response){
                if(response == ''){
                    alert('Import Failed! Please check api key and jobboard url');
                    $('body').removeClass('loading');
                    return;
                }
                var employers = JSON.parse(response);
                // var employers = response;
                employers = employers['employers'];
                
                for(var index = 0; index < employers.length; index++){         
                    import_employers_table.row.add({
                        // data for table
                        checked: true,
                        employer: {
                            logo: employers[index]['logo'],
                            name: employers[index]['name'],
                            email: employers[index]['email'],
                            location: employers[index]['location']
                        },
                        register_date: employers[index]['created_at'],
                        jobs: employers[index]['active_jobs_count'],
                        status: employers[index]['approved'],

                        // data for DB
                        employer_id: employers[index]['id'],
                        name: employers[index]['name'],
                        url: employers[index]['url'],
                        website: employers[index]['website'],
                        logo: employers[index]['logo'],
                        email: employers[index]['email'],
                        phone: employers[index]['phone'],
                        address: employers[index]['address'],
                        city: employers[index]['city'],
                        state: employers[index]['state'],
                        zip: employers[index]['zip'],
                        country: employers[index]['country'],
                        location: employers[index]['location'],
                        hidden: employers[index]['hidden'],
                        approved: employers[index]['approved'],
                        active_jobs_count: employers[index]['active_jobs_count'],
                        created_at: employers[index]['created_at'],
                    });
                }

                import_employers_table.draw(false);

                $('body').removeClass('loading');
            }
        })
    })

    $(document).on('click', '#import_employers [type="checkbox"]', function(){
        var checked = $(this).is(':checked');
        var row = parseInt($(this).attr('row'));
        var updated_data = import_employers_table.row(row).data();
        updated_data['checked'] = checked;
        import_employers_table.row(row).data(updated_data)

    })

    $(document).on('click', '#btn_employers_save', function(){
        if($('#site').val() == ''){
            alert('Please Select Site');
            $('#site').focus();
            return;
        }

        var employers = import_employers_table.rows().data();
        var postEmployers = [];
        for(var index = 0; index < employers.length; index++){
            if(employers[index]['checked']){
                postEmployers.push({
                    employer_id: employers[index]['employer_id'],
                    name: employers[index]['name'],
                    url: employers[index]['url'],
                    website: employers[index]['website'],
                    logo: employers[index]['logo'],
                    email: employers[index]['email'],
                    phone: employers[index]['phone'],
                    address: employers[index]['address'],
                    city: employers[index]['city'],
                    state: employers[index]['state'],
                    zip: employers[index]['zip'],
                    country: employers[index]['country'],
                    location: employers[index]['location'],
                    hidden: employers[index]['hidden'],
                    approved: employers[index]['approved'],
                    active_jobs_count: employers[index]['active_jobs_count'],
                    created_at: employers[index]['created_at']
                })
            }
        }

        if(postEmployers.length == 0){
            alert("Please check employers");
            return;
        }

        $.ajax({
            url: '/admin_api/employers_import_save',
            type: 'POST',
            data: {
                site_id: $('#site').val(),
                employers: postEmployers
            },
            success: function(response){
                alert('Successfully Saved!');
            }
        })
    })
    
    $(document).on('click', '.content--employers-management #btn_employers_load', function(){
        if($('#site').val() == ''){
            alert('Please Select Site');
            $('#site').focus();
            return;
        }

        load_employers_table.clear().draw();
        $('body').addClass('loading');

        $('#site_id').val($('#site').val());

        $.ajax({
            url: '/admin_api/employers_load',
            type: 'POST',
            data: {
                site_id: $('#site').val(),
            },
            success: function(response){

                var employers = JSON.parse(response);
                
                for(var index = 0; index < employers.length; index++){         
                    load_employers_table.row.add({
                        employer: {
                            logo: employers[index]['logo'],
                            name: employers[index]['name'],
                            email: employers[index]['email'],
                            location: employers[index]['location']
                        },
                        ts_integrate: employers[index]['ts_integrate'],
                        ts_id: employers[index]['ts_id'],
                        zapier_integrate: employers[index]['zapier_integrate'],
                        zapier_webhook_url: employers[index]['zapier_webhook_url'],
                        db_id: employers[index]['id']
                    });
                }

                load_employers_table.draw(false);

                $('body').removeClass('loading');
            }
        })
    })

    $(document).on('click', '#btn_employer_update', function(){
        $.ajax({
            url: '/admin_api/employer_update',
            type: 'POST',
            data: {
                id: $('#id').val(),
                ts_integrate: $('#ts_integrate').is(':checked'),
                ts_id: $("#ts_id").val(),
                zapier_webhook_url: $("#zapier_webhook_url").val(),
                zapier_integrate: $('#zapier_integrate').is(':checked'),
            },
            success: function(response){
                alert("Successfully Updated!");
                location.href="/admin/employers/" + $('#site_id').val();
            }
        })
    })

    $(document).on('click', '.btn-employer-delete', function(){
        if(confirm('Are you sure to delete')){
            $('body').addClass('loading');
            $.ajax({
                url: '/admin_api/employer_delete',
                type: 'POST',
                data: {
                    id: $(this).attr('id'),
                },
                success: function(response){
                    alert('Successfully Deleted!');
                    location.href="/admin/employers/" + $('#site_id').val();
                }
            })
        }
    })

    // for fields pages
    $(document).on('click', '.content--fields-management #btn_employers_load', function(){
        if($('#site').val() == ''){
            alert('Please Select Site');
            $('#site').focus();
            return;
        }

        load_employers_table.clear().draw();
        $('body').addClass('loading');

        $.ajax({
            url: '/admin_api/employers_fields_load',
            type: 'POST',
            data: {
                site_id: $('#site').val(),
            },
            success: function(response){

                var employers = JSON.parse(response);
                
                for(var index = 0; index < employers.length; index++){         
                    load_employers_table.row.add({
                        employer: {
                            logo: employers[index]['logo'],
                            name: employers[index]['name'],
                            email: employers[index]['email'],
                            location: employers[index]['location']
                        },
                        fields: employers[index]['fields'],
                        zapier_webhook_url: employers[index]['zapier_webhook_url'],
                        db_id: employers[index]['id']
                    });
                }

                load_employers_table.draw(false);

                $('body').removeClass('loading');
            }
        })
    })

    $(document).on('click', '#btn_fields_new', function(){

        $('#fields_dlg_title').text('New Custom Field');
        $('#field_name').val('');
        $('#field_required').removeAttr('checked');
        $('#zapier_data_name').val('');

        $('#btn_field_add').show();
        $('#btn_field_update').hide();

        $('#fields_dlg').modal('toggle');
    })

    $(document).on('click', '#btn_field_add', function(){
        
        if($('#field_name').val() == ''){
            alert('Please Input Field Label');
            $('#field_name').focus();
            return;
        }

        $('body').addClass('loading');
        $.ajax({
            url: '/admin_api/field_add',
            type: 'POST',
            data: {
                employer_id: $('#employer_id').val(),
                name: $('#field_name').val(),
                required: $('#field_required').is(':checked'),
                zapier_data_name: $('#zapier_data_name').val(),
            },
            success: function(response){
                alert("Successfully Added!");
                response = JSON.parse(response);
                load_fields_table.row.add({
                    name: response['name'],
                    required: response['required'],
                    zapier_data_name: response['zapier_data_name'],
                    db_id: response['id']
                });
                load_fields_table.draw(false);

                $('body').removeClass('loading');
                $('#fields_dlg').modal('toggle');
            }
        })
    })

    $(document).on('click', '#btn_field_update', function(){
        
        if($('#field_name').val() == ''){
            alert('Please Input Field Label');
            $('#field_name').focus();
            return;
        }

        $('body').addClass('loading');
        $.ajax({
            url: '/admin_api/field_update',
            type: 'POST',
            data: {
                db_id: $(this).attr('db-id'),
                employer_id: $('#employer_id').val(),
                name: $('#field_name').val(),
                required: $('#field_required').is(':checked'),
                zapier_data_name: $('#zapier_data_name').val(),
            },
            success: function(response){
                alert("Successfully Updated!");
                location.reload();
            }
        })
    })

    $(document).on('click', '.btn-field-edit', function(){        

        var row = parseInt($(this).attr('row'));
        var row_data = load_fields_table.row(row).data();
        $('#fields_dlg_title').text('Edit Custom Field');
        $('#field_name').val(row_data['name']);
        if(row_data['required'] == 'true'){
            $('#field_required').prop('checked', true);
        }
        else{
            $('#field_required').prop('checked', false);
        }
        $('#zapier_data_name').val(row_data['zapier_data_name']);

        $('#btn_field_add').hide();
        $('#btn_field_update').show();
        $('#btn_field_update').attr('db-id', row_data['db_id']);

        $('#fields_dlg').modal('toggle');
        
    })

    $(document).on('click', '.btn-field-delete', function(){        
        if(confirm('Are you sure to delete')){
            var row = parseInt($(this).attr('row'));
            var row_data = load_fields_table.row(row).data();
            $('body').addClass('loading');
            $.ajax({
                url: '/admin_api/field_delete',
                type: 'POST',
                data: {
                    id: row_data['db_id'],
                },
                success: function(response){
                    alert('Successfully Deleted!');
                    location.reload();
                }
            })
        }
        
    })

    $(document).on('click', '.btn-zapier-test', function(){
        $('body').addClass('loading');
        $.ajax({
            url: '/admin_api/zapier_test',
            type: 'POST',
            data: {
                id: $(this).attr('id'),
            },
            success: function(response){
                response = JSON.parse(response);
                if(response['success']){
                    alert('Successfully Zapier Webhook Test!');
                }
                else{
                    alert('Failed Zapier Webhook Test!');
                }
                
                $('body').removeClass('loading');
            }
        })
    })

    // Login Page
    function ValidateEmail(email) 
    {
        if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email))
        {
            return true;
        }
        return false;
    }

    $(document).on('click', '#btn_login', function(){
        if($('#email').val() == ''){
            alert('Please input email');
            $('#email').focus();
            return;
        }

        if(!ValidateEmail($('#email').val())){
            alert('Please input valid email');
            $('#email').focus();
            return;
        }

        if($('#password').val() == ''){
            alert('Please input password');
            $('#password').focus();
            return;
        }

        $.ajax({
            url: '/admin_api/login',
            type: 'POST',
            data: {
                email: $('#email').val(),
                password: $('#password').val()
            },
            success: function(response){
                response = JSON.parse(response);
                if(response.success){
                    location.href="/admin";
                }
                else{
                    alert('Please input correct login information');
                }
            }
        })
    })

    $(document).on('click', '#btn_register', function(){
        if($('#full_name').val() == ''){
            alert('Please input full name');
            $('#full_name').focus();
            return;
        }

        if($('#email').val() == ''){
            alert('Please input email');
            $('#email').focus();
            return;
        }

        if(!ValidateEmail($('#email').val())){
            alert('Please input valid email');
            $('#email').focus();
            return;
        }

        if($('#password').val() == ''){
            alert('Please input password');
            $('#password').focus();
            return;
        }

        if($('#rt_password').val() == ''){
            alert('Please retype password');
            $('#rt_password').focus();
            return;
        }

        if($('#password').val() != $('#rt_password').val()){
            alert('Please input correct retype password');
            $('#rt_password').focus();
            return;
        }

        $.ajax({
            url: '/admin_api/register',
            type: 'POST',
            data: {
                full_name: $('#full_name').val(),
                email: $('#email').val(),
                password: $('#password').val()
            },
            success: function(response){
                response = JSON.parse(response);
                if(response.success){
                    location.href="/admin/login";
                }
                else{
                    alert('Register Failed');
                }
            }
        })
    })

    // Log Page
    $(document).on('click', '#btn_logs_load', function(){
        if($('#log_type').val() == ''){
            alert('Please Select Type');
            $('#log_type').focus();
            return;
        }
        log_list_table.clear().draw();
        $('body').addClass('loading');

        $.ajax({
            url: '/admin_api/log_load',
            type: 'POST',
            data: {
                type: $('#log_type').val()
            },
            success: function(response){
                var logs = JSON.parse(response);
                
                for(var index = 0; index < logs.length; index++){         
                    log_list_table.row.add({
                        DriverName: logs[index]['DriverName']['0'],
                        ApplicationId: logs[index]['ApplicationId']['0'],
                        TenstreetLogId: logs[index]['TenstreetLogId']['0'],
                        Status: logs[index]['Status']['0'],
                        CompanyPostedToId: logs[index]['CompanyPostedToId']['0'],
                        DateTime: logs[index]['DateTime']['0'],
                    });
                }

                log_list_table.draw(false);

                $('body').removeClass('loading');

            }
        })
    })
})(jQuery)