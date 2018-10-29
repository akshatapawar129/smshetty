<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Smshetty</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<!--Sweet alert-->
	<link href="assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
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
	list($res_array) = exc_qry("select * from sms_one_time where change_id = 1");
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
										<a href="javascript:void(0);">Dashboard</a>
									</li>
									<li class="breadcrumb-item">
										<a href="javascript:void(0);">Footer</a>
									</li>
									<li class="breadcrumb-item active">Contact Info</li>
								</ol>
							</div>
							<h4 class="page-title">Contact Info</h4>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xl-12">
					<div class="card">
						<div class="card-body">
							<!-- <p class="text-muted font-13 mb-4">Your so fresh input file — Default version</p> -->
							<form method="post" enctype="multipart/form-data">
								<div class="form-group">
        							<label class="col-form-label">Address</label>
        								<input class="form-control" type="text" value="<?php echo htmlentities($res_array[0]['con_add']); ?>" id="example-text-input" placeholder="Enter Address ..." name="con_add" required="required" >
        						</div>
        						<div class="form-group">
        							<label class="col-form-label">Phone No</label>
        								<input class="form-control" type="text" value="<?php echo htmlentities($res_array[0]['con_phone']); ?>" id="example-text-input" placeholder="Enter Phone Number ..." name="con_phone" required="required" >
        						</div>
        						<div class="form-group">
        							<label class="col-form-label">Email</label>
        								<input class="form-control" type="email" value="<?php echo htmlentities($res_array[0]['con_mail']); ?>" id="example-text-input" placeholder="Enter Email Address ..." name="con_email" required="required" >
        						</div>
        						<div class="form-group">
        							<label class="col-form-label">Fax</label>
        								<input class="form-control" type="number" value="<?php echo htmlentities($res_array[0]['con_fax']); ?>" id="example-text-input" placeholder="Enter Fax ..." name="con_fax" required="required" >
        						</div>
        						<div class="form-group mb-4">
        							<button type="submit" name="edit_con" class="btn btn-success px-4">Update Info</button>
        						</div>
    						</form>

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

			<!-- Sweet-Alert  -->
			<script src="assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
			<script src="assets/pages/jquery.sweet-alert.init.js"></script>
			<script src="assets/js/custom.js"></script>

			<!-- App js -->
			<script src="assets/js/app.js"></script>
</body>
<?php 

if(isset($_POST['edit_con']))
	{
		
	}

?>
</html>