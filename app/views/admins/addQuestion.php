<div id="page-content"><!-- Needed for sticky footer-->
    <main role="main">
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8 mx-auto">
                        <?php echo flash('resume_message'); ?>
                        <h2>Please ask a <span class="text-info">question</span></h2>
                        <form class="icon-form" action="<?php echo URLROOT; ?>/admins/addQuestion" method="post">
                            <div class="form-group">
                                <label for="topicId"><i class="fas fa-theater-masks formIcons"></i> Topic: <sub>*</sub></label>
                                <select name="topicId" value=""
                                        class="custom-select custom-select-lg mb-3 <?php echo (!empty($data['topicId_err'])) ? 'is-invalid' : ''; ?>"
                                        required>
                                    <option selected></option>
                                    <?php
                                    if (is_array($data['topics'])) :
                                        foreach ($data['topics'] as $topic) : ?>
                                            <option value="<?php echo $topic->cat_id; ?>"><?php echo $topic->cat_title; ?></option>
                                        <?php endforeach;
                                    endif;
                                    ?>
                                </select>
                                <span class="invalid-feedback"><?php echo $data['topicId_err']; ?></span>
                            </div>

                            <div class="form-group">
                                <label for="qsTitle">
                                    <p><i class="fas fa-question-circle formIcons"></i>Ask question: <sub>*</sub></p>
                                </label>
                                <textarea name="qsTitle"
                                          class="form-control form-control-lg profile_form_bio <?php echo (!empty($data['qsTitle_err'])) ? 'is-invalid' : ''; ?>"
                                          required><?php echo $data['qsTitle']; ?></textarea>
                                <span class="invalid-feedback"><?php echo $data['qsTitle_err']; ?></span>
                            </div>

                            <div class="form-group">
                                <label for="qsAnswer">
                                    <p><i class="fas fa-info formIcons"></i>Possible answer or link:</p>
                                </label>
                                <input name="qsAnswer" type="url"
                                          class="form-control form-control-lg" value="<?php echo $data['qsAnswer']; ?>">
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Add" class="btn btn-success btn-block">
                            </div>
                        </form>

                    </div>
                </div>

                <?php require APPROOT . '/views/admins/inc/listQuestioning.php'; ?>


            </div>
        </section>
    </main>
</div><!-- Page id ends sticky footer-->