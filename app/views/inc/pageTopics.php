<section class="section">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                // Show some topics on index and all on topics page
                if (empty($_GET['url'])) :
                    $specific = $data['limitTopics'];
                    $headerTitle = "Some of our";
                    $headerTitleSecond = "topics";
                else:
                    $specific = $data['allTopics'];
                    $headerTitle = "";
                    $headerTitleSecond = "";

                    $pitch = "A good question will always branch out and open up into something else.</br> 
                              There is no correct - false or wrong - right answer.
                              <br><br><span class='font-weight-bold'>Gain confidence</span> to express yourself using our conversation discussion game on life topics
                              and feel what happens. <br>                           
                              <span class='font-weight-bold'>Increase know how - knowledge - speech.</span>
                               <br><span class='text-black-50'>Remove shyness.</span>
                              ";
                endif;
                ?>
                <!-- Section title -->
                <div class="col-sm-6 mx-auto mt-4 lead text-center section-title wow fadeInUp" data-wow-delay="0.8s">
                    <h2 class="wow fadeInUp main-h index-headlines" data-wow-delay="0.2s"><?php echo $headerTitle; ?>
                        <span class="color-red"><?php echo $headerTitleSecond; ?></span>
                    </h2>
                    <p class="font-400">We concentrate on <span class="color-red">living</span> and the <span class="color-blue">world</span></strong></p>
                    <span class="text-black-50 text-uppercase">in English.</span>
                    <p class="font-400 index-headlines-small mt-3">We <span class="color-orange">share </span>together - answer and ask.</strong></p>

                </div>
                <div class="col-sm-6 mx-auto mt-4 section-title wow fadeInUp" data-wow-delay="0.8s">
                    <p class="text-left"><?php echo $pitch; ?></p>
                    <p class="text-center mt-5">
                        <strong class='font-400'>
                            <span class="color-red">Discover <img style="vertical-align: middle;" src="<?php URLROOT; ?>/img/discover.png"></span>
                            <span class="color-light-blue"><img style="vertical-align: middle;" src="<?php URLROOT; ?>/img/share.png"> Receive</span>
                            </br>
                            <span class="color-blue" style="margin-left: 1.1rem">Give <img style="vertical-align: middle;" src="<?php URLROOT; ?>/img/give.png"></span>
                            <span class="color-orange"><img style="vertical-align: middle;" src="<?php URLROOT; ?>/img/receive.png"> Share</span>
                        </strong>
                    </p>
                </div>

                <div class="row grid mt-5" style="margin: 0 auto;">
                    <!-- width of .grid-sizer used for columnWidth -->
                    <div class="grid-sizer"></div>
                    <?php
                    foreach ($specific as $topic) : ?>
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-sm-6 wow fadeInLeft grid-item <?php echo $topic->cat_class; ?>">
                            <div class="category-block">
                                <div class="header">
                                    <i style="<?php echo $topic->cat_color; ?>" class="<?php echo $topic->cat_icon; ?>"></i>
                                    <h3 class="lead"><?php echo $topic->cat_title; ?></h3>
                                </div>
                                <div class="category-list mb-3">
                                    <div class="text-center mb-2"><strong><small>Example question:</small></strong></div>
                                    <small class="text-black-50">
                                        <?php
                                        if($topic->cat_id == 9) { $method = "randoms"; } else { $method = "questions"; }
                                        $linkUrl = $method . '/' . $topic->fk_topic . '/' . prettyUrl($topic->cat_title) . '/' . $topic->qs_id . '/' . rand(0, 500). '/' . clean_string($topic->qs_question);
                                        $linkUrlLower = $method . '/' . $topic->fk_topic . '/' . prettyUrl($topic->cat_title) . '/' . $topic->qs_id . '/' . rand(0, 500). '/' . clean_string(strtolower($topic->qs_question));
                                        echo $topic->cat_desc; ?>
                                    </small>
                                </div>
                                <form action="<?php echo URLROOT; ?>/p/<?php echo $linkUrlLower; ?>" method="post">
                                    <input type="hidden" name="link" value="<?php echo $linkUrl; ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-info btn-block">New question</button>
                                </form>
                            </div>

                        </div> <!-- /Category List -->
                    <?php endforeach; ?>
                </div>
                <?php if (empty($_GET['url'])) : ?>
                <div class="col text-center mt-4">
                    <a class="btn btn-outline-primary" href="<?php echo URLROOT; ?>/p/topics">View all topics</a>
                </div>
                <?php endif; ?>

                <?php if ($_GET['url'] === "topics") : ?>
                    <div class="col text-center mt-4">
                        <a href="<?php echo URLROOT; ?>/p/contact" class="btn btn-outline-primary">Engage now</a>
                    </div>
                <?php endif; ?>

            </div>
        </div>
      </div>
    <!-- Container End -->
</section>