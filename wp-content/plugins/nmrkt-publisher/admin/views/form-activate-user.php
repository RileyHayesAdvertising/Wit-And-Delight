<div class="wrap">
	<h2 id="nmrkt-title"><?php echo __('NMRKT Settings','nmrkt') ?></h2>

	<?php
		if (isset($_GET['api']))
		if ( 'fail' == esc_attr( $_GET['api'] ) ):
	?>
	<div id="setting-error-settings_updated" class="error settings-error"> 
		<p><strong><?php _e('API Credentials failed, please check them and try again.', 'nmrkt' ); ?></strong></p>
	</div>
	<?php
		endif;

		if (isset($_GET['api']))
		if ( 'deactivate' == esc_attr( $_GET['api'] ) ):
	?>
	<div id="setting-error-settings_updated" class="updated settings-error"> 
		<p><strong><?php _e('NMRKT User was deactivated succesfully.', 'nmrkt' ); ?></strong></p>
	</div>
	<?php
		endif;
	?>

	<form class="nmrkt_user_form" method="post" action="<?php admin_url( 'options-general.php?page=nmrkt-settings' ); ?>">

		<table id="nmrkt-setup-account" class="form-table">
			<tr valign="top">
				<th colspan="2">
					<h3><?php _e( 'Activate NMRKT Account', 'nmrkt' ); ?></h3>
					<hr>
				</th>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="nmrkt_id"><?php _e('NMRKT ID','nmrkt'); ?></label>
				</th>
				<td>
					<input name="nmrkt_id" type="text" id="nmrkt_id" class="regular-text" value="" placeholder="<?php _e('Enter your NMRKT ID','nmrkt'); ?>">
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="nmrkt_secret"><?php _e('NMRKT Secret Key','nmrkt'); ?></label>
				</th>
				<td>
					<input name="nmrkt_secret" type="text" id="nmrkt_secret" class="regular-text" value="" placeholder="<?php _e('Enter your NMRKT Secret Key','nmrkt'); ?>">
				</td>
			</tr>
		</table>
		<?php wp_nonce_field( "nmrkt-user-setup-nonce" );  ?>
		<p class="submit" style="clear: both;">
			<input type="submit" name="Submit" id="nmrkt-submit"  class="button-primary" value="<?php _e( 'Activate', 'nmrkt' ); ?>" />
			<input type="hidden" name="nmrkt-user-setup-submit" value="Y" />
		</p>
	</form>
</div>