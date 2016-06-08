<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
        <!-- META DATA -->
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="p:domain_verify" content="e740b63c6f2564ee691ea154942daaea"/>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <!-- ICONS -->
        <link rel="shortcut icon" type="image/ico" href="/favicon.ico" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/apple-touch-icon-lg.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/apple-touch-icon-md.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/apple-touch-icon-sm.png">

        <!-- FONTS -->
        <script type="text/javascript" src="//use.typekit.net/ytk1rdh.js"></script>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
        <link href="//cloud.webtype.com/css/2eed833e-5790-485c-92a0-8e9a3e4d9721.css" rel="stylesheet" type="text/css" />

        <?php
            // Required for nested reply function that moves reply inline with JS
            if (is_singular()) wp_enqueue_script('comment-reply');
        ?>
        <!-- WP HEAD GENERATED -->
        <?php wp_head(); ?>
    </head>
    <body>
        <div class="tier tier_grey tier_push">
            <div class="tier tier_dark">
                <div class="wrapper">
                    <div class="masthead" role="banner">
                        <div class="masthead-brand">
                            <h1 class="logo logo-onTop">
                                <a href="<?php echo home_url(); ?>">
                                    <?php echo file_get_contents(get_template_directory() . '/assets/images/logo.svg'); ?>
                                </a>
                            </h1>
                        </div>
                        <div class="masthead-nav" role="navigation">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a href="<?php echo get_home_url(null, '/about/'); ?>">About</a>
                                    <div class="subnav">
                                        <ul class="subnav-list">
                                        <?php foreach (getPageSections('about') as $item) {
                                            echo '<li>';
                                            echo '<a href="' . get_home_url(null, '/about#') . sanitize_title($item) . '">';
                                            echo $item;
                                            echo '</a>';
                                            echo '</li>';
                                        }?>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo get_home_url(null, '/studio/'); ?>">Studio</a>
                                    <div class="subnav">
                                        <ul class="subnav-list">
                                        <?php foreach (getPageSections('studio') as $item) {
                                            echo '<li>';
                                            echo '<a href="' . get_home_url(null, '/studio#') . sanitize_title($item) . '">';
                                            echo $item;
                                            echo '</a>';
                                            echo '</li>';
                                        }?>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item-home">
                                    <a href="<?php echo get_home_url(); ?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo get_home_url(null, '/shop/'); ?>">Shop</a>
                                    <div class="subnav">
                                        <ul class="subnav-list">
                                        <?php foreach (getPageSections('shop') as $item) {
                                            echo '<li>';
                                            echo '<a href="' . get_home_url(null, '/shop#') . sanitize_title($item) . '">';
                                            echo $item;
                                            echo '</a>';
                                            echo '</li>';
                                        }?>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item nav-item_last">
                                    <a href="<?php echo get_home_url(null, '/products/'); ?>">Products</a>
                                    <div class="subnav">
                                        <ul class="subnav-list">
                                        <?php foreach (getPageSections('products') as $item) {
                                            echo '<li>';
                                            echo '<a href="' . get_home_url(null, '/products#') . sanitize_title($item) . '">';
                                            echo $item;
                                            echo '</a>';
                                            echo '</li>';
                                        }?>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


