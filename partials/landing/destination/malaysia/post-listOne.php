<?php 
	$args = array(
		'post_type' 			=> 'post',
		'post_status' 			=> 'publish',
		'category__and' => array(19,127),
		'ignore_sticky_posts' 	=> 1,
		'posts_per_page' 		=> 5
	);
$posts_feat = new WP_Query();
$posts_feat->query($args);
 ?>
<div style="position:relative">
	<div class="section-header">
		<h3 style="font-size:35px;margin-bottom:20px;line-height:56px;border-bottom: solid 2px #ddd;">Travel inspiration</h3>
	</div>
</div>
<div class="post-list-style-landing">
	<ul style="margin-left:0px;">
		<?php 
			if ( $posts_feat->have_posts() ) :
			while( $posts_feat->have_posts() ) : $posts_feat->the_post();
		 ?>
		<li>
			<div class="thumbnail">
				<?php if ( has_post_thumbnail() ) { ?>
					<a href="<?php echo get_the_permalink() ?>" title="<?php get_the_title() ?>"><?php echo get_the_post_thumbnail( get_the_ID(), 'thumbnail' ) ?></a>
				<?php } else {  ?>
					<a href="<?php echo get_the_permalink() ?>" title="<?php get_the_title() ?>">
				   		<img src="http://placehold.it/393x230/333333/ffffff&amp;text=&nbsp;">
				    </a>
				<?php } ?>
			</div>
			<h3 class="post-title"><a href="<?php echo get_the_permalink() ?>"><?php echo wp_trim_words( get_the_title(), absint('40'), '...' ) ?></a></h3>
			<div class="post-category"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) )?>"><?php echo get_the_author()?></a></div>
		</li>		
		<?php endwhile;endif;wp_reset_postdata();?>
	</ul>
</div>
