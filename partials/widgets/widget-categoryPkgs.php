<?php
	$country_code = get_geoIP();	
	$parents = get_category_parents($cat);
	$parents_arr = explode('/', $parents);
	$utmost_parent = $parents_arr[0];
	if ($utmost_parent == 'Destinations'){
		$filter_key = single_cat_title("", false);
		$filter_key = strtolower($filter_key);	
		$filter_key = keyword_dictionary($filter_key);	
		$filter_key = str_replace(' ', '-', $filter_key);
		$custom_keyword = $filter_key;
	}	
	switch ($country_code) {
		case 'PH':		
			$widget_url = "http://tripzilla.ph/widgets/tp_feed/".$custom_keyword;
			break;			
		case 'MY':		
			$widget_url = "http://tripzilla.my/widgets/tp_feed/".$custom_keyword;			
			break;			
		default:
			$widget_url = "http://tripzilla.sg/widgets/tp_feed/".$custom_keyword;							
			break;
		}
?>

<div class="sidebar-widget row type-1">
	<div class="inner">
		<div class="widget-title" style="margin-bottom:20px !important;"><h4>TOUR PACKAGES</h4></div>
		<iframe src="<?php echo $widget_url; ?>" frameborder="0" scrolling="no" style="height:900px;width:100%;" id="sg_ifr"></iframe>
	</div>
</div>
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