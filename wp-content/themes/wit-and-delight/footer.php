
        <div class="tier tier_white">
            <div class="wrapper">
                <div class="footer" role="contentinfo">
                    <div class="footer-brand">
                        <a href="<?php echo home_url(); ?>">
                            <?php echo file_get_contents(get_template_directory() . '/assets/images/logo-stacked.svg'); ?>
                        </a>
                    </div>
                    <div class="footer-social">
                        <div class="footer-social-hd">
                            <h2>Keep In Touch</h2>
                        </div>
                        <div class="footer-social-bd">
                            <ul class="hList hList_social">
                                <li>
                                    <a href="mailto:<?php the_field('email_address', 'options'); ?>">
                                        <i class="icn icn_social"><?php echo file_get_contents(get_template_directory() . '/assets/images/icn-envelope.svg'); ?></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php the_field('instagram_link', 'options'); ?>" target="_blank">
                                        <i class="icn icn_social"><?php echo file_get_contents(get_template_directory() . '/assets/images/icn-instagram.svg'); ?></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php the_field('tumblr_link', 'options'); ?>" target="_blank">
                                        <i class="icn icn_social"><?php echo file_get_contents(get_template_directory() . '/assets/images/icn-tumblr.svg'); ?></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php the_field('twitter_link', 'options'); ?>" target="_blank">
                                        <i class="icn icn_social"><?php echo file_get_contents(get_template_directory() . '/assets/images/icn-twitter.svg'); ?></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php the_field('pinterest_link', 'options'); ?>" target="_blank">
                                        <i class="icn icn_social"><?php echo file_get_contents(get_template_directory() . '/assets/images/icn-pinterest.svg'); ?></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php the_field('rss_link', 'options'); ?>" target="_blank">
                                        <i class="icn icn_social"><?php echo file_get_contents(get_template_directory() . '/assets/images/icn-rss.svg'); ?></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-nav">
                        <?php
                            $subnav_args = array(
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
                                'theme_location' => 'footer-menu',
                            );

                            wp_nav_menu($subnav_args);
                        ?>
                    </div>
                    <div class="footer-legal">
                        <small>Copyright Wit &amp; Delight LLC</small>
                    </div>
                </div>
            </div>
        </div>

        <?php wp_footer(); ?>
    </body>
</html>