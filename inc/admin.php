<?php
/**
** all admin related settings
*/

    // not run if accessed directly
    if( ! defined('ABSPATH' ) ){
        die("Not Allowed");
    }

/*
*** 
*/

// function wpr_add_admin_menu() { 
//     add_menu_page( 'Wordpress Quizes Test', 'wpr settings', 'manage_options', 'wp_quizes_test', 'wpr_options_page' );
// }

// /*
// *** 
// */

// function wpr_options_page() {

//     wpr_load_templates("admin/admin-setting.php");
// }

/*
*** 
*/

// function wpr_admin_change_title_text( $title ){
//     $screen = get_current_screen();
  
//     if  ( 'wpr' == $screen->post_type ) {
//         $title = 'Enter New Question';
//     }
//         return $title;
// }

/*
*** 
*/
  
function wpr_admin_basic_stg_metabox(  ){
    
    add_meta_box( 
        'wpr_general_setting',
        __( 'General Settings' , ' wp-registration'),
        'wpr_admin_basic_setting_display',
        'wpr',
        'side',
        'default'
    );
}

/*
*** 
*/
  
function wpr_admin_style_stg_metabox(  ){
    
    add_meta_box( 
        'wpr_style_setting',
        __( 'Style And Layout Settings' , ' wp-registration'),
        'wpr_admin_style_setting_display',
        'wpr',
        'side',
        'default'
    );
}

/*
*** 
*/

function wpr_admin_email_templates_metabox(  ){
    
    add_meta_box( 
        'wpr_emails_tmplte',
        __( 'Email Templates' , ' wp-registration'),
        'wpr_admin_email_templates_display',
        'wpr',
        'side',
        'default'
    );
}

/*
*** 
*/

function wpr_admin_redirection_metabox(  ){
    
    add_meta_box( 
        'wpr_redirect',
        __( 'Redirection' , ' wp-registration'),
        'wpr_admin_redirection_display',
        'wpr',
        'side',
        'default'
    );
}

/*
*** 
*/

function wpr_admin_redirection_display() {
    
    
        // style file load
        wp_enqueue_style('wpr-admin-style', WPR_URL."/css/wpr-admin.css");
        wp_enqueue_style('wpr-awsm-font', WPR_URL."/css/font-awesome/css/font-awesome.css");
        // js file load
        wp_enqueue_script('wpr-admin-js', WPR_URL."/js/wpr-admin.js", array('jquery'), '1.0', true);

        wpr_load_templates("admin/redirection.php");
    

}
/*
*** 
*/

function wpr_admin_style_setting_display(){
    
    // style file load
           wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
    wp_enqueue_style('wpr-bootstrap', WPR_URL."/css/bootstrap.min.css");
    wp_enqueue_style('wpr-admin-style', WPR_URL."/css/wpr-admin.css");
    // js file load
    wp_enqueue_script('wpr-admin-js', WPR_URL."/js/wpr-admin.js", array('jquery'), '1.0', true); 

    // load admin templatse
    wpr_load_templates("admin/style-setting.php" );
}

/*
*** 
*/

function wpr_admin_basic_setting_display( $question ){
    
    // style file load
    wp_enqueue_style('wpr-bootstrap', WPR_URL."/css/bootstrap.min.css");
    wp_enqueue_style('wpr-admin-style', WPR_URL."/css/wpr-admin.css");
    wp_enqueue_style('wpr-awsm-font', WPR_URL."/css/font-awesome/css/font-awesome.css");
    // js file load
    wp_enqueue_script('wpr-admin-js', WPR_URL."/js/wpr-admin.js", array('jquery'), '1.0', true);     
    // load admin templatse
    wpr_load_templates("admin/basic-setting.php" );

}

/*
***
*/

function wpr_admin_email_templates_display(){
   
    // load admin templatse
    wpr_load_templates("admin/email-template.php");

}

/*
***
*/

function wpr_admin_save_settings( $post_id, $post, $update  ){
    
    // If this is a revision, don't send the email.
    if ( wp_is_post_revision( $post_id ) )
        return;
        
    if( !current_user_can( 'edit_users' ) )
        return;
    // $wpr_ans = array();

        
    // if ( isset( $_POST['mcqs_answers'] ) || isset( $_POST['mcqs_marks'] )  ) {

        // update_post_meta( $post_id, 'mcqs_answers', $_POST['mcqs_answers'] );
        // update_post_meta( $post_id, 'mcqs_marks', $the_marks );
        
    // }

}

// /**
// ** showing columns wpr post type
// **/

// function wpr_admin_add_columns($columns) {

//     unset($columns['date']);
//     $columns['total_ans'] = __( 'Total Answers', 'wp-registration' );
//     $columns['correct_ans'] = __( 'Correct Answers', 'wp-registration' );
//     $columns['total_marks'] = __( 'Total Marks', 'wp-registration' );
//     $columns['date'] = __( 'Date', 'wp-registration' );

//     return $columns;
// }

// /**
// ** showing columns wpr post type
// **/

// function wpr_admin_add_columns_data($column, $question_id) {

//     switch ( $column ) {

//         case 'total_ans' :
//             echo wpr_get_total_ans($question_id);
//         break;

//         case 'correct_ans':
//             echo wpr_get_total_correct_ans($question_id);
//         break;
//         case 'total_marks':
//             echo wpr_get_quiz_marks($question_id);
//         break;
//     }
// }

// /**
// ** showing columns wpr_result post type
// **/

// function wpr_result_admin_add_columns($columns) {
// 	$Quiz_time = wpr_settings_init()->get_option('time_control');
    
//     unset($columns['date']);
//     $columns['obtain_marks'] = __( 'Obtain Marks', 'wp-registration' );
//     $columns['total_marks'] = __( 'Total Marks', 'wp-registration' );
//     $columns['percentage'] = __( 'Percentage', 'wp-registration' );
//     if (apply_filters( 'wpr_version_check', 'standard')  != 'standard') {
//     	if (isset( $Quiz_time ) && $Quiz_time == 'on') {
//             $columns['wpr_time'] = __( 'Time Elapsed', 'wp-registration' );
//     	}
//     }
//     $columns['correct_question'] = __( 'Total Correct Question', 'wp-registration' );
//     $columns['date'] = __( 'Date', 'wp-registration' );

//     return $columns;

// }

// /**
// ** showing columns wpr_result post type
// **/

// function wpr_result_admin_add_columns_data($column, $question_id) {

//     switch ( $column ) {

//         case 'obtain_marks' :
//             echo wpr_get_obtain_marks($question_id);
//         break;

//         case 'percentage':
//             echo wpr_get_overall_percentage($question_id);
//         break;

//         case 'total_marks':
//             echo wpr_get_quiz_total_marks($question_id);
//         break;

//         case 'wpr_time':
//             echo wpr_get_overall_time($question_id);
//         break;

//         case 'correct_question':
//             echo wpr_get_correct_question($question_id);
//         break;
//     }

// }


// // wpr setting display for free version
// function wpr_get_admin_setting() {
    
//     $wpr_options =  array(
//         array(
//         'type'      => 'text',
//         'id'        => 'btton_text',
//         'label'     => __("Button Text", 'wpr'),
//         'description'   => __('Please change button text', 'wpr'),
//         'default'   => 'continue',
//         ),
//         array(
//         'type'      => 'checkbox',
//         'id'        => 'result_show',
//         'label'     => __("Show Result", 'wpr'),
//         'description'   => __('Show result after sumbit the quiz', 'wpr'),
//         'default'   => '',
//         ),
//         array(
//         'type'      => 'wpr_color',
//         'id'        => 'button_bg_color',
//         'label'     => __("Button Color", 'wpr'),
//         'description'   => __('Change button background color', 'wpr'),
//         'default'   => ''
//         ),
//         array(
//         'type'      => 'wpr_color',
//         'id'        => 'model_bg_color',
//         'label'     => __("Questions Background Color", 'wpr'),
//         'description'   => __('Change questions background color', 'wpr'),
//         'default'   => ''
//         ),
//         array(
//         'type'      => 'wpr_color',
//         'id'        => 'question_color',
//         'label'     => __("Question Color", 'wpr'),
//         'description'   => __('Change question color', 'wpr'),
//         'default'   => ''
//         ),
//         array(
//         'type'      => 'textarea',
//         'id'        => 'q_complete',
//         'label'     => __("Quiz Complete Message", 'wpr'),
//         'description'   => __('Add message after complete the quiz', 'wpr'),
//         'default'   => 'Thanks for completing the quizz',
//         ),
//         array(
//         'type'      => 'textarea',
//         'id'        => 'Submit Message',
//         'label'     => __("Submit Message", 'wpr'),
//         'description'   => __('show message after submit the quiz', 'wpr'),
//         'default'   => 'Your quizz has been sent successfully.',
//         ),
//         array(
//         'type'      => 'textarea',
//         'id'        => 'email_message',
//         'label'     => __("Send Message", 'wpr'),
//         'description'   => __('Quiz result: %FULL_NAME%, %OBTAINED_MARKS%, %TOTAL_MARKS%, %PERCENTAGE%, %RESULT_DATE%', 'wpr'),
//         'default'   => 'Your quizz has been sent successfully.',
//         ),
        
//     );
//     // return $wpr_options;
//     return apply_filters( 'wpr_options', $wpr_options);
// }
