<section class="bg-light p-2 mb-5 mt-5">
    <div class="container"><div class="text-center"><?php echo flash('success'); ?></div>
        <p class="p-1 text-center text-black-50 lead">Connect where it matters! Subscribe.</p>
        <div class="row justify-content-center">
            <?php $formType = "form-inline";
            if ($_GET['url'] === "p/subscribe"): $formType = "form-group text-center"; endif; ?>
            <form class="<?php echo $formType; ?>" action="<?php echo URLROOT; ?>/p/subscribe" method="post">
                <input type="text" name="subEmail" placeholder="Add your email" class="form-control mb-2 mr-sm-2 form-control-lg <?php echo (!empty($data['subEmail_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>" required>
                <span class="invalid-feedback m-3"><?php echo $data['subEmail_err']; ?></span>
                <p></p>
                <button id="subscribe" type="submit" class="btn btn-primary mb-2 btn-xs-block"><i class="fas fa-sign-in-alt"></i> Subscribe</button>
            </form>
        </div>
        <p class="text-center text-black-50 font-weight-bold">Social events - tours - excursions.</p>
        <div class="text-black-50 text-uppercase text-center">in English</div>
    </div>
    <?php if($_GET['url'] != "") : ?>
    <div class="text-center mt-5"> <a class="btn btn-outline-primary" href="<?php echo URLROOT; ?>">Return home</a></div>
    <?php endif; ?>
</section>

