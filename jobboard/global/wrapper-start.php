<?php
/**
 * Content wrappers
 *
 * This template can be overridden by copying it to yourtheme/jobboard/global/wrapper-start.php.
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
$user = wp_get_current_user();

?>
<?php if(is_jb_profile()): ?>
    <?php get_footer() ?>
    <?php exit; ?>
<?php else: ?>
	<div class="container job-container">
    <div class="row">
    <?php
    if(!is_single()) { ?>
      <h1 class="title m-auto col-12 col-md-8 text-center">Explore all our Isle of Man jobs with a simple search</h1>
      <div class="search-field col-12">
        <?php dynamic_sidebar('main sidebar'); ?>
      </div>
      
    <?php } ?>
<?php endif; ?>
