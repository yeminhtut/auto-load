<?php 
/**
 * The template for displaying comments
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */

// Do not delete these lines
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ( esc_html_e( 'Please do not load this page directly. Thanks!', 'newmagz' ) );

	if ( !empty( $post->post_password ) ) { // if there's a password
		if ( $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) {  // and it doesn't match the cookie
?>
	<p class="nocomments"><?php esc_html_e( 'This post is password protected. Enter the password to view comments.', 'newmagz' ) ; ?></p>
<?php
		return;
		}
	}
?>

<?php if ( have_comments() ) : ?>

    <!-- START: COMMENT LIST -->
   <div class="article-widget post-comments">
		<div class="widget-title"><h4><?php comments_number( esc_html__( 'No Comments', 'newmagz' ), esc_html__( '1 Comment', 'newmagz' ), esc_html__( '% Comments', 'newmagz' ) ); ?></h4></div>
        <div class="comments-list">
            <?php wp_list_comments( 'callback=warrior_comment_list' ); ?>
        </div>
        
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="navigation clearfix">
				<span class="prev"><?php previous_comments_link( esc_html__( '&larr; Previous', 'newmagz' ), 0 ); ?></span>
				<span class="next"><?php next_comments_link( esc_html__( 'Next &rarr;', 'newmagz' ), 0 ); ?></span>
			</div>	
		<?php endif; ?>	
    </div>
    <!-- END: COMMENT LIST -->
    
<?php else : // or, if we don't have comments: ?>
<?php endif; // end have_comments() ?> 

	<!-- START: RESPOND -->
    <?php if ( comments_open() ) : ?>
        <div id="comment-form" class="post-comment-form widget">
            <div class="content-inner">
                <?php 
                    comment_form( array(
                        'title_reply'			=> '<span class="widget-title"><h4>'. esc_html__( 'Leave a Comment', 'newmagz' ) .'</h4></span>',
                        'comment_notes_before'	=> '',
                        'comment_notes_after'	=> '',
                        'label_submit'			=> esc_html__( 'Submit', 'newmagz' ),
                        'title_reply_to'        => esc_html__( 'Leave a Reply to %s', 'newmagz' ),
                        'cancel_reply_link'     => '<i class="typcn typcn-delete"></i>' . esc_html__( 'Cancel Reply', 'newmagz' ),
            			'logged_in_as'			=> '<p class="logged-user">' . sprintf( wp_kses( __( 'You are logged in as <a href="%1$s">%2$s</a> &#8212; <a href="%3$s">Logout &raquo;</a>', 'newmagz' ), array(  'a' => array( 'href' => array() ) ) ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
                        'fields'				=> array(
                            'author'				=>	'<div class="form-group col-60"><label><span>'.sprintf( esc_html__('Fullname', 'newmagz')).'</span><input type="text" name="author" id="fullname" class="input" value=""/></label></div>',
                            'email'					=>	'<div class="form-group col-60"><label><span>'.sprintf( esc_html__('Email', 'newmagz')).'</span><input type="text" name="email" id="email" class="input" value=""/></label></div>',
                            'url'					=>	'<div class="form-group col-60"><label><span>'.sprintf( esc_html__('Website Url', 'newmagz')).'</span><input type="text" name="url" id="weburl" class="input" value=""/></label></div>'
            									),
                        'comment_field'			=> '<div class="form-group col-100"><label><span>'.sprintf( esc_html__('Message', 'newmagz')).'</span><textarea name="comment" id="message" class="input textarea"></textarea></label></div>'
                    ));
                ?>
            </div>   
        </div>
	<?php endif; ?>
 	<!-- END: RESPOND -->