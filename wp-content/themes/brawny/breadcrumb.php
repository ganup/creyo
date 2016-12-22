<?php
/**
 * The template used for displaying page breadcrumb
 *
 * @package Brawny
 */ 
?>
<div class="breadcrumb-wrap">
	<div class="container">
		<div class="sixteen columns breadcrumb">	
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->
			<?php $breadcrumb = get_theme_mod( 'breadcrumb',true ); 
				if( $breadcrumb ) : ?>
				<div id="breadcrumb" role="navigation">
					<?php brawny_breadcrumbs(); ?>
				</div>
			<?php endif; ?>
			<!--<?php if ( get_theme_mod('breadcrumb' ) && function_exists( 'brawny_breadcrumbs' ) ) : ?>
			<div id="breadcrumb" role="navigation">
				<?php brawny_breadcrumbs(); ?>
			</div>
		<?php endif; ?>-->
		</div>
	</div>
</div>
