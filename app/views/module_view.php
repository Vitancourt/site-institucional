<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!empty($module)) {
    ?>
    <section id="service-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay="50ms">
                        <h2>Módulos</h2>
                        <p>O sistema conta com os seguintes módulos</p>
                    </div>                        
                </div>
            </div>
            <div class="row">
                <?php
                foreach ($module as $m) {
                    ?>
                    <div class="col-md-3">
                        <div class="services-post">
                            <a href="#"><i class="<?=$m->icon;?>"></i></a>
                            <h2><?=$m->name;?></h2>
                            <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
    <?php
}
?>