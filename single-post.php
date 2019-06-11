<?php
get_header();

if(have_posts()) {
  the_post();
  $category = get_the_category();
  $image = get_the_post_thumbnail_url();


  $fname = get_the_author_meta('first_name');
  $lname = get_the_author_meta('last_name');
  $full_name = '';

  if( empty($fname)){
      $full_name = $lname;
  } elseif( empty( $lname )){
      $full_name = $fname;
  } else {
      //both first name and last name are present
      $full_name = "{$fname} {$lname}";
  }
?>

<main role="main">
  <section id="article-container">
    <div class="container">
      <div class="row">


        <article class="col-12 col-lg-8 col-md-11 m-auto">


          <header>
            <a href="<?php echo esc_url(site_url('/blog')); ?>" class="cta-blue">AbilityPlus Blog</a>
            <h1><?php echo get_the_title(); ?></h1>
            <span><?php print_r($category[0]->name); ?> / <?php echo date('M d, Y', strToTime(get_the_date())); ?></span>
          </header><!--header-->

          <?php if($image) { ?>
            <div class="image-wrapper" style="background-image: url('<?php echo $image ?>')">
            </div>
    <?php } ?>

          <div class="content">
            <?php the_content(); ?>
          </div>

          <footer>
            <p class="post-meta"><span class="author"><?php echo $full_name ?></span> - <?php echo date('M d, Y', strToTime(get_the_date())); ?></p>
          </footer><!--footer-->

        </article>

        <div class="blog-recommendations col-lg-9 col-md-11 m-auto">

            <?php
            $prevPost = get_previous_post(true);
            $nextPost = get_next_post(true);
            if(!$nextPost && !$prevPost) { ?>
            <h4>No Posts to Recommend</h4>
      <?php } else { ?>



              <?php
              if($nextPost) { ?>
                <article class="<?php if($nextPost && $prevPost) echo "with-border" ?>">
                  <div class="image-wrapper" style="background-image: url('<?php  echo get_the_post_thumbnail_url($nextPost->ID); ?>)"></div>
                  <h3 class="h5 title"><?php echo get_the_title($nextPost->ID); ?></h3>
                  <p class="excerpt"><?php echo wp_trim_words(get_the_content($nextPost->ID), 20); ?></p>
                  <a href="<?php echo get_the_permalink($nextPost->ID); ?>"><span class="icon cta-arrow-right"><?php echo get_template_part('/assets/svg/icon-inline-arrow-right.svg'); ?></span></a>
                </article>
            <?php }


              if($prevPost) { ?>
                <article>
                  <div class="image-wrapper" style="background-image: url('<?php  echo get_the_post_thumbnail_url($prevPost->ID); ?>)"></div>
                  <h3 class="h5 title"><?php echo get_the_title($prevPost->ID); ?></h3>
                  <p class="excerpt"><?php echo wp_trim_words(get_the_content($prevPost->ID), 20); ?></p>
                  <a href="<?php echo get_the_permalink($prevPost->ID); ?>"><span class="icon cta-arrow-right"><?php echo get_template_part('/assets/svg/icon-inline-arrow-right.svg'); ?></span></a>
                </article>
            <?php }



            } ?>
        </div>

      </div><!--row-->
      <div class="cta-wrapper text-center">
        <a href="javascript:;" class="scroll-to-top">
          <span class="icon"></span>
          <span>Top</span>
        </a>
      </div>
    </div><!--container-->
  </section><!--#article-container-->
</main>



<?php
}
get_footer();
?>
