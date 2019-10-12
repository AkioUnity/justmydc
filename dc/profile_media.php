<?php //require'justbringit/thismarket.php';?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://2019fun.justmy.com/assets/dev2019/main.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans"/>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Comfortaa"/>
    <link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
    <link rel="shortcut icon" type="image/png" href="https://2019fun.justmy.com/bran-media/favicon_bGd_icon.ico"/>
    <link rel="shortcut icon" type="image/ico" href="https://2019fun.justmy.com/bran-media/favicon.png"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="Behind the Scenes with: McKnight - JustMy">
    <meta itemprop="description"
          content="McKnight is a Denver-based indie/folk/alternative-rock band. They offer a refined sound with some acoustic feels and a horn section. The #FunCrew recently did a Q & A session to learn more about this #BeAmazing Denver band.">
    <meta itemprop="image" content="https://2019fun.justmy.com/bran-media/mcknight_fb.jpg">

    <!-- Facebook Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Behind the Scenes with: McKnight - JustMy">
    <meta property="og:description"
          content="McKnight is a Denver-based indie/folk/alternative-rock band. They offer a refined sound with some acoustic feels and a horn section. The #FunCrew recently did a Q & A session to learn more about this #BeAmazing Denver band.">
    <meta property="og:image" content="https://2019fun.justmy.com/bran-media/mcknight_fb.jpg">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Behind the Scenes with: McKnight - JustMy">
    <meta name="twitter:description"
          content="McKnight is a Denver-based indie/folk/alternative-rock band. They offer a refined sound with some acoustic feels and a horn section. The #FunCrew recently did a Q & A session to learn more about this #BeAmazing Denver band.">
    <meta name="twitter:image" content="https://2019fun.justmy.com/bran-media/mcknight_fb.jpg">

    <!-- Meta Tags Generated via https://heymeta.com -->

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
            integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
            crossorigin="anonymous"></script>
    <script src="https://2019fun.justmy.com/assets/dev2019/menu.js" type="text/javascript"></script>


</head>

<body>

<?php //require 'justbringit/nav.php';?>
<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        <div class="container-fluid" style="margin-top: 50px">
            <p id="content-header-left">Profile Media</p>
        </div>
    </div>
    <div class="col-1"></div>
</div>
<div class="roww">
    <div class="col-12w">
        <div class="slider-container">
            <div class="slider-youtube">
                <?php
                function parseVideos($videoString = null)
                {
                    // return data
                    $videos = array();
                    if (!empty($videoString)) {
                        // split on line breaks
                        $videoString = stripslashes(trim($videoString));
                        $videoString = explode("\n", $videoString);
                        $videoString = array_filter($videoString, 'trim');
                        // check each video for proper formatting
                        foreach ($videoString as $video) {
                            // check for iframe to get the video url
                            if (strpos($video, 'iframe') !== FALSE) {
                                // retrieve the video url
                                $anchorRegex = '/src="(.*)?"/isU';
                                $results = array();
                                if (preg_match($anchorRegex, $video, $results)) {
                                    $link = trim($results[1]);
                                }
                            } else {
                                // we already have a url
                                $link = $video;
                            }
                            // if we have a URL, parse it down
                            if (!empty($link)) {
                                // initial values
                                $video_id = NULL;
                                $videoIdRegex = NULL;
                                $results = array();
                                // check for type of youtube link
                                if (strpos($link, 'youtu') !== FALSE) {
                                    if (strpos($link, 'youtube.com') !== FALSE) {
                                        // works on:
                                        // http://www.youtube.com/embed/VIDEOID
                                        // http://www.youtube.com/embed/VIDEOID?modestbranding=1&amp;rel=0
                                        // http://www.youtube.com/v/VIDEO-ID?fs=1&amp;hl=en_US
                                        $videoIdRegex = '/youtube.com\/(?:embed|v){1}\/([a-zA-Z0-9_]+)\??/i';
                                    } else if (strpos($link, 'youtu.be') !== FALSE) {
                                        // works on:
                                        // http://youtu.be/daro6K6mym8
                                        $videoIdRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
                                    }
                                    if ($videoIdRegex !== NULL) {
                                        if (preg_match($videoIdRegex, $link, $results)) {
                                            $video_str = 'http://www.youtube.com/v/%s?fs=1&amp;autoplay=1';
                                            $thumbnail_str = 'http://img.youtube.com/vi/%s/2.jpg';
                                            $fullsize_str = 'http://img.youtube.com/vi/%s/0.jpg';
                                            $video_id = $results[1];
                                        }
                                    }
                                } // handle vimeo videos
                                else if (strpos($video, 'vimeo') !== FALSE) {
                                    if (strpos($video, 'player.vimeo.com') !== FALSE) {
                                        // works on:
                                        // http://player.vimeo.com/video/37985580?title=0&amp;byline=0&amp;portrait=0
                                        $videoIdRegex = '/player.vimeo.com\/video\/([0-9]+)\??/i';
                                    } else {
                                        // works on:
                                        // http://vimeo.com/37985580
                                        $videoIdRegex = '/vimeo.com\/([0-9]+)\??/i';
                                    }
                                    if ($videoIdRegex !== NULL) {
                                        if (preg_match($videoIdRegex, $link, $results)) {
                                            $video_id = $results[1];
                                            // get the thumbnail
                                            try {
                                                $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$video_id.php"));
                                                if (!empty($hash) && is_array($hash)) {
                                                    $video_str = 'https://player.vimeo.com/video/%s';
                                                    $thumbnail_str = $hash[0]['thumbnail_small'];
                                                    $fullsize_str = $hash[0]['thumbnail_large'];
                                                } else {
                                                    // don't use, couldn't find what we need
                                                    unset($video_id);
                                                }
                                            } catch (Exception $e) {
                                                unset($video_id);
                                            }
                                        }
                                    }
                                }
                                // check if we have a video id, if so, add the video metadata
                                if (!empty($video_id)) {
                                    // add to return
                                    $videos[] = array(
                                        'url' => sprintf($video_str, $video_id),
                                        'thumbnail' => sprintf($thumbnail_str, $video_id),
                                        'fullsize' => sprintf($fullsize_str, $video_id)
                                    );
                                }
                            }
                        }
                    }
                    // return array of parsed videos
                    return $videos;
                }

                function convertYoutube($string)
                {
                    $new_link = preg_replace(
                        "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
                        "<iframe width=\"222\" height=\"120\" src=\"//www.youtube.com/embed/$2?controls=0&amp;showinfo=0&amp;enablejsapi=1&amp;iv_load_policy=3&amp;rel=0&amp;modestbranding=1\" frameborder=\"0\" allowfullscreen></iframe>",
                        $string
                    );
                    return $new_link;
                }

                $profile_idd = 0;
                $profile_idd = @$_GET['id'];

                $mediainfo = "SELECT * FROM `profile_media` WHERE `profile_id` = $profile_idd";
                $quy = mysqli_query($conn, $mediainfo);
                while (@$row = mysqli_fetch_array($quy)) {
                    if ($row['pm_type'] == 'video' && $row['pm_video_type'] == 'Vimeo') {
                        $vim_url = parseVideos($row['pm_url']);
                        // echo $ursl[0]['url'];
                        // print_r($ursl);
                        // exit;
                        //$video_wrap = '<iframe title="vimeo-player" src="'.$row['pm_url'].'" width="640" height="360" frameborder="0" allowfullscreen></iframe>';
                        $video_wrap = '<iframe class="embed-player slide-media" title="vimeo-player" src="' . $vim_url[0]['url'] . '" width="640" height="360" frameborder="0" allowfullscreen></iframe>';
                        $type_class = 'vimeo';
                    } else if ($row['pm_type'] == 'video' && $row['pm_video_type'] == 'Youtube') {
                        $tubelink = convertYoutube($row['pm_url']);
                        //$video_wrap = '<iframe src="'.$row['pm_url'].'" frameborder="0" allowfullscreen></iframe>';
                        $video_wrap = $tubelink;
                        //$video_wrap = '<iframe class="embed-player slide-media" src="https://www.youtube.com/embed/V2vwFS8ae2I?controls=0&amp;showinfo=0&amp;loop=1&playlist=V2vwFS8ae2I&amp;enablejsapi=1&amp;iv_load_policy=3&amp;rel=0&amp;modestbranding=1" frameborder="0" allowfullscreen></iframe>';
                        //$link = 'https://2019fun.justmy.com/upload/images/'.$row['pm_url'];
                        $type_class = 'youtubes';

                    } else {
                        $link = 'https://2019fun.justmy.com/upload/profiles_media/' . $row['pm_url'];
                        $video_wrap = '<div class="slide-image slide-media"><img src="' . $link . '"/></div>';
                        $type_class = 'image';
                    }
                    ?>
                    <div class="item youtube <?php echo $type_class; ?>">
                        <div class="video-background">
                            <div class="video-foreground">
                                <?php echo $video_wrap; ?>
                            </div>
                        </div>
                        <div class="overlay"></div>
                    </div>
                <?php } ?>
            </div>
            <div class="slide_counter">
                <img src="img/camera.png">
                <div class="pagingInfo"></div>


            </div>

            <!-- end -->
        </div>
    </div>
</div>
<!--    This is the START of section-header    -->
<div class="row">
    <div class="col-6" id="map" style="height: 450px;"></div>
    <div class="col-6" id="pano" style="height: 450px;"></div>
</div>

<?php require 'justbringit/footerarea.php'; ?>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" id="www-widgetapi-script"
        src="https://s.ytimg.com/yts/jsbin/www-widgetapi-vflS50iB-/www-widgetapi.js" async=""></script>
<script src="https://www.youtube.com/player_api"></script>
<script>

    var $status = $('.pagingInfo');
    var $slickElement = $('.slider-youtube');

    $slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
        var i = (currentSlide ? currentSlide : 0) + 1;
        $status.text(i + '/' + slick.slideCount);
    });


    var slideWrapper = $(".slider-youtube"),
        iframes = slideWrapper.find('.embed-player'),
        lazyImages = slideWrapper.find('.slide-image'),
        lazyCounter = 0;

    // POST commands to YouTube or Vimeo API
    function postMessageToPlayer(player, command) {
        if (player == null || command == null) return;
        player.contentWindow.postMessage(JSON.stringify(command), "*");
    }

    // When the slide is changing
    function playPauseVideo(slick, control) {
        var currentSlide, slideType, startTime, player, video;

        currentSlide = slick.find(".slick-current");
        slideType = currentSlide.attr("class").split(" ")[1];
        player = currentSlide.find("iframe").get(0);
        startTime = currentSlide.data("video-start");

        if (slideType === "vimeo") {
            switch (control) {
                case "play":
                    if ((startTime != null && startTime > 0) && !currentSlide.hasClass('started')) {
                        currentSlide.addClass('started');
                        postMessageToPlayer(player, {
                            "method": "setCurrentTime",
                            "value": startTime
                        });
                    }
                    postMessageToPlayer(player, {
                        "method": "play",
                        "value": 1
                    });
                    break;
                case "pause":
                    postMessageToPlayer(player, {
                        "method": "pause",
                        "value": 1
                    });
                    break;
            }
        } else if (slideType === "youtubes") {
            switch (control) {
                case "play":
                    postMessageToPlayer(player, {
                        "event": "command",
                        "func": "mute"
                    });
                    postMessageToPlayer(player, {
                        "event": "command",
                        "func": "playVideo"
                    });
                    break;
                case "pause":
                    postMessageToPlayer(player, {
                        "event": "command",
                        "func": "pauseVideo"
                    });
                    break;
            }
        } else if (slideType === "video") {
            video = currentSlide.children("video").get(0);
            if (video != null) {
                if (control === "play") {
                    video.play();
                } else {
                    video.pause();
                }
            }
        }
    }

    // Resize player
    function resizePlayer(iframes, ratio) {
        if (!iframes[0]) return;
        var win = $(".slider-youtube"),
            width = win.width(),
            playerWidth,
            height = win.height(),
            playerHeight,
            ratio = ratio || 16 / 9;

        iframes.each(function () {
            var current = $(this);
            if (width / ratio < height) {
                playerWidth = Math.ceil(height * ratio);
                current.width(playerWidth).height(height).css({
                    left: (width - playerWidth) / 2,
                    top: 0
                });
            } else {
                playerHeight = Math.ceil(width / ratio);
                current.width(width).height(playerHeight).css({
                    left: 0,
                    top: (height - playerHeight) / 2
                });
            }
        });
    }

    // DOM Ready
    $(function () {
        // Initialize
        slideWrapper.on("init", function (slick) {
            slick = $(slick.currentTarget);
            setTimeout(function () {
                playPauseVideo(slick, "play");
            }, 1000);
            resizePlayer(iframes, 16 / 9);
        });
        slideWrapper.on("beforeChange", function (event, slick) {
            slick = $(slick.$slider);
            playPauseVideo(slick, "pause");
        });
        slideWrapper.on("afterChange", function (event, slick) {
            slick = $(slick.$slider);
            playPauseVideo(slick, "play");
        });
        slideWrapper.on("lazyLoaded", function (event, slick, image, imageSource) {
            lazyCounter++;
            if (lazyCounter === lazyImages.length) {
                lazyImages.addClass('show');
                // slideWrapper.slick("slickPlay");
            }
        });

        //start the slider
        slideWrapper.slick({
            // fade:true,
            autoplaySpeed: 4000,
            slidesToShow: 3,
            lazyLoad: "progressive",
            speed: 600,
            arrows: true,
            dots: false,
            centerMode: true,
            //centerPadding: '50px',
            infinite: true,
            variableWidth: true,
            cssEase: "cubic-bezier(0.87, 0.03, 0.41, 0.9)"
        });
    });

    // Resize event
    $(window).on("resize.slickVideoPlayer", function () {
        resizePlayer(iframes, 9 / 6);
    });
</script>
</html>