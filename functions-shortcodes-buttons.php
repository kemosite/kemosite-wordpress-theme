<?php

function buttons_shortcode_method($attributes, $content) {

	$output = "";

	if ($attributes !== NULL):

		if ( array_key_exists('href', $attributes) && $attributes['href'] !== NULL ):
			$output .= '<a href="'.$attributes['href'].'" ';
		elseif ($attributes['link'] !== NULL):
			$output .= '<a href="'.$attributes['link'].'" ';
		else: $output .= '';
			$output .= '<button type="button" ';
		endif;
		
		$output .= 'class="';

		if ( array_key_exists('type', $attributes) && $attributes['type'] == "success" ): 
			$output .= 'success ';
		elseif ( array_key_exists('type', $attributes) && $attributes['type'] == "alert" ):
			$output .= 'alert ';
		elseif ( array_key_exists('type', $attributes) && $attributes['type'] == "secondary" ):
			$output .= 'secondary ';
		endif;

		if ( isset($attributes['size']) && $attributes['size'] == "tiny"): 
			$output .= 'tiny ';
		elseif ( isset($attributes['size']) && $attributes['size'] == "small"):
			$output .= 'small ';
		elseif ( isset($attributes['size']) && $attributes['size'] == "large"):
			$output .= 'large ';
		endif;

		if ( array_key_exists('expand', $attributes) && $attributes['expand'] == "true" ):
			$output .= 'expanded ';
		elseif ( array_key_exists('expand', $attributes) && $attributes['expand'] == "expanded" ):
			$output .= 'expanded ';
		elseif ( array_key_exists('expand', $attributes) && $attributes['expand'] == "small-only-expanded"): // Expand only on small viewport
			$output .= 'small-only-expanded ';
		elseif ( array_key_exists('expand', $attributes) && $attributes['expand'] == "medium-only-expanded"): // Expand only on medium viewport
			$output .= 'medium-only-expanded ';
		elseif ( array_key_exists('expand', $attributes) && $attributes['expand'] == "large-only-expanded" ): // Expand only on large viewport
			$output .= 'large-only-expanded ';
		elseif ( array_key_exists('expand', $attributes) && $attributes['expand'] == "medium-expanded" ): // Expand on medium and larger
			$output .= 'medium-expanded ';
		elseif ( array_key_exists('expand', $attributes) && $attributes['expand'] == "large-expanded" ): // Expand on large and larger
			$output .= 'large-expanded ';
		elseif ( array_key_exists('expand', $attributes) && $attributes['expand'] == "medium-down-expanded" ): // Expand on medium and smaller
			$output .= 'medium-down-expanded ';
		elseif ( array_key_exists('expand', $attributes) && $attributes['expand'] == "large-down-expanded" ): // Expand on large and smaller
			$output .= 'large-down-expanded ';
		endif;

		$output .= 'button">' . "\n";

		if ( array_key_exists('text', $attributes) && $attributes['text'] !== NULL):
			$output .= $attributes['text'] . "\n";
		else:
			$output .= do_shortcode($content) . "\n";
		endif;
		
		if ( (array_key_exists('href', $attributes) && $attributes['href'] !== NULL) || (array_key_exists('link', $attributes) && $attributes['link'] !== NULL) ):
			$output .= '</a>' . "\n";
		else: 
			$output .= '</button>' . "\n";
		endif;

	endif;

	return $output;

}
add_shortcode( 'button', 'buttons_shortcode_method' );

function button_group_shortcode_method($attributes, $content) {

	$output = "";

	$output .= '<div class="button-group>'."\n";
	$output .= do_shortcode($content) . "\n";
	$output .= '</div>'."\n";

	return $output;

}
add_shortcode( 'button_group', 'button_group_shortcode_method' );

?>