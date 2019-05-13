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