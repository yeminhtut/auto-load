<ul id="menu-main_menu" class="main-menu">
	<li id="menu-item-13" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children" data-id="dest-menu">
		<a href="#">Destinations</a>
		<ul class="sub-menu" id="dest-menu" >			
				<div id="dest-sub-menu">
					<div class="row">
						<div class="dest-sub-menu"><a href="/category/destinations/asia/east-asia/south-korea"><img src="http://magdev.tripzilla.com/web/images/sub-menu/desktop/korea.jpg"></a></div>
						<div class="dest-sub-menu"><a href="/category/destinations/asia/southeast-asia/singapore"><img src="http://magdev.tripzilla.com/web/images/sub-menu/desktop/sg.jpg"></a></div>
						<div class="dest-sub-menu"><a href="/category/destinations/asia/southeast-asia/malaysia"><img src="http://magdev.tripzilla.com/web/images/sub-menu/desktop/malaysia.jpg"></a></div>
						<div class="dest-sub-menu"><a href="/category/destinations/europe"><img src="http://magdev.tripzilla.com/web/images/sub-menu/desktop/europe.jpg"></a></div>
					</div>
					<div class="row">
						<div class="dest-sub-menu"><a href="/category/destinations/oceania/australia"><img src="http://magdev.tripzilla.com/web/images/sub-menu/desktop/aussie.jpg"></a></a></div>
						<div class="dest-sub-menu"><a href="/category/destinations/asia/east-asia/japan"><img src="http://magdev.tripzilla.com/web/images/sub-menu/desktop/japan.jpg"></a></a></div>
						<div class="dest-sub-menu"><a href="/category/destinations/asia/southeast-asia/thailand"><img src="http://magdev.tripzilla.com/web/images/sub-menu/desktop/thailand.jpg"></a></div>
						<div class="dest-sub-menu"><a href="/category/destinations/asia/southeast-asia/indonesia"><img src="http://magdev.tripzilla.com/web/images/sub-menu/desktop/indo.jpg"></a></div>
					</div>
				</div>				
				<div class="other-dest-menu">									
					<h5><a href="/category/destinations/asia/southeast-asia">SOUTH EAST ASIA</a></h5>
					<ul class="a">
						<li><a href="/category/destinations/asia/southeast-asia/cambodia"><i class="fa fa-circle" style="margin-bottom: 6px;"></i>Cambodia</a></li>
						<li><a href="/category/destinations/asia/southeast-asia/laos"><i class="fa fa-circle" style="margin-bottom: 6px;"></i>Laos</a></li>
						<li><a href="/category/destinations/asia/southeast-asia/myanmar"><i class="fa fa-circle" style="margin-bottom: 6px;"></i>Myanmar</a></li>
						<li><a href="/category/destinations/asia/southeast-asia/philippines"><i class="fa fa-circle" style="margin-bottom: 6px;"></i>Philippines</a></li>
						<li><a href="/category/destinations/asia/southeast-asia/vietnam"><i class="fa fa-circle" style="margin-bottom: 6px;"></i>Vietnam</a></li>
					</ul>
				</div>
				<div class="other-dest-menu">									
					<h5><a href="/category/destinations/asia/east-asia">EAST ASIA</a></h5>
					<ul class="a">
						<li><a href="/category/destinations/asia/east-asia/hong-kong"><i class="fa fa-circle" style="margin-bottom: 6px;"></i>Hong Kong</a></li>
						<li><a href="/category/destinations/asia/east-asia/japan"><i class="fa fa-circle" style="margin-bottom: 6px;"></i>Japan</a></li>
						<li><a href="/category/destinations/asia/east-asia/taiwan"><i class="fa fa-circle" style="margin-bottom: 6px;"></i>Taiwan</a></li>
					</ul>
				</div>
				<div class="other-dest-menu">
					<h5><a href="/category/destinations/africa">AFRICA</a></h5>
					<h5><a href="/category/destinations/north-america">NORTH AMERICA</a></h5>
					<h5><a href="/category/destinations/oceania">OCEANIA</a></h5>
					<h5><a href="/category/destinations/asia/rest-of-asia">REST OF ASIA</a></h5>
				</div>
				<div class="clear"></div>			
		</ul>
	</li>
	<li id="interest-parent-menu" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children" data-id="interest-menu"><a href="#">Interests</a>
				<ul class="sub-menu" style="display: none;" id="interest-menu" >
				<div class="row">
					<div class="interest-menu"><a href="/category/interest/sports-adventure"><img src="http://magdev.tripzilla.com/web/images/sub-menu/desktop/sports.jpg"></a></div>
					<div class="interest-menu"><a href="/category/interest/shopping-eating"><img src="http://magdev.tripzilla.com/web/images/sub-menu/desktop/shop.jpg"></a></div>
					<div class="interest-menu"><a href="/category/interest/island-beach"><img src="http://magdev.tripzilla.com/web/images/sub-menu/desktop/island.jpg"></a></div>						
				</div>
				<div class="row" style="margin-bottom:6px;">
					<div class="interest-menu"><a href="/category/interest/cruises-land-journeys"><img src="http://magdev.tripzilla.com/web/images/sub-menu/desktop/cruises.jpg"></a></a></div>
					<div class="interest-menu"><a href="/category/interest/luxury-spa-retreat"><img src="http://magdev.tripzilla.com/web/images/sub-menu/desktop/luxury.jpg"></a></a></div>
					<div class="interest-menu"><a href="/category/interest/family-kids"><img src="http://magdev.tripzilla.com/web/images/sub-menu/desktop/family.jpg"></a></div>					
				</div>				
				<div class="other-interest-menu">									
					<h5><a href="/category/trip-planning">TRIP PLANNING</a></h5>
					<h5><a href="/category/travel-inspiration">TRAVEL INSPIRATION</a></h5>
					<h5><a href="/category/travel-stories">TRAVEL STORIES</a></h5>					
				</div>
				<div class="clear"></div>
			</ul>
	</li>
	<li id="travel-news" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="/category/travel-news">TRAVEL NEWS</a></li>
	<?php 
		$location = get_country_code();
		switch ($location) {
			case 'MY':
				echo '<li id="travel-deals" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="http://tripzilla.my/" target="_blank">TRAVEL DEALS</a></li>';
				break;
			
			default:
				echo '<li id="travel-deals" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="http://tripzilla.sg/" target="_blank">TRAVEL DEALS</a></li>';
				break;
		}
	?>
	
	<li id="travel-deals" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="https://flyzilla.com/flight/deals" target="_blank">FLIGHT DEALS</a></li>
	<li id="giveaways" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="/past-winner-announcement">GIVEAWAYs</a></li>
	<li id="get-involved" class="menu-item menu-item-type-custom menu-item-has-children parent-menu" data-id="get_involved"><a href="#">GET INVOLVED</a>
		<ul class="sub-menu" id="get_involved">
			<li><a href="/hall-of-fame">Writer of the month</a></li>
			<li><a href="/media-trips">Media trips</a></li>											
		</ul>
	</li>
	<li id="contact-menu" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children parent-menu" data-id="contact_menu_child_list"><a href="#">CONTACT</a>
		<ul class="sub-menu" id="contact_menu_child_list">
			<li><a href="/about">About us</a></li>
			<li><a href="/advertise">Advertise with us</a></li>	
			<li><a href="/contact-us">Contact us</a></li>										
		</ul>
	</li>
</ul>