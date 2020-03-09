<?php
// Check if user have submit settings page
if (isset($_GET['settings-updated'])) {
    add_settings_error('mcf_login_messages', 'mcf_login_message', __('Settings Saved', 'mcf_login'), 'updated');
}

// show error/update messages
settings_errors('mcf_login_messages');
?>

<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <form action="options.php" method="post">
        <?php settings_fields('mcf_login'); ?>
        <?php do_settings_sections('mcf_login'); ?>
        <?php submit_button(__('Save Settings', 'mcf_login')); ?>
    </form>
</div>
