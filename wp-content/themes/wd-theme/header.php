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
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8" />
    <title><?php wp_title('|',1,'right'); ?></title>

    <!-- META DATA -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="MSSmartTagsPreventParsing" content="true" />
    <meta http-equiv="imagetoolbar" content="no" />
    <!--[if IE]><meta http-equiv="cleartype" content="on" /><![endif]-->

    <meta name="p:domain_verify" content="e740b63c6f2564ee691ea154942daaea"/>

    <link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />

    <!-- ICONS -->
    <link rel="shortcut icon" type="image/ico" href="/favicon.ico?v=2013" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/apple-touch-icon-lg.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/apple-touch-icon-md.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/apple-touch-icon-sm.png">

    <!-- STYLESHEETS -->
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Libre+Baskerville:400,700,400italic" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/styles/screen.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/styles/screen-sm.css" media="screen and (min-width: 30em)"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/styles/screen-md.css" media="screen and (min-width: 40em)"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/styles/screen-lg.css" media="screen and (min-width: 53em)"/>

    <!--[if lte IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/styles/screen-sm.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/styles/screen-md.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/styles/screen-lg.css" media="screen"/>
    <![endif]-->

    <!-- SCRIPTS -->
    <script>
        var WD = WD || {};
        WD.THEMEURL = "<?php bloginfo('template_directory'); ?>/";
    </script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/assets/scripts/global.js"></script>

    <!-- FONTS -->
    <script type="text/javascript" src="//use.typekit.net/ytk1rdh.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

    <!-- WP HEAD -->
    <?php wp_head(); // Always have wp_head() just before the closing </head> ?>
</head>
<body>
    <div class="wrapper wrapper_page">
        <div class="masthead" role="banner">
            <div class="masthead-logo">
                <h1 class="logo">
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/logo.png" alt="Wit &amp; Delight" />
                    </a>
                </h1>
            </div>
            <div class="masthead-nav" role="navigation">
                <ul class="nav">
                    <!-- <li><a href="#">Sign Up</a></li> -->
                    <li><a href="<?php the_field('rss_link', 'options'); ?>" rel="external">Subscribe</a></li>
                    <li<?php if (is_page(10654)) {?> class="isActive"<?php } ?>><a href="/about/">About</a></li>
                    <li class="nav-item_hasSubItems">
                        <a href="#">Follow</a>
                        <div class="nav-item-subItems">
                            <ul class="hList hList_social">
                                <li><a href="<?php the_field('pinterest_link', 'options'); ?>" rel="external"><i class="icn icn_pin"></i>Pinterest</a></li>
                                <li><a href="<?php the_field('tumblr_link', 'options'); ?>" rel="external"><i class="icn icn_tumblr"></i>Tumblr</a></li>
                                <li><a href="<?php the_field('instagram_link', 'options'); ?>" rel="external"><i class="icn icn_instagram"></i>Instagram</a></li>
                                <li><a href="<?php the_field('facebook_link', 'options'); ?>" rel="external"><i class="icn icn_facebook"></i>Facebook</a></li>
                                <li><a href="<?php the_field('twitter_link', 'options'); ?>" rel="external"><i class="icn icn_twitter"></i>Twitter</a></li>
                                <li><a href="<?php the_field('bloglovin_link', 'options'); ?>" rel="external"><i class="icn icn_bloglovin"></i>Bloglovin</a></li>
                            </ul>
                        </div>
                    </li>
                    <li<?php if (is_page(12408)) {?> class="isActive"<?php } ?>><a href="http://shop.witanddelight.com/">Shop</a></li>
                </ul>
            </div>
            <div class="masthead-search isLargeView">
                <?php get_search_form(); ?>
            </div>
        </div>