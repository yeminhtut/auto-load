<?php
/**
 * Template for displaying related posts.
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
?>

<?php
global $newmagz_option;

if( $newmagz_option['display_related_post'] ) :

// Get current category
$categories = get_the_category();
$cat_ids = array();
foreach($categories as $category) $cat_ids[] = $category->term_id;
?>
<div class="article-widget related-post">
	<div class="widget-title"><h4><?php esc_html_e('Related Posts', 'newmagz'); ?></h4></div>
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
			if ( $posts_related->have_posts() && $newmagz_option['display_related_post'] ) :
			?>
			<?php while( $posts_related->have_posts() ) : $posts_related->the_post(); ?>
				<div class="column column-3">
					<article class="hentry full-width-post">
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
						<div class="entry-content">
							<h3 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo wp_trim_words( get_the_title(), 10, '...' ); ?></a></h3>
							<?php echo warrior_featured_post_meta(); ?>
						</div>
					</article>
				</div>
			<?php 
			endwhile;
			endif;
			wp_reset_postdata();
			?>	
		</div>
	</div>
</div>
<?php endif; ?>