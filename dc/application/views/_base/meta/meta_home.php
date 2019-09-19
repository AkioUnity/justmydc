<?php
$facebook_image=admin_image_url($market['market_facebook_image']);
?>

<title><?php echo $market['market_site_title']; ?></title>

<meta name="description" content="<?php echo $market['market_description']; ?>">

<!-- Google / Search Engine Tags -->
<meta itemprop="name" content="<?php echo $market['market_site_title']; ?>">
<meta itemprop="description" content="<?php echo $market['market_description']; ?>">
<meta itemprop="image" content="<?php echo $facebook_image; ?>">

<!-- Facebook Meta Tags -->
<meta property="og:url" content="https://dc.justmy.com/post/viewpost/nation-K-12-report-card">
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $market['market_site_title']; ?>">
<meta property="og:description" content="<?php echo $market['market_description']; ?>">
<meta property="og:image" content="<?php echo $facebook_image; ?>">

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="<?php echo admin_image_url($market['market_header_image']); ?>">
<meta name="twitter:title" content="<?php echo $market['market_site_title']; ?>">
<meta name="twitter:description" content="<?php echo $market['market_description']; ?>">
<meta name="twitter:image" content="<?php echo $facebook_image; ?>">