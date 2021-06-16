<div id="page-content"><!-- Needed for sticky footer-->
    <main role="main">
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 mx-auto mt-5">
                        <div class="card card-body bg-light">
                            <?php flash('resume_message'); ?>
                            <h4><span class="text-info">Unsubscribe</span> your email</h4>
                            <p>Please fill in all fields with <sub>*</sub></p>
                            <form class="form-group" action="<?php echo URLROOT; ?>/p/unsubscribe" method="post">
                                <div class="form-group">
                                    <label for="email"><i class="fas fa-at formIcons"></i> Email:
                                        <sub>*</sub></label>
                                    <input type="email" name="unEmail"
                                           class="form-control form-control-lg <?php echo (!empty($data['unEmail_err'])) ? 'is-invalid' : ''; ?>"
                                           value="<?php echo $data['unEmail']; ?>" required>
                                    <span class="invalid-feedback"><?php echo $data['unEmail_err']; ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="confirm_password"><i class="fas fa-lock formIcons"></i> Confirm email:
                                        <sub>*</sub></label>
                                    <input type="email" name="confirm_email"
                                           class="form-control form-control-lg <?php echo (!empty($data['confirm_email_err'])) ? 'is-invalid' : ''; ?>"
                                           value="<?php echo $data['confirm_email']; ?>" required>
                                    <span class="invalid-feedback"><?php echo $data['confirm_email_err']; ?></span>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-outline-primary"><i
                                                class="far fa-share-square"></i> Unsubscribe
                                        </button>
                                    </div>
                                </div>

                            </form>
                         <div class="row">
                            <div class="col">
                                <a href="<?php echo URLROOT; ?>" class="btn btn-outline-secondary">Stay and return home
                                </a>
                            </div>
                         </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
</div><!-- Page id ends sticky footer-->