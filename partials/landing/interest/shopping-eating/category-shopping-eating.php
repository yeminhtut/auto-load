<main class="main-hero">
	<div class="hero-search">
		<h1 class="hsearch-text" id="interest-title">SHOPPING AND EATING</h1>
		<div id="interest-writeup" class="container clearfix">
			<p>	
				What better way to get to know any foreign land better than to personally experience the local delights as well as get your hands on the local produce? We aren’t talking about the crazy hoarding of anything that’s cheap in that country. Rather, our eyes are on the home-grown specialties and hidden gems that make any visit unique, and just that much more memorable.
			</p>
		</div>
	</div>	
	<div id="hero-carousel-shopping" class="hero-carousel"></div>
</main>
<!--end of lading banner -->
<div id="interest-inspire" class="container clearfix	">	
	<?php get_template_part('partials/landing/interest/shopping-eating/full', 'postList'); ?>
</div>

<div id="interest-maincontent">
	<div class="container" style="position:relative;">
		<div id="primary" class="content-area site-main" role="main">
			<?php get_template_part('partials/landing/interest/shopping-eating/post', 'listOne'); ?>
	    	<?php get_template_part('partials/landing/interest/shopping-eating/post', 'listTwo'); ?>
		</div>		
		<?php get_template_part('partials/landing/interest/shopping-eating/shopping', 'sidebar'); ?>
		<div class="clear"></div>
		<?php get_template_part('partials/landing/interest/shopping-eating/post', 'listThree'); ?>
	</div>
</div>

<?php get_template_part('partials/landing/landing', 'footer'); ?>