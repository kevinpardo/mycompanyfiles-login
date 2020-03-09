<?php
/**
 Plugin Name: My Company Files login
 Description: This plugin generates a login form for My Company Files
 Version: 1.0.0
 Author: La Griffe Digitale
 Author URI: https://www.lagriffe-digitale.fr/
*/

/**
 * Create MyCompanyFiles Login block shortcode
 */
add_shortcode('mcf-login', function () {
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
});

/**
 * Enqueue JS Scripts & Stylesheet
 */

add_action('wp_enqueue_scripts', function () {
    $plugin_url = plugin_dir_url(__FILE__);
    // Javascript file
    wp_enqueue_script('mcf-login-js-file', $plugin_url . '/assets/js/mcf-login.js', array('jquery'), '1.0.0', true);
    // Stylesheet
    wp_register_style('mcf-login-stylesheet', $plugin_url . '/assets/css/mcf-login.css', array(), '1.0.0', 'all');
    wp_enqueue_style('mcf-login-stylesheet');
    // Enqueue WP Dashicons
    wp_enqueue_style('dashicons');
});
