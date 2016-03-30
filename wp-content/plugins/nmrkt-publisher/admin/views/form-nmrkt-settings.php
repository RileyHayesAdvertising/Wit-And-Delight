<?php

	$nmrkt_id 		= ( isset($settings['nmrkt_id']) ? $settings['nmrkt_id'] : '' );
	$nmrkt_secret 	= ( isset($settings['nmrkt_secret']) ? $settings['nmrkt_secret'] : '' );

	if(!isset($settings['nmrkt_post_types'])){
		$args = array(
		   'public'   => true
		);

		$post_types = get_post_types( $args, 'objects' );
		$nmrkt_post_types = array();

		foreach ( $post_types  as $post_type ) {
			if($post_type->name!='attachment' ){
				$nmrkt_post_types[$post_type->name] = '0';
			}
		}
	} else {
		$nmrkt_post_types = $settings['nmrkt_post_types'];
	}
	
	$nmrkt_create_post = ( isset($settings['nmrkt_create_post']) ? $settings['nmrkt_create_post'] : 'no' );

?>
<div class="wrap">
	<h2 id="nmrkt-title"><?php echo __('NMRKT Settings','nmrkt') ?></h2>

	<?php
		if (isset($_GET['api']))
		if ( 'success' == esc_attr( $_GET['api'] ) ):
	?>
	<div id="setting-error-settings_updated" class="updated settings-error"> 
		<p><strong><?php _e('API connection was succesful.', 'nmrkt' ); ?></strong></p>
	</div>
	<?php
		endif;
	?>

	<?php
		if (isset($_GET['updated']))
		if ( 'true' == esc_attr( $_GET['updated'] ) ):
	?>
	<div id="setting-error-settings_updated" class="updated settings-error"> 
		<p><strong><?php _e('Settings were saved.', 'nmrkt' ); ?></strong></p>
	</div>
	<?php
		endif;
	?>	
	<?php /*
	<form class="nmrkt_settings_form" method="post" action="<?php admin_url( 'options-general.php?page=nmrkt-settings' ); ?>">
		
		<table id="nmrkt-settings" class="form-table">
			<tr valign="top">
				<th colspan="2">
					<h3><?php _e( 'NMRKT Configuration', 'nmrkt' ); ?></h3>
					<hr>
				</th>
			</tr>
			
			<tr valign="top">
				<th scope="row">
					<?php _e('Select the Post Types','nmrkt'); ?>
				</th>
				<td>
					<fieldset>
						<legend class="screen-reader-text"><span>Select the Post Types</span></legend>

						<?php

							$args = array(
							   'public'   => true,
							);

							$post_types = get_post_types( $args, 'objects' );

							foreach ( $post_types  as $post_type ) {
								if($post_type->name!='attachment' ){
						?>
							<label for="nmrkt_post_type_<?php echo $post_type->name; ?>">
								<input name="nmrkt_post_types[<?php echo $post_type->name; ?>]" type="checkbox" id="nmrkt_post_type_<?php echo $post_type->name; ?>" value="1" <?php if(isset($nmrkt_post_types[$post_type->name])) checked( $nmrkt_post_types[$post_type->name], '1' ); ?> >
								<?php echo $post_type->labels->singular_name; ?>
							</label>
							<br>
						<?php			
								}

							}
						?>
						<p class="description">We found the following custom post types in your theme. Select the ones you would like to enable NMRKT on.</p>
					</fieldset>
				</td>
			</tr> 
			<tr valign="top">
				<th scope="row"><?php _e( 'Should we create a new custom post type?', 'nmrkt' ); ?></th>
				<td>
					<select name="nmrkt_create_post" id="nmrkt_create_post">
						<option value="yes" <?php selected( $nmrkt_create_post, 'yes' ); ?>>
							<?php _e( 'Yes', 'nmrkt' ); ?>
						</option>
						<option value="no" <?php selected( $nmrkt_create_post, 'no' ); ?>>
							<?php _e( 'No', 'nmrkt' ); ?>
						</option>
					</select>
				</td>
			</tr>
		</table>
		<?php wp_nonce_field( "nmrkt-settings-nonce" );  ?>
		<p class="submit" style="clear: both;">
			<input type="submit" name="Submit" id="nmrkt-submit-settings"  class="button-primary" value="<?php _e( 'Save Settings', 'nmrkt' ); ?>" />
			<input type="hidden" name="nmrkt-settings-submit" value="Y" />
		</p>

	</form>
	*/
			?>

	<form class="nmrkt_deactivate_user_form" method="post" action="<?php admin_url( 'options-general.php?page=nmrkt-settings' ); ?>">

		<table id="nmrkt-setup-account" class="form-table">
			<tr valign="top">
				<th colspan="2">
					<h3><?php _e( 'NMRKT Account', 'nmrkt' ); ?></h3>
					<hr>
				</th>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="nmrkt_id"><?php _e('NMRKT ID','nmrkt'); ?></label>
				</th>
				<td>
					<input disabled name="nmrkt_id" type="text" id="nmrkt_id" class="regular-text" value="<?php echo $nmrkt_id; ?>" placeholder="<?php _e('Enter your NMRKT ID','nmrkt'); ?>">
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="nmrkt_secret"><?php _e('NMRKT Secret Key','nmrkt'); ?></label>
				</th>
				<td>
					<input disabled name="nmrkt_secret" type="text" id="nmrkt_secret" class="regular-text" value="<?php echo $nmrkt_secret; ?>" placeholder="<?php _e('Enter your NMRKT Secret Key','nmrkt'); ?>">
				</td>
			</tr>
		</table>
		<?php wp_nonce_field( "nmrkt-settings-deactivate-nonce" );  ?>
		<p class="submit" style="clear: both;">
			<input type="submit" name="Submit" id="nmrkt-submit"  class="button-primary red" value="<?php _e( 'Deactivate', 'nmrkt' ); ?>" />
			<input type="hidden" name="nmrkt-user-deactivate-submit" value="Y" />
		</p>

	</form>
</div>