<?php

function row_shortcode_method($attributes, $content) {

	$output = "";

	$output .= '<div class="grid-x';

	if ($attributes !== NULL && is_array($attributes)):

		if ($attributes['gutter'] == "true"): $output .= ' grid-margin-x'; endif;

		if ($attributes['small-margin-collapse'] == "true"): $output .= ' small-margin-collapse'; endif;
		if ($attributes['medium-margin-collapse'] == "true"): $output .= ' medium-margin-collapse'; endif;
		if ($attributes['large-margin-collapse'] == "true"): $output .= ' large-margin-collapse'; endif;

		if (is_numeric($attributes['small-offset'])): $output .= 'small-offset-'.$attributes['small-offset'] . ' '; endif;
		if (is_numeric($attributes['medium-offset'])): $output .= 'medium-offset-'.$attributes['medium-offset'] . ' '; endif;
		if (is_numeric($attributes['large-offset'])): $output .= 'large-offset-'.$attributes['large-offset'] . ' '; endif;

		if ($attributes['padding'] == "true"): $output .= ' grid-padding-x'; endif;
		if (is_numeric($attributes['small-up'])): $output .= 'small-up-'.$attributes['small-up'] . ' '; endif;
		if (is_numeric($attributes['medium-up'])): $output .= 'medium-up-'.$attributes['medium-up'] . ' '; endif;
		if (is_numeric($attributes['large-up'])): $output .= 'large-up-'.$attributes['large-up'] . ' '; endif;

	endif;

	$output .= '">' . "\n";
	$output .= do_shortcode($content) . "\n";
	$output .= '</div>';

	return $output;

}
add_shortcode( 'row', 'row_shortcode_method' );

?>