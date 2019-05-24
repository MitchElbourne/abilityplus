<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class JB_Widget_Career_Level extends JB_Widget {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->widget_cssclass    = 'jobboard-widget widget-career-level';
		$this->widget_description = esc_html__( 'A Career Level job filter', JB_TEXT_DOMAIN );
		$this->widget_id          = 'jobboard-widget-career-level';
		$this->widget_name        = esc_html__( 'JobBoard Career Level Filter', JB_TEXT_DOMAIN );
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'std'   => esc_html__( 'Career Level', JB_TEXT_DOMAIN ),
				'label' => esc_html__( 'Title', JB_TEXT_DOMAIN )
			),
			'hide_empty' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => esc_html__( 'Hide empty', JB_TEXT_DOMAIN )
			)
		);

		parent::__construct();
	}

	/**
	 * Output widget.
	 *
	 * @see WP_Widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {

        $values             = isset($_GET['career-levels']) ? $_GET['career-levels'] : array();
        var_dump($values);
        $count              = isset( $instance['count'] ) ? $instance['count'] : $this->settings['count']['std'];
        $hide_empty         = isset( $instance['hide_empty'] ) ? $instance['hide_empty'] : $this->settings['hide_empty']['std'];
        $list_args          = array( 'taxonomy' => 'career-levels', 'hide_empty' => $hide_empty);

        if(isset( $instance['parent'] ) && $instance['parent']){
            $list_args['parent'] = 0;
        }

		    $terms = get_terms($list_args);

		$this->widget_start( $args, $instance );

        jb_get_template('../../themes/wp-recruitment-child/jobboard/widgets/widget-career-level.php', array('terms' => $terms, 'count' => $count, 'values' => $values));
        
		$this->widget_end( $args );
	}
}
