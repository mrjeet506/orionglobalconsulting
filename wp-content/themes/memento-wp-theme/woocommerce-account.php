<?php
/**
 * WooCommerce Account/My Account Template
 *
 * @package Memento
 */

get_header();
?>

<style>
    .woocommerce-account-hero {
        padding: 3rem 0;
        background: linear-gradient(135deg, rgba(15, 182, 239, 0.1) 0%, rgba(255, 255, 255, 0) 100%);
        border-bottom: 1px solid rgba(29, 50, 130, 0.1);
    }

    .woocommerce-account-title {
        font-size: 2.5rem;
        font-weight: 900;
        font-family: 'Playfair Display', serif;
        color: #1D3282;
        margin: 0;
    }

    .woocommerce-account-content {
        padding: 3rem 0;
    }

    .woocommerce-MyAccount-content {
        display: grid;
        grid-template-columns: 250px 1fr;
        gap: 3rem;
    }

    .woocommerce-MyAccount-navigation {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border: 1px solid rgba(29, 50, 130, 0.1);
        border-radius: 8px;
        padding: 2rem 0;
        height: fit-content;
        position: sticky;
        top: 20px;
    }

    .woocommerce-MyAccount-navigation ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .woocommerce-MyAccount-navigation li {
        margin: 0;
        padding: 0;
        border-bottom: 1px solid rgba(29, 50, 130, 0.1);
    }

    .woocommerce-MyAccount-navigation li:last-child {
        border-bottom: none;
    }

    .woocommerce-MyAccount-navigation a {
        display: block;
        padding: 1rem 2rem;
        color: #666666;
        text-decoration: none;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .woocommerce-MyAccount-navigation a:hover {
        background: rgba(15, 182, 239, 0.05);
        color: #0FB6EF;
        padding-left: 2.5rem;
    }

    .woocommerce-MyAccount-navigation li.is-active a {
        background: rgba(15, 182, 239, 0.1);
        color: #0FB6EF;
        border-left: 4px solid #0FB6EF;
        padding-left: calc(2rem - 4px);
        font-weight: 700;
    }

    .woocommerce-MyAccount-content > div {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border: 1px solid rgba(29, 50, 130, 0.1);
        border-radius: 8px;
        padding: 2rem;
    }

    .woocommerce-MyAccount-content h2 {
        color: #1D3282;
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #0FB6EF;
    }

    .woocommerce-MyAccount-content h3 {
        color: #1D3282;
        font-weight: 700;
        margin-top: 1.5rem;
        margin-bottom: 1rem;
    }

    .woocommerce-MyAccount-content p {
        color: #666666;
        line-height: 1.8;
    }

    .woocommerce-MyAccount-content a {
        color: #0FB6EF;
        text-decoration: none;
        font-weight: 600;
    }

    .woocommerce-MyAccount-content a:hover {
        text-decoration: underline;
    }

    .woocommerce-Address {
        margin-bottom: 2rem;
        padding-bottom: 2rem;
        border-bottom: 1px solid rgba(29, 50, 130, 0.1);
    }

    .woocommerce-Address-title {
        color: #1D3282;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .woocommerce-Address-edit {
        display: inline-block;
        background-color: #0FB6EF;
        color: #ffffff;
        padding: 0.5rem 1.5rem;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 600;
        margin-top: 1rem;
        transition: all 0.3s ease;
    }

    .woocommerce-Address-edit:hover {
        background-color: #0a9fcc;
    }

    .woocommerce-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 2rem;
    }

    .woocommerce-table th {
        background: transparent;
        color: #1D3282;
        font-weight: 700;
        text-align: left;
        padding: 1rem 0;
        border-bottom: 2px solid rgba(29, 50, 130, 0.1);
    }

    .woocommerce-table td {
        padding: 1rem 0;
        color: #666666;
        border-bottom: 1px solid rgba(29, 50, 130, 0.05);
    }

    .woocommerce-table tr:hover {
        background: rgba(15, 182, 239, 0.05);
    }

    .order-status {
        display: inline-block;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .order-status.pending {
        background: #fef3c7;
        color: #92400e;
    }

    .order-status.processing {
        background: #dbeafe;
        color: #0c4a6e;
    }

    .order-status.completed {
        background: #dcfce7;
        color: #15803d;
    }

    .order-status.cancelled {
        background: #fee2e2;
        color: #7f1d1d;
    }

    .woocommerce-form-row {
        margin-bottom: 1.5rem;
    }

    .woocommerce-form-row label {
        display: block;
        color: #1D3282;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .woocommerce-form-row input[type="text"],
    .woocommerce-form-row input[type="email"],
    .woocommerce-form-row input[type="password"],
    .woocommerce-form-row select {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid rgba(29, 50, 130, 0.2);
        border-radius: 4px;
        background: #ffffff;
        color: #1D3282;
        transition: all 0.3s ease;
    }

    .woocommerce-form-row input[type="text"]:focus,
    .woocommerce-form-row input[type="email"]:focus,
    .woocommerce-form-row input[type="password"]:focus,
    .woocommerce-form-row select:focus {
        border-color: #0FB6EF;
        outline: none;
        box-shadow: 0 0 0 3px rgba(15, 182, 239, 0.1);
    }

    .woocommerce-form .button {
        background-color: #0FB6EF;
        color: #ffffff;
        border: 2px solid #0FB6EF;
        padding: 0.75rem 2rem;
        border-radius: 4px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .woocommerce-form .button:hover {
        background-color: #0a9fcc;
        border-color: #0a9fcc;
    }

    .woocommerce-message {
        background: #ecfdf5;
        border: 1px solid #86efac;
        color: #15803d;
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
    }

    @media (max-width: 768px) {
        .woocommerce-MyAccount-content {
            grid-template-columns: 1fr;
        }

        .woocommerce-MyAccount-navigation {
            position: relative;
            top: auto;
        }

        .woocommerce-account-title {
            font-size: 2rem;
        }
    }
</style>

<main id="primary" class="site-main">
    <!-- Hero -->
    <div class="woocommerce-account-hero">
        <div class="container">
            <h1 class="woocommerce-account-title">My Account</h1>
        </div>
    </div>

    <!-- Account Content -->
    <div class="woocommerce-account-content">
        <div class="container" style="grid-column: 1 / -1;">
            <?php woocommerce_account_navigation(); ?>
            <div class="woocommerce-MyAccount-content">
                <?php woocommerce_account_content(); ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
