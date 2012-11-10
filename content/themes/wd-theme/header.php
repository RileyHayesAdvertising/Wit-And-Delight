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

    <?php wp_head(); // Always have wp_head() just before the closing </head> ?>
</head>
<body>
    <div class="wrapper wrapper-page">
        <div class="masthead" role="banner">
            <div class="gridRow">
                <div class="gridRow-col gridRow-col_size1of4">
                    <div class="panel">
                        <h1>Wit &amp; Delight</h1> <!-- TODO Add Logo inline -->
                    </div>
                </div>
                <div class="gridRow-col gridRow-col_size1of4">
                    <div class="panel">
                        <ul class="nav" role="navigation"> <!-- TODO Add links -->
                            <li><a href="#">About</a></li>
                            <li><a href="#">Daily Reads</a></li>
                            <li><a href="#">Pinterest</a></li>
                            <li><a href="#">Tumblr</a></li>
                            <li><a href="#">Studio</a></li>
                            <li><a href="#">Work</a></li>
                            <li><a href="#">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="gridRow-col gridRow-col_size1of4">
                    <div class="panel">
                        <ul class="nav">
                            <li><a href="#">Copyright &amp; Disclosure</a></li> <!-- TODO Add links -->
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Subscribe</a></li>
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
                            <li><i class="icn icn_email">e-mail</i>
                            <li><i class="icn icn_facebook">facebook</i>
                            <li><i class="icn icn_twitter">twitter</i>
                            <li><i class="icn icn_thing">thing</i> <!-- TODO Figure out what this icon acually is -->
                            <li><i class="icn icn_other">other</i> <!-- TODO Figure out what this icon acually is -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>