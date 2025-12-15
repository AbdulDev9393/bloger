<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>daliyblogs</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
<link rel="icon" href="{{ asset('storage/sitelogo.png') }}" type="image/x-icon">
<style>
  * {
    box-sizing: border-box;
  }

  body {
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f5f5f5;
  }

  /* Main content for demonstration */
  .content {
    padding: 30px;
    max-width: 1200px;
    margin: 0 auto;
  }

  /* Header */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 30px;  /* padding thoda kam rakha */
    min-height: 60px;     /* header ka height limit */
    background: linear-gradient(135deg, #ff7700, #ff5500);
    color: #fff;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    position: sticky;
    top: 0;
    z-index: 1000;
    transition: all 0.3s ease;
}


  /* Logo */
  .logo {
    font-size: 26px;
    font-weight: 800;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: transform 0.3s;
  }

  .logo:hover {
    transform: scale(1.05);
  }

  .logo i {
    font-size: 28px;
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
    color: #fff;
    font-weight: 600;
    font-size: 16px;
    padding: 8px 12px;
    border-radius: 5px;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  nav ul li a:hover {
    color: #ff7700;
    background-color: #fff;
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
  }

  /* Header icons */
  .header-icons {
    display: flex;
    gap: 18px;
    font-size: 18px;
  }

  .header-icons a {
    color: #fff;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s;
    position: relative;
     box-shadow: 3px 3px 6px #555;
  }

  .header-icons a:hover {
    color: #ff7700;
    background-color: #fff;
    transform: translateY(-2px);
    box-shadow: #555 3px;
  }

  /* Notification badge */
  .badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background-color: #ff3333;
    color: white;
    border-radius: 50%;
    width: 18px;
    height: 18px;
    font-size: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
  }

  /* Hamburger menu for mobile */
  .hamburger {
    display: none;
    font-size: 26px;
    cursor: pointer;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    align-items: center;
    justify-content: center;
    transition: all 0.3s;
  }

  .hamburger:hover {
    background-color: rgba(255, 255, 255, 0.2);
  }

  /* Mobile menu overlay */
  .mobile-menu-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 999;
    display: none;
    opacity: 0;
    transition: opacity 0.3s;
  }

  /* Mobile menu panel */
  .mobile-menu {
    position: fixed;
    top: 0;
    right: -100%;
    width: 280px;
    height: 100%;
    background-color: #fff;
    box-shadow: -5px 0 15px rgba(0,0,0,0.1);
    z-index: 1000;
    transition: right 0.4s ease;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
  }

  .mobile-menu-header {
    background: linear-gradient(135deg, #ff7700, #ff5500);
    color: white;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .mobile-menu-header .logo {
    font-size: 22px;
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
    transition: all 0.3s;
  }

  .close-menu:hover {
    background-color: rgba(255, 255, 255, 0.2);
  }

  .mobile-nav {
    padding: 20px;
  }

  .mobile-nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 5px;
  }

  .mobile-nav ul li a {
    text-decoration: none;
    color: #333;
    font-weight: 600;
    padding: 15px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    gap: 15px;
    transition: all 0.3s;
  }

  .mobile-nav ul li a:hover,
  .mobile-nav ul li a.active {
    color: #ff7700;
    background-color: rgba(255, 119, 0, 0.1);
  }

  .mobile-nav ul li a i {
    width: 24px;
    text-align: center;
    font-size: 18px;
  }

.mobile-icons {
  display: flex;
  justify-content: center;
  gap: 18px; /* space between icons */
  padding: 15px 0; /* top-bottom padding */
  border-top: 1px solid #eee;
}

.mobile-icons a {
  width: 50px;
  height: 50px;
  font-size: 22px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgba(255, 119, 0, 0.1);
  color: #ff7700;
  transition: all 0.3s ease;
}

.mobile-icons a:hover {
  background-color: #ff7700;
  color: white;
  transform: translateY(-2px);
}


  /* Tablet styles (768px - 1024px) */
  @media (max-width: 1024px) {
    header {
      padding: 15px 20px;
    }
    
    nav ul {
      gap: 15px;
    }
    
    .header-icons {
      gap: 12px;
    }
    
    .header-icons a {
      width: 36px;
      height: 36px;
    }
  }

  /* Mobile styles */
  @media (max-width: 768px) {
    header {
      padding: 12px 15px;
    }
    
    .logo {
      font-size: 22px;
    }
    
    .logo i {
      font-size: 24px;
    }
    
    nav,
    .header-icons {
      display: none;
    }
    
    .hamburger {
      display: flex;
    }
    
    .mobile-menu.show {
      right: 0;
    }
    
    .mobile-menu-overlay.show {
      display: block;
      opacity: 1;
    }
  }

  /* Small mobile styles */
  @media (max-width: 480px) {
    header {
      padding: 10px 12px;
    }
    
    .logo {
      font-size: 20px;
    }
    
    .logo span {
      display: none;
    }
    
    .hamburger {
      width: 36px;
      height: 36px;
      font-size: 22px;
    }
    
    .mobile-menu {
      width: 100%;
    }
  }

  /* Demo content styles */
  .content h1 {
    color: #333;
    margin-top: 0;
  }
  
  .content p {
    line-height: 1.6;
    color: #555;
  }
  
  .demo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 30px;
  }
  
  .demo-card {
    background: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    transition: transform 0.3s;
  }
  
  .demo-card:hover {
    transform: translateY(-5px);
  }
  
  .demo-card h3 {
    color: #ff7700;
    margin-top: 0;
  }


 .logo img {
      width: 70px;          /* thodi badi image */
    height: 70px;
    object-fit: contain;
    border-radius: 5px; /* optional */
    transition: all 0.3s ease;
}

/* Logo hover effect */
header .logo img:hover {
    transform: scale(1.05);
}

/* Logo text spacing */
.logo span {
    margin-left: 10px;
    font-size: 22px;
    font-weight: 800;
    color: #fff;
    vertical-align: middle;
}

/* Mobile adjustments */
@media (max-width: 768px) {
    header {
        padding: 8px 15px;
        min-height: 50px;
    }
    header .logo img {
        width: 100px;
        height:60px;
    }
    header .logo span {
        font-size: 18px;
    }
}

@media (max-width: 480px) {
    header {
        padding: 6px 12px;
        min-height: 45px;
    }
    header .logo img {
        width: 40px;
        height: 40px;
    }
    header .logo span {
        display: none; /* hide text on very small screens */
    }
}
@media (max-width: 768px) {
  .mobile-icons a {
    width: 45px;
    height: 45px;
    font-size: 20px;
  }
}

/* Adjust icons for small mobiles */
@media (max-width: 480px) {
  .mobile-icons a {
    width: 40px;
    height: 40px;
    font-size: 18px;
  }
}
</style>
</head>
<body>

<header>
  <div class="logo">
   <img src="{{ asset('storage/sitelogo.png') }}" alt="Site Logo">
    <span>daliyblogs</span>
  </div>

  <!-- Hamburger icon -->
  <div class="hamburger" id="hamburger">
    <i class="fa-solid fa-bars"></i>
  </div>

  <!-- Desktop Navigation -->
  <nav>
    <ul id="nav-links">
      <li><a href="{{route('frontend.index')}}" class="active"><i class="fa-solid fa-house"></i> Home</a></li>
      <li><a href="{{route('frontend.Aboute')}}"><i class="fa-solid fa-info-circle"></i> About</a></li>
      <li><a href="{{route('frontend.Services')}}"><i class="fa-solid fa-briefcase"></i> Services</a></li>
      <li><a href="{{route('frontend.contect')}}"><i class="fa-solid fa-phone"></i> Contact</a></li>
      <li><a href="{{route('frontend.blogs')}}"><i class="fa-solid fa-blog"></i> Blog</a></li>
    </ul>
  </nav>

  <!-- Desktop Header Icons -->
  <div class="header-icons">
    <a href="#" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
    <a href="#" title="Twitter"><i class="fa-brands fa-twitter"></i></a>
    <a href="#" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
   
  </div>
</header>

<!-- Mobile Menu Overlay -->
<div class="mobile-menu-overlay" id="mobile-menu-overlay"></div>

<!-- Mobile Menu Panel -->
<div class="mobile-menu" id="mobile-menu">
  <div class="mobile-menu-header">
    <div class="logo">
         <img src="{{ asset('storage/sitelogo.png') }}" alt="Site Logo">
     
      <span>daliyblogs</span>
    </div>
    <div class="close-menu" id="close-menu">
      <i class="fa-solid fa-times"></i>
    </div>
  </div>
  
  <div class="mobile-nav">
    <ul>
      <li><a href="{{route('frontend.index')}}" class="active"><i class="fa-solid fa-house"></i> Home</a></li>
      <li><a href="{{route('frontend.Aboute')}}"><i class="fa-solid fa-info-circle"></i> About</a></li>
      <li><a href="{{route('frontend.Services')}}"><i class="fa-solid fa-briefcase"></i> Services</a></li>
      <li><a href="{{route('frontend.contect')}}"><i class="fa-solid fa-phone"></i> Contact</a></li>
      <li><a href="{{route('frontend.blogs')}}"><i class="fa-solid fa-blog"></i> Blog</a></li>
      <li><a href="#"><i class="fa-solid fa-gear"></i> Settings</a></li>
      <li><a href="#"><i class="fa-solid fa-question-circle"></i> Help</a></li>
    </ul>
  </div>
  
  <div class="mobile-icons">
    <a href="#" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
    <a href="#" title="Twitter"><i class="fa-brands fa-twitter"></i></a>
    <a href="#" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
   
  </div>
</div>



<script>
  const hamburger = document.getElementById('hamburger');
  const mobileMenu = document.getElementById('mobile-menu');
  const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
  const closeMenu = document.getElementById('close-menu');
  const navLinks = document.querySelectorAll('.mobile-nav a');

  // Open mobile menu
  hamburger.addEventListener('click', () => {
    mobileMenu.classList.add('show');
    mobileMenuOverlay.classList.add('show');
    document.body.style.overflow = 'hidden';
  });

  // Close mobile menu
  function closeMobileMenu() {
    mobileMenu.classList.remove('show');
    mobileMenuOverlay.classList.remove('show');
    document.body.style.overflow = 'auto';
  }

  closeMenu.addEventListener('click', closeMobileMenu);
  mobileMenuOverlay.addEventListener('click', closeMobileMenu);

  // Close menu when clicking on a link
  navLinks.forEach(link => {
    link.addEventListener('click', closeMobileMenu);
  });

  // Highlight active link
  const currentPage = window.location.pathname;
  document.querySelectorAll('nav a, .mobile-nav a').forEach(link => {
    if (link.getAttribute('href') === currentPage || link.classList.contains('active')) {
      link.classList.add('active');
    }
    
    link.addEventListener('click', function() {
      document.querySelectorAll('nav a, .mobile-nav a').forEach(item => {
        item.classList.remove('active');
      });
      this.classList.add('active');
    });
  });

  // Add scroll effect to header
  window.addEventListener('scroll', function() {
    const header = document.querySelector('header');
    if (window.scrollY > 50) {
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