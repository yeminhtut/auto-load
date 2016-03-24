<?php
	$prevPost = get_previous_post(true);
?>
<div class="article-widget post-navigation">
	<ul class="clearfix">
		<?php $prevPost = get_previous_post(true);
		if($prevPost) {
			$args = array('posts_per_page' => 1,'include' => absint( $prevPost->ID ));
			$prevPost = get_posts($args);
			foreach ($prevPost as $post) {
				setup_postdata($post);
		?>
				<h3 class="post-title"><a href="<?php the_permalink(); ?>" rel="prev"><?php echo wp_trim_words( get_the_title(), 10, '...'); ?></a></h3>
		<?php
				wp_reset_postdata();
			} //end foreach
		} // end if
		?>
	</ul>
</div>
