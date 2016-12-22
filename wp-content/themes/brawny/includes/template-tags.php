<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Brawny
 */

/*
 	* Breadcrumbs function based on http://dimox.net/wordpress-breadcrumbs-without-a-plugin/
 	* Thanks Dimox
 	* Integerated with options panel, instead of hardcoded option as in original
 	*/ 

/**
 * Generates Breadcrumb Navigation
 */

if ( ! function_exists( 'brawny_posts_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function brawny_posts_nav() {    
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}    
	?>
	<nav class="navigation paging-navigation clearfix" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'brawny' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&lsaquo;</span> Older posts', 'brawny' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rsaquo;</span>', 'brawny' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

 if( ! function_exists( 'brawny_breadcrumbs' )) {
 
	function brawny_breadcrumbs() {

		/* === OPTIONS === */
		$text['home']     = '<i class="fa fa-home"></i>'; // text for the 'Home' link
		$text['category'] = 'Archive by Category "%s"'; // text for a category page
		$text['search']   = 'Search Results for "%s" Query'; // text for a search results page
		$text['tag']      = 'Posts Tagged "%s"'; // text for a tag page
		$text['author']   = 'Articles Posted by %s'; // text for an author page
		$text['404']      = 'Error 404'; // text for the 404 page

		$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$breadcrumb_char = get_theme_mod( 'breadcrumb-char','1' );
		if ( $breadcrumb_char ) {
		 switch ( $breadcrumb_char ) {
		 	case '2' :
		 		$delimiter = ' / ';
		 		break;
		 	case '3':
		 		$delimiter = ' > ';
		 		break;
		 	case '1':
		 	default:
		 		$delimiter = ' &raquo; ';
		 		break;
		 }
		}


		$before      = '<span class="current">'; // tag before the current crumb
		$after       = '</span>'; // tag after the current crumb
		/* === END OF OPTIONS === */

		global $post;
		$homeLink = home_url() . '/';
		$linkBefore = '<span typeof="v:Breadcrumb">';
		$linkAfter = '</span>';
		$linkAttr = ' rel="v:url" property="v:title"';
		$link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;

		if (is_home() || is_front_page()) {

			if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $text['home'] . '</a></div>';

		} else {

			echo '<div id="crumbs" xmlns:v="http://rdf.data-vocabulary.org/#">' . sprintf($link, $homeLink, $text['home']) . $delimiter;

			if ( is_category() ) {
				$thisCat = get_category(get_query_var('cat'), false);
				if ($thisCat->parent != 0) {
					$cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
					$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
					$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
					echo $cats;
				}
				echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

			} elseif ( is_search() ) {
				echo $before . sprintf($text['search'], get_search_query()) . $after;

			} elseif ( is_day() ) {
				echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
				echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
				echo $before . get_the_time('d') . $after;

			} elseif ( is_month() ) {
				echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
				echo $before . get_the_time('F') . $after;

			} elseif ( is_year() ) {
				echo $before . get_the_time('Y') . $after;

			} elseif ( is_single() && !is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
					if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
				} else {
					$cat = get_the_category(); $cat = $cat[0];
					$cats = get_category_parents($cat, TRUE, $delimiter);
					if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
					$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
					$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
					echo $cats;
					if ($showCurrent == 1) echo $before . get_the_title() . $after;
				}

			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
				$post_type = get_post_type_object(get_post_type());
				echo $before . $post_type->labels->singular_name . $after;

			} elseif ( is_attachment() ) {
				$parent = get_post($post->post_parent);
				$cat = get_the_category($parent->ID); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo $cats;
				printf($link, get_permalink($parent), $parent->post_title);
				if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;

			} elseif ( is_page() && !$post->post_parent ) {
				if ($showCurrent == 1) echo $before . get_the_title() . $after;

			} elseif ( is_page() && $post->post_parent ) {
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					$parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) echo $delimiter;
				}
				if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;

			} elseif ( is_tag() ) {
				echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

			} elseif ( is_author() ) {
		 		global $author;
				$userdata = get_userdata($author);
				echo $before . sprintf($text['author'], $userdata->display_name) . $after;

			} elseif ( is_404() ) {
				echo $before . $text['404'] . $after;
			}

			if ( get_query_var('paged') ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
				echo __('Page', 'brawny' ) . ' ' . get_query_var('paged');
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
			}

			echo '</div>';

		}
	} // end brawny_breadcrumbs()

}

if ( ! function_exists( 'brawny_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function brawny_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'brawny' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'brawny' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'brawny' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'brawny_post_nav' ) ) :     
/**
 * Display navigation to next/previous post when applicable.
 */
function brawny_post_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'brawny' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'brawny' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'brawny' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'brawny_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function brawny_post_author() {

	$byline = sprintf(
		_x( ' %s', 'post author', 'brawny' ),
		'<span class="author vcard"><i class="fa fa-user"></i><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline"> ' . $byline . '</span>';

}
endif;

if ( ! function_exists( 'brawny_entry_footer' ) ) :     
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function brawny_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {?>
		<span class="posted-on"><?php brawny_post_date(); ?></span>
	<?php	/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'brawny' ) );
		if ( $categories_list  ) {
			printf( '<span class="cat-links"><i class="fa fa-list-alt"></i>' . __( '%1$s ', 'brawny' ) . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'brawny' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><i class="fa fa-tag"></i>' . __( ' %1$s ', 'brawny' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'brawny' ), __( '1 Comment', 'brawny' ), __( '% Comments', 'brawny' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'brawny' ), '<span class="edit-link"><i class="fa fa-edit"></i>', '</span>' );
}
endif;

if( ! function_exists( 'brawny_featured_image' ) ) {
	function brawny_featured_image() {
		$featured_image_size = get_theme_mod ('featured_image_size', 1);
		if ( has_post_thumbnail() && ! post_password_required() ) :
			if( $featured_image_size == 1 ) :
				the_post_thumbnail('brawny-blog-full-width');
			elseif( $featured_image_size == 2 ) :
				the_post_thumbnail('brawny-small-featured-image-width');
			elseif( $featured_image_size == 3 ) :
				the_post_thumbnail('full');
			elseif( $featured_image_size == 4 ) :
				the_post_thumbnail('medium');
			elseif( $featured_image_size == 5 ) :
				the_post_thumbnail('large');
			endif;
		endif;
	}
}
if ( ! function_exists( 'brawny_post_date' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function brawny_post_date() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( __( '<span class="posted-on"><i class="fa fa-clock-o"></i> %1$s</span>', 'brawny' ),
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		)
	);
}
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function brawny_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'brawny_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'brawny_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so brawny_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so brawny_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in brawny_categorized_blog.
 */
function brawny_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'brawny_categories' );
}
add_action( 'edit_category', 'brawny_category_transient_flusher' );
add_action( 'save_post',     'brawny_category_transient_flusher' );

/*
if( ! function_exists('brawny_recent_posts') ) {
	function brawny_recent_posts() {
		$output = '';
		$posts_per_page  =  get_theme_mod('recent_posts_count', get_option('post_per_page') );
		// WP_Query arguments
		$args = array (
			'post_type'              => 'post',
			'post_status'            => 'publish',
			'posts_per_page'         => intval($posts_per_page),
			'ignore_sticky_posts'    => true,
			'order'                  => 'DESC',
		);

		// The Query
		$query = new WP_Query( $args );

		// The Loop
		if ( $query->have_posts()&& get_theme_mod('enable_recent_post_service',true) ) {
			$output .= '<div class="post-wrapper">';
			$output .= '<div class=" rp-title latest-posts ">';
			$output .= '<h3>' . __('Recent Posts','brawny') . '</h3>';
			$output .= '<div class="latest-post-wrapper">';
			while ( $query->have_posts() ) {
				$query->the_post();
				$output .= '<div class="latest-post one-third column">';
			
	
					$output .= '<div class="latest-post-thumb recent-post">';
					
					$output .= '<a class="post-readmore" href="'. get_permalink() . '">';
					if ( has_post_thumbnail() ) {
						$output .= get_the_post_thumbnail($query->post->ID ,'brawny_recent_posts_thumbnail');
					}
					else {
						$output .= '<img src="' . get_template_directory_uri() . '/images/thumbnail-default.png" alt="" >';
					}
					$output .= '<h4>' . get_the_title() . '</h4>';
					$output .= '</a>';
					
					$output .= '</div><!-- .latest-post-thumb -->';
					
				$output .= '</div><!-- .latest-post -->';
			
			}
			$output .= '<br class="clear"></div><!-- .latest-posts -->';
			$output .= '</div>';
			$output .= '</div><!-- .post-wrapper -->';
			
		} 
		$query = null;
		// Restore original Post Data
		wp_reset_postdata();
		echo $output;
	}
}
*/
// Recent Posts with featured Images to be displayed on home page
if ( ! function_exists( 'brawny_recent_posts' ) ) {
	function brawny_recent_posts() {
		$output = '';
		$output .= '<div class="flex-recent-posts">';
		$output .= '<ul class="slides">';
		// WP_Query arguments
		$args = array (
			'post_type'              => 'post',
			'post_status'            => 'publish',
			'posts_per_page'         => get_theme_mod('recent_posts_count', get_option('post_per_page') ),
			'ignore_sticky_posts'    => true,
			'order'                  => 'DESC',
		);
 
		// The Query
		$query = new WP_Query( $args );
		$count = 1;
		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				if( 1 === $count%5 && 1 != $count  ) {
					$output .= '<li style="clear: left;">';
				} else {
					$output .= '<li>';
				}
				$output .= '<div class="recent-post">';
				$output .= '<a class="post-readmore" href="'. get_permalink() . '" title="Read ' . get_the_title() .'">';
				if ( has_post_thumbnail() ) {
					$output .= get_the_post_thumbnail( $query->post->ID, 'home-thumb');
				}
				else {
					$output .= '<img src="' . BRAWNY_PARENT_URL . '/images/thumbnail-default.png" alt="" >';
				}
				$output .= '<h4>'. get_the_title() . '</h4>';
				$output .= '</a>';
				$output .= '</div>';
				$output .= '</li>';
				$count++;

			}
		}

		// Restore original Post Data
		wp_reset_postdata();
		$output .= '</ul>';
		$output .= '</div>';
		echo $output;
	}
}
	// free-extra functions //


	// Related Posts Function (call using brawny_related_posts(); ) /NecessarY/ May be write a shortcode?
	function brawny_related_posts() {
		echo '<ul id="webulous-related-posts">';
		global $post;
		$tags = wp_get_post_tags($post->ID);
		$tag_arr = '';
		if($tags) {
			foreach($tags as $tag) { $tag_arr .= $tag->slug . ','; }
	        $args = array(
	        	'tag' => $tag_arr,
	        	'numberposts' => 5, /* you can change this to show more */
	        	'post__not_in' => array($post->ID)
	     	);
	        $related_posts = get_posts($args);
	        if($related_posts) {
	        	foreach ($related_posts as $post) : setup_postdata($post); ?>
		           	<li class="related_post">
		           		<a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('recent-work'); ?></a>
		           		<a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		           	</li>
		        <?php endforeach; }
		    else {
	            echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'brawny' ) . '</li>'; 
			 }
		}else{
			echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'brawny' ) . '</li>';
		}
		wp_reset_query();
		
		echo '</ul>';
	}


	if( ! function_exists( 'brawny_pagination' )) {
	/**
	 * Generates Pagination without WP-PageNavi Plugin
	 */
	
	function brawny_pagination($before = '', $after = '') {
		global $wpdb, $wp_query;
		$request = $wp_query->request;
		$posts_per_page = intval(get_query_var('posts_per_page'));
		$paged = intval(get_query_var('paged'));
		$numposts = $wp_query->found_posts;
		$max_page = $wp_query->max_num_pages;
		if ( $numposts <= $posts_per_page ) { return; }
		if(empty($paged) || $paged == 0) {
			$paged = 1;
		}
		$pages_to_show = 7;
		$pages_to_show_minus_1 = $pages_to_show-1;
		$half_page_start = floor($pages_to_show_minus_1/2);
		$half_page_end = ceil($pages_to_show_minus_1/2);
		$start_page = $paged - $half_page_start;
		if($start_page <= 0) {
			$start_page = 1;
		}
		$end_page = $paged + $half_page_end;
		if(($end_page - $start_page) != $pages_to_show_minus_1) {
			$end_page = $start_page + $pages_to_show_minus_1;
		}
		if($end_page > $max_page) {
			$start_page = $max_page - $pages_to_show_minus_1;
			$end_page = $max_page;
		}
		if($start_page <= 0) {
			$start_page = 1;
		}
		echo $before.'<nav class="page-navigation navigation pagination"><ol class="webulous_page_navi clearfix">'."";
		if ($start_page >= 2 && $pages_to_show < $max_page) {
			$first_page_text = __( "First", 'brawny' );
			echo '<li class="bpn-first-page-link"><a href="'.get_pagenum_link().'" title="'.$first_page_text.'">'.$first_page_text.'</a></li>';
		}
		echo '<li class="bpn-prev-link">';
		previous_posts_link('<<');
		echo '</li>';
		for($i = $start_page; $i  <= $end_page; $i++) {
			if($i == $paged) {
				echo '<li class="bpn-current">'.$i.'</li>';
			} else {
				echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
			}
		}
		echo '<li class="bpn-next-link">';
		next_posts_link('>>');
		echo '</li>';
		if ($end_page < $max_page) {
			$last_page_text = __( "Last", 'brawny' );
			echo '<li class="bpn-last-page-link"><a href="'.get_pagenum_link($max_page).'" title="'.$last_page_text.'">'.$last_page_text.'</a></li>';
		}
		echo '</ol></nav>'.$after."";
	}
}
if ( ! function_exists( 'brawny_entry_top_meta' ) ) : 
function brawny_entry_top_meta() {   
	// Post meta data 
	
	  $single_post_top_meta = get_theme_mod('single_post_top_meta', array(1,2,6) );
      // echo '<pre>',print_r($single_post_top_meta),'</pre>';
	
    if ( 'post' == get_post_type() ) {  
		foreach ($single_post_top_meta as $key => $value) {
		    if( $value == '1') { 
		    	global $post;?>
		  	    <span class="date-structure">				
					<span class="dd"><a class="url fn n" href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'),get_the_time('d')); ?>"><i class="fa fa-clock-o"></i><?php the_time('j M Y'); ?></a></span>		
				</span>
	<?php   }elseif( $value == 2) {
				printf(
					_x( '%s', 'post author', 'brawny' ),
					'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fa fa-user"></i> ' . esc_html( get_the_author() ) . '</a></span>'
				);	
			}elseif( $value == 3)  {
				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
					echo ' <span class="comments-link"><i class="fa fa-comments"></i>';
					comments_popup_link( __( 'Leave a comment', 'brawny' ), __( '1 Comment', 'brawny' ), __( '% Comments', 'brawny' ) );
					echo '</span>';
			    }
	        }elseif( $value == 4) {
				$categories_list = get_the_category_list( __( ', ', 'brawny' ) );
				if ( $categories_list ) {
					printf( '<span class="cat-links"><i class="fa fa-folder-open"></i> ' . __( '%1$s ', 'brawny' ) . '</span>', $categories_list );
				}	
		    }elseif( $value == 5)  {
	    		/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'brawny' ) );
				if ( $tags_list ) {
					printf( '<span class="tags-links"><i class="fa fa-tags"></i> ' . __( '%1$s ', 'brawny' ) . '</span>', $tags_list );
				}			
		    }elseif( $value == 6) {
		        edit_post_link( __( 'Edit', 'brawny' ), '<span class="edit-link"><i class="fa fa-pencil"></i> ', '</span>' );
		    }
	    }
	}
}

endif;


if ( ! function_exists( 'brawny_entry_bottom_meta' ) ) : 
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function brawny_entry_bottom_meta() {   
	// Post meta data 
	
	$single_post_bottom_meta = get_theme_mod('single_post_bottom_meta', array(3,4,5) );

	if ( 'post' == get_post_type() ) {  
		foreach ($single_post_bottom_meta as $key => $value) {
		    if( $value == '1') { ?>
		  	    <span class="date-structure">				
					<span class="dd"><a class="url fn n" href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'),get_the_time('d')); ?>"><i class="fa fa-clock-o"></i><?php the_time('j M Y'); ?></a></span>	
				</span>
	<?php   }elseif( $value == 2) {
				printf(
					_x( '%s', 'post author', 'brawny' ),
					'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fa fa-user"></i> ' . esc_html( get_the_author() ) . '</a></span>'
				);	
			}elseif( $value == 3)  {
				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
					echo ' <span class="comments-link"><i class="fa fa-comments"></i>';
					comments_popup_link( __( 'Leave a comment', 'brawny' ), __( '1 Comment', 'brawny' ), __( '% Comments', 'brawny' ) );
					echo '</span>';
			    }
	        }elseif( $value == 4) {
				$categories_list = get_the_category_list( __( ', ', 'brawny' ) );
				if ( $categories_list ) {
					printf( '<span class="cat-links"><i class="fa fa-folder-open"></i> ' . __( '%1$s ', 'brawny' ) . '</span>', $categories_list );
				}	
		    }elseif( $value == 5)  {
	    		/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'brawny' ) );
				if ( $tags_list ) {
					printf( '<span class="tags-links"><i class="fa fa-tags"></i> ' . __( '%1$s ', 'brawny' ) . '</span>', $tags_list );
				}			
		    }elseif( $value == 6) {
		        edit_post_link( __( 'Edit', 'brawny' ), '<span class="edit-link"><i class="fa fa-pencil"></i> ', '</span>' );
		    }
	    }
	}
}

endif;


/* Brawny Custom Logo */

add_filter( 'get_custom_logo', 'brawny_custom_logo' );
if( !function_exists('brawny_custom_logo') ) { 
	function brawny_custom_logo($html) {
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$logo = get_theme_mod( 'custom-logoss', '' );
		echo '<h1 class="site-title img-logo">';
		if(!$custom_logo_id && $logo!= '') {	
		    echo '<img src="'.$logo.'">';
		}else{
			echo $html;
		}
		echo '<h1>';
	}
}

/* Two Sidebar Right action */     

 add_action('brawny_two_sidebar_right','brawny_double_sidebar_right'); 	
if( !function_exists('brawny_double_sidebar_right') ) { 
  function brawny_double_sidebar_right() {
  	 $sidebar_position = get_theme_mod( 'sidebar_position', 'right' ); 
		 if( 'two-sidebar' == $sidebar_position || 'two-sidebar-right' == $sidebar_position || 'right' == $sidebar_position) :
			 get_sidebar(); 
		endif; 	
		if('two-sidebar-right' == $sidebar_position ):
			get_sidebar('left'); 
		endif; 
 }
}

/* Two Sidebar Left action */ 

add_action('brawny_two_sidebar_left','brawny_double_sidebar_left');   
if( !function_exists('brawny_double_sidebar_left') ) { 
 function brawny_double_sidebar_left() {
    $sidebar_position = get_theme_mod( 'sidebar_position', 'right' ); 
		if( 'two-sidebar' == $sidebar_position || 'two-sidebar-left' == $sidebar_position ) :
			 get_sidebar('left'); 
		endif; 
		if('two-sidebar-left' == $sidebar_position || 'left' == $sidebar_position ):
			get_sidebar(); 
		endif; 
 }	
}


/*  Site Layout Option  */
if( !function_exists('brawny_layout_class') ) {   
	function brawny_layout_class() {
		if( is_home() &&  ( get_theme_mod('blog_layout',1) == 3 ||  get_theme_mod('blog_layout',1) == 5) ) {
	       echo 'sixteen';
	       return;
		}
	     $sidebar_position = get_theme_mod( 'sidebar_position', 'right' ); 
		     if( 'fullwidth' == $sidebar_position ) {
		     	echo 'sixteen';
		     }elseif('two-sidebar' == $sidebar_position || 'two-sidebar-left' == $sidebar_position || 'two-sidebar-right' == $sidebar_position ) {
		     	echo 'eight';
		     }
		     else{
		     	echo 'eleven';
		     }
		     if ( 'no-sidebar' == $sidebar_position ) { 
		     	echo ' no-sidebar';
		     }
	}
}

if( !function_exists('brawny_masonry_blog_layout_class') ) { 
	function brawny_masonry_blog_layout_class() {
		if( is_home() && get_theme_mod('blog_layout',1) == 4 ||  get_theme_mod('blog_layout',1) == 5 ) {
			echo 'masonry-blog-content';
		}
	}
}

add_action('brawny_sidebar_right_widget','brawny_sidebar_right_widget');
if( !function_exists('brawny_sidebar_right_widget') ) { 
	function brawny_sidebar_right_widget() {
		    if (  is_active_sidebar( 'sidebar-1' ) ) {
				 dynamic_sidebar('sidebar-1');
			}else { ?>
				<aside id="meta" class="widget">
					<h4 class="widget-title"><?php _e( 'Meta', 'brawny' ); ?></h4>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
		        </aside><?php 
		   }  
	}
}

/* Page site style class ( layout )*/

if( !function_exists('brawny_site_style_class') ) { 
	function  brawny_site_style_class(){
       $site_style = get_theme_mod('site-style');
	    if( $site_style == 'boxed' )  { 
		  $site_style_class = 'container boxed-container';
		}elseif( $site_style == 'fluid' ){
	       $site_style_class = 'fluid-container';	 
		}
		else{
			 $site_style_class = '';
		} 
		return $site_style_class; 
	}
}


/* Page site style header class ( layout )*/

if( !function_exists('brawny_site_style_header_class') ) { 
	function  brawny_site_style_header_class(){
        $site_style = get_theme_mod('site-style');
	    if( $site_style == 'boxed' )  { 
		  $site_style_header_class = 'boxed-header';
		}elseif( $site_style == 'fluid' ){
	       $site_style_header_class = 'fluid-header';
		}
		else{
			 $site_style_header_class = '';
		} 
		return $site_style_header_class;
	}
}


add_action('brawny_single_flexslider_featured_image','brawny_single_flexslider_featured_image_top');
if( !function_exists('brawny_single_flexslider_featured_image_top') ) { 
	function brawny_single_flexslider_featured_image_top() {
		$single_featured_image = get_theme_mod( 'single_featured_image',true );
		$single_featured_image_size = get_theme_mod ('single_featured_image_size',1);
		if( $single_featured_image && $single_featured_image_size == 3 ) {
		    if( has_post_thumbnail() && ! post_password_required() ) :   
				the_post_thumbnail( 'post-thumbnail', array('class' => "single_page_flexslider_feature_image") ); 
			endif;
		}
	}
}


add_action('brawny_single_page_flexslider_featured_image','brawny_single_page_flexslider_featured_image_top');
if( !function_exists('brawny_single_page_flexslider_featured_image_top') ) { 
	function brawny_single_page_flexslider_featured_image_top() {
		$single_page_featured_image = get_theme_mod( 'single_page_featured_image',true );
		$single_page_featured_image_size = get_theme_mod ('single_page_featured_image_size',1);
		if( $single_page_featured_image && $single_page_featured_image_size == 2) {
		    if( has_post_thumbnail() && ! post_password_required() ) :   
				the_post_thumbnail( 'post-thumbnail', array('class' => "single_page_flexslider_feature_image") ); 
			endif;
		}
	}
}		

if ( ! function_exists( 'brawny_comment' ) ) :
function brawny_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'brawny' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'brawny' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<div class="comment-meta">
				<div class="comments-avator">
					<div class="overlay"></div>
					<?php if ( 0 != $args['avatar_size'] ) { echo get_avatar( $comment, $args['avatar_size']=130); } ?>
				</div>
				<span class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '- %1$s at %2$s', '1: date, 2: time', 'brawny' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
					<?php edit_comment_link( __( 'Edit', 'brawny' ), '<span class="edit-link"><i class="fa fa-edit"></i>', '</span>' ); ?>
				</span><!-- .comment-metadata -->
				<span class="comment-author vcard">
					<?php printf( __( '%s', 'brawny' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</span><!-- .comment-author -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'brawny' ); ?></p>
				<?php endif; ?>

			<div class="comment-content">
				<?php comment_text(); ?>
				<?php
					comment_reply_link( array_merge( $args, array(
						'add_below' => 'div-comment',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'before'    => '<div class="reply"><i class="fa fa-reply"></i>',
						'after'     => '</div>',
					) ) );
				?>				
			</div><!-- .comment-content -->
			</div><!-- .comment-meta -->

		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for brawny_comment()


/**/

if ( ! function_exists( 'brawny_get_home_page_primary_class' ) ) {
   function brawny_get_home_page_primary_class()  {
	if( get_theme_mod('home_sidebar',false ) ) {
			return 'eleven';
		}
		else{
			return 'sixteen';
		} 
	}
}

/* custom color css */   
add_action( 'wp_head','wbls_brawny_style2_custom_css');
if( !function_exists('wbls_brawny_style2_custom_css') ){
	function wbls_brawny_style2_custom_css() {
		$style2_purple_nav =  get_theme_mod('color' );
        if( $style2_purple_nav == '3' ) { ?>  
			<style type="text/css">
		     	.main-navigation .current_page_item a {
		     		color: #fff;
		     	}
			</style><?php
		} 
	}	
}


/**
 * Theme Update Script
 *
 * Runs if version number saved in theme_mod "version" doesn't match current theme version.
 *  logo update
 */
if( !function_exists('brawny_logo_update_check') ) { 
	function brawny_logo_update_check() {
		 $ver = get_theme_mod( 'version', false );
		 // Return if update has already been run
		 if ( version_compare( $ver, '1.0.9' ) >= 0 ) {
		    return;
		 }
		 // If a logo has been set previously, update to use logo feature introduced in WordPress 4.5
		 if ( function_exists( 'the_custom_logo' ) && get_theme_mod( 'custom-logo', false ) ) {
		   // Since previous logo was stored a URL, convert it to an attachment ID
		   $logo = attachment_url_to_postid( get_theme_mod( 'custom-logo' ) );
		 if ( is_int( $logo ) ) {
		     set_theme_mod( 'custom_logo', attachment_url_to_postid( get_theme_mod( 'custom-logo' ) ) );
		 }
		    remove_theme_mod( 'custom-logo' );
		 }
		 // Update to match your current theme version 
		 set_theme_mod( 'version', '1.0.9' );
	}
}
add_action( 'after_setup_theme', 'brawny_logo_update_check' );