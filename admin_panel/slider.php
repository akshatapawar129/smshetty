<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Smshetty</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
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
	$sli_id = $_POST['sli_id'];
	list($res_array) = exc_qry("select * from sms_slider_home where sms_img_active = 0 order by sms_slider_id desc");
	list($edit_img) = exc_qry("SELECT * FROM sms_slider_home WHERE sms_slider_id = ".$sli_id);
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
										<a href="index.php">Dashboard</a>
									</li>
									<li class="breadcrumb-item">
										<a href="javascript:void(0);">Home</a>
									</li>
									<li class="breadcrumb-item active">Slider Images</li>
								</ol>
							</div>
							<h4 class="page-title">Slider Images</h4>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
								<h5 class="mt-0">Slider Images</h5>
								<!-- <p class="text-muted font-13 mb-4">Your so fresh input file — Default version</p> -->
								<form method="post" enctype="multipart/form-data">
									<div class="form-group row">
	        							<div class="col-sm-12">
											<input type="file" name="slider_image" id="input-file-now" class="dropify" accept="image/jpeg,image/png" data-max-file-size="1M" required="required " 
											<?php if(strlen($sli_id)>0){
											 echo 'data-default-file="../images/slider/'.$edit_img[0]['sms_slider_img'].'"'; } ?> >
										</div>
									</div>
									
									<div class="form-group mb-4">
									<?php if (strlen($sli_id)>0) { ?>
										<input type="hidden" name="slid_id" value="<?php echo $sli_id; ?>">
										<button type="submit" name="edit_img" class="btn btn-primary px-5">Edit Image</button>
										<button class="btn btn-danger px-5" name="redirect" onclick="window.location = 'slider.php';" >Cancel</button>

									<?php } else { ?>

										<button type="submit" name="add_img" class="btn btn-primary px-4">Add Image</button>

									<?php } ?>
									
									<div class="form-group">
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<?php for ($i=0; $i < count($res_array); $i++) { ?>
						<div class="col-xl-6">
							<div class="card">
								<div class="card-header">
									<div class="text-sm-right">
										<form method="post">
											<input type="hidden" name="sli_id" value="<?php echo $res_array[$i]['sms_slider_id'] ?>">
											<button type="submit" name="del-img" onclick="return confirm('Are you sure You want to delete this image ? \nYou will not be able to revert this!');"><i class="fa fa-trash"></i></button>
											<button><i class="fa fa-pencil"></i></button>
										</form>
									</div>
								</div>
								<div class="card-body">
									<img src="../images/slider/<?php echo $res_array[$i]['sms_slider_img']; ?>" class="img-fluid card-img-top " >
								</div>
							</div>
						</div>
					<?php } ?>
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
<!-- Dropzone js -->
<script src="assets/plugins/dropzone/dist/dropzone.js"></script>
<script src="assets/plugins/dropify/js/dropify.min.js"></script>
<script src="assets/pages/jquery.dropzone.init.js"></script>
<!-- Sweet-Alert  -->
<script src="assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="assets/pages/jquery.sweet-alert.init.js"></script>
<script src="assets/js/custom.js"></script>
<!-- App js -->
<script src="assets/js/app.js"></script>

</body>
<?php 

	
	//add slider image
	if(isset($_POST['add_img']))
	{
		$img = $_FILES['slider_image'];
		$up_des = "../images/slider/";
		$resize_width = 750; //in pixel
		$resize_height = 350; // in pixel
		$imgNm = "slider_";
		$result = upload_image($img,$up_des,$resize_width,$resize_height,$imgNm);
		$extension = pathinfo($img['name'],PATHINFO_EXTENSION);
		$name = $imgNm.time().'.'. $extension;
		if($result=="success")
		{
			$ins_qry = "INSERT INTO sms_slider_home SET sms_slider_img =  '$name', sms_img_add_date = now()";
			$res_qry = mysqli_query($connect,$ins_qry);
			if($res_qry)
			{
				echo "<script>successMessage('Image Added Successfully','slider.php');</script>";
			}
			else
			{
				echo "<script>warningMessage('Sorry! Image not added. Try Again','slider.php');</script>";
			}
		}
	}

	//delete slider image
	if(isset($_POST['del-img']))
	{
		$sli_id = $_POST['sli_id'];
		$del_qry = "UPDATE sms_slider_home SET sms_img_active = 1 WHERE sms_slider_id = $sli_id";
		$res_qry = mysqli_query($connect,$del_qry);
		if ($res_qry) 
		{
			echo "<script>successMessage('Image Deleted Successfully','slider.php');</script>";
		} 
		else 
		{
			echo "<script>warningMessage('Sorry! Image not deleted. Try Again','slider.php');</script>";
		}
		
	}

	//edit slider img
	if (isset($_POST['edit_img'])) {
		$slid_id = $_POST['slid_id'];
		$img = $_FILES['slider_image'];
		$up_des = "../images/slider/";
		$resize_width = 750; //in pixel
		$resize_height = 350; // in pixel
		$imgNm = "slider_";
		$result = upload_image($img,$up_des,$resize_width,$resize_height,$imgNm);
		$extension = pathinfo($img['name'],PATHINFO_EXTENSION);
		$name = $imgNm.time().'.'. $extension;
		if($result=="success")
		{
			$upd_qry = "UPDATE sms_slider_home SET sms_slider_img =  '$name', sms_img_edit_date = now() WHERE sms_slider_id = $slid_id";
			echo $upd_qry;
			$res_qry = mysqli_query($connect,$upd_qry);
			if($res_qry)
			{
				echo "<script>successMessage('Image Updated Successfully','slider.php');</script>";
			}
			else
			{
				echo "<script>warningMessage('Sorry! Image not updated. Try Again','slider.php');</script>";
			}
		}
	} 
?>
</html>