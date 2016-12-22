<?php
/**
 * @package Flask
 */
?>

<header class="entry-header clear">
	
	<?php if ( is_single() ) : ?>
		<?php flask_social_media(); ?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	<?php else : ?>
		<?php flask_the_categories(); ?>
		<?php the_title( sprintf( '<h1 class="entry-title nolinkborder"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	<?php endif; ?>

	<?php if ( 'post' == get_post_type() ) : ?>
	<div class="entry-meta">
		<?php flask_posted_on(); ?>
	</div><!-- .entry-meta -->
	<?php endif; ?>
	<?php if ( ( !is_single() ) && ( has_post_thumbnail() ) && ( !has_post_format( array( 'aside', 'image', 'video', 'quote', 'link', 'gallery', 'audio', 'status' ) ) ) ) : ?>
		<?php
		global $_wp_additional_image_sizes;
		$imgd = wp_get_attachment_image_src( get_post_thumbnail_id(), 'post-thumbnail' );
		$narrow_image_class = '';
		if ( $imgd[1] < $_wp_additional_image_sizes['post-thumbnail']['width'] ) $narrow_image_class = ' narrow';
		?>
		<div class="post-thumb <?php echo $narrow_image_class; ?>">
			<a href=" <?php the_permalink(); ?> " rel="bookmark">
			<?php the_post_thumbnail(); ?>
			</a>
		</div>
	<?php endif; ?> 
</header><!-- .entry-header -->