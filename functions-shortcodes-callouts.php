<?php

function callouts_shortcode_method($attributes, $content) {

	$output = "";

	$output .= '<div class="callout';

	if ($attributes !== NULL && is_array($attributes)):

		if ( isset($attributes['primary']) && $attributes['primary'] == "true"): $output .= ' primary'; endif;
		if ( isset($attributes['secondary']) && $attributes['secondary'] == "true"): $output .= ' secondary'; endif;
		if ( isset($attributes['success']) && $attributes['success'] == "true"): $output .= ' success'; endif;
		if ( isset($attributes['warning']) && $attributes['warning'] == "true"): $output .= ' warning'; endif;
		if ( isset($attributes['alert']) && $attributes['alert'] == "true"): $output .= ' alert'; endif;

	endif;

	$output .= '">' . "\n";
	$output .= do_shortcode($content) . "\n";
	$output .= '</div>';

	return $output;

}
add_shortcode( 'callout', 'callouts_shortcode_method' );

?>