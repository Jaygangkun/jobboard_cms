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
                ts_id: $("#ts_id").val()
            },
            success: function(response){
                alert("Successfully Updated!");
                location.href="/admin/employers/" + $('#site_id').val();
            }
        })
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
            },
            success: function(response){
                alert("Successfully Added!");
                response = JSON.parse(response);
                load_fields_table.row.add({
                    name: response['name'],
                    required: response['required'],
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
        console.log(row_data);
        $('#fields_dlg_title').text('Edit Custom Field');
        $('#field_name').val(row_data['name']);
        if(row_data['required'] == 'true'){
            $('#field_required').prop('checked', true);
        }
        else{
            $('#field_required').prop('checked', false);
        }

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
})(jQuery)