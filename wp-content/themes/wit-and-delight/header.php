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

        <!-- WP HEAD GENERATED -->
        <?php wp_head(); ?>
    </head>
    <body>
        <div class="tier tier_dark">
            <div class="wrapper">
                <div class="nav" role="navigation">
                    <?php
                        $nav_args = array(
                            'menu' => '',
                            'menu_class' => 'hList',
                            'menu_id' => '',
                            'container' => '',
                            'container_class' => '',
                            'container_id' => '',
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'echo' => true,
                            'depth' => 0,
                            'theme_location' => 'masthead-menu',
                        );

                        wp_nav_menu($nav_args);
                    ?>
                </div>
            </div>
        </div>
        <div class="tier tier_grey">
            <div class="wrapper">
                <div class="masthead" role="banner">
                    <h1 class="logo">
                        <a href="<?php echo home_url(); ?>">
                            <?php echo file_get_contents(get_template_directory() . '/assets/images/logo.svg'); ?>
                        </a>
                    </h1>
                </div>
            </div>
        </div>

