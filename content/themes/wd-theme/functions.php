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

    // figure out the url segments
    $_SERVER['REQUEST_URI_PATH'] = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $segments = explode('/', $_SERVER['REQUEST_URI_PATH']);
    
    $tags = get_tags();
    foreach ($tags as $tag){
        $tag_link = get_tag_link($tag->term_id);
        if (($segments[1] == 'tag') && ($segments[2] == "{$tag->slug}")) {
            $html .= '<li class="current-cat">';
        } else {
            $html .= "<li>";
        }
        $html .= "<a href='{$tag_link}'>";
        $html .= "{$tag->name}";
        $html .= "</a>";
        $html .= "</li>";
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

/**
 * Outputs Comments Markup
 *
 * @return html
 */
function mytheme_comment($comment, $args, $depth) { 
    $GLOBALS['comment'] = $comment;
?>
    <li>
        <div class="comment">
            <div class="comment-bd">
                <?php comment_text(); ?>
            </div>
            <div class="comment-meta">
                <div class="media">
                    <div class="media-element">
                        <a href="<?php comment_author_url(); ?>" rel="external"><?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?></a>
                    </div>
                    <div class="media-bd">
                        <?php printf( __('%s'), get_comment_date('M d Y')); ?> | <a href="<?php comment_author_url(); ?>" rel="external"><?php printf(__('%s'), get_comment_author()); ?></a>
                    </div>
                </div>
            </div>
        </div>
<?php
}

/**
 * Outputs Textarea first in the comment form markup
 *
 * @return html
 */
add_action( 'comment_form_top', 'add_textarea' );

function add_textarea() {
    echo '<label for="comment-copy" class="isHidden">' . _x( 'Comment', 'noun' ) . '</label><div class="pointer"><textarea class="input input_alt input_textarea" id="comment-copy" name="comment" cols="45" rows="8" aria-required="true" placeholder="Enter message here:"></textarea></div>';
}



