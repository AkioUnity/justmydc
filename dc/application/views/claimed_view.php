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
$lat = $row['latitude'];
$lng = $row['longitude'];
$address = $row['street'] . ' ' . $row['suite'] . ' ' . $row['city'] . ' ' . $row['state'];
$ad_id = -1;

//print_r($post);
include 'profile/components/profile_view_detail.php';
include 'categories_bread_crumb.php';
include('sections/media_carousel.php');
include 'profile/components/about_view.php';
include('sections/map_section.php');
if ($post->profile_type_id==Claimed_free_profile_id)
    include 'categories_table.php';
elseif ($post->profile_type_id==Standard_profile_id)
    include('sections/keyword_view.php');
?>
<?php include 'sections/interactive_ad.php';
?>
