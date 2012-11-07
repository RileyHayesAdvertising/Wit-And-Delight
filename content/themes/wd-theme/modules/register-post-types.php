<?php
/**
 * W&D Theme
 *
 * @category WD_Theme
 * @package WD_Theme
 * @subpackage Modules_Register_PostTypes
 * @author 
 * @version $Id$
 */

add_action('init', 'wd_register_post_types');
function wd_register_post_types()
{
    // register your post-types here
    /*
     * @see register_post_type() http://codex.wordpress.org/Function_Reference/register_post_type
     *
     */
    register_post_type(
        'wd_carousel', // prefix your post-type
        array(
            'labels' => array(
                'name'          => 'Carousels', // plural name
                'singular_name' => 'Carousel'
            ),
            'public' => true,
            'supports' => array(
                'title',
                'thumbnail',
            )
        )
    );
}