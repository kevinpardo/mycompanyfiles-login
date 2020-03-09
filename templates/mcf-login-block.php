<div class="row">
    <div class="small-12 column">
        <div class="mcf-connexion-block js-mcf-connexion-block">
            <?php if (!empty($mcf_options['main_title'])) : ?>
                <h3 class="block-title"><?php print $mcf_options['main_title']; ?></h3>
            <?php endif; ?>

            <?php if (!empty($mcf_options['explanations'])) : ?>
                <p><?php print $mcf_options['explanations']; ?></p>
            <?php endif; ?>

            <h4 class="block-subtitle"><?php _e('Login as', 'mcf_login'); ?></h4>

            <ul>
                <li class="item">
                    <a href="#" class="js-reveal-login-form<?php print ((!empty($_GET['errorcount']) || !empty($_GET['successpasswordrecovery'])) && !empty($_GET['mcfform']) && 'provider' == $_GET['mcfform']) ? ' on' : ''; ?>" data-form-id="provider">
                        <span class="dashicons dashicons-businessman"></span>
                        <span class="name"><?php _e('Provider', 'mcf_login'); ?></span>
                    </a>
                </li>

                <li class="item">
                    <a href="#" class="reveal-login-form-button js-reveal-login-form<?php print ((!empty($_GET['errorcount']) || !empty($_GET['successpasswordrecovery'])) && !empty($_GET['mcfform']) && 'customer' == $_GET['mcfform']) ? ' on' : ''; ?>" data-form-id="customer">
                        <span class="dashicons dashicons-businessperson"></span>
                        <span class="name"><?php _e('Customer', 'mcf_login'); ?></span>
                    </a>
                </li>
            </ul>

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
    .mcf-connexion-block { background-color : <?php print $mcf_options['background_color']; ?>!important; }
    .mcf-connexion-block .block-title, .mcf-connexion-block p, .mcf-connexion-block .block-subtitle, .mcf-connexion-block ul .item a, .mcf-login-form .form-label { color : <?php print $mcf_options['main_color']; ?>!important; }
    .mcf-login-form .form-input input:focus { border-color : <?php print $mcf_options['second_color']; ?>!important; }
    .mcf-connexion-block ul .item a.on, .mcf-connexion-block ul .item a:hover { color : <?php print $mcf_options['second_color']; ?>!important; }
    .mcf-login-form .form-group.submit .submit-button input[type="submit"] { background-color : <?php print $mcf_options['main_color']; ?>!important; }
    .mcf-login-form .form-group.submit .submit-button input[type="submit"]:hover { background-color : <?php print $mcf_options['second_color']; ?>!important; }
</style>
