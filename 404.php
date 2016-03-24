<?php
/**
 * Template for displaying 404 page (Not Found)
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
?>
<?php get_header(); ?>

<!-- Start : 404 Page -->
<section id="maincontent">
	<div class="container clearfix">
		<div id="primary" class="content-area site-main" role="main">
			<section id="single-post" class="single-post">
				<article id="post-<?php the_ID(); ?>" <?php post_class('hentry full-width-post'); ?> >
					<header class="single-post-header">
						<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php echo warrior_archive_title(); ?></a></h3>
					</header>
					<div class="entry-content">
						<p><?php esc_html_e('The page you\'re looking for is not available. The page may have been deleted or unpublished.', 'newmagz');?></p>
					</div>
				</article>
			</section>
		</div>
		<?php get_sidebar(); ?>
	</div>
</section>
<!-- End : 404 Page -->

<?php get_footer(); ?>