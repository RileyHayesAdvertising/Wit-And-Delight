<?php
/**
 * W&D Theme
 *
 * @category   WD_Theme
 * @package    WD_Theme
 * @subpackage Functions
 * @author     
 * @author     
 * @version    $Id$
 */

/**
 * Theme Supports
 */
add_theme_support('post-thumbnails');
/**
 * Includes
 */
include_once 'modules/register-post-types.php';
include_once 'modules/register-taxonomies.php';

/**
 * Widget Includes
 */
include_once 'widgets/skeleton-widget.php';

/**
 * Constants
 */
define('DISALLOW_FILE_EDIT', true); // because we don't want the client to modify files directly on server.
define('WD_THEME_PATH_URL', get_template_directory_uri() . '/');

/**
 * Register sidebars
 */
register_sidebar(
    array(
        'name'        => 'Example Sidebar',
        'id'          => 'wd_example_sidebar',
        'description' => 'Example Sidebar. Rename and use as a skeleton for '
                         . 'other dynamic sidebars.'
    )
);

/* add enqueue scripts */
add_action('wp_enqueue_scripts', 'enqueueScripts');
add_action('wp_enqueue_scripts', 'enqueueStyles');

/* remove defaults from wp_head */
remove_action( 'wp_head', 'feed_links' );
remove_action( 'wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'index_rel_link');
remove_action( 'wp_head', 'parent_post_rel_link');
remove_action( 'wp_head', 'start_post_rel_link');
remove_action( 'wp_head', 'adjacent_posts_rel_link');
remove_action( 'wp_head', 'wp_generator');
function remove_comments_rss( $for_comments ) {
    return;
}
add_filter('post_comments_feed_link','remove_comments_rss');
add_action('widgets_init', 'my_remove_recent_comments_style');
function my_remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}

/**
 * Make sure the default link url for media is none.
 *
 */
function rkv_imagelink_setup() {
    $image_set = get_option( 'image_default_link_type' );
        if ($image_set !== 'none') {
            update_option('image_default_link_type', 'none');
        }
}
add_action('admin_init', 'rkv_imagelink_setup', 10);

/**
 * Make sure the default image alignment for media is none.
 *
 */
function rkv_imagealign_setup() {
    $image_set_align = get_option( 'image_default_align' );
        if ($image_set_align !== 'none') {
            update_option('image_default_align', 'none');
        }
}
add_action('admin_init', 'rkv_imagealign_setup', 10);

/**
 * Find the first image in a post.
 *
 * @return image URL
 */
function the_first_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];

    return $first_img;
}

/**
 * Returns a list of tags
 *
 * @return html list of all tags
 */
 function tag_list() {
    $tags = get_tags();
    foreach ($tags as $tag){
        $tag_link = get_tag_link($tag->term_id);
        $html .= "<li><a href='{$tag_link}'>";
        $html .= "{$tag->name}</a></li>";
    }
    echo $html;
}

/**
 * Strips title attributes from category links
 *
 * @return html
 */
function wp_list_categories_remove_title_attributes($output) {
    $output = preg_replace('` title="(.+)"`', '', $output);
    return $output;
}
add_filter('wp_list_categories', 'wp_list_categories_remove_title_attributes');

/**
 * Strips cat classes from category list
 *
 * @return html
 */
function remove_cat_item($wp_list_categories) {
    $patterns = array(); $replacements = array();
    $patterns[0] = '/class=\"(cat-item cat-item-[0-9]+) current-cat\"/';
    $replacements[0] = 'class="current-cat" ';
    $patterns[1] = '/ class="cat-item cat-item-(.*?)\"/';
    $replacements[1] = '';
    return preg_replace($patterns, $replacements, $wp_list_categories);
}
add_filter('wp_list_categories','remove_cat_item');

/**
 * Removes width and height from images
 */
add_filter( 'post_thumbnail_html', 'remove_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_dimensions', 10 );
add_filter( 'the_content', 'remove_dimensions', 10 );

function remove_dimensions( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}