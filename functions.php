<?php

/**
 * add child styles.
**/

function wp_recruitment_enqueue_styles()
{
    $parent_style = 'wp-recruitment-style';
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/css/style.css', array(
        $parent_style
    ));
}

add_action('wp_enqueue_scripts', 'wp_recruitment_enqueue_styles');


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


// For dequeing the parents CSS Files, replace the top section with this
// function parent_remove_scripts() {
//   $parent_style = 'wp-recruitment-style';
//   wp_dequeue_style( $parent_style );
//   wp_deregister_style( $parent_style );

//   wp_dequeue_script( 'site' );
//   wp_deregister_script( 'site' );

//   // Now register your styles and scripts here
// }
// add_action( 'wp_enqueue_scripts', 'parent_remove_scripts', 20 );