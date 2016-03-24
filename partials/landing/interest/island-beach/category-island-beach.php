<main class="main-hero">
	<div class="hero-search">
		<h1 class="hsearch-text" id="interest-title">ISLANDS &amp; BEACHES</h1>
		<div id="interest-writeup" class="container clearfix">
			<p>	
				There are white sand beaches with sparkling seas, then there are moody beaches with crashing waves; we think both are equally magnetic. Is an island getaway your idea of a perfect vacation? You've landed on the right page. Get some inspiration so you can finally build sandcastles on a beach, rather than in the air. 
			</p>
		</div>
	</div>	
	<div id="hero-carousel-island" class="hero-carousel"></div>
</main>
<!--end of lading banner -->
<div id="interest-inspire" class="container clearfix	">	
	<?php get_template_part('partials/landing/interest/island-beach/full', 'postList'); ?>
</div>

<div id="interest-maincontent">
	<div class="container" style="position:relative;">
		<div id="primary" class="content-area site-main" role="main">
			<?php get_template_part('partials/landing/interest/island-beach/post', 'listOne'); ?>
	    	<?php get_template_part('partials/landing/interest/island-beach/post', 'listTwo'); ?>
	    	<?php get_template_part('partials/landing/interest/island-beach/post', 'listThree'); ?>	    	
		</div>		
		<?php get_template_part('partials/landing/interest/island-beach/islands', 'sidebar'); ?>	
		<?php get_template_part('partials/landing/interest/island-beach/post', 'listFour'); ?>	
	</div>	
</div>

<?php get_template_part('partials/landing/landing', 'footer'); ?>