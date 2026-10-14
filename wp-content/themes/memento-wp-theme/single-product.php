<?php
/**
 * The template for displaying all single products
 *
 * @package Memento
 */

get_header();
?>

<style>
    .product-hero {
        padding: 3rem 0;
        background: linear-gradient(135deg, rgba(15, 182, 239, 0.1) 0%, rgba(255, 255, 255, 0) 100%);
        border-bottom: 1px solid rgba(29,50,130,0.1);
    }

    .product-breadcrumb {
        color: #666666;
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
    }

    .product-breadcrumb a {
        color: #0FB6EF;
        text-decoration: none;
    }

    .product-breadcrumb a:hover {
        color: #0a9fcc;
    }

    .product-content {
        padding: 3rem 0;
    }

    .product-gallery {
        background: #ffffff;
        border: 1px solid rgba(29,50,130,0.08);
        border-radius: 8px;
        padding: 1.5rem;
        overflow: hidden;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 400px;
    }

    .product-gallery img {
        width: 100%;
        height: auto;
        border-radius: 4px;
        display: block;
        max-width: 100%;
    }

    .product-info {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border: 1px solid rgba(29,50,130,0.1);
        border-radius: 8px;
        padding: 2rem;
    }

    .product-title {
        font-size: 2.5rem;
        font-weight: 700;
        font-family: 'Playfair Display', serif;
        color: #1D3282;
        margin-bottom: 1rem;
        line-height: 1.2;
    }

    .product-meta {
        display: flex;
        gap: 2rem;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        padding-bottom: 2rem;
        border-bottom: 1px solid rgba(29,50,130,0.1);
    }

    .product-meta-item {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .product-meta-label {
        font-size: 0.85rem;
        color: #666666;
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 1px;
    }

    .product-meta-value {
        font-size: 1.1rem;
        color: #1D3282;
        font-weight: 600;
    }

    .product-category {
        display: inline-block;
        background: rgba(15, 182, 239, 0.1);
        color: #0FB6EF;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        margin-right: 0.5rem;
        margin-bottom: 0.5rem;
    }

    .product-price-section {
        margin: 2rem 0;
        padding: 2rem 0;
        border-bottom: 1px solid rgba(29,50,130,0.1);
    }

    .product-price {
        font-size: 2.5rem;
        font-weight: 700;
        color: #0FB6EF;
        margin-bottom: 1rem;
        font-family: 'Playfair Display', serif;
    }

    .product-price .woocommerce-price-amount {
        color: #0FB6EF;
    }

    .product-rating {
        margin-bottom: 1.5rem;
    }

    .product-rating .star-rating {
        color: #0FB6EF;
    }

    .product-short-desc {
        font-size: 1rem;
        color: #666666;
        line-height: 1.8;
        margin: 2rem 0;
    }

    .product-quantity-wrapper {
        display: flex;
        gap: 1rem;
        margin: 2rem 0;
        flex-wrap: wrap;
        align-items: center;
    }

    .product-quantity {
        display: flex;
        align-items: center;
        border: 1px solid rgba(29, 50, 130, 0.2);
        border-radius: 4px;
        overflow: hidden;
    }

    .product-quantity input {
        width: 60px;
        padding: 0.5rem;
        border: none;
        background: transparent;
        color: #1D3282;
        text-align: center;
        font-weight: 600;
    }

    .product-quantity button {
        background: transparent;
        border: none;
        color: #0FB6EF;
        cursor: pointer;
        padding: 0.5rem 0.75rem;
        transition: all 0.3s ease;
    }

    .product-quantity button:hover {
        background: rgba(15, 182, 239, 0.1);
    }

    .product-add-to-cart {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        margin: 2rem 0;
    }

    .product-add-to-cart .button {
        background-color: #0FB6EF;
        color: #ffffff;
        border: 2px solid #0FB6EF;
        padding: 1rem 2rem;
        border-radius: 4px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
        cursor: pointer;
        font-size: 1rem;
        text-align: center;
        flex: 1;
        min-width: 200px;
    }

    .product-add-to-cart .button:hover {
        background-color: #0a9fcc;
        border-color: #0a9fcc;
    }

    .product-add-to-cart .button:disabled {
        background-color: #ffffff;
        color: #666666;
        border-color: #ffffff;
        cursor: not-allowed;
    }

    .product-description {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border: 1px solid rgba(29,50,130,0.1);
        border-radius: 8px;
        padding: 2rem;
        margin-top: 3rem;
    }

    .product-description h2 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #1D3282;
        margin-bottom: 1.5rem;
        font-family: 'Playfair Display', serif;
    }

    .product-description .woocommerce-product-details__short-description,
    .product-description .woocommerce-tabs__panel {
        color: #666666;
        line-height: 1.8;
    }

    .product-description .woocommerce-tabs__panel p {
        margin-bottom: 1rem;
    }

    .product-back-link {
        display: inline-block;
        color: #0FB6EF;
        text-decoration: none;
        margin-bottom: 2rem;
        transition: all 0.3s ease;
    }

    .product-back-link:hover {
        color: #0a9fcc;
    }

    /* Product Content Improvements */
    .product-info h1 {
        margin-top: 0;
    }

    .woocommerce-product-details__short-description {
        color: #666666 !important;
        font-size: 1rem !important;
        line-height: 1.6 !important;
        margin-bottom: 1.5rem !important;
    }

    .woocommerce-product-details__short-description p {
        margin-bottom: 1rem;
        color: #666666;
    }

    .woocommerce-product-details__short-description p:last-child {
        margin-bottom: 0;
    }

    .product-description p {
        color: #666666;
        line-height: 1.8;
        margin-bottom: 1.5rem;
    }

    .product-description ul,
    .product-description ol {
        color: #666666;
        margin-left: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .product-description li {
        margin-bottom: 0.75rem;
        line-height: 1.6;
    }

    .product-description strong {
        color: #1D3282;
        font-weight: 700;
    }

    .product-description a {
        color: #0FB6EF;
        text-decoration: none;
    }

    .product-description a:hover {
        color: #0a9fcc;
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .product-title {
            font-size: 1.8rem;
        }

        .product-price {
            font-size: 1.8rem;
        }

        .product-meta {
            flex-direction: column;
            gap: 1rem;
        }

        .product-add-to-cart {
            flex-direction: column;
        }

        .product-add-to-cart .button {
            width: 100%;
            min-width: auto;
        }

        .product-gallery {
            margin-bottom: 2rem;
        }

        .product-info {
            padding: 1.5rem;
        }
    }
</style>

<main id="primary" class="site-main">
    <!-- Product Breadcrumb -->
    <div class="product-hero">
        <div class="container">
            <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>" class="product-back-link">← Back to Shop</a>
        </div>
    </div>

    <!-- Product Content -->
    <div class="product-content">
        <div class="container">
            <?php
            while ( have_posts() ) :
                the_post();

                global $product;

                if ( $product ) :
                    ?>
                    <div class="row">
                        <!-- Product Gallery -->
                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <div id="product-gallery" class="product-gallery">
                                <?php
                                if ( $product ) {
                                    // Get featured image
                                    $image_id = $product->get_image_id();

                                    if ( $image_id ) {
                                        echo wp_get_attachment_image( $image_id, 'full', false, array(
                                            'class' => 'product-main-image',
                                            'alt' => $product->get_name(),
                                            'style' => 'width: 100%; height: auto; border-radius: 4px;'
                                        ) );
                                    } else {
                                        echo '<div style="width: 100%; height: 500px; background: linear-gradient(135deg, #f8f9fa 0%, #e8f0ff 100%); border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 5rem; color: #d1d5db;">📷</div>';
                                    }
                                } else {
                                    echo '<div style="width: 100%; height: 500px; background: linear-gradient(135deg, #f8f9fa 0%, #e8f0ff 100%); border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 5rem; color: #d1d5db;">📷</div>';
                                }
                                ?>
                            </div>
                        </div>

                        <!-- Product Info -->
                        <div class="col-lg-6">
                            <div class="product-info">
                                <!-- Title -->
                                <h1 class="product-title"><?php the_title(); ?></h1>

                                <!-- Categories -->
                                <div>
                                    <?php echo wc_get_product_category_list( $product->get_id(), '', '<span class="product-category">', '</span>' ); ?>
                                </div>

                                <!-- Rating -->
                                <?php
                                if ( wc_product_sku_enabled() && $product->get_sku() ) {
                                    echo '<div class="product-meta">';
                                    echo '<div class="product-meta-item">';
                                    echo '<span class="product-meta-label">SKU</span>';
                                    echo '<span class="product-meta-value">' . esc_html( $product->get_sku() ) . '</span>';
                                    echo '</div>';
                                    echo '</div>';
                                }

                                // Rating
                                woocommerce_template_single_rating();
                                ?>

                                <!-- Price -->
                                <div class="product-price-section">
                                    <div class="product-price">
                                        <?php woocommerce_template_single_price(); ?>
                                    </div>
                                </div>

                                <!-- Short Description -->
                                <?php woocommerce_template_single_excerpt(); ?>

                                <!-- Add to Cart -->
                                <div class="product-add-to-cart">
                                    <?php
                                    if ( $product->is_purchasable() ) {
                                        woocommerce_template_single_add_to_cart();
                                    }
                                    ?>
                                </div>

                                <!-- Meta Info -->
                                <div class="product-meta" style="padding-top: 2rem;">
                                    <?php
                                    if ( $product->get_type() === 'simple' ) {
                                        echo '<div class="product-meta-item">';
                                        echo '<span class="product-meta-label">Availability</span>';
                                        if ( $product->is_in_stock() ) {
                                            echo '<span class="product-meta-value" style="color: #10b981;">In Stock</span>';
                                        } else {
                                            echo '<span class="product-meta-value" style="color: #ef4444;">Out of Stock</span>';
                                        }
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Description -->
                    <?php
                    if ( $product->get_description() ) {
                        ?>
                        <div class="product-description">
                            <h2>About This Product</h2>
                            <?php echo wp_kses_post( $product->get_description() ); ?>
                        </div>
                        <?php
                    }
                    ?>

                    <?php
                endif;
            endwhile;
            ?>
        </div>
    </div>
</main><!-- #main -->

<?php
get_footer();
