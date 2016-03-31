<?php
/* ====================================================================================================
   Define Constants
==================================================================================================== */
define('DISALLOW_FILE_EDIT', true); // because we don't want the client to modify files directly on server.

/* ====================================================================================================
   Theme Support Configuration
==================================================================================================== */
add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');
add_theme_support('menus');
add_theme_support('title-tag');
remove_theme_support('post-formats');
remove_theme_support('custom-background');
remove_theme_support('custom-header');
remove_theme_support('html5');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/* ====================================================================================================
 Enqueue Scripts and Styles
==================================================================================================== */
function include_scripts_and_styles() {
    wp_enqueue_style(
        'wd-style',
        get_template_directory_uri() . '/assets/styles/global.css',
        array(),
        '',
        'screen and (min-width: 1em)'
    );

    wp_enqueue_script(
        'wd-script',
        get_template_directory_uri() . '/assets/scripts/global.js',
        array('jquery'),
        '',
        true
    );
}
add_action('wp_enqueue_scripts', 'include_scripts_and_styles');

/* ====================================================================================================
 Register Menus
==================================================================================================== */
function register_wd_menus() {
  register_nav_menus(
    array(
      'masthead-menu' => __('Masthead Navigation'),
      'sidebar-categories-menu' => __('Sidebar Categories'),
      'footer-menu' => __('Footer Navigation')
    )
  );
}
add_action('init', 'register_wd_menus');

/* ====================================================================================================
 Customize Admin Panel
==================================================================================================== */
function hide_admin_pages(){
    global $submenu;
    unset($submenu['themes.php'][6]); // remove customize link
    remove_action('admin_menu', '_add_themes_utility_last', 101); // remove theme editor link
}
add_action('admin_menu', 'hide_admin_pages');

/* ====================================================================================================
 Disable Update Notifications for ACF
==================================================================================================== */

function filter_plugin_updates( $value ) {
    unset( $value->response['advanced-custom-fields/acf.php'] );
    return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );

/* ====================================================================================================
   Media Defaults
==================================================================================================== */
/* ensure the default link url for media is none. */
function rkv_imagelink_setup() {
    $image_set = get_option( 'image_default_link_type' );
        if ($image_set !== 'none') {
            update_option('image_default_link_type', 'none');
        }
}
add_action('admin_init', 'rkv_imagelink_setup', 10);

/*  ensure the default image alignment for media is none. */
function rkv_imagealign_setup() {
    $image_set_align = get_option( 'image_default_align' );
        if ($image_set_align !== 'none') {
            update_option('image_default_align', 'none');
        }
}
add_action('admin_init', 'rkv_imagealign_setup', 10);

/* ====================================================================================================
   Images
==================================================================================================== */
/* find the first image in a post and return it */
function the_first_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];

    return $first_img;
}

/* Remove the first image in a post for single page */
/* used in conjunction with the_first_image to avoid duplicates */
function remove_first_image ($content) {
    if (!is_page() && !is_feed() && !is_feed() && !is_home()) {
        $content = preg_replace("/<img[^>]+\>/i", "", $content, 1);
    } return $content;
}
add_filter('the_content', 'remove_first_image');

/* Removes width and height from images */
add_filter( 'post_thumbnail_html', 'remove_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_dimensions', 10 );
add_filter( 'the_content', 'remove_dimensions', 10 );

function remove_dimensions( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

/* ====================================================================================================
   Comments
==================================================================================================== */
/* comments markup */
function mytheme_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
?>
    <li class="<?php if( '0' != $comment->comment_parent ){ echo 'vlist-item_indented'; } ?>">
        <div class="comment <?php if($comment->user_id == 2) { echo 'comment_kate '; } ?>">
            <div class="comment-bd">
                <?php comment_text(); ?>
            </div>
            <div class="comment-meta">
                <div class="media">
                    <div class="media-element">
                        <?php if($comment->comment_author_url != "") { ?><a href="<?php comment_author_url(); ?>" rel="external"><?php } ?><?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?><?php if($comment->comment_author_url != "") { ?></a><?php } ?>
                    </div>
                    <div class="media-bd">
                        <?php printf( __('%s'), get_comment_date('M d Y')); ?> | <?php if($comment->comment_author_url != "") { ?><a href="<?php comment_author_url(); ?>" rel="external"><?php } ?><?php printf(__('%s'), get_comment_author()); ?><?php if($comment->comment_author_url != "") { ?></a><?php } ?>
                    </div>
                </div>
            </div>
        </div>
<?php
}

/* Outputs Textarea first in the comment form markup */
function add_textarea() {
    echo '<label for="comment-copy" class="isVisuallyHidden">' . _x( 'Comment', 'noun' ) . '</label><div class="pointer"><textarea class="input input_alt input_textarea" id="comment-copy" name="comment" cols="45" rows="8" aria-required="true" placeholder="ENTER MESSAGE HERE:"></textarea></div>';
}
add_action( 'comment_form_top', 'add_textarea' );

/* Allows for custom default avatar - http://buildinternet.com/2009/02/how-to-change-the-default-gravatar-in-wordpress/*/
add_filter( 'avatar_defaults', 'newgravatar' );

function newgravatar ($avatar_defaults) {
    $myavatar = 'http://witanddelight.com/wp-content/themes/wd-theme/assets/images/comment-avatar.png';
    $avatar_defaults[$myavatar] = "Kate's Custom Avatar";
    return $avatar_defaults;
}

/* ====================================================================================================
   Excerpts
==================================================================================================== */
/* custom length */
function my_excerpt_length($length) {
    return 46; // whatever you want the length to be.
}
add_filter('excerpt_length', 'my_excerpt_length');

/* custom read more */
function new_excerpt_more( $more ) {
	return ' ... <a href="'. get_permalink( get_the_ID() ) . '">Read More</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/* ====================================================================================================
 Include Classes
==================================================================================================== */
require_once('classes/post-like.php');
