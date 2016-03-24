<?php
/**
 * Template for displaying post nav.
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
?>
<?php global $newmagz_option; ?>

<?php 

	$prevPost = get_previous_post(true);
	$nextPost = get_next_post(true);
?>
	<div class="article-widget post-navigation">
		<ul class="clearfix">
	    <?php $prevPost = get_previous_post(true);
	        if($prevPost) {
	            $args = array(
	                'posts_per_page' => 1,
	                'include' => absint( $prevPost->ID )
	            );
	            $prevPost = get_posts($args);
	            foreach ($prevPost as $post) {
	                setup_postdata($post);
	    ?>
	    	<li>
				<article class="hentry square-thumb-post">
					<div class="thumbnail"> 
					<?php
					// Featured image
					if ( has_post_thumbnail() ) {
						echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
						the_post_thumbnail('newmagz-small-thumbnail-2');
						echo '</a>';
					} else {
						echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
						echo '<img src="http://placehold.it/80x80&text=&nbsp;"/>';
						echo '</a>';
					}
					?>	
					</div>	
					<div class="entry-content">
						<div class="post-category"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Previous Post', 'newmagz'); ?></a></div>	
						<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 10, '...'); ?></a></h3>
					</div>
				</article>
			</li>
	    <?php
	                wp_reset_postdata();
	            } //end foreach
	        } // end if
	         
	        $nextPost = get_next_post(true);
	        if($nextPost) {
	            $args = array(
	                'posts_per_page' => 1,
	                'include' => absint( $nextPost->ID )
	            );
	            $nextPost = get_posts($args);
	            foreach ($nextPost as $post) {
	                setup_postdata($post);
	    ?>
	    	<li>
				<article class="hentry square-thumb-post">
					<div class="thumbnail">
						<?php
						// Featured image
						if ( has_post_thumbnail() ) {
							echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
							the_post_thumbnail('newmagz-small-thumbnail-2');
							echo '</a>';
						} else {
							echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
							echo '<img src="http://placehold.it/80x80&text=&nbsp;"/>';
							echo '</a>';
						}
						?>	
					</div>	
					<div class="entry-content">
						<div class="post-category"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Next Post', 'newmagz'); ?></a></div>	
						<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 10, '...'); ?></a></h3>
					</div>
				</article>
			</li>
	    <?php
	                wp_reset_postdata();
	            } //end foreach
	        } // end if
	    ?>
	    </ul>
	</div>
