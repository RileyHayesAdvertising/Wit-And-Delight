        <div class="content">
            <div class="gridRow">
                <div class="gridRow-col gridRow-col_size3of4" role="main">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="box">
                            <div class="feature feature_condensed">
                                <div class="feature-hd isHidden">
                                    <h2><?php the_title(); ?></h2>
                                </div>
                                <div class="feature-bd">
                                    <div class="user-content">
                                        <?php
                                            the_content();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; endif; ?>
                    <?php if(get_field('press')): ?>
                        <div class="ancillary">
                            <div class="ancillary-hd">
                                <h2 class="hdg hdg_2">Press</h2>
                            </div>
                            <div class="ancillary-bd">
                                <ul class="pods">
                                    <?php while(has_sub_field('press')): ?>
                                    <li>
                                        <?php if(get_sub_field('press_link')) { ?><a href="<?php the_sub_field('press_link'); ?>"><?php } ?>
                                        <div class="box box_tiny">
                                            <?php the_sub_field('press_line_1'); ?><br/>
                                            <span class="hdg mix-hdg_snowflake mix-hdg_snowflake_tight"><?php the_sub_field('press_line_2'); ?></span><br/>
                                            <?php the_sub_field('press_line_3'); ?>
                                        </div>
                                        <?php if(get_sub_field('press_link')) { ?></a><?php } ?>
                                    </li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="gridRow-col gridRow-col_size1of4" role="complementary">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
