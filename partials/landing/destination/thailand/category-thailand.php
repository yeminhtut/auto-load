<main class="main-hero">
	<div class="hero-search">
		<h1 class="hsearch-text" id="landing-title">THAILAND</h1>
		<h2 class="hsearch-text">More than the Land of Smiles</h2>
	</div>	
	<div class="hero-carousel-mask"></div>
	<div id="hero-carousel-thailand" class="hero-carousel"></div>
</main>
<!--end of lading banner -->
<div id="landing-writeup" class="container clearfix	">	
	<div id="secondary-content">
		<img width="294" height="196" src="/wp-content/uploads/2016/01/thailand-map.jpg">
	</div>
	<div id="primary" style="padding-top:10px;">
		<p>
			Thailand truly has something for everyone, from backpackers to honeymooners. Dreaming of an island paradise?
			Book a fun-filled getaway at beach destinations like Phuket or Koh Samui, or get off the grid at Koh Adang or Koh Bulon Lae. Prefer a city escape? 
			Bangkok has everything you need and more – mouth-watering street food, sprawling markets, huge shopping malls and not to forget the swanky bars along Khao San Road. 
			Prefer the greenery? Head to Chiang Mai and embark on a multi-day hike to hill tribe villages. 
		</p>
		<p>
			Uncover the gems of Thailand, whether on a tuk-tuk while cruising through the busy streets or on a catamaran while on an island-hopping tour.
			Fall in love with the beautiful nature, intriguing culture, delicious food and most importantly, Thailand’s ever-smiling and friendly locals.
		</p>
	</div>	
</div>
<?php get_template_part('partials/landing/destination/thailand/full', 'postList'); ?>
<div id="maincontent">
	<div class="container clearfix" style="position:relative;">
		<div id="primary" class="content-area site-main" role="main">
			<?php get_template_part('partials/landing/destination/thailand/post', 'listTab'); ?>
			<?php get_template_part('partials/landing/destination/thailand/post', 'listTwo'); ?>
			<?php get_template_part('partials/landing/destination/thailand/post', 'listThree'); ?>
			<?php get_template_part('partials/landing/destination/thailand/post', 'listFour'); ?>
	    	<?php// get_template_part('partials/landing/destination/thailand/post', 'listOne'); ?>
		</div>		
		<?php get_template_part('partials/landing/destination/thailand/thailand', 'sidebar'); ?>
	</div>
</div>

<?php get_template_part('partials/landing/destination/thailand/thailand', 'footer'); ?>
