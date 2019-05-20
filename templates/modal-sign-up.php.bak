
<div class="modal fade" id="SignUpModal" tabindex="-1" role="dialog" aria-labelledby="LogInModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content row">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><?php echo get_template_part('/assets/svg/icon-cancel.svg');?></span>
      </button>
      <div class="introduction">
        <h2 class="h1">Sign Up</h2>
        <span class="modal-cta">Already have an account? <a data-target="#LogInModal" data-toggle="modal" class="bold log-in-cta-modal">Log in instead</a></span>
      </div>
      <div class="information-container">
        <div class="information">
          <p class="h5 bold">Register and let us start assisting you in the next chapter in your career journey.</p>
          <p class="text">In order to personalise your experience and have a clear user profile, we need you to follow and complete the new candidate registration form below.</p>
          <p class="meta">Your data is safe with us. Please read our <a href="<?php echo esc_url(site_url('/terms-privacy')); ?>">Terms of Service and Privacy Policy</a> for more information.</p>
        </div>
        <img src="" alt="" class="illustration">  
      </div>
      <?php echo do_shortcode('[jobboard_register_account]'); ?>
      <span id="JB_Validate_Modal" class="sr-only <?php if(JB()->session->{'validate'}) echo "Not-Validated" ?>"></span>
    </div>
  </div>
</div>