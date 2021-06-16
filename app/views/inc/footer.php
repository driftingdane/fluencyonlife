<!--contact-->
<section class="collage-orange p-4" id="contact">
    <div class="container">
        <div class="row d-flex flex-column flex-md-row align-items-center text-white-50 text-center wow fadeIn">
            <div class="col-sm-4 p-sm-3">
                <p class="lead">(11) <i class="fab fa-whatsapp"></i> <?php echo $data['phone']; ?></p>
            </div>
            <div class="col-sm-4 p-sm-3">
                <p class="lead">Hello <i class="fas fa-at"></i> <?php echo COMROOT; ?></p>

            </div>
            <div class="col-sm-4 col-md-3 offset-md-1 p-sm-3">
                <p class="lead">São Paulo <i class="fas fa-city"></i> Brasil</p>
            </div>
        </div>
    </div>
</section>

<!--footer-->
<section class="bg-footer footer" id="connect">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 mx-auto text-center wow fadeIn footer-icon">
                <h4 class="lead text-uppercase text-black-50">Connect in English where it matters.</h4>
                <div class="social footer-social mt-2">
                    <div class="text-black-50"><small><strong>Follow us</strong></small></div>
                    <?php if (!empty($data['social']->facebook_so)) : ?>
                        <a id="facebook-page-footer" href="<?php echo $data['social']->facebook_so; ?>" target="_blank"
                           title="<?php echo SITENAME; ?> on Facebook"><i
                                    class="fab fa-facebook fa-fw"></i></a>
                    <?php endif; ?>
                    <?php if (!empty($data['social']->twitter_so)) : ?>
                        <a href="<?php echo $data['social']->twitter_so; ?>" target="_blank"
                           title="<?php echo SITENAME; ?> on Twitter"><i
                                    class="fab fa-twitter fa-fw"></i></a>
                    <?php endif; ?>
                    <?php if (!empty($data['social']->linkedin_so)) : ?>
                        <a id="linkedin-page-footer" href="<?php echo $data['social']->linkedin_so; ?>" target="_blank"
                           title="<?php echo SITENAME; ?> on Linkedin"><i
                                    class="fab fa-linkedin fa-fw"></i></a>
                    <?php endif; ?>
                    <?php if (!empty($data['social']->google_so)) : ?>
                        <a href="<?php echo $data['social']->google_so; ?>" target="_blank"
                           title="<?php echo SITENAME; ?> on google plus"><i
                                    class="fab fa-google-plus-g fa-fw"></i></a>
                    <?php endif; ?>
                    <?php if (!empty($data['social']->instagram_so)) : ?>
                        <a id="instagram-page-footer" href="<?php echo $data['social']->instagram_so; ?>" target="_blank"
                           title="<?php echo SITENAME; ?> on Instagram"><i
                                    class="fab fa-instagram fa-fw"></i></a>
                    <?php endif; ?>

                    <?php if (!empty($data['social']->quora_so)) : ?>
                        <a id="quora-page-footer" href="<?php echo $data['social']->quora_so; ?>" target="_blank"
                           title="<?php echo SITENAME; ?> on Quora"><i
                                    class="fab fa-quora fa-fw"></i></a>
                    <?php endif; ?>

                    <?php if (!empty($data['social']->youtube_so)) : ?>
                        <a href="<?php echo $data['social']->youtube_so; ?>" target="_blank"
                           title="<?php echo SITENAME; ?> on Youtube"><i
                                    class="fab fa-youtube fa-fw"></i></a>
                    <?php endif; ?>
                    <div class="text-black-50 mt-2"><small><strong>Share us</strong></small></div>
                    <a title="Share on Facebook" class="customer share" href="http://www.facebook.com/sharer.php?u=<?php echo URLROOT . '/' . $_GET['url']; ?>"><i class="fab fa-facebook-f fa-fw"></i></a>
                    <a title="Share on Linkedin" class="customer share" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo URLROOT . '/' . $_GET['url']; ?>&title="><i class="fab fa-linkedin-in fa-fw"></i></a>
                    <a title="Share on WhatsApp" class="customer share" href=" https://wa.me/?text=<?php echo URLROOT . '/' . $_GET['url']; ?>"><strong><i class="fab fa-whatsapp fa-fw"></i></strong></a>
                    </br>
                    <div class="fb-like" data-href="https://www.facebook.com/fluencyonlife/" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false"></div>
                </div>
                <p class="pt-2 text-muted copyright mt-5">
                    <small><?php echo SITENAME; ?> created by <a href="<?php echo CREATEDBYURL; ?>" target="_blank"><?php echo CREATEDBY; ?></a>
                        <span><?php echo date("Y");?> all rights reserved</span>
                        <a href="<?php echo URLROOT; ?>"><?php echo COPYRIGHT . COMROOT; ?></a>
                        <span>CNPJ: <?php echo $data['siteID']; ?></small>
                    </small>
                </p>

            </div>
        </div>
    </div>

    <div id="go-top">
        <a class="smoothscroll" title="Back to Top" href="#top">
            <i class="fas fa-long-arrow-alt-up"></i>
        </a>
    </div>

</section>


</body>

<script src="<?php echo URLROOT; ?>/js/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="<?php echo URLROOT; ?>/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="<?php echo URLROOT; ?>/js/wow.min.js" type="text/javascript"></script>
<script  src="<?php echo URLROOT; ?>/js/isotope.js" type="text/javascript"></script>
<script  src="<?php echo URLROOT; ?>/js/image-reloaded.js" type="text/javascript"></script>
<script src="<?php echo URLROOT; ?>/js/main.js" type="text/javascript"></script>

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-N9HBXDZ');</script>
<!-- End Google Tag Manager -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-159951450-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-159951450-1');
</script>

</html>