<!DOCTYPE html><html lang="en">
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
	  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>

		<!-- Top Bar End -->
		<div class="page-wrapper">

		<!-- Page Content-->
		<div class="page-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 col-lg-4"></div>
					<div class="col-md-12 col-lg-4">
						<div class="card">
							<div class="card-body">
								<h4 class="mt-20 text-center">Login</h4>
								<p class="text-muted font-13 mb-4"></p>
								<form method="post">
									<div class="form-group"><label for="Username" class="col-form-label">Username </label>
										<div class="">
											<input class="form-control" name="username" type="text" value="" id="Username" placeholder="Username" required="required">
										</div>
									</div>
									<div class="form-group">
										<label for="Password" class="col-form-label">Password</label>
										<div class="">
											<input class="form-control" name="password" type="password" id="Password" placeholder="Password" required="required">
										</div>
									</div>
									<div class="form-group">
                    					<div class="g-recaptcha" data-sitekey="6LfkY3YUAAAAABWV4csQowhkcYk6ENIGwd6tvbPN"></div>
                					</div>
									<button type="submit" name="login" class="btn btn-primary px-4">Login</button>
								</form>
							</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-4"></div>
				</div>
					<!-- container -->
					<footer class="footer text-center text-sm-left">
						&copy; 2018 Bunts Sangha's S.M.Shetty College of Science, Commerce & Management Studies. 
						<span class="text-muted d-none d-sm-inline-block float-right"> </span>
					</footer>
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
			<!-- App js -->
			<script src="assets/js/app.js"></script>
						<script type="text/javascript">
							$( document ).ready(function() {
						  // swal("","You won't be able to revert this!","warning")
						});
			</script>
</body>
<?php 
    include 'connection.php';

    if(isValiduser())  
    { 
        redirect("index.php");
    }

    if(isset($_POST['login']))
    {   
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
        {
            $us_nm = trim(mysqli_real_escape_string($connect,$_POST['username']));
            $ps_wd = trim(mysqli_real_escape_string($connect,$_POST['password']));
            //your site secret key
            $secret = '6LfkY3YUAAAAACM6t6no2DB4uwQKMVkPSi2HHe6Y';
            //get verify response data
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
            $responseData = json_decode($verifyResponse);
            if($responseData->success) 
            {
                if((!strlen($us_nm)>0) || (!strlen($ps_wd)>0))
                {
                    echo "<script>swal('','Please fill mandatory fields','warning');</script>";
                }
                else
                {
                    $login_check = loginchk($us_nm,$ps_wd);
                    if($login_check==0)
                    {
                        redirect('index.php');
                    }
                    elseif($login_check==1)
                    {
                        echo "<script>swal('','Invalid UserName/ Password. Try Again','warning');</script>";
                    }
                    elseif ($login_check==2) {
                        echo "<script>swal('','Error in updating details. Refresh and Try Again','warning');</script>";
                    }
                    else{
                        echo "<script>swal('','Error','warning');</script>";
                    }
                } 
            }
            else
            {
                echo "<script>swal('','Robot verification failed, please try again.','warning');</script>";
            }
        }
        else
        {
            echo "<script>swal('','Please click on the reCAPTCHA box','warning');</script>";
        }
    }
 ?>
</html>