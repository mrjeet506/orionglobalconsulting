<?php
/**
 * Latest Thinking section: the newest blog posts in the Homepage 2 style.
 * New posts appear here automatically as soon as they are published.
 *
 * Setup
 * 1. Copy this file to wp-content/themes/memento-wp-theme/inc/latest-posts.php
 * 2. Add this line to the theme's functions.php:
 *        require_once get_template_directory() . '/inc/latest-posts.php';
 *
 * Usage - Elementor Shortcode widget, a Shortcode block, or a PHP template:
 *     [memento_latest_posts]
 *     [memento_latest_posts count="6"]                         two rows of three
 *     [memento_latest_posts category="marketing"]              one category (slug)
 *     [memento_latest_posts link="https://example.com/blog/"]  "View All Articles" URL
 *     In a template file: echo do_shortcode( '[memento_latest_posts]' );
 *
 * Each card shows the post's featured image, first category, title and date.
 * "View All Articles" goes to the Posts page set in Settings > Reading,
 * unless link="" is given.
 *
 * @package Memento
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_shortcode( 'memento_latest_posts', 'memento_latest_posts_shortcode' );

/**
 * Renders the [memento_latest_posts] shortcode.
 *
 * @param array|string $atts Shortcode attributes.
 * @return string
 */
function memento_latest_posts_shortcode( $atts ) {
    $atts = shortcode_atts(
        array(
            'count'    => 3,
            'category' => '',
            'link'     => '',
        ),
        $atts,
        'memento_latest_posts'
    );

    $args = array(
        'post_type'        => 'post',
        'post_status'      => 'publish',
        'posts_per_page'   => max( 1, absint( $atts['count'] ) ),
        'suppress_filters' => false, // lets translation plugins pick the right language
    );
    if ( '' !== trim( $atts['category'] ) ) {
        $args['category_name'] = sanitize_title( $atts['category'] );
    }

    $blog_posts = get_posts( $args );

    if ( empty( $blog_posts ) ) {
        // Only editors see this hint; visitors get nothing.
        if ( current_user_can( 'edit_posts' ) ) {
            return '<p>[memento_latest_posts]: no published posts found.</p>';
        }
        return '';
    }

    $blog_url = $atts['link'];
    if ( '' === $blog_url ) {
        $posts_page = (int) get_option( 'page_for_posts' );
        $blog_url   = $posts_page ? get_permalink( $posts_page ) : home_url( '/' );
    }

    ob_start();
    memento_latest_posts_styles();
    ?>
    <section class="hp2-blog-section py-5 bg-white">
        <div class="container py-4">
            <div class="d-flex justify-content-between align-items-end mb-5 border-bottom pb-3">
                <div data-aos="fade-right">
                    <span class="d-block mb-2 fw-bold small text-muted text-uppercase" style="letter-spacing: 2px;">
                        INSIGHTS &amp; IDEAS
                    </span>
                    <h2 class="display-6 fw-bold mb-0" style="color: var(--color-brand-darker);">
                        Latest Thinking. <span class="fs-5 text-muted fw-normal">Ideas, perspectives and strategies
                            for a changing world.</span>
                    </h2>
                </div>
                <div class="d-none d-lg-block" data-aos="fade-left">
                    <a href="<?php echo esc_url( $blog_url ); ?>" class="btn btn-outline-secondary px-4 py-2"
                        style="border-radius: 4px; font-weight: 600;">View All Articles &rarr;</a>
                </div>
            </div>

            <div class="row g-4">
                <?php
                $delay = 100;
                foreach ( $blog_posts as $blog_post ) :
                    $link  = get_permalink( $blog_post );
                    $alt   = the_title_attribute( array( 'echo' => false, 'post' => $blog_post ) );
                    $label = '';
                    foreach ( get_the_category( $blog_post->ID ) as $category ) {
                        if ( 'uncategorized' !== $category->slug ) {
                            $label = $category->name;
                            break;
                        }
                    }
                    ?>
                    <div class="col-lg-4 col-md-12" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $delay ); ?>">
                        <div class="d-flex align-items-start gap-3 blog-list-item h-100">
                            <?php if ( has_post_thumbnail( $blog_post ) ) : ?>
                                <?php echo get_the_post_thumbnail( $blog_post, 'medium_large', array( 'alt' => $alt, 'sizes' => '(max-width: 575px) 100vw, 120px' ) ); ?>
                            <?php else : ?>
                                <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&amp;w=300&amp;auto=format&amp;fit=crop"
                                    alt="<?php echo esc_attr( $alt ); ?>">
                            <?php endif; ?>
                            <div class="d-flex flex-column h-100 w-100">
                                <?php if ( $label ) : ?>
                                    <span class="d-block mb-1 text-warning fw-bold small text-uppercase"
                                        style="font-size: 0.7rem; letter-spacing: 1px;"><?php echo esc_html( $label ); ?></span>
                                <?php endif; ?>
                                <h4 class="h6 fw-bold mb-3" style="color: var(--color-brand-darker); line-height: 1.4;">
                                    <a href="<?php echo esc_url( $link ); ?>" class="text-decoration-none text-dark"><?php echo esc_html( wp_trim_words( get_the_title( $blog_post ), 8, '...' ) ); ?></a>
                                </h4>
                                <div class="d-flex justify-content-between align-items-center w-100 mt-auto pt-3"
                                    style="border-top: 1px solid #eee;">
                                    <span class="small text-muted fw-bold"><?php echo esc_html( get_the_date( 'M j, Y', $blog_post ) ); ?></span>
                                    <a href="<?php echo esc_url( $link ); ?>" class="small fw-bold text-dark text-decoration-none">Read More &rarr;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    // 100, 300, 500ms per row of three
                    $delay = 500 === $delay ? 100 : $delay + 200;
                endforeach;
                ?>
            </div>
            <div class="mt-4 text-center d-block d-lg-none">
                <a href="<?php echo esc_url( $blog_url ); ?>" class="btn btn-outline-secondary px-4 py-2 w-100"
                    style="border-radius: 4px; font-weight: 600;">View All Articles &rarr;</a>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Prints the section CSS once per page (same CSS as sections/07-latest-thinking.html).
 */
function memento_latest_posts_styles() {
    static $printed = false;
    if ( $printed ) {
        return;
    }
    $printed = true;
    ?>
    <style>
        /* Stop the AOS slide-in animations from causing a horizontal scrollbar */
        .hp2-blog-section {
            overflow-x: hidden;
            overflow-x: clip;
        }

        .blog-list-item img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 6px;
        }

        @media (max-width: 575px) {
            .blog-list-item {
                flex-direction: column;
            }

            .blog-list-item img {
                width: 100%;
                height: 200px;
            }
        }
    </style>
    <?php
}
