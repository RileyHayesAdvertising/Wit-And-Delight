<div class="sidebar">
    <div class="sidebar-section">
        <div class="frame">
            <h2 class="isVisuallyHidden">Search</h2>
            <?php get_search_form(); ?>
        </div>
    </div>
    <div class="sidebar-section">
        <div class="frame">
            <h2>Keep in Touch</h2>
            <ul>
                <li>
                    <a href="<?php the_field('instagram_link', 'options'); ?>">
                        Instagram <?php echo round_follower_counts(get_scp_counter('instagram')); ?>
                    </a>
                </li>
                <li>
                    <a href="<?php the_field('tumblr_link', 'options'); ?>">
                        Tumblr <?php echo round_follower_counts(get_scp_counter('tumblr')); ?>
                    </a>
                </li>
                <li>
                    <a href="<?php the_field('twitter_link', 'options'); ?>">
                        Twitter <?php echo round_follower_counts(get_scp_counter('twitter')); ?>
                    </a>
                </li>
                <li>
                    <a href="<?php the_field('pinterest_link', 'options'); ?>">
                        Pinterest <?php echo round_follower_counts(get_scp_counter('pinterest')); ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-section">
        <div class="frame">
            <h2 class="isVisualyHidden">Newsletter Sign Up</h2>
            <form>
                <input type="text" placeholder="Email..." />
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </div>
    <div class="sidebar-section">
        <div class="frame">
            <h2>You might also like</h2>
            <?php
                $sidebar_nav_args = array(
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
                    'theme_location' => 'sidebar-categories-menu',
                );

                wp_nav_menu($sidebar-categories-menu);
            ?>
        </div>
    </div>
    <div class="sidebar-section">
        <img src="https://www.fillmurray.com/300/450" alt="" />
        <h2>Daily Snapshot</h2>
    </div>
</div>