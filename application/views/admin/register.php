<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Keloh CMS Signup</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.6 -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		<!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/datatables/dataTables.bootstrap.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/AdminLTE.min.css">
		<!-- AdminLTE Skins. Choose a skin from the css/skins
			folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/_all-skins.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/jbcms.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


        <!-- jQuery 2.2.3 -->
		<script src="<?= base_url() ?>assets/js/jQuery/jquery-2.2.3.min.js"></script>
		<!-- Bootstrap 3.3.6 -->
        <script src="<?= base_url() ?>assets/js/bootstrap/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="<?= base_url() ?>assets/js/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>assets/js/datatables/dataTables.bootstrap.min.js"></script>

		<!-- FastClick -->
		<!-- <script src="../../plugins/fastclick/fastclick.js"></script> -->
		<!-- AdminLTE App -->
		<script src="<?= base_url() ?>assets/js/app.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="<?= base_url() ?>assets/js/demo.js"></script>

		<script src="<?= base_url() ?>assets/js/jbcms.js"></script>
	</head>
	<body class="hold-transition register-page">
		<div class="register-box">
			<div class="register-logo">
				<a href="../../index2.html"><b>Keloh</b>CMS</a>
			</div>
			<div class="register-box-body">
				<div class="form-wrap">
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Full name" id="full_name">
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="email" class="form-control" placeholder="Email" id="email">
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" class="form-control" placeholder="Password" id="password">
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" class="form-control" placeholder="Retype password" id="rt_password">
						<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
					</div>
					<div class="text-center">
						<button type="button" class="btn btn-primary btn-block btn-flat" id="btn_register">Register</button>
					</div>
				</div>
				<div class="mt-20">
					<a href="/admin/login" class="text-center">I already have a account</a>
				</div>
			</div>
			<!-- /.form-box -->
		</div>
		<!-- /.register-box -->
	</body>
</html>