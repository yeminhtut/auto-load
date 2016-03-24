<?php
/**
 * Ad 300x250 widget
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
 
// Widgets
add_action( 'widgets_init', 'warrior_sidebar_300_250_widget' );

// Register our widget
function warrior_sidebar_300_250_widget() {
	register_widget( 'Warrior_Sidebar_300_250' );
}

// Warrior Latest Posts Widget
class Warrior_Sidebar_300_250 extends WP_Widget {

	//  Setting up the widget
	function Warrior_Sidebar_300_250() {
		$widget_ops  = array( 'classname' => 'side-ads', 'description' => esc_html__('Warrior Sidebar 300x250 Ad Widget', 'newmagz') );
		$control_ops = array( 'id_base' => 'warrior_sidebar_300_250' );

		parent::__construct( 'warrior_sidebar_300_250', esc_html__('Warrior Sidebar 300x250 Ad', 'newmagz'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		global $newmagz_option;
		
		extract( $args );
		
		$ad_300_mode = $newmagz_option['ad_300x250_mode'];
		$ad_300_banner = $newmagz_option['ad_300x250_img'];

		$ad_300 = '';

		if( isset($ad_300_banner['width']) || isset($ad_300_banner['height']) ) {
			$ad_300_banner['width'] = $ad_300_banner['width'];
			$ad_300_banner['height'] = $ad_300_banner['height'];
		} else {
			$ad_300_banner['width'] = '300';
			$ad_300_banner['height'] = '250';
		}

		if ( $ad_300_mode == 1 ) :
			if ( is_array($ad_300_banner) && $ad_300_banner['url'] ) :
				$ad_300 = '<a href="' . esc_url( $newmagz_option['ad_300x250_url'] ? $newmagz_option['ad_300x250_url'] : '#' ) . '" target="_blank"><img src="' . esc_url( $ad_300_banner['url'] ) . '" width="'. absint( $ad_300_banner['width'] ).'" height="'. absint( $ad_300_banner['height'] ) .'" alt=""/></a>';
			endif;
		else :
			$ad_300 = esc_attr( $newmagz_option['ad_300x250_code'] );
		endif;

		if ( $ad_300 ) :
		echo $before_widget;
?>
		<div class="ad-300x250">
			<?php echo $ad_300; ?>
		</div>
<?php
		echo $after_widget;
		endif;
	}

	function update( $new_instance, $old_instance ) {
	}

	function form( $instance ) {
	?>
        <p><?php printf( wp_kses( __( 'You need to upload the banner images from <a href="%s">Theme Options</a> Advertisement tab.', 'newmagz' ), array(  'a' => array( 'href' => array() ) ) ), get_admin_url().'admin.php?page=warriorpanel' ); ?></small></p>
	<?php
	}
}
?>