@include('frontend.header')

   
    <style>
        /* Root theme color with dark mode support */
        :root {
            --theme-color: #FF7700;
            --theme-dark: #e66500;
            --bg-color: #ffffff;
            --bg-secondary: #f9f9f9;
            --text-color: #333333;
            --text-light: #666666;
            --heading-color: #222222;
            --border-color: #eeeeee;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            --shadow-hover: 0 15px 40px rgba(0, 0, 0, 0.12);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        /* Dark mode variables */
        @media (prefers-color-scheme: dark) {
            :root {
                --bg-color: #1a1a1a;
                --bg-secondary: #2d2d2d;
                --text-color: #f0f0f0;
                --text-light: #aaaaaa;
                --heading-color: #ffffff;
                --border-color: #404040;
                --shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
                --shadow-hover: 0 15px 40px rgba(0, 0, 0, 0.35);
            }
        }

        /* Reset & Base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-secondary);
            color: var(--text-color);
            line-height: 1.7;
            transition: var(--transition);
        }

        a {
            color: var(--theme-color);
            text-decoration: none;
            transition: var(--transition);
            position: relative;
        }

        a:hover {
            color: var(--theme-dark);
        }

        a:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: var(--theme-color);
            transition: width 0.3s ease;
        }

        a:hover:after {
            width: 100%;
        }

        /* Container */
        .container {
            max-width: 1000px;
            margin: 60px auto;
            background-color: var(--bg-color);
            padding: 50px 40px;
            border-radius: 16px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .container:hover {
            box-shadow: var(--shadow-hover);
        }

        .container:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 6px;
            height: 100%;
            background: linear-gradient(to bottom, var(--theme-color), var(--theme-dark));
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border-color);
            position: relative;
        }

        .header:after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background-color: var(--theme-color);
        }

        h1 {
            color: var(--theme-color);
            font-size: 2.8rem;
            margin-bottom: 10px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .subtitle {
            color: var(--text-light);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Content */
        .content-section {
            margin-bottom: 40px;
        }

        h2 {
            color: var(--heading-color);
            margin-top: 40px;
            margin-bottom: 20px;
            font-size: 1.6rem;
            font-weight: 600;
            padding-left: 20px;
            position: relative;
            display: flex;
            align-items: center;
        }

        h2:before {
            content: '';
            position: absolute;
            left: 0;
            width: 4px;
            height: 24px;
            background-color: var(--theme-color);
            border-radius: 2px;
        }

        h2 i {
            margin-right: 12px;
            color: var(--theme-color);
            font-size: 1.3rem;
        }

        p {
            margin-bottom: 20px;
            font-size: 1.05rem;
            color: var(--text-color);
            padding-left: 20px;
        }

        /* Lists */
        ul {
            margin-left: 40px;
            margin-bottom: 25px;
            padding-left: 20px;
        }

        li {
            margin-bottom: 12px;
            position: relative;
            color: var(--text-color);
            padding-left: 10px;
        }

        li:before {
            content: '•';
            color: var(--theme-color);
            font-weight: bold;
            position: absolute;
            left: -15px;
            font-size: 1.2rem;
        }

        /* Cards for do/don't sections */
        .card {
            background-color: var(--bg-secondary);
            border-radius: 10px;
            padding: 25px;
            margin: 25px 0;
            border-left: 4px solid;
            transition: var(--transition);
        }

        .card:hover {
            transform: translateY(-3px);
        }

        .card-permitted {
            border-left-color: #4CAF50;
        }

        .card-prohibited {
            border-left-color: #F44336;
        }

        .card-title {
            font-weight: 600;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            font-size: 1.1rem;
        }

        .card-title i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .card-permitted .card-title i {
            color: #4CAF50;
        }

        .card-prohibited .card-title i {
            color: #F44336;
        }

        /* Contact info */
        .contact-info {
            background: linear-gradient(135deg, var(--theme-color), var(--theme-dark));
            color: white;
            padding: 25px;
            border-radius: 12px;
            margin-top: 40px;
            text-align: center;
        }

        .contact-info a {
            color: white;
            font-weight: 600;
            text-decoration: underline;
        }

        .contact-info a:hover {
            color: #f0f0f0;
        }

        /* Back to site button */
        .back-button {
            display: inline-flex;
            align-items: center;
            background-color: var(--theme-color);
            color: white;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 600;
            margin-top: 30px;
            transition: var(--transition);
        }

        .back-button:hover {
            background-color: var(--theme-dark);
            transform: translateY(-3px);
            text-decoration: none;
            color: white;
        }

        .back-button i {
            margin-right: 10px;
        }

        /* Scroll to top button */
        #scrollTopBtn {
            display: none;
            position: fixed;
            bottom: 40px;
            right: 40px;
            z-index: 100;
            background-color: var(--theme-color);
            color: #fff;
            border: none;
            outline: none;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 24px;
            box-shadow: 0 6px 20px rgba(255, 119, 0, 0.3);
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #scrollTopBtn:hover {
            background-color: var(--theme-dark);
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(255, 119, 0, 0.4);
        }

        /* Footer */
        .footer {
            text-align: center;
            margin-top: 50px;
            padding-top: 30px;
            border-top: 1px solid var(--border-color);
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* Last updated */
        .last-updated {
            font-style: italic;
            color: var(--text-light);
            text-align: right;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 30px 25px;
                margin: 30px 20px;
            }

            h1 {
                font-size: 2.2rem;
            }

            h2 {
                font-size: 1.4rem;
            }

            #scrollTopBtn {
                bottom: 25px;
                right: 25px;
                width: 50px;
                height: 50px;
            }

            .card {
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 25px 20px;
                margin: 20px 15px;
            }

            h1 {
                font-size: 1.9rem;
            }

            h2 {
                font-size: 1.3rem;
                padding-left: 15px;
            }

            p, ul {
                padding-left: 15px;
            }

            ul {
                margin-left: 20px;
            }
        }

        /* Print styles */
        @media print {
            #scrollTopBtn, .back-button {
                display: none !important;
            }
            
            .container {
                box-shadow: none;
                margin: 0;
                padding: 20px;
            }
            
            a {
                color: #000;
                text-decoration: underline;
            }
        }
    </style>

    <div class="container">
        <div class="header">
            <h1>Terms & Conditions</h1>
            <p class="subtitle">Please read these Terms carefully before using TechBlogs.site. Your continued use of the site constitutes acceptance of these Terms.</p>
        </div>

        <div class="last-updated">Last Updated: <span id="currentDate"></span></div>

        <div class="content-section">
            <h2><i class="fas fa-check-circle"></i> 1. Acceptance of Terms</h2>
            <p>By accessing and using <strong>TechBlogs.site</strong>, you acknowledge that you have read, understood, and agree to be bound by these Terms and Conditions, along with our <a href="{{route('frontend.terms-conditions')}}">Privacy Policy</a>. If you disagree with any part of these terms, please refrain from using our website.</p>

            <h2><i class="fas fa-file-alt"></i> 2. Use of Content</h2>
            <p>All content published on <strong>TechBlogs.site</strong>, including articles, tutorials, code snippets, images, and graphics, is intended for informational and educational purposes.</p>

            <div class="card card-permitted">
                <div class="card-title"><i class="fas fa-check"></i> You May:</div>
                <ul>
                    <li>Read, view, and share content for personal, non-commercial use</li>
                    <li>Reference or link to our articles with proper attribution</li>
                    <li>Use code snippets in your personal or commercial projects</li>
                    <li>Print articles for personal reference</li>
                </ul>
            </div>

            <div class="card card-prohibited">
                <div class="card-title"><i class="fas fa-times"></i> You May Not:</div>
                <ul>
                    <li>Republish, redistribute, or sell our content without written permission</li>
                    <li>Use our content for commercial purposes without obtaining a license</li>
                    <li>Claim our content as your own or remove copyright notices</li>
                    <li>Use automated systems to scrape or download our content</li>
                </ul>
            </div>

            <h2><i class="fas fa-info-circle"></i> 3. Accuracy of Information</h2>
            <p>While we strive to provide accurate, up-to-date, and reliable information, technology evolves rapidly. We do not guarantee the completeness, reliability, or absolute accuracy of any content on our site. Use information at your own discretion.</p>

            <h2><i class="fas fa-external-link-alt"></i> 4. Third-Party Links</h2>
            <p>Our website may contain links to external websites and resources. We provide these links for convenience and do not endorse, control, or assume responsibility for the content, privacy policies, or practices of any third-party websites.</p>

            <h2><i class="fas fa-user-shield"></i> 5. User Conduct</h2>
            <p>You agree to use TechBlogs.site lawfully and respectfully. Prohibited activities include posting harmful content, attempting to disrupt website operations, violating others' intellectual property rights, or engaging in any form of harassment.</p>

            <h2><i class="fas fa-balance-scale"></i> 6. Limitation of Liability</h2>
            <p>TechBlogs.site and its owners, contributors, and affiliates shall not be held liable for any direct, indirect, incidental, or consequential damages resulting from your use of the website or reliance on its content, including but not limited to data loss, revenue loss, or system damage.</p>

            <h2><i class="fas fa-copyright"></i> 7. Intellectual Property</h2>
            <p>All content, logos, trademarks, and design elements on TechBlogs.site are the property of TechBlogs.site or its content creators, unless otherwise noted. Unauthorized use is strictly prohibited and may violate copyright, trademark, and other laws.</p>

            <h2><i class="fas fa-shield-alt"></i> 8. Privacy</h2>
            <p>Your privacy is important to us. Please review our comprehensive <a href="{{route('frontend.terms-conditions')}}">Privacy Policy</a> to understand how we collect, use, and protect your personal information when you visit our site.</p>

            <h2><i class="fas fa-sync-alt"></i> 9. Changes to Terms</h2>
            <p>We reserve the right to modify these Terms and Conditions at any time. Changes will be posted on this page with an updated "Last Updated" date. Your continued use of the site after changes constitutes acceptance of the revised terms.</p>

            <div class="contact-info">
                <h3><i class="fas fa-envelope"></i> Questions or Concerns?</h3>
                <p>If you have any questions about these Terms, please contact us at:</p>
                <p><strong><a href="mailto:service@techblogs.site">service@techblogs.site</a></strong></p>
                <p>We typically respond within 2-3 business days.</p>
            </div>

            <a href="index.html" class="back-button">
                <i class="fas fa-arrow-left"></i> Back to TechBlogs.site
            </a>
        </div>

        <div class="footer">
            <p>&copy; <span id="currentYear"></span> TechBlogs.site. All rights reserved.</p>
            <p>This document is legally binding. Please retain a copy for your records.</p>
        </div>
    </div>


    <script>
        // Set current date and year
        document.getElementById('currentDate').textContent = new Date().toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        
        document.getElementById('currentYear').textContent = new Date().getFullYear();

        // Scroll to top button
        const scrollBtn = document.getElementById("scrollTopBtn");

        window.onscroll = function() {
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                scrollBtn.style.display = "flex";
            } else {
                scrollBtn.style.display = "none";
            }
        };

        scrollBtn.onclick = function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        };

        // Add smooth scrolling to all anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId !== '#') {
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });

        // Highlight current section while scrolling
        const sections = document.querySelectorAll('.content-section h2');
        
        function highlightOnScroll() {
            let scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 100;
                const sectionHeight = section.clientHeight;
                const sectionId = section.getAttribute('id');
                
                if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                    document.querySelectorAll('a[href*="#"]').forEach(link => {
                        link.classList.remove('active');
                        if (link.getAttribute('href') === `#${sectionId}`) {
                            link.classList.add('active');
                        }
                    });
                }
            });
        }
        
        window.addEventListener('scroll', highlightOnScroll);
    </script>
 
@include('frontend.footer')
