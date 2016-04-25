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

    wp_localize_script(
        'wd-script',
        'WPVARS',
        array(
            'siteurl' => get_bloginfo('url'),
            'ajaxURL' => admin_url('admin-ajax.php')
        )
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
    global $post;
    $first_img = '';
    $output = preg_match('/(wp-image-[0-9]{1,})/i', $post->post_content, $matches);
    $first_img = $matches[1];

    $first_img_id = str_replace('wp-image-','',$first_img);

    if (is_single()) {
        $first_img_src = wp_get_attachment_image_src($first_img_id, 'large');
    } else {
        $first_img_src = wp_get_attachment_image_src($first_img_id, 'medium');
    }

    return $first_img_src[0];
}

/* Remove the first image in a post for single page */
/* used in conjunction with the_first_image to avoid duplicates */
function remove_first_image ($content) {
    if (!is_page() && !is_feed() && !is_feed() && !is_home()) {
        $content = preg_replace('/<img[^>]+\>/i', '', $content, 1);
    } return $content;
}
add_filter('the_content', 'remove_first_image');

/* Removes width and height from images */
add_filter( 'post_thumbnail_html', 'remove_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_dimensions', 10 );
add_filter( 'the_content', 'remove_dimensions', 10 );

function remove_dimensions( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', '', $html );
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
function wd_excerpt_length($length) {
    return 20; // whatever you want the length to be.
}
add_filter('excerpt_length', 'wd_excerpt_length');

/* custom read more */
function new_excerpt_more( $more ) {
	return ' ...';
}
add_filter('excerpt_more', 'new_excerpt_more');

/* ====================================================================================================
   Social Followers Count Rounding
==================================================================================================== */
function round_follower_count($total) {
    if ($total > 1000000) {
        return round($total / 1000000, 1) . 'M';
    } else if ( $total > 1000 ) {
        return round($total / 1000, 1) . 'k';
    }

    return $total;
}

/* ====================================================================================================
   Get instagram stuff
==================================================================================================== */
function get_latest_instagram_image() {
    $access_token = '592289533.97584da.efdf828c22c74b8bbbcaea3166050cb8';
    $user_id = '11823250';
    $api_url = 'https://api.instagram.com/v1/users/' . $user_id . '/media/recent/?access_token=' . $access_token . '&count=1';

    $data = wp_remote_get($api_url);
    $data = json_decode($data['body'])->data[0];

    $image_url = $data->images->standard_resolution->url;
    $insta_link = $data->link;
    $image_caption = 'View the latest Wit & Delight Photo on Instagram';

    $html = '<a href="' . $insta_link . '" target="_blank">';
    $html .= '<img src="' . $image_url . '" alt="' . $image_caption . '" />';
    $html .= '</a>';

    return $html;
}

/* ====================================================================================================
   Get shopstyle product - must supply list ID
==================================================================================================== */
function get_shopstyle_products($id) {
    $api_key = 'uid7025-33221705-58';
    $list_id = $id;
    $limit = '48';
    $api_url = 'http://api.shopstyle.com/api/v2/lists/' . $list_id . '/items?pid=' . $api_key . '&limit=' . $limit;

    $data = wp_remote_get($api_url);
    $products =json_decode($data['body'])->favorites;

    $html = '<ul class="pods">';

    foreach($products as $product) {
        $html .= '<li>';
        $html .= '<a href="' . $product->product->clickUrl . '" target="_blank">';
        $html .= '<div class="box">';
        $html .= '<div class="product">';
        $html .= '<div class="product-media">';
        $html .= '<img src="' . $product->product->image->sizes->XLarge->url . '" alt="' . $product->product->name . '" />';
        $html .= '</div>';
        $html .= '<div class="product-hd">';
        $html .= $product->product->name;
        $html .= '</div>';
        $html .= '<div class="product-bd">';
        $html .= $product->product->priceLabel;
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</a>';
        $html .= '</li>';
    }

    $html .= '</ul>';

    return $html;
}

/* ====================================================================================================
 Load More Posts
==================================================================================================== */
add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action( 'wp_ajax_nopriv_load_more_posts', 'load_more_posts' );
function load_more_posts() {
    if (!wp_verify_nonce($_GET['nonce'], "load_more_posts")) {
        die();
    } else {
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

            // Set up pagination
            $postsPerPage = 12;
            $offset = $_GET['page'] ? $_GET['page'] * $postsPerPage : 0;

            // Determine if it's a category
            if($_GET['category'] && $_GET['category'] == 'popular') {
                // Capture WordPress Popular Posts plugin data
                ob_start();
                wpp_get_mostpopular('range="monthly"&limit=13');
                echo json_encode(array('html' => ob_get_clean(), 'results' => true));
            } else {
                $category = $_GET['category'] === 'recent' || $_GET['category'] === 'popular' ? '' : get_cat_ID($_GET['category']);

                // Get Posts
                $posts = new WP_Query(array(
                    'posts_per_page'   => $postsPerPage,
                    'offset'           => $offset,
                    'cat'              => $category,
                    'orderby'          => 'date',
                    'order'            => 'DESC',
                    'post_type'        => 'post',
                    'post_status'      => 'publish',
                    'suppress_filters' => true,
                    'post__in'         => $ids,
                    's'                => $_GET['search'] ? $_GET['search'] : null
                ));

                // The Loop
                if ($posts->have_posts()) {
                    ob_start();
                    while ($posts->have_posts()) {
                        $posts->the_post();
                        get_template_part('includes/loop', 'archive-single');
                    }
                    echo json_encode(array('html' => ob_get_clean(), 'results' => true));
                } else {
                    echo json_encode(array('html' => '', 'results' => false));
                }
            }
        }
    }
    die();
}

/*
 * Builds custom HTML - workaround for not being able
 * to use wpp data straight from the plugin
 *
 * @param   array   $mostpopular
 * @param   array   $instance
 * @return  string
 */
function wpp_get_ids($popular, $instance) {
    $ids = array();

    // loop the array of popular posts objects
    foreach($popular as $p) {
        $ids[] = $p->id;
    }

    // Get Posts
    $posts = new WP_Query(array(
        'post_type'        => 'post',
        'post_status'      => 'publish',
        'post__in'         => $ids,
        'orderby'          => 'post__in'
    ));

    // The Loop
    if ($posts->have_posts()) {
        ob_start();
        while ($posts->have_posts()) {
            $posts->the_post();
            get_template_part( 'includes/loop', 'archive-single' );
        }
        return ob_get_clean();
    }
}

add_filter( 'wpp_custom_html', 'wpp_get_ids', 10, 2 );

/* ====================================================================================================
 Include Classes
==================================================================================================== */
require_once('classes/post-like.php');
