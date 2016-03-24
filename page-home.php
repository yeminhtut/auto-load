<?php
/**
 * Template Name: Homepage
 * 
 * Template for displaying homepage widget area.
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
?>
<?php get_header(); ?>

<!-- Start : Main Content -->
<div id="maincontent">
    <div class="container clearfix">
        <div id="primary" class="content-area site-main" role="main">
        <?php get_template_part('partials/post', 'listTab'); ?>
        <?php get_template_part('partials/post', 'list2'); ?>   
        <?php get_template_part('partials/post', 'list3'); ?>         
        </div>      
        <?php get_sidebar('postlisting'); ?>
    </div>
</div>
<!-- End : Main Content -->
<?php get_template_part('partials/post', 'footerRecent'); ?>    
<?php get_footer(); ?>