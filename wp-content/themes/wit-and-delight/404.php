<?php get_header(); ?>

<div class="tier tier_grey">
    <div class="wrapper">
        <div class="grid">
            <div class="grid-col grid-col_main" role="main">
                <div class="archive">
                    <div class="box">
                        <div class="blurb blurb_centered">
                            <div class="blurb-hd blurb-hd_push">
                                <h1 class="hdg hdg_xxl">The page you are trying to reach cannot be found</h1>
                            </div>
                            <div class="blurb-ft">
                                <div class="user-content">
                                    <p>If you typed in the URL, double check to make sure the address was input correctly. <br/> It is possible the page you are trying to reach was moved or no longer exists, please try using the search form or <a href="<?php echo home_url(); ?>">browsing the blog</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid-col grid-col_aside" role="complementary">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>