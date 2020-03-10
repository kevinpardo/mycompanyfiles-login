<?php
/**
 * Admin enqueue scripts
 */
function mcf_login_admin_enqueue_scripts()
{
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('mcf-login-admin-js', plugins_url('/assets/js/mcf-login-admin.js', __FILE__), array('jquery', 'wp-color-picker'), '1.0.0', true);
}
// Admin enqueue scripts hooks
add_action('admin_enqueue_scripts', 'mcf_login_admin_enqueue_scripts');

/**
 * Register WP backend submenu item to access to settings panel
 *
 */
function mcf_login_admin_menu_init()
{
    // Add submenu page
    add_submenu_page(
        'options-general.php',
        __('MyCompanyFiles settings', 'mcf_login'),
        __('MyCompanyFiles settings page', 'mcf_login'),
        'manage_options',
        'mcf_login',
        'mcf_login_settings_page_content'
    );
}
// WP Hook to add admin submenu
add_action('admin_menu', 'mcf_login_admin_menu_init');

/**
 * MyCompanyFiles Settings init
 *
 */
function mcf_login_settings_init()
{
    // Register settings
    register_setting('mcf_login', 'mcf_login_options');
    // Register settings section
    add_settings_section(
        'mcf_login_settings_section',
        __('MyCompanyFiles settings', 'mcf_login'),
        'mcf_login_settings_explanations',
        'mcf_login'
    );
    // Main title setting field
    add_settings_field(
        'mcf_login_settings_title',
        __('Block main title', 'mcf_login'),
        'mcf_login_settings_main_title',
        'mcf_login',
        'mcf_login_settings_section'
    );
    // Front explanations setting field
    add_settings_field(
        'mcf_login_settings_front_explanations',
        __('Explanations', 'mcf_login'),
        'mcf_login_settings_front_explanations',
        'mcf_login',
        'mcf_login_settings_section'
    );
    // Background color
    add_settings_field(
        'mcf_login_settings_background_color',
        __('Background color', 'mcf_login'),
        'mcf_login_settings_background_color',
        'mcf_login',
        'mcf_login_settings_section'
    );
    // Main color
    add_settings_field(
        'mcf_login_settings_main_color',
        __('Main color', 'mcf_login'),
        'mcf_login_settings_main_color',
        'mcf_login',
        'mcf_login_settings_section'
    );
    // Second color
    add_settings_field(
        'mcf_login_settings_second_color',
        __('Second color', 'mcf_login'),
        'mcf_login_settings_second_color',
        'mcf_login',
        'mcf_login_settings_section'
    );
}
// WP Hook to init settings
add_action('admin_init', 'mcf_login_settings_init');

/**
 * Settings page explanations
 *
 */
function mcf_login_settings_explanations()
{
    print '<p>' . __('Here, you can change MyCompanyFiles Login plugin settings. You can manage displayed text and color.', 'mcf_login') . '</p>';
    print '<p>' . __('If you want to use this plugin via shortcode, use <strong>[mcf-login]</strong> shortcode.', 'mcf_login') . '</p>';
}

/**
 * MyCompanyFiles login settings page content
 *
 */
function mcf_login_settings_page_content()
{
    // Disable if user do not have capabilities
    if (!current_user_can('manage_options')) {
        return;
    }
    // Plugin directory
    $mcf_plugin_dir = plugin_dir_path(__FILE__);
    // Template
    ob_start();
    require($mcf_plugin_dir . '/templates/mcf-login-settings-page.php');
    $content = ob_get_contents();
    ob_end_clean();
    // Display content
    print $content;
}

/**
 * MyCompanyFiles Main title setting
 * @param array $args
 *
 */
function mcf_login_settings_main_title($args)
{
    $options  = get_option('mcf_login_options');
    $content  = '<input style="min-width : 370px;" type="text" name="mcf_login_options[main_title]" value="' . (!empty($options['main_title']) ? $options['main_title'] : '') . '">';
    $content .= '<p class="description">' . __('Here you can manage the MyCompanyFiles Login form\'s main title', 'mcf_login') . '</p>';
    print $content;
}

/**
 * MyCompanyFiles front explanations setting
 * @param array $args
 *
 */
function mcf_login_settings_front_explanations($args)
{
    $options  = get_option('mcf_login_options');
    $content  = '<textarea style="min-width : 370px;" rows="4" name="mcf_login_options[explanations]">' . (!empty($options['explanations']) ? $options['explanations'] : '') . '</textarea>';
    $content .= '<p class="description">' . __('Here you can manage the MyCompanyFiles Login form\'s explanations', 'mcf_login') . '</p>';
    print $content;
}

/**
 * MyCompanyFiles background color setting
 * @param array $args
 *
 */
function mcf_login_settings_background_color($args)
{
    $options  = get_option('mcf_login_options');
    $content  = '<input style="min-width : 370px;" class="mcf-login-color-field" type="text" name="mcf_login_options[background_color]" value="' . (!empty($options['background_color']) ? $options['background_color'] : '') . '">';
    $content .= '<p class="description">' . __('Here you can manage the MyCompanyFiles Login form\'s background color', 'mcf_login') . '</p>';
    print $content;
}

/**
 * MyCompanyFiles main color setting
 * @param array $args
 *
 */
function mcf_login_settings_main_color($args)
{
    $options  = get_option('mcf_login_options');
    $content  = '<input style="min-width : 370px;" class="mcf-login-color-field" type="text" name="mcf_login_options[main_color]" value="' . (!empty($options['main_color']) ? $options['main_color'] : '') . '">';
    $content .= '<p class="description">' . __('Here you can manage the MyCompanyFiles Login form\'s main text color', 'mcf_login') . '</p>';
    print $content;
}

/**
 * MyCompanyFiles background color setting
 * @param array $args
 *
 */
function mcf_login_settings_second_color($args)
{
    $options  = get_option('mcf_login_options');
    $content  = '<input style="min-width : 370px;" class="mcf-login-color-field" type="text" name="mcf_login_options[second_color]" value="' . (!empty($options['second_color']) ? $options['second_color'] : '') . '">';
    $content .= '<p class="description">' . __('Here you can manage the MyCompanyFiles Login form\'s second text color', 'mcf_login') . '</p>';
    print $content;
}
