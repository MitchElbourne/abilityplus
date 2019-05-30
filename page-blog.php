<?php
get_header();
?>

<main id="blog-archive">


  <!-- Element: HEADER -->
  <header>
    <div class="container">
      <h1>AbilityPlus Blog</h1>
    </div>
  </header>



  <!-- Element: BLOG FILTER -->
  <div class="blog-filter container">
    <a href="#" class="active">
      <img src="<?php echo get_theme_file_uri('/assets/svg/icon-check-active.svg'); ?>" class="icon" />
      All Articles
    </a>
    <a href="#">
      <img src="<?php echo get_theme_file_uri('/assets/svg/icon-check-inactive.svg'); ?>" class="icon" />
      Job Seekers
    </a>
    <a href="#">
      <img src="<?php echo get_theme_file_uri('/assets/svg/icon-check-inactive.svg'); ?>" class="icon" />
      Hiring Managers
    </a>
  </div><!--blog-filter-->



  <!-- Element: BLOG LIST -->
  <section class="blog-list">
    <div class="container">

        <?php
          // the query
          $wpb_all_query = new WP_Query(
            array(
              'post_type'   => 'post',
              'post_status' => 'publish',
              'posts_per_page' => -1));
        ?>
        <?php if ( $wpb_all_query->have_posts() ) : ?>

          <div class="row">

            <!-- the loop -->
            <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>

              <div class="col col-12 col-md-4 blog-post">

                  <a href="<?php the_permalink(); ?>">
                    <div class="blog-thumbnail" style="background-image: url('<?php echo get_the_post_thumbnail_url(''); ?>')"></div>
                  </a>

                  <a href="<?php the_permalink(); ?>">
                    <h2><?php the_title(); ?></h2>
                  </a>

                  <p>Requires clamping, yeah. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                  <a href="<?php the_permalink(); ?>" class="arrow">
                    <img src="<?php echo get_theme_file_uri('/assets/svg/icon-arrow-right.svg'); ?>" class="icon" />
                  </a>

              </div><!--col-->

            <?php endwhile; ?>
            <!-- end of the loop -->

          </div><!--row-->

          <?php wp_reset_postdata(); ?>

        <?php else : ?>
          <p><?php _e( 'Sorry, no blog posts to show at this time.' ); ?></p>
        <?php endif; ?>

    </div><!--container-->
  </section><!--blog-list-->

</main>


<?php
get_footer();
?>
