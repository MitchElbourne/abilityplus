
<div class="modal fade" id="LogInModal" tabindex="-1" role="dialog" aria-labelledby="LogInModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><?php echo get_template_part('/assets/svg/icon-cancel.svg');?></span>
      </button>
      <div class="introduction">
        <h2 class="h1">Log In</h2>
        <span class="modal-cta">Don't have an account? <a data-target="#SignUpModal" data-toggle="modal" class="bold sign-up-cta-modal">Sign up instead</a></span>
      </div>

      <?php jb_template_login_from(); ?>

    </div>
  </div>
</div>