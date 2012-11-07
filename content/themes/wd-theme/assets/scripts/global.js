/* ---------------------------------------------------------------------
Global JavaScript & jQuery

Target Browsers: All
Authors: Anthony Ticknor

JS Devs beware! WordPress loads jQuery in noConflict mode.
------------------------------------------------------------------------ */
jQuery(function($) {

    // Initialize!
    WD($);

});

var WD = function($){

    var APP = APP || {};

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
    Author: Anthony Ticknor

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


    APP.ExternalLinks.init();
    APP.AutoReplace.init();

} // end 