<?php
/**
 * Created by PhpStorm.
 * User: akio
 * Date: 2019.09.16
 * Time: 3:25 上午
 */
?>

    <a href="<?php echo str_replace('http://2019fun.justmy.com', 'https://' . $_SERVER['SERVER_NAME'], $post->cp_url); ?>">
        <div class="box-exclusive" style="width: 85%;">
            <img src="<?php echo admin_image_url($post->cp_post_image) ?>"
                 alt="Featured Image"
                 onerror="this.onerror=null;this.src='https://dc.justmy.com//bran-media/teamlocal_pro_abosolute_moving.jpg';">
            <div class="category-detail">
                <div class="name"><?php echo $post->cp_title; ?></div>
                <div class="address"><?php echo $post->cp_title2 ?></div>
            </div>
        </div>
    </a>

