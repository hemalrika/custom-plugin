jQuery(function() {
    jQuery('#ajax-click').on('click', function() {
        var param = "action=custom_plugin&param=get_message";
        // ajaxurl from wp_localize_script
        $.post(ajaxurl, param, function(response){
            console.log(response);
        });
    })
    jQuery('#add_form').validate({
        submitHandler: function() {
            var post = jQuery("#add_form").serialize()+"&action=custom_plugin&param=post_data";
             $.post(ajaxurl, post, function(response){
                var jsonData = $.parseJSON(response);
                console.log("name " +jsonData.username);
            });
        }
    });
    jQuery('#another_form').validate({
        submitHandler: function() {
            var post = jQuery("#another_form").serialize()+"&action=wp_send_data_to_db";
            jQuery.post(ajaxurl, post , function(response) {
                console.log(response);
            })
        }
    });

});