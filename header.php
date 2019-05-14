<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <title><?php
    /*
    * Print the <title> tag based on what is being viewed.
    */
    global $page, $paged;
    
    wp_title( '|', true, 'right' );
    
    // Add the blog name.
    bloginfo( 'name' );
    
    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
    echo " | $site_description";
    
    ?></title>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
  </head>
  
  <body <?php body_class(); ?>>
    <header id="site-header">
      <div class="container">
        <nav class="navbar navbar-expand-lg">

          <!-- Logo -->
          <a class="navbar-brand" href="<?php echo esc_url(site_url('/')) ?>">
            <img src="<?php echo get_theme_file_uri('/assets/svg/ap-logo.svg'); ?>" alt="Ability Plus Logo">
          </a>

          <!-- Toggle button -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-menu" aria-controls="primary-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>


          <?php 
            wp_nav_menu( array(
              'theme_location'  => 'Navigation',
              'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
              'container'       => 'div',
              'container_class' => 'collapse navbar-collapse',
              'container_id'    => 'primary-menu',
              'menu_class'      => 'navbar-nav',
              'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
              'walker'          => new WP_Bootstrap_Navwalker(),
            ) );
          ?>


        </nav>
      </div>
    </header><!--#site-header-->
    <div class="wrapper">