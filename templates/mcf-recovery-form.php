<div class="mcf-login-form mcf-recovery-form<?php print (!empty($_GET['errorpass']) && !empty($_GET['mcfform']) && $recovery_form_key . '-password' == $_GET['mcfform']) ? ' visible' : ''; ?>" id="<?php print $recovery_form_key; ?>-password">
    <h5 class="form-title"><?php _e('Forgotten password', 'mcf_login'); ?></h5>
    <div class="mcf-form-error<?php print (!empty($_GET['errorpass']) && !empty($_GET['mcfform']) && $recovery_form_key . '-password' == $_GET['mcfform']) ? ' visible' : ''; ?>">
        <?php _e('Request to reset the password failed', 'mcf_login'); ?>
    </div>
    <form name="login" method="post" action="<?php print $recovery_form; ?>">
        <div class="form-group">
            <div class="form-label"><?php _e('Your email address', 'mcf_login'); ?><sup>*</sup></div>
            <div class="form-input">
                <input name="Email" type="email" class="form-control">
            </div>
        </div>


        <input type="hidden" name="Success_url" value="<?php print get_permalink($post->ID); ?>/?mcfform=<?php print $recovery_form_key; ?>&successpasswordrecovery=1">
        <input type="hidden" name="Error_url" value="<?php print get_permalink($post->ID); ?>/?mcfform=<?php print $recovery_form_key; ?>-password&errorpass=1">

        <div class="form-group submit">
            <div class="mcf-forgot-password">

            </div>
            <div class="form-input submit-button">
                <input type="submit" name="btnValide" value="<?php _e('Validate', 'mcf_login'); ?>" class="btn btn-defaut">
            </div>
        </div>
    </form>

    <div class="mcf-infos"><sup>*</sup> <?php _e('Required fields', 'mcf_login'); ?></div>
</div>
