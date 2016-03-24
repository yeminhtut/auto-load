<?php
/**
 * Template for displaying header part.
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */

global $newmagz_option;
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta property="fb:admins" content="100008034553082"/>
<meta property="fb:admins" content="592129311"/>
<meta property="fb:app_id" content="450376811760233" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable = yes" >
<link rel="shortcut icon" href="/wp-content/uploads/2014/04/blog_fav.ico" type="image/x-icon" />
<link rel="icon" href="http://magazine.tripzilla.com/wp-content/uploads/2014/04/blog_fav.ico" type="image/x-icon" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php 
	$country_code = get_geoIP();
	if ($country_code == 'MY') {?>
		<script>
		  // (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  // (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  // m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  // })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		  // ga('create', 'UA-18745286-16', 'tripzilla.com');
		  // ga('require','displayfeatures');
		  // ga('send', 'pageview');
		</script>
<?php	}else{ ?>
		<script>
		  // (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  // (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  // m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  // })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  // ga('create', 'UA-18745286-16', 'tripzilla.com');
		  // ga('require','displayfeatures');
		  // ga('send', 'pageview');
		</script>
<?php } ?>
<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=450376811760233";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<?php wp_head(); ?>
<?php get_template_part('partials/header/header','critical'); ?>
</head>
<body <?php body_class(); ?>>
	<!-- Start: Search Form -->
	<div id="search-full">
		<div class="container">
			<div class="overlay"></div>
			<?php get_search_form(); ?>
		</div>
	</div>
	<!-- End: Search Form -->
	<!-- Start : Header Section -->
	<?php 		
		get_template_part('partials/header/header', 'mobile'); 
		get_template_part('partials/header/header', 'web'); 		
	?>
	<!-- End : Header Section -->