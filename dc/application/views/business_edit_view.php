<link rel="stylesheet" type="text/css" href="<?php echo css_url('channel.css') ?>"/>
<?php
/**
 * Created by PhpStorm.
 * User: akio
 * Date: 2019.09.16
 * Time: 4:55 下午
 */
?>
<?php echo $this->session->flashdata('msg');
$lat = '33.929219';
$lng = '-118.272536';
$data=array('lat'=>$lat,'lng'=>$lng);

?>

<form role="form" action="profile/updatepost" method="post" role="form">
    <?php
    include 'profile/components/business_view_setting.php';
    include ('sections/carousel.php');
    include 'profile/components/business_detail_section.php';
    include ('sections/map_section.php');
    ?>
</form>



<script>
    setTimeout(function(){ $(".alert").alert('close') }, 2000);
</script>
