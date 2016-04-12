<div class="page">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="page-hd">
        <h2 class="isVisuallyHidden"><?php the_title(); ?></h2>
    </div>
    <?php if ($post->post_content !== "") :?>
    <div class="page-bd page-bd_push">
        <div class="box">
            <div class="user-content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php endwhile; endif; ?>
    <?php if(get_field('shopstyle_list_id')): ?>
    <div class="page-ft">
        <div class="section">
            <div class="section-bd">
                <h2 class="isVisuallyHidden">Shop these picks!</h2>
                <?php echo get_shopstyle_products(get_field('shopstyle_list_id')); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div> <!-- // END .page -->
