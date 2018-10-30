
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- Page Title -->
	<title>S.M. Shetty College</title>
	<!--Fevicon-->
	<link rel="icon" href="assets/img/icon/favicon.ico" type="image/x-icon" />
	<!-- Bootstrap css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- linear-icon -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/linear-icon.css">
    <!-- all css plugins css -->
    <link rel="stylesheet" href="assets/css/plugins.css">
    <!-- default style -->
    <link rel="stylesheet" href="assets/css/default.css">
    <!-- Main Style css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="assets/css/responsive.css">

    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:200,300,400,600,700,800,900" rel="stylesheet"> 
</head>
<body>
	<!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- header area start -->
    <?php include 'header.php'; ?>
    <!-- header area end -->

    <!-- slider area start -->
    <div class="banner-area">
       <div class="container-fluid no-pad">
            <div class="row">
               
                <div class="col-lg-9 col-md-12 no-pad">
                    <div class="slider">
                    	<?php 
                    	list($slider) = exc_qry("SELECT * FROM `sms_slider_home` WHERE sms_img_active = 0 ORDER BY sms_slider_id DESC");
                    	for ($i=0; $i < count($slider) ; $i++) { 
                    	 ?>
						<img src="images/slider/<?php echo $slider[$i]['sms_slider_img']; ?>" />
						<?php } ?>
					</div>
                </div>
                
                
                
                
                <div class="col-lg-3 col-md-12 no-pad">
                <div class="continue-scroll">

               <div class="menu-item-details bg-red">
               <h2><a href="#">NOTICE BOARD</a></h2>                          
               </div>

               <div class="scrolling-text">
				  <ul>
				  <?php 
				  list($notice) = exc_qry("SELECT * FROM `sms_notice_board` WHERE notice_active = 0 ORDER BY notice_id DESC");
                    	for ($i=0; $i < count($notice) ; $i++) { 
                    		if (strlen($notice[$i]['notice_url'])>0) {
                    			$url = $notice[$i]['notice_url'];
                    		}
                    		else
                    		{
                    			$url = "upload/".$notice[$i]['notice_attach'];
                    		}
				   ?>
				    <li><a href="<?php echo $url; ?>" target="_blank"><?php echo $notice[$i]['notice_title'] ?></a></li>
				<?php } ?>
				    
				  </ul>
              
               </div>
               
                
                
                
                </div>
                </div>
            </div>
            </div>

    </div>
    <!-- slider area end -->

    <!-- main wrapper start -->
    <div class="home2-main-wrapper pt-60 pb-30">
       <section class="welcome-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-title text-left mb-10">
                        <h2 class="home-text text-center">Welcome to <span style="color: #00a1df;">S.M. Shetty College</span></h2>
                        </div>
                        <p>Bunt's Sangha's S.M. Shetty College of Science, Commerce and Management Studies is committed to the promotion and propagation of quality education with excellence. The main focus is to impart domain specific knowledge, flexible skill mix, positive attitudes, ethically sound values and continuous learning habits through reflective thinking in a student.</p>
                    </div>
                </div>
            </div>
       
         </section>
           
       <section class="missionbox clearfix">
              <div class="container-fluid">
              <div class="row">
              
               <div class="col-lg-4 col-md-6 col-sm-6 clearfix">
                    <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
	    <div class="flipper">
		<div class="front">
        <img src="assets/img/vision.jpg"/>
		OUR MISSION
		</div>
        
		<div class="back">
			<div class="back-logo">OUR MISSION</div>
            <div class="back-title">Personality development for Nation building <br><br></div>
            <div class="back-btn"><a href="#">Read More</a></div>
		</div>
	</div>
</div>
                </div>
                
               <div class="col-lg-4 col-md-6 col-sm-6 clearfix">
                    <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
	    <div class="flipper">
		<div class="front">
        <img src="assets/img/mission1.jpg"/>
		OUR MISSION
		</div>
        
		<div class="back">
			<div class="back-logo">OUR VISION</div>
            <div class="back-title">“India is on its growth path of developing through different industries and agriculture.”</div>
            <div class="back-btn"><a href="#">Read More</a></div>
		</div>
	</div>
</div>
                </div> 
                
               <div class="col-lg-4 col-md-6 col-sm-6 clearfix">
                    <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
	    <div class="flipper">
		<div class="front">
        <img src="assets/img/values.jpg"/>
		OUR MISSION
		</div>
        
		<div class="back">
			<div class="back-logo">OUR CORE VALUES</div>
            <div class="back-title">Continuous growth of our students through continuous growth of teachers.<br><br></div>
            <div class="back-btn"><a href="#">Read More</a></div>
		</div>
	</div>
</div>
                </div>
                
                
                
            </div>
              </div>
            </section>
            
       <section class="home-dynamic">
     <div class="container-fluid">
            <div class="row">
            
    <div class="col-lg-4 col-md-6 col-sm-6 events">
     <div class="menu-item-details">
      <h2><a href="#">UPCOMING EVENTS</a></h2>                          
    </div>
    
    
    
    
    
    
    
    <div class="eventdescription">
    
    <p><a href="#">There are no upcoming events at this time.</a></p>
    
    <p><a href="#">There are no upcoming events at this time.</a></p>
    
    <p><a href="#">There are no upcoming events at this time.</a></p>
    
    </div>
    </div>
    
     <div class="col-lg-4 col-md-6 col-sm-6 news">
     
     <div class="menu-item-details">
      <h2><a href="#">NEWS</a></h2>                          
    </div>

    <div class="upcoming-news">
    
    <div class="newsone">
    <div class="fusion-date-box">
    <span class="news-date">5</span>
    <span class="news-month-year">30-05-2017</span> </div>
   
    
	<div class="recent-posts-content">
		<h4 class="entry-title"><a href="#">Nature Club Trip</a></h4>
        <p>A visit to the butterfly garden, OWALEKAR WADI, was conducted by the....</p></div>		
							
    </div>
    
    
        <div class="newsone">
    <div class="fusion-date-box">
    <span class="news-date">5</span>
    <span class="news-month-year">30-05-2017</span> </div>
   
    
	<div class="recent-posts-content">
		<h4 class="entry-title"><a href="#">Nature Club Trip</a></h4>
        <p>A visit to the butterfly garden, OWALEKAR WADI, was conducted by the....</p></div>		
							
    </div>
    
    </div>
    
    
     </div>
     

      <div class="col-lg-4 col-md-6 col-sm-6 desk">
      <div class="menu-item-details">
      <h2><a href="#">FROM THE PRINCIPAL'S DESK</a></h2>                          
    </div>
      
      <div class="principalmesg">
      
      
      <p><img src="assets/img/principal.jpg"/>Bunts Sangha’s S.M. Shetty College of Science, Commerce &amp; Management Studies, Powai,  is committed to promote and propagate quality education with relevance and excellence. Sangha’s overall philosophy is based on ideological underpinnings and a holistic context.</p>
      <a class="eventdescriptionbtn" href="#">Read More</a>
      
      </div>
      
      
      
      </div>
                
    
    </div>
    </div>
    </section>
    
   <section class="facilities-main clearfix">
	  <div class="container-fluid">
	    <div class="row">
	      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="section-title text-left mb-10">
                <h2 class="home-text text-center"><span style="color: #ffffff;">OUR</span> <span style="color: #00a1df;">FACILITIES</span></h2>
            </div>
          </div>
           <?php list($facilities) = exc_qry("SELECT * FROM `sms_facilities` WHERE fac_active = 0 ORDER BY fac_id ");
                    	for ($i=0; $i < count($facilities) ; $i++) {  ?>         
          <div class="col-lg-4 col-md-6 col-sm-4">
            <div class="facilities">
                <div class="imageframe-align-center"><img src="images/facilities/<?php echo $facilities[$i]['fac_img']; ?>" alt="" title=""></div>
                <div class="facility-text">
               <h4 class="home-text"><?php echo $facilities[$i]['fac_title']; ?></h4>
                <p><?php echo $facilities[$i]['fac_desc']; ?></p>
                </div>
            </div>                    
          </div> 
      	<?php } ?>

     	</div>
     </div>

	</section>
    
       <section class="institutions-section clearfix">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-title text-center mb-10">
                       <h2 class="home-text">OUR <span style="color: #00a1df;">INSTITUTIONS</span></h2>
                    </div>
                </div>

                <?php list($institution) = exc_qry("SELECT * FROM `sms_institute` WHERE inst_active = 0 ORDER BY inst_id ");
                    	for ($i=0; $i < count($institution) ; $i++) {  ?>
              	<div class="col-lg-3 col-md-3 col-sm-3">
                     <div class="institution " style="background-color:<?php echo $institution[$i]['inst_color']; ?>" >
                     <div class="institution-logo"> <img src="images/icon/<?php echo $institution[$i]['inst_icon']; ?>"/></div>
                     <div class="institution-text">
                     <div class="institution-title"><?php echo $institution[$i]['inst_name']; ?></div>
                     <p><?php echo $institution[$i]['inst_desc'] ?></p>
                     </div>
                     </div>
                </div> 
            <?php } ?>
   
           
            </div>
        </div>
  
         </section>
    
        
    </div>
    <!-- main wrapper end -->


    <!-- scroll to top -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div> <!-- /End Scroll to Top -->

    <!-- footer area start -->  
    <?php include 'footer.php'; ?>
    <!-- footer area end -->


	<!-- all js include here -->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/ajax-mail.js"></script>
    <script src="assets/sss/sss.min.js"></script>
    <link rel="stylesheet" href="assets/sss/sss.css" type="text/css" media="all">
    <script type='text/javascript' src='assets/js/jquery.vticker.min.js'></script>
<script>
jQuery(function($) {
$('.scrolling-text').vTicker();
$('.slider').sss();

});


</script>

</body>
</html>