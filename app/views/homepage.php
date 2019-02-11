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
        <!-- Start Header Section -->
        <div class="owl-carousel" id="carousel" align="center">    
            <?php
            if ($banner) {
                foreach ($banner as $ban) {
                    ?>
                    <div class="banner owl-slide"
                    style="background: url(<?=base_url("repository/banner_homepage/").$ban->image;?>) no-repeat;
                    background-position:50% 50%; background-size:cover;">
                        <div class="overlay">
                            <div class="container">
                                <div class="intro-text">
                                    <h1><span><?=(!empty($company[0]->name))?$company[0]->name:"";?></span></h1>
                                    <p><?=(!empty($ban->text))?$ban->text:"";?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                ?>
                <!-- Start Header Section -->
                <div class="banner owl-slide">
                    <div class="overlay">
                        <div class="container">
                            <div class="intro-text">
                                <h1><span>Nome da empresa / Altere em Admin/Empresa</span></h1>
                                <p>Texto exemplo, altere em Admin/Banner</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <!-- End Header Section -->
        
        <!-- Start About Us Section -->
        <section id="about-section" class="about-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay="50ms">
                            <h2>A empresa</h2>
                        </div>          
                        <!-- Set up your HTML -->
                    </div>
                </div>
                <div class="row">
                    <?php
                    if (
                        isset($about[0]->caption) &&
                        !empty($about[0]->caption)
                    ) {
                        ?>
                        <div class="col-md-5">
                            <div class="about-img">
                                <img src="<?=base_url("repository/about/".$about[0]->image);?>"
                                class="img-responsive" alt="A empresa, sobre a empresa">
                                    <div class="head-text">
                                        <p><?=$about[0]->caption;?></p>
                                    </div>
                            </div>
                        </div>
                    <?php
                    }
                    if (
                        isset($about[0]->text) &&
                        !empty($about[0]->text)
                    ) {
                        ?>
                        <div class="col-md-7">
                            <div class="about-text">
                                <?=$about[0]->text;?>
                            </div>   
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </section>
        
        
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
        
        
        
        
        <!-- Start Team Member Section -->
        <section id="team-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay="50ms">
                            <h2>Our Team</h2>
                            <p>Duis aute irure dolor in reprehenderit in voluptate</p>
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="300ms">
                        <div class="team-member">
                            <img src="<?=base_url("assets/landing/images/team/team-1.jpg");?>" class="img-responsive" alt="">
                            <div class="team-details">
                                <h4>John Doe</h4>
                                <p>Founder & Director</p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- /.col-md-3 -->
                    <div class="col-md-3 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="600ms">
                        <div class="team-member">
                            <img src="<?=base_url("assets/landing/images/team/team-2.jpg");?>" class="img-responsive" alt="">
                            <div class="team-details">
                                <h4>John Doe</h4>
                                <p>Founder & Director</p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- /.col-md-3 -->
                    <div class="col-md-3 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="900ms">
                        <div class="team-member">
                            <img src="<?=base_url("assets/landing/images/team/team-3.jpg");?>" class="img-responsive" alt="">
                            <div class="team-details">
                                <h4>John Doe</h4>
                                <p>Founder & Director</p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- /.col-md-3 -->
                    <div class="col-md-3 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="1200ms">
                        <div class="team-member">
                            <img src="<?=base_url("assets/landing/images/team/team-4.jpg");?>" class="img-responsive" alt="">
                            <div class="team-details">
                                <h4>John Doe</h4>
                                <p>Founder & Director</p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- /.col-md-3 -->
                </div>
            </div>
        </section>
        <!-- End Team Member Section -->
        
        
        <!-- Start Portfolio Section -->
        <section id="portfolio" class="portfolio-section-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay="50ms">
                            <h2>Our Portfolio</h2>
                            <p>Duis aute irure dolor in reprehenderit in voluptate</p>
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        
                        <!-- Start Portfolio items -->
                        <ul id="portfolio-list">
                            <li class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay="300ms">
                                <div class="portfolio-item">
                                    <img src="<?=base_url("assets/landing/images/portfolio/img1.jpg");?>" class="img-responsive" alt="" />
                                    <div class="portfolio-caption">
                                        <h4>Portfolio Title</h4>
                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</p>
                                        <a href="#portfolio-modal" data-toggle="modal" class="link-1"><i class="fa fa-magic"></i></a>
                                        <a href="#" class="link-2"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay="600ms">
                                <div class="portfolio-item">
                                    <img src="<?=base_url("assets/landing/images/portfolio/img2.jpg");?>" class="img-responsive" alt="" />
                                    <div class="portfolio-caption">
                                        <h4>Portfolio Title</h4>
                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</p>
                                        <a href="#portfolio-modal" data-toggle="modal" class="link-1"><i class="fa fa-magic"></i></a>
                                        <a href="#" class="link-2"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay="900ms">
                                <div class="portfolio-item">
                                    <img src="<?=base_url("assets/landing/images/portfolio/img3.jpg");?>" class="img-responsive" alt="" />
                                    <div class="portfolio-caption">
                                        <h4>Portfolio Title</h4>
                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</p>
                                        <a href="#portfolio-modal" data-toggle="modal" class="link-1"><i class="fa fa-magic"></i></a>
                                        <a href="#" class="link-2"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay="1200ms">
                                <div class="portfolio-item">
                                    <img src="<?=base_url("assets/landing/images/portfolio/img4.jpg");?>" class="img-responsive" alt="" />
                                    <div class="portfolio-caption">
                                        <h4>Portfolio Title</h4>
                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</p>
                                        <a href="#portfolio-modal" data-toggle="modal" class="link-1"><i class="fa fa-magic"></i></a>
                                        <a href="#" class="link-2"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay="1500ms">
                                <div class="portfolio-item">
                                    <img src="<?=base_url("assets/landing/images/portfolio/img5.jpg");?>" class="img-responsive" alt="" />
                                    <div class="portfolio-caption">
                                        <h4>Portfolio Title</h4>
                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</p>
                                        <a href="#portfolio-modal" data-toggle="modal" class="link-1"><i class="fa fa-magic"></i></a>
                                        <a href="#" class="link-2"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay="1800ms">
                                <div class="portfolio-item">
                                    <img src="<?=base_url("assets/landing/images/portfolio/img6.jpg");?>" class="img-responsive" alt="" />
                                    <div class="portfolio-caption">
                                        <h4>Portfolio Title</h4>
                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</p>
                                        <a href="#portfolio-modal" data-toggle="modal" class="link-1"><i class="fa fa-magic"></i></a>
                                        <a href="#" class="link-2"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </li>
                            
                            
                        </ul>
                        <!-- End Portfolio items -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End Portfolio Section -->
        
        
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
        
        
        
        <!-- Start Testimonial Section -->
        <section id="testimonial-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="testimonial-wrapper">
                            <div class="testimonial-item">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
                                <img src="<?=base_url("assets/landing/images/team/team-1.jpg");?>" alt="Testimonial images">
                                <h5>John Doe</h5>
                                <div class="desgnation">CEO, ThemeBean</div>
                            </div>
                            <div class="testimonial-item">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                <img src="<?=base_url("assets/landing/images/team/team-2.jpg");?>" alt="Testimonial images">
                                <h5>John Doe</h5>
                                <div class="desgnation">CEO, ThemeBean</div>
                            </div>
                            <div class="testimonial-item">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                <img src="<?=base_url("assets/landing/images/team/team-3.jpg");?>" alt="Testimonial images">
                                <h5>John Doe</h5>
                                <div class="desgnation">CEO, ThemeBean</div>
                            </div>
                            <div class="testimonial-item">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                <img src="<?=base_url("assets/landing/images/team/team-4.jpg");?>" alt="Testimonial images">
                                <h5>John Doe</h5>
                                <div class="desgnation">CEO, ThemeBean</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Testimonial Section -->
        
        
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