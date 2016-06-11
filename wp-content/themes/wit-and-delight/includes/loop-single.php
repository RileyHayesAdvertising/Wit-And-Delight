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
                        <?php
                            $url = get_the_permalink();
                            $desc = get_the_title();

                            if (get_field('video_embed_code')) {
                                echo '<div class="videoPlayer">' . get_field('video_embed_code') . '</div>';
                            } else if (has_post_thumbnail()) {
                                $post_thumbnail = wp_get_attachment_url(get_post_thumbnail_id(get_the_id(), 'large'));
                                echo '<img src="' . $post_thumbnail . '" data-pin-url="' . $url .'" data-pin-description="' . $desc .'">';
                            } else {
                                $post_thumbnail = the_teaser_image(get_the_id(), 'large');
                                echo '<img src="' . $post_thumbnail . '" data-pin-url="' . $url .'" data-pin-description="' . $desc .'">';
                            }
                        ?>
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

                                if (has_post_thumbnail() || get_field('video_embed_code')) {
                                    echo $content;
                                } else {
                                    echo content_without_first_image($content);
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
                    <h2 class="hdg hdg_md">You Might Also Like &hellip;</h2>
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
                                    $image_id = get_post_thumbnail_id($related_post->ID);
                                    $image_url = wp_get_attachment_image_src($image_id, 'medium', true);
                                    $post_thumbnail = $image_url[0];
                                    echo '<img data-pin-nopin="true" src="' . $post_thumbnail . '" />';
                                } else {
                                    $post_thumbnail = the_teaser_image($related_post->ID, 'medium');
                                    echo '<img data-pin-nopin="true" src="' . $post_thumbnail . '" />';
                                }
                                echo '</div>';
                                echo '<div class="clip-hd">';
                                echo '<h3 class="hdg hdg_sm">' . get_the_title($related_post->ID) . '</h3>';
                                echo '</div>';
                                echo '<div class="clip-cta">';
                                echo '<span class="caption caption_tight caption_sm">Read More &gt;</span>';
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
