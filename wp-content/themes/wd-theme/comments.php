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

<div class="panel panel_bare">

    <div class="feature feature_condensed">
        <div class="feature-hd feature-hd_altaltalt">
            <h2 class="hdg hdg_3">Comments</h2>
        </div>
        <?php if ( have_comments() ) : ?>
        <div class="feature-bd">
            <ol class="vList vList_comments">
                <?php
                    wp_list_comments('type=comment&callback=mytheme_comment&avatar_size=60&per_page=99999&max_depth=1');
                ?>
            </ol>
        </div>
        <?php endif; // end have_comments() ?>
    </div>


    <div class="form-comment">
        <div class="form-comment-inner">

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
                'author' => '<label for="comment-author" class="isHidden">' . __( 'Name', 'domainreference' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' . '<input class="input input_alt input_name" id="comment-author" name="author" type="text" placeholder="NAME *" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />',
                'url' => '<label for="comment-url" class="isHidden">' . __( 'Website', 'domainreference' ) . '</label>' . '<input class="input input_alt input_url" id="comment-url" name="url" type="text" placeholder="URL" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />',
                'email' => '<label for="comment-email" class="isHidden">' . __( 'Email', 'domainreference' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' . '<input class="input input_alt input_email" id="comment-email" name="email" type="text" placeholder="EMAIL *" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />' ) ) );

        comment_form($comments_args);
        ?>

        </div>
    </div><!-- // end comments form -->
</div><!-- // end comments panel -->
