jQuery(document).ready(function($) {

	// The number of the next page to load (/page/x/).
	var pageNum = parseInt(custom_alp.startPage) + 1;

	// The maximum number of pages the current query can return.
	var max = parseInt(custom_alp.maxPages);

	// The link of the next page of posts.
	var nextLink = custom_alp.nextLink;

	/**
	 * Replace the traditional navigation with our own,
	 * but only if there is at least one page of new posts to load.
	 */
	if(pageNum <= max) {
		// Insert the "More Posts" link.
		$('#js-loadMorePosts')
			.append('<ol class="vlist vlist_articles" data-placeholder="custom-alp-placeholder-'+ pageNum +'"></ol>')
			.append('<div id="custom-alp-load-posts"><button type="button" class="btnLoadMore">Load More</button></div>');

		// Remove the traditional navigation.
		$('#js-loadMoreControls').remove();
	}


	/**
	 * Load new posts when the link is clicked.
	 */
	$('#custom-alp-load-posts button').click(function() {

		// Are there more posts to load?
		if(pageNum <= max) {
            console.log(nextLink);
			// Show that we're working.
			$(this).text('Loading posts...').blur();

			$('[data-placeholder="custom-alp-placeholder-'+ pageNum +'"]').load(nextLink + ' .vlist_articles > li',
				function() {
					// Update page number and nextLink.
					pageNum++;
					nextLink = nextLink.replace(/\/page\/[0-9]?/, '/page/'+ pageNum);

					// Add a new placeholder, for when user clicks again.
					$('#custom-alp-load-posts')
						.before('<ol class="vlist vlist_articles" data-placeholder="custom-alp-placeholder-'+ pageNum +'"></ol>')

					// Update the button message.
					if(pageNum <= max) {
						$('#custom-alp-load-posts button').text('Load More');
					} else {
						$('#custom-alp-load-posts button').text('No posts to load').attr('disabled','disabled');
					}
				}

			);
		} else {
			$('#custom-alp-load-posts button').append('.');
		}

		return false;
	});
});