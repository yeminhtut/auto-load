<?php
/**
 * Template for displaying single posts.
 */
?>
<?php get_header(); ?>
<?php global $newmagz_option; ?>
<?php $check_mobile = detect_mobile(); ?>
<!-- Start : Single Page -->
<div id="maincontent">
	<div class="container clearfix">
		<div id="primary" class="content-area site-main" role="main">
			<section id="single-post" class="single-post">
				<?php get_template_part( 'content'); ?>			
				<?php get_template_part( 'includes/autoload-next-posts-nav' ); // display post navigation section ?>			
				<?php get_template_part( 'includes/author-bio' ); // display about author section ?>
				<?php get_template_part( 'partials/widgets/widget','subscribeSingleBottom' ); ?>
			</section>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<!-- End : Single Page -->
<?php get_footer(); ?>
