<?php
	//get_template_part('partials/widgets/widget','ads');
	//get_template_part('partials/widgets/widget','facebook');
?>		
<div id="non_sticky_wrapper">
<?php
	//get_template_part('partials/widgets/widget','ads300x250');
	//dynamic_sidebar( 'warrior-single-sidebar' ); 
	$check_mobile = detect_mobile(); 
	if ($check_mobile === false) {
	 	dynamic_sidebar( 'warrior-single-sidebar' ); 
	 }					
	//get_template_part('partials/widgets/widget', 'tripzillaPkgs');
	get_template_part('partials/widgets/widget', 'enquirySideber');
?>
<!--only show at desktop-->
<?php 
	if ($check_mobile === false) {
		//get_template_part('partials/widgets/widget','ads300x600'); 
	}
?>			
</div>
<div id="sticky_div"></div>