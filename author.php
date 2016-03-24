<?php
/**
 * The template for displaying Author pages
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
?>
<?php get_header(); ?>

<?php
    // Get current author
    $current_author = ( get_query_var( 'author_name' ) ) ? get_user_by( 'slug', get_query_var( 'author_name' ) ) : get_userdata( get_query_var( 'author' ) );
?>
<div id="maincontent">
    <div class="container clearfix">
        <div id="primary" class="content-area site-main" role="main">
            <div id="about-author" class="author-box">
                <div class="author-wrapper">
                    <div class="thumbnail">
                        <?php echo get_avatar( absint( $post->post_author ), '130' ); // get avatar ?>
                    </div>
                    <div class="detail">
                        <h5><?php the_author(); ?></h5>
                        <?php //echo wpautop( wp_trim_words( get_the_author_meta('description', absint( $post->post_author )), 100, '...') ); ?>
                        <?php echo wpautop( get_the_author_meta('description', absint( $post->post_author )) ); ?>
                        <br/>
                    </div>
                </div>
            </div>

            <section id="archive-page" class="post-list">

            <div class="widget-title"><h4><?php echo sprintf( esc_html__('All Posts from %s', 'newmagz'), esc_attr( $current_author->display_name ) ); ?></h4></div>

            <?php // the loop
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
            ?>
            <article <?php post_class('hentry full-width-post left-thumbnail') ?>>
                <div class="thumbnail">
                <?php
                // Featured image
                if ( has_post_thumbnail() ) {
                    echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
                    the_post_thumbnail('newmagz-large-thumbnail-2');
                    echo '</a>';
                } else {
                    echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
                    echo '<img src="http://placehold.it/393x230&text=&nbsp;" />';
                    echo '</a>';
                }
                ?>
                </div>  
                <div class="entry-content">
                    <div class="post-category"><?php the_category(', '); ?></div>   
                    <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 60 .' ...' ); ?></a></h3>
                    <?php warrior_post_meta(); // display post meta ?>
                    <div class="excerpt">
                        <p><?php echo wp_trim_words( get_the_excerpt(), 32, '...' ); ?></p>
                    </div>
                </div>
            </article>
            <?php
            endwhile;
            get_template_part( 'includes/pagination' ); // display pagination section
            else :
                esc_html_e('The page you\'re looking for is not available. The page may have been deleted or unpublished.', 'newmagz');
            endif;
            ?>  
            </section>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>