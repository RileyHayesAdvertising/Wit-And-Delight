<div class="sidebar">
    <div class="sidebar-section">
        <h2 class="isVisuallyHidden">Search</h2>
        <?php get_search_form(); ?>
    </div>
    <div class="sidebar-section">
        <div class="stack">
            <div class="stack-item stack-item_inset stack-item_isCentered">
                <h2 class="hdg hdg_xl">
                    <a href="<?php echo home_url() . '/' . get_page_uri(10654) ?>">
                        A Website Dedicated<br/>to Designing a Life<br/>Well Lived.
                    </a>
                </h2>
                <br/>
                <a href="<?php echo home_url() . '/' . get_page_uri(10654) ?>">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/more.png' ?>" alt="Learn More" />
                </a>
            </div>
            <div class="stack-item stack-item_isCentered">
                <h2 class="caption">Keep in Touch</h2>
            </div>
            <div class="stack-item stack-item_isCentered stack-item_isOffset stack-item_isWide">
                <ul class="hList hList_isCentered">
                    <li>
                        <a class="dot" href="<?php the_field('instagram_link', 'options'); ?>" target="_blank">
                            <span class="dot-image"><?php echo file_get_contents(get_template_directory() . '/assets/images/icn-instagram.svg'); ?></span>
                            <span class="dot-label"><?php echo round_follower_count(get_scp_counter('instagram')); ?></span>
                        </a>
                    </li>
                    <li>
                        <a class="dot" href="<?php the_field('tumblr_link', 'options'); ?>" target="_blank">
                            <span class="dot-image"><?php echo file_get_contents(get_template_directory() . '/assets/images/icn-tumblr.svg'); ?></span>
                            <span class="dot-label"><?php echo round_follower_count(get_scp_counter('tumblr')); ?></span>
                        </a>
                    </li>
                    <li>
                        <a class="dot" href="<?php the_field('twitter_link', 'options'); ?>" target="_blank">
                            <span class="dot-image"><?php echo file_get_contents(get_template_directory() . '/assets/images/icn-twitter.svg'); ?></span>
                            <span class="dot-label"><?php echo round_follower_count(get_scp_counter('twitter')); ?></span>
                        </a>
                    </li>
                    <li>
                        <a class="dot" href="<?php the_field('pinterest_link', 'options'); ?>" target="_blank">
                            <span class="dot-image"><?php echo file_get_contents(get_template_directory() . '/assets/images/icn-pinterest.svg'); ?></span>
                            <span class="dot-label"><?php echo round_follower_count(get_scp_counter('pinterest')); ?></span>
                        </a>
                    </li>
                    <li>
                        <a class="dot" href="<?php the_field('facebook_link', 'options'); ?>" target="_blank">
                            <span class="dot-image"><?php echo file_get_contents(get_template_directory() . '/assets/images/icn-facebook.svg'); ?></span>
                            <span class="dot-label"><?php echo round_follower_count(get_scp_counter('facebook')); ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="sidebar-section">
        <h2 class="isVisuallyHidden">Newsletter Sign Up</h2>
        <form action="//witanddelight.us8.list-manage.com/subscribe/post?u=fe8e8b8d53d3bee8b00c5ff00&amp;id=2b3fd7bf01" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate>
            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;" aria-hidden="true">
                <input type="text" name="b_fe8e8b8d53d3bee8b00c5ff00_2b3fd7bf01" tabindex="-1" value="">
            </div>
            <div class="pill">
                <div class="pill-section">
                    <input class="input input_violator" type="text" name="EMAIL" id="mce-EMAIL" value="" placeholder="Enter Email" />
                </div>
                <div class="pill-section pill-section_fill">
                    <button class="btn" type="submit" name="subscribe" id="mc-embedded-subscribe">Subscribe</button>
                </div>
            </div>
        </form>
    </div>
    <div class="sidebar-section">
        <div class="stack">
            <div class="stack-item stack-item_hasList">
                <h2 class="isVisuallyHidden">Browse posts by category</h2>
                <?php
                    $sidebar_nav_args = array(
                        'menu' => '',
                        'menu_class' => 'waypoint',
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
                        'theme_location' => 'sidebar-categories-menu',
                    );

                    wp_nav_menu($sidebar_nav_args);
                ?>
            </div>
        </div>
    </div>
    <div class="sidebar-section">
        <div class="stack">
            <div class="stack-item stack-item_isMedia">
                <?php echo get_latest_instagram_image(); ?>
            </div>
            <div class="stack-item stack-item_isCentered">
                <h2 class="caption">
                    <a href="<?php the_field('instagram_link', 'options'); ?>">Find Us On Instagram</a>
                </h2>
            </div>
        </div>
    </div>
    <?php if (count(get_field('sidebar_widget','options')) > 1) : ?>
        <?php while(has_sub_field('sidebar_widget','options')): ?>
        <?php
            $widget_style   = get_sub_field('sidebar_widget_style');
            $widget_title   = get_sub_field('sidebar_widget_title');
            $widget_image   = image_downsize(get_sub_field('sidebar_widget_image'), 'medium')[0];
            $widget_content = get_sub_field('sidebar_widget_content');
            $widget_link    = get_sub_field('sidebar_widget_link');
        ?>

        <?php if ($widget_style == 'image') : ?>
        <div class="sidebar-section">
            <div class="stack">
                <div class="stack-item stack-item_isMedia">
                    <?php if ($widget_link) { ?><a href="<?php echo $widget_link; ?>"><?php } ?>
                        <img data-pin-nopin="true" src="<?php echo $widget_image; ?>" alt="" />
                    <?php if ($widget_link) { ?></a><?php } ?>
                </div>
                <div class="stack-item stack-item_isCentered">
                    <h2 class="caption">
                        <?php if ($widget_link) { ?><a href="<?php echo $widget_link; ?>"><?php } ?>
                            <?php echo $widget_title; ?>
                         <?php if ($widget_link) { ?></a><?php } ?>
                    </h2>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($widget_style == 'content') : ?>
         <div class="sidebar-section">
            <div class="stack">
                <div class="stack-item stack-item_isCentered">
                    <h2 class="caption">
                        <?php if ($widget_link) { ?><a href="<?php echo $widget_link; ?>"><?php } ?>
                            <?php echo $widget_title; ?>
                         <?php if ($widget_link) { ?></a><?php } ?>
                    </h2>
                </div>
                <div class="stack-item">
                    <div class="user-content">
                        <?php echo $widget_content; ?>
                    </div>
                </div>
            </div>
         </div>
         <?php endif; ?>

        <?php if ($widget_style == 'all') : ?>
        <div class="sidebar-section">
            <div class="stack">
                <div class="stack-item stack-item_isMedia">
                    <?php if ($widget_link) { ?><a href="<?php echo $widget_link; ?>"><?php } ?>
                        <img data-pin-nopin="true" src="<?php echo $widget_image; ?>" alt="" />
                    <?php if ($widget_link) { ?></a><?php } ?>
                </div>
                <div class="stack-item stack-item_isCentered">
                    <h2 class="caption">
                        <?php if ($widget_link) { ?><a href="<?php echo $widget_link; ?>"><?php } ?>
                            <?php echo $widget_title; ?>
                         <?php if ($widget_link) { ?></a><?php } ?>
                    </h2>
                </div>
                <div class="stack-item">
                    <div class="user-content">
                        <?php echo $widget_content; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php endwhile; ?>
    <?php endif;?>
</div>