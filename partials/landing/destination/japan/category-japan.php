<main class="main-hero">
	<div class="hero-search">
		<h1 class="hsearch-text" id="landing-title">JAPAN</h1>
		<h2 class="hsearch-text">The perfect blend of old and new</h2>
	</div>	
	<div class="hero-carousel-mask"></div>
	<div id="hero-carousel-japan" class="hero-carousel"></div>
</main>
<!--end of lading banner -->
<div id="landing-writeup" class="container clearfix	">	
	<div id="secondary-content">
		<img width="294" height="196" src="/wp-content/uploads/2016/01/japan-map.jpg">
	</div>
	<div id="primary" style="padding-top:10px;">
		<p>Japan is worth a visit for sheer gastronomic pleasure, stretching beyond the world of irrisistible fresh sashimi and sushi.</p> 

		<p>Interesting sights will greet you in Japan, from speedy bullet trains and top-notch toilet seats to vending machines that sell everything. At the heart of this innovative modernity, old-age tradition still lingers. In the streets of Kyoto, you can catch sight of a strolling geisha and experience a traditional tea ceremony. In Tokyo, you will see temples and shrines dotting the cityscape.</p> 

		<p>Japan will draw you back again and again, to enjoy its cosmopolitan cities and picturesque country, and to explore its quirks and intricacies. Let your discovery begin.</p>
		
	</div>	
</div>
<?php get_template_part('partials/landing/destination/japan/full', 'postList'); ?>
<div id="maincontent">
	<div class="container clearfix" style="position:relative;">
		<div id="primary" class="content-area site-main" role="main">
			<?php get_template_part('partials/landing/destination/japan/post', 'listTab'); ?>
	    	<?php get_template_part('partials/landing/destination/japan/post', 'listOne'); ?>
		</div>		
		<?php get_template_part('partials/landing/destination/japan/japan', 'sidebar'); ?>
	</div>
</div>

<?php get_template_part('partials/landing/destination/japan/japan', 'footer'); ?>