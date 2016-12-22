<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Flask
 */

if ( ! function_exists( 'flask_posts_navigation' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function flask_posts_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation nolinkborder" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Posts navigation', 'flask' ); ?></h2>
		<div class="nav-links">

		<noscript>
			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( 'Older posts', 'flask' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'flask' ) ); ?></div>
			<?php endif; ?>
		</noscript>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'the_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function the_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation nolinkborder" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'flask' ); ?></h2>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', '%title' );
				next_post_link( '<div class="nav-next">%link</div>', '%title' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'flask_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function flask_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf('<span class="genericon genericon-month"></span> <a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>');

	$byline = sprintf('<span class="genericon genericon-user"></span> <span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>');

	echo '<span class="posted-on nolinkborder">' . $posted_on . '</span><span class="byline nolinkborder"> ' . $byline . '</span>';

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link nolinkborder">';
		comments_popup_link( __( '<span class="genericon genericon-comment"></span> Comment', 'flask' ), __( '<span class="genericon genericon-comment"></span> 1', 'flask' ), __( '<span class="genericon genericon-comment"></span> %', 'flask' ) );
		echo '</span>';
	}
	
	edit_post_link( __( '<span class="genericon genericon-edit"></span>', 'flask' ), '<span class="edit-link nolinkborder">', '</span>' );

}
endif;

if ( ! function_exists( 'flask_the_categories' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function flask_the_categories() {
	if ( ( has_category() ) && ( !is_singular() ) ) {
		$categories_list = get_the_category_list( __( ',', 'flask' ) );
		$cats = explode(',', $categories_list);
		$cats_actual = array_slice($cats, 0, 3);
		$categories_list = implode(' / ', $cats_actual);
		if ( count($cats) > 3 ) $categories_list .= ' / ' . __('etc.', 'flask'); 
		$categories_list = trim($categories_list, ' / ');
		
		echo '<h5 class="entry-categories nolinkborder">' . $categories_list . '</h5>';
	}
}
endif;

if ( ! function_exists( 'flask_social_media' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function flask_social_media() {
	$options = get_option('flask_settings');
	if ( ( !isset( $options['social_share'] ) ) || ( $options['social_share'] == 1 ) ) :
	?>
	<div class="social-media-buttons nolinkborder">
		<a href="https://twitter.com/home?status=<?php echo esc_url( get_permalink() ); ?>">
			<span class="genericon genericon-twitter"></span>
		</a>
		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>">
			<span class="genericon genericon-facebook"></span>
		</a>
		<a href="https://plus.google.com/share?url=<?php echo esc_url( get_permalink() ); ?>">
			<span class="genericon genericon-googleplus"></span>
		</a>
		<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url( get_permalink() ); ?>&title=<?php the_title(); ?>&summary=&source=">
			<span class="genericon genericon-linkedin-alt"></span>
		</a>
	</div>
	<?php
	endif;
}
endif;

if ( ! function_exists( 'flask_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function flask_entry_footer() {
	if ( 'post' == get_post_type() ) {
		$tags_list = get_the_tag_list( '', ', ' );
		if ( $tags_list ) {
			$tags = explode( ', ', $tags_list);
			$tags_count = count($tags);
			$tags_actual = implode(', ', array_slice($tags, 0, 3) );
			if ( $tags_count > 3 ) $tags_actual .= __(', etc.', 'flask');
			
			if ( is_single() ) {
				printf( '<span class="tags-links nolinkborder">' . __( '<span class="genericon genericon-tag"></span> %1$s', 'flask' ) . '</span>', $tags_list );
			} else {
				printf( '<span class="tags-links nolinkborder">' . __( '<span class="genericon genericon-tag"></span> %1$s', 'flask' ) . '</span>', $tags_actual );
			}
		}
		if ( is_single() ) {
			if ( has_category() ) {
				$categories_list = get_the_category_list( __( ',', 'flask' ) );
				printf( '<span class="footer-categories-list nolinkborder">' . __( '<span class="genericon genericon-category"></span> %1$s', 'flask' ) . '</span>', $categories_list );
			}
		} else {
			echo '<span class="read-more nolinkborder"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
			_e('Read More &rarr;', 'flask');
			echo '</a></span>';
		}
	}
}
endif;

if ( ! function_exists( 'flask_archive_title' ) ) :

function flask_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( __( '<span class="genericon genericon-category"></span> %s', 'flask' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( '<span class="genericon genericon-tag"></span> %s', 'flask' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( __( '<span class="genericon genericon-user"></span> %s', 'flask' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( __( '<span class="genericon genericon-month"></span> %s', 'flask' ), get_the_date( _x( 'Y', 'yearly archives date format', 'flask' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( '<span class="genericon genericon-month"></span> %s', 'flask' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'flask' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( '<span class="genericon genericon-day"></span> %s', 'flask' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'flask' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( 'Asides', 'post format archive title', 'flask' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( 'Galleries', 'post format archive title', 'flask' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( 'Images', 'post format archive title', 'flask' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( 'Videos', 'post format archive title', 'flask' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( 'Quotes', 'post format archive title', 'flask' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title', 'flask' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( 'Statuses', 'post format archive title', 'flask' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( 'Audio', 'post format archive title', 'flask' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = _x( 'Chats', 'post format archive title', 'flask' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s', 'flask' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s', 'flask' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives', 'flask' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function flask_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'flask_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'flask_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so flask_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so flask_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in flask_categorized_blog.
 */
function flask_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'flask_categories' );
}
add_action( 'edit_category', 'flask_category_transient_flusher' );
add_action( 'save_post',     'flask_category_transient_flusher' );

if ( ! function_exists( 'flask_follow_social_media' ) ) :
/**
 * Displays social media services on which users may follow you
 */
function flask_follow_social_media() {
	$options = get_option('flask_settings');
	?>
	<?php if ( ( ( isset( $options['follow_facebook'] ) ) && ( !empty( $options['follow_facebook'] ) ) ) ||
		( ( isset( $options['follow_twitter'] ) ) && ( !empty( $options['follow_twitter'] ) ) ) ||
		( ( isset( $options['follow_googleplus'] ) ) && ( !empty( $options['follow_googleplus'] ) ) ) ||
		( ( isset( $options['follow_linkedin'] ) ) && ( !empty( $options['follow_linkedin'] ) ) ) ||
		( ( isset( $options['follow_youtube'] ) ) && ( !empty( $options['follow_youtube'] ) ) ) ||
		( ( isset( $options['follow_pinterest'] ) ) && ( !empty( $options['follow_pinterest'] ) ) ) ||
		( ( isset( $options['follow_flickr'] ) ) && ( !empty( $options['follow_flickr'] ) ) ) ||
		( ( isset( $options['follow_instagram'] ) ) && ( !empty( $options['follow_instagram'] ) ) ) ) : ?>
	<div class="follow-me-on nolinkborder">
		<h5><?php _e('Follow us on', 'flask'); ?></h5>
		<?php if ( ( isset( $options['follow_facebook'] ) ) && ( !empty( $options['follow_facebook'] ) ) ) : ?>
			<a href="<?php echo esc_url( $options['follow_facebook'] ); ?>">
				<span class="genericon genericon-facebook"></span>
			</a>
		<?php endif; ?>
		<?php if ( ( isset( $options['follow_twitter'] ) ) && ( !empty( $options['follow_twitter'] ) ) ) : ?>
			<a href="<?php echo esc_url( $options['follow_twitter'] ); ?>">
				<span class="genericon genericon-twitter"></span>
			</a>
		<?php endif; ?>
		<?php if ( ( isset( $options['follow_googleplus'] ) ) && ( !empty( $options['follow_googleplus'] ) ) ) : ?>
			<a href="<?php echo esc_url( $options['follow_googleplus'] ); ?>">
				<span class="genericon genericon-googleplus"></span>
			</a>
		<?php endif; ?>
		<?php if ( ( isset( $options['follow_linkedin'] ) ) && ( !empty( $options['follow_linkedin'] ) ) ) : ?>
			<a href="<?php echo esc_url( $options['follow_linkedin'] ); ?>">
				<span class="genericon genericon-linkedin-alt"></span>
			</a>
		<?php endif; ?>
		<?php if ( ( isset( $options['follow_youtube'] ) ) && ( !empty( $options['follow_youtube'] ) ) ) : ?>
			<a href="<?php echo esc_url( $options['follow_youtube'] ); ?>">
				<span class="genericon genericon-youtube"></span>
			</a>
		<?php endif; ?>
		<?php if ( ( isset( $options['follow_pinterest'] ) ) && ( !empty( $options['follow_pinterest'] ) ) ) : ?>
			<a href="<?php echo esc_url( $options['follow_pinterest'] ); ?>">
				<span class="genericon genericon-pinterest-alt"></span>
			</a>
		<?php endif; ?>
		<?php if ( ( isset( $options['follow_flickr'] ) ) && ( !empty( $options['follow_flickr'] ) ) ) : ?>
			<a href="<?php echo esc_url( $options['follow_flickr'] ); ?>">
				<span class="genericon genericon-flickr"></span>
			</a>
		<?php endif; ?>
		<?php if ( ( isset( $options['follow_instagram'] ) ) && ( !empty( $options['follow_instagram'] ) ) ) : ?>
			<a href="<?php echo esc_url( $options['follow_instagram'] ); ?>">
				<span class="genericon genericon-instagram"></span>
			</a>
		<?php endif; ?>
	</div>
	<?php endif; ?>
	<?php
}
endif;
