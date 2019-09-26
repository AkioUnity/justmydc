<?php
/**
 * Created by PhpStorm.
 * User: akio
 * Date: 2019.09.05
 * Time: 1:46 上午
 */
?>

<?php $article_id++; ?>

<div class="section section-split-5">
    <div class="<?php echo (isset($isHome) && !isMobile())?'':'container';?>">
        <div class="row">
            <?php if ($article_id==1){
                include 'home_skyscraper.php';
                include 'home_3articles.php';
                if (isset($isHome))
                    include 'home_3articles.php';
            }
            else {
                include 'home_3articles.php';
                if (isset($isHome))
                    include 'home_3articles.php';
                include 'home_skyscraper.php';

            }?>
        </div>
    </div>
</div>
