<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!empty($level)) {
    ?>
    <!-- Start Portfolio Section -->
    <section id="portfolio" class="portfolio-section-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay="50ms">
                        <h2>Níveis</h2>
                        <p>O SGT é dividido nos seguintes níveis</p>
                    </div>                        
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Start Portfolio items -->
                    <ul id="portfolio-list">
                    <?php
                    foreach ($level as $l) {
                        ?>
                        <li class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay="300ms">
                            <a href="<?=site_url("level/".$l->link);?>">
                            <div class="portfolio-item">
                                <img src="<?=base_url("repository/level/".$l->image);?>" 
                                style="width: 100%; height: 360px;" alt="<?=$l->name;?>">
                                <div class="portfolio-caption">
                                    <h4><?=$l->name;?></h4>
                                    <?php
                                    if (!empty($l->description)) {
                                        ?>
                                        <p><?=$l->description;?></p>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Portfolio Section -->
    <?php
}
?>