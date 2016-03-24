<main class="main-hero">
	<div class="hero-search">
		<h1 class="hsearch-text" id="landing-title">MALAYSIA</h1>
		<h2 class="hsearch-text">Of love for the great outdoors and everything culinary</h2>
	</div>	
	<div class="hero-carousel-mask"></div>
	<div id="hero-carousel-malaysia" class="hero-carousel"></div>
</main>
<!--end of lading banner -->
<div id="landing-writeup" class="container clearfix	">	
	<div id="secondary-content">
		<img width="294" height="196" src="/wp-content/uploads/2016/01/malaysia-map.jpg">
	</div>
	<div id="primary" style="padding-top:10px;">
		<p>
			Malaysia encapsulates everything there is to love about Asia – rich heritage, incredible food, and a nice mix of bustling cities and small towns, punctuated by verdant rainforests and untouched nature.
		</p>
		<p>
			Peninsular Malaysia has plenty of destinations to be toured, such as the capital city of Kuala Lumpur, the historically-rich Malacca and the food paradise that is Penang. 
			However, the lesser-developed East Malaysia should be explored too. No adventurous trip would be complete without scaling Mount Kinabalu and diving in pristine locations like Pulau Sipadan.
		</p>
		<p>
			Every trip to Malaysia offers something different, something unique and something memorable. Make your trip happen soon!
		</p>
	</div>	
</div>
<?php get_template_part('partials/landing/destination/malaysia/full', 'postList'); ?>
<div id="maincontent">
	<div class="container clearfix" style="position:relative;">
		<div id="primary" class="content-area site-main" role="main">
			<?php get_template_part('partials/landing/destination/malaysia/post', 'listTab'); ?>
	    	<?php get_template_part('partials/landing/destination/malaysia/post', 'listOne'); ?>
		</div>		
		<?php get_template_part('partials/landing/destination/malaysia/malaysia', 'sidebar'); ?>
	</div>
</div>

<?php get_template_part('partials/landing/destination/malaysia/malaysia', 'footer'); ?>