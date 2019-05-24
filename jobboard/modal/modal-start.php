<?php
/**
 * The Template for displaying modal start.
 *
 * This template can be overridden by copying it to yourtheme/jobboard/modal/modal-start.php.
 *
 * HOWEVER, on occasion JobBoard will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @author 		FOX
 * @package 	JobBoard/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>

<div id="<?php echo esc_attr($modal); ?>" class="jobboard-modal md-modal md-effect-1">
    <div class="md-content">
      <button type="button" class="md-close" aria-label="Close">
        <span aria-hidden="true"><?php echo get_template_part('/assets/svg/icon-cancel.svg');?></span>
      </button>
        <!-- <a class="md-close" href="javascript:void(0)"><i class="dashicons dashicons-no-alt"></i></a> -->
