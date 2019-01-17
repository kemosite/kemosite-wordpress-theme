<?php

function columns_shortcode_method($attributes, $content) {

	$output = "";

	$output .= '<div class="';

	if ($attributes !== NULL):

		if (is_numeric($attributes['small'])): $output .= 'small-'.$attributes['small'] . ' '; endif;
		if (is_numeric($attributes['medium'])): $output .= 'medium-'.$attributes['medium'] . ' '; endif;
		if (is_numeric($attributes['large'])): $output .= 'large-'.$attributes['large'] . ' '; endif;
		
		if ($attributes['small'] == "auto"): $output .= 'small-'.$attributes['small'] . ' '; endif;
		if ($attributes['medium'] == "auto"): $output .= 'medium-'.$attributes['medium'] . ' '; endif;
		if ($attributes['large'] == "auto"): $output .= 'large-'.$attributes['large'] . ' '; endif;
		
		if ($attributes['small'] == "shrink"): $output .= 'small-'.$attributes['small'] . ' '; endif;
		if ($attributes['medium'] == "shrink"): $output .= 'medium-'.$attributes['medium'] . ' '; endif;
		if ($attributes['large'] == "shrink"): $output .= 'large-'.$attributes['large'] . ' '; endif;
		
		if ($attributes['auto'] == "true"): $output .= 'auto '; endif;
		if ($attributes['shrink'] == "true"): $output .= 'shrink '; endif;

	endif;

	$output .= 'cell">' . "\n";
	$output .= do_shortcode($content) . "\n";
	$output .= '</div>';

	return $output;

}
add_shortcode( 'columns', 'columns_shortcode_method' );
add_shortcode( 'column', 'columns_shortcode_method' );

function content_columns_shortcode_method($attributes, $content) {

	$output = "";

	$output .= '<div class="columns">' . "\n";
	$output .= do_shortcode($content) . "\n";
	$output .= '</div>';

	return $output;

}
add_shortcode( 'content_columns', 'content_columns_shortcode_method' );

function content_single_column_shortcode_method($attributes, $content) {

	$output = "";

	$output .= '<div class="single column">' . "\n";
	$output .= do_shortcode($content) . "\n";
	$output .= '</div>';

	return $output;

}
add_shortcode( 'single_column', 'content_single_column_shortcode_method' );

?>