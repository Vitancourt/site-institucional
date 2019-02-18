<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!empty($comments)) {
    ?>
    <!-- Start Testimonial Section -->
    <section id="testimonial-section"
    style="background: url(
        <?=(!empty($banner_comments[0]->image))?
        base_url("repository/banner_comments/".$banner_comments[0]->image):
        base_url("repository/banner_comments/call-to.jpg");?>) no-repeat;
        background-size: 100% 100%;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial-wrapper">
                        <?php
                        foreach ($comments as $c) {
                            ?>
                            <div class="testimonial-item">
                                <p><?=$c->comments;?></p>
                                <?php
                                if (!empty($c->photo)) {
                                    ?>
                                    <img src="<?=base_url("repository/comments/".$c->photo);?>"
                                    <?=(!empty($c->name))?"alt=\"".$c->name."\"":"";?>>
                                    <?php
                                }
                                ?>
                                <?=(!empty($c->name))?"<h5>".$c->name."</h5>":"";?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonial Section -->
    <?php
}
?>