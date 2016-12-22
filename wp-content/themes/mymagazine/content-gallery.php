<?php

?>
            <article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="article-intro">
                    <div class="row">
                        <div class="article-title <?php if ( ! has_post_thumbnail() ) echo 'no-thumbnail '; ?>large-12 columns">
                              <h2 class="gallery-post-title"><span class="genericon genericon-gallery"></span><?php the_title(); ?></h2>
                        </div>
                    </div><!-- end .row -->
                    <div class="row">
                              <div class="large-12 small-centered columns">
                                  <ul class="rslides">
                                  <?php
                                    if ( get_post_gallery() ) :
                                        $gallery = get_post_gallery( get_the_ID(), false );
            
                                        /* Loop through all the image and output them one by one */
                                        foreach( $gallery['src'] as $src ) : ?>
                                            <li><img src="<?php echo $src; ?>" class="my-custom-class" alt="Gallery image" /></li>
                                            <?php
                                        endforeach;
                                    endif; ?>
                              </div>
                        </div><!-- end .row -->
                </header><!-- end .article-intro -->
                <div class="row">
                    <div class="article-container small-12 columns">
                        <div class="article-content">
                            <?php the_content(); ?>
                           <?php wp_link_pages( array(
                                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'mymagazine' ) . '</span>',
                                'after'       => '</div>',
                                'link_before' => '<span>',
                                'link_after'  => '</span>',
                                ) );
                            ?>
                        </div>
                    </div><!-- end .article-container -->
                </div><!-- end .row -->
                <?php mymagazine_entry_footer(); ?>
            </article>