<?php
/**
 * The Template for displaying login form.
 *
 * This template can be overridden by copying it to yourtheme/jobboard/global/login-form.php.
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
<div class="introduction">
  <h2 class="h1">Log In</h2>
  <span class="sign-up-cta">Don't have an account? <a href="<?php echo esc_url(site_url('/profile/sign-up')); ?>">Sign up instead</a></span>
</div>

  
<p class="h5 bold">Welcome back to Ability Plus!</p>

<form id="<?php echo esc_attr($args['form_id']); ?>" class="jobboard-form jb-form jb-login-form" action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" method="post">
  <?php do_action('jobboard_form_login_before'); ?>

  <div class="login-username">
    <label for="log" class="caption">Account</label>
    <input type="text" name="log" id="<?php echo esc_attr($args['form_id']) . '-log'; ?>" class="input" value="" size="20" />
  </div>

  <div class="login-password">
    <label for="pwd" class="caption">Password</label>
    <input type="password" name="pwd" id="<?php echo esc_attr($args['form_id']) . '-pwd'; ?>" class="input" value="" size="20" />
  </div>

  <div class="login-remember clearfix">
    <div class="remember">
      <input name="rememberme" type="checkbox" id="<?php echo esc_attr($args['form_id']) . '-rememberme'; ?>" value="forever"/>
      <span><?php echo esc_html($args['label_remember']); ?></span>
    </div>
  </div>
    
  <p class="login-submit clearfix">
    <input type="submit" name="wp-submit" id="<?php echo esc_attr($args['form_id']) . '-submit'; ?>" class="cta-blue bold" value="Log in" />
    <a class="forgot-password-cta-modal modal-button" data-toggle="modal" data-target="#PasswordModal">Forget your password?</a>
    <input type="hidden" name="redirect_to" value="<?php echo esc_url($args['redirect_to']); ?>" />
    <input type="hidden" name="dashboard" value="<?php echo esc_attr($args['dashboard']); ?>">
  </p>
</form>

<?php print_r(JB()->session->get('jb_notices', array())); ?>