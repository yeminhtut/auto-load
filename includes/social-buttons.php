<?php
/**
 * Template to display social buttons
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */

global $newmagz_option;
?>

<?php if( $newmagz_option['display_social_buttons'] ) : ?>
<div class="social">
	<ul>
		<?php if( !empty( $newmagz_option['facebook'] ) ) : ?>
			<li><a href="<?php echo esc_url( $newmagz_option['facebook'] ); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
		<?php endif; ?>
		<?php if( !empty( $newmagz_option['twitter'] ) ) : ?>
			<li><a href="<?php echo esc_url( $newmagz_option['twitter'] ); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
		<?php endif; ?>
		<?php if( !empty( $newmagz_option['gplus'] ) ) : ?>
			<li><a href="<?php echo esc_url( $newmagz_option['gplus'] ); ?>" target="_blank"><i class="fa fa-google"></i></a></li>
		<?php endif; ?>
		<?php if( !empty( $newmagz_option['instagram'] ) ) : ?>
			<li><a href="<?php echo esc_url( $newmagz_option['instagram'] ); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
		<?php endif; ?>
		<?php if( !empty( $newmagz_option['linkedin'] ) ) : ?>
			<li><a href="<?php echo esc_url( $newmagz_option['linkedin'] ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
		<?php endif; ?>
		<?php if( !empty( $newmagz_option['pinterest'] ) ) : ?>
			<li><a href="<?php echo esc_url( $newmagz_option['pinterest'] ); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
		<?php endif; ?>
		<?php if( !empty( $newmagz_option['youtube'] ) ) : ?>
			<li><a href="<?php echo esc_url( $newmagz_option['youtube'] ); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
		<?php endif; ?>
		<?php if( !empty( $newmagz_option['vimeo'] ) ) : ?>
			<li><a href="<?php echo esc_url( $newmagz_option['vimeo'] ); ?>" target="_blank"><i class="fa fa-vimeo"></i></a></li>
		<?php endif; ?>
	</ul>
</div>
<?php endif; ?>