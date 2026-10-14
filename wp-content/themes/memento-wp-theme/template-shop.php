<?php
/**
 * Template Name: Shop
 *
 * @package Memento
 */

get_header();

// Get dynamic content from ACF or page
$shop_title = get_field( 'shop_title' ) ?: get_the_title();
$shop_description = get_field( 'shop_description' ) ?: get_the_excerpt();
$products_per_page = get_field( 'products_per_page' ) ?: 12;
$show_categories = get_field( 'show_categories' ) ?? true;
?>

<style>
    .shop-hero {
        padding: 5rem 0;
        background: linear-gradient(135deg, rgba(15, 182, 239, 0.1) 0%, rgba(255, 255, 255, 0) 100%);
        border-bottom: 1px solid rgba(29, 50, 130, 0.1);
    }

    .shop-hero-title {
        font-size: 3.5rem;
        font-weight: 900;
        font-family: 'Playfair Display', serif;
        margin-bottom: 1rem;
        color: var(--color-navy);
    }

    .shop-hero-desc {
        font-size: 1.25rem;
        color: #666666;
        max-width: 600px;
    }

    .shop-content {
        padding: 5rem 0;
    }

    .shop-toolbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        gap: 1.5rem;
    }

    .shop-toolbar-left {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        align-items: center;
    }

    .shop-toolbar-right {
        display: flex;
        gap: 1rem;
        align-items: center;
    }

    .product-count {
        font-size: 0.9rem;
        color: #666666;
        white-space: nowrap;
    }

    .shop-filters {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
        margin-bottom: 2rem;
    }

    .filter-btn {
        background: transparent;
        border: 1px solid rgba(29, 50, 130, 0.2);
        color: #666666;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .filter-btn:hover,
    .filter-btn.active {
        border-color: var(--color-blue-primary);
        color: var(--color-blue-primary);
        background: rgba(15, 182, 239, 0.1);
    }

    .shop-section-title {
        font-size: 2.5rem;
        font-weight: 700;
        font-family: 'Playfair Display', serif;
        margin-bottom: 1rem;
        color: var(--color-navy);
    }

    .shop-section-desc {
        font-size: 1.1rem;
        color: #666666;
        margin-bottom: 3rem;
        max-width: 700px;
    }

    /* WooCommerce Grid Override */
    .shop-content .products {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 2rem;
        list-style: none;
        padding: 0;
        margin: 0;
        margin-bottom: 3rem;
    }

    .shop-content .product {
        background: var(--bg-light);
        border: 1px solid rgba(29, 50, 130, 0.1);
        border-radius: 8px;
        padding: 2rem;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
        box-shadow: 0 2px 8px rgba(29, 50, 130, 0.05);
    }

    .shop-content .product:hover {
        transform: translateY(-8px);
        border-color: var(--color-blue-primary);
        box-shadow: 0 15px 35px rgba(15, 182, 239, 0.15);
    }

    .shop-content .product img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 4px;
        margin-bottom: 1rem;
        display: block;
        background: linear-gradient(135deg, #f8f9fa 0%, #e8f0ff 100%);
    }

    .shop-content .product .placeholder {
        width: 100%;
        height: 200px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e8f0ff 100%);
        border-radius: 4px;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: #ccc;
    }

    .shop-content .product h2 {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--color-navy);
        margin-bottom: 0.5rem;
        font-family: 'Playfair Display', serif;
        line-height: 1.3;
    }

    .shop-content .product .woocommerce-product-rating {
        margin-bottom: 1rem;
    }

    .shop-content .product .price {
        font-size: 1.5rem;
        font-weight: 700;
        color: #0FB6EF;
        margin: 1rem 0;
    }

    .shop-content .product-snippet {
        font-size: 0.9rem;
        color: #666666;
        margin-bottom: 1rem;
        flex-grow: 1;
        line-height: 1.5;
    }

    .shop-content .button {
        background-color: var(--color-blue-primary);
        color: #fff;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 4px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        cursor: pointer;
        display: inline-block;
        margin-top: auto;
        text-align: center;
    }

    .shop-content .button:hover {
        background-color: var(--color-blue-hover);
    }

    .empty-state {
        text-align: center;
        padding: 4rem 0;
        grid-column: 1 / -1;
    }

    .empty-state-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    .empty-state-text {
        color: #9ca3af;
        font-size: 1.1rem;
    }

    .pagination {
        text-align: center;
        margin-top: 2rem;
    }

    .pagination a,
    .pagination span {
        background: transparent;
        color: #9ca3af;
        border: 1px solid rgba(255,255,255,0.2);
        padding: 0.5rem 0.75rem;
        margin: 0 0.25rem;
        border-radius: 4px;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .pagination a:hover,
    .pagination .current {
        background-color: #0FB6EF;
        color: #12182b;
        border-color: #0FB6EF;
    }

    /* Hide WooCommerce default elements */
    .shop-content .woocommerce-result-count,
    .shop-content .woocommerce-ordering,
    .shop-content .woocommerce-pagination {
        display: none;
    }

    @media (max-width: 768px) {
        .shop-hero {
            padding: 3rem 0;
        }

        .shop-hero-title {
            font-size: 2.5rem;
        }

        .shop-hero-desc {
            font-size: 1rem;
        }

        .shop-toolbar {
            flex-direction: column;
            align-items: flex-start;
        }

        .shop-toolbar-right {
            width: 100%;
            justify-content: flex-start;
        }

        .shop-content .products {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        .shop-section-title {
            font-size: 2rem;
        }
    }
</style>

<main id="primary" class="site-main">
    <!-- Shop Hero -->
    <div class="shop-hero">
        <div class="container">
            <h1 class="shop-hero-title"><?php echo esc_html( $shop_title ); ?></h1>
            <?php if ( $shop_description ) : ?>
                <p class="shop-hero-desc"><?php echo wp_kses_post( $shop_description ); ?></p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Shop Content -->
    <div class="shop-content">
        <div class="container">
            <?php
            while ( have_posts() ) :
                the_post();

                // Display custom page content if using Elementor
                if ( function_exists( 'elementor_theme_do_location' ) ) {
                    elementor_theme_do_location( 'single' );
                } else {
                    // Display page content (can include WooCommerce shortcodes)
                    the_content();
                }

                // If WooCommerce is active
                if ( function_exists( 'woocommerce_content' ) && function_exists( 'wc_get_products' ) ) {
                    global $post;

                    // Check if there's a [products] shortcode in content
                    if ( ! has_shortcode( $post->post_content, 'products' ) && ! has_shortcode( $post->post_content, 'product' ) ) {
                        // Get all product categories dynamically
                        $product_categories = get_terms( array(
                            'taxonomy' => 'product_cat',
                            'hide_empty' => true,
                        ) );

                        // Display category filters if enabled
                        if ( $show_categories && ! empty( $product_categories ) && ! is_wp_error( $product_categories ) ) {
                            ?>
                            <div class="shop-toolbar">
                                <div class="shop-toolbar-left">
                                    <span class="product-count"><?php echo esc_html( sprintf( __( '%d Products', 'memento' ), wp_count_posts( 'product' )->publish ) ); ?></span>
                                </div>
                                <div class="shop-toolbar-right">
                                    <div class="shop-filters">
                                        <button class="filter-btn active" data-filter="all">
                                            <?php esc_html_e( 'All', 'memento' ); ?>
                                        </button>
                                        <?php foreach ( $product_categories as $category ) : ?>
                                            <button class="filter-btn" data-filter="<?php echo esc_attr( $category->slug ); ?>">
                                                <?php echo esc_html( $category->name ); ?>
                                            </button>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }

                        // Display products with dynamic columns
                        $products_shortcode = sprintf(
                            '[products limit="%d" columns="4" paginate="true" orderby="date" order="DESC"]',
                            absint( $products_per_page )
                        );

                        echo do_shortcode( $products_shortcode );
                    }
                }

            endwhile; // End of the loop.
            ?>
        </div>
    </div>
</main><!-- #main -->

<?php
get_footer();
