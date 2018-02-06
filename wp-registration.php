<?php 
/*
Plugin Name: N-Media WP Member Registration
Plugin URI: http://www.najeebmedia.com
Description: This plugin allow users to register, login and reset password using ajax based forms. Admin can attach unlimited user meta fields. User can update their profile using without going into admin dashboard.
Version: 2.0
Author: Najeeb Ahmad
Text Domain: wp-registration
Author URI: http://www.najeebmedia.com/
*/

// exit if accessed directly
if( ! defined('ABSPATH' ) ){
    exit;
}

define( 'WPR_PATH', untrailingslashit(plugin_dir_path( __FILE__ )) );
define( 'WPR_URL', untrailingslashit(plugin_dir_url( __FILE__ )) );

/* ======= plugin includes =========== */
if( file_exists( dirname(__FILE__).'/inc/helpers.php' )) include_once dirname(__FILE__).'/inc/helpers.php';
if( file_exists( dirname(__FILE__).'/inc/cpt.php' )) include_once dirname(__FILE__).'/inc/cpt.php';
if( file_exists( dirname(__FILE__).'/inc/hooks.php' )) include_once dirname(__FILE__).'/inc/hooks.php';
if( file_exists( dirname(__FILE__).'/inc/admin.php' )) include_once dirname(__FILE__).'/inc/admin.php';
if( file_exists( dirname(__FILE__).'/inc/shortcodes.php' )) include_once dirname(__FILE__).'/inc/shortcodes.php';
if( file_exists( dirname(__FILE__).'/inc/settings.class.php' )) include_once dirname(__FILE__).'/inc/settings.class.php';


class WPR_MAIN {

    function __construct(){

        // actation run on plugin initialized
        /**
         * =====================================
         * Admin releated hooks and action 
         * =====================================
        **/
         
        add_action( 'init', 'wpr_cpt_register_post' );
        add_action( 'add_meta_boxes', 'wpr_admin_basic_stg_metabox' );
        add_action( 'add_meta_boxes', 'wpr_admin_style_stg_metabox' );
        add_action( 'add_meta_boxes', 'wpr_admin_email_templates_metabox' );
        add_action( 'add_meta_boxes', 'wpr_admin_redirection_metabox' );
        add_action( 'save_post_wpr', 'wpr_admin_save_settings', 10, 3 );

        // add_shortcode( 'wpr', 'wpr_shortcodes_render_frontend' );
        // add_filter( 'enter_title_here', 'wpr_admin_change_title_text' );
        
        // // frontend form submitted hook
        // add_action( 'wp_ajax_wpr_submit_frontend', 'wpr_submit_frontend' );
        // add_action( 'wp_ajax_nopriv_wpr_submit_frontend', 'wpr_submit_frontend' );
        
        // // wpr settings related hooks
        // add_action( 'admin_menu', 'wpr_add_admin_menu' );

        // // Showing columns in wpr post type
        // add_filter( 'manage_wpr_posts_columns', 'wpr_admin_add_columns' );
        // add_action( 'manage_wpr_posts_custom_column' , 'wpr_admin_add_columns_data', 10, 2 );

        // // showing colums in wpr_result
        // add_filter( 'manage_wpr_result_posts_columns', 'wpr_result_admin_add_columns' );
        // add_action( 'manage_wpr_result_posts_custom_column' , 'wpr_result_admin_add_columns_data', 10, 2 );


        // add_action( 'wp_ajax_wpr_send_email', 'wpr_send_email' );
        // add_action( 'wp_ajax_wpr_delete_message', 'wpr_delete_message' );

    }
    
    
}

// lets start plugin
add_action('plugins_loaded', 'wpr_start');
function wpr_start() {
    return new WPR_MAIN();
}

// if( is_admin() ) {
//     wpr_settings_init();
// }

// function wpr_settings_init() {
    
//     $wpr_settings = wpr_get_admin_setting();
//     return new NM_Settings($wpr_settings);
// }