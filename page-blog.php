<?php
/**
 * Template Name: Blog
 * 
 * Template for displaying blog page.
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
			<section id="blog" class="homepage-widget widget-type-2">
	            <?php
	            if ( get_query_var('paged') ) {
                    $paged = get_query_var('paged');
                } elseif ( get_query_var('page') ) {
                    $paged = get_query_var('page');
                } else {
                    $paged = 1;
                }

	            $args = array(
					'post_type' 			=> 'post',
					'post_status' 			=> 'publish',
					'ignore_sticky_posts' 	=> 1,
					'paged'         		=> $paged
				);

				$wp_query = new WP_Query();
				$wp_query->query( $args );

				if ( $wp_query->have_posts() ) :
				?>	
	            <div class="row post-wrapper">
	            <?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
				<div class="column column-1">
					<article <?php post_class('hentry full-width-post left-thumbnail') ?>>
						<div class="thumbnail">
						<?php
						// Featured image
						if ( has_post_thumbnail() ) {
							echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
							the_post_thumbnail('newmagz-large-thumbnail-2');
							echo '</a>';
						} else {
							echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
							echo ' <img src="http://placehold.it/393x230/333333/ffffff&amp;text=&nbsp;">';
							echo '</a>';
						}
						?>
						</div>
						<div class="entry-content">
							<div class="post-category"><?php the_category(', '); ?></div>
							<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 18 .' ...' ); ?></a></h3>
							<?php warrior_post_meta(); // display post meta ?>
							<div class="excerpt">
								<p><?php echo wp_trim_words( get_the_excerpt(), 32, '...' ); ?></p>
							</div>
						</div>
					</article>	
				</div>
				<?php
					endwhile;
					wp_reset_postdata();
					get_template_part( 'includes/pagination' ); // display pagination section
					else :
						esc_html_e('The page you\'re looking for is not available. The page may have been deleted or unpublished.', 'newmagz');
					endif;
				?>	
            	</div>
        	</section>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<!-- End : Default Page -->

<?php get_footer(); ?>