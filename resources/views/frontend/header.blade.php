<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $meta_title ?? 'TechBlogs.site – Latest Tech News, AI, Mobiles & Digital Trends' }}</title>
    <meta name="mnd-ver" content="h9dolc7vzohgpncidf28q" />

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
            "url" =>  url()->current()
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

    <meta name="description" content="{{ $meta_desc ?? 'TechBlogs.site brings you the latest technology news, AI updates, mobile reviews, gadgets, and digital trends. Stay updated with the future of technology' }}">
    
    <script type="application/ld+json">
        {!! $meta_schema ?? $meta_schema_json !!}
    </script>
     
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta property="og:title" content="TechBlogs – Latest Tech News, AI & Mobile Reviews">
    <meta property="og:description" content="Get the latest tech news, AI updates, and mobile reviews. Stay ahead with tips and insights from TechBlogs.">
    <meta property="og:image" content="https://techblogs.site/favicon.ico">
    <meta property="og:url" content="https://techblogs.site/">
    <meta property="og:type" content="website">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <link rel="icon" type="image/png" href="https://techblogs.site/favicon.ico" sizes="32x32">
    <link rel="icon" type="image/png" href="https://techblogs.site/favicon.ico" sizes="16x16">
    <link rel="apple-touch-icon" sizes="180x180" href="https://techblogs.site/favicon.ico">
    <link rel="manifest" href="/site.webmanifest">
    
    <!-- Performance & CDN Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    
    <!-- Fonts & CSS -->
    <noscript>
        <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600;700;800&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    </noscript>
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    
    <!-- SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" defer></script>

    <!-- Google tag (gtag.js) -->
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
            --primary-gradient: linear-gradient(135deg, #82afff, #45ae0a);
            --hover-color: #ff7700;
            --text-color: #333;
            --white: #ffffff;
            --shadow: 0 4px 12px rgba(0,0,0,0.15);
            --transition: all 0.3s ease;
        }
        
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background: #f5f5f5; 
            line-height: 1.6;
        }
        
        /* Skip to content for accessibility */
        .skip-to-content {
            position: absolute;
            left: -9999px;
            top: 0;
            background: #000;
            color: #fff;
            padding: 10px;
            z-index: 9999;
            text-decoration: none;
        }
        .skip-to-content:focus {
            left: 10px;
            top: 10px;
        }

        /* Header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            min-height: 60px;
            background: var(--primary-gradient);
            color: var(--white);
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: var(--transition);
        }

        .logo { 
            display: flex; 
            align-items: center; 
            gap: 10px; 
            font-size: 26px; 
            font-weight: 800; 
            transition: transform 0.3s; 
        }
        .logo img { 
            width: 70px; 
            height: 70px; 
            max-width: 100%;
            height: auto;
            object-fit: contain; 
            border-radius: 5px; 
            transition: var(--transition); 
        }
        .logo img:hover { transform: scale(1.05); }
        
        .logo span {
            font-family: 'Orbitron', sans-serif;
            font-size: 26px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            position: relative;
            padding: 6px 14px;
            color: var(--white);
        }
        
        .logo span::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: -6px;
            transform: translateX(-50%);
            width: 70%;
            height: 3px;
            background: linear-gradient(90deg, #fff, #ffcc99, #fff);
            border-radius: 20px;
            box-shadow: 0 0 12px rgba(255,255,255,0.7);
        }
        
        .logo span::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 70%;
            background: var(--white);
            border-radius: 10px;
        }

        /* Navigation */
        nav ul { 
            list-style: none; 
            display: flex; 
            gap: 25px; 
            margin: 0; 
            padding: 0; 
        }
        
        nav ul li a {
            text-decoration: none; 
            color: var(--white); 
            font-weight: 600; 
            font-size: 16px;
            padding: 8px 12px; 
            border-radius: 5px; 
            display: flex; 
            align-items: center; 
            gap: 8px; 
            transition: var(--transition);
        }
        
        nav ul li a:hover, 
        nav ul li a.active { 
            background: var(--white); 
            color: #111111; 
        }

        /* Header Icons */
        .header-icons { 
            display: flex; 
            gap: 18px; 
            font-size: 18px; 
        }
        
        .header-icons a { 
            color: var(--white); 
            width: 40px; 
            height: 40px; 
            border-radius: 50%; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            transition: var(--transition); 
            box-shadow: 3px 3px 6px rgba(85,85,85,0.3);
        }
        
        .header-icons a:hover { 
            color: var(--hover-color); 
            background: var(--white); 
            transform: translateY(-2px); 
        }

        /* Hamburger Menu */
        .hamburger { 
            display: none; 
            font-size: 26px; 
            cursor: pointer; 
            width: 40px; 
            height: 40px; 
            border-radius: 50%; 
            align-items: center; 
            justify-content: center; 
            transition: var(--transition); 
        }
        
        .hamburger:hover { 
            background: rgba(255,255,255,0.2); 
        }

        /* Mobile Menu Overlay */
        .mobile-menu-overlay { 
            position: fixed; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 100%; 
            background: rgba(0,0,0,0.7); 
            z-index: 999; 
            display: none; 
            opacity: 0; 
            transition: opacity 0.3s;
        }
        
        .mobile-menu { 
            position: fixed; 
            top: 0; 
            right: -100%; 
            width: 100%; 
            max-width: 350px;
            height: 100%; 
            background: var(--white); 
            z-index: 1000; 
            transition: right 0.4s ease; 
            overflow-y: auto; 
            display: flex; 
            flex-direction: column;
        }
        
        .mobile-menu.show { 
            right: 0; 
        }

        .mobile-menu-header {
            background: var(--primary-gradient); 
            color: var(--white); 
            padding: 20px; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
        }
        
        .close-menu { 
            font-size: 24px; 
            cursor: pointer; 
            width: 40px; 
            height: 40px; 
            border-radius: 50%; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            transition: var(--transition); 
        }
        
        .close-menu:hover { 
            background: rgba(255,255,255,0.2); 
        }

        /* Mobile Navigation */
        .mobile-nav ul { 
            list-style: none; 
            margin: 0; 
            padding: 20px; 
            display: flex; 
            flex-direction: column; 
            gap: 5px; 
        }
        
        .mobile-nav ul li a {
            text-decoration: none;
            color: var(--text-color);
            font-weight: 600;
            padding: 12px 15px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: var(--transition);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100%;
        }
        
        .mobile-nav ul li a:hover, 
        .mobile-nav ul li a.active { 
            color: var(--white);
            background: var(--primary-gradient);
        }

        /* Mobile Icons */
        .mobile-icons { 
            display: flex; 
            justify-content: center; 
            gap: 18px; 
            padding: 20px; 
            border-top: 1px solid #eee; 
            margin-top: auto;
        }
        
        .mobile-icons a { 
            width: 50px; 
            height: 50px; 
            font-size: 22px; 
            border-radius: 50%; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            background: rgba(255,119,0,0.1); 
            color: var(--hover-color); 
            transition: var(--transition); 
        }
        
        .mobile-icons a:hover { 
            background: var(--hover-color); 
            color: var(--white); 
            transform: translateY(-2px); 
        }

        /* Main Content Area */
        .main-content {
            padding: 30px;
            min-height: calc(100vh - 200px);
        }

        /* Footer */
        footer {
            background: #333;
            color: var(--white);
            padding: 30px;
            text-align: center;
        }

        /* Responsive */
        @media(max-width: 768px) { 
            nav, .header-icons { display: none; } 
            .hamburger { display: flex; } 
            header { padding: 10px 20px; }
            .mobile-nav ul li a { font-size: 16px; }
        }
        
        @media(max-width: 480px) {
            .mobile-nav ul li a {
                font-size: 14px;
                gap: 6px;
                padding: 10px 12px;
            }
            .logo span {
                font-size: 20px;
                letter-spacing: 1px;
            }
            .logo img {
                width: 50px;
                height: 50px;
            }
        }
    </style>
</head>
<body>
    <!-- Skip to Content Link -->
    <a href="#main-content" class="skip-to-content">Skip to main content</a>

    <!-- Header -->
    <header>
        <div class="logo">
            <img src="https://techblogs.site/favicon.ico" alt="TechBlogs Logo">
            <span>Techblogs</span>
        </div>

        <div class="hamburger" id="hamburger" aria-label="Open menu" role="button" tabindex="0">
            <i class="fa-solid fa-bars"></i>
        </div>

        <!-- Desktop Menu -->
        <nav>
            <ul>
                <li><a href="{{ route('frontend.index') }}" class="{{ request()->routeIs('frontend.index') ? 'active' : '' }}"><i class="fa-solid fa-house"></i> Home</a></li>
                <li><a href="{{ route('frontend.Aboute') }}" class="{{ request()->routeIs('frontend.Aboute') ? 'active' : '' }}"><i class="fa-solid fa-info-circle"></i> About</a></li>
                <li><a href="{{ route('frontend.terms-conditions') }}" class="{{ request()->routeIs('frontend.terms-conditions') ? 'active' : '' }}"><i class="fa-solid fa-briefcase"></i> Terms and ..</a></li>
                <li><a href="{{ route('frontend.praivacy-policy') }}" class="{{ request()->routeIs('frontend.praivacy-policy') ? 'active' : '' }}"><i class="fa-solid fa-briefcase"></i> Privacy Policy</a></li>
                <li><a href="{{ route('frontend.contect') }}" class="{{ request()->routeIs('frontend.contect') ? 'active' : '' }}"><i class="fa-solid fa-phone"></i> Contact</a></li>
                <li><a href="{{ route('frontend.blogs') }}" class="{{ request()->routeIs('frontend.blogs') ? 'active' : '' }}"><i class="fa-solid fa-blog"></i> Blog</a></li>
            </ul>
        </nav>

        @php
        use App\Models\SocialMedia;
        $data = SocialMedia::first();
        @endphp
        
        <div class="header-icons">
            <a href="{{ optional($data)->facebook ?? '#' }}" title="Facebook" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="{{ optional($data)->twitter ?? '#' }}" title="Twitter" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>
            <a href="{{ optional($data)->youtube ?? '#' }}" title="YouTube" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
        </div>
    </header>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay" id="mobile-menu-overlay"></div>
    <div class="mobile-menu" id="mobile-menu">
        <div class="mobile-menu-header">
            <div class="logo">
                <img src="https://techblogs.site/favicon.ico" alt="TechBlogs Logo">
                <span>Techblogs</span>
            </div>
            <div class="close-menu" id="close-menu" aria-label="Close menu"><i class="fa-solid fa-times"></i></div>
        </div>

        <div class="mobile-nav">
            <ul>
                <li><a href="{{ route('frontend.index') }}" class="{{ request()->routeIs('frontend.index') ? 'active' : '' }}"><i class="fa-solid fa-house"></i> Home</a></li>
                <li><a href="{{ route('frontend.Aboute') }}" class="{{ request()->routeIs('frontend.Aboute') ? 'active' : '' }}"><i class="fa-solid fa-info-circle"></i> About</a></li>
                <li><a href="{{ route('frontend.terms-conditions') }}" class="{{ request()->routeIs('frontend.terms-conditions') ? 'active' : '' }}"><i class="fa-solid fa-briefcase"></i> Terms and Condition</a></li>
                <li><a href="{{ route('frontend.praivacy-policy') }}" class="{{ request()->routeIs('frontend.praivacy-policy') ? 'active' : '' }}"><i class="fa-solid fa-briefcase"></i> Privacy Policy</a></li>
                <li><a href="{{ route('frontend.contect') }}" class="{{ request()->routeIs('frontend.contect') ? 'active' : '' }}"><i class="fa-solid fa-phone"></i> Contact</a></li>
                <li><a href="{{ route('frontend.blogs') }}" class="{{ request()->routeIs('frontend.blogs') ? 'active' : '' }}"><i class="fa-solid fa-blog"></i> Blog</a></li>
            </ul>
        </div>

        <div class="mobile-icons">
            <a href="{{ optional($data)->facebook ?? '#' }}" title="Facebook" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="{{ optional($data)->twitter ?? '#' }}" title="Twitter" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>
            <a href="{{ optional($data)->instagram ?? '#' }}" title="Instagram" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
        </div>
    </div>

    

    

    <!-- Scripts -->
    <script>
        // Mobile Menu Toggle
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
        const closeMenu = document.getElementById('close-menu');
        const navLinks = document.querySelectorAll('.mobile-nav a');

        hamburger.addEventListener('click', () => {
            mobileMenu.classList.add('show');
            mobileMenuOverlay.style.display = 'block';
            mobileMenuOverlay.style.opacity = '1';
            document.body.style.overflow = 'hidden';
        });

        function closeMobileMenu() {
            mobileMenu.classList.remove('show');
            mobileMenuOverlay.style.opacity = '0';
            setTimeout(() => mobileMenuOverlay.style.display = 'none', 300);
            document.body.style.overflow = 'auto';
        }

        closeMenu.addEventListener('click', closeMobileMenu);
        mobileMenuOverlay.addEventListener('click', closeMobileMenu);
        navLinks.forEach(link => link.addEventListener('click', closeMobileMenu));

        // Active link highlighting
        const currentPath = window.location.pathname;
        document.querySelectorAll('nav a, .mobile-nav a').forEach(link => {
            try {
                const linkUrl = new URL(link.href);
                if (linkUrl.pathname === currentPath) {
                    link.classList.add('active');
                }
            } catch (e) {
                // Handle relative URLs
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            }
        });

        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if(window.scrollY > 50) {
                header.style.padding = '10px 30px';
                header.style.boxShadow = '0 4px 10px rgba(0,0,0,0.1)';
                header.style.background = 'var(--primary-gradient)';
            } else {
                header.style.padding = '15px 30px';
                header.style.boxShadow = 'var(--shadow)';
                header.style.background = 'var(--primary-gradient)';
            }
        });

        // Keyboard accessibility for hamburger
        hamburger.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                hamburger.click();
            }
        });

        closeMenu.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                closeMobileMenu();
            }
        });
    </script>

    <!-- Flash Messages -->
    @if(session('success'))
        <script>
            swal("Success!", "{{ session('success') }}", "success");
        </script>
    @endif

    @if(session('error'))
        <script>
            swal("Error!", "{{ session('error') }}", "error");
        </script>
    @endif
</body>
</html>