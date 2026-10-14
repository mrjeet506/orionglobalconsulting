<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Orion_Industries_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'orion_industries'; }
	public function get_title() { return esc_html__( 'Orion Industries', 'orjona-fjerza' ); }
	public function get_icon() { return 'eicon-gallery-grid'; }
	public function get_categories() { return [ 'orion-theme' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'content_section', [ 'label' => esc_html__( 'Header Content', 'orjona-fjerza' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT, ] );

		$this->add_control( 'subtitle', [ 'label' => esc_html__( 'Subtitle', 'orjona-fjerza' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => esc_html__( 'INDUSTRIES & SECTORS', 'orjona-fjerza' ), ] );
		$this->add_control( 'main_title', [ 'label' => esc_html__( 'Main Title', 'orjona-fjerza' ), 'type' => \Elementor\Controls_Manager::WYSIWYG, 'default' => __( '22 Years Across <span class="text-yellow">Every Major Industry.</span>', 'orjona-fjerza' ), ] );
        $this->add_control( 'description', [ 'label' => esc_html__( 'Description', 'orjona-fjerza' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => esc_html__( 'Not a niche specialist — a cross-sector authority. Real results delivered across twelve industries.', 'orjona-fjerza' ), ] );
        
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
        <section class="section bg-white" style="border-top: 1px solid #f3f4f6;">
            <div class="container">
                <div class="section-header">
                    <span class="subtitle"><?php echo esc_html($settings['subtitle']); ?></span>
                    <h2 class="main-title"><?php echo wp_kses_post($settings['main_title']); ?></h2>
                    <p style="color: #6b7280; font-style: italic;"><?php echo esc_html($settings['description']); ?></p>
                </div>
                <!-- Note: The grid items could be a repeater control, hardcoded here for layout preservation -->
                <div class="industries-grid">
                    <div class="industry-card"><div class="icon">🏛️</div><h4>Banking & Financial Services</h4><p>Intesa Sanpaolo - International Commercial Bank - Deputy Branch Director - 34% client base growth</p></div>
                    <div class="industry-card"><div class="icon">🏗️</div><h4>Construction</h4><p>London Fair Contractors - 20% revenue growth - 32% new contracts - first digital function built from scratch</p></div>
                    <div class="industry-card"><div class="icon">🎓</div><h4>Higher Education</h4><p>Luarasi University - Head of Economics Department - BD Manager - programme development - student recruitment</p></div>
                    <div class="industry-card"><div class="icon">💻</div><h4>Technology & SaaS</h4><p>Engalco - Baboon food delivery app - 136% downloads - 183% ROI - 20% market share in 6 months</p></div>
                    <div class="industry-card"><div class="icon">📊</div><h4>Accounting & Professional Services</h4><p>SKS Business Services / RAA - 6 years - Top 50 UK accounting group - AI-first marketing through Orion</p></div>
                    <div class="industry-card"><div class="icon">🍷</div><h4>Hospitality</h4><p>Adriatico Wine Bar - 92K+ reach - Position 1 SEO - Surrey - full 360° digital campaign</p></div>
                    <div class="industry-card"><div class="icon">🏛️</div><h4>Politics & Public Affairs</h4><p>Political marketing strategy - public sector communications - policy advocacy - stakeholder engagement</p></div>
                    <div class="industry-card"><div class="icon">🎵</div><h4>Music & Entertainment</h4><p>Fiona Sexton Music - digital presence - Spotify strategy - audience growth - artist brand building</p></div>
                </div>
            </div>
        </section>
		<?php
	}
}
