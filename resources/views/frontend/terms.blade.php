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
            --heading-color: #FF7700;
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
            background-color: #ff7700;
        }

        h1 {
            color: #ff7700;
            margin-bottom: 10px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .subtitle {
            color: var(--text-light);
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto 15px;
        }

        .effective-date {
            background-color: var(--bg-secondary);
            padding: 10px 20px;
            border-radius: 8px;
            display: inline-block;
            font-size: 0.95rem;
            margin-top: 10px;
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
            background-color: #ff7700;
            border-radius: 2px;
        }

        h2 i {
            margin-right: 12px;
            color: #ff7700;
            font-size: 1.3rem;
        }

        p {
            margin-bottom: 20px;
            font-size: 1.05rem;
            color: var(--text-color);
            padding-left: 20px;
        }

        /* Lists */
        ul, ol {
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
            color: #ff7700;
            font-weight: bold;
            position: absolute;
            left: -15px;
            font-size: 1.2rem;
        }

        /* Data Collection Cards */
        .data-card {
            background-color: var(--bg-secondary);
            border-radius: 10px;
            padding: 25px;
            margin: 25px 0;
            border-left: 4px solid #ff7700;
            transition: var(--transition);
        }

        .data-card:hover {
            transform: translateY(-3px);
        }

        .card-title {
            font-weight: 600;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            font-size: 1.1rem;
            color: #ff7700;
        }

        .card-title i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        /* Cookie Banner */
        .cookie-banner {
            background: linear-gradient(135deg, #ff7700, #357ABD);
            color: white;
            padding: 25px;
            border-radius: 12px;
            margin: 30px 0;
            position: relative;
            overflow: hidden;
        }

        .cookie-banner:before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200px;
            height: 200px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .cookie-banner h3 {
            color: white;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .cookie-banner h3 i {
            margin-right: 10px;
        }

        /* Table for data retention */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .data-table th {
            background-color: #ff7700;
            color: white;
            text-align: left;
            padding: 15px;
            font-weight: 600;
        }

        .data-table td {
            padding: 15px;
            border-bottom: 1px solid var(--border-color);
            background-color: var(--bg-secondary);
        }

        .data-table tr:last-child td {
            border-bottom: none;
        }

        /* Your Rights Section */
        .rights-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin: 25px 0;
        }

        .right-card {
            background-color: var(--bg-secondary);
            border-radius: 10px;
            padding: 20px;
            transition: var(--transition);
            border: 1px solid var(--border-color);
        }

        .right-card:hover {
            transform: translateY(-5px);
            border-color: #ff7700;
        }

        .right-card h4 {
            color: #ff7700;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .right-card h4 i {
            margin-right: 10px;
        }

        /* Contact info */
        .contact-info {
            background: linear-gradient(135deg, #ff7700, #357ABD);
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

        /* Navigation buttons */
        .nav-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .nav-button {
            display: inline-flex;
            align-items: center;
            background-color: var(--theme-color);
            color: white;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 600;
            transition: var(--transition);
        }

        .nav-button:hover {
            transform: translateY(-3px);
            text-decoration: none;
            color: white;
        }

        .nav-button.terms {
            background-color: var(--theme-color);
        }

        .nav-button.home {
            background-color: #ff7700;
        }

        .nav-button i {
            margin-right: 10px;
        }

        /* Scroll to top button */
        #scrollTopBtn {
            display: none;
            position: fixed;
            bottom: 40px;
            right: 40px;
            z-index: 100;
            background-color: #ff7700;
            color: #fff;
            border: none;
            outline: none;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 24px;
            box-shadow: 0 6px 20px rgba(74, 144, 226, 0.3);
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #scrollTopBtn:hover {
            background-color: #357ABD;
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(74, 144, 226, 0.4);
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

            .rights-grid {
                grid-template-columns: 1fr;
            }

            .data-table {
                display: block;
                overflow-x: auto;
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

            p, ul, ol {
                padding-left: 15px;
            }

            ul, ol {
                margin-left: 20px;
            }

            .nav-buttons {
                flex-direction: column;
            }

            .nav-button {
                text-align: center;
                justify-content: center;
            }
        }

        /* Print styles */
        @media print {
            #scrollTopBtn, .nav-buttons {
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
            <h1>Privacy Policy</h1>
            <p class="subtitle">Your privacy is critically important to us. This Privacy Policy explains how TechBlogs.site collects, uses, and protects your personal information.</p>
            <div class="effective-date">Effective Date: <span id="currentDate"></span></div>
        </div>

        <div class="content-section">
            <p>At <strong>TechBlogs.site</strong>, we are committed to protecting your privacy and being transparent about how we handle your data. This Privacy Policy applies to all visitors, users, and others who access our website.</p>
            <p>This website is owned and operated by Muhammad Abdul techblogs.site 
Location: Pakistan Layyah</p>
            <h2><i class="fas fa-info-circle"></i> 1. Information We Collect</h2>
            <p>We collect several types of information to provide and improve our services:</p>

            <div class="data-card">
                <div class="card-title"><i class="fas fa-user"></i> Personal Information</div>
                <p>When you voluntarily provide it, we may collect:</p>
                <ul>
                    <li>Name and email address (when subscribing to newsletters)</li>
                    <li>Comments you post on our articles</li>
                    <li>Contact information when you reach out to us</li>
                </ul>
            </div>

            <div class="data-card">
                <div class="card-title"><i class="fas fa-chart-line"></i> Automatically Collected Information</div>
                <p>When you visit our website, we automatically collect:</p>
                <ul>
                    <li>IP address and device information</li>
                    <li>Browser type and version</li>
                    <li>Pages visited and time spent on each page</li>
                    <li>Referring website or search query</li>
                </ul>
            </div>
            
            <h2><i class="fas fa-cookie-bite"></i> 2. Cookies and Tracking Technologies</h2>
            <p>We use cookies and similar tracking technologies to enhance your browsing experience and analyze website traffic.</p>

            <div class="cookie-banner">
                <h3><i class="fas fa-cookie"></i> Cookie Consent</h3>
                <p>By using TechBlogs.site, you consent to the use of cookies in accordance with this Privacy Policy. You can control cookies through your browser settings.</p>
            </div>

            <p>We use the following types of cookies:</p>
            <ul>
                <li><strong>Essential Cookies:</strong> Required for basic website functionality</li>
                <li><strong>Analytics Cookies:</strong> Help us understand how visitors interact with our site</li>
                <li><strong>Preference Cookies:</strong> Remember your settings and preferences</li>
                <li><strong>Advertising Cookies:</strong>We use Google AdSense to serve ads. Google may use cookies (such as the DoubleClick cookie) to show ads to users based on their visits to this and other websites.

Users may opt out of personalized advertising by visiting:
<a href="https://www.google.com/settings/ads">https://www.google.com/settings/ads</a></li>
            </ul>

            <h2><i class="fas fa-tasks"></i> 3. How We Use Your Information</h2>
            <p>We use the collected information for the following purposes:</p>
            <ul>
                <li>To provide, operate, and maintain our website</li>
                <li>To improve, personalize, and expand our content</li>
                <li>To understand and analyze how you use our website</li>
                <li>To develop new products, services, features, and functionality</li>
                <li>To communicate with you for customer service, updates, and marketing</li>
                <li>To prevent fraud and enhance website security</li>
                <li>To comply with legal obligations</li>
            </ul>

            <h2><i class="fas fa-share-alt"></i> 4. How We Share Your Information</h2>
            <p>We respect your privacy and do not sell your personal information. We may share information in the following circumstances:</p>
            <ul>
                <li><strong>Service Providers:</strong> With trusted third parties who assist in website operations</li>
                <li><strong>Legal Requirements:</strong> When required by law or to protect our rights</li>
                <li><strong>Business Transfers:</strong> In connection with a merger or acquisition</li>
                <li><strong>With Your Consent:</strong> When you explicitly authorize us to do so</li>
            </ul>

            <h2><i class="fas fa-database"></i> 5. Data Retention</h2>
            <p>We retain your personal information only for as long as necessary to fulfill the purposes outlined in this Privacy Policy.</p>

            <table class="data-table">
                <thead>
                    <tr>
                        <th>Data Type</th>
                        <th>Retention Period</th>
                        <th>Purpose</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Newsletter subscriptions</td>
                        <td>Until you unsubscribe</td>
                        <td>Email communications</td>
                    </tr>
                    <tr>
                        <td>Website comments</td>
                        <td>Indefinitely</td>
                        <td>Community engagement</td>
                    </tr>
                    <tr>
                        <td>Analytics data</td>
                        <td>26 months</td>
                        <td>Website improvement</td>
                    </tr>
                    <tr>
                        <td>Server logs</td>
                        <td>30 days</td>
                        <td>Security monitoring</td>
                    </tr>
                </tbody>
            </table>

            <h2><i class="fas fa-shield-alt"></i> 6. Data Security</h2>
            <p>We implement appropriate technical and organizational security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. However, no internet transmission is 100% secure, and we cannot guarantee absolute security.</p>

            <h2><i class="fas fa-external-link-alt"></i> 7. Third-Party Links</h2>
            <p>Our website may contain links to external sites that are not operated by us. We have no control over, and assume no responsibility for, the content, privacy policies, or practices of any third-party sites or services.</p>

            <h2><i class="fas fa-user-check"></i> 8. Your Privacy Rights</h2>
            <p>Depending on your location, you may have certain rights regarding your personal information:</p>

            <div class="rights-grid">
                <div class="right-card">
                    <h4><i class="fas fa-eye"></i> Right to Access</h4>
                    <p>You have the right to request copies of your personal data that we hold.</p>
                </div>
                <div class="right-card">
                    <h4><i class="fas fa-edit"></i> Right to Rectification</h4>
                    <p>You can request correction of inaccurate or incomplete information.</p>
                </div>
                <div class="right-card">
                    <h4><i class="fas fa-trash-alt"></i> Right to Erasure</h4>
                    <p>You may request deletion of your personal data under certain conditions.</p>
                </div>
                <div class="right-card">
                    <h4><i class="fas fa-ban"></i> Right to Restrict</h4>
                    <p>You can request restriction of processing your personal data.</p>
                </div>
                <div class="right-card">
                    <h4><i class="fas fa-file-export"></i> Right to Data Portability</h4>
                    <p>You have the right to receive your data in a structured, machine-readable format.</p>
                </div>
                <div class="right-card">
                    <h4><i class="fas fa-hand-paper"></i> Right to Object</h4>
                    <p>You may object to the processing of your personal data.</p>
                </div>
            </div>

            <h2><i class="fas fa-child"></i> 9. Children's Privacy</h2>
            <p>Our website is not intended for individuals under the age of 13. We do not knowingly collect personal information from children under 13. If you are a parent or guardian and believe your child has provided us with personal information, please contact us immediately.</p>

            <h2><i class="fas fa-globe"></i> 10. International Data Transfers</h2>
            <p>Your information may be transferred to and maintained on computers located outside of your country, where data protection laws may differ. By using our website, you consent to such transfers.</p>

            <h2><i class="fas fa-edit"></i> 11. Changes to This Privacy Policy</h2>
            <p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Effective Date" at the top.</p>

            <div class="contact-info">
                <h3><i class="fas fa-envelope"></i> Contact Us</h3>
                <p>If you have any questions about this Privacy Policy, please contact us:</p>
                <p><strong><a href="mailto:service@techblogs.site">service@techblogs.site</a></strong></p>
                <p>Or through our contact form at <strong><a href="{{route('frontend.contect')}}">TechBlogs.site/contact</a></strong></p>
                <p>We strive to respond to all privacy-related inquiries within 5 business days.</p>
            </div>

            <div class="nav-buttons">
                <a href="{{route('frontend.terms-conditions')}}" class="nav-button terms">
                    <i class="fas fa-file-contract"></i> View Terms & Conditions
                </a>
                <a href="{{route('frontend.index')}}" class="nav-button home">
                    <i class="fas fa-home"></i> Back to Homepage
                </a>
            </div>
        </div>

        <div class="footer">
            <p>&copy; <span id="currentYear"></span> TechBlogs.site. All rights reserved.</p>
            <p>This Privacy Policy was last updated on <span id="currentDateFull"></span></p>
        </div>
    </div>

    <span id="ezoic-privacy-policy-embed"></span>
    <script>
        // Set current date and year
        const currentDate = new Date();
        
        document.getElementById('currentDate').textContent = currentDate.toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        
        document.getElementById('currentDateFull').textContent = currentDate.toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            weekday: 'long'
        });
        
        document.getElementById('currentYear').textContent = currentDate.getFullYear();

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

        // Cookie consent simulation
        document.addEventListener('DOMContentLoaded', function() {
            if (!localStorage.getItem('cookieConsent')) {
                // In a real implementation, you would show a cookie banner here
                console.log('Cookie consent not yet given');
            }
        });

        // Highlight active section while scrolling
        const sections = document.querySelectorAll('h2');
        
        function highlightOnScroll() {
            let scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 100;
                const sectionHeight = section.clientHeight;
                
                if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                    section.style.color = '#ff7700';
                } else {
                    section.style.color = 'var(--heading-color)';
                }
            });
        }
        
        window.addEventListener('scroll', highlightOnScroll);
    </script>
    
 
@include('frontend.footer')