<div class="page">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="page-hd">
        <h2 class="isVisuallyHidden"><?php the_title(); ?></h2>
    </div>
    <div class="page-bd">
        <div class="box">
            <div class="user-content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
    <?php endwhile; endif; ?>
    <?php if(get_field('press')): ?>
    <div class="page-ft">
        <div class="section">
            <div class="section-hd">
                <h2 class="hdg hdg_lg">Press</h2>
            </div>
            <div class="section-bd">
                <ul class="pods">
                    <?php while(has_sub_field('press')): ?>
                    <li>
                        <?php if(get_sub_field('press_link')) { ?><a href="<?php the_sub_field('press_link'); ?>"><?php } ?>
                        <div class="box box_tight">
                            <?php the_sub_field('press_line_1'); ?>
                            <br/>
                            <span class="caption caption_tight">
                                <?php the_sub_field('press_line_2'); ?>
                            </span>
                            <br/>
                            <?php the_sub_field('press_line_3'); ?>
                        </div>
                        <?php if(get_sub_field('press_link')) { ?></a><?php } ?>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div> <!-- // END .page -->
