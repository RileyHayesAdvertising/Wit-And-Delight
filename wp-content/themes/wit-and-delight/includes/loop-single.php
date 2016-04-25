<div class="single">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php $includeFMCode = get_field('include_federated_media_content'); ?>
        <?php $includePostSpecificAds = get_field('post_specific_ads'); ?>
        <div class="single-bd">
            <div class="box">
                <div class="post">
                    <div class="post-label">
                        <span class="caption"><?php exclude_post_categories('196',', '); ?></span>
                    </div>
                    <div class="post-media">
                        <img src="<?php echo the_first_image(); ?>" alt="" />
                    </div>
                    <div class="post-hd">
                        <h2 class="hdg hdg_xxl"><?php the_title(); ?></h2>
                    </div>
                    <div class="post-meta">
                        Posted <?php the_time('m'); ?>/<?php the_time('d'); ?>/<?php the_time('y'); ?> by <?php echo get_the_author_meta('first_name'); ?> <? echo get_the_author_meta('last_name') ?>
                    </div>
                    <div class="post-bd">
                        <div class="user-content">
                            <?php the_content(); ?>
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
        <div class="single-ft">
            <?php comments_template(); ?>
        </div>
    <?php endwhile; endif; ?>
</div> <!-- // END .single -->
