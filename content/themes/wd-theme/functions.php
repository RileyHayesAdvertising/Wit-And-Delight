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

add_action('wp_enqueue_scripts', 'enqueueScripts');
add_action('wp_enqueue_scripts', 'enqueueStyles');

/**
 * Register & enqueue all Javascript files for the theme.
 *
 * @return void
 */
function enqueueScripts()
{
    // Global script
    wp_register_script(
        'wd-global',
        WD_THEME_PATH_URL . 'assets/scripts/global.js',
        array('jquery'),
        '1.0',
        true
    );

    wp_enqueue_script('wd-global');

    // Comment reply script for threaded comments (registered in WP core)
    if (is_singular() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

/**
 * Register & enqueue all stylesheets for the theme. /style.css is not used.
 *
 * @return void
 */
function enqueueStyles()
{
    global $wp_styles;

    // Primary Screen Stylesheet
    wp_register_style(
        'wd-screen',
        WD_THEME_PATH_URL . 'assets/styles/screen.css',
        false,
        '1.0',
        'screen'
    );

    // Print Stylesheet
    wp_register_style(
        'wd-print',
        WD_THEME_PATH_URL . 'assets/styles/print.css',
        false,
        '1.0',
        'print'
    );

    // IE 9 Stylesheet
    wp_register_style(
        'wd-ie9',
        WD_THEME_PATH_URL . 'assets/styles/ie9.css',
        false,
        '1.0',
        'screen'
    );

    // IE 8 Stylesheet
    wp_register_style(
        'wd-ie8',
        WD_THEME_PATH_URL . 'assets/styles/ie8.css',
        false,
        '1.0',
        'screen'
    );

    // IE 7 Stylesheet
    wp_register_style(
        'wd-ie7',
        WD_THEME_PATH_URL . 'assets/styles/ie7.css',
        false,
        '1.0',
        'screen'
    );

    // Conditional statements for IE stylesheets
    $wp_styles->add_data('wd-ie9', 'conditional', 'lte IE 9');
    $wp_styles->add_data('wd-ie8', 'conditional', 'lte IE 8');
    $wp_styles->add_data('wd-ie7', 'conditional', 'lte IE 7');

    // enqueue!
    wp_enqueue_style('wd-screen');
    wp_enqueue_style('wd-print');
    wp_enqueue_style('wd-ie9');
    wp_enqueue_style('wd-ie8');
    wp_enqueue_style('wd-ie7');
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