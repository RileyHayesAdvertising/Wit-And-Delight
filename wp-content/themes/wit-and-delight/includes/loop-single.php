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
                        <div class="user-content">
                            <?php
                                if (get_field('video_embed_code')) {
                                    echo '<div class="videoPlayer">';
                                    echo get_field('video_embed_code');
                                    echo '</div>';
                                } else if (has_post_thumbnail()) {
                                    echo addPinterestIconToImage('<img class="alignnone size-full" src="' . wp_get_attachment_url(get_post_thumbnail_id(get_the_id(), 'large')) . '">');
                                } else {
                                    echo addPinterestIconToImage(the_first_image(get_the_id(), 'large'));
                                }
                            ?>
                        </div>
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
                                if (has_post_thumbnail() || get_field('video_embed_code')) {
                                    echo parseForPinterestImages(get_the_content());
                                } else {
                                    $content = get_the_content();
                                    $content = apply_filters('the_content', $content);
                                    $content = content_without_first_image($content);
                                    echo parseForPinterestImages($content);
                                }
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
                                if (has_post_thumbnail($related_post->ID)) {
                                    echo get_the_post_thumbnail($related_post->ID, 'medium');
                                } else {
                                    echo the_teaser_image($related_post->ID, 'medium');
                                }
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
