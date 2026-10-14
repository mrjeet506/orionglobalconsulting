<?php
/**
 * Template Name: Partnerships
 * Description: Brand Partnerships Page
 *
 * @package Memento
 */

get_header();
?>

<style>
    /* Hero Section */
    .partnerships-hero {
        background: linear-gradient(135deg, #1D3282 0%, #0F172A 100%);
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
    }

    .partnerships-hero::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(15, 182, 239, 0.15) 0%, transparent 70%);
        border-radius: 50%;
    }

    .partnerships-hero-content {
        position: relative;
        z-index: 2;
        max-width: 700px;
    }

    .partnerships-hero h1 {
        font-size: 3.5rem;
        font-weight: 900;
        font-family: 'Playfair Display', serif;
        color: #ffffff;
        margin-bottom: 1.5rem;
        line-height: 1.2;
    }

    .partnerships-hero h1 .highlight {
        color: #fbbf24;
    }

    .partnerships-hero-desc {
        font-size: 1.1rem;
        color: #e5e7eb;
        line-height: 1.8;
        margin-bottom: 2rem;
    }

    .partnerships-hero-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .partnerships-hero-btn {
        display: inline-block;
        padding: 1rem 2rem;
        font-weight: 700;
        border-radius: 6px;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 1rem;
    }

    .partnerships-hero-btn.primary {
        background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
        color: #1D3282;
        border: 2px solid #fbbf24;
    }

    .partnerships-hero-btn.primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(251, 191, 36, 0.3);
    }

    .partnerships-hero-btn.secondary {
        background: transparent;
        color: #ffffff;
        border: 2px solid #0FB6EF;
    }

    .partnerships-hero-btn.secondary:hover {
        background: #0FB6EF;
        color: #1D3282;
    }

    /* Stats Section */
    .partnerships-stats {
        padding: 3rem 0;
        background: #f8f9fa;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
    }

    .stat-item {
        text-align: center;
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 900;
        color: #0FB6EF;
        font-family: 'Playfair Display', serif;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        font-size: 1rem;
        color: #666666;
        font-weight: 600;
        line-height: 1.5;
    }

    /* Section Heading */
    .section-heading {
        text-align: center;
        margin-bottom: 4rem;
    }

    .section-heading h2 {
        font-size: 3rem;
        font-weight: 900;
        font-family: 'Playfair Display', serif;
        color: #1D3282;
        margin-bottom: 1rem;
    }

    .section-heading h2 .highlight {
        color: #fbbf24;
    }

    .section-heading p {
        font-size: 1.1rem;
        color: #666666;
        max-width: 600px;
        margin: 0 auto;
    }

    /* Partnership Types Section */
    .partnerships-types {
        padding: 6rem 0;
        background: #ffffff;
    }

    .partnerships-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 2.5rem;
        margin-top: 3rem;
    }

    .partnership-card {
        background: linear-gradient(135deg, #1D3282 0%, #0F172A 100%);
        border-radius: 12px;
        padding: 2.5rem;
        color: #ffffff;
        transition: all 0.4s cubic-bezier(0.23, 1, 0.320, 1);
        position: relative;
        overflow: hidden;
    }

    .partnership-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(15, 182, 239, 0.2) 0%, transparent 70%);
        border-radius: 50%;
        transition: all 0.4s ease;
    }

    .partnership-card:hover {
        transform: translateY(-16px);
        box-shadow: 0 20px 60px rgba(15, 182, 239, 0.2);
    }

    .partnership-card:hover::before {
        top: -30%;
        right: -30%;
    }

    .partnership-icon {
        font-size: 3rem;
        margin-bottom: 1.5rem;
        position: relative;
        z-index: 2;
    }

    .partnership-card h3 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        font-family: 'Playfair Display', serif;
        position: relative;
        z-index: 2;
    }

    .partnership-card p {
        font-size: 0.95rem;
        line-height: 1.7;
        margin-bottom: 1.5rem;
        color: #e5e7eb;
        position: relative;
        z-index: 2;
    }

    .partnership-features {
        list-style: none;
        padding: 0;
        margin: 0;
        position: relative;
        z-index: 2;
    }

    .partnership-features li {
        font-size: 0.9rem;
        margin-bottom: 0.75rem;
        color: #e5e7eb;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .partnership-features li::before {
        content: '→';
        color: #fbbf24;
        font-weight: 700;
    }

    /* Sectors Section */
    .partnerships-sectors {
        padding: 6rem 0;
        background: linear-gradient(135deg, #f8f9fa 0%, #f0f4ff 100%);
    }

    .sectors-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-top: 3rem;
    }

    .sector-item {
        background: #ffffff;
        padding: 1.5rem;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        text-align: center;
        transition: all 0.3s ease;
        font-size: 1.1rem;
    }

    .sector-item:hover {
        border-color: #0FB6EF;
        box-shadow: 0 8px 20px rgba(15, 182, 239, 0.1);
        transform: translateY(-4px);
    }

    .sector-icon {
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }

    .sector-name {
        color: #1D3282;
        font-weight: 600;
    }

    /* How It Works Section */
    .partnerships-process {
        padding: 6rem 0;
        background: #ffffff;
    }

    .process-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }

    .process-step {
        text-align: center;
    }

    .step-number {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #0FB6EF 0%, #0a9fcc 100%);
        color: #ffffff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        font-weight: 900;
        margin: 0 auto 1.5rem auto;
    }

    .process-step h3 {
        font-size: 1.3rem;
        font-weight: 700;
        color: #1D3282;
        margin-bottom: 1rem;
        font-family: 'Playfair Display', serif;
    }

    .process-step p {
        color: #666666;
        line-height: 1.6;
    }

    /* CTA Section */
    .partnerships-cta {
        background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
        padding: 5rem 0;
        text-align: center;
    }

    .partnerships-cta h2 {
        font-size: 2.5rem;
        font-weight: 900;
        font-family: 'Playfair Display', serif;
        color: #1D3282;
        margin-bottom: 1.5rem;
        line-height: 1.3;
    }

    .partnerships-cta p {
        font-size: 1.1rem;
        color: #1D3282;
        max-width: 700px;
        margin: 0 auto 2rem auto;
        line-height: 1.8;
    }

    .partnerships-cta-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .partnerships-cta-btn {
        display: inline-block;
        padding: 1rem 2.5rem;
        font-weight: 700;
        border-radius: 6px;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 1rem;
    }

    .partnerships-cta-btn.primary {
        background: #1D3282;
        color: #ffffff;
        border: 2px solid #1D3282;
    }

    .partnerships-cta-btn.primary:hover {
        background: transparent;
        color: #1D3282;
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .partnerships-cta-btn.secondary {
        background: transparent;
        color: #1D3282;
        border: 2px solid #1D3282;
    }

    .partnerships-cta-btn.secondary:hover {
        background: #1D3282;
        color: #ffffff;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .partnerships-hero h1 {
            font-size: 2.5rem;
        }

        .section-heading h2 {
            font-size: 2.2rem;
        }

        .partnerships-grid {
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .partnerships-hero {
            padding: 3rem 0;
        }

        .partnerships-hero h1 {
            font-size: 2rem;
        }

        .partnerships-hero-buttons {
            flex-direction: column;
        }

        .partnerships-hero-btn {
            width: 100%;
            text-align: center;
        }

        .section-heading h2 {
            font-size: 1.8rem;
        }

        .partnerships-grid {
            grid-template-columns: 1fr;
        }

        .process-grid {
            grid-template-columns: 1fr;
        }

        .partnerships-cta h2 {
            font-size: 1.8rem;
        }

        .partnerships-cta-buttons {
            flex-direction: column;
        }

        .partnerships-cta-btn {
            width: 100%;
        }
    }
</style>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <div class="partnerships-hero">
        <div class="container">
            <div class="partnerships-hero-content">
                <h1>We Collaborate With<br><span class="highlight">Brands & Businesses</span><br>in Commercial Ventures.</h1>
                <p class="partnerships-hero-desc">Dr. Orjona Fjerza and Orion Global Consulting partner with brands, platforms, publishers and businesses to create meaningful commercial ventures — built on expertise, trust and mutual growth.</p>
                <div class="partnerships-hero-buttons">
                    <a href="mailto:contact@orionglobalconsulting.co.uk" class="partnerships-hero-btn primary">Start a Partnership Conversation →</a>
                    <a href="mailto:contact@orionglobalconsulting.co.uk" class="partnerships-hero-btn secondary">Email Us Directly</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="partnerships-stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">22+</div>
                    <div class="stat-label">Years of Senior Marketing Leadership</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">70+</div>
                    <div class="stat-label">Businesses Grown Through Orion</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">136+</div>
                    <div class="stat-label">UK Accounting Firm Relationships</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">£1.82m</div>
                    <div class="stat-label">Tracked Pipeline Generated</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Partnership Types Section -->
    <div class="partnerships-types">
        <div class="container">
            <div class="section-heading">
                <h2>Six Ways We Can<br><span class="highlight">Work Together.</span></h2>
                <p>Every partnership is built around a shared goal. Here is how we typically collaborate.</p>
            </div>

            <div class="partnerships-grid">
                <!-- Commercial Co-Ventures -->
                <div class="partnership-card">
                    <div class="partnership-icon">🤝</div>
                    <h3>Commercial Co-Ventures</h3>
                    <p>We partner with businesses to co-create commercial opportunities — joint ventures, revenue-sharing arrangements and strategic alliances that grow both sides.</p>
                    <ul class="partnership-features">
                        <li>Joint product launches</li>
                        <li>Revenue-share programmes</li>
                        <li>Strategic alliances</li>
                        <li>Co-branded campaigns</li>
                    </ul>
                </div>

                <!-- Brand Sponsorship -->
                <div class="partnership-card">
                    <div class="partnership-icon">📣</div>
                    <h3>Brand Sponsorship</h3>
                    <p>Align your brand with a PhD-qualified marketing authority reaching accounting firms, professional services and UK business leaders.</p>
                    <ul class="partnership-features">
                        <li>Event & keynote sponsorship</li>
                        <li>Newsletter sponsorship</li>
                        <li>Podcast & content partnerships</li>
                        <li>Award & recognition programmes</li>
                    </ul>
                </div>

                <!-- Educational Partnerships -->
                <div class="partnership-card">
                    <div class="partnership-icon">🎓</div>
                    <h3>Educational Partnerships</h3>
                    <p>Partner with us to deliver training, workshops and accredited content to your clients, members or employees — under your brand or co-branded.</p>
                    <ul class="partnership-features">
                        <li>White-label training programmes</li>
                        <li>Member education content</li>
                        <li>Corporate workshops</li>
                        <li>University & institution partnerships</li>
                    </ul>
                </div>

                <!-- Product & Platform Collaboration -->
                <div class="partnership-card">
                    <div class="partnership-icon">💡</div>
                    <h3>Product & Platform Collaboration</h3>
                    <p>We work with technology platforms, SaaS providers and marketing tools to develop integrations and go-to-market strategies.</p>
                    <ul class="partnership-features">
                        <li>SaaS go-to-market strategy</li>
                        <li>Case study development</li>
                        <li>Platform integration</li>
                        <li>Sector-specific product launches</li>
                    </ul>
                </div>

                <!-- Media & Content Partnerships -->
                <div class="partnership-card">
                    <div class="partnership-icon">📰</div>
                    <h3>Media & Content Partnerships</h3>
                    <p>We collaborate with publishers, podcast networks and media brands to produce authoritative content on AI marketing and business strategy.</p>
                    <ul class="partnership-features">
                        <li>Guest editorial & columns</li>
                        <li>Podcast guest & co-host</li>
                        <li>Webinar & panel appearances</li>
                        <li>Research co-publication</li>
                    </ul>
                </div>

                <!-- International & Referral Partners -->
                <div class="partnership-card">
                    <div class="partnership-icon">🌍</div>
                    <h3>International & Referral Partners</h3>
                    <p>We work with agencies, consultants and business advisors globally who refer clients to Orion Global Consulting.</p>
                    <ul class="partnership-features">
                        <li>Referral partner programme</li>
                        <li>Agency white-label services</li>
                        <li>International market entry</li>
                        <li>Consultant collaboration</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Sectors Section -->
    <div class="partnerships-sectors">
        <div class="container">
            <div class="section-heading">
                <h2>Deep Expertise Across<br><span class="highlight">Every Major Sector.</span></h2>
                <p>We bring 22 years of real-world experience to every partnership — not theory.</p>
            </div>

            <div class="sectors-grid">
                <div class="sector-item">
                    <div class="sector-icon">🏦</div>
                    <div class="sector-name">Banking & Financial Services</div>
                </div>
                <div class="sector-item">
                    <div class="sector-icon">📊</div>
                    <div class="sector-name">Accounting Groups</div>
                </div>
                <div class="sector-item">
                    <div class="sector-icon">🏗️</div>
                    <div class="sector-name">Construction Firms</div>
                </div>
                <div class="sector-item">
                    <div class="sector-icon">🍷</div>
                    <div class="sector-name">Hospitality Brands</div>
                </div>
                <div class="sector-item">
                    <div class="sector-icon">🎓</div>
                    <div class="sector-name">Higher Education</div>
                </div>
                <div class="sector-item">
                    <div class="sector-icon">💻</div>
                    <div class="sector-name">Technology & SaaS</div>
                </div>
                <div class="sector-item">
                    <div class="sector-icon">🎵</div>
                    <div class="sector-name">Entertainment & Music</div>
                </div>
                <div class="sector-item">
                    <div class="sector-icon">🌍</div>
                    <div class="sector-name">International NGOs</div>
                </div>
            </div>
        </div>
    </div>

    <!-- How It Works Section -->
    <div class="partnerships-process">
        <div class="container">
            <div class="section-heading">
                <h2><span class="highlight">Simple. Transparent.</span><br>Mutually Beneficial.</h2>
            </div>

            <div class="process-grid">
                <div class="process-step">
                    <div class="step-number">01</div>
                    <h3>Get in Touch</h3>
                    <p>Send us a brief message about your brand, your goals and what kind of partnership you have in mind.</p>
                </div>
                <div class="process-step">
                    <div class="step-number">02</div>
                    <h3>Discovery Call</h3>
                    <p>We schedule a 30-minute call to explore the opportunity, alignment and mutual value on both sides.</p>
                </div>
                <div class="process-step">
                    <div class="step-number">03</div>
                    <h3>Proposal</h3>
                    <p>We put together a clear, straightforward partnership proposal with terms, deliverables and timeline.</p>
                </div>
                <div class="process-step">
                    <div class="step-number">04</div>
                    <h3>Launch</h3>
                    <p>We activate the partnership and work together to deliver results — tracked, measured and reported.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="partnerships-cta">
        <div class="container">
            <h2>Ready to Build Something<br>Valuable Together?</h2>
            <p>Whether you are a brand looking to reach accounting and professional services firms, a platform seeking a thought leader, or a business with a commercial idea — we would love to hear from you.</p>
            <div class="partnerships-cta-buttons">
                <a href="mailto:contact@orionglobalconsulting.co.uk" class="partnerships-cta-btn primary">Start the Conversation →</a>
                <a href="mailto:contact@orionglobalconsulting.co.uk" class="partnerships-cta-btn secondary">contact@orionglobalconsulting.co.uk</a>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
