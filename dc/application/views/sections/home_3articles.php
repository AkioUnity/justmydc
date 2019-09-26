<div class="col-md-<?php echo isset($isHome) ? 4 : 7; ?>">
    <div class="row">
        <?php
        if (isset($isHome)) {
            $post_id++;
            if (isset($postList[$post_id])){
                $posts = $postList[$post_id]->data;
                echo("<a href='dashboard/channel/" . $channel_menus[$post_id]->channel_id . "'><h1 class='channel_name'>" . $postList[$post_id]->channel_name . "</h1></a>");
            }
            else
                $posts=null;
        }
        for ($i = 0; $i < 3; $i++) {
            $j = (isset($isHome) ? 0 : $article_id * 3) + $i; ?>
            <!--                                            --><?php //print_r($j); ?>
            <!--                        --><?php //print_r(count($posts)); ?>
            <?php if (count($posts) > $j) { ?>
                <a href="<?php echo str_replace('http://2019fun.justmy.com', 'https://' . $_SERVER['SERVER_NAME'], $posts[$j]->cp_url); ?>">
                    <div class="box-feature">
                        <img src="<?php echo admin_image_url($posts[$j]->cp_post_image) ?>">
                        <div class="box-copy">
                            <input type="hidden" value="<?php echo($posts[$j]->post_id) ?>">
                            <div style="font-weight: 600;">
                            <?php echo($posts[$j]->cp_title) ?>
                            </div>
                            <?php if (!isset($isHome)) { ?>
                                <div class="desktop">
                                    <?php echo($posts[$j]->cp_title2) ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </a>
            <?php } ?>
        <?php } ?>
    </div>
</div>