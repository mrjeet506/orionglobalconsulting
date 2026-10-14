<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Orion_AI_Engine_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'orion_ai_engine'; }
	public function get_title() { return esc_html__( 'Orion AI Engine', 'orjona-fjerza' ); }
	public function get_icon() { return 'eicon-cogs'; }
	public function get_categories() { return [ 'orion-theme' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'content_section', [ 'label' => esc_html__( 'Engine Content', 'orjona-fjerza' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT, ] );
		$this->add_control( 'tag', [ 'label' => esc_html__( 'Tag', 'orjona-fjerza' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => esc_html__( 'NEW — ORION AI MARKETING ENGINE', 'orjona-fjerza' ), ] );
		$this->add_control( 'main_title', [ 'label' => esc_html__( 'Main Title', 'orjona-fjerza' ), 'type' => \Elementor\Controls_Manager::WYSIWYG, 'default' => __( '9 AI Specialists.<br>One Marketing Engine.<br>Built for Accounting Firms.', 'orjona-fjerza' ), ] );
        $this->add_control( 'description', [ 'label' => esc_html__( 'Description', 'orjona-fjerza' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => esc_html__( 'Replace your £12,000–£15,000/month CMO hire with a fully integrated AI marketing system.', 'orjona-fjerza' ), ] );
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
        <section class="section" style="background-color: var(--color-brand-darker); border-top: 1px solid rgba(255,255,255,0.1);">
            <div class="container ai-engine-grid">
                <div>
                    <span class="tag" style="margin-bottom: 1rem; display: inline-block;"><?php echo esc_html($settings['tag']); ?></span>
                    <h2 class="main-title" style="color: white; font-size: 3.5rem;"><?php echo wp_kses_post($settings['main_title']); ?></h2>
                    <p class="description" style="margin-top: 1.5rem;"><?php echo esc_html($settings['description']); ?></p>
                    
                    <div class="ai-price-box" style="display: flex; gap: 0; align-items: stretch; border-radius: 8px; overflow: hidden; margin: 2rem 0; width: fit-content;">
                        <div style="background-color: #1e2640; padding: 1.5rem 2.5rem; display: flex; gap: 3rem; align-items: center; justify-content: center;">
                            <div style="text-align: center;">
                                <h3 style="color: var(--color-blue-primary); font-size: 2rem; margin:0;">£2,499</h3>
                                <p style="font-size: 0.75rem; margin:0; color: var(--text-gray); font-family: monospace;">per month</p>
                            </div>
                            <div style="text-align: center;">
                                <h3 style="color: white; font-size: 2rem; margin:0;">9</h3>
                                <p style="font-size: 0.75rem; margin:0; color: var(--text-gray); font-family: monospace;">AI specialists</p>
                            </div>
                        </div>
                        <div style="background-color: var(--color-blue-primary); color: #000; padding: 1.5rem 2.5rem; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <h3 style="color: #000; font-size: 1.5rem; margin:0;">Day 1</h3>
                            <p style="color: #000; margin:0; font-size: 0.75rem; font-family: monospace;">results from</p>
                        </div>
                    </div>
                    
                    <div class="hero-actions">
                        <a href="#" class="btn btn-primary">Learn More &rarr;</a>
                        <a href="#" class="btn btn-outline">Book Free Demo</a>
                    </div>
                </div>
                
                <div class="ai-cards-grid">
                    <div class="ai-card"><h5>01</h5><h4>Positioning Researcher</h4><p>Analyses your ICP, competitors and market gaps.</p></div>
                    <div class="ai-card"><h5>02</h5><h4>Content Strategist</h4><p>Editorial calendar grounded in real search demand.</p></div>
                    <div class="ai-card"><h5>03</h5><h4>Copywriter</h4><p>LinkedIn posts, blogs, newsletters in your voice.</p></div>
                    <div class="ai-card"><h5>04</h5><h4>Repurposing Engine</h4><p>One piece -> 5-10 assets across every channel.</p></div>
                    <div class="ai-card"><h5>05</h5><h4>SEO & AEO Optimizer</h4><p>ChatGPT, Perplexity, Google AI Mode — visible.</p></div>
                    <div class="ai-card"><h5>06</h5><h4>Distribution Planner</h4><p>Right channel, right format, right window.</p></div>
                    <div class="ai-card"><h5>07</h5><h4>Performance Analyst</h4><p>Tracks pipeline, flags what to cut, doubles down.</p></div>
                    <div class="ai-card"><h5>08</h5><h4>Lead Magnet Builder</h4><p>Assets that capture emails and qualify buyers.</p></div>
                    <div class="ai-card ai-card-wide" style="grid-column: 1 / -1; background-color: var(--color-blue-primary); border-left: none; display: flex; align-items: center; gap: 2rem;">
                        <div style="flex-shrink: 0;"><h5 style="color: #000; font-family: monospace; letter-spacing: 1px;">AGENT 09</h5><h4 style="margin: 0; font-size: 1.1rem; color: #000;">Competitor Intelligence</h4></div>
                        <p style="color: #000; margin: 0; font-size: 0.85rem; line-height: 1.4;">Runs every Monday. Tracks competitor moves and gaps you can<br>exploit before they close.</p>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}
}
