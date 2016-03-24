<!-- Start : Sidebar Section -->
<div id="secondary-content" class="sidebar">
	<?php
		//get_template_part('partials/widgets/widget','facebook');
		//get_template_part('partials/widgets/widget','ads300x250');
	?>
	<?php	
		dynamic_sidebar( 'home-sidebar' );
		get_template_part('partials/widgets/widget', 'category');
		//get_template_part('partials/widgets/widget','ads300x600');
	?>	
</div>
<!-- End : Sidebar Section -->