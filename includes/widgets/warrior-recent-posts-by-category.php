<?php
/**
 * Warrior Recent Post by Category (Sidebar)
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
 
 
// Widgets
add_action( 'widgets_init', 'warrior_recent_post_by_cat_widget' );

// Register our widget
function warrior_recent_post_by_cat_widget() {
	register_widget( 'Warrior_Recent_Post_By_Category' );
}

// Recent Post by Category Warrior Widget
class Warrior_Recent_Post_By_Category extends WP_Widget {

	//  Setting up the widget
	function Warrior_Recent_Post_By_Category() {
		$widget_ops  = array( 'classname' => 'type-1', 'description' => esc_html__('Display recent post by category widget type - 1', 'newmagz') );
		$control_ops = array( 'id_base' => 'warrior_recent_post_by_category' );

		parent::__construct( 'warrior_recent_post_by_category', esc_html__('Warrior Recent Post by Category - Type 1', 'newmagz'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		global $newmagz_option;

		extract( $args );

		$warrior_recent_post_by_category_title        = apply_filters( 'widget_title', empty( $instance['warrior_recent_post_by_category_title'] ) ? esc_html__( 'Recent Posts', 'newmagz' ) : $instance['warrior_recent_post_by_category_title'], $instance, $this->id_base );
		$warrior_recent_post_by_category_title_count  = !empty( $instance['warrior_recent_post_by_category_title_count'] ) ? absint( $instance['warrior_recent_post_by_category_title_count'] ) : 8;
		$warrior_recent_post_by_category_category 	  = esc_attr($instance['warrior_recent_post_by_category_category']);
		$warrior_recent_post_by_category_count 		  = !empty( $instance['warrior_recent_post_by_category_count'] ) ? absint( $instance['warrior_recent_post_by_category_count'] ) : 6;
		
		if ( !$warrior_recent_post_by_category_count )
 			$warrior_recent_post_by_category_count = 6;
		// Get the items
		$args_recent_post_by_category = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'cat' => $warrior_recent_post_by_category_category,
			'ignore_sticky_posts' => 1,
			'posts_per_page' => absint( $warrior_recent_post_by_category_count )
		);

		$recent_post = new WP_Query();
		$recent_post->query( $args_recent_post_by_category );

		if ( $recent_post->have_posts() ) :

		echo $before_widget;
		echo $before_title;
		echo esc_attr( $warrior_recent_post_by_category_title );
		echo $after_title;
?>
		<?php while( $recent_post->have_posts() ) : $recent_post->the_post(); ?>			
				<div class="post-list-style">
				<ul>			
					<li>
						<div class="thumbnail">
						<?php
						// Featured image
						if ( has_post_thumbnail() ) {
							echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
							the_post_thumbnail('newmagz-small-thumbnail-2');
							echo '</a>';
						} else {
							echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
							echo '<img src="http://placehold.it/150x150&text=&nbsp;" />';
							echo '</a>';
						}
						?>	
						</div>	
						<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), absint( $warrior_recent_post_by_category_title_count ) .' ...' ); ?></a></h3>
						<div class="post-category" style="margin-left:65px;">
							<?php
							// $category = get_the_category( get_the_ID() );
							// $category_name =  $category[0]->cat_name;
							// $category_id = get_cat_ID( $category_name );
							// $category_link = get_category_link( $category_id );
							// echo '<a href="'.esc_url( $category_link ).'">'.$category_name.'</a>';
							?>
						</div>
					</li>						
				</ul>
				</div>
			<?php
				endwhile;
			?>
<?php
		echo $after_widget;

		else: esc_html_e('not have recent posts !', 'newmagz'); endif;
		wp_reset_postdata();
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['warrior_recent_post_by_category_title'] 			= strip_tags( $new_instance['warrior_recent_post_by_category_title'] );
		$instance['warrior_recent_post_by_category_title_count']	= (int) $new_instance['warrior_recent_post_by_category_title_count'];
		$instance['warrior_recent_post_by_category_category']		= esc_attr($new_instance['warrior_recent_post_by_category_category']);
		$instance['warrior_recent_post_by_category_count']			= (int) $new_instance['warrior_recent_post_by_category_count'];

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'warrior_recent_post_by_category_title' => esc_html__('Recent Posts', 'newmagz'), 'warrior_recent_post_by_category_category' => '', 'warrior_recent_post_by_category_title_count' => '8', 'warrior_recent_post_by_category_count' => '6' ) );
		
		//Access the WordPress Categories via an Array
		$categories_array = array();  
		$categories_obj = get_categories('type=post&hierarchical=true&orderby=name&hide_empty=0');
		$categories_array = warrior_array_cat_list_id(0, $categories_obj, $categories_array, 0);
	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'warrior_recent_post_by_category_title' ); ?>"><?php esc_html_e('Widget Title:', 'newmagz'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'warrior_recent_post_by_category_title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'warrior_recent_post_by_category_title' ); ?>" value="<?php echo esc_attr( $instance['warrior_recent_post_by_category_title'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'warrior_recent_post_by_category_category' ); ?>"><?php esc_html_e('Category:', 'newmagz'); ?></label>
			<select id="<?php echo $this->get_field_id( 'warrior_recent_post_by_category_category' ); ?>" name="<?php echo $this->get_field_name( 'warrior_recent_post_by_category_category' ); ?>" class="widefat">
			<?php foreach ($categories_array as $id=>$category) { ?>
				<option value="<?php echo $id; ?>" <?php echo selected( $instance['warrior_recent_post_by_category_category'], $id, false ); ?>><?php echo $category; ?></option>
			<?php } ?>
			</select>
		</p>
        <p>
            <label for="<?php echo $this->get_field_id( 'warrior_recent_post_by_category_title_count' ); ?>"><?php esc_html_e('Post Title Limiter', 'newmagz'); ?></label>
            <input type="text" id="<?php echo $this->get_field_id( 'warrior_recent_post_by_category_title_count' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'warrior_recent_post_by_category_title_count' ); ?>" value="<?php echo absint( $instance['warrior_recent_post_by_category_title_count'] ); ?>" />
            <p><small><?php esc_html_e('The post title will be trim after reaching the number of characters defined, doesn\'t apply to first post.', 'newmagz'); ?></small></p>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'warrior_recent_post_by_category_count' ); ?>"><?php esc_html_e('Number of posts to show:', 'newmagz'); ?></label>
            <input type="text" id="<?php echo $this->get_field_id( 'warrior_recent_post_by_category_count' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'warrior_recent_post_by_category_count' ); ?>" value="<?php echo absint( $instance['warrior_recent_post_by_category_count'] ); ?>" />
        </p>
	<?php
	}
}
?>