<?php


/**
 * ENQUEUE STYLES
 **/
function wp_recruitment_enqueue_styles()
{
  $parent_style = 'wp-recruitment-style';
  // wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
  
  wp_dequeue_script( 'bootstrap' );
  wp_deregister_script( 'bootstrap' );
  
  wp_dequeue_style( 'bootstrap' );
  wp_deregister_style( 'bootstrap' );
  wp_dequeue_style( 'jobboard-responsive-css' );
  wp_deregister_style( 'jobboard-responsive-css' );
  wp_dequeue_style( 'poppins-google-font' );
  wp_deregister_style( 'poppins-google-font' );
  wp_dequeue_style( 'wp-recruitment-style' );
  wp_deregister_style( 'wp-recruitment-style' );
  
  wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.3.1', true);

  wp_enqueue_script('lodash', 'https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js', array('jquery'), '1.14.3', true); // Lodash

  wp_enqueue_script('scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), microtime(), true);
  
  wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), '4.3.1');
  wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array(), '1.0.0');
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


// Initiate the Sign up and log in menu item, this avoids having to grab it from the loop to alter the attributes to trigger the modal
add_action ('wp_nav_menu_items', function( $menu_items, $menu_object ){
  $menu_name = $menu_object->menu->name;

  // Only append the new li to the 'Primary Navigation' menu.
  // Change 'Primary Navigation' for the name of the menu that you'd like to amend.
  if ( 'Navigation' === $menu_name && !is_user_logged_in()) {
    $new_li = "<li itemscope='itemscope' itemtype='https://www.schema.org/SiteNavigationElement' class='menu-item menu-item-type-custom menu-item-object-custom nav-item'><a title='Sign Up | Log In' href='#' class='nav-link' data-target='#LogInModal' data-toggle='modal'>Sign Up | Log In</a></li>";
    
    return $menu_items . $new_li;
  } else {
    $currentuser = wp_get_current_user();
    $new_li = "<li itemscope='itemscope' itemtype='https://www.schema.org/SiteNavigationElement' class='menu-item menu-item-type-custom menu-item-object-custom nav-item'><a title='Your Profile' href='" . esc_url(site_url('/profile')) . "' class='nav-link modal-button'>" . "Hey " . $currentuser->user_firstname . "!" . "</a></li>";
    
    return $menu_items . $new_li;
  }

}, 10, 2 );

add_filter('jb_template_login_form', 'custom_login_logic', 10);

function custom_login_logic($args = array()) {
  $dashboard = '';

    if (is_jb_employer_dashboard()) {
        $dashboard = 'employer';
    } elseif (is_jb_candidate_dashboard()) {
        $dashboard = 'candidate';
    }

    $defaults = array(
        'form_id' => 'form-' . uniqid(),
        'label_username' => esc_html__('Email Address', JB_TEXT_DOMAIN),
        'label_password' => esc_html__('Password', JB_TEXT_DOMAIN),
        'label_remember' => esc_html__('Remember Me', JB_TEXT_DOMAIN),
        'label_log_in' => esc_html__('Login', JB_TEXT_DOMAIN),
        'value_username' => '',
        'value_remember' => false,
        'redirect_to' => esc_url(site_url('/')),
        'dashboard' => $dashboard,
    );

    $args = wp_parse_args($args, apply_filters('login_form_defaults', $defaults));

    jb_get_template('global/login-form.php', array('args' => $args));
}

add_filter('jobboard-register-fields', 'custom_form_fields');

function custom_form_fields() {
  return $fields = array(
    // 'user_login' => array(
    //     'id'            => 'user_login',
    //     'type'          => 'text',
    //     'title'         => esc_html__('Username', 'jobboard-register'),
    //     'require'       => true
    // ),
    'first_name' => array(
        'id'            => 'first_name',
        'type'          => 'text',
        'title'         => esc_html__('First Name', 'jobboard-register'),
        'col'           => 6,
        'require'       => true
    ),
    'last_name' => array(
        'id'            => 'last_name',
        'type'          => 'text',
        'title'         => esc_html__('Last Name', 'jobboard-register'),
        'col'           => 6,
        'require'       => true
    ),
    'user_email' => array(
        'id'            => 'user_email',
        'type'          => 'text',
        'title'         => esc_html__('Email Address', 'jobboard-register'),
        'input'         => 'email',
        'require'       => true
    ),
    'user_pass' => array(
        'id'            => 'user_pass',
        'type'          => 'text',
        'title'         => esc_html__('Password', 'jobboard-register'),
        'input'         => 'password',
        'col'           => 6,
        'require'       => true
    ),
    'confirm_pass' => array(
        'id'            => 'confirm_pass',
        'type'          => 'text',
        'title'         => esc_html__('Confirm Password', 'jobboard-register'),
        'input'         => 'password',
        'col'           => 6,
        'require'       => true
    ),
    'user_type' => array(
        'id'            => 'user_type',
        'title'         => esc_html__('Account Type', 'jobboard-register' ),
        'type'          => 'select',
        'require'       => true,
        'value'         => 'candidate',
        'options'       => array(
            'candidate' => esc_html__('Candidate', 'jobboard-register'),
            'employer'  => esc_html__('Employer', 'jobboard-register'),
        ),
    ),
    'job_specialisms' => array(
        'id'            => 'job_specialisms',
        'title'         => esc_html__('Specializations', 'jobboard-register' ),
        'type'          => 'select',
        'multi'         => true,
        'options'       => jb_get_specialism_options(),
    )
  );
}

if(!function_exists('jb_parse_custom_fields')) {
  function jb_parse_custom_fields($field)
{

    if (!isset($field['type'])) {
        return $field;
    }

    $notices = JB()->session->get('jb_notices', array());
    // var_dump($notices);
    $default = array(
        'id' => '',
        'name' => $field['id'],
        'title' => esc_html__('Title', JB_TEXT_DOMAIN),
        'subtitle' => '',
        'placeholder' => '',
        'desc' => '',
        'col' => 12,
        'require' => 0,
        'notice' => esc_attr__('This is a required field.', JB_TEXT_DOMAIN),
        'notice' => $notices['error'][0],
        'value' => '',
        'class' => ''
    );

    switch ($field['type']) {
        case 'text':
            $field = wp_parse_args($field, array_merge($default, array(
                'input' => 'text',
                'default' => ''
            )));
            break;
        case 'media':
            $field = wp_parse_args($field, array_merge($default, array(
                'input' => 'file',
                'button' => esc_html__('Select File', JB_TEXT_DOMAIN),
                'require-types' => '',
                'require-dimension' => 1000
            )));
            break;
        case 'select':
            $field = wp_parse_args($field, array_merge($default, array(
                'multi' => false,
                'options' => array()
            )));
            break;
        case 'radio':
            $field = wp_parse_args($field, array_merge($default, array(
                'options' => array()
            )));
            break;
        default :
            $field = wp_parse_args($field, $default);
            break;
    }

    return $field;
  }
}
