<main class="main-hero">
	<div class="hero-search">
		<h1 class="hsearch-text" id="interest-title">FAMILY &amp; KIDS</h1>
		<div id="interest-writeup" class="container clearfix">
			<p>	
				Constantly scratching your head while planning a family-friendly vacation? We feel you – it ain't easy to find something that pleases both the adults and kids alike. There's nothing better than enjoying a family vacation away from the stresses of daily life, so enjoy your holiday on us – we'll do the research for you! Read on to find ideas that are bound to put smiles on anyone, no matter the age! 
			</p>
		</div>
	</div>	
	<div id="hero-carousel-family" class="hero-carousel"></div>
</main>
<!--end of lading banner -->
<div id="interest-inspire" class="container clearfix">	
	<?php get_template_part('partials/landing/interest/family-kids/full', 'postList'); ?>
</div>

<div id="interest-maincontent">
	<div class="container" style="position:relative;">
		<div id="primary" class="content-area site-main" role="main">
			<?php get_template_part('partials/landing/interest/family-kids/post', 'listOne'); ?>
	    	<?php get_template_part('partials/landing/interest/family-kids/post', 'listTwo'); ?>
		</div>		
		<?php get_template_part('partials/landing/interest/family-kids/family-kids', 'sidebar'); ?>
		<div class="clear"></div>
		<?php// get_template_part('partials/landing/interest/shopping/post', 'listThree'); ?>
	</div>
</div>

<?php get_template_part('partials/landing/landing', 'footer'); ?>