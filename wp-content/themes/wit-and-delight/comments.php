<div class="comments">
    <div class="comments-hd">
        <h2 class="hdg hdg_md">Comments (<?php comments_number('0','1','%'); ?>) &nbsp;/&nbsp; <?php echo getPostLikeLink(get_the_ID()); ?></h2>
    </div>
    <?php if (have_comments()) : ?>
    <div class="comments-bd">
        <ul class="commentsWrapperList">
            <?php
                wp_list_comments(
                    array(
                        'walker'            => null,
                        'max_depth'         => '3',
                        'style'             => 'ul',
                        'callback'          => null,
                        'end-callback'      => null,
                        'type'              => 'comment',
                        'reply_text'        => 'Reply',
                        'page'              => '',
                        'per_page'          => '',
                        'avatar_size'       => 60,
                        'reverse_top_level' => null,
                        'reverse_children'  => '',
                        'format'            => 'html5', // or 'xhtml' if no 'HTML5' theme support
                        'short_ping'        => false,   // @since 3.6
                        'echo'              => true     // boolean, default is true
                    )
                );
            ?>
        </ul>

    </div>
    <?php endif; ?>
    <div class="comments-ft">
    <?php
        $comments_args = array(
            'id_form' => 'commentForm',
            'id_submit' => 'commentForm-submit',
            'title_reply' => __(''),
            'title_reply_to' => __(''),
            'cancel_reply_link' => __(''),
            'label_submit' => __('Submit Comment'),
            'comment_field' => '',
            'must_log_in' => '',
            'logged_in_as' => '',
            'comment_notes_before' => '',
            'comment_notes_after' => '',
            'fields' => apply_filters('comment_form_default_fields', array(
                'author' => '<label for="commentForm-author" class="isVisuallyHidden">Name *</label>' . '<input class="input input_alt input_name" id="commentForm-author" name="author" type="text" placeholder="NAME *" value="' . esc_attr($commenter['comment_author']) . '" size="30" />',
                'url' => '<label for="commentForm-url" class="isVisuallyHidden">Website</label>' . '<input class="input input_alt input_url" id="commentForm-url" name="url" type="text" placeholder="URL" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" />',
                'email' => '<label for="commentForm-email" class="isVisuallyHidden">Email *</label>' . '<input class="input input_alt input_email" id="commentForm-email" name="email" type="text" placeholder="EMAIL *" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" />'))
        );

        comment_form($comments_args);
    ?>
    </div>
</div><!-- // END .comments -->