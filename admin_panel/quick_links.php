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
	$link_id = $_POST['link_id'];
	list($res_array) = exc_qry("select * from sms_footer_links where link_active = 0 order by link_id desc");
	list($edit_link) = exc_qry("SELECT * FROM sms_footer_links WHERE link_id = ".$link_id);
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
									<li class="breadcrumb-item active">Quick Links</li>
								</ol>
							</div>
							<h4 class="page-title">Quick Links</h4>
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
	        							<label class="col-form-label">Link Name</label>
	        								<input class="form-control" type="text" value="<?php echo htmlentities($edit_link[0]['link_name']); ?>" id="example-text-input" placeholder="Enter link Name ..." name="link_name" required="required" >
	        						</div>
	        						<div class="form-group">
	        							<label class="col-form-label">Link Url</label>
	        								<input class="form-control" type="url" value="<?php echo htmlentities($edit_link[0]['link_url']); ?>" id="example-text-input" placeholder="Enter url ..." name="link_url" required="required" >
	        						</div>
	        						<div class="form-group mb-4">
	        							<?php if (strlen($link_id)>0) 
	        							{ ?>
	        								<input type="hidden" name="link_id" value="<?php echo $link_id; ?>">
	        								<button type="submit" name="edit_link" class="btn btn-success px-4">Update Link</button>
	        								<button name="redirect" onclick="window.location = 'quick_links.php';" class="btn btn-danger px-4">Cancel</button>
	        							<?php } 
	        							else { ?>
	        							<button type="submit" name="add_link" class="btn btn-primary px-4">Add Link</button>
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
												<th>Name</th>
												<th>Url</th>
												<th colspan="2" class="text-center">Action</th>
												<th>Display</th>
											</tr>
										</thead>
										<tbody>
											<?php for ($i=0; $i < count($res_array) ; $i++) {
											 ?>
											<tr>
												<td><?php echo $i+1; ?></td>
												<td>
													<?php echo $res_array[$i]['link_name']; ?>
												</td>
												<td>
													<a href="<?php echo $res_array[$i]['link_url']; ?>" target="_blank"> Click Here To check </a>
												</td>
												<form method="post">
													<input type="hidden" name="link_id" value="<?php echo $res_array[$i]['link_id'] ;?>">
												<td><button  type="submit" class="btn btn-success">Edit Link</button></td>
												<td><button name="del_link"  type="submit" class="btn btn-danger" onclick="return confirm('Are you sure You want to delete Link ? \nYou will not be able to revert this!');">Delete Link</button></td>
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
// add link
if(isset($_POST['add_link']))
	{
		$name =  mysqli_real_escape_string($connect,$_POST['link_name']);
		$url =  mysqli_real_escape_string($connect,$_POST['link_url']);
		$ins_qry = "INSERT INTO sms_footer_links SET link_name =  '$name',link_url = '$url', link_add_date = now()";
			$res_qry = mysqli_query($connect,$ins_qry);
			if($res_qry)
			{
				echo "<script>successMessage('Link Added Successfully','quick_links.php');</script>";
			}
			else
			{
				echo "<script>warningMessage('Sorry! Link not added. Try Again','quick_links.php');</script>";
			}
	}

	//del link
	if(isset($_POST['del_link']))
	{
		$del_id = $_POST['link_id'];
		$del_qry = "UPDATE sms_footer_links SET link_active = 1 WHERE link_id = $del_id";
			$res_qry = mysqli_query($connect,$del_qry);
			if($res_qry)
			{
				echo "<script>successMessage('Link Deleted Successfully','quick_links.php');</script>";
			}
			else
			{
				echo "<script>warningMessage('Sorry! Link not Deleted. Try Again','quick_links.php');</script>";
			}
	}
	//edit links
	if(isset($_POST['edit_link']))
	{
		$edit_id = $_POST['link_id'];
		$name =  mysqli_real_escape_string($connect,$_POST['link_name']);
		$url =  mysqli_real_escape_string($connect,$_POST['link_url']);
		$ins_qry = "UPDATE sms_footer_links SET link_name =  '$name',link_url = '$url', link_edit_date = now() WHERE link_id = $edit_id";
			$res_qry = mysqli_query($connect,$ins_qry);
			if($res_qry)
			{
				echo "<script>successMessage('Link Updated Successfully','quick_links.php');</script>";
			}
			else
			{
				echo "<script>warningMessage('Sorry! Link not Updated! Try Again','quick_links.php');</script>";
			}
	}

	if(isset($_POST['redirect']))
	{
		
		redirect('quick_links.php');
	}

?>
</html>