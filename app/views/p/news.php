<div class="<?php echo checkHome(); ?>" id="page-content"><!-- Needed for sticky footer-->
    <main role="main">
        <section>
            <div class="container-fluid">
                <h2 class="text-center"><i class="fas fa-chevron-left"></i> <span class="text-info"><?php echo $data['siteName'] . '</span> ' .$data['title']; ?> <i class="fas fa-chevron-right"></i></h2>
                <div class="col-sm-12 mt-4 lead text-center">
                    <?php
                    if(empty($data['news'])) :
                    echo "No news";
                    endif;
                    foreach($data['news'] as $ns) : ?>
                                <h4><?php echo $ns->ns_title; ?></h4>
                                <p><?php echo $ns->ns_msg; ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>
</div>