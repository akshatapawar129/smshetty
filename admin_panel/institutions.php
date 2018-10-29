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

	<link href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">

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
	$inst_id = $_POST['inst_id'];
	list($res_array) = exc_qry("select * from sms_institute where inst_active = 0 order by inst_id desc");
	list($edit_inst) = exc_qry("SELECT * FROM sms_institute WHERE inst_id = ".$inst_id);
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
										<a href="javascript:void(0);">Dashboard<?php echo $inst_id; ?></a>
									</li>
									<li class="breadcrumb-item">
										<a href="javascript:void(0);">Home</a>
									</li>
									<li class="breadcrumb-item active">Institutions</li>
								</ol>
							</div>
							<h4 class="page-title">Institutions</h4>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
								<h5 class="mt-0">Our Institutions</h5>
								<!-- <p class="text-muted font-13 mb-4">Your so fresh input file — Default version</p> -->
								<form method="post" enctype="multipart/form-data">
									<div class="form-group">
	        							<label class="col-form-label">Icon</label>
											<input type="file" name="inst_icon" id="input-file-now" class="dropify" accept="image/jpeg,image/png" data-max-file-size="1M"  <?php if(strlen($inst_id)>0){
											 echo 'data-default-file="../images/icon/'.$edit_inst[0]['inst_icon'].'"'; } else { echo 'required="required"'; } ?> >
									</div>
									<div class="form-group">
	        							<label class="col-form-label">Name</label>
	        								<input class="form-control" type="text" value="<?php echo htmlentities($edit_inst[0]['inst_name']); ?>" id="example-text-input" placeholder="Enter Name ..." name="inst_name" required="required" >
	        						</div>
	        						<div class="form-group">
	        							<label class="col-form-label">Description</label>
	        								<input class="form-control" type="text" value="<?php echo htmlentities($edit_inst[0]['inst_desc']); ?>" id="example-text-input" placeholder="Enter Description ..." name="inst_desc" required="required" >
	        						</div>

									<div class="form-group">
										<label class="col-form-label">Background Color</label>
										<div id="cp2" class="input-group colorpicker-component">
											<input type="text" required="required" name="inst_color" value="<?php echo htmlentities($edit_inst[0]['inst_color']); ?>"  class="form-control"> 
											<span class="input-group-addon">
												<i></i>
											</span>
										</div>
									</div>
									<div class="form-group mb-4">
										<?php if (strlen($inst_id)>0) { ?>
										<input type="hidden" name="inst_id" value="<?php echo $inst_id; ?>">
										<button type="submit" name="edit_inst"  class="btn btn-primary px-5">Update Details</button>
										<button class="btn btn-danger px-5" name="redirect" onclick="window.location = 'institutions.php';" >Cancel</button>

									<?php } else { ?>
										<button type="submit" name="add_inst" class="btn btn-primary px-4">Add Details</button>
									<?php  } ?>
									</div >
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
												<th>Icon</th>
												<th>Name</th>
												<th>Description</th>
												<th>Colour Code</th>
												<th colspan="2" class="text-center">Action</th>
												<th>Display</th>
											</tr>
										</thead>
										<tbody>
											<?php for ($i=0; $i < count($res_array) ; $i++) {
											 ?>
											<tr>
												<td><?php echo $i+1; ?></td>
												<td><img src="../images/icon/<?php echo $res_array[$i]['inst_icon']; ?>" class="img img-responsive" style="width:100px;">
												</td>
												<td>
													<?php echo $res_array[$i]['inst_name']; ?>
												</td>
												<td>
													<?php echo $res_array[$i]['inst_desc']; ?>
												</td>
												<td>
													<?php echo $res_array[$i]['inst_color']; ?>
												</td>
												<form method="post">
													<input type="hidden" name="inst_id" value="<?php echo $res_array[$i]['inst_id'] ;?>">
												<td><button  type="submit" class="btn btn-success">Edit institute</button></td>
												<td><button name="del_inst"  type="submit" class="btn btn-danger" onclick="return confirm('Are you sure You want to delete institute detail ? \nYou will not be able to revert this!');">Delete institute</button></td>
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


			</div>
			<!-- footer -->
			<?php include 'includes/footer.php'; ?>
		</div>
				<!-- end page content -->
	</div>
			<!-- end page-wrapper -->
			<!-- jQuery  -->
			
<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/waves.min.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/pages/jquery.dashboard.init.js"></script>
<!-- Dropzone js -->
<script src="assets/plugins/dropzone/dist/dropzone.js"></script>
<script src="assets/plugins/dropify/js/dropify.min.js"></script>
<script src="assets/pages/jquery.dropzone.init.js"></script>
<!-- Sweet-Alert  -->
<script src="assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="assets/pages/jquery.sweet-alert.init.js"></script>
<script src="assets/js/custom.js"></script>

<script src="assets/plugins/select2/select2.min.js"></script>
<script src="assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="assets/pages/jquery.form-advanced.init.js"></script><!-- App js -->
<!-- Required datatable js -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Responsive examples -->
<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
<!-- Datatable init js -->
<script src="assets/pages/jquery.table-datatable.js"></script>
<!-- App js -->
<script src="assets/js/app.js"></script>

</body>
<?php 

//add institute details
if(isset($_POST['add_inst']))
	{
		$icon = $_FILES['inst_icon'];
		$name =  mysqli_real_escape_string($connect,$_POST['inst_name']);
		$desc =  mysqli_real_escape_string($connect,$_POST['inst_desc']);
		$color =  mysqli_real_escape_string($connect,$_POST['inst_color']);
		$up_des = "../images/icon/";
		$resize_width = 80; //in pixel
		$resize_height = 80; // in pixel
		$imgNm = "institute_";
		$result = upload_image($icon,$up_des,$resize_width,$resize_height,$imgNm);
		$extension = pathinfo($icon['name'],PATHINFO_EXTENSION);
		$icon_name = $imgNm.time().'.'. $extension;
		if($result=="success")
		{
			$ins_qry = "INSERT INTO sms_institute SET inst_name =  '$name',inst_desc = '$desc',inst_icon = '$icon_name', inst_color = '$color', inst_add_date = now()";
			$res_qry = mysqli_query($connect,$ins_qry);
			if($res_qry)
			{
				echo "<script>successMessage('Institude Added Successfully','institutions.php');</script>";
			}
			else
			{
				echo "<script>warningMessage('Sorry! Institude not added. Try Again','institutions.php');</script>";
			}
		}
	}

if(isset($_POST['redirect']))
	{
		
		redirect('institutions.php');
	}

	//add institute details
	if(isset($_POST['edit_inst']))
		{
			$edit_id = $_POST['inst_id'];
		$icon = $_FILES['inst_icon'];
		$name =  mysqli_real_escape_string($connect,$_POST['inst_name']);
		$desc =  mysqli_real_escape_string($connect,$_POST['inst_desc']);
		$color =  mysqli_real_escape_string($connect,$_POST['inst_color']);
		$ic_qry = "";

		if (strlen($icon['name'])>0) //if file is uploaded
			{
				$up_des = "../images/icon/";
				$resize_width = 80; //in pixel
				$resize_height = 80; // in pixel
				$imgNm = "institute_";
				$result = upload_image($icon,$up_des,$resize_width,$resize_height,$imgNm);
				$extension = pathinfo($icon['name'],PATHINFO_EXTENSION);
				$icon_name = $imgNm.time().'.'. $extension;
				if($result=="success")
				{
					$ic_qry = ",inst_icon = '$icon_name'";
				}
			}
		
			$upd_qry = "UPDATE sms_institute SET inst_name =  '$name',inst_desc = '$desc', inst_color = '$color', inst_edit_date = now() $ic_qry WHERE inst_id = $inst_id";
			$res_qry = mysqli_query($connect,$upd_qry);
			if($res_qry)
			{
				echo "<script>successMessage('Institude Updated Successfully','institutions.php');</script>";
			}
			else
			{
				echo "<script>warningMessage('Sorry! Institude not updated. Try Again','institutions.php');</script>";
			}
		}

	//delete institute details
	if (isset($_POST['del_inst'])) 
	{
		$del_id = $_POST['inst_id'];
		$del_qry = "UPDATE sms_institute SET inst_active = 1 WHERE inst_id = $del_id";
		$res_qry = mysqli_query($connect,$del_qry);
		if ($res_qry) 
		{
			echo "<script>successMessage('Institute details Deleted Successfully','institutions.php');</script>";
		}
		else
		{
			echo "<script>warningMessage('Sorry! Unable to Delete Institute Detail. Try Again','noticeboard.php');</script>";
		}	
	}
?>
</html>