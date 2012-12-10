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
            <h1 class="hdg hdg_1">Comments (<?php comments_number('0','1','%'); ?>)</h3>
        </div>
        <div class="feature-bd">
            <ol>
                <?php
                    wp_list_comments();
                    // TODO Customize comment output: http://codex.wordpress.org/Function_Reference/wp_list_comments
                ?>
            </ol>
        </div>
    </div>

<?php endif; // end have_comments() ?>

<?php comment_form(); ?>

</div><!-- // end comments panel -->
