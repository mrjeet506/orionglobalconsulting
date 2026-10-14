<?php
/**
 * Memento functions and definitions
 *
 * @package Memento
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function memento_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Register Navigation Menus
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'memento' ),
		)
	);

	// Add theme support for Elementor
	add_theme_support( 'elementor' );

    // Add HTML5 theme support
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );

	// Add WooCommerce support
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'memento_setup' );

/**
 * Enqueue scripts and styles.
 */
function memento_scripts() {
    // Fonts
    wp_enqueue_style( 'memento-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,700&display=swap', array(), null );
    
    // Bootstrap 5 CSS
    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3' );
    
    // Main stylesheet
	wp_enqueue_style( 'memento-style', get_stylesheet_uri(), array(), filemtime( get_stylesheet_directory() . '/style.css' ) );
    
    // Bootstrap 5 JS Bundle
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), '5.3.3', true );
}
add_action( 'wp_enqueue_scripts', 'memento_scripts' );

/**
 * Load Elementor custom widgets
 */
if ( did_action( 'elementor/loaded' ) ) {
    require_once get_template_directory() . '/inc/elementor/elementor-init.php';
} else {
    add_action( 'elementor/init', function() {
        require_once get_template_directory() . '/inc/elementor/elementor-init.php';
    } );
}

/**
 * Register Custom Post Type for Case Studies
 */
function orjona_register_case_study_cpt() {
    $labels = array(
        'name'                  => _x( 'Case Studies', 'Post Type General Name', 'orjona-fjerza' ),
        'singular_name'         => _x( 'Case Study', 'Post Type Singular Name', 'orjona-fjerza' ),
        'menu_name'             => __( 'Case Studies', 'orjona-fjerza' ),
        'name_admin_bar'        => __( 'Case Study', 'orjona-fjerza' ),
        'archives'              => __( 'Case Study Archives', 'orjona-fjerza' ),
        'attributes'            => __( 'Case Study Attributes', 'orjona-fjerza' ),
        'parent_item_colon'     => __( 'Parent Case Study:', 'orjona-fjerza' ),
        'all_items'             => __( 'All Case Studies', 'orjona-fjerza' ),
        'add_new_item'          => __( 'Add New Case Study', 'orjona-fjerza' ),
        'add_new'               => __( 'Add New', 'orjona-fjerza' ),
        'new_item'              => __( 'New Case Study', 'orjona-fjerza' ),
        'edit_item'             => __( 'Edit Case Study', 'orjona-fjerza' ),
        'update_item'           => __( 'Update Case Study', 'orjona-fjerza' ),
        'view_item'             => __( 'View Case Study', 'orjona-fjerza' ),
        'view_items'            => __( 'View Case Studies', 'orjona-fjerza' ),
        'search_items'          => __( 'Search Case Study', 'orjona-fjerza' ),
        'not_found'             => __( 'Not found', 'orjona-fjerza' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'orjona-fjerza' ),
    );
    $args = array(
        'label'                 => __( 'Case Study', 'orjona-fjerza' ),
        'description'           => __( 'Case studies of client work', 'orjona-fjerza' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-portfolio',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true, // Enables Gutenberg and Elementor support
    );
    register_post_type( 'case_study', $args );
}
add_action( 'init', 'orjona_register_case_study_cpt', 0 );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * WooCommerce Styles
 */
if ( function_exists( 'wc' ) ) {
	require get_template_directory() . '/woocommerce-styles.php';
}

/**
 * WooCommerce AJAX Cart
 */
if ( function_exists( 'wc' ) ) {
	require get_template_directory() . '/woocommerce-ajax-cart.php';
}

/**
 * WooCommerce Product Badges (Free vs Paid)
 */
if ( function_exists( 'wc' ) ) {
	require get_template_directory() . '/woocommerce-product-badges.php';
}

/**
 * Create Sample Blog Posts
 */
function memento_create_sample_blog_posts() {
	// Check if posts already exist
	$existing_posts = get_posts( array(
		'post_type' => 'post',
		'posts_per_page' => 1,
	) );

	if ( ! empty( $existing_posts ) ) {
		return; // Posts already exist
	}

	// Create sample posts
	$sample_posts = array(
		array(
			'title' => 'How to Grow Your Business with Strategic Marketing',
			'content' => 'Strategic marketing is essential for business growth. In today\'s digital landscape, companies need to understand their target audience, develop compelling value propositions, and create integrated marketing campaigns that resonate with customers. This comprehensive guide explores key marketing strategies that drive business growth and customer engagement.

Key marketing strategies include:

1. **Customer Research** - Understand your target audience deeply
2. **Brand Positioning** - Differentiate yourself from competitors
3. **Digital Marketing** - Leverage online channels effectively
4. **Content Strategy** - Create valuable, relevant content
5. **Analytics** - Measure and optimize your efforts

By implementing these strategies systematically, you can build a sustainable competitive advantage and achieve sustainable business growth.',
			'category' => 'Marketing',
		),
		array(
			'title' => 'Innovation in Business: Staying Ahead of Competition',
			'content' => 'Innovation is the lifeblood of successful businesses. Organizations that continuously innovate create new value, enter new markets, and develop products that customers love. This article explores how businesses can foster a culture of innovation and implement processes that drive continuous improvement.

Innovation Framework:

- **Ideation** - Generate creative ideas from teams
- **Evaluation** - Assess feasibility and potential impact
- **Development** - Build and test new concepts
- **Launch** - Introduce to market with strategy
- **Measure** - Track results and gather feedback

Companies like Apple, Amazon, and Tesla have built their success on relentless innovation. The key is creating an organizational culture that encourages experimentation, tolerates calculated risks, and rewards creative thinking.',
			'category' => 'Strategy',
		),
		array(
			'title' => 'Digital Transformation: A Guide for Modern Enterprises',
			'content' => 'Digital transformation has become essential for enterprises seeking to remain competitive. It\'s not just about technology adoption, but fundamentally changing how organizations operate, create value, and interact with customers. This guide covers the essential elements of successful digital transformation.

Digital Transformation Pillars:

1. **Technology** - Modern tools and infrastructure
2. **Process** - Streamlined, automated workflows
3. **People** - Skills development and culture change
4. **Data** - Analytics-driven decision making
5. **Customer Experience** - Digital-first engagement

Organizations that successfully navigate digital transformation gain competitive advantages including increased agility, improved customer satisfaction, and enhanced profitability. The journey requires clear vision, executive commitment, and sustained investment.',
			'category' => 'Technology',
		),
	);

	// Create posts
	foreach ( $sample_posts as $post_data ) {
		// Insert post
		$post_id = wp_insert_post( array(
			'post_title'   => $post_data['title'],
			'post_content' => $post_data['content'],
			'post_status'  => 'publish',
			'post_type'    => 'post',
			'post_author'  => 1,
		) );

		if ( $post_id ) {
			// Add category
			$category = get_term_by( 'name', $post_data['category'], 'category' );
			if ( ! $category ) {
				$category = wp_insert_term( $post_data['category'], 'category' );
				$category_id = $category['term_id'];
			} else {
				$category_id = $category->term_id;
			}

			wp_set_post_categories( $post_id, array( $category_id ) );
		}
	}
}

// Run on theme activation or first page load
if ( ! get_option( 'memento_sample_posts_created' ) ) {
	memento_create_sample_blog_posts();
	update_option( 'memento_sample_posts_created', true );
}
