<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="pt-br">
<?php
//Load header
$this->load->view("header");
?>
    <body>
        <header class="clearfix">
            <?php
            //Load menu navigation layout
            $this->load->view("navigation");
            ?>
        </header>
        
        <?php
        $this->load->view("banner_view");
        $this->load->view("about_view");
        $this->load->view("comments_view");
        $this->load->view("team_view");
        $this->load->view("level_view");
        ?>
        
        
        
        


        <?php
        /*
        <!-- Start Call to Action Section -->
        <section class="call-to-action">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 wow zoomIn" data-wow-duration="2s" data-wow-delay="300ms">
                        <p>Awesome Aires Template is ready for <br> Business, Agency, Landing or Creative Portfolio<br>Aires is Responsive and help you to grow your business</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Call to Action Section -->
        */
        ?>
        
        
        
        
        <!-- Start Service Section -->
        <section id="service-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay="50ms">
                            <h2>Our Services</h2>
                            <p>Duis aute irure dolor in reprehenderit in voluptate</p>
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="services-post">
				            <a href="#"><i class="fa fa-skyatlas"></i></a>
				            <h2>RESPONSIVE DESIGN</h2>
							<p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
				        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="services-post">
				            <a href="#"><i class="fa fa-magic"></i></a>
				            <h2>RESPONSIVE DESIGN</h2>
							<p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
				        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="services-post">
				            <a href="#"><i class="fa fa-gift"></i></a>
				            <h2>RESPONSIVE DESIGN</h2>
							<p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
				        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="services-post">
				            <a href="#"><i class="fa fa-diamond"></i></a>
				            <h2>RESPONSIVE DESIGN</h2>
							<p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
				        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="services-post">
				            <a href="#"><i class="fa fa-wordpress"></i></a>
				            <h2>RESPONSIVE DESIGN</h2>
							<p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
				        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="services-post">
				            <a href="#"><i class="fa fa-forumbee"></i></a>
				            <h2>RESPONSIVE DESIGN</h2>
							<p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
				        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="services-post">
				            <a href="#"><i class="fa fa-bicycle"></i></a>
				            <h2>RESPONSIVE DESIGN</h2>
							<p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
				        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="services-post">
				            <a href="#"><i class="fa fa-foursquare"></i></a>
				            <h2>RESPONSIVE DESIGN</h2>
							<p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
				        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Start Service Section -->
            
        <!-- Start Client Section -->
        <div id="client-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="client-box">
                            <ul class="client-list">
                                <li><a href="#"><img src="<?=base_url("assets/landing/images/clients/client1.png");?>" class="img-responsive" alt="Clients Logo"></a></li>
                                <li><a href="#"><img src="<?=base_url("assets/landing/images/clients/client2.png");?>" class="img-responsive" alt="Clients Logo"></a></li>
                                <li><a href="#"><img src="<?=base_url("assets/landing/images/clients/client3.png");?>" class="img-responsive" alt="Clients Logo"></a></li>
                                <li><a href="#"><img src="<?=base_url("assets/landing/images/clients/client4.png");?>" class="img-responsive" alt="Clients Logo"></a></li>
                                <li><a href="#"><img src="<?=base_url("assets/landing/images/clients/client5.png");?>" class="img-responsive" alt="Clients Logo"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Client Section -->
<?php
//Load footer layout
$this->load->view("footer");
?>
<script>
$(document).ready(function() {
    $("#carousel").owlCarousel({
        slideSpeed : 500,
        paginationSpeed : 600,
        singleItem: true,
        pagination: false,
        rewindSpeed: 200,
        autoPlay:true,
        autoPlayTimeout:5,
        
    });

});
</script>

    
</body>
</html>