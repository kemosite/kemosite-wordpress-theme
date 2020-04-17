<?php

/* [Shortcodes Description Page] */
// add_theme_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '' )
function kemosite_shortcodes_description_page() {
	?>
	<style>table th, table td { padding: .25em; }</style>
	<h1>Available Shortcodes</h1>
	<table>
		<caption>Available Shortcodes</caption><!-- Caption added for accessibility -->
		<tr>
			<th scope="col" style="text-align: left;">Shortcode</th>
			<th scope="col" style="text-align: left;">Description</th>
		</tr>
		<tr>
			<td>[dropcap]</td>
			<td><?php echo htmlspecialchars('<span class="dropcap">$content</span>'); ?></td>
		</tr>
		<tr>
			<td>[blockquote]</td>
			<td><?php echo htmlspecialchars('<blockquote>$content</blockquote>'); ?></td>
		</tr>
		<tr>
			<td>[accordion]</td>
			<td><?php echo htmlspecialchars('<ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true">$content</ul>'); ?></td>
		</tr>
		<tr>
			<td>[accordion_item],<br>
			[accordion_full_width]</td>
			<td><?php echo htmlspecialchars('<li class="accordian-item" data-accordion-item><a href="#" class="accordion-title">$attributes[\'title\']</a><div class="accordion-content" data-tab-content>$content</div></li>'); ?></td>
		</tr>
	</table>
	<?php
}
function add_shortcodes_description_page() {
	add_theme_page( 'Available Shortcodes', 'Available Shortcodes', 'edit_theme_options', 'kemosite-shortcodes-description', 'kemosite_shortcodes_description_page' );
}
add_action( 'admin_menu', 'add_shortcodes_description_page' );



/* [How To Use Page] */
// add_theme_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '' )
function kemosite_howtouse_description_page() {
	?>
	<style>table th, table td { padding: .25em; }</style>
	<h1>How To Use This Theme</h1>
	<h2>General Layout</h2>
		<p>Self-serve Header vs. Seek Assistance Footer.</p>
	<h2>Customizing Colours</h2>
		<p>Custom colour settings are available in the theme settings under "Appearance -> Customize".</p>
	<h2>Design System</h2>
		<ul>
			<li>A Set of Components. These are sometimes known as a pattern library, reusable UI elements and associated code that brings consistency to your website.</li>
			<li>Design Principles. A set of guidelines that define how your organisation approaches designing online experiences. They are a framework for decision making.</li>
			<li>Content Style Guide. A set of guidelines for content creators which help ensure consistency in the tone of voice across your website.</li>
			<li>A Service Manual. Documentation that covers digital governance and how you manage your digital projects.</li>
		</ul>
	<h3>Components</h3>
		<ul>
			<li>Type Hierarchy</li>
			<li>Page Templates</li>
			<li>Assets</li>
			<li>Email Templates</li>
			<li>Popovers - modal views that shows on a content screen when a user clicks on a control button or within a defined area</li>
			<li>Form Elements</li>
			<li>UI Inventory</li>
			<li>Component Library</li>
			<li>Buttons</li>
			<li>Lists</li>
			<li>Colours</li>
			<li>Graphs (using <a href="https://www.chartjs.org/" target="graph_documentation">graph.js</a>)</li>
		</ul>

	<?php
}
function add_howtouse_description_page() {
	add_theme_page( 'How To Use This Theme', 'How To Use This Theme', 'edit_theme_options', 'kemosite-howtouse-description', 'kemosite_howtouse_description_page' );
}
add_action( 'admin_menu', 'add_howtouse_description_page' );

?>