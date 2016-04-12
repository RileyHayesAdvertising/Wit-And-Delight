<div class="page">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="page-hd">
        <h2 class="isVisuallyHidden"><?php the_title(); ?></h2>
    </div>
    <div class="page-bd">
        <?php if ($post->post_content !== "") :?>
        <div class="box">
            <div class="user-content">
                <?php the_content(); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <?php endwhile; endif; ?>
    <div class="page-ft">
        <?php echo get_shopstyle_products(); ?>
    </div>
</div> <!-- // END .page -->
