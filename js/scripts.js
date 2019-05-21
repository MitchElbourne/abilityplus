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
      $('.forgot-password-cta-modal').on('click', function() {
        $('#LogInModal').modal('hide');
      })
    }
    modalLogic();

    $(document).ready(function() {
      $("#job_specialisms").select2({
        dropdownParent: $("#SignUpModal")
      });
    });

    function passwordResetHandler() {
      if($("#Password_Validate_Modal").hasClass('Not-Validated')) {
        $('#PasswordModal').modal('show');
      }
    }
    passwordResetHandler();

    function inputFocusHandler() {
      $(document).ready(function() {
        $('input').focus(function() {
          $(this).parent().addClass("focus");
        }).blur(function() {
          $(this).parent().removeClass("focus");
        })
      });
    } 

    inputFocusHandler();


    function howweworkCtaHandler() {
			var cta = jQuery('.how-we-work-cta');
			var navHeight = document.getElementById("site-header").offsetHeight;

			cta.click(function(e) {
				$(window).scrollTo(
					"#how-we-work", {
						duration: 1000,
						offset: (-navHeight)
					})
			})
		}
    howweworkCtaHandler();
    
    function signUpHandler() {
      $('#create-my-account').on('click', function() {
        document.getElementById('user_login').value = "";
        document.getElementById('user_login').value = document.getElementById('user_email').value;
      })
    }

    signUpHandler();

	});

})(jQuery, this);
