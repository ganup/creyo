<?php
/*****************************
 * Actions the put together the content of the theme (#primary, mostly)
 *****************************/
 
if ( ! function_exists( 'flask_archive_titles' ) ) :
	function flask_archive_titles() {
		if ( is_archive() ) :
			?>
			<header class="page-header">
				<?php
					flask_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<?php
		endif;
		if (  is_search() ) :
			?>
			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'flask' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->			
			<?php
		endif;
	}
	add_action('flask_top_of_the_primary', 'flask_archive_titles', 10);
endif;