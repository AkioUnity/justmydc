<div class="section section-content">
    <div class="container">
        <div class="row">
            <?php if (isset($keywords)) {
                foreach ($keywords as $profileFeatures) { ?>
                    <div class="col-xs-4">
                        <h3 class="keyword-title">
                            <a href="<?php echo $profileFeatures['name_url']; ?>">
                                <?php echo $profileFeatures['feature_title']; ?>
                            </a>
                        </h3>
                        <p class="keyword-content">
                            <?php echo $profileFeatures['feature_detail']; ?>
                        </p>
                    </div>
                <?php }
            } ?>
        </div>
    </div>
</div>