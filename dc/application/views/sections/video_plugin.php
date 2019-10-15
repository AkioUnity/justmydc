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
?>