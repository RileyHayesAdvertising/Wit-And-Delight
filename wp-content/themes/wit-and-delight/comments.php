<div class="comments">
    <div class="comments-hd">
        <h2>Comments (<?php comments_number('0','1','%'); ?>) &nbsp;/&nbsp; <?php echo getPostLikeLink(get_the_ID()); ?></h2>
    </div>
    <?php if (have_comments()) : ?>
    <div class="comments-bd">
        <ol class="vList vList_comments">
            <?php wp_list_comments('type=comment&callback=mytheme_comment&avatar_size=60&per_page=99999&max_depth=1'); ?>
        </ol>
    </div>
    <?php endif; ?>
    <div class="comments-ft">
        <div class="crate">
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
    </div>
</div><!-- // END .comments -->
