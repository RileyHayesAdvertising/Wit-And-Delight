<div class="page">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="page-hd">
        <h2 class="isVisuallyHidden"><?php the_title(); ?></h2>
    </div>
    <div class="page-bd">
        <div class="box box_inset">
            <div class="pageSections">
            <?php while(has_sub_field('page_sections')): ?>
            <?php
                $section_layout  = get_sub_field('page_section_layout');
                $section_title   = get_sub_field('page_section_title');
                $section_image   = get_sub_field('page_section_image');
                $section_content = get_sub_field('page_section_content');
                $section_anchor  = sanitize_title($section_title);
                $image_class     = '';
                
                if ($section_layout == "imageRight") {
                    $image_class = "main-bd-media_flexRight";
                }
                
                if ($section_layout == "imageLeft") {
                    $image_class = "main-bd-media_flexLeft";
                }
            ?>
                <div class="pageSections-slice">
                    <div class="main">
                        <?php if ($section_title) : ?>
                        <div class="main-hd">
                            <h3 class="caption" id="<?php echo $section_anchor ?>"><?php echo $section_title; ?></h3>
                        </div>
                        <?php endif; ?>
                        <div class="main-bd">
                            <?php if ($section_layout != "textOnly") : ?>
                            <div class="main-bd-media <?php echo $image_class; ?>">
                                <img data-pin-nopin="true" src="<?php echo $section_image; ?>" alt="" />
                            </div>
                            <?php endif; ?>
                            <?php if ($section_layout != "imageOnly") : ?>
                            <div class="main-bd-content">
                                <div class="user-content">
                                    <?php echo $section_content; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            </div>
        </div>
    </div>
    <?php endwhile; endif; ?>
    <?php if(get_field('press')): ?>
    <div class="page-ft">
        <div class="section">
            <div class="section-hd section-hd_empty">
                <h2 class="isVisuallyHidden">Press</h2>
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
