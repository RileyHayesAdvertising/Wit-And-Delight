<div class="archive">
    <div class="archive-hd">
        <h2 class="isVisuallyHidden">Recent Posts</h2>
    </div>
    <div class="archive-bd">
        <ol class="vlist">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
                                        <span class="caption"><?php the_category(', '); ?></span>
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
                <?php if (($wp_query->current_post + 1) == 5) : ?>
                <li>
                    <div class="box box_cta">
                        <div class="cta">
                            <div class="cta-embellishment" aria-hidden="true">
                                <ul class="hList">
                                    <li>
                                        <i class="icn icn_social"><?php echo file_get_contents(get_template_directory() . '/assets/images/icn-envelope.svg'); ?></i>
                                    </li>
                                    <li>
                                        <i class="icn icn_social"><?php echo file_get_contents(get_template_directory() . '/assets/images/icn-envelope.svg'); ?></i>
                                    </li>
                                    <li>
                                        <i class="icn icn_social"><?php echo file_get_contents(get_template_directory() . '/assets/images/icn-envelope.svg'); ?></i>
                                    </li>
                                    <li>
                                        <i class="icn icn_social"><?php echo file_get_contents(get_template_directory() . '/assets/images/icn-envelope.svg'); ?></i>
                                    </li>
                                </ul>
                            </div>
                            <div class="cta-hd">
                                <h3 class="hdg hdg_xxl">Want More W&D?</h3>
                            </div>
                            <div class="cta-action">
                                <form action="//witanddelight.us8.list-manage.com/subscribe/post?u=fe8e8b8d53d3bee8b00c5ff00&amp;id=2b3fd7bf01" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate>
                                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                    <input type="text" name="b_fe8e8b8d53d3bee8b00c5ff00_2b3fd7bf01" tabindex="-1" value="">
                                </div>
                                <div class="pill">
                                    <div class="pill-section">
                                        <input class="input input_violator" type="text" name="EMAIL" id="mce-EMAIL" value="" placeholder="Enter your email" />
                                    </div>
                                    <div class="pill-section pill-section_fill">
                                        <button class="btn" type="submit" name="subscribe" id="mc-embedded-subscribe">Subscribe</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </li>
                <?php endif;?>
            <?php endwhile; ?>
            <?php else: ?>
                <li>
                    <div class="box">
                        <h3 class="hdg hdg_xxl">Sorry. no posts were found!</h3>
                    </div>
                </li>
            <?php endif; ?>
        </ol> <!-- // END .vlist -->
    </div>
    <div class="archive-ft">
        <button>Load More</button>
    </div>
</div> <!-- // END .archive -->
