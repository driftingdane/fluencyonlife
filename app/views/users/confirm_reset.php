 <div id="page-content"><!-- Needed for sticky footer-->
        <main role="main">
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="card card-body bg-light">
                                <?php
                                flash('reset_success');
                                flash('mail_error');
                                ?>
                                <h2>Reset <span class="text-info">password</span></h2>
                                <p>Please fill in all fields with <sub>*</sub></p>
                                <form class="icon-form" action="<?php echo URLROOT; ?>/users/confirm_reset"
                                      method="post">
                                    <div class="form-group">
                                        <label for="email"><i class="fas fa-at formIcons"></i> Email <sub>*</sub></label>
                                        <input type="text" name="email"
                                               class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                                               value="<?php echo $data['email']; ?>" required>
                                        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn btn-outline-success btn-block"><i
                                                        class="fas fa-sign-in-alt"></i> Reset
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
    </main>
    </div><!-- Page id ends sticky footer-->


