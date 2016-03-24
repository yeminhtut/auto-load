<?php
/**
 * The template for displaying posts in the search results.
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
?>
<?php get_header(); ?>

<div id="maincontent">
    <div class="container clearfix">
        <div id="primary" class="content-area site-main" role="main">
            <section id="archive-page" class="post-list">
                <h2 class="archive-title"><?php echo warrior_archive_title(); ?></h2>
                <?php
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
                        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 40 .' ...' ); ?></a></h3>
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