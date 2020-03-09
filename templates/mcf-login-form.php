<div class="mcf-login-form<?php print ((!empty($_GET['errorcount']) || !empty($_GET['successpasswordrecovery'])) && !empty($_GET['mcfform']) && $form_key == $_GET['mcfform']) ? ' visible' : ''; ?>" id="<?php print $form_key; ?>">
    <div class="mcf-form-error<?php print (!empty($_GET['errorcount']) && !empty($_GET['mcfform']) && $form_key == $_GET['mcfform']) ? ' visible' : ''; ?>">
        Les identifiants que vous avez fournis sont invalides
    </div>
    <div class="mcf-form-success<?php print (!empty($_GET['successpasswordrecovery']) && !empty($_GET['mcfform']) && $form_key == $_GET['mcfform']) ? ' visible' : ''; ?>">
        Votre mot de passe a bien été réinitialisé. Vous pouvez désormais vous connecter avec vos nouveaux identifiants.
    </div>
    <form name="login" method="post" action="<?php print $form; ?>">
        <div class="form-group">
            <div class="form-label">Votre identifiant<sup>*</sup></div>
            <div class="form-input">
                <input name="m" type="email" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <div class="form-label">Votre mot de passe<sup>*</sup></div>
            <div class="form-input">
                <input name="p" type="password" class="form-control">
            </div>
        </div>

        <input type="hidden" name="errorLogUrl" value="<?php print get_permalink($post->ID); ?>/?mcfform=<?php print $form_key; ?>&errorcount=1">
        <input type="hidden" name="pwdExpiredUrl" value="<?php print get_permalink($post->ID); ?>/?mcfform=<?php print $form_key; ?>-password&errorpass=1">

        <div class="form-group submit">
            <div class="mcf-forgot-password">
                <a href="#" class="js-recovery-password-opener" data-recovery-form-id="<?php print $form_key; ?>">Mot de passe oublié ?</a>
            </div>
            <div class="form-input submit-button">
                <input type="submit" name="btnValide" value="VALIDER" class="btn btn-defaut">
            </div>
        </div>
    </form>

    <div class="mcf-infos"><sup>*</sup> champs obligatoires</div>
</div>
