<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Smshetty</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">

		<!-- DataTables -->
	<link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
	<link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
	<!-- Responsive datatable examples -->
	<link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">	

	<!-- Dropzone css -->
	<link href="assets/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">
	<link href="assets/plugins/dropify/css/dropify.min.css" rel="stylesheet">

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
	$faci_id = $_POST['faci_id'];
	list($res_array) = exc_qry("select * from sms_facilities where fac_active = 0 order by fac_id desc");
	list($edit_fac) = exc_qry("SELECT * FROM sms_facilities WHERE fac_id = ".$faci_id);
	// echo "<script>window.alert('count".count($edit_fac)."');</script>";
	$title = $edit_fac[0]['fac_title'];

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
										<a href="javascript:void(0);">Home</a>
									</li>
									<li class="breadcrumb-item active">Our facilities</li>
								</ol>
							</div>
							<h4 class="page-title">Our facilities</h4>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
								<h5 class="mt-0">Our facilities</h5>
								<!-- <p class="text-muted font-13 mb-4">Your so fresh input file — Default version</p> -->
								<form method="post" enctype="multipart/form-data">
									<div class="form-group row">
	        							<div class="col-sm-12">
											<input type="file" name="fac_image" id="input-file-now" class="dropify" accept="image/jpeg,image/png" data-max-file-size="1M"  
											<?php if(strlen($faci_id)>0){
											 echo 'data-default-file="../images/facilities/'.$edit_fac[0]['fac_img'].'"'; } else {
											 echo 'required="required"';
											 } ?>  >
									 	</div>
									 </div>
									<div class="form-group row">
	        							<div class="col-sm-12">
	        								<input class="form-control" type="text" value="<?php echo htmlentities($title); ?>" id="example-text-input" placeholder="Enter Title ..." name="fac_title" required="required" >
	        							</div>
	        						</div>
	        							<div class="form-group row">
	        							<div class="col-sm-12">
	        								<input class="form-control" type="text" value="<?php echo htmlentities($edit_fac[0]['fac_desc']); ?>" id="example-text-input" placeholder="Enter Description ..." name="fac_desc" required="required" >
	        							</div>
	        						</div>
									<div class="form-group mb-4">
									<?php if($faci_id>0){ ?>
										<input type="hidden" name="faci_id" value="<?php echo $faci_id; ?>">
	        								<button type="submit" name="edit_fac" class="btn btn-success px-4">Edit Facility</button>
	        								<button name="redirect" onclick="window.location = 'our_facilities.php';" class="btn btn-danger px-4">Cancel</button>
	        						<?php } else { ?>
										<button type="submit" name="add_fac" class="btn btn-primary px-4">Add Facilities</button>
									<?php } ?>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<h5 class="mt-0">Facilities</h5>
								<div class="table-responsive">
									<table id="datatable" class="table table-bordered">
										<thead>
											<tr>
												<th>Sr.No</th>
												<th>Image</th>
												<th>Title</th>
												<th>Description</th>
												<th colspan="2" class="text-center">Action</th>
												<th>Display</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											for ($i=0; $i < count($res_array) ; $i++) { 
											?>
											<tr>
												<td><?php echo $i + 1; ?></td>
												<td><img src="../images/facilities/<?php echo $res_array[$i]['fac_img']; ?>" class="img img-responsive" style="width:200px;">
												</td>
												<td><?php echo $res_array[$i]['fac_title']; ?></td>
												<td><?php echo $res_array[$i]['fac_desc']; ?></td>
												<form  method="POST">
												<td>
													<input type="hidden" name="faci_id" value="<?php echo $res_array[$i]['fac_id']; ?>" >
													<button type="submit" class="btn btn-success px-4">Edit Facility</button>
												</td>
												<td>
													<button type="submit" name="del_fac" class="btn btn-danger px-4">Delete Facility</button>
												</td>
												</form>
												<td>
													<span class="text-success"><i class = "fa fa-check"></i></span>
												</td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div><!-- end col -->
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
			<!-- Dropzone js -->
			<script src="assets/plugins/dropzone/dist/dropzone.js"></script>
			<script src="assets/plugins/dropify/js/dropify.min.js"></script>
			<script src="assets/pages/jquery.dropzone.init.js"></script>
			<!-- Sweet-Alert  -->
			<script src="assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
			<script src="assets/pages/jquery.sweet-alert.init.js"></script>
			<script src="assets/js/custom.js"></script>
			<!-- Required datatable js -->
			<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
			<script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
			<!-- Responsive examples -->
			<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
			<script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
			<!-- Datatable init js -->
			<script src="assets/pages/jquery.table-datatable.js"></script>
</body>
<?php 
	
	//add facility
	if(isset($_POST['add_fac']))
	{	
		$title = mysqli_real_escape_string($connect,$_POST['fac_title']);
		$desc = mysqli_real_escape_string($connect,$_POST['fac_desc']);
		$img = $_FILES['fac_image'];
		$up_des = "../images/facilities/";
		$resize_width = 303; //in pixel
		$resize_height = 172; // in pixel
		$imgNm = "facilities_";
		$result = upload_image($img,$up_des,$resize_width,$resize_height,$imgNm);
		$extension = pathinfo($img['name'],PATHINFO_EXTENSION);
		$name = $imgNm.time().'.'. $extension;
		if($result=="success")
		{
			$ins_qry = "INSERT INTO sms_facilities SET fac_img =  '$name', fac_title = '$title', fac_desc = '$desc', fac_add_date = now()";
			$res_qry = mysqli_query($connect,$ins_qry);
			if($res_qry)
			{
				echo "<script>successMessage('Facility Added Successfully','our_facilities.php');</script>";
			}
			else
			{
				echo "<script>swal('','Sorry! Facility not added. Try Again','warning');</script>";
			}
		}
	}

	//delete facility
	if (isset($_POST['del_fac'])) {
		$faci_id = $_POST['faci_id'];
		$del_qry = "UPDATE sms_facilities SET fac_active = 1 WHERE fac_id = $faci_id";
		$res_qry = mysqli_query($connect,$del_qry);
		if ($res_qry) 
		{
			echo "<script>successMessage('Facility Deleted Successfully','our_facilities.php');</script>";
		} 
		else 
		{
			echo "<script>swal('','Sorry! Facility not deleted. Try Again','warning');</script>";
		}
	}

	//edit facility
	if(isset($_POST['edit_fac']))
	{	
		$faci_id = $_POST['faci_id'];
		$title = mysqli_real_escape_string($connect,$_POST['fac_title']);
		$desc = mysqli_real_escape_string($connect,$_POST['fac_desc']);
		$img = $_FILES['fac_image'];
		$img_qry = "";
		if (strlen($img['name'])>0) {
			$up_des = "../images/facilities/";
			$resize_width = 303; //in pixel
			$resize_height = 172; // in pixel
			$imgNm = "facilities_";
			$result = upload_image($img,$up_des,$resize_width,$resize_height,$imgNm);
			$extension = pathinfo($img['name'],PATHINFO_EXTENSION);
			$name = $imgNm.time().'.'. $extension;
			if($result=="success")
			{
				$img_qry = ",fac_img =  '$name'";
			}
		}
			$upd_qry = "UPDATE sms_facilities SET  fac_title = '$title', fac_desc = '$desc', fac_edit_date = now() $img_qry WHERE fac_id = $faci_id";
			$res_qry = mysqli_query($connect,$upd_qry);
			if($res_qry)
			{
				echo "<script>successMessage('Facility Updated Successfully','our_facilities.php');</script>";
			}
			else
			{
				echo $upd_qry;
				echo mysqli_error($connect);
				echo "<script>swal('','Sorry! Facility not Updated. Try Again','warning');</script>";
			}
	}

	// cancel edit
	if (isset($_POST['redirect'])) 
	{
		redirect('our_facilities.php');
	}

?>

</html>