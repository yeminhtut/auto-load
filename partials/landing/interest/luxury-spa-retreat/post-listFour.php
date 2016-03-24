<div class="row" id="interest-list4">
<?php
	//Singapore// 
	$interest_post_list_three = 'Extreme Sports';
	$section_title = str_replace('-', '', esc_attr( $interest_post_list_three ));
	$interest_post_list_three_left_content  = '<section id="" class="homepage-widget widget-type-2">';
	$interest_post_list_three_left_content .= '<div class="section-title"><h3 class="interest-section-title">'.$section_title.'</h3></div>';
	$interest_post_list_three_left_content .= '<div class="row post-wrapper">';
            $args_posts_list_3 = array(
				'post_type' 			=> 'post',
				'post_status' 			=> 'publish',
				'category__and' 		=> array(6),//sports id
				'tag__in' 				=> array(724),//extreme sports
				'posts_per_page' 		=> 2
			);
			$posts_list_3 = new WP_Query();
			$posts_list_3->query( $args_posts_list_3 );
			
			if ( $posts_list_3->have_posts() ) :
				while( $posts_list_3->have_posts() ) : $posts_list_3->the_post();
					$interest_post_list_three_left_content .= '<div class="column column-1">';
					$interest_post_list_three_left_content .= '<article class="hentry full-width-post left-thumbnail" data-wow-delay="0.3s">';
		            $interest_post_list_three_left_content .= '<div class="thumbnail">';
							// Featured image
							if ( has_post_thumbnail() ) {
								$interest_post_list_three_left_content .= '<a href="'. get_the_permalink() .'" title="'. get_the_title() .'">' .get_the_post_thumbnail( get_the_ID(), 'newmagz-medium-thumbnail-2' ). '</a>';
							} else {
								$interest_post_list_three_left_content .= '<a href="'.get_the_permalink().'" title="'. get_the_title() .'">';
				                $interest_post_list_three_left_content .= '<img src="http://placehold.it/262x150/333333/ffffff&amp;text=&nbsp;">';
				                $interest_post_list_three_left_content .= '</a>';
							}
					$interest_post_list_three_left_content .= '</div>';
		            $interest_post_list_three_left_content .= '<div class="entry-content">';
		            $interest_post_list_three_left_content .= '<h3 class="post-title"><a href="'. get_the_permalink() .'">'.wp_trim_words( get_the_title()).'</a></h3>';
		            $interest_post_list_three_left_content .= '<div class="post-category"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author().'</a></div>';
	                $interest_post_list_three_left_content .= '<div class="excerpt"><p>'.wp_trim_words( get_the_excerpt(), absint( '25' ), '...' ).'</p></div>';
	            	$interest_post_list_three_left_content .= '</div>';
	        		$interest_post_list_three_left_content .= '</article>';
	    			$interest_post_list_three_left_content .= '</div>';
				endwhile;
			endif;
		wp_reset_postdata();
		$interest_post_list_three_left_content .= '</div>';	
        $interest_post_list_three_left_content .= '</section>';        
		echo  $interest_post_list_three_left_content;
?>
</div>



