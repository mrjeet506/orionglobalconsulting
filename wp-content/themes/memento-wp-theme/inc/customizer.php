<?php
/**
 * Register WordPress Customizer settings
 */

function orion_customize_register( $wp_customize ) {

	// Add Panel
	$wp_customize->add_panel( 'orion_homepage_panel', array(
		'title'       => __( 'Orion Homepage Settings', 'orjona-fjerza' ),
		'description' => 'Edit the text for the homepage sections.',
		'priority'    => 10,
	) );

	// ---------------------------------------------------------
	// 0. Hero Section
	// ---------------------------------------------------------
	$wp_customize->add_section( 'orion_hero_section', array(
		'title' => __( 'Hero Section', 'orjona-fjerza' ),
		'panel' => 'orion_homepage_panel',
	) );

	$wp_customize->add_setting( 'orion_hero_subtitle', array(
		'default'           => 'DR. ORJONA FJERZA MCIM &bull; PhD &bull; MBA &bull; CIM TOP 1%',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'orion_hero_subtitle', array(
		'label'   => __( 'Subtitle', 'orjona-fjerza' ),
		'section' => 'orion_hero_section',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'orion_hero_title', array(
		'default'           => '22 Years of <br><span class="text-yellow">Marketing Authority.</span>',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'orion_hero_title', array(
		'label'   => __( 'Main Title', 'orjona-fjerza' ),
		'section' => 'orion_hero_section',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'orion_hero_role', array(
		'default'           => 'AI Strategist &bull; Board Advisor &bull; Keynote Speaker &bull; Investor &bull; Published Researcher',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'orion_hero_role', array(
		'label'   => __( 'Role Title', 'orjona-fjerza' ),
		'section' => 'orion_hero_section',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'orion_hero_desc', array(
		'default'           => 'From banking to AI marketing in London. From university lecture halls to the United Nations. Across six sectors, two companies and twenty-two years — I have built, grown and transformed businesses through the power of marketing.',
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'orion_hero_desc', array(
		'label'   => __( 'Description', 'orjona-fjerza' ),
		'section' => 'orion_hero_section',
		'type'    => 'textarea',
	) );

	// ---------------------------------------------------------
	// 1. Pillars Section
	// ---------------------------------------------------------
	$wp_customize->add_section( 'orion_pillars_section', array(
		'title' => __( 'Pillars Section', 'orjona-fjerza' ),
		'panel' => 'orion_homepage_panel',
	) );

	$wp_customize->add_setting( 'orion_pillars_subtitle', array(
		'default'           => 'THE THREE PILLARS',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'orion_pillars_subtitle', array(
		'label'   => __( 'Subtitle', 'orjona-fjerza' ),
		'section' => 'orion_pillars_section',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'orion_pillars_title', array(
		'default'           => 'The Power Behind <span class="text-yellow">Every Successful Brand.</span>',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'orion_pillars_title', array(
		'label'   => __( 'Main Title', 'orjona-fjerza' ),
		'section' => 'orion_pillars_section',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'orion_pillars_desc', array(
		'default'           => 'Three forces. When they work together - businesses become unstoppable.',
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'orion_pillars_desc', array(
		'label'   => __( 'Description', 'orjona-fjerza' ),
		'section' => 'orion_pillars_section',
		'type'    => 'textarea',
	) );

	// ---------------------------------------------------------
	// 2. Industries Section
	// ---------------------------------------------------------
	$wp_customize->add_section( 'orion_ind_section', array(
		'title' => __( 'Industries Section', 'orjona-fjerza' ),
		'panel' => 'orion_homepage_panel',
	) );

	$wp_customize->add_setting( 'orion_ind_subtitle', array(
		'default'           => 'INDUSTRIES & SECTORS',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'orion_ind_subtitle', array(
		'label'   => __( 'Subtitle', 'orjona-fjerza' ),
		'section' => 'orion_ind_section',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'orion_ind_title', array(
		'default'           => '22 Years Across <span class="text-yellow">Every Major Industry.</span>',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'orion_ind_title', array(
		'label'   => __( 'Main Title', 'orjona-fjerza' ),
		'section' => 'orion_ind_section',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'orion_ind_desc', array(
		'default'           => 'Not a niche specialist — a cross-sector authority. Real results delivered across twelve industries.',
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'orion_ind_desc', array(
		'label'   => __( 'Description', 'orjona-fjerza' ),
		'section' => 'orion_ind_section',
		'type'    => 'textarea',
	) );

    // ---------------------------------------------------------
	// 3. AI Engine Section
	// ---------------------------------------------------------
	$wp_customize->add_section( 'orion_ai_section', array(
		'title' => __( 'AI Engine Section', 'orjona-fjerza' ),
		'panel' => 'orion_homepage_panel',
	) );

	$wp_customize->add_setting( 'orion_ai_tag', array(
		'default'           => 'NEW — ORION AI MARKETING ENGINE',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'orion_ai_tag', array(
		'label'   => __( 'Tag', 'orjona-fjerza' ),
		'section' => 'orion_ai_section',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'orion_ai_title', array(
		'default'           => '9 AI Specialists.<br>One Marketing Engine.<br>Built for Accounting Firms.',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'orion_ai_title', array(
		'label'   => __( 'Main Title', 'orjona-fjerza' ),
		'section' => 'orion_ai_section',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'orion_ai_desc', array(
		'default'           => 'Replace your £12,000–£15,000/month CMO hire with a fully integrated AI marketing system — strategy, content, SEO, distribution and competitor intelligence. All working in sync. From day one.',
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'orion_ai_desc', array(
		'label'   => __( 'Description', 'orjona-fjerza' ),
		'section' => 'orion_ai_section',
		'type'    => 'textarea',
	) );

    $wp_customize->add_setting( 'orion_ai_price', array(
		'default'           => '£2,499',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'orion_ai_price', array(
		'label'   => __( 'Price Text', 'orjona-fjerza' ),
		'section' => 'orion_ai_section',
		'type'    => 'text',
	) );

    // ---------------------------------------------------------
	// 4. CTA Section
	// ---------------------------------------------------------
	$wp_customize->add_section( 'orion_cta_section', array(
		'title' => __( 'Footer CTA Section', 'orjona-fjerza' ),
		'panel' => 'orion_homepage_panel',
	) );

	$wp_customize->add_setting( 'orion_cta_subtitle', array(
		'default'           => 'ORION GLOBAL CONSULTING',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'orion_cta_subtitle', array(
		'label'   => __( 'Subtitle', 'orjona-fjerza' ),
		'section' => 'orion_cta_section',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'orion_cta_title', array(
		'default'           => 'Need a Marketing Partner<br>for Your Business?',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'orion_cta_title', array(
		'label'   => __( 'Main Title', 'orjona-fjerza' ),
		'section' => 'orion_cta_section',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'orion_cta_desc', array(
		'default'           => 'Orion Global Consulting — the AI-first digital marketing consultancy founded by Orjona — helps UK businesses get found on Google and ChatGPT, generate consistent leads and grow. From £998/month. Results in 90 days.',
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'orion_cta_desc', array(
		'label'   => __( 'Description', 'orjona-fjerza' ),
		'section' => 'orion_cta_section',
		'type'    => 'textarea',
	) );

    // =========================================================
	// ABOUT PAGE SETTINGS
	// =========================================================
	$wp_customize->add_panel( 'orion_about_panel', array(
		'title'       => __( 'Orion About Settings', 'orjona-fjerza' ),
		'priority'    => 11,
	) );

	$wp_customize->add_section( 'orion_about_hero_section', array(
		'title' => __( 'Hero Section', 'orjona-fjerza' ),
		'panel' => 'orion_about_panel',
	) );

	$wp_customize->add_setting( 'orion_about_hero_title', array(
		'default'           => 'A strategist, speaker and <span class="text-yellow">business builder.</span>',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'orion_about_hero_title', array(
		'label'   => __( 'Main Title', 'orjona-fjerza' ),
		'section' => 'orion_about_hero_section',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'orion_about_hero_desc', array(
		'default'           => 'After 22 years driving growth for banks, universities, tech startups and accounting firms, I founded Orion Global Consulting to help businesses scale through the power of AI, brand positioning and community.',
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'orion_about_hero_desc', array(
		'label'   => __( 'Description', 'orjona-fjerza' ),
		'section' => 'orion_about_hero_section',
		'type'    => 'textarea',
	) );

    // =========================================================
	// CONTACT PAGE SETTINGS
	// =========================================================
	$wp_customize->add_panel( 'orion_contact_panel', array(
		'title'       => __( 'Orion Contact Settings', 'orjona-fjerza' ),
		'priority'    => 12,
	) );

	$wp_customize->add_section( 'orion_contact_details_section', array(
		'title' => __( 'Contact Details', 'orjona-fjerza' ),
		'panel' => 'orion_contact_panel',
	) );

	$wp_customize->add_setting( 'orion_contact_email', array(
		'default'           => 'contact@orionglobalconsulting.co.uk',
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'orion_contact_email', array(
		'label'   => __( 'Email Address', 'orjona-fjerza' ),
		'section' => 'orion_contact_details_section',
		'type'    => 'email',
	) );

	$wp_customize->add_setting( 'orion_contact_phone', array(
		'default'           => '+44 7551 161717',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'orion_contact_phone', array(
		'label'   => __( 'Phone Number', 'orjona-fjerza' ),
		'section' => 'orion_contact_details_section',
		'type'    => 'text',
	) );
    
    $wp_customize->add_setting( 'orion_contact_location', array(
		'default'           => '21 The Barons, Twickenham<br>London TW1 2AP',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'orion_contact_location', array(
		'label'   => __( 'Location', 'orjona-fjerza' ),
		'section' => 'orion_contact_details_section',
		'type'    => 'textarea',
	) );
    
    $wp_customize->add_setting( 'orion_contact_linkedin', array(
		'default'           => 'https://linkedin.com/in/orjona-fjerza',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'orion_contact_linkedin', array(
		'label'   => __( 'LinkedIn URL', 'orjona-fjerza' ),
		'section' => 'orion_contact_details_section',
		'type'    => 'url',
	) );

}
add_action( 'customize_register', 'orion_customize_register' );

