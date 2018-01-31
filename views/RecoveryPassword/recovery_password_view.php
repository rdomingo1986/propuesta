<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>

<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>Deysi Encomiendas</title>
		<!-- start: META -->
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<!-- start: MAIN CSS -->
		<link rel="stylesheet" href="<?= base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?= base_url();?>assets/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?= base_url();?>assets/plugins/animate.css/animate.min.css">
		<link rel="stylesheet" href="<?= base_url();?>assets/plugins/iCheck/skins/all.css">
		<link rel="stylesheet" href="<?= base_url();?>assets/css/styles.css">
		<link rel="stylesheet" href="<?= base_url();?>assets/css/styles-responsive.css">
		<link rel="stylesheet" href="<?= base_url();?>assets/plugins/iCheck/skins/all.css">
		<!--[if IE 7]>
		<link rel="stylesheet" href="<?= base_url();?>assets/plugins/font-awesome/css/font-awesome-ie7.min.css">
		<![endif]-->
		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<link rel="stylesheet" href="<?= base_url();?>assets/plugins/toastr/toastr.min.css">
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body class="login">
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<!-- <div class="logo">
					
				</div> -->
				<!-- start: LOGIN BOX -->
				<div class="box-login">
					<h3>Sign in to your account</h3>
					<p>
						Please enter your username and password to log in.
					</p>
					<form class="form-recovery" action="#">
						<fieldset>
							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" name="currentPassword" placeholder="Current Password">
									<i class="fa fa-lock"></i> </span>
              </div>
              <div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" name="password" placeholder="New Password">
									<i class="fa fa-lock"></i> </span>
              </div>
              <div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" name="passwordRepeat" placeholder="Password Repeat">
									<i class="fa fa-lock"></i> </span>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-green pull-right">
									Change Password <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</fieldset>
					</form>
					<!-- start: COPYRIGHT -->
					<div class="copyright">
						2018 Powered by <a href="http://chamohosting.com" target="_blank">chamohosting.com</a> 
					</div>
					<!-- end: COPYRIGHT -->
				</div>
				<!-- end: LOGIN BOX -->
			</div>
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<!--[if lt IE 9]>
		<script src="<?= base_url();?>assets/plugins/respond.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/excanvas.min.js"></script>
		<script type="text/javascript" src="<?= base_url();?>assets/plugins/jQuery/jquery-1.11.1.min.js"></script>
		<![endif]-->
		<!--[if gte IE 9]><!-->
		<script src="<?= base_url();?>assets/plugins/jQuery/jquery-2.1.1.min.js"></script>
		<!--<![endif]-->
		<script src="<?= base_url();?>assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/iCheck/jquery.icheck.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/jquery.transit/jquery.transit.js"></script>
		<script src="<?= base_url();?>assets/plugins/TouchSwipe/jquery.touchSwipe.min.js"></script>
		<script src="<?= base_url();?>assets/js/main.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?= base_url();?>assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/toastr/toastr.js"></script>
		<script src="<?= base_url();?>assets/plugins/blockUI/jquery.blockUI.js"></script>
		<script src="<?= base_url();?>assets/js/login.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
		<input type="hidden" id="base_url" value="<?= base_url();?>">
	</body>
	<!-- end: BODY -->
</html>