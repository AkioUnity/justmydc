<?php
/**
 * Created by PhpStorm.
 * User: akio
 * Date: 2019.09.05
 * Time: 1:46 上午
 */
?>

<div class="row">
    <div class="channel_section ">
        <div class="channel_detail desktop">
            <?php echo $channel->html; ?>
        </div>
    </div>
    <div class="channel_section">
        <img src="<?php echo admin_image_url($channel->featured_image) ?>" style="width: 100%">
    </div>
    <div class="channel_section ">
        <div class="channel_detail mobile">
            <?php echo $channel->html; ?>
        </div>
    </div>
</div>