@include('frontend.header')

<section class="contact-hero">
  <div class="container">
    <div class="hero-content">
      <h1>Get in Touch 📬</h1>
      <p>Have questions or suggestions? We'd love to hear from you! Fill out the form below and we'll get back to you shortly.</p>
      <div class="hero-stats">
        <div class="stat-item">
          <i class="fas fa-clock"></i>
          <span>Response within 24 hours</span>
        </div>
        <div class="stat-item">
          <i class="fas fa-headset"></i>
          <span>24/7 Customer Support</span>
        </div>
        <div class="stat-item">
          <i class="fas fa-users"></i>
          <span>100% Satisfaction</span>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="contact-section">
  <div class="container">
    <div class="contact-grid">
      <!-- Contact Form -->
      <div class="contact-form-container card">
        <div class="form-header">
          <h2>Send a Message</h2>
          <p>Fill out the form below and we'll respond as soon as possible</p>
        </div>
        
        <form action="" method="POST" class="contact-form" id="contactForm">
          @csrf
          
          <div class="form-group">
            <label for="name">Full Name <span class="required">*</span></label>
            <div class="input-with-icon">
              <i class="fas fa-user"></i>
              <input type="text" id="name" name="name" placeholder="Enter your full name" required>
            </div>
          </div>
          
          <div class="form-group">
            <label for="email">Email Address <span class="required">*</span></label>
            <div class="input-with-icon">
              <i class="fas fa-envelope"></i>
              <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
          </div>
          
          <div class="form-group">
            <label for="subject">Subject</label>
            <div class="input-with-icon">
              <i class="fas fa-tag"></i>
              <input type="text" id="subject" name="subject" placeholder="What is this regarding?">
            </div>
          </div>
          
          <div class="form-group">
            <label for="message">Your Message <span class="required">*</span></label>
            <div class="textarea-with-icon">
              <i class="fas fa-comment-alt"></i>
              <textarea id="message" name="message" rows="6" placeholder="Please describe your inquiry in detail..." required></textarea>
            </div>
            <div class="char-counter">
              <span id="charCount">0</span>/500 characters
            </div>
          </div>
          
          <div class="form-footer">
            <button type="submit" class="submit-btn">
              <span class="btn-text">Send Message</span>
              <i class="fas fa-paper-plane"></i>
            </button>
            <p class="form-note">By submitting this form, you agree to our <a href="#">Privacy Policy</a>.</p>
          </div>
        </form>
      </div>
      
      <!-- Contact Info & Social -->
      <div class="contact-sidebar">
        <!-- Contact Information -->
        <div class="contact-info card">
          <h3>Contact Information</h3>
          <div class="info-item">
            <div class="info-icon">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="info-content">
              <h4>Our Location</h4>
              <p>123 Business Street, Suite 101<br>Pakistan layyah 93/ML</p>
            </div>
          </div>
          
          <div class="info-item">
            <div class="info-icon">
              <i class="fas fa-phone"></i>
            </div>
            <div class="info-content">
              <h4>Phone Number</h4>
              <p>+923140699386</p>
             
            </div>
          </div>
          
          <div class="info-item">
            <div class="info-icon">
              <i class="fas fa-envelope-open"></i>
            </div>
            <div class="info-content">
              <h4>Email Address</h4>
              <p>abduldeveloper701@gmail.com</p>
              <p class="info-sub">For general inquiries</p>
            </div>
          </div>
        </div>
        
        <!-- Social Media -->
        <div class="contact-social card">
          <h3>Connect With Us</h3>
          <p>Follow us on social media for updates, tips, and more.</p>
          
          <div class="social-icons">
            <a href="https://facebook.com/yourpage" target="_blank" class="social-icon facebook">
              <i class="fab fa-facebook-f"></i>
              <span>Facebook</span>
            </a>
            <a href="https://twitter.com/yourpage" target="_blank" class="social-icon twitter">
              <i class="fab fa-twitter"></i>
              <span>Twitter</span>
            </a>
            <a href="https://instagram.com/yourpage" target="_blank" class="social-icon instagram">
              <i class="fab fa-instagram"></i>
              <span>Instagram</span>
            </a>
            <a href="https://linkedin.com/yourpage" target="_blank" class="social-icon linkedin">
              <i class="fab fa-linkedin-in"></i>
              <span>LinkedIn</span>
            </a>
            <a href="https://youtube.com/yourpage" target="_blank" class="social-icon youtube">
              <i class="fab fa-youtube"></i>
              <span>YouTube</span>
            </a>
          </div>
        </div>
        
        <!-- FAQ Preview -->
        <div class="faq-preview card">
          <h3>Frequently Asked Questions</h3>
          <div class="faq-item">
            <h4>How quickly will I receive a response?</h4>
            <p>We typically respond to all inquiries within 24 hours during business days.</p>
          </div>
          <div class="faq-item">
            <h4>Do you offer phone support?</h4>
            <p>Yes, phone support is available Mon-Fri from 9am to 6pm EST.</p>
          </div>
          <a href="#" class="faq-link">View all FAQs <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
/* Base Styles */
:root {
  --primary: #ff6b00;
  --primary-dark: #e55a00;
  --secondary: #2d3748;
  --light: #f8f9fa;
  --gray: #6c757d;
  --light-gray: #e9ecef;
  --success: #28a745;
  --shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
  --radius: 12px;
}

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  line-height: 1.6;
  color: #333;
  background-color: #f9fafb;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

.card {
  background: white;
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  padding: 30px;
  margin-bottom: 25px;
}

/* Hero Section */
.contact-hero {
  background: linear-gradient(135deg, #ff7700 0%, #ff4500 100%);
  color: white;
  padding: 80px 0;
  position: relative;
  overflow: hidden;
}

.contact-hero::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path d="M0,0 L100,0 L100,100 Z" fill="white" opacity="0.05"/></svg>');
  background-size: cover;
}

.hero-content {
  max-width: 800px;
  margin: 0 auto;
  text-align: center;
  position: relative;
  z-index: 1;
}

.contact-hero h1 {
  font-size: 3.2rem;
  margin-bottom: 20px;
  font-weight: 800;
}

.contact-hero p {
  font-size: 1.2rem;
  max-width: 600px;
  margin: 0 auto 40px;
  opacity: 0.95;
}

.hero-stats {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 30px;
  margin-top: 40px;
}

.stat-item {
  display: flex;
  align-items: center;
  gap: 10px;
  background: rgba(255, 255, 255, 0.15);
  padding: 12px 20px;
  border-radius: 50px;
  backdrop-filter: blur(10px);
}

.stat-item i {
  font-size: 1.2rem;
}

/* Contact Grid */
.contact-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 40px;
  margin: 80px auto;
}

@media (max-width: 992px) {
  .contact-grid {
    grid-template-columns: 1fr;
  }
}

/* Form Styles */
.form-header {
  margin-bottom: 30px;
  text-align: center;
}

.form-header h2 {
  font-size: 2rem;
  margin-bottom: 10px;
  background: linear-gradient(135deg, var(--primary), var(--primary-dark));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.form-header p {
  color: var(--gray);
}

.form-group {
  margin-bottom: 25px;
}

.form-group label {
  display: block;
  margin-bottom: 8px;
  font-weight: 600;
  color: var(--secondary);
}

.required {
  color: #e53e3e;
}

.input-with-icon, .textarea-with-icon {
  position: relative;
}

.input-with-icon i, .textarea-with-icon i {
  position: absolute;
  left: 15px;
  top: 50%;
  transform: translateY(-50%);
  color: var(--gray);
}

.textarea-with-icon i {
  top: 20px;
  transform: none;
}

.input-with-icon input, .textarea-with-icon textarea {
  width: 100%;
  padding: 15px 15px 15px 45px;
  border: 1.5px solid var(--light-gray);
  border-radius: 8px;
  font-size: 16px;
  transition: all 0.3s;
}

.textarea-with-icon textarea {
  padding-top: 15px;
  resize: vertical;
}

.input-with-icon input:focus, .textarea-with-icon textarea:focus {
  outline: none;
  border-color: var(--primary);
  box-shadow: 0 0 0 3px rgba(255, 107, 0, 0.1);
}

.char-counter {
  text-align: right;
  font-size: 0.85rem;
  color: var(--gray);
  margin-top: 5px;
}

/* Submit Button */
.form-footer {
  margin-top: 30px;
}

.submit-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  width: 100%;
  padding: 18px;
  background: linear-gradient(135deg, var(--primary), var(--primary-dark));
  color: white;
  border: none;
  border-radius: 8px;
  font-size: 1.1rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s;
}

.submit-btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 20px rgba(255, 107, 0, 0.3);
}

.submit-btn:active {
  transform: translateY(-1px);
}

.form-note {
  text-align: center;
  margin-top: 15px;
  font-size: 0.9rem;
  color: var(--gray);
}

.form-note a {
  color: var(--primary);
  text-decoration: none;
}

.form-note a:hover {
  text-decoration: underline;
}

/* Contact Info */
.contact-info h3, .contact-social h3, .faq-preview h3 {
  font-size: 1.5rem;
  margin-bottom: 20px;
  color: var(--secondary);
}

.info-item {
  display: flex;
  align-items: flex-start;
  gap: 15px;
  padding: 20px 0;
  border-bottom: 1px solid var(--light-gray);
}

.info-item:last-child {
  border-bottom: none;
}

.info-icon {
  width: 50px;
  height: 50px;
  background: linear-gradient(135deg, rgba(255, 107, 0, 0.1), rgba(255, 69, 0, 0.1));
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.info-icon i {
  color: var(--primary);
  font-size: 1.2rem;
}

.info-content h4 {
  font-size: 1.1rem;
  margin-bottom: 5px;
  color: var(--secondary);
}

.info-content p {
  color: var(--gray);
  margin-bottom: 5px;
}

.info-sub {
  font-size: 0.85rem;
  color: var(--gray);
  opacity: 0.8;
}

/* Social Icons */
.contact-social p {
  color: var(--gray);
  margin-bottom: 25px;
}

.social-icons {
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.social-icon {
  display: flex;
  align-items: center;
  gap: 15px;
  padding: 15px 20px;
  border-radius: 8px;
  text-decoration: none;
  color: white;
  font-weight: 600;
  transition: all 0.3s;
}

.social-icon i {
  font-size: 1.2rem;
  width: 24px;
}

.social-icon:hover {
  transform: translateX(5px);
}

.facebook { background: #1877f2; }
.twitter { background: #1da1f2; }
.instagram { background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d); }
.linkedin { background: #0077b5; }
.youtube { background: #ff0000; }

/* FAQ Preview */
.faq-item {
  padding: 15px 0;
  border-bottom: 1px solid var(--light-gray);
}

.faq-item h4 {
  font-size: 1rem;
  margin-bottom: 8px;
  color: var(--secondary);
}

.faq-item p {
  font-size: 0.9rem;
  color: var(--gray);
}

.faq-link {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  margin-top: 15px;
  color: var(--primary);
  text-decoration: none;
  font-weight: 600;
}

.faq-link:hover {
  text-decoration: underline;
}

/* Responsive Design */
@media (max-width: 768px) {
  .contact-hero h1 {
    font-size: 2.5rem;
  }
  
  .contact-hero p {
    font-size: 1.1rem;
  }
  
  .hero-stats {
    flex-direction: column;
    align-items: center;
  }
  
  .card {
    padding: 25px 20px;
  }
  
  .contact-grid {
    gap: 25px;
    margin: 50px auto;
  }
}

@media (max-width: 480px) {
  .contact-hero {
    padding: 60px 0;
  }
  
  .contact-hero h1 {
    font-size: 2rem;
  }
  
  .form-header h2 {
    font-size: 1.7rem;
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Character counter for message textarea
  const messageTextarea = document.getElementById('message');
  const charCount = document.getElementById('charCount');
  
  if (messageTextarea && charCount) {
    messageTextarea.addEventListener('input', function() {
      charCount.textContent = this.value.length;
      
      // Add warning if approaching limit
      if (this.value.length > 450) {
        charCount.style.color = '#e53e3e';
      } else {
        charCount.style.color = '';
      }
      
      // Enforce max length
      if (this.value.length > 500) {
        this.value = this.value.substring(0, 500);
        charCount.textContent = 500;
      }
    });
    
    // Initialize count
    charCount.textContent = messageTextarea.value.length;
  }
  
  // Form submission animation
  const contactForm = document.getElementById('contactForm');
  const submitBtn = document.querySelector('.submit-btn');
  const btnText = document.querySelector('.btn-text');
  
  if (contactForm && submitBtn) {
    contactForm.addEventListener('submit', function(e) {
      // Prevent actual submission for demo
      e.preventDefault();
      
      // Show loading state
      btnText.textContent = 'Sending...';
      submitBtn.disabled = true;
      
      // Simulate API call
      setTimeout(() => {
        // Show success message
        btnText.textContent = 'Message Sent!';
        submitBtn.style.background = 'linear-gradient(135deg, #28a745, #20c997)';
        
        // Reset after 3 seconds
        setTimeout(() => {
          btnText.textContent = 'Send Message';
          submitBtn.style.background = 'linear-gradient(135deg, #ff6b00, #ff4500)';
          submitBtn.disabled = false;
          contactForm.reset();
          charCount.textContent = 0;
        }, 3000);
      }, 1500);
    });
  }
  
  // Add focus effects to form inputs
  const formInputs = document.querySelectorAll('.input-with-icon input, .textarea-with-icon textarea');
  
  formInputs.forEach(input => {
    input.addEventListener('focus', function() {
      this.parentElement.querySelector('i').style.color = '#ff6b00';
    });
    
    input.addEventListener('blur', function() {
      this.parentElement.querySelector('i').style.color = '#6c757d';
    });
  });
});
</script>

@include('frontend.footer')