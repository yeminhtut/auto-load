<?php
/**
 * Template to display sharing buttons
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */

global $newmagz_option;
?>

<footer class="single-post-footer">
		<div class="inner clearfix">
			<div class="social-share-widget">
				<ul>
					<li class="facebook">
						<a onclick="shareOnFacebook('<?php echo get_permalink( get_the_ID())?>')">
							<span class="share-count"><i class="fa fa-facebook"></i></span>
							<?php esc_html_e( 'Facebook', 'newmagz' ); ?>
						</a>
					</li>
					<li class="twitter">
						<a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&amp;url=<?php echo urlencode(get_permalink( get_the_ID() )); ?>">
							<span class="share-count"><i class="fa fa-twitter"></i></span>
							<?php esc_html_e( 'Twitter', 'newmagz' ); ?>
						</a>				

					</li>
					<li class="google">
						<a target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode( get_permalink( get_the_ID() ) ); ?>">
							<span class="share-count"><i class="fa fa-google-plus"></i></span>
							<?php esc_html_e( 'Google+', 'newmagz' ); ?>
						</a>
					</li>
					<li class="pinterest">
						<?php $pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
						<a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode( get_permalink( get_the_ID() ) ); ?>&amp;media=<?php echo $pinterestimage[0]; ?>&amp;description=<?php echo str_replace( ' ', '%20', get_the_title() ); ?>" count-layout="vertical">
							<span class="share-count"><i class="fa fa-pinterest"></i></span>
							<?php esc_html_e( 'Pinterest', 'newmagz' ); ?>
						</a>
					</li>					
				</ul>
			</div>
		</div>
</footer>
<script type="text/javascript" async src="https://platform.twitter.com/widgets.js"></script>
<script type="text/javascript">
	function shareOnFacebook(url){
		var url = url;
		FB.ui({method: 'share',href: url,});
	}
</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';
fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<style type="text/css">
.social-share-widget a:hover{cursor:pointer;}
</style>