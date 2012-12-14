<?php
/**
 * W&D Theme
 *
 * @category WD_Theme
 * @package WD_Theme
 * @subpackage Comments
 * @author
 * @version $Id$
 */
?>



<?php if ( post_password_required() ) : ?>
<div id="panel panel_bare">
    <div class="user-content">
        <p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'twentyten' ); ?></p>
    </div>
</div><!-- // end comments panel -->
<?php
        /* Stop the rest of comments.php from being processed,
         * but don't kill the script entirely -- we still have
         * to fully load the template.
         */
        return;
    endif;
?>

<div class="panel panel_bare">

<?php if ( have_comments() ) : ?>
    <div class="feature">
        <div class="feature-hd">
            <h1 class="hdg hdg_1">Comments (<?php comments_number('0','1','%'); ?>)</h1>
        </div>
        <div class="feature-bd">
            <ol class="vList vList_comments">
                <?php
                    wp_list_comments('type=comment&callback=mytheme_comment&avatar_size=60');
                ?>
            </ol>
        </div>
    </div>

    <div class="form-comment">
        <div class="form-comment-inner">
<?php endif; // end have_comments() ?>

<?php
$comments_args = array(
    'id_form' => 'comment-form',
    'id_submit' => 'comment-submit',
    'title_reply' => __( '' ),
    'title_reply_to' => __( '' ),
    'cancel_reply_link' => __( '' ),
    'label_submit' => __( 'Submit Comment' ),
    'comment_field' => '',
    'must_log_in' => '',
    'logged_in_as' => '',
    'comment_notes_before' => '',
    'comment_notes_after' => '',
    'fields' => apply_filters( 'comment_form_default_fields', array(
        'author' => '<label for="comment-author" class="isHidden">' . __( 'Name', 'domainreference' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' . '<input class="input input_alt input_name" id="comment-author" name="author" type="text" placeholder="Name *" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />',
        'url' => '<label for="comment-url" class="isHidden">' . __( 'Website', 'domainreference' ) . '</label>' . '<input class="input input_alt input_url" id="comment-url" name="url" type="text" placeholder="URL" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />',
        'email' => '<label for="comment-email" class="isHidden">' . __( 'Email', 'domainreference' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' . '<input class="input input_alt input_email" id="comment-email" name="email" type="text" placeholder="Email *" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />' ) ) );

comment_form($comments_args);
?>
            
        </div>
    </div><!-- // end comments form -->
</div><!-- // end comments panel -->
