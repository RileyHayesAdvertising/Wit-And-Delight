        <div class="content">

            <div class="gridRow">
                <div class="gridRow-col gridRow-col_size3of4" role="main">
                    <div class="panel">
                        <h2 class="isHidden">Articles</h2>

                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="feature">
                            <?php if (the_first_image() != '') { ?>
                            <div class="feature-img">
                                <img src="<?php echo the_first_image() ?>" alt="" />
                            </div>
                            <?php } ?>
                            <div class="feature-hd">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </div>
                            <div class="feature-meta">
                                <div class="date"><?php the_date(); ?></div>
                            </div>
                            <div class="feature-bd">
                                <div class="user-content"><?php the_excerpt(); ?></div>
                            </div>
                        </div>
                        <?php endwhile; endif; ?>

                    </div>
                </div>
                <div class="gridRow-col gridRow-col_size1of4" role="complementary">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        
        </div>
