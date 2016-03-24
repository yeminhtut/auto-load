<?php 
	$warrior_set_content  = '<section id="'.$id_category.'" class="homepage-widget widget-type-4 '.esc_attr( $type ).' ' .esc_attr( $el_class ).''.esc_attr( $css_class ).'">';
            $args_posts_list_4 = array(
				'post_type' 			=> 'post',
				'post_status' 			=> 'publish',
				'category_name' 		=> $post_list_4_categories,
				'ignore_sticky_posts' 	=> 1,
				'posts_per_page' 		=> absint( $post_list_4_post_limiter )
			);

			$posts_list_4 = new WP_Query();
			$posts_list_4->query( $args_posts_list_4 );

			if ( $posts_list_4->have_posts() ) :
        	$warrior_set_content .= '<div class="section-title"><h4>'.esc_attr( $post_list_4_categories ).'</h4><small class="section-subtitle">'.esc_attr( $post_list_4_desc ).'</small></div>';
            $warrior_set_content .= '<div class="row post-wrapper">';
            	$warrior_set_content .= '<div class="column column-1">';
		    	$warrior_set_content .= '<article class="'.esc_attr( $css_animate_class ).' hentry full-width-post left-thumbnail" data-wow-delay="0.3s">';
		    	$i = 1; while( $posts_list_4->have_posts() ) : $posts_list_4->the_post();
				if ($i == 1) :

			    $category = get_the_category( get_the_ID() );

				// Get the ID of a given category
				$get_cat_name = $category[0]->cat_name;
			    $category_id = get_cat_ID( $get_cat_name );
			    // Get the URL of this category
			    $category_link = get_category_link( $category_id );
					$warrior_set_content .= '<div class="thumbnail">';
					 
					// Featured image
					if ( has_post_thumbnail() ) {
						$warrior_set_content .= '<a href="'. get_the_permalink() .'" title="'. get_the_title() .'">' .get_the_post_thumbnail( get_the_ID(), 'newmagz-large-thumbnail-1' ). '</a>';
					} else {
						$warrior_set_content .= '<a href="'.get_the_permalink().'" title="'. get_the_title() .'">';
		                $warrior_set_content .= '<img src="http://placehold.it/393x507/333333/ffffff&amp;text=&nbsp;">';
		                $warrior_set_content .= '</a>';
					}
					$warrior_set_content .= '</div>';
					$warrior_set_content .= '<div class="entry-content">';
						$warrior_set_content .= '<div class="post-category"><a href="'.esc_url( $category_link ).'">'.esc_attr( $category[0]->cat_name ).'</a></div>';
						$warrior_set_content .= '<h3 class="post-title"><a href="'. get_the_permalink() .'">'.wp_trim_words( get_the_title(), absint( $post_list_4_title_limiter ), '...' ).'</a></h3>';
						$warrior_set_content .= warrior_post_meta(); // display post meta
						$warrior_set_content .= '<p>'.wp_trim_words( get_the_excerpt(), absint( $post_list_4_content_limiter ), '...' ).'</p>';

						else :
						if ( $posts_list_4->post_count > 1 && $i == 2 ) :
							$warrior_set_content .= '<div class="post-list-style">';
							$warrior_set_content .= '<ul>';
						endif;
								$warrior_set_content .= '<li class="'.esc_attr( $css_animate_class ).'" data-wow-delay="0.3s">';
								$warrior_set_content .= '<div class="thumbnail">';
									if ( has_post_thumbnail() ) {
										$warrior_set_content .= '<a href="'. get_the_permalink() .'" title="'. get_the_title() .'">' .get_the_post_thumbnail( get_the_ID(), 'thumbnail' ). '</a>';
									} else {
										$warrior_set_content .= '<a href="'.get_the_permalink().'" title="'. get_the_title() .'">';
						                $warrior_set_content .= '<img src="http://placehold.it/150x150/333333/ffffff&amp;text=&nbsp;">';
						                $warrior_set_content .= '</a>';
									}
								$warrior_set_content .= '</div>';
								$warrior_set_content .= '<h3 class="post-title"><a href="'. get_the_permalink() .'">'.wp_trim_words( get_the_title(), absint( $post_list_4_title_limiter ), '...' ).'</a></h3>';
								$warrior_set_content .= '</li>';
								
						if ( $posts_list_4->post_count > 1 && $i == $posts_list_4->post_count ) :
							$warrior_set_content .= '</ul>	';
							$warrior_set_content .= '</div>';

						endif;
						endif;
						$i = $i + 1; endwhile;	
						$warrior_set_content .= '</div>';
					$warrior_set_content .= '</article>	';
				$warrior_set_content .= '</div>';
			$warrior_set_content .= '</div>';
    	$warrior_set_content .= '</section>';

		else: esc_html_e('not have recent posts !', 'newmagz'); endif;
		wp_reset_postdata();

		return $warrior_set_content;
