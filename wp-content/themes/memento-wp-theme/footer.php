<?php
/**
 * The footer for our theme
 *
 * @package Memento
 */
?>
<style>
    .site-footer {
        background-color: var(--color-navy);
        color: #ffffff;
        padding: 5rem 0 2rem 0;
        border-top: 1px solid rgba(255,255,255,0.1);
        font-family: var(--font-sans);
    }
    .footer-brand {
        font-family: var(--font-serif);
        font-size: 1.8rem;
        color: white;
        margin-bottom: 1rem;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
    .footer-brand span {
        color: var(--color-blue-primary);
    }
    .footer-desc {
        font-size: 0.95rem;
        line-height: 1.8;
        max-width: 400px;
        margin-bottom: 2rem;
    }
    .footer-heading {
        color: white;
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .footer-links li {
        margin-bottom: 1rem;
    }
    .footer-links a {
        color: #9ca3af;
        text-decoration: none;
        transition: color 0.2s;
        font-size: 0.95rem;
    }
    .footer-links a:hover {
        color: var(--color-blue-primary);
    }
    .footer-contact p {
        margin-bottom: 1rem;
        font-size: 0.95rem;
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
    }
    .footer-contact p span {
        color: var(--color-blue-primary);
    }
    .footer-bottom {
        border-top: 1px solid rgba(255,255,255,0.1);
        padding-top: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 0.85rem;
        color: #6b7280;
    }
    .social-links {
        display: flex;
        gap: 1rem;
    }
    .social-links a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        background-color: rgba(255,255,255,0.05);
        color: white;
        border-radius: 50%;
        text-decoration: none;
        transition: background-color 0.2s, color 0.2s;
    }
    .social-links a:hover {
        background-color: var(--color-blue-primary);
        color: var(--color-brand-darker);
    }

    /* Responsive overrides */
    @media (max-width: 991.98px) {
        .site-footer {
            padding: 3rem 0 1rem 0;
        }
        .footer-widget {
            text-align: center;
        }
        .footer-desc {
            margin: 0 auto 2rem auto;
        }
        .social-links {
            justify-content: center;
        }
        .footer-contact p {
            justify-content: center;
        }
    }
</style>

<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="row gy-5 mb-5">
            <div class="col-lg-5 pe-lg-5 footer-widget">
                <div class="footer-brand"><?php bloginfo('name'); ?></div>
                <p class="footer-desc">
                    PhD. MBA. MCIM. Helping businesses grow through the power of marketing, strategy, and innovation. 22 years of turning business complexity into commercial direction.
                </p>
                <div class="social-links">
                    <a href="https://linkedin.com/in/orjona-fjerza" target="_blank" aria-label="LinkedIn">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                </div>
            </div>
            
            <div class="col-lg-3 footer-widget">
                <h3 class="footer-heading">Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a></li>
                </ul>
            </div>
            
            <div class="col-lg-4 footer-widget footer-contact">
                <h3 class="footer-heading">Contact</h3>
                <p>
                    <span>📧</span> <a href="mailto:contact@orionglobalconsulting.co.uk" style="color: inherit; text-decoration: none;">contact@orionglobalconsulting.co.uk</a>
                </p>
                <p>
                    <span>📞</span> <a href="tel:+447551161717" style="color: inherit; text-decoration: none;">+44 7551 161717</a>
                </p>
                <p>
                    <span>📍</span> 21 The Barons, Twickenham<br>London TW1 2AP
                </p>
            </div>
        </div>
        
        <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center text-center text-md-start gap-3">
            <div>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.</div>
            <div>Designed by Memento Tech</div>
        </div>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<!-- AOS Animation Script -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof AOS !== 'undefined') {
            AOS.init({
                once: true,
                offset: 100,
            });
        }
    });
</script>
</body>
</html>
