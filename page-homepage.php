<?php
get_header();
?>

<main role="main">
  <section id="introduction">
    <div class="container">
      <div class="row">
        <h1 class="col-12 col-lg-7 col-md-9 m-auto">Planning your next career journey?</h1>
        <p class="text col-12 col-lg-6 col-md-9">We understand a small step in a new direction is a giant leap. You may be unsure of the destination, so let us assist with your direction.</p>
        <div class="cta-container col-12">
          <a title='Sign Up' href='<?php echo esc_url(site_url('/profile/sign-up')); ?>' class="bold">Sign Up</a>
          <a title="How we work" href="#how-we-work" class="bold">How We Work</a>
        </div>
        <div class="panel-container">
          <div class="panel">
            <img src="" alt="">
            <p class="h5 bold">Connect professionals to the best jobs</p>
            <p class="sub-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse maximus.</p>
            <a href="<?php echo esc_url(site_url('#')); ?>"><span class="icon"><?php echo get_template_part('/assets/svg/icon-inline-arrow-right.svg'); ?></span></a>
          </div>
          <div class="panel">
            <img src="" alt="">
            <p class="h5 bold">Find IOM talent for your open positions</p>
            <p class="sub-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse maximus.</p>
            <a href="<?php echo esc_url(site_url('#')); ?>"><span class="icon"><?php echo get_template_part('/assets/svg/icon-inline-arrow-right.svg'); ?></span></a>
          </div>
          <div class="panel">
            <img src="" alt="">
            <p class="h5 bold">New jobs every week</p>
            <p class="sub-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse maximus.</p>
            <a href="<?php echo esc_url(site_url('/vacancies')); ?>"><span class="icon"><?php echo get_template_part('/assets/svg/icon-inline-arrow-right.svg'); ?></span></a>
          </div>
        </div>
      </div><!--row-->
    </div><!--container-->
  </section><!--#introduction-->


</main>

<?php 

get_footer();
?>