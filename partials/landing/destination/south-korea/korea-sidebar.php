<?php
	$widget_url = "http://tripzilla.sg/widgets/tp_feed_new/south-korea/3";
	$featured_post_id = 28534;
	$featured_post = get_post($featured_post_id);
?>
<!-- Start : Sidebar Section -->
<div id="secondary-content" class="sidebar">
	<div class="sidebar-widget">
		<div id="sidebar-featured-article">
			<div class="fetaured-caption caption-black"><span>FEATURED</span></div>
			<article class=" hentry full-width-post" data-wow-delay="0.3s">
				<div class="thumbnail">
					<a href="<?php echo get_permalink($featured_post_id) ?>" title="<?php echo $featured_post->post_title; ?>">
					<?php echo get_the_post_thumbnail( $featured_post_id, 'newmagz-large-thumbnail-2' ) ?>
					</a>
				</div>
				<div class="entry-content">
					<h3 class="post-title">
						<a href="<?php echo get_permalink($featured_post_id) ?>"><?php echo $featured_post->post_title; ?></a>
					</h3>
					<div class="entry-meta">
						<span class="author"><a href="/author/sara-koh">Sara Koh</a></span><span class="date"><i class="fa fa-calendar-minus-o"></i>Dec 1, 2015</span></div>
				</div>
			</article>
		</div>
	</div>
	<div class="sidebar-widget" style="margin-bottom:20px;">
		<div class="inner">
			<div class="widget-title" style="margin-bottom:10px;"><h4>TOUR PACKAGES</h4></div>
			<!-- <iframe src="<?php// echo $widget_url; ?>" frameborder="0" scrolling="no" style="height:900px;width:100%;" id="sg_ifr"></iframe> -->
		</div>
	</div>	
	<div class="sidebar-widget">
		<div class="inner">
			<div id="expert-title"><h4>KOREA EXPERTS</h4></div>	
			<div class="destination-expert">
				<a href="http://tripzilla.sg/stravel" target="_blank">
					<img src="http://res.cloudinary.com/tzsg/image/upload/q_90,w_75,h_75,c_lpad/tzsg_cd%7C124803.jpg">
				</a>				
			</div>		
		</div>
	</div>
</div>
<!-- End : Sidebar Section -->
<script type="text/javascript">
	var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";	
	var eventer = window[eventMethod];	
	var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";
	eventer(messageEvent, function (e) {
			if (e.origin == 'http://tripzilla.sg') {
			var iframeHeight = e.data;			
		    document.getElementById("sg_ifr").style.height = iframeHeight+'px'; 
		}		          
	}, false);	
</script>