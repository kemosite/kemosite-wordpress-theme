<?php

/* [Shortcodes Description Page] */
// add_theme_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '' )
function kemosite_shortcodes_description_page() {
	require_once( "appearance-support-pages/available-shortcodes.php" );
}
function add_shortcodes_description_page() {
	add_theme_page( 'Available Shortcodes', 'Available Shortcodes', 'edit_theme_options', 'kemosite-shortcodes-description', 'kemosite_shortcodes_description_page' );
}
add_action( 'admin_menu', 'add_shortcodes_description_page' );

/* [How To Use Page] */
// add_theme_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '' )
function kemosite_howtouse_description_page() {
	require_once( "appearance-support-pages/how-to-use.php" );
}
function add_howtouse_description_page() {
	add_theme_page( 'How To Use This Theme', 'How To Use This Theme', 'edit_theme_options', 'kemosite-howtouse-description', 'kemosite_howtouse_description_page' );
}
add_action( 'admin_menu', 'add_howtouse_description_page' );

/* [Design System] */
// add_theme_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '' )
function kemosite_designsystem_description_page() {
	require_once( "appearance-support-pages/design-patterns.php" );
}
function add_designsystem_description_page() {
	add_theme_page( 'Design System', 'Design System', 'edit_theme_options', 'kemosite-designsystem-description', 'kemosite_designsystem_description_page' );
}
add_action( 'admin_menu', 'add_designsystem_description_page' );

?>