        <div class="content">
            <div class="gridRow">
                <div class="gridRow-col gridRow-col_size3of4" role="main">
                    <h2 class="isHidden">Articles</h2>
                    <ol class="vlist vlist_articles">
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <li>
                                <div class="box">
                                    <div class="article">
                                        <div class="article-image">
                                            <a href="<?php echo the_permalink(); ?>">
                                                <img src="<?php echo aq_resize(the_first_image(), '250'); ?>" alt="" />
                                            </a>
                                        </div>
                                        <div class="article-bd">
                                            <div class="article-bd-meta">
                                                <div class="hdg hdg_4 mix-hdg_snowflake mix-hdg_snowflake_loose">
                                                    <?php the_category(', '); ?>
                                                </div>
                                            </div>
                                            <div class="article-bd-label">
                                                <h3 class="hdg hdg_0">
                                                    <a href="<?php echo the_permalink(); ?>">
                                                        <?php echo the_title(); ?>
                                                    </a>
                                                </h3>
                                            </div>
                                            <div class="article-bd-content">
                                                <div class="user-content">
                                                    <?php echo the_excerpt(); ?>
                                                </div>
                                            </div>
                                            <div class="article-bd-link">
                                                <a href="<?php echo the_permalink(); ?>">
                                                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/more.png" alt="Read More" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endwhile; ?>
                        <?php else: ?>
                            <li>
                                <div class="box">
                                    <div class="article">
                                        <div class="article-bd">
                                            <div class="article-bd-label">
                                                <h3 class="hdg hdg_0">Sorry. no posts were found!</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ol>
                    <div class="panel panel_bare">
                        <ol class="pagination">
                            <li class="pagination-prev"><?php next_posts_link('<i class="icn icn_prev"></i>Older Posts');  ?></li>
                            <li class="pagination-next"><?php previous_posts_link('Newer Posts<i class="icn icn_next"></i>');  ?></li>
                        </ol>
                    </div>
                </div>
                <div class="gridRow-col gridRow-col_size1of4" role="complementary">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
