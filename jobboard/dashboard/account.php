<?php
/**
 * The Template for displaying account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/jobboard/dashboard/account.php.
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
<?php $fields = jb_candidate_profile_custom_field(); ?>

<div class="dashboard-navigations">
  <div class="profile-meta">
    <h1 class="h6"><?php echo $fields[4]['value']; echo ' '; echo $fields[5]['value']; ?></h1>
    <p class='email caption'><?php echo $fields[3]['value']; ?></p>
  </div>

    <?php do_action("jobboard_dashboard_".jb_account_type()."_navigation"); ?>

</div>
<div class="dashboard-content">

    <?php do_action("jobboard_dashboard_".jb_account_type()."_content"); ?>

</div>
