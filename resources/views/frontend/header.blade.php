<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $meta_title ?? 'TechBlogs.site – Latest Tech News, AI, Mobiles & Digital Trends' }}</title>
<meta name="description" content="{{ $meta_desc ?? 'TechBlogs.site brings you the latest technology news, AI updates, mobile reviews, gadgets, and digital trends. Stay updated with the future of technology' }}">
@if(!empty($faq_schema_encoded))
    <script type="application/ld+json">
        {!! $faq_schema_encoded !!}
    </script>
@endif
@if(!empty($meta_keywords))
<meta name="keywords" content="{{ $meta_keywords ?? 'tech blogs, technology insights, latest tech news, AI news, artificial intelligence, AI in healthcare, AI tools 2026, software development, web development, Laravel tutorials, PHP development, programming tips, coding best practices, SEO strategies, website security, tech trends USA, mobile technology news, gadget reviews, developer guides, cloud computing, API integration, machine learning, future of AI, tech tutorials, coding for beginners, freelance development, earn money online tech, startup technology, innovation news' }}">
@endif
@if(!empty($breadcrumb_schema_encoded))
    <script type="application/ld+json">
        {!! $breadcrumb_schema_encoded !!}
    </script>
@endif

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6175688413021049"
     crossorigin="anonymous"></script>
     <meta name="google-adsense-account" content="ca-pub-6175688413021049">
@php
$default_schema = [
    "@context" => "https://schema.org",
    "@type" => "BlogPosting",
    "headline" => "TechBlogs - Latest Technology News, Tips & Reviews",
    "image" => "https://techblogs.site/favicon.ico",
    "datePublished" => now()->toIso8601String(),
    "dateModified" => now()->toIso8601String(),
    "author" => [
        "@type" => "Person",
        "name" => "Admin"
    ],
    "publisher" => [
        "@type" => "Organization",
        "name" => "TechBlogs",
        "logo" => [
            "@type" => "ImageObject",
            "url" => url()->current()
        ]
    ],
    "description" => "Stay updated with the latest technology trends, tips, gadgets, software reviews, and insightful tech articles on TechBlogs.",
    "mainEntityOfPage" => [
        "@type" => "WebPage",
        "@id" => url()->current()
    ]
];
$meta_schema_json = json_encode($default_schema, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
@endphp

<script type="application/ld+json">
    {!! $meta_schema ?? $meta_schema_json !!}
</script>

<!-- SEO Meta Tags -->
<meta name="robots" content="index, follow, max-image-preview:large">
<link rel="canonical" href="{{ url()->current() }}" />

<!-- Open Graph -->
<meta property="og:title" content="{{ $meta_title ?? 'TechBlogs – Latest Tech News, AI & Mobile Reviews' }}">
<meta property="og:description" content="{{ $meta_desc ?? 'Get the latest tech news, AI updates, and mobile reviews. Stay ahead with tips and insights from TechBlogs.' }}">
<meta property="og:image" content="https://techblogs.site/favicon.ico">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="TechBlogs">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $meta_title ?? 'TechBlogs – Latest Tech News, AI & Mobile Reviews' }}">
<meta name="twitter:description" content="{{ $meta_desc ?? 'Get the latest tech news, AI updates, and mobile reviews. Stay ahead with tips and insights from TechBlogs.' }}">
<meta name="twitter:image" content="https://techblogs.site/favicon.ico">

<!-- Icons -->
<link rel="icon" type="image/x-icon" href="https://techblogs.site/favicon.ico">
<link rel="apple-touch-icon" href="https://techblogs.site/favicon.ico">

<!-- Performance Optimization -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://cdn.jsdelivr.net">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- SweetAlert CSS (optional) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-4FRZ5NP2M7"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-4FRZ5NP2M7');
</script>

<!-- Custom CSS -->
<style>
    :root {
        /* Modern Color Palette */
        --primary-color: #2563eb;
        --primary-dark: #1d4ed8;
        --secondary-color: #3b82f6;
        --accent-color: #f59e0b;
        --dark-bg: #0f172a;
        --light-bg: #f8fafc;
        --card-bg: #ffffff;
        --text-primary: #1e293b;
        --text-secondary: #64748b;
        --border-color: #e2e8f0;
        --success-color: #10b981;
        --error-color: #ef4444;

        /* Shadows */
        --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1);

        /* Transitions */
        --transition-fast: 150ms cubic-bezier(0.4, 0, 0.2, 1);
        --transition-base: 300ms cubic-bezier(0.4, 0, 0.2, 1);
        --transition-slow: 500ms cubic-bezier(0.4, 0, 0.2, 1);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        color: var(--text-primary);
        background-color: var(--light-bg);
        line-height: 1.6;
        overflow-x: hidden;
    }

    /* Typography */
    h1, h2, h3, h4, h5, h6 {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        line-height: 1.2;
        color: var(--text-primary);
    }

    h1 {
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
    }

    h2 {
        font-size: 2rem;
        margin-bottom: 1.25rem;
    }

    h3 {
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    p {
        margin-bottom: 1rem;
        color: var(--text-secondary);
    }

    a {
        text-decoration: none;
        color: var(--primary-color);
        transition: color var(--transition-fast);
    }

    a:hover {
        color: var(--primary-dark);
    }

    /* Utility Classes */
    .container {
        width: 100%;
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 1.5rem;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        font-weight: 500;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all var(--transition-fast);
        border: none;
        outline: none;
    }

    .btn-primary {
        background-color: var(--primary-color);
        color: white;
    }

    .btn-primary:hover {
        background-color: var(--primary-dark);
        color: white;
        transform: translateY(-1px);
        box-shadow: var(--shadow-lg);
    }

    .btn-outline {
        background-color: transparent;
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
    }

    .btn-outline:hover {
        background-color: var(--primary-color);
        color: white;
    }

    /* Header */
    .site-header {
        position: sticky;
        top: 0;
        z-index: 1000;
        background-color: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid var(--border-color);
        transition: all var(--transition-base);
    }

    .site-header.scrolled {
        box-shadow: var(--shadow-lg);
    }

    .header-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem 0;
    }

    /* Logo */
    .logo {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        text-decoration: none;
    }

    .logo-img {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        object-fit: contain;
    }

    .logo-text {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        font-size: 1.5rem;
        color: var(--text-primary);
        letter-spacing: -0.5px;
    }

    .logo-text span {
        color: var(--primary-color);
    }

    /* Navigation */
    .nav-desktop {
        display: flex;
        align-items: center;
        gap: 2rem;
    }

    @media (max-width: 1024px) {
        .nav-desktop {
            display: none;
        }
    }

    .nav-links {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        list-style: none;
    }

    .nav-link {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 0.75rem;
        color: var(--text-secondary);
        font-weight: 500;
        font-size: 0.875rem;
        text-decoration: none;
        border-radius: 0.5rem;
        transition: all var(--transition-fast);
    }

    .nav-link i {
        font-size: 1rem;
    }

    .nav-link:hover {
        color: var(--primary-color);
        background-color: rgba(37, 99, 235, 0.05);
    }

    .nav-link.active {
        color: var(--primary-color);
        background-color: rgba(37, 99, 235, 0.1);
    }

    /* Header Actions */
    .header-actions {
        display: flex;
        align-items: center;
        gap: 1rem;
    }


    /* Search */
    .search-container {
        position: relative;
    }

    .search-input {
        padding: 0.5rem 1rem 0.5rem 2.5rem;
        border: 1px solid var(--border-color);
        border-radius: 2rem;
        font-size: 0.875rem;
        width: 240px;
        transition: all var(--transition-fast);
    }

    .search-input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .search-icon {
        position: absolute;
        left: 0.75rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-secondary);
        pointer-events: none;
    }

    /* Mobile Menu Toggle */
    .mobile-menu-toggle {
        display: none;
        align-items: center;
        justify-content: center;
        width: 44px;
        height: 44px;
        border-radius: 0.5rem;
        background: transparent;
        border: none;
        color: var(--text-secondary);
        cursor: pointer;
        transition: all var(--transition-fast);
    }

    .mobile-menu-toggle:hover {
        color: var(--primary-color);
        background-color: rgba(37, 99, 235, 0.05);
    }

    @media (max-width: 1024px) {
        .mobile-menu-toggle {
            display: flex;
        }
    }

    /* Mobile Menu */
    .mobile-menu {
        position: fixed;
        top: 0;
        right: -100%;
        width: 320px;
        height: 100vh;
        background-color: var(--card-bg);
        z-index: 1100;
        transition: right var(--transition-base);
        box-shadow: var(--shadow-xl);
        overflow-y: auto;
    }

    .mobile-menu.active {
        right: 0;
    }

    .mobile-menu-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1.5rem;
        border-bottom: 1px solid var(--border-color);
    }

    .mobile-menu-close {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: transparent;
        border: none;
        color: var(--text-secondary);
        cursor: pointer;
        transition: all var(--transition-fast);
    }

    .mobile-menu-close:hover {
        color: var(--error-color);
        background-color: rgba(239, 68, 68, 0.05);
    }

    .mobile-nav-links {
        padding: 1.5rem;
        list-style: none;
    }

    .mobile-nav-link {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem 1rem;
        color: var(--text-secondary);
        text-decoration: none;
        border-radius: 0.5rem;
        transition: all var(--transition-fast);
        margin-bottom: 0.5rem;
    }

    .mobile-nav-link i {
        width: 20px;
        text-align: center;
    }

    .mobile-nav-link:hover,
    .mobile-nav-link.active {
        color: var(--primary-color);
        background-color: rgba(37, 99, 235, 0.05);
    }



    .mobile-menu-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1099;
        opacity: 0;
        visibility: hidden;
        transition: all var(--transition-base);
    }

    .mobile-menu-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    /* Main Content */
    .main-content {
        min-height: calc(100vh - 200px);
        padding: 3rem 0;
    }

    /* Hero Section */
    .hero-section {
        padding: 4rem 0;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        color: white;
        border-radius: 1rem;
        margin-bottom: 3rem;
    }

    .hero-title {
        color: white;
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .hero-description {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1.25rem;
        max-width: 600px;
        margin-bottom: 2rem;
    }

    /* Cards */
    .card {
        background-color: var(--card-bg);
        border-radius: 1rem;
        border: 1px solid var(--border-color);
        overflow: hidden;
        transition: all var(--transition-base);
    }

    .card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-xl);
    }

    .card-header {
        padding: 1.5rem;
        border-bottom: 1px solid var(--border-color);
    }

    .card-body {
        padding: 1.5rem;
    }

    /* Footer */
    .site-footer {
        background-color: var(--dark-bg);
        color: white;
        padding: 4rem 0 2rem;
    }

    .footer-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
        margin-bottom: 3rem;
    }

    @media (max-width: 768px) {
        .footer-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 480px) {
        .footer-grid {
            grid-template-columns: 1fr;
        }
    }

    .footer-title {
        color: white;
        font-size: 1.125rem;
        margin-bottom: 1.5rem;
    }

    .footer-links {
        list-style: none;
    }

    .footer-link {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 0;
        color: rgba(255, 255, 255, 0.7);
        text-decoration: none;
        transition: all var(--transition-fast);
    }

    .footer-link:hover {
        color: white;
        transform: translateX(4px);
    }

    .footer-bottom {
        text-align: center;
        padding-top: 2rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.5);
        font-size: 0.875rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .container {
            padding: 0 1rem;
        }

        h1 {
            font-size: 2rem;
        }

        h2 {
            font-size: 1.75rem;
        }

        .hero-title {
            font-size: 2.25rem;
        }

        .search-container {
            display: none;
        }
    }

    @media (max-width: 480px) {
        .logo-text {
            font-size: 1.25rem;
        }

        .hero-title {
            font-size: 1.75rem;
        }

        .hero-description {
            font-size: 1rem;
        }
    }

    /* Accessibility */
    .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border: 0;
    }

    :focus-visible {
        outline: 2px solid var(--primary-color);
        outline-offset: 2px;
    }
   .nav-links .nav-link {
    font-size: 12px !important;
}
</style>

<!-- Skip to Main Content -->
<a href="#main-content" class="sr-only">Skip to main content</a>

<!-- Header -->

    <div class="container">
        <div class="header-container">
            <!-- Logo -->
            <a href="{{ route('frontend.index') }}" class="logo">
                <img src="https://techblogs.site/favicon.ico" alt="TechBlogs Logo" class="logo-img">
                <span class="logo-text">Tech<span>Blogs</span></span>
            </a>

            <!-- Desktop Navigation -->
            <button class="mobile-menu-toggle" id="mobile-menu-toggle" aria-label="Open menu">
                    <i class="fas fa-bars"></i>
                </button>
            <nav class="nav-desktop" aria-label="Main Navigation">
                <ul class="nav-links">
                    <li>
                        <a href="{{ route('frontend.index') }}" class="nav-link {{ request()->routeIs('frontend.index') ? 'active' : '' }}">
                            <i class="fas fa-home"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('frontend.blogs') }}" class="nav-link {{ request()->routeIs('frontend.blogs') ? 'active' : '' }}">
                            <i class="fas fa-blog"></i>
                            <span>Blog</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('frontend.Aboute') }}" class="nav-link {{ request()->routeIs('frontend.Aboute') ? 'active' : '' }}">
                            <i class="fas fa-info-circle"></i>
                            <span>About</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('frontend.contect') }}" class="nav-link {{ request()->routeIs('frontend.contect') ? 'active' : '' }}">
                            <i class="fas fa-envelope"></i>
                            <span>Contact</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('frontend.praivacy-policy') }}" class="nav-link {{ request()->routeIs('frontend.praivacy-policy') ? 'active' : '' }}">
                            <i class="fas fa-user-shield"></i>
                            <span>Privacy Policy</span>
                        </a>
                    </li>
                    <li>
                         <a href="{{ route('frontend.terms-conditions') }}" class="nav-link {{ request()->routeIs('frontend.terms-conditions') ? 'active' : '' }}" >
                            <i class="fas fa-file-contract"></i>
                            <span>Terms & Conditions</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.techblogs.site/cookie-policy" class="nav-link {{ request()->routeIs('frontend.cookie') ? 'active' : '' }}">
                            <i class="fas fa-cookie-bite"></i>
                            <span>Cookie Policy</span>
                        </a>
                    </li>


                </ul>
            </nav>


        </div>
    </div>
</header>

<!-- Mobile Menu -->
<div class="mobile-menu-overlay" id="mobile-menu-overlay"></div>
<div class="mobile-menu" id="mobile-menu" role="dialog" aria-modal="true" aria-label="Mobile Menu">
    <div class="mobile-menu-header">
        <div class="logo">
            <img src="https://techblogs.site/favicon.ico" alt="TechBlogs Logo" class="logo-img">
            <span class="logo-text">Tech<span>Blogs</span></span>
        </div>
        <button class="mobile-menu-close" id="mobile-menu-close" aria-label="Close menu">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <ul class="mobile-nav-links">
        <li>
            <a href="{{ route('frontend.index') }}" class="mobile-nav-link {{ request()->routeIs('frontend.index') ? 'active' : '' }}">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="{{ route('frontend.blogs') }}" class="mobile-nav-link {{ request()->routeIs('frontend.blogs') ? 'active' : '' }}">
                <i class="fas fa-blog"></i>
                <span>Blog</span>
            </a>
        </li>
        <li>
            <a href="{{ route('frontend.Aboute') }}" class="mobile-nav-link {{ request()->routeIs('frontend.Aboute') ? 'active' : '' }}">
                <i class="fas fa-info-circle"></i>
                <span>About</span>
            </a>
        </li>
        <li>
            <a href="{{ route('frontend.terms-conditions') }}" class="mobile-nav-link {{ request()->routeIs('frontend.terms-conditions') ? 'active' : '' }}">
                <i class="fas fa-file-contract"></i>
                <span>Terms & Conditions</span>
            </a>
        </li>
        <li>
            <a href="{{ route('frontend.praivacy-policy') }}" class="mobile-nav-link {{ request()->routeIs('frontend.praivacy-policy') ? 'active' : '' }}">
                <i class="fas fa-shield-alt"></i>
                <span>Privacy Policy</span>
            </a>
        </li>
        <li>
            <a href="{{ route('frontend.contect') }}" class="mobile-nav-link {{ request()->routeIs('frontend.contect') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i>
                <span>Contact</span>
            </a>
        </li>
        <li>
            <a href="{{ route('frontend.cookie') }}" class="mobile-nav-link {{ request()->routeIs('frontend.cookie') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i>
                <span>Contact</span>
            </a>
        </li>
    </ul>
</div>

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Mobile Menu Functionality
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
    const mobileMenuClose = document.getElementById('mobile-menu-close');

    function openMobileMenu() {
        mobileMenu.classList.add('active');
        mobileMenuOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
        mobileMenuToggle.setAttribute('aria-expanded', 'true');
    }

    function closeMobileMenu() {
        mobileMenu.classList.remove('active');
        mobileMenuOverlay.classList.remove('active');
        document.body.style.overflow = '';
        mobileMenuToggle.setAttribute('aria-expanded', 'false');
    }

  if (mobileMenuToggle) {
    mobileMenuToggle.addEventListener('click', openMobileMenu);
}
    mobileMenuClose.addEventListener('click', closeMobileMenu);
    mobileMenuOverlay.addEventListener('click', closeMobileMenu);

    // Close mobile menu when pressing Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeMobileMenu();
    });

    // Header scroll effect
    const header = document.getElementById('site-header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Active link highlighting
    const currentPath = window.location.pathname;
    document.querySelectorAll('.nav-link, .mobile-nav-link').forEach(link => {
        if (link.getAttribute('href') === currentPath) {
            link.classList.add('active');
        }
    });

    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Flash messages
    @if(session('success'))
        Swal.fire({
            title: 'Success!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @endif

    @if(session('error'))
        Swal.fire({
            title: 'Error!',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    @endif
</script>
