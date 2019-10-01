<?php
/**
 * Created by PhpStorm.
 * User: akio
 * Date: 2019.09.06
 * Time: 1:17 上午
 */

if ($channel_menus) { ?>
    <style>
        #navbar a {
            float: none;
        }

        .dropdown-content > a {
            padding-bottom: 0;
            margin-bottom: 2px;
            width: 230px;
        }
    </style>

    <div class="dropdown">
        <button class="dropbtn">Channels <b class="caret"></b></button>
        <div class="dropdown-content" style="width: 270px">
            <?php foreach ($channel_menus as $channel): ?>
                <a href="/dashboard/channel/<?php echo $channel->channel_id ?>"><?php echo $channel->channel_name; ?></a>
            <?php endforeach; ?>
        </div>
    </div>
<?php } ?>