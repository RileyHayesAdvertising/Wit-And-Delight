<?php
/* ====================================================================================================
 Pinterest Buttons
==================================================================================================== */

/*
 * Function addPinterestIconToImage
 *
 * Add pinterest button to html image tags
 *
 * @image (string) <img src="$">
 * @return (string) img tag wrapped in pinterest tag
 */
function addPinterestIconToImage($image) {
    preg_match('/src="([^"]+)"/', $image, $results);
    $url = urlencode(get_the_permalink());
    $img = urlencode($results[1]);
    $desc = urlencode(get_the_title());

    $output = '<div class="pinterestPin">';
	    $output  .= '<a href="//pinterest.com/pin/create/link/?url=' . $url . '&media=' . $img . '&description=' . $desc . '" target="_blank">';
	        $output .= '<span class="pin"><img src="' . get_template_directory_uri() . '/assets/images/pin-it.png" alt="Pin It" /></span>';
	        $output .= $image;
	    $output .= '</a>';
	$output .= '</div>';
    return $output;
}

/*
 * Function addPinterestToEachImage
 *
 * Callback for parseForPinterestImages
 *
 * @match (string) <img src="$">
 * @return (string) img tag wrapped in pinterest tag
 */
function addPinterestToEachImage($match) {
    return addPinterestIconToImage($match[0]);
}

/*
 * Function parseForPinterestImages
 *
 * Find all image tags in a chunk of html
 *
 * @content (string) html code
 * @return (string) html code with new pinterest images wrapped
 */
function parseForPinterestImages($content) {
    // Regex find all matches of img
    $regex = "/(<img\s[^>]*?src\s*=\s*['\"]([^'\"]*?)['\"][^>]*?>)/";
    return preg_replace_callback(
            $regex,
            "addPinterestToEachImage",
            $content);
}