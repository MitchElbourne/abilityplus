<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package CMSSuperHeroes
 * @subpackage Recruitment
 * @since Recruitment 1.0.9
 * @author CMSSuperHeroes Team
 */

$_get_page_sidebar = recruitment_page_sidebar();
get_header(); ?>

<main id="main" role="main" class="site-main">
  <div class="container">
  <!-- <div id="content" class="<?php recruitment_page_class(); ?> container"> -->

      <?php
      // Start the loop.
      while ( have_posts() ) : the_post();

          // Include the page content template.
          get_template_part( 'single-templates/content', 'page' );

          // If comments are open or we have at least one comment, load up the comment template.
          if ( comments_open() || get_comments_number() ) :
              comments_template();
          endif;
          // End the loop.
      endwhile;
      ?>

    <?php if($_get_page_sidebar != 'is-no-sidebar'):
    get_sidebar();
    endif; ?>
  <!-- </div> -->
  </div>
</main><!-- .site-main -->

<?php get_footer(); ?>