<?php get_header(); ?>

<div class="tier tier_grey">
    <div class="wrapper">
        <div class="grid">
            <div class="grid-col grid-col_main" role="main">
                <?php get_template_part( 'includes/loop', 'shop' ); ?>
            </div>
            <div class="grid-col grid-col_aside" role="complementary">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>