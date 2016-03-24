<?php
/**
 * Template for displaying featured posts.
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
?>
<?php global $newmagz_option; ?>

<?php if( $newmagz_option['display_recent_post'] ) : ?>
<?php
$args = array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'ignore_sticky_posts' => 1,
	'posts_per_page' => 5
);

$posts_feat = new WP_Query();
$posts_feat->query($args);
if ( $posts_feat->have_posts() ) :
?>

<!-- Start : Recent Posts -->
<div class="section-title">
<?php 
	$category = get_the_category(); 
	if($category[0]){
		echo '<h4>'.esc_attr( $category[0]->cat_name ).' </h4><small class="section-subtitle">'.strip_tags( category_description($category[0]->cat_ID) ).'</small>';
	}
?>
</div>	

<div class="slider-with-thumbnail">
	<div class="slider-with-thumbnail-preview">
		<ul class="slides">
		<?php while( $posts_feat->have_posts() ) : $posts_feat->the_post(); ?>
			<li>
				<article class="hentry full-width-post post-overlay">
					<div class="thumbnail">
					<?php
					// Featured image
					if ( has_post_thumbnail() ) {
						echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
						the_post_thumbnail('newmagz-single-thumbnail-large');
						echo '</a>';
					} else {
						echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
						echo '<img src="http://placehold.it/826x532&text=&nbsp;"/>';
						echo '</a>';
					}
					?>
					</div>	
					<div class="entry-content">
						<div class="post-category">
						<?php 
							$category = get_the_category(); 
							if($category[0]){
								echo '<a href="'.get_category_link($category[0]->term_id ).'">'.esc_attr( $category[0]->cat_name ).'</a>';
							}
						?>
						</div>	
						<h3 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo wp_trim_words( get_the_title(), 10, '...' ); ?></a></h3>
						<?php echo warrior_post_meta(); // display post meta ?>
					</div>
				</article>	
			</li>
		<?php endwhile; wp_reset_postdata(); ?>	
		</ul>
	</div>

	<div class="slider-with-thumbnail-thumbnails">
		<?php while( $posts_feat->have_posts() ) : $posts_feat->the_post(); ?>
				<div class="hentry full-width-post">
					<div class="thumbnail">
					<?php
					// Featured image
					if ( has_post_thumbnail() ) {
						echo '<a href="" title="'. get_the_title() .'">';
						the_post_thumbnail('newmagz-single-thumbnail');
						echo '</a>';
					} else {
						echo '<a href="" title="'. get_the_title() .'">';
						echo '<img src="http://placehold.it/192x123&text=&nbsp;"/>';
						echo '</a>';
					}
					?>
					</div>
				</div>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>	
</div>
<!-- End : Recent Posts -->
<?php
	wp_reset_postdata();
	endif;
?>
<?php endif; ?>