<?php
//$uriSegments = explode("/", parse_url($_GET['url'], PHP_URL_PATH));
//$new_title = str_replace( ['-'], ' ', ucfirst($uriSegments[3]));
if($data['urlPart'][1] === "randoms") : $AnchorId = "e"; $cl = ""; else: $AnchorId = "h"; endif; ?>
<section class="section" id="<?php echo $AnchorId; ?>">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section title -->
                <div class="col-sm-6 mx-auto mt-4 lead text-center section-title wow fadeInUp" data-wow-delay="0.8s">
                    <span class="wow fadeInUp main-h index-headlines" data-wow-delay="0.2s"></span>
                </div>
                <div class="row" id="<?php echo $AnchorId; ?>">
                    <!-- width of .grid-sizer used for columnWidth -->
                    <!--<div class="grid-sizer"></div>-->
                        <!-- Category list -->
                        <div class="col-sm-8 mx-auto wow fadeInLeft mb-5">
                            <div class="category-block">
                                <div class="text-center mb-3">
                                <a title="Share on Facebook" class="customer share" href="http://www.facebook.com/sharer.php?u=<?php echo URLROOT . '/' . $_GET['url']; ?>"><i class="fab fa-facebook-f fa-fw"></i></a>
                                <a title="Share on Linkedin" class="customer share" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo URLROOT . '/' . $_GET['url']; ?>&title="><i class="fab fa-linkedin-in fa-fw"></i></a>
                               </div>
                                <div class="header">
                                 <?php
                                 if($data['urlPart'][1] === "randoms") :
                                  $method = "randoms";
                                 foreach ($data['topic_icons'] as $icon) : ?>
                                     <i style="<?php echo $icon->cat_color; ?>" class="<?php echo $icon->cat_icon; ?>"></i>
                                  <?php endforeach; ?>
                                     <div class="text-black-50"><small>All Categories</small></div>
                                    <h4><?php echo $data['cat_title']; ?></h4>
                                  <?php else :
                                    $method = "questions";
                                   ?>
                                    <i style="<?php echo $data['random']->cat_color; ?>" class="<?php echo $data['random']->cat_icon; ?>"></i>
                                    <h4 id="askTitle"><?php echo $data['cat_title']; ?></h4>
                                  <?php endif; ?>
                                </div>
                                <div class="category-list text-center">
                                    <p class="font-400">
                                        <?php echo $data['siteDesc'];
                                         $linkUrl = $method . '/' . $data['random']->fk_topic . '/' . prettyUrl($data['random']->cat_title) . '/' . $data['random']->qs_id . '/' . rand(0, 500). '/' . clean_string($data['random']->qs_question);
                                         $linkUrlLower = $method . '/' . $data['random']->fk_topic . '/' . prettyUrl($data['random']->cat_title) . '/' . $data['random']->qs_id . '/' . rand(0, 500). '/' . clean_string(strtolower($data['random']->qs_question));
                                        ?>
                                    </p>
                                </div>

                            </div>

                        </div> <!-- /Category List -->

                    <div class="col-sm-12 text-center mb-5">
                        <div class="btn-group border-0 text-uppercase">
                            <a class="btn btn-outline" href="<?php echo URLROOT; ?>/p/topics">Another Topic</a>
                            <p class="color-dark-blue font-400 m-1"> <i class="fas fa-long-arrow-alt-left"></i> Chicken or dare?   <i class="fas fa-long-arrow-alt-right"></i></p>
                            <form action="<?php echo URLROOT; ?>/p/<?php echo $linkUrlLower; ?>#<?php echo $AnchorId; ?>" method="post">
                                <input type="hidden" name="link" value="<?php echo $linkUrl; ?>">
                                <button type="submit" class="btn btn-outline text-uppercase">New question?</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- Container End -->
</section>