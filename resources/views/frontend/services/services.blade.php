
<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.header')
</head>
<body>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background: #f9fafb;
            color: #111827;
            line-height: 1.5;
            scroll-behavior: smooth;
        }

        /* Main legal card container - matches cookie policy aesthetics */
        .legal-container {
            max-width: 1100px;
            margin: 2rem auto;
            background: #ffffff;
            border-radius: 32px;
            box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.05), 0 1px 2px rgba(0, 0, 0, 0.02);
            border: 1px solid #eef2ff;
            transition: all 0.2s ease;
            overflow: hidden;
        }

        /* inner content padding */
        .legal-inner {
            padding: 2rem 2.5rem 2.8rem;
        }

        /* header area with gradient accent */
        .terms-header {
            margin-bottom: 2rem;
            padding-bottom: 1.2rem;
            border-bottom: 2px solid #eef2ff;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-end;
            gap: 1rem;
        }

        .title-badge h1 {
            font-size: 2.2rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            background: linear-gradient(135deg, #FF7700 0%, #e66500 100%);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            margin-bottom: 0.25rem;
        }

        .title-badge p {
            color: #4b5563;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .last-updated-badge {
            background: #fef3e8;
            padding: 0.5rem 1.2rem;
            border-radius: 60px;
            font-size: 0.8rem;
            font-weight: 600;
            color: #c2410c;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .last-updated-badge i {
            font-size: 0.8rem;
            color: #FF7700;
        }

        /* main heading style */
        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 2rem 0 1rem 0;
            color: #0f172a;
            display: flex;
            align-items: center;
            gap: 12px;
            border-left: 4px solid #FF7700;
            padding-left: 1rem;
        }

        .section-title i {
            color: #FF7700;
            font-size: 1.4rem;
        }

        .legal-text {
            color: #2d3a4b;
            margin-bottom: 1.2rem;
            line-height: 1.65;
            font-size: 1rem;
        }

        /* cards for permitted/prohibited */
        .rule-card {
            border-radius: 20px;
            padding: 1.5rem;
            margin: 1.5rem 0;
            background: #fefaf5;
            border: 1px solid #ffe4ce;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .rule-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 20px -12px rgba(0, 0, 0, 0.1);
        }

        .rule-card.allowed {
            border-left: 6px solid #10b981;
            background: #f0fdf4;
        }

        .rule-card.prohibited {
            border-left: 6px solid #ef4444;
            background: #fef2f2;
        }

        .rule-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .rule-card.allowed .rule-title i {
            color: #10b981;
        }

        .rule-card.prohibited .rule-title i {
            color: #ef4444;
        }

        .rule-card ul {
            margin-left: 1.8rem;
            list-style: none;
        }

        .rule-card li {
            margin-bottom: 0.6rem;
            position: relative;
            padding-left: 1.2rem;
            font-weight: 450;
        }

        .rule-card li:before {
            content: "▹";
            position: absolute;
            left: 0;
            color: #FF7700;
        }

        .rule-card.allowed li:before {
            color: #10b981;
        }

        .rule-card.prohibited li:before {
            color: #ef4444;
        }

        /* contact highlight box */
        .contact-highlight {
            background: linear-gradient(115deg, #fff7ed 0%, #fff2e6 100%);
            border-radius: 24px;
            padding: 1.6rem 2rem;
            margin: 2rem 0 1.5rem;
            border: 1px solid #ffdec2;
            text-align: center;
        }

        .contact-highlight h3 {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            color: #c2410c;
        }

        .contact-highlight a {
            color: #FF7700;
            font-weight: 700;
            text-decoration: none;
            border-bottom: 1px dashed #fdba74;
        }

        .contact-highlight a:hover {
            color: #e66500;
            border-bottom-style: solid;
        }

        /* back button */
        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #FF7700;
            color: white;
            font-weight: 600;
            padding: 12px 28px;
            border-radius: 40px;
            margin-top: 1.2rem;
            transition: all 0.2s;
            box-shadow: 0 4px 8px rgba(255, 119, 0, 0.2);
            border: none;
            cursor: pointer;
        }

        .btn-back:hover {
            background: #e66500;
            transform: translateY(-2px);
            box-shadow: 0 10px 18px -6px rgba(255, 119, 0, 0.4);
            text-decoration: none;
            color: white;
        }

        /* footer styling (independent) */
        .legal-footer {
            max-width: 1100px;
            margin: 0 auto 2rem auto;
            text-align: center;
            padding: 1.5rem 2rem;
            font-size: 0.85rem;
            color: #6c757d;
            border-top: 1px solid #eef2f0;
        }

        .legal-footer a {
            color: #FF7700;
            font-weight: 500;
            text-decoration: none;
        }

        /* scroll top button */
        .scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: #FF7700;
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(255, 119, 0, 0.3);
            transition: all 0.2s;
            z-index: 99;
            opacity: 0;
            visibility: hidden;
            border: none;
        }

        .scroll-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .scroll-top:hover {
            background: #e66500;
            transform: translateY(-4px);
        }

        /* Responsive */
        @media (max-width: 780px) {
            .legal-inner {
                padding: 1.5rem;
            }
            .section-title {
                font-size: 1.3rem;
            }
            .title-badge h1 {
                font-size: 1.8rem;
            }
            .terms-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 550px) {
            .legal-inner {
                padding: 1.2rem;
            }
            .rule-card {
                padding: 1.2rem;
            }
        }

        /* Print friendly */
        @media print {
            .scroll-top, .btn-back, .legal-footer {
                display: none;
            }
            .legal-container {
                box-shadow: none;
                margin: 0;
                border: none;
            }
        }
        
        /* header area with brand accent */
        .policy-header {
            margin-bottom: 2.25rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }
        .brand-badge {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .brand-icon {
            background: #2563eb;
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 18px;
            color: white;
            font-size: 1.6rem;
            box-shadow: 0 6px 12px -6px rgba(37, 99, 235, 0.25);
        }
           .brand-text h2 {
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: -0.3px;
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }

        .brand-text p {
            font-size: 0.85rem;
            color: #475569;
        }
    </style>

<div class="legal-container">
    <div class="legal-inner">
        <!-- Header section with last updated -->
           <div class="policy-header">
            <div class="brand-badge">
                <div class="brand-icon">
                    <i class="fas fa-cookie-bite"></i>
                </div>
                <div class="brand-text">
                    <h2>TechBlogs</h2>
                    <p>Insights • Innovation • Integrity</p>
                </div>
            </div>
         
        </div>

        <div class="terms-header">
            <div class="title-badge">
                <h2>Terms & Conditions</h1>
                <p><i class="fas fa-gavel"></i> Legally binding agreement between TechBlogs and users</p>
            </div>
            <div class="last-updated-badge">
                <i class="far fa-calendar-alt"></i> Last Updated: April 03, 2026
                <span style="margin:0 6px">•</span>
                <i class="fas fa-file-contract"></i> Version 2.4
            </div>
        </div>

        <!-- intro statement -->
        <p class="legal-text" style="font-size:1.05rem; font-weight:450; margin-bottom:1.8rem;">
            Welcome to <strong>TechBlogs</strong> (accessible at TechBlogs.site). By accessing or using our website, you agree to comply with and be bound by the following Terms and Conditions. 
            If you do not agree with any part of these terms, you must not use our services. These terms are designed to ensure a safe, transparent, and respectful environment for all users and fully align with Google Adsense policies.
        </p>

        <!-- Section 1: Acceptance -->
        <div class="section-title">
            <i class="fas fa-check-circle"></i> 1. Acceptance of Terms
        </div>
        <p class="legal-text">Your use of TechBlogs constitutes your unconditional acceptance of these Terms & Conditions, our <a href="{{ route('frontend.praivacy-policy') }}" style="color:#FF7700;">Privacy Policy</a>, and any additional guidelines or rules applicable to specific services. We reserve the right to update these terms periodically, and your continued use implies acceptance of modifications.</p>

        <!-- Section 2: Use of Content + Cards (professional) -->
        <div class="section-title">
            <i class="fas fa-file-alt"></i> 2. Content Usage & Intellectual Property
        </div>
        <p class="legal-text">All materials published on TechBlogs — including articles, tutorials, code snippets, graphics, logos, and digital assets — are protected by copyright and intellectual property laws. They are provided for informational and educational purposes only.</p>

        <div class="rule-card allowed">
            <div class="rule-title"><i class="fas fa-check-circle"></i> Permitted Uses:</div>
            <ul>
                <li>Reading, viewing, and sharing content for personal, non-commercial use with proper attribution (backlink to TechBlogs).</li>
                <li>Using code snippets in your personal or commercial projects (no redistribution of entire tutorials).</li>
                <li>Printing single articles for offline reference and educational purposes.</li>
                <li>Linking to our content using a standard hyperlink, provided it does not imply endorsement.</li>
            </ul>
        </div>

        <div class="rule-card prohibited">
            <div class="rule-title"><i class="fas fa-times-circle"></i> Prohibited Uses:</div>
            <ul>
                <li>Republication, redistribution, or sale of any content without explicit written permission from TechBlogs.</li>
                <li>Using automated tools (scrapers, bots) to extract content, data, or user information.</li>
                <li>Claiming ownership of our content, removing copyright notices, or using materials for deceptive practices.</li>
                <li>Commercial exploitation of articles or tutorials without a proper license agreement.</li>
            </ul>
        </div>

        <!-- Section 3: Accuracy of Information -->
        <div class="section-title">
            <i class="fas fa-info-circle"></i> 3. Accuracy & Reliability
        </div>
        <p class="legal-text">TechBlogs strives to deliver accurate, up-to-date tech insights, tutorials, and news. However, technology evolves rapidly, and we do not guarantee that all information is error-free, complete, or current. You agree that any reliance on our content is at your own risk. We recommend verifying critical information from official sources.</p>

        <!-- Section 4: Third-Party Links -->
        <div class="section-title">
            <i class="fas fa-external-link-alt"></i> 4. Third-Party Links & Advertisements
        </div>
        <p class="legal-text">Our website may contain links to external websites, affiliate links, or advertisements served by Google AdSense or other networks. TechBlogs does not control, endorse, or assume responsibility for the content, privacy policies, or data practices of third-party websites. Interactions with advertisers are solely between you and the third party.</p>

        <!-- Section 5: User Conduct -->
        <div class="section-title">
            <i class="fas fa-user-shield"></i> 5. User Conduct & Responsibilities
        </div>
        <p class="legal-text">You agree to use TechBlogs in a lawful manner and refrain from any activity that could harm the platform, its users, or its reputation. Prohibited activities include:</p>
        <ul style="margin-left: 2rem; margin-bottom: 1rem; color:#2d3a4b;">
            <li>Posting malicious code, viruses, or attempting to breach security measures.</li>
            <li>Harassing, threatening, or abusing other users or our team.</li>
            <li>Impersonating any person or entity or providing false information.</li>
            <li>Engaging in unauthorized data mining or scraping.</li>
        </ul>

        <!-- Section 6: Limitation of Liability (important for Adsense) -->
        <div class="section-title">
            <i class="fas fa-balance-scale"></i> 6. Limitation of Liability
        </div>
        <p class="legal-text">To the maximum extent permitted by law, TechBlogs, its owners, writers, and affiliates shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising from your use of our website or reliance on any content. This includes loss of data, revenue, or business interruption, even if advised of the possibility. Some jurisdictions may not allow certain liability exclusions; thus, this clause applies to the fullest extent permissible.</p>

        <!-- Section 7: Intellectual Property & DMCA -->
        <div class="section-title">
            <i class="fas fa-copyright"></i> 7. Intellectual Property & DMCA
        </div>
        <p class="legal-text">All trademarks, logos, and service marks displayed on TechBlogs are registered or unregistered marks of their respective owners. If you believe any content on our site infringes your copyright, please contact us with a detailed DMCA notice. We respond promptly to valid takedown requests.</p>

        <!-- Section 8: Privacy & Data Collection -->
        <div class="section-title">
            <i class="fas fa-shield-alt"></i> 8. Privacy & Data Usage
        </div>
        <p class="legal-text">Your privacy is a top priority. Please review our detailed <a href="#" style="color:#FF7700;">Privacy Policy</a> and <a href="#" style="color:#FF7700;">Cookie Policy</a> to understand how we collect, use, and protect your personal data. By using TechBlogs, you consent to data practices described therein, including the use of cookies for analytics and personalized advertising (where permitted).</p>

        <!-- Section 9: Modifications & Termination -->
        <div class="section-title">
            <i class="fas fa-sync-alt"></i> 9. Modifications & Termination
        </div>
        <p class="legal-text">TechBlogs reserves the right to change, suspend, or discontinue any part of the website at any time without notice. We may also modify these Terms & Conditions; the revised version will be indicated by an updated “Last Updated” date. We encourage you to review this page periodically. Your continued use after changes constitutes acceptance. Additionally, we may terminate or restrict access for users who violate these terms.</p>

        <!-- Section 10: Governing Law -->
        <div class="section-title">
            <i class="fas fa-gavel"></i> 10. Governing Law & Dispute Resolution
        </div>
        <p class="legal-text">These Terms shall be governed by and interpreted in accordance with the laws of the State of Delaware, without regard to conflict of law principles. Any legal action or proceeding arising under these Terms shall be brought exclusively in the federal or state courts located in Delaware, and you consent to personal jurisdiction therein.</p>

        <!-- Contact info box with professional style -->
        <div class="contact-highlight">
            <h3><i class="fas fa-envelope-open-text"></i> Have questions or legal concerns?</h3>
            <p>Our team is committed to transparency. For any inquiries regarding these Terms & Conditions, copyright issues, or partnership proposals, please reach out via:</p>
            <p style="margin-top: 12px;"><strong><i class="fas fa-envelope"></i> Email:</strong> <a href="mailto:legal@techblogs.site">legal@techblogs.site</a> &nbsp;|&nbsp; <strong><i class="fas fa-phone-alt"></i> Support:</strong> <a href="mailto:support@techblogs.site">support@techblogs.site</a></p>
            <p style="font-size:0.9rem; margin-top: 12px;">We aim to respond within 2–3 business days for all legal requests.</p>
        </div>

        <!-- Back to homepage button (matches cookie policy style) -->
        <a href="{{ route('frontend.blogs') }}" class="btn-back" id="backToHomeBtn">
            <i class="fas fa-arrow-left"></i> Back to TechBlogs Home
        </a>
    </div>
</div>

<!-- Footer similar to main site consistency -->
<div class="legal-footer">
    <p>© <span id="yearFooter"></span> TechBlogs — All rights reserved. | <a href="#">Privacy Policy</a> | <a href="#">Cookie Policy</a> | <a href="#">Accessibility</a></p>
    <p style="margin-top: 8px; font-size: 0.75rem;">By using TechBlogs, you acknowledge that you have read and agree to our Terms & Conditions, which fully comply with Google Adsense program policies and global privacy standards.</p>
</div>


<script>
    (function() {
        // Set dynamic year in footer
        const yearSpan = document.getElementById('yearFooter');
        if (yearSpan) {
            yearSpan.textContent = new Date().getFullYear();
        }

        // Scroll to top button visibility & functionality
        const scrollBtn = document.getElementById('scrollTopBtn');
        
        function toggleScrollBtn() {
            if (window.scrollY > 400) {
                scrollBtn.classList.add('visible');
            } else {
                scrollBtn.classList.remove('visible');
            }
        }
        
        window.addEventListener('scroll', toggleScrollBtn);
        toggleScrollBtn();
        
        scrollBtn.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Back button: if index.html not exist, replace with fallback to current origin (user friendly)
        const backBtn = document.getElementById('backToHomeBtn');
        if (backBtn) {
            backBtn.addEventListener('click', function(e) {
                // prevent default only if needed; we keep href, but smooth alternative
                // already link leads to index.html, if site uses routing we keep safe.
                // but ensure that relative path doesn't break; fallback prevent if needed.
                // No action needed; anchor works fine.
            });
        }
        
        // Add smooth behavior for any internal anchor links if present
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if (targetId && targetId !== '#') {
                    const targetElem = document.querySelector(targetId);
                    if (targetElem) {
                        e.preventDefault();
                        targetElem.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }
            });
        });
        
        // Optional console log for Adsense compliance (non-intrusive)
        if (window.console) {
            console.log("TechBlogs Terms & Conditions page: Fully compliant with Google Adsense policies. Includes clear liability disclaimers, content usage rules, and contact transparency.");
        }
        
        // highlight for current section (simple effect for ux)
        const sections = document.querySelectorAll('.section-title');
        function highlightCurrentSection() {
            let scrollPos = window.scrollY + 150;
            sections.forEach(section => {
                const offsetTop = section.offsetTop;
                const offsetBottom = offsetTop + section.clientHeight;
                if (scrollPos >= offsetTop && scrollPos < offsetBottom) {
                    section.style.opacity = '1';
                    section.style.transition = '0.2s';
                } else {
                    section.style.opacity = '';
                }
            });
        }
        window.addEventListener('scroll', highlightCurrentSection);
        highlightCurrentSection();
    })();
</script>

@include('frontend.footer')

</body>
</html>

