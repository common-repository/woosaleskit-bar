
jQuery(function() {

    jQuery('.icp-auto').iconpicker();

     jQuery('.iconpicker-input').on('iconpickerSelected', function(e) {
	   var new_icon =   jQuery(this).val();
	   	jQuery(this).prev('.icon_show').removeClass().addClass('icon_show fa '+ new_icon);

	   		jQuery('.iconpicker-popover.popover').hide();


	     });

});