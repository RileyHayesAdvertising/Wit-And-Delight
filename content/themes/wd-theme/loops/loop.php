<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="feature">
        <?php if (the_first_image() != '') { ?>
        <div class="feature-img">
            <img src="<?php echo the_first_image() ?>" alt="" />
        </div>
        <?php } ?>
        <div class="feature-hd">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </div>
        <div class="feature-meta">
            <div class="date"><?php the_date(); ?></div>
        </div>
        <div class="feature-bd">
            <div class="user-content"><?php the_excerpt(); ?></div>
        </div>
    </div><!-- #post-<?php the_ID(); ?> -->
    
<?php endwhile; endif; ?>
