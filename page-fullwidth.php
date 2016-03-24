<?php
/**
 * Template Name: Full Width
 */
?>
<?php get_header(); ?>
<style type="text/css">
	#colofone{position: absolute;bottom: 0px;}
</style>
<?php if (is_page( array('advertise'))) {
	get_template_part('partials/static-pages/page','advertise');
} else{ ?>
	<div id="maincontent">
	<div id="contact" class="container clearfix" style="margin-bottom:40px;">
	<?php 
		if (is_page( array('media-trips' ))) {
			get_template_part('partials/static-pages/page','mediaTrip');
		}
		elseif (is_page( array('hall-of-fame'))) {
			get_template_part('partials/static-pages/page','hallOfFame');
		}
		elseif (is_page( array('featured-travellers'))) {
			get_template_part('partials/static-pages/page','featuredTraveller');
		}
		elseif (is_page( array('behind-scenes'))) {
			get_template_part('partials/static-pages/page','team');
		}
		elseif (is_page( array('about'))) {
			get_template_part('partials/static-pages/page','about');
		}		
		else{
			if ( have_posts() ) {
	        while ( have_posts() ) {?>
	        	<h1 class="post-title" style="margin-bottom: 25px;line-height: 35px;"><?php the_title() ?></h1>
		    <?php  
		    		the_post();
		            the_content();
		            wp_link_pages( array( 'before' => '<p class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'newmagz' ) . '</span>', 'after' => '</p>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
		        }
		    }
		}	    
	?>	
	</div>
</div>
<?php } ?>
<?php get_footer(); ?>
<?php
	$check_mobile = detect_mobile(); 		
	switch ($check_mobile) {
		case 'true':
			get_template_part('partials/widgets/widget','subscribeMobile');
			break;			
		default:
			get_template_part('partials/widgets/widget','subscribe');
			break;
	}
?>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		var ads_page = $('#ads-writeup');
		if (ads_page) {
			$('#colofone').css({'position' : 'relative'});
		};
		var content_height = $("#contact").height() + 400;
		var window_height = $(window).height();
		if (content_height>window_height) {
			$('#colofone').css({'position' : 'relative'});
		};
	});
</script>