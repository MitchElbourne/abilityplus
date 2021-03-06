<?php
get_header();
$postsPerPage = 6;
?>


<main role="main">
  <section id="blog-listings">
    <div class="container">
      <h1 class="title">AbilityPlus Blog</h1>
        <nav class="blog-tabs">
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item active" id="uncategorized-posts" data-toggle="tab" href="#nav-uncategorized" role="tab" aria-controls="nav-uncategorized" aria-selected="true"><?php echo get_template_part('/assets/svg/icon-inline-check-inactive.svg'); ?>All</a>
            <a class="nav-item" id="job-seekers-posts" data-toggle="tab" href="#nav-job-seekers" role="tab" aria-controls="nav-job-seekers" aria-selected="false"><?php echo get_template_part('/assets/svg/icon-inline-check-inactive.svg'); ?>Job Seekers</a>
            <a class="nav-item" id="hiring-managers-posts" data-toggle="tab" href="#nav-hiring-managers" role="tab" aria-controls="nav-hiring-managers" aria-selected="false"><?php echo get_template_part('/assets/svg/icon-inline-check-inactive.svg'); ?>Hiring Managers</a>
          </div>
        </nav>
      <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade show active" id="nav-uncategorized" role="tabpanel" aria-labelledby="uncategorized-posts">
          <?php
          $postsUncat = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => -1,
          ));

          // function getPostData($id) {
          //   return get_post($id);
          // }
          if($postsUncat->have_posts()) {
            $postIDArray = [];
            if($postsUncat) {
              for($i = 0; $i < $postsUncat->post_count; $i++) {
                $postsUncat->the_post();
                $postIDArray[$i] = get_the_ID();
              }
            }

            $pageCount = floor((count($postIDArray) -1) / $postsPerPage);

          ?>
          <div class="article-container">
            <?php

            if($pageCount == 0) {
              foreach($postIDArray as $postID) {
                wp_reset_query();
                $singlePostJobSeekers = get_post($postID);

                if($singlePostJobSeekers->post_excerpt) {
                  $excerpt = $singlePostJobSeekers->post_excerpt;
                } else {
                  $excerpt = wp_trim_words($singlePostJobSeekers->post_content, 20);
                }
                ?>

                <article class="blog-post">
                  <a class="image-title-cta-wrapper" href="<?php echo get_the_permalink($postID); ?>">
                    <div class="image-wrapper" style='background-image: url("<?php echo get_the_post_thumbnail_url($postID); ?>");'></div>
                    <h2 class="h5"><?php echo get_the_title($postID); ?></h2>
                  </a>
                  <p class="excerpt"><?php echo $excerpt; ?></p>
                  <a href="<?php echo get_the_permalink($postID); ?>" class="arrow-cta"><span class="icon cta-arrow-right"><?php echo get_template_part('/assets/svg/icon-inline-arrow-right.svg'); ?></span></a>
                </article>

                <?php
              } // For each loop if only one tab
            } else {



              ?> <ul class="nav nav-pills" id="paginationTab" role="tablist"> <?php
              for($i = 0; $i <= $pageCount; $i++) {
                $index = $i+1;
                ?>
                <li class="nav-item">
                  <a class="nav-link <?php if($index == 1) echo "active"; ?>" id="pills-<?php echo $index ?>-tab" data-toggle="pill" href="#pills-<?php echo $index; ?>" role="tab" aria-controls="pills-<?php echo $index; ?>" aria-selected="true"><?php echo $index; ?></a>
                </li>
                <?php
              }
              ?> </ul><!--nav-pills--><?php



              ?> <div class="tab-content" id="paginationTabContent"> <?php
              for($i = 0; $i <= $pageCount; $i++) {
                $index = $i+1;
                ?>
                <div class="tab-pane fade show <?php if($index == 1) echo "active"; ?>" id="pills-<?php echo $index ?>" role="tabpanel" aria-labelledby="pills-<?php echo $index ?>-tab">
                  <?php
                  $postCounter = 0;

                  while(count($postIDArray) > 0 && $postCounter - $postsPerPage !== 0) {
                    $excerpt = wp_trim_words(get_post($postIDArray[0])->post_content, 16);
                    ?>

                    <article class="blog-post">
                      <a class="image-title-cta-wrapper" href="<?php echo get_the_permalink($postIDArray[0]); ?>">
                        <div class="image-wrapper" style='background-image: url("<?php echo get_the_post_thumbnail_url($postIDArray[0]); ?>");'></div>
                        <h2 class="h5"><?php echo get_the_title($postIDArray[0]); ?></h2>
                      </a>
                      <p class="excerpt"><?php echo $excerpt; ?></p>
                      <a href="<?php echo get_the_permalink($postIDArray[0]); ?>" class="arrow-cta"><span class="icon cta-arrow-right"><?php echo get_template_part('/assets/svg/icon-inline-arrow-right.svg'); ?></span></a>
                    </article>

                    <?php
                    array_shift($postIDArray); // Remove the post ID from the array once displayed
                    $postCounter+=1; // To keep track of how many posts have been displayed
                  }

                  ?>
                </div><!--tab-pane-->
                <?php
              }
              ?> </div><!--nav-content--><?php

            } // Loop for pagination

            ?>
          </div><!--article-container-->

          <?php
          } else {
              echo '<h3>No posts found</h3>';
          }

          wp_reset_query();
          ?>

        </div><!--tab-pane-->


        <div class="tab-pane fade" id="nav-job-seekers" role="tabpanel" aria-labelledby="job-seekers-posts">
          <?php
          $postsJobSeekers = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'tax_query' => array(
              array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => 'jobseekers'
              )
            )));

          if($postsJobSeekers->have_posts()) {
            $postsIDArrayJobSeekers = [];
            if($postsJobSeekers) {
              for($i = 0; $i < $postsJobSeekers->post_count; $i++) {
                $postsJobSeekers->the_post();
                $postsIDArrayJobSeekers[$i] = get_the_ID();
              }
            }

            $pageCountJobSeekers = floor((count($postsIDArrayJobSeekers) -1) / $postsPerPage);

          ?>
          <div class="article-container">
            <?php

            if($pageCountJobSeekers == 0) {
              foreach($postsIDArrayJobSeekers as $postID) {
                wp_reset_query();
                $singlePostJobSeekers = get_post($postID);

                if($singlePostJobSeekers->post_excerpt) {
                  $excerpt = $singlePostJobSeekers->post_excerpt;
                } else {
                  $excerpt = wp_trim_words($singlePostJobSeekers->post_content, 20);
                }
                ?>

                <article class="blog-post">
                  <a class="image-title-cta-wrapper" href="<?php echo get_the_permalink($postID); ?>">
                    <div class="image-wrapper" style='background-image: url("<?php echo get_the_post_thumbnail_url($postID); ?>");'></div>
                    <h2 class="h5"><?php echo get_the_title($postID); ?></h2>
                  </a>
                  <p class="excerpt"><?php echo $excerpt; ?></p>
                  <a href="<?php echo get_the_permalink($postID); ?>" class="arrow-cta"><span class="icon cta-arrow-right"><?php echo get_template_part('/assets/svg/icon-inline-arrow-right.svg'); ?></span></a>
                </article>

                <?php
              } // For each loop if only one tab
            } else {



              ?> <ul class="nav nav-pills" id="paginationTabJobSeekers" role="tablist"> <?php
              for($i = 0; $i <= $pageCountJobSeekers; $i++) {
                $index = $i+1;
                ?>
                <li class="nav-item">
                  <a class="nav-link <?php if($index == 1) echo "active"; ?>" id="pills-<?php echo $index ?>-jobseekers-tab" data-toggle="pill" href="#pills-<?php echo $index; ?>-jobseekers" role="tab" aria-controls="pills-<?php echo $index; ?>-jobseekers" aria-selected="true"><?php echo $index; ?></a>
                </li>
                <?php
              }
              ?> </ul><!--nav-pills--><?php



              ?> <div class="tab-content" id="paginationTabContentJobSeekers"> <?php
              for($i = 0; $i <= $pageCountJobSeekers; $i++) {
                $index = $i+1;
                ?>
                <div class="tab-pane fade show <?php if($index == 1) echo "active"; ?>" id="pills-<?php echo $index ?>-jobseekers" role="tabpanel" aria-labelledby="pills-<?php echo $index ?>-jobseekers-tab">
                  <?php
                  $postCounter = 0;

                  while(count($postsIDArrayJobSeekers) > 0 && $postCounter - $postsPerPage !== 0) {
                    $excerpt = wp_trim_words(get_post($postsIDArrayJobSeekers[0])->post_content, 16);
                    ?>

                    <article class="blog-post">
                      <a class="image-title-cta-wrapper" href="<?php echo get_the_permalink($postsIDArrayJobSeekers[0]); ?>">
                        <div class="image-wrapper" style='background-image: url("<?php echo get_the_post_thumbnail_url($postsIDArrayJobSeekers[0]); ?>");'></div>
                        <h2 class="h5"><?php echo get_the_title($postsIDArrayJobSeekers[0]); ?></h2>
                      </a>
                      <p class="excerpt"><?php echo $excerpt; ?></p>
                      <a href="<?php echo get_the_permalink($postsIDArrayJobSeekers[0]); ?>" class="arrow-cta"><span class="icon cta-arrow-right"><?php echo get_template_part('/assets/svg/icon-inline-arrow-right.svg'); ?></span></a>
                    </article>

                    <?php
                    array_shift($postsIDArrayJobSeekers); // Remove the post ID from the array once displayed
                    $postCounter+=1; // To keep track of how many posts have been displayed
                  }

                  ?>
                </div><!--tab-pane-->
                <?php
              }
              ?> </div><!--nav-content--><?php

            } // Loop for pagination

            ?>
          </div><!--article-container-->

          <?php
          } else {
              echo '<h3>No posts found</h3>';
          }

          wp_reset_query();
          ?>

        </div><!--tab-pane-->

        <div class="tab-pane fade" id="nav-hiring-managers" role="tabpanel" aria-labelledby="hiring-managers-posts">
          <?php
          $postsHiringManagers = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'tax_query' => array(
              array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => 'hiringmanagers'
              )
            )));

          if($postsHiringManagers->have_posts()) {
            $postsIDArrayHiringManagers = [];
            if($postsHiringManagers) {
              for($i = 0; $i < $postsHiringManagers->post_count; $i++) {
                $postsHiringManagers->the_post();
                $postsIDArrayHiringManagers[$i] = get_the_ID();
              }
            }

            $pageCountHiringManagers = floor((count($postsIDArrayHiringManagers) -1) / $postsPerPage);

          ?>
          <div class="article-container">
            <?php

            if($pageCountHiringManagers == 0) {
              foreach($postsIDArrayHiringManagers as $postID) {
                wp_reset_query();
                $singlePostHiringManagers = get_post($postID);

                if($singlePostHiringManagers->post_excerpt) {
                  $excerpt = $singlePostHiringManagers->post_excerpt;
                } else {
                  $excerpt = wp_trim_words($singlePostHiringManagers->post_content, 20);
                }
                ?>

                <article class="blog-post">
                  <a class="image-title-cta-wrapper" href="<?php echo get_the_permalink($postID); ?>">
                    <div class="image-wrapper" style='background-image: url("<?php echo get_the_post_thumbnail_url($postID); ?>");'></div>
                    <h2 class="h5"><?php echo get_the_title($postID); ?></h2>
                  </a>
                  <p class="excerpt"><?php echo $excerpt; ?></p>
                  <a href="<?php echo get_the_permalink($postID); ?>" class="arrow-cta"><span class="icon cta-arrow-right"><?php echo get_template_part('/assets/svg/icon-inline-arrow-right.svg'); ?></span></a>
                </article>

                <?php
              } // For each loop if only one tab
            } else {



              ?> <ul class="nav nav-pills" id="paginationTabHiringManagers" role="tablist"> <?php
              for($i = 0; $i <= $pageCountHiringManagers; $i++) {
                $index = $i+1;
                ?>
                <li class="nav-item">
                  <a class="nav-link <?php if($index == 1) echo "active"; ?>" id="pills-<?php echo $index ?>-hiringmanagers-tab" data-toggle="pill" href="#pills-<?php echo $index; ?>-hiringmanagers" role="tab" aria-controls="pills-<?php echo $index; ?>-hiringmanagers" aria-selected="true"><?php echo $index; ?></a>
                </li>
                <?php
              }
              ?> </ul><!--nav-pills--><?php



              ?> <div class="tab-content" id="paginationTabContentHiringManagers"> <?php
              for($i = 0; $i <= $pageCountHiringManagers; $i++) {
                $index = $i+1;
                ?>
                <div class="tab-pane fade show <?php if($index == 1) echo "active"; ?>" id="pills-<?php echo $index ?>-hiringmanagers" role="tabpanel" aria-labelledby="pills-<?php echo $index ?>-hiringmanagers-tab">
                  <?php
                  $postCounter = 0;

                  while(count($postsIDArrayHiringManagers) > 0 && $postCounter - $postsPerPage !== 0) {
                    $excerpt = wp_trim_words(get_post($postsIDArrayHiringManagers[0])->post_content, 16);
                    ?>

                    <article class="blog-post">
                      <a class="image-title-cta-wrapper" href="<?php echo get_the_permalink($postsIDArrayHiringManagers[0]); ?>">
                        <div class="image-wrapper" style='background-image: url("<?php echo get_the_post_thumbnail_url($postsIDArrayHiringManagers[0]); ?>");'></div>
                        <h2 class="h5"><?php echo get_the_title($postsIDArrayHiringManagers[0]); ?></h2>
                      </a>
                      <p class="excerpt"><?php echo $excerpt; ?></p>
                      <a href="<?php echo get_the_permalink($postsIDArrayHiringManagers[0]); ?>" class="arrow-cta"><span class="icon cta-arrow-right"><?php echo get_template_part('/assets/svg/icon-inline-arrow-right.svg'); ?></span></a>
                    </article>

                    <?php
                    array_shift($postsIDArrayHiringManagers); // Remove the post ID from the array once displayed
                    $postCounter+=1; // To keep track of how many posts have been displayed
                  }

                  ?>
                </div><!--tab-pane-->
                <?php
              }
              ?> </div><!--nav-content--><?php

            } // Loop for pagination

            ?>
          </div><!--article-container-->

          <?php
          } else {
              echo '<h3>No posts found</h3>';
          }

          wp_reset_query();
          ?>

        </div><!--tab-pane-->
      </div><!--tab-content-->




      <div class="monthy-newsletter">
        <h3 class="h3 m-auto">Monthly Newsletter</h3>
        <p class="text">Stay up to date with our latest news in recruitment and employment.</p>
        <div class="form-container">
          <?php echo get_template_part('/templates/newsletter-signup'); ?>
        </div>
      </div>
    </div><!--container-->





  </section><!--#blog-listings-->
</main><!--main-->


<?php

get_footer();
?>
