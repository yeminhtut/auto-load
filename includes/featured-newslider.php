<?php
global $newmagz_option;
$cat_list = '3,9';
$args = array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'cat' => $cat_list ,
	'ignore_sticky_posts' => 1,
	'tag__not_in' => array(741),
	'posts_per_page'=> absint( $newmagz_option['featured_slider_show_items'] ),
);

$posts_feat = new WP_Query();
$posts_feat->query($args);
if ( $posts_feat->have_posts() ) :
?>

<!-- Start : Featured Slider -->
<div id="mainslider">
	<div class="container clearfix">
		<div class="preload"></div>
		<div class="warrior-carousel warrior-carousel-18 owl-carousel">
		<?php while( $posts_feat->have_posts() ) : $posts_feat->the_post(); ?>
			<div class="warrior-carousel-item">
				<article class="hentry slider-post">
					<div class="thumbnail">
					<?php
					// Featured image
					if ( has_post_thumbnail() ) {
						echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
						the_post_thumbnail('newmagz-featured-slider');
						echo '</a>';
					} else {
						echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
						echo '<img src="http://placehold.it/297x379/333333/ffffff&amp;text=&nbsp;">';
						echo '</a>';
					}
					?>
					</div>	
					<div class="entry-content">
						<div class="post-category">
						<?php // get categories
						$category = get_the_category(); 
						if($category[0]){
							if ($category[0]->cat_name == 'Popular') {
								echo '<a href="'.get_category_link($category[1]->term_id ).'">'.esc_attr( $category[1]->cat_name ).'</a>';
							}
							else{
								echo '<a href="'.get_category_link($category[0]->term_id ).'">'.esc_attr( $category[0]->cat_name ).'</a>';
							}							
						}
						?>
						</div>	
						<h3 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo wp_trim_words( get_the_title(), absint( 40 ), '...' ); ?></a></h3>
						<div class="detail-post">
							<?php echo warrior_featured_post_meta(); // display post meta ?>
							<p><?php echo wp_trim_words( get_the_excerpt(), absint( $newmagz_option['featured_slider_word_length']), '...' ); ?></p>
						</div>
					</div>
				</article>
			</div>
		<?php endwhile; ?>
		</div>
	</div>	
</div>
<!-- End : Featured Slider -->

<?php
	endif;
	wp_reset_postdata();
?>
