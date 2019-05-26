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

      $("body").on('click', '.md-trigger-ab', function (e) {
        // e.preventDefault();
        $('#LogInModal').modal('show');
      });
    }
    modalLogic();

    $(document).ready(function() {
      $("#job_career levels").select2({
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
    



    function careerLevelHandler() {
      /**
       * Widgets career level filters.
       */
      var career_level_modal = false, career_level_timeout = false;

      /* add inputs to form. */
      $('.widget-career-level').on('change', 'input[name="career-levels[]"]', function () {
        
          $('.jobboard-archive-actions').find('input[name="career-levels[]"]').remove();

          $('.widget-career-level input[type="checkbox"]:checked').each(function () {
              $('.jobboard-archive-actions').append('<input type="hidden" name="career-levels[]" value="' + $(this).val() + '" />');
          });
          career_level_modal = true;
      });

      
      /* click to career level inputs. */
      $('.widget-career-level').on('click', '.widget-content > ul > li:not(:last-child)', function () {
          if (career_level_timeout == true) {
              return
          }
          setTimeout(function () {
              submit_ordering_form()
          }, 1000);
          career_level_timeout = true;
      });

      /* click out side career level modal. */
      $('.md-overlay').on('click', function () {
          if (career_level_modal == true) {
              submit_ordering_form();
          }
          career_level_modal = false;
      });

      /* click close career level modal. */
      $('.widget-career-level').on('click', '.md-close', function () {
          if (career_level_modal == true) {
              submit_ordering_form();
          }
          career_level_modal = false;
      });

      /* enter key to career level. */
      $('.widget-career-level').on('keypress', (function (e) {
          if (e.which == 13) {
              submit_ordering_form();
          }
      }));
    }

    function submit_ordering_form() {
      $('.jobboard-archive-actions').submit();
    }

    careerLevelHandler();





    function equalizeHeights() {
      var pathname = window.location.pathname;
      if (pathname.includes('about-us')) {
        $(window).ready(function() {
          var panels = document.querySelectorAll('.carousel-item');
          var content = document.querySelectorAll('#testimonialCarousel')
          var maxHeight = 0;
    
          panels.forEach(function(item) {
            var tempHeight = item.offsetHeight;
    
            if (tempHeight > maxHeight) {
              maxHeight = tempHeight;
            }
          });

          var heightFinal = maxHeight + 96;
    
          content.forEach(function(item) {
            item.style.height = heightFinal + "px";
          });
        });
      };
    }; 
    
    // Can be used without the jquery call below, calls the function on resize
    
    $(window).resize(lodash.debounce(function() {
      equalizeHeights();
    }, 300));
    
    equalizeHeights();
	});

})(jQuery, this);
