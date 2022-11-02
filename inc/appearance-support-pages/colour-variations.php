<style>@import url("<?php echo get_template_directory_uri() . '/admin-css.css' ?>"); </style>

<h1>Colour Variations</h1>
<p>From your selection of base colour in the <a href="<?php echo admin_url( 'customize.php', 'https' ); ?>">theme customizer</a>, colour variations are proposed here using a variety of colour and neutral schemes. Colours are adjusted for accessible contrast targets. These are targets, that doesn't always mean they'll be 100% accurate. Be sure to confirm with the <a href="https://webaim.org/resources/contrastchecker/" target="_blank" rel="noopener">WebAIM Contrast Checker</a>.</p>

<?php

/*
** [BASE COLOURS AND TINTS VALUES] **
*/

// HEX
$kemosite_wordpress_base_primary_colour_hex			= get_theme_mod('kemosite_wordpress_base_primary_colour', '#242424');
$kemosite_wordpress_base_white_hex					= '#FFFFFF';
$kemosite_wordpress_base_black_hex					= get_theme_mod('kemosite_wordpress_base_black', '#242424');
$kemosite_wordpress_neutral_white_3_hex				= '#949494';
$kemosite_wordpress_neutral_white_45_hex			= '#757575';
$kemosite_wordpress_neutral_white_7_hex				= '#595959';
$kemosite_wordpress_neutral_black_3_hex				= '#6e6e6e';
$kemosite_wordpress_neutral_black_45_hex			= '#8c8c8c';
$kemosite_wordpress_neutral_black_7_hex				= '#b0b0b0';


// RGB
$kemosite_wordpress_base_primary_colour_rgb			= kemosite_hex_to_rgb( $kemosite_wordpress_base_primary_colour_hex );
$kemosite_wordpress_base_white_rgb					= kemosite_hex_to_rgb( $kemosite_wordpress_base_white_hex );
$kemosite_wordpress_base_black_rgb					= kemosite_hex_to_rgb( $kemosite_wordpress_base_black_hex );
$kemosite_wordpress_base_primary_colour_rgb_array	= explode( ",", $kemosite_wordpress_base_primary_colour_rgb );
$kemosite_wordpress_base_white_rgb_array			= explode( ",", $kemosite_wordpress_base_white_rgb );
$kemosite_wordpress_base_black_rgb_array			= explode( ",", $kemosite_wordpress_base_black_rgb );

// Luminance
$kemosite_wordpress_base_primary_colour_lum		= kemosite_calc_lum( 
													$kemosite_wordpress_base_primary_colour_rgb_array[0],
													$kemosite_wordpress_base_primary_colour_rgb_array[1],
													$kemosite_wordpress_base_primary_colour_rgb_array[2],
												);
$kemosite_wordpress_base_white_lum				= kemosite_calc_lum( 
													$kemosite_wordpress_base_white_rgb_array[0],
													$kemosite_wordpress_base_white_rgb_array[1],
													$kemosite_wordpress_base_white_rgb_array[2],
												);
$kemosite_wordpress_base_black_lum				= kemosite_calc_lum( 
													$kemosite_wordpress_base_black_rgb_array[0],
													$kemosite_wordpress_base_black_rgb_array[1],
													$kemosite_wordpress_base_black_rgb_array[2],
												);

// Contrast
$kemosite_wordpress_base_primary_colour_white_contrast	= kemosite_calc_contrast( $kemosite_wordpress_base_primary_colour_lum, $kemosite_wordpress_base_white_lum);
$kemosite_wordpress_base_primary_colour_black_contrast	= kemosite_calc_contrast( $kemosite_wordpress_base_primary_colour_lum, $kemosite_wordpress_base_black_lum);

// HSL
$kemosite_wordpress_base_primary_colour_hsl			= kemosite_hex_to_hsl( $kemosite_wordpress_base_primary_colour_hex );
$kemosite_wordpress_base_primary_colour_hsl_array	= explode( ",", $kemosite_wordpress_base_primary_colour_hsl );
$kemosite_wordpress_neutral_white_3_hsl				= kemosite_hex_to_hsl( $kemosite_wordpress_neutral_white_3_hex );
$kemosite_wordpress_neutral_white_45_hsl			= kemosite_hex_to_hsl( $kemosite_wordpress_neutral_white_45_hex );
$kemosite_wordpress_neutral_white_7_hsl				= kemosite_hex_to_hsl( $kemosite_wordpress_neutral_white_7_hex );
$kemosite_wordpress_neutral_black_3_hsl				= kemosite_hex_to_hsl( $kemosite_wordpress_neutral_black_3_hex );
$kemosite_wordpress_neutral_black_45_hsl			= kemosite_hex_to_hsl( $kemosite_wordpress_neutral_black_45_hex );
$kemosite_wordpress_neutral_black_7_hsl				= kemosite_hex_to_hsl( $kemosite_wordpress_neutral_black_7_hex );
$kemosite_wordpress_neutral_white_3_hsl_array		= explode( ",", $kemosite_wordpress_neutral_white_3_hsl );
$kemosite_wordpress_neutral_white_45_hsl_array		= explode( ",", $kemosite_wordpress_neutral_white_45_hsl );
$kemosite_wordpress_neutral_white_7_hsl_array		= explode( ",", $kemosite_wordpress_neutral_white_7_hsl );
$kemosite_wordpress_neutral_black_3_hsl_array		= explode( ",", $kemosite_wordpress_neutral_black_3_hsl );
$kemosite_wordpress_neutral_black_45_hsl_array		= explode( ",", $kemosite_wordpress_neutral_black_45_hsl );
$kemosite_wordpress_neutral_black_7_hsl_array		= explode( ",", $kemosite_wordpress_neutral_black_7_hsl );

?>

<hr>

<h2>Base Colour</h2>
<table>
	<tbody>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_primary_colour_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_primary_colour_hex; ?></td>
		</tr>
	</tbody>
</table>

<hr>

<h2>Greyscale</h2>
<p>Greyscale variation is based on the perceived variations of the base colour option.</p>

<?php 

$kemosite_wordpress_base_primary_grey_lum = kemosite_rgb_to_lum( $kemosite_wordpress_base_primary_colour_rgb );
$kemosite_wordpress_base_primary_grey_chroma = kemosite_rgb_to_chroma( kemosite_hex_to_rgb( $kemosite_wordpress_base_primary_colour_hex ) );
$kemosite_wordpress_base_primary_grey_value = kemosite_rgb_to_value( kemosite_hex_to_rgb( $kemosite_wordpress_base_primary_colour_hex ) );
$kemosite_wordpress_base_primary_grey_lum_hex = kemosite_lum_to_hex( $kemosite_wordpress_base_primary_grey_lum );
$kemosite_wordpress_base_primary_grey_chroma_hex = kemosite_lum_to_hex( $kemosite_wordpress_base_primary_grey_chroma );
$kemosite_wordpress_base_primary_grey_value_hex = kemosite_lum_to_hex( $kemosite_wordpress_base_primary_grey_value );

?>

<ul>
	<li>Chroma: Based on the saturation of the colour.</li>
	<li>Luminance: Based on the perceived brightness of the colour.</li>
	<li>Value: Based on the relative lightness or darkness of the colour.</li>
</ul>

<table>
	<thead>
		<tr>
			<th>Chroma</th>
			<th>Luminance</th>
			<th>Value</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_primary_grey_chroma_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_base_primary_grey_lum_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_base_primary_grey_value_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo round( $kemosite_wordpress_base_primary_grey_chroma * 100); ?>%</td>
			<td><?php echo round( $kemosite_wordpress_base_primary_grey_lum * 100); ?>%</td>
			<td><?php echo round( $kemosite_wordpress_base_primary_grey_value * 100); ?>%</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_primary_grey_chroma_hex; ?></td>
			<td><?php echo $kemosite_wordpress_base_primary_grey_lum_hex; ?></td>
			<td><?php echo $kemosite_wordpress_base_primary_grey_value_hex; ?></td>
		</tr>
	</tbody>
</table>

<hr>

<h2>Monochromatic</h2>
<p>Monochromatic color schemes focus on a single hue, using variations of saturation and lightness.</p>

<?php

// Colour

// White Background

// 3:1
$kemosite_wordpress_monochromatic_colour_white_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_base_primary_colour_hsl_array, // hsl array of base colour
														$kemosite_wordpress_base_primary_colour_white_contrast, // colour contrast on white background
														3, // target contrast
														$kemosite_wordpress_base_white_lum // white luminance
													) );
$kemosite_wordpress_monochromatic_colour_white_3_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_monochromatic_colour_white_3_hsl );

// 4.5:1
$kemosite_wordpress_monochromatic_colour_white_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_base_primary_colour_hsl_array, // hsl array of base colour
														$kemosite_wordpress_base_primary_colour_white_contrast, // colour contrast on white background
														4.5, // target contrast
														$kemosite_wordpress_base_white_lum // white luminance
													) );
$kemosite_wordpress_monochromatic_colour_white_45_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_monochromatic_colour_white_45_hsl );

// 7:1
$kemosite_wordpress_monochromatic_colour_white_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_base_primary_colour_hsl_array, // hsl array of base colour
														$kemosite_wordpress_base_primary_colour_white_contrast, // colour contrast on white background
														7, // target contrast
														$kemosite_wordpress_base_white_lum // white luminance
													) );
$kemosite_wordpress_monochromatic_colour_white_7_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_monochromatic_colour_white_7_hsl );

// Black Background

// 3:1
$kemosite_wordpress_monochromatic_colour_black_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_base_primary_colour_hsl_array, // hsl array of base colour
														$kemosite_wordpress_base_primary_colour_black_contrast, // colour contrast on black background
														3, // target contrast
														$kemosite_wordpress_base_black_lum // black luminance
													) );
$kemosite_wordpress_monochromatic_colour_black_3_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_monochromatic_colour_black_3_hsl );

// 4.5:1
$kemosite_wordpress_monochromatic_colour_black_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_base_primary_colour_hsl_array, // hsl array of base colour
														$kemosite_wordpress_base_primary_colour_black_contrast, // colour contrast on black background
														4.5, // target contrast
														$kemosite_wordpress_base_black_lum // black luminance
													) );
$kemosite_wordpress_monochromatic_colour_black_45_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_monochromatic_colour_black_45_hsl );

// 7:1
$kemosite_wordpress_monochromatic_colour_black_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_base_primary_colour_hsl_array, // hsl array of base colour
														$kemosite_wordpress_base_primary_colour_black_contrast, // colour contrast on black background
														7, // target contrast
														$kemosite_wordpress_base_black_lum // black luminance
													) );
$kemosite_wordpress_monochromatic_colour_black_7_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_monochromatic_colour_black_7_hsl );

// Neutral

// White Background

// 3:1
$kemosite_wordpress_monochromatic_neutral_white_3_hsl_saturation	= 	kemosite_calc_neutral_sat( $kemosite_wordpress_base_primary_colour_hsl_array, $kemosite_wordpress_neutral_white_3_hsl_array );
$kemosite_wordpress_monochromatic_neutral_white_3_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_3_hsl_array[2];
$kemosite_wordpress_monochromatic_neutral_white_3_hsl_array			=	array( $kemosite_wordpress_base_primary_colour_hsl_array[0],
																			$kemosite_wordpress_monochromatic_neutral_white_3_hsl_saturation,
																			$kemosite_wordpress_monochromatic_neutral_white_3_hsl_lightness,
																		);
$kemosite_wordpress_monochromatic_neutral_white_3_hsl				=	implode( ",", $kemosite_wordpress_monochromatic_neutral_white_3_hsl_array );
$kemosite_wordpress_monochromatic_neutral_white_3_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_monochromatic_neutral_white_3_hsl );

// 4.5:1
$kemosite_wordpress_monochromatic_neutral_white_45_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_base_primary_colour_hsl_array, $kemosite_wordpress_neutral_white_45_hsl_array );
$kemosite_wordpress_monochromatic_neutral_white_45_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_45_hsl_array[2];
$kemosite_wordpress_monochromatic_neutral_white_45_hsl_array			=	array( $kemosite_wordpress_base_primary_colour_hsl_array[0],
																			$kemosite_wordpress_monochromatic_neutral_white_45_hsl_saturation,
																			$kemosite_wordpress_monochromatic_neutral_white_45_hsl_lightness,
																		);
$kemosite_wordpress_monochromatic_neutral_white_45_hsl				=	implode( ",", $kemosite_wordpress_monochromatic_neutral_white_45_hsl_array );
$kemosite_wordpress_monochromatic_neutral_white_45_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_monochromatic_neutral_white_45_hsl );

// 3:1
$kemosite_wordpress_monochromatic_neutral_white_7_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_base_primary_colour_hsl_array, $kemosite_wordpress_neutral_white_7_hsl_array );
$kemosite_wordpress_monochromatic_neutral_white_7_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_7_hsl_array[2];
$kemosite_wordpress_monochromatic_neutral_white_7_hsl_array			=	array( $kemosite_wordpress_base_primary_colour_hsl_array[0],
																			$kemosite_wordpress_monochromatic_neutral_white_7_hsl_saturation,
																			$kemosite_wordpress_monochromatic_neutral_white_7_hsl_lightness,
																		);
$kemosite_wordpress_monochromatic_neutral_white_7_hsl				=	implode( ",", $kemosite_wordpress_monochromatic_neutral_white_7_hsl_array );
$kemosite_wordpress_monochromatic_neutral_white_7_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_monochromatic_neutral_white_7_hsl );

// Black Background

// 3:1
$kemosite_wordpress_monochromatic_neutral_black_3_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_base_primary_colour_hsl_array, $kemosite_wordpress_neutral_black_3_hsl_array );
$kemosite_wordpress_monochromatic_neutral_black_3_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_3_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_monochromatic_neutral_black_3_hsl_saturation *
																			($kemosite_wordpress_neutral_black_3_hsl_array[2] / 100)
																		);

$kemosite_wordpress_monochromatic_neutral_black_3_hsl_array			=	array( $kemosite_wordpress_base_primary_colour_hsl_array[0],
																			$kemosite_wordpress_monochromatic_neutral_black_3_hsl_saturation,
																			$kemosite_wordpress_monochromatic_neutral_black_3_hsl_lightness,
																		);
$kemosite_wordpress_monochromatic_neutral_black_3_hsl				=	implode( ",", $kemosite_wordpress_monochromatic_neutral_black_3_hsl_array );
$kemosite_wordpress_monochromatic_neutral_black_3_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_monochromatic_neutral_black_3_hsl );

// 4.5:1
$kemosite_wordpress_monochromatic_neutral_black_45_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_base_primary_colour_hsl_array, $kemosite_wordpress_neutral_black_45_hsl_array );
$kemosite_wordpress_monochromatic_neutral_black_45_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_45_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_monochromatic_neutral_black_45_hsl_saturation *
																			($kemosite_wordpress_neutral_black_45_hsl_array[2] / 100)
																		);
$kemosite_wordpress_monochromatic_neutral_black_45_hsl_array		=	array( $kemosite_wordpress_base_primary_colour_hsl_array[0],
																			$kemosite_wordpress_monochromatic_neutral_black_45_hsl_saturation,
																			$kemosite_wordpress_monochromatic_neutral_black_45_hsl_lightness,
																		);
$kemosite_wordpress_monochromatic_neutral_black_45_hsl				=	implode( ",", $kemosite_wordpress_monochromatic_neutral_black_45_hsl_array );
$kemosite_wordpress_monochromatic_neutral_black_45_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_monochromatic_neutral_black_45_hsl );

// 3:1
$kemosite_wordpress_monochromatic_neutral_black_7_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_base_primary_colour_hsl_array, $kemosite_wordpress_neutral_black_7_hsl_array );
$kemosite_wordpress_monochromatic_neutral_black_7_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_7_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_monochromatic_neutral_black_7_hsl_saturation *
																			($kemosite_wordpress_neutral_black_7_hsl_array[2] / 100)
																		);
$kemosite_wordpress_monochromatic_neutral_black_7_hsl_array			=	array( $kemosite_wordpress_base_primary_colour_hsl_array[0],
																			$kemosite_wordpress_monochromatic_neutral_black_7_hsl_saturation,
																			$kemosite_wordpress_monochromatic_neutral_black_7_hsl_lightness,
																		);
$kemosite_wordpress_monochromatic_neutral_black_7_hsl				=	implode( ",", $kemosite_wordpress_monochromatic_neutral_black_7_hsl_array );
$kemosite_wordpress_monochromatic_neutral_black_7_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_monochromatic_neutral_black_7_hsl );

?>

<table>
	<thead>
		<tr>
			<th>Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_white_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_monochromatic_colour_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_monochromatic_colour_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_monochromatic_colour_white_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_monochromatic_neutral_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_monochromatic_neutral_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_monochromatic_neutral_white_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_white_hex; ?></td>
			<td><?php echo $kemosite_wordpress_monochromatic_colour_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_monochromatic_colour_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_monochromatic_colour_white_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_monochromatic_neutral_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_monochromatic_neutral_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_monochromatic_neutral_white_7_hex; ?></td>
		</tr>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_black_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_monochromatic_colour_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_monochromatic_colour_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_monochromatic_colour_black_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_monochromatic_neutral_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_monochromatic_neutral_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_monochromatic_neutral_black_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_black_hex; ?></td>
			<td><?php echo $kemosite_wordpress_monochromatic_colour_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_monochromatic_colour_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_monochromatic_colour_black_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_monochromatic_neutral_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_monochromatic_neutral_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_monochromatic_neutral_black_7_hex; ?></td>
		</tr>
	</tbody>
</table>

<hr>

<h2>Analogous</h2>
<p>Analogous colors consist of a group of three colors that border each other within the color wheel, separated by +/- 30 degree increments.</p>

<h3>+30 Degrees</h3>

<?php 

// + 30 Degrees
$kemosite_wordpress_analogous_colour_p30_hue 		= 	( 360 + ( $kemosite_wordpress_base_primary_colour_hsl_array[0] + 30 ) ) % 360;
$kemosite_wordpress_analogous_colour_p30_hsl_array	=	array( 
															$kemosite_wordpress_analogous_colour_p30_hue,
															$kemosite_wordpress_base_primary_colour_hsl_array[1],
															$kemosite_wordpress_base_primary_colour_hsl_array[2]
														);
$kemosite_wordpress_analogous_colour_p30_hsl		=	implode( ",", $kemosite_wordpress_analogous_colour_p30_hsl_array );
$kemosite_wordpress_analogous_colour_p30_rgb		=	kemosite_hsl_to_rgb( $kemosite_wordpress_analogous_colour_p30_hsl );
$kemosite_wordpress_analogous_colour_p30_rgb_array	=	explode( ",", $kemosite_wordpress_analogous_colour_p30_rgb );
$kemosite_wordpress_analogous_colour_p30_lum		= 	kemosite_calc_lum( 
															$kemosite_wordpress_analogous_colour_p30_rgb_array[0],
															$kemosite_wordpress_analogous_colour_p30_rgb_array[1],
															$kemosite_wordpress_analogous_colour_p30_rgb_array[2]
														);
$kemosite_wordpress_analogous_colour_p30_white_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_analogous_colour_p30_lum, $kemosite_wordpress_base_white_lum);
$kemosite_wordpress_analogous_colour_p30_black_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_analogous_colour_p30_lum, $kemosite_wordpress_base_black_lum);

// Colours

// White Background

// 3:1
$kemosite_wordpress_analogous_colour_p30_white_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_analogous_colour_p30_hsl_array, // hsl array of base colour
														$kemosite_wordpress_analogous_colour_p30_white_contrast, // colour contrast on white background
														3, // target contrast
														$kemosite_wordpress_base_white_lum // white luminance
													) );
$kemosite_wordpress_analogous_colour_p30_white_3_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_analogous_colour_p30_white_3_hsl );

// 4.5:1
$kemosite_wordpress_analogous_colour_p30_white_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_analogous_colour_p30_hsl_array, // hsl array of base colour
														$kemosite_wordpress_analogous_colour_p30_white_contrast, // colour contrast on white background
														4.5, // target contrast
														$kemosite_wordpress_base_white_lum // white luminance
													) );
$kemosite_wordpress_analogous_colour_p30_white_45_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_analogous_colour_p30_white_45_hsl );

// 7:1
$kemosite_wordpress_analogous_colour_p30_white_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_analogous_colour_p30_hsl_array, // hsl array of base colour
														$kemosite_wordpress_analogous_colour_p30_white_contrast, // colour contrast on white background
														7, // target contrast
														$kemosite_wordpress_base_white_lum // white luminance
													) );
$kemosite_wordpress_analogous_colour_p30_white_7_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_analogous_colour_p30_white_7_hsl );

// Black Background

// 3:1
$kemosite_wordpress_analogous_colour_p30_black_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_analogous_colour_p30_hsl_array, // hsl array of base colour
														$kemosite_wordpress_analogous_colour_p30_black_contrast, // colour contrast on white background
														3, // target contrast
														$kemosite_wordpress_base_black_lum // white luminance
													) );
$kemosite_wordpress_analogous_colour_p30_black_3_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_analogous_colour_p30_black_3_hsl );

// 4.5:1
$kemosite_wordpress_analogous_colour_p30_black_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_analogous_colour_p30_hsl_array, // hsl array of base colour
														$kemosite_wordpress_analogous_colour_p30_black_contrast, // colour contrast on white background
														4.5, // target contrast
														$kemosite_wordpress_base_black_lum // white luminance
													) );
$kemosite_wordpress_analogous_colour_p30_black_45_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_analogous_colour_p30_black_45_hsl );

// 7:1
$kemosite_wordpress_analogous_colour_p30_black_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_analogous_colour_p30_hsl_array, // hsl array of base colour
														$kemosite_wordpress_analogous_colour_p30_black_contrast, // colour contrast on white background
														7, // target contrast
														$kemosite_wordpress_base_black_lum // white luminance
													) );
$kemosite_wordpress_analogous_colour_p30_black_7_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_analogous_colour_p30_black_7_hsl );

// Neutrals

// White Background

// 3:1
$kemosite_wordpress_analogous_neutral_p30_white_3_hsl_saturation	= 	kemosite_calc_neutral_sat( $kemosite_wordpress_analogous_colour_p30_hsl_array, $kemosite_wordpress_neutral_white_3_hsl_array );
$kemosite_wordpress_analogous_neutral_p30_white_3_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_3_hsl_array[2];
$kemosite_wordpress_analogous_neutral_p30_white_3_hsl_array			=	array( $kemosite_wordpress_analogous_colour_p30_hsl_array[0],
																			$kemosite_wordpress_analogous_neutral_p30_white_3_hsl_saturation,
																			$kemosite_wordpress_analogous_neutral_p30_white_3_hsl_lightness,
																		);
$kemosite_wordpress_analogous_neutral_p30_white_3_hsl				=	implode( ",", $kemosite_wordpress_analogous_neutral_p30_white_3_hsl_array );
$kemosite_wordpress_analogous_neutral_p30_white_3_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_neutral_p30_white_3_hsl );

// 4.5:1
$kemosite_wordpress_analogous_neutral_p30_white_45_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_analogous_colour_p30_hsl_array, $kemosite_wordpress_neutral_white_45_hsl_array );
$kemosite_wordpress_analogous_neutral_p30_white_45_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_45_hsl_array[2];
$kemosite_wordpress_analogous_neutral_p30_white_45_hsl_array			=	array( $kemosite_wordpress_analogous_colour_p30_hsl_array[0],
																			$kemosite_wordpress_analogous_neutral_p30_white_45_hsl_saturation,
																			$kemosite_wordpress_analogous_neutral_p30_white_45_hsl_lightness,
																		);
$kemosite_wordpress_analogous_neutral_p30_white_45_hsl				=	implode( ",", $kemosite_wordpress_analogous_neutral_p30_white_45_hsl_array );
$kemosite_wordpress_analogous_neutral_p30_white_45_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_neutral_p30_white_45_hsl );

// 7:1
$kemosite_wordpress_analogous_neutral_p30_white_7_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_analogous_colour_p30_hsl_array, $kemosite_wordpress_neutral_white_7_hsl_array );
$kemosite_wordpress_analogous_neutral_p30_white_7_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_7_hsl_array[2];
$kemosite_wordpress_analogous_neutral_p30_white_7_hsl_array			=	array( $kemosite_wordpress_analogous_colour_p30_hsl_array[0],
																			$kemosite_wordpress_analogous_neutral_p30_white_7_hsl_saturation,
																			$kemosite_wordpress_analogous_neutral_p30_white_7_hsl_lightness,
																		);
$kemosite_wordpress_analogous_neutral_p30_white_7_hsl				=	implode( ",", $kemosite_wordpress_analogous_neutral_p30_white_7_hsl_array );
$kemosite_wordpress_analogous_neutral_p30_white_7_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_neutral_p30_white_7_hsl );

// Black Background

// 3:1
$kemosite_wordpress_analogous_neutral_p30_black_3_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_analogous_colour_p30_hsl_array, $kemosite_wordpress_neutral_black_3_hsl_array );
$kemosite_wordpress_analogous_neutral_p30_black_3_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_3_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_analogous_neutral_p30_black_3_hsl_saturation *
																			($kemosite_wordpress_neutral_black_3_hsl_array[2] / 100)
																		);
$kemosite_wordpress_analogous_neutral_p30_black_3_hsl_array			=	array( $kemosite_wordpress_analogous_colour_p30_hsl_array[0],
																			$kemosite_wordpress_analogous_neutral_p30_black_3_hsl_saturation,
																			$kemosite_wordpress_analogous_neutral_p30_black_3_hsl_lightness,
																		);
$kemosite_wordpress_analogous_neutral_p30_black_3_hsl				=	implode( ",", $kemosite_wordpress_analogous_neutral_p30_black_3_hsl_array );
$kemosite_wordpress_analogous_neutral_p30_black_3_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_neutral_p30_black_3_hsl );

// 4.5:1
$kemosite_wordpress_analogous_neutral_p30_black_45_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_analogous_colour_p30_hsl_array, $kemosite_wordpress_neutral_black_45_hsl_array );
$kemosite_wordpress_analogous_neutral_p30_black_45_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_45_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_analogous_neutral_p30_black_45_hsl_saturation *
																			($kemosite_wordpress_neutral_black_45_hsl_array[2] / 100)
																		);
$kemosite_wordpress_analogous_neutral_p30_black_45_hsl_array		=	array( $kemosite_wordpress_analogous_colour_p30_hsl_array[0],
																			$kemosite_wordpress_analogous_neutral_p30_black_45_hsl_saturation,
																			$kemosite_wordpress_analogous_neutral_p30_black_45_hsl_lightness,
																		);
$kemosite_wordpress_analogous_neutral_p30_black_45_hsl				=	implode( ",", $kemosite_wordpress_analogous_neutral_p30_black_45_hsl_array );
$kemosite_wordpress_analogous_neutral_p30_black_45_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_neutral_p30_black_45_hsl );

// 7:1
$kemosite_wordpress_analogous_neutral_p30_black_7_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_analogous_colour_p30_hsl_array, $kemosite_wordpress_neutral_black_7_hsl_array );
$kemosite_wordpress_analogous_neutral_p30_black_7_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_7_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_analogous_neutral_p30_black_7_hsl_saturation *
																			($kemosite_wordpress_neutral_black_7_hsl_array[2] / 100)
																		);
$kemosite_wordpress_analogous_neutral_p30_black_7_hsl_array			=	array( $kemosite_wordpress_analogous_colour_p30_hsl_array[0],
																			$kemosite_wordpress_analogous_neutral_p30_black_7_hsl_saturation,
																			$kemosite_wordpress_analogous_neutral_p30_black_7_hsl_lightness,
																		);
$kemosite_wordpress_analogous_neutral_p30_black_7_hsl				=	implode( ",", $kemosite_wordpress_analogous_neutral_p30_black_7_hsl_array );
$kemosite_wordpress_analogous_neutral_p30_black_7_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_neutral_p30_black_7_hsl );

?>

<table>
	<thead>
		<tr>
			<th>Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_white_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_analogous_colour_p30_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_analogous_colour_p30_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_analogous_colour_p30_white_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_analogous_neutral_p30_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_analogous_neutral_p30_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_analogous_neutral_p30_white_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_white_hex; ?></td>
			<td><?php echo $kemosite_wordpress_analogous_colour_p30_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_analogous_colour_p30_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_analogous_colour_p30_white_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_analogous_neutral_p30_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_analogous_neutral_p30_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_analogous_neutral_p30_white_7_hex; ?></td>
		</tr>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_black_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_analogous_colour_p30_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_analogous_colour_p30_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_analogous_colour_p30_black_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_analogous_neutral_p30_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_analogous_neutral_p30_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_analogous_neutral_p30_black_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_black_hex; ?></td>
			<td><?php echo $kemosite_wordpress_analogous_colour_p30_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_analogous_colour_p30_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_analogous_colour_p30_black_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_analogous_neutral_p30_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_analogous_neutral_p30_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_analogous_neutral_p30_black_7_hex; ?></td>
		</tr>
	</tbody>
</table>

<h3>-30 Degrees</h3>

<?php

// - 30 Degrees

$kemosite_wordpress_analogous_colour_m30_hue 		= 	( 360 + ( $kemosite_wordpress_base_primary_colour_hsl_array[0] - 30 ) ) % 360;
$kemosite_wordpress_analogous_colour_m30_hsl_array	=	array( 
															$kemosite_wordpress_analogous_colour_m30_hue,
															$kemosite_wordpress_base_primary_colour_hsl_array[1],
															$kemosite_wordpress_base_primary_colour_hsl_array[2]
														);
$kemosite_wordpress_analogous_colour_m30_hsl		=	implode( ",", $kemosite_wordpress_analogous_colour_m30_hsl_array );
$kemosite_wordpress_analogous_colour_m30_rgb		=	kemosite_hsl_to_rgb( $kemosite_wordpress_analogous_colour_m30_hsl );
$kemosite_wordpress_analogous_colour_m30_rgb_array	=	explode( ",", $kemosite_wordpress_analogous_colour_m30_rgb );
$kemosite_wordpress_analogous_colour_m30_lum		= 	kemosite_calc_lum( 
															$kemosite_wordpress_analogous_colour_m30_rgb_array[0],
															$kemosite_wordpress_analogous_colour_m30_rgb_array[1],
															$kemosite_wordpress_analogous_colour_m30_rgb_array[2]
														);
$kemosite_wordpress_analogous_colour_m30_white_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_analogous_colour_m30_lum, $kemosite_wordpress_base_white_lum);
$kemosite_wordpress_analogous_colour_m30_black_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_analogous_colour_m30_lum, $kemosite_wordpress_base_black_lum);

// Colours

// White Background

// 3:1
$kemosite_wordpress_analogous_colour_m30_white_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																$kemosite_wordpress_analogous_colour_m30_hsl_array, // hsl array of base colour
																$kemosite_wordpress_analogous_colour_m30_white_contrast, // colour contrast on white background
																3, // target contrast
																$kemosite_wordpress_base_white_lum // white luminance
															) );
$kemosite_wordpress_analogous_colour_m30_white_3_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_colour_m30_white_3_hsl );

// 4.5:1
$kemosite_wordpress_analogous_colour_m30_white_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																$kemosite_wordpress_analogous_colour_m30_hsl_array, // hsl array of base colour
																$kemosite_wordpress_analogous_colour_m30_white_contrast, // colour contrast on white background
																4.5, // target contrast
																$kemosite_wordpress_base_white_lum // white luminance
															) );
$kemosite_wordpress_analogous_colour_m30_white_45_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_colour_m30_white_45_hsl );

// 7:1
$kemosite_wordpress_analogous_colour_m30_white_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																$kemosite_wordpress_analogous_colour_m30_hsl_array, // hsl array of base colour
																$kemosite_wordpress_analogous_colour_m30_white_contrast, // colour contrast on white background
																7, // target contrast
																$kemosite_wordpress_base_white_lum // white luminance
															) );
$kemosite_wordpress_analogous_colour_m30_white_7_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_colour_m30_white_7_hsl );

// Black Background

// 3:1
$kemosite_wordpress_analogous_colour_m30_black_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																$kemosite_wordpress_analogous_colour_m30_hsl_array, // hsl array of base colour
																$kemosite_wordpress_analogous_colour_m30_black_contrast, // colour contrast on white background
																3, // target contrast
																$kemosite_wordpress_base_black_lum // white luminance
															) );
$kemosite_wordpress_analogous_colour_m30_black_3_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_colour_m30_black_3_hsl );

// 4.5:1
$kemosite_wordpress_analogous_colour_m30_black_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																$kemosite_wordpress_analogous_colour_m30_hsl_array, // hsl array of base colour
																$kemosite_wordpress_analogous_colour_m30_black_contrast, // colour contrast on white background
																4.5, // target contrast
																$kemosite_wordpress_base_black_lum // white luminance
															) );
$kemosite_wordpress_analogous_colour_m30_black_45_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_colour_m30_black_45_hsl );

// 7:1
$kemosite_wordpress_analogous_colour_m30_black_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																$kemosite_wordpress_analogous_colour_m30_hsl_array, // hsl array of base colour
																$kemosite_wordpress_analogous_colour_m30_black_contrast, // colour contrast on white background
																7, // target contrast
																$kemosite_wordpress_base_black_lum // white luminance
															) );
$kemosite_wordpress_analogous_colour_m30_black_7_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_colour_m30_black_7_hsl );

// Neutrals

// White Background

// 3:1
$kemosite_wordpress_analogous_neutral_m30_white_3_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_analogous_colour_m30_hsl_array, $kemosite_wordpress_neutral_white_3_hsl_array );
$kemosite_wordpress_analogous_neutral_m30_white_3_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_3_hsl_array[2];
$kemosite_wordpress_analogous_neutral_m30_white_3_hsl_array			=	array( $kemosite_wordpress_analogous_colour_m30_hsl_array[0],
																			$kemosite_wordpress_analogous_neutral_m30_white_3_hsl_saturation,
																			$kemosite_wordpress_analogous_neutral_m30_white_3_hsl_lightness,
																		);
$kemosite_wordpress_analogous_neutral_m30_white_3_hsl				=	implode( ",", $kemosite_wordpress_analogous_neutral_m30_white_3_hsl_array );
$kemosite_wordpress_analogous_neutral_m30_white_3_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_neutral_m30_white_3_hsl );

// 4.5:1
$kemosite_wordpress_analogous_neutral_m30_white_45_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_analogous_colour_m30_hsl_array, $kemosite_wordpress_neutral_white_45_hsl_array );
$kemosite_wordpress_analogous_neutral_m30_white_45_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_45_hsl_array[2];
$kemosite_wordpress_analogous_neutral_m30_white_45_hsl_array			=	array( $kemosite_wordpress_analogous_colour_m30_hsl_array[0],
																			$kemosite_wordpress_analogous_neutral_m30_white_45_hsl_saturation,
																			$kemosite_wordpress_analogous_neutral_m30_white_45_hsl_lightness,
																		);
$kemosite_wordpress_analogous_neutral_m30_white_45_hsl				=	implode( ",", $kemosite_wordpress_analogous_neutral_m30_white_45_hsl_array );
$kemosite_wordpress_analogous_neutral_m30_white_45_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_neutral_m30_white_45_hsl );

// 7:1
$kemosite_wordpress_analogous_neutral_m30_white_7_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_analogous_colour_m30_hsl_array, $kemosite_wordpress_neutral_white_7_hsl_array );
$kemosite_wordpress_analogous_neutral_m30_white_7_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_7_hsl_array[2];
$kemosite_wordpress_analogous_neutral_m30_white_7_hsl_array			=	array( $kemosite_wordpress_analogous_colour_m30_hsl_array[0],
																			$kemosite_wordpress_analogous_neutral_m30_white_7_hsl_saturation,
																			$kemosite_wordpress_analogous_neutral_m30_white_7_hsl_lightness,
																		);
$kemosite_wordpress_analogous_neutral_m30_white_7_hsl				=	implode( ",", $kemosite_wordpress_analogous_neutral_m30_white_7_hsl_array );
$kemosite_wordpress_analogous_neutral_m30_white_7_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_neutral_m30_white_7_hsl );

// Black Background

// 3:1
$kemosite_wordpress_analogous_neutral_m30_black_3_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_analogous_colour_m30_hsl_array, $kemosite_wordpress_neutral_black_3_hsl_array );
$kemosite_wordpress_analogous_neutral_m30_black_3_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_3_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_analogous_neutral_m30_black_3_hsl_saturation *
																			($kemosite_wordpress_neutral_black_3_hsl_array[2] / 100)
																		);
$kemosite_wordpress_analogous_neutral_m30_black_3_hsl_array			=	array( $kemosite_wordpress_analogous_colour_m30_hsl_array[0],
																			$kemosite_wordpress_analogous_neutral_m30_black_3_hsl_saturation,
																			$kemosite_wordpress_analogous_neutral_m30_black_3_hsl_lightness,
																		);
$kemosite_wordpress_analogous_neutral_m30_black_3_hsl				=	implode( ",", $kemosite_wordpress_analogous_neutral_m30_black_3_hsl_array );
$kemosite_wordpress_analogous_neutral_m30_black_3_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_neutral_m30_black_3_hsl );

// 4.5:1
$kemosite_wordpress_analogous_neutral_m30_black_45_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_analogous_colour_m30_hsl_array, $kemosite_wordpress_neutral_black_45_hsl_array );
$kemosite_wordpress_analogous_neutral_m30_black_45_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_45_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_analogous_neutral_m30_black_45_hsl_saturation *
																			($kemosite_wordpress_neutral_black_45_hsl_array[2] / 100)
																		);
$kemosite_wordpress_analogous_neutral_m30_black_45_hsl_array		=	array( $kemosite_wordpress_analogous_colour_m30_hsl_array[0],
																			$kemosite_wordpress_analogous_neutral_m30_black_45_hsl_saturation,
																			$kemosite_wordpress_analogous_neutral_m30_black_45_hsl_lightness,
																		);
$kemosite_wordpress_analogous_neutral_m30_black_45_hsl				=	implode( ",", $kemosite_wordpress_analogous_neutral_m30_black_45_hsl_array );
$kemosite_wordpress_analogous_neutral_m30_black_45_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_neutral_m30_black_45_hsl );

// 7:1
$kemosite_wordpress_analogous_neutral_m30_black_7_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_analogous_colour_m30_hsl_array, $kemosite_wordpress_neutral_black_7_hsl_array );
$kemosite_wordpress_analogous_neutral_m30_black_7_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_7_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_analogous_neutral_m30_black_7_hsl_saturation *
																			($kemosite_wordpress_neutral_black_7_hsl_array[2] / 100)
																		);
$kemosite_wordpress_analogous_neutral_m30_black_7_hsl_array			=	array( $kemosite_wordpress_analogous_colour_m30_hsl_array[0],
																			$kemosite_wordpress_analogous_neutral_m30_black_7_hsl_saturation,
																			$kemosite_wordpress_analogous_neutral_m30_black_7_hsl_lightness,
																		);
$kemosite_wordpress_analogous_neutral_m30_black_7_hsl				=	implode( ",", $kemosite_wordpress_analogous_neutral_m30_black_7_hsl_array );
$kemosite_wordpress_analogous_neutral_m30_black_7_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_neutral_m30_black_7_hsl );

?>

<table>
	<thead>
		<tr>
			<th>Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_white_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_analogous_colour_m30_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_analogous_colour_m30_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_analogous_colour_m30_white_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_analogous_neutral_m30_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_analogous_neutral_m30_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_analogous_neutral_m30_white_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_white_hex; ?></td>
			<td><?php echo $kemosite_wordpress_analogous_colour_m30_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_analogous_colour_m30_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_analogous_colour_m30_white_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_analogous_neutral_m30_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_analogous_neutral_m30_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_analogous_neutral_m30_white_7_hex; ?></td>
		</tr>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_black_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_analogous_colour_m30_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_analogous_colour_m30_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_analogous_colour_m30_black_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_analogous_neutral_m30_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_analogous_neutral_m30_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_analogous_neutral_m30_black_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_black_hex; ?></td>
			<td><?php echo $kemosite_wordpress_analogous_colour_m30_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_analogous_colour_m30_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_analogous_colour_m30_black_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_analogous_neutral_m30_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_analogous_neutral_m30_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_analogous_neutral_m30_black_7_hex; ?></td>
		</tr>
	</tbody>
</table>

<hr>

<a name="complementary" id="complementary"></a>
<h2>Complimentary / Inverse</h2>
<p>Complementary and inverse colors exist on opposite sides of the color wheel. Inverted colours are also the opposite lightness. Inverted colours are ignored due to similar outcomes as complementary, when adjusted for accessible contrast.</p>

<?php

// Colour

$kemosite_wordpress_complementary_colour_hue 		= 	( 360 + ( $kemosite_wordpress_base_primary_colour_hsl_array[0] + 180 ) ) % 360;
$kemosite_wordpress_complementary_colour_hsl_array	=	array( 
															$kemosite_wordpress_complementary_colour_hue,
															$kemosite_wordpress_base_primary_colour_hsl_array[1],
															$kemosite_wordpress_base_primary_colour_hsl_array[2]
														);
$kemosite_wordpress_complementary_colour_hsl		=	implode( ",", $kemosite_wordpress_complementary_colour_hsl_array );
$kemosite_wordpress_complementary_colour_rgb		=	kemosite_hsl_to_rgb( $kemosite_wordpress_complementary_colour_hsl );
$kemosite_wordpress_complementary_colour_rgb_array	=	explode( ",", $kemosite_wordpress_complementary_colour_rgb );
$kemosite_wordpress_complementary_colour_lum		= 	kemosite_calc_lum( 
															$kemosite_wordpress_complementary_colour_rgb_array[0],
															$kemosite_wordpress_complementary_colour_rgb_array[1],
															$kemosite_wordpress_complementary_colour_rgb_array[2]
														);
$kemosite_wordpress_complementary_colour_white_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_complementary_colour_lum, $kemosite_wordpress_base_white_lum);
$kemosite_wordpress_complementary_colour_black_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_complementary_colour_lum, $kemosite_wordpress_base_black_lum);

// White Background

// 3:1
$kemosite_wordpress_complementary_colour_white_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																$kemosite_wordpress_complementary_colour_hsl_array, // hsl array of base colour
																$kemosite_wordpress_complementary_colour_white_contrast, // colour contrast on white background
																3, // target contrast
																$kemosite_wordpress_base_white_lum // white luminance
															) );
$kemosite_wordpress_complementary_colour_white_3_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_complementary_colour_white_3_hsl );

// 4.5:1
$kemosite_wordpress_complementary_colour_white_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																$kemosite_wordpress_complementary_colour_hsl_array, // hsl array of base colour
																$kemosite_wordpress_complementary_colour_white_contrast, // colour contrast on white background
																4.5, // target contrast
																$kemosite_wordpress_base_white_lum // white luminance
															) );
$kemosite_wordpress_complementary_colour_white_45_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_complementary_colour_white_45_hsl );

// 7:1
$kemosite_wordpress_complementary_colour_white_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																$kemosite_wordpress_complementary_colour_hsl_array, // hsl array of base colour
																$kemosite_wordpress_complementary_colour_white_contrast, // colour contrast on white background
																7, // target contrast
																$kemosite_wordpress_base_white_lum // white luminance
															) );
$kemosite_wordpress_complementary_colour_white_7_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_complementary_colour_white_7_hsl );

// Black Background

// 3:1
$kemosite_wordpress_complementary_colour_black_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																$kemosite_wordpress_complementary_colour_hsl_array, // hsl array of base colour
																$kemosite_wordpress_complementary_colour_black_contrast, // colour contrast on black background
																3, // target contrast
																$kemosite_wordpress_base_black_lum // black luminance
															) );
$kemosite_wordpress_complementary_colour_black_3_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_complementary_colour_black_3_hsl );

// 4.5:1
$kemosite_wordpress_complementary_colour_black_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																$kemosite_wordpress_complementary_colour_hsl_array, // hsl array of base colour
																$kemosite_wordpress_complementary_colour_black_contrast, // colour contrast on black background
																4.5, // target contrast
																$kemosite_wordpress_base_black_lum // black luminance
															) );
$kemosite_wordpress_complementary_colour_black_45_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_complementary_colour_black_45_hsl );

// 7:1
$kemosite_wordpress_complementary_colour_black_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																$kemosite_wordpress_complementary_colour_hsl_array, // hsl array of base colour
																$kemosite_wordpress_complementary_colour_black_contrast, // colour contrast on black background
																7, // target contrast
																$kemosite_wordpress_base_black_lum // black luminance
															) );
$kemosite_wordpress_complementary_colour_black_7_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_complementary_colour_black_7_hsl );

// Neutral

// White Background

// 3:1
$kemosite_wordpress_complementary_neutral_white_3_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_complementary_colour_hsl_array, $kemosite_wordpress_neutral_white_3_hsl_array );
$kemosite_wordpress_complementary_neutral_white_3_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_3_hsl_array[2];
$kemosite_wordpress_complementary_neutral_white_3_hsl_array			=	array( $kemosite_wordpress_complementary_colour_hsl_array[0],
																			$kemosite_wordpress_complementary_neutral_white_3_hsl_saturation,
																			$kemosite_wordpress_complementary_neutral_white_3_hsl_lightness,
																		);
$kemosite_wordpress_complementary_neutral_white_3_hsl				=	implode( ",", $kemosite_wordpress_complementary_neutral_white_3_hsl_array );
$kemosite_wordpress_complementary_neutral_white_3_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_complementary_neutral_white_3_hsl );

// 4.5:1
$kemosite_wordpress_complementary_neutral_white_45_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_complementary_colour_hsl_array, $kemosite_wordpress_neutral_white_45_hsl_array );
$kemosite_wordpress_complementary_neutral_white_45_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_45_hsl_array[2];
$kemosite_wordpress_complementary_neutral_white_45_hsl_array			=	array( $kemosite_wordpress_complementary_colour_hsl_array[0],
																			$kemosite_wordpress_complementary_neutral_white_45_hsl_saturation,
																			$kemosite_wordpress_complementary_neutral_white_45_hsl_lightness,
																		);
$kemosite_wordpress_complementary_neutral_white_45_hsl				=	implode( ",", $kemosite_wordpress_complementary_neutral_white_45_hsl_array );
$kemosite_wordpress_complementary_neutral_white_45_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_complementary_neutral_white_45_hsl );

// 7:1
$kemosite_wordpress_complementary_neutral_white_7_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_complementary_colour_hsl_array, $kemosite_wordpress_neutral_white_7_hsl_array );
$kemosite_wordpress_complementary_neutral_white_7_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_7_hsl_array[2];
$kemosite_wordpress_complementary_neutral_white_7_hsl_array			=	array( $kemosite_wordpress_complementary_colour_hsl_array[0],
																			$kemosite_wordpress_complementary_neutral_white_7_hsl_saturation,
																			$kemosite_wordpress_complementary_neutral_white_7_hsl_lightness,
																		);
$kemosite_wordpress_complementary_neutral_white_7_hsl				=	implode( ",", $kemosite_wordpress_complementary_neutral_white_7_hsl_array );
$kemosite_wordpress_complementary_neutral_white_7_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_complementary_neutral_white_7_hsl );

// Black Background

// 3:1
$kemosite_wordpress_complementary_neutral_black_3_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_complementary_colour_hsl_array, $kemosite_wordpress_neutral_black_3_hsl_array );
$kemosite_wordpress_complementary_neutral_black_3_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_3_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_complementary_neutral_black_3_hsl_saturation *
																			($kemosite_wordpress_neutral_black_3_hsl_array[2] / 100)
																		);

$kemosite_wordpress_complementary_neutral_black_3_hsl_array			=	array( $kemosite_wordpress_complementary_colour_hsl_array[0],
																			$kemosite_wordpress_complementary_neutral_black_3_hsl_saturation,
																			$kemosite_wordpress_complementary_neutral_black_3_hsl_lightness,
																		);
$kemosite_wordpress_complementary_neutral_black_3_hsl				=	implode( ",", $kemosite_wordpress_complementary_neutral_black_3_hsl_array );
$kemosite_wordpress_complementary_neutral_black_3_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_complementary_neutral_black_3_hsl );

// 4.5:1
$kemosite_wordpress_complementary_neutral_black_45_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_complementary_colour_hsl_array, $kemosite_wordpress_neutral_black_45_hsl_array );
$kemosite_wordpress_complementary_neutral_black_45_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_45_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_complementary_neutral_black_45_hsl_saturation *
																			($kemosite_wordpress_neutral_black_45_hsl_array[2] / 100)
																		);
$kemosite_wordpress_complementary_neutral_black_45_hsl_array		=	array( $kemosite_wordpress_complementary_colour_hsl_array[0],
																			$kemosite_wordpress_complementary_neutral_black_45_hsl_saturation,
																			$kemosite_wordpress_complementary_neutral_black_45_hsl_lightness,
																		);
$kemosite_wordpress_complementary_neutral_black_45_hsl				=	implode( ",", $kemosite_wordpress_complementary_neutral_black_45_hsl_array );
$kemosite_wordpress_complementary_neutral_black_45_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_complementary_neutral_black_45_hsl );

// 7:1
$kemosite_wordpress_complementary_neutral_black_7_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_complementary_colour_hsl_array, $kemosite_wordpress_neutral_black_7_hsl_array );
$kemosite_wordpress_complementary_neutral_black_7_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_7_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_complementary_neutral_black_7_hsl_saturation *
																			($kemosite_wordpress_neutral_black_7_hsl_array[2] / 100)
																		);
$kemosite_wordpress_complementary_neutral_black_7_hsl_array			=	array( $kemosite_wordpress_complementary_colour_hsl_array[0],
																			$kemosite_wordpress_complementary_neutral_black_7_hsl_saturation,
																			$kemosite_wordpress_complementary_neutral_black_7_hsl_lightness,
																		);
$kemosite_wordpress_complementary_neutral_black_7_hsl				=	implode( ",", $kemosite_wordpress_complementary_neutral_black_7_hsl_array );
$kemosite_wordpress_complementary_neutral_black_7_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_complementary_neutral_black_7_hsl );

?>

<table>
	<thead>
		<tr>
			<th>Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_white_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_colour_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_colour_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_colour_white_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_neutral_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_neutral_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_neutral_white_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_white_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_colour_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_colour_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_colour_white_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_neutral_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_neutral_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_neutral_white_7_hex; ?></td>
		</tr>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_black_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_colour_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_colour_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_colour_black_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_neutral_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_neutral_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_neutral_black_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_black_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_colour_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_colour_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_colour_black_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_neutral_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_neutral_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_neutral_black_7_hex; ?></td>
		</tr>
	</tbody>
</table>

<hr>

<h2>Split-Complementary</h2>
<p>A split-complementary color scheme is one where a primary color is used with the two analogous colors to its complement.</p>

<h3>Complementary, +30 Degrees</h3>

<?php 

// Complementary + 30 Degrees
$kemosite_wordpress_split_complementary_colour_p30_hue 				= 	( 360 + ( $kemosite_wordpress_base_primary_colour_hsl_array[0] + (180 + 30 ) ) ) % 360;
$kemosite_wordpress_split_complementary_colour_p30_hsl_array		=	array( 
																		$kemosite_wordpress_split_complementary_colour_p30_hue,
																		$kemosite_wordpress_base_primary_colour_hsl_array[1],
																		$kemosite_wordpress_base_primary_colour_hsl_array[2]
																	);
$kemosite_wordpress_split_complementary_colour_p30_hsl				=	implode( ",", $kemosite_wordpress_split_complementary_colour_p30_hsl_array );
$kemosite_wordpress_split_complementary_colour_p30_rgb				=	kemosite_hsl_to_rgb( $kemosite_wordpress_split_complementary_colour_p30_hsl );
$kemosite_wordpress_split_complementary_colour_p30_rgb_array		=	explode( ",", $kemosite_wordpress_split_complementary_colour_p30_rgb );
$kemosite_wordpress_split_complementary_colour_p30_lum				= 	kemosite_calc_lum( 
																			$kemosite_wordpress_split_complementary_colour_p30_rgb_array[0],
																			$kemosite_wordpress_split_complementary_colour_p30_rgb_array[1],
																			$kemosite_wordpress_split_complementary_colour_p30_rgb_array[2]
																		);
$kemosite_wordpress_split_complementary_colour_p30_white_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_split_complementary_colour_p30_lum, $kemosite_wordpress_base_white_lum);
$kemosite_wordpress_split_complementary_colour_p30_black_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_split_complementary_colour_p30_lum, $kemosite_wordpress_base_black_lum);

// Colours

// White Background

// 3:1
$kemosite_wordpress_split_complementary_colour_p30_white_3_hsl		=	( kemosite_adjust_hsl_l_contrast( 
																			$kemosite_wordpress_split_complementary_colour_p30_hsl_array, // hsl array of base colour
																			$kemosite_wordpress_split_complementary_colour_p30_white_contrast, // colour contrast on white background
																			3, // target contrast
																			$kemosite_wordpress_base_white_lum // white luminance
																		) );
$kemosite_wordpress_split_complementary_colour_p30_white_3_hex 		= kemosite_hsl_to_hex( $kemosite_wordpress_split_complementary_colour_p30_white_3_hsl );

// 4.5:1
$kemosite_wordpress_split_complementary_colour_p30_white_45_hsl		=	( kemosite_adjust_hsl_l_contrast( 
																			$kemosite_wordpress_split_complementary_colour_p30_hsl_array, // hsl array of base colour
																			$kemosite_wordpress_split_complementary_colour_p30_white_contrast, // colour contrast on white background
																			4.5, // target contrast
																			$kemosite_wordpress_base_white_lum // white luminance
																		) );
$kemosite_wordpress_split_complementary_colour_p30_white_45_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_split_complementary_colour_p30_white_45_hsl );

// 7:1
$kemosite_wordpress_split_complementary_colour_p30_white_7_hsl		=	( kemosite_adjust_hsl_l_contrast( 
																			$kemosite_wordpress_split_complementary_colour_p30_hsl_array, // hsl array of base colour
																			$kemosite_wordpress_split_complementary_colour_p30_white_contrast, // colour contrast on white background
																			7, // target contrast
																			$kemosite_wordpress_base_white_lum // white luminance
																		) );
$kemosite_wordpress_split_complementary_colour_p30_white_7_hex 		= 	kemosite_hsl_to_hex( $kemosite_wordpress_split_complementary_colour_p30_white_7_hsl );

// Black Background

// 3:1
$kemosite_wordpress_split_complementary_colour_p30_black_3_hsl		=	( kemosite_adjust_hsl_l_contrast( 
																			$kemosite_wordpress_split_complementary_colour_p30_hsl_array, // hsl array of base colour
																			$kemosite_wordpress_split_complementary_colour_p30_black_contrast, // colour contrast on white background
																			3, // target contrast
																			$kemosite_wordpress_base_black_lum // white luminance
																		) );
$kemosite_wordpress_split_complementary_colour_p30_black_3_hex 		= 	kemosite_hsl_to_hex( $kemosite_wordpress_split_complementary_colour_p30_black_3_hsl );

// 4.5:1
$kemosite_wordpress_split_complementary_colour_p30_black_45_hsl		=	( kemosite_adjust_hsl_l_contrast( 
																			$kemosite_wordpress_split_complementary_colour_p30_hsl_array, // hsl array of base colour
																			$kemosite_wordpress_split_complementary_colour_p30_black_contrast, // colour contrast on white background
																			4.5, // target contrast
																			$kemosite_wordpress_base_black_lum // white luminance
																		) );
$kemosite_wordpress_split_complementary_colour_p30_black_45_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_split_complementary_colour_p30_black_45_hsl );

// 7:1
$kemosite_wordpress_split_complementary_colour_p30_black_7_hsl		=	( kemosite_adjust_hsl_l_contrast( 
																			$kemosite_wordpress_split_complementary_colour_p30_hsl_array, // hsl array of base colour
																			$kemosite_wordpress_split_complementary_colour_p30_black_contrast, // colour contrast on white background
																			7, // target contrast
																			$kemosite_wordpress_base_black_lum // white luminance
																		) );
$kemosite_wordpress_split_complementary_colour_p30_black_7_hex 		= 	kemosite_hsl_to_hex( $kemosite_wordpress_split_complementary_colour_p30_black_7_hsl );

// Neutrals

// White Background

// 3:1
$kemosite_wordpress_split_complementary_neutral_p30_white_3_hsl_saturation	= 	kemosite_calc_neutral_sat( 
																					$kemosite_wordpress_split_complementary_colour_p30_hsl_array,
																					$kemosite_wordpress_neutral_white_3_hsl_array
																				);
$kemosite_wordpress_split_complementary_neutral_p30_white_3_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_3_hsl_array[2];
$kemosite_wordpress_split_complementary_neutral_p30_white_3_hsl_array		=	array( 
																					$kemosite_wordpress_split_complementary_colour_p30_hsl_array[0],
																					$kemosite_wordpress_split_complementary_neutral_p30_white_3_hsl_saturation,
																					$kemosite_wordpress_split_complementary_neutral_p30_white_3_hsl_lightness,
																				);
$kemosite_wordpress_split_complementary_neutral_p30_white_3_hsl				=	implode( ",", $kemosite_wordpress_split_complementary_neutral_p30_white_3_hsl_array );
$kemosite_wordpress_split_complementary_neutral_p30_white_3_hex 			= 	kemosite_hsl_to_hex( $kemosite_wordpress_split_complementary_neutral_p30_white_3_hsl );

// 4.5:1
$kemosite_wordpress_split_complementary_neutral_p30_white_45_hsl_saturation	=	kemosite_calc_neutral_sat( 
																					$kemosite_wordpress_split_complementary_colour_p30_hsl_array,
																					$kemosite_wordpress_neutral_white_45_hsl_array
																				);
$kemosite_wordpress_split_complementary_neutral_p30_white_45_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_45_hsl_array[2];
$kemosite_wordpress_split_complementary_neutral_p30_white_45_hsl_array		=	array( 
																					$kemosite_wordpress_split_complementary_colour_p30_hsl_array[0],
																					$kemosite_wordpress_split_complementary_neutral_p30_white_45_hsl_saturation,
																					$kemosite_wordpress_split_complementary_neutral_p30_white_45_hsl_lightness,
																				);
$kemosite_wordpress_split_complementary_neutral_p30_white_45_hsl			=	implode( ",", $kemosite_wordpress_split_complementary_neutral_p30_white_45_hsl_array );
$kemosite_wordpress_split_complementary_neutral_p30_white_45_hex 			= 	kemosite_hsl_to_hex( $kemosite_wordpress_split_complementary_neutral_p30_white_45_hsl );

// 7:1
$kemosite_wordpress_split_complementary_neutral_p30_white_7_hsl_saturation	=	kemosite_calc_neutral_sat( 
																					$kemosite_wordpress_split_complementary_colour_p30_hsl_array,
																					$kemosite_wordpress_neutral_white_7_hsl_array
																				);
$kemosite_wordpress_split_complementary_neutral_p30_white_7_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_7_hsl_array[2];
$kemosite_wordpress_split_complementary_neutral_p30_white_7_hsl_array		=	array( 
																					$kemosite_wordpress_split_complementary_colour_p30_hsl_array[0],
																					$kemosite_wordpress_split_complementary_neutral_p30_white_7_hsl_saturation,
																					$kemosite_wordpress_split_complementary_neutral_p30_white_7_hsl_lightness,
																				);
$kemosite_wordpress_split_complementary_neutral_p30_white_7_hsl				=	implode( ",", $kemosite_wordpress_split_complementary_neutral_p30_white_7_hsl_array );
$kemosite_wordpress_split_complementary_neutral_p30_white_7_hex 			= 	kemosite_hsl_to_hex( $kemosite_wordpress_split_complementary_neutral_p30_white_7_hsl );

// Black Background

// 3:1
$kemosite_wordpress_split_complementary_neutral_p30_black_3_hsl_saturation	=	kemosite_calc_neutral_sat( 
																					$kemosite_wordpress_split_complementary_colour_p30_hsl_array,
																					$kemosite_wordpress_neutral_black_3_hsl_array
																				);
$kemosite_wordpress_split_complementary_neutral_p30_black_3_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_3_hsl_array[2] + 
																				round(	
																					$kemosite_wordpress_split_complementary_neutral_p30_black_3_hsl_saturation *
																					($kemosite_wordpress_neutral_black_3_hsl_array[2] / 100)
																				);
$kemosite_wordpress_split_complementary_neutral_p30_black_3_hsl_array		=	array( $kemosite_wordpress_split_complementary_colour_p30_hsl_array[0],
																					$kemosite_wordpress_split_complementary_neutral_p30_black_3_hsl_saturation,
																					$kemosite_wordpress_split_complementary_neutral_p30_black_3_hsl_lightness,
																				);
$kemosite_wordpress_split_complementary_neutral_p30_black_3_hsl				=	implode( ",", $kemosite_wordpress_split_complementary_neutral_p30_black_3_hsl_array );
$kemosite_wordpress_split_complementary_neutral_p30_black_3_hex 			= 	kemosite_hsl_to_hex( $kemosite_wordpress_split_complementary_neutral_p30_black_3_hsl );

// 4.5:1
$kemosite_wordpress_split_complementary_neutral_p30_black_45_hsl_saturation	=	kemosite_calc_neutral_sat( 
																					$kemosite_wordpress_split_complementary_colour_p30_hsl_array,
																					$kemosite_wordpress_neutral_black_45_hsl_array
																				);
$kemosite_wordpress_split_complementary_neutral_p30_black_45_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_45_hsl_array[2] + 
																				round(	
																					$kemosite_wordpress_split_complementary_neutral_p30_black_45_hsl_saturation *
																					($kemosite_wordpress_neutral_black_45_hsl_array[2] / 100)
																				);
$kemosite_wordpress_split_complementary_neutral_p30_black_45_hsl_array		=	array( 
																					$kemosite_wordpress_split_complementary_colour_p30_hsl_array[0],
																					$kemosite_wordpress_split_complementary_neutral_p30_black_45_hsl_saturation,
																					$kemosite_wordpress_split_complementary_neutral_p30_black_45_hsl_lightness,
																				);
$kemosite_wordpress_split_complementary_neutral_p30_black_45_hsl			=	implode( ",", $kemosite_wordpress_split_complementary_neutral_p30_black_45_hsl_array );
$kemosite_wordpress_split_complementary_neutral_p30_black_45_hex 			= 	kemosite_hsl_to_hex( $kemosite_wordpress_split_complementary_neutral_p30_black_45_hsl );

// 7:1
$kemosite_wordpress_split_complementary_neutral_p30_black_7_hsl_saturation	=	kemosite_calc_neutral_sat( 
																					$kemosite_wordpress_split_complementary_colour_p30_hsl_array,
																					$kemosite_wordpress_neutral_black_7_hsl_array
																				);
$kemosite_wordpress_split_complementary_neutral_p30_black_7_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_7_hsl_array[2] + 
																				round(	
																					$kemosite_wordpress_split_complementary_neutral_p30_black_7_hsl_saturation *
																					($kemosite_wordpress_neutral_black_7_hsl_array[2] / 100)
																				);
$kemosite_wordpress_split_complementary_neutral_p30_black_7_hsl_array		=	array( 
																					$kemosite_wordpress_split_complementary_colour_p30_hsl_array[0],
																					$kemosite_wordpress_split_complementary_neutral_p30_black_7_hsl_saturation,
																					$kemosite_wordpress_split_complementary_neutral_p30_black_7_hsl_lightness,
																				);
$kemosite_wordpress_split_complementary_neutral_p30_black_7_hsl				=	implode( ",", $kemosite_wordpress_split_complementary_neutral_p30_black_7_hsl_array );
$kemosite_wordpress_split_complementary_neutral_p30_black_7_hex 			= 	kemosite_hsl_to_hex( $kemosite_wordpress_split_complementary_neutral_p30_black_7_hsl );

?>

<table>
	<thead>
		<tr>
			<th>Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_white_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_split_complementary_colour_p30_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_split_complementary_colour_p30_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_split_complementary_colour_p30_white_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_split_complementary_neutral_p30_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_split_complementary_neutral_p30_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_split_complementary_neutral_p30_white_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_white_hex; ?></td>
			<td><?php echo $kemosite_wordpress_split_complementary_colour_p30_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_split_complementary_colour_p30_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_split_complementary_colour_p30_white_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_split_complementary_neutral_p30_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_split_complementary_neutral_p30_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_split_complementary_neutral_p30_white_7_hex; ?></td>
		</tr>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_black_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_split_complementary_colour_p30_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_split_complementary_colour_p30_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_split_complementary_colour_p30_black_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_split_complementary_neutral_p30_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_split_complementary_neutral_p30_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_split_complementary_neutral_p30_black_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_black_hex; ?></td>
			<td><?php echo $kemosite_wordpress_split_complementary_colour_p30_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_split_complementary_colour_p30_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_split_complementary_colour_p30_black_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_split_complementary_neutral_p30_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_split_complementary_neutral_p30_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_split_complementary_neutral_p30_black_7_hex; ?></td>
		</tr>
	</tbody>
</table>

<h3>Complementary, -30 Degrees</h3>

<?php 

// Complementary - 30 Degrees
$kemosite_wordpress_split_complementary_colour_m30_hue 				= 	( 360 + ( $kemosite_wordpress_base_primary_colour_hsl_array[0] + (180 - 30 ) ) ) % 360;
$kemosite_wordpress_split_complementary_colour_m30_hsl_array		=	array( 
																		$kemosite_wordpress_split_complementary_colour_m30_hue,
																		$kemosite_wordpress_base_primary_colour_hsl_array[1],
																		$kemosite_wordpress_base_primary_colour_hsl_array[2]
																	);
$kemosite_wordpress_split_complementary_colour_m30_hsl				=	implode( ",", $kemosite_wordpress_split_complementary_colour_m30_hsl_array );
$kemosite_wordpress_split_complementary_colour_m30_rgb				=	kemosite_hsl_to_rgb( $kemosite_wordpress_split_complementary_colour_m30_hsl );
$kemosite_wordpress_split_complementary_colour_m30_rgb_array		=	explode( ",", $kemosite_wordpress_split_complementary_colour_m30_rgb );
$kemosite_wordpress_split_complementary_colour_m30_lum				= 	kemosite_calc_lum( 
																			$kemosite_wordpress_split_complementary_colour_m30_rgb_array[0],
																			$kemosite_wordpress_split_complementary_colour_m30_rgb_array[1],
																			$kemosite_wordpress_split_complementary_colour_m30_rgb_array[2]
																		);
$kemosite_wordpress_split_complementary_colour_m30_white_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_split_complementary_colour_m30_lum, $kemosite_wordpress_base_white_lum);
$kemosite_wordpress_split_complementary_colour_m30_black_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_split_complementary_colour_m30_lum, $kemosite_wordpress_base_black_lum);

// Colours

// White Background

// 3:1
$kemosite_wordpress_split_complementary_colour_m30_white_3_hsl		=	( kemosite_adjust_hsl_l_contrast( 
																			$kemosite_wordpress_split_complementary_colour_m30_hsl_array, // hsl array of base colour
																			$kemosite_wordpress_split_complementary_colour_m30_white_contrast, // colour contrast on white background
																			3, // target contrast
																			$kemosite_wordpress_base_white_lum // white luminance
																		) );
$kemosite_wordpress_split_complementary_colour_m30_white_3_hex 		= kemosite_hsl_to_hex( $kemosite_wordpress_split_complementary_colour_m30_white_3_hsl );

// 4.5:1
$kemosite_wordpress_split_complementary_colour_m30_white_45_hsl		=	( kemosite_adjust_hsl_l_contrast( 
																			$kemosite_wordpress_split_complementary_colour_m30_hsl_array, // hsl array of base colour
																			$kemosite_wordpress_split_complementary_colour_m30_white_contrast, // colour contrast on white background
																			4.5, // target contrast
																			$kemosite_wordpress_base_white_lum // white luminance
																		) );
$kemosite_wordpress_split_complementary_colour_m30_white_45_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_split_complementary_colour_m30_white_45_hsl );

// 7:1
$kemosite_wordpress_split_complementary_colour_m30_white_7_hsl		=	( kemosite_adjust_hsl_l_contrast( 
																			$kemosite_wordpress_split_complementary_colour_m30_hsl_array, // hsl array of base colour
																			$kemosite_wordpress_split_complementary_colour_m30_white_contrast, // colour contrast on white background
																			7, // target contrast
																			$kemosite_wordpress_base_white_lum // white luminance
																		) );
$kemosite_wordpress_split_complementary_colour_m30_white_7_hex 		= 	kemosite_hsl_to_hex( $kemosite_wordpress_split_complementary_colour_m30_white_7_hsl );

// Black Background

// 3:1
$kemosite_wordpress_split_complementary_colour_m30_black_3_hsl		=	( kemosite_adjust_hsl_l_contrast( 
																			$kemosite_wordpress_split_complementary_colour_m30_hsl_array, // hsl array of base colour
																			$kemosite_wordpress_split_complementary_colour_m30_black_contrast, // colour contrast on white background
																			3, // target contrast
																			$kemosite_wordpress_base_black_lum // white luminance
																		) );
$kemosite_wordpress_split_complementary_colour_m30_black_3_hex 		= 	kemosite_hsl_to_hex( $kemosite_wordpress_split_complementary_colour_m30_black_3_hsl );

// 4.5:1
$kemosite_wordpress_split_complementary_colour_m30_black_45_hsl		=	( kemosite_adjust_hsl_l_contrast( 
																			$kemosite_wordpress_split_complementary_colour_m30_hsl_array, // hsl array of base colour
																			$kemosite_wordpress_split_complementary_colour_m30_black_contrast, // colour contrast on white background
																			4.5, // target contrast
																			$kemosite_wordpress_base_black_lum // white luminance
																		) );
$kemosite_wordpress_split_complementary_colour_m30_black_45_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_split_complementary_colour_m30_black_45_hsl );

// 7:1
$kemosite_wordpress_split_complementary_colour_m30_black_7_hsl		=	( kemosite_adjust_hsl_l_contrast( 
																			$kemosite_wordpress_split_complementary_colour_m30_hsl_array, // hsl array of base colour
																			$kemosite_wordpress_split_complementary_colour_m30_black_contrast, // colour contrast on white background
																			7, // target contrast
																			$kemosite_wordpress_base_black_lum // white luminance
																		) );
$kemosite_wordpress_split_complementary_colour_m30_black_7_hex 		= 	kemosite_hsl_to_hex( $kemosite_wordpress_split_complementary_colour_m30_black_7_hsl );

// Neutrals

// White Background

// 3:1
$kemosite_wordpress_split_complementary_neutral_m30_white_3_hsl_saturation	= 	kemosite_calc_neutral_sat( 
																					$kemosite_wordpress_split_complementary_colour_m30_hsl_array,
																					$kemosite_wordpress_neutral_white_3_hsl_array
																				);
$kemosite_wordpress_split_complementary_neutral_m30_white_3_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_3_hsl_array[2];
$kemosite_wordpress_split_complementary_neutral_m30_white_3_hsl_array		=	array( 
																					$kemosite_wordpress_split_complementary_colour_m30_hsl_array[0],
																					$kemosite_wordpress_split_complementary_neutral_m30_white_3_hsl_saturation,
																					$kemosite_wordpress_split_complementary_neutral_m30_white_3_hsl_lightness,
																				);
$kemosite_wordpress_split_complementary_neutral_m30_white_3_hsl				=	implode( ",", $kemosite_wordpress_split_complementary_neutral_m30_white_3_hsl_array );
$kemosite_wordpress_split_complementary_neutral_m30_white_3_hex 			= 	kemosite_hsl_to_hex( $kemosite_wordpress_split_complementary_neutral_m30_white_3_hsl );

// 4.5:1
$kemosite_wordpress_split_complementary_neutral_m30_white_45_hsl_saturation	=	kemosite_calc_neutral_sat( 
																					$kemosite_wordpress_split_complementary_colour_m30_hsl_array,
																					$kemosite_wordpress_neutral_white_45_hsl_array
																				);
$kemosite_wordpress_split_complementary_neutral_m30_white_45_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_45_hsl_array[2];
$kemosite_wordpress_split_complementary_neutral_m30_white_45_hsl_array		=	array( 
																					$kemosite_wordpress_split_complementary_colour_m30_hsl_array[0],
																					$kemosite_wordpress_split_complementary_neutral_m30_white_45_hsl_saturation,
																					$kemosite_wordpress_split_complementary_neutral_m30_white_45_hsl_lightness,
																				);
$kemosite_wordpress_split_complementary_neutral_m30_white_45_hsl			=	implode( ",", $kemosite_wordpress_split_complementary_neutral_m30_white_45_hsl_array );
$kemosite_wordpress_split_complementary_neutral_m30_white_45_hex 			= 	kemosite_hsl_to_hex( $kemosite_wordpress_split_complementary_neutral_m30_white_45_hsl );

// 7:1
$kemosite_wordpress_split_complementary_neutral_m30_white_7_hsl_saturation	=	kemosite_calc_neutral_sat( 
																					$kemosite_wordpress_split_complementary_colour_m30_hsl_array,
																					$kemosite_wordpress_neutral_white_7_hsl_array
																				);
$kemosite_wordpress_split_complementary_neutral_m30_white_7_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_7_hsl_array[2];
$kemosite_wordpress_split_complementary_neutral_m30_white_7_hsl_array		=	array( 
																					$kemosite_wordpress_split_complementary_colour_m30_hsl_array[0],
																					$kemosite_wordpress_split_complementary_neutral_m30_white_7_hsl_saturation,
																					$kemosite_wordpress_split_complementary_neutral_m30_white_7_hsl_lightness,
																				);
$kemosite_wordpress_split_complementary_neutral_m30_white_7_hsl				=	implode( ",", $kemosite_wordpress_split_complementary_neutral_m30_white_7_hsl_array );
$kemosite_wordpress_split_complementary_neutral_m30_white_7_hex 			= 	kemosite_hsl_to_hex( $kemosite_wordpress_split_complementary_neutral_m30_white_7_hsl );

// Black Background

// 3:1
$kemosite_wordpress_split_complementary_neutral_m30_black_3_hsl_saturation	=	kemosite_calc_neutral_sat( 
																					$kemosite_wordpress_split_complementary_colour_m30_hsl_array,
																					$kemosite_wordpress_neutral_black_3_hsl_array
																				);
$kemosite_wordpress_split_complementary_neutral_m30_black_3_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_3_hsl_array[2] + 
																				round(	
																					$kemosite_wordpress_split_complementary_neutral_m30_black_3_hsl_saturation *
																					($kemosite_wordpress_neutral_black_3_hsl_array[2] / 100)
																				);
$kemosite_wordpress_split_complementary_neutral_m30_black_3_hsl_array		=	array( $kemosite_wordpress_split_complementary_colour_m30_hsl_array[0],
																					$kemosite_wordpress_split_complementary_neutral_m30_black_3_hsl_saturation,
																					$kemosite_wordpress_split_complementary_neutral_m30_black_3_hsl_lightness,
																				);
$kemosite_wordpress_split_complementary_neutral_m30_black_3_hsl				=	implode( ",", $kemosite_wordpress_split_complementary_neutral_m30_black_3_hsl_array );
$kemosite_wordpress_split_complementary_neutral_m30_black_3_hex 			= 	kemosite_hsl_to_hex( $kemosite_wordpress_split_complementary_neutral_m30_black_3_hsl );

// 4.5:1
$kemosite_wordpress_split_complementary_neutral_m30_black_45_hsl_saturation	=	kemosite_calc_neutral_sat( 
																					$kemosite_wordpress_split_complementary_colour_m30_hsl_array,
																					$kemosite_wordpress_neutral_black_45_hsl_array
																				);
$kemosite_wordpress_split_complementary_neutral_m30_black_45_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_45_hsl_array[2] + 
																				round(	
																					$kemosite_wordpress_split_complementary_neutral_m30_black_45_hsl_saturation *
																					($kemosite_wordpress_neutral_black_45_hsl_array[2] / 100)
																				);
$kemosite_wordpress_split_complementary_neutral_m30_black_45_hsl_array		=	array( 
																					$kemosite_wordpress_split_complementary_colour_m30_hsl_array[0],
																					$kemosite_wordpress_split_complementary_neutral_m30_black_45_hsl_saturation,
																					$kemosite_wordpress_split_complementary_neutral_m30_black_45_hsl_lightness,
																				);
$kemosite_wordpress_split_complementary_neutral_m30_black_45_hsl			=	implode( ",", $kemosite_wordpress_split_complementary_neutral_m30_black_45_hsl_array );
$kemosite_wordpress_split_complementary_neutral_m30_black_45_hex 			= 	kemosite_hsl_to_hex( $kemosite_wordpress_split_complementary_neutral_m30_black_45_hsl );

// 7:1
$kemosite_wordpress_split_complementary_neutral_m30_black_7_hsl_saturation	=	kemosite_calc_neutral_sat( 
																					$kemosite_wordpress_split_complementary_colour_m30_hsl_array,
																					$kemosite_wordpress_neutral_black_7_hsl_array
																				);
$kemosite_wordpress_split_complementary_neutral_m30_black_7_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_7_hsl_array[2] + 
																				round(	
																					$kemosite_wordpress_split_complementary_neutral_m30_black_7_hsl_saturation *
																					($kemosite_wordpress_neutral_black_7_hsl_array[2] / 100)
																				);
$kemosite_wordpress_split_complementary_neutral_m30_black_7_hsl_array		=	array( 
																					$kemosite_wordpress_split_complementary_colour_m30_hsl_array[0],
																					$kemosite_wordpress_split_complementary_neutral_m30_black_7_hsl_saturation,
																					$kemosite_wordpress_split_complementary_neutral_m30_black_7_hsl_lightness,
																				);
$kemosite_wordpress_split_complementary_neutral_m30_black_7_hsl				=	implode( ",", $kemosite_wordpress_split_complementary_neutral_m30_black_7_hsl_array );
$kemosite_wordpress_split_complementary_neutral_m30_black_7_hex 			= 	kemosite_hsl_to_hex( $kemosite_wordpress_split_complementary_neutral_m30_black_7_hsl );

?>

<table>
	<thead>
		<tr>
			<th>Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_white_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_split_complementary_colour_m30_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_split_complementary_colour_m30_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_split_complementary_colour_m30_white_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_split_complementary_neutral_m30_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_split_complementary_neutral_m30_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_split_complementary_neutral_m30_white_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_white_hex; ?></td>
			<td><?php echo $kemosite_wordpress_split_complementary_colour_m30_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_split_complementary_colour_m30_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_split_complementary_colour_m30_white_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_split_complementary_neutral_m30_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_split_complementary_neutral_m30_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_split_complementary_neutral_m30_white_7_hex; ?></td>
		</tr>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_black_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_split_complementary_colour_m30_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_split_complementary_colour_m30_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_split_complementary_colour_m30_black_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_split_complementary_neutral_m30_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_split_complementary_neutral_m30_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_split_complementary_neutral_m30_black_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_black_hex; ?></td>
			<td><?php echo $kemosite_wordpress_split_complementary_colour_m30_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_split_complementary_colour_m30_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_split_complementary_colour_m30_black_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_split_complementary_neutral_m30_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_split_complementary_neutral_m30_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_split_complementary_neutral_m30_black_7_hex; ?></td>
		</tr>
	</tbody>
</table>

<hr>

<h2>Triadic</h2>
<p>A triad consists of three colors that are placed 120 degrees from each other on the color wheel</p>

<h3>+120 Degrees</h3>

<?php 

// + 120 Degrees
$kemosite_wordpress_triadic_colour_p120_hue 		= 	( 360 + ( $kemosite_wordpress_base_primary_colour_hsl_array[0] + 120 ) ) % 360;
$kemosite_wordpress_triadic_colour_p120_hsl_array	=	array( 
															$kemosite_wordpress_triadic_colour_p120_hue,
															$kemosite_wordpress_base_primary_colour_hsl_array[1],
															$kemosite_wordpress_base_primary_colour_hsl_array[2]
														);
$kemosite_wordpress_triadic_colour_p120_hsl		=	implode( ",", $kemosite_wordpress_triadic_colour_p120_hsl_array );
$kemosite_wordpress_triadic_colour_p120_rgb		=	kemosite_hsl_to_rgb( $kemosite_wordpress_triadic_colour_p120_hsl );
$kemosite_wordpress_triadic_colour_p120_rgb_array	=	explode( ",", $kemosite_wordpress_triadic_colour_p120_rgb );
$kemosite_wordpress_triadic_colour_p120_lum		= 	kemosite_calc_lum( 
															$kemosite_wordpress_triadic_colour_p120_rgb_array[0],
															$kemosite_wordpress_triadic_colour_p120_rgb_array[1],
															$kemosite_wordpress_triadic_colour_p120_rgb_array[2]
														);
$kemosite_wordpress_triadic_colour_p120_white_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_triadic_colour_p120_lum, $kemosite_wordpress_base_white_lum);
$kemosite_wordpress_triadic_colour_p120_black_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_triadic_colour_p120_lum, $kemosite_wordpress_base_black_lum);

// Colours

// White Background

// 3:1
$kemosite_wordpress_triadic_colour_p120_white_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_triadic_colour_p120_hsl_array, // hsl array of base colour
														$kemosite_wordpress_triadic_colour_p120_white_contrast, // colour contrast on white background
														3, // target contrast
														$kemosite_wordpress_base_white_lum // white luminance
													) );
$kemosite_wordpress_triadic_colour_p120_white_3_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_triadic_colour_p120_white_3_hsl );

// 4.5:1
$kemosite_wordpress_triadic_colour_p120_white_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_triadic_colour_p120_hsl_array, // hsl array of base colour
														$kemosite_wordpress_triadic_colour_p120_white_contrast, // colour contrast on white background
														4.5, // target contrast
														$kemosite_wordpress_base_white_lum // white luminance
													) );
$kemosite_wordpress_triadic_colour_p120_white_45_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_triadic_colour_p120_white_45_hsl );

// 7:1
$kemosite_wordpress_triadic_colour_p120_white_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_triadic_colour_p120_hsl_array, // hsl array of base colour
														$kemosite_wordpress_triadic_colour_p120_white_contrast, // colour contrast on white background
														7, // target contrast
														$kemosite_wordpress_base_white_lum // white luminance
													) );
$kemosite_wordpress_triadic_colour_p120_white_7_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_triadic_colour_p120_white_7_hsl );

// Black Background

// 3:1
$kemosite_wordpress_triadic_colour_p120_black_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_triadic_colour_p120_hsl_array, // hsl array of base colour
														$kemosite_wordpress_triadic_colour_p120_black_contrast, // colour contrast on white background
														3, // target contrast
														$kemosite_wordpress_base_black_lum // white luminance
													) );
$kemosite_wordpress_triadic_colour_p120_black_3_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_triadic_colour_p120_black_3_hsl );

// 4.5:1
$kemosite_wordpress_triadic_colour_p120_black_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_triadic_colour_p120_hsl_array, // hsl array of base colour
														$kemosite_wordpress_triadic_colour_p120_black_contrast, // colour contrast on white background
														4.5, // target contrast
														$kemosite_wordpress_base_black_lum // white luminance
													) );
$kemosite_wordpress_triadic_colour_p120_black_45_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_triadic_colour_p120_black_45_hsl );

// 7:1
$kemosite_wordpress_triadic_colour_p120_black_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_triadic_colour_p120_hsl_array, // hsl array of base colour
														$kemosite_wordpress_triadic_colour_p120_black_contrast, // colour contrast on white background
														7, // target contrast
														$kemosite_wordpress_base_black_lum // white luminance
													) );
$kemosite_wordpress_triadic_colour_p120_black_7_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_triadic_colour_p120_black_7_hsl );

// Neutrals

// White Background

// 3:1
$kemosite_wordpress_triadic_neutral_p120_white_3_hsl_saturation	= 	kemosite_calc_neutral_sat( $kemosite_wordpress_triadic_colour_p120_hsl_array, $kemosite_wordpress_neutral_white_3_hsl_array );
$kemosite_wordpress_triadic_neutral_p120_white_3_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_3_hsl_array[2];
$kemosite_wordpress_triadic_neutral_p120_white_3_hsl_array			=	array( $kemosite_wordpress_triadic_colour_p120_hsl_array[0],
																			$kemosite_wordpress_triadic_neutral_p120_white_3_hsl_saturation,
																			$kemosite_wordpress_triadic_neutral_p120_white_3_hsl_lightness,
																		);
$kemosite_wordpress_triadic_neutral_p120_white_3_hsl				=	implode( ",", $kemosite_wordpress_triadic_neutral_p120_white_3_hsl_array );
$kemosite_wordpress_triadic_neutral_p120_white_3_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_triadic_neutral_p120_white_3_hsl );

// 4.5:1
$kemosite_wordpress_triadic_neutral_p120_white_45_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_triadic_colour_p120_hsl_array, $kemosite_wordpress_neutral_white_45_hsl_array );
$kemosite_wordpress_triadic_neutral_p120_white_45_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_45_hsl_array[2];
$kemosite_wordpress_triadic_neutral_p120_white_45_hsl_array			=	array( $kemosite_wordpress_triadic_colour_p120_hsl_array[0],
																			$kemosite_wordpress_triadic_neutral_p120_white_45_hsl_saturation,
																			$kemosite_wordpress_triadic_neutral_p120_white_45_hsl_lightness,
																		);
$kemosite_wordpress_triadic_neutral_p120_white_45_hsl				=	implode( ",", $kemosite_wordpress_triadic_neutral_p120_white_45_hsl_array );
$kemosite_wordpress_triadic_neutral_p120_white_45_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_triadic_neutral_p120_white_45_hsl );

// 7:1
$kemosite_wordpress_triadic_neutral_p120_white_7_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_triadic_colour_p120_hsl_array, $kemosite_wordpress_neutral_white_7_hsl_array );
$kemosite_wordpress_triadic_neutral_p120_white_7_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_7_hsl_array[2];
$kemosite_wordpress_triadic_neutral_p120_white_7_hsl_array			=	array( $kemosite_wordpress_triadic_colour_p120_hsl_array[0],
																			$kemosite_wordpress_triadic_neutral_p120_white_7_hsl_saturation,
																			$kemosite_wordpress_triadic_neutral_p120_white_7_hsl_lightness,
																		);
$kemosite_wordpress_triadic_neutral_p120_white_7_hsl				=	implode( ",", $kemosite_wordpress_triadic_neutral_p120_white_7_hsl_array );
$kemosite_wordpress_triadic_neutral_p120_white_7_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_triadic_neutral_p120_white_7_hsl );

// Black Background

// 3:1
$kemosite_wordpress_triadic_neutral_p120_black_3_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_triadic_colour_p120_hsl_array, $kemosite_wordpress_neutral_black_3_hsl_array );
$kemosite_wordpress_triadic_neutral_p120_black_3_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_3_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_triadic_neutral_p120_black_3_hsl_saturation *
																			($kemosite_wordpress_neutral_black_3_hsl_array[2] / 100)
																		);
$kemosite_wordpress_triadic_neutral_p120_black_3_hsl_array			=	array( $kemosite_wordpress_triadic_colour_p120_hsl_array[0],
																			$kemosite_wordpress_triadic_neutral_p120_black_3_hsl_saturation,
																			$kemosite_wordpress_triadic_neutral_p120_black_3_hsl_lightness,
																		);
$kemosite_wordpress_triadic_neutral_p120_black_3_hsl				=	implode( ",", $kemosite_wordpress_triadic_neutral_p120_black_3_hsl_array );
$kemosite_wordpress_triadic_neutral_p120_black_3_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_triadic_neutral_p120_black_3_hsl );

// 4.5:1
$kemosite_wordpress_triadic_neutral_p120_black_45_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_triadic_colour_p120_hsl_array, $kemosite_wordpress_neutral_black_45_hsl_array );
$kemosite_wordpress_triadic_neutral_p120_black_45_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_45_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_triadic_neutral_p120_black_45_hsl_saturation *
																			($kemosite_wordpress_neutral_black_45_hsl_array[2] / 100)
																		);
$kemosite_wordpress_triadic_neutral_p120_black_45_hsl_array		=	array( $kemosite_wordpress_triadic_colour_p120_hsl_array[0],
																			$kemosite_wordpress_triadic_neutral_p120_black_45_hsl_saturation,
																			$kemosite_wordpress_triadic_neutral_p120_black_45_hsl_lightness,
																		);
$kemosite_wordpress_triadic_neutral_p120_black_45_hsl				=	implode( ",", $kemosite_wordpress_triadic_neutral_p120_black_45_hsl_array );
$kemosite_wordpress_triadic_neutral_p120_black_45_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_triadic_neutral_p120_black_45_hsl );

// 7:1
$kemosite_wordpress_triadic_neutral_p120_black_7_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_triadic_colour_p120_hsl_array, $kemosite_wordpress_neutral_black_7_hsl_array );
$kemosite_wordpress_triadic_neutral_p120_black_7_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_7_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_triadic_neutral_p120_black_7_hsl_saturation *
																			($kemosite_wordpress_neutral_black_7_hsl_array[2] / 100)
																		);
$kemosite_wordpress_triadic_neutral_p120_black_7_hsl_array			=	array( $kemosite_wordpress_triadic_colour_p120_hsl_array[0],
																			$kemosite_wordpress_triadic_neutral_p120_black_7_hsl_saturation,
																			$kemosite_wordpress_triadic_neutral_p120_black_7_hsl_lightness,
																		);
$kemosite_wordpress_triadic_neutral_p120_black_7_hsl				=	implode( ",", $kemosite_wordpress_triadic_neutral_p120_black_7_hsl_array );
$kemosite_wordpress_triadic_neutral_p120_black_7_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_triadic_neutral_p120_black_7_hsl );

?>

<table>
	<thead>
		<tr>
			<th>Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_white_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_colour_p120_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_colour_p120_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_colour_p120_white_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_neutral_p120_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_neutral_p120_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_neutral_p120_white_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_white_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_colour_p120_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_colour_p120_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_colour_p120_white_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_neutral_p120_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_neutral_p120_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_neutral_p120_white_7_hex; ?></td>
		</tr>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_black_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_colour_p120_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_colour_p120_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_colour_p120_black_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_neutral_p120_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_neutral_p120_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_neutral_p120_black_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_black_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_colour_p120_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_colour_p120_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_colour_p120_black_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_neutral_p120_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_neutral_p120_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_neutral_p120_black_7_hex; ?></td>
		</tr>
	</tbody>
</table>

<a name="triatic_m120" id="triatic_m120"></a>
<h3>-120 Degrees</h3>

<?php 

// - 120 Degrees
$kemosite_wordpress_triadic_colour_m120_hue 		= 	( 360 + ( $kemosite_wordpress_base_primary_colour_hsl_array[0] - 120 ) ) % 360;
$kemosite_wordpress_triadic_colour_m120_hsl_array	=	array( 
															$kemosite_wordpress_triadic_colour_m120_hue,
															$kemosite_wordpress_base_primary_colour_hsl_array[1],
															$kemosite_wordpress_base_primary_colour_hsl_array[2]
														);
$kemosite_wordpress_triadic_colour_m120_hsl		=	implode( ",", $kemosite_wordpress_triadic_colour_m120_hsl_array );
$kemosite_wordpress_triadic_colour_m120_rgb		=	kemosite_hsl_to_rgb( $kemosite_wordpress_triadic_colour_m120_hsl );
$kemosite_wordpress_triadic_colour_m120_rgb_array	=	explode( ",", $kemosite_wordpress_triadic_colour_m120_rgb );
$kemosite_wordpress_triadic_colour_m120_lum		= 	kemosite_calc_lum( 
															$kemosite_wordpress_triadic_colour_m120_rgb_array[0],
															$kemosite_wordpress_triadic_colour_m120_rgb_array[1],
															$kemosite_wordpress_triadic_colour_m120_rgb_array[2]
														);
$kemosite_wordpress_triadic_colour_m120_white_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_triadic_colour_m120_lum, $kemosite_wordpress_base_white_lum);
$kemosite_wordpress_triadic_colour_m120_black_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_triadic_colour_m120_lum, $kemosite_wordpress_base_black_lum);

// Colours

// White Background

// 3:1
$kemosite_wordpress_triadic_colour_m120_white_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_triadic_colour_m120_hsl_array, // hsl array of base colour
														$kemosite_wordpress_triadic_colour_m120_white_contrast, // colour contrast on white background
														3, // target contrast
														$kemosite_wordpress_base_white_lum // white luminance
													) );
$kemosite_wordpress_triadic_colour_m120_white_3_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_triadic_colour_m120_white_3_hsl );

// 4.5:1
$kemosite_wordpress_triadic_colour_m120_white_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_triadic_colour_m120_hsl_array, // hsl array of base colour
														$kemosite_wordpress_triadic_colour_m120_white_contrast, // colour contrast on white background
														4.5, // target contrast
														$kemosite_wordpress_base_white_lum // white luminance
													) );
$kemosite_wordpress_triadic_colour_m120_white_45_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_triadic_colour_m120_white_45_hsl );

// 7:1
$kemosite_wordpress_triadic_colour_m120_white_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_triadic_colour_m120_hsl_array, // hsl array of base colour
														$kemosite_wordpress_triadic_colour_m120_white_contrast, // colour contrast on white background
														7, // target contrast
														$kemosite_wordpress_base_white_lum // white luminance
													) );
$kemosite_wordpress_triadic_colour_m120_white_7_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_triadic_colour_m120_white_7_hsl );

// Black Background

// 3:1
$kemosite_wordpress_triadic_colour_m120_black_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_triadic_colour_m120_hsl_array, // hsl array of base colour
														$kemosite_wordpress_triadic_colour_m120_black_contrast, // colour contrast on white background
														3, // target contrast
														$kemosite_wordpress_base_black_lum // white luminance
													) );
$kemosite_wordpress_triadic_colour_m120_black_3_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_triadic_colour_m120_black_3_hsl );

// 4.5:1
$kemosite_wordpress_triadic_colour_m120_black_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_triadic_colour_m120_hsl_array, // hsl array of base colour
														$kemosite_wordpress_triadic_colour_m120_black_contrast, // colour contrast on white background
														4.5, // target contrast
														$kemosite_wordpress_base_black_lum // white luminance
													) );
$kemosite_wordpress_triadic_colour_m120_black_45_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_triadic_colour_m120_black_45_hsl );

// 7:1
$kemosite_wordpress_triadic_colour_m120_black_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_triadic_colour_m120_hsl_array, // hsl array of base colour
														$kemosite_wordpress_triadic_colour_m120_black_contrast, // colour contrast on white background
														7, // target contrast
														$kemosite_wordpress_base_black_lum // white luminance
													) );
$kemosite_wordpress_triadic_colour_m120_black_7_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_triadic_colour_m120_black_7_hsl );

// Neutrals

// White Background

// 3:1
$kemosite_wordpress_triadic_neutral_m120_white_3_hsl_saturation	= 	kemosite_calc_neutral_sat( $kemosite_wordpress_triadic_colour_m120_hsl_array, $kemosite_wordpress_neutral_white_3_hsl_array );
$kemosite_wordpress_triadic_neutral_m120_white_3_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_3_hsl_array[2];
$kemosite_wordpress_triadic_neutral_m120_white_3_hsl_array			=	array( $kemosite_wordpress_triadic_colour_m120_hsl_array[0],
																			$kemosite_wordpress_triadic_neutral_m120_white_3_hsl_saturation,
																			$kemosite_wordpress_triadic_neutral_m120_white_3_hsl_lightness,
																		);
$kemosite_wordpress_triadic_neutral_m120_white_3_hsl				=	implode( ",", $kemosite_wordpress_triadic_neutral_m120_white_3_hsl_array );
$kemosite_wordpress_triadic_neutral_m120_white_3_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_triadic_neutral_m120_white_3_hsl );

// 4.5:1
$kemosite_wordpress_triadic_neutral_m120_white_45_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_triadic_colour_m120_hsl_array, $kemosite_wordpress_neutral_white_45_hsl_array );
$kemosite_wordpress_triadic_neutral_m120_white_45_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_45_hsl_array[2];
$kemosite_wordpress_triadic_neutral_m120_white_45_hsl_array			=	array( $kemosite_wordpress_triadic_colour_m120_hsl_array[0],
																			$kemosite_wordpress_triadic_neutral_m120_white_45_hsl_saturation,
																			$kemosite_wordpress_triadic_neutral_m120_white_45_hsl_lightness,
																		);
$kemosite_wordpress_triadic_neutral_m120_white_45_hsl				=	implode( ",", $kemosite_wordpress_triadic_neutral_m120_white_45_hsl_array );
$kemosite_wordpress_triadic_neutral_m120_white_45_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_triadic_neutral_m120_white_45_hsl );

// 7:1
$kemosite_wordpress_triadic_neutral_m120_white_7_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_triadic_colour_m120_hsl_array, $kemosite_wordpress_neutral_white_7_hsl_array );
$kemosite_wordpress_triadic_neutral_m120_white_7_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_7_hsl_array[2];
$kemosite_wordpress_triadic_neutral_m120_white_7_hsl_array			=	array( $kemosite_wordpress_triadic_colour_m120_hsl_array[0],
																			$kemosite_wordpress_triadic_neutral_m120_white_7_hsl_saturation,
																			$kemosite_wordpress_triadic_neutral_m120_white_7_hsl_lightness,
																		);
$kemosite_wordpress_triadic_neutral_m120_white_7_hsl				=	implode( ",", $kemosite_wordpress_triadic_neutral_m120_white_7_hsl_array );
$kemosite_wordpress_triadic_neutral_m120_white_7_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_triadic_neutral_m120_white_7_hsl );

// Black Background

// 3:1
$kemosite_wordpress_triadic_neutral_m120_black_3_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_triadic_colour_m120_hsl_array, $kemosite_wordpress_neutral_black_3_hsl_array );
$kemosite_wordpress_triadic_neutral_m120_black_3_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_3_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_triadic_neutral_m120_black_3_hsl_saturation *
																			($kemosite_wordpress_neutral_black_3_hsl_array[2] / 100)
																		);
$kemosite_wordpress_triadic_neutral_m120_black_3_hsl_array			=	array( $kemosite_wordpress_triadic_colour_m120_hsl_array[0],
																			$kemosite_wordpress_triadic_neutral_m120_black_3_hsl_saturation,
																			$kemosite_wordpress_triadic_neutral_m120_black_3_hsl_lightness,
																		);
$kemosite_wordpress_triadic_neutral_m120_black_3_hsl				=	implode( ",", $kemosite_wordpress_triadic_neutral_m120_black_3_hsl_array );
$kemosite_wordpress_triadic_neutral_m120_black_3_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_triadic_neutral_m120_black_3_hsl );

// 4.5:1
$kemosite_wordpress_triadic_neutral_m120_black_45_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_triadic_colour_m120_hsl_array, $kemosite_wordpress_neutral_black_45_hsl_array );
$kemosite_wordpress_triadic_neutral_m120_black_45_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_45_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_triadic_neutral_m120_black_45_hsl_saturation *
																			($kemosite_wordpress_neutral_black_45_hsl_array[2] / 100)
																		);
$kemosite_wordpress_triadic_neutral_m120_black_45_hsl_array		=	array( $kemosite_wordpress_triadic_colour_m120_hsl_array[0],
																			$kemosite_wordpress_triadic_neutral_m120_black_45_hsl_saturation,
																			$kemosite_wordpress_triadic_neutral_m120_black_45_hsl_lightness,
																		);
$kemosite_wordpress_triadic_neutral_m120_black_45_hsl				=	implode( ",", $kemosite_wordpress_triadic_neutral_m120_black_45_hsl_array );
$kemosite_wordpress_triadic_neutral_m120_black_45_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_triadic_neutral_m120_black_45_hsl );

// 7:1
$kemosite_wordpress_triadic_neutral_m120_black_7_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_triadic_colour_m120_hsl_array, $kemosite_wordpress_neutral_black_7_hsl_array );
$kemosite_wordpress_triadic_neutral_m120_black_7_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_7_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_triadic_neutral_m120_black_7_hsl_saturation *
																			($kemosite_wordpress_neutral_black_7_hsl_array[2] / 100)
																		);
$kemosite_wordpress_triadic_neutral_m120_black_7_hsl_array			=	array( $kemosite_wordpress_triadic_colour_m120_hsl_array[0],
																			$kemosite_wordpress_triadic_neutral_m120_black_7_hsl_saturation,
																			$kemosite_wordpress_triadic_neutral_m120_black_7_hsl_lightness,
																		);
$kemosite_wordpress_triadic_neutral_m120_black_7_hsl				=	implode( ",", $kemosite_wordpress_triadic_neutral_m120_black_7_hsl_array );
$kemosite_wordpress_triadic_neutral_m120_black_7_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_triadic_neutral_m120_black_7_hsl );

?>

<table>
	<thead>
		<tr>
			<th>Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_white_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_colour_m120_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_colour_m120_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_colour_m120_white_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_neutral_m120_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_neutral_m120_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_neutral_m120_white_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_white_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_colour_m120_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_colour_m120_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_colour_m120_white_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_neutral_m120_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_neutral_m120_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_neutral_m120_white_7_hex; ?></td>
		</tr>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_black_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_colour_m120_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_colour_m120_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_colour_m120_black_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_neutral_m120_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_neutral_m120_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_neutral_m120_black_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_black_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_colour_m120_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_colour_m120_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_colour_m120_black_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_neutral_m120_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_neutral_m120_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_neutral_m120_black_7_hex; ?></td>
		</tr>
	</tbody>
</table>

<hr>

<h2>Square (Tetradic)</h2>
<p>The square color scheme uses four colors equidistant from each other on the color wheel (90 degrees apart)</p>

<h3>+90 Degrees</h3>

<?php 

// + 90 Degrees
$kemosite_wordpress_tetradic_colour_p90_hue 		= 	( 360 + ( $kemosite_wordpress_base_primary_colour_hsl_array[0] + 90 ) ) % 360;
$kemosite_wordpress_tetradic_colour_p90_hsl_array	=	array( 
															$kemosite_wordpress_tetradic_colour_p90_hue,
															$kemosite_wordpress_base_primary_colour_hsl_array[1],
															$kemosite_wordpress_base_primary_colour_hsl_array[2]
														);
$kemosite_wordpress_tetradic_colour_p90_hsl		=	implode( ",", $kemosite_wordpress_tetradic_colour_p90_hsl_array );
$kemosite_wordpress_tetradic_colour_p90_rgb		=	kemosite_hsl_to_rgb( $kemosite_wordpress_tetradic_colour_p90_hsl );
$kemosite_wordpress_tetradic_colour_p90_rgb_array	=	explode( ",", $kemosite_wordpress_tetradic_colour_p90_rgb );
$kemosite_wordpress_tetradic_colour_p90_lum		= 	kemosite_calc_lum( 
															$kemosite_wordpress_tetradic_colour_p90_rgb_array[0],
															$kemosite_wordpress_tetradic_colour_p90_rgb_array[1],
															$kemosite_wordpress_tetradic_colour_p90_rgb_array[2]
														);
$kemosite_wordpress_tetradic_colour_p90_white_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_tetradic_colour_p90_lum, $kemosite_wordpress_base_white_lum);
$kemosite_wordpress_tetradic_colour_p90_black_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_tetradic_colour_p90_lum, $kemosite_wordpress_base_black_lum);

// Colours

// White Background

// 3:1
$kemosite_wordpress_tetradic_colour_p90_white_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_tetradic_colour_p90_hsl_array, // hsl array of base colour
														$kemosite_wordpress_tetradic_colour_p90_white_contrast, // colour contrast on white background
														3, // target contrast
														$kemosite_wordpress_base_white_lum // white luminance
													) );
$kemosite_wordpress_tetradic_colour_p90_white_3_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_colour_p90_white_3_hsl );

// 4.5:1
$kemosite_wordpress_tetradic_colour_p90_white_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_tetradic_colour_p90_hsl_array, // hsl array of base colour
														$kemosite_wordpress_tetradic_colour_p90_white_contrast, // colour contrast on white background
														4.5, // target contrast
														$kemosite_wordpress_base_white_lum // white luminance
													) );
$kemosite_wordpress_tetradic_colour_p90_white_45_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_colour_p90_white_45_hsl );

// 7:1
$kemosite_wordpress_tetradic_colour_p90_white_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_tetradic_colour_p90_hsl_array, // hsl array of base colour
														$kemosite_wordpress_tetradic_colour_p90_white_contrast, // colour contrast on white background
														7, // target contrast
														$kemosite_wordpress_base_white_lum // white luminance
													) );
$kemosite_wordpress_tetradic_colour_p90_white_7_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_colour_p90_white_7_hsl );

// Black Background

// 3:1
$kemosite_wordpress_tetradic_colour_p90_black_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_tetradic_colour_p90_hsl_array, // hsl array of base colour
														$kemosite_wordpress_tetradic_colour_p90_black_contrast, // colour contrast on white background
														3, // target contrast
														$kemosite_wordpress_base_black_lum // white luminance
													) );
$kemosite_wordpress_tetradic_colour_p90_black_3_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_colour_p90_black_3_hsl );

// 4.5:1
$kemosite_wordpress_tetradic_colour_p90_black_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_tetradic_colour_p90_hsl_array, // hsl array of base colour
														$kemosite_wordpress_tetradic_colour_p90_black_contrast, // colour contrast on white background
														4.5, // target contrast
														$kemosite_wordpress_base_black_lum // white luminance
													) );
$kemosite_wordpress_tetradic_colour_p90_black_45_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_colour_p90_black_45_hsl );

// 7:1
$kemosite_wordpress_tetradic_colour_p90_black_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_tetradic_colour_p90_hsl_array, // hsl array of base colour
														$kemosite_wordpress_tetradic_colour_p90_black_contrast, // colour contrast on white background
														7, // target contrast
														$kemosite_wordpress_base_black_lum // white luminance
													) );
$kemosite_wordpress_tetradic_colour_p90_black_7_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_colour_p90_black_7_hsl );

// Neutrals

// White Background

// 3:1
$kemosite_wordpress_tetradic_neutral_p90_white_3_hsl_saturation	= 	kemosite_calc_neutral_sat( $kemosite_wordpress_tetradic_colour_p90_hsl_array, $kemosite_wordpress_neutral_white_3_hsl_array );
$kemosite_wordpress_tetradic_neutral_p90_white_3_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_3_hsl_array[2];
$kemosite_wordpress_tetradic_neutral_p90_white_3_hsl_array			=	array( $kemosite_wordpress_tetradic_colour_p90_hsl_array[0],
																			$kemosite_wordpress_tetradic_neutral_p90_white_3_hsl_saturation,
																			$kemosite_wordpress_tetradic_neutral_p90_white_3_hsl_lightness,
																		);
$kemosite_wordpress_tetradic_neutral_p90_white_3_hsl				=	implode( ",", $kemosite_wordpress_tetradic_neutral_p90_white_3_hsl_array );
$kemosite_wordpress_tetradic_neutral_p90_white_3_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_neutral_p90_white_3_hsl );

// 4.5:1
$kemosite_wordpress_tetradic_neutral_p90_white_45_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_tetradic_colour_p90_hsl_array, $kemosite_wordpress_neutral_white_45_hsl_array );
$kemosite_wordpress_tetradic_neutral_p90_white_45_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_45_hsl_array[2];
$kemosite_wordpress_tetradic_neutral_p90_white_45_hsl_array			=	array( $kemosite_wordpress_tetradic_colour_p90_hsl_array[0],
																			$kemosite_wordpress_tetradic_neutral_p90_white_45_hsl_saturation,
																			$kemosite_wordpress_tetradic_neutral_p90_white_45_hsl_lightness,
																		);
$kemosite_wordpress_tetradic_neutral_p90_white_45_hsl				=	implode( ",", $kemosite_wordpress_tetradic_neutral_p90_white_45_hsl_array );
$kemosite_wordpress_tetradic_neutral_p90_white_45_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_neutral_p90_white_45_hsl );

// 7:1
$kemosite_wordpress_tetradic_neutral_p90_white_7_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_tetradic_colour_p90_hsl_array, $kemosite_wordpress_neutral_white_7_hsl_array );
$kemosite_wordpress_tetradic_neutral_p90_white_7_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_7_hsl_array[2];
$kemosite_wordpress_tetradic_neutral_p90_white_7_hsl_array			=	array( $kemosite_wordpress_tetradic_colour_p90_hsl_array[0],
																			$kemosite_wordpress_tetradic_neutral_p90_white_7_hsl_saturation,
																			$kemosite_wordpress_tetradic_neutral_p90_white_7_hsl_lightness,
																		);
$kemosite_wordpress_tetradic_neutral_p90_white_7_hsl				=	implode( ",", $kemosite_wordpress_tetradic_neutral_p90_white_7_hsl_array );
$kemosite_wordpress_tetradic_neutral_p90_white_7_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_neutral_p90_white_7_hsl );

// Black Background

// 3:1
$kemosite_wordpress_tetradic_neutral_p90_black_3_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_tetradic_colour_p90_hsl_array, $kemosite_wordpress_neutral_black_3_hsl_array );
$kemosite_wordpress_tetradic_neutral_p90_black_3_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_3_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_tetradic_neutral_p90_black_3_hsl_saturation *
																			($kemosite_wordpress_neutral_black_3_hsl_array[2] / 100)
																		);
$kemosite_wordpress_tetradic_neutral_p90_black_3_hsl_array			=	array( $kemosite_wordpress_tetradic_colour_p90_hsl_array[0],
																			$kemosite_wordpress_tetradic_neutral_p90_black_3_hsl_saturation,
																			$kemosite_wordpress_tetradic_neutral_p90_black_3_hsl_lightness,
																		);
$kemosite_wordpress_tetradic_neutral_p90_black_3_hsl				=	implode( ",", $kemosite_wordpress_tetradic_neutral_p90_black_3_hsl_array );
$kemosite_wordpress_tetradic_neutral_p90_black_3_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_neutral_p90_black_3_hsl );

// 4.5:1
$kemosite_wordpress_tetradic_neutral_p90_black_45_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_tetradic_colour_p90_hsl_array, $kemosite_wordpress_neutral_black_45_hsl_array );
$kemosite_wordpress_tetradic_neutral_p90_black_45_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_45_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_tetradic_neutral_p90_black_45_hsl_saturation *
																			($kemosite_wordpress_neutral_black_45_hsl_array[2] / 100)
																		);
$kemosite_wordpress_tetradic_neutral_p90_black_45_hsl_array		=	array( $kemosite_wordpress_tetradic_colour_p90_hsl_array[0],
																			$kemosite_wordpress_tetradic_neutral_p90_black_45_hsl_saturation,
																			$kemosite_wordpress_tetradic_neutral_p90_black_45_hsl_lightness,
																		);
$kemosite_wordpress_tetradic_neutral_p90_black_45_hsl				=	implode( ",", $kemosite_wordpress_tetradic_neutral_p90_black_45_hsl_array );
$kemosite_wordpress_tetradic_neutral_p90_black_45_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_neutral_p90_black_45_hsl );

// 7:1
$kemosite_wordpress_tetradic_neutral_p90_black_7_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_tetradic_colour_p90_hsl_array, $kemosite_wordpress_neutral_black_7_hsl_array );
$kemosite_wordpress_tetradic_neutral_p90_black_7_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_7_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_tetradic_neutral_p90_black_7_hsl_saturation *
																			($kemosite_wordpress_neutral_black_7_hsl_array[2] / 100)
																		);
$kemosite_wordpress_tetradic_neutral_p90_black_7_hsl_array			=	array( $kemosite_wordpress_tetradic_colour_p90_hsl_array[0],
																			$kemosite_wordpress_tetradic_neutral_p90_black_7_hsl_saturation,
																			$kemosite_wordpress_tetradic_neutral_p90_black_7_hsl_lightness,
																		);
$kemosite_wordpress_tetradic_neutral_p90_black_7_hsl				=	implode( ",", $kemosite_wordpress_tetradic_neutral_p90_black_7_hsl_array );
$kemosite_wordpress_tetradic_neutral_p90_black_7_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_neutral_p90_black_7_hsl );

?>

<table>
	<thead>
		<tr>
			<th>Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_white_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_colour_p90_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_colour_p90_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_colour_p90_white_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_neutral_p90_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_neutral_p90_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_neutral_p90_white_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_white_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_colour_p90_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_colour_p90_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_colour_p90_white_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_neutral_p90_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_neutral_p90_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_neutral_p90_white_7_hex; ?></td>
		</tr>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_black_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_colour_p90_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_colour_p90_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_colour_p90_black_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_neutral_p90_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_neutral_p90_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_neutral_p90_black_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_black_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_colour_p90_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_colour_p90_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_colour_p90_black_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_neutral_p90_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_neutral_p90_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_neutral_p90_black_7_hex; ?></td>
		</tr>
	</tbody>
</table>

<h3>+180 Degrees (Identical to <a href="#complementary">Complementary</a>)</h3>

<table>
	<thead>
		<tr>
			<th>Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_white_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_colour_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_colour_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_colour_white_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_neutral_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_neutral_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_neutral_white_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_white_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_colour_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_colour_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_colour_white_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_neutral_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_neutral_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_neutral_white_7_hex; ?></td>
		</tr>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_black_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_colour_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_colour_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_colour_black_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_neutral_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_neutral_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_neutral_black_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_black_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_colour_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_colour_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_colour_black_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_neutral_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_neutral_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_neutral_black_7_hex; ?></td>
		</tr>
	</tbody>
</table>

<h3>-90 Degrees</h3>

<?php 

// - 90 Degrees
$kemosite_wordpress_tetradic_colour_m90_hue 		= 	( 360 + ( $kemosite_wordpress_base_primary_colour_hsl_array[0] - 90 ) ) % 360;
$kemosite_wordpress_tetradic_colour_m90_hsl_array	=	array( 
															$kemosite_wordpress_tetradic_colour_m90_hue,
															$kemosite_wordpress_base_primary_colour_hsl_array[1],
															$kemosite_wordpress_base_primary_colour_hsl_array[2]
														);
$kemosite_wordpress_tetradic_colour_m90_hsl		=	implode( ",", $kemosite_wordpress_tetradic_colour_m90_hsl_array );
$kemosite_wordpress_tetradic_colour_m90_rgb		=	kemosite_hsl_to_rgb( $kemosite_wordpress_tetradic_colour_m90_hsl );
$kemosite_wordpress_tetradic_colour_m90_rgb_array	=	explode( ",", $kemosite_wordpress_tetradic_colour_m90_rgb );
$kemosite_wordpress_tetradic_colour_m90_lum		= 	kemosite_calc_lum( 
															$kemosite_wordpress_tetradic_colour_m90_rgb_array[0],
															$kemosite_wordpress_tetradic_colour_m90_rgb_array[1],
															$kemosite_wordpress_tetradic_colour_m90_rgb_array[2]
														);
$kemosite_wordpress_tetradic_colour_m90_white_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_tetradic_colour_m90_lum, $kemosite_wordpress_base_white_lum);
$kemosite_wordpress_tetradic_colour_m90_black_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_tetradic_colour_m90_lum, $kemosite_wordpress_base_black_lum);

// Colours

// White Background

// 3:1
$kemosite_wordpress_tetradic_colour_m90_white_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_tetradic_colour_m90_hsl_array, // hsl array of base colour
														$kemosite_wordpress_tetradic_colour_m90_white_contrast, // colour contrast on white background
														3, // target contrast
														$kemosite_wordpress_base_white_lum // white luminance
													) );
$kemosite_wordpress_tetradic_colour_m90_white_3_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_colour_m90_white_3_hsl );

// 4.5:1
$kemosite_wordpress_tetradic_colour_m90_white_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_tetradic_colour_m90_hsl_array, // hsl array of base colour
														$kemosite_wordpress_tetradic_colour_m90_white_contrast, // colour contrast on white background
														4.5, // target contrast
														$kemosite_wordpress_base_white_lum // white luminance
													) );
$kemosite_wordpress_tetradic_colour_m90_white_45_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_colour_m90_white_45_hsl );

// 7:1
$kemosite_wordpress_tetradic_colour_m90_white_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_tetradic_colour_m90_hsl_array, // hsl array of base colour
														$kemosite_wordpress_tetradic_colour_m90_white_contrast, // colour contrast on white background
														7, // target contrast
														$kemosite_wordpress_base_white_lum // white luminance
													) );
$kemosite_wordpress_tetradic_colour_m90_white_7_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_colour_m90_white_7_hsl );

// Black Background

// 3:1
$kemosite_wordpress_tetradic_colour_m90_black_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_tetradic_colour_m90_hsl_array, // hsl array of base colour
														$kemosite_wordpress_tetradic_colour_m90_black_contrast, // colour contrast on white background
														3, // target contrast
														$kemosite_wordpress_base_black_lum // white luminance
													) );
$kemosite_wordpress_tetradic_colour_m90_black_3_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_colour_m90_black_3_hsl );

// 4.5:1
$kemosite_wordpress_tetradic_colour_m90_black_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_tetradic_colour_m90_hsl_array, // hsl array of base colour
														$kemosite_wordpress_tetradic_colour_m90_black_contrast, // colour contrast on white background
														4.5, // target contrast
														$kemosite_wordpress_base_black_lum // white luminance
													) );
$kemosite_wordpress_tetradic_colour_m90_black_45_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_colour_m90_black_45_hsl );

// 7:1
$kemosite_wordpress_tetradic_colour_m90_black_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_tetradic_colour_m90_hsl_array, // hsl array of base colour
														$kemosite_wordpress_tetradic_colour_m90_black_contrast, // colour contrast on white background
														7, // target contrast
														$kemosite_wordpress_base_black_lum // white luminance
													) );
$kemosite_wordpress_tetradic_colour_m90_black_7_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_colour_m90_black_7_hsl );

// Neutrals

// White Background

// 3:1
$kemosite_wordpress_tetradic_neutral_m90_white_3_hsl_saturation	= 	kemosite_calc_neutral_sat( $kemosite_wordpress_tetradic_colour_m90_hsl_array, $kemosite_wordpress_neutral_white_3_hsl_array );
$kemosite_wordpress_tetradic_neutral_m90_white_3_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_3_hsl_array[2];
$kemosite_wordpress_tetradic_neutral_m90_white_3_hsl_array			=	array( $kemosite_wordpress_tetradic_colour_m90_hsl_array[0],
																			$kemosite_wordpress_tetradic_neutral_m90_white_3_hsl_saturation,
																			$kemosite_wordpress_tetradic_neutral_m90_white_3_hsl_lightness,
																		);
$kemosite_wordpress_tetradic_neutral_m90_white_3_hsl				=	implode( ",", $kemosite_wordpress_tetradic_neutral_m90_white_3_hsl_array );
$kemosite_wordpress_tetradic_neutral_m90_white_3_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_neutral_m90_white_3_hsl );

// 4.5:1
$kemosite_wordpress_tetradic_neutral_m90_white_45_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_tetradic_colour_m90_hsl_array, $kemosite_wordpress_neutral_white_45_hsl_array );
$kemosite_wordpress_tetradic_neutral_m90_white_45_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_45_hsl_array[2];
$kemosite_wordpress_tetradic_neutral_m90_white_45_hsl_array			=	array( $kemosite_wordpress_tetradic_colour_m90_hsl_array[0],
																			$kemosite_wordpress_tetradic_neutral_m90_white_45_hsl_saturation,
																			$kemosite_wordpress_tetradic_neutral_m90_white_45_hsl_lightness,
																		);
$kemosite_wordpress_tetradic_neutral_m90_white_45_hsl				=	implode( ",", $kemosite_wordpress_tetradic_neutral_m90_white_45_hsl_array );
$kemosite_wordpress_tetradic_neutral_m90_white_45_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_neutral_m90_white_45_hsl );

// 7:1
$kemosite_wordpress_tetradic_neutral_m90_white_7_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_tetradic_colour_m90_hsl_array, $kemosite_wordpress_neutral_white_7_hsl_array );
$kemosite_wordpress_tetradic_neutral_m90_white_7_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_7_hsl_array[2];
$kemosite_wordpress_tetradic_neutral_m90_white_7_hsl_array			=	array( $kemosite_wordpress_tetradic_colour_m90_hsl_array[0],
																			$kemosite_wordpress_tetradic_neutral_m90_white_7_hsl_saturation,
																			$kemosite_wordpress_tetradic_neutral_m90_white_7_hsl_lightness,
																		);
$kemosite_wordpress_tetradic_neutral_m90_white_7_hsl				=	implode( ",", $kemosite_wordpress_tetradic_neutral_m90_white_7_hsl_array );
$kemosite_wordpress_tetradic_neutral_m90_white_7_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_neutral_m90_white_7_hsl );

// Black Background

// 3:1
$kemosite_wordpress_tetradic_neutral_m90_black_3_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_tetradic_colour_m90_hsl_array, $kemosite_wordpress_neutral_black_3_hsl_array );
$kemosite_wordpress_tetradic_neutral_m90_black_3_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_3_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_tetradic_neutral_m90_black_3_hsl_saturation *
																			($kemosite_wordpress_neutral_black_3_hsl_array[2] / 100)
																		);
$kemosite_wordpress_tetradic_neutral_m90_black_3_hsl_array			=	array( $kemosite_wordpress_tetradic_colour_m90_hsl_array[0],
																			$kemosite_wordpress_tetradic_neutral_m90_black_3_hsl_saturation,
																			$kemosite_wordpress_tetradic_neutral_m90_black_3_hsl_lightness,
																		);
$kemosite_wordpress_tetradic_neutral_m90_black_3_hsl				=	implode( ",", $kemosite_wordpress_tetradic_neutral_m90_black_3_hsl_array );
$kemosite_wordpress_tetradic_neutral_m90_black_3_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_neutral_m90_black_3_hsl );

// 4.5:1
$kemosite_wordpress_tetradic_neutral_m90_black_45_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_tetradic_colour_m90_hsl_array, $kemosite_wordpress_neutral_black_45_hsl_array );
$kemosite_wordpress_tetradic_neutral_m90_black_45_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_45_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_tetradic_neutral_m90_black_45_hsl_saturation *
																			($kemosite_wordpress_neutral_black_45_hsl_array[2] / 100)
																		);
$kemosite_wordpress_tetradic_neutral_m90_black_45_hsl_array		=	array( $kemosite_wordpress_tetradic_colour_m90_hsl_array[0],
																			$kemosite_wordpress_tetradic_neutral_m90_black_45_hsl_saturation,
																			$kemosite_wordpress_tetradic_neutral_m90_black_45_hsl_lightness,
																		);
$kemosite_wordpress_tetradic_neutral_m90_black_45_hsl				=	implode( ",", $kemosite_wordpress_tetradic_neutral_m90_black_45_hsl_array );
$kemosite_wordpress_tetradic_neutral_m90_black_45_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_neutral_m90_black_45_hsl );

// 7:1
$kemosite_wordpress_tetradic_neutral_m90_black_7_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_tetradic_colour_m90_hsl_array, $kemosite_wordpress_neutral_black_7_hsl_array );
$kemosite_wordpress_tetradic_neutral_m90_black_7_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_7_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_tetradic_neutral_m90_black_7_hsl_saturation *
																			($kemosite_wordpress_neutral_black_7_hsl_array[2] / 100)
																		);
$kemosite_wordpress_tetradic_neutral_m90_black_7_hsl_array			=	array( $kemosite_wordpress_tetradic_colour_m90_hsl_array[0],
																			$kemosite_wordpress_tetradic_neutral_m90_black_7_hsl_saturation,
																			$kemosite_wordpress_tetradic_neutral_m90_black_7_hsl_lightness,
																		);
$kemosite_wordpress_tetradic_neutral_m90_black_7_hsl				=	implode( ",", $kemosite_wordpress_tetradic_neutral_m90_black_7_hsl_array );
$kemosite_wordpress_tetradic_neutral_m90_black_7_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_neutral_m90_black_7_hsl );

?>

<table>
	<thead>
		<tr>
			<th>Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_white_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_colour_m90_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_colour_m90_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_colour_m90_white_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_neutral_m90_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_neutral_m90_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_neutral_m90_white_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_white_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_colour_m90_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_colour_m90_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_colour_m90_white_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_neutral_m90_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_neutral_m90_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_neutral_m90_white_7_hex; ?></td>
		</tr>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_black_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_colour_m90_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_colour_m90_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_colour_m90_black_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_neutral_m90_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_neutral_m90_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_neutral_m90_black_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_black_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_colour_m90_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_colour_m90_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_colour_m90_black_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_neutral_m90_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_neutral_m90_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_neutral_m90_black_7_hex; ?></td>
		</tr>
	</tbody>
</table>

<hr>

<h2>Rectangle (Tetradic)</h2>
<p>The rectangle color scheme uses four colors organized into two complementary color pairs.</p>

<h3>+60 Degrees</h3>

<?php 

// + 60 Degrees
$kemosite_wordpress_tetradic_colour_p60_hue 		= 	( 360 + ( $kemosite_wordpress_base_primary_colour_hsl_array[0] + 60 ) ) % 360;
$kemosite_wordpress_tetradic_colour_p60_hsl_array	=	array( 
															$kemosite_wordpress_tetradic_colour_p60_hue,
															$kemosite_wordpress_base_primary_colour_hsl_array[1],
															$kemosite_wordpress_base_primary_colour_hsl_array[2]
														);
$kemosite_wordpress_tetradic_colour_p60_hsl		=	implode( ",", $kemosite_wordpress_tetradic_colour_p60_hsl_array );
$kemosite_wordpress_tetradic_colour_p60_rgb		=	kemosite_hsl_to_rgb( $kemosite_wordpress_tetradic_colour_p60_hsl );
$kemosite_wordpress_tetradic_colour_p60_rgb_array	=	explode( ",", $kemosite_wordpress_tetradic_colour_p60_rgb );
$kemosite_wordpress_tetradic_colour_p60_lum		= 	kemosite_calc_lum( 
															$kemosite_wordpress_tetradic_colour_p60_rgb_array[0],
															$kemosite_wordpress_tetradic_colour_p60_rgb_array[1],
															$kemosite_wordpress_tetradic_colour_p60_rgb_array[2]
														);
$kemosite_wordpress_tetradic_colour_p60_white_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_tetradic_colour_p60_lum, $kemosite_wordpress_base_white_lum);
$kemosite_wordpress_tetradic_colour_p60_black_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_tetradic_colour_p60_lum, $kemosite_wordpress_base_black_lum);

// Colours

// White Background

// 3:1
$kemosite_wordpress_tetradic_colour_p60_white_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_tetradic_colour_p60_hsl_array, // hsl array of base colour
														$kemosite_wordpress_tetradic_colour_p60_white_contrast, // colour contrast on white background
														3, // target contrast
														$kemosite_wordpress_base_white_lum // white luminance
													) );
$kemosite_wordpress_tetradic_colour_p60_white_3_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_colour_p60_white_3_hsl );

// 4.5:1
$kemosite_wordpress_tetradic_colour_p60_white_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_tetradic_colour_p60_hsl_array, // hsl array of base colour
														$kemosite_wordpress_tetradic_colour_p60_white_contrast, // colour contrast on white background
														4.5, // target contrast
														$kemosite_wordpress_base_white_lum // white luminance
													) );
$kemosite_wordpress_tetradic_colour_p60_white_45_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_colour_p60_white_45_hsl );

// 7:1
$kemosite_wordpress_tetradic_colour_p60_white_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_tetradic_colour_p60_hsl_array, // hsl array of base colour
														$kemosite_wordpress_tetradic_colour_p60_white_contrast, // colour contrast on white background
														7, // target contrast
														$kemosite_wordpress_base_white_lum // white luminance
													) );
$kemosite_wordpress_tetradic_colour_p60_white_7_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_colour_p60_white_7_hsl );

// Black Background

// 3:1
$kemosite_wordpress_tetradic_colour_p60_black_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_tetradic_colour_p60_hsl_array, // hsl array of base colour
														$kemosite_wordpress_tetradic_colour_p60_black_contrast, // colour contrast on white background
														3, // target contrast
														$kemosite_wordpress_base_black_lum // white luminance
													) );
$kemosite_wordpress_tetradic_colour_p60_black_3_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_colour_p60_black_3_hsl );

// 4.5:1
$kemosite_wordpress_tetradic_colour_p60_black_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_tetradic_colour_p60_hsl_array, // hsl array of base colour
														$kemosite_wordpress_tetradic_colour_p60_black_contrast, // colour contrast on white background
														4.5, // target contrast
														$kemosite_wordpress_base_black_lum // white luminance
													) );
$kemosite_wordpress_tetradic_colour_p60_black_45_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_colour_p60_black_45_hsl );

// 7:1
$kemosite_wordpress_tetradic_colour_p60_black_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
														$kemosite_wordpress_tetradic_colour_p60_hsl_array, // hsl array of base colour
														$kemosite_wordpress_tetradic_colour_p60_black_contrast, // colour contrast on white background
														7, // target contrast
														$kemosite_wordpress_base_black_lum // white luminance
													) );
$kemosite_wordpress_tetradic_colour_p60_black_7_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_colour_p60_black_7_hsl );

// Neutrals

// White Background

// 3:1
$kemosite_wordpress_tetradic_neutral_p60_white_3_hsl_saturation	= 	kemosite_calc_neutral_sat( $kemosite_wordpress_tetradic_colour_p60_hsl_array, $kemosite_wordpress_neutral_white_3_hsl_array );
$kemosite_wordpress_tetradic_neutral_p60_white_3_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_3_hsl_array[2];
$kemosite_wordpress_tetradic_neutral_p60_white_3_hsl_array			=	array( $kemosite_wordpress_tetradic_colour_p60_hsl_array[0],
																			$kemosite_wordpress_tetradic_neutral_p60_white_3_hsl_saturation,
																			$kemosite_wordpress_tetradic_neutral_p60_white_3_hsl_lightness,
																		);
$kemosite_wordpress_tetradic_neutral_p60_white_3_hsl				=	implode( ",", $kemosite_wordpress_tetradic_neutral_p60_white_3_hsl_array );
$kemosite_wordpress_tetradic_neutral_p60_white_3_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_neutral_p60_white_3_hsl );

// 4.5:1
$kemosite_wordpress_tetradic_neutral_p60_white_45_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_tetradic_colour_p60_hsl_array, $kemosite_wordpress_neutral_white_45_hsl_array );
$kemosite_wordpress_tetradic_neutral_p60_white_45_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_45_hsl_array[2];
$kemosite_wordpress_tetradic_neutral_p60_white_45_hsl_array			=	array( $kemosite_wordpress_tetradic_colour_p60_hsl_array[0],
																			$kemosite_wordpress_tetradic_neutral_p60_white_45_hsl_saturation,
																			$kemosite_wordpress_tetradic_neutral_p60_white_45_hsl_lightness,
																		);
$kemosite_wordpress_tetradic_neutral_p60_white_45_hsl				=	implode( ",", $kemosite_wordpress_tetradic_neutral_p60_white_45_hsl_array );
$kemosite_wordpress_tetradic_neutral_p60_white_45_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_neutral_p60_white_45_hsl );

// 7:1
$kemosite_wordpress_tetradic_neutral_p60_white_7_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_tetradic_colour_p60_hsl_array, $kemosite_wordpress_neutral_white_7_hsl_array );
$kemosite_wordpress_tetradic_neutral_p60_white_7_hsl_lightness 	= 	$kemosite_wordpress_neutral_white_7_hsl_array[2];
$kemosite_wordpress_tetradic_neutral_p60_white_7_hsl_array			=	array( $kemosite_wordpress_tetradic_colour_p60_hsl_array[0],
																			$kemosite_wordpress_tetradic_neutral_p60_white_7_hsl_saturation,
																			$kemosite_wordpress_tetradic_neutral_p60_white_7_hsl_lightness,
																		);
$kemosite_wordpress_tetradic_neutral_p60_white_7_hsl				=	implode( ",", $kemosite_wordpress_tetradic_neutral_p60_white_7_hsl_array );
$kemosite_wordpress_tetradic_neutral_p60_white_7_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_neutral_p60_white_7_hsl );

// Black Background

// 3:1
$kemosite_wordpress_tetradic_neutral_p60_black_3_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_tetradic_colour_p60_hsl_array, $kemosite_wordpress_neutral_black_3_hsl_array );
$kemosite_wordpress_tetradic_neutral_p60_black_3_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_3_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_tetradic_neutral_p60_black_3_hsl_saturation *
																			($kemosite_wordpress_neutral_black_3_hsl_array[2] / 100)
																		);
$kemosite_wordpress_tetradic_neutral_p60_black_3_hsl_array			=	array( $kemosite_wordpress_tetradic_colour_p60_hsl_array[0],
																			$kemosite_wordpress_tetradic_neutral_p60_black_3_hsl_saturation,
																			$kemosite_wordpress_tetradic_neutral_p60_black_3_hsl_lightness,
																		);
$kemosite_wordpress_tetradic_neutral_p60_black_3_hsl				=	implode( ",", $kemosite_wordpress_tetradic_neutral_p60_black_3_hsl_array );
$kemosite_wordpress_tetradic_neutral_p60_black_3_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_neutral_p60_black_3_hsl );

// 4.5:1
$kemosite_wordpress_tetradic_neutral_p60_black_45_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_tetradic_colour_p60_hsl_array, $kemosite_wordpress_neutral_black_45_hsl_array );
$kemosite_wordpress_tetradic_neutral_p60_black_45_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_45_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_tetradic_neutral_p60_black_45_hsl_saturation *
																			($kemosite_wordpress_neutral_black_45_hsl_array[2] / 100)
																		);
$kemosite_wordpress_tetradic_neutral_p60_black_45_hsl_array		=	array( $kemosite_wordpress_tetradic_colour_p60_hsl_array[0],
																			$kemosite_wordpress_tetradic_neutral_p60_black_45_hsl_saturation,
																			$kemosite_wordpress_tetradic_neutral_p60_black_45_hsl_lightness,
																		);
$kemosite_wordpress_tetradic_neutral_p60_black_45_hsl				=	implode( ",", $kemosite_wordpress_tetradic_neutral_p60_black_45_hsl_array );
$kemosite_wordpress_tetradic_neutral_p60_black_45_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_neutral_p60_black_45_hsl );

// 7:1
$kemosite_wordpress_tetradic_neutral_p60_black_7_hsl_saturation	=	kemosite_calc_neutral_sat( $kemosite_wordpress_tetradic_colour_p60_hsl_array, $kemosite_wordpress_neutral_black_7_hsl_array );
$kemosite_wordpress_tetradic_neutral_p60_black_7_hsl_lightness 	= 	$kemosite_wordpress_neutral_black_7_hsl_array[2] + 
																		round(	
																			$kemosite_wordpress_tetradic_neutral_p60_black_7_hsl_saturation *
																			($kemosite_wordpress_neutral_black_7_hsl_array[2] / 100)
																		);
$kemosite_wordpress_tetradic_neutral_p60_black_7_hsl_array			=	array( $kemosite_wordpress_tetradic_colour_p60_hsl_array[0],
																			$kemosite_wordpress_tetradic_neutral_p60_black_7_hsl_saturation,
																			$kemosite_wordpress_tetradic_neutral_p60_black_7_hsl_lightness,
																		);
$kemosite_wordpress_tetradic_neutral_p60_black_7_hsl				=	implode( ",", $kemosite_wordpress_tetradic_neutral_p60_black_7_hsl_array );
$kemosite_wordpress_tetradic_neutral_p60_black_7_hex 				= 	kemosite_hsl_to_hex( $kemosite_wordpress_tetradic_neutral_p60_black_7_hsl );

?>

<table>
	<thead>
		<tr>
			<th>Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_white_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_colour_p60_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_colour_p60_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_colour_p60_white_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_neutral_p60_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_neutral_p60_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_neutral_p60_white_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_white_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_colour_p60_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_colour_p60_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_colour_p60_white_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_neutral_p60_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_neutral_p60_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_neutral_p60_white_7_hex; ?></td>
		</tr>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_black_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_colour_p60_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_colour_p60_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_colour_p60_black_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_neutral_p60_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_neutral_p60_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_tetradic_neutral_p60_black_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_black_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_colour_p60_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_colour_p60_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_colour_p60_black_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_neutral_p60_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_neutral_p60_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_tetradic_neutral_p60_black_7_hex; ?></td>
		</tr>
	</tbody>
</table>

<h3><a href="#complementary">Complementary</a></h3>

<table>
	<thead>
		<tr>
			<th>Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_white_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_colour_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_colour_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_colour_white_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_neutral_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_neutral_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_neutral_white_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_white_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_colour_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_colour_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_colour_white_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_neutral_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_neutral_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_neutral_white_7_hex; ?></td>
		</tr>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_black_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_colour_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_colour_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_colour_black_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_neutral_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_neutral_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_complementary_neutral_black_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_black_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_colour_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_colour_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_colour_black_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_neutral_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_neutral_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_complementary_neutral_black_7_hex; ?></td>
		</tr>
	</tbody>
</table>

<h3>Complementary, +60 Degrees (Same as <a href="#triatic_m120">Triatic -120 Degrees</a>)</h3>

<table>
	<thead>
		<tr>
			<th>Background</th>
			<th>Colour 3:1</th>
			<th>Colour 4.5:1</th>
			<th>Colour 7:1</th>
			<th>Neutral 3:1</th>
			<th>Neutral 4.5:1</th>
			<th>Neutral 7:1</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_white_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_colour_m120_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_colour_m120_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_colour_m120_white_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_neutral_m120_white_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_neutral_m120_white_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_neutral_m120_white_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_white_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_colour_m120_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_colour_m120_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_colour_m120_white_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_neutral_m120_white_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_neutral_m120_white_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_neutral_m120_white_7_hex; ?></td>
		</tr>
		<tr>
			<td bgcolor="<?php echo $kemosite_wordpress_base_black_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_colour_m120_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_colour_m120_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_colour_m120_black_7_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_neutral_m120_black_3_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_neutral_m120_black_45_hex; ?>">&nbsp;</td>
			<td bgcolor="<?php echo $kemosite_wordpress_triadic_neutral_m120_black_7_hex; ?>">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo $kemosite_wordpress_base_black_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_colour_m120_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_colour_m120_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_colour_m120_black_7_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_neutral_m120_black_3_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_neutral_m120_black_45_hex; ?></td>
			<td><?php echo $kemosite_wordpress_triadic_neutral_m120_black_7_hex; ?></td>
		</tr>
	</tbody>
</table>