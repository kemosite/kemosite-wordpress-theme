<?php

// sRGB under D65 "C" (TCX) Simulation, https://connect.pantone.com
$pantone_coty_colours = array(
	'102,103,171' => 'Very Peri (2022)',
	'147,149,151' => 'Ultimate Gray (2021)',
	'245,223,77' => 'Illuminating (2021)',
	'0,70,128' => 'Classic Blue (2020)',
	'255,109,112' => 'Living Coral, 2019',
	'101,78,163' => 'Ultra Violet (2018)',
	'132,189,0)' => 'Greenery (2017)',
	'242,221,222' => 'Rose Quartz (2016)',
	'137,171,227' => 'Serenity (2016)',
	'173,101,95' => 'Marsala (2015)',
	'181,101,167' => 'Radiant Orchid (2014)',
	'0,153,123' => 'Emerald (2013)',
	'225,82,61' => 'Tangerine Tango (2012)',
	'203,101,134' => 'Honeysuckle (2011)',
	'77,182,173' => 'Turquoise (2010)',
	'235,191,87' => 'Mimosa (2009)',
	'99,100,165' => 'Blue Iris (2008)',
	'157,54,63' => 'Chili Pepper (2007)',
	'222,206,187' => 'Sand Dollar (2006)',
	'91,179,176' => 'Blue Turquoise (2005)',
	'226,101,77' => 'Tigerlily (2004)',
	'127,201,203' => 'Aqua Sky (2003)',
	'189,54,69' => 'True Red (2002)',
	'195,78,124' => 'Fuchsia Rose (2001)',
	'152,179,209' => 'Cerulean (2000)',
);

$pantone_coty_colours_rgb_array 		=	array_keys( $pantone_coty_colours );
$pantone_coty_colour_this_year_rgb 		=	$pantone_coty_colours_rgb_array[0];
$pantone_coty_colour_this_year_hex 		=	kemosite_rgb_to_hex( $pantone_coty_colour_this_year_rgb );

?>