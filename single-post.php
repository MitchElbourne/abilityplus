<?php
get_header();
?>

<main id="blog-single" role="main">

  <?php if (have_posts()): while (have_posts()) : the_post(); ?>


    <article class="blog-article container">

      <header class="col-12 col-sm 10 offset-sm-1 col-md-8 offset-md-2">
        <div class="container">
          <a href="<?php echo home_url(); ?>/blog" class="blog-back cta-blue">AbilityPlus Blog</a>

          <h1><?php the_title(); ?></h1>

          <h2><?php
            $categories = get_the_category();
            if ( ! empty( $categories ) ) {
              echo esc_html( $categories[0]->name );
            } ?>
            /
            <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('j F Y'); ?></time>
          </h2>
        </div><!--container-->
      </header>

      <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 blog-img-container">
        <div class="blog-img-lead" style="background-image: url('<?php echo get_the_post_thumbnail_url(''); ?>')"></div>
      </div>


      <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 blog-content">
        <?php the_content(); ?>
      </div>


      <footer class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2">

        <div class="dotted-hr"></div>
        <span class="author"><?php echo get_the_author(); ?></span>

        &mdash;
        <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('j F Y'); ?></time>
      </footer>

    </article>

  <?php endwhile; ?>

  <?php else: ?>

  	<!-- article -->
  	<article>
  		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
  	</article>

  <?php endif; ?>

</main>

<section id="blog-recommendations">
  <div class="container">
    <div class="row">
      <div class="content col-12 col-md-10">
        <div class="blog-container">
          <?php
          $blogposts = new WP_Query(array(
            'post_type'       => 'post',
            'posts_per_page'  => 2,
          ));

          if($blogposts->have_posts()) {
            while($blogposts->have_posts()) {
              $blogposts->the_post();
              ?>
            <article>

              <a href="<?php the_permalink(); ?>">
                <div class="blog-thumbnail" style="background-image: url('<?php echo get_the_post_thumbnail_url(''); ?>')"></div>
              </a>

              <a href="<?php the_permalink(); ?>">
                <h3><?php the_title(); ?></h3>
              </a>

              <p class="excerpt"><?php echo wp_trim_words(get_the_content(), 20); ?></p>

              <a href="<?php echo esc_url(site_url('#')); ?>"><span class="icon cta-arrow-right"><?php echo get_template_part('/assets/svg/icon-inline-arrow-right.svg'); ?></span></a>
            </article>

          <?php }
          } ?>
      </div><!--blog-container-->
    </div><!--content-->
  </div><!--row-->
</section><!--#blog-recommendations-->


<?php
get_footer();
?>
