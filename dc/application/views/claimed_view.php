<link rel="stylesheet" type="text/css" href="<?php echo css_url('channel.css') ?>"/>
<?php
/**
 * Created by PhpStorm.
 * User: akio
 * Date: 2019.09.16
 * Time: 4:55 下午
 */
?>
<?php
$lat = '33.929219';
$lng = '-118.272536';
if (isset($row['latitude'])) {
    $lat = $row['latitude'];
    $lng = $row['longitude'];
}
$address = $row['street'] . ' ' . $row['suite'] . ' ' . $row['city'] . ' ' . $row['state'];
$ad_id = -1;
$type = $post->profile_type_id;
//print_r($post);
if ($type == Deluxe_profile || $type == Pro_profile) {
    include 'sections/interactive_ad.php';
    include 'categories_bread_crumb.php';
    include 'profile/components/profile_view_detail.php';
    include('sections/media_carousel.php');
    include 'sections/tab_view.php';
} else {
    include 'profile/components/profile_view_detail.php';
    include 'categories_bread_crumb.php';
    include('sections/media_carousel.php');
    include 'profile/components/about_view.php';
    include('sections/map_section.php');
    if ($type == Claimed_free_profile_id)
        include 'categories_table.php';
    elseif ($type == Standard_profile_id)
        include('sections/keyword_view.php');
}
if ($type != Pro_profile) {
    include 'sections/interactive_ad.php';
}
?>
