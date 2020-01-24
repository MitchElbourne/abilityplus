<?php
/**
 * The template for displaying job search form
 *
 * This template can be overridden by copying it to yourtheme/jobboard/search-form.php.
 *
 * HOWEVER, on occasion JobBoard will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @author  FOX
 * @package JobBoard/Templates
 * @version 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<form role="search" method="get" class="jb-job-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
	<div>
		<label class="sr-only" for="jb-job-search-field"><?php esc_html_e( 'Job Search', 'wp-recruitment' ); ?></label>
    <img src="<?php echo get_theme_file_uri('/assets/svg/icon-job-search.svg'); ?>" alt="Search icon, find relevant jobs to match your portfolio">
		<input type="search" id="jb-job-search-field" class="search-field" placeholder="<?php echo esc_attr_x( 'Search with keyword(s) e.g. web design', 'placeholder', 'wp-recruitment' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'wp-recruitment' ); ?>" />
		<input type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'wp-recruitment' ); ?>" class="cta-blue"/>
		<input type="hidden" name="post_type" value="jobboard-post-jobs" />
	</div>
</form>
