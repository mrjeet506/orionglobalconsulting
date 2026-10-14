<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Orion_CTA_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'orion_cta'; }
	public function get_title() { return esc_html__( 'Orion CTA', 'orjona-fjerza' ); }
	public function get_icon() { return 'eicon-call-to-action'; }
	public function get_categories() { return [ 'orion-theme' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'content_section', [ 'label' => esc_html__( 'CTA Content', 'orjona-fjerza' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT, ] );
		$this->add_control( 'subtitle', [ 'label' => esc_html__( 'Subtitle', 'orjona-fjerza' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => esc_html__( 'ORION GLOBAL CONSULTING', 'orjona-fjerza' ), ] );
		$this->add_control( 'main_title', [ 'label' => esc_html__( 'Main Title', 'orjona-fjerza' ), 'type' => \Elementor\Controls_Manager::WYSIWYG, 'default' => __( 'Need a Marketing Partner<br>for Your Business?', 'orjona-fjerza' ), ] );
        $this->add_control( 'description', [ 'label' => esc_html__( 'Description', 'orjona-fjerza' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => esc_html__( 'Orion Global Consulting — the AI-first digital marketing consultancy founded by Orjona — helps UK businesses get found on Google and ChatGPT, generate consistent leads and grow. From £998/month. Results in 90 days.', 'orjona-fjerza' ), ] );
        
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
        <section class="section bg-yellow">
            <div class="container" style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <span class="subtitle" style="color: var(--color-brand-darker);"><?php echo esc_html($settings['subtitle']); ?></span>
                    <h2 class="main-title" style="color: var(--color-brand-darker); font-size: 2.5rem; margin-top: 0.5rem; margin-bottom: 1rem;"><?php echo wp_kses_post($settings['main_title']); ?></h2>
                    <p style="color: var(--color-brand-darker); max-width: 800px;"><?php echo esc_html($settings['description']); ?></p>
                </div>
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <a href="#" class="btn" style="background-color: var(--color-brand-darker); color: white;">Visit Orion Global &rarr;</a>
                    <a href="#" class="btn btn-outline" style="border-color: var(--color-brand-darker); color: var(--color-brand-darker);">Book Free Call &rarr;</a>
                </div>
            </div>
        </section>
		<?php
	}
}
