<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $meta_title?? 'TechBlogs - Latest Technology News, Tips & Reviews' }}</title>

    <!-- Dynamic Meta Description -->
    @php
$default_schema = <<<JSON
{
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "headline": "TechBlogs - Latest Technology News, Tips & Reviews",
    "image": "{{ asset('storage/default.png') }}",
    "datePublished": "{{ now()->toIso8601String() }}",
    "dateModified": "{{ now()->toIso8601String() }}",
    "author": {
        "@type": "Person",
        "name": "Admin"
    },
    "publisher": {
        "@type": "Organization",
        "name": "TechBlogs",
        "logo": {
            "@type": "ImageObject",
            "url": "http://localhost/bloger/public/storage/sitelogo.png"
        }
    },
    "description": "Stay updated with the latest technology trends, tips, gadgets, software reviews, and insightful tech articles on TechBlogs. Discover, learn, and explore the world of technology"
}
JSON;
@endphp
    <meta name="description" content="{{ $meta_desc ?? 'Stay updated with the latest technology trends, tips, gadgets, software reviews, and insightful tech articles on TechBlogs' }}">
<script type="application/ld+json">
{!! $meta_schema ?? $default_schema !!}
</script>

    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Open Graph -->
    <meta property="og:title" content='daliyblogs' />
    <meta property="og:description" content='Read latest blogs on daliyblogs'/>
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="https://techblogs.site/storage/blogs/favicon.ico" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $Blog_info->Title ?? 'daliyblogs' }}" />
    <meta name="twitter:description" content="{{ $Blog_info->Meta_Description ?? 'Read latest blogs on daliyblogs' }}" />
    <meta name="twitter:image" content="{{ asset($Blog_info->Thumbnail_Image ?? 'storage/default.png') }}" />

    <!-- Favicon -->
    <link rel="icon" href="https://techblogs.site/storage/sitelogo.png" type="image/x-icon">

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- JSON-LD Schema -->



    <!-- Custom CSS -->
    <style>
        * { box-sizing: border-box; }
        body { margin:0; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background:#f5f5f5; }
        header { display:flex; justify-content:space-between; align-items:center; padding:10px 30px; min-height:60px;
                 background:linear-gradient(135deg,#ff7700,#ff5500); color:#fff; box-shadow:0 4px 12px rgba(0,0,0,0.15);
                 position:sticky; top:0; z-index:1000; transition: all 0.3s ease; }

        .logo { display:flex; align-items:center; gap:10px; font-size:26px; font-weight:800; transition: transform 0.3s; }
        .logo img { width:70px; height:70px; object-fit:contain; border-radius:5px; transition: all 0.3s ease; }
        .logo img:hover { transform: scale(1.05); }
        .logo span { margin-left:10px; font-size:22px; font-weight:800; color:#fff; }

        nav ul { list-style:none; display:flex; gap:25px; margin:0; padding:0; }
        nav ul li a { text-decoration:none; color:#fff; font-weight:600; font-size:16px; padding:8px 12px;
                      border-radius:5px; display:flex; align-items:center; gap:8px; transition:all 0.3s; }
        nav ul li a:hover { color:#ff7700; background:#fff; box-shadow:0 3px 8px rgba(0,0,0,0.1); }

        .header-icons { display:flex; gap:18px; font-size:18px; }
        .header-icons a { color:#fff; width:40px; height:40px; border-radius:50%; display:flex; align-items:center;
                          justify-content:center; transition:all 0.3s; position:relative; box-shadow:3px 3px 6px #555; }
        .header-icons a:hover { color:#ff7700; background:#fff; transform:translateY(-2px); }

        .hamburger { display:none; font-size:26px; cursor:pointer; width:40px; height:40px; border-radius:50%;
                     align-items:center; justify-content:center; transition:all 0.3s; }
        .hamburger:hover { background:rgba(255,255,255,0.2); }

        .mobile-menu-overlay { position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.7);
                               z-index:999; display:none; opacity:0; transition:opacity 0.3s; }

        .mobile-menu { position:fixed; top:0; right:-100%; width:280px; height:100%; background:#fff; z-index:1000;
                       transition:right 0.4s ease; overflow-y:auto; display:flex; flex-direction:column; }
        .mobile-menu.show { right:0; }
        .mobile-menu-header { background:linear-gradient(135deg,#ff7700,#ff5500); color:#fff; padding:20px;
                              display:flex; justify-content:space-between; align-items:center; }
        .close-menu { font-size:24px; cursor:pointer; width:40px; height:40px; border-radius:50%; display:flex;
                      align-items:center; justify-content:center; transition:all 0.3s; }
        .close-menu:hover { background:rgba(255,255,255,0.2); }
        .mobile-nav ul { list-style:none; margin:0; padding:0; display:flex; flex-direction:column; gap:5px; }
        .mobile-nav ul li a { text-decoration:none; color:#333; font-weight:600; padding:15px; border-radius:8px; display:flex;
                              align-items:center; gap:15px; transition:all 0.3s; }
        .mobile-nav ul li a:hover, .mobile-nav ul li a.active { color:#ff7700; background:rgba(255,119,0,0.1); }

        .mobile-icons { display:flex; justify-content:center; gap:18px; padding:15px 0; border-top:1px solid #eee; }
        .mobile-icons a { width:50px; height:50px; font-size:22px; border-radius:50%; display:flex; align-items:center;
                          justify-content:center; background:rgba(255,119,0,0.1); color:#ff7700; transition:all 0.3s ease; }
        .mobile-icons a:hover { background:#ff7700; color:white; transform:translateY(-2px); }

        @media(max-width:768px) { nav, .header-icons { display:none; } .hamburger { display:flex; } }
        @media(max-width:480px) { .logo span { display:none; } .mobile-menu { width:100%; } }
    </style>
</head>
<body>

    <!-- Session Alerts -->
    @if(session('success'))
        <script>swal("Success!", {!! json_encode(session('success')) !!}, "success");</script>
    @endif
    @if(session('error'))
        <script>swal("Error!", {!! json_encode(session('error')) !!}, "error");</script>
    @endif

    <!-- Header -->
    <header>
        <div class="logo">
            <img src="{{ asset('storage/sitelogo.png') }}" alt="Site Logo">
            <span>daliyblogs</span>
        </div>

        <div class="hamburger" id="hamburger"><i class="fa-solid fa-bars"></i></div>

        <nav>
            <ul>
                <li><a href="{{ route('frontend.index') }}" class="active"><i class="fa-solid fa-house"></i> Home</a></li>
                <li><a href="{{ route('frontend.Aboute') }}"><i class="fa-solid fa-info-circle"></i> About</a></li>
                <li><a href="{{ route('frontend.Services') }}"><i class="fa-solid fa-briefcase"></i> Services</a></li>
                <li><a href="{{ route('frontend.contect') }}"><i class="fa-solid fa-phone"></i> Contact</a></li>
                <li><a href="{{ route('frontend.blogs') }}"><i class="fa-solid fa-blog"></i> Blog</a></li>
            </ul>
        </nav>

        <div class="header-icons">
            <a href="#" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#" title="Twitter"><i class="fa-brands fa-twitter"></i></a>
            <a href="#" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
        </div>
    </header>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay" id="mobile-menu-overlay"></div>
    <div class="mobile-menu" id="mobile-menu">
        <div class="mobile-menu-header">
            <div class="logo">
                <img src="{{ asset('storage/sitelogo.png') }}" alt="Site Logo">
                <span>daliyblogs</span>
            </div>
            <div class="close-menu" id="close-menu"><i class="fa-solid fa-times"></i></div>
        </div>

        <div class="mobile-nav">
            <ul>
                <li><a href="{{ route('frontend.index') }}" class="active"><i class="fa-solid fa-house"></i> Home</a></li>
                <li><a href="{{ route('frontend.Aboute') }}"><i class="fa-solid fa-info-circle"></i> About</a></li>
                <li><a href="{{ route('frontend.Services') }}"><i class="fa-solid fa-briefcase"></i> Services</a></li>
                <li><a href="{{ route('frontend.contect') }}"><i class="fa-solid fa-phone"></i> Contact</a></li>
                <li><a href="{{ route('frontend.blogs') }}"><i class="fa-solid fa-blog"></i> Blog</a></li>
            </ul>
        </div>

        <div class="mobile-icons">
            <a href="#" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#" title="Twitter"><i class="fa-brands fa-twitter"></i></a>
            <a href="#" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
        const closeMenu = document.getElementById('close-menu');
        const navLinks = document.querySelectorAll('.mobile-nav a');

        hamburger.addEventListener('click', () => {
            mobileMenu.classList.add('show');
            mobileMenuOverlay.classList.add('show');
            document.body.style.overflow = 'hidden';
        });

        function closeMobileMenu() {
            mobileMenu.classList.remove('show');
            mobileMenuOverlay.classList.remove('show');
            document.body.style.overflow = 'auto';
        }

        closeMenu.addEventListener('click', closeMobileMenu);
        mobileMenuOverlay.addEventListener('click', closeMobileMenu);
        navLinks.forEach(link => link.addEventListener('click', closeMobileMenu));

        const currentPage = window.location.pathname;
        document.querySelectorAll('nav a, .mobile-nav a').forEach(link => {
            if(link.getAttribute('href') === currentPage || link.classList.contains('active')) {
                link.classList.add('active');
            }
            link.addEventListener('click', function() {
                document.querySelectorAll('nav a, .mobile-nav a').forEach(item => item.classList.remove('active'));
                this.classList.add('active');
            });
        });

        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if(window.scrollY > 50) {
                header.style.padding = '10px 30px';
                header.style.boxShadow = '0 4px 10px rgba(0,0,0,0.1)';
            } else {
                header.style.padding = '15px 30px';
                header.style.boxShadow = '0 4px 12px rgba(0,0,0,0.15)';
            }
        });
    </script>
</body>
</html>
