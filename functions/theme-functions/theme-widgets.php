<?php
/**
 * Function to register widget areas
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
if ( ! function_exists( 'warrior_register_sidebars' ) ) {
	function warrior_register_sidebars(){
		if ( function_exists('register_sidebar') ) {
			//home page
			register_sidebar(array(
				'name' => esc_html__('Home Sidebar', 'newmagz'),
				'id' => 'home-sidebar',
				'class' => '',
				'description'	=> esc_html__('Widgets will be displayed in right sidebar.', 'newmagz'),
				'before_widget' => '<div id="widget-%1$s" class="sidebar-widget row %2$s"><div class="inner">',
				'after_widget' => '</div></div>',
				'before_title' => '<div class="widget-title"><h4>',
				'after_title' => '</h4></div>',
			));

			// Right Sidebar Widget
			register_sidebar(array(
				'name' => esc_html__('Sidebar', 'newmagz'),
				'id' => 'warrior-sidebar',
				'class' => '',
				'description'	=> esc_html__('Widgets will be displayed in right sidebar.', 'newmagz'),
				'before_widget' => '<div id="widget-%1$s" class="sidebar-widget row %2$s"><div class="inner">',
				'after_widget' => '</div></div>',
				'before_title' => '<div class="widget-title"><h4>',
				'after_title' => '</h4></div>',
			));

			// Single Post Sidebar Widget
			register_sidebar(array(
				'name' => esc_html__('Single Post Sidebar', 'newmagz'),
				'id' => 'warrior-single-sidebar',
				'class' => '',
				'description'	=> esc_html__('Widgets will be displayed in right sidebar detail page.', 'newmagz'),
				'before_widget' => '<div id="widget-%1$s" class="sidebar-widget row %2$s"><div class="inner">',
				'after_widget' => '</div></div>',
				'before_title' => '<div class="widget-title"><h4>',
				'after_title' => '</h4></div>',
			));

			// Page Sidebar Widget
			register_sidebar(array(
				'name' => esc_html__('Page Sidebar', 'newmagz'),
				'id' => 'warrior-page-sidebar',
				'class' => '',
				'description'	=> esc_html__('Widgets will be displayed in right sidebar default page.', 'newmagz'),
				'before_widget' => '<div id="widget-%1$s" class="sidebar-widget row %2$s"><div class="inner">',
				'after_widget' => '</div></div>',
				'before_title' => '<div class="widget-title"><h4>',
				'after_title' => '</h4></div>',
			));

			// Footer Top Widget
			register_sidebar(array(
				'name' => esc_html__('Footer Top', 'newmagz'),
				'id' => 'warrior-footer-top',
				'class' => '',
				'description'	=> esc_html__('Widgets will be displayed in footer top area.', 'newmagz'),
				'before_widget' => '<div class="column column-4"><div class="inner"><div id="widget-%1$s" class="footer-widget %2$s">',
				'after_widget' => '</div></div></div>',
				'before_title' => '<div class="widget-title"><h4>',
				'after_title' => '</h4></div>',
			));

			// Footer Widget
			register_sidebar(array(
				'name' => esc_html__('Footer', 'newmagz'),
				'id' => 'warrior-footer',
				'class' => '',
				'description'	=> esc_html__('Widgets will be displayed in footer area.', 'newmagz'),
				'before_widget' => '<div class="column column-3"><div class="inner"><div id="widget-%1$s" class="footer-widget %2$s">',
				'after_widget' => '</div></div></div>',
				'before_title' => '<div class="widget-title"><h4>',
				'after_title' => '</h4></div>',
			));

		}
	}
}

// Load Custom Widgets
require_once get_template_directory() . '/includes/widgets/warrior-popular-posts.php';
require_once get_template_directory() . '/includes/widgets/warrior-recent-posts.php';
require_once get_template_directory() . '/includes/widgets/warrior-recent-posts-by-category.php';
require_once get_template_directory() . '/includes/widgets/warrior-recent-posts-by-category-2.php';
require_once get_template_directory() . '/includes/widgets/warrior-list-category.php';
require_once get_template_directory() . '/includes/widgets/warrior-ad-300x250.php';
?>