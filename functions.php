<?php


/**
 * ENQUEUE STYLES
 **/
function wp_recruitment_enqueue_styles()
{
  $parent_style = 'wp-recruitment-style';
  wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
  
  $parent_style = 'wp-recruitment-style';
  wp_dequeue_script( 'bootstrap' );
  wp_deregister_script( 'bootstrap' );
  
  wp_dequeue_style( 'bootstrap' );
  wp_deregister_style( 'bootstrap' );
  wp_dequeue_style( 'jobboard-responsive-css' );
  wp_deregister_style( 'jobboard-responsive-css' );
  
  wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.3.1', true);
  
  wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), '4.3.1');
  wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/css/style.css', array(
    $parent_style
  ));
}

add_action('wp_enqueue_scripts', 'wp_recruitment_enqueue_styles', 20);


// Remove Parent Theme locations(menus etc...)
function remove_parent_theme_locations()
{
    unregister_nav_menu( 'primary' );
    unregister_nav_menu( 'pr_menu_left' );
    unregister_nav_menu( 'pr_menu_right' );
}
add_action( 'after_setup_theme', 'remove_parent_theme_locations', 20 );

// Bootstrap NavWalker
require_once get_stylesheet_directory() . '/navwalker.php';


/**
 * Load vc template dir.s
**/
if (function_exists("vc_set_shortcodes_templates_dir")) {
  vc_set_shortcodes_templates_dir(get_stylesheet_directory() . "/vc_templates/");
}


// Only show adming bar if the user is a job manager
$user = wp_get_current_user();
if(!in_array('jobboard_role_jobs', (array) $user->roles)) {
  add_filter('show_admin_bar', '__return_false');
}

/**
 * Menus
**/

register_nav_menus( array(
	'Navigation' => __( 'Navigation', 'abilityplus' ),
) );
