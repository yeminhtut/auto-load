<div class="social" style="text-align:center;float:none !important;">
	<div class="copyright">© TripZilla 2015</div>
</div>		

<div id="footer-mobile">
	<?php
	// Display footer menu
	if ( has_nav_menu( 'footer-menu' ) ) {
		wp_nav_menu( array ( 'theme_location' => 'footer-menu', 'container' => null, 'menu_class' => 'footer-menu', 'depth' => 0 ) );
	}
	?>
</div>
