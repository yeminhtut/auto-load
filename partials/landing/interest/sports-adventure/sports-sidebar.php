<?php	
	$featured_post_id = 24841;
	$post_author_id = get_post_field( 'post_author', $featured_post_id );	
	$author_name = get_userdata($post_author_id)->display_name;
	$post_date = get_the_date( 'Y-m-d', $featured_post_id );
?>
<!-- Start : Sidebar Section -->
<div id="secondary-content" class="sidebar">
	<div class="sidebar-widget">
		<div id="sidebar-featured-article">
			<div class="fetaured-caption caption-black"><span>FEATURED</span></div>
			<article class=" hentry full-width-post" data-wow-delay="0.3s">
				<div class="thumbnail">
					<a href="<?php echo get_permalink($featured_post_id) ?>" title="<?php echo $featured_post->post_title; ?>">
					<?php echo get_the_post_thumbnail( $featured_post_id, 'newmagz-large-thumbnail-2' ) ?>
					</a>
				</div>
				<div class="entry-content">
					<h3 class="post-title">
						<a href="<?php echo get_permalink($featured_post_id) ?>"><?php echo get_the_title( $featured_post_id ); ?> </a>
					</h3>
					<div class="entry-meta">
						<span class="author"><a href="<?php echo get_author_posts_url( $post_author_id)?>"><?php echo $author_name; ?></a></span>
						<span class="date"><i class="fa fa-calendar-minus-o"></i><?php echo date_i18n( 'M j, Y', strtotime($post_date) )?></span>
					</div>
				</div>
			</article>
		</div>
	</div>		
	<div class="sidebar-widget">
		<?php
			$check_mobile = detect_mobile(); 		
			switch ($check_mobile) {
				case 'true':
					get_template_part('partials/widgets/widget','ads300x250');
					break;			
				default:
					get_template_part('partials/widgets/widget','ads300x600');
					break;
			}
		?>
	</div>		
	<div class="sidebar-widget">
	    <div id="widget-warrior_recent_post_by_category-4" class="sidebar-widget row type-1">
	        <div class="inner">
	            <div class="widget-title"><h4>TRAVEL INSPIRATIONS</h4></div>
	        <?php 
	            $args_posts_list_3 = array(
					'post_type' 			=> 'post',
					'post_status' 			=> 'publish',
					'category__and' 		=> array(6),//island id
					'posts_per_page' 		=> 6
				);

				$posts_list_3 = new WP_Query();
				$posts_list_3->query( $args_posts_list_3 );
			
				if ( $posts_list_3->have_posts() ) :
				while( $posts_list_3->have_posts() ) : $posts_list_3->the_post();?>
		            <div class="post-list-style">
		                <ul>
		                    <li>
		                    	<div class="thumbnail">
		                        <?php
									// Featured image
									if ( has_post_thumbnail() ) {
										echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
										the_post_thumbnail('thumbnail');
										echo '</a>';
									} else {
										echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
										echo '<img src="http://placehold.it/150x150&text=&nbsp;" />';
										echo '</a>';
									}
								?>
								</div>
		                        <h3 class="post-title"><a href="<?php echo get_permalink() ?>"><?php echo get_the_title(); ?></a></h3>
		                        <div class="post-category" style="margin-left:65px;"></div>
		                    </li>
		                </ul>
		            </div>	
	        <?php
	            endwhile;
				endif;   
			?>   
	        </div>
	    </div>
	</div>
</div>
<!-- End : Sidebar Section -->