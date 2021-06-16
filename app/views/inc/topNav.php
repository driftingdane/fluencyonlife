<section class="mb-4">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm mb-4">
        <h5 class="my-0 mr-md-auto font-weight-normal"><?php if(!empty($data['siteImg'])) : ?>
            <img width="40" src="<?php echo URLROOT; ?>/img/<?php echo $data['siteImg']; ?>" alt="logo">
            <?php endif; ?>
            <a href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
        </h5>
        <ul class="nav">
            <?php
            foreach ($data['menu'] as $menu) : ?>
                    <a class="nav-link" href="<?php echo URLROOT; ?>/<?php echo $menu->menu_link; ?>"><?php echo $menu->menu_name; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
        <nav class="navbar my-2 my-md-0 mr-md-3">
            <div class="btn-group btn-group-sm">
                        <?php if (isLoggedIn()) : ?>
                            <div class="dropdown mr-2">
                                <button class="btn btn-sm btn-outline-info dropdown-toggle" type="button" id="dropdownMenu2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="far fa-user"></i> Profile <span class="caret"></span>
                                </button>
                                <?php
                                if($_SESSION['has_access'] === 'is_admin') : ?>
                                    <a href="<?php echo URLROOT; ?>/admins" class="btn btn-sm btn-outline-info mt-2 mb-2"><i class="fas fa-user-shield"></i> Admins</a>
                                <?php else: ?>
                                    <a href="<?php echo URLROOT; ?>/clientes" class="btn btn-sm btn-outline-info mt-2 mb-2"><i class="fas fa-graduation-cap"></i> Clientes</a>
                                <?php endif; ?>
                                <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <?php require APPROOT . '/views/admins/inc/appButtons.php'; ?>
                                </div>
                            </div>

                        <?php else : ?>
                            <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-outline-info mr-2"><i
                                        class="fas fa-sign-in-alt"></i> Login</a>
                            <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-outline-info"><i
                                        class="fas fa-user-plus"></i> Register</a>
                        <?php endif; ?>
             </div>
         </nav>
    </div>

    <div class="col-sm-12">
        <a class="btn btn-sm btn-light" href="#" onclick="history.go(-1)"><i class="fas fa-arrow-left"></i> Back</a>
      </div>
</section>

