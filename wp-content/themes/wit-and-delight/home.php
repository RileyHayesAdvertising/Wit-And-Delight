<?php get_header(); ?>

<?php if (is_home()) : ?>
<?php if (count(get_field('carousel','options')) > 0) : ?>
<div class="tier tier_grey">
    <div class="wrapper wrapper_noPad">
        <h2 class="isVisuallyHidden">Featured Content</h2>
        <div class="carousel" <?php if (count(get_field('carousel','options')) > 1) : ?>id="js-carousel"<?php endif;?>>
            <div class="carousel-stage">
                <?php while(has_sub_field('carousel','options')): ?>
                <div class="carousel-stage-slide">
                    <div class="card">
                        <div class="card-media">
                            <a href="<?php the_sub_field('slide_link'); ?>">
                                <?php
                                    $image_id = get_sub_field('slide_image');
                                    $image_url = wp_get_attachment_image_src($image_id, 'large', true);
                                    $carousel_image_src = $image_url[0];
                                ?>
                                <img data-pin-nopin="true" class="blockImage" src="<?php echo $carousel_image_src; ?>" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <div class="carousel-controls <?php if (count(get_field('carousel','options')) < 2) : ?>carousel-controls_alwaysHidden<?php endif;?>">
                <button class="carousel-controls-prev js-prev-slide"><span class="isVisuallyHidden">Previous Slide</span>&larr;</button>
                <button class="carousel-controls-next js-next-slide"><span class="isVisuallyHidden">Next Slide</span>&rarr;</button>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
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