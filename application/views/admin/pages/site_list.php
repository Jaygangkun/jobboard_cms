<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Site List
    </h1>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
        <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-body">
                <table id="site_list" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Site Name</th>
                            <th>Employers</th>
                            <th>API Key</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($sites as $site){
                            ?>
                            <tr>
                                <th>
                                    <div class="site-name-wrap">
                                        <a href="<?php echo $site['url']?>"><?php echo $site['name']?></a>
                                    </div>
                                </th>
                                <th>
                                    <div class="site-employers-wrap">
                                        <?php echo $site['employers']?>
                                    </div>
                                </th>
                                <th>
                                    <?php
                                    if($site['api_key_checked'] != null && $site['api_key_checked'] == '1'){
                                        ?>
                                        <div class="site-api-status text-green">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <div class="site-api-status text-red">
                                            <i class="fa fa-close"></i>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </th>
                                <th>
                                    <div class="site-action">
                                        <a type="button" href="/admin/site_edit/<?php echo $site['id']?>" class="btn btn-info">Edit</a>
                                        <button type="button" class="btn btn-danger btn-site-delete" site-id="<?php echo $site['id'] ?>">Delete</button>
                                    </div>
                                </th>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Site URL</th>
                            <th>Employers</th>
                            <th>API Key</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        </div>
    </div>
</section>
<!-- /.content -->
<script>
  $(function () {
    $("#site_list").DataTable();
  });
</script>