        <div class="content">
            <div class="gridRow">
                <div class="gridRow-col gridRow-col_size3of4" role="main">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="box mix-box_withRequiredHeight">
                            <div class="feature feature_condensed">
                                <div class="feature-hd feature-hd_isCentered">
                                    <div class="hdg hdg_4 mix-hdg_snowflake mix-hdg_snowflake_loose">
                                        <?php the_category(', '); ?>
                                    </div>
                                </div>
                                <div class="feature-img">
                                    <img src="<?php echo the_first_image(); ?>" alt="" />
                                </div>
                                <div class="feature-title">
                                    <h2 class="hdg hdg_0">
                                        <?php the_title(); ?>
                                    </h2>
                                </div>
                                <div class="feature-author">
                                    Posted <?php the_time('m'); ?>/<?php the_time('d'); ?>/<?php the_time('y'); ?> by <?php echo get_the_author_meta('first_name'); ?> <? echo get_the_author_meta('last_name') ?>
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
                        <?php
                            $includeFMCode = get_field('include_federated_media_content');
                            $includePostSpecificAds = get_field('post_specific_ads');
                            if ($includeFMCode == "yes" && !$includePostSpecificAds) {
                        ?>
                        <div class="box">
                            <div class="feature feature_condensed">
                                <div class="feature-adWell">
                                    <!-- FM Content Well 650x300 Zone -->
                                    <script type="text/javascript" src="http://static.fmpub.net/zone/16412"></script>
                                    <!-- FM Content Well 650x300 Zone -->
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                            if ($includePostSpecificAds) {
                        ?>
                        <div class="box">
                            <div class="feature feature_condensed">
                                <div class="feature-adWell feature-adWell_isCentered">
                                    <?php the_field('post_specific_ads'); ?>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
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
