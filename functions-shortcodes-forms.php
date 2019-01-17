<?php

function form_shortcode_method($attributes, $content) {

	$output = "";

	$output .= '<form>'."\n";
	$output .= do_shortcode($content) . "\n";
	$output .= '</form>';

	return $output;

}
add_shortcode( 'form', 'form_shortcode_method' );


function input_shortcode_method($attributes, $content) {

	$output = "";

	if ($attributes !== NULL):

		if ($attributes['type'] !== "radio"
		&& $attributes['type'] !== "checkbox"):
			$output .= '<label>'.$content.'</label>' . "\n";
		endif;
		if ($attributes['group'] == "true"): $output .= '<div class="input-group">' . "\n"; endif;

	endif;

	$output .= '<input';

	if ($attributes !== NULL):

		if ($attributes['type'] !== NULL): $output .= ' type="'.$attributes['type'].'"'; endif;
		if ($attributes['id'] !== NULL): $output .= ' id="'.$attributes['id'].'"'; endif;
		if ($attributes['class'] !== NULL): $output .= ' class="'.$attributes['class'].'"'; endif;
		if ($attributes['placeholder'] !== NULL): $output .= ' placeholder="'.$attributes['placeholder'].'"'; endif;
		if ($attributes['value'] !== NULL): $output .= ' value="'.$attributes['value'].'"'; endif;
		if ($attributes['aria_help_text_id'] !== NULL): $output .= ' aria-describedby="'.$attributes['aria_help_text_id'].'"'; endif;
		if ($attributes['group'] == "true"): $output .= ' class="input-group-field"'; endif;

	endif;

	$output .= '>' . "\n";

	if ($attributes !== NULL):

		if ($attributes['type'] == "radio"
		&& $attributes['type'] == "checkbox"):
			
			$output .= '<label';
			if ($attributes['id'] !== NULL): $output .= ' for="'.$attributes['id'].'"'; endif;

		endif;		

		$output .= '>'.$content.'</label>' . "\n";

	endif;

	if ($attributes !== NULL):

		if ($attributes['group_label'] !== NULL): $output .= '<span>'.$attributes['group_label'].'</span>' . "\n"; endif;
		if ($attributes['group'] == "true"): $output .= '</div>' . "\n"; endif;
		if ( $attributes['aria_help_text_id'] !== NULL
		&& $attributes['aria_help_text'] !== NULL): 
			$output .= '<p class="help-text" id="'.$attributes['aria_help_text_id'].'">'.$attributes['aria_help_text'].'</p>';
		endif;

	endif;

	return $output;

}
add_shortcode( 'input', 'input_shortcode_method' );

function textarea_shortcode_method($attributes, $content) {

	$output = "";

	$output .= '<label>'.do_shortcode($content) . "\n";
	$output .= '<textarea';

	if ($attributes !== NULL):

		if ($attributes['placeholder'] !== NULL): $output .= ' placeholder="'.$attributes['placeholder'].'"'; endif;
		if ($attributes['value'] !== NULL): $output .= ' value="'.$attributes['value'].'"'; endif;
		if ($attributes['aria_help_text_id'] !== NULL): $output .= ' aria-describedby="'.$attributes['aria_help_text_id'].'"'; endif;

	endif;

	$output .= '></textarea>' . "\n";
	$output .= '</label>' . "\n";

	if ($attributes !== NULL):

		if ( $attributes['aria_help_text_id'] !== NULL
		&& $attributes['aria_help_text'] !== NULL): 

			$output .= '<p class="help-text" id="'.$attributes['aria_help_text_id'].'">'.$attributes['aria_help_text'].'</p>';

		endif;

	endif;

	return $output;

}
add_shortcode( 'textarea', 'textarea_shortcode_method' );

function select_shortcode_method($attributes, $content) {

	$output = "";

	$output .= '<label>' . "\n";
	$output .= '<select';

	if ($attributes !== NULL):

		if ($attributes['aria_help_text_id'] !== NULL): $output .= ' aria-describedby="'.$attributes['aria_help_text_id'].'"'; endif;

	endif;

	$output .= '>' . "\n";

	$output .= do_shortcode($content);

	$output .= '</select>' . "\n";
	$output .= '</label>' . "\n";

	if ($attributes !== NULL):

		if ( $attributes['aria_help_text_id'] !== NULL
		&& $attributes['aria_help_text'] !== NULL): 

			$output .= '<p class="help-text" id="'.$attributes['aria_help_text_id'].'">'.$attributes['aria_help_text'].'</p>';

		endif;

	endif;

	return $output;

}
add_shortcode( 'select', 'option_shortcode_method' );

function option_shortcode_method($attributes, $content) {

	$output = "";

	$output .= '<option';

	if ($attributes !== NULL):

		if ($attributes['value'] !== NULL): $output .= ' value="'.$attributes['value'].'"'; endif;

	endif;

	$output .= '>' . "\n";

	$output .= do_shortcode($content);

	$output .= '</option>' . "\n";

	if ($attributes !== NULL):

		if ( $attributes['aria_help_text_id'] !== NULL
		&& $attributes['aria_help_text'] !== NULL): 

			$output .= '<p class="help-text" id="'.$attributes['aria_help_text_id'].'">'.$attributes['aria_help_text'].'</p>';

		endif;

	endif;

	return $output;

}
add_shortcode( 'option', 'option_shortcode_method' );

function fieldset_shortcode_method($attributes, $content) {

	$output = "";

	$output .= '<fieldset';

	if ($attributes !== NULL):

		$output .= ' class="';

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

		$output .= 'cell"' . "\n";

	endif;

	$output .= '>' . "\n";

	if ($attributes !== NULL
	&& $attributes['legend'] !== NULL):

		$output .= '<legend>'.$attributes['legend'].'</legend>' . "\n";

	endif;
	
	$output .= do_shortcode($content) . "\n";
	$output .= '</fieldset>';

	return $output;

}
add_shortcode( 'fieldset', 'fieldset_shortcode_method' );

?>