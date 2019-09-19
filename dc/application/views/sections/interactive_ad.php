<?php
/**
 * Created by PhpStorm.
 * User: akio
 * Date: 2019.09.05
 * Time: 1:46 上午
 */
?>


<?php $ad_id++; ?>
<?php if (count($ads) > $ad_id) { ?>
    <section class="video-sec" style="background: <?php echo $ads[$ad_id]->ad_background_color ?>">
        <div class="container-fluid">
            <div class="row">
                <!-------Video-left-box------------->
                <div class="" style="width: 50%">
                    <div class="logo-mobile">
                        <img src="<?php echo admin_ads_url($ads[$ad_id]->ad_logo) ?>" style="width: 30%">
                    </div>
                    <div class="video-box" style="margin-bottom: -5px;">
                        <!------video--->
                        <video width="100%" height="100%" controls>
                            <source src="<?php echo $ads[$ad_id]->ad_video ?>" type="video/mp4">
                        </video>
                    </div>
                </div>
                <!-------Video-left-box------------->

                <!-----Right-box---->
                <div class="col-md-12 col-lg-6">
                    <div class="banner-right-box" style="padding: 25px 0px 25px 30px;">

                        <!-----Right-side-logo--->
                        <div class="logo-banner">
                            <img src="<?php echo admin_ads_url($ads[$ad_id]->ad_logo) ?>" style="width: 30%">
                        </div>

                        <!-----Right-side-logo--->
                        <div class="right-box-bg">
                            <div class="banner-text">
                                <h2 style="color: #666666"><?php echo $ads[$ad_id]->ad_text_title ?></h2>
                                <p style="color: #666666"><?php echo $ads[$ad_id]->ad_sub_title ?></p>
                            </div>
                            <div class="banner-form">
                                <a href="<?php echo $ads[$ad_id]->ad_url ?>"><?php echo $ads[$ad_id]->ad_link_statement ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-----Right-box---->
            </div>
        </div>
    </section>
<?php } ?>