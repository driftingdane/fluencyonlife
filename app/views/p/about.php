<div id="page-content"><!-- Needed for sticky footer-->
    <main role="main">
        <section>
            <!--==========================================
            =            Header Section            =
            ===========================================-->
            <div class="bg-banner-about clip-ellipse mb-5">
                <div class="ovrllay">
                    <div class="header_aera affix-top"></div>
                    <!-- #banner start -->
                    <section id="banner" class="mb-90">
                        <div class="container">
                            <div class="row">
                                <!-- #banner-text start -->
                                <div id="banner-text" class="col-md-12 text-c text-center ">
                                    <p class="wow fadeInDown main-h text-uppercase" data-wow-delay="0.2s">
                                        <span class="text-white-50">You should know</span></p>
                                    <h1 class="wow fadeInUp main-h text-uppercase mb-3" data-wow-delay="0.4s">
                                        <span class="text-white-60"><?php echo $data['title']; ?></span>
                                    </h1>
                                    <p class="wow fadeInUp main-h text-uppercase" data-wow-delay="0.9s""><span class="text-white-50">At <?php echo SITENAME; ?></span></p
                                </div>
                                <!-- /#banner-text End -->
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-sm-6 mx-auto mt-4 lead text-center index-headlines wow fadeInDown"
                             data-wow-delay="0.2s">
                            <h2 class="mb-5">Who we <span class="color-red">are</span></h2>
                        </div>

                        <div class="row no-gutters align-items-center mt-sm-3 mb-sm-3">
                            <div class="col-md-6 text-center order-md-2 mb-md-0 mb-sm-5">
                                <img class="img-fluid" src="<?php echo URLROOT; ?>/images/custom-shape4.jpg">
                            </div>
                            <div class="col-md-6 order-md-1 pl-md-5 pr-md-5 pt-md-5 pb-md-0 mt-4 mt-sm-0 mt-lg-0">
                                <p class="text-left font-400 p-4" style="word-spacing: 0.2em;"><?php echo $data['siteAbout']; ?></p>
                            </div>
                                <div class="col-md-6 mx-auto order-md-3 text-center mt-4 wow fadeInUp" data-wow-delay="0.7s">
                                    <strong class="font-400">
                                        <span class="color-red">Discover <img style="vertical-align: middle;" src="<?php URLROOT; ?>/img/discover.png"></span>
                                        <span class="color-light-blue"><img style="vertical-align: middle;" src="<?php URLROOT; ?>/img/share.png"> Receive</span>
                                        </br>
                                        <span class="color-blue" style="margin-left: 1.1rem">Give <img style="vertical-align: middle;" src="<?php URLROOT; ?>/img/give.png"></span>
                                        <span class="color-orange"><img style="vertical-align: middle;" src="<?php URLROOT; ?>/img/receive.png"> Share</span>
                                    </strong>
                                <div class="text-black-50 text-uppercase mt-3">In English.</div>
                               </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center mt-5">
                        <a id="join" href="<?php echo URLROOT; ?>/p/contact"
                           class="btn-lg btn-primary text-uppercase wow fadeInUp js-scroll-trigger" data-wow-delay="1s" href="#">Join
                            us</a>
                    </div>
                </div>
            </div>


        </section>
    </main>
</div><!-- Page id ends sticky footer-->
