<?php
/**
 * Template for displaying related posts mobile.
 */
?>

<?php
global $newmagz_option;

// Get current category
$categories = get_the_category();
$cat_ids = array();
foreach($categories as $category) $cat_ids[] = $category->term_id;
?>
<div class="article-widget related-post">
	<div class="widget-title" style="margin-bottom:20px !important;"><h4><?php esc_html_e('Related Posts', 'newmagz'); ?></h4></div>
	<div class="post-list clearfix">
		<div class="row">
			<?php
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'orderby' => 'rand',
				'category__in' => $cat_ids,
				'post__not_in' => array( get_the_ID() ),
				'posts_per_page' => 3
			);
			$posts_related = new WP_Query();
			$posts_related->query($args);
			if ( $posts_related->have_posts()) :
			?>
			<?php while( $posts_related->have_posts() ) : $posts_related->the_post(); ?>
				<div class="row">
					<div class="column column-4">
						<div class="post-list-style">
							<ul>
								<li>
									<div class="thumbnail">
									<?php
										// Featured image
										if ( has_post_thumbnail() ) {
											echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
											the_post_thumbnail('newmagz-medium-thumbnail-2');
											echo '</a>';
										} else {
											echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
											echo '<img src="http://placehold.it/262x150&text=&nbsp;" />';
											echo '</a>';
										}
										?>
									</div>
									<h3 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo wp_trim_words( get_the_title(), 10, '...' ); ?></a></h3>
								</li>
							</ul>
						</div>
					</div>
				</div>
			<?php 
			endwhile;
			endif;
			wp_reset_postdata();
			?>	
		</div>
	</div>
</div>
