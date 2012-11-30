        <div class="content">
            <div class="gridRow">
                <div class="gridRow-col gridRow-col_size3of4 gridRow-col_push1of4" role="main">
                    <div class="panel panel_condensed">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="panel panel_inverse">
                            <div class="feature feature_condensed">
                                <div class="feature-hd">
                                    <h2 class="hdg hdg_1"><?php the_date('M.d.Y','',' | '); ?><?php the_title(); ?></h2>
                                </div>
                                <div class="feature-bd">
                                    <div class="user-content">
                                        <?php
                                            the_content(); 
                                        ?>
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
                        <!-- TODO Add Next Post / Prev Post Links -->
                        <div class="comments"><!-- TODO Style Comments -->
                            <?php comments_template(); ?>
                        </div>
                    <?php endwhile; endif; ?>
                    </div>
                </div>
                <div class="gridRow-col gridRow-col_size1of4 gridRow-col_pull3of4" role="complementary">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
