<?php
/**
 * Created by PhpStorm.
 * User: akio
 * Date: 2019.09.06
 * Time: 1:17 上午
 */

if ($channel_menus) { ?>
    <div class="dropdown">
        <button class="dropbtn">Channels
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content" style="width: 270px">
            <?php foreach ($channel_menus as $channel): ?>
                <a href="dashboard/channel/<?php echo $channel->channel_id ?>"><?php echo $channel->channel_name; ?></a>
            <?php endforeach; ?>
        </div>
    </div>
<?php } ?>