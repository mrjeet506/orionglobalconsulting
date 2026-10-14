<?php
/**
 * WooCommerce AJAX Cart & Enhancements
 * Improves cart UX with AJAX functionality
 *
 * @package Memento
 */

// Enable AJAX add to cart
add_filter( 'woocommerce_product_single_add_to_cart_text', function() {
    return __( 'Add to Cart', 'woocommerce' );
});

// Add AJAX add to cart support
add_action( 'wp_footer', function() {
    if ( is_product() ) {
        ?>
        <script>
            jQuery(function($) {
                // AJAX Add to Cart
                $('form.cart').on('submit', function(e) {
                    e.preventDefault();

                    var $thisbutton = $(this).find('button[type="submit"]'),
                        $form = $(this),
                        id = $form.find('[name="product_id"]').val(),
                        product_qty = $form.find('[name="quantity"]').val(),
                        product_type = $form.data('product_type');

                    $thisbutton.removeClass('added').addClass('loading');

                    var data = {
                        action: 'woocommerce_add_to_cart',
                        product_id: id,
                        product_sku: $form.find('[name="product_sku"]').val(),
                        quantity: product_qty,
                        security: wc_add_to_cart_params.security
                    };

                    $.ajax({
                        type: 'post',
                        url: wc_add_to_cart_params.ajax_url,
                        data: data,
                        beforeSend: function(xhr) {
                            $thisbutton.text('<?php esc_html_e('Adding...', 'woocommerce'); ?>');
                        },
                        complete: function(response) {
                            $thisbutton.addClass('added').removeClass('loading');
                        },
                        success: function(response) {
                            if (response.error & response.product_url) {
                                window.location = response.product_url;
                                return;
                            } else {
                                // Show success notification
                                showAddToCartNotification(product_qty);

                                // Update cart count
                                updateCartCount();

                                // Show View Cart button
                                showViewCartButton();
                            }
                        },
                        dataType: 'json'
                    });

                    return false;
                });
            });

            // Show notification
            function showAddToCartNotification(qty) {
                var message = qty + ' item(s) added to cart successfully!';
                var $notification = $('<div class="woocommerce-product-added-notification">' +
                    '<div class="notification-content">' +
                    '<span class="notification-icon">✓</span>' +
                    '<span class="notification-text">' + message + '</span>' +
                    '</div>' +
                    '</div>');

                $('body').append($notification);

                setTimeout(function() {
                    $notification.addClass('show');
                }, 100);

                setTimeout(function() {
                    $notification.removeClass('show');
                    setTimeout(function() {
                        $notification.remove();
                    }, 300);
                }, 4000);
            }

            // Show View Cart Button
            function showViewCartButton() {
                var $btn = $('<a href="<?php echo wc_get_cart_url(); ?>" class="button-view-cart">View Cart →</a>');
                var $container = $('form.cart').find('.single_add_to_cart_button').parent();

                if (!$container.find('.button-view-cart').length) {
                    $container.append($btn);
                }
            }

            // Update cart count in header
            function updateCartCount() {
                $.ajax({
                    url: wc_add_to_cart_params.ajax_url,
                    data: {
                        action: 'get_cart_count'
                    },
                    success: function(count) {
                        $('.cart-item-count').text(count);
                        if (count > 0) {
                            $('.cart-icon-badge').addClass('active');
                        }
                    }
                });
            }
        </script>

        <style>
            /* Add to Cart Notification */
            .woocommerce-product-added-notification {
                position: fixed;
                bottom: 20px;
                right: 20px;
                background: linear-gradient(135deg, #10b981 0%, #059669 100%);
                color: #ffffff;
                padding: 1.25rem 1.75rem;
                border-radius: 8px;
                box-shadow: 0 10px 30px rgba(16, 185, 129, 0.3);
                z-index: 9999;
                opacity: 0;
                transform: translateY(20px);
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                max-width: 400px;
            }

            .woocommerce-product-added-notification.show {
                opacity: 1;
                transform: translateY(0);
            }

            .notification-content {
                display: flex;
                align-items: center;
                gap: 1rem;
            }

            .notification-icon {
                font-size: 1.5rem;
                font-weight: bold;
            }

            .notification-text {
                font-weight: 600;
                font-size: 0.95rem;
            }

            /* View Cart Button */
            .button-view-cart {
                display: inline-block !important;
                background: linear-gradient(135deg, #0FB6EF 0%, #0a9fcc 100%) !important;
                color: #ffffff !important;
                padding: 0.85rem 1.5rem !important;
                border-radius: 6px !important;
                text-decoration: none !important;
                font-weight: 700 !important;
                margin-left: 0.75rem !important;
                box-shadow: 0 4px 12px rgba(15, 182, 239, 0.25) !important;
                transition: all 0.3s ease !important;
            }

            .button-view-cart:hover {
                background: linear-gradient(135deg, #0a9fcc 0%, #0882a8 100%) !important;
                transform: translateY(-2px) !important;
                box-shadow: 0 8px 20px rgba(15, 182, 239, 0.35) !important;
            }

            /* Cart Item Badge */
            .cart-icon-badge {
                position: relative;
                display: inline-block;
            }

            .cart-icon-badge .badge-count {
                position: absolute;
                top: -8px;
                right: -8px;
                background: #ef4444;
                color: #ffffff;
                border-radius: 50%;
                width: 24px;
                height: 24px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 0.75rem;
                font-weight: 700;
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .cart-icon-badge.active .badge-count {
                opacity: 1;
            }

            @media (max-width: 768px) {
                .woocommerce-product-added-notification {
                    bottom: 10px;
                    right: 10px;
                    left: 10px;
                    max-width: none;
                }

                .button-view-cart {
                    display: block !important;
                    margin: 0.75rem 0 0 0 !important;
                }
            }
        </style>
        <?php
    }
}, 999 );

// AJAX Get cart count
add_action( 'wp_ajax_get_cart_count', function() {
    echo WC()->cart->get_cart_contents_count();
    wp_die();
});

add_action( 'wp_ajax_nopriv_get_cart_count', function() {
    echo WC()->cart->get_cart_contents_count();
    wp_die();
});

// Update mini cart on AJAX add to cart
add_filter( 'woocommerce_add_to_cart_fragments', function( $fragments ) {
    ob_start();
    ?>
    <div class="widget_shopping_cart_content">
        <?php woocommerce_mini_cart(); ?>
    </div>
    <?php
    $fragments['div.widget_shopping_cart_content'] = ob_get_clean();

    $count = WC()->cart->get_cart_contents_count();
    ob_start();
    ?>
    <span class="cart-item-count"><?php echo esc_html( $count ); ?></span>
    <?php
    $fragments['.cart-item-count'] = ob_get_clean();

    return $fragments;
});

// Add cart menu item to header
add_filter( 'wp_nav_menu_items', function( $items, $args ) {
    if ( $args->theme_location == 'menu-1' || $args->theme_location == 'primary' ) {
        $cart_count = WC()->cart->get_cart_contents_count();
        $cart_url = wc_get_cart_url();

        $cart_item = '<li class="menu-item">' .
            '<a href="' . esc_url( $cart_url ) . '" class="cart-icon-badge">' .
            '🛒 Cart' .
            '<span class="badge-count cart-item-count">' . esc_html( $cart_count ) . '</span>' .
            '</a>' .
            '</li>';

        $items .= $cart_item;
    }
    return $items;
}, 10, 2 );
