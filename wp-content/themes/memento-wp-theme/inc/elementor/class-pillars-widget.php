<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Orion_Pillars_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'orion_pillars';
	}

	public function get_title() {
		return esc_html__( 'Orion Pillars', 'orjona-fjerza' );
	}

	public function get_icon() {
		return 'eicon-columns';
	}

	public function get_categories() {
		return [ 'orion-theme' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Header Content', 'orjona-fjerza' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label' => esc_html__( 'Subtitle', 'orjona-fjerza' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'THE THREE PILLARS', 'orjona-fjerza' ),
			]
		);

		$this->add_control(
			'main_title',
			[
				'label' => esc_html__( 'Main Title', 'orjona-fjerza' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'The Power Behind <span class="text-yellow">Every Successful Brand.</span>', 'orjona-fjerza' ),
			]
		);
        
        $this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'orjona-fjerza' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Three forces. When they work together - businesses become unstoppable.', 'orjona-fjerza' ),
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
        <section class="section bg-white">
            <div class="container text-center">
                <div class="section-header">
                    <span class="subtitle"><?php echo esc_html( $settings['subtitle'] ); ?></span>
                    <h2 class="main-title"><?php echo wp_kses_post( $settings['main_title'] ); ?></h2>
                    <p style="color: #6b7280; font-style: italic;"><?php echo esc_html( $settings['description'] ); ?></p>
                </div>
                <div class="pillars-grid">
                    <div class="pillar-card bg-dark-blue">
                        <h3>01</h3>
                        <h4>The Power of Branding</h4>
                        <p>A brand is not a logo. It is what people feel when they hear your name. The strongest brands in the world are not remembered for their products...</p>
                        <ul>
                            <li>Brand identity and visual language that commands authority</li>
                            <li>Positioning strategy that makes you the obvious choice</li>
                            <li>Messaging architecture that resonates and converts</li>
                        </ul>
                    </div>
                    <div class="pillar-card bg-purple">
                        <h3>02</h3>
                        <h4>The Power of Social Media</h4>
                        <p>Social media is not a broadcasting tool. It is a trust-building machine. The brands winning on social are not the ones posting the most...</p>
                        <ul>
                            <li>Content strategy built on genuine audience insight</li>
                            <li>LinkedIn authority that generates inbound enquiries</li>
                            <li>AI-powered content that repurposes across every channel</li>
                        </ul>
                    </div>
                    <div class="pillar-card bg-green">
                        <h3>03</h3>
                        <h4>The Power of Community</h4>
                        <p>The future of marketing is not broadcast — it is belonging. The businesses growing fastest are the ones that have built a community around a shared purpose...</p>
                        <ul>
                            <li>Community architecture — the right platform, the right people</li>
                            <li>Membership models that generate recurring revenue</li>
                            <li>Events and experiences that deepen belonging</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}
}
