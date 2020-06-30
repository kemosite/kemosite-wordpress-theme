<?php

function row_shortcode_method($attributes, $content) {

	$output = "";

	$output .= '<div class="grid-x';

	if ($attributes !== NULL && is_array($attributes)):

		if ( array_key_exists('gutter', $attributes) && $attributes['gutter'] == "true" ): $output .= ' grid-margin-x'; endif;

		if ( array_key_exists('small-margin-collapse', $attributes) && $attributes['small-margin-collapse'] == "true" ): $output .= ' small-margin-collapse'; endif;
		if ( array_key_exists('medium-margin-collapse', $attributes) && $attributes['medium-margin-collapse'] == "true" ): $output .= ' medium-margin-collapse'; endif;
		if ( array_key_exists('large-margin-collapse', $attributes) && $attributes['large-margin-collapse'] == "true" ): $output .= ' large-margin-collapse'; endif;

		if ( array_key_exists('small-offset', $attributes) && is_numeric($attributes['small-offset']) ): $output .= 'small-offset-'.$attributes['small-offset'] . ' '; endif;
		if ( array_key_exists('medium-offset', $attributes) && is_numeric($attributes['medium-offset']) ): $output .= 'medium-offset-'.$attributes['medium-offset'] . ' '; endif;
		if ( array_key_exists('large-offset', $attributes) && is_numeric($attributes['large-offset']) ): $output .= 'large-offset-'.$attributes['large-offset'] . ' '; endif;

		if ( array_key_exists('padding', $attributes) && $attributes['padding'] == "true" ): $output .= ' grid-padding-x'; endif;
		if ( array_key_exists('small-up', $attributes) && is_numeric($attributes['small-up']) ): $output .= 'small-up-'.$attributes['small-up'] . ' '; endif;
		if ( array_key_exists('medium-up', $attributes) && is_numeric($attributes['medium-up']) ): $output .= 'medium-up-'.$attributes['medium-up'] . ' '; endif;
		if ( array_key_exists('large-up', $attributes) && is_numeric($attributes['large-up']) ): $output .= 'large-up-'.$attributes['large-up'] . ' '; endif;

	endif;

	$output .= '">' . "\n";
	$output .= do_shortcode($content) . "\n";
	$output .= '</div>';

	return $output;

}
add_shortcode( 'row', 'row_shortcode_method' );

?>