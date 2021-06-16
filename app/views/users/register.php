 <div id="page-content"><!-- Needed for sticky footer-->
        <main role="main">
            <section>
                <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card card-body bg-light">
                            <h2><span class="text-info">Create</span> an account</h2>
                            <p>Please fill in all fields with <sub>*</sub></p>
                            <form class="icon-form" action="<?php echo URLROOT; ?>/users/register" method="post">
                                <div class="form-group">
                                    <label for="first"><i class="fas fa-signature"></i> First name: <sub>*</sub></label>
                                    <input type="text" name="first"
                                           class="form-control form-control-lg <?php echo (!empty($data['first_err'])) ? 'is-invalid' : ''; ?>"
                                           value="<?php echo $data['first']; ?>" required>
                                    <span class="invalid-feedback"><?php echo $data['first_err']; ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="last"><i class="fas fa-signature"></i> Last name: <sub>*</sub></label>
                                    <input type="text" name="last"
                                           class="form-control form-control-lg <?php echo (!empty($data['last_err'])) ? 'is-invalid' : ''; ?>"
                                           value="<?php echo $data['last']; ?>" required>
                                    <span class="invalid-feedback"><?php echo $data['last_err']; ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="email"><i class="far fa-envelope-open"></i> Email: <sub>*</sub></label>
                                    <input type="text" name="email"
                                           class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                                           value="<?php echo $data['email']; ?>" required>
                                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="country"><i class="far fa-flag formIcons"></i> Nationality: <sub>*</sub></label>
                                    <select name="country" value=""
                                            class="custom-select custom-select-lg mb-3 <?php echo (!empty($data['country_err'])) ? 'is-invalid' : ''; ?>"
                                            required>
                                        <option selected>Select nationality</option>
                                        <?php
                                        if(is_array($data['nation'])) :
                                            foreach ($data['nation'] as $country) : ?>
                                                <option value="<?php echo $country->num_code; ?>"><?php echo utf8_encode($country->nationality); ?></option>
                                            <?php endforeach;
                                        endif;
                                        ?>
                                    </select>
                                    <span class="invalid-feedback"><?php echo $data['country_err']; ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="hasAccess">Study <i class="fas fa-graduation-cap formIcons"></i> or teach? <i class="fas fa-user-graduate formIcons"></i> <sub>*</sub></label>
                                    <select name="hasAccess" class="custom-select custom-select-lg mb-3 <?php echo (!empty($data['studTeach_err'])) ? 'is-invalid' : ''; ?>" required>
                                        <option value="" selected>Select student or teacher</option>
                                        <?php if(adminAut()) : ?>
                                            <option value="is_admin">Admin</option>
                                        <?php endif; ?>
                                         <option value="is_student">Student</option>
                                         <option value="is_teacher">Teacher</option>

                                    </select>
                                    <span class="invalid-feedback"><?php echo $data['studTeach_err']; ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="password"><i class="fas fa-lock"></i> Password:
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
                                                    class="far fa-share-square"></i> Create
                                        </button>
                                    </div>

                                    <div class="col">
                                        <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have
                                            an account? Login</a>
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

