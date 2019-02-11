<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Start  Logo & Naviagtion  -->
<div class="navbar navbar-default navbar-top">
    <div class="container">
        <div class="navbar-header">
            <!-- Stat Toggle Nav Link For Mobiles -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <!-- End Toggle Nav Link For Mobiles -->
            <img class="navbar-logo" src="<?=base_url("repository/logo/logo_sgt.png");?>">
        </div>
        <div class="navbar-collapse collapse">
            
            <!-- Start Navigation List -->
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="active" href="index.html">Início</a>
                </li>
                <li>
                    <a href="about.html">About Us</a>
                </li>
                <li>
                    <a href="service.html">Service</a>
                </li>
                <li>
                    <a href="portfolio.html">Portfolio</a>
                </li>
                <li>
                    <a href="blog.html">Blog</a>
                    <ul class="dropdown">
                        <li>
                            <a href="blog-item.html">Item Page</a>
                        </li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact</a>
                </li>
            </ul>
            <!-- End Navigation List -->
        </div>
    </div>
</div>
<!-- End Header Logo & Naviagtion -->