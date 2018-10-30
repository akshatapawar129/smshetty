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
	        								<input class="form-control" type="text" value="" id="example-text-input" placeholder="Enter Title ..." name="news_title" required="required" >
	        						</div>
									<div class="form-group">
	        							<label class="col-form-label">News Date</label>
	        								<input class="form-control" type="date" value="" id="example-text-input"  name="news_date" required="required" >
	        						</div>
	        						<div class="form-group">
	        							<label class="col-form-label">News Description</label>
										  	<textarea name="news_desc" id="editor" placeholder=" News Description....">
									          
									        </textarea>

	        						</div>

									<div class="form-group mb-4">
										<?php if (strlen($inst_id)>0) { ?>
										<input type="hidden" name="news_id" value="<?php echo $news_id; ?>">
										<button type="submit" name="edit_inst"  class="btn btn-primary px-5">Update Details</button>
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
		$desc =  mysqli_real_escape_string($connect,$_POST['news_desc']);
		$n_date = mysqli_real_escape_string($connect,$_POST['news_date']);

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

?>
</html>

