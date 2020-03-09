<div class="row">
    <div class="small-12 column">
        <div class="mcf-connexion-block js-mcf-connexion-block">
            <h3 class="block-title">
                
            </h3>

            <p>Connectez-vous à votre compte Extranet My Company Files</p>

            <h4 class="block-subtitle">Se connecter en tant que</h4>

            <ul>
                <li class="item">
                    <a href="#" class="js-reveal-login-form<?php print ((!empty($_GET['errorcount']) || !empty($_GET['successpasswordrecovery'])) && !empty($_GET['mcfform']) && 'provider' == $_GET['mcfform']) ? ' on' : ''; ?>" data-form-id="provider">
                        <span class="dashicons dashicons-businessman"></span>
                        <span class="name">Collaborateur</span>
                    </a>
                </li>

                <li class="item">
                    <a href="#" class="reveal-login-form-button js-reveal-login-form<?php print ((!empty($_GET['errorcount']) || !empty($_GET['successpasswordrecovery'])) && !empty($_GET['mcfform']) && 'customer' == $_GET['mcfform']) ? ' on' : ''; ?>" data-form-id="customer">
                        <span class="dashicons dashicons-businessperson"></span>
                        <span class="name">Client</span>
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
