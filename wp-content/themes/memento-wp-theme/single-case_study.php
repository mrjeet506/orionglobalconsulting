<?php
/**
 * The template for displaying all single case studies
 *
 * @package Memento
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('single-case-study-wrapper container'); ?>>
                
                <header class="entry-header text-center" style="padding: 4rem 0;">
                    <span class="tag" style="margin-bottom: 1rem; display: inline-block;">CLIENT CASE STUDY</span>
                    <?php the_title( '<h1 class="entry-title main-title" style="color: #fff; margin-bottom: 2rem;">', '</h1>' ); ?>
                    
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail" style="margin: 2rem 0;">
                            <?php the_post_thumbnail( 'full', array( 'style' => 'max-width: 100%; height: auto; border-radius: 16px; border: 4px solid var(--color-blue-primary);' ) ); ?>
                        </div>
                    <?php endif; ?>
                </header><!-- .entry-header -->

                <div class="case-study-grid" style="display: grid; grid-template-columns: 1fr 2fr; gap: 4rem; margin-bottom: 5rem;">
                    
                    <!-- Sidebar Meta info -->
                    <div class="case-study-meta bg-card" style="padding: 2rem; border-radius: 12px; height: fit-content;">
                        <h4 style="color: var(--color-blue-primary); margin-bottom: 1.5rem; font-family: var(--font-serif); font-size: 1.5rem;">The Challenge</h4>
                        <?php 
                        // Fetching an excerpt or custom field for challenge. We'll fallback to excerpt.
                        if (has_excerpt()) {
                            echo '<p style="color: var(--text-gray); font-size: 0.9rem;">' . get_the_excerpt() . '</p>';
                        }
                        ?>
                        
                        <hr style="border-color: rgba(255,255,255,0.1); margin: 2rem 0;">
                        
                        <div style="margin-bottom: 1rem;">
                            <strong style="color: #fff; display: block; margin-bottom: 0.25rem;">Client Industry</strong>
                            <span style="color: var(--text-gray); font-size: 0.9rem;">
                                <?php
                                $categories = get_the_category();
                                if ( ! empty( $categories ) ) {
                                    echo esc_html( $categories[0]->name );
                                } else {
                                    echo 'Professional Services';
                                }
                                ?>
                            </span>
                        </div>
                    </div>

                    <!-- Main Content -->
                    <div class="entry-content" style="color: #fff;">
                        <h2 style="font-family: var(--font-serif); color: var(--color-blue-primary); font-size: 2.5rem; margin-top: 0;">The Solution & Results</h2>
                        <div style="font-size: 1.1rem; line-height: 1.8; color: #e5e7eb;">
                            <?php
                            the_content();
                            ?>
                        </div>
                    </div><!-- .entry-content -->
                    
                </div>
                
                <!-- CTA -->
                <div class="text-center" style="margin-bottom: 5rem;">
                    <a href="#" class="btn btn-primary btn-large">Want similar results? Let's talk &rarr;</a>
                </div>

            </article><!-- #post-<?php the_ID(); ?> -->
            <?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
