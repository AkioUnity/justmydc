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
        .dropdown-content > p {
            padding-bottom: 0;
            margin-bottom: 2px;
            width: 230px;
        }
    </style>

    <li class="dropdown">
        <a href="#">Channels <b class="caret"></b></a>
        <div class="dropdown-content" style="width: 270px">
            <?php foreach ($channel_menus as $channel): ?>
                <p>
                    <a href="dashboard/channel/<?php echo $channel->channel_id ?>"><?php echo $channel->channel_name; ?></a>
                </p>
            <?php endforeach; ?>
        </div>
    </li>
<?php } ?>