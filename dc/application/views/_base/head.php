<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo $base_url; ?>" />
    <!-- HTML Meta Tags -->
    <?php
    if (isset($meta_file))
        include 'meta/'.$meta_file.'.php';
    else {
        include 'meta/meta_home.php'; }?>

    <!-- HTML Meta Tags End -->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
<!--		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
<!--		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
<!--	<![endif]-->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--    css-->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans"/>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Comfortaa"/>
    <link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>

    <link rel="stylesheet" type="text/css" href="<?php echo css_url('main.css')?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url('dist/frontend/frontend.css')?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo css_url('interactive.css')?>"/>

    <link rel="shortcut icon" type="image/png" href="https://2019fun.justmy.com/bran-media/favicon_bGd_icon.ico"/>
    <link rel="shortcut icon" type="image/ico" href="https://2019fun.justmy.com/bran-media/favicon.png"/>

<!--javascript-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <style type="text/css">
        h1#title1 {
            font-family: 'Roboto';
        }
        h5#card {
            font-family: 'Roboto';
        }

        h4#title2 {
            font-family: "Open Sans";
            font-size: 26px;
        }

        img#footer {
            border-radius: 10px;
            border-bottom-right-radius: 0px;
            width: 88%;
            height: auto;
        }

        h4#footer {
            color: white;
        }

        p#footer {
            color: white;
        }
        p#cardlink {
            line-height: 1.9em;
            color: #666666;
            font-size: 14px;
            font-family: "Roboto Slab";

        }
        img#photo {
            border-radius: 8px;
            border-bottom-right-radius: 0px;
            width: 100%;
            height: auto;
        }
        iframe#video {
            border-radius: 8px;
            border-bottom-right-radius: 0px;
            text-align: center;
            box-shadow: 8px 8px 10px #cbcbcb;
        }

        p#video span {
            font-size: 16px;
        }

        p#video {
            color: #404040;
        }
        img#card {
            width: 100%;
            padding-top: 10%;
            padding-bottom: 10%;
            padding-right: 68%;
        }

        select.form-control:not([size]):not([multiple]) {
            height: calc(3.25rem + 2px);
        }
    </style>
</head>
<body class="<?php echo $body_class; ?>">