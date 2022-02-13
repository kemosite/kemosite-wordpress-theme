<style>@import url("<?php echo get_template_directory_uri() . '/style.css' ?>/admin-css.css"); </style>

<h1>Available Shortcodes</h1>

<hr>

<table>
	
	<caption>Available Shortcodes</caption><!-- Caption added for accessibility -->
	
	<thead>
		<tr>
			<th scope="col" style="text-align: left;">Shortcode</th>
			<th scope="col" style="text-align: left;">Description</th>
		</tr>	
	</thead>

	<tbody>
		<tr>
			<td>[accordion]</td>
			<td><?php echo htmlspecialchars('<ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true">$content</ul>'); ?></td>
		</tr>
		<tr>
			<td>[accordion_item],<br>
			[accordion_full_width]</td>
			<td><?php echo htmlspecialchars('<li class="accordian-item" data-accordion-item><a href="#" class="accordion-title">$attributes[\'title\']</a><div class="accordion-content" data-tab-content>$content</div></li>'); ?></td>
		</tr>
		<tr>
			<td>[blockquote]</td>
			<td><?php echo htmlspecialchars('<blockquote>$content</blockquote>'); ?></td>
		</tr>
		<tr>
			<td>[callout ((primary|secondary|success|warning|alert)="true")]</td>
			<td><?php echo htmlspecialchars('<div class="callout (primary|secondary|success|warning|alert)">$content</div>'); ?></td>
		</tr>
		<tr>
			<td>[dropcap]</td>
			<td><?php echo htmlspecialchars('<span class="dropcap">$content</span>'); ?></td>
		</tr>
	</tbody>
	
</table>