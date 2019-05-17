
<div class="modal fade" id="SignUpModal" tabindex="-1" role="dialog" aria-labelledby="LogInModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><?php echo get_template_part('/assets/svg/icon-cancel.svg');?></span>
      </button>
      <div class="introduction">
        <h2 class="h1">Sign Up</h2>
        <span class="modal-cta">Already have an account? <a data-target="#LogInModal" data-toggle="modal" class="bold log-in-cta-modal">Log in instead</a></span>
      </div>
      <?php echo do_shortcode('[jobboard_register_account]'); ?>
      <span id="JB_Validate_Modal" class="sr-only <?php if(JB()->session->{'validate'}) echo "Not-Validated" ?>"></span>
    </div>
  </div>
</div>