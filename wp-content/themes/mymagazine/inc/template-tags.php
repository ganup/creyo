<?php
if ( ! function_exists( 'mymagazine_article_intro' ) ) :
/**
 * Template to display the main article on the home page and the intro of the article on single posts
 */
    function mymagazine_article_intro(){ ?>
        <?php global $post ?>
        <div class="row">
            <div class="article-title <?php if ( ! has_post_thumbnail() ) echo 'no-thumbnail '; ?>large-12 columns">
                  <h2><?php if( ! is_single() ) { ?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <?php } else { the_title(); } ?></h2>
            </div>
        </div><!-- end .row -->
        <?php if ( has_post_thumbnail() ) { ?>
            <div class="row">
                  <div class="large-12 small-centered columns">
                    <?php if( ! is_single() ) { ?>
                      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('mymagazine-size'); ?></a>
                    <?php } else { the_post_thumbnail('mymagazine-size'); } ?>
                  </div>
            </div><!-- end .row -->
        <?php } ?>
        <div class="row">
            <?php if( $post->post_excerpt ) { ?>
                <div class="summary <?php if ( ! has_post_thumbnail() ) echo 'summary-no-thumbnail '; ?>large-12 small-centered columns">
                    <p><?php echo $post->post_excerpt; ?></p>
                </div>
            <?php } ?>
        </div><!-- end .row -->    
    <?php } ?>
<?php endif; ?>
<?php
if ( ! function_exists( 'mymagazine_comment' ) ) :
/**
 * Template for comments.
 *
 */
function mymagazine_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <div class="comment-content">
            <div class="comment-informations">
                <p><?php _e( 'a thought by', 'mymagazine' ); ?> <?php comment_author(); ?></p>
                    <time datetime="<?php comment_time('c'); ?>"><?php echo get_comment_date('M j Y'); ?></time>
            </div><!-- end .comment-informations -->
            <div class="row">
                <div class="comment-author large-3 columns">
                    <div class="author-image-round">
                            <?php echo get_avatar( $comment, 80 ); ?>
                    </div><!-- end .author-image-round -->
                </div><!-- end .comment-author -->
                <div class="comment-text large-9 columns">
                    <?php comment_text(); ?>
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                        <em><span class="genericon genericon-spam"></span><?php _e( 'Your comment is awaiting moderation.', 'mymagazine' ); ?></em>
                        <br />
                    <?php endif; ?>
                    <p class="reply-to-comment">
                    <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    </p>
                </div><!-- end .comment-text -->               
            </div><!-- end .row -->            
        </div><!-- end .comment-content -->
    </li>
<?php } ?>
<?php endif; ?>
<?php function mymagazine_author_social_links(){    

/**
 * Template tag used to display author's social links
 */
        // Retrieve a custom field value
        $twitterHandle = esc_url(get_the_author_meta('twitter'));
        $facebookHandle = esc_url(get_the_author_meta('facebook'));
        $googleHandle = esc_url(get_the_author_meta('gplus'));
        $pinterestHandle = esc_url(get_the_author_meta('pinterest'));
        $linkedinHandle = esc_url(get_the_author_meta('linkedin'));
        if ( $facebookHandle != '' ) { ?>
            <li><a class="genericon genericon-facebook-alt" href="<?php echo $facebookHandle; ?>"><span class="screen-reader-text">Facebook</span></a></li>
        <?php } 
        if ( $twitterHandle != '' ) { ?>
            <li><a class="genericon genericon-twitter" href="<?php echo $twitterHandle; ?>"><span class="screen-reader-text">Twitter</span></a></li>    
        <?php } 
        if ( $pinterestHandle != ''  ) { ?>
            <li><a class="genericon genericon-pinterest" href="<?php echo $pinterestHandle; ?>"><span class="screen-reader-text">Pinterest</span></a></li>
        <?php } 
        if ( $googleHandle != ''  ) { ?>
            <li><a class="genericon genericon-googleplus-alt" href="<?php echo $googleHandle; ?>"><span class="screen-reader-text">Googleplus</span></a></li>
        <?php } 
        if ( $linkedinHandle != ''  ) { ?>
            <li><a class="genericon genericon-linkedin" href="<?php echo $linkedinHandle; ?>"><span class="screen-reader-text">Linkedin</span></a></li>
        <?php } 
    } ?>
<?php
if ( ! function_exists( 'mymagazine_author_display' ) ) :
/**
 * Template for author's section inside a post.
 */
    function mymagazine_author_display(){ ?>
        <div class="row">
            <address class="author-info large-12 columns">
                <div class="author-extended">
                    <div class="author-name">
                        <h4>Author: <?php esc_url(the_author_posts_link()); ?></h4>
                    </div><!-- author name -->
                    <div class="row">
                        <div class="author-image small-12 large-2 large-offset-1 columns">
                            <div class="round-image"> 
                                <div class="author-image-round">
                                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
                                </div>
                            </div><!-- end .round-title -->
                        </div><!--- end .author-image -->
                        <div class="author-description small-12 large-9 columns">
                            <p><?php esc_attr(the_author_meta('description')); ?></p>
                        </div><!-- end .author-description -->
                    </div><!-- end .row -->
                    <ul>
                      <?php mymagazine_author_social_links(); ?>          
                    </ul>
                </div>
            </address>
        </div>
    <?php } ?>
<?php endif; ?>
<?php
if ( ! function_exists( 'mymagazine_author_display_archive' ) ) :
/**
 * Template tag used for author's section inside the archive page.
 */
    function mymagazine_author_display_archive(){ ?>
        <div class="row">
            <address class="author-info large-12 columns">
                <div class="author-extended">
                    <div class="row">        
                        <div class="author-description small-12 large-8 columns">
                          <p><?php esc_attr(the_author_meta('description')); ?></p>
                        </div><!-- end .author-description -->
                        <div class="author-image small-12 large-4 columns">
                            <div class="round-image"> <!-- This div contains the curved title -->
                                <div class="author-image-round">
                                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 240 ); ?>
                                </div>
                            </div><!-- end .round-title -->
                        </div><!--- end .author-image -->
                    </div><!-- end .row -->
                    <ul>
                      <?php mymagazine_author_social_links(); ?>          
                    </ul>
                </div>
            </address>
        </div>
    <?php } ?>
<?php endif; ?>
<?php
if ( ! function_exists( 'mymagazine_home_articles' ) ) :
/**
 * Template for post list on the home page and archive pages
 */
    function mymagazine_home_articles(){ ?>
    <?php global $post;
    $format = get_post_format();
    ?>
    <div class="articles-home small-12 columns <?php if ( ! has_post_thumbnail() ) echo 'no-thumbnail '; ?><?php if ( ! has_category()) echo 'no-category '; ?><?php if ( ! has_tag()) echo 'no-tag '; ?><?php if ( $format == 'aside' ) echo 'aside-post'; ?>">
        <span class="article-introduction"><?php mymagazine_posttags(); ?></span>
        <span class="article-label"><?php if ($format == 'video' || $format == 'image' || $format == 'gallery') { ?><span class="genericon genericon-<?php echo $format; ?>"></span><?php } ?><?php mymagazine_postcategory(); ?></span>
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
        <h3 class="article-title-home"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <p class="article-summary-home">
        <?php if ( $format == 'aside' ) { ?><a href="<?php the_permalink(); ?>"><?php } ?>
        <?php if( $post->post_excerpt ) { 
            echo $post->post_excerpt;
        } else {
            the_excerpt();
        } ?>
        <?php if ( $format == 'aside' ) { ?></a><?php } ?>
        </p>
    </div>
    <?php } ?>
<?php endif; ?>
<?php
if ( ! function_exists( 'mymagazine_entry_footer' ) ) :
/**
 * Template for post list on the home page and archive pages
 */
    function mymagazine_entry_footer(){ ?>
    <?php global $post ?>
        <footer class="entry-footer">
            <span class="genericon genericon-print"></span><span class="entry-date"><?php _e(' Posted on ', 'mymagazine'); echo get_the_date(); _e(' by ', 'mymagazine'); esc_url( the_author_posts_link() ); ?></span>
            <?php if ( has_category() ){ ?>
                <p class="category-tag"><span class="genericon genericon-category"></span><?php the_category(' '); ?></p>
            <?php } ?>
            <?php if ( has_tag() ) { ?>
                <p class="category-tag"><span class="genericon genericon-tag"></span><?php the_tags('', ' ', ''); ?></p>
            <?php } ?>
            <p class="category-tag"><span class="genericon genericon-edit"></span><?php edit_post_link( __( 'Edit', 'mymagazine' ), '<span class="edit-link">', '</span>' ); ?></p>
        </footer><!-- .entry-footer -->
<?php } ?>
<?php endif; ?>