<?php
/**
 * Template for displaying author biography.
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
?>
<?php global $newmagz_option; ?>

<?php if ( $newmagz_option['display_author_bio'] ) : // Display about author ?>
<div class="article-widget about-author" style="margin-bottom:40px !important;">
	<div class="warrior-tabs-widget article-tabs">
        <div class="widget-title"><h4><?php esc_html_e('About Author', 'newmagz'); ?></h4></div>
		<div id="about-author" class="tab-content">
			<div class="author-wrapper">
				<div class="thumbnail">
					<?php echo get_avatar( $post->post_author, '130' ); ?>
				</div>
				<div class="detail">
					<h5><?php the_author(); ?></h5>
					<?php echo wpautop( get_the_author_meta('description', $post->post_author), 40, '...') ; ?>
					<p style="text-align:center;text-transform:uppercase;font-size:12px;"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) )?>">CLICK</a> TO SEE MORE ARTICLES BY <?php the_author(); ?></p>
					<br/>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>