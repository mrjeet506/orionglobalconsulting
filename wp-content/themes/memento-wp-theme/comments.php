<?php
/**
 * The template for displaying comments
 *
 * @package Memento
 */

if ( post_password_required() ) {
	return;
}
?>

<style>
    .comments-area { color: #1f2937; }
    .comments-title { font-family: var(--font-serif); font-size: 1.8rem; color: var(--color-brand-darker); margin-bottom: 2rem; border-bottom: 2px solid #f3f4f6; padding-bottom: 1rem; }
    
    .comment-list { list-style: none; padding: 0; margin: 0; }
    .comment-list > li { margin-bottom: 2rem; }
    .comment-list .children { margin-left: 2rem; margin-top: 2rem; padding-left: 1rem; border-left: 2px solid #e5e7eb; list-style: none; }
    
    .comment-body { background-color: #f9fafb; padding: 2rem; border-radius: 12px; position: relative; border: 1px solid #f3f4f6; }
    
    .comment-meta { margin-bottom: 1rem; display: flex; align-items: center; gap: 1rem; }
    .comment-author { display: flex; align-items: center; gap: 1rem; }
    .comment-author .avatar { border-radius: 50%; width: 45px; height: 45px; object-fit: cover; }
    .comment-author .fn { font-weight: 700; color: var(--color-brand-darker); font-size: 1.1rem; font-style: normal; }
    .comment-author .fn a { color: inherit; text-decoration: none; }
    .comment-author .says { display: none; } /* Hide "says:" */
    
    .comment-metadata { display: flex; flex-direction: column; justify-content: center; }
    .comment-metadata a { color: #9ca3af; font-size: 0.85rem; text-decoration: none; font-weight: 500; }
    
    .comment-content p { margin-bottom: 1rem; font-size: 1.05rem; line-height: 1.6; color: #374151; }
    
    .reply { margin-top: 1rem; }
    .reply .comment-reply-link { display: inline-block; font-size: 0.85rem; font-weight: 600; color: #2563eb; text-decoration: none; text-transform: uppercase; letter-spacing: 1px; }
    .reply .comment-reply-link:hover { color: #1d4ed8; text-decoration: underline; }
    
    /* Comment Form Styling */
    .comment-respond { margin-top: 4rem; border-top: 2px solid #f3f4f6; padding-top: 3rem; }
    .reply-title { font-family: var(--font-serif); font-size: 1.5rem; color: var(--color-brand-darker); margin-bottom: 1.5rem; }
    .reply-title small { font-family: var(--font-sans); font-size: 0.9rem; margin-left: 1rem; }
    .reply-title small a { color: #cf2e2e; text-decoration: none; }
    
    .comment-form p { margin-bottom: 1.5rem; }
    .comment-form label { display: block; font-size: 0.95rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem; }
    .comment-form input[type="text"], .comment-form input[type="email"], .comment-form input[type="url"], .comment-form textarea { 
        width: 100%; padding: 0.8rem 1rem; border: 1px solid #d1d5db; border-radius: 8px; font-family: inherit; font-size: 1rem; background-color: #fff;
    }
    .comment-form input:focus, .comment-form textarea:focus { outline: none; border-color: var(--color-blue-primary); box-shadow: 0 0 0 3px rgba(250, 204, 21, 0.2); }
    
    .comment-form .form-submit { margin-top: 2rem; margin-bottom: 0; }
    .comment-form input[type="submit"] { 
        background-color: var(--color-blue-primary); color: #000; border: none; padding: 1rem 2.5rem; 
        font-weight: 700; border-radius: 8px; cursor: pointer; font-size: 1rem; transition: background-color 0.2s;
    }
    .comment-form input[type="submit"]:hover { background-color: #0a9fcc; }
    
    .comment-notes, .logged-in-as { color: #6b7280; font-size: 0.95rem; margin-bottom: 1.5rem; }
    .comment-form-cookies-consent { display: flex; align-items: center; gap: 0.5rem; font-size: 0.9rem; color: #4b5563; }
    .comment-form-cookies-consent input[type="checkbox"] { width: auto; margin: 0; }
    
    @media (max-width: 768px) {
        .comment-body { padding: 1.5rem; }
        .comment-list .children { margin-left: 1rem; }
    }
</style>

<div id="comments" class="comments-area">

	<?php
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$memento_comment_count = get_comments_number();
			if ( '1' === $memento_comment_count ) {
				printf(
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'memento' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $memento_comment_count, 'comments title', 'memento' ) ),
					number_format_i18n( $memento_comment_count ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'memento' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form(
        array(
            'title_reply_before' => '<h3 id="reply-title" class="reply-title">',
            'title_reply_after'  => '</h3>',
            'class_form'         => 'comment-form',
            'submit_button'      => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
            'comment_field'      => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . ' <span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="5" aria-required="true"></textarea></p>',
            'fields'             => array(
                'author' => '<p class="comment-form-author"><label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></p>',
                'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></p>',
                'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label><input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
            )
        )
    );
	?>

</div><!-- #comments -->
