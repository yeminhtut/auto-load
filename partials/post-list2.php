<?php 
$post_list_2_categories = 'Trip Planning';
$post_list_2_post_per_page = 4;
$post_list_2_title_limiter = 30;
$post_list_2_content_limiter = 40;

$partial_two_set_content  = '<section id="'.$id_category.'" class="homepage-widget widget-type-2 '.esc_attr( $type ).' ' .esc_attr( $el_class ).''.esc_attr( $css_class ).'">';
            $args_posts_list_2 = array(
				'post_type' 			=> 'post',
				'post_status' 			=> 'publish',
				'category_name' 		=> $post_list_2_categories,
				'ignore_sticky_posts' 	=> 1,
				'posts_per_page' 		=> absint( $post_list_2_post_per_page )
			);

			$posts_list_2 = new WP_Query();
			$posts_list_2->query( $args_posts_list_2 );
			$section_title = str_replace('-', '', esc_attr( $post_list_2_categories ));
			if ( $posts_list_2->have_posts() ) :
        	$partial_two_set_content .= '<div class="section-title"><h4>'.$section_title.' </h4><small class="section-subtitle">'.esc_attr( $post_list_2_desc ).'</small></div>';
            $partial_two_set_content .= '<div class="row post-wrapper">';

		while( $posts_list_2->have_posts() ) : $posts_list_2->the_post();

	    $category = get_the_category( get_the_ID() );

		// Get the ID of a given category
		$get_cat_name = $category[0]->cat_name;
	    $category_id = get_cat_ID( $get_cat_name );
	    // Get the URL of this category
	    $category_link = get_category_link( $category_id );

		$partial_two_set_content .= '<div class="column column-1">';
			$partial_two_set_content .= '<article class="'.esc_attr( $css_animate_class ).' hentry full-width-post left-thumbnail" data-wow-delay="0.3s">';
				$partial_two_set_content .= '<div class="thumbnail">';
				 
				// Featured image
				if ( has_post_thumbnail() ) {
					$partial_two_set_content .= '<a href="'. get_the_permalink() .'" title="'. get_the_title() .'">' .get_the_post_thumbnail( get_the_ID(), 'newmagz-large-thumbnail-2' ). '</a>';
				} else {
					$partial_two_set_content .= '<a href="'.get_the_permalink().'" title="'. get_the_title() .'">';
	                $partial_two_set_content .= '<img src="http://placehold.it/393x230/333333/ffffff&amp;text=&nbsp;">';
	                $partial_two_set_content .= '</a>';
				}
				$partial_two_set_content .= '</div>';
				$partial_two_set_content .= '<div class="entry-content">';
					$partial_two_set_content .= '<div class="post-category"><a href="'.esc_url( $category_link ).'">'.esc_attr( $category[0]->cat_name ).'</a></div>';
					$partial_two_set_content .= '<h3 class="post-title"><a href="'. get_the_permalink() .'">'.wp_trim_words( get_the_title(), absint( $post_list_2_title_limiter ), '...' ).'</a></h3>';
					$partial_two_set_content .= warrior_post_meta(); // display post meta
					$partial_two_set_content .= '<div class="excerpt">';
						$partial_two_set_content .= '<p>'.wp_trim_words( get_the_excerpt(), absint( $post_list_2_content_limiter ), '...' ).'</p>';
					$partial_two_set_content .= '</div>';
				$partial_two_set_content .= '</div>';
			$partial_two_set_content .= '</article>	';
		$partial_two_set_content .= '</div>';
		endwhile;
		endif;
		wp_reset_postdata();

        $partial_two_set_content .= '</div>';
        $partial_two_set_content .= '</section>';
        echo $partial_two_set_content;
