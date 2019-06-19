<?php
/**
 * The Template for displaying user registered.
 *
 * This template can be overridden by copying it to yourtheme/jobboard/add-ons/register/registered.php.
 *
 * HOWEVER, on occasion JobBoard will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @author 		FOX
 * @package 	JobBoard/Register/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>

<div class="jobboard-inline-notices notice-failure">
  <h3>Welcome to AbilityPlus!</h3>
  <h3><?php  ?></h3>
  <p>Please check your email <?php echo sprintf(esc_html__('%s%s%s', JB_REGISTER_TEXT_DOMAIN), '<cite class="bold">', $email, '</cite>'); ?> and click the link we sent to activate your account.</p>
</div>
