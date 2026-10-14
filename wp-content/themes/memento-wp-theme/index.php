<?php
/**
 * The template for displaying blog and archives
 *
 * @package Memento
 */

get_header();
?>

<style>
    .blog-hero {
        padding: 5rem 0;
        background: linear-gradient(135deg, rgba(250, 204, 21, 0.1) 0%, rgba(18, 24, 43, 0) 100%);
        border-bottom: 1px solid rgba(29,50,130,0.1);
    }

    .blog-hero-title {
        font-size: 3.5rem;
        font-weight: 900;
        font-family: 'Playfair Display', serif;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, #0FB6EF 0%, #ffffff 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .blog-hero-desc {
        font-size: 1.25rem;
        color: #666666;
        max-width: 600px;
    }

    .blog-content {
        padding: 5rem 0;
    }

    .blog-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
        margin-bottom: 3rem;
    }

    @media (max-width: 1400px) {
        .blog-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 1024px) {
        .blog-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .blog-grid {
            grid-template-columns: 1fr;
        }
    }

    .blog-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.23, 1, 0.320, 1);
        display: flex;
        flex-direction: column;
        height: 100%;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .blog-card:hover {
        transform: translateY(-16px);
        border-color: #0FB6EF;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15),
                    0 0 30px rgba(15, 182, 239, 0.1);
    }

    .blog-card-image {
        width: 100%;
        height: 240px;
        background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
        overflow: hidden;
        position: relative;
        flex-shrink: 0;
    }

    .blog-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s cubic-bezier(0.23, 1, 0.320, 1);
    }

    .blog-card:hover .blog-card-image img {
        transform: scale(1.08);
    }

    .blog-card-image-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        opacity: 0.5;
    }

    .blog-card-content {
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .blog-card-meta {
        display: flex;
        gap: 1rem;
        margin-bottom: 1rem;
        font-size: 0.8rem;
        color: #666666;
        flex-wrap: wrap;
    }

    .blog-card-meta span {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .blog-card-category {
        display: inline-block;
        background: rgba(250, 204, 21, 0.1);
        color: #0FB6EF;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 1rem;
    }

    .blog-card-title {
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
        font-family: 'Playfair Display', serif;
        line-height: 1.3;
    }

    .blog-card-title a {
        color: #1D3282;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .blog-card-title a:hover {
        color: #0FB6EF;
    }

    .blog-card-excerpt {
        font-size: 0.95rem;
        color: #666666;
        line-height: 1.6;
        margin-bottom: 1rem;
        flex-grow: 1;
    }

    .blog-card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 1rem;
        border-top: 1px solid rgba(29,50,130,0.1);
    }

    .blog-card-author {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 0.85rem;
    }

    .blog-card-author-name {
        color: #0FB6EF;
        font-weight: 600;
    }

    .blog-read-more {
        color: #0FB6EF;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        transition: color 0.3s ease;
    }

    .blog-read-more:hover {
        color: #0a9fcc;
    }

    .blog-pagination {
        display: flex;
        justify-content: center;
        gap: 0.5rem;
        margin-top: 3rem;
    }

    .blog-pagination a,
    .blog-pagination span {
        background: transparent;
        color: #666666;
        border: 1px solid rgba(255,255,255,0.2);
        padding: 0.5rem 0.75rem;
        border-radius: 4px;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .blog-pagination a:hover,
    .blog-pagination .current {
        background-color: #0FB6EF;
        color: #1D3282;
        border-color: #0FB6EF;
    }

    .no-posts {
        text-align: center;
        padding: 3rem 0;
    }

    .no-posts-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    .no-posts-text {
        color: #666666;
        font-size: 1.1rem;
    }

    @media (max-width: 768px) {
        .blog-hero {
            padding: 3rem 0;
        }

        .blog-hero-title {
            font-size: 2.5rem;
        }

        .blog-hero-desc {
            font-size: 1rem;
        }

        .blog-grid {
            gap: 1.5rem;
        }

        .blog-card-image {
            height: 150px;
        }
    }
</style>

<main id="primary" class="site-main">
    <!-- Blog Hero -->
    <div class="blog-hero">
        <div class="container">
            <?php
            if ( is_home() ) {
                echo '<h1 class="blog-hero-title">Latest Articles</h1>';
                echo '<p class="blog-hero-desc">Insights on marketing, strategy, and business growth.</p>';
            } elseif ( is_category() ) {
                echo '<h1 class="blog-hero-title">' . single_cat_title( '', false ) . '</h1>';
                echo '<p class="blog-hero-desc">' . category_description() . '</p>';
            } elseif ( is_tag() ) {
                echo '<h1 class="blog-hero-title">Tag: ' . single_tag_title( '', false ) . '</h1>';
            }
            ?>
        </div>
    </div>

    <!-- Blog Content -->
    <div class="blog-content">
        <div class="container">
            <?php
            if ( have_posts() ) {
                ?>
                <div class="blog-grid">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        ?>
                        <article class="blog-card">
                            <!-- Featured Image -->
                            <div class="blog-card-image">
                                <?php
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail( 'medium_large', array(
                                        'class' => 'w-100 h-100'
                                    ) );
                                } else {
                                    ?>
                                    <div class="blog-card-image-placeholder">📝</div>
                                    <?php
                                }
                                ?>
                            </div>

                            <!-- Card Content -->
                            <div class="blog-card-content">
                                <!-- Category -->
                                <?php
                                $categories = get_the_category();
                                if ( ! empty( $categories ) ) {
                                    foreach ( $categories as $category ) {
                                        echo '<span class="blog-card-category">' . esc_html( $category->name ) . '</span>';
                                        break;
                                    }
                                }
                                ?>

                                <!-- Title -->
                                <h2 class="blog-card-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>

                                <!-- Meta Info -->
                                <div class="blog-card-meta">
                                    <span>
                                        📅 <?php echo get_the_date( 'M d, Y' ); ?>
                                    </span>
                                    <span>
                                        👤 <?php the_author_posts_link(); ?>
                                    </span>
                                    <span>
                                        ⏱ <?php echo get_reading_time(); ?>
                                    </span>
                                </div>

                                <!-- Excerpt -->
                                <p class="blog-card-excerpt">
                                    <?php
                                    echo wp_trim_words( get_the_excerpt(), 20, '...' );
                                    ?>
                                </p>

                                <!-- Footer -->
                                <div class="blog-card-footer">
                                    <a href="<?php the_permalink(); ?>" class="blog-read-more">
                                        Read More →
                                    </a>
                                </div>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    ?>
                </div>

                <!-- Pagination -->
                <div class="blog-pagination">
                    <?php
                    the_posts_pagination( array(
                        'mid_size'  => 2,
                        'prev_text' => '← Previous',
                        'next_text' => 'Next →',
                    ) );
                    ?>
                </div>
                <?php
            } else {
                ?>
                <div class="no-posts">
                    <div class="no-posts-icon">📭</div>
                    <p class="no-posts-text">No blog posts found yet.</p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</main><!-- #main -->

<?php
get_footer();

/**
 * Simple reading time calculator
 */
function get_reading_time() {
    $content = get_the_content();
    $word_count = str_word_count( wp_strip_all_tags( $content ) );
    $reading_time = ceil( $word_count / 200 );
    return $reading_time . ' min read';
}
