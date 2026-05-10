<style>
  footer {
     background: #ffffff;
    color: #1e293b;
    padding: 70px 20px 40px;
    margin-top: auto;
    position: relative;
    overflow: hidden;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  }

  /* Animated gradient border */
  footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
   background: linear-gradient(90deg, #2563eb, #10b981, #f59e0b, #8b5cf6);
    background-size: 400% 100%;
    animation: gradientShift 8s ease infinite;
  }

  @keyframes gradientShift {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
  }

  /* Subtle background pattern */
  footer::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image:
      radial-gradient(circle at 20% 80%, rgba(37, 99, 235, 0.05) 0%, transparent 50%),
      radial-gradient(circle at 80% 20%, rgba(16, 185, 129, 0.05) 0%, transparent 50%),
      radial-gradient(circle at 40% 40%, rgba(245, 158, 11, 0.03) 0%, transparent 50%);
    z-index: 0;
  }

  /* Footer container */
  .footer-container {
    max-width: 1280px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
  }

  /* Footer grid layout */
  .footer-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 50px;
    margin-bottom: 50px;
  }

  /* Footer brand section */
  .footer-brand {
    grid-column: span 1;
  }

  .footer-logo {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 25px;
    text-decoration: none;
    transition: transform 0.3s ease;
  }

  .footer-logo:hover {
    transform: translateX(5px);
  }

  .footer-logo img {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    object-fit: contain;
    background: linear-gradient(135deg, #2563eb, #10b981);
    padding: 3px;
    border: 2px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  }

  .footer-logo:hover img {
    transform: rotate(-5deg) scale(1.1);
    border-color: rgba(255, 255, 255, 0.3);
    box-shadow: 0 10px 20px rgba(37, 99, 235, 0.3);
  }

.footer-logo span {
  font-family: 'Poppins', sans-serif;
  font-size: 24px;
  font-weight: 700;
  color: #1e293b; /* solid dark color for light footer */
  background: none; /* remove gradient */
  -webkit-background-clip: unset;
  background-clip: unset;
}

  .footer-desc {
    font-size: 15px;
      color: #475569;
    line-height: 1.7;
    margin-bottom: 25px;
  }

  /* Footer sections */
  .footer-section h3 {
    font-size: 18px;
    margin-bottom: 25px;
   color: #0f172a;
    position: relative;
    padding-bottom: 12px;
    font-weight: 600;
  }

  .footer-section h3::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 40px;
    height: 3px;
    background: linear-gradient(90deg, #2563eb, #10b981);
    border-radius: 2px;
  }

  /* Footer links */
  .footer-links {
    display: flex;
    flex-direction: column;
    gap: 14px;
  }

  .footer-links a {
     color: #475569;
    text-decoration: none;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 6px 0;
    border-radius: 6px;
    position: relative;
    overflow: hidden;
  }

  .footer-links a::before {
    content: '';
    position: absolute;
    left: -100%;
    top: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, rgba(37, 99, 235, 0.1), transparent);
    transition: left 0.4s ease;
    z-index: -1;
  }

  .footer-links a:hover {
    color: #2563eb;
    transform: translateX(8px);
  }

  .footer-links a:hover::before {
    left: 0;
  }

  .footer-links a i {
    width: 20px;
    text-align: center;
    color: #2563eb;
    font-size: 14px;
    transition: all 0.3s ease;
  }

  .footer-links a:hover i {
    color: #10b981;
    transform: scale(1.2);
  }

  /* Newsletter section */
  .newsletter-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  .newsletter-form p {
    color: #94a3b8;
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 5px;
  }

  .newsletter-input {
    position: relative;
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  .newsletter-input input {
    width: 100%;
    padding: 16px 24px;
    border-radius: 12px;
     border: 1px solid #e2e8f0;
    background: #f8fafc;
    color: #0f172a;
    font-size: 15px;
    outline: none;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
  }

  .newsletter-input input:focus {
    border-color: rgba(37, 99, 235, 0.5);
    background: rgba(37, 99, 235, 0.05);
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
  }

  .newsletter-input input::placeholder {
    color: #94a3b8;
  }

  .newsletter-input button {
    padding: 14px 24px;
    border-radius: 12px;
    border: none;
    background: linear-gradient(135deg, #2563eb, #10b981);
    color: white;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-size: 15px;
  }

  .newsletter-input button:hover {
    background: linear-gradient(135deg, #1d4ed8, #0ea271);
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(37, 99, 235, 0.3);
  }

  .newsletter-input button:active {
    transform: translateY(0);
  }

  .newsletter-note {
    font-size: 12px;
    color: #64748b;
    line-height: 1.5;
    margin-top: 5px;
  }

  /* Footer bottom */
  .footer-bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 40px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    flex-wrap: wrap;
    gap: 25px;
  }

  /* Social icons */
  .footer-social {
    display: flex;
    gap: 12px;
  }

  .footer-social a {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f1f5f9;
      color: #475569;
    font-size: 18px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
     border: 1px solid #e2e8f0;
  }

  .footer-social a::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, var(--hover-color), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .footer-social a:hover {
   color: #fff;
    transform: translateY(-5px);
    border-color: transparent;
  }

  .footer-social a:hover::before {
    opacity: 1;
  }

  .footer-social a i {
    position: relative;
    z-index: 1;
  }

  /* Social media specific colors */
  .footer-social a[href*="facebook"] {
    --hover-color: #1877f2;
  }

  .footer-social a[href*="twitter"] {
    --hover-color: #1da1f2;
  }

  .footer-social a[href*="instagram"] {
    --hover-color: #e4405f;
  }

  .footer-social a[href*="youtube"] {
    --hover-color: #ff0000;
  }

  .footer-social a[href*="medium"] {
    --hover-color: #00ab6c;
  }

  /* Footer copyright */
  .footer-copy {
    font-size: 14px;
    color: #64748b;
  }

  .footer-copy a {
    color: #2563eb;
    text-decoration: none;
    transition: color 0.3s ease;
  }

  .footer-copy a:hover {
    color: #10b981;
    text-decoration: underline;
  }

  /* Legal links */
  .footer-legal {
    display: flex;
    gap: 20px;
  }

  .footer-legal a {
     color: #64748b;
    text-decoration: none;
    font-size: 14px;
    transition: all 0.3s ease;
    padding: 4px 8px;
    border-radius: 6px;
  }

  .footer-legal a:hover {
    color: #2563eb;
    background: rgba(255, 255, 255, 0.05);
  }

  /* Back to top button */
  .back-to-top {
    position: fixed;
    right: 30px;
    bottom: 30px;
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: linear-gradient(135deg, #2563eb, #10b981);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 8px 25px rgba(37, 99, 235, 0.3);
    opacity: 0;
    visibility: hidden;
    transform: translateY(20px);
    z-index: 9999;
    border: none;
    outline: none;
  }

  .back-to-top:hover {
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 15px 30px rgba(37, 99, 235, 0.4);
  }

  .back-to-top.visible {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
  }

  .back-to-top:active {
    transform: translateY(0) scale(0.95);
  }

  /* Responsive adjustments */
  @media (max-width: 1200px) {
    .footer-grid {
      gap: 40px;
    }
  }

  @media (max-width: 1024px) {
    .footer-grid {
      grid-template-columns: repeat(2, 1fr);
      gap: 40px 30px;
    }

    .footer-brand {
      grid-column: span 2;
      text-align: center;
    }

    .footer-logo {
      justify-content: center;
    }
  }

  @media (max-width: 768px) {
    footer {
      padding: 50px 20px 30px;
    }

    .footer-grid {
      grid-template-columns: 1fr;
      gap: 40px;
    }

    .footer-brand {
      grid-column: span 1;
      text-align: left;
    }

    .footer-logo {
      justify-content: flex-start;
    }

    .footer-bottom {
      flex-direction: column;
      text-align: center;
      gap: 20px;
      padding-top: 30px;
    }

    .footer-legal {
      justify-content: center;
      flex-wrap: wrap;
      gap: 15px;
    }

    .back-to-top {
      width: 48px;
      height: 48px;
      font-size: 18px;
      right: 20px;
      bottom: 20px;
    }
  }

  @media (max-width: 480px) {
    footer {
      padding: 40px 15px 25px;
    }

    .footer-logo {
      flex-direction: row;
      text-align: left;
      gap: 12px;
    }

    .footer-logo img {
      width: 40px;
      height: 40px;
    }

    .footer-logo span {
      font-size: 20px;
    }

    .footer-section h3 {
      font-size: 16px;
      margin-bottom: 20px;
    }

    .footer-social a {
      width: 40px;
      height: 40px;
      font-size: 16px;
    }

    .newsletter-input input {
      padding: 14px 20px;
      font-size: 14px;
    }

    .newsletter-input button {
      padding: 12px 20px;
      font-size: 14px;
    }

    .footer-copy {
      font-size: 13px;
    }
  }

  /* Loading state for newsletter form */
  .newsletter-input.loading button::after {
    content: '';
    width: 16px;
    height: 16px;
    border: 2px solid transparent;
    border-top-color: white;
    border-radius: 50%;
    animation: spin 0.8s linear infinite;
    margin-left: 8px;
  }

  @keyframes spin {
    to { transform: rotate(360deg); }
  }

  /* Success/Error messages */
  .newsletter-message {
    padding: 12px 16px;
    border-radius: 8px;
    font-size: 14px;
    margin-top: 10px;
    animation: slideDown 0.3s ease;
  }

  .newsletter-message.success {
    background: rgba(16, 185, 129, 0.1);
    color: #10b981;
    border: 1px solid rgba(16, 185, 129, 0.2);
  }

  .newsletter-message.error {
    background: rgba(239, 68, 68, 0.1);
    color: #ef4444;
    border: 1px solid rgba(239, 68, 68, 0.2);
  }

  @keyframes slideDown {
    from {
      opacity: 0;
      transform: translateY(-10px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  /* ===== COOKIE CONSENT POPUP - ADSENSE COMPLIANT ===== */
.cookie-consent {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background: #ffffff;
    backdrop-filter: blur(12px);
    border-top: 1px solid #e2e8f0;
    padding: 20px;
    z-index: 10000;
    transform: translateY(100%);
    transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 -10px 40px rgba(0, 0, 0, 0.3);
}

.cookie-consent.show {
    transform: translateY(0);
}

.cookie-container {
    max-width: 1280px;
    margin: 0 auto;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.cookie-text {
    flex: 2;
    min-width: 240px;
}

.cookie-text h3 {
     color: #0f172a;
    font-size: 1.2rem;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.cookie-text h3 i {
    color: #f59e0b;
    font-size: 1.3rem;
}

.cookie-text p {
    color: #475569;
    font-size: 0.85rem;
    line-height: 1.5;
    margin: 0;
}

.cookie-text a {
    color: #10b981;
    text-decoration: none;
}

.cookie-text a:hover {
    text-decoration: underline;
}

.cookie-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    align-items: center;
}

.cookie-btn {
    padding: 10px 22px;
    border-radius: 40px;
    font-weight: 600;
    font-size: 0.85rem;
    cursor: pointer;
    transition: all 0.3s ease;
    border: none;
    font-family: 'Inter', sans-serif;
}

.cookie-btn-accept {
    background: linear-gradient(135deg, #2563eb, #10b981);
    color: white;
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
}

.cookie-btn-accept:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(37, 99, 235, 0.4);
}

.cookie-btn-reject {
    background: rgba(255, 255, 255, 0.08);
    color: black;
    border: 1px solid rgba(255, 255, 255, 0.15);
}



.cookie-btn-settings {
    background: transparent;
    color: black;
    border: 1px solid rgba(255, 255, 255, 0.2);
}



/* Settings Panel (Modal) */
.cookie-settings-panel {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    backdrop-filter: blur(8px);
    z-index: 10001;
    display: flex;
    align-items: center;
    justify-content: center;
    visibility: hidden;
    opacity: 0;
    transition: all 0.3s ease;
}

.cookie-settings-panel.show {
    visibility: visible;
    opacity: 1;
}

.settings-card {
    background: linear-gradient(135deg, #0f172a, #1e293b);
    border-radius: 24px;
    max-width: 500px;
    width: 90%;
    padding: 28px;
    border: 1px solid rgba(37, 99, 235, 0.3);
    transform: scale(0.9);
    transition: transform 0.3s ease;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
}

.cookie-settings-panel.show .settings-card {
    transform: scale(1);
}

.settings-card h3 {
    color: #fff;
    margin-bottom: 20px;
    font-size: 1.4rem;
    display: flex;
    align-items: center;
    gap: 12px;
}

.cookie-option {
    margin-bottom: 20px;
    padding: 12px;
    background: rgba(255, 255, 255, 0.03);
    border-radius: 16px;
    border-left: 3px solid #2563eb;
}

.option-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 8px;
}

.option-header label {
    color: #fff;
    font-weight: 600;
    cursor: pointer;
}

.option-desc {
    color: #94a3b8;
    font-size: 0.8rem;
    margin: 0;
}

/* Toggle Switch */
.switch {
    position: relative;
    display: inline-block;
    width: 52px;
    height: 26px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #334155;
    transition: 0.3s;
    border-radius: 34px;
}

.slider:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    transition: 0.3s;
    border-radius: 50%;
}

input:checked + .slider {
    background: linear-gradient(135deg, #2563eb, #10b981);
}

input:checked + .slider:before {
    transform: translateX(26px);
}

.settings-actions {
    display: flex;
    gap: 12px;
    margin-top: 24px;
    justify-content: flex-end;
}

.settings-save {
    background: linear-gradient(135deg, #2563eb, #10b981);
    color: white;
    padding: 10px 24px;
    border: none;
    border-radius: 40px;
    font-weight: 600;
    cursor: pointer;
}

.settings-close {
    background: rgba(255, 255, 255, 0.08);
    color: #cbd5e1;
    padding: 10px 24px;
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 40px;
    cursor: pointer;
}

@media (max-width: 768px) {
    .cookie-container {
        flex-direction: column;
        text-align: center;
    }
    .cookie-buttons {
        justify-content: center;
    }
    .settings-card {
        padding: 20px;
    }
}
</style>

@php
use App\Models\SocialMedia;
$data = SocialMedia::first();
@endphp

<!-- Footer -->
<footer>
  <div class="footer-container">
    <!-- Back to top button -->
    <button class="back-to-top" id="backToTop" aria-label="Scroll to top">
      <i class="fa-solid fa-arrow-up"></i>
    </button>
<!-- COOKIE CONSENT POPUP - ADSENSE COMPLIANT -->
<div class="cookie-consent" id="cookieConsent">
    <div class="cookie-container">
        <div class="cookie-text">
            <h3>
                <i class="fa-solid fa-cookie-bite"></i>
                We value your privacy
            </h3>
            <p>
                We use cookies to enhance your browsing experience, serve personalized ads, and analyze our traffic.
                By clicking "Accept All", you consent to our use of cookies.
               <a href="{{ route('frontend.cookie') }}">Read our Cookie Policy</a>
            </p>
        </div>
        <div class="cookie-buttons">
            <button class="cookie-btn cookie-btn-reject" id="rejectCookiesBtn">
                <i class="fa-solid fa-xmark"></i> Reject All
            </button>
            <button class="cookie-btn cookie-btn-settings" id="customizeCookiesBtn">
                <i class="fa-solid fa-sliders-h"></i> Customize
            </button>
            <button class="cookie-btn cookie-btn-accept" id="acceptCookiesBtn">
                <i class="fa-solid fa-check"></i> Accept All
            </button>
        </div>
    </div>
</div>

<!-- Cookie Settings Modal (Customize Panel) -->
<div class="cookie-settings-panel" id="cookieSettingsPanel">
    <div class="settings-card">
        <h3>
            <i class="fa-solid fa-cookie"></i>
            Privacy Preferences
        </h3>

        <div class="cookie-option">
            <div class="option-header">
                <label>✅ Essential Cookies (Always Active)</label>
                <span style="color:#10b981; font-size:12px;">Required</span>
            </div>
            <p class="option-desc">These cookies are necessary for the website to function properly. They cannot be disabled.</p>
        </div>

        <div class="cookie-option">
            <div class="option-header">
                <label for="analyticsCookies">📊 Analytics Cookies</label>
                <label class="switch">
                    <input type="checkbox" id="analyticsCookies" checked>
                    <span class="slider"></span>
                </label>
            </div>
            <p class="option-desc">Help us understand how visitors interact with our website (Google Analytics, etc.)</p>
        </div>

        <div class="cookie-option">
            <div class="option-header">
                <label for="marketingCookies">🎯 Marketing & Ad Cookies</label>
                <label class="switch">
                    <input type="checkbox" id="marketingCookies" checked>
                    <span class="slider"></span>
                </label>
            </div>
            <p class="option-desc">Used to deliver relevant ads (Google AdSense) and track ad performance.</p>
        </div>

        <div class="cookie-option">
            <div class="option-header">
                <label for="functionalCookies">⚙️ Functional Cookies</label>
                <label class="switch">
                    <input type="checkbox" id="functionalCookies" checked>
                    <span class="slider"></span>
                </label>
            </div>
            <p class="option-desc">Enhance functionality like remembering your preferences and settings.</p>
        </div>

        <div class="settings-actions">
            <button class="settings-close" id="closeSettingsBtn">Cancel</button>
            <button class="settings-save" id="saveSettingsBtn">Save Preferences</button>
        </div>
    </div>
</div>
    <!-- Footer grid -->
    <div class="footer-grid">
      <!-- Brand section -->
      <div class="footer-brand">
        <a href="{{ route('frontend.index') }}" class="footer-logo">
          <img
            src="https://techblogs.site/favicon.ico"
            alt="TechBlogs Logo"
            width="50"
            height="50"
            loading="lazy"
          >
          <span>TechBlogs</span>
        </a>
        <p class="footer-desc">
          Stay ahead of the curve with cutting-edge technology insights, AI updates, mobile reviews, and digital trends. Join our community of tech enthusiasts.
        </p>
      </div>

      <!-- Quick links -->
      <div class="footer-section">
        <h3>Quick Links</h3>
        <div class="footer-links">
          <a href="{{ route('frontend.index') }}">
            <i class="fa-solid fa-house"></i>
            <span>Home</span>
          </a>
          <a href="{{ route('frontend.Aboute') }}">
            <i class="fa-solid fa-info-circle"></i>
            <span>About Us</span>
          </a>
          <a href="{{ route('frontend.blogs') }}">
            <i class="fa-solid fa-blog"></i>
            <span>Blog</span>
          </a>
          <a href="{{ route('frontend.contect') }}">
            <i class="fa-solid fa-envelope"></i>
            <span>Contact</span>
          </a>
          <a href="{{ route('frontend.terms-conditions') }}">
            <i class="fa-solid fa-file-contract"></i>
            <span>Terms & Conditions</span>
          </a>
          <a href="{{ route('frontend.praivacy-policy') }}">
            <i class="fa-solid fa-shield-alt"></i>
            <span>Privacy Policy</span>
          </a>

        </div>
      </div>

      <!-- Quick links -->
      <div class="footer-section">

        <div class="footer-links">

          <a href="https://www.techblogs.site/cookie-policy">
            <i class="fa-solid fa-shield-alt"></i>
                                      <span>Cookie Policy</span>
          <a href="{{ route('frontend.products') }}">
    <i class="fa-solid fa-boxes-stacked"></i>
    <span>Products</span>
</a>
        </div>
      </div>

      <!-- Newsletter -->
      <div class="footer-section">
        <h3>Stay Updated</h3>
        <div class="newsletter-form">
          <p>Get the latest tech news and insights delivered directly to your inbox.</p>

          <div class="newsletter-input">
            <form action="{{ route('admin.emails.store') }}" method="POST" >
              @csrf
              <input
                type="email"
                name="email"
                placeholder="Enter your email address"
                id="newsletterEmail"
                required
                aria-label="Email address"
              >
              <button type="submit" id="newsletterSubmit">
                <span>Subscribe</span>
                <i class="fa-solid fa-paper-plane"></i>
              </button>
            </form>
            <div id="newsletterMessage"></div>
          </div>

          <p class="newsletter-note">
            <i class="fa-solid fa-lock"></i> We respect your privacy. Unsubscribe at any time. No spam, ever.
          </p>
        </div>
      </div>
    </div>

    <!-- Footer bottom -->
    <div class="footer-bottom">
      <div class="footer-copy">
     © {{ date('Y') }} TechBlogs.site • Made with <i class="fa-solid fa-heart" style="color: #ef4444;"></i> for the tech community
      </div>

      <div class="footer-social">
        <a href="{{ optional($data)->facebook ?? '#' }}"
           title="Facebook"
           aria-label="Facebook"
           target="_blank"
           rel="noopener noreferrer">
          <i class="fa-brands fa-facebook-f"></i>
        </a>
        <a href="{{ optional($data)->twitter ?? '#' }}"
           title="Twitter"
           aria-label="Twitter"
           target="_blank"
           rel="noopener noreferrer">
          <i class="fa-brands fa-twitter"></i>
        </a>

        <a href="{{ optional($data)->instagram ?? '#' }}"
           title="Instagram"
           aria-label="Instagram"
           target="_blank"
           rel="noopener noreferrer">
          <i class="fa-brands fa-instagram"></i>
        </a>
        <a href="{{ optional($data)->medium ?? '#' }}"
           title="Medium"
           aria-label="Medium"
           target="_blank"
           rel="noopener noreferrer">
          <i class="fa-brands fa-medium"></i>
        </a>
        <a href="{{ optional($data)->youtube ?? '#' }}"
           title="YouTube"
           aria-label="YouTube"
           target="_blank"
           rel="noopener noreferrer">
          <i class="fa-brands fa-youtube"></i>
        </a>
      </div>

      <div class="footer-legal">
        <a href="{{ route('frontend.terms-conditions') }}">Terms</a>
        <a href="{{ route('frontend.praivacy-policy') }}">Privacy</a>
        <a href="{{ route('frontend.contect') }}">Contact</a>

      </div>
    </div>
  </div>
</footer>

<script>
  // Back to top functionality
  const backToTopBtn = document.getElementById('backToTop');

  // Show/hide button on scroll
  window.addEventListener('scroll', () => {
    if (window.scrollY > 300) {
      backToTopBtn.classList.add('visible');
    } else {
      backToTopBtn.classList.remove('visible');
    }
  });

  // Scroll to top on click
  backToTopBtn.addEventListener('click', () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });



  // Animate social icons on hover
  document.querySelectorAll('.footer-social a').forEach(icon => {
    icon.addEventListener('mouseenter', (e) => {
      const rect = e.target.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;

      icon.style.setProperty('--x', `${x}px`);
      icon.style.setProperty('--y', `${y}px`);
    });
  });

  // Add intersection observer for fade-in animations
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
      }
    });
  }, observerOptions);

  // Observe footer sections for animation
  document.querySelectorAll('.footer-section, .footer-brand').forEach(section => {
    section.style.opacity = '0';
    section.style.transform = 'translateY(20px)';
    section.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    observer.observe(section);
  });
  // ========== COOKIE CONSENT MANAGER (AdSense Compliant) ==========
(function() {
    const COOKIE_CONSENT_KEY = 'techblogs_cookie_consent';
    const CONSENT_VERSION = '1.0';

    // DOM Elements
    const cookieBanner = document.getElementById('cookieConsent');
    const acceptBtn = document.getElementById('acceptCookiesBtn');
    const rejectBtn = document.getElementById('rejectCookiesBtn');
    const customizeBtn = document.getElementById('customizeCookiesBtn');
    const settingsPanel = document.getElementById('cookieSettingsPanel');
    const closeSettingsBtn = document.getElementById('closeSettingsBtn');
    const saveSettingsBtn = document.getElementById('saveSettingsBtn');

    // Checkbox elements
    const analyticsCheckbox = document.getElementById('analyticsCookies');
    const marketingCheckbox = document.getElementById('marketingCookies');
    const functionalCheckbox = document.getElementById('functionalCookies');

    // Helper: Set cookie with expiry (1 year)
    function setCookie(name, value, days = 365) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        const expires = "; expires=" + date.toUTCString();
        document.cookie = name + "=" + JSON.stringify(value) + expires + "; path=/; SameSite=Lax";
    }

    // Helper: Get cookie
    function getCookie(name) {
        const nameEQ = name + "=";
        const ca = document.cookie.split(';');
        for(let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) {
                try {
                    return JSON.parse(c.substring(nameEQ.length, c.length));
                } catch(e) {
                    return c.substring(nameEQ.length, c.length);
                }
            }
        }
        return null;
    }

    // Apply consent settings (Enable/Disable actual scripts)
    function applyConsent(consent) {
        console.log('✅ Consent applied:', consent);

        // Google Analytics (Example) - Enable/Disable based on analytics consent
        if (typeof gtag !== 'undefined') {
            window['ga-disable-UA-XXXXX-Y'] = !consent.analytics;
        }

        // For AdSense: We store consent in localStorage so AdSense scripts can read it
        localStorage.setItem('adsense_consent_granted', consent.marketing ? 'true' : 'false');
        localStorage.setItem('cookie_consent_preferences', JSON.stringify(consent));

        // Dispatch custom event so other scripts can listen
        window.dispatchEvent(new CustomEvent('cookieConsentUpdated', { detail: consent }));

        // If marketing cookies are rejected, we can optionally disable AdSense personalization
        if (!consent.marketing) {
            // Google AdSense non-personalized ads flag
            document.cookie = "NID=aut=0; path=/; domain=." + window.location.hostname + "; SameSite=None; Secure";
            console.log('⚠️ Non-personalized ads mode (AdSense compliant)');
        }
    }

    // Load user's previous consent
    function loadExistingConsent() {
        const savedConsent = getCookie(COOKIE_CONSENT_KEY);
        if (savedConsent && savedConsent.version === CONSENT_VERSION) {
            return savedConsent.preferences;
        }
        return null;
    }

    // Save consent after user choice
    function saveConsent(preferences) {
        const consentData = {
            version: CONSENT_VERSION,
            preferences: preferences,
            timestamp: new Date().toISOString()
        };
        setCookie(COOKIE_CONSENT_KEY, consentData, 365);
        applyConsent(preferences);

        // Hide banner after saving consent
        if (cookieBanner) {
            cookieBanner.classList.remove('show');
        }
    }

    // Accept All Cookies
    function acceptAll() {
        const preferences = {
            essential: true,
            analytics: true,
            marketing: true,
            functional: true
        };
        saveConsent(preferences);
    }

    // Reject All Non-Essential Cookies
    function rejectAll() {
        const preferences = {
            essential: true,
            analytics: false,
            marketing: false,
            functional: false
        };
        // Update checkboxes in settings panel if open
        if (analyticsCheckbox) analyticsCheckbox.checked = false;
        if (marketingCheckbox) marketingCheckbox.checked = false;
        if (functionalCheckbox) functionalCheckbox.checked = false;
        saveConsent(preferences);
    }

    // Save custom preferences from settings modal
    function saveCustomPreferences() {
        const preferences = {
            essential: true,
            analytics: analyticsCheckbox ? analyticsCheckbox.checked : false,
            marketing: marketingCheckbox ? marketingCheckbox.checked : false,
            functional: functionalCheckbox ? functionalCheckbox.checked : false
        };
        saveConsent(preferences);
        settingsPanel.classList.remove('show');
    }

    // Show settings panel
    function showSettings() {
        // Load current settings from cookie if available
        const currentConsent = getCookie(COOKIE_CONSENT_KEY);
        if (currentConsent && currentConsent.preferences) {
            const prefs = currentConsent.preferences;
            if (analyticsCheckbox) analyticsCheckbox.checked = prefs.analytics !== false;
            if (marketingCheckbox) marketingCheckbox.checked = prefs.marketing !== false;
            if (functionalCheckbox) functionalCheckbox.checked = prefs.functional !== false;
        }
        settingsPanel.classList.add('show');
    }

    // Close settings panel
    function closeSettings() {
        settingsPanel.classList.remove('show');
    }

    // Initialize: Check if consent already given
    function initCookieConsent() {
        const existingPrefs = loadExistingConsent();

        if (existingPrefs) {
            // Consent already given, apply preferences and hide banner
            applyConsent(existingPrefs);
            if (cookieBanner) cookieBanner.classList.remove('show');
        } else {
            // No consent yet, show banner
            if (cookieBanner) {
                cookieBanner.classList.add('show');
            }
            // Set default temporary consent (no tracking until user decides)
            const defaultPrefs = {
                essential: true,
                analytics: false,
                marketing: false,
                functional: false
            };
            applyConsent(defaultPrefs); // Temporarily disable all non-essential until choice
        }

        // Add event listeners for buttons
        if (acceptBtn) acceptBtn.addEventListener('click', acceptAll);
        if (rejectBtn) rejectBtn.addEventListener('click', rejectAll);
        if (customizeBtn) customizeBtn.addEventListener('click', showSettings);
        if (closeSettingsBtn) closeSettingsBtn.addEventListener('click', closeSettings);
        if (saveSettingsBtn) saveSettingsBtn.addEventListener('click', saveCustomPreferences);

        // Close modal if clicking outside content
        if (settingsPanel) {
            settingsPanel.addEventListener('click', function(e) {
                if (e.target === settingsPanel) {
                    closeSettings();
                }
            });
        }

        // For AdSense auto ads compliance: notify Google
        if (typeof window.adsbygoogle !== 'undefined') {
            console.log('AdSense detected - consent ready');
        }
    }

    // Run when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCookieConsent);
    } else {
        initCookieConsent();
    }
})();
</script>
