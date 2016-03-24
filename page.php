<?php
/**
 * Template for displaying page post type.
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
?>
<?php get_header(); ?>

<!-- Start : Default Page -->
<div id="maincontent">
	<div class="container clearfix">
		<div id="primary" class="content-area site-main" role="main">
			<section id="single-post" class="single-post">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('hentry full-width-post'); ?> >
					<header class="single-post-header">
						<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					</header>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<p class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'newmagz' ) . '</span>', 'after' => '</p>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div>

					<?php get_template_part( 'includes/share-buttons' ); // display share buttons section  ?>
				</article>
			<?php endwhile; endif; ?>
			<?php comments_template( '', true ); // display comment section ?>
			</section>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<!-- End : Default Page -->

<?php get_footer(); ?>