<?php
get_header();
?>

<main role="main">
  <section id="introduction">
    <div class="container">
      <div class="row">
        <h1 class="col-12 col-lg-8 col-md-9 m-auto">Planning your next career journey?</h1>
        <p class="text col-12 col-lg-6 col-md-9">We understand a small step in a new direction is a giant leap. You may be unsure of the destination, so let us assist with your direction.</p>
        <div class="cta-container col-12">
          <a title='Sign Up' href='<?php echo esc_url(site_url('/profile/sign-up')); ?>' class="bold">Sign Up</a>
          <a title="How we work" href="#how-we-work" class="bold">How We Work</a>
        </div>
        <div class="panel-container">
          <div class="panel">
            <img src="<?php echo get_theme_file_uri('/assets/icon-introduction-handshake.png'); ?>" alt="Connect with proffessionals">
            <p class="h5 bold">Connect professionals to the best jobs</p>
            <p class="sub-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse maximus.</p>
            <a href="<?php echo esc_url(site_url('#')); ?>"><span class="icon"><?php echo get_template_part('/assets/svg/icon-inline-arrow-right.svg'); ?></span></a>
          </div>
          <div class="panel">
            <img src="<?php echo get_theme_file_uri('/assets/icon-introduction-magnifying-glass.png'); ?>" alt="Search for jobs and positions talent">
            <p class="h5 bold">Find IOM talent for your open positions</p>
            <p class="sub-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse maximus.</p>
            <a href="<?php echo esc_url(site_url('#')); ?>"><span class="icon"><?php echo get_template_part('/assets/svg/icon-inline-arrow-right.svg'); ?></span></a>
          </div>
          <div class="panel">
            <img src="<?php echo get_theme_file_uri('/assets/icon-introduction-newspaper.png'); ?>" alt="Find new jobs every week">
            <p class="h5 bold">New jobs every week</p>
            <p class="sub-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse maximus.</p>
            <a href="<?php echo esc_url(site_url('/vacancies')); ?>"><span class="icon"><?php echo get_template_part('/assets/svg/icon-inline-arrow-right.svg'); ?></span></a>
          </div>
        </div><!--panel-container-->
      </div><!--row-->
    </div><!--container-->
  </section><!--#introduction-->



  <section id="how-we-work">
    <div class="container">
      <div class="row">
        <h2 class="h3 m-auto col-12 col-lg-8 col-md-9">How We Work</h2>
        <p class="text col-12 col-md-8">With AbilityPlus, it’s easy to create an application, get exposure to recruiters and interview for your next job.</p>
        <div class="panel-container col-12 col-md-10 m-auto">
          <div class="panel">
            <div class="content">
              <div class="icon-wrapper" style="background-image: url(<?php echo get_theme_file_uri('/assets/svg/icon-howwework-number-1.svg'); ?>);"></div>
              <h3 class="h5">Registering with AbilityPlus</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis enim aliquam, porttitor mauris sed, rhoncus lorem. In nibh enim, bibendum at lorem eu, condimentum tempor nisl.</p>
            </div>
            <div class="image-wrapper" style="background-image: url('<?php echo get_theme_file_uri('/assets/illus-howwework-register.png'); ?>');'"></div>
          </div>

          <div class="panel">
            <div class="content">
              <div class="icon-wrapper" style="background-image: url(<?php echo get_theme_file_uri('/assets/svg/icon-howwework-number-2.svg'); ?>);"></div>
              <h3 class="h5">CV & Cover letter review</h3>
              <p>Integer aliquam sem porttitor enim mollis finibus. Vestibulum metus odio, vulputate ac dapibus sit amet, posuere nec erat. Fusce bibendum risus eu mauris sollicitudin, in facilisis dui venenatis.<br />
              Phasellus eget pretium neque. Sed eget nunc vitae eros venenatis mollis sed in ipsum. Donec egestas faucibus volutpat.</p>
            </div>
            <div class="image-wrapper" style="background-image: url('<?php echo get_theme_file_uri('/assets/illus-howwework-cv-cover.png'); ?>');'"></div>
          </div>

          <div class="panel">
            <div class="content">
              <div class="icon-wrapper" style="background-image: url(<?php echo get_theme_file_uri('/assets/svg/icon-howwework-number-3.svg'); ?>);"></div>
              <h3 class="h5">Targeted job searches</h3>
              <p>Vivamus mollis risus metus, eget imperdiet velit lacinia eu. Etiam ut consectetur massa. Donec facilisis, mauris ut sagittis fringilla, elit dolor malesuada nulla, at ultrices nibh risus id nisi. Mauris auctor posuere tortor non mattis.</p>
            </div>
            <div class="image-wrapper" style="background-image: url('<?php echo get_theme_file_uri('/assets/illus-howwework-job-search.png'); ?>');'"></div>
          </div>

          <div class="panel">
            <div class="content">
              <div class="icon-wrapper" style="background-image: url(<?php echo get_theme_file_uri('/assets/svg/icon-howwework-number-4.svg'); ?>);"></div>
              <h3 class="h5">Interviews</h3>
              <p>Vivamus mollis risus metus, eget imperdiet velit lacinia eu. Etiam ut consectetur massa. Donec facilisis, mauris ut sagittis fringilla, elit dolor malesuada nulla, at ultrices nibh risus id nisi. Mauris auctor posuere tortor non mattis.</p>
            </div>
            <div class="image-wrapper" style="background-image: url('<?php echo get_theme_file_uri('/assets/illus-howwework-interview.png'); ?>');'"></div>
          </div>

          <div class="panel">
            <div class="content">
              <div class="icon-wrapper" style="background-image: url(<?php echo get_theme_file_uri('/assets/svg/icon-howwework-number-5.svg'); ?>);"></div>
              <h3 class="h5">Get the right job</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis enim aliquam, porttitor mauris sed, rhoncus lorem. In nibh enim, bibendum at lorem eu, condimentum tempor nisl.</p>
            </div>
            <div class="image-wrapper" style="background-image: url('<?php echo get_theme_file_uri('/assets/illus-howwework-handshake.png'); ?>');'"></div>
          </div>
        </div><!--panel-container-->
      </div><!--row-->
    </div><!--container-->
  </section><!--#how-we-work-->



 
</main>

<?php 

get_footer();
?>