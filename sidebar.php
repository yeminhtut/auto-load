<!-- Start : Sidebar Section -->
<div id="secondary-content" class="sidebar">
	<div id="sidebar-wrapper">
	<?php
	// Load sidebar widgets
	if ( is_single() ) :		
		get_template_part('partials/sidebar/single','sidebar');
	?>
	<?php
	
	elseif ( is_page() && !is_page('front-page') ) :
		if ( is_active_sidebar('warrior-page-sidebar') ) {
			dynamic_sidebar( 'warrior-page-sidebar' );
			//get_template_part('partials/widgets/widget', 'enquirySideber');
		} else {
			echo '<div class="container"><p class="no-widget">';
			wp_kses( _e( 'There\'s no widget assigned. You can start assigning widgets to "Page Sidebar" widget area from the <a href="'. admin_url('/widgets.php') .'">Widgets</a> page.', 'newmagz' ), array(  'a' => array( 'href' => array() ) ) );
			echo '</p></div>';
		}
	elseif ( is_page('home') ) :
		if ( is_active_sidebar('home-sidebar') ) {
			dynamic_sidebar( 'home-sidebar' );
		} else {
			echo '<div class="container"><p class="no-widget">';
			wp_kses( _e( 'There\'s no widget assigned. You can start assigning widgets to "Page Sidebar" widget area from the <a href="'. admin_url('/widgets.php') .'">Widgets</a> page.', 'newmagz' ), array(  'a' => array( 'href' => array() ) ) );
			echo '</p></div>';
		}
	elseif ( is_category() ) :
		if ( is_active_sidebar('warrior-sidebar') ) {
			dynamic_sidebar( 'warrior-sidebar' );			
			//get_template_part('partials/widgets/widget', 'categoryPkgs');
			get_template_part('partials/widgets/widget', 'enquirySideber');
		} else {
			echo '<div class="container"><p class="no-widget">';
			wp_kses( _e( 'There\'s no widget assigned. You can start assigning widgets to "Page Sidebar" widget area from the <a href="'. admin_url('/widgets.php') .'">Widgets</a> page.', 'newmagz' ), array(  'a' => array( 'href' => array() ) ) );
			echo '</p></div>';
		}
	else :	
		if ( is_active_sidebar('warrior-sidebar') ) {
			dynamic_sidebar( 'warrior-sidebar' );
		} else {
			echo '<div class="container"><p class="no-widget">';
			wp_kses( _e( 'There\'s no widget assigned. You can start assigning widgets to "Sidebar" widget area from the <a href="'. admin_url('/widgets.php') .'">Widgets</a> page.', 'newmagz' ), array(  'a' => array( 'href' => array() ) ) );
			echo '</p></div>';
		}
	endif;
	?>	
	</div>
</div>
<!-- End : Sidebar Section -->