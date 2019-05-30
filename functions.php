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
  // wp_dequeue_script( 'modal-effects-js' );
  // wp_deregister_script( 'modal-effects-js' );
  
  wp_dequeue_style( 'bootstrap' );
  wp_deregister_style( 'bootstrap' );
  wp_dequeue_style( 'jobboard-responsive-css' );
  wp_deregister_style( 'jobboard-responsive-css' );
  // wp_dequeue_style( 'modal-effects-css' );
  // wp_deregister_style( 'modal-effects-css' );
  wp_dequeue_style( 'poppins-google-font' );
  wp_deregister_style( 'poppins-google-font' );
  wp_dequeue_style( 'wp-recruitment-style' );
  wp_deregister_style( 'wp-recruitment-style' );
  
  wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.3.1', true);

  wp_enqueue_script('lodash', 'https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js', array('jquery'), '1.14.3', true); // Lodash

  wp_enqueue_script('scrollto', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.min.js', array('jquery'), '2.1.2', true); // ScrollTo

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

remove_action('after_setup_theme', 'recruitment_user_skills', 20);



// Bootstrap NavWalker
require_once get_stylesheet_directory() . '/navwalker.php';

add_action('init', 'ability_plus_career_level_taxonomy', 0);

function ability_plus_career_level_taxonomy() {
  // Add new taxonomy, make it hierarchical like categories
  //first do the translations part for GUI
  $labels = array(
    'name' => _x( 'career-levels', 'taxonomy general name' ),
    'singular_name' => _x( 'Career-Level', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Career-Levels' ),
    'all_items' => __( 'All Career-Levels' ),
    'parent_item' => __( 'Parent Career-Level' ),
    'parent_item_colon' => __( 'Parent Career-Level:' ),
    'edit_item' => __( 'Edit Career-Level' ), 
    'update_item' => __( 'Update Career-Level' ),
    'add_new_item' => __( 'Add New Career-Level' ),
    'new_item_name' => __( 'New Career-Level Name' ),
    'menu_name' => __( 'Career-Levels' ),
  );    

  // Now register the taxonomy

  register_taxonomy('career-levels',array('jobboard-post-jobs'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => false,
    'query_var' => true,
  ));
}

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
    $firstName = $currentuser->user_firstname;
    $lastName = $currentuser->user_lastname;
    $new_li = "<li itemscope='itemscope' itemtype='https://www.schema.org/SiteNavigationElement' class='menu-item menu-item-type-custom menu-item-object-custom nav-item logged-in'><a title='Your Profile' href='" . esc_url(site_url('/profile')) . "' class='nav-link modal-button'>" . $firstName . " " . $lastName[0] . ".</a></li>";
    
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
    'user_login' => array(
        'id'            => 'user_login',
        'type'          => 'text',
        'value'         =>  mt_rand(100000, 999999),
        'title'         => esc_html__('Username', 'jobboard-register'),
        'require'       => true
    ),
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

function ability_plus_jobboard_widgets() {
  include_once('jobboard/widgets/class-widget-career-level.php');
	register_widget( 'JB_Widget_Search' );
	register_widget( 'JB_Widget_Type' );
	register_widget( 'JB_Widget_Date_Filters' );
	register_widget( 'JB_Widget_Specialism_Filters' );
	register_widget( 'JB_Widget_Jobs' );
	register_widget( 'JB_Widget_Specialism_List' );
  register_widget( 'JB_Widget_Salary_Filters' );
  register_widget( 'JB_Widget_Career_Level' );
}

add_action( 'widgets_init', 'ability_plus_jobboard_widgets', 10, 3);

remove_action('jobboard_archive_actions', 'jb_template_catalog_input', 50);


add_action('jobboard_archive_actions', 'Ability_plus_custom_catalog_input', 50);

function Ability_plus_custom_catalog_input() {
  /* post type. */
  $input['post_type'] = '<input type="hidden" name="post_type" value="jobboard-post-jobs" />';

  /* tax filters. */
  if (is_jb_taxonomy()) {

      $current_term = get_queried_object();

      unset($input['post_type']);

      $input['type'] = '<input type="hidden" name="' . $current_term->taxonomy . '" value="' . $current_term->slug . '" />';

  } elseif (is_author()) {

      global $author;

      unset($input['post_type']);

      $input['author'] = '<input type="hidden" name="author" value="' . $author . '" />';

  } elseif (is_jb_search() && !empty($_GET['s'])) {

      $input['s'] = '<input type="hidden" name="s" value="' . esc_attr($_GET['s']) . '" />';
  }

  /* specialism filters */
  if (!empty($_GET['specialism-filters'])) {
      foreach ($_GET['specialism-filters'] as $specialism) {
          $input['specialism-' . $specialism] = '<input type="hidden" name="specialism-filters[]" value="' . esc_attr($specialism) . '" />';
      }
  }

  /* career level filters */
  if (!empty($_GET['career-levels'])) {
    foreach ($_GET['career-levels'] as $careerLevel) {
        $input['career-level-' . $careerLevel] = '<input type="hidden" name="career-levels[]" value="' . esc_attr($careerLevel) . '" />';
    }
}

  /* date filters. */
  if (!empty($_GET['date-filters'])) {
      $input['date-filters'] = '<input type="hidden" name="date-filters" value="' . esc_attr($_GET['date-filters']) . '" />';
  }

  echo implode('', apply_filters('jobboard_catalog_input_args', $input));
}

add_action('jobboard_loop_meta', 'ability_plus_job_loop_summary_career_level', 11);
function ability_plus_job_loop_summary_career_level() {
  jb_get_template('../../themes/wp-recruitment-child/jobboard/users/career-level.php');
}


$careerLevels = ab_get_career_level_options();

function ab_get_career_level_options()
{
    jb_get_taxonomy_options(array('taxonomy' => 'career-levels', 'hide_empty' => false));
}


remove_action('wp_footer', 'jb_template_apply_form');
add_action('wp_footer', 'ability_plus_apply_form');

function ability_plus_apply_form() {
  if (!is_jb_job()) {
    return;
}

if (!is_user_logged_in()) {
  } elseif (is_jb_candidate()) {
      jb_get_template('modal/modal-start.php', array('modal' => 'jobboard-modal-apply'));
      jb_get_template('apply/apply.php', array('fields' => jb_job_apply_fields()));
      jb_get_template('modal/modal-end.php');
  } else {
    jb_get_template('modal/modal-start.php', array('modal' => 'jobboard-modal-apply'));
    $user = wp_get_current_user();
    jb_get_template('apply/other.php', array('user' => $user));
    jb_get_template('modal/modal-end.php');
  }
}

remove_action('jobboard_dashboard_candidate_navigation', 'jb_template_candidate_navigation');
add_action('jobboard_dashboard_candidate_navigation', 'ability_plus_custom_candidate_navigation');

function ability_plus_custom_candidate_navigation() {
  $navigation = ability_plus_candidate_navigation_args();

  if (!$navigation) {
      return;
  }

  jb_get_template('dashboard/global/navigation.php', array(
      'navigation' => $navigation,
      'permalink' => jb_page_permalink('dashboard')
  ));
}

function ability_plus_candidate_navigation_args() {
  $endpoint_applied = jb_get_option( 'endpoint-applied', 'applied' );
	$endpoint_profile = jb_get_option( 'endpoint-profile', 'profile' );

	$navigation = apply_filters( 'jobboard_candidate_navigation_args', array(
		array(
			'id'       => 'dashboard',
			'endpoint' => 'dashboard',
			'title'    => esc_html__( 'Account Overview', JB_TEXT_DOMAIN )
		),
		array(
      'id'       => 'profile',
			'endpoint' => $endpoint_profile,
			'title'    => esc_html__( 'Edit Profile', JB_TEXT_DOMAIN )
		),
    array(
      'id'       => 'applied',
      'endpoint' => $endpoint_applied,
      'title'    => esc_html__( 'Application History', JB_TEXT_DOMAIN )
    ),
	) );

	$navigation[] = array(
		'id'       => 'logout',
		'endpoint' => 'logout',
		'title'    => esc_html__( 'Log Out', JB_TEXT_DOMAIN )
	);

	return $navigation;
}

remove_action('jobboard_users_loop_candidate_summary', 'jb_template_user_loop_summary_start', 10);
remove_action('jobboard_users_loop_candidate_summary', 'jb_template_user_loop_summary_title', 20);
remove_action('jobboard_users_loop_candidate_summary', 'jb_template_user_loop_summary_salary', 30);
remove_action('jobboard_users_loop_candidate_summary', 'jb_template_user_loop_summary_specialism', 40);
remove_action('jobboard_users_loop_candidate_summary', 'jb_template_user_loop_summary_location', 50);
remove_action('jobboard_users_loop_candidate_summary', 'jb_template_user_loop_summary_end', 100);

// global $jobboard_admin;
// remove_action('jobboard_admin_profile_sections', array($jobboard_admin, 'add_fields_video'), 8);
// remove_filter('jobboard_candidate_profile_fields', array($jobboard_admin, 'fields_video'));
// remove_filter('jobboard_employer_profile_fields', array($jobboard_admin, 'fields_video'), 8);
