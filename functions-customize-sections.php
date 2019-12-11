<?php
/* [Shortcodes Description Page] */
// add_theme_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '' )
function kemosite_shortcodes_description_page() {
	?>
	<style>table th, table td { padding: .25em; }</style>
	<h1>Available Shortcodes</h1>
	<table>
		<tr>
			<th style="text-align: left;">Shortcode</th>
			<th style="text-align: left;">Description</th>
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
			<td><?php echo htmlspecialchars('<li class="accordian-item" data-accordion-item><a href="#" class="accordion-title">'.$attributes['title'].'</a><div class="accordion-content" data-tab-content>$content</div></li>'); ?></td>
		</tr>
	</table>
	<?php
}
function add_shortcodes_description_page() {
	add_theme_page( 'Available Shortcodes', 'Available Shortcodes', 'edit_theme_options', 'kemosite-shortcodes-description', 'kemosite_shortcodes_description_page' );
}
add_action( 'admin_menu', 'add_shortcodes_description_page' );

?>