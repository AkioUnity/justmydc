<style>
    .black-bar{
        background-color: black;
        width: 80%;
        height: 3px;
        margin: auto auto 4rem;
    }
</style>
<?php

$header_img = $market['market_header_image'];
$logo_img = $market['market_logo'];
$market_name = $market['market_name'];

$lat = $row['latitude'];
$lng = $row['longitude'];
$address = $row['street'] . ' ' . $row['suite'] . ' ' . $row['city'] . ' ' . $row['state'];
//echo $lat,$lng;
$ad_id = -1;
?>


<!--    This is the START of section-header    -->
<div class="row no-gutters" style="overflow-x:hidden">
    <div class="col-sm-6" style="display: table">
        <div class="container-fluid" style="padding: 20% 15%; padding-bottom:10%;">
            <h1 id="title1"><?php echo $row['name']; ?></h1>
            <h6 id="header"><a href="tel:<?php echo $row['phone']; ?>"><?php echo $row['phone']; ?></a>
            </h6>
            <h6 id="header"><?php echo $address; ?>
            </h6>
            <!--            <br>-->
            <h6 id="header">Links</h6>
            <p id="excerpt"><a target="_blank" href="<?php echo $row['website']; ?>">Website</a>
            <h6 id="header">Social</h6>
            <p id="excerpt">
                <?php if ($row['facebook_url']) { ?>
                    <a target="_blank" href="<?php echo $row['facebook_url']; ?>">Facebook</a>
                <?php }
                if ($row['instagram_url']) { ?>
                    | <a
                            target="_blank"
                            href="<?php echo $row['instagram_url']; ?>">Instagram</a>
                <?php }
                if ($row['twitter_url']) { ?>
                    | <a target="_blank" href="<?php echo $row['twitter_url']; ?>">Twitter</a>
                <?php } ?></p>
            <p id="excerpt"><?php echo $row['company_description']; ?></p>
            <!--<a href="https://www.absolutemovingservices.com/" class="btn btn-info" role="button">Website</a><br><br>
            <a href="https://www.facebook.com/AbsoluteMovingService" class="btn btn-info" role="button">Facebook</a><br><br>
            <a href="https://www.absolutemovingservices.com/free-quote-moving-consultation/" class="btn btn-info" role="button">Free Quote</a><br> -->
        </div>
    </div>
    <div class="col-sm-6" style="padding: 3%;">
        <img class="desktop" style="border-bottom-right-radius: 0px; float: right; box-shadow: 8px 8px 10px #cbcbcb;border-top-right-radius: 10px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;"
             src="https://2019fun.justmy.com/upload/images/<?php echo $header_img; ?>">
        <div class="container-fluid" style="float: right;width: auto;">
            <img class="double-logo desktop" src="https://2019fun.justmy.com/upload/images/<?php echo $logo_img; ?>" >
            <a href="team_local_about.php">
                <img class="double-logo" src="https://2019fun.justmy.com/bran-media/big_button_claim.png" >
            </a>

        </div>
    </div>
    <div class="black-bar"></div>
</div>

<?php include 'sections/map_section.php'; ?>

<?php //
//include 'sections/banner_ad_section.php';
//include 'sections/instagram_ad_section.php';
//?>

<?php include 'sections/interactive_ad.php';
?>
