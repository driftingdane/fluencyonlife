<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>

    <!--Custom Build CMS (Custom Build MVC) Created by: Morten Noerregaard
          http://CraftinDev.com
          Programming by: Morten Noerregaard
          Design by: Morten Noerregaard
          Any Wordpress or framework? NO!!!!  -->

    <meta name="robots" content="all">
    <meta http-equiv="Cache-Control" content="max-age=200">
    <!-- Enable Standards mode -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="canonical" href="<?php echo URLROOT , '/' . $_GET['url']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $data['title'].' | '.SITENAME; ?></title>
    <!-- Apple devices -->
    <link rel="apple-touch-icon-precomposed" href="<?php echo URLROOT . '/img/' .  $data['siteImg']; ?>" type="image/png">
    <!-- 152x152 -->
    <link rel="icon" href="<?php echo URLROOT . '/img/' .  $data['siteImg']; ?>" type="image/png">
    <!-- 32x32 or 64x64 -->
    <!-- For IE -->
    <!--[if IE]><link rel="shortcut icon" href="img/favicon/favicon.ico"><![endif]-->
    <!-- 16x16 -->
    <!-- For Mobile Windows -->
    <meta name="msapplication-TileColor" content="#D83434">
    <meta name="msapplication-TileImage" content="<?php echo URLROOT . '/img/' . $data['siteImg']; ?>" type="image/png">
    <!-- 32x32 or 64x64 -->
    <link rel="icon" href="<?php echo URLROOT . '/img/' . $data['siteImg']; ?>" type="image/png">
    <meta name="author" content="<?php echo $data['creator']; ?>">
    <meta name="description" content="<?php echo strip_tags($data['siteDesc']); ?>">
    <meta name="keywords" content="<?php echo $data['siteKeywords']; ?>">
    <meta name="copyright" content="<?php echo CREATEDBYURL; ?>">

    <!-- Facebook OpenG -->
    <meta property="fb:admins" content="106927574250954">
    <meta property="fb:app_id" content="">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo $data['title']; ?>">
    <meta property="og:site_name" content="<?php echo SITENAME; ?>">
    <meta property="og:url" content="<?php echo URLROOT . '/' . $_GET['url']; ?>">
    <meta property="og:image" content="<?php echo URLROOT . '/img/' . $data['ogImg']; ?>" type="image/png">
    <meta property="og:description" content="<?php echo strip_tags($data['siteDesc']); ?>">
    <!--TWITTER-->
    <meta property="twitter:card" content="summary">
    <meta property="twitter:title" content="<?php echo $data['title']; ?>">
    <meta property="twitter:description" content="<?php echo strip_tags($data['siteDesc']); ?>">
    <meta property="twitter:creator" content="<?php echo $data['creator']; ?>">
    <meta property="twitter:url" content="<?php echo URLROOT . '/' . $_GET['url']; ?>">
    <meta property="twitter:image" content="<?php echo URLROOT . '/img/' . $data['ogImg']; ?>" type="image/png">
    <meta property="twitter:image:alt" content="<?php echo URLROOT . '/img/' . $data['ogImg']; ?>" type="image/png">

    <!--GOOGLE+-->
    <link rel="author" href="<?php echo $data['creator']; ?>">
    <link rel="publisher" href="<?php echo $data['creator']; ?>">

    <!-- regular styles -->
    
    <link href="<?php echo URLROOT; ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URLROOT; ?>/css/main.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URLROOT; ?>/css/media_custom.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URLROOT; ?>/css/animate.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URLROOT; ?>/css/forms.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URLROOT; ?>/css/footer.css" rel="stylesheet" type="text/css">
    <!-- custom imports -->
    <link href="<?php echo URLROOT; ?>/node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
    <!--- CSS files are imported into scss -->
    <link href="<?php echo URLROOT; ?>/scss/scss.css" rel="stylesheet" type="text/css" >

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>


    <script async src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script async src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body id="top">
<!-- Google Tag Manager (noscript)-->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N9HBXDZ"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script>



