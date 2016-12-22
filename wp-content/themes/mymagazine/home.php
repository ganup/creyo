<?php
    get_header();
?>
        <div id="content" class="medium-8 columns" role="main">
            <?php 
        // the query
        $args = array(
                        'posts_per_page'      => 1,
                        'post__in'            => get_option( 'sticky_posts' ),
                        'ignore_sticky_posts' => 1,
                    );
        
        $the_query = new WP_Query( $args ); ?>
        
            <!-- the loop -->
            <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <article>
                <header class="article-intro sticky">
                    <?php mymagazine_article_intro(); ?>
                </header><!-- end .article-intro -->
            </article>
            <?php endwhile; wp_reset_postdata(); endif; ?><!-- end of the loop -->

            <div class="row">
                <div class="article-container large-12 columns">
                    <div class="row">
                        <?php
                        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                        $args = array(  
                            'post__not_in'        => get_option( 'sticky_posts' ),
                            'paged'               => $paged,
                        );
                        
                        $the_query = new WP_Query( $args ); ?>
            
                        <!-- the loop -->
                        <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); 
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
                        <?php wp_reset_postdata(); endif; ?><!-- end of the loop -->
                    </div><!-- end .row -->
                </div><!-- end .article-container -->
            </div><!-- end .row -->
          </div>
          <!-- End Main Column -->
    
          <!-- Sidebar -->  
          <?php get_sidebar(); ?>
          <!-- end Sidebar -->
          <!-- Footer -->
          <?php get_footer(); ?>
          <!-- end Footer -->