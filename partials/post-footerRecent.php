<div id="footer-widgets">
		<div class="container clearfix">
			<div class="row">
				<div class="column column-4">
					<div class="widget-title" id="widget-title-recent"><h4>Recent Posts</h4></div>
				</div>
			</div>
			<div class="row">
				<?php 
					// Get the items
						$args = array('post_type' => 'post','post_status' => 'publish','tag__not_in' => array(741),'posts_per_page' => absint(4));
						$recent_post = new WP_Query();
						$recent_post->query( $args );
						if ( $recent_post->have_posts() ) :
				?>
				<?php while( $recent_post->have_posts() ) : $recent_post->the_post();$do_not_duplicate[] = $post->ID; ?>
				<div class="column column-4">
					<div class="inner">
						<article class="hentry full-width-post post-2490 post type-post status-publish format-standard has-post-thumbnail category-economy tag-highway">
							<div class="thumbnail">
								<?php
									// Featured image
									if ( has_post_thumbnail() ) {
										echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
										the_post_thumbnail('newmagz-medium-thumbnail-1');
										echo '</a>';
									} else {
										echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
										echo '<img src="http://placehold.it/307x175&text=&nbsp;" />';
										echo '</a>';
									}
								?>	
							</div>	
							<div class="entry-content">
								<div class="post-category">
									<?php
										$category = get_the_category( get_the_ID() );
										$category_name =  $category[0]->cat_name;
										$category_id = get_cat_ID( $category_name );
										$category_link = get_category_link( $category_id );
										echo '<a href="'.esc_url( $category_link ).'">'.$category_name.'</a>';
									?>
								</div>		
								<h3 class="post-title" style="font-size:16px;margin-bottom:0px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<div class="entry-meta">
									<?php 
										echo '<span class="author"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author().'</a></span>';
										echo '<span class="date"><i class="fa fa-calendar-minus-o"></i>'.date_i18n( 'M j, Y', strtotime( get_the_date('Y-m-d'), false ) ).'</span>';
									?>
								</div>				
							</div>
						</article>
					</div>					
				</div>
				<?php 
					endwhile;endif;
				 ?>
			</div>
			<div class="row" id="recent-mini-row">
					<?php 
					// Get the items
						$args = array('post_type' => 'post','post_status' => 'publish','tag__not_in' => array(741),'posts_per_page' => absint(8),'post__not_in' => $do_not_duplicate);
						$recent_post = new WP_Query();
						$recent_post->query( $args );
						if ( $recent_post->have_posts() ) :
				?>
				<?php while( $recent_post->have_posts() ) : $recent_post->the_post();$do_not_duplicate[] = $post->ID; ?>
					<div class="column column-4">
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
									<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								</li>
							</ul>
						</div>
					</div>	
				<?php 
					endwhile;endif;
				 ?>			
			</div>			
		</div>
</div>