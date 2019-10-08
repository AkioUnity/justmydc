<?php
/**
 * Created by PhpStorm.
 * User: akio
 * Date: 2019.09.05
 * Time: 1:46 上午
 */
?>
<style>
    .business_field {
        display: initial;
    }

    #title.business_field {
        font-size: 4rem;
    }

    #title2.business_field {
        font-size: 26px;
    }

    .channel_detail .business {
        font-weight: 600;
        color: #666666;
        font-size: 19px;
    }

</style>

<!-- Central Modal Small -->
<div class="row">
    <div class="channel_section ">
        <div class="channel_detail">
            <div class="container-fluid" style="padding-right: 50%;padding-bottom: 2%">
                <?php if ($post->logo) { ?>
                <img src="<?php echo profile_image_url($post->logo);?>"
                     style="width:100%; border-radius: 50%">
                <?php } ?>
            </div>

            <div>
                <span id="title" class="business_field"><?php echo $post->profile_name; ?></span>
            </div>
            <div>
                <span id="title2" class="business_field"><?php echo $post->profile_tagline; ?></span>
            </div>

            <h6 class="business">
                <a href="tel:<?php echo $post->phone ?>" id="phone_no"><?php echo $post->phone; ?></a> | <a
                        href="mailto:<?php echo $post->profile_email; ?>"
                        id="email"><?php echo $post->profile_email; ?></a>
            </h6>

            <br>
            <h6 id="header">Links</h6>
            <p id="excerpt">
                <a href="<?php echo $post->profile_web; ?>">Website</a> | <a
                        href="<?php echo isset($profileSocial[3]['ps_url'])?$profileSocial[3]['ps_url']:''; ?>"><?php echo isset($profileSocial[3]['hotlink_name']) ? $profileSocial[3]['hotlink_name'] : 'Donate'; ?></a>
                | <a href="<?php echo isset($profileSocial[4]['ps_url'])?$profileSocial[4]['ps_url']:''; ?>">
                    <?php echo isset($profileSocial[4]['hotlink_name']) ? $profileSocial[4]['hotlink_name'] : 'Quote Request'; ?></a>
            </p>
            <h6 id="header">Social</h6>
            <p id="facebook">
                <a href="<?php echo isset($profileSocial[0]['ps_url'])?$profileSocial[0]['ps_url']:''; ?>"><?php echo isset($profileSocial[0]['ps_name'])?$profileSocial[0]['ps_name']:'Facebook'; ?></a> | <a href="<?php echo isset($profileSocial[1]['ps_url'])?$profileSocial[1]['ps_url']:''; ?>"><?php echo (isset($profileSocial[1]['ps_name'])?$profileSocial[1]['ps_name']:'Instagram'); ?></a> | <a
                        href="<?php echo isset($profileSocial[2]['ps_url'])?$profileSocial[2]['ps_url']:''; ?>"><?php echo (isset($profileSocial[2]['ps_name'])?$profileSocial[2]['ps_name']:'Pinterest'); ?></a></p>

            <p id="excerpt">
                <?php echo $post->profile_about; ?></p>
        </div>
    </div>
    <div class="channel_section">
        <img src="<?php echo(isset($post->featured_image)?profile_image_url($post->featured_image):'https://2019fun.justmy.com//bran-media/teamlocal_pro_abosolute_moving.jpg') ?>" style="width: 100%">
    </div>
</div>

