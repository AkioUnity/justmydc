<div class="col-sm-7">
    <div class="row">
        <?php for ($i = 0; $i < 3; $i++) {
            $j = $article_id * 3 + $i; ?>
<!--                                            --><?php //print_r($j); ?>
<!--                        --><?php //print_r(count($posts)); ?>
            <?php if (count($posts)>$j)
            { ?>
                <div class="box-feature">
                    <img src="<?php echo admin_image_url($posts[$j]->cp_post_image) ?>">
                    <div class="box-copy">
                        <input type="hidden" value="<?php echo($posts[$j]->post_id) ?>">
                        <div><?php echo($posts[$j]->cp_title) ?></div>
                        <a href="<?php echo str_replace('https://2019fun.justmy.com', 'https://' . $_SERVER['SERVER_NAME'], $posts[$j]->cp_url); ?>"><?php echo($posts[$j]->cp_title2) ?></a>

                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>