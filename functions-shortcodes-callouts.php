<?php

function callouts_shortcode_method($attributes, $content) {

	$output = "";

	$output .= '<div class="callout';

	if ($attributes !== NULL && is_array($attributes)):

		if ($attributes['primary'] == "true"): $output .= ' primary'; endif;
		if ($attributes['secondary'] == "true"): $output .= ' secondary'; endif;
		if ($attributes['success'] == "true"): $output .= ' success'; endif;
		if ($attributes['warning'] == "true"): $output .= ' warning'; endif;
		if ($attributes['alert'] == "true"): $output .= ' alert'; endif;

	endif;

	$output .= '">' . "\n";
	$output .= do_shortcode($content) . "\n";
	$output .= '</div>';

	return $output;

}
add_shortcode( 'callout', 'callouts_shortcode_method' );

?>