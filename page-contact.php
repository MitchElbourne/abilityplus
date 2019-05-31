<?php 
get_header();

?>

<main>
<section id="introduction">
    <div class="container">
      <div class="row">
        <h1 class="col-12 col-lg-8 col-md-9 m-auto">Contact Us</h1>
        <p class="h6 text col-12 col-lg-6 col-md-9">Let’s start our journey of professional collaboration together.<br />Send us a message or drop by our office.</p>
        <div class="contact-information col-12 col-md-10">
          <div class="address-information">
            <div class="address">
              <span class="icon"><?php echo get_template_part('/assets/svg/icon-inline-location.svg'); ?></span>
              <p>22 Athol Street, Douglas Isle of Man – 662165<br />
              Opening hours*:<br />
              Monday - Friday | 8.30 - 5.00pm
            </p>
            </div>

            <p class="telephone"><span class="icon"><?php echo get_template_part('/assets/svg/icon-inline-telephone.svg'); ?></span>01624 662165</p>
              
            <p class="email"><span class="icon"><?php echo get_template_part('/assets/svg/icon-inline-email.svg'); ?></span><a href="mailto:employment@abilityplus.co.im" class="email">employment@abilityplus.co.im</a></p>

            <span class="caption">*We are able to arrange interviews for candidates outside of normal office hours by prior arrangement.</span>
          </div><!--address-information-->


          <div class="connect-information">
            <h3 class="p">Connect with us:</h3>
            <a href="<?php echo esc_url('https://www.linkedin.com/company/ability-plus-isleofman/'); ?> " class="social dark"><?php echo get_template_part('/assets/svg/icon-inline-logo-linkedin.svg'); ?>LinkedIn</a>
            <span class="break">|</span>
            <a href="<?php echo esc_url('/http://twitter.com/abilityplusiom'); ?>" class="social dark"><?php echo get_template_part('/assets/svg/icon-inline-logo-twitter.svg'); ?>Twitter</a>
            <h3 class="p">Contact points</h3>
            <div class="contact-point">
            <span class="icon"><?php echo get_template_part('/assets/svg/icon-inline-avatar.svg');; ?></span> 
              <p>Anne Marie Hanna | Managing Director<br /><a href="mailto:anne@abilityplus.co.im">anne@abilityplus.co.im</a></p>
            </div>
          </div><!--connect-information-->
        </div><!--contact-information-->
      </div><!--row-->
    </div><!--container-->
  </section><!--#introduction-->



  <section id="contact-form">
    <div class="container">
      <div class="row">
        <div class="form-wrapper col-12 col-md-10 m-auto">
          <h2>Send us your inquiry</h2>
          <?php echo do_shortcode('[contact-form-7 title="Contact"]'); ?>
        </div>
      </div>
    </div>
  </section><!--#contact-form-->

  
</main>


<?php


get_footer();
?>
