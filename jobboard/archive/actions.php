<?php
/**
 * The Template for displaying job archive actions.
 *
 * This template can be overridden by copying it to yourtheme/jobboard/archive/actions.php.
 *
 * HOWEVER, on occasion JobBoard will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @author 		JobBoard
 * @package 	JobBoard/Templates
 * @version     1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="form-search">
  <a href="<?php echo esc_url(site_url('/vacancies')); ?>" class="clear-all">Clear Form</a>
</div>
<form class="jobboard-archive-actions clearfix jb-jobs-header" method="get">

    <?php
    /**
     * @hook jobboard-archive-actions
     */
    do_action('jobboard_archive_actions');
    ?>

</form>
