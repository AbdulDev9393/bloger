<style>




  footer {
    background: linear-gradient(135deg, #1a1a2e, #16213e);
    color: #fff;
    padding: 60px 20px 30px;
    margin-top: auto;
    position: relative;
    overflow: hidden;
  }

  /* Decorative background elements */
  footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #0014ff, #10ff00);
  }

  /* Footer container */
  .footer-container {
    max-width: 1200px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
  }

  /* Footer grid layout */
  .footer-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 40px;
    margin-bottom: 40px;
  }

  /* Footer logo section */
  .footer-brand {
    grid-column: span 1;
  }

  .footer-logo {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 20px;
  }

  /* Placeholder for logo image */
  .logo-placeholder {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #ff7700, #ff5500);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    font-weight: bold;
    color: white;
  }

  .footer-logo span {
          font-family: 'Orbitron', sans-serif; /* Stylish futuristic font */
    font-size: 26px;
    font-weight: 800;
    background: linear-gradient(to right, #115ae1, #1ff539);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
  }

  .footer-desc {
    font-size: 15px;
    color: rgba(255,255,255,0.8);
    line-height: 1.6;
    margin-bottom: 25px;
  }

  /* Footer sections */
  .footer-section h3 {
    font-size: 18px;
    margin-bottom: 20px;
    color: #fff;
    position: relative;
    padding-bottom: 10px;
  }

  .footer-section h3::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 40px;
    height: 3px;
    background: #004eff;
  }

  .footer-links {
    display: flex;
    flex-direction: column;
    gap: 12px;
  }

  .footer-links a {
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .footer-links a:hover {
    color: rgb(13 110 253);
    transform: translateX(5px);
  }

  .footer-links a i {
    width: 20px;
    text-align: center;
    color: #0196ff;
  }

  /* Contact info */
  .contact-info {
    display: flex;
    flex-direction: column;
    gap: 15px;
  }

  .contact-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    color: rgba(255,255,255,0.8);
  }

  .contact-item i {
    color: #ff7700;
    font-size: 16px;
    margin-top: 3px;
  }

  /* Newsletter */
  .newsletter-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
  }

  .newsletter-form p {
    color: rgba(255,255,255,0.8);
    font-size: 14px;
    margin-bottom: 10px;
  }

  .newsletter-input {
    position: relative;
  }

  .newsletter-input input {
    width: 100%;
    padding: 14px 20px;
    border-radius: 30px;
    border: none;
    background: rgba(255,255,255,0.1);
    color: white;
    font-size: 15px;
    outline: none;
    transition: all 0.3s;
  }

  .newsletter-input input:focus {
    background: rgba(255,255,255,0.15);
    box-shadow: 0 0 0 2px rgba(255, 119, 0, 0.3);
  }

  .newsletter-input button {
    position: absolute;
    right: 5px;
    top: 5px;
    padding: 10px 20px;
    border-radius: 25px;
    border: none;
   background: linear-gradient(135deg, #0037ff, #10ff00);
    color: white;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
  }

  .newsletter-input button:hover {
    background: linear-gradient(135deg, #ff6600, #ff4400);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(255, 119, 0, 0.4);
  }

  /* Footer bottom */
  .footer-bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 30px;
    border-top: 1px solid rgba(255,255,255,0.1);
    flex-wrap: wrap;
    gap: 20px;
  }

  .footer-social {
    display: flex;
    gap: 15px;
  }

  .footer-social a {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255,255,255,0.1);
    color: #fff;
    font-size: 18px;
    transition: all 0.3s;
  }

  .footer-social a:hover {
    background: linear-gradient(90deg, #0014ff, #10ff00);
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(255, 119, 0, 0.4);
  }

  .footer-copy {
    font-size: 14px;
    color: rgba(255,255,255,0.7);
  }

  .footer-legal {
    display: flex;
    gap: 20px;
  }

  .footer-legal a {
    color: rgba(255,255,255,0.7);
    text-decoration: none;
    font-size: 14px;
    transition: color 0.3s;
  }

  .footer-legal a:hover {
    color: #ff7700;
  }

  /* Back to top button */
.back-to-top {
  position: fixed;  /* Change from absolute to fixed */
  right: 20px;
  bottom: 30px;     /* bottom instead of top */
  width: 50px;
  height: 50px;
  border-radius: 50%;
     background: linear-gradient(135deg, #2255b1, #33ff00);
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-size: 20px;
  cursor: pointer;
  transition: all 0.4s;
  box-shadow: 0 5px 15px rgba(0,0,0,0.2);
  opacity: 0;      /* initially hidden */
  visibility: hidden;
  z-index: 9999;   /* ensure above all elements */
}

.back-to-top:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.3);
}
  /* Responsive adjustments */
  @media (max-width: 1024px) {
    .footer-grid {
      grid-template-columns: repeat(2, 1fr);
      gap: 40px 30px;
    }
    
    .footer-brand {
      grid-column: span 2;
    }
  }

  @media (max-width: 768px) {
    .footer-grid {
      grid-template-columns: 1fr;
      gap: 30px;
    }
    
    .footer-brand {
      grid-column: span 1;
    }
    
    .footer-bottom {
      flex-direction: column;
      text-align: center;
      gap: 15px;
    }
    
    .footer-legal {
      justify-content: center;
      flex-wrap: wrap;
      gap: 15px;
    }
    
    .back-to-top {
      width: 45px;
      height: 45px;
      font-size: 18px;
      top: -22px;
    }
  }

  @media (max-width: 480px) {
    footer {
      padding: 40px 15px 20px;
    }
    
    .footer-logo {
      flex-direction: column;
      text-align: center;
      gap: 10px;
    }
    
    .logo-placeholder {
      width: 50px;
      height: 50px;
      font-size: 20px;
    }
    
    .footer-logo span {
      font-size: 22px;
    }
    
    .footer-section h3 {
      font-size: 16px;
    }
    
    .footer-social a {
      width: 36px;
      height: 36px;
      font-size: 16px;
    }
    
    .newsletter-input input {
      padding: 12px 15px;
      font-size: 14px;
    }
    
    .newsletter-input button {
      padding: 8px 15px;
      font-size: 14px;
    }
  }

  /* Logo image styling */
.footer-logo img {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  object-fit: contain;
  background: linear-gradient(135deg, #0072ff, #00ff1f);
  padding: 5px;
  border: 2px solid rgba(255, 255, 255, 0.2);
  transition: all 0.3s ease;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.footer-logo img:hover {
  transform: scale(1.1) rotate(5deg);
  border-color: rgba(255, 255, 255, 0.4);
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
}

/* Responsive adjustments for logo image */
@media (max-width: 768px) {
  .footer-logo img {
    width: 100px;
    height: 100px;
  }
}

@media (max-width: 480px) {
  .footer-logo img {
    width: 70px;
    height: 70px;
    padding: 4px;
  }
  
  .footer-logo {
    flex-direction: column;
    text-align: center;
    gap: 10px;
  }
}
</style>

@php
   use App\Models\SocialMedia;
   $data=SocialMedia::first();
   @endphp
  <!-- Footer -->
  <footer>
    <div class="footer-container">
      <!-- Back to top button -->
     <div class="back-to-top" id="backToTop">
  <i class="fa-solid fa-arrow-up"></i>
</div>


      <!-- Footer grid -->
      <div class="footer-grid">
        <!-- Brand section -->
<div class="footer-brand">
  <div class="footer-logo">
   <img 
    src="https://techblogs.site/favicon.ico" 
    alt="Daily Blogs Logo"
    title="Daily Blogs"
    width="32"
    height="32"
    loading="lazy"
>
    <span>Techblogs</span>
  </div>
  <p class="footer-desc">
    Explore latest blogs, tips, and tutorials. Stay updated with daily content crafted for you. Join our community of passionate readers and writers.
  </p>
</div>

        <!-- Quick links -->
        <div class="footer-section">
          <h3>Quick Links</h3>
          <div class="footer-links">
            <a href="{{route('frontend.index')}}"><i class="fa-solid fa-chevron-right"></i> Home</a>
            <a href="{{route('frontend.Aboute')}}"><i class="fa-solid fa-chevron-right"></i> About Us</a>
            <a href="{{route('frontend.terms-conditions')}}"><i class="fa-solid fa-chevron-right"></i> Terms Condition</a>
             <a href="{{route('frontend.praivacy-policy')}}"><i class="fa-solid fa-chevron-right"></i> Privacy Policy</a>
            <a href="{{route('frontend.blogs')}}"><i class="fa-solid fa-chevron-right"></i> Blog</a>
            <a href="{{route('frontend.contect')}}"><i class="fa-solid fa-chevron-right"></i> Contact</a>
              <a href="https://www.sigmatraffic.com">Buy traffic for your website</a>
              <a href="https://mondiad.com?refid=27739" target="_blank" title="Mondiad.com">Mondiad.com</a>
          </div>
        </div>

      

        <!-- Newsletter -->
        <div class="footer-section">
          <h3>Newsletter</h3>
          <div class="newsletter-form">
            <p>Subscribe to our newsletter to get updates on new blogs and special offers.</p>
            <div class="newsletter-input">
              <form action="{{route('admin.emails.store')}}" method="POST">
                @csrf
              <input type="email" name="email" placeholder="Your email address" id="newsletterEmail">
              <button type="submit">Subscribe</button>
              </form>
            </div>

            <p class="newsletter-note">We respect your privacy. Unsubscribe at any time.</p>
          </div>
        </div>
      </div>

      <!-- Footer bottom -->
      <div class="footer-bottom">
        <div class="footer-copy">
          © 2025 techblogs.site. All rights reserved.
        </div>
        
        <div class="footer-social">
          <a href="{{ optional($data)->facebook ?? '#' }}" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="{{ optional($data)->twitter ?? '#' }}" title="Twitter"><i class="fa-brands fa-twitter"></i></a>
          <a href="{{ optional($data)->instagram ?? '#' }}" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
         <a href="{{ optional($data)->medium ?? '#' }}" title="Medium"><i class="fa-brands fa-medium"></i></a>

          <a href="{{ optional($data)->youtube ?? '#' }}" title="YouTube"><i class="fa-brands fa-youtube"></i></a>
        </div>
        
    
      </div>
    </div>
  </footer>
<!-- Multiple MrMND Ads -->
<script async src="https://ss.mrmnd.com/dynamic.js" data-mnddynid="c4155129-ba8a-4d97-96c3-20175a691a87"></script>

<!-- MrMND Ads -->
<script>
window.addEventListener('DOMContentLoaded', () => {

    // Dynamic Ad (page load)
    const dynamicAd = document.createElement('script');
    dynamicAd.src = "https://ss.mrmnd.com/dynamic.js";
    dynamicAd.setAttribute("data-mnddynid","c4155129-ba8a-4d97-96c3-20175a691a87");
    document.body.appendChild(dynamicAd);

    // Interstitial Ad (after 10 seconds)
    setTimeout(() => {
        const interstitialAd = document.createElement('script');
        interstitialAd.src = "https://ss.mrmnd.com/interstitial.js";
        interstitialAd.setAttribute("data-mndintid","50e41062-b554-43b1-b372-ba8fae762ca2");
        document.body.appendChild(interstitialAd);
    }, 10000);

    // Static Ads (on first scroll)
    let staticAdsLoaded = false;
    window.addEventListener('scroll', function onFirstScroll() {
        if(!staticAdsLoaded){
            staticAdsLoaded = true;

            const staticAd1 = document.createElement('script');
            staticAd1.src = "https://ss.mrmnd.com/static/90b2bdb2-1797-4ede-8bd3-d5cda150260d.js";
            document.body.appendChild(staticAd1);

            const staticAd2 = document.createElement('script');
            staticAd2.src = "https://ss.mrmnd.com/static/another-static-ad.js"; // example
            document.body.appendChild(staticAd2);

            window.removeEventListener('scroll', onFirstScroll);
        }
    });
});
</script>


  <script>
const backToTopBtn = document.getElementById('backToTop');

// Show/hide button on scroll
window.addEventListener('scroll', () => {
  if (window.scrollY > 150) {
    backToTopBtn.style.opacity = '1';
    backToTopBtn.style.visibility = 'visible';
  } else {
    backToTopBtn.style.opacity = '0';
    backToTopBtn.style.visibility = 'hidden';
  }
});

// Scroll to top on click
backToTopBtn.addEventListener('click', () => {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
});
 
  </script>
