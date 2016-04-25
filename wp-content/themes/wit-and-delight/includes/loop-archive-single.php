<li>
    <div class="box">
        <div class="teaser">
            <div class="teaser-media">
                <a href="<?php echo the_permalink(); ?>">
                    <img src="<?php echo the_first_image(); ?>" alt="" />
                </a>
            </div>
            <div class="teaser-bd">
                <div class="blurb">
                    <div class="blurb-label">
                        <span class="caption"><?php exclude_post_categories('196',', '); ?></span>
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