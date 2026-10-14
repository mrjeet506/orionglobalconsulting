<?php
/**
 * WooCommerce Order Received Template
 *
 * @package Memento
 */

get_header();
?>

<style>
    .order-received-hero {
        padding: 3rem 0;
        background: linear-gradient(135deg, #dcfce7 0%, #ecfdf5 100%);
        border-bottom: 1px solid rgba(29, 50, 130, 0.1);
    }

    .order-received-hero.error {
        background: linear-gradient(135deg, #fee2e2 0%, #fef2f2 100%);
    }

    .order-success-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
    }

    .order-received-title {
        font-size: 2.5rem;
        font-weight: 900;
        font-family: 'Playfair Display', serif;
        color: #1D3282;
        margin: 0 0 1rem 0;
    }

    .order-received-subtitle {
        font-size: 1.1rem;
        color: #666666;
    }

    .order-details-content {
        padding: 3rem 0;
    }

    .order-details-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .order-detail-card {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border: 1px solid rgba(29, 50, 130, 0.1);
        border-radius: 8px;
        padding: 2rem;
    }

    .order-detail-card h3 {
        color: #1D3282;
        font-weight: 700;
        margin-bottom: 1rem;
        font-size: 1.1rem;
    }

    .order-detail-card p {
        color: #666666;
        line-height: 1.8;
        margin: 0.5rem 0;
    }

    .order-number {
        font-size: 1.5rem;
        font-weight: 700;
        color: #0FB6EF;
    }

    .order-date {
        color: #999999;
        font-size: 0.95rem;
    }

    .order-table {
        width: 100%;
        border-collapse: collapse;
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border: 1px solid rgba(29, 50, 130, 0.1);
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .order-table th {
        background: transparent;
        color: #1D3282;
        font-weight: 700;
        text-align: left;
        padding: 1.5rem;
        border-bottom: 2px solid rgba(29, 50, 130, 0.1);
    }

    .order-table td {
        padding: 1.5rem;
        color: #666666;
        border-bottom: 1px solid rgba(29, 50, 130, 0.05);
    }

    .order-table tr:last-child td {
        border-bottom: none;
    }

    .order-table .product-name {
        color: #1D3282;
        font-weight: 600;
    }

    .order-table .product-price {
        color: #0FB6EF;
        font-weight: 700;
    }

    .order-table .order-total {
        font-size: 1.1rem;
        font-weight: 700;
        background: rgba(15, 182, 239, 0.05);
    }

    .order-table .order-total td {
        padding: 1.5rem;
    }

    .order-totals {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border: 1px solid rgba(29, 50, 130, 0.1);
        border-radius: 8px;
        padding: 2rem;
        max-width: 400px;
        margin-left: auto;
        margin-bottom: 3rem;
    }

    .order-totals-row {
        display: flex;
        justify-content: space-between;
        padding: 0.75rem 0;
        border-bottom: 1px solid rgba(29, 50, 130, 0.1);
        color: #666666;
    }

    .order-totals-row.total {
        border-bottom: none;
        font-size: 1.2rem;
        font-weight: 700;
        padding-top: 1rem;
        color: #1D3282;
    }

    .order-totals-row.total .amount {
        color: #0FB6EF;
    }

    .order-details-section {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border: 1px solid rgba(29, 50, 130, 0.1);
        border-radius: 8px;
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .order-details-section h3 {
        color: #1D3282;
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #0FB6EF;
    }

    .order-address {
        color: #666666;
        line-height: 1.8;
    }

    .order-address strong {
        color: #1D3282;
        display: block;
        margin-bottom: 0.5rem;
    }

    .next-steps {
        background: linear-gradient(135deg, rgba(15, 182, 239, 0.1) 0%, rgba(15, 182, 239, 0.05) 100%);
        border: 2px solid #0FB6EF;
        border-radius: 8px;
        padding: 2rem;
        margin-bottom: 3rem;
    }

    .next-steps h3 {
        color: #1D3282;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .next-steps ol {
        color: #666666;
        line-height: 1.8;
        margin-left: 2rem;
    }

    .next-steps li {
        margin-bottom: 0.75rem;
    }

    .next-steps strong {
        color: #1D3282;
    }

    .continue-shopping {
        display: inline-block;
        background-color: #0FB6EF;
        color: #ffffff;
        padding: 1rem 2rem;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 700;
        transition: all 0.3s ease;
    }

    .continue-shopping:hover {
        background-color: #0a9fcc;
    }

    .woocommerce-message {
        background: #ecfdf5;
        border: 1px solid #86efac;
        color: #15803d;
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 2rem;
    }

    .woocommerce-error {
        background: #fee2e2;
        border: 1px solid #fca5a5;
        color: #991b1b;
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 2rem;
    }

    @media (max-width: 768px) {
        .order-received-title {
            font-size: 2rem;
        }

        .order-details-grid {
            grid-template-columns: 1fr;
        }

        .order-totals {
            max-width: 100%;
        }

        .order-success-icon {
            font-size: 3rem;
        }
    }
</style>

<main id="primary" class="site-main">
    <!-- Success/Error Hero -->
    <div class="order-received-hero <?php echo wc_get_order_status() === 'pending' ? 'error' : ''; ?>">
        <div class="container" style="text-align: center;">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php
                    $order = wc_get_order( get_the_ID() );
                    if ( $order ) {
                        $status = $order->get_status();
                        $icon = $status === 'failed' ? '❌' : '✅';
                    } else {
                        $icon = '✅';
                    }
                ?>
                <div class="order-success-icon"><?php echo $icon; ?></div>
                <h1 class="order-received-title">
                    <?php
                    if ( $order && $order->get_status() === 'failed' ) {
                        esc_html_e( 'Order Failed', 'woocommerce' );
                    } else {
                        esc_html_e( 'Order Received!', 'woocommerce' );
                    }
                    ?>
                </h1>
                <p class="order-received-subtitle">
                    <?php
                    if ( $order && $order->get_status() === 'failed' ) {
                        esc_html_e( 'Unfortunately, your order could not be processed.', 'woocommerce' );
                    } else {
                        esc_html_e( 'Thank you for your purchase. Your order has been received and is being processed.', 'woocommerce' );
                    }
                    ?>
                </p>
            <?php endwhile; endif; ?>
        </div>
    </div>

    <!-- Order Details Content -->
    <div class="order-details-content">
        <div class="container">
            <?php
            while ( have_posts() ) :
                the_post();
                $order_id = get_the_ID();
                $order = wc_get_order( $order_id );

                if ( $order ) :
            ?>

            <!-- Order Info Cards -->
            <div class="order-details-grid">
                <div class="order-detail-card">
                    <h3>Order Number</h3>
                    <p class="order-number">#<?php echo $order->get_order_number(); ?></p>
                </div>
                <div class="order-detail-card">
                    <h3>Order Date</h3>
                    <p class="order-date"><?php echo $order->get_date_created()->format( 'F j, Y' ); ?></p>
                </div>
                <div class="order-detail-card">
                    <h3>Status</h3>
                    <p>
                        <span class="order-status <?php echo $order->get_status(); ?>">
                            <?php echo wc_get_order_status_name( $order->get_status() ); ?>
                        </span>
                    </p>
                </div>
                <div class="order-detail-card">
                    <h3>Total Amount</h3>
                    <p style="font-size: 1.3rem; font-weight: 700; color: #0FB6EF;">
                        <?php echo $order->get_formatted_order_total(); ?>
                    </p>
                </div>
            </div>

            <!-- Order Items -->
            <h2 style="color: #1D3282; font-family: 'Playfair Display', serif; font-size: 1.5rem; margin-bottom: 1.5rem;">Order Items</h2>
            <table class="order-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th style="text-align: right;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ( $order->get_items() as $item_id => $item ) {
                        $product = $item->get_product();
                        $quantity = $item->get_quantity();
                        $total = $item->get_total();
                    ?>
                    <tr>
                        <td class="product-name"><?php echo $item->get_name(); ?></td>
                        <td><?php echo $quantity; ?></td>
                        <td class="product-price"><?php echo wc_price( $item->get_total() / $quantity ); ?></td>
                        <td style="text-align: right; color: #0FB6EF; font-weight: 700;"><?php echo wc_price( $total ); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <!-- Order Totals -->
            <div class="order-totals">
                <?php if ( $order->get_subtotal() ) : ?>
                    <div class="order-totals-row">
                        <span>Subtotal:</span>
                        <span><?php echo wc_price( $order->get_subtotal() ); ?></span>
                    </div>
                <?php endif; ?>

                <?php if ( $order->get_total_shipping() > 0 ) : ?>
                    <div class="order-totals-row">
                        <span>Shipping:</span>
                        <span><?php echo wc_price( $order->get_total_shipping() ); ?></span>
                    </div>
                <?php endif; ?>

                <?php if ( $order->get_total_tax() > 0 ) : ?>
                    <div class="order-totals-row">
                        <span>Tax:</span>
                        <span><?php echo wc_price( $order->get_total_tax() ); ?></span>
                    </div>
                <?php endif; ?>

                <div class="order-totals-row total">
                    <span>Total:</span>
                    <span class="amount"><?php echo $order->get_formatted_order_total(); ?></span>
                </div>
            </div>

            <!-- Billing & Shipping Addresses -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-bottom: 3rem;">
                <!-- Billing Address -->
                <div class="order-details-section">
                    <h3>Billing Address</h3>
                    <div class="order-address">
                        <strong><?php echo $order->get_billing_first_name() . ' ' . $order->get_billing_last_name(); ?></strong>
                        <?php echo $order->get_billing_address_1(); ?><br>
                        <?php if ( $order->get_billing_address_2() ) echo $order->get_billing_address_2() . '<br>'; ?>
                        <?php echo $order->get_billing_city() . ', ' . $order->get_billing_state() . ' ' . $order->get_billing_postcode(); ?><br>
                        <?php echo $order->get_billing_country(); ?><br>
                        <strong>Email:</strong> <?php echo $order->get_billing_email(); ?><br>
                        <strong>Phone:</strong> <?php echo $order->get_billing_phone(); ?>
                    </div>
                </div>

                <!-- Shipping Address -->
                <div class="order-details-section">
                    <h3>Shipping Address</h3>
                    <div class="order-address">
                        <strong><?php echo $order->get_shipping_first_name() . ' ' . $order->get_shipping_last_name(); ?></strong>
                        <?php echo $order->get_shipping_address_1(); ?><br>
                        <?php if ( $order->get_shipping_address_2() ) echo $order->get_shipping_address_2() . '<br>'; ?>
                        <?php echo $order->get_shipping_city() . ', ' . $order->get_shipping_state() . ' ' . $order->get_shipping_postcode(); ?><br>
                        <?php echo $order->get_shipping_country(); ?>
                    </div>
                </div>
            </div>

            <!-- Next Steps -->
            <div class="next-steps">
                <h3>What's Next?</h3>
                <ol>
                    <li><strong>Confirmation Email:</strong> You'll receive an email confirmation shortly with your order details.</li>
                    <li><strong>Order Processing:</strong> Our team will begin processing your order immediately. You can track its status from your account dashboard.</li>
                    <li><strong>Shipping:</strong> Once your order ships, you'll receive a tracking number via email.</li>
                    <li><strong>Questions?</strong> Feel free to <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" style="color: #0FB6EF; text-decoration: none; font-weight: 600;">contact us</a> if you have any questions.</li>
                </ol>
            </div>

            <!-- Continue Shopping Button -->
            <div style="text-align: center; margin-bottom: 3rem;">
                <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="continue-shopping">
                    Continue Shopping
                </a>
            </div>

            <?php
                endif;
            endwhile;
            ?>
        </div>
    </div>
</main>

<?php
get_footer();
