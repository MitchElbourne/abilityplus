<?php

/**
 * add child styles.
 *
 * @author CMSSuperHeroes
 * @since 1.1.1
 */
function wp_recruitment_enqueue_styles()
{
    $parent_style = 'wp-recruitment-style';
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array(
        $parent_style
    ));
}

add_action('wp_enqueue_scripts', 'wp_recruitment_enqueue_styles');

/**
 * Load vc template dir.
 *
 * @author CMSSuperHeroes
 * @since 1.1.1
 */
if (function_exists("vc_set_shortcodes_templates_dir")) {
    vc_set_shortcodes_templates_dir(get_stylesheet_directory() . "/vc_templates/");
}