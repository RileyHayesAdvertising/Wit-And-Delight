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
        APP.Carousel.init();
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
        page: null,
        category: null,
        search: null,
        init: function() {
            var $triggers = $('#loadMore, [data-filter]');
            var $loadMore = $('#loadMore');

            if (!$triggers.length) {
                return;
            }

            this.category = $loadMore.data('category') ? $loadMore.data('category') : null;
            this.search = $loadMore.data('search') ? $loadMore.data('search') : null;
            this.$triggers = $triggers;
            this.page = 1;

            this.bindEvents();
        },

        bindEvents: function() {
            var self = this;

            this.$triggers.on('click', function(e) {
                var $this = $(this);
                var nonce = $this.attr('data-nonce');

                // don't allow rapid clicking
                if ($this.hasClass('loadMore-isDisabled')) {
                    return;
                }

                // If filter, go to first page
                if($this.data('filter')) {
                    self.page = 0;
                    self.category = $this.data('filter');
                    self.$triggers.removeClass('btn_isWhite');
                    $this.addClass('btn_isWhite');
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
                    search: self.search
                },
                beforeSend:function(){
                    if(self.page !== 0) {
                        $loadButton.addClass('loadMore-isDisabled');
                        $loadButton.html('<span class="loader"></span>');
                    } else {
                        $('#posts').html('<li><span class="panel"><span class="loader">...</span></span></li>');
                        $loadButton.hide();
                    }
                },
                success: function(data) {
                    console.log(data);
                    // load the html
                    if(data.html && data.results) {
                        if(self.page === 0) {
                            $('#posts').html(data.html);
                        } else {
                            $(data.html).appendTo('#posts');
                            $loadButton.html($loadButtonHTML);
                        }

                        $loadButton.removeClass('loadMore-isDisabled');
                        $loadButton.html('Keep it Comin\'');

                        self.category == 'popular' ? $loadButton.hide() : $loadButton.show();
                        self.page++;
                    } else if(!data.results && self.page === 0) {
                        $loadButton.hide();
                        $('#posts').html('<li><div class="box"><h3 class="hdg hdg_lg">Sorry, no posts were found!</h3></div></li>');
                    } else {
                        $loadButton.hide();
                        $('<li><div class="box box_isCentered"><h3 class="hdg hdg_lg">Sorry, there are no additional posts!</h3></li>').appendTo('#posts');
                    }
                },
                error: function() {
                    $loadButton.html('There was an error loading more posts.');
                }
            });
        }
    };

    /* ---------------------------------------------------------------------
    Carousel
    Author: Anthony Ticknor

    Create a carousel and rotate it. Rotation pauses on hover
    of each slide.
    ------------------------------------------------------------------------ */
    APP.Carousel = {
        $carousel: undefined,
        $slides: undefined,
        slideWrapperClass: '.carousel-stage-slide',
        nextSlideTriggerClass: '.js-next-slide',
        prevSlideTriggerClass: '.js-prev-slide',
        numSlides: undefined,
        numSlidesFromZero: undefined, // needed for 0 based counting
        currentSlide: 0,
        currentlyStopped: false,
        _rotationSpeed: 3000,
        _transitionSpeed: 200,

        init: function() {
            var $carousel = $('#js-carousel');

            if (!$carousel.length) {
                return;
            }

            this.$carousel = $carousel;
            this.$slides = this.$carousel.find(this.slideWrapperClass);
            this.numSlides = this.$slides.length;
            this.numSlidesFromZero = this.numSlides - 1;

            if (this.numSlides == 0) {
                return;
            }

            this.bindEvents();
            this.play();
        },

        bindEvents: function() {
            var self = this;

            this.$carousel.on('click', this.nextSlideTriggerClass, function(e) {
                e.preventDefault();
                self.currentlyStopped = true;
                self.pause();
                self.nextSlide();
            });

            this.$carousel.on('click', this.prevSlideTriggerClass, function(e) {
                e.preventDefault();
                self.currentlyStopped = true;
                self.pause();
                self.prevSlide();
            });

            this.$carousel.on('mouseenter', this.slideWrapperClass, function() {
                self.pause();
            });

            this.$carousel.on('mouseleave', this.slideWrapperClass, function() {
                if (self.currentlyStopped == false) {
                    self.play();
                }
            });
        },

        play: function() {
            var self = this;

            this.rotate = window.setInterval(function() {
                self.nextSlide();
            }, self._rotationSpeed);
        },

        pause: function() {
            var self = this;
            clearInterval(self.rotate);
        },

        nextSlide: function() {
            this.$slides.hide();
            if (this.currentSlide == this.numSlidesFromZero) {
                this.currentSlide = 0;
            } else {
                this.currentSlide = this.currentSlide + 1;
            }
            this.$slides.eq(this.currentSlide).fadeIn(this._transitionSpeed);
        },

        prevSlide: function() {
            this.$slides.hide();
            if (this.currentSlide == 0) {
                this.currentSlide = this.numSlidesFromZero;
            } else {
                this.currentSlide = this.currentSlide - 1;
            }
            this.$slides.eq(this.currentSlide).fadeIn(this._transitionSpeed);
        }
    };

}(jQuery, window, WD));