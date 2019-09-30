

<?php
function youtube_id_from_url($url) {
    $pattern = 
        '%^# Match any youtube URL
        (?:https?://)?  # Optional scheme. Either http or https
        (?:www\.)?      # Optional www subdomain
        (?:             # Group host alternatives
          youtu\.be/    # Either youtu.be,
        | youtube\.com  # or youtube.com
          (?:           # Group path alternatives
            /embed/     # Either /embed/
          | /v/         # or /v/
          | /watch\?v=  # or /watch\?v=
          )             # End path alternatives.
        )               # End host alternatives.
        ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
        $%x'
        ;
    $result = preg_match($pattern, $url, $matches);
    if ($result) {
        return $matches[1];
    }
    return false;
}

echo '1'.youtube_id_from_url('http://youtu.be/NLqAF9hrVbY'); # NLqAF9hrVbY
echo '<br>';
echo '2'.youtube_id_from_url('https://www.youtube.com/watch?v=8MN2bxMiB9A');
echo '<br>';
echo '3'.youtube_id_from_url('https://youtu.be/8MN2bxMiB9A');
echo '<br>';
echo '4'.youtube_id_from_url('https://youtu.be/8MN2bxMiB9A');
echo '<br>';
echo '5'.youtube_id_from_url('https://www.youtube.com/embed/8MN2bxMiB9A');  
echo '<br>';
 $video_url = 'https://www.youtube.com/watch?v=8MN2bxMiB9A';
 $api_key = 'AIzaSyCNfVp4aO21MrfZoki-8skeJkKGFJVQVjM';
  
$api_urls = 'https://www.googleapis.com/youtube/v3/videos?id='.youtube_id_from_url($video_url).'&key='.$api_key.'&part=snippet';
 $data = json_decode(file_get_contents($api_urls));
 //echo '<pre>'; print_r($data); die;
 echo '<strong>Title: </strong>'.$data->items[0]->snippet->title.'<br>';
 echo '<strong>Description: </strong>'.$data->items[0]->snippet->description.'<br>';
 echo '<strong>Duration: </strong>'.$data->items[0]->snippet->duration.'<br>';

?>
