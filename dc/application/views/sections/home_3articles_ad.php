<?php
/**
 * Created by PhpStorm.
 * User: akio
 * Date: 2019.09.05
 * Time: 1:46 上午
 */
?>
<style>
    .box-feature {
        margin: 1.7rem;
        font-size: 3rem;
        height: 238px;
    }

    .box-copy div {
        font-size: 2.1rem;
        font-weight: 100;
    }
</style>
<?php $article_id++; ?>
<?php //print_r($skyscraperAds[$article_id]);?>
<div class="section section-split-5">
    <div class="container">
        <div class="row">
            <?php if ($article_id==0){
                include 'home_3articles.php';
                include 'home_skyscraper.php';
            }
            else {
                include 'home_skyscraper.php';
                include 'home_3articles.php';

            }?>
        </div>
    </div>
</div>