<?php

/*
** HSV and HSB are not the same as HSL!!
*/


if ( !function_exists('kemosite_grey_to_hex') ) :
function kemosite_grey_to_hex( $percentage = 0.78 ) {

	$grey = round(255 - (255 * $percentage));
	$grey_hex = str_pad( dechex( $grey ), 2, '0', STR_PAD_LEFT);
	$hex = '#'.$grey_hex.$grey_hex.$grey_hex;

	return $hex;

}
endif;

if ( !function_exists('kemosite_lum_to_hex') ) :
function kemosite_lum_to_hex( $luminance ) {

	$grey = round(255 * $luminance);
	$grey_hex = str_pad( dechex( $grey ), 2, '0', STR_PAD_LEFT);
	$hex = '#'.$grey_hex.$grey_hex.$grey_hex;

	return $hex;

}
endif;

if ( !function_exists('kemosite_calc_lum') ) :
function kemosite_calc_lum ($r_input, $g_input, $b_input) {

	// https://www.w3.org/WAI/GL/wiki/Relative_luminance
	// https://www.w3.org/TR/WCAG20/

	$r_srgb = $r_input / 255;
	$g_srgb = $g_input / 255;
	$b_srgb = $b_input / 255;

	$r = ($r_srgb <= 0.03928) ? $r_srgb / 12.92 : pow((($r_srgb + 0.055) / 1.055), 2.4);
	$g = ($g_srgb <= 0.03928) ? $g_srgb / 12.92 : pow((($g_srgb + 0.055) / 1.055), 2.4);
	$b = ($b_srgb <= 0.03928) ? $b_srgb / 12.92 : pow((($b_srgb + 0.055) / 1.055), 2.4);
	
	return (($r * 0.2126) + ($g * 0.7152) + ($b * 0.0722)) * 100;

}
endif;

if ( !function_exists('kemosite_calc_neutral_sat') ) :
function kemosite_calc_neutral_sat ( $colour_hsl_array = 'array', $neutral_tone_hsl_array = 'array' ) {

	$output = floor( 
		$colour_hsl_array[1] * ( ( ( 100 - $neutral_tone_hsl_array[2] ) / 2 ) / 100 )
	);

	return $output; // saturation

}
endif;

if ( !function_exists('kemosite_rgb_to_lum') ) :
function kemosite_rgb_to_lum ( $rgb_input = 'string' ) {

	// https://www.w3.org/TR/WCAG20/

	$rgb_array = explode(',', $rgb_input);

	$r_input = $rgb_array[0];
	$g_input = $rgb_array[1];
	$b_input = $rgb_array[2];

	$r_srgb = $r_input / 255;
	$g_srgb = $g_input / 255;
	$b_srgb = $b_input / 255;

	$r = ($r_srgb <= 0.03928) ? $r_srgb / 12.92 : pow((($r_srgb + 0.055) / 1.055), 2.4);
	$g = ($g_srgb <= 0.03928) ? $g_srgb / 12.92 : pow((($g_srgb + 0.055) / 1.055), 2.4);
	$b = ($b_srgb <= 0.03928) ? $b_srgb / 12.92 : pow((($b_srgb + 0.055) / 1.055), 2.4);
	
	return ( ( $r * 0.2126 ) + ( $g * 0.7152 ) + ( $b * 0.0722 ) );

}
endif;

if ( !function_exists('kemosite_rgb_to_chroma') ) :
function kemosite_rgb_to_chroma ( $rgb_input = 'string' ) {

	$rgb_array = explode(',', $rgb_input);

	$r_input = $rgb_array[0];
	$g_input = $rgb_array[1];
	$b_input = $rgb_array[2];

	$r_srgb = $r_input / 255;
	$g_srgb = $g_input / 255;
	$b_srgb = $b_input / 255;

	$rgb_max = max($r_srgb, $g_srgb, $b_srgb);
	$rgb_min = min($r_srgb, $g_srgb, $b_srgb);

    // chroma = delta
    $chroma = $rgb_max - $rgb_min;

	return $chroma;

}
endif;

if ( !function_exists('kemosite_hex_to_chroma') ) :
function kemosite_hex_to_chroma ( $hex_input = 'string' ) {

	$rgb_string = kemosite_hex_to_rgb( $hex_input );
	$chroma = kemosite_rgb_to_chroma( $rgb_string );

	return $chroma;

}
endif;

if ( !function_exists('kemosite_rgb_to_value') ) :
function kemosite_rgb_to_value ( $rgb_input = 'string' ) {

	// See RGB to HSL conversion:
	// https://www.geeksforgeeks.org/program-change-rgb-color-model-hsv-color-model
	// https://en.wikipedia.org/wiki/HSL_and_HSV#From_RGB

	$rgb_array = explode(',', $rgb_input);

	$r_input = $rgb_array[0];
	$g_input = $rgb_array[1];
	$b_input = $rgb_array[2];

	$r_srgb = $r_input / 255;
	$g_srgb = $g_input / 255;
	$b_srgb = $b_input / 255;

	$value = max($r_srgb, $g_srgb, $b_srgb);

	return $value;

}
endif;

if ( !function_exists('kemosite_calc_contrast') ) :
function kemosite_calc_contrast ( $l1, $l2 = 100) { // Assume $l2 is white, 100% luminance, unless specified differently.

	// https://www.w3.org/TR/WCAG20/

	$contrast = round( ( max( $l1, $l2 ) + 5 ) / ( min( $l1, $l2 ) + 5 ), 2); // Minimum 4.5 / 7

	return $contrast;

}
endif;

if ( !function_exists('kemosite_rgb_to_hex') ) :
function kemosite_rgb_to_hex ( $rgb_input = 'string' ) {

	$rgb_array = explode(',', $rgb_input);

	$r = str_pad( dechex( $rgb_array[0] ), 2, '0', STR_PAD_LEFT);
	$g = str_pad( dechex( $rgb_array[1] ), 2, '0', STR_PAD_LEFT);
	$b = str_pad( dechex( $rgb_array[2] ), 2, '0', STR_PAD_LEFT);

	$output = "#". $r . $g . $b;

	return $output;

}
endif;

if ( !function_exists('kemosite_hex_to_rgb') ) :
function kemosite_hex_to_rgb ( $hex_input = '#string' ) {

	$hex = (substr($hex_input, 0, 1) === "#") ? substr($hex_input, 1) : $hex_input;

	$primary_parse_r = hexdec( substr($hex, 0, 2) );
	$primary_parse_g = hexdec( substr($hex, 2, 2) );
	$primary_parse_b = hexdec( substr($hex, 4, 2) );

	$output = $primary_parse_r.','.$primary_parse_g.','.$primary_parse_b;

	return $output;

}
endif;

if ( !function_exists('kemosite_hex_to_lum') ) :
function kemosite_hex_to_lum ( $hex_input = '#string' ) {

	$rgb_string = kemosite_hex_to_rgb( $hex_input );
	$output = kemosite_rgb_to_lum( $rgb_string );

	return $output;

}
endif;

if ( !function_exists('kemosite_rgb_to_hsl') ) :
function kemosite_rgb_to_hsl ( $rgb_input = 'string' ) {

	// See RGB to HSL conversion:
	// https://en.wikipedia.org/wiki/HSL_and_HSV#From_RGB

	$rgb_array = explode(',', $rgb_input);

	$r_input = $rgb_array[0];
	$g_input = $rgb_array[1];
	$b_input = $rgb_array[2];

	$r_srgb = $r_input / 255;
	$g_srgb = $g_input / 255;
	$b_srgb = $b_input / 255;

	$rgb_max = max($r_srgb, $g_srgb, $b_srgb);
	$rgb_min = min($r_srgb, $g_srgb, $b_srgb);
    
	// value
	$value = $rgb_max;

    // chroma = delta
    $chroma = $rgb_max - $rgb_min;

    // lightness
    $l = ( $rgb_max + $rgb_min ) / 2;

    if( $chroma == 0 || $rgb_max == 0 ): $h = $s = 0; // achromatic
	else:
        
        // hue
        switch( $rgb_max ) {
            
            case $r_srgb:

	            $h = 0 + ( ( $g_srgb - $b_srgb ) / $chroma );
            	break;

            case $g_srgb:

	            $h = 2 + ( ( $b_srgb - $r_srgb ) / $chroma );
	            break;

            case $b_srgb:

	            $h = 4 + ( ( $r_srgb - $g_srgb ) / $chroma );
            	break;

        }

        // saturation
        $s = ( $l > 0 && $l < 1 ) ? ( ( 2 * ( $value - $l ) ) / ( 1 - abs( ( 2 * $l ) - 1 ) ) ) : 0;

    endif;

    $h = $h * 60;
    if ( $h < 0 ): $h += 360; endif;
    $s *= 100;
    $l *= 100;

    return round($h).','.round($s).','.round($l);

}
endif;

if ( !function_exists('kemosite_hsl_to_rgb') ) :
function kemosite_hsl_to_rgb ( $hsl_input = 'string' ) {

	// https://en.wikipedia.org/wiki/HSL_and_HSV#HSV_to_RGB
	// https://css-tricks.com/converting-color-spaces-in-javascript/

	$hsl_array = explode(',', $hsl_input);

	$h_input = $hsl_array[0] / 60;
	$s_input = $hsl_array[1] / 100;
	$l_input = $hsl_array[2] / 100;

	// If no saturation
	if ( $s_input == 0):
		
		$r = $g = $b = 255 * $l_input;

		$output = round($r).','.round($g).','.round($b);

	else:

		/*
		Source: https://www.geeksforgeeks.org/difference-between-rgb-cmyk-hsv-and-yiq-color-models/?ref=gcse
		Red colour falls between 0 and 60 degrees in the HSV cone.
		Yellow colour falls between 61 and 120 degrees in the HSV cone.
		Green colour falls between 121 and 180 degrees in the HSV cone.
		Cyan colour falls between 181 and 240 degrees in the HSV cone.
		Blue colour falls between 241 and 300 degrees in the HSV cone.
		Magenta colour falls between 301 and 360 degrees in the HSV cone.

		https://github.com/davidmarkclements/hsl_rgb_converter/blob/master/converter.js

		*/

		$chroma = (1 - abs( ( 2 * $l_input ) - 1 ) ) * $s_input;
		$x 		= $chroma * ( 1 - abs( fmod( $h_input, 2 ) - 1 ) );

		if ( 0 <= $h_input && $h_input < 1 ):
	    	$r1 = $chroma;
	    	$g1 = $x;
	    	$b1 = 0;
		elseif ( 1 <= $h_input && $h_input < 2 ):
			$r1 = $x;
	    	$g1 = $chroma;
	    	$b1 = 0;
		elseif ( 2 <= $h_input && $h_input < 3 ):
			$r1 = 0;
	    	$g1 = $chroma;
	    	$b1 = $x;
		elseif ( 3 <= $h_input && $h_input < 4 ):
			$r1 = 0;
	    	$g1 = $x;
	    	$b1 = $chroma;
		elseif ( 4 <= $h_input && $h_input < 5 ):
			$r1 = $x;
	    	$g1 = 0;
	    	$b1 = $chroma;
		elseif ( 5 <= $h_input && $h_input < 6 ):
			$r1 = $chroma;
	    	$g1 = 0;
	    	$b1 = $x;
		endif;

		$m = $l_input - ( $chroma / 2 );
		
		$r = round( ($r1 + $m) * 255 );
		$g = round( ($g1 + $m) * 255 );
		$b = round( ($b1 + $m) * 255 );

		$output = $r.','.$g.','.$b;

	endif;

	return $output;

}
endif;

if ( !function_exists('kemosite_hex_to_hsl') ) :
function kemosite_hex_to_hsl ( $hex_input = '#string' ) {

	$hex = (substr($hex_input, 0, 1) === "#") ? substr($hex_input, 1) : $hex_input;

	$primary_parse_r = hexdec( substr($hex, 0, 2) );
	$primary_parse_g = hexdec( substr($hex, 2, 2) );
	$primary_parse_b = hexdec( substr($hex, 4, 2) );

	$rgb_string = $primary_parse_r.','.$primary_parse_g.','.$primary_parse_b;

	$output = kemosite_rgb_to_hsl( $rgb_string );

	return $output;

}
endif;

if ( !function_exists('kemosite_hsl_to_hex') ) :
function kemosite_hsl_to_hex ( $hsl_input = 'string' ) {

	$rgb_string 	= kemosite_hsl_to_rgb ( $hsl_input );
	$output 		= kemosite_rgb_to_hex ( $rgb_string );

	return $output;

}
endif;

if ( !function_exists('kemosite_adjust_contrast') ) :
function kemosite_adjust_contrast($eval_contrast = "", $target_contrast = 3) {

	/*
	[CONTRAST INTENT]
	
	- Graphical Objects and User Interface Components, WCAG AA: 3:1
	
	- Large Text, WCAG AA: 3:1
	- Large Text, WCAG AAA: 4.5:1
	(Large text is defined as 14 point (typically 18.66px) and bold or larger, or 18 point (typically 24px) or larger.)

	- Normal Text, WCAG AA: 4.5:1
	- Normal Text, WCAG AAA: 7:1

	*/

	/*
	- Actual (Eval)
	- Target
	- Difference
	- Apply correction to LUMINANCE
	*/

	// The contrasts are DELTAS in their own right. We're trying to adjust the delta. How much delta are we keeping or removing?

	$contrast_delta = max( $eval_contrast, $target_contrast ) - min( $eval_contrast, $target_contrast );
	
	$contrast_adjustment_ratio = $contrast_delta / 20; // #000 to #FFF is 21:1; 21:1 -> 1:1 is 20 incremental steps.

	return $contrast_adjustment_ratio;

}
endif;

if ( !function_exists('kemosite_adjust_hsl_l_contrast') ) :
function kemosite_adjust_hsl_l_contrast( $hsl = array(), $eval_contrast = "", $target_contrast = 3, $luminance = 100 ) {

	$contrast_adjustment_ratio = kemosite_adjust_contrast( $eval_contrast, $target_contrast);
	$hsl_lightness_delta = 100 - $hsl[2];

	/*
	if $luminance > $hsl[2], less delta = less contrast
	if $luminance < $hsl[2], less delta = more contrast
	*/

	// Thought: Adjustment depends on whether we're adding or removing contrast from a darker or lighter colour!!
	if ( 
		$luminance >= $hsl[2] && // white
		$eval_contrast >= $target_contrast // contrast reduction
	):

		$delta_retainment = floor( $contrast_adjustment_ratio * 100 );
		$delta_adjustment = $hsl_lightness_delta - $delta_retainment;

	elseif (
		$luminance >= $hsl[2] && // white
		$eval_contrast < $target_contrast // contrast increase
	):

		$delta_retainment = ceil( $contrast_adjustment_ratio * 100 );
		$delta_adjustment = $hsl_lightness_delta + $delta_retainment;

	elseif (
		$luminance < $hsl[2] && // black
		$eval_contrast >= $target_contrast // contrast reduction
	):

		$delta_retainment = floor( $contrast_adjustment_ratio * 100 );
		$delta_adjustment = $hsl_lightness_delta + $delta_retainment;

	elseif (
		$luminance < $hsl[2] && // black
		$eval_contrast < $target_contrast // contrast increase
	):

		$delta_retainment = ceil( $contrast_adjustment_ratio * 100 ); // Must decrease delta to increase contrast
		$delta_adjustment = $hsl_lightness_delta - $delta_retainment;

	endif;

	$h = $hsl[0];

	if ( $delta_retainment == 0 ): $l = $hsl[2]; else:

		$l = 100 - $delta_adjustment;

	endif;

	$s = $hsl[1];

	$hsl_string = $h .','. $s . ',' . $l;

	return $hsl_string;
	
}
endif;

if ( !function_exists('kemosite_create_thumbnail_for_post') ) :
function kemosite_create_thumbnail_for_post(  ) {

	// function code.

}
endif;

?>