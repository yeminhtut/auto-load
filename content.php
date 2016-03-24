<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'hentry full-width-post' ); ?> >
		<header class="single-post-header">	
			<h1 class="post-title"><?php the_title(); ?></h1>
			<?php echo warrior_post_meta(); // display post meta ?>
		</header>					
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
	</article>
<?php endwhile; endif; wp_reset_postdata(); ?>