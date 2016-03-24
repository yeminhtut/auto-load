<?php
/**
 * The template for displaying search form.
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
?>

<!-- Start : Search Form Widget -->
<div id="search-form">
	<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
		<div class="form-group">
			<input type="search" id="s" class="search-field" placeholder="<?php echo esc_html_e( 'Search...', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_html_e( 'Search for:', 'newmagz' ) ?>" />
			<input type="submit" class="search-submit" value="<?php echo esc_html_e( 'Search', 'newmagz' ) ?>" />
		</div>
	</form>
</div>
<!-- End : Search Form Widget -->