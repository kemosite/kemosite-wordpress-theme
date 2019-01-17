<?php

function buttons_shortcode_method($attributes, $content) {

	$output = "";

	if ($attributes !== NULL):

		if ($attributes['href'] !== NULL):
			$output .= '<a href="'.$attributes['href'].'" ';
		elseif ($attributes['link'] !== NULL):
			$output .= '<a href="'.$attributes['link'].'" ';
		else: $output .= '';
			$output .= '<button type="button" ';
		endif;
		
		$output .= 'class="';

		if ($attributes['type'] == "success"): 
			$output .= 'success ';
		elseif ($attributes['type'] == "alert"):
			$output .= 'alert ';
		elseif ($attributes['type'] == "secondary"):
			$output .= 'secondary ';
		endif;

		if ($attributes['size'] == "tiny"): 
			$output .= 'tiny ';
		elseif ($attributes['size'] == "small"):
			$output .= 'small ';
		elseif ($attributes['size'] == "large"):
			$output .= 'large ';
		endif;

		if ($attributes['expand'] == "true"):
			$output .= 'expanded ';
		elseif ($attributes['expand'] == "expanded"):
			$output .= 'expanded ';
		elseif ($attributes['expand'] == "small-only-expanded"): // Expand only on small viewport
			$output .= 'small-only-expanded ';
		elseif ($attributes['expand'] == "medium-only-expanded"): // Expand only on medium viewport
			$output .= 'medium-only-expanded ';
		elseif ($attributes['expand'] == "large-only-expanded"): // Expand only on large viewport
			$output .= 'large-only-expanded ';
		elseif ($attributes['expand'] == "medium-expanded"): // Expand on medium and larger
			$output .= 'medium-expanded ';
		elseif ($attributes['expand'] == "large-expanded"): // Expand on large and larger
			$output .= 'large-expanded ';
		elseif ($attributes['expand'] == "medium-down-expanded"): // Expand on medium and smaller
			$output .= 'medium-down-expanded ';
		elseif ($attributes['expand'] == "large-down-expanded"): // Expand on large and smaller
			$output .= 'large-down-expanded ';
		endif;

		$output .= 'button">' . "\n";

		if ($attributes['text'] !== NULL):
			$output .= $attributes['text'] . "\n";
		else:
			$output .= do_shortcode($content) . "\n";
		endif;
		
		if ($attributes['href'] !== NULL || $attributes['link'] !== NULL):
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