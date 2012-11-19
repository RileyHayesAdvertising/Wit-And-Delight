<div class="panel">
    <div class="feature feature_condensed">
        <div class="feature-hd">
            <h2 class="hdg hdg_4">
                <span class="hdg-split">Discovering the</span>
                <span class="hdg-split">Wit and Delight</span>
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
<div class="panel">
    <div class="feature">
        <div class="feature-hd">
            <h2 class="hdg hdg_4">See Categories</h2> <!-- TODO Make categories expandible / collapsible -->
        </div>
        <div class="feature-bd feature-bd_condensed">
            <ul class="vList vList_push vList_nav">
                <?php wp_list_categories('orderby=count&order=desc&style=list&number=10&title_li='); ?>
            </ul>
        </div>
    </div>
    <div class="feature feature_condensed">
        <div class="feature-hd">
            <h2 class="hdg hdg_4">See Tags</h2> <!-- TODO Make tags expandible / collapsible -->
        </div>
        <div class="feature-bd feature-bd_condensed">
            <ul class="vList vList_push vList_nav">
                <?php tag_list(); ?>
            </ul>
        </div>
    </div>
</div>
<div class="panel">
    <div class="feature feature_condensed">
        <div class="feature-hd">
            <h2 class="hdg hdg_4">Favorite Things</h2> <!-- TODO Wire up favorite thing plugin -->
        </div>
        <div class="feature-bd feature-bd_condensed">
            <img src="//placehold.it/232x120" alt="" /> <!-- TODO Remove placeholder -->
        </div>
    </div>
</div>
<div class="panel">
    <h2 class="isHidden">Contact Info</h2>
    <ul class="vList vList_navFeatured">
        <li><a href="mailto:witanddelight@gmail.com">witanddelight@gmail.com</a></li>
        <li class="vList-item_push"><a href="tel:6128456858">612 845 6858</a></li>
        <li><a href="#" rel="external">Linked In</a></li> <!-- TODO Add Link -->
        <li><a href="#" rel="external">Behance</a></li> <!-- TODO Add Link -->
        <li><a href="#" rel="external">Dribbble</a></li> <!-- TODO Add Link -->
    </ul>
</div>