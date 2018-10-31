<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Smshetty</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<!--Sweet alert-->
	<link href="assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

	<!-- DataTables -->
	<link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
	<link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
	<!-- Responsive datatable examples -->
	<link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">	

	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css">
	<link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/style.css" rel="stylesheet" type="text/css">
	<script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
</head>
<body>
<?php include 'connection.php'; 
	if (!isValiduser()) 
	{
		redirect("login.php");
	}
	list($res_array) = exc_qry("select * from sms_news where news_active = 0 order by news_id desc");
	$news_id = $_POST['news_id'];
	list($edit_news) = exc_qry("SELECT * FROM sms_news WHERE news_id = ".$news_id);
	//echo count($edit_news);
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
									<li class="breadcrumb-item active">News</li>
								</ol>
							</div>
							<h4 class="page-title">News</h4>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
								<h5 class="mt-0">News</h5>
								<!-- <p class="text-muted font-13 mb-4">Your so fresh input file — Default version</p> -->
								<form method="post">
									<div class="form-group">
	        							<label class="col-form-label">News Title</label>
	        								<input class="form-control" type="text" value="<?php echo htmlentities($edit_news[0]['news_title']); ?>" id="example-text-input" placeholder="Enter Title ..." name="news_title" required="required" >
	        						</div>
									<div class="form-group">
	        							<label class="col-form-label">News Date</label>
	        								<input class="form-control" type="date" value="<?php echo $edit_news[0]['news_date']; ?>" id="example-text-input"  name="news_date" required="required" >
	        						</div>
	        						<div class="form-group">
	        							<label class="col-form-label">News Description</label>
										  	<textarea name="news_desc" id="editor" placeholder=" News Description....">
									          <?php echo htmlentities($edit_news[0]['news_desc']); ?>
									        </textarea>

	        						</div>

									<div class="form-group mb-4">
										<?php if (strlen($news_id)>0) { ?>
										<input type="hidden" name="news_id" value="<?php echo $news_id; ?>">
										<button type="submit" name="edit_news"  class="btn btn-primary px-5">Update Details</button>
										<button class="btn btn-danger px-5" name="redirect" onclick="window.location = 'news.php';" >Cancel</button>

									<?php } else { ?>
										<button type="submit" name="add_news" class="btn btn-primary px-4">Add News</button>
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
								<h5 class="mt-0">News</h5>
								<div class="table-responsive">
									<table id="datatable" class="table table-bordered">
										<thead>
											<tr>
												<th>Sr.No</th>
												<th>Title</th>
												<th>Description</th>
												<th>Date</th>
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
													<?php echo $res_array[$i]['news_title']; ?>
												</td>
												<td>
													<?php echo $res_array[$i]['news_desc']; ?>
												</td>
												<td>
													<?php echo date("Y-m-d",strtotime($res_array[$i]['news_date'])); ?>
												</td>
												<form method="post">
													<input type="hidden" name="news_id" value="<?php echo $res_array[$i]['news_id'] ;?>">
												<td><button  type="submit" class="btn btn-success">Edit news</button></td>
												<td><button name="del_news"  type="submit" class="btn btn-danger" onclick="return confirm('Are you sure You want to delete this News ? \nYou will not be able to revert this!');">Delete News</button></td>
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
			<script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
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

// add newsx
if(isset($_POST['add_news']))
	{
		$title =  mysqli_real_escape_string($connect,$_POST['news_title']);
		$desc =  trim(mysqli_real_escape_string($connect,$_POST['news_desc']));
		$n_date = mysqli_real_escape_string($connect,$_POST['news_date']);

		if (strlen($desc) > 0 && $desc != "<p>&nbsp;</p>") {
			$ins_qry = "INSERT INTO sms_news SET news_title =  '$title', news_desc = '$desc', news_date = '$n_date', news_add_date = now()";
			$res_qry = mysqli_query($connect,$ins_qry);
			if($res_qry)
			{
				echo "<script>successMessage('News Added Successfully','news.php');</script>";
			}
			else
			{
				echo "<script>warningMessage('Sorry! News not added. Try Again','news.php');</script>";
			}
		}
		else
		{
			echo "<script>swal('','Please Fill News Description','warning');</script>";
		}
		
	}

	//redirect
	if(isset($_POST['redirect']))
	{
		redirect('news.php');
	}

	//del news
	if(isset($_POST['del_news']))
	{
		$del_id = $_POST['news_id'];
		$del_qry = "UPDATE sms_news SET news_active = 1 WHERE news_id = $del_id";
			$res_qry = mysqli_query($connect,$del_qry);
			if($res_qry)
			{
				echo "<script>successMessage('News Deleted Successfully','news.php');</script>";
			}
			else
			{
				echo "<script>warningMessage('Sorry! news not Deleted. Try Again','news.php');</script>";
			}
	}

	if (isset($_POST['edit_news'])) {
		$edit_id = $_POST['news_id'];
		$title =  mysqli_real_escape_string($connect,$_POST['news_title']);
		$desc =  trim(mysqli_real_escape_string($connect,$_POST['news_desc']));
		$n_date = mysqli_real_escape_string($connect,$_POST['news_date']);

		if (strlen($desc) > 0 && $desc != "<p>&nbsp;</p>") {
			$upd_qry = "UPDATE sms_news SET news_title =  '$title', news_desc = '$desc', news_date = '$n_date', news_edit_date = now() WHERE news_id = $edit_id";
			$res_qry = mysqli_query($connect,$upd_qry);
			if($res_qry)
			{
				echo "<script>successMessage('News Updated Successfully','news.php');</script>";
			}
			else
			{
				echo "<script>warningMessage('Sorry! News not Updated. Try Again','news.php');</script>";
			}
		}
		else
		{
			echo "<script>swal('','Please Fill News Description','warning');</script>";
		}
	}
?>
</html>

