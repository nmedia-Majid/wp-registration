<?php 
/*
*** Here is all shortcodes callbacks
*/

    // not run if accessed directly
    if( ! defined('ABSPATH' ) ){
        die("Not Allowed");
    }

function wpr_shortcodes_render_frontend($attr){

    // css file load
    wp_enqueue_style('wpr-bootstrap', WPR_URL."/css/bootstrap.min.css");
    wp_enqueue_style('wpr-style', WPR_URL."/css/wpr-frontend.css");
    wp_enqueue_style('wpr-font', WPR_URL."/css/font-awesome/css/font-awesome.css");
    wp_enqueue_style('wpr-sweetalert-style', WPR_URL."/css/sweetalert.css");
        
    // js files load
    wp_enqueue_script('wpr-sweetalert-js', WPR_URL."/js/sweetalert.js", array('jquery'), '1.0', true);
    wp_enqueue_script('wpr-script', WPR_URL."/js/wpr-frontend.js", array('jquery'), '1.0', true);
     

    
    // ajax load
    wp_localize_script( 'wpr-script', 'wpr_vars', array(
      'ajax_url' => admin_url( 'admin-ajax.php') ,
      'show_timer'  => $wpr_time_option,
      'multiple_answers'  => $wpr_answers_option,
    ));

    
	wpr_load_templates("shortcodes/quiz-rander.php", $template_params);
}