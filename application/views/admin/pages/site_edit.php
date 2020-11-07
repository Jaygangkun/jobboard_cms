<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Edit Site
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <?php
    if(isset($site)){
        ?>
        <div class="row">
            <div class="col-lg-6">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="site_name">Site Name</label>
                            <input type="email" class="form-control" id="site_name" placeholder="" value="<?php echo $site['name']?>">
                        </div>
                        <div class="form-group">
                            <label for="site_url">Site URL</label>
                            <input type="email" class="form-control" id="site_url" placeholder="" value="<?php echo $site['url']?>">
                        </div>
                        <div class="form-group">
                            <label for="site_url">Jobboard URL</label>
                            <input type="email" class="form-control" id="jobboard_url" placeholder="" value="<?php echo $site['jobboard_url']?>">
                        </div>
                        <div class="form-group">
                            <label for="site_api_key">Site API Key</label>
                            <input type="email" class="form-control" id="site_api_key" placeholder="" value="<?php echo $site['api_key']?>">
                        </div>
                        <input type='hidden' value="<?php echo $site['id']?>" id="site_id">
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" id="btn_site_update">Update</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    else{
        ?>
        No Available Site
        <?php
    }
    ?>
</section>
<!-- /.content -->