<?php
/**
 * The Template for displaying loop job actions
 *
 * This template can be overridden by copying it to yourtheme/jobboard/loop/actions.php.
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

<!-- <div class="loop-actions col-lg-3 col-md-12 col-sm-12 col-xs-12">
    <?php do_action('jobboard_loop_actions'); ?>
</div> -->

<div class="job-meta-tags">
  <?php 

    $specialism = get_the_terms($post->ID, 'jobboard-tax-specialisms');
    if($specialism) {
      foreach($specialism as $spec) {
        ?>
          <span class="job-meta specialism"><?php echo $spec->name; ?></span>
        <?php
      }
    }

    /*$types = get_the_terms($post->ID, 'jobboard-tax-types');
    foreach($types as $type) {
      ?>
        <span class="job-meta industry"><?php echo $type->name; ?></span>
      <?php
    }*/

    $types = get_the_terms($post->ID, 'jobboard-tax-types');
    if($types) {
      foreach($types as $type) {
        ?>
          <span class="job-meta types"><?php echo get_template_part('/assets/svg/icon-inline-job-type.svg'); ?><?php echo $type->name; ?></span>
        <?php
      }
    }


  ?> 
</div>