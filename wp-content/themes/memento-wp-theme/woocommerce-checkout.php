<?php
/**
 * WooCommerce Checkout Template
 *
 * @package Memento
 */

get_header();
?>

<style>
    .woocommerce-checkout-hero {
        padding: 3rem 0;
        background: linear-gradient(135deg, rgba(15, 182, 239, 0.1) 0%, rgba(255, 255, 255, 0) 100%);
        border-bottom: 1px solid rgba(29, 50, 130, 0.1);
    }

    .woocommerce-checkout-title {
        font-size: 2.5rem;
        font-weight: 900;
        font-family: 'Playfair Display', serif;
        color: #1D3282;
        margin: 0;
    }

    .woocommerce-checkout-content {
        padding: 3rem 0;
    }

    .woocommerce-form {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border: 1px solid rgba(29, 50, 130, 0.1);
        border-radius: 8px;
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .woocommerce-form h3 {
        color: #1D3282;
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        border-bottom: 2px solid #0FB6EF;
        padding-bottom: 1rem;
    }

    .woocommerce-form-group {
        margin-bottom: 1.5rem;
    }

    .woocommerce-form label {
        color: #1D3282;
        font-weight: 600;
        display: block;
        margin-bottom: 0.5rem;
    }

    .woocommerce-form input[type="text"],
    .woocommerce-form input[type="email"],
    .woocommerce-form input[type="tel"],
    .woocommerce-form input[type="number"],
    .woocommerce-form select,
    .woocommerce-form textarea {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid rgba(29, 50, 130, 0.2);
        border-radius: 4px;
        background: #ffffff;
        color: #1D3282;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .woocommerce-form input[type="text"]:focus,
    .woocommerce-form input[type="email"]:focus,
    .woocommerce-form input[type="tel"]:focus,
    .woocommerce-form input[type="number"]:focus,
    .woocommerce-form select:focus,
    .woocommerce-form textarea:focus {
        border-color: #0FB6EF;
        outline: none;
        box-shadow: 0 0 0 3px rgba(15, 182, 239, 0.1);
    }

    .woocommerce-form input[type="checkbox"],
    .woocommerce-form input[type="radio"] {
        accent-color: #0FB6EF;
    }

    .woocommerce-form .form-row {
        margin-bottom: 1.5rem;
    }

    .woocommerce-checkout-review-order {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border: 1px solid rgba(29, 50, 130, 0.1);
        border-radius: 8px;
        padding: 2rem;
    }

    .woocommerce-checkout-review-order h3 {
        color: #1D3282;
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        border-bottom: 2px solid #0FB6EF;
        padding-bottom: 1rem;
    }

    .woocommerce-checkout-review-order table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 1rem;
    }

    .woocommerce-checkout-review-order table th {
        background: transparent;
        color: #1D3282;
        font-weight: 700;
        text-align: left;
        padding: 0.75rem 0;
        border-bottom: 2px solid rgba(29, 50, 130, 0.1);
    }

    .woocommerce-checkout-review-order table td {
        padding: 1rem 0;
        color: #666666;
        border-bottom: 1px solid rgba(29, 50, 130, 0.05);
    }

    .woocommerce-checkout-review-order table .product-total {
        color: #0FB6EF;
        font-weight: 700;
    }

    .woocommerce-checkout-review-order .order-total {
        font-size: 1.2rem;
        font-weight: 700;
        background: linear-gradient(135deg, rgba(15, 182, 239, 0.1) 0%, rgba(15, 182, 239, 0.05) 100%);
        padding: 1rem;
        border-radius: 4px;
        margin-top: 1rem;
    }

    .woocommerce-checkout-review-order .order-total .woocommerce-Price-amount {
        color: #0FB6EF;
    }

    .woocommerce-CheckoutError {
        background: #fef2f2 !important;
        border: 1px solid #fca5a5 !important;
        color: #991b1b !important;
        border-radius: 8px !important;
        padding: 1rem !important;
        margin-bottom: 1rem !important;
    }

    .woocommerce .place-order {
        margin-top: 2rem;
    }

    .woocommerce .place-order button {
        background-color: #0FB6EF !important;
        color: #ffffff !important;
        border: 2px solid #0FB6EF !important;
        padding: 1rem 2rem !important;
        font-weight: 700 !important;
        border-radius: 4px !important;
        width: 100% !important;
        font-size: 1.1rem !important;
        cursor: pointer !important;
        transition: all 0.3s ease !important;
    }

    .woocommerce .place-order button:hover {
        background-color: #0a9fcc !important;
        border-color: #0a9fcc !important;
    }

    .required {
        color: #ef4444;
    }

    @media (max-width: 768px) {
        .woocommerce-form,
        .woocommerce-checkout-review-order {
            padding: 1.5rem;
        }

        .woocommerce-checkout-review-order h3,
        .woocommerce-form h3 {
            font-size: 1.25rem;
        }
    }
</style>

<main id="primary" class="site-main">
    <!-- Hero -->
    <div class="woocommerce-checkout-hero">
        <div class="container">
            <h1 class="woocommerce-checkout-title">Checkout</h1>
        </div>
    </div>

    <!-- Checkout Content -->
    <div class="woocommerce-checkout-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php woocommerce_checkout(); ?>
                </div>
                <div class="col-lg-4">
                    <div class="woocommerce-checkout-review-order">
                        <h3>Order Summary</h3>
                        <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
                        <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
