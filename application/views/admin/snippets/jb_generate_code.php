<!-- <script type="text/javascript"> -->
    <?php
    if(!isset($fields)){
        ?>
        console.log('No Custom Fields For <?php echo $employer_url?>');
        <?php
        die();
    }

    ?>
    jQuery('.apply-button').attr('data-target', '');
    jQuery('.apply-button').attr('href', '');
    var id = jQuery('.apply-button').attr('data-job-id');

    function ValidateEmail(email) 
    {
        if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email))
        {
            return true;
        }
        alert("You have entered an invalid email address!")
        return false;
    }

    jQuery(document).on('click', '.apply-button', function(){
        jQuery.ajax({
            url: '/applicants/new',
            type: 'GET',
            data: {
                id: id,
                modal: 'true'
            },
            dataType: 'text',
            contentType: "text/javascript; charset=utf-8",
            success: function(response){
                var response_html = jQuery.parseHTML(response);
                // jQuery(response_html).find('script').remove();
                jQuery('#applyModal .modal-content').html(response_html);

                // resume field hide
                var form_groups = jQuery('#applyModal .form-group');
                jQuery(form_groups[2]).attr('style', 'display: none');
                jQuery(form_groups[3]).attr('style', 'display: none');
                jQuery('#applyModal #no_resume').attr('checked', 'true');

                // hide all custom field answers field
                jQuery('[name^="applicant[custom_field_answers]"]').parents('.form-group').hide();

                // show fields
                <?php
                foreach($fields as $field){
                    ?>
                    // c1 text field check
                    var c1_text_label = jQuery('#applyModal .control-label:contains("<?php echo $field['name']?>")');
                    jQuery(c1_text_label).parents('.form-group').show();

                    // c1 multi field check
                    var c1_multi_label = jQuery('#applyModal .control-label:contains("<?php echo $field['name']?>")');
                    jQuery(c1_multi_label).parents('.form-group').show();

                    // c1 radio field check
                    var c1_radio_label = jQuery('#applyModal .control-label:contains("<?php echo $field['name']?>")');
                    jQuery(c1_radio_label).parents('.form-group').show();

                    // c1 drop field check
                    var c1_drop_label = jQuery('#applyModal .control-label:contains("<?php echo $field['name']?>")');
                    jQuery(c1_drop_label).parents('.form-group').show();

                    // c1 multi drop field check
                    var c1_multi_drop_label = jQuery('#applyModal .control-label:contains("<?php echo $field['name']?>")');
                    jQuery(c1_multi_drop_label).parents('.form-group').show();
                    
                    <?php
                }
                ?>
                


                var $applyForm = $('[id="apply-form"]');
                $('[data-js="postApplySubmit"]').on('click', function() {
                    // checking validate

                    var errors  = [];
                    if(jQuery('[name="applicant[email]"]').val() == ''){
                        errors.push("Email can't be blank");
                    }

                    if(jQuery('[name="applicant[email]"]').val() != '' && !ValidateEmail(jQuery('[name="applicant[email]"]').val())){
                        errors.push("Email is invalid");
                    }

                    if(jQuery('[name="applicant[fname]"]').val() == ''){
                        errors.push("First Name can't be blank");
                    }

                    if(jQuery('[name="applicant[lname]"]').val() == ''){
                        errors.push("Last Name can't be blank");
                    }

                    <?php
                    // checking required
                    foreach($fields as $field){
                        if($field['required'] != 'true'){
                            continue;
                        }
                        ?>
                        // c1 text field check 
                        var c1_text_label = jQuery('#applyModal .control-label:contains("<?php echo $field['name']?>")');
                        if(jQuery(c1_text_label).parents('.form-group').find('.form-control').val() == '' || jQuery(c1_text_label).parents('.form-group').find('.form-control').val() == null){
                            errors.push("<?php echo $field['name']?> is required");
                        }

                        // c1 multi field check
                        // var c1_multi_label = jQuery('#applyModal .control-label:contains("<?php echo $field['name']?>")');
                        // if(jQuery(c1_multi_label).parents('.form-group').find('.form-control').val() == ''){
                        //     errors.push("<?php echo $field['name']?> is required");
                        // }

                        // c1 radio field check
                        var c1_radio_label = jQuery('#applyModal .control-label:contains("<?php echo $field['name']?>")');
                        var c1_radio_label_name = jQuery(c1_radio_label).parents('.form-group').find('[type="radio"]').attr('name');
                        if(typeof c1_radio_label_name != 'undefined'){
                            if(typeof jQuery('[name="' + c1_radio_label_name + '"]:checked').val() == 'undefined'){
                                errors.push("<?php echo $field['name']?> is required");
                            }
                        }

                        // c1 drop field check
                        // var c1_drop_label = jQuery('#applyModal .control-label:contains("<?php echo $field['name']?>")');
                        // if(jQuery(c1_drop_label).parents('.form-group').find('.form-control').val() == null){
                        //     errors.push("<?php echo $field['name']?> is required");
                        // }

                        // c1 multi drop field check
                        // var c1_multi_drop_label = jQuery('#applyModal .control-label:contains("<?php echo $field['name']?>")');
                        // if(jQuery(c1_multi_drop_label).parents('.form-group').find('.form-control').val() == null){
                        //     errors.push("<?php echo $field['name']?> is required");
                        // }
                        <?php
                    }
                    ?>

                    if(errors.length > 0){
                        var error_html = '<div class="alert alert-danger">';
                        for(var eindex = 0; eindex < errors.length; eindex++){
                        error_html += '<li>' + errors[eindex] + '</li>';
                        }
                        error_html += '</div>';

                        jQuery('.apply-message').html(error_html);
                    }
                    else{
                        jQuery('.apply-message').html('');
                        $(this).attr('disabled', 'disabled');
                        $applyForm.submit();
                    }
                });
				
                $(document).ready(function(){
                    <?php
                    if(isset($employer) && $employer['ts_integrate'] == 'true'){
                        ?>
                        $('#apply-submit').on('click', function() {
                            var email = jQuery('[name="applicant[email]"]').val();
                            var fname = jQuery('[name="applicant[fname]"]').val();
                            var lname = jQuery('[name="applicant[lname]"]').val();

                            if(email == '' || fname == '' || lname == ''){
                                return;
                            }

                            <?php
                            // generate custom field values
                            foreach($fields as $field){
                                $field_name = $field['name'];
                                $field_var_name = str_replace(' ', '_', strtolower($field_name));
                                ?>
                                // var custom_<?php echo $field_var_name?> = jQuery('[name="applicant[custom_field_answers][<?php echo $field_var_name?>]"]').val();

                                var c1_text_label = jQuery('#applyModal .control-label:contains("<?php echo $field['name']?>")');
                                var custom_<?php echo $field_var_name?>;
                                custom_<?php echo $field_var_name?> = jQuery(c1_text_label).parents('.form-group').find('.form-control').val();


                                var c1_radio_label = jQuery('#applyModal .control-label:contains("<?php echo $field['name']?>")');
                                var c1_radio_label_name = jQuery(c1_radio_label).parents('.form-group').find('[type="radio"]').attr('name');

                                if(typeof c1_radio_label_name != 'undefined'){
                                    custom_<?php echo $field_var_name?> = jQuery('[name="' + c1_radio_label_name + '"]:checked').val()
                                }
                                
                                if(custom_<?php echo $field_var_name?> == ''){
                                    return;
                                }
                                <?php
                            }
                            ?>
                            
                            if( jQuery('#applicant_consents_attributes_0_consented').is(':checked') == false){
                                return;
                            }

                            var company_id = '<?php echo $employer['ts_id']?>';

                            if(company_id != ''){
                                jQuery.ajax({
                                    // url: 'https://teenstreet.tdbapply.com/post.php',
                                    url: '<?php echo $site_url?>call_ts',
                                    type: 'POST',
                                    data: {
                                        employer_id: <?php echo $employer_id?>,
                                        email: email,
                                        fname: fname,
                                        lname: lname,
                                        <?php
                                        // generate custom field values
                                        foreach($fields as $field){
                                            $field_name = $field['name'];
                                            $field_var_name = str_replace(' ', '_', strtolower($field_name));
                                            ?>
                                            custom_<?php echo $field_var_name?>: custom_<?php echo $field_var_name?>,
                                            <?php
                                        }
                                        ?>
                                        company_id: company_id
                                    },
                                    success: function(response){
                                        response = jQuery.parseXML(response);
                                        var status = jQuery(response).find('Status').text().toLowerCase();
                                        if(status == 'accepted'){
                                            console.log('teenstreet success');
                                        }
                                        else{
                                            console.log('teenstreet fail');   
                                        }
                                    }
                                });
                            }
                            runActionIfAllowed('googleAnalytics', function() {
                                ga('send', 'event', 'submit-apply-button', 'click', 'submit-apply-button-click');
                                ga('jbo.send', 'event', 'submit-apply-button', 'click', 'submit-apply-button-click');
                            });
                        });
                        $('#apply-cancel').on('click', function() {
                            runActionIfAllowed('googleAnalytics', function() {
                                ga('send', 'event', 'cancel-apply-button', 'click', 'cancel-apply-button-click');
                                ga('jbo.send', 'event', 'cancel-apply-button', 'click', 'cancel-apply-button-click');
                            });
                        });
                        
                        $('#no_resume').on('click', function() {
                            var $placeholder = $('#no_resume').attr("data-placeholder");
                            $('#applicant_cover_letter').attr("placeholder", $placeholder);
                        });
                    
                        <?php
                    }
                    ?>
                });
                
                // DROP DOWN JS - this is also in dropdown.js, but that code won't be accessible from the modal
                $(".dropdown_advanced").each(function () {
                  $(this).multiselect({
                    includeSelectAllOption: $(this).data('select-all') == 1,
                    enableFiltering: $(this).data('filterable') == 1 && $(this).find('option').length > 10,
                    enableCaseInsensitiveFiltering: $(this).data('filterable') == 1 && $(this).find('option').length > 10,
                    filterPlaceholder: $(this).data('search-text'),
                    nonSelectedText: $(this).data('placeholder'),
                    buttonClass: 'btn btn-utility btn-alt',
                    buttonWidth: '100%',
                    maxHeight: 200,
                    numberDisplayed: 1
                  });
                });
                
                $(".consent_form").on("click", "#tc_pp_consented", function () {
                  var value = $(this).is(":checked");
                  return $(".consent_form").find("[data-doc_type=terms_and_conditions], [data-doc_type=privacy_policy]").val(value);
                });
                
                registerPostAction("mixpanel", function () {
                  if (mixpanel.__loaded) {
                    $("#mixpanel_distinct_id").val(mixpanel.get_distinct_id());
                    $("#field_referer").val(mixpanel.cookie.props["initial_referrer"]);
                    $("#field_referring_domain").val(mixpanel.cookie.props["initial_referring_domain"]);
                  }
                });
                        
                jQuery('#applyModal').modal('toggle');
            }
        })
    })
<!-- </script> -->