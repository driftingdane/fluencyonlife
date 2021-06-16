<!-- It's for the click in body -->
<!-- <div class="overlay" id="overlay" onclick="closeNav()"></div> -->
<!-- This menu will be shown after scrolling -->
<nav id="nav" class="custom-menu navbar navbar-inverse fixed-top">
    <div class="container-fluid">
        <div class="col-sm-4 d-flex justify-content-start craft-bar">
            <?php if(!empty($data['siteImg'])) : ?>
                <a class="linkOnTop" href="<?php echo URLROOT; ?>">
                <img src="<?php echo URLROOT; ?>/img/<?php echo $data['siteImg']; ?>" title="Home" alt="logo">
                </a>
                <span class="text-white-60 text-uppercase" style="line-height: 0.9em; text-align: center; padding:0.3em; font-size: 0.8em;"><small>Fluency </br> on life</small></span>
            <?php endif; ?>
        </div>

        <div class="col-sm-4 d-flex justify-content-center justify-content-sm-center craft-bar text-center">
            <a class="btn-lg btn-cta collage-orange" id="phone" href="https://wa.me/5511<?php echo $data['phone']; ?>?text=Hello, Fluency On Life. Tell me more." target="_blank">
                <span class="font-400" style="font-size: small; vertical-align:top;"><i class="fab fa-whatsapp fa-2x"></i> WhatsApp</span></a>
        </div>
        <div class="mb-sm-5"></div>
        <div id="remove_flex" class="col-sm-4 d-sm-flex justify-content-center justify-content-sm-end craft-bar">
            <div class="main" id="main">
                <a onclick="openNav()">
                    <img class="zoom-act" src="<?php echo URLROOT; ?>/img/menu.png">
                </a>
            </div>
        </div>

    </div>
</nav>
<!--This is the sidenav bar  -->
<div id="mySidenav" class="sidenav text-center">
    <?php if(!empty($data['siteImg'])) : ?>
    <div class="sideNavLogo">
        <a href="<?php echo URLROOT; ?>">
            <img src="<?php echo URLROOT; ?>/img/logo_no_text.png" title="Home" alt="logo">
        </a>
    </div>
    <?php endif; ?>
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <!-- Leave HOME as static link -->
    <a class="nav-link" href="<?php echo URLROOT; ?>" style="display: none;">Home</a>
    <hr>
    <?php
    if(is_array($data)) :
    foreach ($data['menu'] as $menu) : ?>
        <!-- Get dynamic links from database -->
        <a class="nav-link" title="<?php echo menuLinks($menu->menu_name); ?>" href="<?php echo URLROOT; ?>/p/<?php echo $menu->menu_link; ?>"><?php echo $menu->menu_name; ?></a>
        <hr>
    <?php endforeach; endif; ?>

    <div class="social footer-social ml-3 mr-3 mt-4">
            <div class="text-black-50"><small><strong>Follow us</strong></small></div>
        <?php if (!empty($data['social']->facebook_so)) : ?>
            <a id="facebook-page-sidebar" href="<?php echo $data['social']->facebook_so; ?>" target="_blank"
               title="<?php echo SITENAME; ?> on Facebook"><i
                        class="fab fa-facebook fa-fw"></i></a>
        <?php endif; ?>
        <?php if (!empty($data['social']->twitter_so)) : ?>
            <a href="<?php echo $data['social']->twitter_so; ?>" target="_blank"
               title="<?php echo SITENAME; ?> on Twitter"><i
                        class="fab fa-twitter fa-fw"></i></a>
        <?php endif; ?>
        <?php if (!empty($data['social']->linkedin_so)) : ?>
            <a id="linkedin-page-sidebar" href="<?php echo $data['social']->linkedin_so; ?>" target="_blank"
               title="<?php echo SITENAME; ?> on Linkedin"><i
                        class="fab fa-linkedin fa-fw"></i></a>
        <?php endif; ?>

        <?php if (!empty($data['social']->google_so)) : ?>
            <a href="<?php echo $data['social']->google_so; ?>" target="_blank"
               title="<?php echo SITENAME; ?> on google plus"><i
                        class="fab fa-google-plus-g fa-fw"></i></a>
        <?php endif; ?>
        <?php if (!empty($data['social']->instagram_so)) : ?>
            <a id="instagram-page-sidebar" href="<?php echo $data['social']->instagram_so; ?>" target="_blank"
               title="<?php echo SITENAME; ?> on Instagram"><i
                        class="fab fa-instagram fa-fw"></i></a>
        <?php endif; ?>
        <?php if (!empty($data['social']->quora_so)) : ?>
            <a id="quora-page-sidebar" href="<?php echo $data['social']->quora_so; ?>" target="_blank"
               title="<?php echo SITENAME; ?> on Quora"><i
                        class="fab fa-quora fa-fw"></i></a>
        <?php endif; ?>
        <?php if (!empty($data['social']->youtube_so)) : ?>
            <a href="<?php echo $data['social']->youtube_so; ?>" target="_blank"
               title="<?php echo SITENAME; ?> on Youtube"><i
                        class="fab fa-youtube fa-fw"></i></a>
        <?php endif; ?>

        <div class="text-black-50"><small><strong>Share us</strong></small></div>
        <a title="Share on Facebook" class="customer share" href="http://www.facebook.com/sharer.php?u=<?php echo URLROOT . '/' . $_GET['url']; ?>"><i class="fab fa-facebook-f fa-fw"></i></a>
        <a title="Share on Linkedin" class="customer share" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo URLROOT . '/' . $_GET['url']; ?>&title="><i class="fab fa-linkedin-in fa-fw"></i></a>
        <a title="Share on WhatsApp" class="customer share" href=" https://wa.me/?text=<?php echo URLROOT . '/' . $_GET['url']; ?>"><strong><i class="fab fa-whatsapp fa-fw"></i></strong></a>
        </br>
        <div class="fb-like" data-href="https://www.facebook.com/fluencyonlife/" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false"></div>
    </div>
    <?php  if (isLoggedIn()) : ?>
        <a href="<?php echo URLROOT; ?>/admins" title="Admin area"><i class="fas fa-user-shield"></i></a>
    <?php endif; ?>
</div>

