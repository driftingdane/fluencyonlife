 <div id="page-content"><!-- Needed for sticky footer-->
        <main role="main">
            <section class="">
                <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card card-body bg-light">
                            <?php flash('resume_message'); ?>
                            <?php flash('register_success'); ?>
                            <?php flash('inactive_message'); ?>
                            <?php flash_error('access_msg'); ?>
                            <h2><span class="text-info">Login</span> to your account</h2>
                            <p>Please fill in all fields with <sub>*</sub></p>
                            <form class="icon-form" action="<?php echo URLROOT; ?>/users/login" method="post">
                                <div class="form-group">
                                    <label for="email"><i class="far fa-envelope-open"></i> Email: <sub>*</sub></label>
                                    <input type="text" name="email"
                                           class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                                           value="<?php echo $data['email']; ?>" required>
                                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="password"><i class="fas fa-key"></i> Password: <sub>*</sub></label>
                                    <input type="password" name="password"
                                           class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"
                                           value="<?php echo $data['password']; ?>" required>
                                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-outline-success btn-block"><i
                                                    class="fas fa-sign-in-alt"></i> Login
                                        </button>
                                    </div>

                                    <div class="col">
                                        <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-light btn-block">No
                                            account? Register</a>
                                    </div>
                                    <div class="col">
                                        <a href="<?php echo URLROOT; ?>/users/confirm_reset"
                                           class="btn btn-light btn-block">Forgot password? </a>
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

