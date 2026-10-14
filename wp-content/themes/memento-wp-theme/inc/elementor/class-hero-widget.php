<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Orion_Hero_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'orion_hero';
	}

	public function get_title() {
		return esc_html__( 'Orion Hero', 'orjona-fjerza' );
	}

	public function get_icon() {
		return 'eicon-hero';
	}

	public function get_categories() {
		return [ 'orion-theme' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'orjona-fjerza' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label' => esc_html__( 'Subtitle', 'orjona-fjerza' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'DR. ORJONA FJERZA MCIM • PhD • MBA • CIM TOP 1%', 'orjona-fjerza' ),
			]
		);

		$this->add_control(
			'main_title',
			[
				'label' => esc_html__( 'Main Title', 'orjona-fjerza' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( '22 Years of <br><span class="text-yellow">Marketing Authority.</span>', 'orjona-fjerza' ),
			]
		);

		$this->add_control(
			'role_title',
			[
				'label' => esc_html__( 'Role Title', 'orjona-fjerza' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'AI Strategist • Board Advisor • Keynote Speaker • Investor • Published Researcher', 'orjona-fjerza' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'orjona-fjerza' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'From banking to AI marketing in London. From university lecture halls to the United Nations. Across six sectors, two companies and twenty-two years — I have built, grown and transformed businesses through the power of marketing.', 'orjona-fjerza' ),
			]
		);
        
        $this->add_control(
			'primary_button_text',
			[
				'label' => esc_html__( 'Primary Button Text', 'orjona-fjerza' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'About Orjona &rarr;', 'orjona-fjerza' ),
			]
		);
        
        $this->add_control(
			'primary_button_link',
			[
				'label' => esc_html__( 'Primary Button Link', 'orjona-fjerza' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => '#',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="hero">
            <div class="container hero-container">
                <div class="hero-content">
                    <div class="subtitle"><?php echo wp_kses_post( $settings['subtitle'] ); ?></div>
                    <h1 class="main-title"><?php echo wp_kses_post( $settings['main_title'] ); ?></h1>
                    <h3 class="role-title"><?php echo esc_html( $settings['role_title'] ); ?></h3>
                    <p class="description">
                        <?php echo wp_kses_post( nl2br( $settings['description'] ) ); ?>
                    </p>
                    
                    <div class="hero-actions">
                        <?php if ( ! empty( $settings['primary_button_link']['url'] ) ) : ?>
                            <a href="<?php echo esc_url( $settings['primary_button_link']['url'] ); ?>" class="btn btn-primary btn-large"><?php echo wp_kses_post( $settings['primary_button_text'] ); ?></a>
                        <?php endif; ?>
                        <a href="#" class="btn btn-outline btn-large">Work With Me</a>
                    </div>
                </div>
                <div class="hero-image">
                    <div class="profile-card">
                        <div class="profile-image">
                            <div class="img-placeholder">Image Placeholder</div>
                        </div>
                        <div class="profile-info">
                            <h2>Dr. Orjona Fjerza</h2>
                            <p class="credentials">PhD Marketing &bull; MBA &bull; MCIM<br>Founder & CEO — Orion Global Consulting<br>London, United Kingdom</p>
                            
                            <div class="stats-grid">
                                <div class="stat-item">
                                    <h4>22+</h4>
                                    <p>Years experience</p>
                                </div>
                                <div class="stat-item">
                                    <h4>100+</h4>
                                    <p>Businesses served</p>
                                </div>
                                <div class="stat-item">
                                    <h4>12</h4>
                                    <p>Sectors & industries</p>
                                </div>
                                <div class="stat-item text-yellow">
                                    <h4>Top 1%</h4>
                                    <p>CIM Chartered</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}
}
