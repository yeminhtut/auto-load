<?php 
	$prevPost = get_previous_post(true);
	if($prevPost){
		$next_post_url = get_site_url().'/'.$prevPost->post_name.'/'.$prevPost->ID;
		$next_post_title = $prevPost->post_title;
	}
 ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'hentry full-width-post' ); ?> >
		<header class="single-post-header">	
			<h1 class="post-title" data-current-post-id="<?php the_ID(); ?>"><?php the_title(); ?></h1>
			<?php echo warrior_post_meta(); // display post meta ?>
		</header>					
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
		<hr class="time_to_change" data-title="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>" data-nextposturl="<?= $next_post_url ?>" data-nextposttitle="<?= $next_post_title;?>">
		<?php get_template_part( 'includes/autoload-next-posts-nav' ); // display post navigation section ?>			
		<?php get_template_part( 'includes/author-bio' ); // display about author section ?>
		<div id="engage-<?php the_ID(); ?>" class="ad-engage textad" data-title="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>" >
			<?php get_template_part( 'partials/widgets/widget','subscribeSingleBottom' ); ?>
		</div>
	</article>	
<?php endwhile; endif; wp_reset_postdata(); ?>