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

    .channel_detail .business{
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
                <img src="https://2019fun.justmy.com//bran-media/absolutemoving_alogovert.png"
                     style="width:100%; border-radius: 50%">
            </div>

            <div>
                <span id="title" class="business_field"><?php echo $post->profile_name; ?></span>
            </div>
            <div>
                <span id="title2" class="business_field"><?php echo $post->profile_tagline; ?></span>
            </div>

            <h6 class="business">
                <a href="tel:<?php echo $post->phone ?>" id="phone_no"><?php echo $post->phone; ?></a> | <a
                        href="mailto:<?php echo $post->profile_email; ?>" id="email"><?php echo $post->profile_email; ?></a>
            </h6>

            <br>
            <h6 id="header">Links</h6>
            <p id="excerpt">
                <a href="<?php echo $post->profile_web; ?>">Website</a> | <a href="link2">Donate</a> | <a href="link3">Quote
                    Request</a></p>
            <h6 id="header">Social</h6>
            <p id="facebook">
                <a href="">Facebook</a> | <a href="instagram_url">Instagram</a> | <a
                        href="pinterest_url">Pinterest</a></p>

            <p id="excerpt">
                <?php echo $post['excerpt']; ?></p>
        </div>
    </div>
    <div class="channel_section">
        <img src="https://2019fun.justmy.com//bran-media/teamlocal_pro_abosolute_moving.jpg" style="width: 100%">
    </div>
</div>

