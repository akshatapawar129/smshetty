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
	$notice_id = $_POST['noti_id'];
	list($res_array) = exc_qry("select * from sms_notice_board where notice_active = 0 order by notice_id desc");
	list($edit_notice) = exc_qry("SELECT * FROM sms_notice_board WHERE notice_id = ".$notice_id);
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
									<li class="breadcrumb-item active">Notice Board</li>
								</ol>
							</div>
							<h4 class="page-title">Notice Board</h4>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
								<?php 
								if (strlen($notice_id)>0) {
									$title = $edit_notice[0]['notice_title'];
									$attch = $edit_notice[0]['notice_attach'];//notice board attachement
									if (!strlen($attch)>0) {
										$attch = "Not Availble";
									}
									$ex_url = $edit_notice[0]['notice_url'];
								}
								?>
								<!-- <p class="text-muted font-13 mb-4">Your so fresh input file — Default version</p> -->
								<form method="post" enctype="multipart/form-data">
									<div class="form-group row">
	            						<div class="col-sm-12">
	            							<input class="form-control" type="text" value="<?php echo htmlentities($title); ?>" id="example-text-input" placeholder="Notice Title..." name="notice_title" >
	            						</div>
	            					</div>
	            					<div class="row">
										<div class="input-group mb-3  col-sm-6 col-sm-12">
											<div class="custom-file">
												<input type="file" class="custom-file-input" id="inputGroupFile04" accept="application/pdf"  name="file" > 
												<label class="custom-file-label" for="inputGroupFile04"> Choose file.. . (only pdf files) (upto 3 mb) </label>
											</div>
										</div>
										<?php if (strlen($notice_id)>0) { 
										echo '<h5 class="mt-0 col-md-12"> Attchment : 
										<a href="../upload/'.$attch.'" target="_blank"> 
											<span class="text-primary">'.$attch.' </span>
										</a></h5>';
										 } ?> 
									</div>
									<div class="form-group row">
	        							<div class="col-sm-12">
	        								<input class="form-control" type="url" value="<?php echo htmlentities($ex_url); ?>" id="example-text-input" placeholder="External Url (optional) ..." name="url">
	        							</div>
	        						</div>
	        						<div class="form-group mb-4">
	        							<?php if (strlen($notice_id)>0) 
	        							{ ?>
	        								<input type="text" name="noti_id" value="<?php echo $notice_id; ?>">
	        								<button type="submit" name="edit_notice" class="btn btn-success px-4">Edit Notice</button>
	        								<button name="redirect" onclick="window.location = 'noticeboard.php';" class="btn btn-danger px-4">Cancel</button>
	        							<?php } 
	        							else { ?>
	        							<button type="submit" name="add_notice" class="btn btn-primary px-4">Add Notice</button>
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
								<h5 class="mt-0">Notice Board</h5>
								<div class="table-responsive">
									<table id="datatable" class="table table-bordered">
										<thead>
											<tr>
												<th>Sr.No</th>
												<th>Title</th>
												<th>Pdf/url</th>
												<th colspan="2" class="text-center">Action</th>
												<th>Display</th>
											</tr>
										</thead>
										<tbody>
											<?php for ($i=0; $i < count($res_array) ; $i++) {
												if (strlen($res_array[$i]['notice_url'])>0) {
													$url = $res_array[$i]['notice_url'];
												}
												else
												{
													$url = "../upload/".$res_array[$i]['notice_attach'];
												}
											 ?>
											<tr>
												<td><?php echo $i+1; ?></td>
												<td><?php echo $res_array[$i]['notice_title']; ?></td>
												<td>
													<a href="<?php echo $url; ?>" target="_blank">Click Here To Check Attchment/External Url</a>
												</td>
												<form method="post">
													<input type="hidden" name="noti_id" value="<?php echo $res_array[$i]['notice_id']; ?>">
												<td>
													<button type="submit" class="btn btn-success px-4">Edit Notice</button>
												</td>
												<td>
													<button type="submit" name="del_notice" class="btn btn-danger px-4">Delete Notice</button>
												</td>
												</form>
												<td>
													<?php 
													if ($i<5) 
													{
														echo '<span class="text-success"><i class = "fa fa-check"></i></span>';
													}
													else
													{
														echo '<span class="text-danger"><i class = "fa fa-times"></i></span>';
													} ?>
													
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
	if(isset($_POST['add_notice'])) 
	{
		$notice_title = mysqli_real_escape_string($connect,$_POST['notice_title']);
		$file = $_FILES['file'];
		$url = mysqli_real_escape_string($connect,$_POST['url']);
		if((strlen($file['name'])>0) || (strlen($url)>0)) //if file is uploaded or valid url is entered
		{
			if (strlen($file['name'])>0) //if file is uploaded
			{
				if ($file['size']>3145728) 
				{ // if file is greater then 3mb 
					echo "<script>swal('','Please Upload file less than 3 mb','warning');</script>";
				}
				else //
				{
					$extension = pathinfo($file['name'],PATHINFO_EXTENSION);
					$tmp_name = $file['tmp_name'];
					$up_desti = "../upload/";
					$name = "notice_".time().'.'.$extension;
					if(move_uploaded_file($tmp_name, $up_desti.$name))
					{
						$ins_qry = "INSERT INTO sms_notice_board SET notice_title = '$notice_title', notice_attach = '$name', notice_add_date = now()";
					}
					else
					{
						echo "<script>swal('','File Upload Failed','warning');</script>";
					}
				}
			}
			else // if url is entered
			{
				$ins_qry = "INSERT INTO sms_notice_board SET notice_title = '$notice_title', notice_url = '$url',notice_add_date = now()";
			}

			$res_qry = mysqli_query($connect,$ins_qry);
			if ($res_qry) 
			{
				echo "<script>successMessage('Notice Added Successfully','noticeboard.php');</script>";
			}
			else
			{
				echo "<script>swal('','Sorry! Unable to Add notice . Try Again','warning');</script>";
			}
		}
		else
		{
			echo "<script>swal('','Please upoload file or enter optional url','warning');</script>";
		}
		
	}

	//delete notice
	if (isset($_POST['del_notice'])) 
	{
		$del_id = $_POST['noti_id'];
		$del_qry = "UPDATE sms_notice_board SET notice_active = 1 WHERE notice_id = $del_id";
		$res_qry = mysqli_query($connect,$del_qry);
		if ($res_qry) 
		{
			echo "<script>successMessage('Notice Deleted Successfully','noticeboard.php');</script>";
		}
		else
		{
			echo "<script>swal('','Sorry! Unable to Delete notice . Try Again','warning');</script>";
		}	
	}

	// cancel edit
	if (isset($_POST['redirect'])) 
	{
		redirect('noticeboard.php');
	}

	//edit notice
	if (isset($_POST['edit_notice'])) 
	{	
		$notice_id = $_POST['noti_id'];
		$notice_title = mysqli_real_escape_string($connect,$_POST['notice_title']);
		$file = $_FILES['file'];
		$url = mysqli_real_escape_string($connect,$_POST['url']);
		if((strlen($file['name'])>0) || (strlen($url)>0)) //if file is uploaded or valid url is entered
		{
			if (strlen($file['name'])>0) //if file is uploaded
			{
				if ($file['size']>3145728) 
				{ // if file is greater then 3mb 
					echo "<script>swal('','Please Upload file less than 3 mb','warning');</script>";
				}
				else //
				{
					$extension = pathinfo($file['name'],PATHINFO_EXTENSION);
					$tmp_name = $file['tmp_name'];
					$up_desti = "../upload/";
					$name = "notice_".time().'.'.$extension;
					if(move_uploaded_file($tmp_name, $up_desti.$name))
					{
						$upd_qry = "UPDATE sms_notice_board SET notice_title = '$notice_title', notice_edit_date = now(), notice_url = '$url', notice_attach = '$name' WHERE notice_id = $notice_id";
					}
					else
					{
						echo "<script>swal('','File Upload Failed','warning');</script>";
					}
				}
			}
			else // if url is entered
			{
				$upd_qry = "UPDATE sms_notice_board SET notice_title = '$notice_title', notice_edit_date = now(), notice_url = '$url' WHERE notice_id = $notice_id";
			}

			$res_qry = mysqli_query($connect,$upd_qry);
			if ($res_qry) 
			{
				echo "<script>successMessage('Notice Updated Successfully','noticeboard.php');</script>";
			}
			else
			{
				echo "<script>swal('','Sorry! Unable to Update notice . Try Again','warning');</script>";
			}
		}
		else
		{
			echo "<script>swal('','Please upoload file or enter optional url','warning');</script>";
		}	
	}

?>
</html>