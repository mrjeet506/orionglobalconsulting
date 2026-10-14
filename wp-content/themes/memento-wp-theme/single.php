<?php
/**
 * The template for displaying single blog posts
 *
 * @package Memento
 */

get_header();
?>

<style>
    .post-hero {
        padding: 3rem 0;
        background: linear-gradient(135deg, rgba(250, 204, 21, 0.1) 0%, rgba(18, 24, 43, 0) 100%);
        border-bottom: 1px solid rgba(29,50,130,0.1);
    }

    .post-breadcrumb {
        color: #666666;
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
    }

    .post-breadcrumb a {
        color: #0FB6EF;
        text-decoration: none;
    }

    .post-breadcrumb a:hover {
        color: #0a9fcc;
    }

    .post-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .post-content {
        padding: 4rem 0;
    }

    .post-title {
        font-size: 3rem;
        font-weight: 900;
        font-family: 'Playfair Display', serif;
        color: #ffffff;
        margin-bottom: 1.5rem;
        line-height: 1.2;
    }

    .post-meta {
        display: flex;
        gap: 2rem;
        margin-bottom: 2rem;
        padding-bottom: 2rem;
        border-bottom: 1px solid rgba(29,50,130,0.1);
        flex-wrap: wrap;
    }

    .post-meta-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 0.9rem;
        color: #666666;
    }

    .post-meta-item.author {
        color: #0FB6EF;
        font-weight: 600;
    }

    .post-category {
        display: inline-block;
        background: rgba(250, 204, 21, 0.1);
        color: #0FB6EF;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 1rem;
    }

    .post-featured-image {
        margin: 2rem 0 3rem 0;
        border-radius: 12px;
        overflow: hidden;
        width: 100%;
        height: 400px;
        background: linear-gradient(135deg, #2a4a5a 0%, #1a3a4a 100%);
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    }

    .post-featured-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .post-body {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #666666;
    }

    .post-body p {
        margin-bottom: 1.5rem;
    }

    .post-body h2 {
        font-size: 2rem;
        font-weight: 700;
        color: #ffffff;
        margin-top: 2.5rem;
        margin-bottom: 1rem;
        font-family: 'Playfair Display', serif;
    }

    .post-body h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #ffffff;
        margin-top: 2rem;
        margin-bottom: 1rem;
        font-family: 'Playfair Display', serif;
    }

    .post-body ul,
    .post-body ol {
        margin-bottom: 1.5rem;
        padding-left: 2rem;
    }

    .post-body li {
        margin-bottom: 0.75rem;
    }

    .post-body blockquote {
        border-left: 4px solid #0FB6EF;
        padding-left: 1.5rem;
        margin: 2rem 0;
        color: #0FB6EF;
        font-style: italic;
    }

    .post-body a {
        color: #0FB6EF;
        text-decoration: underline;
    }

    .post-body a:hover {
        color: #0a9fcc;
    }

    .post-body code {
        background: rgba(0, 0, 0, 0.3);
        color: #fbbf24;
        padding: 0.25rem 0.5rem;
        border-radius: 4px;
        font-size: 0.9rem;
        font-family: monospace;
    }

    .post-body pre {
        background: rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 1rem;
        border-radius: 4px;
        overflow-x: auto;
        margin-bottom: 1.5rem;
    }

    .post-body pre code {
        background: none;
        color: inherit;
        padding: 0;
    }

    .post-divider {
        height: 1px;
        background: rgba(255, 255, 255, 0.1);
        margin: 3rem 0;
    }

    .post-navigation {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        margin-top: 3rem;
    }

    .post-nav-item {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border: 1px solid rgba(29,50,130,0.1);
        border-radius: 8px;
        padding: 1.5rem;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .post-nav-item:hover {
        border-color: #0FB6EF;
        box-shadow: 0 10px 30px rgba(250, 204, 21, 0.1);
    }

    .post-nav-label {
        font-size: 0.8rem;
        color: #666666;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
    }

    .post-nav-title {
        font-size: 1.1rem;
        color: #0FB6EF;
        font-weight: 700;
    }

    .post-nav-item:hover .post-nav-title {
        color: #0a9fcc;
    }

    .comments-section {
        margin-top: 4rem;
        padding-top: 3rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .comments-section h2 {
        font-size: 2rem;
        color: #ffffff;
        margin-bottom: 2rem;
        font-family: 'Playfair Display', serif;
    }

    @media (max-width: 768px) {
        .post-title {
            font-size: 2rem;
        }

        .post-meta {
            flex-direction: column;
            gap: 1rem;
        }

        .post-featured-image {
            height: 250px;
            margin: 1.5rem 0 2rem 0;
        }

        .post-navigation {
            grid-template-columns: 1fr;
        }
    }
</style>

<main id="primary" class="site-main">
    <!-- Post Hero -->
    <div class="post-hero">
        <div class="post-container">
            <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="post-breadcrumb">← Back to Articles</a>
        </div>
    </div>

    <!-- Post Content -->
    <div class="post-content">
        <div class="post-container">
            <?php
            while ( have_posts() ) :
                the_post();
                ?>

                <!-- Category -->
                <?php
                $categories = get_the_category();
                if ( ! empty( $categories ) ) {
                    foreach ( $categories as $category ) {
                        echo '<span class="post-category">' . esc_html( $category->name ) . '</span>';
                        break;
                    }
                }
                ?>

                <!-- Title -->
                <h1 class="post-title"><?php the_title(); ?></h1>

                <!-- Meta Info -->
                <div class="post-meta">
                    <div class="post-meta-item">
                        📅 <?php echo get_the_date( 'F d, Y' ); ?>
                    </div>
                    <div class="post-meta-item author">
                        👤 <?php the_author(); ?>
                    </div>
                    <div class="post-meta-item">
                        ⏱ <?php echo get_reading_time(); ?>
                    </div>
                </div>

                <!-- Featured Image -->
                <?php
                if ( has_post_thumbnail() ) {
                    ?>
                    <div class="post-featured-image">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                    <?php
                }
                ?>

                <!-- Post Content -->
                <div class="post-body">
                    <?php the_content(); ?>
                </div>

                <!-- Post Navigation -->
                <div class="post-divider"></div>
                <?php
                $prev_post = get_previous_post();
                $next_post = get_next_post();

                if ( $prev_post || $next_post ) {
                    echo '<div class="post-navigation">';

                    if ( $prev_post ) {
                        echo '<a href="' . esc_url( get_permalink( $prev_post->ID ) ) . '" class="post-nav-item">';
                        echo '<div class="post-nav-label">← Previous Post</div>';
                        echo '<div class="post-nav-title">' . esc_html( $prev_post->post_title ) . '</div>';
                        echo '</a>';
                    }

                    if ( $next_post ) {
                        echo '<a href="' . esc_url( get_permalink( $next_post->ID ) ) . '" class="post-nav-item">';
                        echo '<div class="post-nav-label">Next Post →</div>';
                        echo '<div class="post-nav-title">' . esc_html( $next_post->post_title ) . '</div>';
                        echo '</a>';
                    }

                    echo '</div>';
                }
                ?>


                <?php
            endwhile;
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
