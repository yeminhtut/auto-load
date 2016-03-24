<?php
/**
 * Warrior Recent Posts Widgets
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
 
// Widgets
add_action( 'widgets_init', 'warrior_recent_posts_widget' );

// Register our widget
function warrior_recent_posts_widget() {
	register_widget( 'Warrior_Recent_Posts' );
}

// Warrior Recent Post Widget
class Warrior_Recent_Posts extends WP_Widget {

	//  Setting up the widget
	function Warrior_Recent_Posts() {
		$widget_ops  = array( 'classname' => 'warrior_recent_posts', 'description' => esc_html__('Display recent post.', 'newmagz') );
		$control_ops = array( 'id_base' => 'warrior_recent_posts' );

		parent::__construct( 'warrior_recent_posts', esc_html__('Warrior Recent Post', 'newmagz'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		global $newmagz_option;
		
		extract( $args );

		$warrior_recent_posts_title 	= apply_filters( 'widget_title', empty( $instance['warrior_recent_posts_title'] ) ? esc_html__( 'Recent Posts', 'newmagz' ) : $instance['warrior_recent_posts_title'], $instance, $this->id_base );
		$warrior_recent_posts_count 	= !empty( $instance['warrior_recent_posts_count'] ) ? absint( $instance['warrior_recent_posts_count'] ) : 4;
		$warrior_popular_title_limiter 	= !empty( $instance['warrior_popular_title_limiter'] ) ? absint( $instance['warrior_popular_title_limiter'] ) : 8;

		if ( !$warrior_recent_posts_count )
 			$warrior_recent_posts_count = 4;
?>
        <?php echo $before_widget; ?>

        <div class="post-widget">
		<?php echo $before_title . esc_attr( $warrior_recent_posts_title ) . $after_title; ?>
			<?php
				global $post;
				// Get the posts from database
				$args = array(
					'post_type' 			=> 'post',
					'post_status' 			=> 'publish',
					'ignore_sticky_posts' 	=> 1,
					'order'					=> 'desc',
					'posts_per_page' 		=> absint( $warrior_recent_posts_count )
				);

				$wp_query = new WP_Query();
				$wp_query->query( $args );
			       
			    if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();  
		    ?>
		    	<article <?php post_class('hentry square-thumb-post'); ?>>
					<div class="thumbnail">
					 
					<?php
					// Featured image
					if ( has_post_thumbnail() ) {
						echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
						the_post_thumbnail('newmagz-small-thumbnail-2');
						echo '</a>';
					} else {
						echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
						echo '<img src="http://placehold.it/80x80&text=&nbsp;" />';
						echo '</a>';
					}
					?>	
					</div>	
					<div class="entry-content">
						<div class="post-category">
						<?php
						$category 		= get_the_category( get_the_ID() );
						$category_name 	= $category[0]->cat_name;
						$category_id 	= get_cat_ID( $category_name );
						$category_link 	= get_category_link( $category_id );
						echo '<a href="'.esc_url( $category_link ).'">'.$category_name.'</a>';
						?>
						</div>	
						<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), absint( $warrior_popular_title_limiter ) .' ...' ); ?></a></h3>
					</div>
				</article>		
			<?php endwhile; else: esc_html_e('No post found.', 'newmagz'); endif; ?>
		</div>

		<?php echo $after_widget; ?>
<?php
		wp_reset_postdata();
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['warrior_recent_posts_title'] 	= strip_tags( $new_instance['warrior_recent_posts_title'] );
		$instance['warrior_recent_posts_count']  	= (int) $new_instance['warrior_recent_posts_count'];
		$instance['warrior_popular_title_limiter']  = (int) $new_instance['warrior_popular_title_limiter'];

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array('warrior_recent_posts_title' => esc_html__('Recent Posts', 'newmagz'), 'warrior_recent_posts_count' => '4', 'warrior_popular_title_limiter' => '8') );
	?>
        <p>
            <label for="<?php echo $this->get_field_id( 'warrior_recent_posts_title' ); ?>"><?php esc_html_e('Widget Title:', 'newmagz'); ?></label>
            <input type="text" id="<?php echo $this->get_field_id( 'warrior_recent_posts_title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'warrior_recent_posts_title' ); ?>" value="<?php echo esc_attr( $instance['warrior_recent_posts_title'] ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'warrior_recent_posts_count' ); ?>"><?php esc_html_e('Number of posts to show:', 'newmagz'); ?></label>
            <input type="text" id="<?php echo $this->get_field_id( 'warrior_recent_posts_count' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'warrior_recent_posts_count' ); ?>" value="<?php echo absint( $instance['warrior_recent_posts_count'] ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'warrior_popular_title_limiter' ); ?>"><?php esc_html_e('Post Title Limiter', 'newmagz'); ?></label>
            <input type="text" id="<?php echo $this->get_field_id( 'warrior_popular_title_limiter' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'warrior_popular_title_limiter' ); ?>" value="<?php echo absint( $instance['warrior_popular_title_limiter'] ); ?>" />
            <p><small><?php esc_html_e( 'The post title will be trim after reaching the number of characters defined.', 'newmagz' ); ?></small></p>
        </p>
	<?php
	}
}
?>