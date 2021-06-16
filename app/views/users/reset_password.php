 <div id="page-content"><!-- Needed for sticky footer-->
        <main role="main">
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="card card-body bg-light">
                                <?php flash('register_success'); ?>
                                <h2><span class="text-info"><span class="text-info">Enter</span> new password</h2>
                                <p>Please fill in all fields with <sub>*</sub></p>
                                <form class="icon-form" action="<?php echo URLROOT; ?>/users/reset_password"
                                      method="post">
                                    <div class="form-group">
                                        <label for="email"><i class="fas fa-at"></i>  Email:
                                            <sub>*</sub></label>
                                        <input type="text" name="email"
                                               class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                                               value="<?php echo $data['email']; ?>" required>
                                        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="password"><i class="fas fa-lock-open"></i> Password:
                                            <sub>*</sub></label>
                                        <input type="password" name="password"
                                               class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"
                                               value="<?php echo $data['password']; ?>" required>
                                        <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="confirm_password"><i class="fas fa-lock"></i> Confirm password:
                                            <sub>*</sub></label>
                                        <input type="password" name="confirm_password"
                                               class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>"
                                               value="<?php echo $data['confirm_password']; ?>" required>
                                        <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn btn-outline-success btn-block"><i
                                                        class="far fa-share-square"></i> Update
                                            </button>
                                        </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div><!-- Page id ends sticky footer-->

