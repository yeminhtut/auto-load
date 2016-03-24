<main class="main-hero">
	<div class="hero-search">
		<h1 class="hsearch-text" id="interest-title">CRUISES &amp; LAND JOURNEYS</h1>
		<div id="interest-writeup" class="container clearfix">
			<p>	
				Why fly when you can have epic overland adventures? Take the slower route to see, feel and experience more. We’re talking road trips, cycling jaunts, cruising on high seas and walking with your two feet. After all, it’s not about the destination – it’s all about the journey. 
			</p>
		</div>
	</div>	
	<div id="hero-carousel-cruise" class="hero-carousel"></div>
</main>
<!--end of lading banner -->
<div id="interest-inspire" class="container clearfix	">	
	<?php get_template_part('partials/landing/interest/cruises-land-journeys/full', 'postList'); ?>
</div>

<div id="interest-maincontent">
	<div class="container" style="position:relative;">
		<div id="primary" class="content-area site-main" role="main">
			<?php get_template_part('partials/landing/interest/cruises-land-journeys/post', 'listOne'); ?>
	    	<?php get_template_part('partials/landing/interest/cruises-land-journeys/post', 'listTwo'); ?>
		</div>		
		<?php get_template_part('partials/landing/interest/cruises-land-journeys/cruises', 'sidebar'); ?>
		<div class="clear"></div>
		<?php// get_template_part('partials/landing/interest/shopping/post', 'listThree'); ?>
	</div>
</div>

<?php get_template_part('partials/landing/landing', 'footer'); ?>
