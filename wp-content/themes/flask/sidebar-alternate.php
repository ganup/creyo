<?php
/**
 * The sidebar containing the 'Alternate Sidebar' widget area.
 *
 * @package Flask
 */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area nolinkborder" role="complementary">
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
</div><!-- #secondary -->
