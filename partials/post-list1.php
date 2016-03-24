<?php 
$partial_one_set_content  = '<section id="'.$id_category.'" class="homepage-widget widget-type-1">';
            $args_posts_list_1 = array(
				'post_type' 			=> 'post',
				'post_status' 			=> 'publish',
				'cat' => 102,
				'ignore_sticky_posts' 	=> 1,
				'posts_per_page' 		=> 4
			);
			$post_list_1_title_limiter = 12;
            $post_list_1_content_limiter = 40;
			$posts_list_1 = new WP_Query();
			$posts_list_1->query( $args_posts_list_1 );
			$section_title = 'Travel Stories';
			if ( $posts_list_1->have_posts() ) :
        	$partial_one_set_content .= '<div class="section-title"><h4>'.$section_title.'</h4><small class="section-subtitle">'.esc_attr( $post_list_1_desc ).'</small></div>';
            $partial_one_set_content .= '<div class="row post-wrapper">';

		$i = 1; while( $posts_list_1->have_posts() ) : $posts_list_1->the_post();
		if ($i == 1) :

	    $category = get_the_category( get_the_ID() );

		// Get the ID of a given category
		$get_cat_name = $category[0]->cat_name;
	    $category_id = get_cat_ID( $get_cat_name );
	    // Get the URL of this category
	    $category_link = get_category_link( $category_id );

		$partial_one_set_content .= '<div class="column column-2">';
			$partial_one_set_content .= '<article class="wow fadeIn animated hentry full-width-post" data-wow-delay="0.3s">';
				$partial_one_set_content .= '<div class="thumbnail">';
				 
				// Featured image
				if ( has_post_thumbnail() ) {
					$partial_one_set_content .= '<a href="'. get_the_permalink() .'" title="'. get_the_title() .'">' .get_the_post_thumbnail( get_the_ID(), 'newmagz-large-thumbnail-2' ). '</a>';
				} else {
					$partial_one_set_content .= '<a href="'.get_the_permalink().'" title="'. get_the_title() .'">';
	                $partial_one_set_content .= '<img src="http://placehold.it/393x230/333333/ffffff&amp;text=&nbsp;">';
	                $partial_one_set_content .= '</a>';
				}
				$partial_one_set_content .= '</div>';
				$partial_one_set_content .= '<div class="entry-content">';
					$partial_one_set_content .= '<div class="post-category"><a href="'.esc_url( $category_link ).'">'.esc_attr( $category[0]->cat_name ).'</a></div>';
					$partial_one_set_content .= '<h3 class="post-title"><a href="'. get_the_permalink() .'">'.wp_trim_words( get_the_title(), absint($post_list_1_title_limiter), '...' ).'</a></h3>';
					$partial_one_set_content .= warrior_post_meta(); // display post meta
					$partial_one_set_content .= '<div class="excerpt">';
						$partial_one_set_content .= '<p>'.wp_trim_words( get_the_excerpt(), absint( $post_list_1_content_limiter ), '...' ).'</p>';
					$partial_one_set_content .= '</div>';
				$partial_one_set_content .= '</div>';
			$partial_one_set_content .= '</article>	';
		$partial_one_set_content .= '</div>';

		else :
		if ( $posts_list_1->post_count > 1 && $i == 2 ) :
			$partial_one_set_content .= '<div class="column column-2">';
		endif;

			$partial_one_set_content .= '<article class="wow fadeIn animated hentry square-thumb-post" data-wow-delay="0.3s">';
				$partial_one_set_content .= '<div class="thumbnail">';
				 
				// Featured image
				if ( has_post_thumbnail() ) {
					$partial_one_set_content .= '<a href="'. get_the_permalink() .'" title="'. get_the_title() .'">' .get_the_post_thumbnail( get_the_ID(), 'thumbnail' ). '</a>';
				} else {
					$partial_one_set_content .= '<a href="'.get_the_permalink().'" title="'. get_the_title() .'">';
	                $partial_one_set_content .= '<img src="http://placehold.it/130x130/333333/ffffff&amp;text=&nbsp;">';
	                $partial_one_set_content .= '</a>';
				}
				$partial_one_set_content .= '</div>	';
				$partial_one_set_content .= '<div class="entry-content">';
					$partial_one_set_content .= '<div class="post-category"><a href="'.esc_url( $category_link ).'">'.esc_attr( $category[0]->cat_name ).'</a></div>';
					$partial_one_set_content .= '<h3 class="post-title"><a href="'.get_the_permalink().'">'.wp_trim_words( get_the_title(), absint( $post_list_1_title_limiter ), '...' ).'</a></h3>';
					$partial_one_set_content .= warrior_post_meta(); // display post meta
				$partial_one_set_content .= '</div>';
			$partial_one_set_content .= '</article>';
			if ( $posts_list_1->post_count > 1 && $i == $posts_list_1->post_count ) :
		$partial_one_set_content .= '</div>';
		endif;
		endif;
		$i = $i + 1; endwhile;
		endif;
		wp_reset_postdata();

        $partial_one_set_content .= '</div>';
        $partial_one_set_content .= '</section>';

        echo $partial_one_set_content;


