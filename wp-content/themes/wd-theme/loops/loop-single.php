        <div class="content">
            <div class="gridRow">
                <div class="gridRow-col gridRow-col_size3of4" role="main">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="box">
                            <div class="feature feature_condensed">
                                <div class="feature-hd">
                                    <h2 class="hdg hdg_1 mix-hdg_snowflake">
                                        <span class="ribbon">
                                            <span class="ribbon-bd">
                                                <span class="ribbon-bd-inner">
                                                    <span class="date">
                                                        <?php the_time('m/d/y'); ?>
                                                    </span>
                                                </span>
                                            </span>
                                            <span class="ribbon-buddy">
                                                <?php the_title(); ?>
                                            </span>
                                        </span>
                                    </h2>
                                </div>
                                <div class="feature-bd">
                                    <div class="user-content" data-author-intro="Post by <?php echo get_the_author_meta('first_name'); ?> <? echo get_the_author_meta('last_name') ?>">
                                        <?php
                                            the_content();
                                        ?>
                                    </div>
                                </div>
                                <?php
                                    $includeFMCode = get_field('include_federated_media_content');
                                    $includePostSpecificAds = get_field('post_specific_ads');
                                    if ($includeFMCode == "yes" && !$includePostSpecificAds) {
                                ?>
                                <div class="feature-adWell">
                                    <!-- FM Content Well 650x300 Zone -->
                                    <script type="text/javascript" src="http://static.fmpub.net/zone/16412"></script>
                                    <!-- FM Content Well 650x300 Zone -->
                                </div>
                                <?php
                                    }
                                    if ($includePostSpecificAds) {
                                ?>
                                <div class="feature-adWell feature-adWell_isCentered">
                                    <?php the_field('post_specific_ads'); ?>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="panel panel_inverse">
                            <ol class="pagination">
                                <li class="pagination-prev"><?php previous_post_link('%link','<i class="icn icn_prev"></i>Previous Post');  ?></li>
                                <li class="pagination-next"><?php next_post_link('%link','Next Post<i class="icn icn_next"></i>');  ?></li>
                            </ol>
                        </div>

                        <div class="comments">
                            <?php comments_template(); ?>
                        </div>
                    <?php endwhile; endif; ?>
                </div>
                <div class="gridRow-col gridRow-col_size1of4" role="complementary">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
