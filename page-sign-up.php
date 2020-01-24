<?php

get_header();

?>
<main role="main">
  <section id="sign-up-form">
    <div class="container">
      <div class="introduction">
        <h1>Sign Up</h1>
        <!-- Old log in modal cta -->
        <!-- <span class="modal-cta">Already have an account? <a data-target="#LogInModal" data-toggle="modal" class="bold log-in-cta-modal">Log in instead</a></span> -->
        <span class="modal-cta">Already have an account? <a href="<?php echo esc_url(site_url('/profile')); ?>" class="bold log-in-cta-modal">Log in instead</a></span>
        </div>
        <div class="information-container">
          <div class="information">
            <p class="h5 bold">Register and let us start assisting you in the next chapter in your career journey.</p>
            <p class="text">In order to personalise your experience and have a clear user profile, we need you to follow and complete the new candidate registration form below.</p>
            <p class="meta small">Your data is safe with us. Please read our <a href="<?php echo esc_url(site_url('/terms-privacy')); ?>">Terms of Service and Privacy Policy</a> for more information.</p>
          </div>
          <div class="image-wrapper">
            <img src="<?php echo get_theme_file_uri('/assets/illus-sign-up.png'); ?>" alt="Sign up illustration, woman with sign up form and pen">
          </div>
        </div>
        <?php $success = JB()->session->get('jb_notices', array());
          if(!$success['success']) {
            ?>
            <h2 class="mb-2 h4">Please fill out your details:</h2>
            <?php
          }
        ?>
        <?php echo do_shortcode('[jobboard_register_account]'); ?>
    </div><!--container-->
  </section><!--#sign-up-form-->
</main>

<?php
  get_footer();
?>
