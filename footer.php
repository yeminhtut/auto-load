<?php global $newmagz_option; ?>

<!-- Start : Footer Section -->
<footer id="colofone" class="footer">

<div id="footer-menu-section">
	<div class="container clearfix">
		<?php 
        $check_mobile = detect_mobile();        
        switch ($check_mobile) {
            case 'true':
                get_template_part('partials/footer/footer', 'mobile');  
                break;          
            default:
                get_template_part('partials/footer/footer', 'web'); 
                break;
        }       
        ?>
	</div>
</div>

<?php if ( is_active_sidebar('warrior-footer') ) { ?>
	<div id="footer-bottom">
		<div class="container clearfix">
			<div class="footer-widgets">
				<div class="row">
				<?php 
				// Footer Widgets
				dynamic_sidebar( 'warrior-footer' );
				?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<?php
    if( esc_attr( $newmagz_option['display_back_to_top'] ) ) { echo '<a id="scroll-top" href="#top"><span class="fa fa-angle-up"></span></a>'; }  // display back to top section
?>
</footer>
<!-- End : Footer Section -->
<?php wp_footer(); ?>
<div id="magazine_modal"></div>
<!-- <script type='text/javascript' src='/wp-includes/js/jquery/ui/core.min.js?ver=1.11.4'></script> -->
<script   src="https://code.jquery.com/jquery-1.12.2.min.js"   integrity="sha256-lZFHibXzMHo3GGeehn1hudTAP3Sc0uKXBXAzHX1sjtk="   crossorigin="anonymous"></script>
<!-- <script type='text/javascript' async src='/wp-includes/js/jquery/ui/widget.min.js'></script> 
<script type='text/javascript' async src='/wp-includes/js/jquery/ui/tabs.min.js'></script>
<script type='text/javascript' async src='<?= get_template_directory_uri()?>/js/plugin.js'></script>
<script type='text/javascript' async src='<?= get_template_directory_uri()?>/js/functions.js'></script>
<script type='text/javascript' async src='<?= get_template_directory_uri()?>/js/functions.js'></script>
<script type='text/javascript' async src='<?= get_template_directory_uri()?>/js/custom.js'></script>
<script type='text/javascript' async src='<?= get_template_directory_uri()?>/js/custom_background.js'></script>
<script src="<?php// bloginfo('template_directory'); ?>/js/map_multiple_marker.js"></script>-->
<script type='text/javascript' async src='<?= get_template_directory_uri()?>/js/scrollspy.js'></script>
<script type='text/javascript' async src='<?= get_template_directory_uri()?>/js/jquery.history.js'></script>
<script type='text/javascript' async src='<?= get_template_directory_uri()?>/js/autoload.js'></script>
<!--css-->
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato%3A100%2C300%2C400%2C700%2C900%2C100italic%2C300italic%2C400italic%2C700italic%2C900italic%7CRoboto%3A700%7CMerriweather%3A300%2C400%2C700%2C900%2C300italic%2C400italic%2C700italic%2C900italic&ver=1449733203">
<link href='https://fonts.googleapis.com/css?family=Playfair+Display:700italic' rel='stylesheet' type='text/css'>
<!-- <link rel="stylesheet" type="text/css" href="/web/landing_fonts/stylesheet01.css"> -->
<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()?>/style.css">
<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()?>/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()?>/css/cssminified.css">
</body>
</html>










