
    </div class="wrapper">
    <footer id="site-footer">
      <div class="container">
        <!-- Logo -->
        <a href="<?php echo esc_url(site_url('/')); ?>">
          <img src="<?php echo get_theme_file_uri('/assets/svg/logo-ability-plus.svg'); ?>" alt="Ability Plus Logo" class="footer-logo">
        </a>


        <div class="information-container">
          <div class="services">
            <h5 class="p">Services</h5>
            <div class="content">
              <div class="find-jobs">
                <img src="<?php echo get_theme_file_uri('/assets/svg/icon-list.svg'); ?>" alt="Job sheet icon showing vacancies">
                <p>See the available jobs on our list</p>
                <a href="<?php echo esc_url(site_url('/vacancies')); ?>">Find Jobs <?php echo get_template_part('/assets/svg/icon-inline-arrow-right.svg'); ?></a>
              </div>
              <div class="find-talent">
                <img src="<?php echo get_theme_file_uri('/assets/svg/icon-candidate.svg'); ?>" alt="Receptionist icon detailing candidates and their abiltity">
                <p>Best candidates on the Isle of Man</p>
                <a href="">Find Talent <?php echo get_template_part('/assets/svg/icon-inline-arrow-right.svg'); ?></a>
              </div>
            </div>
          </div>

          <div class="company">
            <h5 class="p">Company</h5>
            <a href="<?php echo esc_url(site_url('/about-us')); ?>" class="grey">About us</a>
            <a href="<?php echo esc_url(site_url('/blog')); ?>" class="grey">Blog</a>
            <a href="<?php echo esc_url(site_url('/contact')); ?>" class="grey">Contact</a>
          </div>


          <!-- Resources -->
          <!-- <div class="resources">
            <h5 class="p">Resources</h5>
            <a href="<?php echo esc_url(site_url('/')); ?>" class="grey">Career Tools</a>
            <a href="<?php echo esc_url(site_url('/')); ?>" class="grey">Govt. Forms</a>
            <a href="<?php echo esc_url(site_url('/')); ?>" class="grey">Relocating</a>
            <a href="<?php echo esc_url(site_url('/')); ?>" class="grey">Time Sheet</a>
          </div> -->



          <div class="contact-information">
            <h5 class="p">Contact Information</h5>
            <p>22 Athol Street, Douglas Isle of Man – 662165</p>
            <a href="mailto:employment@abilityplus.co.im" class="email">employment@abilityplus.co.im</a>
            <a href="<?php echo esc_url('https://www.linkedin.com/company/ability-plus-isleofman/'); ?> " target="_blank" class="social dark"><?php echo get_template_part('/assets/svg/icon-inline-logo-linkedin.svg'); ?>LinkedIn</a>
            <span class="break">|</span>

            <a href="<?php echo esc_url('http://twitter.com/abilityplusiom'); ?>" target="_blank" class="social dark"><?php echo get_template_part('/assets/svg/icon-inline-logo-twitter.svg'); ?>Twitter</a>
          </div>


        </div><!--information-container-->



        <div class="legal-row">
          <span class="copyright">&copy; 2019 AbilityPlus All Rights Reserved.</span>
          <a href="<?php echo esc_url(site_url('/terms-privacy')); ?>" class="terms-and-policie bold dark">Terms and policies</a>
        </div>
      </div>
    </footer><!--#site-footer-->


    <?php wp_footer(); ?>
  </body>
</html>
