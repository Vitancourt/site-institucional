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
        <?php
        if (
            !empty($about[0]->mission) ||
            !empty($about[0]->vision) ||
            !empty($about[0]->value)
        ) {
            ?>
            <div class="row about-details">
                <?php
                if (!empty($about[0]->mission)) {
                    ?>
                    <div class="col-md-4" align="center">
                        <i class="fa fa-3x fa-institution"></i>
                        <?=$about[0]->mission;?>
                    </div>
                    <?php
                }
                if (!empty($about[0]->vision)) {
                    ?>
                    <div class="col-md-4" align="center">
                        <i class="fa fa-3x fa-eye"></i>
                        <?=$about[0]->vision;?>
                    </div>
                    <?php
                }
                if (!empty($about[0]->value)) {
                    ?>
                    <div class="col-md-4" align="center">
                        <i class="fa fa-3x fa-star"></i>
                        <?=$about[0]->value;?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        }
        ?>
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