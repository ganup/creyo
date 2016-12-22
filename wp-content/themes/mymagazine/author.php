<?php
/**
 *
 *  The template for displaying author archive pages.
 */

    get_header();
?>
        <div id="content" class="medium-8 columns" role="main">
            <header class="archive-header">
                <?php
                        the_archive_title( '<h1 class="archive-title">', '</h1>' );
                ?>
            </header><!-- .page-header -->
            <?php mymagazine_author_display_archive(); ?>            
            <div class="row">
                <div class="article-container large-12 columns">
                    <div class="row">
                        <?php 
                            $args = array(
                                
                                'ignore_sticky_posts' => 1,
                            );
                        $the_query = new WP_Query( $args ); ?>
            
                        <!-- the loop -->
                        <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <div class="articles-archive large-6 columns">
                                <span class="article-introduction"><?php mymagazine_posttags(); ?></span>
                                <span class="article-label"><?php mymagazine_postcategory(); ?></span>
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                                <h3 class="article-title-home"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p class="article-summary-home"><?php echo get_post_meta($post->ID, "_summary_key", true); ?></p>
                            </div>
                            <?php endwhile; ?>
                            </div>
                            <!-- end of the loop -->
                            <div class="clear"></div>
                            <div class="pagination">
                                <?php previous_posts_link( '<span class="previous">' . __( "Previous", "mymagazine" ) . '</span>' ) ?>
                                <?php next_posts_link( '<span class="next">' . __( "Next", "mymagazine" ) . '</span>' ); ?>
                            </div>
                            <?php wp_reset_postdata(); ?>            
                        <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- End Main Column -->
        <?php get_sidebar(); ?>
        <?php get_footer(); ?>