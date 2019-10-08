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
$data = array('lat' => $lat, 'lng' => $lng);
//print_r($post);
include('sections/carousel.php');
include 'profile/components/profile_view_detail.php';
include('sections/map_section.php');
include 'profile/components/about_view.php';
?>
