        <div class="content">
            <div class="gridRow">
                <div class="gridRow-col gridRow-col_size3of4 gridRow-col_push1of4" role="main">
                    <div class="panel panel_condensed">
                        <h2 class="isHidden">Articles</h2>
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?><!-- TODO create javascript toggle between views -->
                        <div class="panel panel_inverse">
                            <div class="feature feature_condensed">
                                <div class="feature-hd">
                                    <h3 class="hdg hdg_1">
                                        <a href="<?php the_permalink(); ?>"><?php the_date('M.d.Y','',' | '); ?><?php the_title(); ?></a>
                                    </h3>
                                </div>
                                <?php if (the_first_image() != '') { ?>
                                <div class="feature-img">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo the_first_image() ?>" alt="" />
                                    </a>
                                </div>
                                <?php } ?>
                                <div class="feature-bd">
                                    <div class="user-content">
                                        <?php the_excerpt(); ?> <!-- TODO the_content (with images removed) instead of the_excerpt -->
                                    </div>
                                </div>
                                <div class="feature-meta">
                                    <ul class="blocks blocks_3up">
                                        <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" class="btn" rel="external">Share on Facebook</a></li>
                                        <li><a href="http://twitter.com/share?url=<?php the_permalink(); ?>" class="btn" rel="external">Tweet It</a></li>
                                        <li><a href="http://pinterest.com/pin/create/bookmarklet/?media=<?php echo urlencode(the_first_image()); ?>&url=<?php echo urlencode(get_permalink()); ?>" class="btn">Pin it</a></li> <!-- TODO verify pinterest button works on production server -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; else: ?>
                        <div class="panel panel_bare">
                            <div class="feature">
                                <div class="feature-hd">
                                    <h3 class="hdg hdg_2 hdg_center">Sorry no posts matched your criteria.</h3>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="panel panel_bare">
                            <ul>
                                <li><?php next_posts_link('Older Posts');  ?></li> <!-- TODO Add arrow icon -->
                                <li><?php previous_posts_link('Newer Posts');  ?></li> <!-- TODO Add arrow icon -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="gridRow-col gridRow-col_size1of4 gridRow-col_pull3of4" role="complementary">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
