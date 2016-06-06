<li>
    <div class="box">
        <div class="teaser">
            <div class="teaser-media">
                <?php
                    $post_thumbnail = '';

                    if (has_post_thumbnail()) {
                        $post_thumbnail = get_the_post_thumbnail(get_the_id(), 'medium');
                        $pinterest_thumbnail = wp_get_attachment_url(get_post_thumbnail_id(get_the_id(), 'thubmnail'));;
                    } else {
                        $post_thumbnail = the_teaser_image(get_the_id(), 'medium');
                        $pinterest_thumbnail = $post_thumbnail;
                    }

                    $pinterest_url = urlencode(get_the_permalink());
                    $pinterest_image = urlencode($pinterest_thumbnail);
                    $pinterest_description = urlencode(get_the_title());
                ?>

                <a href="//pinterest.com/pin/create/link/?url=<?php echo $pinterest_url; ?>&media=<?php echo $pinterest_image; ?>&description=<?php echo $pinterest_description; ?>">
                    <span class="pin"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/pin-it.png" alt="Pin It" /></span>
                    <?php
                        echo $post_thumbnail;
                    ?>
                </a>
            </div>
            <div class="teaser-bd">
                <div class="blurb">
                    <div class="blurb-label">
                        <span class="caption"><?php exclude_post_categories('206',', '); ?></span>
                    </div>
                    <div class="blurb-hd">
                        <h3 class="hdg hdg_xxl">
                            <a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
                        </h3>
                    </div>
                    <div class="blurb-bd">
                        <div class="user-content">
                            <?php echo the_excerpt(); ?>
                        </div>
                    </div>
                    <div class="blurb-ft">
                        <span class="caption">
                            <a href="<?php echo the_permalink(); ?>">Read More &gt;</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>