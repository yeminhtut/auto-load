<?php 
	$args_posts_list_1 = array(
		'post_type' 			=> 'post',
		'post_status' 			=> 'publish',
		'category__and' => array(6,102),//sports id and travel stories id
		'posts_per_page' 		=> 4
	);
	$posts_list_1 = new WP_Query();
	$posts_list_1->query( $args_posts_list_1 );
	$interest_post_list_one_content = '<div class="section-title"><h3 class="interest-section-title">Travel stories</h3></div>';
	if ( $posts_list_1->have_posts() ) :
		$interest_post_list_one_content .= '<div class="row homepage-widget widget-type-5">';
		$i = 1; while( $posts_list_1->have_posts() ) : $posts_list_1->the_post();
		if ($i == 1) :

		$category = get_the_category( get_the_ID() );

		// Get the ID of a given category
		$get_cat_name = $category[0]->cat_name;
		$category_id = get_cat_ID( $get_cat_name );		

		$interest_post_list_one_content .= '<div class="column column-2">';
		$interest_post_list_one_content .= '<article class="'.esc_attr( $css_animate_class ).' hentry full-width-post" data-wow-delay="0.3s">';
		$interest_post_list_one_content .= '<div class="thumbnail">';

		// Featured image
		if ( has_post_thumbnail() ) {
			$interest_post_list_one_content .= '<a href="'. get_the_permalink() .'" title="'. get_the_title() .'">' .get_the_post_thumbnail( get_the_ID(), 'newmagz-large-thumbnail-2' ). '</a>';
		} else {
			$interest_post_list_one_content .= '<a href="'.get_the_permalink().'" title="'. get_the_title() .'">';
			$interest_post_list_one_content .= '<img src="http://placehold.it/393x230/333333/ffffff&amp;text=&nbsp;">';
			$interest_post_list_one_content .= '</a>';
		}
			$interest_post_list_one_content .= '</div>';
			$interest_post_list_one_content .= '<div class="entry-content">';
			$interest_post_list_one_content .= '<div class="post-category"></div>';
			$interest_post_list_one_content .= '<h3 class="post-title"><a href="'. get_the_permalink() .'">'.wp_trim_words( get_the_title()).'</a></h3>';
			$interest_post_list_one_content .= warrior_post_meta(); // display post meta
			$interest_post_list_one_content .= '<div class="excerpt">';
			$interest_post_list_one_content .= '<p>'.wp_trim_words( get_the_excerpt(), absint( '40' ), '...' ).'</p>';
			$interest_post_list_one_content .= '</div>';
			$interest_post_list_one_content .= '</div>';
			$interest_post_list_one_content .= '</article>	';
			$interest_post_list_one_content .= '</div>';

		else :
			if ( $posts_list_1->post_count > 1 && $i == 2 ) :
			$interest_post_list_one_content .= '<div class="column column-2">';
			endif;

			$interest_post_list_one_content .= '<article class="'.esc_attr( $css_animate_class ).' hentry square-thumb-post" data-wow-delay="0.3s">';
			$interest_post_list_one_content .= '<div class="thumbnail">';
			 
			// Featured image
			if ( has_post_thumbnail() ) {
				$interest_post_list_one_content .= '<a href="'. get_the_permalink() .'" title="'. get_the_title() .'">' .get_the_post_thumbnail( get_the_ID(), 'thumbnail' ). '</a>';
			} else {
				$interest_post_list_one_content .= '<a href="'.get_the_permalink().'" title="'. get_the_title() .'">';
			    $interest_post_list_one_content .= '<img src="http://placehold.it/130x130/333333/ffffff&amp;text=&nbsp;">';
			    $interest_post_list_one_content .= '</a>';
			}
				$interest_post_list_one_content .= '</div>	';
				$interest_post_list_one_content .= '<div class="entry-content">';
				$interest_post_list_one_content .= '<div class="post-category"></div>';
				$interest_post_list_one_content .= '<h3 class="post-title"><a href="'.get_the_permalink().'">'.wp_trim_words( get_the_title()).'</a></h3>';
				$interest_post_list_one_content .= warrior_post_meta(); // display post meta
				$interest_post_list_one_content .= '</div>';
				$interest_post_list_one_content .= '</article>';
			if ( $posts_list_1->post_count > 1 && $i == $posts_list_1->post_count ) :
			$interest_post_list_one_content .= '</div>';
			endif;
		endif;
		$i = $i + 1; endwhile;
	endif;
	wp_reset_postdata();
	$interest_post_list_one_content .= '</div>';
	echo $interest_post_list_one_content;
?>


