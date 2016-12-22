<?php

?>
            <article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="row">
                    <div class="article-container large-12 columns">
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
            </article>