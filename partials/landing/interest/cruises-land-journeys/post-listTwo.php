<?php 
	$interest_post_list_two = 'Travel inspiration ';
	$interest_post_list_two_per_page = 6;

	$interest_post_list_two_content  = '<section id="'.$id_category.'" class="homepage-widget widget-type-3">';
            $args_posts_list_3 = array(
				'post_type' 			=> 'post',
				'post_status' 			=> 'publish',
				'category__and' 		=> array(61,127),//cruise id and travel inspiration id
				'ignore_sticky_posts' 	=> 1,
				'posts_per_page' 		=> $interest_post_list_two_per_page
			);

			$posts_list_3 = new WP_Query();
			$posts_list_3->query( $args_posts_list_3 );
			$section_title = str_replace('-', '', esc_attr( $interest_post_list_two ));
			if ( $posts_list_3->have_posts() ) :
        	$interest_post_list_two_content .= '<div class="section-title"><h3 class="interest-section-title">'.$section_title.'</h3></div>';
            $interest_post_list_two_content .= '<div class="row post-wrapper" id="section3">';

            $interest_post_list_two_content .= '<div class="column column-1">';
			$interest_post_list_two_content .= '<div class="warrior-carousel warrior-carousel-3 owl-carousel">';

				while( $posts_list_3->have_posts() ) : $posts_list_3->the_post();
				    $category_id = get_cat_ID( $interest_post_list_two);
				    // Get the URL of this category
				    $category_link = get_category_link( $category_id );

					$interest_post_list_two_content .= '<div class="'.esc_attr( $css_animate_class ).' carousel-item" data-wow-delay="0.3s">';
					$interest_post_list_two_content .= '<article class="hentry full-width-post">';
					$interest_post_list_two_content .= '<div class="thumbnail">';
						// Featured image
						if ( has_post_thumbnail() ) {
							$interest_post_list_two_content .= '<a href="'. get_the_permalink() .'" title="'. get_the_title() .'">' .get_the_post_thumbnail( get_the_ID(), 'newmagz-medium-thumbnail-2' ). '</a>';
						} else {
							$interest_post_list_two_content .= '<a href="'.get_the_permalink().'" title="'. get_the_title() .'">';
			                $interest_post_list_two_content .= '<img src="http://placehold.it/262x150/333333/ffffff&amp;text=&nbsp;">';
			                $interest_post_list_two_content .= '</a>';
						}
					$interest_post_list_two_content .= '</div>	';
					$interest_post_list_two_content .= '<div class="entry-content">';
					$interest_post_list_two_content .= '<div class="post-category"><a href="'.esc_url( $category_link ).'">'.esc_attr( $interest_post_list_two ).'</a></div>	';
					$interest_post_list_two_content .= '<h3 class="post-title"><a href="'. get_the_permalink() .'">'.wp_trim_words( get_the_title()).'</a></h3>';
					$interest_post_list_two_content .= warrior_post_meta(); // display post meta
					$interest_post_list_two_content .= '</div>';
					$interest_post_list_two_content .= '</article>';
					$interest_post_list_two_content .= '</div>';
				endwhile;
			endif;
		wp_reset_postdata();
		
		$interest_post_list_two_content .= '</div>';
		$interest_post_list_two_content .= '</div>';
        $interest_post_list_two_content .= '</div>';
        $interest_post_list_two_content .= '</section>';

		echo  $interest_post_list_two_content;

?>