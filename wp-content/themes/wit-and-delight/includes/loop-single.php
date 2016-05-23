<div class="single">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php $includeFMCode = get_field('include_federated_media_content'); ?>
        <?php $includePostSpecificAds = get_field('post_specific_ads'); ?>
        <div class="single-bd">
            <div class="box">
                <div class="post">
                    <div class="post-label">
                        <span class="caption"><?php exclude_post_categories('206',', '); ?></span>
                    </div>
                    <div class="post-media">
                        <img src="<?php echo the_first_image(get_the_id(), 'large'); ?>" alt="" />
                    </div>
                    <div class="post-hd">
                        <h2 class="hdg hdg_xxl"><?php the_title(); ?></h2>
                    </div>
                    <div class="post-meta">
                        Posted <?php the_time('m'); ?>/<?php the_time('d'); ?>/<?php the_time('y'); ?> by <?php echo get_the_author_meta('first_name'); ?> <? echo get_the_author_meta('last_name') ?>
                    </div>
                    <div class="post-bd">
                        <div class="user-content">
                            <?php
                                $content = get_the_content();
                                $content = apply_filters('the_content', $content);
                                $content = content_without_first_image($content);
                                echo $content;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-ad">
            <?php if ($includeFMCode == "yes" && !$includePostSpecificAds) { ?>
            <div class="box">
                <!-- FM Content Well 650x300 Zone -->
                <script type="text/javascript" src="http://static.fmpub.net/zone/16412"></script>
                <!-- FM Content Well 650x300 Zone -->
            </div>
            <?php } ?>
            <?php if ($includePostSpecificAds) { ?>
            <div class="box">
                <?php the_field('post_specific_ads'); ?>
            </div>
            <?php } ?>
        </div>
        <div class="single-related">
            <div class="related">
                <div class="related-hd">
                    <h2 class="hdg hdg_md">You Might Also Like</h2>
                </div>
                <div class="related-bd">
                    <?php
                        $related = get_posts(
                            array(
                                'category__in' => wp_get_post_categories($post->ID),
                                'category__not_in' => '206',
                                'numberposts' => 3,
                                'post__not_in' => array($post->ID)
                            )
                        );

                        if ($related) {
                            echo '<ul class="pods pods_violator">';
                            foreach( $related as $related_post ) {
                                echo '<li>';
                                echo '<a href="' . get_permalink($related_post->ID) . '">';
                                echo '<div class="box box_violator">';
                                echo '<div class="clip">';
                                echo '<div class="clip-media">';
                                echo '<img src="' . the_first_image($related_post->ID, 'medium') .'" alt="" />';
                                echo '</div>';
                                echo '<div class="clip-hd">';
                                echo '<h3 class="caption caption_tight caption_sm">' . get_the_title($related_post->ID) . '</h3>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '<a>';
                                echo '</li>';
                            }
                            echo '</ul>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="single-ft">
            <?php comments_template(); ?>
        </div>
    <?php endwhile; endif; ?>
</div> <!-- // END .single -->
