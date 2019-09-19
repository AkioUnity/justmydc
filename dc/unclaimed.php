<?php require'justbringit/thismarket.php';?>
<?php 
  $header_img = $market['market_header_image']; 
  $logo_img = $market['market_logo']; 
  $market_name = $market['market_name']; 
?>

<!DOCTYPE html>
<html><head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://2019fun.justmy.com/assets/dev2019/main.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Comfortaa" />
  <link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
  <link rel="shortcut icon" type="image/png" href="https://2019fun.justmy.com/bran-media/favicon_bGd_icon.ico"/>

  

<!-- Google / Search Engine Tags -->
<meta itemprop="name" content="Behind the Scenes with: McKnight - JustMy">
<meta itemprop="description" content="McKnight is a Denver-based indie/folk/alternative-rock band. They offer a refined sound with some acoustic feels and a horn section. The #FunCrew recently did a Q & A session to learn more about this #BeAmazing Denver band.">
<meta itemprop="image" content="https://2019fun.justmy.com/bran-media/mcknight_fb.jpg">

<!-- Facebook Meta Tags -->
<meta property="og:type" content="website">
<meta property="og:title" content="Behind the Scenes with: McKnight - JustMy">
<meta property="og:description" content="McKnight is a Denver-based indie/folk/alternative-rock band. They offer a refined sound with some acoustic feels and a horn section. The #FunCrew recently did a Q & A session to learn more about this #BeAmazing Denver band.">
<meta property="og:image" content="https://2019fun.justmy.com/bran-media/mcknight_fb.jpg">

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Behind the Scenes with: McKnight - JustMy">
<meta name="twitter:description" content="McKnight is a Denver-based indie/folk/alternative-rock band. They offer a refined sound with some acoustic feels and a horn section. The #FunCrew recently did a Q & A session to learn more about this #BeAmazing Denver band.">
<meta name="twitter:image" content="https://2019fun.justmy.com/bran-media/mcknight_fb.jpg">

<!-- Meta Tags Generated via https://heymeta.com -->



  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <script src="https://2019fun.justmy.com/assets/dev2019/menu.js" type="text/javascript"></script>
  
  
  <style>
  .double-logo > img{ max-width:40%; margin-right:32px; float:left;}
  .double-logo > a > img{ max-width:40%; float:left;}
  body {
	padding:0px;
	margin:0px;
font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";

}

a {
    text-decoration: none !important;
}
img{max-width: 100%;}

section.video-sec {
    width: 100%;
    display: inline-block;
    background: #525252;
    padding: 50px 0px; margin-top:120px;
}
.right-box-bg {
    width: 100%;
}
.banner-text h2 {
    font-size: 60px;
    line-height: 1.25;
    margin: 0;
    font-weight: 800;
    color: #fff;
}
.banner-text p {
    color: #ffffff;
    font-size: 23px;
    padding-top: 20px;
    padding-right: 240px;
}
.banner-form input {
    border: 1px solid #fff;
    background-color: transparent;
    height: 50px;
    border-radius: 25px;
    color: #fff;
    padding: 0 30px;
    outline: 0;
}
.banner-form input::placeholder{
  color: #fff;
}
.banner-form a {
    color: #414042;
    background-color: #fdb913;
    border: none;
    border-radius: 25px;
    padding: 0 30px;
    height: 50px;
    vertical-align: middle;
    display: inline-flex;
    align-items: center;
    margin-left: 10px;
    font-weight: 600;
    font-size: 12px;
}

.banner-form {
    width: 100%;
    display: initial !IMPORTANT;
}
.logo-mobile {
    display: none;
}

@media screen and (max-width: 506px) {

.banner-form a {
    margin-top: 15px;
}

  }

@media screen and (max-width: 991px) {
  section.video-sec {
    padding: 20px 0px;
}

.right-box-bg {
    padding: 20px;
    margin-top: 25px;
}
.banner-text h2 {
    font-size: 26px;
}
.banner-text p {
    font-size: 20px;
    padding-right: 0px;
}
.logo-banner {
    display: none;
}
.logo-mobile {
    padding-bottom: 10px;
}
.logo-mobile {
    display: block;
}

  }

  @media screen and (max-width: 1199px) and (min-width: 992px) {
.banner-text h2 {
    font-size: 34px;
  }
.banner-text p {
    font-size: 20px;
    padding-right: 0px;
}
.banner-form input {
    padding: 0 10px;
}
.banner-form a {
    padding: 0 20px;
    }

  }

@media screen and (max-width: 1600px) and (min-width: 1200px) {
.banner-text p {
    padding-right: 20px;
}
.banner-text h2 {
    font-size: 40px;
}
}
}
</style>


<meta itemprop="name" content="JustMy Introduces TeamLOCAL for <?php echo $market_name; ?> Businesses!">
<meta itemprop="description" content="#TeamLOCAL membership is free. Yes, we have premium options, but either way, this is the place to #BeAmazing and help your community all at the same time! Let's make some Magic Happen for Your Business!">
<meta itemprop="image" content="https://2019fun.justmy.com/bran-media/Social_teamLOCAL.jpg">
<!-- Facebook Meta Tags -->
<meta property="og:type" content="website">
<meta property="og:title" content="JustMy Introduces TeamLOCAL for <?php echo $market_name; ?> Businesses!">
<meta property="og:description" content="#TeamLOCAL membership is free. Yes, we have premium options, but either way, this is the place to #BeAmazing and help your community all at the same time! Let's make some Magic Happen for Your Business!">
<meta property="og:image" content="https://2019fun.justmy.com/bran-media/Social_teamLOCAL.jpg">

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="JustMy Introduces TeamLOCAL for <?php echo $market_name; ?> Businesses!">
<meta name="twitter:description" content="#TeamLOCAL membership is free. Yes, we have premium options, but either way, this is the place to #BeAmazing and help your community all at the same time! Let's make some Magic Happen for Your Business!">
<meta name="twitter:image" content="https://2019fun.justmy.com/bran-media/Social_teamLOCAL.jpg">

</head>


<body>

<?php require 'justbringit/nav.php';?>
<?php
  $place_idd = $_GET['id'];
  //$place_info = "SELECT * FROM `wp_9z7072s58w_infousa_places1` WHERE `COL 1` = $place_idd";
  $place_info = "SELECT * FROM wp_9z7072s58w_infousa_places2 WHERE infogroup_id = '".$place_idd."'";
  $quy = mysqli_query($conn, $place_info);
  $row = mysqli_fetch_array($quy);
  $lat = $row['COL 41'];
  $lng = $row['COL 42'];
  $address = $row['COL 28'].' '.$row['COL 29'].' '.$row['COL 30'].' '.$row['COL 31'];
  
  // print_r($row);
  //exit;
?>
<section class="video-sec" style="padding:0px;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-lg-6" style="padding:0px;">
        <div class="logo-mobile"> <img src="img/logo.png"> </div>
        <div class="video-box" style="margin-bottom: -7px;">
          <video width="100%" height="100%" controls>
            <source src="https://2019fun.justmy.com/gaurav/img/video.mp4">
          </video>
        </div>
      </div>
      <div class="col-md-12 col-lg-6">
        <div class="banner-right-box" style="padding: 25px 0px 25px 30px;">
          <div class="logo-banner"> <img src="https://2019fun.justmy.com/gaurav/img/logo.png"> </div>
          <div class="right-box-bg">
            <div class="banner-text">
              <h2>Your Wealth Matters.</h2>
              <p>Growing your wealth just got a lot easier. Invest, budget and plan for the future - all in one convenient platform.</p>
            </div>
            <div class="banner-form">
              <input type="text" placeholder="Email">
              <a href="#">Request Early Access</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
 
    <!--    This is the START of section-header    -->
    <div class="row no-gutters" style="overflow-x:hidden">       
	<div class="col-6" style="display: table">        
	<div class="container-fluid" style="padding: 20% 15%; padding-bottom:10%;">                
	<div class="container-fluid market_logo1554134499.jpg double-logo" style="padding-bottom: 2%;"><img src="https://2019fun.justmy.com/upload/images/<?php echo $logo_img; ?>" style="width:100%; border-radius: 50%;"> <a href="team_local_about.php"> <img src="https://2019fun.justmy.com/bran-media/big_button_claim.png" style="width:100%; border-radius: 50%;"></a>                </div>                
	<h1 id="title1"><?php echo $row['COL 25']; ?></h1>                
	<h6 id="header"><a href="tel:<?php echo $row['COL 61']; ?>"><?php echo $row['COL 61']; ?></a>
	</h6><br>
	<h6 id="header">Links</h6>
	<p id="excerpt"><a target="_blank" href="<?php echo $row['COL 65']; ?>">Website</a>
	<h6 id="header">Social</h6>
	<p id="excerpt"><a target="_blank" href="<?php echo $row['COL 66']; ?>">Facebook</a> | <a target="_blank" href="<?php echo $row['COL 75']; ?>">Instagram</a> | <a target="_blank" href="<?php echo $row['COL 67']; ?>">Twitter</a></p>
	<p id="excerpt"><?php echo $row['COL 97']; ?></p>
	<!--<a href="https://www.absolutemovingservices.com/" class="btn btn-info" role="button">Website</a><br><br>              
	<a href="https://www.facebook.com/AbsoluteMovingService" class="btn btn-info" role="button">Facebook</a><br><br>
	<a href="https://www.absolutemovingservices.com/free-quote-moving-consultation/" class="btn btn-info" role="button">Free Quote</a><br> -->
	</div>
        </div>
        <div class="col-6" style="padding: 65px;">
          <img style="border-bottom-right-radius: 0px; float: right; box-shadow: 8px 8px 10px #cbcbcb;border-top-right-radius: 10px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;" src="https://2019fun.justmy.com/upload/images/<?php echo $header_img; ?>">
 </div>
 </div>

<!-- map placeholder START -->
<div class="container">
<div class="row">
<div class="col-sm-12"><p id="content-header">Map & Street Viewer</p></div>
</div></div>
<div class="row" style="margin:20px 0 0 0;">

  <div class="col-6" id="map" style="height: 450px;"></div>
  <div class="col-6" id="pano" style="height: 450px;"></div>
</div>
	<!-- map placeholder END -->
	
	<!-- banner 5 reasons START -->
	
	  <div class="section section-content">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 section-content-inside">
          <a href="team_local_about.php"><img id="photo" class="banner" src="https://2019fun.justmy.com/bran-media/banner_five_reasons.jpg"></a>
        </div>
      </div>
    </div>
  </div>
	
<!-- banner 5 reasons END --

  <!--    This is the START of section-card    -->
  <div class="section-content section">
    <div class="container">
      <div class="row">
        <div class="col-xs-12" style="width:100%;">
          <div id="card">
            <div class="row">
              <div class="col-md-8"  style="background-image: url(https://2019fun.justmy.com/bran-media/cards_teamGIVING.jpg);
                                              background-size: cover;
                                              border-top-left-radius: 10px;
                                              border-bottom-left-radius: 10px;">
              
              </div>
              <div class="col-md-4">
                  <img src="https://2019fun.justmy.com/bran-media/justmy_teamGIVING_grey.png" style="margin-bottom:2rem;max-height:5rem;max-width:100%;">
                  <h1 id="title1">Helping Non-Profits</h1>  
                  <p>This is the place to grow support for your local non-profit organization and to network with other individuals from the Giving Back Community across the US. JustMy is creating a TOOLbox of services to help you do what you do best, serve your Mission.  Join the team and together we will discover, create, and #BeAmazing. This is JustMy!<br><br> 
				<a href="../team_giving_about.php" class="btn btn-info" role="button">Learn More Now!</a>
                  </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--    This is the END of section-card    -->
  
  <!--    This is the START of section-card    -->
  <div class="section-content section">
    <div class="container">
      <div class="row">
        <div class="col-xs-12" style="width:100%;">
          <div id="card-right">
            <div class="row">
              <div class="col-md-4">
                  <img src="https://2019fun.justmy.com/bran-media/funcrew.png" style="margin-bottom:2rem;max-height:5rem;max-width:100%;">
                  <h1 id="title1">#FunCrew Being Amazing</h1>  
                  <p>Did you ever wish that you could make the world a better place, support your community, and promote your craft all at the same time?  Now you can!  Join the #FunCrew of JustMy and use your talent to promote your city and your business at the same time!  Together we can #BeAmazing.<br><br> 
				<a href="../preregistration_content_partners.php" class="btn btn-info" role="button">Learn More Now!</a>
                  </p>
              </div>
              <div class="col-md-8"  style="background-image: url(https://2019fun.justmy.com/bran-media/cards_funcrew.jpg);
                                              background-size: cover;
                                              border-top-right-radius: 10px;
                                              border-bottom-right-radius: 10px">
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--    This is the END of section-card    -->
  
  <!--    This is the START of section-card    -->
  <div class="section-content section">
    <div class="container">
      <div class="row">
        <div class="col-xs-12" style="width:100%;">
          <div id="card">
            <div class="row">
              <div class="col-md-8"  style="background-image: url(https://2019fun.justmy.com/bran-media/cards_teamLOCAL.jpg);
                                              background-size: cover;
                                              border-top-left-radius: 10px;
                                              border-bottom-left-radius: 10px;">
              
              </div>
              <div class="col-md-4">
                  <img src="https://2019fun.justmy.com/bran-media/justmy_teamLOCAL.png" style="margin-bottom:2rem;max-height:5rem;max-width:100%;">
                  <h1 id="title1">JustMy for Business</h1>  
                  <p>Growing your business gets easier when you don't go at it alone.  JustMy is introducing #TeamLOCAL to connect business owners from around the country to share tips, ideas, and tools that will help your business thrive.  Membership is free and includes a dynamic profile page for your business.  Join the team, share your stories, and together we will #BeAmazing for communities across the US.  This is JustMy!<br><br> 
				<a href="../team_local_about.php" class="btn btn-info" role="button">Learn More Now!</a>
                  </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--    This is the END of section-card    -->
    


  <!--    This is the START of section-like-instagram    -->
  <div class="section-content section">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 section-content-inside">
          <a href="<?=$market['market_instagram']?>" target="_blank"><img id="photo" class="banner" src="https://2019fun.justmy.com/bran-media/instagram_section_image.png"></a>
        </div>
      </div>
    </div>
  </div>
<!--    This is the END of section-like-instagram    -->

<?php require 'justbringit/footerarea.php';?>
<script>
    window.addEventListener('load', function() {
        mapInitialize();
    })
    function mapInitialize() {
      var location = {lat: <?php echo $lat ?>, lng: <?php echo $lng ?>};
      var map = new google.maps.Map(document.getElementById('map'), {
        center: location,
        zoom: 14
      });
      var panorama = new google.maps.StreetViewPanorama(
          document.getElementById('pano'), {
            position: location,
            pov: {
              heading: 34,
              pitch: 10
            }
          });
      map.setStreetView(panorama);
    }
</script>
<!-- Better include the google map reference into the page that call this file -->
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEGkIWfnUDIgNJvnxFyn1CP_c0tNWN63g"></script>
</html>