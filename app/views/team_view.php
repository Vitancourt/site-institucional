<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!empty($team)) {
    ?>
    <!-- Start Team Member Section -->
    <section id="team-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay="50ms">
                        <h2>Nossa equipe</h2>
                        <?php
                        /*
                        <p>Duis aute irure dolor in reprehenderit in voluptate</p>
                        */
                        ?>
                    </div>                        
                </div>
            </div>
            <?php
            $quantidade = count($team);
            $i = 1;
            foreach ($team as $t) {
                if ($i == 1) {
                    ?>
                    <div class="row">
                    <?php
                }
                ?>
                    <div class="col-md-4 col-xl-12 col-xs-12 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="300ms">
                        <div class="team-member">
                            <img src="<?=base_url("repository/team/".$t->image);?>" class="img-responsive"
                            alt="<?=$t->name;?>" style="min-width: 262.5px; min-height: 262.5px">
                            <div class="team-details">
                                <h4><?=$t->name;?></h4>
                                <?php
                                if (!empty($t->workas)) {
                                    ?>
                                    <p><?=$t->workas;?></p>
                                    <?php
                                }
                                ?>
                                <ul>
                                    <?php
                                    if (!empty($t->skype)) {
                                        ?>
                                        <li><a href="<?=$t->skype;?>"><i class="fa fa-skype"></i></a></li>
                                        <?php
                                    }
                                    if (!empty($t->facebook)) {
                                        ?>
                                        <li><a href="<?=($t->facebook);?>"><i class="fa fa-facebook"></i></a></li>
                                        <?php
                                    }
                                    if (!empty($t->twitter)) {
                                        ?>
                                        <li><a href="<?=$t->twitter;?>"><i class="fa fa-twitter"></i></a></li>
                                        <?php
                                    }
                                    if (!empty($t->linkedin)) {
                                        ?>
                                        <li><a href="<?=$t->linkedin;?>"><i class="fa fa-linkedin"></i></a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div><!-- /.col-md-3 -->
                <?php
                if ($i == 3 || $i == $quantidade) {
                    ?>
                    </div><!-- / .row-->
                    <?php
                }
                ?>
                <?php
            }
            ?>
        </div>
    </section>
    <!-- End Team Member Section -->
    <?php
}
?>