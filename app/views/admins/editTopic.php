<div id="page-content"><!-- Needed for sticky footer-->
    <main role="main">
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8 mx-auto">
                        <div class="card card-body bg-light mb-5">
                            <?php echo flash('resume_message'); ?>
                            <h2><span class="text-info">Edit</span> topic</h2>
                            <p>Please fill in all fields with <sub>*</sub></p>
                            <form class="icon-form" action="<?php echo URLROOT; ?>/admins/editTopic/<?php echo $data['oneTopic']->cat_id; ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $_GET['url']; ?>" name="returnUrl">
                                <div class="form-group">
                                    <label for="catTitle">
                                        <p><i class="fas fa-heading formIcons"></i> Topic: <sub>*</sub></p></label>
                                    <input name="catTitle"
                                           class="form-control form-control-lg <?php echo (!empty($data['catTitle_err'])) ? 'is-invalid' : ''; ?>"
                                           value="<?php echo $data['oneTopic']->cat_title; ?>" required>
                                    <span class="invalid-feedback"><?php echo $data['catTitle_err']; ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="catDesc"><p><i class="fas fa-comments formIcons"></i> Description: </p></label>
                                    <textarea name="catDesc" class="form-control form-control-lg"><?php echo $data['oneTopic']->cat_desc; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="catIcon">
                                        <p><i class="fas fa-heading formIcons"></i> Icon: </p></label>
                                    <input name="catIcon" class="form-control form-control-lg" value="<?php echo $data['oneTopic']->cat_icon; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="catColor">
                                        <p><i class="fas fa-heading formIcons"></i> Icon color: <sub>*</sub></p></label>
                                    <textarea name="catColor" class="form-control form-control-lg" placeholder="CSS styles"><?php echo $data['oneTopic']->cat_color; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Update" class="btn btn-success btn-block">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <?php require APPROOT . '/views/admins/inc/listTopics.php'; ?>
            </div>
</div>
</section>


</main>
</div><!-- Page id ends sticky footer-->

