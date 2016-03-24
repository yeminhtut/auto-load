<main class="main-hero">
	<div class="hero-search">
		<h1 class="hsearch-text" id="landing-title">AUSTRALIA</h1>
		<h2 class="hsearch-text">Live the Aussie life</h2>
	</div>	
	<div class="hero-carousel-mask"></div>
	<div id="hero-carousel-australia" class="hero-carousel"></div>
</main>
<!--end of lading banner -->
<div id="landing-writeup" class="container clearfix	">	
	<div id="secondary-content">
		<img width="294" height="196" src="/wp-content/uploads/2016/01/australia-map.jpg">
	</div>
	<div id="primary" style="padding-top:10px;">
		<p>
			The continent of Australia – fringed with dramatic coastlines, filled with a vast outback interior and dotted with laid-back towns – will probably require more than a lifetime to be fully explored. A bucketful of adventure awaits you at your next vacation, whether it is in New South Wales or Tasmania. 
		</p>
		<p>
			This is the land of epic road trips, wildlife sightings and evening barbies. Go beyond exploring the multicultural cities of Sydney and Melbourne – dive in the Great Barrier Reef, catch a sunset in Uluru and take a hike in some of the 500 national parks in the country. While you’re there, remember to have a G’day, mate!
		</p>
	</div>	
</div>
<?php get_template_part('partials/landing/destination/australia/full', 'postList'); ?>
<div id="maincontent">
	<div class="container clearfix" style="position:relative;">
		<div id="primary" class="content-area site-main" role="main">
			<?php get_template_part('partials/landing/destination/australia/post', 'listTab'); ?>
	    	<?php get_template_part('partials/landing/destination/australia/post', 'listOne'); ?>
		</div>		
		<?php get_template_part('partials/landing/destination/australia/australia', 'sidebar'); ?>
	</div>
</div>
<?php get_template_part('partials/landing/destination/australia/australia', 'footer'); ?>