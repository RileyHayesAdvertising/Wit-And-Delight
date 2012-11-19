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

    <title><?php wp_title('|',1,'right'); ?><?php bloginfo('name'); ?></title>

    <!-- META DATA -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="MSSmartTagsPreventParsing" content="true" />
    <meta http-equiv="imagetoolbar" content="no" />
    <!--[if IE]><meta http-equiv="cleartype" content="on" /><![endif]-->

    <link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />

    <!-- ICONS -->
    <link rel="shortcut icon" type="image/ico" href="favicon.ico?v=2" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/apple-touch-icon-lg.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/apple-touch-icon-md.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/apple-touch-icon-sm.png">
    <!-- TODO Add facebook opengraph meta data -->
    
    <!-- FONTS -->
    <script type="text/javascript" src="//use.typekit.net/ytk1rdh.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    
    <!-- TODO Add responsive -->
    <!-- TODO Add print styles? -->
    
    <?php wp_head(); // Always have wp_head() just before the closing </head> ?>
</head>
<body>
    <div class="wrapper wrapper_page">
        <div class="masthead" role="banner">
            <div class="gridRow">
                <div class="gridRow-col gridRow-col_size1of4">
                    <div class="panel">
                        <h1 class="logo">
                            <a href="<?php echo home_url(); ?>">
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
                            <li><a href="http://pinterest.com/katea/" rel="external">Pinterest</a></li>
                            <li><a href="#">Shop</a></li> <!-- TODO Add Link -->
                            <li><a href="http://witanddelight.tumblr.com/" rel="external">Tumblr</a></li>
                        </ul>
                    </div>
                </div>
                <div class="gridRow-col gridRow-col_size1of4">
                    <div class="panel">
                        <ul class="nav"> <!-- TODO Add is-active state to navigation -->
                            <li><a href="#">Copyright &amp; Disclosure</a></li> <!-- TODO Add Link -->
                            <li><a href="mailto:witanddelight@gmail.com">Contact</a></li>
                            <li><a href="http://feeds2.feedburner.com/katearends/DcwI" rel="external">Subscribe</a></li> <!-- TODO Verify RSS Works with new feed -->
                        </ul>
                    </div>
                </div>
                <div class="gridRow-col gridRow-col_size1of4">
                    <div class="panel">
                        <?php get_search_form(); ?>
                        <ul class="hList hList_social">
                            <li><a href="mailto:witanddelight@gmail.com"><i class="icn icn_email"></i>E-mail</a></li>
                            <li><a href="http://www.facebook.com/witanddelight" rel="external"><i class="icn icn_facebook"></i>Facebook</a></li>
                            <li><a href="http://twitter.com/katearends" rel="external"><i class="icn icn_twitter"></i>Twitter</a></li>
                            <li><a href="http://followgram.me/katearends/" rel="external"><i class="icn icn_instagram"></i>Instagram</a></li>
                            <li><a href="http://8tracks.com/witanddelight" rel="external"><i class="icn icn_8tracks"></i>8tracks</a></li>
                            <li><a href="http://feeds2.feedburner.com/katearends/DcwI" rel="external"><i class="icn icn_rss"></i>RSS Feed</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>