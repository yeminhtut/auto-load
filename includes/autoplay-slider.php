<?php
global $newmagz_option;

if( $newmagz_option['display_featured_slider'] ) :
	
if( ! isset($newmagz_option['featured_slider_categories']) ) {
	$cat_list = '';
} else {
	$cat_list = implode( ',', (array)$newmagz_option['featured_slider_categories'] );
}

$args = array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'cat' => $cat_list ,
	'ignore_sticky_posts' => 1,
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
							echo '<a href="'.get_category_link($category[0]->term_id ).'">'.esc_attr( $category[0]->cat_name ).'</a>';
						}
						?>
						</div>	
						<h3 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo wp_trim_words( get_the_title(), absint( $newmagz_option['featured_slider_title_length'] ), '...' ); ?></a></h3>
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
	endif;
?>

<script type="text/javascript">
jQuery(document).ready(function($) {
	console.log('autoplay slider');
    var owl = $('.warrior-carousel-18');
	owl.owlCarousel({
	    items:4,
	    loop:true,
	    autoplay:false,
	    autoplayTimeout:1000,
	    autoplayHoverPause:true,
	    responsive : {
        0 : {
            items: 1,
            startPosition: 1
        },
        480 : {

            items: 2,
            startPosition: 2
        },
        760 : {

            items: 3,
            startPosition: 2
        },
        1000 : {
            items: 4,
            startPosition: 2
        }
      }
	});	
});

</script>