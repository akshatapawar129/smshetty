<footer>
   
        <!-- footer top area start -->
        <div class="footer-top pt-50 pb-50">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-single-widget">
                            <div class="widget-title">
                            <h4>About us</h4>
                               
                            </div>
                            <div class="widget-body">
                                <p>Bunt’s Sangha’s S.M. Shetty College of Science, Commerce and Management studies is committed to promote and propagate quality education with relevant excellence. <br> <a href="#">Read More....</a></p>
                               
                                
                            </div>
                        </div>
                    </div> <!-- single widget end -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-single-widget">
                            <div class="widget-title">
                                <h4>Quick Links</h4>
                            </div>
                            <div class="widget-body">
                                <div class="footer-useful-link">
                                     
                                    <ul>
                                        <?php list($quick_links) = exc_qry("SELECT * FROM `sms_footer_links` WHERE link_active = 0 ORDER BY link_id desc");
                                    for ($i=0; $i < count($quick_links) ; $i++) {  ?>
                                        <li><a href="<?php echo $quick_links[$i]['link_url']; ?>"><?php echo $quick_links[$i]['link_name']; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> <!-- single widget end -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-single-widget">
                            <div class="widget-title">
                                <h4>Gallery</h4>
                            </div>
                            <div class="widget-body">
                                <ul class="flicker-img">
								<li><a href="#"><img src="assets/img/home-gallery/img-01.jpg" alt=""></a></li>
								<li><a href="#"><img src="assets/img/home-gallery/img-02.jpg" alt=""></a></li>
								<li><a href="#"><img src="assets/img/home-gallery/img-03.jpg" alt=""></a></li>
								<li><a href="#"><img src="assets/img/home-gallery/img-04.jpg" alt=""></a></li>
								<li><a href="#"><img src="assets/img/home-gallery/img-05.jpg" alt=""></a></li>
								<li><a href="#"><img src="assets/img/home-gallery/img-06.jpg" alt=""></a></li>
							</ul>
                            <a class="text-right" href="#">View More....</a>
                            </div>
                        </div>
                    </div>
                    
                     <div class="col-lg-3 col-md-6 col-sm-6" id="footcontact">
                        <div class="footer-single-widget">
                            <div class="widget-title">
                                <h4>Contact Info</h4>
                            </div>
                            <div class="widget-body">
                                <div class="footer-useful-link">
                               <p><strong>Bunts Sangha’s S.M.Shetty College of Science, Commerce & Management Studies</strong></p>
                                    <ul>
                                        <li><span>Address:</span> <?php echo $one_time[0]['con_add']; ?></li>
                                        <li><span>email:</span> <a href="mailto:<?php echo $one_time[0]['con_mail']; ?>"><?php echo $one_time[0]['con_mail']; ?></a></li>
                                        <li><span>Phone:</span> <?php echo $one_time[0]['con_phone']; ?></li>
                                        <li><span>Fax:</span> <?php echo $one_time[0]['con_fax']; ?></li>
                                        <li><span>Website:</span><a href="http://smshettycollege.edu.in/">www.smshettycollege.edu.in</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- single widget end -->
                </div>
            </div>
        </div>
        <!-- footer top area end -->
        <!-- footer bottom area start -->
        <div class="footer-bottom">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-bottom-content">
                            <div class="footer-copyright">
                            <p>© Copyright <script>document.write(new Date().getFullYear());</script>. <a href="#"> Bunts Sangha's S.M.Shetty College of Science, Commerce & Management Studies.</a>  All Right Reserved | Website Designed & Developed by <a href="http://trinityglobalservices.co.in/" target="_blank">Trinity Global Services</a></p>
                            </div>   
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer bottom area end -->
    </footer>