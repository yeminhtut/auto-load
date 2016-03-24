<?php
// Visual Composer Extend Element Functions

/**
 * Function Visual Composer Extend (Post List Type 1)
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
if( !function_exists('warrior_vc_post_list_1_shortcode') ) {
	function warrior_vc_post_list_1_shortcode( $atts ) {
	    extract( shortcode_atts( array(
	    	'type'			 				=> 'in_container',
	        'post_list_1_title' 			=> '',
	        'post_list_1_desc'				=> '',
	        'post_list_1_categories'		=> '',
	        'post_list_1_title_limiter'		=> '',
	        'post_list_1_content_limiter'	=> '',
	        'post_list_1_post_per_page'		=> '',
	        'el_class' 						=> '',
	        'css' 							=> '',
	        'css_animation' 				=>  ''
	    ), $atts ) );

	    // wp_enqueue_style( 'js_composer_front' );
		wp_enqueue_script( 'wpb_composer_front_js' );
		// wp_enqueue_style('js_composer_custom_css');

	    $css_class = apply_filters( 'VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG', vc_shortcode_custom_css_class( $css, ' ' ) );
	    $css_animate_class = apply_filters( 'VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG', 'wow ' . $css_animation, $atts );

		$warrior_set_desc = esc_attr( $post_list_1_desc );
		$id_category = str_replace(' ', '', $post_list_1_categories);

		$warrior_set_content  = '<section id="'.$id_category.'" class="homepage-widget widget-type-1 '.esc_attr( $type ).' ' .esc_attr( $el_class ).''.esc_attr( $css_class ).'">';
            $args_posts_list_1 = array(
				'post_type' 			=> 'post',
				'post_status' 			=> 'publish',
				'category_name' 		=> $post_list_1_categories,
				'ignore_sticky_posts' 	=> 1,
				'posts_per_page' 		=> absint( $post_list_1_post_per_page )
			);

			$posts_list_1 = new WP_Query();
			$posts_list_1->query( $args_posts_list_1 );
			$section_title = str_replace('-', '', esc_attr( $post_list_1_categories ));
			if ( $posts_list_1->have_posts() ) :
        	$warrior_set_content .= '<div class="section-title"><h4>'.$section_title.'</h4><small class="section-subtitle">'.esc_attr( $post_list_1_desc ).'</small></div>';
            $warrior_set_content .= '<div class="row post-wrapper">';

		$i = 1; while( $posts_list_1->have_posts() ) : $posts_list_1->the_post();
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
					$warrior_set_content .= '<div class="post-category"><a href="'.esc_url( $category_link ).'">'.esc_attr( $category[0]->cat_name ).'</a></div>';
					$warrior_set_content .= '<h3 class="post-title"><a href="'. get_the_permalink() .'">'.wp_trim_words( get_the_title(), absint( $post_list_1_title_limiter ), '...' ).'</a></h3>';
					$warrior_set_content .= warrior_post_meta(); // display post meta
					$warrior_set_content .= '<div class="excerpt">';
						$warrior_set_content .= '<p>'.wp_trim_words( get_the_excerpt(), absint( $post_list_1_content_limiter ), '...' ).'</p>';
					$warrior_set_content .= '</div>';
				$warrior_set_content .= '</div>';
			$warrior_set_content .= '</article>	';
		$warrior_set_content .= '</div>';

		else :
		if ( $posts_list_1->post_count > 1 && $i == 2 ) :
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
					$warrior_set_content .= '<div class="post-category"><a href="'.esc_url( $category_link ).'">'.esc_attr( $category[0]->cat_name ).'</a></div>';
					$warrior_set_content .= '<h3 class="post-title"><a href="'.get_the_permalink().'">'.wp_trim_words( get_the_title(), absint( $post_list_1_title_limiter ), '...' ).'</a></h3>';
					$warrior_set_content .= warrior_post_meta(); // display post meta
				$warrior_set_content .= '</div>';
			$warrior_set_content .= '</article>';
			if ( $posts_list_1->post_count > 1 && $i == $posts_list_1->post_count ) :
		$warrior_set_content .= '</div>';
		endif;
		endif;
		$i = $i + 1; endwhile;
		endif;
		wp_reset_postdata();

            $warrior_set_content .= '</div>';
        $warrior_set_content .= '</section>';

		return $warrior_set_content;
	}
}	
add_shortcode( 'warrior_vc_post_list_1', 'warrior_vc_post_list_1_shortcode' );

/**
 * Function Visual Composer Extend (Post List Type 1)
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
add_action( 'vc_before_init', 'warrior_vc_post_list_1_set_param' );
if( !function_exists('warrior_vc_post_list_1_set_param') ) {
	function warrior_vc_post_list_1_set_param() {
		$categories_array = array();  
		$categories_obj = get_categories( 'type=post&hierarchical=true&orderby=name&hide_empty=0' );
		$categories_array = ( warrior_array_cat_list_id( 0, $categories_obj, $categories_array, 0 ) );
		vc_map( array(
			"name" 				=> esc_html__("Post List Type - 1", "newmagz"), // add a name
			"base" 				=> "warrior_vc_post_list_1", // bind with our shortcode
			"description" 		=> esc_html__( "Display post list on homepage.", "newmagz" ),
			"category" 			=> esc_html__("Warrior Widgets", "newmagz"), // set this category shortcode
			"icon" 				=> get_template_directory_uri() . "/images/warrior-icon.png", // Simply pass url to your icon here
			"content_element" 	=> true, // set this parameter when element will has a content
			"is_container" 		=> true, // set this param when you need to add a content element in this element

			// Here starts the definition of array with parameters of our component
			"params" => array(
			    array(
			        "type" 			=> "textfield",
			        "heading" 		=> esc_html__( "Title", "newmagz" ),
			        "value" 		=> esc_html__( "Post List Type 1", "newmagz" ),
			        "param_name" 	=> "post_list_1_title"
			    ),
			    array(
			        "type" 			=> "textfield",
			        "holder" 		=> "div",
			        "heading" 		=> esc_html__( "Description", "newmagz" ),
			        "value" 		=> esc_html__( "Optional Subtitle goes here", "newmagz" ),
			        "description" 	=> esc_html__("Write your description.", "newmagz"),
			        "param_name" 	=> "post_list_1_desc"
			    ),
			    array(
		            "type" 			=> "dropdown",
		            "heading" 		=> esc_html__("Categories", "newmagz"),
		            "param_name" 	=> "post_list_1_categories",
		            "value" 		=> $categories_array,
		            "description" 	=> esc_html__("Select Categories.", "newmagz")
		        ),
			    array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Post Title Limiter', 'newmagz' ),
					'param_name' 	=> 'post_list_1_title_limiter',
					'value' 		=> 12
				),
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Post Content Limiter', 'newmagz' ),
					'param_name' 	=> 'post_list_1_content_limiter',
					'value' 		=> 35
				),
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Number of Post to Show', 'newmagz' ),
					'param_name' 	=> 'post_list_1_post_per_page',
					'value' 		=> 4
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'CSS Animation', 'newmagz' ),
					'param_name' 	=> 'css_animation',
					'admin_label' 	=> true,
					'value' 		=> array(
										esc_html__( 'No', 'newmagz' ) => '',
										esc_html__( 'Flash', 'newmagz' ) => 'flash',
										esc_html__( 'Pulse', 'newmagz' ) => 'pulse',
										esc_html__( 'FadeIn', 'newmagz' ) => 'fadeIn',
										esc_html__( 'ZoomIn', 'newmagz' ) => "zoomIn"
									),
					'description' 	=> esc_html__( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'newmagz' )
				),
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Extra class name', 'newmagz' ),
					'param_name' 	=> 'el_class',
					'description' 	=> esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'newmagz' )
				),
				array(
					'type' 			=> 'css_editor',
					'heading' 		=> esc_html__( 'CSS', 'newmagz' ),
					'param_name' 	=> 'css',
					'group' 		=> esc_html__( 'Design options', 'newmagz' )
				)
			)
		) );
	}
}


/**
 * Function Visual Composer Extend (Post List Type 2)
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
if( !function_exists('warrior_vc_post_list_2_shortcode') ) {
	function warrior_vc_post_list_2_shortcode( $atts ) {
	    extract( shortcode_atts( array(
	    	'type'			 				=> 'in_container',
	        'post_list_2_title' 			=> '',
	        'post_list_2_desc'				=> '',
	        'post_list_2_categories'		=> '',
	        'post_list_2_title_limiter'		=> '',
	        'post_list_2_content_limiter'	=> '',
	        'post_list_2_post_per_page'		=> '',
	        'el_class' 						=> '',
	        'css' 							=> '',
	        'css_animation' 				=>  ''
	    ), $atts ) );

	    // wp_enqueue_style( 'js_composer_front' );
		wp_enqueue_script( 'wpb_composer_front_js' );
		// wp_enqueue_style('js_composer_custom_css');

	    $css_class = apply_filters( 'VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG', vc_shortcode_custom_css_class( $css, ' ' ) );
	    $css_animate_class = apply_filters( 'VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG', 'wow ' . $css_animation, $atts );

		$warrior_set_desc = esc_attr( $post_list_2_desc );
		$id_category = str_replace(' ', '', $post_list_2_categories);

		$warrior_set_content  = '<section id="'.$id_category.'" class="homepage-widget widget-type-2 '.esc_attr( $type ).' ' .esc_attr( $el_class ).''.esc_attr( $css_class ).'">';
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
        	$warrior_set_content .= '<div class="section-title"><h4>'.$section_title.' </h4><small class="section-subtitle">'.esc_attr( $post_list_2_desc ).'</small></div>';
            $warrior_set_content .= '<div class="row post-wrapper">';

		while( $posts_list_2->have_posts() ) : $posts_list_2->the_post();

	    $category = get_the_category( get_the_ID() );

		// Get the ID of a given category
		$get_cat_name = $category[0]->cat_name;
	    $category_id = get_cat_ID( $get_cat_name );
	    // Get the URL of this category
	    $category_link = get_category_link( $category_id );

		$warrior_set_content .= '<div class="column column-1">';
			$warrior_set_content .= '<article class="'.esc_attr( $css_animate_class ).' hentry full-width-post left-thumbnail" data-wow-delay="0.3s">';
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
					$warrior_set_content .= '<div class="post-category"><a href="'.esc_url( $category_link ).'">'.esc_attr( $category[0]->cat_name ).'</a></div>';
					$warrior_set_content .= '<h3 class="post-title"><a href="'. get_the_permalink() .'">'.wp_trim_words( get_the_title(), absint( $post_list_2_title_limiter ), '...' ).'</a></h3>';
					$warrior_set_content .= warrior_post_meta(); // display post meta
					$warrior_set_content .= '<div class="excerpt">';
						$warrior_set_content .= '<p>'.wp_trim_words( get_the_excerpt(), absint( $post_list_2_content_limiter ), '...' ).'</p>';
					$warrior_set_content .= '</div>';
				$warrior_set_content .= '</div>';
			$warrior_set_content .= '</article>	';
		$warrior_set_content .= '</div>';
		endwhile;
		endif;
		wp_reset_postdata();

            $warrior_set_content .= '</div>';
        $warrior_set_content .= '</section>';

		return $warrior_set_content;
	}
}	
add_shortcode( 'warrior_vc_post_list_2', 'warrior_vc_post_list_2_shortcode' );

/**
 * Function Visual Composer Extend (Post List Type 2)
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
add_action( 'vc_before_init', 'warrior_vc_post_list_2_set_param' );
if( !function_exists('warrior_vc_post_list_2_set_param') ) {
	function warrior_vc_post_list_2_set_param() {
		$categories_array = array();  
		$categories_obj = get_categories( 'type=post&hierarchical=true&orderby=name&hide_empty=0' );
		$categories_array = ( warrior_array_cat_list_id( 0, $categories_obj, $categories_array, 0 ) );
		vc_map( array(
			"name" 				=> esc_html__("Post List Type - 2", "newmagz"), // add a name
			"base" 				=> "warrior_vc_post_list_2", // bind with our shortcode
			"description" 		=> esc_html__( "Display post list on homepage.", "newmagz" ),
			"category" 			=> esc_html__("Warrior Widgets", "newmagz"), // set this category shortcode
			"icon" 				=> get_template_directory_uri() . "/images/warrior-icon.png", // Simply pass url to your icon here
			"content_element" 	=> true, // set this parameter when element will has a content
			"is_container" 		=> true, // set this param when you need to add a content element in this element

			// Here starts the definition of array with parameters of our component
			"params" => array(
			    array(
			        "type" 			=> "textfield",
			        "heading" 		=> esc_html__( "Title", "newmagz" ),
			        "value" 		=> esc_html__( "Post List Type 2", "newmagz" ),
			        "param_name" 	=> "post_list_2_title"
			    ),
			    array(
			        "type" 			=> "textfield",
			        "holder" 		=> "div",
			        "heading" 		=> esc_html__( "Description", "newmagz" ),
			        "value" 		=> esc_html__( "Optional Subtitle goes here", "newmagz" ),
			        "description" 	=> esc_html__("Write your description.", "newmagz"),
			        "param_name" 	=> "post_list_2_desc"
			    ),
			    array(
		            "type" 			=> "dropdown",
		            "heading" 		=> esc_html__("Categories", "newmagz"),
		            "param_name" 	=> "post_list_2_categories",
		            "value" 		=> $categories_array,
		            "description" 	=> esc_html__("Select Categories.", "newmagz")
		        ),
			    array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Post Title Limiter', 'newmagz' ),
					'param_name' 	=> 'post_list_2_title_limiter',
					'value' 		=> 12
				),
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Post Content Limiter', 'newmagz' ),
					'param_name' 	=> 'post_list_2_content_limiter',
					'value' 		=> 35
				),
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Number of Post to Show', 'newmagz' ),
					'param_name' 	=> 'post_list_2_post_per_page',
					'value' 		=> 4
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'CSS Animation', 'newmagz' ),
					'param_name' 	=> 'css_animation',
					'admin_label' 	=> true,
					'value' 		=> array(
										esc_html__( 'No', 'newmagz' ) => '',
										esc_html__( 'Flash', 'newmagz' ) => 'flash',
										esc_html__( 'Pulse', 'newmagz' ) => 'pulse',
										esc_html__( 'FadeIn', 'newmagz' ) => 'fadeIn',
										esc_html__( 'ZoomIn', 'newmagz' ) => "zoomIn"
									),
					'description' 	=> esc_html__( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'newmagz' )
				),
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Extra class name', 'newmagz' ),
					'param_name' 	=> 'el_class',
					'description' 	=> esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'newmagz' )
				),
				array(
					'type' 			=> 'css_editor',
					'heading' 		=> esc_html__( 'CSS', 'newmagz' ),
					'param_name' 	=> 'css',
					'group' 		=> esc_html__( 'Design options', 'newmagz' )
				)
			)
		) );
	}
}


/**
 * Function Visual Composer Extend (Post List Type 3)
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
if( !function_exists('warrior_vc_post_list_3_shortcode') ) {
	function warrior_vc_post_list_3_shortcode( $atts ) {
	    extract( shortcode_atts( array(
	    	'type'			 				=> 'in_container',
	        'post_list_3_title' 			=> '',
	        'post_list_3_desc'				=> '',
	        'post_list_3_categories'		=> '',
	        'post_list_3_title_limiter'		=> '',
	        'post_list_3_post_limiter'		=> '',
	        'el_class' 						=> '',
	        'css' 							=> '',
	        'css_animation' 				=>  ''
	    ), $atts ) );

	    // wp_enqueue_style( 'js_composer_front' );
		wp_enqueue_script( 'wpb_composer_front_js' );
		// wp_enqueue_style('js_composer_custom_css');

	    $css_class = apply_filters( 'VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG', vc_shortcode_custom_css_class( $css, ' ' ) );
	    $css_animate_class = apply_filters( 'VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG', 'wow ' . $css_animation, $atts );

		$warrior_set_desc = esc_attr( $post_list_3_desc );
		$id_category = str_replace(' ', '', $post_list_3_categories);

		$warrior_set_content  = '<section id="'.$id_category.'" class="homepage-widget widget-type-3 '.esc_attr( $type ).' ' .esc_attr( $el_class ).''.esc_attr( $css_class ).'">';
            $args_posts_list_3 = array(
				'post_type' 			=> 'post',
				'post_status' 			=> 'publish',
				'category_name' 		=> $post_list_3_categories,
				'ignore_sticky_posts' 	=> 1,
				'posts_per_page' 		=> absint( $post_list_3_post_limiter )
			);

			$posts_list_3 = new WP_Query();
			$posts_list_3->query( $args_posts_list_3 );
			$section_title = str_replace('-', '', esc_attr( $post_list_3_categories ));
			if ( $posts_list_3->have_posts() ) :
        	$warrior_set_content .= '<div class="section-title"><h4>'.$section_title.'</h4><small class="section-subtitle">'.esc_attr( $post_list_3_desc ).'</small></div>';
            $warrior_set_content .= '<div class="row post-wrapper">';

            $warrior_set_content .= '<div class="column column-1">';
			$warrior_set_content .= '<div class="warrior-carousel warrior-carousel-3 owl-carousel">';

		while( $posts_list_3->have_posts() ) : $posts_list_3->the_post();

	    $category = get_the_category( get_the_ID() );

		// Get the ID of a given category
		$get_cat_name = $category[0]->cat_name;
	    $category_id = get_cat_ID( $get_cat_name );
	    // Get the URL of this category
	    $category_link = get_category_link( $category_id );

			$warrior_set_content .= '<div class="'.esc_attr( $css_animate_class ).' carousel-item" data-wow-delay="0.3s">';
				$warrior_set_content .= '<article class="hentry full-width-post">';
					$warrior_set_content .= '<div class="thumbnail">';
					 
						// Featured image
						if ( has_post_thumbnail() ) {
							$warrior_set_content .= '<a href="'. get_the_permalink() .'" title="'. get_the_title() .'">' .get_the_post_thumbnail( get_the_ID(), 'newmagz-medium-thumbnail-2' ). '</a>';
						} else {
							$warrior_set_content .= '<a href="'.get_the_permalink().'" title="'. get_the_title() .'">';
			                $warrior_set_content .= '<img src="http://placehold.it/262x150/333333/ffffff&amp;text=&nbsp;">';
			                $warrior_set_content .= '</a>';
						}
					$warrior_set_content .= '</div>	';
					$warrior_set_content .= '<div class="entry-content">';
						$warrior_set_content .= '<div class="post-category"><a href="'.esc_url( $category_link ).'">'.esc_attr( $category[0]->cat_name ).'</a></div>	';
						$warrior_set_content .= '<h3 class="post-title"><a href="'. get_the_permalink() .'">'.wp_trim_words( get_the_title(), absint( $post_list_3_title_limiter ), '...' ).'</a></h3>';
						$warrior_set_content .= warrior_post_meta(); // display post meta
					$warrior_set_content .= '</div>';
				$warrior_set_content .= '</article>';
			$warrior_set_content .= '</div>';

		endwhile;
		endif;
		wp_reset_postdata();
		
					$warrior_set_content .= '</div>';
				$warrior_set_content .= '</div>';
            $warrior_set_content .= '</div>';
        $warrior_set_content .= '</section>';

		return $warrior_set_content;
	}
}	
add_shortcode( 'warrior_vc_post_list_3', 'warrior_vc_post_list_3_shortcode' );

/**
 * Function Visual Composer Extend (Post List Type 3)
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
add_action( 'vc_before_init', 'warrior_vc_post_list_3_set_param' );
if( !function_exists('warrior_vc_post_list_3_set_param') ) {
	function warrior_vc_post_list_3_set_param() {
		$categories_array = array();  
		$categories_obj = get_categories( 'type=post&hierarchical=true&orderby=name&hide_empty=0' );
		$categories_array = ( warrior_array_cat_list_id(0, $categories_obj, $categories_array, 0 ) );
		vc_map( array(
			"name" 				=> esc_html__("Post List Type - 3", "newmagz"), // add a name
			"base" 				=> "warrior_vc_post_list_3", // bind with our shortcode
			"description" 		=> esc_html__( "Display post list on homepage.", "newmagz" ),
			"category" 			=> esc_html__("Warrior Widgets", "newmagz"), // set this category shortcode
			"icon" 				=> get_template_directory_uri() . "/images/warrior-icon.png", // Simply pass url to your icon here
			"content_element" 	=> true, // set this parameter when element will has a content
			"is_container" 		=> true, // set this param when you need to add a content element in this element

			// Here starts the definition of array with parameters of our component
			"params" => array(
			    array(
			        "type" 			=> "textfield",
			        "heading" 		=> esc_html__( "Title", "newmagz" ),
			        "value" 		=> esc_html__( "Post List Type 3", "newmagz" ),
			        "param_name" 	=> "post_list_3_title"
			    ),
			    array(
			        "type" 			=> "textfield",
			        "holder" 		=> "div",
			        "heading" 		=> esc_html__( "Description", "newmagz" ),
			        "value" 		=> esc_html__( "Optional Subtitle goes here", "newmagz" ),
			        "description" 	=> esc_html__("Write your description.", "newmagz"),
			        "param_name" 	=> "post_list_3_desc"
			    ),
			    array(
		            "type" 			=> "dropdown",
		            "heading" 		=> esc_html__("Categories", "newmagz"),
		            "param_name" 	=> "post_list_3_categories",
		            "value" 		=> $categories_array,
		            "description" 	=> esc_html__("Select Categories.", "newmagz")
		        ),
			    array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Post Title Limiter', 'newmagz' ),
					'param_name' 	=> 'post_list_3_title_limiter',
					'value' 		=> 12
				),
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Number of Post to Show', 'newmagz' ),
					'param_name' 	=> 'post_list_3_post_limiter',
					'value' 		=> 12
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'CSS Animation', 'newmagz' ),
					'param_name' 	=> 'css_animation',
					'admin_label' 	=> true,
					'value' 		=> array(
										esc_html__( 'No', 'newmagz' ) => '',
										esc_html__( 'Flash', 'newmagz' ) => 'flash',
										esc_html__( 'Pulse', 'newmagz' ) => 'pulse',
										esc_html__( 'FadeIn', 'newmagz' ) => 'fadeIn',
										esc_html__( 'ZoomIn', 'newmagz' ) => "zoomIn"
									),
					'description' 	=> esc_html__( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'newmagz' )
				),
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Extra class name', 'newmagz' ),
					'param_name' 	=> 'el_class',
					'description' 	=> esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'newmagz' )
				),
				array(
					'type' 			=> 'css_editor',
					'heading' 		=> esc_html__( 'CSS', 'newmagz' ),
					'param_name' 	=> 'css',
					'group' 		=> esc_html__( 'Design options', 'newmagz' )
				)
			)
		) );
	}
}

/**
 * Function Visual Composer Extend (Post List Type 4)
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
if( !function_exists('warrior_vc_post_list_4_shortcode') ) {
	function warrior_vc_post_list_4_shortcode( $atts ) {
	    extract( shortcode_atts( array(
	    	'type'			 				=> 'in_container',
	        'post_list_4_title' 			=> '',
	        'post_list_4_desc'				=> '',
	        'post_list_4_categories'		=> '',
	        'post_list_4_title_limiter'		=> '',
	        'post_list_4_content_limiter'	=> '',
	        'post_list_4_post_limiter'		=> '',
	        'el_class' 						=> '',
	        'css' 							=> '',
	        'css_animation' 				=>  ''
	    ), $atts ) );

	    // wp_enqueue_style( 'js_composer_front' );
		wp_enqueue_script( 'wpb_composer_front_js' );
		// wp_enqueue_style('js_composer_custom_css');

	    $css_class = apply_filters( 'VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG', vc_shortcode_custom_css_class( $css, ' ' ) );
	    $css_animate_class = apply_filters( 'VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG', 'wow ' . $css_animation, $atts );

		$warrior_set_desc = esc_attr( $post_list_4_desc );
		$id_category = str_replace(' ', '', $post_list_4_categories);

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
	}
}	
add_shortcode( 'warrior_vc_post_list_4', 'warrior_vc_post_list_4_shortcode' );

/**
 * Function Visual Composer Extend (Post List Type 4)
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
add_action( 'vc_before_init', 'warrior_vc_post_list_4_set_param' );
if( !function_exists('warrior_vc_post_list_4_set_param') ) {
	function warrior_vc_post_list_4_set_param() {
		$categories_array = array();  
		$categories_obj = get_categories('type=post&hierarchical=true&orderby=name&hide_empty=0');
		$categories_array = (warrior_array_cat_list_id(0, $categories_obj, $categories_array, 0));
		vc_map( array(
			"name" 				=> esc_html__("Post List Type - 4", "newmagz"), // add a name
			"base" 				=> "warrior_vc_post_list_4", // bind with our shortcode
			"description" 		=> esc_html__( "Display post list on homepage.", "newmagz" ),
			"category" 			=> esc_html__("Warrior Widgets", "newmagz"), // set this category shortcode
			"icon" 				=> get_template_directory_uri() . "/images/warrior-icon.png", // Simply pass url to your icon here
			"content_element" 	=> true, // set this parameter when element will has a content
			"is_container" 		=> true, // set this param when you need to add a content element in this element

			// Here starts the definition of array with parameters of our component
			"params" => array(
			    array(
			        "type" 			=> "textfield",
			        "heading" 		=> esc_html__( "Title", "newmagz" ),
			        "value" 		=> esc_html__( "Post List Type 4", "newmagz" ),
			        "param_name" 	=> "post_list_4_title"
			    ),
			    array(
			        "type" 			=> "textfield",
			        "holder" 		=> "div",
			        "heading" 		=> esc_html__( "Description", "newmagz" ),
			        "value" 		=> esc_html__( "Optional Subtitle goes here", "newmagz" ),
			        "description" 	=> esc_html__("Write your description.", "newmagz"),
			        "param_name" 	=> "post_list_4_desc"
			    ),
			    array(
		            "type" 			=> "dropdown",
		            "heading" 		=> esc_html__("Categories", "newmagz"),
		            "param_name" 	=> "post_list_4_categories",
		            "value" 		=> $categories_array,
		            "description" 	=> esc_html__("Select Categories.", "newmagz")
		        ),
			    array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Post Title Limiter', 'newmagz' ),
					'param_name' 	=> 'post_list_4_title_limiter',
					'value' 		=> 12
				),
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Post Content Limiter', 'newmagz' ),
					'param_name' 	=> 'post_list_4_content_limiter',
					'value' 		=> 35
				),
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Number of Post to Show', 'newmagz' ),
					'param_name' 	=> 'post_list_4_post_limiter',
					'value' 		=> 6
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'CSS Animation', 'newmagz' ),
					'param_name' 	=> 'css_animation',
					'admin_label' 	=> true,
					'value' 		=> array(
										esc_html__( 'No', 'newmagz' ) => '',
										esc_html__( 'Flash', 'newmagz' ) => 'flash',
										esc_html__( 'Pulse', 'newmagz' ) => 'pulse',
										esc_html__( 'FadeIn', 'newmagz' ) => 'fadeIn',
										esc_html__( 'ZoomIn', 'newmagz' ) => "zoomIn"
									),
					'description' 	=> esc_html__( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'newmagz' )
				),
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Extra class name', 'newmagz' ),
					'param_name' 	=> 'el_class',
					'description' 	=> esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'newmagz' )
				),
				array(
					'type' 			=> 'css_editor',
					'heading' 		=> esc_html__( 'CSS', 'newmagz' ),
					'param_name' 	=> 'css',
					'group' 		=> esc_html__( 'Design options', 'newmagz' )
				)
			)
		) );
	}
}

/**
 * Function Visual Composer Extend (Featured Slider)
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
if( !function_exists('warrior_vc_featured_slider_shortcode') ) {
	function warrior_vc_featured_slider_shortcode( $atts ) {
	    extract( shortcode_atts( array(
	    	'type'			 					=> 'in_container',
	        'featured_slider_title' 			=> '',
	        'featured_slider_options'			=> '',
	        'featured_slider_categories'		=> '',
	        'featured_slider_tags'				=> '',
	        'featured_slider_title_limiter'		=> '',
	        'featured_slider_content_limiter'	=> '',
	        'featured_slider_post_limiter'		=> '',
	        'el_class' 							=> '',
	        'css' 								=> '',
	        'css_animation' 					=>  ''
	    ), $atts ) );

	    // wp_enqueue_style( 'js_composer_front' );
		wp_enqueue_script( 'wpb_composer_front_js' );
		// wp_enqueue_style('js_composer_custom_css');

	    $css_class = apply_filters( 'VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG', vc_shortcode_custom_css_class( $css, ' ' ) );
	    $css_animate_class = apply_filters( 'VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG', 'wow ' . $css_animation, $atts );
	    
	    if ($featured_slider_options == "by_categories") {
	    	$args_featured_slider = array(
				'post_type' 			=> 'post',
				'post_status' 			=> 'publish',
				'cat' 					=> $featured_slider_categories,
				'ignore_sticky_posts' 	=> 1,
				'posts_per_page' 		=> absint( $featured_slider_post_limiter )
			);
	    }elseif ($featured_slider_options == "by_tags") {
	    	$args_featured_slider = array(
				'post_type' 			=> 'post',
				'post_status' 			=> 'publish',
				'tag' 					=> $featured_slider_tags,
				'ignore_sticky_posts' 	=> 1,
				'posts_per_page' 		=> absint( $featured_slider_post_limiter )
			);
	    } else {
	    	$args_featured_slider = array(
				'post_type' 			=> 'post',
				'post_status' 			=> 'publish',
				'ignore_sticky_posts' 	=> 1,
				'posts_per_page' 		=> absint( $featured_slider_post_limiter )
			);
	    }

		$featured_slider = new WP_Query();
		$featured_slider->query( $args_featured_slider );

		if ( $featured_slider->have_posts() ) :
        	
    	$warrior_set_content = '<div id="mainslider" class="'.esc_attr( $type ).' ' .esc_attr( $el_class ).''.esc_attr( $css_class ).'">';
		$warrior_set_content .= '<div class="container clearfix">';
			$warrior_set_content .= '<div class="preload"></div>';
			$warrior_set_content .= '<div class="warrior-carousel warrior-carousel-4 owl-carousel">';

		while( $featured_slider->have_posts() ) : $featured_slider->the_post();

	    $category = get_the_category( get_the_ID() );
		// Get the ID of a given category
		$get_cat_name = $category[0]->cat_name;
	    $category_id = get_cat_ID( $get_cat_name );
	    // Get the URL of this category
	    $category_link = get_category_link( $category_id );

			$warrior_set_content .= '<div class="warrior-carousel-item">';
				$warrior_set_content .= '<article class="'.esc_attr( $css_animate_class ).' hentry slider-post" data-wow-delay="0.3s">';
					$warrior_set_content .= '<div class="thumbnail">';
						// Featured image
						if ( has_post_thumbnail() ) {
							$warrior_set_content .= '<a href="'. get_the_permalink() .'" title="'. get_the_title() .'">' .get_the_post_thumbnail( get_the_ID(), 'newmagz-featured-slider' ). '</a>';
						} else {
							$warrior_set_content .= '<a href="'.get_the_permalink().'" title="'. get_the_title() .'">';
			                $warrior_set_content .= '<img src="http://placehold.it/297x379/333333/ffffff&amp;text=&nbsp;">';
			                $warrior_set_content .= '</a>';
						}
					$warrior_set_content .= '</div>	';
					$warrior_set_content .= '<div class="entry-content">';
						$warrior_set_content .= '<div class="post-category"><a href="'.esc_url( $category_link ).'">'.esc_attr( $category[0]->cat_name ).'</a></div>	';
						$warrior_set_content .= '<h3 class="post-title"><a href="'. get_the_permalink() .'">'.wp_trim_words( get_the_title(), absint( $featured_slider_title_limiter ), '...' ).'</a></h3>';
						$warrior_set_content .= '<div class="detail-post">';
							$warrior_set_content .= warrior_post_meta(); // display post meta
							$warrior_set_content .= '<p>'.wp_trim_words( get_the_excerpt(), absint( $featured_slider_content_limiter ), '...' ).'</p>';
						$warrior_set_content .= '</div>';
					$warrior_set_content .= '</div>';
				$warrior_set_content .= '</article>';
			$warrior_set_content .= '</div>';

		endwhile;
		endif;
		wp_reset_postdata();

        		$warrior_set_content .= '</div>';
			$warrior_set_content .= '</div>	';
		$warrior_set_content .= '</div>';

		return $warrior_set_content;
	}
}	
add_shortcode( 'warrior_vc_featured_slider', 'warrior_vc_featured_slider_shortcode' );

/**
 * Function Visual Composer Extend (Featured Slider)
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
add_action( 'vc_before_init', 'warrior_vc_featured_slider_set_param' );
if( !function_exists('warrior_vc_featured_slider_set_param') ) {
	function warrior_vc_featured_slider_set_param() {
		$vc_taxonomies_types = get_taxonomies( array( 'public' => true ), 'objects' );
		$vc_taxonomies = get_terms( array_keys( $vc_taxonomies_types ), array( 'hide_empty' => false ) );
		$taxonomies_list = array();
		if ( is_array( $vc_taxonomies ) && ! empty( $vc_taxonomies ) ) {
			foreach ( $vc_taxonomies as $t ) {
				if ( is_object( $t ) ) {
					$taxonomies_list[] = array(
						'label' => $t->name,
						'value' => $t->term_id,
						'group_id' => $t->taxonomy,
						'group' =>
							isset( $vc_taxonomies_types[ $t->taxonomy ], $vc_taxonomies_types[ $t->taxonomy ]->labels, $vc_taxonomies_types[ $t->taxonomy ]->labels->name )
								? $vc_taxonomies_types[ $t->taxonomy ]->labels->name
								: esc_html__( 'Taxonomies', 'newmagz' )
					);
				}
			}
		}
		
		vc_map( array(
			"name" 				=> esc_html__("Featured Post Slider", "newmagz"), // add a name
			"base" 				=> "warrior_vc_featured_slider", // bind with our shortcode
			"description" 		=> esc_html__( "Display featured post slider on homepage.", "newmagz" ),
			"category" 			=> esc_html__("Warrior Widgets", "newmagz"), // set this category shortcode
			"icon" 				=> get_template_directory_uri() . "/images/warrior-icon.png", // Simply pass url to your icon here
			"content_element" 	=> true, // set this parameter when element will has a content
			"is_container" 		=> true, // set this param when you need to add a content element in this element

			// Here starts the definition of array with parameters of our component
			"params" => array(
			    array(
			        "type" 			=> "textfield",
			        "heading" 		=> esc_html__( "Title", "newmagz" ),
			        "value" 		=> esc_html__( "Featured Slider", "newmagz" ),
			        "param_name" 	=> "featured_slider_title"
			    ),
			    array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Display Post By', 'newmagz' ),
					'param_name' => 'featured_slider_options',
					'admin_label' => true,
					'value' => array(
						esc_html__( 'Recent Post', 'newmagz' ) => '',
						esc_html__( 'Categories', 'newmagz' ) => 'by_categories',
						esc_html__( 'Tags', 'newmagz' ) => 'by_tags'
					),
					'description' => esc_html__( 'Select options to display recent post.', 'newmagz' )
				),
			    array(
					'type' => 'autocomplete',
					"heading" => esc_html__("Categories", "newmagz"),
					'param_name' => 'featured_slider_categories',
					'settings' => array(
						'multiple' => true,
						// is multiple values allowed? default false
						// 'sortable' => true, // is values are sortable? default false
						'min_length' => 1,
						// min length to start search -> default 2
						// 'no_hide' => true, // In UI after select doesn't hide an select list, default false
						'groups' => true,
						// In UI show results grouped by groups, default false
						'unique_values' => true,
						// In UI show results except selected. NB! You should manually check values in backend, default false
						'display_inline' => true,
						// In UI show results inline view, default false (each value in own line)
						'delay' => 500,
						// delay for search. default 500
						'auto_focus' => true,
						// auto focus input, default true
						'values' => $taxonomies_list,
					),
					"description" 	=> esc_html__("Select Categories, if you will be display recent post by category.", "newmagz"),
				),
				array(
					'type' => 'autocomplete',
					"heading" => esc_html__("Tags", "newmagz"),
					'param_name' => 'featured_slider_tags',
					'settings' => array(
						'multiple' => true,
						// is multiple values allowed? default false
						// 'sortable' => true, // is values are sortable? default false
						'min_length' => 1,
						// min length to start search -> default 2
						// 'no_hide' => true, // In UI after select doesn't hide an select list, default false
						'groups' => true,
						// In UI show results grouped by groups, default false
						'unique_values' => true,
						// In UI show results except selected. NB! You should manually check values in backend, default false
						'display_inline' => true,
						// In UI show results inline view, default false (each value in own line)
						'delay' => 500,
						// delay for search. default 500
						'auto_focus' => true,
						// auto focus input, default true
						'values' => $taxonomies_list,
					),
					'param_holder_class' => 'vc_not-for-custom',
					"description" 	=> esc_html__("Select tags, if you will be display recent post by tags.", "newmagz"),
					'dependency' => array(
						'element' => 'post_type',
						'value_not_equal_to' => array( 'ids', 'custom' ),
					),
				),
			    array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Post Title Limiter', 'newmagz' ),
					'param_name' 	=> 'featured_slider_title_limiter',
					'value' 		=> 6
				),
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Post Content Limiter', 'newmagz' ),
					'param_name' 	=> 'featured_slider_content_limiter',
					'value' 		=> 30
				),
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Number of Post to Show', 'newmagz' ),
					'param_name' 	=> 'featured_slider_post_limiter',
					'value' 		=> 12
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'CSS Animation', 'newmagz' ),
					'param_name' 	=> 'css_animation',
					'admin_label' 	=> true,
					'value' 		=> array(
										esc_html__( 'No', 'newmagz' ) => '',
										esc_html__( 'Flash', 'newmagz' ) => 'flash',
										esc_html__( 'Pulse', 'newmagz' ) => 'pulse',
										esc_html__( 'FadeIn', 'newmagz' ) => 'fadeIn',
										esc_html__( 'ZoomIn', 'newmagz' ) => "zoomIn"
									),
					'description' 	=> esc_html__( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'newmagz' )
				),
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Extra class name', 'newmagz' ),
					'param_name' 	=> 'el_class',
					'description' 	=> esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'newmagz' )
				),
				array(
					'type' 			=> 'css_editor',
					'heading' 		=> esc_html__( 'CSS', 'newmagz' ),
					'param_name' 	=> 'css',
					'group' 		=> esc_html__( 'Design options', 'newmagz' )
				)
			)
		) );
	}
}


/**
 * Function Visual Composer Extend (Post with Tabs)
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
if( !function_exists('warrior_vc_post_tabs_shortcode') ) {
	function warrior_vc_post_tabs_shortcode( $atts ) {
	    extract( shortcode_atts( array(
	    	'type'			 				=> 'in_container',
	        'post_tabs_title' 				=> '',
	        'post_tabs_options'				=> '',
	        'post_tabs_categories_1'		=> '',
	        'post_tabs_categories_2'		=> '',
	        'post_tabs_categories_3'		=> '',
	        'post_tabs_title_limiter'		=> '',
	        'post_tabs_content_limiter'		=> '',
	        'el_class' 						=> '',
	        'css' 							=> '',
	        'css_animation' 				=>  ''
	    ), $atts ) );

	    // wp_enqueue_style( 'js_composer_front' );
		wp_enqueue_script( 'wpb_composer_front_js' );
		// wp_enqueue_style('js_composer_custom_css');

	    $css_class = apply_filters( 'VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG', vc_shortcode_custom_css_class( $css, ' ' ) );
	    $css_animate_class = apply_filters( 'VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG', 'wow ' . $css_animation, $atts );

	   $warrior_set_content  = '<div id="sports" class="homepage-widget widget-type-5 warrior-tabs-widget">';
			$warrior_set_content .= '<ul class="tab-nav">';
	        	$warrior_set_content .= '<li><a href="javascript:void(0)" data-content="#tab-'.str_replace(" ","",$post_tabs_categories_1).'" title="" class="active">'.str_replace("-","",$post_tabs_categories_1).'</a></li>';
	            $warrior_set_content .= '<li><a href="javascript:void(0)" data-content="#tab-'.str_replace(" ","",$post_tabs_categories_2).'" title="">'.str_replace("-","",$post_tabs_categories_2).'</a></li>';
	        	$warrior_set_content .= '<li><a href="javascript:void(0)" data-content="#tab-'.str_replace(" ","",$post_tabs_categories_3).'" title="">'.str_replace("-","",$post_tabs_categories_3).'</a></li>';
	        $warrior_set_content .= '</ul>';
			$warrior_set_content  .= '<div class="tabs_container">';
				$args_posts_tab_1 = array(
				'post_type' 			=> 'post',
				'post_status' 			=> 'publish',
				'category_name' 		=> $post_tabs_categories_1,
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
								$warrior_set_content .= '<div class="post-category"><a href="'.esc_url( $category_link ).'">'.esc_attr( $category[0]->cat_name ).'</a></div>';
								$warrior_set_content .= '<h3 class="post-title"><a href="'. get_the_permalink() .'">'.wp_trim_words( get_the_title(), absint( $post_tabs_title_limiter ), '...' ).'</a></h3>';
								$warrior_set_content .= warrior_post_meta(); // display post meta
								$warrior_set_content .= '<div class="excerpt">';
									$warrior_set_content .= '<p>'.wp_trim_words( get_the_excerpt(), absint( $post_tabs_content_limiter ), '...' ).'</p>';
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
								$warrior_set_content .= '<div class="post-category"><a href="'.esc_url( $category_link ).'">'.esc_attr( $category[0]->cat_name ).'</a></div>';
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
				'category_name' 		=> $post_tabs_categories_2,
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
								$warrior_set_content .= '<div class="post-category"><a href="'.esc_url( $category_link ).'">'.esc_attr( $category[0]->cat_name ).'</a></div>';
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
								$warrior_set_content .= '<div class="post-category"><a href="'.esc_url( $category_link ).'">'.esc_attr( $category[0]->cat_name ).'</a></div>';
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
				'category_name' 		=> $post_tabs_categories_3,
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
								$warrior_set_content .= '<div class="post-category"><a href="'.esc_url( $category_link ).'">'.esc_attr( $category[0]->cat_name ).'</a></div>';
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
								$warrior_set_content .= '<div class="post-category"><a href="'.esc_url( $category_link ).'">'.esc_attr( $category[0]->cat_name ).'</a></div>';
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

		return $warrior_set_content;
	}
}	
add_shortcode( 'warrior_vc_post_tabs', 'warrior_vc_post_tabs_shortcode' );

/**
 * Function Visual Composer Extend (Post with Tabs)
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
add_action( 'vc_before_init', 'warrior_vc_post_tabs_set_param' );
if( !function_exists('warrior_vc_post_tabs_set_param') ) {
	function warrior_vc_post_tabs_set_param() {
		$categories_array = array();  
		$categories_obj = get_categories( 'type=post&hierarchical=true&orderby=name&hide_empty=0' );
		$categories_array = ( warrior_array_cat_list_id(0, $categories_obj, $categories_array, 0 ) );

		vc_map( array(
			"name" 				=> esc_html__("Post Tabs", "newmagz"), // add a name
			"base" 				=> "warrior_vc_post_tabs", // bind with our shortcode
			"description" 		=> esc_html__( "Display post list tabs on homepage.", "newmagz" ),
			"category" 			=> esc_html__("Warrior Widgets", "newmagz"), // set this category shortcode
			"icon" 				=> get_template_directory_uri() . "/images/warrior-icon.png", // Simply pass url to your icon here
			"content_element" 	=> true, // set this parameter when element will has a content
			"is_container" 		=> true, // set this param when you need to add a content element in this element

			// Here starts the definition of array with parameters of our component
			"params" => array(
			    array(
			        "type" 			=> "textfield",
			        "heading" 		=> esc_html__( "Title", "newmagz" ),
			        "value" 		=> esc_html__( "Post Tabs", "newmagz" ),
			        "param_name" 	=> "post_tabs_title"
			    ),
			    array(
		            "type" 			=> "dropdown",
		            "heading" 		=> esc_html__("Categories 1", "newmagz"),
		            "param_name" 	=> "post_tabs_categories_1",
		            "value" 		=> $categories_array,
		            "description" 	=> esc_html__("Select Categories.", "newmagz")
		        ),
		        array(
		            "type" 			=> "dropdown",
		            "heading" 		=> esc_html__("Categories 2", "newmagz"),
		            "param_name" 	=> "post_tabs_categories_2",
		            "value" 		=> $categories_array,
		            "description" 	=> esc_html__("Select Categories.", "newmagz")
		        ),
		        array(
		            "type" 			=> "dropdown",
		            "heading" 		=> esc_html__("Categories 3", "newmagz"),
		            "param_name" 	=> "post_tabs_categories_3",
		            "value" 		=> $categories_array,
		            "description" 	=> esc_html__("Select Categories.", "newmagz")
		        ),
			    array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Post Title Limiter', 'newmagz' ),
					'param_name' 	=> 'post_tabs_title_limiter',
					'value' 		=> 12
				),
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Post Content Limiter', 'newmagz' ),
					'param_name' 	=> 'post_tabs_content_limiter',
					'value' 		=> 35
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'CSS Animation', 'newmagz' ),
					'param_name' 	=> 'css_animation',
					'admin_label' 	=> true,
					'value' 		=> array(
										esc_html__( 'No', 'newmagz' ) => '',
										esc_html__( 'Flash', 'newmagz' ) => 'flash',
										esc_html__( 'Pulse', 'newmagz' ) => 'pulse',
										esc_html__( 'FadeIn', 'newmagz' ) => 'fadeIn',
										esc_html__( 'ZoomIn', 'newmagz' ) => "zoomIn"
									),
					'description' 	=> esc_html__( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'newmagz' )
				),
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Extra class name', 'newmagz' ),
					'param_name' 	=> 'el_class',
					'description' 	=> esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'newmagz' )
				),
				array(
					'type' 			=> 'css_editor',
					'heading' 		=> esc_html__( 'CSS', 'newmagz' ),
					'param_name' 	=> 'css',
					'group' 		=> esc_html__( 'Design options', 'newmagz' )
				)
			)
		) );
	}
}
// END Visual Composer Element Functions


// Start Add Custom templates
/**
 * Function Visual Composer Extend (Homepage Layout - Version 1)
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
add_filter( 'vc_load_default_templates', 'warrior_vc_custom_templates_homepage_1' ); // Hook in
if( !function_exists('warrior_vc_custom_templates_homepage_1') ) {
function warrior_vc_custom_templates_homepage_1( $data ) {
    $template               	= array();
    $template['name']       	= esc_html__( 'Homepage Version 1', 'newmagz' ); // Assign name for your custom template
    $template['custom_class'] 	= 'newmagz-homepage-1'; // CSS class name
    $template['content']    	= <<<CONTENT
    	[vc_row full_width="stretch_row_content_no_spaces" parallax="" parallax_image=""][vc_column width="1/1"][warrior_vc_featured_slider featured_slider_title="Fetured Slider" featured_slider_options="" featured_slider_title_limiter="6" featured_slider_content_limiter="30" featured_slider_post_limiter="12" css_animation="fadeIn" featured_slider_desc="Optional Subtitle goes here" featured_slider_categories=" Culinary" featured_slider_tags=" Airplane"][/warrior_vc_featured_slider][/vc_column][/vc_row][vc_row full_width="" parallax="" parallax_image=""][vc_column width="2/3"][warrior_vc_post_list_1 post_list_1_title="Post List Type 1" post_list_1_desc="Optional Subtitle goes here" post_list_1_categories=" Entertainment" post_list_1_title_limiter="12" post_list_1_content_limiter="35" css_animation="fadeIn" post_list_1_post_per_page="4"][vc_video link="https://youtu.be/XopGZ3SbzaU"][/warrior_vc_post_list_1][warrior_vc_post_list_2 post_list_2_title="Post List Type 2" post_list_2_desc="Optional Subtitle goes here" post_list_2_categories=" Lifestyle" post_list_2_title_limiter="12" post_list_2_content_limiter="35" post_list_2_post_per_page="4" css_animation="fadeIn"][/warrior_vc_post_list_2][warrior_vc_post_list_3 post_list_3_title="Post List Type 3" post_list_3_desc="Optional Subtitle goes here" post_list_3_categories=" Politics" post_list_3_title_limiter="12" post_list_3_post_limiter="12" css_animation="fadeIn" post_list_3_content_limiter="35"][/warrior_vc_post_list_3][warrior_vc_post_list_4 post_list_4_title="Post List Type 4" post_list_4_desc="Optional Subtitle goes here" post_list_4_categories=" Technology" post_list_4_title_limiter="12" post_list_4_content_limiter="35" post_list_4_post_limiter="3" css_animation="fadeIn" css=".vc_custom_1438866001748{margin-bottom: 0px !important;border-bottom-width: 0px !important;}"][/warrior_vc_post_list_4][vc_row_inner css=".vc_custom_1438866085882{margin-top: 0px !important;padding-top: 10px !important;padding-bottom: 30px !important;}"][vc_column_inner el_class="" width="1/1"][vc_video link="https://youtu.be/XopGZ3SbzaU"][/vc_column_inner][/vc_row_inner][warrior_vc_post_tabs post_tabs_title="Post Tabs" post_tabs_categories_1=" Lifestyle" post_tabs_categories_2=" Economy" post_tabs_categories_3=" Politics" post_tabs_title_limiter="12" post_tabs_content_limiter="35" css_animation="fadeIn"][/warrior_vc_post_tabs][/vc_column][vc_column width="1/3"][vc_widget_sidebar sidebar_id="warrior-sidebar"][/vc_column][/vc_row]
CONTENT;
 
    array_unshift( $data, $template );
    return $data;
}
}


// Start Add Custom templates
/**
 * Function Visual Composer Extend (Homepage Layout - Version 2)
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.1
 */
add_filter( 'vc_load_default_templates', 'warrior_vc_custom_templates_homepage_2' ); // Hook in
if( !function_exists('warrior_vc_custom_templates_homepage_2') ) {
function warrior_vc_custom_templates_homepage_2( $data ) {
    $template               	= array();
    $template['name']       	= esc_html__( 'Homepage Version 2', 'newmagz' ); // Assign name for your custom template
    $template['custom_class'] 	= 'newmagz-homepage-2'; // CSS class name
    $template['content']    	= <<<CONTENT
    	[vc_row full_width="stretch_row_content_no_spaces"][vc_column width="1/1"][warrior_vc_featured_slider featured_slider_title="Featured Slider" featured_slider_title_limiter="6" featured_slider_content_limiter="30" featured_slider_post_limiter="12"][/warrior_vc_featured_slider][/vc_column][/vc_row][vc_row][vc_column width="1/1"][warrior_vc_post_list_3 post_list_3_title="Post List Type 3" post_list_3_desc="Optional Subtitle goes here" post_list_3_categories=" Entertainment" post_list_3_title_limiter="12" post_list_3_post_limiter="12"][/warrior_vc_post_list_3][/vc_column][/vc_row][vc_row css=".vc_custom_1445739910353{margin-bottom: 0px !important;padding-top: 50px !important;padding-bottom: 0px !important;}"][vc_column width="1/2"][warrior_vc_post_list_4 post_list_4_title="Post List Type 4" post_list_4_desc="Latest news from the entertainment world" post_list_4_categories=" Politics" post_list_4_title_limiter="12" post_list_4_content_limiter="35" post_list_4_post_limiter="1"][/warrior_vc_post_list_4][/vc_column][vc_column width="1/2"][warrior_vc_post_list_4 post_list_4_title="Post List Type 4" post_list_4_desc="Latest news from the entertainment world" post_list_4_categories=" Lifestyle" post_list_4_title_limiter="12" post_list_4_content_limiter="35" post_list_4_post_limiter="1" css_animation=""][/warrior_vc_post_list_4][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1445740272437{margin-top: 80px !important;margin-bottom: 0px !important;padding-top: 70px !important;padding-bottom: 0px !important;background-color: #212121 !important;}"][vc_column width="1/1"][vc_custom_heading text="Latest Video from Victoria Not a Secret" font_container="tag:h2|font_size:35px|text_align:center|color:%23ffffff" google_fonts="font_family:Merriweather%3A300%2C300italic%2Cregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal" css=".vc_custom_1438919323426{padding-right: 20px !important;padding-bottom: 10px !important;padding-left: 20px !important;}"][vc_custom_heading text="Exclusive video from the catwalk" font_container="tag:h4|font_size:16px|text_align:center|color:%239e9e9e" google_fonts="font_family:Lato%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal" css=".vc_custom_1438919558781{padding-bottom: 50px !important;}"][vc_video link="https://www.youtube.com/watch?v=XopGZ3SbzaU" css=".vc_custom_1438919157177{margin-top: 0px !important;padding-top: 0px !important;}"][/vc_column][/vc_row][vc_row css=".vc_custom_1445740316357{margin-top: 80px !important;}"][vc_column width="2/3"][warrior_vc_post_list_1 post_list_1_title="Post List Type 1" post_list_1_desc="Optional Subtitle goes here" post_list_1_categories=" Economy" post_list_1_title_limiter="12" post_list_1_content_limiter="35" post_list_1_post_per_page="4" css_animation=""][vc_video title="Featured Video" link="https://www.youtube.com/watch?v=XopGZ3SbzaU"][/warrior_vc_post_list_1][warrior_vc_post_list_2 post_list_2_title="Post List Type 2" post_list_2_desc="Optional Subtitle goes here" post_list_2_categories=" Lifestyle" post_list_2_title_limiter="12" post_list_2_content_limiter="35" post_list_2_post_per_page="4" css_animation=""][vc_row_inner][vc_column_inner el_class="" width="1/1"][/vc_column_inner][/vc_row_inner][warrior_vc_post_list_4 post_list_4_title="Post List Type 4" post_list_4_desc="Optional Subtitle goes here" post_list_4_categories=" Technology" post_list_4_title_limiter="12" post_list_4_content_limiter="35" post_list_4_post_limiter="6" css_animation=""][/warrior_vc_post_list_4][/warrior_vc_post_list_2][warrior_vc_post_list_4 post_list_4_title="Post List Type 4" post_list_4_desc="Optional Subtitle goes here" post_list_4_categories=" Technology" post_list_4_title_limiter="12" post_list_4_content_limiter="35" post_list_4_post_limiter="2" css_animation=""][/warrior_vc_post_list_4][warrior_vc_post_tabs post_tabs_title="Post Tabs" post_tabs_categories_1=" Culinary" post_tabs_categories_2=" Economy" post_tabs_categories_3=" Technology" post_tabs_title_limiter="12" post_tabs_content_limiter="35" css_animation=""][/warrior_vc_post_tabs][warrior_vc_post_list_1 post_list_1_title="Post List Type 1" post_list_1_desc="Optional Subtitle goes here" post_list_1_categories=" Politics" post_list_1_title_limiter="12" post_list_1_content_limiter="35" post_list_1_post_per_page="4" css_animation="" css=".vc_custom_1439283193469{padding-bottom: 40px !important;}"][/warrior_vc_post_list_1][/vc_column][vc_column width="1/3"][vc_widget_sidebar sidebar_id="warrior-sidebar"][/vc_column][/vc_row]
CONTENT;
 
    array_unshift( $data, $template );
    return $data;
}
}


// Start Add Custom templates
/**
 * Function Visual Composer Extend (Homepage Layout - Version 2)
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.1
 */
add_filter( 'vc_load_default_templates', 'warrior_vc_custom_templates_homepage_3' ); // Hook in
if( !function_exists('warrior_vc_custom_templates_homepage_3') ) {
function warrior_vc_custom_templates_homepage_3( $data ) {
    $template               	= array();
    $template['name']       	= esc_html__( 'Homepage Version 3', 'newmagz' ); // Assign name for your custom template
    $template['custom_class'] 	= 'newmagz-homepage-3'; // CSS class name
    $template['content']    	= <<<CONTENT
    	[vc_row][vc_column][warrior_vc_post_tabs post_tabs_categories_1=" Technology" post_tabs_categories_2=" Culinary" post_tabs_categories_3=" Economy" post_tabs_title_limiter="12" post_tabs_content_limiter="35"][/warrior_vc_post_tabs][/vc_column][/vc_row][vc_row][vc_column width="2/3"][warrior_vc_post_list_1 post_list_1_categories=" Economy" post_list_1_title_limiter="12" post_list_1_content_limiter="35" post_list_1_post_per_page="4" el_class="home-2-post-list-1"][/warrior_vc_post_list_1][/vc_column][vc_column width="1/3"][vc_single_image image="2563" img_size="full" onclick="custom_link" link="#"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1445743940122{padding-bottom: 40px !important;}"][vc_column][warrior_vc_featured_slider featured_slider_title_limiter="6" featured_slider_content_limiter="30" featured_slider_post_limiter="12"][/warrior_vc_featured_slider][/vc_column][/vc_row][vc_row][vc_column width="1/2"][warrior_vc_post_list_4 post_list_4_categories=" Entertainment" post_list_4_title_limiter="12" post_list_4_content_limiter="35" post_list_4_post_limiter="2"][/warrior_vc_post_list_4][/vc_column][vc_column width="1/2"][warrior_vc_post_list_4 post_list_4_categories=" Lifestyle" post_list_4_title_limiter="12" post_list_4_content_limiter="35" post_list_4_post_limiter="2"][/warrior_vc_post_list_4][/vc_column][/vc_row]
CONTENT;
 
    array_unshift( $data, $template );
    return $data;
}
}


/**
 * Function Visual Composer Extend (Contact Template)
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
add_filter( 'vc_load_default_templates', 'warrior_vc_custom_templates_contact' ); // Hook in
if( !function_exists('warrior_Vvccustom_templates_contact') ) {
function warrior_vc_custom_templates_contact( $data ) {
    $template               	= array();
    $template['name']       	= esc_html__( 'Contact', 'newmagz' ); // Assign name for your custom template
    $template['custom_class'] 	= 'newmagz-contact'; // CSS class name
    $template['content']    	= <<<CONTENT
        [vc_row full_width="stretch_row_content_no_spaces"][vc_column width="1/1"][vc_gmaps link="#E-8_JTNDaWZyYW1lJTIwc3JjJTNEJTIyaHR0cHMlM0ElMkYlMkZ3d3cuZ29vZ2xlLmNvbSUyRm1hcHMlMkZlbWJlZCUzRnBiJTNEJTIxMW0xOCUyMTFtMTIlMjExbTMlMjExZDE1ODEyLjIzODg1Nzk3NDk3JTIxMmQxMTAuNDExNDM5MyUyMTNkLTcuNzgzNDkzOCUyMTJtMyUyMTFmMCUyMTJmMCUyMTNmMCUyMTNtMiUyMTFpMTAyNCUyMTJpNzY4JTIxNGYxMy4xJTIxM20zJTIxMW0yJTIxMXMweDAwMDAwMDAwMDAwMDAwMDAlMjUzQTB4MGYwMjdhNzdjNjRjM2RmMCUyMTJzQWRpc3VjaXB0byUyQkludGVybmF0aW9uYWwlMkJBaXJwb3J0JTIxNWUwJTIxM20yJTIxMXNlbiUyMTJzaWQlMjE0djE0MjY1NjgzMzc5NjElMjIlMjB3aWR0aCUzRCUyMjEwMCUyNSUyMiUyMGhlaWdodCUzRCUyMjM4MCUyMiUyMGZyYW1lYm9yZGVyJTNEJTIyMCUyMiUyMHN0eWxlJTNEJTIyYm9yZGVyJTNBMCUyMiUzRSUzQyUyRmlmcmFtZSUzRQ==" size="380px"][/vc_column][/vc_row][vc_row full_width="" parallax="" parallax_image=""][vc_column width="1/2"][vc_column_text]
<h2 class="page-title">Get intouch with us</h2>
&nbsp;

<i>Suddenly there came running up one who told him that his house had been broken into by thieves, and that they had made off with everything they could lay hands on. He was up in a moment, and rushed off, tearing his hair and calling down curses on the miscreants.</i>

&nbsp;

The bystanders were much amused, and one of them said, “ Our friend professes to know what is going to happen to others, but it seems he’s not clever enough to perceive what’s in store for himself.” THE OWL is a very wise bird; and once, long ago, when the first oak sprouted in the forest, she called all the other Birds together and said to them, “You see this tiny tree? If you take my advice, you will destroy it now when it is small: for when it grows big, the mistletoe will appear upon it, from which birdlime will be prepared for your destruction.”

&nbsp;

<address>San Francisco, Fifth Ave. on the 3rd floor</address><a href="#"><i class="fa fa-envelope"></i> info@newmagz.com</a>

<a href="#"><i class="fa fa-envelope"></i> info@newmagz</a>

<a href="#"><i class="fa fa-phone"></i> +62 81 234 567 890</a>[/vc_column_text][/vc_column][vc_column width="1/2"][contact-form-7 id="2142"][/vc_column][/vc_row]
CONTENT;
 
    array_unshift( $data, $template );
    return $data;
}
}

// End Add Custom templates
?>