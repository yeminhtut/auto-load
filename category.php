<?php get_header(); ?>
<?php
	$cat = get_category( get_query_var( 'cat' ) );
	$cat_id = $cat->cat_ID;
	$cat_name = $cat->name;
	$cat_slug = $cat->slug;
	$destination_landing = array('south-korea','europe','malaysia','australia','japan','thailand','indonesia','singapore');
	$interest_landing = array('shopping-eating','island-beach','cruises-land-journeys','sports-adventure','luxury-spa-retreat','family-kids');
	if (in_array($cat_slug, $destination_landing)) {
		get_template_part('partials/landing/destination/'.$cat_slug.'/category', $cat_slug);
	}
	elseif (in_array($cat_slug, $interest_landing)) {
		get_template_part('partials/landing/interest/'.$cat_slug.'/category', $cat_slug);
	}
	else{
		get_template_part('partials/landing/category', 'default');
	}	
?>
<?php get_footer(); ?>