<?php 
$page_title=$view['cp_title'].'-'.$market['market_name'];
$facebook_image=admin_image_url($view['cp_post_facebook_image']);
?>

<title><?php echo $page_title; ?></title>

<meta name="description" content="<?php echo $view['cp_post_excerpt']; ?>">

<!-- Google / Search Engine Tags -->
<meta itemprop="name" content="<?php echo $page_title; ?>">
<meta itemprop="description" content="<?php echo $view['cp_post_excerpt']; ?>">
<meta itemprop="image" content="<?php echo $facebook_image; ?>">

<!-- Facebook Meta Tags -->
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $page_title; ?>">
<meta property="og:description" content="<?php echo $view['cp_post_excerpt']; ?>">
<meta property="og:image" content="<?php echo $facebook_image; ?>">

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="<?php echo admin_image_url($view['cp_post_image']); ?>">
<meta name="twitter:title" content="<?php echo $page_title; ?>">
<meta name="twitter:description" content="<?php echo $view['cp_post_excerpt']; ?>">
<meta name="twitter:image" content="<?php echo $facebook_image; ?>">
