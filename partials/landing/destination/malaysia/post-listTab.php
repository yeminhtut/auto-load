<?php 
	$post_tabs_categories_1 = 'island and beaches';
	$post_tabs_categories_2 = 'sports and adventure';
	$post_tabs_categories_3 = 'shopping and eating';
	$post_tabs_title_limiter = 12;
	$post_tabs_content_limiter = 40;

	
	$warrior_set_content  = '<div id="landing-tab" class="homepage-widget widget-type-5 warrior-tabs-widget wow fadeIn animated">';
	$warrior_set_content .= '<ul class="tab-nav">';
	$warrior_set_content .= '<li><a href="javascript:void(0)" data-content="#tab-'.str_replace(" ","",$post_tabs_categories_1).'" title="" class="active">Islands & Beaches</a></li>';
    $warrior_set_content .= '<li><a href="javascript:void(0)" data-content="#tab-'.str_replace(" ","",$post_tabs_categories_2).'" title="">Sports & Adventure</a></li>';
	$warrior_set_content .= '<li><a href="javascript:void(0)" data-content="#tab-'.str_replace(" ","",$post_tabs_categories_3).'" title="">Shopping & Eating</a></li>';
    $warrior_set_content .= '</ul>';
	$warrior_set_content  .= '<div class="tabs_container">';
	$args_posts_tab_1 = array(
		'post_type' 			=> 'post',
		'post_status' 			=> 'publish',
		'category__and' => array(19,3),
		'ignore_sticky_posts' 	=> 1,
		'posts_per_page' 		=> 4
	);
			$posts_tab_1 = new WP_Query();
			$posts_tab_1->query( $args_posts_tab_1 );
			if ( $posts_tab_1->have_posts() ) :
				$warrior_set_content .= '<div id="tab-'.str_replace(" ","",$post_tabs_categories_1).'" class="tab-content row post-wrapper">';
					$i = 1; while( $posts_tab_1->have_posts() ) : $posts_tab_1->the_post();
					if ($i == 1) :

				    $category = get_the_category( get_the_ID() );

					// Get the ID of a given category
					$get_cat_name = $category[0]->cat_name;
				    $category_id = get_cat_ID( $get_cat_name );
				    // Get the URL of this category
				    $category_link = get_category_link( $category_id );

					$warrior_set_content .= '<div class="column column-2">';
					$warrior_set_content .= '<article class="'.esc_attr( $css_animate_class ).' hentry full-width-post" data-wow-delay="0.3s">';
					$warrior_set_content .= '<div class="thumbnail">';
					 
					// Featured image
					if ( has_post_thumbnail() ) {
						$warrior_set_content .= '<a href="'. get_the_permalink() .'" title="'. get_the_title() .'">' .get_the_post_thumbnail( get_the_ID(), 'newmagz-large-thumbnail-2' ). '</a>';
					} else {
						$warrior_set_content .= '<a href="'.get_the_permalink().'" title="'. get_the_title() .'">';
		                $warrior_set_content .= '<img src="http://placehold.it/393x230/333333/ffffff&amp;text=&nbsp;">';
		                $warrior_set_content .= '</a>';
					}
						$warrior_set_content .= '</div>';
						$warrior_set_content .= '<div class="entry-content">';
						$warrior_set_content .= '<div class="post-category"></div>';
						$warrior_set_content .= '<h3 class="post-title"><a href="'. get_the_permalink() .'">'.wp_trim_words( get_the_title(), absint( $post_tabs_title_limiter ), '...' ).'</a></h3>';
						$warrior_set_content .= warrior_post_meta(); // display post meta
						$warrior_set_content .= '<div class="excerpt">';
						$warrior_set_content .= '<p>'.wp_trim_words( get_the_excerpt(), absint( '25' ), '...' ).'</p>';
						$warrior_set_content .= '</div>';
						$warrior_set_content .= '</div>';
						$warrior_set_content .= '</article>	';
						$warrior_set_content .= '</div>';

					else :
					if ( $posts_tab_1->post_count > 1 && $i == 2 ) :
						$warrior_set_content .= '<div class="column column-2">';
					endif;

						$warrior_set_content .= '<article class="'.esc_attr( $css_animate_class ).' hentry square-thumb-post" data-wow-delay="0.3s">';
							$warrior_set_content .= '<div class="thumbnail">';
							 
							// Featured image
							if ( has_post_thumbnail() ) {
								$warrior_set_content .= '<a href="'. get_the_permalink() .'" title="'. get_the_title() .'">' .get_the_post_thumbnail( get_the_ID(), 'thumbnail' ). '</a>';
							} else {
								$warrior_set_content .= '<a href="'.get_the_permalink().'" title="'. get_the_title() .'">';
				                $warrior_set_content .= '<img src="http://placehold.it/130x130/333333/ffffff&amp;text=&nbsp;">';
				                $warrior_set_content .= '</a>';
							}
								$warrior_set_content .= '</div>	';
								$warrior_set_content .= '<div class="entry-content">';
								$warrior_set_content .= '<div class="post-category"></div>';
								$warrior_set_content .= '<h3 class="post-title"><a href="'.get_the_permalink().'">'.wp_trim_words( get_the_title(), absint( $post_tabs_title_limiter ), '...' ).'</a></h3>';
								$warrior_set_content .= warrior_post_meta(); // display post meta
								$warrior_set_content .= '</div>';
								$warrior_set_content .= '</article>';
						if ( $posts_tab_1->post_count > 1 && $i == $posts_tab_1->post_count ) :
						$warrior_set_content .= '</div>';
						endif;
					endif;
					$i = $i + 1; endwhile;
					endif;
					wp_reset_postdata();
					$warrior_set_content .= '</div>';

			$args_posts_tab_2 = array(
				'post_type' 			=> 'post',
				'post_status' 			=> 'publish',
				'category__and' 		=> array(19,6),
				'ignore_sticky_posts' 	=> 1,
				'posts_per_page' 		=> 4
			);

			$posts_tab_2 = new WP_Query();
			$posts_tab_2->query( $args_posts_tab_2 );

			if ( $posts_tab_2->have_posts() ) :
				$warrior_set_content .= '<div id="tab-'.str_replace(" ","",$post_tabs_categories_2).'" class="tab-content row post-wrapper">';
					$i = 1; while( $posts_tab_2->have_posts() ) : $posts_tab_2->the_post();
					if ($i == 1) :

				    $category = get_the_category( get_the_ID() );

					// Get the ID of a given category
					$get_cat_name = $category[0]->cat_name;
				    $category_id = get_cat_ID( $get_cat_name );
				    // Get the URL of this category
				    $category_link = get_category_link( $category_id );

					$warrior_set_content .= '<div class="column column-2">';
					$warrior_set_content .= '<article class="'.esc_attr( $css_animate_class ).' hentry full-width-post" data-wow-delay="0.3s">';
					$warrior_set_content .= '<div class="thumbnail">';
					 
					// Featured image
					if ( has_post_thumbnail() ) {
						$warrior_set_content .= '<a href="'. get_the_permalink() .'" title="'. get_the_title() .'">' .get_the_post_thumbnail( get_the_ID(), 'newmagz-large-thumbnail-2' ). '</a>';
					} else {
						$warrior_set_content .= '<a href="'.get_the_permalink().'" title="'. get_the_title() .'">';
		                $warrior_set_content .= '<img src="http://placehold.it/393x230/333333/ffffff&amp;text=&nbsp;">';
		                $warrior_set_content .= '</a>';
					}
						$warrior_set_content .= '</div>';
						$warrior_set_content .= '<div class="entry-content">';
						$warrior_set_content .= '<div class="post-category"></div>';
						$warrior_set_content .= '<h3 class="post-title"><a href="'. get_the_permalink() .'">'.wp_trim_words( get_the_title(), absint( $post_tabs_title_limiter ), '...' ).'</a></h3>';
						$warrior_set_content .= warrior_post_meta(); // display post meta
						$warrior_set_content .= '<div class="excerpt">';
						$warrior_set_content .= '<p>'.wp_trim_words( get_the_excerpt(), absint( $post_tabs_content_limiter ), '...' ).'</p>';
						$warrior_set_content .= '</div>';
						$warrior_set_content .= '</div>';
						$warrior_set_content .= '</article>	';
						$warrior_set_content .= '</div>';

					else :
					if ( $posts_tab_2->post_count > 1 && $i == 2 ) :
						$warrior_set_content .= '<div class="column column-2">';
					endif;

						$warrior_set_content .= '<article class="'.esc_attr( $css_animate_class ).' hentry square-thumb-post" data-wow-delay="0.3s">';
						$warrior_set_content .= '<div class="thumbnail">';
							 
						// Featured image
						if ( has_post_thumbnail() ) {
							$warrior_set_content .= '<a href="'. get_the_permalink() .'" title="'. get_the_title() .'">' .get_the_post_thumbnail( get_the_ID(), 'thumbnail' ). '</a>';
						} else {
							$warrior_set_content .= '<a href="'.get_the_permalink().'" title="'. get_the_title() .'">';
			                $warrior_set_content .= '<img src="http://placehold.it/130x130/333333/ffffff&amp;text=&nbsp;">';
			                $warrior_set_content .= '</a>';
						}
							$warrior_set_content .= '</div>	';
							$warrior_set_content .= '<div class="entry-content">';
							$warrior_set_content .= '<div class="post-category"></div>';
							$warrior_set_content .= '<h3 class="post-title"><a href="'.get_the_permalink().'">'.wp_trim_words( get_the_title(), absint( $post_tabs_title_limiter ), '...' ).'</a></h3>';
							$warrior_set_content .= warrior_post_meta(); // display post meta
							$warrior_set_content .= '</div>';
							$warrior_set_content .= '</article>';
						if ( $posts_tab_2->post_count > 1 && $i == $posts_tab_2->post_count ) :
						$warrior_set_content .= '</div>';
						endif;
					endif;
					$i = $i + 1; endwhile;
					endif;
					wp_reset_postdata();
					$warrior_set_content .= '</div>';

				$args_posts_tab_3 = array(
					'post_type' 			=> 'post',
					'post_status' 			=> 'publish',
					'category__and' => array(19,681),
					'ignore_sticky_posts' 	=> 1,
					'posts_per_page' 		=> 4
				);

			$posts_tab_3 = new WP_Query();
			$posts_tab_3->query( $args_posts_tab_3 );

			if ( $posts_tab_3->have_posts() ) :
				$warrior_set_content .= '<div id="tab-'.str_replace(" ","",$post_tabs_categories_3).'" class="tab-content row post-wrapper">';
					$i = 1; while( $posts_tab_3->have_posts() ) : $posts_tab_3->the_post();
					if ($i == 1) :

				    $category = get_the_category( get_the_ID() );

					// Get the ID of a given category
					$get_cat_name = $category[0]->cat_name;
				    $category_id = get_cat_ID( $get_cat_name );
				    // Get the URL of this category
				    $category_link = get_category_link( $category_id );

					$warrior_set_content .= '<div class="column column-2">';
					$warrior_set_content .= '<article class="'.esc_attr( $css_animate_class ).' hentry full-width-post" data-wow-delay="0.3s">';
					$warrior_set_content .= '<div class="thumbnail">';
					// Featured image
					if ( has_post_thumbnail() ) {
						$warrior_set_content .= '<a href="'. get_the_permalink() .'" title="'. get_the_title() .'">' .get_the_post_thumbnail( get_the_ID(), 'newmagz-large-thumbnail-2' ). '</a>';
					} else {
						$warrior_set_content .= '<a href="'.get_the_permalink().'" title="'. get_the_title() .'">';
		                $warrior_set_content .= '<img src="http://placehold.it/393x230/333333/ffffff&amp;text=&nbsp;">';
		                $warrior_set_content .= '</a>';
					}
					$warrior_set_content .= '</div>';
					$warrior_set_content .= '<div class="entry-content">';
					$warrior_set_content .= '<div class="post-category"></div>';
					$warrior_set_content .= '<h3 class="post-title"><a href="'. get_the_permalink() .'">'.wp_trim_words( get_the_title(), absint( $post_tabs_title_limiter ), '...' ).'</a></h3>';
					$warrior_set_content .= warrior_post_meta(); // display post meta
					$warrior_set_content .= '<div class="excerpt">';
					$warrior_set_content .= '<p>'.wp_trim_words( get_the_excerpt(), absint( $post_tabs_content_limiter ), '...' ).'</p>';
					$warrior_set_content .= '</div>';
					$warrior_set_content .= '</div>';
					$warrior_set_content .= '</article>	';
					$warrior_set_content .= '</div>';

					else :
					if ( $posts_tab_3->post_count > 1 && $i == 2 ) :
						$warrior_set_content .= '<div class="column column-2">';
					endif;

						$warrior_set_content .= '<article class="'.esc_attr( $css_animate_class ).' hentry square-thumb-post" data-wow-delay="0.3s">';
						$warrior_set_content .= '<div class="thumbnail">';
							 
							// Featured image
							if ( has_post_thumbnail() ) {
								$warrior_set_content .= '<a href="'. get_the_permalink() .'" title="'. get_the_title() .'">' .get_the_post_thumbnail( get_the_ID(), 'thumbnail' ). '</a>';
							} else {
								$warrior_set_content .= '<a href="'.get_the_permalink().'" title="'. get_the_title() .'">';
				                $warrior_set_content .= '<img src="http://placehold.it/130x130/333333/ffffff&amp;text=&nbsp;">';
				                $warrior_set_content .= '</a>';
							}
							$warrior_set_content .= '</div>	';
							$warrior_set_content .= '<div class="entry-content">';
							$warrior_set_content .= '<div class="post-category"></div>';
							$warrior_set_content .= '<h3 class="post-title"><a href="'.get_the_permalink().'">'.wp_trim_words( get_the_title(), absint( $post_tabs_title_limiter ), '...' ).'</a></h3>';
							$warrior_set_content .= warrior_post_meta(); // display post meta
							$warrior_set_content .= '</div>';
							$warrior_set_content .= '</article>';
							if ( $posts_tab_3->post_count > 1 && $i == $posts_tab_3->post_count ) :
							$warrior_set_content .= '</div>';
							endif;
					endif;
					$i = $i + 1; endwhile;
					endif;
					wp_reset_postdata();
					$warrior_set_content .= '</div>';
					$warrior_set_content  .= '</div>';
					$warrior_set_content  .= '</div>';

					echo  $warrior_set_content;
	
