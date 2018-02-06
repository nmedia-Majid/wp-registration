<?php

    // not run if accessed directly
    if( ! defined('ABSPATH' ) ){
  	    die("Not Allowed");
    }

	function wpr_cpt_register_post() {

		// 'wpr' post type lable
		$labels = array(
				'name'               => _x( 'Registration Forms', 'wpr' ),
				'singular_name'      => _x( 'Registration Form', 'wpr' ),
				'add_new'            => _x( 'Add New Registration Form', 'wpr' ),
				'add_new_item'       => __( 'Add New Registration Form', 'wpr' ),
				'edit'				 => __('Edit us', 'wpr'),
				'new_item'           => __( 'New Registration Form', 'wpr' ),
				'edit_item'          => __( 'Edit Registration Form', 'wpr' ),
				'view'				 => __('View', 'wpr'),
				'view_item'          => __( 'View Registration Form', 'wpr' ),
				'all_items'          => __( 'View Registration Forms', 'wpr' ),
				'search_items'       => __( 'Search Registration Forms', 'wpr' ),
				'not_found'          => __( 'No Registration Form found.', 'wpr' ),
				'not_found_in_trash' => __( 'No Registration Forms found in Trash.', 'wpr' ),
				'parent'			 => __( 'Parent Registration Form', 'wpr' ),
			);

			$args = array(
				'labels'             => $labels,
		        'description'        => __( 'Registration Forms', 'wpr' ),
		        'public' => true,
		        'menu_position' => 20,
		        'menu_icon' => 'dashicons-welcome-learn-more',
		        'has_archive' => true
			);

			register_post_type( 'wpr', $args );
}
