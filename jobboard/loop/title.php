<?php
/**
 * Loop job title
 *
 * This template can be overridden by copying it to yourtheme/jobboard/loop/title.php.
 *
 * HOWEVER, on occasion JobBoard will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @author     FOX
 * @package    JobBoard/Templates
 * @version    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
global $opt_theme_options;
?>

<div class="loop-title">
    <?php
    $layout = !empty($opt_theme_options['job_layout']) ? 'grid' : 'list' ;
    $value  = !empty($_GET['layout']) ? $_GET['layout'] : $layout ;
    ?>

    <h2 class="h6 entry-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark">
            <?php the_title(); ?>
        </a>
        <?php if(!empty($status)): ?>
            <span class="status status-<?php echo esc_attr($status['id']) ?>">
            <?php echo esc_html($status['name']); ?>
        </span>
        <?php endif; ?>
    </h2>
    <?php


    $post_date = get_the_time('U');
    $delta = time() - $post_date;

    if ( $delta < 60 ) {
        $timeposted = 'less than a minute ago';
    }
    elseif ($delta > 60 && $delta < 120){
        $timeposted = 'about a minute ago';
    }
    elseif ($delta > 120 && $delta < (60*60)){
        $timeposted = strval(round(($delta/60),0)) . " minutes ago";
    }
    elseif ($delta > (60*60) && $delta < (120*60)){
        $timeposted = 'about an hour ago';
    }
    elseif ($delta > (120*60) && $delta < (24*60*60)){
        $timeposted = strval(round(($delta/3600),0)) . " hours ago";
    }
    elseif ($delta > (3*7*24*60*60)) {
      $timeposted = "more than 3 weeks ago";
    }
    else {
      $timeposted = human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' );
    }



    ?>
    <span class="posted-time"><?php echo $timeposted; ?></span>
</div>
