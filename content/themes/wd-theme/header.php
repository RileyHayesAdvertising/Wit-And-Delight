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
    <title><?php wp_title('|',1,'right'); ?><?php bloginfo('name'); ?></title>

    <!-- META DATA -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="MSSmartTagsPreventParsing" content="true" />
    <meta http-equiv="imagetoolbar" content="no" />
    <!--[if IE]><meta http-equiv="cleartype" content="on" /><![endif]-->

    <link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />

    <!-- ICONS -->
    <link rel="shortcut icon" type="image/ico" href="/favicon.ico?v=2013" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/apple-touch-icon-lg.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/apple-touch-icon-md.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/apple-touch-icon-sm.png">

    <!-- STYLESHEETS -->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/styles/screen.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/styles/screen-sm.css" media="screen and (min-width: 30em)"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/styles/screen-md.css" media="screen and (min-width: 40em)"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/styles/screen-lg.css" media="screen and (min-width: 52em)"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/styles/ie9.css" media="screen"/>
    <![endif]-->

    <!--[if lte IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/styles/screen-sm.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/styles/screen-md.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/styles/screen-lg.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/styles/ie8.css" media="screen"/>
    <![endif]-->

    <!--[if lte IE 7]>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/styles/ie7.css" media="screen"/>
    <![endif]-->

    <!-- SCRIPTS -->
    <script>
        var WD = WD || {};
        WD.THEMEURL = "<?php bloginfo('template_directory'); ?>/";
    </script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/assets/scripts/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/assets/scripts/handlebars.js"></script>
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
            <div class="gridRow">
                <div class="gridRow-col gridRow-col_size1of4">
                    <div class="panel">
                        <h1 class="logo">
                            <a href="<?php echo home_url(); ?>">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/images/logo.png" alt="Wit &amp; Delight" />
                            </a>
                        </h1>
                    </div>
                </div>
                <div class="gridRow-col gridRow-col_size1of4">
                    <div class="panel">
                        <ul class="nav nav_split" role="navigation">
                            <li<?php if (is_page(10654)) {?> class="isActive"<?php } ?>><a href="/about/">About</a></li>
                            <li><a href="http://katearends.com/" rel="external">Studio</a></li>
                            <li<?php if (is_page(11540)) {?> class="isActive"<?php } ?>><a href="/press/">Press</a></li>
                            <li class="isLargeView"><a href="http://pinterest.com/katea/" rel="external">Pinterest</a></li>
                            <li<?php if (is_page(12408)) {?> class="isActive"<?php } ?>><a href="/shop/">Shop</a></li>
                            <li class="isLargeView"><a href="http://witanddelight.tumblr.com/" rel="external">Tumblr</a></li>
                        </ul>
                    </div>
                </div>
                <div class="gridRow-col gridRow-col_size1of4 isLargeView">
                    <div class="panel">
                        <ul class="nav">
                            <li<?php if (is_page(11541)) {?> class="isActive"<?php } ?>><a href="/copyright-disclosure/">Copyright &amp; Disclosure</a></li>
                            <li<?php if (is_page(11560)) {?> class="isActive"<?php } ?>><a href="/contact/">Contact</a></li>
                            <li><a href="http://feeds2.feedburner.com/katearends/DcwI" rel="external">Subscribe</a></li>
                        </ul>
                    </div>
                </div>
                <div class="gridRow-col gridRow-col_size1of4 isLargeView">
                    <div class="panel">
                        <?php get_search_form(); ?>
                        <ul class="hList hList_social">
                            <li><a href="/contact/"><i class="icn icn_email"></i>E-mail</a></li>
                            <li><a href="http://www.facebook.com/witanddelight" rel="external"><i class="icn icn_facebook"></i>Facebook</a></li>
                            <li><a href="https://twitter.com/wit_and_delight" rel="external"><i class="icn icn_twitter"></i>Twitter</a></li>
                            <li><a href="http://instagram.com/wit_and_delight" rel="external"><i class="icn icn_instagram"></i>Instagram</a></li>
                            <li><a href="http://8tracks.com/witanddelight" rel="external"><i class="icn icn_8tracks"></i>8tracks</a></li>
                            <li><a href="http://feeds2.feedburner.com/katearends/DcwI" rel="external"><i class="icn icn_rss"></i>RSS Feed</a></li>
                        </ul>
                        <div class="js-view-toggle viewToggle">
                            <div class="yinAndYang">
                                <div class="yinAndYang-yin">
                                    <p>View as grid or scroll</p>
                                </div>
                                <div class="yinAndYang-yang">
                                    <?php if ($_COOKIE["viewprefs"] == "scroll") : ?>
                                        <ul class="hList hList_spread">
                                            <li><a href="#" class="js-view-grid switcher switcher_grid">Grid</a></li>
                                            <li><a href="#" class="js-view-scroll switcher switcher_scroll isActive">Scroll</a> </li>
                                        </ul>
                                    <?php elseif (!isset($_COOKIE["viewprefs"]) || $_COOKIE["viewprefs"] == "grid"): ?>
                                        <ul class="hList hList_spread">
                                            <li><a href="#" class="js-view-grid switcher switcher_grid isActive">Grid</a></li>
                                            <li><a href="#" class="js-view-scroll switcher switcher_scroll">Scroll</a> </li>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>