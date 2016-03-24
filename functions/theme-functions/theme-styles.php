<?php
/**
 * Function to load JS & CSS files
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */

if ( ! function_exists( 'warrior_enqueue_scripts' ) ) {
	function warrior_enqueue_scripts() {
		global $newmagz_option;
		
		// Load all Javascript files
		//wp_enqueue_script('jquery-ui-core');
		//wp_enqueue_script('jquery-ui-tabs');

		// if ( is_singular() ) {
		// 	wp_enqueue_script( 'comment-reply' );
		// }

		// wp_enqueue_script('newmagz-wow', get_template_directory_uri() .'/js/wow.min.js', array('jquery'), '0.1.6', true);
		// wp_enqueue_script('newmagz-owl-carouselJs', get_template_directory_uri() .'/js/owl.carousel.min.js', array('jquery'), null, true);
		// wp_enqueue_script('newmagz-flexslider', get_template_directory_uri() .'/js/jquery.flexslider-min.js', array('jquery'), '2.4.0', true);
		// wp_enqueue_script('newmagz-fitvids', get_template_directory_uri() .'/js/jquery.fitvids.js', array('jquery'), '1.1', true);
		// wp_enqueue_script('newmagz-slickNavJs', get_template_directory_uri() .'/js/jquery.slicknav.min.js', array('jquery'), '1.0.2', true);
		// wp_enqueue_script('newmagz-justifiedGallery', get_template_directory_uri() .'/js/jquery.justifiedGallery.min.js', array('jquery'), '3.5.1 ', true);
		// wp_enqueue_script('newmagz-functions', get_template_directory_uri() .'/js/functions.js', array('jquery'), null, true);
			
		// Load all CSS files		
		// wp_enqueue_style('newmagz-reset', get_template_directory_uri() .'/css/reset.css', array(), null, 'all');
		// wp_enqueue_style('newmagz-style', get_stylesheet_uri(), array(), null, 'all');
		// wp_enqueue_style('newmagz-linecons', get_template_directory_uri() .'/css/linecons.css', array(), false, 'all' );
		// wp_enqueue_style('newmagz-fontawesome', get_template_directory_uri() .'/css/font-awesome.min.css', array(), null, 'all');
		// wp_enqueue_style('newmagz-owl-carousel', get_template_directory_uri() .'/css/owl.carousel.css', array(), null, 'all');
		// wp_enqueue_style('newmagz-animate', get_stylesheet_directory_uri() .'/css/animate.min.css', array(), false, 'all');
		// wp_enqueue_style('newmagz-slickNav', get_template_directory_uri() .'/css/slicknav.css', array(), null, 'all');
		// wp_enqueue_style('newmagz-justifiedGallery', get_stylesheet_directory_uri() .'/css/justifiedGallery.min.css', array(), false, 'all');
		// wp_enqueue_style('newmagz-flexSliderCss', get_template_directory_uri() .'/css/flexslider.css', array(), null, 'all');
		// wp_enqueue_style('newmagz-responsive', get_template_directory_uri() .'/css/responsive.css', array(), null, 'all');
		// // Load custom CSS file
		// wp_enqueue_style('newmagz-custom', get_template_directory_uri() .'/custom.css', array(), null, 'screen');
	}
}
add_action( 'wp_enqueue_scripts', 'warrior_enqueue_scripts' );

/**
 * Function to generate the several styles from theme options
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
if ( ! function_exists( 'warrior_add_styles_theme_options' ) ) {
	function warrior_add_styles_theme_options() {
		global $newmagz_option;
		?>
		<style type="text/css">
			<?php
			if( function_exists('vc_enabled_frontend') ) {
				if ( vc_enabled_frontend() ) {
			    // Front end editor mode is enabled. Do something.
			?>    
			    .warrior_featured_video .video-holder iframe {
					height: 172px;
				}
			<?php
				}
			}
			?>
				
			.site-navigation > ul > li.menu-item-has-children:hover:before {
    			border-color: transparent transparent <?php echo $newmagz_option['sub_menu_bg']['background-color']; ?> transparent;
			}

			nav#top-navigation.site-navigation > ul > li.current-menu-item > a,
			nav#top-navigation.site-navigation > ul > li.current-menu-ancestor > a,
			nav#top-navigation.site-navigation > ul > li.current-menu-parent > a,
			nav#top-navigation.site-navigation > ul > li.current_page_item > a,
			nav#top-navigation.site-navigation > ul > li.current_page_ancestor > a,
			nav#top-navigation.site-navigation > ul > li.current_page_parent > a {
				color: <?php echo $newmagz_option['top_header_link_color']['active']; ?> !important;
			}
			
			nav#main-menu.site-navigation > ul > li.current-menu-item > a,
			nav#main-menu.site-navigation > ul > li.current-menu-ancestor > a,
			nav#main-menu.site-navigation > ul > li.current-menu-parent > a,
			nav#main-menu.site-navigation > ul > li.current_page_item > a,
			nav#main-menu.site-navigation > ul > li.current_page_ancestor > a,
			nav#main-menu.site-navigation > ul > li.current_page_parent > a {
				color: <?php echo $newmagz_option['main_menu_link_color']['active']; ?> !important;
			}

			.tags span:hover a {
				color: <?php echo $newmagz_option['tags_button_color']['hover']; ?> !important;
			}

			.breadcrumbs ul li span:hover a {
				color: <?php echo $newmagz_option['breadcrumb_link_color']['hover']; ?> !important;
			}

			.sidebar-widget .widget-title:after { 
				background:<?php echo $newmagz_option['sidebar_widget_title_typography']['color']; ?> !important; 
			}

			.article-widget .widget-title:after, .comment-respond .widget-title:after { 
				background:<?php echo $newmagz_option['single_widget_title_typography']['color']; ?> !important; 
			}
			
			#archive-page .section-title:after { 
				background:<?php echo $newmagz_option['recent_post_slider_title_typography']['color']; ?> !important; 
			}

			#footer-widgets .widget-title:after { 
				background:<?php echo $newmagz_option['footer_top_widget_title_typography']['color']; ?> !important; 
			}

			#footer-bottom .widget-title:after { 
				background:<?php echo $newmagz_option['footer_bottom_widget_title_typography']['color']; ?> !important; 
			}

			article.post-overlay .post-list-style ul li a i.icon { 
				color: <?php echo $newmagz_option['post_category_thumbnail_typography']['color']; ?> !important; 
			}

			.post-category .post-list-style ul li a i.icon { 
				color: <?php echo $newmagz_option['post_category_typography']['color']; ?> !important; 
			}

			#footer-navigation > ul > li.current-menu-item > a,
			#footer-navigation > ul > li.current-menu-ancestor > a,
			#footer-navigation > ul > li.current-menu-parent > a,
			#footer-navigation > ul > li.current_page_item > a,
			#footer-navigation > ul > li.current_page_ancestor > a,
			#footer-navigation > ul > li.current_page_parent > a {
				color: <?php echo $newmagz_option['footer_menu_link_color']['active']; ?> !important;
			}

			.search-wrapper {
				  border-bottom: solid 1px <?php echo $newmagz_option['input_border']['border-color']; ?> !important;
			}
		</style>
		<?php
	}
}
//add_action( 'wp_enqueue_scripts', 'warrior_add_styles_theme_options' );