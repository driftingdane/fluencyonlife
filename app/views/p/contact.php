<div id="page-content"><!-- Needed for sticky footer-->
    <main role="main">
        <!--==========================================
=            Header Section            =
===========================================-->
        <div class="bg-banner-contact clip-ellipse mb-5">

            <div class="ovrllay">
                <div class="header_aera affix-top"></div>
                <!-- #banner start -->
                <section id="banner" class="mb-90">
                    <div class="container ">
                        <?php echo flash('contact_message'); ?>
                        <?php echo flash_error('contact_error'); ?>
                        <div class="row">
                            <!-- #banner-text start -->
                            <div id="banner-text" class="col-md-12 text-c text-center">
                                <p class="wow fadeInDown main-h text-uppercase" data-wow-delay="0.2s"><span class="text-white-50">We love </span></p>
                                <h1 class="wow fadeInUp main-h text-uppercase" data-wow-delay="0.5s"><span class="text-white-60"><?php echo $data['title']; ?></span> </h1>
                                <p class="wow fadeInUp main-h text-uppercase" data-wow-delay="0.9s""><span class="text-white-50">At <?php echo SITENAME; ?></span></p>
                            </div>
                            <!-- /#banner-text End -->
                        </div>
                    </div>
                </section>
            </div>
        </div>


        <section class="section index-headlines">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5 offset-md-1">
                            <h2>Get in <span class="text-info">touch</span></h2>
                            <p>Please fill in all fields with <sub>*</sub></p>
                            <form class="icon-form" action="<?php echo URLROOT; ?>/p/contact" method="post">
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="ctName">
                                        <p><i class="fas fa-signature formIcons"></i> Name: <sub>*</sub></p></label>
                                    <input type="text" name="ctName"
                                           class="form-control form-control-lg <?php echo (!empty($data['ctName_err'])) ? 'is-invalid' : ''; ?>"
                                           value="<?php echo $data['ctName']; ?>" required>
                                    <span class="invalid-feedback"><?php echo $data['ctName_err']; ?></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ctEmail">
                                        <p><i class="fas fa-at formIcons"></i> Email: <sub>*</sub></p></label>
                                    <input type="email" name="ctEmail"
                                           class="form-control form-control-lg <?php echo (!empty($data['ctEmail_err'])) ? 'is-invalid' : ''; ?>"
                                           value="<?php echo $data['ctEmail']; ?>" required>
                                    <span class="invalid-feedback"><?php echo $data['ctEmail_err']; ?></span>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="ctMsg">
                                        <p><i class="far fa-comment-alt formIcons"></i> Message: <sub>*</sub></p></label>
                                    <textarea name="ctMsg"
                                              class="form-control form-control-lg profile_form_bio <?php echo (!empty($data['ctMsg_err'])) ? 'is-invalid' : ''; ?>"
                                              required><?php echo $data['ctMsg']; ?></textarea>
                                    <span class="invalid-feedback"><?php echo $data['ctMsg_err']; ?></span>
                                </div>
                            </div>

                                <div class="form-group">
                                    <input type="submit" value="Send" class="btn btn-primary btn-xs-block">
                                </div>
                            </form>
                    </div>

                    <div class="col-md-6 mt-5 mt-sm-5 mt-md-0 mt-lg-0">
                            <div class="tagGroup-wrapper">
                                <div class="tag header">
                                    <h2>Our <span class="color-red">details</span></h2>
                                    <div class="tag-experience mb-4">
                                        <strong>WhatsApp:</strong><p>(11) <i class="fab fa-whatsapp-square formIcons"></i> <?php echo $data['phone']; ?></p>
                                    </div>
                                        <div class="tag-experience">
                                        <strong>Email:</strong><p>hello <i class="fas fa-at formIcons"></i> <?php echo COMROOT; ?></p>
                                        </div>

                                    <div class="wow fadeIn footer-icon">
                                        <div class="mb-4 social footer-social">
                                            <?php if (!empty($data['social']->facebook_so)) : ?>
                                                <a id="facebook-page-contact" href="<?php echo $data['social']->facebook_so; ?>" target="_blank"
                                                       title="<?php echo SITENAME; ?> on Facebook"><i
                                                                class="fab fa-facebook fa-fw"></i></a>
                                            <?php endif; ?>
                                            <?php if (!empty($data['social']->twitter_so)) : ?>
                                                <a href="<?php echo $data['social']->twitter_so; ?>" target="_blank"
                                                       title="<?php echo SITENAME; ?> on Twitter"><i
                                                                class="fab fa-twitter fa-fw"></i></a>
                                            <?php endif; ?>
                                            <?php if (!empty($data['social']->linkedin_so)) : ?>
                                                <a id="linkedin-page-contact" href="<?php echo $data['social']->linkedin_so; ?>" target="_blank"
                                                       title="<?php echo SITENAME; ?> on Linkedin"><i
                                                                class="fab fa-linkedin fa-fw"></i></a>
                                            <?php endif; ?>
                                            <?php if (!empty($data['social']->google_so)) : ?>
                                                <a href="<?php echo $data['social']->google_so; ?>" target="_blank"
                                                       title="<?php echo SITENAME; ?> on google plus"><i
                                                                class="fab fa-google-plus-g fa-fw"></i></a>
                                            <?php endif; ?>
                                            <?php if (!empty($data['social']->instagram_so)) : ?>
                                                <a id="instagram-page-contact" href="<?php echo $data['social']->instagram_so; ?>" target="_blank"
                                                       title="<?php echo SITENAME; ?> on Instagram"><i
                                                                class="fab fa-instagram fa-fw"></i></a>
                                            <?php endif; ?>
                                            <?php if (!empty($data['social']->quora_so)) : ?>
                                                <a id="quora-page-contact" href="<?php echo $data['social']->quora_so; ?>" target="_blank"
                                                   title="<?php echo SITENAME; ?> on Quora"><i
                                                            class="fab fa-quora fa-fw"></i></a>
                                            <?php endif; ?>
                                            <?php if (!empty($data['social']->youtube_so)) : ?>
                                                <a href="<?php echo $data['social']->youtube_so; ?>" target="_blank"
                                                       title="<?php echo SITENAME; ?> on Youtube"><i
                                                                class="fab fa-youtube fa-fw"></i></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <div class="tagGroup-wrapper">
                          <div class="tag border-none"><h5>Whatever your<span class="text-info"> preferences</span></h5>
                            <small class="text-black mt-1">
                                <ul class="list-unstyled">
                                    <li><strong><?php echo $data['info']; ?></strong></li>
                                </ul>
                            </small>
                           </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
</div><!-- Page id ends sticky footer-->
