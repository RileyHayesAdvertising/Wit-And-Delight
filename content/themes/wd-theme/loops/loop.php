        <div class="content">
            <div class="gridRow">
                <div class="gridRow-col gridRow-col_size3of4 gridRow-col_push1of4" role="main">
                    <div class="panel">
                        <h2 class="isHidden">Articles</h2>

                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="panel panel_inverse">
                            <div class="feature">
                                <?php if (the_first_image() != '') { ?>
                                <div class="feature-img">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo the_first_image() ?>" alt="" />
                                    </a>
                                </div>
                                <?php } ?>
                                <div class="feature-hd">
                                    <h3 class="hdg hdg_1">
                                        <a href="<?php the_permalink(); ?>"><?php the_date('M.d.Y','',' | '); ?><?php the_title(); ?></a>
                                    </h3>
                                </div>
                                <div class="feature-meta">
                                    <div class="date"></div>
                                </div>
                                <div class="feature-bd">
                                    <div class="user-content"><?php the_excerpt(); ?></div> <!-- TODO text the_excerpt / the_content -->
                                </div>
                            </div>
                        </div>
                        <?php endwhile; else: ?>
                        <div class="feature">
                            <div class="feature-hd">
                                <h3 class="hdg hdg_2 hdg_center">Sorry no posts matched your criteria.</h3>
                            </div>
                        </div>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="gridRow-col gridRow-col_size1of4 gridRow-col_pull3of4" role="complementary">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
