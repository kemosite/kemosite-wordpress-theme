/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

/*
function componentToHex(c) {
  var hex = c.toString(16);
  return hex.length == 1 ? "0" + hex : hex;
}

function kemosite_rgbToHex( rgb_string = 'string') {

	// Example '102,103,171'
	var rgb_array = rgb_string.split(',');
	
	var r_16 = rgb_array[0].toString(16);
	var g_16 = rgb_array[1].toString(16);
	var b_16 = rgb_array[2].toString(16);

	var r = ( r_16.length = 1) ? "0" + r_16 : r_16;
	var g = ( g_16.length = 1) ? "0" + g_16 : g_16;
	var b = ( b_16.length = 1) ? "0" + b_16 : b_16;

	return "#" + r + g + b;

}
*/

alert("Testing");

( function() {

	// Wait until the customizer has finished loading.
	wp.customize.bind( 'ready', function() {

		alert("Testing");

		/*
		** [SITE IDENTITY] **
		*/
		
		// Don't bother updating items that are (basically) hidden

		/*
		** [BASE COLOUR OPTIONS] **
		*/

		/*
		wp.customize( 'kemosite_wordpress_base_primary_colour_preselect', function( value ) {
			value.bind( function( to ) {
				// $( 'head title' ).text( to );
				wp.customize.control( 'kemosite_wordpress_base_primary_colour_preselect_display' ).default( kemosite_rgbToHex( to ) );
			} );
		}
		*/

		
		wp.customize( 'blogname', function( value ) {
			alert( value );
			value.bind( function( to ) {
				$( 'head title' ).text( to );
			} );
		}
		

		/*
		wp.customize( 'blogdescription', function( value ) {
			value.bind( function( to ) {
				$( '.site-description' ).text( to );
			} );
		} );
		*/

		// Header text color.
		/*wp.customize( 'header_textcolor', function( value ) {
			value.bind( function( to ) {
				if ( 'blank' === to ) {
					$( '.site-title, .site-description' ).css( {
						'clip': 'rect(1px, 1px, 1px, 1px)',
						'position': 'absolute'
					} );
				} else {
					$( '.site-title, .site-description' ).css( {
						'clip': 'auto',
						'position': 'relative'
					} );
					$( '.site-title a, .site-description' ).css( {
						'color': to
					} );
				}
			} );
		} );
		*/

	} );

}() );