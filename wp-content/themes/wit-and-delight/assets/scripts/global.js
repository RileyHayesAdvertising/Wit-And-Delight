var WD = WD || {}; // Global Namespace object

(function($, window, APP, undefined) {
    // APP Events
    APP.Events = APP.Events || $({});

    // DOM Ready
    $(function() {
        // Common jQuery elements
        APP.$html   = $('html');
        APP.$body   = $('body');
        APP.$window = $(window);

        APP.HasJS.init();
        APP.LoadMorePosts.init();
    });

    /* ---------------------------------------------------------------------
    HasJS
    Author: Anthony Ticknor

    Adds JS class to HTML element if JS is present
    Removes no-js class from html element if JS present
    ------------------------------------------------------------------------ */
    APP.HasJS = {
        init: function() {
            APP.$html
                .addClass('js')
                .removeClass('no-js');
        }
    };

    /* ---------------------------------------------------------------------
    LoadMorePosts
    Author: Anthony Ticknor
    ------------------------------------------------------------------------ */
    APP.LoadMorePosts = {
        $trigger: null,
        $target: null,
        apiBaseURL: WPVARS.siteurl + '/wp-json/wp/v2/',
        perPage: WPVARS.posts_per_page, // matches backend config
        currentPage: 2, // assumes page 1 is already on screen from the initial load

        init: function() {
            var $trigger = $('#js-loadMoreTrigger');
            var $target = $('#js-loadMoreTarget');

            if (!$trigger.length || !$target.length) {
                return;
            }

            this.$trigger = $trigger;
            this.$target = $target;

            this.bindEvents();
        },

        bindEvents: function() {
            var self = this;

            this.$trigger.on('click', function(e) {
                self.loadMore();
                e.preventDefault();
            });
        },

        loadMore: function() {
            var self = this;
            var perPage = this.perPage;
            var pageNumber = this.currentPage;
            var requestURL = this.apiBaseURL + 'posts?per_page=' + perPage + '&page=' + pageNumber;

            // TODO - handle category page load more
            if (1 == 2) {
                requestURL += "&categories=32";
            }

            var request = $.ajax({
                method: 'GET',
                url: requestURL,
                dataType: 'json',
                cache: false,
                beforeSend: function() {
                    // TODO
                }
            });

            request.done(function(data) {
                self.incrementPageNumber();
                self.renderPosts(data);
                self.insertImages();
            });

            request.fail(function() {
                // TODO
            });
        },

        incrementPageNumber: function() {
            this.currentPage = this.currentPage + 1;
        },

        renderPosts: function(data) {
            var posts = data;
            var numPosts = posts.length;

            for (var i = 0; i < numPosts; i++) {
                var postPermalink = posts[i].link;
                var postImageID = this.getFirstImageID(posts[i].content.rendered);
                var postCategories = 'TODO'; // TODO
                var postTitle = posts[i].title.rendered;
                var postExcerpt = posts[i].excerpt.rendered;

                var html = '';
                html +=  '<li>';
                html += '<div class="box">';
                html += '<div class="teaser">';
                html += '<div class="teaser-media">';
                html += '<a href="' + postPermalink + '">';
                html += '<span data-image-hold="true" data-image-id="' + postImageID +'"></span>';
                html += '</a>';
                html += '</div>';
                html += '<div class="teaser-bd">';
                html += '<div class="blurb">';
                html += '<div class="blurb-label">';
                html += '<span class="caption">' + postCategories + '</span>';
                html += '</div>';
                html += '<div class="blurb-hd">';
                html += '<h3 class="hdg hdg_xxl">';
                html += '<a href="' + postPermalink + '">';
                html += postTitle;
                html += '</a>';
                html += '</h3>';
                html += '</div>';
                html += '<div class="blurb-bd">';
                html += '<div class="user-content">';
                html += postExcerpt;
                html += '</div>';
                html += '</div>';
                html += '<div class="blurb-ft">';
                html += '<span class="caption">';
                html += '<a href="' + postPermalink + '">Read More &gt;</a>';
                html += '</span>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '</li>';

                this.$target.append(html);
            }
        },

        getFirstImageID: function(haystack) {
            var content = haystack;
            var regex = new RegExp(/wp-image-[0-9]{1,}/i);
            var matches = regex.exec(content);
            var imageID;

            if (matches) {
                imageID = matches[0].replace(/\D/g,'');
                return imageID;
            } else {
                return false;
            }
        },

        insertImages: function() {
            var $imagePlaceholders = $('[data-image-hold="true"]');
            var numPlaceholders = $imagePlaceholders.length;
            var imageID;
            var requestURL;

            for (var i = 0; i < numPlaceholders; i++) {
                imageID = $($imagePlaceholders[i]).attr('data-image-id');
                requestURL = this.apiBaseURL + 'media/' + imageID;

                var request = $.ajax({
                    method: 'GET',
                    url: requestURL,
                    dataType: 'json',
                    cache: false,
                    imageID: imageID
                });

                request.done(function(data) {
                    var imageURL;

                    if (data.media_details.sizes.medium_large) {
                        imageURL = data.media_details.sizes.medium_large.source_url;
                    } else {
                        imageURL = data.media_details.sizes.full.source_url;
                    }

                    $('[data-image-id="' + this.imageID + '"').append('<img src="' + imageURL + '" alt="" />');
                });

                request.fail(function() {
                    // TODO
                });

            }

            $imagePlaceholders.removeAttr('data-image-hold');
        }
    };

}(jQuery, window, WD));