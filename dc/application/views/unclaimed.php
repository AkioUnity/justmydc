<?php

$market_name = $market['market_name'];

$lat = $row['latitude'];
$lng = $row['longitude'];
$address = $row['street'] . ' ' . $row['suite'] . ' ' . $row['city'] . ' ' . $row['state'];
//echo $lat,$lng;
$ad_id = -1;
?>


<!--    This is the START of section-header    -->
<div class="row">
    <div class="channel_section">
        <div class="container-fluid" style="padding: 5% 15%; padding-bottom:10%;">
            <div class="row">
                <a href="team_local_about.php">
                    <img class="double-logo" src="https://2019fun.justmy.com/bran-media/big_button_claim.png">
                </a>
            </div>
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
    <div class="channel_section">
        <?php include 'sections/map_single.php'; ?>
    </div>

</div>
<?php
include 'categories_table.php'; ?>
<?php include 'sections/interactive_ad.php';
?>
