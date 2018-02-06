<?php
/**
 * N-Media Setting Manager Class
 * 
 * 1- Rendering Settings
 * 2- Save Settings
 * 3- Get Settings
 * 
 */
 
class NM_Settings {
    
    var $settings;
    var $setting_key;
    var $saved_settings;
    
    function __construct( $settings ) {
        
        $this->settings = $settings;
        $this->setting_key = 'wqt_settings';
        
        $this->saved_settings = $this->get_settings();
        
        add_action('wp_ajax_save_'.$this->setting_key, array($this, 'save_settings'));
    }
    
    // Display Function
    public function display() {
        wp_enqueue_style('mcqs-bootstrap', WQT_URL."/css/bootstrap.min.css");
        wp_enqueue_style('wqt-setting-css', WQT_URL."/css/wqt-admin-setting.css");
        
        wp_enqueue_script('wqt-setting-js', WQT_URL."/js/wqt-admin-setting.js", array('jquery'), '1.0', true);
        wp_enqueue_style('wp-color-picker');
    	wp_enqueue_script('wp-color-picker');
    
        $html = '<div class="nm-settings-wrapper">';
        $html .= '<form id="'.esc_attr($this->setting_key).'_form">';
        $html .= '<input type="hidden" name="action" value="save_'.esc_attr($this->setting_key).'">';
        $html .= '<table class="form-table tb-control">';
        
        foreach($this-> settings as $setting) {
            
            $type   = isset($setting['type']) ? $setting['type'] : '';
            $id     = isset($setting['id']) ? $setting['id'] : '';
            $label  = isset($setting['label']) ? $setting['label'] : '';
            $desc   = isset($setting['description']) ? $setting['description'] : '';
            $default= isset($setting['default']) ? $setting['default'] : '';
            $options= isset($setting['options']) ? $setting['options'] : '';
            
                
            $html .= '<tr>';
                $html .= '<td class="label-text">'.$label.'</td>';
                $html .= '<td colspan = "2">'.$this->input($type, $id, $default, $options).'</td>';
                $html .= '<td class = "wqt-desc-text">'.$desc.'</td>';
            $html .= '</tr>';
        }
        $html .= '</table>';
        $html .= '<input type="submit" class="btn btn-primary btn-check">';
        $html .= '<div class="save_alert alert_display "> Settings Saved';
        $html .= '</div>';
        $html .= '</form>';
        $html .= '</div>';
        
        echo $html;
    }
    
    // Render input control
    function input( $type, $id, $default, $options="") {
        
        $input_html = '';
        $name = $this->setting_key.'['.$id.']';
        $value = ($this->get_option($id) == '') ? $default : $this->get_option($id);
        
        switch( $type ) {
        
            case 'text':
                
                $input_html .= '<input class="wqt-text-option" name="'.$name.'" type="text" id="'.esc_attr($id).'" value="'.esc_attr($value).'">';
                break;
            case 'radio':
                
                $input_html .= '<input  name="'.$name.'" type="radio" id="'.esc_attr($id).'" value="'.esc_attr($default).'" '.checked( $value, $default, false ).'>';
                break;
            case 'checkbox':
                
                $input_html .= '<input  name="'.$name.'" type="checkbox" id="'.esc_attr($id).'" value="on" '.checked($value,'on', false).'>';
                break;
            case 'select':
                
                $input_html .= '<select class="wqt-select-design" name="'.$name.'">';
                    foreach($options as $val => $text) {
                        $input_html .= '<option value="'.esc_attr($val).'" ' . selected( $value, $val, false). '>'.$text.'</option>';
                    }
                    
                    $input_html .= '</select>';
                    
                break;
            case 'textarea':
                
                $input_html .= '<textarea name="'.$name.'" rows="4" cols="44">'. esc_textarea($value) .'</textarea>';
                break;
            case 'wqt_color':
                
                $input_html .= '<input name="'.$name.'" class="wp-color" id="'.esc_attr($id).'" value="'.esc_attr($value).'">';
                break;
        }
        
        return $input_html;
    }
    
    
    // Saving settings
    function save_settings() {
        
        if( !isset($_POST[$this->setting_key]) ) 
            wp_die('No Data Found');
            
            
        $settings_data = $_POST[$this->setting_key];
        
        update_option($this->setting_key, $settings_data);
        wp_die( __("Settings updated successfully", "wqt") );
    }
    
    // Get all settings from option
    function get_settings() {
        
        $settings = get_option($this->setting_key);
        return $settings;
    }
    
    // Get option value
    function get_option($id) {
        
        if( isset($this->saved_settings[$id]) ) {
            return $this->saved_settings[$id];
        }
        
        return '';
    }
}