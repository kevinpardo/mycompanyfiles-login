<div class="row">
    <div class="small-12 column">
        <div class="mcf-connexion-block js-mcf-connexion-block">
            <?php if (!empty($mcf_options['main_title'])) : ?>
            <h3 class="block-title"><?php print $mcf_options['main_title']; ?></h3>
            <?php endif; ?>

            <?php if (!empty($mcf_options['explanations'])) : ?>
            <p><?php print $mcf_options['explanations']; ?></p>
            <?php endif; ?>
            <?php
            // Forms
            foreach ($forms as $form_key => $form) :
                require($mcf_plugin_dir . '/templates/mcf-login-form.php');
            endforeach;
            // Recovery pwd forms
            foreach ($recovery_forms as $recovery_form_key => $recovery_form) :
                require($mcf_plugin_dir . '/templates/mcf-recovery-form.php');
            endforeach;
            ?>
        </div>
    </div>
</div>

<style>
.mcf-connexion-block {
    background-color: <?php print $mcf_options['background_color'];
    ?> !important;
}

.mcf-connexion-block .block-title,
.mcf-connexion-block p,
.mcf-connexion-block .block-subtitle,
.mcf-connexion-block ul .item a,
.mcf-login-form .form-label {
    color: <?php print $mcf_options['main_color'];
    ?> !important;
}

.mcf-login-form .form-input input:focus {
    border-color: <?php print $mcf_options['second_color'];
    ?> !important;
}

.mcf-connexion-block ul .item a.on,
.mcf-connexion-block ul .item a:hover {
    color: <?php print $mcf_options['second_color'];
    ?> !important;
}

.mcf-login-form .form-group.submit .submit-button input[type="submit"] {
    background-color: <?php print $mcf_options['main_color'];
    ?> !important;
}

.mcf-login-form .form-group.submit .submit-button input[type="submit"]:hover {
    background-color: <?php print $mcf_options['second_color'];
    ?> !important;
}
</style>