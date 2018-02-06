
<?php 

    // not run if accessed directly
    if( ! defined('ABSPATH' ) ){
        die("Not Allowed");
    }

    // loading template files
    function wpr_load_templates( $template_name, $vars = null) {
        if( $vars != null && is_array($vars) ){
            extract( $vars );
        };

        $template_path =  WPR_PATH . "/templates/{$template_name}";
        if( file_exists( $template_path ) ){
        	include_once( $template_path );
        } else {
            die( "Error while loading file {$template_path}" );
        }
    }

    // print defualt array
    function wpr_pa($arr){
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }

    