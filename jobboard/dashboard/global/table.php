<?php
/**
 * The Template for displaying table.
 *
 * This template can be overridden by copying it to yourtheme/jobboard/dashboard/global/table.php.
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
if (empty($table) || empty($columns)){
    return;
}
if($table == 'applied') {
  ?>
  <div class="<?php echo esc_attr($table); ?>-table jobboard-table">


    <div class="title-wrapper">
      <h2 class="h4">Applications History</h2>
      <span class="applied"><?php echo $applied_count; ?> jobs applied to</span>
    </div>

    <?php
    if($jobs->have_posts()) {
      while($jobs->have_posts()) {
        $jobs->the_post();
        ?>

        <div class="row">
          <h3 class="h6 entry-title loop-title">
            <a href="<?php the_permalink(); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
          </h3>

          <div class="loop-locations">
              <?php jb_job_the_locations(); ?>
          </div>

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
        </div>

    <?php }


    } else { ?>
      <h5 class="h6 no-applications">You haven't applied for any jobs yet, why not have a look at our <a href="<?php echo esc_url(site_url('/vacancies')); ?>">Vacancies</a>?</h5>
    <?php } ?>

  </div>
  <?php
} else {
  ?>
  <div class="<?php echo esc_attr($table); ?>-table jobboard-table">
    <div class="table-wrap">
      <table id="table-<?php echo esc_attr($table); ?>" class="table wp-list-table widefat fixed striped">
        <tbody>
          <tr>

            <?php $row = 0; foreach ($columns as $key => $column): ?>

              <th id="column-<?php echo esc_attr($key); ?>" class="column-<?php echo esc_attr($row); ?>"><?php echo esc_html__($column); ?></th>

              <?php $row++; endforeach; ?>

            </tr>

            <?php if($jobs && $jobs->have_posts()): ?>

              <?php while ( $jobs->have_posts() ) : $jobs->the_post(); ?>

                <tr>

                  <?php $row = 0; foreach ($columns as $key => $column): ?>

                    <td class="<?php echo esc_attr($key); ?> column-<?php echo esc_attr($key); ?> column-<?php echo esc_attr($row); ?>" data-colname="<?php echo esc_attr($column); ?>">
                      <?php echo apply_filters("jobboard_table_{$table}_{$key}", ''); ?>
                      <?php if($row == 0): ?>
                        <button type="button" class="toggle-row">
                          <span class="screen-reader-text"><?php esc_html_e('More details', JB_TEXT_DOMAIN); ?></span>
                        </button>
                      <?php endif; $row++; ?>
                    </td>

                  <?php endforeach; ?>

                </tr>

              <?php endwhile; ?>
            <?php endif; ?>

          </tbody>
        </table>
      </div>
    </div>


  <?php
}
?>
