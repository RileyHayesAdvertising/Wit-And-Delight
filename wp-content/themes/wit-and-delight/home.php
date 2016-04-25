<?php get_header(); ?>

<?php if (is_home()) : ?>
<div class="tier tier_grey">
    <div class="wrapper wrapper_noPad">
        <h2 class="isVisuallyHidden">Featured Content</h2>
        <div class="carousel" id="js-carousel">
            <div class="carousel-stage">
                <?php while(has_sub_field('carousel','options')): ?>
                <div class="carousel-stage-slide">
                    <div class="card">
                        <div class="card-media">
                            <img class="blockImage" src="<?php the_sub_field('slide_image'); ?>" alt="<?php the_sub_field('slide_title'); ?>">
                        </div>
                        <div class="card-bd">
                            <a href="<?php the_sub_field('slide_link'); ?>">
                                <h3 class="hdg hdg_flex"><?php the_sub_field('slide_title'); ?></h3>
                                <span class="caption caption_flex isHiddenOnSmallScreens">Read More</span>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <div class="carousel-controls">
                <button class="carousel-controls-prev js-prev-slide"><span class="isVisuallyHidden">Previous Slide</span>&larr;</button>
                <button class="carousel-controls-next js-next-slide"><span class="isVisuallyHidden">Next Slide</span>&rarr;</button>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="tier tier_grey">
    <div class="wrapper">
        <div class="grid">
            <div class="grid-col grid-col_main" role="main">
                <?php get_template_part( 'includes/loop', 'archive' ); ?>
            </div>
            <div class="grid-col grid-col_aside" role="complementary">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>