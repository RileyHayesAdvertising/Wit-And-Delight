<div class="pane">
    <div class="feature feature_condensed">
        <div class="feature-bd feature-bd_condensed">
            <h2 class="isHidden">Social Media</h2>
            <ul class="hList hList_social">
                <li><a href="<?php the_field('pinterest_link', 'options'); ?>" rel="external"><i class="icn icn_pin"></i>Pinterest</a></li>
                <li><a href="<?php the_field('tumblr_link', 'options'); ?>" rel="external"><i class="icn icn_tumblr"></i>Tumblr</a></li>
                <li><a href="<?php the_field('instagram_link', 'options'); ?>" rel="external"><i class="icn icn_instagram"></i>Instagram</a></li>
                <li><a href="<?php the_field('facebook_link', 'options'); ?>" rel="external"><i class="icn icn_facebook"></i>Facebook</a></li>
                <li><a href="<?php the_field('twitter_link', 'options'); ?>" rel="external"><i class="icn icn_twitter"></i>Twitter</a></li>
                <li><a href="<?php the_field('bloglovin_link', 'options'); ?>" rel="external"><i class="icn icn_bloglovin"></i>Bloglovin</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="pane">
    <div class="feature feature_condensed">
        <div class="feature-bd feature-bd_inset feature-bd_isCentered">
            <div class="hdg hdg_2">
                <span class="hdg-split">A Website Dedicated</span>
                <span class="hdg-split">to Designing a Life</span>
                <span class="hdg-split">Well Lived.</span>
            </div>
        </div>
    </div>
</div>
<div class="pane">
    <div class="feature feature_condensed">
        <div class="feature-hd feature-hd_altalt feature-hd_isCentered">
            <h2 class="hdg hdg_4 mix-hdg_snowflake">
                W&amp;D on Instagram
            </h2>
        </div>
        <div class="feature-bd feature-bd_condensed">
            <div class="instagramFeedSidebar">
                <?php /* configure in control panel */ echo do_shortcode( '[instagram-feed]' ); ?>
            </div>
        </div>
    </div>
</div>
<div class="pane pane_inset">
    <div class="feature feature_condensed">
        <div class="feature-hd feature-hd_alt feature-hd_isCentered">
            <h2 class="hdg hdg_4 mix-hdg_snowflake">
                Popular Posts
            </h2>
        </div>
        <div class="feature-bd feature-bd_condensed">
            <div class="">
            <?php wpp_get_mostpopular( 'limit=3&range="monthly"&order_by="comments"&post_type="post"&stats_views=0&wpp_start="<ol class=\'popularPosts\'>"&wpp_end="</ol>"&post_html="<li><a href=\'{url}\'>{text_title}</a></li>"' ); ?>
            </div>
        </div>
    </div>
</div>