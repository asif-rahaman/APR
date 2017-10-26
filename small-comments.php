<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to twentytwelve_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments">
<?php if ( have_comments() ) : ?>
<div class="col-md-12">
	<h2>Comments <span>(<?php echo get_comments_number(); ?>)</span></h2>
	<ol class="commentlist" style="list-style:none;">
			<?php wp_list_comments( array( 'callback' => 'twentytwelve_comment', 'style' => 'ol' ) ); ?>
	</ol><!-- .commentlist -->
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'twentytwelve' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentytwelve' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentytwelve' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'twentytwelve' ); ?></p>
		<?php endif; ?>
		
</div>
<?php endif; // have_comments() ?>
<div class="col-md-12 blogpost_form">
	<?php comment_form( array(
        // change the title of send button 
        'label_submit'=>'Kommentar hinzufügen',
        // change the title of the reply section
        'title_reply'=>'Kommentar hinzufügen',
        // remove "Text or HTML to be displayed before and after the set of comment fields"
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        'fields' => apply_filters( 'comment_form_default_fields', array(

    'author' =>
      '<p class="comment-form-author">' 
      .( $req ? '<span class="required"></span>' : '' ) .
      '<input id="author" class="form-control" name="author" type="text" placeholder="  Benutzername" value="' . esc_attr( $commenter['comment_author'] ) .
      '" size="30"' . $aria_req . ' /></p>',

    'email' =>
      '<p class="comment-form-email">'.
      ( $req ? '<span class="required"></span>' : '' ) .
      '<input id="email" class="form-control" name="email" type="text" placeholder="  myemail@|" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" size="30"' . $aria_req . ' /></p>'
    )),
        
        // redefine your own textarea (the comment body)
      'comment_field' => '<p class="comment-form-comment">' .'<textarea id="comment" name="comment" aria-required="true" class="comment_ar" cols="70" rows="7" placeholder="Schreiben Sie Ihren Kommentar"></textarea></p>',
)); ?>
</div>
<!-- <div class="col-md-12 blogpost_form">
	<h2>Kommentar hinzufügen</h2>
	<form action="" class="form-horizontal">
		<input type="email" class="form-control" id="inputEmail3" placeholder="Benutzername">
		<input type="email" class="form-control" id="inputEmail3" placeholder="myemail@|">
		<textarea name="" id="" cols="70" rows="7" placeholder="myemail@|"></textarea> 
		<button type="submit" class="btn btn-default">Kommentar hinzufügen</button>
	</form>
</div>	 -->
</div>	

