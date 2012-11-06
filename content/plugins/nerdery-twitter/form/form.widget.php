<?php
/**
 * Twitter Widget Form
 *
 * @category Nerdery_WordPress_Plugins
 * @package Nerdery_Twitter
 * @subpackage Nerdery_Twitter_Form
 * @author Jess Green <jgreen@nerdery.com>
 * @version $Id$
 */
if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF']))
    die('You are not allowed to call this page directly.');

    $nonce = wp_create_nonce('nerdery_twitter_widget');
?>

<div class="form-wrap">
    <div class="form-field">
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', NERDERY_TWITTER_DOMAIN ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </div>
    <div class="form-field form-required<?php echo $no_username; ?>">
        <label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e('Twitter Username:', NERDERY_TWITTER_DOMAIN) ?></label>
        <input type="text" name="<?php echo $this->get_field_name( 'username' ); ?>" id="<?php echo $this->get_field_id( 'username' ); ?>" class="widefat" value="<?php echo esc_attr( $username ); ?>"  />
    </div>
    <div>
        <label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e('Display # Tweets:', NERDERY_TWITTER_DOMAIN) ?>
            <input type="text" name="<?php echo $this->get_field_name( 'count' ); ?>" id="<?php echo $this->get_field_id( 'count' ); ?>" class="small-text" value="<?php echo esc_attr( $count ); ?>"  />
        </label>
    </div>
    <input type="hidden" name="<?php echo $this->get_field_name( '_nerdery_twitter_widget' ); ?>" value="<?php echo $nonce; ?>" />
</div>
