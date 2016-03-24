<?php
/**
 * Template for displaying pagination
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
?>

<?php global $wp_query; if( $wp_query->max_num_pages > 1 ) : ?>
<!-- Start : Pagination section -->
 <div class="pagination">
    <div class="pagination-holder">
	<?php
		if( function_exists('wp_pagenavi') ) {
			wp_pagenavi(); // display pagination with wp_pagenavi functions
		} else {
			previous_posts_link( esc_html__('&laquo; Previous Posts', 'newmagz') );
			next_posts_link( esc_html__('Next Posts &raquo;', 'newmagz') );
			// Display pagination with default wordpress functions
		}
	?>
    </div>
</div>
<!-- End : Pagination section -->
<?php endif; ?>