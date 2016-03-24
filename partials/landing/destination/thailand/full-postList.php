<div id="landing-inspiration">
    <div class="container clearfix"> 
    <h3 class="landing-section-title">In the spotlight</h3>       
        <div class="row">
			<?php
			    $articlesIDs = '24243,22256,27032,22127';
			    $result = explode(',', $articlesIDs);
			    foreach ($result as $k => $v) {
			    $postId = $result[$k];  
			    $post = get_post($postId);  
			    setup_postdata( $post );
			?>
			<div class="column column-4">
				<div class="postlistbox">
					<a href="<?php echo get_permalink($postId) ?>" title="<?php the_title(); ?>">
						<div class="item-thumbnail">
							<?php
					// Featured image
					if ( has_post_thumbnail() ) {
						echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
						the_post_thumbnail('newmagz-featured-slider');
						echo '</a>';
					} else {
						echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
						echo '<img src="http://placehold.it/297x379/333333/ffffff&amp;text=&nbsp;">';
						echo '</a>';
					}
					?>
						</div>
						<div class="entry-content">
							<div class="post-category">
								<?php // get categories
									$category = get_the_category(); 
									if($category[0]){
										if ($category[0]->cat_name == 'Popular') {
											echo '<a href="'.get_category_link($category[1]->term_id ).'">'.esc_attr( $category[1]->cat_name ).'</a>';
										}
										else{
											echo '<a href="'.get_category_link($category[0]->term_id ).'">'.esc_attr( $category[0]->cat_name ).'</a>';
										}							
									}
								?>
							</div>
							<h3 class="post-title">
								<a href="<?php echo get_permalink($postId)?>" title="<?php the_title(); ?>">
									<?php the_title(); ?>
								</a>
							</h3>
						</div>						
					</a>				
				</div>
			</div>
			<?php wp_reset_postdata(); ?>
			<?php }?>
       	</div>  
    </div>
</div>