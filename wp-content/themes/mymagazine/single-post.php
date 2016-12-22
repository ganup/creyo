<?php
    get_header();
?>
    <div id="content" class="medium-8 columns" role="main">
        <?php if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post(); 
        
                    get_template_part( 'content', get_post_format() ); 
                    
                    dynamic_sidebar( 'sidebar-3' ); ?> 
                <!-- Comments section -->
                <?php // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || get_comments_number() ) :
                            comments_template();
                    endif; ?>
                <!-- end Comments section -->
                <?php 
                $author_checkbox = get_post_custom_values( '_author_key' );
                $authorDisplay = esc_attr($author_checkbox[0]);
                if ($authorDisplay == '1'){
                    mymagazine_author_display();
                }
            } // end while 
        } // end if ?>           
    </div><!-- End Main Column -->


    <?php get_sidebar(); ?>
    <?php get_footer(); ?>
