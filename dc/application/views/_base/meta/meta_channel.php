<?php
$title=$channel->channel_title.' '.$market['market_name'];
$facebook_image=admin_image_url($channel->channel_facebook_image);
?>
<title><?php echo $title; ?></title>

<meta name="description" content="<?php echo $channel->channel_description; ?>">

<!-- Google / Search Engine Tags -->
<meta itemprop="name" content="<?php echo $title; ?>">
<meta itemprop="description" content="<?php echo $channel->channel_description; ?>">
<meta itemprop="image" content="<?php echo $facebook_image; ?>">

<!-- Facebook Meta Tags -->
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $title; ?>">
<meta property="og:description" content="<?php echo $channel->channel_description; ?>">
<meta itemprop="image" content="<?php echo $facebook_image; ?>">

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="<?php echo admin_image_url($channel->featured_image); ?>">
<meta name="twitter:title" content="<?php echo $title; ?>">
<meta name="twitter:description" content="<?php echo $channel->channel_description; ?>">
<meta name="twitter:image" content="<?php echo $facebook_image; ?>">
