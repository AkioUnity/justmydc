<?php
/**
 * Created by PhpStorm.
 * User: akio
 * Date: 2019.09.16
 * Time: 3:25 上午
 */
?>
<td>
    <div class="box-exclusive">
        <a href="<?php echo base_url() . 'business/profile/' . $profile->profile_id; ?>">
            <img src="<?php echo profile_image_url($profile->featured_image); ?>"
                 alt="Featured Image"
                 onerror="this.onerror=null;this.src='https://dc.justmy.com//bran-media/teamlocal_pro_abosolute_moving.jpg';">
        </a>
        <div class="category-detail">
            <div class="name"><?php echo $profile->profile_name; ?></div>
            <div class="address"><?php echo $profile->profile_add; ?></div>
            <div class="links">
                <a href="<?php echo $profile->profile_web; ?>" target="_blank">
                    <img src="<?php echo image_url('web.png'); ?>" width="30">
                </a>
                <?php for ($i = 0; $i < 3; $i++) {
                    if (isset($profile->social_links[$i])) {
                        $social = $profile->social_links[$i]; ?>
                        <a href="<?php echo $social->ps_url; ?>" target="_blank">
                            <img src="<?php echo image_url($social->ps_name.'.png'); ?>" width="30">
                        </a>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
</td>