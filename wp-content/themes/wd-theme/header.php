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
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/styles/screen.css" media="screen and (min-width: 1em)"/>
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
                    <li<?php if (is_page(12408)) {?> class="isActive"<?php } ?>><a href="http://shop.witanddelight.com/">Shop</a></li>
                    <li><a href="http://katearends.com/">Studio</a></li>
                </ul>
            </div>
            <div class="masthead-search isLargeView">
                <?php get_search_form(); ?>
            </div>
            <div class="masthead-subnav">
                <h2 class="isHidden">Popular Categories</h2>
                <ul class="categoryNav">
                    <li><a href="http://witanddelight.com/category/design/">Design</a></li>
                    <li><a href="http://witanddelight.com/category/home/">Home</a></li>
                    <li><a href="http://witanddelight.com/category/life/">Life</a></li>
                    <li><a href="http://witanddelight.com/category/beauty/">Beauty</a></li>
                    <li><a href="http://witanddelight.com/category/fashion/">Fashion</a></li>
                    <li><a href="http://witanddelight.com/category/oddities/">Oddities</a></li>
                </ul>
                <div class="disclosure">
                    <div class="disclosure-contact"><a href="mailto:<?php the_field('email_address', 'options'); ?>">Contact: <?php the_field('email_address', 'options'); ?></a></div>
                    <div class="disclosure-link"><a href="/copyright-disclosure/">Disclosure</a></div>
                    <div class="disclosure-legal"><a href="/copyright-disclosure/">Copyright Wit &amp; Delight LLC</a></div>
                </div>
            </div>
        </div>