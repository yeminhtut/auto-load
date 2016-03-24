<?php
/**
 * Template Name: Contact Us
 */
?>
<?php get_header(); ?>
<style type="text/css">	
	#enquiry_tab{margin:0px;}
	#enquiry_tab li{list-style-type: none;display: inline-block;width: 25%;}	
	#enquiry_tab li:hover{cursor: pointer;}
	#form-panel{margin-top:20px;}
	.tab_content{display: none;}
	.tab-nav{padding-right:10px;display: block;text-align: center;}
	.box-inner{border: 1px solid #dcdcdc;padding: 10px;min-height: 138px;padding-bottom: 0px;}
	.box-inner h3{margin-bottom: 10px;font-size: 16px;text-align: center;}
	.tab-nav .box-inner:hover{cursor: pointer;box-shadow: 1px 10px 10px #DDD;}
</style>
<div id="maincontent">
	<div id="contact" class="container clearfix" style="margin-bottom:40px;">
		<div class="row">
			<div class="column column-4 tab-nav">
				<div class="box-inner">
					<a href="/advertise" target="_blank">
						<h3>ADVERTISE ON TRIPZILLA</h3>
						<p>Advertise on our platform and reach out to our 1.3 million monthly visitors.</p>
					</a>
				</div>				
			</div>
			<div class="column column-4 tab-nav" data-id="editor_enquiry">
				<div class="box-inner">					
					<h3>EDITORIAL ENQUIRIES</h3>
					<p>Contribute your travel stories or contact the editorial staff for content enquiries.</p>
				</div>
			</div>
			<div class="column column-4 tab-nav" data-id="gn_enquiry">
				<div class="box-inner">
					<h3>GENERAL ENQUIRIES</h3>
					<p>Contact us with any general enquiries about the website.</p>
				</div>				
			</div>	
			<div class="column column-4 tab-nav" data-id="pr_enquiry">
				<div class="box-inner">					
					<h3>PRESS AND MEDIA INVITES</h3>
					<p>Send us media invites and press releases.</p>
				</div>
			</div>		
		</div>
		<div class="row">
			<div id="form-panel">
				<div id='gn_enquiry' class="tab_content">				
			   	<?php echo do_shortcode('[general_enquiry_form]'); ?>
				</div>
				<div id='editor_enquiry' class="tab_content">			   
				   <?php echo do_shortcode('[editorial_enquiry_form]'); ?>
				</div>
				<div id='pr_enquiry' class="tab_content">			   
				   <?php echo do_shortcode('[pr_enquiry_form]'); ?>
				</div>
			</div>
		</div>
		
	</div>
</div>
<?php get_footer(); ?>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('.tab-nav').click(function(){
			var tab_id = $(this).attr("data-id");
			if ($('#'+tab_id).hasClass('active')) {
				$('#'+tab_id).hide();
				$('.tab_content').removeClass('active');
				$('html,body').animate({
		        	scrollTop: $('#'+tab_id).offset().top},
		        'slow');
			}
			else{				
				$('.tab_content').removeClass('active');
				$('#'+tab_id).addClass('active');
				$('.tab_content').hide();
				$('#'+tab_id).show();
				$('html,body').animate({
		        	scrollTop: $('#'+tab_id).offset().top},
		        'slow');
			}
		});
	});
</script>
