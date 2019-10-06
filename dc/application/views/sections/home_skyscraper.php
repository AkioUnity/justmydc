<div class="col-md-<?php echo isset($isHome)?4:5;?>">
    <div class="row">
        <div class="skyscraper <?php echo ($article_id==1?'desktop':'') ?>" style="<?php echo isset($isHome)?'padding-left: 1.7rem;
    padding-right: 10%;':'';?>">
            <?php if (isset($skyscraperAds[$article_id])){  ?>
            <a href="<?php echo $skyscraperAds[$article_id]->ad_url ?>" target="_blank">
                <img src="<?php echo admin_ads_url($skyscraperAds[$article_id]->ad_image) ?>"></a>
            <?php }
            else echo "no Data"; ?>
        </div>
    </div>
</div>