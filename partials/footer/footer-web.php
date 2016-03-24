<div class="social">
	<div class="copyright">© TripZilla 2015</div>
</div>		
<nav id="footer-navigation" class="site-navigation footer-menu">		
	<?php
	// Display footer menu
	if ( has_nav_menu( 'footer-menu' ) ) {
		wp_nav_menu( array ( 'theme_location' => 'footer-menu', 'container' => null, 'menu_class' => 'footer-menu', 'depth' => 0 ) );
	}
	?>
</nav>