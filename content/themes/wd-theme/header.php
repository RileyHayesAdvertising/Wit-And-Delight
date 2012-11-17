<?php
/**
 * W&D Theme
 *
 * @category WD_Theme
 * @package WD_Theme
 * @subpackage Header
 * @author
 * @version $Id$
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title><?php wp_title(''); ?> | <?php bloginfo('name'); ?> </title>

    <!-- META DATA -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="MSSmartTagsPreventParsing" content="true" />
    <meta http-equiv="imagetoolbar" content="no" />
    <!--[if IE]><meta http-equiv="cleartype" content="on" /><![endif]-->

    <link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />

    <!-- ICONS -->
    <link rel="shortcut icon" type="image/ico" href="favicon.ico" />
    
    <!-- FONTS -->
    <script type="text/javascript" src="//use.typekit.net/ytk1rdh.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    
    <?php wp_head(); // Always have wp_head() just before the closing </head> ?>
</head>
<body>
    <div class="wrapper wrapper-page">
        <div class="masthead" role="banner">
            <div class="gridRow">
                <div class="gridRow-col gridRow-col_size1of4">
                    <div class="panel">
                        <h1 class="logo">
                            <a href="<?php echo site_url(); ?>">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/images/logo.gif" alt="Wit &amp; Delight" />
                            </a>
                        </h1>
                    </div>
                </div>
                <div class="gridRow-col gridRow-col_size1of4">
                    <div class="panel">
                        <ul class="nav nav_split" role="navigation"> <!-- TODO Add is-active state to navigation -->
                            <li><a href="#">About</a></li> <!-- TODO Add Link -->
                            <li><a href="#">Studio</a></li> <!-- TODO Add Link -->
                            <li><a href="#">Daily Reads</a></li> <!-- TODO Add Link -->
                            <li><a href="#">Work</a></li> <!-- TODO Add Link -->
                            <li><a href="http://pinterest.com/katea/">Pinterest</a></li>
                            <li><a href="#">Shop</a></li> <!-- TODO Add Link -->
                            <li><a href="http://witanddelight.tumblr.com/">Tumblr</a></li>
                        </ul>
                    </div>
                </div>
                <div class="gridRow-col gridRow-col_size1of4">
                    <div class="panel">
                        <ul class="nav">
                            <li><a href="#">Copyright &amp; Disclosure</a></li> <!-- TODO Add Link -->
                            <li><a href="mailto:witanddelight@gmail.com">Contact</a></li>
                            <li><a href="http://feeds2.feedburner.com/katearends/DcwI">Subscribe</a></li> <!-- TODO Verify RSS Works with new feed -->
                        </ul>
                    </div>
                </div>
                <div class="gridRow-col gridRow-col_size1of4">
                    <div class="panel">
                        <form action="#" role="search"> <!-- TODO Wire up legitamate search -->
                            <label for="inputSearch">Search</label>
                            <input type="search" id="inputSearch" />
                            <button type="submit">Submit</button>
                        </form>
                        <ul class="hList hList_social">
                            <li><a href="mailto:witanddelight@gmail.com"><i class="icn icn_email">E-mail</i></a></li>
                            <li><a href="http://www.facebook.com/witanddelight"><i class="icn icn_facebook">Facebook</i></a></li>
                            <li><a href="http://twitter.com/katearends"><i class="icn icn_twitter">Twitter</i></a></li>
                            <li><a href="http://followgram.me/katearends/"><i class="icn icn_thing">Instagram</i></a></li>
                            <li><a href="http://8tracks.com/witanddelight"><i class="icn icn_other">8tracks</i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>