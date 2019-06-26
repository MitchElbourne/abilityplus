<?php
get_header();
the_post();
$post_date = get_the_time('U');
$delta = time() - $post_date;

if ( $delta < 60 ) {
    $timeposted = 'less than a minute ago';
}
elseif ($delta > 60 && $delta < 120){
    $timeposted = 'about a minute ago';
}
elseif ($delta > 120 && $delta < (60*60)){
    $timeposted = strval(round(($delta/60),0)) . " minutes ago";
}
elseif ($delta > (60*60) && $delta < (120*60)){
    $timeposted = 'about an hour ago';
}
elseif ($delta > (120*60) && $delta < (24*60*60)){
    $timeposted = strval(round(($delta/3600),0)) . " hours ago";
}
elseif ($delta > (3*7*24*60*60)) {
  $timeposted = "more than 3 weeks ago";
}
else {
  $timeposted = human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' );
}

$specialism = get_the_terms($post->ID, 'jobboard-tax-specialisms');
// Link provided will display the current specialism in the vacancies page
$specialismUrl = '/vacancies/?layout=list&post_type=jobboard-post-jobs&specialism-filters%5B%5D=' . $specialism[0]->term_id;

?>

<main>
  <section id="single-job-navigation">
    <div class="container">
      <a href="<?php echo esc_url(site_url('/vacancies')); ?>"><span class="flip-arrow"><?php echo get_template_part('/assets/svg/icon-inline-arrow-right.svg'); ?></span>Back to all jobs</a>

      <a href="<?php echo esc_url(site_url($specialismUrl)) ?>">See more <?php echo $specialism[0]->name; ?> jobs<span><?php echo get_template_part('/assets/svg/icon-inline-arrow-right.svg'); ?></span></a>
    </div><!--container-->
  </section><!--#single-job-navigation-->

  <section id="title">
    <div class="container">
      <h1><?php echo get_the_title(); ?></h1>
      <p class="posttime"><?php echo $timeposted; ?></p>
      <hr />
      <p class="salary">
        <span class="icon"><?php echo get_template_part('assets/svg/icon-inline-coins.svg'); ?></span>
        <?php


        $salary = jb_job_get_salary();

        if(strpos($salary, '-')) {
          $temp = explode(' - ', $salary);
          $count = 0;
          foreach ($temp as $key) {
            echo $finalKey = '£' . number_format((float) filter_var($key, FILTER_SANITIZE_NUMBER_INT));
            if($count == 0) echo " - ";
            $count++;
          }
        } elseif ($salary[0] == '&') {
          echo $finalKey = '£' . number_format((float) filter_var($salary, FILTER_SANITIZE_NUMBER_INT));
        } else {
          echo $salary;
        }
        ?>

      </p>
      <?php
      if(jb_job_location_text()) { ?>
        <p class="location"><span class="icon"><?php echo get_template_part('assets/svg/icon-inline-location.svg'); ?></span><?php echo jb_job_location_text(); ?></p>
<?php } ?>
      <p class="job-id">ID: <?php echo get_the_ID(); ?></p>
    </div><!--container-->
  </section><!--#job-single-->

  <section id="job-ctas">
    <div class="container">

      <!-- <p class="bookmark">
        <?php /* jb_template_widget_basket_button_loop(); */?>
        Bookmark
      </p> -->
      <!-- <div class="break"></div> -->
      <p class="share">
        Share with:
        <a href="http://www.linkedin.com/shareArticle?mini=false&url=<?php echo get_the_permalink(); ?>" target="_blank" class="social dark"><?php echo get_template_part('/assets/svg/icon-inline-logo-linkedin-grey.svg'); ?></a>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" target="_blank" class="social dark"><?php echo get_template_part('/assets/svg/icon-inline-logo-facebook-grey.svg'); ?></a>
        <a href="https://twitter.com/intent/tweet?url=click-to-tweet&text=<?php echo get_the_permalink(); ?>" target="_blank" class="social dark"><?php echo get_template_part('/assets/svg/icon-inline-logo-twitter-grey.svg'); ?></a>
      </p>

      <?php
      if(!is_user_logged_in()) {
        ?>
        <a class="cta-blue top-apply" href="<?php echo esc_url(site_url('/profile')); ?>">
          <?php esc_html_e('Apply for job', JB_TEXT_DOMAIN); ?>
        </a>
        <?php
      } else {
        ?>
        <button type="button" class="cta-blue button md-trigger" data-modal="jobboard-modal-apply">
          <?php esc_html_e('Apply for job', JB_TEXT_DOMAIN); ?>
        </button>
        <?php
      } ?>

    </div>
  </section><!--#job-ctas-->

  <section id="single-job-content">
    <div class="container">
      <div class="job-meta">
      <?php
      $companyDisplayName = get_post_meta($post->ID, '_customer_display_name', true);
      $companyWebsiteUrl = get_post_meta($post->ID, '_customer_url', false);


      if($companyDisplayName || $companyWebsiteUrl) { ?>
        <div class="company-info">
          <?php if($companyDisplayName) echo "<p class='bold'>" . $companyDisplayName . "</p>"; ?>
          <?php if($companyWebsiteUrl) {
            ?>
            <a href="<?php echo esc_url($companyWebsiteUrl[0]); ?>">
              <span class='icon'>
                <?php echo get_template_part('assets/svg/icon-inline-link.svg'); ?>
              </span>
              Website
            </a>
            <?php } ?>
        </div>
<?php } ?>


        <p class="meta-field">
          <span class="icon"><?php echo get_template_part('assets/svg/icon-inline-coins.svg'); ?>
          </span>
          <?php
            if(strpos($salary, '-')) {
              $temp = explode(' - ', $salary);
              $count = 0;
              foreach ($temp as $key) {
                echo $salary = '£' . number_format((float) filter_var($key, FILTER_SANITIZE_NUMBER_INT));
                if($count == 0) echo " - ";
                $count++;
              }
            } elseif ($salary[0] == '&') {
              echo $salary = '£' . number_format((float) filter_var($salary, FILTER_SANITIZE_NUMBER_INT));
            } else {
              echo $salary;
            }
          ?>
        </p>
        <?php
        if (jb_job_location_text()) { ?>
          <p class="meta-field"><span class="icon"><?php echo get_template_part('assets/svg/icon-inline-location.svg'); ?></span><?php echo jb_job_location_text(); ?></p>
  <?php } ?>
        <p class="meta-field"><span class="icon"><?php echo get_template_part('assets/svg/icon-inline-briefcase.svg'); ?></span><?php echo $specialism[0]->name; ?></p>

        <div class="vacancy-type">
          <?php
          $types = get_the_terms($post->ID, 'jobboard-tax-types');
          if($types) {
            foreach($types as $type) {
              ?>
                <span class="job-meta types"><?php echo get_template_part('/assets/svg/icon-inline-job-type.svg'); ?><?php echo $type->name; ?></span>
              <?php
            }
          } ?>
        </div>



      </div>
      <div class="job-information">
        <h2 class="h4">Job Overview</h2>
        <?php echo get_the_content(); ?>


        <div class="job-meta-tags">
          <?php

            $specialism = get_the_terms($post->ID, 'jobboard-tax-specialisms');
            if($specialism) {
              foreach($specialism as $spec) {
                ?>
                  <span class="job-meta specialism"><?php echo $spec->name; ?></span>
                <?php
              }
            }

            $types = get_the_terms($post->ID, 'jobboard-tax-types');
            if($types) {
              foreach($types as $type) {
                ?>
                  <span class="job-meta types"><?php echo get_template_part('/assets/svg/icon-inline-job-type.svg'); ?><?php echo $type->name; ?></span>
                <?php
              }
            }

          ?>
        </div>
      </div>

    </div><!--container-->
    <div class="cta-container">
      <?php
      if(!is_user_logged_in()) {
        ?>
        <a class="cta-blue" href="<?php echo esc_url(site_url('/profile')); ?>">
          <?php esc_html_e('Apply for job', JB_TEXT_DOMAIN); ?>
        </a>
        <?php
      } else {
        ?>
        <button type="button" class="cta-blue button md-trigger h6" data-modal="jobboard-modal-apply">
          <?php esc_html_e('Apply for job', JB_TEXT_DOMAIN); ?>
        </button>
        <?php
      } ?>
      <p class="share">
        Share with:
        <a href="http://www.linkedin.com/shareArticle?mini=false&url=<?php echo get_the_permalink(); ?>" target="_blank" class="social dark"><?php echo get_template_part('/assets/svg/icon-inline-logo-linkedin-grey.svg'); ?></a>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" target="_blank" class="social dark"><?php echo get_template_part('/assets/svg/icon-inline-logo-facebook-grey.svg'); ?></a>
        <a href="https://twitter.com/intent/tweet?url=click-to-tweet&text=<?php echo get_the_permalink(); ?>" target="_blank" class="social dark"><?php echo get_template_part('/assets/svg/icon-inline-logo-twitter-grey.svg'); ?></a>
      </p>
    </div>
  </section><!--#single-job-content-->


  <section id="single-job-navigation-mobile">
    <div class="container">
      <a href="<?php echo esc_url(site_url('/vacancies')); ?>"><span class="flip-arrow"><?php echo get_template_part('/assets/svg/icon-inline-arrow-right.svg'); ?></span>Back to all jobs</a>
    </div><!--container-->
  </section><!--#single-job-navigation-mobile-->
</main>


<?php
get_footer();
?>
