<?php
get_header();
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
$specialismUrl = '/vacancies/?layout=list&post_type=jobboard-post-jobs&specialism-filters%5B%5D=' . $specialism[0]->term_id;

?>

<main>
  <section id="single-job-navigation">
    <div class="container">
      <a href="<?php echo esc_url(site_url('/vacancies')); ?>"><span class="flip-arrow"><?php echo get_template_part('/assets/svg/icon-inline-arrow-right.svg'); ?></span>Back to all jobs</a>

      <?php print_r($specialism[0]->term_id); ?>
      <a href="<?php echo esc_url(site_url($specialismUrl)) ?>">See more <?php echo $specialism[0]->name; ?> jobs<span><?php echo get_template_part('/assets/svg/icon-inline-arrow-right.svg'); ?></span></a>
    </div><!--container-->
  </section><!--#single-job-navigation-->

  <section id="job-single">
    <div class="container">
      <h1><?php echo get_the_title(); ?></h1>
      <p class="posttime"><?php echo $timeposted; ?></p>
      <hr />
      <p class="salary"><span class="icon"></span><?php echo jb_job_get_salary(); ?></p>
      <p class="location"><span class="icon"></span><?php echo jb_job_location_text(); ?></p>
      <p class="job-id">ID: <?php echo get_the_ID(); ?></p>
    </div><!--container-->
  </section><!--#job-single-->


  <section id="job-ctas">
    <div class="container">
      <p class="bookmark">
        <?php jb_template_widget_basket_button_loop(); ?>
        Bookmark
      </p>
      <div class="break"></div>
      <p class="share">
        Share with:
        <span></span>
      </p>

      <?php  
      if(!is_user_logged_in()) {
        ?>
        <button type="button" class="cta-blue" data-target="#LogInModal" data-toggle="modal">
        <?php esc_html_e('Apply For Job', JB_TEXT_DOMAIN); ?>
        </button>
        <?php
      } else {
        ?>
        <button type="button" class="cta-blue button md-trigger" data-modal="jobboard-modal-apply">
          <?php esc_html_e('Apply For Job', JB_TEXT_DOMAIN); ?>
        </button>
        <?php
      } ?>

    </div>
  </section><!--#job-ctas-->

  <section id="single-job-content">
    <div class="container">
      
    </div><!--container-->
  </section><!--#single-job-content-->
</main>


<?php
get_footer();
?>