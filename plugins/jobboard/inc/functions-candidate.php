<?php
/**
 * JobBoard Candidate Functions
 *
 * Functions for account specific things.
 *
 * @author   FOX
 * @category Core
 * @package  JobBoard/Functions
 * @version  1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * return candidate navigation.
 *
 * @return array
 */
function jb_candidate_navigation_args() {

	$endpoint_applied = jb_get_option( 'endpoint-applied', 'applied' );
	$endpoint_profile = jb_get_option( 'endpoint-profile', 'profile' );

	$navigation = apply_filters( 'jobboard_candidate_navigation_args', array(
		array(
			'id'       => 'dashboard',
			'endpoint' => 'dashboard',
			'title'    => esc_html__( 'My Account', JB_TEXT_DOMAIN )
		),
		array(
			'id'       => 'applied',
			'endpoint' => $endpoint_applied,
			'title'    => esc_html__( 'Application History', JB_TEXT_DOMAIN )
		),
		array(
			'id'       => 'profile',
			'endpoint' => $endpoint_profile,
			'title'    => esc_html__( 'Manage Profile', JB_TEXT_DOMAIN )
		),
	) );

	$navigation[] = array(
		'id'       => 'logout',
		'endpoint' => 'logout',
		'title'    => esc_html__( 'Logout', JB_TEXT_DOMAIN )
	);

	return $navigation;
}

/**
 * return applied number.
 *
 * @return number/0
 */
function jb_candidate_count_applied( $user_id = '', $date = 30 ) {
	$applied = JB()->candidate->count_applied( $user_id, $date );

	return apply_filters( 'jb/candidate/applied/count', $applied );
}

/**
 * Applied status.
 *
 * @param $status
 *
 * @return status label.
 */
function jb_candidate_applied_status( $status = '' ) {

	switch ( $status ) {
		case 'approved':
			$label = esc_html__( 'Approved', JB_TEXT_DOMAIN );
			break;
		case 'applied':
			$label = esc_html__( 'Pending', JB_TEXT_DOMAIN );
			break;
		default:
			$label = esc_html__( 'Rejected', JB_TEXT_DOMAIN );
	}

	return apply_filters( 'jb/candidate/job/applied/status', $label, $status );
}

/**
 * return candidate custom field.
 *
 * @return mixed
 */
function jb_candidate_profile_custom_field($user_id = '') {
	$fields = apply_filters( 'jobboard_candidate_profile_fields', jb_get_option( 'candidate-custom-fields' ) );
    $register_fields = array();
    if(function_exists('jb_register')){
        $jb_register = jb_register();
        $register_fields = $jb_register->get_custom_fields();
    }
    if(isset($register_fields['job_specialisms_group'])) {
        foreach ($fields as $key => $field) {
            if ($field['id'] == 'job_specialisms') {
                $fields[$key] = array(
                    'id' => 'job_specialisms_group',
                    'type' => 'group',
                    'title' => esc_html__('Specialization Group', 'jobboard-register'),
                    'subtitle' => esc_html__('Specialization Group', 'jobboard-register'),
                    'fields' => array(
                        'job_specialisms' => array(
                            'id' => 'job_specialisms',
                            'title' => esc_html__('Specializations', 'jobboard-register'),
                            'subtitle' => esc_html__('Select your specializations.', 'jobboard-register'),
                            'placeholder' => esc_html__('Specializations', 'jobboard-register'),
                            'type' => 'select',
                            'options' => jb_get_specialism_options(),
                        ),
                        'job_specialisms_license' => array(
                            'id' => 'job_specialisms_license',
                            'title' => esc_html__('License', 'jobboard-register'),
                            'subtitle' => esc_html__('Enter your License code.', 'jobboard-register'),
                            'type' => 'text',
                            'require' => true,
                        ),
                    ),
                );
            }
        }
    }

	return jb_account_custom_fields_value( $user_id, $fields );
}

function jb_account_get_display_profile(){
    remove_action('jobboard_form_profile', 'jb_template_account_profile_actions', 20);
    global $jobboard_account;
    $user_id = $jobboard_account->ID;
    $fields = jb_candidate_profile_custom_field($user_id);
    unset($fields["change-pass-heading"]);
    unset($fields["new-password"]);
    unset($fields["confirm-password"]);
    foreach ($fields as $field_key => $field){
        $fields[$field_key]['editable'] = false;
        if($field['type'] == 'heading'){
            $fields[$field_key]["subtitle"] = "";
        }
        elseif($field['type'] == 'group'){
            if(isset($field['fields'])){
                foreach ($field['fields'] as $group_field_key => $group_field_value){
                    $fields[$field_key]['fields'][$group_field_key]['editable'] = false;
                }
            }
        }
        elseif($field['type'] == 'geolocation'){
            unset($fields[$field_key]);
        }
        elseif($field['id'] == 'map-heading'){
            unset($fields[$field_key]);
        }
    }
    jb_get_template('dashboard/global/profile.php', array('fields' => $fields));
}

/**
 * return applied count notice.
 *
 * @param $title
 *
 * @return string
 */
function jb_candidate_profile_applied_count( $title ) {
	global $jobboard;

	$applied = get_user_meta( get_current_user_id(), '_jobboard_applied_ids', true );

	if ( empty( $applied ) ) {
		return $title;
	}

	$jobboard->candidate->applied_new = $applied;

	ob_start();

	jb_get_template( 'global/count.php', array( 'count' => count( $applied ) ) );

	return $title . ob_get_clean();
}

add_filter( 'jobboard_dashboard_navigation_applied_title', 'jb_candidate_profile_applied_count' );

function jb_candidate_reset_applied_count() {
	global $jobboard;
	$user_id = get_current_user_id();
	$applied = get_user_meta( $user_id, '_jobboard_applied_ids', true );

	if ( empty( $applied ) || empty( $jobboard->candidate->applied_remove ) ) {
		return;
	}

	update_user_meta( $user_id, '_jobboard_applied_ids', array_diff( $applied, $jobboard->candidate->applied_remove ) );
}

function jb_candidate_the_cv_url() {
	echo esc_url( jb_candidate_get_cv_url() );
}

function jb_candidate_the_salary() {
	echo esc_html( jb_candidate_get_salary() );
}

function jb_candidate_get_cv_url( $user_id = '' ) {
	global $jobboard_account;

	if ( ! $user_id && isset( $jobboard_account->ID ) ) {
		$user_id = $jobboard_account->ID;
	}

	$attachment = get_user_meta( $user_id, 'cv', true );

	return ! empty( $attachment['id'] ) ? wp_get_attachment_url( $attachment['id'] ) : '#';
}

function jb_candidate_get_salary( $user_id = '' ) {
	global $jobboard_account;

	if ( ! $user_id && isset( $jobboard_account->ID ) ) {
		$user_id = $jobboard_account->ID;
	}

	$salary = get_user_meta( $user_id, 'job_salary', true );

	if ( $salary ) {
		$salary = jb_get_salary_currency( $salary, jb_get_currency_symbol( jb_get_option( 'default-currency', 'USD' ) ) );
	}

	return $salary;
}