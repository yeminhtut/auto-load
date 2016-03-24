<?php
/**
 * Function to load comment list
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */

if ( ! function_exists( 'warrior_comment_list' ) ) {
	function warrior_comment_list($comment, $args, $depth) {
		global $post;
		$author_post_id 	= $post->post_author;
		$GLOBALS['comment'] = $comment;

		// Allowed html tags will be display
		$allowed_html = array(
			'a' 			=> array( 'href' => array(), 'title' => array() ),
			'abbr' 			=> array( 'title' => array() ),
			'acronym' 		=> array( 'title' => array() ),
			'strong' 		=> array(),
			'b' 			=> array(),
			'blockquote' 	=> array( 'cite' => array() ),
			'cite' 			=> array(),
			'code' 			=> array(),
			'del' 			=> array( 'datetime' => array() ),
			'em' 			=> array(),
			'i' 			=> array(),
			'q' 			=> array( 'cite' => array() ),
			'strike' 		=> array(),
			'ul' 			=> array(),
			'ol' 			=> array(),
			'li' 			=> array()
		);
		
		switch ( $comment->comment_type ) :
			case '' :
	?>
	<ul>
		<li id="comment-<?php comment_ID() ?>" <?php comment_class(); ?>>
			<div class="thumbnail">
				<?php echo get_avatar( $comment, 80 ); ?>
			</div>
			<div class="detail">
				<div class="entry-meta">
					<span><?php comment_date('j M, Y'); echo ',  '; comment_time(); ?></span>	<span class="edit-link"><i class="fa fa-edit"></i><?php edit_comment_link(esc_html__(' Edit Comment', 'newmagz'), '', ''); ?></span>
				</div>	
				<h5><?php comment_author_link(); ?></h5>
				<?php if ($comment->comment_approved == '0') : ?>
					<p class="moderate"><?php esc_html_e('Your comment is now awaiting moderation before it will appear on this post.', 'newmagz');?></p>
				<?php endif; ?>
				<?php echo apply_filters('comment_text', wp_kses( get_comment_text(), $allowed_html ) );  ?>
				
				<div class="reply">
					<?php echo comment_reply_link(array('reply_text' => '<i class="fa fa-mail-forward"></i> '. esc_html__('Reply', 'newmagz'), 'depth' => $depth, 'max_depth' => $args['max_depth'] ));  ?>			
				</div><!-- .reply -->
			</div>
		</li>
	</ul>	

	<?php
			break;
			case 'pingback'  :
			case 'trackback' :
	?>
			<li id="comment-<?php comment_ID() ?>" <?php comment_class(); ?>>
				<div class="thumbnail">
					<?php echo get_avatar( $comment, 80 ); ?>
				</div>
				<div class="detail">
					<div class="entry-meta">
						<span><?php comment_date('j M, Y'); echo ',  '; comment_time(); ?></span>	<span class="edit-link"><?php edit_comment_link(wp_kses('<i class="fa fa-edit"></i> Edit Comment', 'newmagz'), '', ''); ?></span>
					</div>	
					<h5><?php comment_author_link(); ?></h5>
					<?php if ($comment->comment_approved == '0') : ?>
						<p class="moderate"><?php esc_html_e('Your comment is now awaiting moderation before it will appear on this post.', 'newmagz');?></p>
					<?php endif; ?>
					<?php echo apply_filters('comment_text', wp_kses( get_comment_text(), $allowed_html ) );  ?>
					
					<div class="reply">
						<?php echo comment_reply_link(array('reply_text' => '<i class="fa fa-mail-forward"></i> '. esc_html__('Reply', 'newmagz'), 'depth' => $depth, 'max_depth' => $args['max_depth'] ));  ?>			
					</div><!-- .reply -->
				</div>
			</li>
	<?php
			break;
		endswitch;
	}
}

if ( ! function_exists( 'warrior_comment_form_top' ) ) {
	function warrior_comment_form_top() {
?>
	<div class="article-widget comment-form">
		<div class="form">
<?php
	}
	add_action( 'comment_form_top', 'warrior_comment_form_top' );

	function warrior_comment_form_bottom() {
?>
		</div>
	</div>
<?php
	}
}
add_action( 'comment_form', 'warrior_comment_form_bottom', 1 );

/**
 * Add class on posts prev & next
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
if ( ! function_exists( 'warrior_next_posts_link_class' ) ) {
	function warrior_next_posts_link_class() {
	    return 'class="next"';
	}
}
add_filter('next_posts_link_attributes', 'warrior_next_posts_link_class');

if ( ! function_exists( 'warrior_previous_posts_link_class' ) ) {
	function warrior_previous_posts_link_class() {
	    return 'class="prev"';
	}
}
add_filter('previous_posts_link_attributes', 'warrior_previous_posts_link_class');


/**
 * Add google analytics code
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
if ( ! function_exists( 'warrior_add_analytics' ) ) {
	function warrior_add_analytics() {
		global $newmagz_option;

		if ( isset($newmagz_option['tracking_code']) ) {
			echo $newmagz_option['tracking_code'];
		}
	}
}
add_action( 'wp_enqueue_scripts', 'warrior_add_analytics', 99 );


/**
 * Function to get the first link from a post. Based on the codes from WP Recipes 
 * http://www.wprecipes.com/wordpress-tip-how-to-get-the-first-link-in-post
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
if ( ! function_exists( 'warrior_get_link_url' ) ) {
	function warrior_get_link_url() {
	    $content = get_the_content();
	    $has_url = get_url_in_content( $content );

	    return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
	}
}

/**
 * Assign global variables
 * function warrior_array_cat_list_id, return array of hierarchical categories,
 * with category id is the array key and category name as array value
 * this returned array will use on theme options of dropdown select or multiple select elements
 * with category id as element value
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
if ( ! function_exists( 'warrior_array_cat_list_id' ) ) {
	function warrior_array_cat_list_id($parent, $obj, $arr, $lvl) {
		$lvl++;
		foreach ( $obj as $cat ) {
			if ( $cat->parent==$parent ) {
				$arr[$cat->cat_ID] = str_pad('',($lvl - 1) ,'-').' '.$cat->cat_name;
				$arr = warrior_array_cat_list_id($cat->cat_ID, $obj, $arr, $lvl);
			}
		}
		return $arr;
	}
}

/**
 * Function to collect the title of the current page
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
if ( ! function_exists( 'warrior_archive_title' ) ) {
	function warrior_archive_title() {
		global $wp_query;

		$title = '';
		if ( is_category() ) :
			$title = sprintf( esc_html__( 'Category Archives: %s', 'newmagz' ), single_cat_title( '', false ) );
		elseif ( is_tag() ) :
			$title = sprintf( esc_html__( 'Tag Archives: %s', 'newmagz' ), single_tag_title( '', false ) );
		elseif ( is_tax() ) :
			$title = sprintf( esc_html__( '%s Archives', 'newmagz' ), get_post_format_string( get_post_format() ) );
		elseif ( is_day() ) :
			$title = sprintf( esc_html__( 'Daily Archives: %s', 'newmagz' ), get_the_date() );
		elseif ( is_month() ) :
			$title = sprintf( esc_html__( 'Monthly Archives: %s', 'newmagz' ), get_the_date( 'F Y' ) );
		elseif ( is_year() ) :
			$title = sprintf( esc_html__( 'Yearly Archives: %s', 'newmagz' ), get_the_date( 'Y' ) );
		elseif ( is_author() ) :
			$author = get_user_by( 'slug', get_query_var( 'author_name' ) );
			$title = sprintf( esc_html__( 'Author Archives: %s', 'newmagz' ), get_the_author_meta( 'display_name', $author->ID ) );
		elseif ( is_search() ) :
			if ( $wp_query->found_posts ) {
				$title = sprintf( esc_html__( 'Search Results for: %s', 'newmagz' ), esc_attr( get_search_query() ) );
			} else {
				$title = sprintf( esc_html__( 'No Results for: %s', 'newmagz' ), esc_attr( get_search_query() ) );
			}
		elseif ( is_404() ) :
			$title = esc_html__( '404 Not Found Page', 'newmagz' );
		else :
			$title = esc_html__( 'Blog', 'newmagz' );
		endif;
		
		return $title;
	}
}

/**
 * Function to display post meta
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
if( ! function_exists( 'warrior_post_meta' ) ) {
	function warrior_post_meta() {
		global $newmagz_option;
		$warrior_set_content = "";
	
		$warrior_set_content = '<div class="entry-meta" style="margin-bottom:15px !important;">';
			if ( is_single() ) {
				$warrior_set_content .= '<span class="author">'.get_avatar( get_the_author_meta( 'ID' ), 25 ).'<a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author().'</a></span><span class="date"><i class="fa fa-calendar-minus-o"></i>'.date_i18n( 'M j, Y', strtotime( get_the_date('Y-m-d'), false ) ).'</span>';
				if (has_tag( 'sponsored', $post )) {
					$warrior_set_content .= '<span style="float:right">Sponsored</span>';
				}
			} else {	
				$warrior_set_content .= '<span class="author"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author().'</a></span><span class="date"><i class="fa fa-calendar-minus-o"></i>'.date_i18n( 'M j, Y', strtotime( get_the_date('Y-m-d'), false ) ).'</span>';
			}
		$warrior_set_content .= '</div>';

		return $warrior_set_content;
	}
}

/**
 * Function to display post meta
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
if( ! function_exists( 'warrior_featured_post_meta' ) ) {
	function warrior_featured_post_meta() {
		global $newmagz_option;
		$warrior_set_content = "";
	
		$warrior_set_content = '<div class="entry-meta">';	
			$warrior_set_content .= '<span class="author"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author().'</a></span><span class="date"><i class="fa fa-calendar-minus-o"></i>'.date_i18n( 'M jS, Y', strtotime( get_the_date('Y-m-d'), false ) ).'</span>';
		$warrior_set_content .= '</div>';

		return $warrior_set_content;
	}
}

/**
 * Function to get post views
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
if ( ! function_exists( 'warrior_get_post_views' ) ) {
	function warrior_get_post_views($postID){
		$warrior_count_key = 'post_views_count';
	    $warrior_get_count = get_post_meta( $postID, $warrior_count_key, true );
	    $text_views = esc_html__(' Views', 'newmagz');
	    $text_view 	= esc_html__(' View', 'newmagz');
	    if($warrior_get_count==''){
	        delete_post_meta($postID, $warrior_count_key);
	        add_post_meta($postID, $warrior_count_key, '0');
	        return "0".$text_view;
	    }
	    return $warrior_get_count.$text_views;
	}
}

if ( ! function_exists( 'warrior_set_post_views' ) ) {
	function warrior_set_post_views($postID) {
	    $warrior_count_key = 'post_views_count';
	    $warrior_get_count = get_post_meta($postID, $warrior_count_key, true);
	    if($warrior_get_count==''){
	        $warrior_get_count = 0;
	        delete_post_meta($postID, $warrior_count_key);
	        add_post_meta($postID, $warrior_count_key, '0');
	    }else{
	        $warrior_get_count++;
	        update_post_meta($postID, $warrior_count_key, $warrior_get_count);
	    }
	}
}

/**
 * Function to display post meta in post detail page
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
if ( ! function_exists( 'warrior_post_detail_meta' ) ) {
	function warrior_post_detail_meta() {
		global $newmagz_option;
?>
	<div class="meta">
		<?php if ( $newmagz_option['display_date'] ) : ?>
			<span class="date">
				<i class="fa fa-calendar"></i>
				<?php if ( $newmagz_option['display_time_ago'] ) : ?>
					<?php printf( esc_html__('%s ago', 'newmagz'), human_time_diff( get_the_time('U'), current_time('timestamp') ) ); ?>
				<?php else: ?>
					<?php echo get_the_date(); ?>
				<?php endif; ?>
			</span>
		<?php endif; ?>
		
		<?php if ( $newmagz_option['display_author'] ) : ?>
			<span class="author"><i class="fa fa-user"></i> <?php the_author_posts_link(); ?></span>
		<?php endif; ?>
		
		<?php if ( $newmagz_option['display_category'] ) : ?>
			<span class="category"><i class="fa fa-folder-open"></i> <?php the_category(', '); ?></span>
		<?php endif; ?>

		<?php if ( $newmagz_option['display_comment'] ) : ?>
			<?php if ( comments_open() ) : // check to see if comment is closed or not ?>
			<span class="comments"><i class="fa fa-comment"></i> <?php comments_popup_link( esc_html__( '0', 'newmagz' ), esc_html__( '1', 'newmagz' ), esc_html__( '%', 'newmagz' ) ); ?></span>
			<?php endif; ?>
		<?php endif; ?>
	</div>
<?php
	}
}

/**
 * Facebook Open Graph Generator
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.1.1
 */
if( ! function_exists('warrior_open_graph') ) {
	function warrior_open_graph() {
		global $post;
	    echo '<meta property="og:title" content="' . esc_attr( get_the_title() ) . '" />';
	    echo '<meta property="og:site_name" content="' . esc_html( get_bloginfo('name') ) . '" />';
        echo '<meta property="og:type" content="article" />';
        echo '<meta property="og:url" content="' . esc_url( get_permalink() ) . '" />';
        echo '<meta property="og:description" content="' . esc_attr( strip_tags( wp_trim_words( $post->post_content, 65, '' ) ) ) . '" />';
		
		if (has_post_thumbnail( get_the_ID() )) { // use featured image if there is one
	        $feat_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
	        echo '<meta property="og:image" content="' . esc_attr( $feat_image[0] ) . '" />';
		} else {
	        echo '<meta property="og:image" content="http://placehold.it/500x400&amp;text='. esc_html__('No Thumbnail', 'newmagz') .'" />';
		}
	}
}

/**
 * Trims a string of words to a specified number of characters, gracefully stopping at white spaces.
 * Also strips HTML tags, to prevent breaking in the middle of a tag.
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 *
 * @param	string $text  The string of words to be trimmed.
 * @param	int $length  Maximum number of characters; defaults to 45.
 * @param	string $append  String to append to end, when trimmed; defaults to ellipsis.
 *
 * @return	String of words trimmed at specified character length.
 *
 * @author c.bavota
 */
if( ! function_exists('warrior_trim_characters') ) {
	function warrior_trim_characters( $text, $length = 45, $append = '&hellip;' ) {

		$length = (int) $length;
		$text = trim( strip_tags( $text ) );

		if ( strlen( $text ) > $length ) {
			$text = substr( $text, 0, $length + 1 );
			$words = preg_split( "/[\s]|&nbsp;/", $text, -1, PREG_SPLIT_NO_EMPTY );
			preg_match( "/[\s]|&nbsp;/", $text, $lastchar, 0, $length );
			if ( empty( $lastchar ) )
				array_pop( $words );

			$text = implode( ' ', $words ) . $append;
		}

		return $text;
	}
}

/**
 * Change default excerpt more text
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.1.0
 */
if( !function_exists( 'warrior_excerpt_more ') ) {
	function warrior_excerpt_more( ) {
		return '...';
	}
}
add_filter( 'excerpt_more', 'warrior_excerpt_more', 999 );

/**
 * Warrior gallery slider function
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
if ( ! function_exists( 'warrior_gallery' ) ) {
	function warrior_gallery( $content, $attr ) {
		// Call WordPress thickbox library
		add_thickbox();

		if ( (get_post_format() == 'gallery') || (is_singular('post')) ) {
			$post = get_post();
			static $instance = 0;
			$instance++;
			
			if ( isset( $attr['orderby'] ) ) :
				$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
				if ( !$attr['orderby'] )
					unset( $attr['orderby'] );
			endif;

			extract(shortcode_atts(array(
				'order'      => 'ASC',
				'orderby'    => 'menu_order ID',
				'id'         => $post ? $post->ID : 0,
				'size'       => 'small-thumb-1',
				'include'    => '',
				'exclude'    => ''
			), $attr));

			$id = intval($id);
			if ( 'RAND' == $order )
				$orderby = 'none';

			if ( !empty($include) ) {
				$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

				$attachments = array();
				foreach ( $_attachments as $key => $val ) {
					$attachments[$val->ID] = $_attachments[$key];
				}
			} elseif ( !empty($exclude) ) {
				$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
			} else {
				$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
			}

			$size = 'small-thumb-1';

			if ( empty($attachments) )
				return '';

			if ( is_feed() ) {
				$output = "\n";
				foreach ( $attachments as $att_id => $attachment )
					$output .= wp_get_attachment_image( $att_id, $size ) . "\n";
				return $output;
			}

			$output = "<div id='gallery-{$instance}' class='warrior-gallery galleryid-{$id}'>";

			$i = 0;
			foreach ( $attachments as $id => $attachment ) {
				if ( ! empty( $attr['link'] ) && 'file' === $attr['link'] )
					$image_output = wp_get_attachment_link( $id, $size );
				elseif ( ! empty( $attr['link'] ) && 'none' === $attr['link'] )
					$image_output = wp_get_attachment_link( $id, $size );
				else
					$image_output = wp_get_attachment_link( $id, $size );

				$image_meta  = wp_get_attachment_metadata( $id );

				$output .= "\n";
				$output .= "$image_output";
				$output .= "\n";
			}
			$output .= "</div>";

			return $output;
		}
	}
}
add_filter( 'post_gallery', 'warrior_gallery', 10, 2 );
?>