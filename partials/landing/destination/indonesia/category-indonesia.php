<main class="main-hero">
	<div class="hero-search">
		<h1 class="hsearch-text" id="landing-title">INDONESIA</h1>
		<h2 class="hsearch-text">Beach, please!</h2>
	</div>	
	<div class="hero-carousel-mask"></div>
	<div id="hero-carousel-indonesia" class="hero-carousel"></div>
</main>
<!--end of lading banner -->
<div id="landing-writeup" class="container clearfix	">
		<p>
			This is the year to explore Indonesia beyond the confines of Bali. Discover the streets of Yogyakarta, the ancient Buddhist temples in Borobudur, or the serene Lake Toba. 
			Then put on your hiking shoes and catch the sunrise from Mount Bromo or the dazzling blue fire in Ijen Volcano. 
		</p>
		<p>
			Indonesia is also a dream diving destination, a paradise for those fascinated with marine life. 
			Boasting 17,000 islands, Indonesia is home to pristine white sand beaches, crystal clear waters, swaying palm trees – everything needed for an ideal beach getaway. 
		</p>
		<p>
			Whether high on the mountains or deep underwater, Indonesia is simply waiting to be discovered.
		</p>
</div>
<?php get_template_part('partials/landing/destination/indonesia/full', 'postList'); ?>
<div id="maincontent">
	<div class="container clearfix" style="position:relative;">
		<div id="primary" class="content-area site-main" role="main">
			<?php get_template_part('partials/landing/destination/indonesia/post', 'listTab'); ?>
	    	<?php get_template_part('partials/landing/destination/indonesia/post', 'listOne'); ?>
		</div>		
		<?php get_template_part('partials/landing/destination/indonesia/indonesia', 'sidebar'); ?>
	</div>
</div>

<?php get_template_part('partials/landing/destination/indonesia/indonesia', 'footer'); ?>