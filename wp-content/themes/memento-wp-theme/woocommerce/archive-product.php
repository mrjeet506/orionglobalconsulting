<?php
/**
 * The Template for displaying product archives, including the main shop page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

?>

<style>
    .woocommerce {
        font-family: 'Inter', sans-serif;
    }

    .woocommerce-notices-wrapper {
        margin-bottom: 2rem;
    }

    .products-hero {
        padding: 6rem 0;
        background: linear-gradient(135deg, rgba(15, 182, 239, 0.05) 0%, rgba(251, 191, 36, 0.03) 100%);
        border-bottom: 1px solid #e8e8e8;
    }

    .products-hero-title {
        font-size: 3.8rem;
        font-weight: 900;
        font-family: 'Playfair Display', serif;
        color: #1a1a1a;
        margin: 0 0 1.25rem 0;
        line-height: 1.15;
        letter-spacing: -0.5px;
    }

    .products-hero-title .highlight {
        color: #fbbf24;
    }

    .products-hero-desc {
        font-size: 1.15rem;
        color: #666666;
        max-width: 700px;
        line-height: 1.85;
        margin: 0;
    }

    .products-content {
        padding: 4rem 0;
    }

    /* Tab Navigation */
    .products-tabs {
        display: flex;
        gap: 0.5rem;
        margin-bottom: 3.5rem;
        border-bottom: 2px solid #e8e8e8;
        flex-wrap: wrap;
        padding-bottom: 0;
    }

    .products-tab-btn {
        background: transparent;
        border: none;
        padding: 1.1rem 1.75rem;
        font-size: 0.95rem;
        font-weight: 700;
        color: #999999;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        margin-bottom: -2px;
        display: flex;
        align-items: center;
        gap: 0.6rem;
        text-transform: capitalize;
    }

    .products-tab-btn:hover {
        color: #666666;
    }

    .products-tab-btn.active {
        color: #0FB6EF;
        border-bottom: 3px solid #0FB6EF;
    }

    .products-tab-btn.active:after {
        content: '';
        position: absolute;
        bottom: -3px;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #0FB6EF 0%, #0a9fcc 100%);
    }

    .tab-icon {
        font-size: 1.2rem;
    }

    /* Tab Content */
    .products-tab-content {
        display: none;
        animation: fadeIn 0.3s ease;
    }

    .products-tab-content.active {
        display: block;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Products Grid */
    .woocommerce .products {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2.5rem;
        list-style: none;
        padding: 0;
        margin: 0 0 3rem 0;
        width: 100%;
    }

    /* Responsive Grid */
    @media (max-width: 1024px) {
        .woocommerce .products {
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
        }
    }

    @media (max-width: 768px) {
        .woocommerce .products {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .woocommerce .products {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
    }

    .woocommerce .product {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        height: 100%;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05), 0 1px 2px rgba(0, 0, 0, 0.03);
        position: relative;
    }

    .woocommerce .product:hover {
        transform: translateY(-16px) translateX(0);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15), 0 10px 30px rgba(0, 0, 0, 0.08);
        border-color: #c7d2e0;
    }

    /* Product card glow effect */
    .woocommerce .product::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(15, 182, 239, 0.1) 0%, rgba(251, 191, 36, 0.05) 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
        pointer-events: none;
        border-radius: 12px;
    }

    .woocommerce .product:hover::before {
        opacity: 1;
    }

    .woocommerce .product-image {
        position: relative;
        overflow: hidden;
        height: 280px;
        background: linear-gradient(135deg, #f8f9fa 0%, #f0f1f3 100%);
        border-radius: 12px 12px 0 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .woocommerce .product img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .woocommerce .product:hover img {
        transform: scale(1.08);
    }

    /* Product Badge Positioning */
    .product-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        z-index: 100;
    }

    .woocommerce .product-info {
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
        gap: 0.75rem;
    }

    .woocommerce .product h2,
    .woocommerce .product .woocommerce-loop-product__title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1a1a1a;
        margin: 0;
        font-family: 'Playfair Display', serif;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 2.6rem;
    }

    .woocommerce .product .woocommerce-product-rating {
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .woocommerce .product .star-rating {
        font-size: 0.9rem;
    }

    .woocommerce .product .rating-text {
        font-size: 0.85rem;
        color: #999999;
    }

    .woocommerce .product .price {
        font-size: 1.5rem;
        font-weight: 900;
        color: #fbbf24;
        margin: 0.75rem 0 1rem 0;
        font-family: 'Inter', sans-serif;
        display: flex;
        align-items: baseline;
        gap: 0.5rem;
    }

    .woocommerce .product .price-free {
        font-size: 1.6rem;
        font-weight: 900;
        color: #10b981;
        margin: 1.25rem 0 1.5rem 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .woocommerce .product .price-free strong {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .woocommerce .product .price del {
        font-size: 0.8rem;
        color: #d1d5db;
        margin-right: 0.5rem;
    }

    .woocommerce .product .price-separator {
        display: inline-block;
        width: 1px;
        height: 1.5rem;
        background: #e5e7eb;
        margin: 0 0.5rem;
    }

    .woocommerce .product .price del {
        color: #999999;
        font-size: 0.9rem;
        margin-right: 0.75rem;
    }

    .woocommerce .product-snippet {
        font-size: 0.85rem;
        color: #999999;
        margin-bottom: 0.75rem;
        flex-grow: 1;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 1.2rem;
    }

    .woocommerce .button,
    .woocommerce .product .button,
    .woocommerce a.button,
    .woocommerce button.button {
        background: linear-gradient(135deg, #0FB6EF 0%, #0a9fcc 100%) !important;
        color: #ffffff !important;
        border: none !important;
        padding: 0.7rem 1.5rem !important;
        border-radius: 6px !important;
        font-weight: 700 !important;
        font-size: 0.9rem !important;
        text-decoration: none !important;
        transition: all 0.3s ease !important;
        cursor: pointer !important;
        display: inline-block !important;
        margin-top: auto !important;
        text-align: center !important;
        box-shadow: 0 4px 12px rgba(15, 182, 239, 0.25) !important;
        width: 100% !important;
    }

    .woocommerce .button:hover,
    .woocommerce .product .button:hover,
    .woocommerce a.button:hover,
    .woocommerce button.button:hover {
        background: linear-gradient(135deg, #0a9fcc 0%, #0882a8 100%) !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 8px 20px rgba(15, 182, 239, 0.35) !important;
    }

    .woocommerce .product .added {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%) !important;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.25) !important;
    }

    .woocommerce .product .added:hover {
        background: linear-gradient(135deg, #059669 0%, #047857 100%) !important;
    }

    .empty-state {
        text-align: center;
        padding: 6rem 3rem;
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border-radius: 12px;
        border: 2px dashed #e5e7eb;
        grid-column: 1 / -1;
        position: relative;
        overflow: hidden;
    }

    .empty-state::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(15, 182, 239, 0.05) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }

    .empty-state-content {
        position: relative;
        z-index: 1;
    }

    .empty-state-icon {
        font-size: 5rem;
        margin-bottom: 2rem;
        opacity: 0.7;
        display: block;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-10px);
        }
    }

    .empty-state-text {
        color: #4b5563;
        font-size: 1.25rem;
        margin: 0 0 1.5rem 0;
        font-weight: 600;
        font-family: 'Playfair Display', serif;
    }

    .empty-state-description {
        color: #9ca3af;
        font-size: 1rem;
        margin: 0;
        line-height: 1.6;
    }

    .empty-state-button {
        display: inline-block;
        margin-top: 2rem;
        background: linear-gradient(135deg, #0FB6EF 0%, #0a9fcc 100%);
        color: #ffffff;
        padding: 0.9rem 2.5rem;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 700;
        font-size: 0.95rem;
        box-shadow: 0 4px 15px rgba(15, 182, 239, 0.25);
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .empty-state-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(15, 182, 239, 0.35);
        background: linear-gradient(135deg, #0a9fcc 0%, #0882a8 100%);
    }

    /* WooCommerce default element hiding */
    .woocommerce-result-count,
    .woocommerce-ordering,
    .woocommerce-notices-wrapper {
        display: none;
    }

    .woocommerce-pagination {
        text-align: center;
        margin-top: 3.5rem;
        padding-top: 2rem;
        border-top: 1px solid #e8e8e8;
    }

    .woocommerce-pagination a,
    .woocommerce-pagination span {
        background: #ffffff;
        color: #666666;
        border: 1px solid #d8d8d8;
        padding: 0.7rem 1rem;
        margin: 0 0.3rem;
        border-radius: 6px;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .woocommerce-pagination a:hover {
        background-color: #0FB6EF;
        color: #ffffff;
        border-color: #0FB6EF;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(15, 182, 239, 0.3);
    }

    .woocommerce-pagination .page-numbers.current {
        background: linear-gradient(135deg, #0FB6EF 0%, #0a9fcc 100%);
        color: #ffffff;
        border-color: #0FB6EF;
        box-shadow: 0 4px 12px rgba(15, 182, 239, 0.3);
    }

    @media (max-width: 1024px) {
        .woocommerce .products {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 2rem;
        }
    }

    @media (max-width: 768px) {
        .products-hero {
            padding: 4rem 0;
        }

        .products-hero-title {
            font-size: 2.2rem;
            margin-bottom: 1rem;
        }

        .products-hero-desc {
            font-size: 1rem;
        }

        .products-tabs {
            gap: 0;
            margin-bottom: 2.5rem;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            padding-bottom: 0.5rem;
        }

        .products-tab-btn {
            padding: 1rem 1.25rem;
            font-size: 0.85rem;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .tab-icon {
            font-size: 1rem;
        }

        .woocommerce .products {
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 1.25rem;
        }

        .woocommerce .product {
            padding: 1rem;
        }

        .woocommerce .product-info {
            padding: 1rem;
        }

        .woocommerce .product img {
            height: 150px;
        }

        .woocommerce .product h2,
        .woocommerce .product .woocommerce-loop-product__title {
            font-size: 1rem;
        }

        .woocommerce .product .price {
            font-size: 1.3rem;
            margin: 0.75rem 0 1rem 0;
        }

        .woocommerce .button,
        .woocommerce .product .button {
            padding: 0.7rem 1.25rem !important;
            font-size: 0.85rem !important;
        }
    }

    @media (max-width: 480px) {
        .products-hero {
            padding: 3rem 0;
        }

        .products-hero-title {
            font-size: 1.8rem;
        }

        .woocommerce .products {
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .woocommerce .product-image {
            height: 120px;
        }

        .products-tabs {
            margin-bottom: 2rem;
        }

        .products-tab-btn {
            padding: 0.75rem 1rem;
            font-size: 0.8rem;
        }
    }
</style>

<?php
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_schema() - 30
 */
do_action( 'woocommerce_before_main_content' );
?>

<header class="woocommerce-products-header">
    <!-- Hero Section -->
    <div class="products-hero">
        <div class="container">
            <?php if ( is_shop() ) { ?>
                <h1 class="products-hero-title">Shop Our Products</h1>
                <p class="products-hero-desc">Books, courses, templates and resources — 22 years of marketing expertise packaged into products you can use immediately.</p>
            <?php } else { ?>
                <?php do_action( 'woocommerce_archive_description' ); ?>
            <?php } ?>
        </div>
    </div>
</header>

<main id="primary" class="site-main">
    <div class="products-content">
        <div class="container">
            <?php
            /**
             * Hook: woocommerce_archive_description.
             *
             * @hooked woocommerce_taxonomy_archive_description - 10
             * @hooked woocommerce_product_archive_description - 10
             */
            if ( ! is_shop() ) {
                do_action( 'woocommerce_archive_description' );
            }
            ?>

            <!-- Tab Navigation -->
            <div class="products-tabs">
                <button class="products-tab-btn active" onclick="switchProductTab('all')">
                    <span class="tab-icon">🛍️</span> All Products
                </button>
                <button class="products-tab-btn" onclick="switchProductTab('books')">
                    <span class="tab-icon">📚</span> Books
                </button>
                <button class="products-tab-btn" onclick="switchProductTab('courses')">
                    <span class="tab-icon">🎓</span> Courses
                </button>
                <button class="products-tab-btn" onclick="switchProductTab('services')">
                    <span class="tab-icon">🎤</span> Services
                </button>
            </div>

            <!-- ALL PRODUCTS TAB -->
            <div id="all" class="products-tab-content active">
                <?php
                if ( woocommerce_product_loop() ) {

                    /**
                     * Hook: woocommerce_before_shop_loop.
                     *
                     * @hooked woocommerce_output_all_notices - 10
                     * @hooked woocommerce_result_count - 20
                     * @hooked woocommerce_catalog_ordering - 30
                     */
                    do_action( 'woocommerce_before_shop_loop' );

                    woocommerce_product_loop_start();

                    if ( wc_get_loop_prop( 'total' ) ) {
                        while ( have_posts() ) {
                            the_post();
                            /**
                             * Hook: woocommerce_shop_loop.
                             */
                            do_action( 'woocommerce_shop_loop' );

                            wc_get_template_part( 'content', 'product' );
                        }
                    }

                    woocommerce_product_loop_end();

                    /**
                     * Hook: woocommerce_after_shop_loop.
                     *
                     * @hooked woocommerce_pagination - 10
                     */
                    do_action( 'woocommerce_after_shop_loop' );
                } else {
                    /**
                     * Hook: woocommerce_no_products_found.
                     *
                     * @hooked wc_no_products_found - 10
                     */
                    do_action( 'woocommerce_no_products_found' );
                }
                ?>
            </div>

            <!-- BOOKS TAB -->
            <div id="books" class="products-tab-content">
                <?php
                $books_args = array(
                    'post_type' => 'product',
                    'posts_per_page' => -1,
                    'paged' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'slug',
                            'terms' => 'books',
                            'operator' => 'IN'
                        )
                    )
                );

                $books_query = new WP_Query( $books_args );

                if ( $books_query->have_posts() ) {
                    echo '<ul class="products">';
                    while ( $books_query->have_posts() ) {
                        $books_query->the_post();
                        wc_get_template_part( 'content', 'product' );
                    }
                    echo '</ul>';

                    // Pagination
                    $big = 999999999;
                    $pages = paginate_links( array(
                        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format' => '?paged=%#%',
                        'current' => max( 1, get_query_var( 'paged' ) ),
                        'total' => $books_query->max_num_pages,
                        'type' => 'array'
                    ) );

                    if ( $pages ) {
                        echo '<div class="woocommerce-pagination">';
                        echo implode( '', $pages );
                        echo '</div>';
                    }

                    wp_reset_postdata();
                } else {
                    echo '<div class="empty-state">';
                    echo '<div class="empty-state-content">';
                    echo '<div class="empty-state-icon">📚</div>';
                    echo '<h3 class="empty-state-text">No Books Available</h3>';
                    echo '<p class="empty-state-description">We are currently updating our book collection. Check back soon for new titles!</p>';
                    echo '<a href="' . esc_url( wc_get_page_permalink( 'shop' ) ) . '" class="empty-state-button">View All Products →</a>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>

            <!-- COURSES TAB -->
            <div id="courses" class="products-tab-content">
                <?php
                $courses_args = array(
                    'post_type' => 'product',
                    'posts_per_page' => -1,
                    'paged' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'slug',
                            'terms' => 'courses',
                            'operator' => 'IN'
                        )
                    )
                );

                $courses_query = new WP_Query( $courses_args );

                if ( $courses_query->have_posts() ) {
                    echo '<ul class="products">';
                    while ( $courses_query->have_posts() ) {
                        $courses_query->the_post();
                        wc_get_template_part( 'content', 'product' );
                    }
                    echo '</ul>';

                    // Pagination
                    $big = 999999999;
                    $pages = paginate_links( array(
                        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format' => '?paged=%#%',
                        'current' => max( 1, get_query_var( 'paged' ) ),
                        'total' => $courses_query->max_num_pages,
                        'type' => 'array'
                    ) );

                    if ( $pages ) {
                        echo '<div class="woocommerce-pagination">';
                        echo implode( '', $pages );
                        echo '</div>';
                    }

                    wp_reset_postdata();
                } else {
                    echo '<div class="empty-state">';
                    echo '<div class="empty-state-content">';
                    echo '<div class="empty-state-icon">🎓</div>';
                    echo '<h3 class="empty-state-text">No Courses Available</h3>';
                    echo '<p class="empty-state-description">We are preparing exciting new courses. Stay tuned for our latest offerings!</p>';
                    echo '<a href="' . esc_url( wc_get_page_permalink( 'shop' ) ) . '" class="empty-state-button">View All Products →</a>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>

            <!-- SERVICES TAB -->
            <div id="services" class="products-tab-content">
                <?php
                $services_args = array(
                    'post_type' => 'product',
                    'posts_per_page' => -1,
                    'paged' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'slug',
                            'terms' => 'services',
                            'operator' => 'IN'
                        )
                    )
                );

                $services_query = new WP_Query( $services_args );

                if ( $services_query->have_posts() ) {
                    echo '<ul class="products">';
                    while ( $services_query->have_posts() ) {
                        $services_query->the_post();
                        wc_get_template_part( 'content', 'product' );
                    }
                    echo '</ul>';

                    // Pagination
                    $big = 999999999;
                    $pages = paginate_links( array(
                        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format' => '?paged=%#%',
                        'current' => max( 1, get_query_var( 'paged' ) ),
                        'total' => $services_query->max_num_pages,
                        'type' => 'array'
                    ) );

                    if ( $pages ) {
                        echo '<div class="woocommerce-pagination">';
                        echo implode( '', $pages );
                        echo '</div>';
                    }

                    wp_reset_postdata();
                } else {
                    echo '<div class="empty-state">';
                    echo '<div class="empty-state-content">';
                    echo '<div class="empty-state-icon">🎤</div>';
                    echo '<h3 class="empty-state-text">No Services Available</h3>';
                    echo '<p class="empty-state-description">We are launching premium services soon. Check back for exclusive offerings!</p>';
                    echo '<a href="' . esc_url( wc_get_page_permalink( 'shop' ) ) . '" class="empty-state-button">View All Products →</a>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</main>

<script>
    function switchProductTab(tabName) {
        // Hide all tab contents
        const contents = document.querySelectorAll('.products-tab-content');
        contents.forEach(content => {
            content.classList.remove('active');
        });

        // Remove active class from all buttons
        const buttons = document.querySelectorAll('.products-tab-btn');
        buttons.forEach(button => {
            button.classList.remove('active');
        });

        // Show selected tab
        document.getElementById(tabName).classList.add('active');

        // Add active class to clicked button
        event.target.closest('.products-tab-btn').classList.add('active');

        // Scroll to top of content
        document.querySelector('.products-content').scrollIntoView({ behavior: 'smooth' });
    }
</script>

<?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs)
 */
do_action( 'woocommerce_after_main_content' );

get_footer( 'shop' );
