<?php

/**
 * Shortcodes from Central theme; Convert to nearest Foundation equivalent.
 *
 * @package kemosite-wordpress-theme
 */

/* [Apply Shortcodes] */
add_filter('widget_text', 'do_shortcode');
add_filter( 'the_excerpt', 'do_shortcode');


// add more buttons to the html editor
function appthemes_add_quicktags() {
    if (wp_script_is('quicktags')){
?>
    <script type="text/javascript">
    // QTags.addButton( id, display, arg1, arg2, access_key, title, priority, instance );
    QTags.addButton( 'kb_shortcode', 'Insert Shortcode', '[shortcode]', '[/shortcode]', '', 'Insert Shortcode', 200 );
    </script>
<?php
    }
}
add_action( 'admin_print_footer_scripts', 'appthemes_add_quicktags' );

/* [Remove Paragraph Tags from Shortcodes] */
function shortcode_wpautop_fix($content) {   
    $wpautop_elements = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );

    $content = strtr($content, $wpautop_elements);

    return $content;
}
add_filter('the_content', 'shortcode_wpautop_fix');

/* Dropcaps shortcode */
function dropcaps_shortcode_method($attributes, $content) {

    $output = "";
    $output .= '<span class="dropcap">'.$content.'</span>' . "\n";
    return $output;

}
add_shortcode('dropcaps', 'dropcaps_shortcode_method');

/* Blockquote shortcode */
function blockquote_shortcode_method($attributes, $content) {

    $output = ""; 
    $output .= '<blockquote>' . do_shortcode($content) . '</blockquote>' . "\n";
    return $output;
}
add_shortcode('blockquote', 'blockquote_shortcode_method');

/* Accordion shortcode */
function accordion_shortcode_method($attributes, $content) {

    $output = "";
    $output .= '<ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true">' . "\n";
    $output .= do_shortcode($content) . "\n";
    $output .= '</ul>' . "\n";
    return $output;

}
add_shortcode('accordion', 'accordion_shortcode_method');

/* Accordion item shortcode */
function accordion_item_shortcode_method($attributes, $content) {
    
    if ($attributes !== NULL):

        $output = "";
        $output .= '<li class="accordian-item" data-accordion-item>' . "\n";
        
        if ( array_key_exists('title', $attributes) && $attributes['title'] !== NULL ): $output .= '<a href="#" class="accordion-title">'.$attributes['title'].'</a>' . "\n"; endif;
        if ($attributes['caption'] !== NULL): $output .= '<a href="#" class="accordion-title">'.$attributes['caption'].'</a>' . "\n"; endif;

        $output .= '<div class="accordion-content" data-tab-content>' . "\n";
        
        $output .= do_shortcode($content) . "\n";

        $output .= '</div>' . "\n";
        $output .= '</li>' . "\n";

    endif;

    return $output;

}
add_shortcode('accordion_item', 'accordion_item_shortcode_method');
add_shortcode('accordion_full_width', 'accordion_item_shortcode_method');

/* List shortcode */
function list_shortcode_method($attributes, $content) {

    if (@$attributes['list_id'] && @$attributes['list_id'] !== NULL): @$list_id = $attributes['list_id']; endif;
    @$columns = ($attributes['columns'] > 1) ? $attributes['columns'] : 1;

    $output = "";

    $output .= '<style>';
    $output .= '#list_'.$list_id.' ul, #list_'.$list_id.' ol { ';
    $output .= 'columns: '.$columns.' auto;';
    $output .= 'margin-top: 1em;';
    $output .= '}';
     $output .= '#list_'.$list_id.' ul li, #list_'.$list_id.' ol li { ';
    $output .= 'margin-top: 0';
    $output .= '}';
    $output .= '</style>';

    $output .= '<div id="list_'.$list_id.'">';
    $output .= do_shortcode($content) . "\n";
    $output .= '</div>';
    return $output;

}
add_shortcode('unordered_list', 'list_shortcode_method');
add_shortcode('ordered_list', 'list_shortcode_method');

/* Tabs shortcode */
function tabs_shortcode_method($attributes, $content) {

    if ($attributes !== NULL && 
    $attributes['id']):

        $output = "";
        $output .= '<ul class="tabs" data-tabs id="'.$attributes['id'].'">' . "\n";
        
        if ($attributes['panels']):

            $panel_names = explode(",", $attributes['panels']);

            foreach($panel_names as $id => $panel_name):

                $output .= '<li class="tabs-title"><a data-tabs-target="#'.$id.'" href="#'.$id.'">'.$panel_name.'</a></li>' . "\n";

            endforeach;

        endif;
        
        $output .= '</ul>' . "\n";
        $output .= '<div class="tabs-content" data-tabs-content="'.$attributes['id'].'">' . "\n";
        $output .= do_shortcode($content) . "\n";
        $output .= '</div>' . "\n";
        return $output;

    endif;

}
add_shortcode('tabs', 'tabs');

function tab_shortcode_method($attributes, $content) {

    if ($attributes !== NULL && 
    $attributes['id']):

        $output = "";

        $output .= '<div class="tabs-panel" id="'.$attributes['id'].'">' . "\n";
        $output .= do_shortcode($content) . "\n";
        $output .= '</div>' . "\n";

        return $output;

    endif;

}
add_shortcode('tab', 'tab_shortcode_method');

/* Progress bars shortcode */
function progress_bars_shortcode_method($attributes, $content) {

    $output = "";

    $output .= '<div class="progress" role="progressbar" tabindex="0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">' . "\n";
    $output .= do_shortcode($content) . "\n";
    $output .= '</div>' . "\n";

    return $output;

}
add_shortcode('progress_bars', 'progress_bars_shortcode_method');

function progress_bar_shortcode_method($attributes, $content) {

    $output = "";

    if ($attributes !== NULL):
        
        if (is_numeric($attributes['percent_done'])): $output .= '<div class="progress-meter" style="width: '.$attributes['percent_done'].'%"></div>' . "\n"; endif;

    endif;

    return $output;

}
add_shortcode('progress_bar', 'progress_bar_shortcode_method');

/* Table shortcode */
function table_shortcode_method($attributes, $content) {

    $output = "";

    $output .= '<table>' . "\n";
    $output .= do_shortcode($content) . "\n";
    $output .= '</table>' . "\n";

    return $output;

}
add_shortcode('table', 'table_shortcode_method');

function table_head_shortcode_method($attributes, $content) {

    $output = "";

    $output .= '<thead>' . "\n";
    $output .= do_shortcode($content) . "\n";
    $output .= '</thead>' . "\n";

    return $output;

}
add_shortcode('table_head', 'table_head_shortcode_method');

function table_body_shortcode_method($attributes, $content) {

    $output = "";

    $output .= '<tbody>' . "\n";
    $output .= do_shortcode($content) . "\n";
    $output .= '</tbody>' . "\n";

    return $output;

}
add_shortcode('table_body', 'table_body_shortcode_method');

function table_row_shortcode_method($attributes, $content) {

    $output = "";

    $output .= '<tr>' . "\n";
    $output .= do_shortcode($content) . "\n";
    $output .= '</tr>' . "\n";

    return $output;

}
add_shortcode('table_row', 'table_row_shortcode_method');

function table_cell_head_shortcode_method($attributes, $content) {

    $output = "";

    $output .= '<th>' . "\n";
    $output .= do_shortcode($content) . "\n";
    $output .= '</th>' . "\n";

    return $output;

}
add_shortcode('table_cell_head', 'table_cell_head_shortcode_method');

function table_cell_body_shortcode_method($attributes, $content) {

    $output = "";

    $output .= '<td>' . "\n";
    $output .= do_shortcode($content) . "\n";
    $output .= '</td>' . "\n";

    return $output;

}
add_shortcode('table_cell_body', 'table_cell_body_shortcode_method');

/* Recent products shortcode */
function kemosite_woocommerce_recent_products_method($attributes, $content) {

    $limit = (int) $attributes['limit'];

    $args = array(
        'limit' => $limit,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $shortcode = new WC_Shortcode_Products( $args );

    return $shortcode->get_content();

}
add_shortcode('kemosite_woocommerce_recent_products', 'kemosite_woocommerce_recent_products_method');

function latest_post_method($attributes, $content) {

    // $attributes: type, post_number, category, text_length

    // global $post;

    $args = array(
        'numberposts' => $attributes['post_number'],
        'offset' => 0,
        'category' => $attributes['category'],
        'orderby' => 'post_date',
        'order' => 'DESC',
        'include' => '',
        'exclude' => '',
        'meta_key' => '',
        'meta_value' =>'',
        'post_type' => 'post',
        'post_status' => 'publish',
        'suppress_filters' => true
    );

    $recent_posts = wp_get_recent_posts($args);

    $output = "";

    foreach ( $recent_posts as $post ) :

        /*
        $permalink = get_permalink($post['ID']);
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post['ID'] ), 'single-post-thumbnail' );
        $image_src = esc_url($image[0]);
        */

        $permalink = get_permalink($post['ID']);
        $image = wp_get_attachment_image_src( get_post_thumbnail_id($post['ID']), 'single-post-thumbnail');

    	if (is_array($image)):
    		$image_src = esc_url($image[0]);
    	endif;

        $image_srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id($post['ID']), 'single-post-thumbnail', wp_get_attachment_metadata($post['ID']) );
        $image_sizes = wp_get_attachment_image_sizes( get_post_thumbnail_id($post['ID']), 'single-post-thumbnail', wp_get_attachment_metadata($post['ID']) );

        /*
        echo "<pre>";
        print_r($post);
        echo "</pre>";      
        */

        /*
        echo '<div class="cropped image" style="max-width:' . esc_attr( $dimensions['width'] ) . 'px; width: 100%; height:' . esc_attr( $dimensions['width'] ) . 'px; background-image: url(\'' . esc_url( $image ) . '\');"><img src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '"></div>';

        <?php if ($image && $image_srcset && $image_sizes): ?>
                            <div class="featured image"><img style="width: 100%;" src="<?php echo $image[0]; ?>" srcset="<?php echo esc_attr( $image_srcset ); ?>" sizes="<?php echo esc_attr( $image_sizes ); ?>"></div>
                        <?php endif; ?>

        */
        
        $output .= '<div class="media-object stack-for-small">'."\n";

       if (is_array($image)):
            $output .= '<div class="media-object-section">
                <div class="thumbnail" style="background-image: url(\'' . esc_url( $image_src ) . '\')">
                <a href="'.$permalink.'"><img src="' . esc_url( $image_src ) . '" srcset="' . esc_attr( $image_srcset ) . '" sizes="' . esc_attr( $image_sizes ) . '" alt="' . $post['post_title'] . '"></a>
                </div>
            </div>';
        endif;
        $output .= '<div class="media-object-section main-section">
            <h4><a href="'.$permalink.'">'.$post['post_title'].'</a></h4>
            <p class="span-all-columns">'.kemosite_custom_excerpt($post['ID']).'</p>
          </div>
        </div>
        <br>';

    endforeach;

    return $output;

}
add_shortcode('latest_post', 'latest_post_method');

/* [More Shortcodes] */
require_once ("functions-shortcodes-row.php");
require_once ("functions-shortcodes-columns.php");
require_once ("functions-shortcodes-grid-container.php");
require_once ("functions-shortcodes-callouts.php");
require_once ("functions-shortcodes-forms.php");
require_once ("functions-shortcodes-buttons.php");

// require_once ("functions-shortcodes-central.php"); // Rewriting Central Shortcodes as Foundation functions.

?>