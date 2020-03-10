<?php
/**
 Plugin Name: My Company Files login
 Description: This plugin generates a login form for MyCompanyFiles service. Use [mcf-login] shortcode.
 Plugin URI: https://github.com/lagriffedigitale/mycompanyfiles-login
 Version: 1.0.0
 Author: La Griffe Digitale
 Author URI: https://www.lagriffe-digitale.fr/
*/

/**
 * Include Settings configuration page
 */
require_once(plugin_dir_path(__FILE__) . '/mcf-login-settings.php');

/**
 * On plugin init
 *
 */
function mcf_login_plugin_init()
{
    $locale = apply_filters('plugin_locale', get_locale(), 'mcf_login');
    load_textdomain('mcf_login', WP_LANG_DIR . '/mcf_login/mcf_login' . '-' . $locale . '.mo');
    load_plugin_textdomain('mcf_login', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}
add_action('init', 'mcf_login_plugin_init');


/**
 * On plugin activation
 */
function mcf_login_on_activation()
{
    update_option(
        'mcf_login_options',
        array(
            'main_title'        => __('Sign in to the extranet', 'mcf_login'),
            'explanations'      => __('Login to your MyCompanyFiles extranet account', 'mcf_login'),
            'background_color'  => '#F5F5F5',
            'main_color'        => '#444444',
            'second_color'      => '#2473AA',
        )
    );
}
register_activation_hook(__FILE__, 'mcf_login_on_activation');


/**
 * Create MyCompanyFiles Login block shortcode
 */
function mcf_login_shortcode()
{
    global $post;
    $content = '';
    $mcf_plugin_dir = plugin_dir_path(__FILE__);
    // Get options
    $mcf_options = get_option('mcf_login_options');
    // Form datas
    $forms = array(
        'provider'  => 'https://provider.mycompanyfiles.fr/Auth/Login',
        'customer'  => 'https://customer.mycompanyfiles.fr/Auth/Login'
    );
    // Recovery pwd datas
    $recovery_forms = array(
        'provider'  => 'https://provider.mycompanyfiles.fr/auth/passwordrecovery',
        'customer'  => 'https://customer.mycompanyfiles.fr/auth/passwordrecovery'
    );
    ob_start();
    require($mcf_plugin_dir . '/templates/mcf-login-block.php');
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}
// WP hook to init shortcode
add_shortcode('mcf-login', 'mcf_login_shortcode');

/**
 * Enqueue JS Scripts & Stylesheet
 */
function mcf_login_enqueue_scripts()
{
    // Javascript file
    wp_enqueue_script('mcf-login-js-file', plugins_url('/mcf-login/assets/js/mcf-login.js'), array('jquery'), '1.0.0', true);
    // Stylesheet
    wp_register_style('mcf-login-stylesheet', plugins_url('/mcf-login/assets/css/mcf-login.css'), array(), '1.0.0', 'all');
    wp_enqueue_style('mcf-login-stylesheet');
    // Enqueue WP Dashicons
    wp_enqueue_style('dashicons');
}
// WP Hook to enqueue scripts & stylesheet
add_action('wp_enqueue_scripts', 'mcf_login_enqueue_scripts');
