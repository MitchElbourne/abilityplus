<?php
get_header();
?>


<main>
  <section id="error-page">
    <div class="container">
      <?php $url = htmlspecialchars($_SERVER['HTTP_REFERER']); ?>
      <h1>We couldn't find the page you're looking for</h1>
      <h2 class="h4">Click <a href="javascript:(void);" onclick="history.back(-1)">here</a> to go back.</h2>
    </div>
  </section><!--#error-page-->
</main>


<?php
get_footer();
?>
