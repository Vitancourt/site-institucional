<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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