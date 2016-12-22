<?php

?>
            <article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="article-intro">
                    <div class="row">
                        <div class="article-title <?php if ( ! has_post_thumbnail() ) echo 'no-thumbnail '; ?>large-12 columns">
                              <h2 class="image-post-title"><span class="genericon genericon-image"></span><?php the_title(); ?></h2>
                        </div>
                    </div><!-- end .row -->
                    <?php if ( has_post_thumbnail() ) { ?>
                        <div class="row">
                              <div class="large-12 small-centered columns">
                                  <?php the_post_thumbnail('mymagazine-size'); ?>
                              </div>
                        </div><!-- end .row -->
                        <div class="row">              
                            <div class="summary large-12 small-centered columns">
                                <p><?php echo get_post(get_post_thumbnail_id())->post_content;  ?></p>
                            </div>
                        </div><!-- end .row -->
                    <?php } else { ?>
                        <div class="row">
                            <div class="large-12 small-centered columns">
                            <?php the_content(); ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php wp_link_pages( array(
                                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'mymagazine' ) . '</span>',
                                'after'       => '</div>',
                                'link_before' => '<span>',
                                'link_after'  => '</span>',
                                ) );
                            ?>
                </div><!-- end .article-intro -->
                <?php mymagazine_entry_footer(); ?>             
            </article>