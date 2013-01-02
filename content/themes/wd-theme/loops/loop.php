        <script>
            var WD = WD || {};
            WD.POSTS = WD.POSTS || [];
        </script>
        <script id="template-scrollview" type="text/x-handlebars-template">
            {{#each this}}
            <div class="jsToggleItem">
                <div class="panel panel_inverse">
                    <div class="box">
                        <div class="feature feature_condensed feature_post">
                            <div class="feature-hd">
                                <h3 class="hdg hdg_1">
                                    <a href="{{the_permalink}}">
                                        <span class="ribbon">
                                            <span class="ribbon-bd">
                                                <span class="ribbon-bd-inner">
                                                    <span class="date">
                                                        {{the_month_number}}/{{the_day}}/{{the_short_year}}
                                                    </span>
                                                </span>
                                            </span>
                                            <span class="ribbon-buddy">
                                                {{{the_title}}}
                                            </span>
                                        </span>
                                    </a>
                                </h3>
                            </div>
                            {{#if the_first_image}}
                            <div class="feature-img">
                                <a href="{{the_permalink}}">
                                    <img src="{{the_first_image}}" alt="" />
                                </a>
                                <a href="http://pinterest.com/pin/create/button/?media={{the_first_image}}&amp;url={{the_permalink}}" class="pinIt pinIt_feature" title="Pin this article on Pinterest">Pin this article on Pinterest</a>
                            </div>
                            {{/if}}
                            <div class="feature-bd">
                                <div class="user-content">
                                    {{{the_content}}}
                                </div>
                            </div>
                            <div class="feature-meta">
                                <ul class="blocks blocks_3up">
                                    <li><a href="http://www.facebook.com/sharer.php?u={{the_permalink}}" class="btn" rel="external">Share on Facebook</a></li>
                                    <li><a href="http://twitter.com/share?url={{the_permalink}}" class="btn" rel="external">Tweet It</a></li>
                                    <li><a href="http://pinterest.com/pin/create/button/?media={{the_first_image}}&amp;url={{the_permalink}}" class="btn">Pin it</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{/each}}
        </script>
        <script id="template-gridview" type="text/x-handlebars-template">
            <div class="panel panel_inverse">
                <div class="gridRow">
                    {{#each this}}
                    <div class="gridRow gridRow-col gridRow-col_size1of3">
                        {{#each this}}
                        <div class="jsToggleItem">
                            <div class="box box_slim box_push">
                                <div class="feature feature_condensed feature_post">
                                    {{#if the_first_image}}
                                    <div class="feature-img feature-img_alt">
                                        <a href="{{the_permalink}}">
                                            <img src="{{the_first_image}}" alt="" />
                                        </a>
                                        <a href="http://pinterest.com/pin/create/button/?media={{the_first_image}}&amp;url={{the_permalink}}" class="pinIt pinIt_feature" title="Pin this article on Pinterest">Pin this article on Pinterest</a>
                                    </div>
                                    {{/if}}
                                    <div class="feature-hd feature-hd_condensed_sm">
                                        <h3 class="hdg hdg_4">
                                            <a href="{{the_permalink}}">
                                                <span class="ribbon">
                                                    <span class="ribbon-bd ribbon-bd_alt">
                                                        <span class="ribbon-bd-inner">
                                                            <span class="date">
                                                                {{the_month_number}}/{{the_day}}/{{the_short_year}}
                                                            </span>
                                                        </span>
                                                    </span>
                                                    <span class="ribbon-buddy">
                                                        {{{the_title}}}
                                                    </span>
                                                </span>
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="feature-bd">
                                        <div class="user-content">
                                            {{{the_content}}}
                                        </div>
                                    </div>
                                    <div class="feature-meta feature-meta_grid">
                                        <ul class="blocks blocks_3up">
                                            <li><a href="http://www.facebook.com/sharer.php?u={{the_permalink}}" class="btn" rel="external">Share on Facebook<i class="icn icn_facebook"></i></a></li>
                                            <li><a href="http://twitter.com/share?url={{the_permalink}}" class="btn" rel="external">Tweet it<i class="icn icn_twitter"></i></a></li>
                                            <li><a href="http://pinterest.com/pin/create/button/?media={{the_first_image}}&amp;url={{the_permalink}}" class="btn">Pin it<i class="icn icn_pin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{/each}}
                    </div>
                    {{/each}}
                </div>
            </div>
        </script>
        <div class="content">
            <div class="gridRow">
                <div class="gridRow-col gridRow-col_size3of4 gridRow-col_push1of4" role="main">
                    <div class="panel panel_condensed">
                        <h2 class="isHidden">Articles</h2>
                        <div id="jsToggleWrapper">
                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                <?php
                                    // strip the <img> elements from the post but leave all other html intact
                                    $content = get_the_content('');
                                    $content = apply_filters('the_content', $content);
                                    $pattern = '/(<img.+?>)/';
                                    $replacements='';
                                    $postOutput = preg_replace($pattern, $replacements, $content);
                                ?>

                                <script>
                                    WD.POSTS.push({
                                        the_month: "<?php the_time('M'); ?>",
                                        the_month_number: "<?php the_time('m'); ?>",
                                        the_day: "<?php the_time('d'); ?>",
                                        the_year: "<?php the_time('Y'); ?>",
                                        the_short_year: "<?php the_time('y'); ?>",
                                        the_title: "<?php echo the_title(); ?>",
                                        the_first_image: "<?php echo the_first_image(); ?>",
                                        the_permalink: "<?php echo the_permalink(); ?>",
                                        the_content: <?php echo json_encode($postOutput); ?>
                                    });
                                </script>

                                <?php if (!isset($_COOKIE["viewprefs"]) || $_COOKIE["viewprefs"] == "scroll") : ?>
                                    <div class="jsToggleItem">
                                        <div class="panel panel_inverse">
                                            <div class="box">
                                                <div class="feature feature_condensed feature_post">
                                                    <div class="feature-hd">
                                                        <h3 class="hdg hdg_1">
                                                            <a href="<?php the_permalink(); ?>"><?php the_time('M.d.Y | '); ?><?php the_title(); ?></a>
                                                        </h3>
                                                    </div>
                                                    <?php if (the_first_image() != '') { ?>
                                                    <div class="feature-img">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <img src="<?php echo the_first_image() ?>" alt="" />
                                                        </a>
                                                        <a href="http://pinterest.com/pin/create/button/?media=<?php echo urlencode(the_first_image()); ?>&url=<?php echo urlencode(get_permalink()); ?>" class="pinIt pinIt_feature" title="Pin this article on Pinterest">Pin this article on Pinterest</a>
                                                    </div>
                                                    <?php } ?>
                                                    <div class="feature-bd">
                                                        <div class="user-content">
                                                            <?php echo $postOutput; ?>
                                                        </div>
                                                    </div>
                                                    <div class="feature-meta">
                                                        <ul class="blocks blocks_3up">
                                                            <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" class="btn" rel="external">Share on Facebook</a></li>
                                                            <li><a href="http://twitter.com/share?url=<?php the_permalink(); ?>" class="btn" rel="external">Tweet It</a></li>
                                                            <li><a href="http://pinterest.com/pin/create/button/?media=<?php echo urlencode(the_first_image()); ?>&url=<?php echo urlencode(get_permalink()); ?>" class="btn">Pin it</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endif; ?>

                            <?php endwhile; ?>
                                <?php if ($_COOKIE["viewprefs"] == "grid") : ?>
                                    <script>
                                        (function($){
                                            var source   = $(document.getElementById('template-gridview')).html();
                                            var template = Handlebars.compile(source);
                                            $(document.getElementById('jsToggleWrapper')).html(template(WD.ViewSwitcher.parseGridArray(WD.POSTS)));
                                        }(jQuery));
                                    </script>
                                <?php endif; ?>

                            <?php else: ?>
                            <div class="jsToggleItem">
                                <div class="panel panel_bare">
                                    <div class="feature">
                                        <div class="feature-hd">
                                            <h3 class="hdg hdg_2 hdg_center">Sorry no posts matched your criteria.</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div> <!-- // end jsToggleWrapper -->
                        <div class="panel panel_bare">
                            <ol class="pagination">
                                <li class="pagination-prev"><?php next_posts_link('<i class="icn icn_prev"></i>Older Posts');  ?></li>
                                <li class="pagination-next"><?php previous_posts_link('Newer Posts<i class="icn icn_next"></i>');  ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="gridRow-col gridRow-col_size1of4 gridRow-col_pull3of4" role="complementary">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
