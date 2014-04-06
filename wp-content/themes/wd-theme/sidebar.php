<div class="panel isLargeView">
    <div class="feature feature_condensed">
        <div class="feature-hd feature-hd_alt">
            <h2 class="hdg hdg_4">
                <span class="hdg-split">Discovering the</span>
                <span class="hdg-split">Wit &amp; Delight in</span>
            </h2>
        </div>
        <div class="feature-bd feature-bd_condensed">
            <ul class="vList vList_push vList_navFeatured">
                <li><a href="/?cat=14">Fashion</a></li>
                <li><a href="/?cat=18">Design</a></li>
                <li><a href="/?cat=76">Products</a></li>
                <li><a href="/?cat=5">&amp; Oddities</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="panel isLargeView">
    <div class="feature js-toggle">
        <div class="feature-hd js-toggle-link" data-cookie="js-toggle-categories">
            <h2 class="hdg hdg_4">See Categories</h2>
        </div>
        <div class="feature-bd feature-bd_condensed js-toggle-target">
            <ul class="vList vList_push vList_nav">
                <?php wp_list_categories('orderby=count&order=desc&style=list&number=10&title_li='); ?>
            </ul>
        </div>
    </div>
    <div class="feature feature_condensed js-toggle">
        <div class="feature-hd js-toggle-link" data-cookie="js-toggle-tags">
            <h2 class="hdg hdg_4">See Tags</h2>
        </div>
        <div class="feature-bd feature-bd_condensed js-toggle-target">
            <ul class="vList vList_push vList_nav">
                <?php tag_list(); ?>
            </ul>
        </div>
    </div>
</div>
<div class="panel isLargeView">
    <div class="feature feature_condensed js-toggle">
        <div class="feature-hd js-toggle-link" data-cookie="js-toggle-daily">
            <h2 class="hdg hdg_4">Daily Reads</h2> 
        </div>
        <div class="feature-bd feature-bd_condensed js-toggle-target">
            <div class="feature feature_reasonable">
                <div class="feature-hd feature-hd_alt feature-hd_push isHidden">
                    <h3 class="hdg hdg_5">Featured</h3>
                </div>
                <div class="feature-bd feature-bd_condensed">
                    <ul class="vList vList_push vList_nav">
                        <?php wp_list_bookmarks('categorize=0&category=3&category_orderby=slug&title_li=0&show_private=0&orderby=name&show_images=0&show_description=0&show_name=1&show_rating=0&show_updated=0'); ?>
                    </ul>
                </div>
            </div>
            <div class="feature feature_reasonable">
                <div class="feature-hd feature-hd_alt feature-hd_push">
                    <h3 class="hdg hdg_5">Lifestyle</h3>
                </div>
                <div class="feature-bd feature-bd_condensed">
                    <ul class="vList vList_push vList_nav">
                        <?php wp_list_bookmarks('categorize=0&category=124&category_orderby=slug&title_li=0&show_private=0&orderby=name&show_images=0&show_description=0&show_name=1&show_rating=0&show_updated=0'); ?>
                    </ul>
                </div>
            </div>
            <div class="feature feature_reasonable">
                <div class="feature-hd feature-hd_alt feature-hd_push">
                    <h3 class="hdg hdg_5">Stylish People</h3>
                </div>
                <div class="feature-bd feature-bd_condensed">
                    <ul class="vList vList_push vList_nav">
                        <?php wp_list_bookmarks('categorize=0&category=125&category_orderby=slug&title_li=0&show_private=0&orderby=name&show_images=0&show_description=0&show_name=1&show_rating=0&show_updated=0'); ?>
                    </ul>
                </div>
            </div>
            <div class="feature feature_reasonable">
                <div class="feature-hd feature-hd_alt feature-hd_push">
                    <h3 class="hdg hdg_5">Kitchen Inspiration</h3>
                </div>
                <div class="feature-bd feature-bd_condensed">
                    <ul class="vList vList_push vList_nav">
                        <?php wp_list_bookmarks('categorize=0&category=127&category_orderby=slug&title_li=0&show_private=0&orderby=name&show_images=0&show_description=0&show_name=1&show_rating=0&show_updated=0'); ?>
                    </ul>
                </div>
            </div>
            <div class="feature feature_reasonable">
                <div class="feature-hd feature-hd_alt feature-hd_push">
                    <h3 class="hdg hdg_5">Tumblr</h3>
                </div>
                <div class="feature-bd feature-bd_condensed">
                    <ul class="vList vList_push vList_nav">
                        <?php wp_list_bookmarks('categorize=0&category=106&category_orderby=slug&title_li=0&show_private=0&orderby=name&show_images=0&show_description=0&show_name=1&show_rating=0&show_updated=0'); ?>
                    </ul>
                </div>
            </div>
            <div class="feature feature_reasonable">
                <div class="feature-hd feature-hd_alt feature-hd_push">
                    <h3 class="hdg hdg_5">Friends</h3>
                </div>
                <div class="feature-bd feature-bd_condensed">
                    <ul class="vList vList_push vList_nav">
                        <?php wp_list_bookmarks('categorize=0&category=128&category_orderby=slug&title_li=0&show_private=0&orderby=name&show_images=0&show_description=0&show_name=1&show_rating=0&show_updated=0'); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel">
    <h2 class="isHidden">Contact Info</h2>
    <ul class="vList vList_navFeatured">
        <li><a href="mailto:<?php the_field('email_address', 'options'); ?>"><?php the_field('email_address', 'options'); ?></a></li>
        <li class="vList-item_push">612 845 6858</li>
        <li><a href="<?php the_field('linkedin_link', 'options'); ?>" rel="external">LinkedIn</a></li>
        <li><a href="<?php the_field('behance_link', 'options'); ?>" rel="external">Behance</a></li>
    </ul>
</div>