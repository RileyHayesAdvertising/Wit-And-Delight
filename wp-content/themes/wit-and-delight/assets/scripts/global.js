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

    Load more posts when the trigger is clicked
    ------------------------------------------------------------------------ */
    APP.LoadMorePosts = {
        $triggers: null,
        init: function() {
            var $triggers = $('#loadMore, [data-filter]');

            // make sure there are triggers
            if (!$triggers.length) {
                return;
            }

            this.$triggers = $triggers;
            this.page = 1;
            this.category = $('#loadMore').data('category');
            this.bindEvents();
        },

        bindEvents: function() {
            var self = this;

            // on click
            this.$triggers.on('click', function(e) {
                var $this = $(this);
                var nonce = $this.attr('data-nonce');

                if ($this.hasClass('btn--isDisabled')) {
                    // don't allow rapid clicking
                    return;
                }

                // If filter, go to first page
                if($this.data('filter')) {
                    self.page = 0;
                    self.category = $this.data('filter');
                }
                
                self.request(nonce);

                e.preventDefault();
            });
        },

        request: function(nonce) {
            var self = this;
            var $loadButton = $('#loadMore');
            var $loadButtonHTML = $loadButton.html();

            $.ajax({
                type : 'get',
                dataType : 'json',
                url : WPVARS.ajaxURL,
                data : {
                    action: 'load_more_posts',
                    nonce: nonce,
                    category: self.category,
                    page: self.page,
                },
                beforeSend:function(){
                    if(self.page !== 0) {
                        $loadButton.html('<span class="loader loader--light">...</span>');
                        $loadButton.addClass('btn--isDisabled');
                    }
                },
                success: function(data) {
                    // load the html
                    if(data.html && data.results) {
                        if(self.page === 0) {
                            $('#posts').html(data.html);
                        } else {
                            $(data.html).appendTo('#posts');
                            $loadButton.html($loadButtonHTML);
                        }

                        $loadButton.removeClass('btn--isDisabled');
                        self.category == 'popular' ? $loadButton.hide() : $loadButton.show();
                        self.page++;
                    } else if(!data.results && self.page === 0) {
                        $loadButton.hide();
                        $('#posts').html('<li><div class="box"><h3 class="hdg hdg_xxl">Sorry, no posts were found!</h3></div></li>');
                    } 
                },
                error: function() {
                    $loadButton.html('There was an error loading more posts.');
                }
            });
        }
    };

}(jQuery, window, WD));