(function ($, root, undefined) {

	$(function () {

		'use strict';

		var navbarOpen = false;

		function alterNavbarIcon() {
			jQuery('.navbar-toggler').click(function() {
				if (navbarOpen === false) {
					jQuery('.navbar-toggler').addClass('open');
					navbarOpen = true;
					$()
				} else {
					jQuery('.navbar-toggler').removeClass('open');
					navbarOpen = false;
				}
			});
		}
		alterNavbarIcon();

		// Closes the Navbar on scroll if it is open
		function menuCloseOnScroll() {
			var nav = jQuery('#primary-menu');

			jQuery(window).on('scroll', lodash.throttle(function() {
				if (nav.hasClass('show')) {
					nav.collapse('hide');
					nav.removeClass('show');
					jQuery('.navbar-toggler').removeClass('open');
					navbarOpen = false;
				}
			}, 500));
		}
		menuCloseOnScroll();

		// Closes Navbar when clicking outside of the menu
		function menuCloseOnClick() {
			var nav = jQuery('#primary-menu');

			jQuery('body').bind('click', function(e) {
				if(jQuery(e.target).closest('.collapse').length == 0) {
					if (nav.hasClass('show')) {
						nav.collapse('hide');
						nav.removeClass('show');
						jQuery('.navbar-toggler').removeClass('open');
						navbarOpen = false;
					}
				}
			});
		}
		menuCloseOnClick();

    // Controls the switching between the log in and sign up modals
    function modalLogic() {
      $('.sign-up-cta-modal').on('click', function() {
        $('#LogInModal').modal('hide');
      })

      $('.log-in-cta-modal').on('click', function() {
        $('#SignUpModal').modal('hide');
      })
    }
    modalLogic();

    $(document).ready(function() {
      $("#job_specialisms").select2({
        dropdownParent: $("#SignUpModal")
      });
      $("#user_type").select2({
        dropdownParent: $("#SignUpModal")
      });
    });

    // $(document).ready(setTimeout(function() {
    //   if($('.messages').hasClass('.active')) {
    //     $('#SignUpModal').modal('show');
    //     console.log('WAKLCs')
    //   }
    // }), 3000);


	});

})(jQuery, this);
