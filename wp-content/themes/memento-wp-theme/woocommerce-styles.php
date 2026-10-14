<?php
/**
 * WooCommerce Global Styles
 * This file contains shared CSS for all WooCommerce pages
 *
 * @package Memento
 */

// Register custom stylesheet for WooCommerce
add_action( 'wp_enqueue_scripts', function() {
    // WooCommerce overrides
    wp_add_inline_style( 'memento-style', '
        /* WooCommerce Global Styles */
        .woocommerce-message,
        .woocommerce-error,
        .woocommerce-notice {
            background: #ecfdf5 !important;
            border: 1px solid #86efac !important;
            color: #15803d !important;
            border-radius: 8px !important;
            padding: 1rem !important;
            margin-bottom: 1.5rem !important;
        }

        .woocommerce-error {
            background: #fee2e2 !important;
            border: 1px solid #fca5a5 !important;
            color: #991b1b !important;
        }

        /* Rating Stars */
        .woocommerce .star-rating {
            color: #fbbf24;
        }

        .woocommerce .star-rating::before {
            color: #d1d5db;
        }

        /* Product Meta */
        .woocommerce .product_meta {
            color: #666666;
            border-top: 1px solid rgba(29, 50, 130, 0.1);
            padding-top: 1.5rem;
            margin-top: 1.5rem;
        }

        .woocommerce .product_meta .sku,
        .woocommerce .product_meta .posted_in,
        .woocommerce .product_meta .tagged_as {
            display: block;
            margin-bottom: 0.75rem;
        }

        .woocommerce .product_meta a {
            color: #0FB6EF;
            text-decoration: none;
            font-weight: 600;
        }

        .woocommerce .product_meta a:hover {
            text-decoration: underline;
        }

        /* Quantity Selector */
        .woocommerce .quantity {
            display: inline-block;
            margin-right: 1rem;
        }

        .woocommerce .quantity .qty {
            width: 70px;
            padding: 0.5rem;
            border: 1px solid rgba(29, 50, 130, 0.2);
            border-radius: 4px;
            text-align: center;
            color: #1D3282;
            font-weight: 600;
        }

        .woocommerce .quantity .qty:focus {
            border-color: #0FB6EF;
            outline: none;
            box-shadow: 0 0 0 3px rgba(15, 182, 239, 0.1);
        }

        /* Add to Cart Button */
        .woocommerce .product button.button,
        .woocommerce .product input.button {
            background-color: #0FB6EF !important;
            color: #ffffff !important;
            border: 2px solid #0FB6EF !important;
            padding: 0.75rem 2rem !important;
            font-weight: 700 !important;
            border-radius: 4px !important;
            cursor: pointer !important;
            transition: all 0.3s ease !important;
        }

        .woocommerce .product button.button:hover,
        .woocommerce .product input.button:hover {
            background-color: #0a9fcc !important;
            border-color: #0a9fcc !important;
        }

        /* Related Products Section */
        .woocommerce .related {
            border-top: 2px solid rgba(29, 50, 130, 0.1);
            padding-top: 2rem;
            margin-top: 2rem;
        }

        .woocommerce .related h2 {
            color: #1D3282;
            font-family: "Playfair Display", serif;
            font-size: 1.8rem;
            margin-bottom: 2rem;
        }

        /* Tabs */
        .woocommerce .woocommerce-tabs .nav-tabs {
            border-bottom: 2px solid rgba(29, 50, 130, 0.1);
        }

        .woocommerce .woocommerce-tabs .nav-tabs .nav-link {
            color: #666666;
            border: none;
            padding: 1rem 1.5rem;
            font-weight: 600;
            border-bottom: 3px solid transparent;
            margin-bottom: -2px;
        }

        .woocommerce .woocommerce-tabs .nav-tabs .nav-link:hover {
            color: #0FB6EF;
            border-color: #0FB6EF;
        }

        .woocommerce .woocommerce-tabs .nav-tabs .nav-link.active {
            color: #0FB6EF;
            border-color: #0FB6EF;
        }

        .woocommerce .woocommerce-tabs .tab-content .tab-pane {
            color: #666666;
            line-height: 1.8;
        }

        .woocommerce .woocommerce-tabs .tab-content .tab-pane h2 {
            color: #1D3282;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        /* Reviews Section */
        .woocommerce .reviews_heading {
            color: #1D3282;
            font-family: "Playfair Display", serif;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .woocommerce .comment-text {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            border: 1px solid rgba(29, 50, 130, 0.1);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .woocommerce .comment-text .comment-author {
            color: #1D3282;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .woocommerce .comment-text .comment-meta {
            color: #999999;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .woocommerce .comment-text p {
            color: #666666;
        }

        /* Review Form */
        .woocommerce #review_form #comment {
            width: 100%;
            border: 1px solid rgba(29, 50, 130, 0.2);
            padding: 0.75rem;
            border-radius: 4px;
            color: #1D3282;
        }

        .woocommerce #review_form #comment:focus {
            border-color: #0FB6EF;
            outline: none;
        }

        .woocommerce #review_form label {
            color: #1D3282;
            font-weight: 600;
        }

        /* Cross-sells and Upsells */
        .woocommerce .cross-sells,
        .woocommerce .upsells {
            margin: 2rem 0;
        }

        .woocommerce .cross-sells h2,
        .woocommerce .upsells h2 {
            color: #1D3282;
            font-family: "Playfair Display", serif;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        /* Breadcrumbs */
        .woocommerce .woocommerce-breadcrumb {
            color: #666666;
            margin-bottom: 2rem;
            font-size: 0.9rem;
        }

        .woocommerce .woocommerce-breadcrumb a {
            color: #0FB6EF;
            text-decoration: none;
            font-weight: 600;
        }

        .woocommerce .woocommerce-breadcrumb a:hover {
            text-decoration: underline;
        }

        /* Product Links */
        .woocommerce a.woocommerce-LoopProduct-link {
            text-decoration: none;
        }

        /* Sale Badge */
        .woocommerce .onsale {
            background-color: #ef4444 !important;
            color: #ffffff !important;
            padding: 0.5rem 0.75rem !important;
            border-radius: 4px !important;
            font-weight: 700 !important;
            font-size: 0.85rem !important;
            position: absolute;
            top: -1rem;
            right: -1rem;
        }

        /* Product Gallery */
        .woocommerce .product .images {
            margin-bottom: 2rem;
        }

        .woocommerce .product .images img {
            border-radius: 8px;
            border: 1px solid rgba(29, 50, 130, 0.1);
        }

        /* Summary */
        .woocommerce .product .summary {
            padding: 0;
        }

        .woocommerce .product .summary h1 {
            color: #1D3282;
            font-family: "Playfair Display", serif;
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .woocommerce .product .summary > p {
            color: #666666;
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        /* Placeholders */
        .woocommerce .placeholder-img {
            background: linear-gradient(135deg, #f8f9fa 0%, #e8f0ff 100%) !important;
            color: #ccc !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            font-size: 2rem !important;
        }

        /* Override WooCommerce default columns */
        .woocommerce ul.products.columns-3 li.product {
            width: auto !important;
            margin: 0 !important;
        }

        .woocommerce-page ul.products.columns-3 li.product {
            width: auto !important;
            margin: 0 !important;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .woocommerce .product button.button,
            .woocommerce .product input.button {
                width: 100% !important;
                padding: 0.75rem 1rem !important;
            }

            .woocommerce .quantity {
                display: block;
                margin-bottom: 1rem;
            }

            .woocommerce .product h1 {
                font-size: 1.5rem !important;
            }
        }
    ' );
} );

// Add custom product meta styling
add_filter( 'woocommerce_product_get_rating_html', function( $html ) {
    if ( ! $html ) {
        return '<span class="woocommerce-no-rating" style="color: #999999;">No ratings yet</span>';
    }
    return $html;
} );

// Add consistent message styling
add_filter( 'woocommerce_add_to_cart_fragments', function( $fragments ) {
    return $fragments;
} );

// Ensure proper WooCommerce container classes
add_filter( 'woocommerce_post_class', function( $classes ) {
    $classes[] = 'woocommerce-product-card';
    return $classes;
} );
