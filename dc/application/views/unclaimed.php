<style>
    .double-logo > img {
        max-width: 40%;
        margin-right: 32px;
        float: left;
    }

    .double-logo > a > img {
        max-width: 40%;
        float: left;
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
include 'sections/interactive_ad.php';
?>


<!--    This is the START of section-header    -->
<div class="row no-gutters" style="overflow-x:hidden">
    <div class="col-6" style="display: table">
        <div class="container-fluid" style="padding: 20% 15%; padding-bottom:10%;">
            <div class="container-fluid market_logo1554134499.jpg double-logo" style="padding-bottom: 2%;"><img
                        src="https://2019fun.justmy.com/upload/images/<?php echo $logo_img; ?>"
                        style="width:100%; border-radius: 50%;"> <a href="team_local_about.php"> <img
                            src="https://2019fun.justmy.com/bran-media/big_button_claim.png"
                            style="width:100%; border-radius: 50%;"></a></div>
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
                <?php if ($row['facebook_url']){ ?>
                <a target="_blank" href="<?php echo $row['facebook_url']; ?>">Facebook</a>
                <?php }if ($row['instagram_url']){ ?>
                | <a
                        target="_blank"
                        href="<?php echo $row['instagram_url']; ?>">Instagram</a>
                <?php }if ($row['twitter_url']){ ?>
                 | <a target="_blank" href="<?php echo $row['twitter_url']; ?>">Twitter</a>
                <?php } ?></p>
            <p id="excerpt"><?php echo $row['company_description']; ?></p>
            <!--<a href="https://www.absolutemovingservices.com/" class="btn btn-info" role="button">Website</a><br><br>
            <a href="https://www.facebook.com/AbsoluteMovingService" class="btn btn-info" role="button">Facebook</a><br><br>
            <a href="https://www.absolutemovingservices.com/free-quote-moving-consultation/" class="btn btn-info" role="button">Free Quote</a><br> -->
        </div>
    </div>
    <div class="col-6" style="padding: 65px;">
        <img style="border-bottom-right-radius: 0px; float: right; box-shadow: 8px 8px 10px #cbcbcb;border-top-right-radius: 10px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;"
             src="https://2019fun.justmy.com/upload/images/<?php echo $header_img; ?>">
    </div>
</div>

<?php include 'sections/map_section.php'; ?>
<!-- banner 5 reasons START -->

<div class="section section-content" style="padding-bottom: 0">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 section-content-inside">
                <a href="team_local_about.php"><img id="photo" class="banner"
                                                    src="https://2019fun.justmy.com/bran-media/banner_five_reasons.jpg"></a>
            </div>
        </div>
    </div>
</div>

<!--    This is the START of section-like-instagram    -->
<div class="section-content section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 section-content-inside">
                <a href="<?= $market['market_instagram'] ?>" target="_blank"><img id="photo" class="banner"
                                                                                  src="https://2019fun.justmy.com/bran-media/instagram_section_image.png"></a>
            </div>
        </div>
    </div>
</div>

