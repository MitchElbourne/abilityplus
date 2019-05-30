<?php
get_header();
?>





<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>






<main role="main" class="container">

  <?php if (have_posts()): while (have_posts()) : the_post(); ?>


    <article class="blog-article">

      <div class="title">
        <h3><?php the_title(); ?></h3>
      </div>







    </article>

  <?php endwhile; ?>

  <?php else: ?>

  	<!-- article -->
  	<article>
  		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
  	</article>

  <?php endif; ?>

</main>













<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>












<main id="blog-single">

  <!-- Element: HEADER -->
  <header>
    <div class="container">
      <a href="<?php echo home_url(); ?>/blog" class="blog-back">Ability Plus Blog</a>
      <h1>AbilityPlus Blog</h1>
    </div>
  </header>







  <!-- Element: BLOG LIST -->
  <section class="blog-list">
    <div class="container">



    </div><!--container-->
  </section><!--blog-list-->

</main>


<?php
get_footer();
?>
