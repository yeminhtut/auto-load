<?php
	$widget_url = "http://tripzilla.sg/widgets/tp_feed_new/malaysia/3";
	$featured_post_id = 22940;
	$post_author_id = get_post_field( 'post_author', $featured_post_id );	
	$author_name = get_userdata($post_author_id)->display_name;
	$post_date = get_the_date( 'Y-m-d', $featured_post_id );
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
						<a href="<?php echo get_permalink($featured_post_id) ?>"><?php echo get_the_title( $featured_post_id ); ?></a>
					</h3>
					<div class="entry-meta">
						<span class="author"><a href="<?php echo get_author_posts_url( $post_author_id)?>"><?php echo $author_name; ?></a></span>
						<span class="date"><i class="fa fa-calendar-minus-o"></i><?php echo date_i18n( 'M j, Y', strtotime($post_date) )?></span>
					</div>
				</div>
			</article>
		</div>
	</div>
	<div class="sidebar-widget">
		<div class="inner">
			<div class="widget-title"><h4>TOUR PACKAGES</h4></div>
			<iframe src="<?php echo $widget_url; ?>" frameborder="0" scrolling="no" style="height:900px;width:100%;" id="sg_ifr"></iframe>
		</div>
	</div>	
	<div class="sidebar-widget">
		<div class="inner">
			<div id="expert-title"><h4>EUROPE EXPERTS</h4></div>	
			<div class="destination-expert">
				<a href="http://tripzilla.sg/directory/review/127/euro-asia-holidays" target="_blank">
					<img src="http://res.cloudinary.com/tzsg/image/upload/q_90,w_75,h_75,c_lpad/tzsg_cd%7C2317759.jpg">
				</a>				
			</div>	
			<div class="destination-expert">
				<a href="http://tripzilla.sg/directory/review/70/konsortium-express-and-tours" target="_blank">
					<img src="http://res.cloudinary.com/tzsg/image/upload/q_90,w_75,h_75,c_lpad/tzsg_cd%7C2322514.jpg">
				</a>				
			</div>	
			<div class="destination-expert">
				<a href="http://tripzilla.sg/directory/review/116/focal-travel" target="_blank">
					<img src="http://res.cloudinary.com/tzsg/image/upload/q_90,w_75,h_75,c_lpad/tzsg_cd%7C131730.jpg">
				</a>				
			</div>
			<div class="cls"></div>
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