<?php
/**
 * Template for displaying Yoast breadcrumb
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
?>

<?php // Call Breadcrumbs Functions
if ( function_exists( 'yoast_breadcrumb' ) ) {
	yoast_breadcrumb('<div class="breadcrumbs">','</div>'); // display breadcrumb with wordpress seo plugin
}
?>