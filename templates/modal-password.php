<div class="modal fade" id="PasswordModal" tabindex="-1" role="dialog" aria-labelledby="Reset Password Form" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <?php $error = JB()->session->get('jb_notices', array()); ?>
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><?php echo get_template_part('/assets/svg/icon-cancel.svg');?></span>
      </button> 

      <div class="introduction">
        <h2 class="h1">Forget your password?</h2>
        <p class="text">Don't worry! Simply enter in your registered email address, and we'll help you out.</p>
      </div>

        <?php echo do_shortcode('[jobboard_register_forgot_password]'); ?>
        
        <?php if($error['error'][0] == "Error : You need to enter an email address.") { ?>
          <span id="Password_Validate_Modal" class="Not-Validated error">Please enter in an Email</span>
          
        <?php } ?>

    </div>
  </div>
</div>