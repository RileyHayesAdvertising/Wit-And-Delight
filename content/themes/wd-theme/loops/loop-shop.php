        <div class="content">
            <div class="gridRow">
                <div class="gridRow-col gridRow-col_size3of4 gridRow-col_push1of4" role="main">
                    <div class="panel panel_condensed">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="panel panel_inverse">
                            <div class="feature feature_condensed">
                                <div class="feature-hd">
                                    <h2 class="hdg hdg_1"><?php the_title(); ?></h2>
                                </div>
                                <div class="feature-bd">
                                    <div class="user-content">
                                        <?php
                                            the_content(); 
                                        ?>
                                    </div>
                                    <div id="js-carousel">
                                        <h3 class="isHidden">Featured Items</h3>
                                        <?php 
                                        // display carousel slides
                                        $rows = get_field('shop_carousel');
                                        if($rows) {
                                            echo '<ul class="carousel">';
                                            foreach($rows as $row) {
                                                echo '<li class="carousel-item">';
                                                    echo '<h4 class="isHidden">'.$row['slide_title'].'</h4>';
                                                    echo '<a href="'.$row['slide_link'].'" rel="external">';
                                                        echo '<img src="'.$row['slide_image'].'" alt="'.$row['slide_title'].'" />';
                                                    echo '</a>';
                                                echo '</li>';
                                            }
                                            echo '</ul>';
                                        }
                                        ?>
                                    </div>
                                    <h3 class="hdg hdg_1">Currently Coveted</h3>
                                    <?php 
                                    // display shop grid items
                                    $rows = get_field('shop_grid');
                                    if($rows) {
                                        echo '<ul class="blocks blocks_splitMobile blocks_3up">';
                                        foreach($rows as $row) {
                                            echo '<li>';
                                                echo '<a href="'.$row['product_link'].'" rel="external">';
                                                    echo '<img src="'.$row['product_image'].'" alt="'.$row['product_title'].'" />';
                                                    echo '<h4>'.$row['product_title'].'</h3>';
                                                    echo '<div>'.$row['product_price'].'</div>';
                                                echo '</a>';
                                            echo '</li>';
                                        }
                                        echo '</ul>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; endif; ?>
                    </div>
                </div>
                <div class="gridRow-col gridRow-col_size1of4 gridRow-col_pull3of4" role="complementary">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
