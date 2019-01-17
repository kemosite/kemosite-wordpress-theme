<?php

function grid_container_shortcode_method($attributes, $content) {

	$output = "";

	$output .= '<div class="grid-container';

	if ($attributes !== NULL):

		if ($attributes['fluid'] == "true"): $output .= ' fluid'; endif;
		if ($attributes['full'] == "true"): $output .= ' full'; endif;

	endif;

	$output .= '">' . "\n";
	$output .= do_shortcode($content) . "\n";
	$output .= '</div>';

	return $output;

}
add_shortcode( 'grid_container', 'grid_container_shortcode_method' );

?>