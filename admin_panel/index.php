<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Smshetty</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css">
	<link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include 'connection.php'; 
	if (!isValiduser()) 
	{
		redirect("login.php");
	}
?>	
	<!-- Top Bar Start -->
	<?php include 'includes/topbar.php'; ?>
		<!-- Top Bar End -->
	<div class="page-wrapper">
		<!-- Left Sidenav -->
		<?php include 'includes/left_menubar.php'; ?>	
		<!-- end left-sidenav-->
		<!-- Page Content-->
		<div class="page-content">
			<div class="container-fluid">
				<!-- Page-Title -->
				<div class="row">
					<div class="col-sm-12">
						<div class="page-title-box">
							<div class="float-right">
								<ol class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="javascript:void(0);">Amezia</a>
									</li>
									<li class="breadcrumb-item">
										<a href="javascript:void(0);">Dashboard</a>
									</li>
									<li class="breadcrumb-item active">Dashboard</li>
								</ol>
							</div>
							<h4 class="page-title">Dashboard</h4>
						</div>
					</div>
				</div>
			</div>
			<!-- footer -->
			<?php include 'includes/footer.php'; ?>
		</div>
				<!-- end page content -->
	</div>
			<!-- end page-wrapper -->
			<!-- jQuery  -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/bootstrap.bundle.min.js"></script>
			<script src="assets/js/metisMenu.min.js"></script>
			<script src="assets/js/waves.min.js"></script>
			<script src="assets/js/jquery.slimscroll.min.js"></script>
			<script src="assets/pages/jquery.dashboard.init.js"></script>
			<!-- App js -->
			<script src="assets/js/app.js"></script>
</body>
</html>