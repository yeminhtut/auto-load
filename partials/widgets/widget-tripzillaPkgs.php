<?php
	$country_code = get_geoIP();
	$keywords = simple_fields_value('keywords');
	$keyword_arr = explode(',', $keywords);	
	$key_index = 0;
	if (count($keyword_arr) > 1) {
		$key_index = array_rand($keyword_arr, 1);			
	}
	$filter_key = trim(strip_tags($keyword_arr[$key_index]));
	$filter_key = strtolower($filter_key);	
	$filter_key = keyword_dictionary($filter_key);	
	$filter_key = str_replace(' ', '-', $filter_key);
	$custom_keyword = $filter_key;

	switch ($country_code) {
		case 'PH':		
			$widget_url = "http://tripzilla.ph/widgets/tp_feed/".$custom_keyword;
			break;			
		case 'MY':		
			$widget_url = "http://tripzilla.my/widgets/tp_feed/".$custom_keyword;			
			break;			
		default:
			$widget_url = "http://tripzilla.sg/widgets/tp_feed_new/".$custom_keyword;							
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