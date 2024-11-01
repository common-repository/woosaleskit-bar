(function( $ ) {
	'use strict';
// Add class to footer search when clicked
	jQuery( window ).load( function() {
		jQuery( '.woosaleskit-footer-bar .search > a' ).click( function(e) {
			jQuery( this ).parent().toggleClass( 'active' );
			e.preventDefault();
		});
	});


})( jQuery );
