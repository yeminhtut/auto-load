<main class="main-hero">
	<div class="hero-search">
		<h1 class="hsearch-text" id="interest-title">SPORTS &amp; ADVENTURE</h1>
		<div id="interest-writeup" class="container clearfix">
			<p>	
				Travel is the perfect excuse to explore the Great Outdoors and embark on Great Adventures. There's so much of the world to explore, whether it is high up in the mountains or deep underwater. Take it from us – put on your gear, get out there, and make some incredible memories.
			</p>
		</div>
	</div>	
	<div id="hero-carousel-sports" class="hero-carousel"></div>
</main>
<!--end of lading banner -->
<div id="interest-inspire" class="container clearfix	">	
	<?php get_template_part('partials/landing/interest/sports-adventure/full', 'postList'); ?>
</div>

<div id="interest-maincontent">
	<div class="container" style="position:relative;">
		<div id="primary" class="content-area site-main" role="main">
			<?php get_template_part('partials/landing/interest/sports-adventure/post', 'listOne'); ?>
	    	<?php get_template_part('partials/landing/interest/sports-adventure/post', 'listTwo'); ?>
	    	<?php get_template_part('partials/landing/interest/sports-adventure/post', 'listThree'); ?>
	    	<?php get_template_part('partials/landing/interest/sports-adventure/post', 'listFour'); ?>
		</div>		
		<?php get_template_part('partials/landing/interest/sports-adventure/sports', 'sidebar'); ?>		
	</div>
</div>

<?php get_template_part('partials/landing/landing', 'footer'); ?>