
<div class="modal fade" id="LogInModal" tabindex="-1" role="dialog" aria-labelledby="LogInModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><?php echo get_template_part('/assets/svg/icon-cancel.svg');?></span>
      </button>
      
      <?php jb_template_login_from(); ?>
      <div class="image-wrapper">
        <img src="<?php echo get_theme_file_uri('/assets/illus-login.png'); ?>" alt="Log In Illustration, apply for vacancies">
      </div>
      </div>

    </div>
  </div>
</div>