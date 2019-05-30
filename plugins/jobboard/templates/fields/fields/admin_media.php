<?php
/**
 * The Template for displaying media upload file.
 *
 * This template can be overridden by copying it to yourtheme/jobboard/fields/fields/media.php.
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

<div class="file-media">
    <input type="hidden" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($value); ?>" >
    <button type="button" class="file-select button"><?php echo esc_html__('Select File'); ?></button>
    <span class="file-name" >
        <?php
            if(!empty($value) && $attachment = get_post($value)):
        ?>
                <a href="<?php echo esc_url(wp_get_attachment_url($value)); ?>" target="_blank">
                    <?php echo esc_html($attachment->post_title); ?>
                </a>
        <?php
            endif;
        ?>
    </span>
</div>
