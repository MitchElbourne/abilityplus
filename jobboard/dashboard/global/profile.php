<?php
/**
 * The Template for displaying manage profile form.
 *
 * This template can be overridden by copying it to yourtheme/jobboard/dashboard/global/profile.php.
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
<h2 class="h4">Edit Profile</h2>
<form class="jobboard-form profile-form" action="" method="post" enctype="multipart/form-data">
  
    <?php do_action("jobboard_form_profile", $fields); ?>

</form>
