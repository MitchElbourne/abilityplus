<?php
get_header();
$postsUncat = new WP_Query(array(

));

?>


<main>
  <section id="blog-listings">
    <div class="container">
      <h1 c;ass="title">AbilityPlus Blog</h1>
      <nav class="blog-tabs">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item active" id="uncategorized-posts" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo get_template_part('/assets/svg/icon-inline-check-inactive.svg'); ?>Uncatagorized</a>
          <a class="nav-item" id="job-seekers-posts" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><?php echo get_template_part('/assets/svg/icon-inline-check-inactive.svg'); ?>Job Seekers</a>
          <a class="nav-item" id="hiring-managers-posts" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><?php echo get_template_part('/assets/svg/icon-inline-check-inactive.svg'); ?>Hiring Managers</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="uncategorized-posts">


        </div>


        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="job-seekers-posts">

        
        </div>


        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="hiring-managers-posts">


        </div>
      </div>
    </div><!--container-->
  </section><!--#blog-listings-->
</main><!--main-->


<?php

get_footer();
?>