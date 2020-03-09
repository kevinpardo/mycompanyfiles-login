<div class="mcf-login-form mcf-recovery-form<?php print (!empty($_GET['errorpass']) && !empty($_GET['mcfform']) && $recovery_form_key . '-password' == $_GET['mcfform']) ? ' visible' : ''; ?>" id="<?php print $recovery_form_key; ?>-password">
    <h5 class="form-title">Mot de passe oublié</h5>
    <div class="mcf-form-error<?php print (!empty($_GET['errorpass']) && !empty($_GET['mcfform']) && $recovery_form_key . '-password' == $_GET['mcfform']) ? ' visible' : ''; ?>">
        La demande de réinitialisation du mot de passe a échoué
    </div>
    <form name="login" method="post" action="<?php print $recovery_form; ?>">
        <div class="form-group">
            <div class="form-label">Votre adresse e-mail<sup>*</sup></div>
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
                <input type="submit" name="btnValide" value="VALIDER" class="btn btn-defaut">
            </div>
        </div>
    </form>

    <div class="mcf-infos"><sup>*</sup> champs obligatoires</div>
</div>
