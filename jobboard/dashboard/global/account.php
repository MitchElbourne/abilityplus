<?php
/**
 * The Template for displaying account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/jobboard/dashboard/global/account.php.
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

<div class="content-account">
    <h2 class="h4">Account Overview</h2>
    <div class="account-heading heading">
      <!-- <a class="edit right" href="<?php echo esc_url(jb_page_endpoint_url('profile')); ?>"><?php esc_attr_e('Edit', JB_TEXT_DOMAIN); ?></a> -->
    </div>
    <div class="account-content">
      <ul>
        <h3 class="p">Log-in Information</h3>
        <?php $loopCount = 0; ?>
        <?php foreach ($fields as $k => $field) { ?>

          <?php
          if($loopCount == 3) {
            break;
          }
          if(empty($field['value']) || $field['type'] != 'text'){
              continue;
          }

          ?>

          <li class="account-detail">
            <p class="subheading"><?php echo esc_html($field['title']); ?>:</p>
            <p class="data"><?php echo esc_html($field['value']); ?></p>
          </li>
          <?php $loopCount++; ?>
    <?php } ?>

    </ul>
  </div>
  <?php
  $appliedAmount;
  
  if(jb_candidate_count_applied()) {
    $appliedAmount = jb_candidate_count_applied();
  } else {
    $appliedAmount = 0;
  }

  ?>
  <div class="content-applied">
    <div class="applied-heading heading">
      <h3 class="p">Application History</h3>
        <span class="info"><?php echo sprintf(esc_html__('You have applied for %s jobs in the past 30 days.', JB_TEXT_DOMAIN), '<b>'.$appliedAmount.'</b>'); ?></span>
        
        <a class="view cta-blue" href="<?php echo esc_url(jb_page_endpoint_url('applied')); ?>"><?php esc_html_e('View applications', JB_TEXT_DOMAIN); ?></a>
    </div>
  </div>

</div>