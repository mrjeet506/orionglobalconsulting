<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Orion_Blog_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'orion_blog'; }
	public function get_title() { return esc_html__( 'Orion Blog', 'orjona-fjerza' ); }
	public function get_icon() { return 'eicon-post-list'; }
	public function get_categories() { return [ 'orion-theme' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'content_section', [ 'label' => esc_html__( 'Blog Header', 'orjona-fjerza' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT, ] );
		$this->add_control( 'subtitle', [ 'label' => esc_html__( 'Subtitle', 'orjona-fjerza' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => esc_html__( 'INSIGHTS & BLOGS', 'orjona-fjerza' ), ] );
		$this->add_control( 'main_title', [ 'label' => esc_html__( 'Main Title', 'orjona-fjerza' ), 'type' => \Elementor\Controls_Manager::WYSIWYG, 'default' => __( 'Thought Leadership <span class="text-yellow">That Actually Helps.</span>', 'orjona-fjerza' ), ] );
        $this->add_control( 'description', [ 'label' => esc_html__( 'Description', 'orjona-fjerza' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => esc_html__( 'Marketing insights, AI strategy and business growth — from the Orion Global Consulting blog.', 'orjona-fjerza' ), ] );
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
        <section class="section bg-light" style="border-top: 1px solid #e5e7eb;">
            <div class="container">
                <div class="section-header" style="max-width: 800px;">
                    <span class="subtitle"><?php echo esc_html($settings['subtitle']); ?></span>
                    <h2 class="main-title"><?php echo wp_kses_post($settings['main_title']); ?></h2>
                    <p style="color: #6b7280; font-style: italic;"><?php echo esc_html($settings['description']); ?></p>
                </div>
                
                <div class="blog-grid">
                    <?php
                    $blog_args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => 6,
                        'post_status'    => 'publish',
                    );
                    $blog_query = new \WP_Query( $blog_args );

                    if ( $blog_query->have_posts() ) :
                        while ( $blog_query->have_posts() ) : $blog_query->the_post();
                            $categories = get_the_category();
                            $cat_name = ! empty( $categories ) ? esc_html( $categories[0]->name ) : 'Uncategorized';
                            ?>
                            <div class="blog-card">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="blog-image" style="background-image: url('<?php echo get_the_post_thumbnail_url( get_the_ID(), 'medium' ); ?>'); background-size: cover; background-position: center; font-size: 0;"></div>
                                <?php else : ?>
                                    <div class="blog-image">📝</div>
                                <?php endif; ?>
                                <div class="blog-content">
                                    <div class="blog-cat"><?php echo $cat_name; ?></div>
                                    <h4><a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;"><?php the_title(); ?></a></h4>
                                    <p><?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="read-more">Read more &rarr;</a>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p style="grid-column: 1 / -1; text-align: center; color: #6b7280;">No blog posts found. Publish some posts to see them here.</p>';
                    endif;
                    ?>
                </div>
                
                <div class="text-center" style="margin-top: 4rem;">
                    <a href="#" class="btn btn-primary btn-large">View All Blogs on Orion Global &rarr;</a>
                </div>
            </div>
        </section>
		<?php
	}
}
