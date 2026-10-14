<?php
/**
 * Free Books section: WooCommerce products shown in the Homepage 2 style.
 *
 * Setup
 * 1. Copy this file to wp-content/themes/memento-wp-theme/inc/free-books.php
 * 2. Add this line to the theme's functions.php:
 *        require_once get_template_directory() . '/inc/free-books.php';
 * 3. Add the books as WooCommerce products in a product category with the
 *    slug "free-books" (Simple product, Virtual + Downloadable, price 0).
 *    The product image is the book cover, the short description is the text
 *    under the title, and a product attribute named "Author" is the author.
 *
 * Usage - Elementor Shortcode widget, a Shortcode block, or a PHP template:
 *     [memento_free_books]
 *     [memento_free_books category="free-books" limit="4"]
 *     [memento_free_books ids="12,34,56,78"]    exact products, in this order
 *     [memento_free_books author="Mirela Sula"]  used when a product has no Author
 *     [memento_free_books image="https://example.com/group-photo.jpg"]
 *     [memento_free_books button="Download Free"]
 *     In a template file: echo do_shortcode( '[memento_free_books]' );
 *
 * @package Memento
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_shortcode( 'memento_free_books', 'memento_free_books_shortcode' );

/**
 * Renders the [memento_free_books] shortcode.
 *
 * @param array|string $atts Shortcode attributes.
 * @return string
 */
function memento_free_books_shortcode( $atts ) {
    if ( ! function_exists( 'wc_get_products' ) ) {
        return '';
    }

    $atts = shortcode_atts(
        array(
            'category' => 'free-books',
            'limit'    => 4,
            'ids'      => '',
            'author'   => '',
            'image'    => 'https://images.unsplash.com/photo-1507842217343-583bb7270b66?q=80&w=2000&auto=format&fit=crop',
            'button'   => 'Find Out More',
        ),
        $atts,
        'memento_free_books'
    );

    $args = array(
        'status' => 'publish',
        'limit'  => max( 1, absint( $atts['limit'] ) ),
    );

    $ids = array_filter( array_map( 'absint', explode( ',', $atts['ids'] ) ) );
    if ( $ids ) {
        $args['include'] = $ids;
        $args['limit']   = count( $ids );
        $args['orderby'] = 'post__in';
    } else {
        $args['category'] = array( sanitize_title( $atts['category'] ) );
        $args['orderby']  = 'menu_order';
        $args['order']    = 'ASC';
    }

    $products = wc_get_products( $args );

    if ( empty( $products ) ) {
        // Only shop editors see this hint; visitors get nothing.
        if ( current_user_can( 'edit_products' ) ) {
            return '<p>[memento_free_books]: no published products found. Check the category slug or product IDs.</p>';
        }
        return '';
    }

    ob_start();
    memento_free_books_styles();
    ?>
    <section class="hp2-books-section">
        <div class="hp2-books-photo">
            <img src="<?php echo esc_url( $atts['image'] ); ?>" alt="" loading="lazy">
        </div>

        <div class="hp2-books-panel">
            <div class="hp2-books-inner">
                <span class="d-block mb-2 fw-bold small text-warning text-uppercase" style="letter-spacing: 2px;"
                    data-aos="fade-up">
                    FREE RESOURCES
                </span>
                <h2 class="display-5 fw-bold mb-3" data-aos="fade-up" data-aos-delay="100">
                    Get the <span class="text-yellow">FREE</span> books.
                </h2>
                <p class="mb-5 opacity-75" style="line-height: 1.6;" data-aos="fade-up" data-aos-delay="200">
                    Download these books for free: practical guides on mindset, psychology, marketing and
                    visibility to help you get where you want to be.
                </p>

                <div class="row g-4">
                    <?php
                    $delay = 100;
                    foreach ( $products as $product ) :
                        $link   = $product->get_permalink();
                        $title  = $product->get_name();
                        $author = $product->get_attribute( 'author' );
                        $author = '' !== $author ? $author : $atts['author'];
                        $text   = $product->get_short_description() ? $product->get_short_description() : $product->get_description();
                        $text   = wp_trim_words( wp_strip_all_tags( strip_shortcodes( $text ) ), 28, '…' );
                        ?>
                        <div class="col-sm-6 col-xl-3" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $delay ); ?>">
                            <div class="hp2-book-card">
                                <a href="<?php echo esc_url( $link ); ?>" class="hp2-book-cover" tabindex="-1" aria-hidden="true">
                                    <?php if ( $product->get_image_id() ) : ?>
                                        <?php echo wp_get_attachment_image( $product->get_image_id(), 'woocommerce_single', false, array( 'alt' => '', 'sizes' => '150px' ) ); ?>
                                    <?php else : ?>
                                        <span class="hp2-book-cover-placeholder">
                                            <span class="hp2-book-cover-title"><?php echo esc_html( $title ); ?></span>
                                            <?php if ( $author ) : ?>
                                                <span class="hp2-book-cover-author"><?php echo esc_html( $author ); ?></span>
                                            <?php endif; ?>
                                        </span>
                                    <?php endif; ?>
                                </a>
                                <?php if ( $author ) : ?>
                                    <span class="hp2-book-label">By <?php echo esc_html( $author ); ?></span>
                                <?php endif; ?>
                                <h3 class="hp2-book-title"><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $title ); ?></a></h3>
                                <?php if ( $text ) : ?>
                                    <p class="hp2-book-excerpt"><?php echo esc_html( $text ); ?></p>
                                <?php endif; ?>
                                <a href="<?php echo esc_url( $link ); ?>" class="btn-yellow-solid hp2-book-btn"><?php echo esc_html( $atts['button'] ); ?> &rarr;</a>
                            </div>
                        </div>
                        <?php
                        // 100-400ms per row of four
                        $delay = 400 === $delay ? 100 : $delay + 100;
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Prints the section CSS once per page (same CSS as sections/10-free-books.html).
 */
function memento_free_books_styles() {
    static $printed = false;
    if ( $printed ) {
        return;
    }
    $printed = true;
    ?>
    <style>
        .btn-yellow-solid {
            background-color: var(--color-blue-primary);
            color: var(--color-brand-darker);
            border: 2px solid var(--color-blue-primary);
            font-weight: 700;
            border-radius: 4px;
            padding: 0.75rem 1.5rem;
            text-decoration: none;
            display: inline-block;
        }

        .btn-yellow-solid:hover {
            background-color: #e0ac1a;
            /* slightly darker yellow */
            color: var(--color-brand-darker);
        }

        /* Free books (WooCommerce) */
        .hp2-books-section {
            position: relative;
            padding-top: 260px;
            background-color: #fff;
        }

        .hp2-books-section .text-yellow {
            color: var(--color-blue-primary);
        }

        .hp2-books-photo {
            position: absolute;
            inset: 0;
        }

        .hp2-books-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center 25%;
        }

        .hp2-books-panel {
            position: relative;
            margin-left: 32%;
            background-color: #0b1c2c;
            color: #fff;
        }

        .hp2-books-inner {
            max-width: 1000px;
            padding: 4rem 3rem;
        }

        .hp2-book-card {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            height: 100%;
        }

        .hp2-book-cover {
            display: block;
            width: 100%;
            max-width: 150px;
            aspect-ratio: 2 / 3;
            margin-bottom: 1.5rem;
            border-radius: 2px 6px 6px 2px;
            overflow: hidden;
            text-decoration: none;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.45);
            transition: transform 0.3s ease;
        }

        .hp2-book-cover:hover {
            transform: translateY(-4px);
        }

        .hp2-book-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Shown until the product has a cover image */
        .hp2-book-cover-placeholder {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            padding: 1.25rem 1rem 1rem 1.4rem;
            background: linear-gradient(135deg, var(--color-blue-primary) 0%, #0a9fcc 100%);
            color: var(--color-brand-darker);
        }

        .hp2-book-cover-placeholder::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: 8px;
            background: linear-gradient(to right, rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0));
        }

        .hp2-book-cover-title {
            font-size: 1rem;
            font-weight: 700;
            line-height: 1.15;
            text-transform: uppercase;
        }

        .hp2-book-cover-author {
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            opacity: 0.8;
        }

        .hp2-book-label {
            display: flex;
            align-items: center;
            align-self: stretch;
            gap: 0.75rem;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.6);
            margin-bottom: 0.75rem;
        }

        .hp2-book-label::after {
            content: '';
            flex: 1;
            height: 1px;
            background-color: rgba(255, 255, 255, 0.25);
        }

        .hp2-book-title {
            font-size: 1.15rem;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 0.75rem;
        }

        .hp2-book-title a {
            color: #fff;
            text-decoration: none;
        }

        .hp2-book-title a:hover {
            color: var(--color-blue-primary);
        }

        .hp2-book-excerpt {
            display: -webkit-box;
            -webkit-line-clamp: 5;
            -webkit-box-orient: vertical;
            overflow: hidden;
            font-size: 0.85rem;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 1.5rem;
        }

        .hp2-book-card .hp2-book-btn {
            margin-top: auto;
            padding: 0.5rem 1rem;
            font-size: 0.8rem;
        }

        @media (max-width: 991px) {
            .hp2-books-section {
                padding-top: 0;
            }

            .hp2-books-photo {
                position: relative;
                height: 360px;
            }

            .hp2-books-panel {
                margin: -100px 1.5rem 0;
            }

            .hp2-books-inner {
                padding: 3rem 2rem;
            }
        }

        @media (max-width: 575px) {
            .hp2-books-photo {
                height: 240px;
            }

            .hp2-books-panel {
                margin: -48px 0 0;
            }
        }
    </style>
    <?php
}
