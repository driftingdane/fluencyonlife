
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 mx-auto mb-5 mt-5 text-center">
                        <?php if (!empty($data['subEmail_err'])) : ?>
                            <div class="alert alert-danger"><?php echo "Email not valid!"; ?></div>
                            <p>Please try again, using a valid email. <br>If you still experience problems, contact us directly.</p>
                            <a class="btn btn-outline-primary" href="<?php echo URLROOT; ?>/pages/contact">Contact</a>
                        <!-- Include the sign up in case of error so the user can easily try again-->
                            <?php require APPROOT . '/views/inc/emailSignup.php';  ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>