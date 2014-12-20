<div class="pane">
    <div class="feature feature_condensed">
        <div class="feature-hd feature-hd_alt feature-hd_isCentered">
            <h2 class="hdg hdg_4">
                W&D on Instagram
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
            <h2 class="hdg hdg_4">
                Popular Posts
            </h2>
        </div>
        <div class="feature-bd feature-bd_condensed">
            <div class="">
            <?php wpp_get_mostpopular( 'limit=3&range="monthly"&order_by="comments"&post_type="post"&stats_views=0&wpp_start="<ol class=\'popularPosts\'>"&wpp_end="</ol">&post_html="<li><a href=\'{url}\'>{text_title}</a></li>"' ); ?>
            </div>
        </div>
    </div>
</div>