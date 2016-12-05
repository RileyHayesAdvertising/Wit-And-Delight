<li>
    <div class="box">
        <div class="teaser">
            <div class="teaser-media">
                <?php
                    if (has_post_thumbnail()) {
                        $image_id = get_post_thumbnail_id();
                        $image_url = wp_get_attachment_image_src($image_id, 'medium', true);
                        $post_thumbnail = $image_url[0];
                    } else {
                        $post_thumbnail = the_teaser_image(get_the_id(), 'medium');
                    }

                    $url = get_the_permalink();
                    $desc = get_the_title();

                    echo '<img src="' . $post_thumbnail . '" data-pin-url="' . $url .'" data-pin-description="' . $desc .'">';
                ?>
            </div>
            <div class="teaser-bd">
                <div class="blurb">
                    <div class="blurb-label">
                        <span class="caption"><?php exclude_post_categories('206',', '); ?></span>
                    </div>
                    <div class="blurb-hd">
                        <h3 class="hdg hdg_xxl">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                    </div>
                    <?php if (get_field('post_attribution')): ?>
                    <div class="blurb-meta">
                        <div class="user-content">
                            <?php the_field('post_attribution'); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="blurb-bd">
                        <div class="user-content">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                    <div class="blurb-ft">
                        <span class="caption">
                            <a href="<?php the_permalink(); ?>">Read More &gt;</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>