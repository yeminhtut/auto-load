<main class="main-hero">
	<div class="hero-search">
		<h1 class="hsearch-text" id="interest-title">LUXURY, SPAS &amp; RETREATS</h1>
		<div id="interest-writeup" class="container clearfix">
			<p>	
				Calm your senses, ease your nerves and relax your being. Indulge in luxurious living, because you deserve it. 
			</p>
		</div>
	</div>	
	<div id="hero-carousel-luxury" class="hero-carousel"></div>
</main>
<!--end of lading banner -->
<div id="interest-inspire" class="container clearfix	">	
	<?php get_template_part('partials/landing/interest/luxury-spa-retreat/full', 'postList'); ?>
</div>

<div id="interest-maincontent">
	<div class="container" style="position:relative;">
		<div id="primary" class="content-area site-main" role="main">
			<?php// get_template_part('partials/landing/interest/sports/post', 'listOne'); ?>
	    	<?php// get_template_part('partials/landing/interest/sports/post', 'listTwo'); ?>
	    	<?php// get_template_part('partials/landing/interest/sports/post', 'listThree'); ?>
	    	<?php// get_template_part('partials/landing/interest/sports/post', 'listFour'); ?>
		</div>		
		<?php// get_template_part('partials/landing/interest/sports/sports', 'sidebar'); ?>		
	</div>
</div>

<?php get_template_part('partials/landing/landing', 'footer'); ?>