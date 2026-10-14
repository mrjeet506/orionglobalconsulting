<?php
/**
 * WooCommerce Cart Template
 *
 * @package Memento
 */

get_header();
?>

<style>
    .woocommerce-cart-hero {
        padding: 3rem 0;
        background: linear-gradient(135deg, rgba(15, 182, 239, 0.1) 0%, rgba(255, 255, 255, 0) 100%);
        border-bottom: 1px solid rgba(29, 50, 130, 0.1);
        width: 100vw;
        position: relative;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
    }

    .woocommerce-cart-title {
        font-size: 2.5rem;
        font-weight: 900;
        font-family: 'Playfair Display', serif;
        color: #1D3282;
        margin: 0 !important;
    }

    .woocommerce-cart-content {
        padding: 3rem 0;
        width: 100vw;
        position: relative;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
    }

    .woocommerce table {
        background: #ffffff;
        border: 1px solid rgba(29, 50, 130, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    .woocommerce table th {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        color: #1D3282;
        font-weight: 700;
        padding: 1.5rem;
        border-bottom: 2px solid rgba(29, 50, 130, 0.1);
    }

    .woocommerce table td {
        padding: 1.5rem;
        border-bottom: 1px solid rgba(29, 50, 130, 0.05);
        color: #666666;
    }

    .woocommerce table tbody tr:hover {
        background: rgba(15, 182, 239, 0.05);
    }

    .woocommerce .product-name {
        color: #1D3282;
        font-weight: 600;
    }

    .woocommerce .product-price {
        color: #0FB6EF;
        font-weight: 700;
    }

    .woocommerce .quantity input {
        background: #ffffff;
        border: 1px solid rgba(29, 50, 130, 0.2);
        color: #1D3282;
        padding: 0.5rem;
        border-radius: 4px;
    }

    .woocommerce .remove {
        color: #ef4444;
        text-decoration: none;
        font-weight: 600;
    }

    .woocommerce .remove:hover {
        color: #dc2626;
    }

    .woocommerce .cart-collaterals {
        margin-top: 2rem;
    }

    .woocommerce-cart-collateral {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border: 1px solid rgba(29, 50, 130, 0.1);
        border-radius: 8px;
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .woocommerce-cart-collateral h2 {
        color: #1D3282;
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .woocommerce .cart_totals {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border: 1px solid rgba(29, 50, 130, 0.1);
        border-radius: 8px;
        padding: 2rem;
    }

    .woocommerce .cart_totals table {
        border: none;
        box-shadow: none;
    }

    .woocommerce .cart_totals table th {
        background: transparent;
        border-bottom: 1px solid rgba(29, 50, 130, 0.1);
    }

    .woocommerce .cart_totals table tr.order-total th,
    .woocommerce .cart_totals table tr.order-total td {
        background: linear-gradient(135deg, rgba(15, 182, 239, 0.1) 0%, rgba(15, 182, 239, 0.05) 100%);
        border-bottom: 2px solid #0FB6EF;
        font-weight: 700;
        font-size: 1.1rem;
    }

    .woocommerce .cart_totals table tr.order-total .woocommerce-Price-amount {
        color: #0FB6EF;
    }

    .woocommerce .checkout-button {
        background-color: #0FB6EF !important;
        color: #ffffff !important;
        border: 2px solid #0FB6EF !important;
        padding: 1rem 2rem !important;
        font-weight: 700 !important;
        border-radius: 4px !important;
        width: 100% !important;
        margin-top: 1rem !important;
    }

    .woocommerce .checkout-button:hover {
        background-color: #0a9fcc !important;
        border-color: #0a9fcc !important;
    }

    .woocommerce .button {
        background-color: #0FB6EF !important;
        color: #ffffff !important;
        border: 2px solid #0FB6EF !important;
        padding: 0.75rem 1.5rem !important;
        font-weight: 700 !important;
        border-radius: 4px !important;
    }

    .woocommerce .button:hover {
        background-color: #0a9fcc !important;
        border-color: #0a9fcc !important;
    }

    .woocommerce-message {
        background: linear-gradient(135deg, #ecfdf5 0%, #f0fdf4 100%) !important;
        border: 1px solid #86efac !important;
        color: #15803d !important;
        border-radius: 8px !important;
    }

    .woocommerce-error {
        background: linear-gradient(135deg, #fef2f2 0%, #fef2f2 100%) !important;
        border: 1px solid #fca5a5 !important;
        color: #991b1b !important;
        border-radius: 8px !important;
    }

    .cart-empty {
        text-align: center;
        padding: 3rem 0;
    }

    .cart-empty p {
        font-size: 1.1rem;
        color: #666666;
        margin-bottom: 2rem;
    }

    .cart-empty-illustration {
        font-size: 5rem;
        margin-bottom: 1.5rem;
        opacity: 0.8;
    }

    .return-to-shop,
    .continue-shopping {
        display: inline-block;
        background-color: #0FB6EF;
        color: #ffffff;
        padding: 0.85rem 2rem;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 700;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(15, 182, 239, 0.25);
        margin: 0.5rem;
    }

    .return-to-shop:hover,
    .continue-shopping:hover {
        background-color: #0a9fcc;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(15, 182, 239, 0.35);
    }

    .cart-empty-actions {
        margin-top: 2rem;
        text-align: center;
    }

    .checkout-section {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border: 1px solid rgba(29, 50, 130, 0.1);
        border-radius: 8px;
        padding: 2rem;
        margin-top: 2rem;
    }

    .checkout-button-container {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        margin-top: 2rem;
    }

    .checkout-button {
        flex: 1;
        min-width: 200px;
    }

    @media (max-width: 768px) {
        .woocommerce table {
            font-size: 0.9rem;
        }

        .woocommerce table th,
        .woocommerce table td {
            padding: 1rem;
        }

        .woocommerce-cart-collateral {
            margin-bottom: 1.5rem;
        }

        .woocommerce-cart-hero .container,
        .woocommerce-cart-content .container {
            padding: 0 1rem;
        }
    }
</style>

<main id="primary" class="site-main">
    <!-- Hero -->
    <div class="woocommerce-cart-hero">
        <h1 class="woocommerce-cart-title" style="max-width: 1200px; margin-left: auto; margin-right: auto; padding: 0 1.5rem;">Your Shopping Cart</h1>
    </div>

    <!-- Cart Content -->
    <div class="woocommerce-cart-content" style="display: flex; justify-content: center;">
        <div style="width: 100%; padding: 0 1.5rem;">
            <?php
            if ( sizeof( WC()->cart->get_cart() ) > 0 ) {
                woocommerce_cart_page();
            } else {
                ?>
                <div class="cart-empty">
                    <div class="cart-empty-illustration">🛒</div>
                    <h2 style="color: #1D3282; font-family: 'Playfair Display', serif; font-size: 1.8rem;">Your Cart is Empty</h2>
                    <p>You haven't added any items yet. Start exploring our products and add them to your cart!</p>

                    <div class="cart-empty-actions">
                        <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="return-to-shop">
                            ← Continue Shopping
                        </a>
                    </div>
                </div>
                <?php
            }
            ?>

            <!-- Continue Shopping Button (also for non-empty cart) -->
            <?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) { ?>
                <div style="margin-top: 2rem; text-align: center;">
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="continue-shopping">
                        ← Continue Shopping
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</main>

<?php
get_footer();
