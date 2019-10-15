<?php
$facebook_image=admin_image_url($sub_category->cc_fbimage);
if (isset($profile_title))
    $row['name']=$profile_title;
?>

<title><?php echo $row['name']; ?></title>

<meta name="description" content="<?php echo $sub_category->cc_description; ?>">

<!-- Google / Search Engine Tags -->
<meta itemprop="name" content="<?php echo $row['name']; ?>">
<meta itemprop="description" content="<?php echo $sub_category->cc_description; ?>">
<meta itemprop="image" content="<?php echo $facebook_image; ?>">

<!-- Facebook Meta Tags -->
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $row['name']; ?>">
<meta property="og:description" content="<?php echo $sub_category->cc_description; ?>">
<meta property="og:image" content="<?php echo $facebook_image; ?>">

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="<?php echo admin_image_url($sub_category->cc_featuredimage); ?>">
<meta name="twitter:title" content="<?php echo $row['name']; ?>">
<meta name="twitter:description" content="<?php echo $sub_category->cc_description; ?>">
<meta name="twitter:image" content="<?php echo $facebook_image; ?>">

