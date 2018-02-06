"use strict";
jQuery(function($){
    
    $('.wp-color').wpColorPicker();
        
    $('#wqt_settings_form').on('submit',function(e){
        
        e.preventDefault();
        // var this_load = $(this);
        // this_load.button('loading');
        var data = $(this).serialize();
        
        $.post(ajaxurl, data, function(response){
            
            console.log(response);
            setInterval(function(){ 
                location.reload();
            }, 1000);
   			$('.save_alert').removeClass('alert_display');

        });
    });


    
});