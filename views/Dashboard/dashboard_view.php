<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>

<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" ng-app="billing">
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
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,200,100,800' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?= base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?= base_url();?>assets/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?= base_url();?>assets/plugins/iCheck/skins/all.css">
		<link rel="stylesheet" href="<?= base_url();?>assets/plugins/perfect-scrollbar/src/perfect-scrollbar.css">
		<link rel="stylesheet" href="<?= base_url();?>assets/plugins/animate.css/animate.min.css">
		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR SUBVIEW CONTENTS -->
		<link rel="stylesheet" href="<?= base_url();?>assets/plugins/owl-carousel/owl-carousel/owl.carousel.css">
		<link rel="stylesheet" href="<?= base_url();?>assets/plugins/owl-carousel/owl-carousel/owl.theme.css">
		<link rel="stylesheet" href="<?= base_url();?>assets/plugins/owl-carousel/owl-carousel/owl.transitions.css">
		<link rel="stylesheet" href="<?= base_url();?>assets/plugins/summernote/dist/summernote.css">
		<link rel="stylesheet" href="<?= base_url();?>assets/plugins/fullcalendar/fullcalendar/fullcalendar.css">
		<link rel="stylesheet" href="<?= base_url();?>assets/plugins/toastr/toastr.min.css">
		<link rel="stylesheet" href="<?= base_url();?>assets/plugins/bootstrap-select/bootstrap-select.min.css">
		<link rel="stylesheet" href="<?= base_url();?>assets/plugins/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css">
		<link rel="stylesheet" href="<?= base_url();?>assets/plugins/DataTables/media/css/DT_bootstrap.css">
		<link rel="stylesheet" href="<?= base_url();?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
		<link rel="stylesheet" href="<?= base_url();?>assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css">
		<!-- end: CSS REQUIRED FOR THIS SUBVIEW CONTENTS-->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<link href="<?= base_url();?>assets/plugins/sweetalert/lib/sweet-alert.css" rel="stylesheet" />
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CORE CSS -->
		<link rel="stylesheet" href="<?= base_url();?>assets/css/styles.css">
		<link rel="stylesheet" href="<?= base_url();?>assets/css/styles-responsive.css">
		<link rel="stylesheet" href="<?= base_url();?>assets/css/plugins.css">
		<link rel="stylesheet" href="<?= base_url();?>assets/css/themes/theme-style4.css" type="text/css" id="skin_color">
		<link rel="stylesheet" href="<?= base_url();?>assets/css/print.css" type="text/css" media="print"/>
		<!-- end: CORE CSS -->
		<link rel="shortcut icon" href="<?= base_url();?>favicon.ico" />
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body>
		<div class="main-wrapper">
			<!-- start: TOPBAR -->
			<header class="topbar navbar navbar-inverse navbar-fixed-top inner">
				<!-- start: TOPBAR CONTAINER -->
				<div class="container">
					<div class="navbar-header">
						<a class="sb-toggle-left hidden-md hidden-lg" href="<?= base_url();?>#main-navbar">
							<i class="fa fa-bars"></i>
						</a>
						<!-- start: LOGO -->
						
						<!-- end: LOGO -->
					</div>
					<div class="topbar-tools">
						<!-- start: TOP NAVIGATION MENU -->
						<ul class="nav navbar-right">
							<!-- start: USER DROPDOWN -->
							<li class="dropdown current-user">
								<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="<?= base_url();?>#">
									<img src="<?= base_url();?>assets/images/avatar-1-small.jpg" class="img-circle" alt=""> <span class="username hidden-xs">Peter Clark</span> <i class="fa fa-caret-down "></i>
								</a>
								<ul class="dropdown-menu dropdown-dark">
									<li>
										<a data-target="#change-password-modal" data-toggle="modal" href="javascript:void(0)">
											Change Password
										</a>
									</li>
									<li>
										<a href="#" class="logout">
											Log Out
										</a>
									</li>
								</ul>
							</li>
							<!-- end: USER DROPDOWN -->
						</ul>
						<!-- end: TOP NAVIGATION MENU -->
					</div>
				</div>
				<!-- end: TOPBAR CONTAINER -->
			</header>
			<!-- end: TOPBAR -->
			<!-- start: PAGESLIDE LEFT -->
			<a class="closedbar inner hidden-sm hidden-xs" href="<?= base_url();?>#">
			</a>
			<nav id="pageslide-left" class="pageslide inner">
				<div class="navbar-content">
					<!-- start: SIDEBAR -->
					<div class="main-navigation left-wrapper transition-left">
						<div class="navigation-toggler hidden-sm hidden-xs">
							<a href="<?= base_url();?>#main-navbar" class="sb-toggle-left">
							</a>
						</div>
						<div class="user-profile border-top padding-horizontal-10 block">
							<div class="inline-block">
								<img src="<?= base_url();?>assets/images/avatar-1.jpg" alt="">
							</div>
							<div class="inline-block">
								<h5 class="no-margin"> Welcome </h5>
								<h4 class="no-margin"> Peter Clark </h4>
							</div>
						</div>
						<!-- start: MAIN NAVIGATION MENU -->
						<ul class="main-navigation-menu">
							<li>
								<a href="javascript:void(0)">
									Customers <i class="icon-arrow"></i>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="#!/Customers">
											List
										</a>
									</li>
									<li>
										<a href="#!/Customers/NewCustomer">
											New
										</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="javascript:void(0)">
								Invoices <i class="icon-arrow"></i>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="#!/Invoices">
											List
										</a>
									</li>
									<li>
										<a href="#!/Invoices/NewInvoice">
											New
										</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="javascript:void(0)">
								Products <i class="icon-arrow"></i>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="#!/Products">
											List
										</a>
									</li>
									<li>
										<a href="#!/Products/NewProduct">
											New
										</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#!/GeneralSettings"> <span class="title">Settings</span> </a>
							</li>
							<li>
								<a href="javascript:void(0)">
								Users <i class="icon-arrow"></i>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="#!/Users">
											List
										</a>
									</li>
									<li>
										<a href="#!/Users/NewUser">
											New
										</a>
									</li>
								</ul>
							</li>
						</ul>
						<!-- end: MAIN NAVIGATION MENU -->
					</div>
					<!-- end: SIDEBAR -->
				</div>
				<div class="slide-tools">
					<div class="col-xs-6 text-left no-padding">
						<a class="btn btn-sm status" href="<?= base_url();?>#">
							Status <i class="fa fa-dot-circle-o text-green"></i> <span>Online</span>
						</a>
					</div>
					<div class="col-xs-6 text-right no-padding">
						<a class="btn btn-sm log-out text-right logout" href="#">
							<i class="fa fa-power-off"></i> Log Out
						</a>
					</div>
				</div>
			</nav>
			<!-- end: PAGESLIDE LEFT -->
			<!-- start: MAIN CONTAINER -->
			<div class="main-container inner">
				<div class="modal fade" id="change-password-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header">
								<button aria-hidden="true" data-dismiss="modal" class="close" type="button">
									×
								</button>
								<h4 id="myLargeModalLabel" class="modal-title">Change Password</h4>
							</div>
							<div class="modal-body">
								<form action="#" id="change-password-form">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">
													Current Password <span class="symbol required"></span>
												</label>
												<input type="password" class="form-control" name="currentPassword">
											</div>
											<div class="form-group">
												<label class="control-label">
													New Password <span class="symbol required"></span>
												</label>
												<input type="password" class="form-control" name="password">
											</div>
											<div class="form-group">
												<label class="control-label">
													Password Repeat <span class="symbol required"></span>
												</label>
												<input type="password" class="form-control" name="passwordRepeat">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div>
												<span class="symbol required"></span>Required Fields
												<hr>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 col-xs-12">
											<button class="btn btn-success btn-block" type="submit">
												Change
											</button>
										</div>
										<div class="col-md-6 col-xs-12">
											<button class="btn btn-red btn-block" data-dismiss="modal" type="button">
												Close
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
				</div>
				<!-- start: PAGE -->
				<div class="main-content">
					<div class="container">
						<!-- start: PAGE HEADER -->
						<!-- start: TOOLBAR -->
						<div class="toolbar row">
							<div class="col-sm-6 hidden-xs">
								<div class="page-header">
									<h1><span id="module-title">Blank Page</span> <small id="submodule-title">subtitle here</small></h1>
								</div>
							</div>
							<div class="col-sm-6 col-xs-12">
								<a href="<?= base_url();?>#" class="back-subviews">
									<i class="fa fa-chevron-left"></i> BACK
								</a>
								<a href="<?= base_url();?>#" class="close-subviews">
									<i class="fa fa-times"></i> CLOSE
								</a>
								<div class="toolbar-tools pull-right">
									<!-- start: TOP NAVIGATION MENU -->
									
									<!-- end: TOP NAVIGATION MENU -->
								</div>
							</div>
						</div>
						<!-- end: TOOLBAR -->
						<!-- end: PAGE HEADER -->
						<!-- start: BREADCRUMB -->
						<div class="row">
							<div class="col-md-12">
								<ol class="breadcrumb">
									<li>
										<a href="<?= base_url();?>#">
											Dashboard
										</a>
									</li>
									<li class="active">
										Blank Page
									</li>
								</ol>
							</div>
						</div>
						<!-- end: BREADCRUMB -->
						<!-- start: PAGE CONTENT -->
						<div class="row">
							<div class="col-md-12" id="main-container" ng-view></div>
						</div>
						<!-- end: PAGE CONTENT-->
					</div>
				</div>
				<!-- end: PAGE -->
			</div>
			<!-- end: MAIN CONTAINER -->
			<!-- start: FOOTER -->
			<footer class="inner">
				<div class="footer-inner">
					<div class="pull-left">
						2018 Powered by <a href="http://chamohosting.com" target="_blank">chamohosting.com</a> 
					</div>
					<div class="pull-right">
						<span class="go-top"><i class="fa fa-chevron-up"></i></span>
					</div>
				</div>
			</footer>
			<!-- end: FOOTER -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<!--[if lt IE 9]>
		<script src="<?= base_url();?>assets/plugins/respond.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/excanvas.min.js"></script>
		<script type="text/javascript" src="<?= base_url();?>assets/plugins/jQuery/jquery-1.11.1.min.js"></script>
		<![endif]-->
		<!--[if gte IE 9]><!-->
		<script src="<?= base_url();?>assets/plugins/jQuery/jquery-2.1.1.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/datatables.net/js/jquery.dataTables.js"></script>
		<!-- <script src="<?= base_url();?>assets/plugins/datatables-light-columnfilter/dist/dataTables.lightColumnFilter.min.js"></script> -->
		<!--<![endif]-->
		<script src="<?= base_url();?>assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/angularjs/angularjs.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/angularjs/angularjs-route.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/angular-datatables/dist/angular-datatables.min.js"></script>
		<!-- <script src="<?= base_url();?>assets/plugins/angular-datatables/dist/plugins/light-columnfilter/angular-datatables.light-columnfilter.min.js"></script> -->
		<script src="<?= base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/blockUI/jquery.blockUI.js"></script>
		<script src="<?= base_url();?>assets/plugins/iCheck/jquery.icheck.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/moment/min/moment.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
		<script src="<?= base_url();?>assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
		<script src="<?= base_url();?>assets/plugins/bootbox/bootbox.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/jquery.scrollTo/jquery.scrollTo.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/ScrollToFixed/jquery-scrolltofixed-min.js"></script>
		<script src="<?= base_url();?>assets/plugins/jquery.appear/jquery.appear.js"></script>
		<script src="<?= base_url();?>assets/plugins/jquery-cookie/jquery.cookie.js"></script>
		<script src="<?= base_url();?>assets/plugins/velocity/jquery.velocity.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/TouchSwipe/jquery.touchSwipe.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
		<script src="<?= base_url();?>assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
		<script src="<?= base_url();?>assets/plugins/jquery-mockjax/jquery.mockjax.js"></script>
		<script src="<?= base_url();?>assets/plugins/toastr/toastr.js"></script>
		<script src="<?= base_url();?>assets/plugins/bootstrap-modal/js/bootstrap-modal.js"></script>
		<script src="<?= base_url();?>assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js"></script>
		<script src="<?= base_url();?>assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
		
		<script src="<?= base_url();?>assets/plugins/truncate/jquery.truncate.js"></script>
		<script src="<?= base_url();?>assets/plugins/summernote/dist/summernote.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?= base_url();?>assets/plugins/sweetalert/lib/sweet-alert.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CORE JAVASCRIPTS  -->
		<script src="<?= base_url();?>assets/js/customs/angularjs.globals.js"></script>
		<script src="<?= base_url();?>assets/js/customs/my-utils.js"></script>
		<script src="<?= base_url();?>assets/js/main.js"></script>
		<script src="<?= base_url();?>assets/js/dashboard.js"></script>
		<script src="<?= base_url();?>assets/js/customs/controllers/Settings.js"></script>
		<script src="<?= base_url();?>assets/js/customs/controllers/Customers.js"></script>
		<script src="<?= base_url();?>assets/js/customs/controllers/Products.js"></script>
		<script src="<?= base_url();?>assets/js/customs/controllers/Invoices.js"></script>
		<script src="<?= base_url();?>assets/js/customs/controllers/Users.js"></script>
		<!-- end: CORE JAVASCRIPTS  -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Dashboard.init();
			});
		</script>
		<input type="hidden" id="base_url" value="<?= base_url();?>">
	</body>
	<!-- end: BODY -->
</html>