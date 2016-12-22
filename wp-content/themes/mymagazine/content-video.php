<?php

?>
            <article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="article-intro">
                    <div class="row">
                        <div class="article-title no-thumbnail large-12 columns">
                              <h2 class="video-post-title"><span class="genericon genericon-video"></span><?php the_title(); ?></h2>
                        </div>
                    </div><!-- end .row -->
                    <div class="row">
                              <div class="video-container large-12 small-centered columns">
                                  <?php the_content(); ?>
                              </div>
                        </div><!-- end .row -->
                </header><!-- end .article-intro -->
                <div class="row">
                    <div class="article-container large-12 columns">
                        <div class="article-content">
                           
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