<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Employer Edit
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <?php
    if(isset($employer)){
        ?>
        <div class="row">
            <div class="col-lg-6">
                <div class="box box-primary">
                    <div class="box-body">
                        <img class="employer__img" src="<?php echo $employer['logo']?>">
                        <div class="employe-meta">
                            <div class="employer__name"><?php echo $employer['name']?></div>
                            <div class="employer__email"><?php echo $employer['email']?></div>
                            <div class="employer__location"><?php echo $employer['location']?></div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="ts_integrate" <?php echo $employer['ts_integrate'] == 'true' ? "checked": ""?>>
                                    Teenstreet Integration?
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ts_id">Teenstreet Company ID</label>
                            <input type="email" class="form-control" id="ts_id" placeholder="" value="<?php echo $employer['ts_id']?>">
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="zapier_integrate" <?php echo $employer['zapier_integrate'] == 'true' ? "checked": ""?>>
                                    Zapier Webhook Integration?
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ts_id">Zapier Webhook URL</label>
                            <input type="email" class="form-control" id="zapier_webhook_url" placeholder="" value="<?php echo $employer['zapier_webhook_url']?>">
                        </div>
                        <input type="hidden" id="id" value="<?php echo $employer['id']?>">
                        <input type="hidden" id="site_id" value="<?php echo $employer['site_id']?>">
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" id="btn_employer_update">Update</button>
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