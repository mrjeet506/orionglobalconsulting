<?php
/**
 * Template Name: My Bio
 *
 * @package Memento
 */

get_header();
?>

<style>
    /* Bio Page Hero */
    .bio-hero {
        padding: 5rem 0;
        background: linear-gradient(135deg, rgba(15, 182, 239, 0.15) 0%, rgba(255, 255, 255, 0) 100%);
        border-bottom: 1px solid rgba(29, 50, 130, 0.1);
    }

    .bio-hero-label {
        color: #0FB6EF;
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 1rem;
    }

    .bio-hero-title {
        font-size: 3.5rem;
        font-weight: 900;
        font-family: 'Playfair Display', serif;
        color: #1D3282;
        margin-bottom: 2rem;
        line-height: 1.2;
    }

    .bio-hero-title .highlight {
        color: #0FB6EF;
    }

    .bio-credentials-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .bio-credential-card {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border: 1px solid rgba(29, 50, 130, 0.1);
        border-radius: 8px;
        padding: 1.5rem;
        text-align: center;
        transition: all 0.3s ease;
    }

    .bio-credential-card:hover {
        border-color: #0FB6EF;
        box-shadow: 0 10px 30px rgba(15, 182, 239, 0.1);
    }

    .bio-credential-label {
        font-size: 0.8rem;
        color: #999999;
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 1px;
        margin-bottom: 0.75rem;
    }

    .bio-credential-value {
        font-size: 1.8rem;
        font-weight: 900;
        color: #0FB6EF;
        font-family: 'Playfair Display', serif;
    }

    .bio-credential-sub {
        font-size: 0.85rem;
        color: #666666;
        margin-top: 0.5rem;
        font-weight: 500;
    }

    /* Bio Content */
    .bio-content {
        padding: 5rem 0;
    }

    .bio-section {
        margin-bottom: 5rem;
    }

    .bio-section-title {
        font-size: 2.5rem;
        font-weight: 700;
        font-family: 'Playfair Display', serif;
        color: #1D3282;
        margin-bottom: 2rem;
        line-height: 1.2;
    }

    .bio-section-title .highlight {
        color: #0FB6EF;
    }

    .bio-text {
        font-size: 1.05rem;
        line-height: 1.9;
        color: #666666;
    }

    .bio-text p {
        margin-bottom: 1.5rem;
    }

    .bio-text strong {
        color: #1D3282;
        font-weight: 700;
    }

    .bio-text a {
        color: #0FB6EF;
        text-decoration: none;
        font-weight: 600;
    }

    .bio-text a:hover {
        text-decoration: underline;
    }

    /* Interests Section */
    .bio-interests {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .bio-interest-item {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border: 1px solid rgba(15, 182, 239, 0.2);
        border-radius: 8px;
        padding: 1.5rem;
        text-align: center;
        transition: all 0.3s ease;
    }

    .bio-interest-item:hover {
        border-color: #0FB6EF;
        box-shadow: 0 10px 30px rgba(15, 182, 239, 0.1);
    }

    .bio-interest-icon {
        font-size: 2.5rem;
        margin-bottom: 0.75rem;
    }

    .bio-interest-text {
        font-size: 0.95rem;
        color: #1D3282;
        font-weight: 600;
    }

    /* Credentials Cards */
    .bio-credentials-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .bio-credential-large {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border: 1px solid rgba(29, 50, 130, 0.1);
        border-radius: 8px;
        padding: 2rem;
        transition: all 0.3s ease;
    }

    .bio-credential-large:hover {
        border-color: #0FB6EF;
        box-shadow: 0 15px 40px rgba(15, 182, 239, 0.1);
    }

    .bio-cred-icon {
        font-size: 2rem;
        margin-bottom: 1rem;
    }

    .bio-cred-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: #1D3282;
        font-family: 'Playfair Display', serif;
        margin-bottom: 0.75rem;
    }

    .bio-cred-desc {
        font-size: 0.95rem;
        color: #666666;
        line-height: 1.6;
    }

    .bio-quote-section {
        background: linear-gradient(135deg, rgba(15, 182, 239, 0.1) 0%, rgba(15, 182, 239, 0.05) 100%);
        border: 2px solid #0FB6EF;
        border-radius: 8px;
        padding: 3rem;
        margin: 4rem 0;
        text-align: center;
    }

    .bio-quote-text {
        font-size: 1.3rem;
        color: #1D3282;
        font-style: italic;
        margin-bottom: 1rem;
        line-height: 1.8;
    }

    .bio-quote-author {
        font-size: 1rem;
        color: #0FB6EF;
        font-weight: 700;
    }

    .bio-media-section {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border: 1px solid rgba(29, 50, 130, 0.1);
        border-radius: 8px;
        padding: 2rem;
        margin-top: 3rem;
        text-align: center;
    }

    .bio-media-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1D3282;
        font-family: 'Playfair Display', serif;
        margin-bottom: 1rem;
    }

    .bio-media-link {
        display: inline-block;
        background-color: #0FB6EF;
        color: #ffffff;
        padding: 0.75rem 2rem;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 700;
        transition: all 0.3s ease;
    }

    .bio-media-link:hover {
        background-color: #0a9fcc;
    }

    @media (max-width: 768px) {
        .bio-hero-title {
            font-size: 2.5rem;
        }

        .bio-credentials-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .bio-credential-value {
            font-size: 1.5rem;
        }

        .bio-quote-section {
            padding: 2rem;
        }

        .bio-quote-text {
            font-size: 1.1rem;
        }

        .bio-interests {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <div class="bio-hero">
        <div class="container">
            <div class="bio-hero-label">My Bio</div>
            <h1 class="bio-hero-title">
                Dr. Orjona Fjerza
            </h1>

            <!-- Quick Credentials -->
            <div class="bio-credentials-grid">
                <div class="bio-credential-card">
                    <div class="bio-credential-label">Highest Qualification</div>
                    <div class="bio-credential-value">PhD</div>
                    <div class="bio-credential-sub">Marketing</div>
                </div>
                <div class="bio-credential-card">
                    <div class="bio-credential-label">Professional Credential</div>
                    <div class="bio-credential-value">MCIM</div>
                    <div class="bio-credential-sub">CIM Top 1%</div>
                </div>
                <div class="bio-credential-card">
                    <div class="bio-credential-label">Business Qualification</div>
                    <div class="bio-credential-value">MBA</div>
                    <div class="bio-credential-sub">Business Administration</div>
                </div>
                <div class="bio-credential-card">
                    <div class="bio-credential-label">Professional Experience</div>
                    <div class="bio-credential-value">22+</div>
                    <div class="bio-credential-sub">Years</div>
                </div>
                <div class="bio-credential-card">
                    <div class="bio-credential-label">Organisations Served</div>
                    <div class="bio-credential-value">100+</div>
                    <div class="bio-credential-sub">Businesses</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bio-content">
        <div class="container">
            <!-- Biography Section -->
            <div class="bio-section">
                <h2 class="bio-section-title">
                    A Career Built on<br>
                    <span class="highlight">Curiosity and Results.</span>
                </h2>

                <div class="bio-text">
                    <p>
                        I am Dr. Orjona Fjerza — a PhD-qualified Chartered Marketer with over 22 years of senior leadership across banking, construction, higher education, technology, accounting and professional services.
                    </p>

                    <p>
                        My career began in banking at Intesa Sanpaolo, where I progressed from Customer Service Consultant to Deputy Branch Director within 18 months. I went on to lead marketing functions at a food delivery startup, a construction firm, a university economics department and a digital agency — before founding Orion Global Consulting in 2024.
                    </p>

                    <p>
                        I hold a PhD in Marketing, an MBA and the MCIM designation from the Chartered Institute of Marketing — placing me in the <strong>top 1% of marketing professionals globally</strong>. I am a published researcher on SSRN, a University Lecturer, Board Advisor, Investor and Keynote Speaker at international forums including UN Women CSW69.
                    </p>

                    <p>
                        I am deeply engaged with artificial intelligence and its implications for business and society. Outside of work you will find me training for marathons, swimming open water, reading economics and geopolitics, travelling to understand the world — and playing chess, drawn to its demands for long-term thinking and the discipline of staying three moves ahead.
                    </p>
                </div>
            </div>

            <!-- Interests Section -->
            <div class="bio-section">
                <h2 class="bio-section-title">Passions & <span class="highlight">Interests</span></h2>
                <div class="bio-interests">
                    <div class="bio-interest-item">
                        <div class="bio-interest-icon">🏃</div>
                        <div class="bio-interest-text">Marathon Running</div>
                    </div>
                    <div class="bio-interest-item">
                        <div class="bio-interest-icon">🌊</div>
                        <div class="bio-interest-text">Open Water Swimming</div>
                    </div>
                    <div class="bio-interest-item">
                        <div class="bio-interest-icon">♟️</div>
                        <div class="bio-interest-text">Chess</div>
                    </div>
                    <div class="bio-interest-item">
                        <div class="bio-interest-icon">✈️</div>
                        <div class="bio-interest-text">Extensive Travel</div>
                    </div>
                    <div class="bio-interest-item">
                        <div class="bio-interest-icon">📚</div>
                        <div class="bio-interest-text">Economics & Geopolitics</div>
                    </div>
                    <div class="bio-interest-item">
                        <div class="bio-interest-icon">🤖</div>
                        <div class="bio-interest-text">Artificial Intelligence</div>
                    </div>
                </div>
            </div>

            <!-- Credentials Section -->
            <div class="bio-section">
                <h2 class="bio-section-title">
                    <span class="highlight">Credentials</span><br>
                    PhD · MBA · MCIM. Top 1% Globally.
                </h2>

                <div class="bio-credentials-list">
                    <div class="bio-credential-large">
                        <div class="bio-cred-icon">🎓</div>
                        <div class="bio-cred-title">PhD in Marketing</div>
                        <div class="bio-cred-desc">Doctoral research on consumer behaviour and digital marketing strategy</div>
                    </div>

                    <div class="bio-credential-large">
                        <div class="bio-cred-icon">🏅</div>
                        <div class="bio-cred-title">MCIM — Chartered Institute of Marketing</div>
                        <div class="bio-cred-desc">Top 1% of marketing professionals globally · Member of CIM Parliamentary Forum</div>
                    </div>

                    <div class="bio-credential-large">
                        <div class="bio-cred-icon">📋</div>
                        <div class="bio-cred-title">MBA — Business Administration</div>
                        <div class="bio-cred-desc">Strategic leadership, finance, operations and international business</div>
                    </div>

                    <div class="bio-credential-large">
                        <div class="bio-cred-icon">📚</div>
                        <div class="bio-cred-title">Published Researcher</div>
                        <div class="bio-cred-desc">SSRN — academic research on marketing, consumer decision-making and AI strategy</div>
                    </div>

                    <div class="bio-credential-large">
                        <div class="bio-cred-icon">🏛️</div>
                        <div class="bio-cred-title">University Lecturer</div>
                        <div class="bio-cred-desc">Marketing, economics and business strategy · Guest lectures internationally</div>
                    </div>

                    <div class="bio-credential-large">
                        <div class="bio-cred-icon">🎤</div>
                        <div class="bio-cred-title">Keynote Speaker</div>
                        <div class="bio-cred-desc">UN Women CSW69 · Festival of Marketing · DMWF · Accountex Manchester · CIM Parliamentary Forum</div>
                    </div>

                    <div class="bio-credential-large">
                        <div class="bio-cred-icon">💼</div>
                        <div class="bio-cred-title">Board Advisor & Investor</div>
                        <div class="bio-cred-desc">Strategic advisory across accounting, technology and professional services sectors</div>
                    </div>
                </div>
            </div>

            <!-- Media Section -->
            <div class="bio-media-section">
                <div class="bio-media-title">Dr. Orjona Fjerza — Media</div>
                <p style="color: #666666; margin: 1rem 0;">Download professional photos and media kit</p>
                <a href="#" class="bio-media-link">Media Kit & Photos</a>
            </div>
        </div>
    </div>
</main><!-- #main -->

<?php
get_footer();
