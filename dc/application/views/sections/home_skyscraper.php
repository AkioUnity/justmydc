<div class="col-sm-<?php echo isset($isHome)?4:5;?>">
    <div class="row">
        <div class="skyscraper <?php echo ($article_id==1?'desktop':'') ?>" style="<?php echo isset($isHome)?'padding-left: 10%;
    padding-right: 10%;':'';?>">
            <a href="<?php echo $skyscraperAds[$article_id]->ad_url ?>" target="_blank">
                <img src="<?php echo admin_ads_url($skyscraperAds[$article_id]->ad_image) ?>"></a>
        </div>
    </div>
</div>