<div class="page">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="page-hd">
        <h2 class="isVisuallyHidden"><?php the_title(); ?></h2>
    </div>
    <?php endwhile; endif; ?>
    <div class="page-bd">
        <div class="pageSections">
        <?php while(has_sub_field('shop_sections')): ?>
        <?php
            $section_title   = get_sub_field('shop_section_title');
            $section_shop_id = get_sub_field('shop_section_list_id');
            $section_anchor  = sanitize_title($section_title);
        ?>
            <div class="pageSections-slice">
                <div class="main">
                    <?php if ($section_title) : ?>
                    <div class="main-hd">
                        <h3 class="caption" id="<?php echo $section_anchor ?>"><?php echo $section_title; ?></h3>
                    </div>
                    <?php endif; ?>
                    <div class="main-bd">
                        <?php echo get_shopstyle_products($section_shop_id); ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
    </div>
</div> <!-- // END .page -->
