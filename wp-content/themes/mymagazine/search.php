<?php
/**
 *  The template for displaying search pages.
 */

    get_header();
?>
        <div id="content" class="medium-8 columns" role="main">            
            <?php if ( have_posts() ) : ?>
            <header class="article-intro">
                <div class="row">
                    <div class="article-title no-thumbnail large-12 columns">
                        <h2><?php printf( __( 'Search Results for: %s', 'mymagazine' ), get_search_query() ); ?></h2>
                    </div>
                </div><!-- end .row -->
            </header><!-- end .article-intro -->
            <div class="row">
                <div class="article-container large-12 columns">
                    <div class="row">
                        <?php while ( have_posts() ) : the_post(); 
                            mymagazine_home_articles();
                        endwhile; ?>
                        <div class="clear"></div>
                        <?php $pagination = get_the_posts_pagination();
                        if ($pagination){ ?>
                            <div class="pagination">
                                <?php previous_posts_link( '<span class="previous">' . __( "Previous", "mymagazine" ) . '</span>' ) ?>
                                <?php next_posts_link( '<span class="next">' . __( "Next", "mymagazine" ) . '</span>' ); ?>
                            </div>
                        <?php } ?>
                        
                        <?php // If no content, include the "No posts found" template.
                            else :
                                    get_template_part( 'content', 'none' );
            
                            endif;
                        ?>
                        
                    </div><!-- end .row -->
                </div><!-- end .article-container -->
            </div><!-- end .row -->
        </div>
        <!-- End Main Column -->
        <?php get_sidebar(); ?>
        <?php get_footer(); ?>