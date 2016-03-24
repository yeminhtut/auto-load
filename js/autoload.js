//var comments_container = 'div#comments';
var content_container = 'section#single-post';
var nav_container = 'div.post-navigation';
var post_title_selector = 'h1.post-title';
var curr_url = window.location.href;

jQuery.noConflict();

jQuery(document).ready(function(){
	jQuery(content_container).prepend('<hr style="height: 0" class="post-divider" data-title="' + window.document.title + '" data-url="' + window.location.href + '"/>');
	
	initialise_Scrollspy();
	initialise_history();
	//doAutoLoad();
});


function initialise_history(){

	// Bind to StateChange Event
    History.Adapter.bind(window,'statechange',function(){ // Note: We are using statechange instead of popstate
        
        var State = History.getState(); // Note: We are using History.getState() instead of event.state
        
        if (State.url != curr_url) {
        	window.location.reload(State.url);
        }
                
    });
}

function initialise_Scrollspy(){

	// spy on post-divider - changes the URL in browser location, loads new post 
    jQuery('.post-divider').on('scrollSpy:exit', changeURL ); 
    jQuery('.post-divider').on('scrollSpy:enter', changeURL );
    jQuery('.post-divider').scrollSpy();

}

function changeURL(){

	var el = jQuery(this);
	var this_url = el.attr('data-url');
	var this_title = el.attr('data-title');
	// var offset = el.offset();
	// var scrollTop = jQuery(document).scrollTop();
		
	// // if exiting or entering from top, change URL 
	// if ( ( offset.top - scrollTop ) < 150 ) {
	// 	curr_url = this_url;
	// 	History.pushState(null, null, this_url );
	// 	window.document.title = this_title;
	// } 
	History.pushState(null, null, this_url );
	window.document.title = this_title;
	doAutoLoad();	
	console.log('change');
}

function doAutoLoad(){
	//History.pushState(null, null, post_url);
	// grab the url for the new post
	var post_url = jQuery('a[rel="prev"]').attr('href');
	
	if ( !post_url ) return;
		
	// check to see if pretty permalinks, if not then add partial=1
	if ( post_url.indexOf( '?p=' ) > -1 ) {	
		np_url = post_url + '&partial=1'
	} else {
		np_url = post_url + '/partial';
		//np_url = post_url;
	}
			
	// remove the post navigation HTML
	jQuery(nav_container).remove();

	jQuery.get( np_url , function( data ) { 
	
		var $post_html = jQuery( '<hr class="post-divider" data-url="' + post_url + '"/>' +	data ); 
		
		var $title = $post_html.find( post_title_selector );
		//console.log($post_html);
		jQuery( content_container ).append( $post_html );
		//FB.XFBML.parse();
		// get the HR element and add the data-title
		jQuery('hr[data-url="' + post_url + '"]').attr( 'data-title' , $title.text() );
		 	
		// need to set up ScrollSpy on new content
		initialise_Scrollspy();
		
	});
	console.log(post_url);
}