<header id="masthead" class="site-header header-web">
	<div id="top-header">
		<div class="container clearfix">				
			<div class="current-date"></div>				
			<nav id="top-navigation" class="site-navigation">
				<div id="motto" style="padding:15px 0px;float:left;text-align:left;width:50%;">INSPIRING TRAVEL AND MAKING IT HAPPEN</div>
				<div class="header-search" style="float:right;">				
					<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">													
						<input type="text" name="s" class="input input-100" id="input-web"/>						
						<button type="submit" id="searchbar_submit" class="button"><i class="fa fa-search"></i></button>					
					</form>							
				</div>
			</nav>
		</div>
	</div>
	<div class="container clearfix">
	<div id="logo_new" class="site-title logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php echo ( $newmagz_option['logo'] ? esc_url( $newmagz_option['logo']['url'] ) : get_template_directory_uri().'/images/logo.png' ); ?>" alt="<?php echo esc_html( get_bloginfo('name') ); ?>" />
				</a>
			</div> 
	</div>
	<div id="main-header">
		<div class="container clearfix">
			<nav id="main-menu" class="site-navigation">
				<?php get_template_part('partials/widgets/widget', 'menu'); ?>
			</nav>
		</div>
	</div>
	<?php 
		if (!is_page_template( 'page-contact.php' ) && !is_page_template( 'page-fullwidth.php' ) && !is_single()
			&& !is_category(
				array(
					'luxury-spa-retreat','cruises-land-journeys','singapore','indonesia','thailand','japan','australia','malaysia','europe','south-korea','shopping-eating','island-beach','sports-adventure','family-kids')
					)
				) {
				get_template_part('includes/featured-newslider');
			}	
	?>
</header>