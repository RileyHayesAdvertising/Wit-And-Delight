(function( $ ) {
	'use strict';

	$(document).ready(function () {
		$('body').loadie();

	    $("#nmrkt-search-form").submit(function (e) {
	        e.preventDefault(); //prevent default form submit
	        $('#nmrkt-no-results:visible').fadeOut('fast');
	        $('body').loadie(0);
	        $('.loadie').fadeIn();
	        $('body').loadie(0.15);
	        $.ajax({
	        	type: "POST",
	            url: nmrktSearchUrl,
	            data: $('#nmrkt-search-form').serialize(),
	            success: function (response) {

	            	if(response.success=='false'){
	            		$('#nmrkt-ajax-results .row .col-md-3').add('#nmrkt-ajax-results .row .clearfix').fadeOut('fast').remove();
	            		$('#nmrkt-no-results').html(response.data).fadeIn('fast');
	            		$('body').loadie(1);
	            	} else {
	            		$('body').loadie(0.35);
	            		$('#nmrkt-ajax-results .row .col-md-3').fadeOut('fast').remove();
	            		$('body').loadie(0.40);
	            		if(response.results.length>0){
	            			var counter = 0;
		            		$.each(response.results, function(i, image) {
		            			counter++; // brandName and name
		            			var itemTitle;
		            			if(image.brandName!==null){
		            				itemTitle = '<strong class="text-primary">'+image.name+' / $'+image.retail+'</strong><br><span>Brand: '+image.brandName+'</span>';
		            			} else {
		            				itemTitle = '<strong class="text-primary">'+image.name+' / $'+image.retail+'</strong>';
		            			}
		            			var container = $('<div class="col-xs-6 col-sm-3 col-md-3"></div>');
		            			var item = $('<a href="#" class="thumbnail nmrkt-search-item"><img src="'+image.imageThumbUrl+'"/></a>'+itemTitle).data('product',image);
		            			var product = $(container).append(item);
							    $('#nmrkt-ajax-results .row').append(product);
							    if(counter==4){
							    	$('#nmrkt-ajax-results .row').append('<div class="clearfix"></div>');
							    	counter = 0;
							    } 
							});
							$('body').loadie(1);
	            		} else {
	            			$('#nmrkt-no-results').fadeIn('fast');
	            			$('body').loadie(1);
	            		}
	            		
	            	}	                
	            }
	        });

	    });

	    var nmrkt_product = '';
	    var nmrkt_replace_product = '';

	    $(document).on('click', '.nmrkt-search-item', function(e){
	    	e.preventDefault();
	    	$('.nmrkt-search-item').removeClass('active');
	    	$(this).addClass('active');
	    	var data = $(this).data( "product" );
	    	
	    	$('.nmrkt-img-details').attr('src', data.imageThumbUrl);
	    	$('.nmrkt-img-caption').html(data.name);
	    	$('.attachment-display-settings:hidden').show();
	    		    
			nmrkt_product = data; 
	    });

		$(document).on('click', '.nmrkt-upload-item', function(e){
	    	e.preventDefault();
	    	if($('#nmrkt-replace-image').is(':checked')){
		    	$('.nmrkt-upload-item').removeClass('active');
		    	$(this).addClass('active');
		    	var url = $(this).data( "url" );	    	
		    	$('.nmrkt-replace-image').attr('src', url);
		    	$('.nmrkt-uploaded:hidden').stop(true, true).slideDown('fast');
		    	$('.nmrkt-uploaded-image').show();

		    	nmrkt_replace_product = $(this).data('url');

		    }
	    });

	    $(document).on('click', '.use-this', function(e){
	    	e.preventDefault();
	    	$(this).parent('div').find('.nmrkt-upload-item').trigger('click');
	    });
	    
	    $(document).on('change', '#nmrkt-replace-image', function(e){
	    	$('.nmrkt-uploaded').stop(true, true).slideToggle('fast');
	    	$('#nmrkt-size-box').toggle();
	    	if($(this).is(':checked')){
	    		$('a[href="#upload-own"]').trigger('click');
	    	}
	    });

		$(document).on('click', '#nmrkt-add-image', function(e){
			e.preventDefault();

			if(nmrkt_product==''){
				alert('Please search for a product');
				return false;
			}

			var product_html;
			var imageSize;
			var selectedSize = $('#nmrkt-size').val();

			if($('#nmrkt-replace-image').is(':checked')){

				
				if(nmrkt_replace_product==''){
					alert('Please select the image to replace it');
					return false;
				}

				if($('#nmrkt-text-link').is(':checked')){
		    		product_html = '<img src="'+nmrkt_replace_product+'" alt="'+nmrkt_product.name+'" /><p><a href="'+nmrkt_product.externalUrl+'" target="_blank" title="'+nmrkt_product.name+'">'+nmrkt_product.name+'</a></p>';
		    	} else {
		    		product_html = '<a href="'+nmrkt_product.externalUrl+'" target="_blank" title="'+nmrkt_product.name+'"><img src="'+nmrkt_replace_product+'" alt="'+nmrkt_product.name+'" /></a>';
		    	}

		    	sendProductActivation(product_html);

			} else {
				switch ( selectedSize ){
					case 'thumb':
						imageSize = nmrkt_product.imageUrl;
						break;
					case 'medium':
						imageSize = nmrkt_product.imageMedUrl;
						break;
					case 'full':
						imageSize = nmrkt_product.imageThumbUrl;
						break;
					default:
						imageSize = nmrkt_product.imageUrl;
				}
					
				if($('#nmrkt-text-link').is(':checked')){
		    		product_html = '<img src="'+imageSize+'" alt="'+nmrkt_product.name+'" /><p><a href="'+nmrkt_product.externalUrl+'" target="_blank" title="'+nmrkt_product.name+'">'+nmrkt_product.name+'</a></p>';
		    	} else {
		    		product_html = '<a href="'+nmrkt_product.externalUrl+'" target="_blank" title="'+nmrkt_product.name+'"><img src="'+imageSize+'" alt="'+nmrkt_product.name+'" /></a>';
		    	}

				sendProductActivation(product_html);
			}
		});

		function sendProductActivation(product){

			if(nmrkt_product.active=='1'){
				window.parent.send_to_editor(product);
				window.parent.tb_remove();
			} else {
				
				$('#nmrkt-add-image').prop("disabled",true).html('Communicating with API...');
				
				$.ajax({
		        	type: "POST",
		            url: nmrktSearchUrl,
		            data: {
		            	action: 'nmrkt_activate_product',
		            	productid: nmrkt_product.id,
		            	'_wpnonce': $('#_wpnonce').val()
			        },
		            success: function (response) {

		            	if(response.success=='false'){
		            		alert('There was an error with the API, please try again later.');
		            		$('#nmrkt-add-image').prop("disabled",false).html('Insert into Post');
		            	} else if(response.success=='true') {
		            		$('#nmrkt-add-image').prop("disabled",false).html('Insert into Post');
		            		window.parent.send_to_editor(product);
							window.parent.tb_remove();
		            	}	                
		            }
		        });
		        
			}
						
		}

		function add_file(id, file){
			var template = '<div id="nmrkt-file' + id + '">' +
			                   '<a href="#" class="thumbnail nmrkt-upload-item pull-left"><img src="http://placehold.it/48.png" class="demo-image-preview" /></a>' +
			                   '<span class="demo-file-id">#' + id + '</span> - ' + file.name + ' <span class="demo-file-size">(' + humanizeSize(file.size) + ')</span><br />Status: <span class="demo-file-status">Waiting to upload</span>'+
			                   '<div class="progress progress-striped active">'+
			                       '<div class="progress-bar" role="progressbar" style="width: 0%;">'+
			                           '<span class="sr-only">0% Complete</span>'+
			                       '</div>'+
			                   '</div>'+
			                   '<a href="#" class="use-this button-primary">Use this image</a>'+
			               '</div><div class="clearfix"></div>';
			               
			var i = $('#nmrkt-files').attr('file-counter');

			if (!i){
				$('#nmrkt-files').empty();				
				i = 0;
			}
			
			i++;
			
			$('#nmrkt-files').attr('file-counter', i);
		
			$('#nmrkt-files').prepend(template);
		}

		function update_file_status(id, status, message){
			$('#nmrkt-file' + id).find('span.demo-file-status').html(message).addClass('demo-file-status-' + status);
		}

		function update_file_progress(id, percent){
			$('#nmrkt-file' + id).find('div.progress-bar').width(percent);		
			$('#nmrkt-file' + id).find('span.sr-only').html(percent + ' Complete');
		}

		function humanizeSize(size) {
	      var i = Math.floor( Math.log(size) / Math.log(1024) );
	      return ( size / Math.pow(1024, i) ).toFixed(2) * 1 + ' ' + ['B', 'kB', 'MB', 'GB', 'TB'][i];
	    }

		$('#drag-and-drop-zone').dmUploader({
			url: nmrktSearchUrl,
			dataType: 'json',
			allowedTypes: 'image/*',
			extraData: {
			  action:'nmrkt_upload_image'
			},
			onBeforeUpload: function(id){
				update_file_status(id, 'uploading', 'Uploading...');
			},
			onNewFile: function(id, file){
				add_file(id, file);

				/*** Begins Image preview loader ***/
				if (typeof FileReader !== "undefined"){

					var reader = new FileReader();

					// Last image added
					var img = $('#nmrkt-files').find('.demo-image-preview').eq(0);

					reader.onload = function (e) {
					  img.attr('src', e.target.result);
					}

					reader.readAsDataURL(file);

				} else {
					// Hide/Remove all Images if FileReader isn't supported
					$('#nmrkt-files').find('.demo-image-preview').remove();
				}
				/*** Ends Image preview loader ***/
			},
			onComplete: function(){
				
			},
			onUploadProgress: function(id, percent){
				var percentStr = percent + '%';

				update_file_progress(id, percentStr);
			},
			onUploadSuccess: function(id, data){
				update_file_status(id, 'success', 'Upload Complete');
				update_file_progress(id, '100%');
				$('#nmrkt-file' + id).find('div.progress').removeClass('progress-striped');		
				$('#nmrkt-file' + id).find('.nmrkt-upload-item').data('url', data.url);
			},
			onUploadError: function(id, message){
				update_file_status(id, 'error', message);
			},
			onFallbackMode: function(message){
				alert('Browser not supported, please use a modern browser like Google Chrome.');
			}
		});

		$(document).bind('dragover', function (e) {
			var dropZone = $('#drag-and-drop-zone'),
			    timeout = window.dropZoneTimeout;
			if (!timeout) {
			    dropZone.addClass('in');
			} else {
			    clearTimeout(timeout);
			}
			var found = false,
			    node = e.target;
			do {
			    if (node === dropZone[0]) {
			        found = true;
			        break;
			    }
			    node = node.parentNode;
			} while (node != null);
			if (found) {
			    dropZone.addClass('hover');
			} else {
			    dropZone.removeClass('hover');
			}
			window.dropZoneTimeout = setTimeout(function () {
			    window.dropZoneTimeout = null;
			    dropZone.removeClass('in hover');
			}, 100);
		});

	});

})( jQuery );