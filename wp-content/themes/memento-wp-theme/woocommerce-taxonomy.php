<?php
/**
 * WooCommerce Taxonomy/Category Template
 *
 * @package Memento
 */

get_header();

$term = get_queried_object();
$term_title = $term->name;
$term_desc = $term->description;
?>

<style>
    .woocommerce-category-hero {
        padding: 5rem 0;
        background: linear-gradient(135deg, rgba(15, 182, 239, 0.1) 0%, rgba(255, 255, 255, 0) 100%);
        border-bottom: 1px solid rgba(29, 50, 130, 0.1);
    }

    .woocommerce-category-title {
        font-size: 3.5rem;
        font-weight: 900;
        font-family: 'Playfair Display', serif;
        color: #1D3282;
        margin-bottom: 1rem;
    }

    .woocommerce-category-desc {
        font-size: 1.1rem;
        color: #666666;
        max-width: 700px;
        line-height: 1.8;
    }

    .woocommerce-category-content {
        padding: 5rem 0;
    }

    .category-toolbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        gap: 1.5rem;
    }

    .product-count {
        font-size: 0.95rem;
        color: #666666;
        font-weight: 500;
    }

    .sort-dropdown {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border: 1px solid rgba(29, 50, 130, 0.2);
        padding: 0.75rem 1rem;
        border-radius: 4px;
        color: #1D3282;
        font-weight: 500;
        cursor: pointer;
    }

    /* Product Grid */
    .woocommerce .products {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 2rem;
        list-style: none;
        padding: 0;
        margin: 0 0 3rem 0;
    }

    .woocommerce .product {
        background: #ffffff;
        border: 1px solid rgba(29, 50, 130, 0.1);
        border-radius: 8px;
        padding: 2rem;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
        box-shadow: 0 2px 8px rgba(29, 50, 130, 0.05);
    }

    .woocommerce .product:hover {
        transform: translateY(-8px);
        border-color: #0FB6EF;
        box-shadow: 0 15px 35px rgba(15, 182, 239, 0.15);
    }

    .woocommerce .product img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 4px;
        margin-bottom: 1rem;
        display: block;
        background: linear-gradient(135deg, #f8f9fa 0%, #e8f0ff 100%);
    }

    .woocommerce .product .placeholder {
        width: 100%;
        height: 200px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e8f0ff 100%);
        border-radius: 4px;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: rgba(15, 182, 239, 0.3);
    }

    .woocommerce .product h2 {
        font-size: 1.3rem;
        font-weight: 700;
        color: #1D3282;
        margin-bottom: 0.5rem;
        font-family: 'Playfair Display', serif;
        line-height: 1.3;
        flex-grow: 1;
    }

    .woocommerce .product .price {
        font-size: 1.5rem;
        font-weight: 700;
        color: #0FB6EF;
        margin: 1rem 0;
    }

    .woocommerce .product-snippet {
        font-size: 0.9rem;
        color: #666666;
        margin-bottom: 1rem;
        line-height: 1.5;
    }

    .woocommerce .button {
        background-color: #0FB6EF;
        color: #ffffff;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 4px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
        cursor: pointer;
        display: inline-block;
        margin-top: auto;
        text-align: center;
    }

    .woocommerce .button:hover {
        background-color: #0a9fcc;
    }

    .woocommerce-pagination {
        text-align: center;
        margin-top: 3rem;
        padding-top: 2rem;
    }

    .woocommerce-pagination a,
    .woocommerce-pagination span {
        background: transparent;
        color: #666666;
        border: 1px solid rgba(29, 50, 130, 0.2);
        padding: 0.75rem 1rem;
        margin: 0 0.25rem;
        border-radius: 4px;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
        font-weight: 500;
    }

    .woocommerce-pagination a:hover,
    .woocommerce-pagination .current {
        background-color: #0FB6EF;
        color: #ffffff;
        border-color: #0FB6EF;
    }

    .empty-category {
        text-align: center;
        padding: 4rem 2rem;
    }

    .empty-category-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    .empty-category-text {
        color: #999999;
        font-size: 1.1rem;
        margin-bottom: 2rem;
    }

    .back-to-shop {
        display: inline-block;
        background-color: #0FB6EF;
        color: #ffffff;
        padding: 0.75rem 2rem;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 700;
        transition: all 0.3s ease;
    }

    .back-to-shop:hover {
        background-color: #0a9fcc;
    }

    @media (max-width: 768px) {
        .woocommerce-category-hero {
            padding: 3rem 0;
        }

        .woocommerce-category-title {
            font-size: 2.5rem;
        }

        .category-toolbar {
            flex-direction: column;
            align-items: flex-start;
        }

        .woocommerce .products {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1.5rem;
        }
    }
</style>

<main id="primary" class="site-main">
    <!-- Category Hero -->
    <div class="woocommerce-category-hero">
        <div class="container">
            <h1 class="woocommerce-category-title"><?php echo esc_html( $term_title ); ?></h1>
            <?php if ( $term_desc ) : ?>
                <p class="woocommerce-category-desc"><?php echo wp_kses_post( $term_desc ); ?></p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Category Content -->
    <div class="woocommerce-category-content">
        <div class="container">
            <!-- Toolbar -->
            <div class="category-toolbar">
                <span class="product-count">
                    <?php
                    $product_count = $term->count;
                    echo sprintf(
                        _n( '%d product', '%d products', $product_count, 'woocommerce' ),
                        $product_count
                    );
                    ?>
                </span>
            </div>

            <!-- Products Grid -->
            <?php
            if ( woocommerce_product_loop() ) {
                woocommerce_product_loop_start();

                if ( wc_get_loop_prop( 'total' ) ) {
                    while ( have_posts() ) {
                        the_post();
                        do_action( 'woocommerce_shop_loop' );
                        wc_get_template_part( 'content', 'product' );
                    }
                }

                woocommerce_product_loop_end();
                woocommerce_pagination();
            } else {
                echo '<div class="empty-category">';
                echo '<div class="empty-category-icon">📦</div>';
                echo '<p class="empty-category-text">No products found in this category.</p>';
                echo '<a href="' . esc_url( wc_get_page_permalink( 'shop' ) ) . '" class="back-to-shop">Back to Shop</a>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</main>

<?php
get_footer();
