<?php
/**
 * Widgets list category
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
 
// Widgets
add_action( 'widgets_init', 'warrior_category_widget' );

// Register our widget
function warrior_category_widget() {
	register_widget( 'Warrior_Category_List' );
}

// Warrior Latest Video Widget
class Warrior_Category_List extends WP_Widget {

	//  Setting up the widget
	function Warrior_Category_List() {
		$widget_ops  = array( 'classname' => 'warrior_category_list', 'description' => esc_html__( 'Display custom category list', 'newmagz' ) );
		$control_ops = array( 'id_base' => 'warrior_category_list' );

		parent::__construct( 'warrior_category_list', esc_html__( 'Warrior Category List', 'newmagz' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		$warrior_category_list_title = apply_filters( 'widget_title', empty( $instance['warrior_category_list_title'] ) ? esc_html__( 'Categories', 'newmagz' ) : $instance['warrior_category_list_title'], $instance, $this->id_base );
		
		echo $before_widget;

		echo '<div class="category-widget">';
			echo $before_title . esc_attr( $warrior_category_list_title ) . $after_title;
			echo '<div class="categories">';
				echo '<ul>';
					$taxonomy = 'category';
					$a = 1;
					$tax_terms = get_categories();
					foreach ( $tax_terms as $tax_term ) {
						echo '<li>';
							echo '<div class="number">'. $a++ .'</div>';
							echo '<div class="summary">';
								echo '<a href="' . esc_url( get_term_link( $tax_term, $taxonomy ) ) . '" title="' . sprintf( esc_html__( "View all posts in %s", "newmagz" ), $tax_term->name ) . '" ' . '>' . $tax_term->name.'<small>'.$tax_term->category_count . esc_html__( ' Articles', 'newmagz' ) .'</small></a>';
							echo '</div>';
						echo '</li>';
					}
				echo '</ul>';
			echo '</div>';
		echo '</div>';

		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['warrior_category_list_title'] = strip_tags( $new_instance['warrior_category_list_title'] );

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'warrior_category_list_title' => esc_html__( 'Categories', 'newmagz' ) ) );
	?>
        <p>
            <label for="<?php echo $this->get_field_id( 'warrior_category_list_title' ); ?>"><?php esc_html_e('Widget Title:', 'newmagz'); ?></label>
            <input type="text" id="<?php echo $this->get_field_id( 'warrior_category_list_title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'warrior_category_list_title' ); ?>" value="<?php echo esc_attr( $instance['warrior_category_list_title'] ); ?>" />
        </p>
	<?php
	}
}
?>