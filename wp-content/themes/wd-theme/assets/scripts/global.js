/* ---------------------------------------------------------------------
Global JavaScript & jQuery

Target Browsers: All
Authors: Anthony Ticknor & Dan Piscitiello

GLOBAL CONSTANTS:
WD.THEMEURL         - base url to this WP theme's directory
WD.Events           - Custom Events object and definitions
WD.POSTS            - Contains posts data array on listing pages
------------------------------------------------------------------------ */
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

        APP.ExternalLinks.init();
        APP.AutoReplace.init();
        APP.HasJS.init();
        APP.Carousel.init();
        APP.Toggle.init();
    });

    /* ---------------------------------------------------------------------
    Carousel
    Author: Anthony Ticknor

    Create a carousel and rotate it. Rotation pauses on hover
    of each slide.
    ------------------------------------------------------------------------ */
    APP.Carousel = {
        $carousel: undefined,
        $slides: undefined,
        numSlides: undefined,
        numSlidesFromZero: undefined, // needed for 0 based counting
        currentSlide: 0,
        currentlyStopped: false,
        _rotationSpeed: 3000,

        init: function() {
            var $carousel = $('#js-carousel');

            if (!$carousel.length) {
                return;
            }

            this.$carousel = $carousel;
            this.$slides = this.$carousel.find('.carousel-item');
            this.numSlides = this.$slides.length;
            this.numSlidesFromZero = this.numSlides - 1;

            if (this.numSlides == 0) {
                return;
            }

            this.setupControls();
            this.bind();
            this.play();
        },

        setupControls: function() {
            this.$carousel.append('<ol class="pagination"><li class="pagination-prev"><a class="js-prev-slide"><i class="icn icn_prev"></i><span class="isHidden">Previous Slide</span></a></li><li class="pagination-next"><a class="js-next-slide"><span class="isHidden">Next Slide</span><i class="icn icn_next"></i></a></li></ol>');
        },

        bind: function() {
            var self = this;

            this.$carousel.on('click','.js-next-slide', function(e) {
                e.preventDefault();
                self.currentlyStopped = true;
                self.pause();
                self.nextSlide();
            });

            this.$carousel.on('click','.js-prev-slide', function(e) {
                e.preventDefault();
                self.currentlyStopped = true;
                self.pause();
                self.prevSlide();
            });

            this.$carousel.on('mouseenter','.carousel-item', function() {
                self.pause();
            });

            this.$carousel.on('mouseleave','.carousel-item', function() {
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
            this.$slides.eq(this.currentSlide).fadeIn(200);
        },

        prevSlide: function() {
            this.$slides.hide();
            if (this.currentSlide == 0) {
                this.currentSlide = this.numSlidesFromZero;
            } else {
                this.currentSlide = this.currentSlide - 1;
            }
            this.$slides.eq(this.currentSlide).fadeIn(200);
        }
    };

    /* ---------------------------------------------------------------------
    HasJS
    Author: Anthony Ticknor
    Modified: Dan Piscitiello

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
    Toggle
    Author: Anthony Ticknor

    Create show / hide toggle lists - built for use in the sidebar nav
    ------------------------------------------------------------------------ */
    APP.Toggle = {
        $toggleSection: undefined,

        init: function() {
           $toggleSections = $('.js-toggle');

           if (!$toggleSections.length) {
               return;
           }

           this.$toggleSections = $toggleSections;

           this.setup();
           this.bind();
        },

        setup: function() {
            $('.js-toggle-link').each(function() {
                var $this = $(this);
                var cookieName = $this.attr('data-cookie');

                if ($.cookie(cookieName) === 'true') {
                    $this.append('<span class="js-toggle-icn"><i class="icn icn_down"></i></span>');
                    $this.siblings('.js-toggle-target').addClass('isExpanded');
                } else {
                    $this.append('<span class="js-toggle-icn"><i class="icn icn_next"></i></span>');
                }

            });
        },

        bind: function() {
            var self = this;

            $('.js-toggle-link').on('click', function() {
                var $this = $(this);
                var $currentLink = $this;
                var $currentTarget = $this.siblings('.js-toggle-target');
                var cookieName = $this.attr('data-cookie');
                self.toggleTarget($currentLink,$currentTarget,cookieName);
            });
        },

        toggleTarget: function($link,$target,cookieName) {
            $currentIcon = $link.find('.js-toggle-icn .icn');

            if ($currentIcon.hasClass('icn_next')) {
                $currentIcon.removeClass('icn_next').addClass('icn_down');
            } else if ($currentIcon.hasClass('icn_down')) {
                $currentIcon.removeClass('icn_down').addClass('icn_next');
            }

            $target.toggleClass('isExpanded');

            if ($target.hasClass('isExpanded')) {
                $.cookie(cookieName, 'true', { expires: 7, path: '/' });
            } else {
                $.cookie(cookieName, 'false', { expires: 7, path: '/' });
            }

        }
    };

    /* ---------------------------------------------------------------------
    ExternalLinks
    Author: Anthony Ticknor

    Launches links with a rel="external" in a new window
    ------------------------------------------------------------------------ */
    APP.ExternalLinks = {
        init: function() {
            $(document).on('click', 'a[rel=external]', function(e) {
                window.open($(this).attr('href'));
                e.preventDefault();
            });
        }
    };

    /* ---------------------------------------------------------------------
    AutoReplace
    Author: Dan Piscitiello

    Mimics HTML5 placeholder behavior

    Additionally, adds and removes 'placeholder-text' class, used as a styling
    hook for when placeholder text is visible or not visible

    Additionally, prevents forms from being
    submitted if the default text remains in input field - which we may
    or may not want to leave in place, depending on usage in site
    ------------------------------------------------------------------------ */
    APP.AutoReplace = {
        $fields: undefined,

        init: function() {
            // Only run the script if 'placeholder' is not natively supported
            if ('placeholder' in document.createElement('input')) {
                return;
            }

            this.$fields = $('[placeholder]');
            this.bind();
        },

        bind: function() {
            this.$fields.each(
                function() {
                    var $this = $(this);
                    var defaultText = $this.attr('placeholder');

                    if ($this.val() === '' || $this.val() === defaultText) {
                        $this.addClass('placeholder-text').val(defaultText);
                    }

                    $this.off('.autoreplace');

                    $this.on(
                        'focus.autoreplace',
                        function() {
                            if ($this.val() === defaultText) {
                                $this.val('').removeClass('placeholder-text');
                            }
                        }
                    );

                    $this.on(
                        'blur.autoreplace',
                        function() {
                            if ($this.val() === '' || $this.val() === defaultText) {
                                $this.val(defaultText).addClass('placeholder-text');
                            }
                        }
                    );

                    $this.parents('form').off('submit.autoreplace').on(
                        'submit.autoreplace',
                        function() {
                            if ($this.val() == defaultText) {
                                $this.val('');
                            }
                        }
                    );
                }
            );
        }
    };

}(jQuery, window, WD));