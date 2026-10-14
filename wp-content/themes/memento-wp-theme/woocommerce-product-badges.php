<?php
/**
 * WooCommerce Product Badges
 * Free vs Paid Product Indicators
 *
 * @package Memento
 */

// Add Free/Paid badge before product title
add_action( 'woocommerce_before_shop_loop_item_title', function() {
    global $product;

    $price = $product->get_price();

    if ( $price == 0 || $price === '0' ) {
        echo '<div class="product-badge product-badge-free">';
        echo '<span class="badge-icon">💝</span>';
        echo '<span class="badge-text">FREE</span>';
        echo '</div>';
    } else {
        echo '<div class="product-badge product-badge-paid">';
        echo '<span class="badge-icon">💎</span>';
        echo '<span class="badge-text">PREMIUM</span>';
        echo '</div>';
    }
}, 5 );

// Add badge to single product page
add_action( 'woocommerce_before_single_product_summary', function() {
    global $product;

    $price = $product->get_price();

    if ( $price == 0 || $price === '0' ) {
        echo '<div class="single-product-badge product-badge-free" style="margin-bottom: 1.5rem;">';
        echo '<span class="badge-icon" style="font-size: 1.5rem;">💝</span>';
        echo '<span class="badge-text" style="font-size: 1.1rem; font-weight: 700;">FREE PRODUCT</span>';
        echo '</div>';
    } else {
        echo '<div class="single-product-badge product-badge-paid" style="margin-bottom: 1.5rem;">';
        echo '<span class="badge-icon" style="font-size: 1.5rem;">💎</span>';
        echo '<span class="badge-text" style="font-size: 1.1rem; font-weight: 700;">PREMIUM PRODUCT</span>';
        echo '</div>';
    }
}, 5 );

// CSS for badges
add_action( 'wp_head', function() {
    ?>
    <style>
        /* Product Badges */
        .product-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-weight: 700;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.75rem;
            position: relative;
            z-index: 10;
        }

        /* Free Badge */
        .product-badge-free {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
            border: 1px solid #6ee7b7;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
        }

        .product-badge-free .badge-icon {
            font-size: 1rem;
        }

        .product-badge-free .badge-text {
            color: #065f46;
        }

        /* Paid Badge */
        .product-badge-paid {
            background: linear-gradient(135deg, #fce7f3 0%, #fbcfe8 100%);
            color: #831843;
            border: 1px solid #f472b6;
            box-shadow: 0 4px 12px rgba(236, 72, 153, 0.2);
        }

        .product-badge-paid .badge-icon {
            font-size: 1rem;
        }

        .product-badge-paid .badge-text {
            color: #831843;
        }

        /* Single Product Badge */
        .single-product-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(10px);
        }

        .single-product-badge.product-badge-free {
            background: linear-gradient(135deg, rgba(209, 250, 229, 0.8) 0%, rgba(167, 243, 208, 0.8) 100%);
            border: 2px solid #6ee7b7;
        }

        .single-product-badge.product-badge-paid {
            background: linear-gradient(135deg, rgba(252, 231, 243, 0.8) 0%, rgba(251, 207, 232, 0.8) 100%);
            border: 2px solid #f472b6;
        }

        /* Product Card with Badge */
        .woocommerce .product {
            position: relative;
        }

        .product-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            z-index: 100;
        }

        /* Product Image Container */
        .product-image {
            position: relative;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .product-badge {
                padding: 0.4rem 0.75rem;
                font-size: 0.7rem;
                gap: 0.35rem;
            }

            .product-badge .badge-icon {
                font-size: 0.85rem !important;
            }
        }
    </style>
    <?php
} );

// Modify price display for free products
add_filter( 'woocommerce_get_price_html', function( $price_html, $product ) {
    if ( $product->get_price() == 0 || $product->get_price() === '0' ) {
        return '<span class="price price-free">
            <span class="woocommerce-Price-amount amount">
                <span class="woocommerce-Price-currencySymbol"></span>
                <strong style="color: #10b981; font-size: 1.3rem;">FREE</strong>
            </span>
        </span>';
    }
    return $price_html;
}, 10, 2 );
