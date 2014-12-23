<?php get_header(); ?>

<div class="content">
    <div class="gridRow">
        <div class="gridRow-col gridRow-col_size3of4" role="main">
            <div class="box">
                <div class="feature feature_condensed">
                    <div class="feature-hd">
                        <h1 class="hdg hdg_1">The page you are trying to reach cannot be found</h1>
                    </div>
                    <div class="feature-bd feature-bd_condensed">
                        <div class="user-content">
                            <p>If you typed in the URL, double check to make sure the address was input correctly.</p>
                            <p>It is possible the page you are trying to reach was moved or no longer exists, please try using the search field above to find the content you need.</p>
                            <p>Perhaps you can find what you were looking for by <a href="<?php echo home_url(); ?>">browsing the blog</a>, or <a href="/shop/">visiting the shop</a>?</p>
                            <p>If you still can't find what you need, please <a href="/contact">get in touch</a> and I will do what I can to fix the problem or help you out.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gridRow-col gridRow-col_size1of4" role="complementary">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>