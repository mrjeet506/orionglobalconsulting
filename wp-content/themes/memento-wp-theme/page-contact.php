<?php
/**
 * Template Name: Contact
 * Description: Contact Page with Contact Form 7
 *
 * @package Memento
 */

get_header();
?>

<style>
    /* Hero Section */
    .contact-hero {
        background: #ffffff;
        padding: 4rem 0;
        border-bottom: 1px solid #e5e7eb;
    }

    .contact-hero h1 {
        font-size: 3rem;
        font-weight: 900;
        font-family: 'Playfair Display', serif;
        color: #0FB6EF;
        margin-bottom: 0.5rem;
    }

    .contact-hero p {
        font-size: 1.1rem;
        color: #666666;
    }

    /* Contact Content Section */
    .contact-content {
        padding: 6rem 0;
        background: #ffffff;
        min-height: 100vh;
        display: flex;
        align-items: center;
    }

    .contact-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
    }

    /* Left Section - Contact Info */
    .contact-info-section h2 {
        font-size: 1.3rem;
        font-weight: 900;
        font-family: 'Inter', sans-serif;
        color: #0FB6EF;
        margin-bottom: 2.5rem;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .contact-info-items {
        display: flex;
        flex-direction: column;
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .contact-info-item {
        display: flex;
        gap: 1.5rem;
        align-items: flex-start;
    }

    .contact-info-icon {
        width: 50px;
        height: 50px;
        background: #0FB6EF;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
        color: #ffffff;
    }

    .contact-info-content {
        flex: 1;
    }

    .contact-info-label {
        font-size: 0.8rem;
        font-weight: 700;
        color: #9ca3af;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 0.25rem;
    }

    .contact-info-text {
        font-size: 1rem;
        color: #1D3282;
        font-weight: 600;
    }

    .contact-info-text a {
        color: #0FB6EF;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .contact-info-text a:hover {
        color: #0a9fcc;
    }

    .contact-buttons {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        margin-top: 3rem;
    }

    .contact-btn {
        display: inline-block;
        padding: 1rem 2rem;
        font-weight: 700;
        border-radius: 6px;
        text-decoration: none;
        text-align: center;
        transition: all 0.3s ease;
        font-size: 1rem;
    }

    .contact-btn.primary {
        background: #0FB6EF;
        color: #ffffff;
        border: 2px solid #0FB6EF;
    }

    .contact-btn.primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(15, 182, 239, 0.3);
        background: #0a9fcc;
        border-color: #0a9fcc;
    }

    .contact-btn.secondary {
        background: transparent;
        color: #0FB6EF;
        border: 2px solid #0FB6EF;
    }

    .contact-btn.secondary:hover {
        background: #0FB6EF;
        color: #ffffff;
    }

    /* Right Section - Form */
    .contact-form-section {
        background: #f8f9fa;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 3rem;
    }

    .contact-form-section h2 {
        font-size: 1.8rem;
        font-weight: 900;
        font-family: 'Playfair Display', serif;
        color: #0FB6EF;
        margin-bottom: 2rem;
    }

    /* Contact Form 7 Styling */
    .contact-form-section .wpcf7-form {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .contact-form-section .wpcf7-form-control-wrap {
        width: 100%;
    }

    .contact-form-section label {
        display: block;
        font-size: 0.8rem;
        font-weight: 700;
        color: #9ca3af;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 0.75rem;
    }

    .contact-form-section input[type="text"],
    .contact-form-section input[type="email"],
    .contact-form-section select,
    .contact-form-section textarea {
        width: 100%;
        padding: 1rem;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        color: #1D3282;
        font-family: 'Inter', sans-serif;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .contact-form-section input::placeholder,
    .contact-form-section textarea::placeholder {
        color: #9ca3af;
    }

    .contact-form-section input:focus,
    .contact-form-section select:focus,
    .contact-form-section textarea:focus {
        outline: none;
        border-color: #0FB6EF;
        background: #ffffff;
        box-shadow: 0 0 0 3px rgba(15, 182, 239, 0.1);
    }

    .contact-form-section select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%231D3282' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        padding-right: 2.5rem;
    }

    .contact-form-section textarea {
        resize: vertical;
        min-height: 120px;
    }

    .contact-form-section .wpcf7-submit {
        background: #0FB6EF;
        color: #ffffff;
        border: 2px solid #0FB6EF;
        padding: 1rem 2rem;
        font-weight: 700;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 1rem;
        width: 100%;
        margin-top: 1rem;
    }

    .contact-form-section .wpcf7-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(15, 182, 239, 0.3);
        background: #0a9fcc;
        border-color: #0a9fcc;
    }

    /* Form Messages */
    .contact-form-section .wpcf7-response-output {
        padding: 1rem;
        border-radius: 6px;
        margin-bottom: 1rem;
        font-weight: 600;
    }

    .contact-form-section .wpcf7-mail-sent-ok {
        background: rgba(16, 185, 129, 0.2);
        border: 1px solid #10b981;
        color: #86efac;
    }

    .contact-form-section .wpcf7-mail-sent-ng {
        background: rgba(239, 68, 68, 0.2);
        border: 1px solid #ef4444;
        color: #fca5a5;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .contact-hero h1 {
            font-size: 2.2rem;
        }

        .contact-wrapper {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .contact-content {
            padding: 3rem 0;
        }
    }

    @media (max-width: 768px) {
        .contact-hero {
            padding: 2rem 0;
        }

        .contact-hero h1 {
            font-size: 1.8rem;
        }

        .contact-form-section {
            padding: 2rem;
        }

        .contact-buttons {
            flex-direction: row;
        }

        .contact-btn {
            flex: 1;
        }
    }
</style>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <div class="contact-hero">
        <div class="container">
            <h1>Get in Touch</h1>
            <p>Let's discuss your needs and explore how we can help your business grow.</p>
        </div>
    </div>

    <!-- Contact Content -->
    <div class="contact-content">
        <div class="container">
            <div class="contact-wrapper">
                <!-- Left Section - Contact Info -->
                <div class="contact-info-section">
                    <h2>Get In Touch</h2>

                    <div class="contact-info-items">
                        <!-- Email -->
                        <div class="contact-info-item">
                            <div class="contact-info-icon">✉️</div>
                            <div class="contact-info-content">
                                <div class="contact-info-label">Email</div>
                                <div class="contact-info-text">
                                    <a href="mailto:contact@orionglobalconsulting.co.uk">contact@orionglobalconsulting.co.uk</a>
                                </div>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="contact-info-item">
                            <div class="contact-info-icon">📞</div>
                            <div class="contact-info-content">
                                <div class="contact-info-label">Phone</div>
                                <div class="contact-info-text">
                                    <a href="tel:+442075516171">+44 7551 161717</a>
                                </div>
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="contact-info-item">
                            <div class="contact-info-icon">📍</div>
                            <div class="contact-info-content">
                                <div class="contact-info-label">Location</div>
                                <div class="contact-info-text">
                                    21 The Barons, Twickenham<br>
                                    London TW1 2AP
                                </div>
                            </div>
                        </div>

                        <!-- Book a Call -->
                        <div class="contact-info-item">
                            <div class="contact-info-icon">📅</div>
                            <div class="contact-info-content">
                                <div class="contact-info-label">Book a Call</div>
                                <div class="contact-info-text">
                                    <a href="https://calendly.com/meeting-orionglobalconsulting/30min" target="_blank">calendly.com/meeting-orionglobalconsulting/30min</a>
                                </div>
                            </div>
                        </div>

                        <!-- LinkedIn -->
                        <div class="contact-info-item">
                            <div class="contact-info-icon">in</div>
                            <div class="contact-info-content">
                                <div class="contact-info-label">LinkedIn</div>
                                <div class="contact-info-text">
                                    <a href="https://linkedin.com/in/orjona-fjerza" target="_blank">linkedin.com/in/orjona-fjerza</a><br>
                                    <span style="font-size: 0.85rem; color: #9ca3af;">7,544 followers</span>
                                </div>
                            </div>
                        </div>

                        <!-- Website -->
                        <div class="contact-info-item">
                            <div class="contact-info-icon">🌐</div>
                            <div class="contact-info-content">
                                <div class="contact-info-label">Orion Global Consulting</div>
                                <div class="contact-info-text">
                                    <a href="https://orionglobalconsulting.co.uk" target="_blank">orionglobalconsulting.co.uk</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="contact-buttons">
                        <a href="https://calendly.com/meeting-orionglobalconsulting/30min" class="contact-btn primary" target="_blank">Book Free Call →</a>
                        <a href="https://orionglobalconsulting.co.uk" class="contact-btn secondary" target="_blank">Orion Global →</a>
                    </div>
                </div>

                <!-- Right Section - Form -->
                <div class="contact-form-section">
                    <h2>Send a Message</h2>

                    <?php
                    // Display Contact Form 7 form
                    if ( function_exists( 'do_shortcode' ) ) {
                        echo do_shortcode( '[contact-form-7 id="4f733fd" title="Contact form 1"]' );
                    } else {
                        echo '<p style="color: #fbbf24;">Contact Form 7 plugin is not active.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
