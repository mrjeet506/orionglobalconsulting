<?php
/**
 * Template Name: About
 *
 * @package Memento
 */

get_header();
?>

<style>
    /* About Page Hero */
    .about-hero {
        padding: 5rem 0;
        background: linear-gradient(135deg, rgba(15, 182, 239, 0.15) 0%, rgba(255, 255, 255, 0) 100%);
        border-bottom: 1px solid rgba(29, 50, 130, 0.1);
    }

    .about-hero-label {
        color: #0FB6EF;
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 1rem;
    }

    .about-hero-title {
        font-size: 3.5rem;
        font-weight: 900;
        font-family: 'Playfair Display', serif;
        color: #1D3282;
        margin-bottom: 1rem;
        line-height: 1.2;
    }

    .about-hero-title .highlight {
        color: #0FB6EF;
    }

    .about-hero-desc {
        font-size: 1.1rem;
        color: #666666;
        max-width: 700px;
        line-height: 1.8;
        margin-bottom: 2rem;
    }

    .about-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
        padding-top: 3rem;
        border-top: 1px solid rgba(29, 50, 130, 0.1);
    }

    .stat-card {
        text-align: center;
    }

    .stat-label {
        font-size: 0.8rem;
        color: #999999;
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 1px;
        margin-bottom: 0.5rem;
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 900;
        color: #0FB6EF;
        font-family: 'Playfair Display', serif;
    }

    /* About Content */
    .about-content {
        padding: 5rem 0;
    }

    .about-section {
        margin-bottom: 5rem;
    }

    .about-section-title {
        font-size: 2.5rem;
        font-weight: 700;
        font-family: 'Playfair Display', serif;
        color: #1D3282;
        margin-bottom: 2rem;
        line-height: 1.2;
    }

    .about-section-title .highlight {
        color: #0FB6EF;
    }

    .about-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
    }

    .about-text {
        font-size: 1.05rem;
        line-height: 1.8;
        color: #666666;
    }

    .about-text p {
        margin-bottom: 1.5rem;
    }

    .about-text strong {
        color: #1D3282;
        font-weight: 700;
    }

    .about-quote {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border-left: 4px solid #0FB6EF;
        padding: 2rem;
        border-radius: 8px;
        margin: 2rem 0;
        font-size: 1.1rem;
        font-style: italic;
        color: #1D3282;
    }

    .about-quote::before {
        content: '"';
        font-size: 3rem;
        color: #0FB6EF;
        opacity: 0.3;
        display: block;
        margin-bottom: -1rem;
    }

    .about-interests {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .interest-item {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border: 1px solid rgba(15, 182, 239, 0.2);
        border-radius: 8px;
        padding: 1.5rem;
        text-align: center;
        transition: all 0.3s ease;
    }

    .interest-item:hover {
        border-color: #0FB6EF;
        box-shadow: 0 10px 30px rgba(15, 182, 239, 0.1);
    }

    .interest-icon {
        font-size: 2rem;
        margin-bottom: 0.75rem;
    }

    .interest-text {
        font-size: 0.9rem;
        color: #1D3282;
        font-weight: 600;
    }

    /* Timeline */
    .timeline {
        position: relative;
        padding: 2rem 0;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        width: 2px;
        height: 100%;
        background: linear-gradient(to bottom, #0FB6EF, #e8f0ff);
    }

    .timeline-item {
        margin-bottom: 3rem;
        position: relative;
    }

    .timeline-item:nth-child(odd) {
        padding-right: calc(50% + 2rem);
        text-align: right;
    }

    .timeline-item:nth-child(even) {
        padding-left: calc(50% + 2rem);
    }

    .timeline-dot {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        width: 24px;
        height: 24px;
        background: #0FB6EF;
        border: 4px solid #ffffff;
        border-radius: 50%;
        box-shadow: 0 0 0 2px #0FB6EF;
        top: 0;
    }

    .timeline-content {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border: 1px solid rgba(29, 50, 130, 0.1);
        border-radius: 8px;
        padding: 2rem;
        transition: all 0.3s ease;
    }

    .timeline-content:hover {
        border-color: #0FB6EF;
        box-shadow: 0 10px 30px rgba(15, 182, 239, 0.1);
    }

    .timeline-year {
        font-size: 0.85rem;
        color: #999999;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 0.5rem;
    }

    .timeline-role {
        font-size: 1.3rem;
        font-weight: 700;
        color: #1D3282;
        font-family: 'Playfair Display', serif;
        margin-bottom: 0.5rem;
    }

    .timeline-company {
        font-size: 0.95rem;
        color: #0FB6EF;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .timeline-description {
        font-size: 0.95rem;
        color: #666666;
        line-height: 1.6;
        margin-bottom: 1rem;
    }

    .timeline-tags {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
        justify-content: flex-end;
    }

    .timeline-item:nth-child(even) .timeline-tags {
        justify-content: flex-start;
    }

    .timeline-tag {
        background: #0FB6EF;
        color: #ffffff;
        padding: 0.4rem 1rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    /* Tabs */
    .tab-buttons {
        display: flex;
        gap: 1rem;
        margin: 2rem 0;
        border-bottom: 2px solid rgba(29, 50, 130, 0.1);
    }

    .tab-button {
        background: transparent;
        color: #666666;
        border: none;
        padding: 1rem 2rem;
        border-bottom: 3px solid transparent;
        font-weight: 700;
        cursor: pointer;
        font-size: 1rem;
        transition: all 0.3s ease;
        font-family: 'Inter', sans-serif;
    }

    .tab-button:hover {
        color: #0FB6EF;
    }

    .tab-button.active {
        color: #0FB6EF;
        border-bottom-color: #0FB6EF;
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    .btn-group {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
        flex-wrap: wrap;
    }

    .btn-about {
        background-color: #0FB6EF;
        color: #ffffff;
        border: 2px solid #0FB6EF;
        padding: 0.75rem 2rem;
        border-radius: 4px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
        cursor: pointer;
        font-size: 0.95rem;
        display: inline-block;
    }

    .btn-about:hover {
        background-color: #0a9fcc;
        border-color: #0a9fcc;
    }

    .btn-about.outline {
        background-color: transparent;
        color: #0FB6EF;
        border: 2px solid #0FB6EF;
    }

    .btn-about.outline:hover {
        background-color: rgba(15, 182, 239, 0.1);
    }

    @media (max-width: 768px) {
        .about-hero-title {
            font-size: 2.5rem;
        }

        .about-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .timeline::before {
            left: 20px;
        }

        .timeline-item:nth-child(odd),
        .timeline-item:nth-child(even) {
            padding-left: 60px;
            padding-right: 0;
            text-align: left;
        }

        .timeline-dot {
            left: 20px;
        }

        .timeline-tags {
            justify-content: flex-start;
        }

        .about-stats {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <div class="about-hero">
        <div class="container">
            <div class="about-hero-label">About</div>
            <h1 class="about-hero-title">
                The Story Behind<br>
                <span class="highlight">22 Years of Impact.</span>
            </h1>
            <p class="about-hero-desc">
                PhD. MBA. MCIM. Banking. Construction. Education. Technology. Accounting. Politics. 22 years across twelve industries, two continents and one consistent mission — to help businesses grow through the power of marketing.
            </p>

            <div class="about-stats">
                <div class="stat-card">
                    <div class="stat-label">Credentials</div>
                    <div class="stat-value">PhD</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Qualification</div>
                    <div class="stat-value">MCIM</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Education</div>
                    <div class="stat-value">MBA</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Experience</div>
                    <div class="stat-value">22+</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Clients</div>
                    <div class="stat-value">100+</div>
                </div>
            </div>

            <div class="tab-buttons">
                <button class="tab-button active" onclick="switchTab('story')">My Story</button>
                <button class="tab-button" onclick="switchTab('bio')">My Bio</button>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="about-content">
        <div class="container">
            <!-- My Story Tab -->
            <div id="story" class="tab-content active">
            <!-- Story Section -->
            <div class="about-section">
                <div class="about-grid">
                    <div>
                        <h2 class="about-section-title">
                            I Turn Business<br>
                            <span class="highlight">Complexity Into Growth.</span>
                        </h2>
                        <p class="about-text">
                            Strategy has been the thread running through every chapter of my career — from banking and academia to political marketing, business growth and entrepreneurship.
                        </p>
                    </div>
                    <div class="about-text">
                        <p>
                            My journey began in Albania, where an early fascination with numbers, language and human behaviour eventually developed into a career spanning financial services, marketing, leadership and strategy.
                        </p>
                        <p>
                            After progressing from banking into senior leadership, I moved into marketing and strategic advisory roles across multiple industries. My academic journey took me further, completing an MBA and doctoral studies in marketing.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Quote Section -->
            <div class="about-quote">
                I believe businesses — like people — grow when they are willing to question who they have been and become what the future requires. That belief sits at the heart of everything I do.
            </div>

            <!-- Interests Section -->
            <div class="about-section">
                <h2 class="about-section-title">Beyond Business</h2>
                <div class="about-interests">
                    <div class="interest-item">
                        <div class="interest-icon">🏃</div>
                        <div class="interest-text">Marathon Running</div>
                    </div>
                    <div class="interest-item">
                        <div class="interest-icon">🌊</div>
                        <div class="interest-text">Open Water Swimming</div>
                    </div>
                    <div class="interest-item">
                        <div class="interest-icon">♟️</div>
                        <div class="interest-text">Chess</div>
                    </div>
                    <div class="interest-item">
                        <div class="interest-icon">✈️</div>
                        <div class="interest-text">Extensive Travel</div>
                    </div>
                    <div class="interest-item">
                        <div class="interest-icon">📚</div>
                        <div class="interest-text">Economics & Geopolitics</div>
                    </div>
                    <div class="interest-item">
                        <div class="interest-icon">🤖</div>
                        <div class="interest-text">Artificial Intelligence</div>
                    </div>
                </div>
            </div>

            <!-- Timeline Section -->
            <div class="about-section">
                <h2 class="about-section-title">
                    22 Years. Eight Roles.<br>
                    <span class="highlight">One Direction.</span>
                </h2>

                <div class="timeline" style="margin-top: 3rem;">
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <div class="timeline-year">2024 — Present</div>
                            <div class="timeline-role">Founder & CEO</div>
                            <div class="timeline-company">Orion Global Consulting OGC Ltd</div>
                            <div class="timeline-description">AI-first Digital Marketing Consultancy. 100+ businesses served.</div>
                            <div class="timeline-tags">
                                <span class="timeline-tag">Founder</span>
                                <span class="timeline-tag">CEO</span>
                                <span class="timeline-tag">AI Marketing</span>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <div class="timeline-year">2018 — 2024 · 6 Years</div>
                            <div class="timeline-role">Multiple Senior Roles</div>
                            <div class="timeline-company">SKS Business Services (now RAA)</div>
                            <div class="timeline-description">Practice Director, Regional Director, Marketing roles. Top accounting firms.</div>
                            <div class="timeline-tags">
                                <span class="timeline-tag">Regional Director</span>
                                <span class="timeline-tag">Marketing</span>
                                <span class="timeline-tag">BD</span>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <div class="timeline-year">2017 — 2018</div>
                            <div class="timeline-role">Marketing & BD Manager</div>
                            <div class="timeline-company">London Fair Contractors Ltd</div>
                            <div class="timeline-description">20% revenue growth, 32% increase in new contracts.</div>
                            <div class="timeline-tags">
                                <span class="timeline-tag">Construction</span>
                                <span class="timeline-tag">+20% Revenue</span>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <div class="timeline-year">2014 — 2017</div>
                            <div class="timeline-role">BD Manager & Head of Economics</div>
                            <div class="timeline-company">Luarasi University</div>
                            <div class="timeline-description">Academic department leadership and business development.</div>
                            <div class="timeline-tags">
                                <span class="timeline-tag">Academia</span>
                                <span class="timeline-tag">Economics</span>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <div class="timeline-year">2015 — 2016</div>
                            <div class="timeline-role">Marketing Director</div>
                            <div class="timeline-company">Engalco · Technology</div>
                            <div class="timeline-description">183% ROI, 136% app downloads growth, 20% market share in 6 months.</div>
                            <div class="timeline-tags">
                                <span class="timeline-tag">SaaS</span>
                                <span class="timeline-tag">183% ROI</span>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <div class="timeline-year">2011 — 2014</div>
                            <div class="timeline-role">Spin Doctor</div>
                            <div class="timeline-company">FRD Party</div>
                            <div class="timeline-description">Social media management and digital communications at highest political level.</div>
                            <div class="timeline-tags">
                                <span class="timeline-tag">Social Media</span>
                                <span class="timeline-tag">Political Marketing</span>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <div class="timeline-year">2010 — 2014</div>
                            <div class="timeline-role">BD & Marketing Management</div>
                            <div class="timeline-company">Global Trading Consortium</div>
                            <div class="timeline-description">Business development, P&L responsibility, client acquisition and retention.</div>
                            <div class="timeline-tags">
                                <span class="timeline-tag">BD</span>
                                <span class="timeline-tag">P&L</span>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <div class="timeline-year">2005 — 2008</div>
                            <div class="timeline-role">Deputy Branch Director</div>
                            <div class="timeline-company">Intesa Sanpaolo</div>
                            <div class="timeline-description">Progressed from Customer Service to Deputy Director in 18 months. 34% client growth.</div>
                            <div class="timeline-tags">
                                <span class="timeline-tag">Banking</span>
                                <span class="timeline-tag">+34% Clients</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div> <!-- End My Story Tab -->

            <!-- My Bio Tab -->
            <div id="bio" class="tab-content">
                <!-- Bio Credentials -->
                <div class="about-section" style="margin-top: 2rem;">
                    <div class="about-grid">
                        <div>
                            <h2 class="about-section-title">
                                A Career Built on<br>
                                <span class="highlight">Curiosity and Results.</span>
                            </h2>
                            <p class="about-text">
                                I am Dr. Orjona Fjerza — a PhD-qualified Chartered Marketer with over 22 years of senior leadership across banking, construction, higher education, technology, accounting and professional services.
                            </p>
                        </div>
                        <div class="about-text">
                            <p>
                                My career began in banking at Intesa Sanpaolo, where I progressed from Customer Service Consultant to Deputy Branch Director within 18 months. I went on to lead marketing functions at multiple organizations — before founding Orion Global Consulting in 2024.
                            </p>
                            <p>
                                I hold a PhD in Marketing, an MBA and the MCIM designation from the Chartered Institute of Marketing — placing me in the <strong>top 1% of marketing professionals globally</strong>.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Credentials Section -->
                <div class="about-section">
                    <h2 class="about-section-title">
                        <span class="highlight">Credentials</span><br>
                        PhD · MBA · MCIM. Top 1% Globally.
                    </h2>

                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-top: 2rem;">
                        <div style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); border: 1px solid rgba(29, 50, 130, 0.1); border-radius: 8px; padding: 2rem; transition: all 0.3s ease;" onmouseover="this.style.borderColor='#0FB6EF'; this.style.boxShadow='0 15px 40px rgba(15, 182, 239, 0.1)';" onmouseout="this.style.borderColor='rgba(29, 50, 130, 0.1)'; this.style.boxShadow='none';">
                            <div style="font-size: 2rem; margin-bottom: 1rem;">🎓</div>
                            <div style="font-size: 1.3rem; font-weight: 700; color: #1D3282; margin-bottom: 0.75rem; font-family: 'Playfair Display', serif;">PhD in Marketing</div>
                            <div style="font-size: 0.95rem; color: #666666; line-height: 1.6;">Doctoral research on consumer behaviour and digital marketing strategy</div>
                        </div>

                        <div style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); border: 1px solid rgba(29, 50, 130, 0.1); border-radius: 8px; padding: 2rem; transition: all 0.3s ease;" onmouseover="this.style.borderColor='#0FB6EF'; this.style.boxShadow='0 15px 40px rgba(15, 182, 239, 0.1)';" onmouseout="this.style.borderColor='rgba(29, 50, 130, 0.1)'; this.style.boxShadow='none';">
                            <div style="font-size: 2rem; margin-bottom: 1rem;">🏅</div>
                            <div style="font-size: 1.3rem; font-weight: 700; color: #1D3282; margin-bottom: 0.75rem; font-family: 'Playfair Display', serif;">MCIM — Chartered Institute of Marketing</div>
                            <div style="font-size: 0.95rem; color: #666666; line-height: 1.6;">Top 1% of marketing professionals globally</div>
                        </div>

                        <div style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); border: 1px solid rgba(29, 50, 130, 0.1); border-radius: 8px; padding: 2rem; transition: all 0.3s ease;" onmouseover="this.style.borderColor='#0FB6EF'; this.style.boxShadow='0 15px 40px rgba(15, 182, 239, 0.1)';" onmouseout="this.style.borderColor='rgba(29, 50, 130, 0.1)'; this.style.boxShadow='none';">
                            <div style="font-size: 2rem; margin-bottom: 1rem;">📋</div>
                            <div style="font-size: 1.3rem; font-weight: 700; color: #1D3282; margin-bottom: 0.75rem; font-family: 'Playfair Display', serif;">MBA — Business Administration</div>
                            <div style="font-size: 0.95rem; color: #666666; line-height: 1.6;">Strategic leadership, finance, operations and international business</div>
                        </div>

                        <div style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); border: 1px solid rgba(29, 50, 130, 0.1); border-radius: 8px; padding: 2rem; transition: all 0.3s ease;" onmouseover="this.style.borderColor='#0FB6EF'; this.style.boxShadow='0 15px 40px rgba(15, 182, 239, 0.1)';" onmouseout="this.style.borderColor='rgba(29, 50, 130, 0.1)'; this.style.boxShadow='none';">
                            <div style="font-size: 2rem; margin-bottom: 1rem;">📚</div>
                            <div style="font-size: 1.3rem; font-weight: 700; color: #1D3282; margin-bottom: 0.75rem; font-family: 'Playfair Display', serif;">Published Researcher</div>
                            <div style="font-size: 0.95rem; color: #666666; line-height: 1.6;">SSRN — academic research on marketing, consumer decision-making and AI</div>
                        </div>

                        <div style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); border: 1px solid rgba(29, 50, 130, 0.1); border-radius: 8px; padding: 2rem; transition: all 0.3s ease;" onmouseover="this.style.borderColor='#0FB6EF'; this.style.boxShadow='0 15px 40px rgba(15, 182, 239, 0.1)';" onmouseout="this.style.borderColor='rgba(29, 50, 130, 0.1)'; this.style.boxShadow='none';">
                            <div style="font-size: 2rem; margin-bottom: 1rem;">🎤</div>
                            <div style="font-size: 1.3rem; font-weight: 700; color: #1D3282; margin-bottom: 0.75rem; font-family: 'Playfair Display', serif;">Keynote Speaker</div>
                            <div style="font-size: 0.95rem; color: #666666; line-height: 1.6;">UN Women CSW69 · Festival of Marketing · CIM Parliamentary Forum</div>
                        </div>

                        <div style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); border: 1px solid rgba(29, 50, 130, 0.1); border-radius: 8px; padding: 2rem; transition: all 0.3s ease;" onmouseover="this.style.borderColor='#0FB6EF'; this.style.boxShadow='0 15px 40px rgba(15, 182, 239, 0.1)';" onmouseout="this.style.borderColor='rgba(29, 50, 130, 0.1)'; this.style.boxShadow='none';">
                            <div style="font-size: 2rem; margin-bottom: 1rem;">💼</div>
                            <div style="font-size: 1.3rem; font-weight: 700; color: #1D3282; margin-bottom: 0.75rem; font-family: 'Playfair Display', serif;">Board Advisor & Investor</div>
                            <div style="font-size: 0.95rem; color: #666666; line-height: 1.6;">Strategic advisory across accounting, technology and professional services</div>
                        </div>
                    </div>
                </div>
            </div> <!-- End My Bio Tab -->
        </div>
    </div>
</main><!-- #main -->

<script>
    function switchTab(tabName) {
        // Hide all tabs
        var tabs = document.querySelectorAll('.tab-content');
        tabs.forEach(function(tab) {
            tab.classList.remove('active');
        });

        // Remove active class from all buttons
        var buttons = document.querySelectorAll('.tab-button');
        buttons.forEach(function(button) {
            button.classList.remove('active');
        });

        // Show selected tab
        document.getElementById(tabName).classList.add('active');

        // Add active class to clicked button
        event.target.classList.add('active');
    }
</script>

<?php
get_footer();
