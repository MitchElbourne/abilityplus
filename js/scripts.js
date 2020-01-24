(function ($, root, undefined) {

	$(function () {

		'use strict';

		var navbarOpen = false;

		function navBarHandler() {
			var nav = $('#primary-menu');
			var navToggler = $('#navbarIcon');

			navToggler.on('click', () => {
				alterIcon();
			})

			$(window).on('scroll', lodash.throttle(function() {
				if (nav.hasClass('show')) {
					nav.collapse('hide');
					nav.removeClass('show');
					alterIcon();
				}
			}, 500));

			$('body').bind('click', function(e) {
				if($(e.target).closest('.navbar').parent().length == 0) {
					if (nav.hasClass('show')) {
						nav.collapse('hide');
						nav.removeClass('show');
						alterIcon();
					}
				}
			});

			function alterIcon() {
				if(navbarOpen === false) {
					navToggler.addClass('open');
					navbarOpen = true;
				} else {
					navToggler.removeClass('open');
					navbarOpen = false;
				}
			}
		}
		navBarHandler();

		// Add the active class to the top level menu item on the profile page
		$(document).ready(function() {
			if(window.location.pathname == "/profile/") {
				$('.nav-dashboard').addClass('is-active');
			}
			if($('body').hasClass('single-post')) {
				$('a[title="Blog"]').parent().addClass('active');
				$('header#site-header').css('display', 'none');
			}
			if($('body').hasClass('single-jobboard-post-jobs')) {
				$('a[title="Vacancies"]').parent().addClass('active');
			}
		});


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

			$('.specialism-filters-apply').on('click', function () {
        submit_ordering_form()
	    });

    }
    modalLogic();

    $(document).ready(function() {
      $("#job_career levels").select2({
        dropdownParent: $("#SignUpModal")
      });
    });

		$('.cta-cancel').on('click', function() {
			console.log('wack');
			$('#jobboard-modal-apply').modal('hide');
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


    function ctaScrollTo() {
			var howwework = jQuery('.how-we-work-cta');
			var blogtotop = jQuery('.scroll-to-top');
			var navHeight = document.getElementById("site-header").offsetHeight;

			howwework.click(function(e) {
				$(window).scrollTo(
					"#how-we-work", {
						duration: 1000,
						offset: (-navHeight)
					})
			})

			blogtotop.click(function(e) {
				$(window).scrollTo(
					"#article-container", {
						duration: 1000,
						offset: (-navHeight)
					})
			})
		}
    ctaScrollTo();


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

      $(document).ready(function() {
        if($('body').hasClass('post-type-archive-jobboard-post-jobs') && $(window).width() < 561) {
          $('.sidebar-job-border .wg-title').each(function() {
            $(this).parent().find('.widget-content').slideToggle();
            $(this).parent().toggleClass('sidebar-effect');
          });
        }
      })

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


  $('body').on('click', '.basket-add', function (e) {
    e.preventDefault();
    var _this = $(this);
    var btn = $(this);
    var id  = btn.data('id');

    if(id === ''){
        return;
    }

    if(!_this.is('[data-modal]')){
        btn.prop('disabled', true);
        btn.find('.cart').css('display', 'none');
        btn.find('.jobboard-loading').attr('style', '');
        $.post(jobboard_localize_basket.ajaxurl, {'action': 'jobboard_basket_ajax_add', 'id': id}, function(response) {
            jobboard_create_notices(response.message, response.type);
            if(response.type === 'error'){
                btn.prop('disabled', false);
                btn.find('.cart').attr('style', '');
                btn.find('.jobboard-loading').css('display', 'none');
            } else {
                update_basket();
                console.log("Added to basket");
                btn.removeClass('basket-add').addClass('basket-added');
                btn.find('.cart').attr('style', '');
                btn.find('.jobboard-loading').css('display', 'none');
                btn.find('.add').css('display', 'none');
                btn.find('.added').attr('style', '');
            }
        });
    }

	});


})(jQuery, this);
