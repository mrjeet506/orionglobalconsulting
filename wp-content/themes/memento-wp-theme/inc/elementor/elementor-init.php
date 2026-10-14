<?php
/**
 * Initialize Elementor Custom Widgets
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Orion_Elementor_Widgets_Init {

	public function __construct() {
		// Register Custom Category
		add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementor_widget_categories' ] );

		// Register Widgets
		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
	}

	public function add_elementor_widget_categories( $elements_manager ) {
		$elements_manager->add_category(
			'orion-theme',
			[
				'title' => esc_html__( 'Orion Theme Widgets', 'orjona-fjerza' ),
				'icon'  => 'fa fa-plug',
			]
		);
	}

	public function register_widgets( $widgets_manager ) {
		// Require widget files
		require_once( __DIR__ . '/class-hero-widget.php' );
		require_once( __DIR__ . '/class-pillars-widget.php' );
		require_once( __DIR__ . '/class-industries-widget.php' );
		require_once( __DIR__ . '/class-ai-engine-widget.php' );
		require_once( __DIR__ . '/class-cta-widget.php' );
        require_once( __DIR__ . '/class-blog-widget.php' );

		// Register widgets
		$widgets_manager->register( new \Orion_Hero_Widget() );
		$widgets_manager->register( new \Orion_Pillars_Widget() );
		$widgets_manager->register( new \Orion_Industries_Widget() );
		$widgets_manager->register( new \Orion_AI_Engine_Widget() );
		$widgets_manager->register( new \Orion_CTA_Widget() );
        $widgets_manager->register( new \Orion_Blog_Widget() );
	}
}

new Orion_Elementor_Widgets_Init();
