<html>
<head>
<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo plugins_url( 'css/nmrkt-search.css', dirname(__FILE__) ) ?>">
</head>
<body>
<?php
	media_upload_header();
?>

<div class="nmrkt-search">

	<div class="col-md-9 col-sm-9 col-xs-8 col-lg-10">

		<ul class="nav nav-tabs" role="tablist">
		  <li class="active"><a class="first-tab" href="#search-inventory" role="tab" data-toggle="tab"><?php _e('NMRKT Inventory', 'nmrkt' ); ?></a></li>
		  <li><a href="#upload-own" role="tab" data-toggle="tab"><?php _e('Upload Image', 'nmrkt' ); ?></a></li>
		</ul>

		<div class="tab-content">
		  	<div class="tab-pane active" id="search-inventory">

				<div class="nmrkt-search-inventory">
					<div class="row">
						<div class="col-md-12">
							<form id="nmrkt-search-form" role="form">
								<?php wp_nonce_field( "nmrkt-search-response" );  ?>
								<p><strong><?php echo __('Search NMRKT Inventory','nmrkt') ?></strong></p>
							    <div class="input-group">			    	
							    	<input type="text" id="nmrkt-search" name="nmrkt-search" class="form-control input-lg" placeholder="<?php echo __('tshirts, jeans, etc...','nmrkt') ?>">
							    	<span class="input-group-btn">
							        	<button class="btn btn-default btn-lg" type="submit"><?php echo __('Search','nmrkt') ?></button>
							      	</span>
							    </div>			
							    <input type="hidden" name="action" value="nmrkt_search_inventory">		    	    
							</form>

							<div id="nmrkt-ajax-results">
								<div class="row">
									<div id="nmrkt-no-results" class="col-md-12">
										<p><?php echo __('No results found','nmrkt') ?></p>
									</div>
								</div>		
							</div>
						</div>
					</div>
				</div>

			</div><!-- /#search-inventory -->
			
		  	<div class="tab-pane" id="upload-own">
		  	
		        <div id="nmrkt-drop-zone">
		        	<!-- D&D Zone-->
			        <div id="drag-and-drop-zone" class="uploader">
			            <div><?php _e('Drag &amp; Drop the image here', 'nmrkt' ); ?></div>
			            <div class="or"><?php _e('or', 'nmrkt' ); ?></div>
			            <div class="browser">
			              <label>
			                <span><?php _e('Select Files', 'nmrkt' ); ?></span>
			                <input class="button-primary" type="file" name="files[]"  accept="image/*" multiple="multiple" title='<?php _e('Click to add Images', 'nmrkt' ); ?>'>
			              </label>
			            </div>
			        </div>
			        <!-- /D&D Zone -->

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title"><?php _e('Images', 'nmrkt' ); ?></h3>
						</div>
						<div class="panel-body ">
							<div id="nmrkt-files">
				    			<span class="demo-note"><?php _e('No image has been selected/droped yet...', 'nmrkt' ); ?></span>
				    		</div>
						</div>
					</div>

		        </div>

		  	</div><!-- /#upload-own -->

		</div>

	</div>

	<div class="clearfix"></div>
		
	<div id="nmrkt-sidebar" class="col-md-3 col-sm-3 col-xs-4 col-lg-2 nmrkt-sidebar">
		<div class="attachment-display-settings">
			<h3><?php _e('Product Details', 'nmrkt' ); ?></h3>
			<a href="#" class="thumbnail">
				<img class="nmrkt-img-details" />
			</a>
			<p class="desc nmrkt-img-caption"></p>
			<h3><?php _e('Product Display Settings', 'nmrkt' ); ?></h3>
			<label class="setting" id="nmrkt-size-box">
				<span><?php _e('Size', 'nmrkt' ); ?></span>
				<select class="size" name="nmrkt-size" id="nmrkt-size">
					<option value="thumb"><?php _e('Thumbnail', 'nmrkt' ); ?></option>
					<option value="medium"><?php _e('Medium', 'nmrkt' ); ?></option>
					<option value="full"><?php _e('Full Size', 'nmrkt' ); ?></option>
				</select>
			</label>
			<div class="clearfix"></div>
			<br>
			<label for="nmrkt-text-link" class="setting checkbox">
				<input name="nmrkt-text-link" id="nmrkt-text-link" type="checkbox" value="yes">
				<?php _e('Add link as text below image', 'nmrkt' ); ?>
			</label>

			<div class="clearfix"></div>
			<label for="nmrkt-replace-image" class="setting checkbox">
				<input name="nmrkt-replace-image" id="nmrkt-replace-image" type="checkbox" value="yes">
				<?php _e('Replace it with my own image', 'nmrkt' ); ?>
			</label>
			<div class="clearfix"></div>
			<br>
			<div class="nmrkt-uploaded">
				<div class="nmrkt-uploaded-image">
					<a href="#" class="thumbnail">
						<img class="nmrkt-replace-image" />
					</a>
				</div>
			</div>
		</div>		
	</div>

	<div class="nmrkt-toolbar">
		<button id="nmrkt-add-image" class="button-primary"><?php _e('Insert into Post', 'nmrkt' ); ?></button>
	</div>

</div>

<script type="text/javascript" src="/wp-includes/js/jquery/jquery.js"></script>
<script type="text/javascript" src="<?php echo plugins_url( 'js/nmrkt-deps.min.js', dirname(__FILE__) ) ?>"></script>
<script type="text/javascript">
	var nmrktSearchUrl = "<?php echo admin_url( 'admin-ajax.php' ) ?>";
</script>
<script type="text/javascript" src="<?php echo plugins_url( 'js/nmrkt-search.js', dirname(__FILE__) ) ?>"></script>
</body>
</html>