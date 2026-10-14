<?php
/**
 * Template Name: Products Shop
 *
 * @package Memento
 */

get_header();
?>

<style>
    .products-hero {
        padding: 5rem 0;
        background: linear-gradient(135deg, #f5f5f5 0%, #ffffff 100%);
        border-bottom: 1px solid #e0e0e0;
    }

    .products-hero-title {
        font-size: 3.5rem;
        font-weight: 900;
        font-family: 'Playfair Display', serif;
        color: #222222;
        margin-bottom: 1rem;
    }

    .products-hero-title .highlight {
        color: #fbbf24;
    }

    .products-hero-desc {
        font-size: 1.1rem;
        color: #666666;
        max-width: 700px;
        line-height: 1.8;
    }

    .products-content {
        padding: 4rem 0;
    }

    /* Tab Navigation */
    .products-tabs {
        display: flex;
        gap: 1rem;
        margin-bottom: 3rem;
        border-bottom: 2px solid #e0e0e0;
        flex-wrap: wrap;
    }

    .products-tab-btn {
        background: transparent;
        border: none;
        padding: 1rem 1.5rem;
        font-size: 1rem;
        font-weight: 600;
        color: #999999;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        margin-bottom: -2px;
    }

    .products-tab-btn:hover {
        color: #333333;
    }

    .products-tab-btn.active {
        color: #222222;
        border-bottom: 3px solid #222222;
    }

    .tab-icon {
        margin-right: 0.5rem;
        font-size: 1.2rem;
    }

    /* Tab Content */
    .products-tab-content {
        display: none;
        animation: fadeIn 0.3s ease;
    }

    .products-tab-content.active {
        display: block;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Books Section */
    .books-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2.5rem;
    }

    .book-card {
        background: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
    }

    .book-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    }

    .book-cover {
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
        padding: 2rem;
        text-align: center;
        min-height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
    }

    .book-content {
        padding: 2rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .book-badge {
        display: inline-block;
        background: #fbbf24;
        color: #000000;
        padding: 0.35rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 1rem;
        width: fit-content;
    }

    .book-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: #222222;
        font-family: 'Playfair Display', serif;
        margin-bottom: 0.75rem;
        line-height: 1.4;
    }

    .book-subtitle {
        font-size: 0.9rem;
        color: #999999;
        margin-bottom: 1rem;
    }

    .book-desc {
        font-size: 0.9rem;
        color: #666666;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        flex-grow: 1;
    }

    .book-features {
        list-style: none;
        margin: 1rem 0 1.5rem 0;
        padding: 0;
        font-size: 0.9rem;
        color: #666666;
    }

    .book-features li {
        padding: 0.4rem 0;
        padding-left: 1.5rem;
        position: relative;
    }

    .book-features li:before {
        content: "✓";
        position: absolute;
        left: 0;
        color: #fbbf24;
        font-weight: 700;
    }

    .book-rating {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1rem;
        font-size: 0.9rem;
    }

    .book-stars {
        color: #fbbf24;
        letter-spacing: 2px;
    }

    .book-review-count {
        color: #999999;
    }

    .book-price {
        font-size: 2rem;
        font-weight: 900;
        color: #222222;
        margin-bottom: 1.5rem;
    }

    .book-price .currency {
        font-size: 1.2rem;
    }

    .book-price .period {
        font-size: 0.75rem;
        color: #999999;
        display: block;
    }

    .book-buttons {
        display: flex;
        gap: 1rem;
        flex-direction: column;
    }

    .book-btn {
        padding: 0.75rem 1.5rem;
        border-radius: 4px;
        font-weight: 700;
        text-decoration: none;
        cursor: pointer;
        border: none;
        text-align: center;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }

    .book-btn-primary {
        background: #fbbf24;
        color: #000000;
    }

    .book-btn-primary:hover {
        background: #f59e0b;
    }

    .book-btn-secondary {
        background: transparent;
        color: #222222;
        border: 2px solid #222222;
    }

    .book-btn-secondary:hover {
        background: #f5f5f5;
    }

    .book-coming-soon {
        display: inline-block;
        background: #e0e0e0;
        color: #666666;
        padding: 0.35rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 1rem;
        width: fit-content;
    }

    /* Courses Section */
    .courses-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 2.5rem;
    }

    .course-card {
        background: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
    }

    .course-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    }

    .course-icon {
        background: linear-gradient(135deg, #f5f5f5 0%, #e8e8e8 100%);
        padding: 2.5rem;
        text-align: center;
        font-size: 3rem;
        min-height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .course-content {
        padding: 2rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .course-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #999999;
        font-weight: 700;
        margin-bottom: 0.75rem;
    }

    .course-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: #222222;
        font-family: 'Playfair Display', serif;
        margin-bottom: 0.75rem;
        line-height: 1.4;
    }

    .course-meta {
        font-size: 0.85rem;
        color: #999999;
        margin-bottom: 1rem;
    }

    .course-desc {
        font-size: 0.9rem;
        color: #666666;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        flex-grow: 1;
    }

    .course-features {
        list-style: none;
        margin: 1rem 0 1.5rem 0;
        padding: 0;
        font-size: 0.9rem;
        color: #666666;
    }

    .course-features li {
        padding: 0.4rem 0;
        padding-left: 1.5rem;
        position: relative;
    }

    .course-features li:before {
        content: "✓";
        position: absolute;
        left: 0;
        color: #fbbf24;
        font-weight: 700;
    }

    .course-price {
        font-size: 2rem;
        font-weight: 900;
        color: #222222;
        margin-bottom: 1.5rem;
    }

    .course-price .period {
        font-size: 0.75rem;
        color: #999999;
        display: block;
    }

    .course-btn {
        padding: 0.75rem 1.5rem;
        background: #222222;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        font-weight: 700;
        text-decoration: none;
        cursor: pointer;
        text-align: center;
        transition: all 0.3s ease;
    }

    .course-btn:hover {
        background: #000000;
    }

    .course-btn-secondary {
        background: transparent;
        color: #222222;
        border: 2px solid #222222;
    }

    .course-btn-secondary:hover {
        background: #f5f5f5;
    }

    /* AI Engine Section */
    .engine-hero {
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
        color: #ffffff;
        padding: 3rem 2rem;
        border-radius: 8px;
        margin-bottom: 3rem;
    }

    .engine-price {
        font-size: 3rem;
        font-weight: 900;
        margin-bottom: 1rem;
    }

    .engine-spec {
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
    }

    .engine-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .specialist-card {
        background: #ffffff;
        border: 1px solid #e0e0e0;
        padding: 2rem;
        border-radius: 8px;
        text-align: center;
    }

    .specialist-number {
        font-size: 2rem;
        font-weight: 900;
        color: #fbbf24;
        margin-bottom: 0.5rem;
    }

    .specialist-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #222222;
        margin-bottom: 0.75rem;
    }

    .specialist-desc {
        font-size: 0.9rem;
        color: #666666;
        line-height: 1.6;
    }

    .engine-features {
        background: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 2rem;
        margin-top: 2rem;
    }

    .engine-features h3 {
        color: #222222;
        font-weight: 700;
        margin-bottom: 1.5rem;
    }

    .features-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .features-list li {
        padding: 0.75rem 0;
        padding-left: 1.5rem;
        color: #666666;
        position: relative;
    }

    .features-list li:before {
        content: "→";
        position: absolute;
        left: 0;
        color: #fbbf24;
        font-weight: 700;
    }

    .engine-buttons {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
        flex-wrap: wrap;
    }

    .engine-btn {
        padding: 0.75rem 2rem;
        background: #222222;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        font-weight: 700;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .engine-btn:hover {
        background: #000000;
    }

    .engine-btn-secondary {
        background: transparent;
        color: #222222;
        border: 2px solid #222222;
    }

    .engine-btn-secondary:hover {
        background: #f5f5f5;
    }

    /* Story Section */
    .story-intro {
        background: #f5f5f5;
        padding: 3rem;
        border-radius: 8px;
        margin-bottom: 3rem;
    }

    .story-intro-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #999999;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .story-intro-title {
        font-size: 2.5rem;
        font-weight: 900;
        color: #222222;
        font-family: 'Playfair Display', serif;
        margin-bottom: 1.5rem;
        line-height: 1.2;
    }

    .story-intro-title .highlight {
        color: #fbbf24;
    }

    .story-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .stat-item {
        text-align: center;
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 900;
        color: #fbbf24;
    }

    .stat-label {
        font-size: 0.9rem;
        color: #666666;
        margin-top: 0.5rem;
    }

    .story-content {
        background: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 3rem;
        margin-bottom: 2rem;
    }

    .story-section-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #222222;
        font-family: 'Playfair Display', serif;
        margin-bottom: 1.5rem;
        margin-top: 2rem;
    }

    .story-section-title:first-child {
        margin-top: 0;
    }

    .story-text {
        font-size: 1rem;
        color: #666666;
        line-height: 1.8;
        margin-bottom: 1rem;
    }

    .story-credentials {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 1.5rem;
        margin: 2rem 0;
        padding: 1.5rem;
        background: #f5f5f5;
        border-radius: 8px;
    }

    .story-credential {
        text-align: center;
    }

    .story-credential-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #999999;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .story-credential-value {
        font-size: 1.3rem;
        font-weight: 700;
        color: #222222;
    }

    .story-cta {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
        flex-wrap: wrap;
    }

    .story-cta-btn {
        padding: 0.75rem 2rem;
        background: #fbbf24;
        color: #000000;
        border: none;
        border-radius: 4px;
        font-weight: 700;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .story-cta-btn:hover {
        background: #f59e0b;
    }

    .story-cta-btn-secondary {
        background: transparent;
        color: #222222;
        border: 2px solid #222222;
    }

    .story-cta-btn-secondary:hover {
        background: #f5f5f5;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .products-hero-title {
            font-size: 2.5rem;
        }

        .products-tabs {
            gap: 0.5rem;
        }

        .products-tab-btn {
            padding: 0.75rem 1rem;
            font-size: 0.9rem;
        }

        .tab-icon {
            display: none;
        }

        .books-grid,
        .courses-grid,
        .engine-grid {
            grid-template-columns: 1fr;
        }

        .story-intro-title {
            font-size: 1.8rem;
        }

        .book-buttons,
        .engine-buttons,
        .story-cta {
            flex-direction: column;
        }

        .book-btn,
        .course-btn,
        .engine-btn,
        .story-cta-btn {
            width: 100%;
        }
    }
</style>

<main id="primary" class="site-main">
    <!-- Hero -->
    <div class="products-hero">
        <div class="container">
            <h1 class="products-hero-title">Knowledge That <span class="highlight">Pays for Itself.</span></h1>
            <p class="products-hero-desc">Books, courses, templates and resources — 22 years of marketing expertise packaged into products you can use immediately.</p>
        </div>
    </div>

    <!-- Products Content -->
    <div class="products-content">
        <div class="container">
            <!-- Tab Navigation -->
            <div class="products-tabs">
                <button class="products-tab-btn active" onclick="switchProductTab('books')">
                    <span class="tab-icon">📚</span> Books
                </button>
                <button class="products-tab-btn" onclick="switchProductTab('courses')">
                    <span class="tab-icon">🎓</span> Courses
                </button>
                <button class="products-tab-btn" onclick="switchProductTab('engine')">
                    <span class="tab-icon">🤖</span> AI Engine
                </button>
                <button class="products-tab-btn" onclick="switchProductTab('story')">
                    <span class="tab-icon">✨</span> My Story
                </button>
            </div>

            <!-- BOOKS TAB -->
            <div id="books" class="products-tab-content active">
                <div class="books-grid">
                    <?php
                    // Query books from WooCommerce
                    $books_args = array(
                        'post_type' => 'product',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'slug',
                                'terms' => 'books',
                                'operator' => 'IN'
                            )
                        )
                    );

                    $books_query = new WP_Query( $books_args );

                    if ( $books_query->have_posts() ) {
                        while ( $books_query->have_posts() ) {
                            $books_query->the_post();
                            $product = wc_get_product( get_the_ID() );
                            $status = get_post_status( get_the_ID() );
                    ?>
                    <div class="book-card">
                        <div class="book-cover">
                            <?php
                            $icon = get_post_meta( get_the_ID(), '_book_icon', true );
                            echo $icon ? esc_html( $icon ) : '📘';
                            ?>
                        </div>
                        <div class="book-content">
                            <?php
                            $badge = get_post_meta( get_the_ID(), '_book_badge', true );
                            if ( $badge ) {
                                echo '<span class="book-badge">' . esc_html( $badge ) . '</span>';
                            }
                            if ( $status === 'draft' ) {
                                echo '<span class="book-coming-soon">COMING SOON</span>';
                            }
                            ?>

                            <h3 class="book-title"><?php the_title(); ?></h3>

                            <?php
                            $subtitle = get_post_meta( get_the_ID(), '_book_subtitle', true );
                            if ( $subtitle ) {
                                echo '<p class="book-subtitle">' . esc_html( $subtitle ) . '</p>';
                            }
                            ?>

                            <p class="book-desc"><?php echo wp_kses_post( get_the_excerpt() ); ?></p>

                            <?php
                            if ( $product && comments_open( get_the_ID() ) ) {
                                $rating = $product->get_average_rating();
                                if ( $rating ) {
                                    echo '<div class="book-rating">';
                                    echo '<span class="book-stars">' . str_repeat( '★', intval( $rating ) ) . '</span>';
                                    echo '<span class="book-review-count">' . esc_html( $rating ) . ' · Amazon verified reviews</span>';
                                    echo '</div>';
                                }
                            }
                            ?>

                            <?php
                            $features = get_post_meta( get_the_ID(), '_book_features', true );
                            if ( $features ) {
                                $features_array = explode( "\n", $features );
                                echo '<ul class="book-features">';
                                foreach ( $features_array as $feature ) {
                                    if ( ! empty( trim( $feature ) ) ) {
                                        echo '<li>' . esc_html( trim( $feature ) ) . '</li>';
                                    }
                                }
                                echo '</ul>';
                            }
                            ?>

                            <div class="book-price">
                                <span class="currency">£</span><?php echo esc_html( $product->get_price() ); ?>
                                <span class="period">one-off payment</span>
                            </div>

                            <div class="book-buttons">
                                <?php
                                $primary_link = get_post_meta( get_the_ID(), '_book_primary_link', true );
                                $secondary_link = get_post_meta( get_the_ID(), '_book_secondary_link', true );
                                $primary_text = get_post_meta( get_the_ID(), '_book_primary_text', true ) ?: 'Buy on Amazon →';
                                $secondary_text = get_post_meta( get_the_ID(), '_book_secondary_text', true ) ?: 'Get the PDF →';

                                if ( $status === 'draft' ) {
                                    echo '<button class="book-btn book-btn-primary" disabled style="opacity: 0.5;">Pre-order Now →</button>';
                                } else {
                                    if ( $primary_link ) {
                                        echo '<a href="' . esc_url( $primary_link ) . '" class="book-btn book-btn-primary">' . esc_html( $primary_text ) . '</a>';
                                    } else {
                                        echo '<a href="' . esc_url( $product->get_permalink() ) . '" class="book-btn book-btn-primary">View Book →</a>';
                                    }

                                    if ( $secondary_link ) {
                                        echo '<a href="' . esc_url( $secondary_link ) . '" class="book-btn book-btn-secondary">' . esc_html( $secondary_text ) . '</a>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                        wp_reset_postdata();
                    } else {
                        echo '<div style="grid-column: 1 / -1; text-align: center; padding: 3rem;"><p style="color: #999999;">No books available at this time.</p></div>';
                    }
                    ?>
                </div>
            </div>

            <!-- COURSES TAB -->
            <div id="courses" class="products-tab-content">
                <div class="courses-grid">
                    <?php
                    // Query courses from WooCommerce
                    $courses_args = array(
                        'post_type' => 'product',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'slug',
                                'terms' => 'courses',
                                'operator' => 'IN'
                            )
                        )
                    );

                    $courses_query = new WP_Query( $courses_args );

                    if ( $courses_query->have_posts() ) {
                        while ( $courses_query->have_posts() ) {
                            $courses_query->the_post();
                            $product = wc_get_product( get_the_ID() );
                            $status = get_post_status( get_the_ID() );
                    ?>
                    <div class="course-card">
                        <div class="course-icon">
                            <?php
                            $icon = get_post_meta( get_the_ID(), '_course_icon', true );
                            echo $icon ? esc_html( $icon ) : '🎓';
                            ?>
                        </div>
                        <div class="course-content">
                            <?php
                            $label = get_post_meta( get_the_ID(), '_course_label', true );
                            if ( $label ) {
                                echo '<span class="course-label">' . esc_html( $label ) . '</span>';
                            }
                            if ( $status === 'draft' ) {
                                echo '<span class="course-label">COMING SOON</span>';
                            }
                            ?>

                            <h3 class="course-title"><?php the_title(); ?></h3>

                            <?php
                            $meta = get_post_meta( get_the_ID(), '_course_meta', true );
                            if ( $meta ) {
                                echo '<p class="course-meta">' . esc_html( $meta ) . '</p>';
                            }
                            ?>

                            <p class="course-desc"><?php echo wp_kses_post( get_the_excerpt() ); ?></p>

                            <?php
                            $features = get_post_meta( get_the_ID(), '_course_features', true );
                            if ( $features ) {
                                $features_array = explode( "\n", $features );
                                echo '<ul class="course-features">';
                                foreach ( $features_array as $feature ) {
                                    if ( ! empty( trim( $feature ) ) ) {
                                        echo '<li>' . esc_html( trim( $feature ) ) . '</li>';
                                    }
                                }
                                echo '</ul>';
                            }
                            ?>

                            <div class="course-price">
                                <span class="currency">£</span><?php echo esc_html( $product->get_price() ); ?>
                                <?php
                                $period = get_post_meta( get_the_ID(), '_course_period', true ) ?: 'one-off';
                                echo '<span class="period">' . esc_html( $period ) . '</span>';
                                ?>
                            </div>

                            <?php
                            $button_text = get_post_meta( get_the_ID(), '_course_button_text', true ) ?: 'Pay Now →';
                            $button_link = get_post_meta( get_the_ID(), '_course_button_link', true );

                            if ( $status === 'draft' ) {
                                echo '<button class="course-btn" disabled style="opacity: 0.5;">Coming Soon</button>';
                            } else {
                                if ( $button_link ) {
                                    echo '<a href="' . esc_url( $button_link ) . '" class="course-btn">' . esc_html( $button_text ) . '</a>';
                                } else {
                                    echo '<a href="' . esc_url( $product->get_permalink() ) . '" class="course-btn">' . esc_html( $button_text ) . '</a>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                        }
                        wp_reset_postdata();
                    } else {
                        echo '<div style="grid-column: 1 / -1; text-align: center; padding: 3rem;"><p style="color: #999999;">No courses available at this time.</p></div>';
                    }
                    ?>
                </div>

                <!-- 1:1 Services -->
                <div style="margin-top: 3rem; display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2.5rem;">
                    <?php
                    // Query 1:1 services from WooCommerce
                    $services_args = array(
                        'post_type' => 'product',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'slug',
                                'terms' => 'services',
                                'operator' => 'IN'
                            )
                        )
                    );

                    $services_query = new WP_Query( $services_args );

                    if ( $services_query->have_posts() ) {
                        while ( $services_query->have_posts() ) {
                            $services_query->the_post();
                            $product = wc_get_product( get_the_ID() );
                    ?>
                    <div class="course-card">
                        <div class="course-icon">
                            <?php
                            $icon = get_post_meta( get_the_ID(), '_service_icon', true );
                            echo $icon ? esc_html( $icon ) : '🎤';
                            ?>
                        </div>
                        <div class="course-content">
                            <?php
                            $label = get_post_meta( get_the_ID(), '_service_label', true );
                            if ( $label ) {
                                echo '<span class="course-label">' . esc_html( $label ) . '</span>';
                            }
                            ?>

                            <h3 class="course-title"><?php the_title(); ?></h3>

                            <?php
                            $meta = get_post_meta( get_the_ID(), '_service_meta', true );
                            if ( $meta ) {
                                echo '<p class="course-meta">' . esc_html( $meta ) . '</p>';
                            }
                            ?>

                            <p class="course-desc"><?php echo wp_kses_post( get_the_excerpt() ); ?></p>

                            <?php
                            $note = get_post_meta( get_the_ID(), '_service_note', true );
                            if ( $note ) {
                                echo '<p style="font-size: 0.85rem; color: #999999; margin-top: 1rem;">' . esc_html( $note ) . '</p>';
                            }
                            ?>

                            <div class="course-price">
                                <span class="currency">£</span><?php echo esc_html( $product->get_price() ); ?>
                                <?php
                                $period = get_post_meta( get_the_ID(), '_service_period', true ) ?: 'per service';
                                echo '<span class="period">' . esc_html( $period ) . '</span>';
                                ?>
                            </div>

                            <?php
                            $button_text = get_post_meta( get_the_ID(), '_service_button_text', true ) ?: 'Enquire Now →';
                            $button_link = get_post_meta( get_the_ID(), '_service_button_link', true );

                            if ( $button_link ) {
                                echo '<a href="' . esc_url( $button_link ) . '" class="course-btn">' . esc_html( $button_text ) . '</a>';
                            } else {
                                echo '<a href="' . esc_url( $product->get_permalink() ) . '" class="course-btn">' . esc_html( $button_text ) . '</a>';
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                        }
                        wp_reset_postdata();
                    }
                    ?>
                </div>
            </div>

            <!-- AI ENGINE TAB -->
            <div id="engine" class="products-tab-content">
                <div class="engine-hero">
                    <h2 style="font-size: 2rem; font-family: 'Playfair Display', serif; margin-bottom: 1.5rem;">
                        Orjona's 9 AI Specialists.
                        <br>One Marketing Engine.
                        <br>Built for Accounting Firms.
                    </h2>
                    <p style="font-size: 1.1rem; margin-bottom: 2rem; line-height: 1.7;">
                        Replace your £12,000–£15,000/month CMO hire with a fully integrated AI marketing system — strategy, content, SEO, distribution and intelligence. All working in sync. From day one.
                    </p>
                    <div class="engine-price">
                        <span class="currency">£</span>2,499<span class="period">per month</span>
                    </div>
                    <div style="display: flex; gap: 3rem; margin-top: 2rem; flex-wrap: wrap;">
                        <div>
                            <div class="engine-spec">9</div>
                            <div style="font-size: 0.9rem; color: rgba(255,255,255,0.8);">AI specialists</div>
                        </div>
                        <div>
                            <div class="engine-spec">Day 1</div>
                            <div style="font-size: 0.9rem; color: rgba(255,255,255,0.8);">results</div>
                        </div>
                    </div>
                </div>

                <!-- Specialists Grid -->
                <div class="engine-grid">
                    <div class="specialist-card">
                        <div class="specialist-number">01</div>
                        <div class="specialist-title">Positioning Researcher</div>
                        <div class="specialist-desc">Analyses your ICP, competitors and market gaps</div>
                    </div>
                    <div class="specialist-card">
                        <div class="specialist-number">02</div>
                        <div class="specialist-title">Content Strategist</div>
                        <div class="specialist-desc">Editorial calendar grounded in real search demand</div>
                    </div>
                    <div class="specialist-card">
                        <div class="specialist-number">03</div>
                        <div class="specialist-title">Copywriter</div>
                        <div class="specialist-desc">LinkedIn posts, blogs, newsletters in your voice</div>
                    </div>
                    <div class="specialist-card">
                        <div class="specialist-number">04</div>
                        <div class="specialist-title">Repurposing Engine</div>
                        <div class="specialist-desc">One piece → 8–10 assets across every channel</div>
                    </div>
                    <div class="specialist-card">
                        <div class="specialist-number">05</div>
                        <div class="specialist-title">SEO & AEO Optimizer</div>
                        <div class="specialist-desc">ChatGPT, Perplexity, Google AI Mode — visible</div>
                    </div>
                    <div class="specialist-card">
                        <div class="specialist-number">06</div>
                        <div class="specialist-title">Distribution Planner</div>
                        <div class="specialist-desc">Right channel, right format, right window</div>
                    </div>
                    <div class="specialist-card">
                        <div class="specialist-number">07</div>
                        <div class="specialist-title">Performance Analyst</div>
                        <div class="specialist-desc">Tracks pipeline, flags what to cut, doubles down</div>
                    </div>
                    <div class="specialist-card">
                        <div class="specialist-number">08</div>
                        <div class="specialist-title">Lead Magnet Builder</div>
                        <div class="specialist-desc">Assets that capture emails and qualify buyers</div>
                    </div>
                    <div class="specialist-card">
                        <div class="specialist-number">09</div>
                        <div class="specialist-title">Competitor Intelligence</div>
                        <div class="specialist-desc">Runs every Monday. Tracks competitor moves and gaps</div>
                    </div>
                </div>

                <!-- What This Replaces -->
                <div class="engine-features">
                    <h3>WHAT THIS REPLACES</h3>
                    <ul class="features-list">
                        <li><strong>CMO hire</strong> — £12,000–15,000/mo</li>
                        <li><strong>Content agency</strong> — £3,000–5,000/mo</li>
                        <li><strong>SEO agency</strong> — £1,500–3,000/mo</li>
                        <li><strong>Social media manager</strong> — £2,000–3,500/mo</li>
                    </ul>
                </div>

                <!-- Ideal For -->
                <div class="engine-features" style="margin-top: 2rem;">
                    <h3>IDEAL FOR</h3>
                    <ul class="features-list">
                        <li>Accounting firms with 5–50 partners looking to grow</li>
                        <li>Practices transitioning from referral-only to digital</li>
                        <li>Firms targeting niche sectors (tech, hospitality, construction)</li>
                        <li>Partners who want a CMO-level strategy without CMO-level cost</li>
                    </ul>
                </div>

                <!-- CTA -->
                <div class="engine-buttons">
                    <button class="engine-btn">Learn More →</button>
                    <button class="engine-btn engine-btn-secondary">Book Free Demo</button>
                </div>
            </div>

            <!-- MY STORY TAB -->
            <div id="story" class="products-tab-content">
                <div class="story-intro">
                    <div class="story-intro-label">ABOUT THE AUTHOR</div>
                    <h2 class="story-intro-title">
                        One of the UK's Most<br>
                        <span class="highlight">Credentialled Marketing Strategists.</span>
                    </h2>
                    <p style="font-size: 1.05rem; color: #666666; line-height: 1.8; margin-bottom: 2rem;">
                        Operating at the intersection of professional services, financial services and artificial intelligence — with an academic and professional background that is, by any measure, exceptional.
                    </p>
                    <div class="story-stats">
                        <div class="stat-item">
                            <div class="stat-number">22+</div>
                            <div class="stat-label">Years Experience</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">15</div>
                            <div class="stat-label">Years in Financial Services</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">136+</div>
                            <div class="stat-label">UK Accounting Firms Served</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">£1.82m</div>
                            <div class="stat-label">Tracked Pipeline Generated</div>
                        </div>
                    </div>
                </div>

                <div class="story-content">
                    <h3 class="story-section-title">Credentials</h3>
                    <div class="story-credentials">
                        <div class="story-credential">
                            <div class="story-credential-label">Highest Qualification</div>
                            <div class="story-credential-value">PhD</div>
                            <div class="story-credential-label" style="font-size: 0.8rem;">Marketing</div>
                        </div>
                        <div class="story-credential">
                            <div class="story-credential-label">Professional Credential</div>
                            <div class="story-credential-value">MCIM</div>
                            <div class="story-credential-label" style="font-size: 0.8rem;">CIM Top 1%</div>
                        </div>
                        <div class="story-credential">
                            <div class="story-credential-label">Business Qualification</div>
                            <div class="story-credential-value">MBA</div>
                            <div class="story-credential-label" style="font-size: 0.8rem;">Business Administration</div>
                        </div>
                        <div class="story-credential">
                            <div class="story-credential-label">Economics Degree</div>
                            <div class="story-credential-value">BSc(Hons)</div>
                            <div class="story-credential-label" style="font-size: 0.8rem;">State University of Tirana</div>
                        </div>
                    </div>

                    <h3 class="story-section-title">My Background</h3>
                    <p class="story-text">
                        Dr. Orjona Fjerza is one of the UK's most credentialled marketing strategists operating at the intersection of professional services, financial services and artificial intelligence. Her academic and professional background forms the foundation of every insight and framework she creates.
                    </p>
                    <p class="story-text">
                        For more than 22 years, Dr. Fjerza has worked at the most senior levels of marketing and business development across banking, financial services, accountancy and professional services. For more than 7 years, she served as executive director and marketing director within one of the UK's significant accounting and financial services groups — working directly alongside the business development team, designing and executing strategies that grew the firm from a small practice to a multi-site group of more than thirty people.
                    </p>

                    <h3 class="story-section-title">Real-World Expertise</h3>
                    <p class="story-text">
                        During that period, she tracked every new client acquisition — LinkedIn, Bark, MVF Global, website, client referral, cold calling. She watched which channels produced high-quality clients who stayed and paid, and which produced expensive, low-conversion volume. That real-world data from internal BD achievement trackers covering hundreds of new client acquisitions forms the empirical backbone of her work.
                    </p>
                    <p class="story-text">
                        Since founding Orion Global Consulting — an AI-first digital growth consultancy — Dr. Fjerza has applied the same rigour to helping more than 70 firms build their own growth systems. She maintains relationships with more than 136 UK accounting firms and has generated a tracked pipeline exceeding £1.82 million.
                    </p>

                    <h3 class="story-section-title">Speaking & Academia</h3>
                    <p class="story-text">
                        She is a speaker at DMWF Expo 2026 — the Digital Marketing World Forum. She continues to lecture, mentor and publish on the application of AI to marketing strategy for UK SMEs. She is a published researcher on SSRN, with academic research on marketing, consumer decision-making and AI strategy.
                    </p>

                    <!-- CTA -->
                    <div class="story-cta">
                        <button class="story-cta-btn">Get The Accountants Blueprint →</button>
                        <button class="story-cta-btn story-cta-btn-secondary">Browse Courses →</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function switchProductTab(tabName) {
        // Hide all tab contents
        const contents = document.querySelectorAll('.products-tab-content');
        contents.forEach(content => {
            content.classList.remove('active');
        });

        // Remove active class from all buttons
        const buttons = document.querySelectorAll('.products-tab-btn');
        buttons.forEach(button => {
            button.classList.remove('active');
        });

        // Show selected tab
        document.getElementById(tabName).classList.add('active');

        // Add active class to clicked button
        event.target.closest('.products-tab-btn').classList.add('active');
    }
</script>

<?php
get_footer();
