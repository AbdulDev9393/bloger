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
    background: linear-gradient(90deg, #ff7700, #ff5500);
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
    font-size: 26px;
    font-weight: 800;
    background: linear-gradient(to right, #ff7700, #ff9900);
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
    background: #ff7700;
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
    color: #ff7700;
    transform: translateX(5px);
  }

  .footer-links a i {
    width: 20px;
    text-align: center;
    color: #ff7700;
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
    background: linear-gradient(135deg, #ff7700, #ff5500);
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
    background: linear-gradient(135deg, #ff7700, #ff5500);
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
    position: absolute;
    right: 20px;
    top: -25px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: linear-gradient(135deg, #ff7700, #ff5500);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
    cursor: pointer;
    transition: all 0.3s;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
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
  background: linear-gradient(135deg, #ff7700, #ff5500);
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
    <img src="{{ asset('storage/sitelogo.png') }}" alt="Daily Blogs Logo">
    <span>daliyblogs</span>
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
            <a href="{{route('frontend.Services')}}"><i class="fa-solid fa-chevron-right"></i> Services</a>
            <a href="{{route('frontend.blogs')}}"><i class="fa-solid fa-chevron-right"></i> Blog</a>
            <a href="{{route('frontend.contect')}}"><i class="fa-solid fa-chevron-right"></i> Contact</a>
          </div>
        </div>

        <!-- Contact info -->
        <div class="footer-section">
          <h3>Contact Info</h3>
          <div class="contact-info">
            <div class="contact-item">
              <i class="fa-solid fa-location-dot"></i>
              <span>Pakistan  , Layyah</span>
            </div>
            <div class="contact-item">
              <i class="fa-solid fa-phone"></i>
              <span><a href="tel:+923140699386">+92 314 0699386</a></span>
            </div>
            <div class="contact-item">
                <i class="fa-solid fa-envelope"></i>
                <span><a href="mailto:abdulprofessionaldeveloper@gmail.com">abdulprofessionaldeveloper@gmail.com</a></span>
            </div>

           
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
          © 2025 daliyblogs. All rights reserved.
        </div>
        
        <div class="footer-social">
          <a href="#" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" title="Twitter"><i class="fa-brands fa-twitter"></i></a>
          <a href="#" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
          <a href="#" title="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
          <a href="#" title="YouTube"><i class="fa-brands fa-youtube"></i></a>
        </div>
        
    
      </div>
    </div>
  </footer>

  <script>
    // Back to top functionality
    const backToTopBtn = document.getElementById('backToTop');
    
    backToTopBtn.addEventListener('click', () => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
    
    // Show/hide back to top button based on scroll position
    window.addEventListener('scroll', () => {
      if (window.scrollY > 300) {
        backToTopBtn.style.opacity = '1';
        backToTopBtn.style.visibility = 'visible';
      } else {
        backToTopBtn.style.opacity = '0';
        backToTopBtn.style.visibility = 'hidden';
      }
    });
    
    // Initialize back to top button as hidden
    backToTopBtn.style.opacity = '0';
    backToTopBtn.style.visibility = 'hidden';
    

 
  </script>
