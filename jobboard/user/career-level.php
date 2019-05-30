<?php
/**
 * The Template for displaying user loop specialism
 *
 * This template can be overridden by copying it to yourtheme/jobboard/users/career-level.php.
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

if(empty($careerLevels)){
    return;
}
?>
<div class="loop-career-level">
    <?php esc_html_e('Career Level : ', JB_TEXT_DOMAIN).' '; ?>
    <ul>
    <?php foreach ($careerLevels as $careerlevel): ?>
        <li><a href="<?php echo get_term_link($careerlevel->term_id, 'career-levels'); ?>"><?php echo esc_html($careerlevel->name); ?></a></li>
    <?php endforeach; ?>
    </ul>
</div>
