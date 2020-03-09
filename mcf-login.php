<?php
/**
 Plugin Name: My Company Files login
 Description: This plugin generates a login form for My Company Files
 Version: 1.0.0
 Author: La Griffe Digitale
 Author URI: https://www.lagriffe-digitale.fr/
*/

/**
 * Include Settings configuration page
 */
require_once(plugin_dir_path(__FILE__) . '/mcf-login-settings.php');

/**
 * Create MyCompanyFiles Login block shortcode
 */
function mcf_login_shortcode()
{
    global $post;
    $content = '';
    $mcf_plugin_dir = plugin_dir_path(__FILE__);
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
