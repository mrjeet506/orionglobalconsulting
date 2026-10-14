<?php
/**
 * The header for our theme
 *
 * @package Memento
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'memento' ); ?></a>

	<header id="masthead" class="site-header" style="background-color: var(--bg-light); border-bottom: 1px solid rgba(29,50,130,0.1);">
        <nav class="navbar navbar-expand-lg navbar-light container py-3">
            <div class="site-branding">
                <?php
                if ( has_custom_logo() ) {
                    the_custom_logo();
                } else {
                    ?>
                    <h1 class="site-title m-0 fs-3 text-uppercase tracking-wider font-serif" style="letter-spacing: 2px;"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="color: var(--color-navy); text-decoration: none;"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php
                }
                ?>
            </div><!-- .site-branding -->

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#primaryNavbar" aria-controls="primaryNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end align-items-center mt-3 mt-lg-0 gap-4" id="primaryNavbar">
                <div id="site-navigation" class="main-navigation w-100" style="max-width: fit-content;">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                            'fallback_cb'    => false, // We'll let Elementor handle complex menus if needed
                            'menu_class'     => 'navbar-nav d-flex list-unstyled m-0 gap-3 gap-lg-4 flex-column flex-lg-row text-center text-lg-start' // basic bootstrap styles for ul
                        )
                    );
                    ?>
                </div><!-- #site-navigation -->
                
                <div class="text-center text-lg-start">
                    <a href="https://orionglobalconsulting.co.uk" target="_blank" class="btn btn-primary fw-bold mt-3 mt-lg-0" style="background-color: #0FB6EF; border-color: #0FB6EF; color: #fff;">Orion Global &rarr;</a>
                </div>
            </div>
        </nav>
	</header><!-- #masthead -->
