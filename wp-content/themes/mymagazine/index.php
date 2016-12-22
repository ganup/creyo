<?php
    get_header();
?>
        <div id="content" class="large-8 columns" role="main">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article>
                <header class="article-intro">
                    <div class="row">
                        <div class="article-title <?php if ( ! has_post_thumbnail() ) echo 'no-thumbnail '; ?>large-12 columns">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </div>
                    </div><!-- end .row -->
                    <?php if ( has_post_thumbnail() ) { ?> 
                        <div class="row">
                            <div class="large-12 columns">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                            </div>
                        </div><!-- end .row -->
                    <?php } ?>
                </header><!-- end .article-intro -->
                <div class="row">
                    <div class="article-container large-12 columns">
                        <div class="article-content">
                           <?php the_content(); ?> 
                        </div>
                    </div><!-- end .article-container -->
                </div><!-- end .row -->
            </article>
            <?php endwhile; ?>
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
            
        </div>
        <!-- End Main Column -->
        <?php get_sidebar(); ?>
        <?php get_footer(); ?>