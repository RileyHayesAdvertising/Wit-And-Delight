<div class="archive">
    <div class="archive-hd">
        <h2>Posts</h2>
    </div>
    <div class="archive-bd">
        <ol class="vlist">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <li>
                    <div class="box">
                        <div class="box-media">
                            <a href="<?php echo the_permalink(); ?>">
                                <img src="<?php echo the_first_image(); ?>" alt="" />
                            </a>
                        </div>
                        <div class="box-bd">
                            <div class="blurb">
                                <div class="blurb-label">
                                    <?php the_category(', '); ?>
                                </div>
                                <div class="blurb-hd">
                                    <h3>
                                        <a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
                                    </h3>
                                </div>
                                <div class="blurb-bd">
                                    <div class="user-content">
                                        <?php echo the_excerpt(); ?>
                                    </div>
                                </div>
                                <div class="blurb-ft">
                                    <a href="<?php echo the_permalink(); ?>">Read More &gt;</a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- // END .box -->
                </li>
            <?php endwhile; ?>
            <?php else: ?>
                <li>
                    <div class="box">
                        <h3>Sorry. no posts were found!</h3>
                    </div>
                </li>
            <?php endif; ?>
        </ol> <!-- // END .vlist -->
    </div>
    <!--
    <div class="archive-ft">
        <ol>
            <li><?php next_posts_link('Older Posts');  ?></li>
            <li><?php previous_posts_link('Newer Posts');  ?></li>
        </ol>
    </div>
    -->
</div> <!-- // END .archive -->
