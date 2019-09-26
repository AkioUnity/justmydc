<?php include 'sections/carousel.php'; ?>
<?php $ad_id=-1;
$isHome=true;

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}


?>
<?php include 'sections/interactive_ad.php'; ?>
<?php $article_id=-1;
$post_id=-1;
?>
<?php include 'sections/home_3articles_ad.php'; ?>
<?php include 'sections/interactive_ad.php'; ?>
<?php include 'sections/home_3articles_ad.php'; ?>
<?php include 'sections/interactive_ad.php'; ?>
<?php include 'sections/home_3articles_ad.php'; ?>

<?php //include 'sections/like_us_facebook.php'; ?>

