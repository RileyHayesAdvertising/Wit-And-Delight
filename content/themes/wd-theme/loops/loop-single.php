<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div <?php post_class(); ?>> <!-- TODO Bold Content Links -->
        <h2><?php the_title(); ?></h2>
        <div class="date"><?php the_date(); ?></div>
        <div class="user-content"><?php the_content(); ?></div>
        <div class="comments"><?php comments_template(); ?></div>
    </div><!-- #post-<?php the_ID(); ?> -->  
  
<?php endwhile; endif; ?>
