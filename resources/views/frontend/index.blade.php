@php
use Illuminate\Support\Str;
@endphp

@include('frontend.header')

<style>
.hero {
  padding: 60px 20px;
  background: #f5f5f5;
}

.hero-container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  max-width: 1200px;
  margin: 0 auto;
  gap: 40px;
}

.hero-content {
  flex: 1;
}

.hero-content h1 {
  font-size: 36px;
  margin-bottom: 20px;
  color: #333;
}

.hero-content p {
  font-size: 18px;
  margin-bottom: 20px;
  color: #555;
}

.btn-readmore {
  display: inline-block;
  padding: 12px 25px;
      background: linear-gradient(135deg, #4e83fa, #58c918);
  color: #fff;
  text-decoration: none;
  font-weight: 600;
  border-radius: 30px;
  transition: all 0.3s;
}

.btn-readmore:hover {
  background: linear-gradient(135deg, #ff5500, #ff7700);
  transform: translateY(-3px);
}
.hero-image {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  aspect-ratio: 5 / 3; /* width / height ratio */
  overflow: hidden;
  min-width: 0; /* flexbox overflow fix */
  border-radius: 5px;
}

.hero-image img {
  width: 100%;
  height: 100%;
  object-fit: contain; /* تصویر پوری دکھے، crop نہ ہو */
  object-position: center;
  border-radius: 15px;
  box-shadow: 0 10px 25px rgba(0,0,0,0.1);
  display: block;
}

/* Responsive tweaks */
@media (max-width: 1024px) {
  .hero-container {
    flex-direction: column-reverse;
    text-align: center;
  }
  .hero-image {
    width: 100%;
    aspect-ratio: auto; /* image naturally adapt ہو جائے */
    margin-bottom: 20px;
  }
}

/* Responsive */
@media (max-width: 1024px) {
  .hero-container {
    gap: 20px;
  }
}

@media (max-width: 768px) {
  .hero-container {
    flex-direction: column-reverse;
    text-align: center;
  }

  .hero-content h1 {
    font-size: 28px;
  }

  .hero-content p {
    font-size: 16px;
  }

  .hero-image img {
    max-width: 100%;
  }

  .btn-readmore {
    margin-top: 15px;
  }
}
.blogs-section {
  padding: 60px 20px;
  background: #f8f9fa;
}

.container {
  max-width: 1200px;
  margin: auto;
}

.section-title {
  text-align: center;
  font-size: 32px;
  margin-bottom: 40px;
  color: #222;
}

.blogs-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 10px;
}

.blog-card {
  width: 100%;
  max-width: 280px; /* fixed width */
  height: auto;    /* fixed height */
  background-color: #fff;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  display: flex;
  flex-direction: column;
  transition: transform 0.3s, box-shadow 0.3s;
}

.blog-card:hover {
  transform: translateY(-5px);
}

.blog-image {
  height: 200px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #f5f5f5; /* optional */
}
.blog-image img {
  width: 100%;
  max-height: 200px; /* keep card height reasonable */
 border-radius: 5px;
}
.blog-content {
  padding: 20px;
}

.category {
  display: inline-block;
  font-size: 12px;
  color: #fff;
  background: #ff7700;
  padding: 4px 10px;
  border-radius: 20px;
  margin-bottom: 10px;
}

.blog-content h3 {
  font-size: 20px;
  margin: 10px 0;
  color: #222;
}

.blog-content p {
  font-size: 14px;
  color: #555;
  line-height: 1.6;
}

.read-more {
  display: inline-block;
  margin-top: 10px;
  color: #ff7700;
  font-weight: 600;
  text-decoration: none;
}
/* Categories Section */
.categories-section {
  padding: 60px 20px;
  background: #ffffff;
}

.section-subtitle {
  text-align: center;
  font-size: 16px;
  color: #666;
  margin-bottom: 40px;
}

/* Grid */
.categories-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
  gap: 25px;
}

/* Card */
.category-card {
  background: #f8f9fa;
  border-radius: 14px;
  padding: 30px 20px;
  text-align: center;
  text-decoration: none;
  color: #222;
  transition: all 0.3s ease;
  box-shadow: 0 6px 18px rgba(0,0,0,0.06);
}

.category-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 10px 25px rgba(0,0,0,0.12);
}

/* Icon */
.category-icon {
  font-size: 40px;
  margin-bottom: 15px;
}

/* Text */
.category-card h3 {
  font-size: 18px;
  margin-bottom: 6px;
}

.category-card span {
  font-size: 13px;
  color: #777;
}

/* Mobile */
@media (max-width: 768px) {
  .category-card {
    padding: 25px 15px;
  }
}
.newsletter {
  background-color: #f4f4f4;
  padding: 50px 20px;
  text-align: center;
  border-radius: 10px;
  margin: 40px 0;
}

.newsletter h2 {
  font-size: 28px;
  margin-bottom: 10px;
  color: #333;
}

.newsletter p {
  font-size: 16px;
  margin-bottom: 20px;
  color: #555;
}

.subscribe-form {
  display: flex;
  justify-content: center;
  max-width: 500px;
  margin: 0 auto;
}

.subscribe-form input[type="email"] {
  padding: 12px 15px;
  border: 1px solid #ccc;
  border-radius: 5px 0 0 5px;
  flex: 1;
  font-size: 16px;
}

.subscribe-form button {
  padding: 12px 20px;
  border: none;
  background-color: #007BFF;
  color: white;
  font-size: 16px;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  transition: background 0.3s;
}

.subscribe-form button:hover {
  background-color: #0056b3;
}

@media (max-width: 600px) {
  .subscribe-form {
    flex-direction: column;
  }
  .subscribe-form input, .subscribe-form button {
    border-radius: 5px;
    margin: 5px 0;
  }
}

.blog-reviews {
  background-color: #fff8f0;
  padding: 50px 20px;
  text-align: center;
  border-radius: 10px;
  margin: 40px 0;
}

.blog-reviews h2 {
  font-size: 28px;
  margin-bottom: 10px;
  color: #333;
}

.blog-reviews p {
  font-size: 16px;
  margin-bottom: 30px;
  color: #555;
}

.reviews {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 20px;
}

.review-card {
  background-color: #fff;
  padding: 20px 25px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  max-width: 300px;
  text-align: left;
}

.reviewer-info {
  display: flex;
  align-items: center;
  margin-bottom: 15px;
  gap: 10px;
}

.reviewer-info img {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  object-fit: cover;
}

.reviewer-info h3 {
  font-size: 14px;
  color:#0d0547;
  margin: 0;
}

.review-card p {
  font-size: 15px;
  color: #333;
}

@media (max-width: 768px) {
  .reviews {
    flex-direction: column;
    align-items: center;
  }
}
.categories-section {
  padding: 50px 20px;
}

.category-title {
  font-size: 24px;
  margin-bottom: 20px;
  color: #333;
}


}



.blog-card img {
  width: 100%;
  height: 180px;        /* fixed image container height */
  object-fit: contain;   /* shows full image */
  object-position: center; /* center image inside container */
  background-color: #f5f5f5; /* optional, for empty spaces */
}
.blog-card h3 {
  font-size: 18px;
  margin: 15px;
  color: #170a7d;
}

.blog-card p {
  font-size: 14px;
  margin: 0 15px 15px 15px;
  color: #555;
  flex-grow: 1;
}

.read-more {
  text-decoration: none;
  color: black;
  padding: 10px 15px;
  margin: 0 15px 15px 15px;
  border-radius: 5px;
  text-align: center;
  display: inline-block;
  transition: background 0.3s;
}


.blog-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 16px rgba(0,0,0,0.15);
}

@media (max-width: 1024px) {
  .blog-card {
    flex: 1 1 calc(50% - 20px);
  }
}

@media (max-width: 600px) {
  .blog-card {
    flex: 1 1 100%;
  }
}
@media (max-width: 600px) {
  .blogs-grid {
    display: grid;
    grid-template-columns: 1fr;
    justify-items: center;
  }

  .blog-card {
    max-width: 320px;
    width: 100%;
  }
}
/* Reviews Section */
.blog-reviews {
  padding: 80px 20px;
  background: linear-gradient(135deg, #fff8f0 0%, #fef5e7 100%);
  position: relative;
  overflow: hidden;
}

.blog-reviews::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #1e6bda, #34ff00, #00fff8);
}

.section-header {
  text-align: center;
  margin-bottom: 60px;
}

.section-header .section-title {
  font-size: 42px;
  color: #222;
  margin-bottom: 15px;
  font-weight: 700;
}

.section-header .section-subtitle {
  font-size: 18px;
  color: #666;
  max-width: 600px;
  margin: 0 auto;
  line-height: 1.6;
}

/* Reviews Container */
.reviews-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  gap: 30px;
  margin-bottom: 50px;
}

/* Review Card */
.review-card {
  background: white;
  padding: 30px;
  border-radius: 16px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  position: relative;
  border: 1px solid #ffeedd;
}

.review-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 15px 40px rgba(255, 119, 0, 0.15);
}

.review-card.highlight {
  border: 2px solid #0023ff;
  background: linear-gradient(135deg, #fff 0%, #fffaf5 100%);
}

.review-badge {
  position: absolute;
  top: -12px;
  left: 50%;
  transform: translateX(-50%);
  background: #107fff;
  color: white;
  padding: 6px 20px;
  border-radius: 20px;
  font-size: 12px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

/* Rating */
.review-rating {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 20px;
}

.stars {
  color: #4966ea;
  font-size: 20px;
  letter-spacing: 2px;
}

.rating-text {
  font-weight: 700;
  color: #222;
  font-size: 18px;
}

/* Review Text */
.review-text {
  font-size: 16px;
  line-height: 1.7;
  color: #444;
  margin-bottom: 25px;
  font-style: italic;
  position: relative;
  padding-left: 20px;
}

.review-text::before {
  content: '"';
  position: absolute;
  left: 0;
  top: -10px;
  font-size: 60px;
  color: #ff7700;
  opacity: 0.2;
  font-family: Georgia, serif;
}

/* Reviewer Info */
.reviewer-info {
  display: flex;
  align-items: center;
  gap: 15px;
  padding-top: 20px;
  border-top: 1px solid #f0f0f0;
}

.reviewer-avatar img {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  object-fit: cover;
  border: 3px solid #ffeedd;
}

.reviewer-details h4 {
  margin: 0 0 5px 0;
  color: #222;
  font-size: 16px;
}

.reviewer-role {
  display: block;
  font-size: 14px;
  color: #666;
  margin-bottom: 3px;
}

.review-date {
  font-size: 13px;
  color: #888;
}

/* Stats */
.reviews-stats {
  display: flex;
  justify-content: center;
  gap: 60px;
  margin: 50px auto;
  max-width: 800px;
  flex-wrap: wrap;
}

.stat-item {
  text-align: center;
  padding: 20px;
}

.stat-number {
  display: block;
  font-size: 48px;
  font-weight: 700;
  color: black;
  line-height: 1;
  margin-bottom: 10px;
}

.stat-label {
  font-size: 16px;
  color: #666;
  font-weight: 500;
}

/* CTA */
.reviews-cta {
  text-align: center;
  margin-top: 50px;
  padding-top: 40px;
  border-top: 1px solid #ffeedd;
}

.reviews-cta p {
  font-size: 20px;
  color: #333;
  margin-bottom: 25px;
  font-weight: 500;
}

.btn-primary, .btn-secondary {
  display: inline-block;
  padding: 14px 32px;
  border-radius: 30px;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.3s ease;
  margin: 0 10px;
  font-size: 16px;
}

.btn-primary {
  background: linear-gradient(135deg, #0083ff, #1cff00);
  color: white;
  border: none;
}

.btn-primary:hover {
  background: linear-gradient(135deg, #ff5500, #ff3300);
  transform: translateY(-3px);
  box-shadow: 0 10px 20px rgba(255, 119, 0, 0.3);
}

.btn-secondary {
  background: transparent;
  color: black;
  border: 2px solid black;
}

.btn-secondary:hover {
  background: rgba(255, 119, 0, 0.1);
  transform: translateY(-3px);
}

/* Responsive Design */
@media (max-width: 1024px) {
  .reviews-container {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 768px) {
  .blog-reviews {
    padding: 60px 20px;
  }
  
  .section-header .section-title {
    font-size: 32px;
  }
  
  .reviews-container {
    grid-template-columns: 1fr;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
  }
  
  .reviews-stats {
    gap: 40px;
  }
  
  .stat-number {
    font-size: 36px;
  }
  
  .reviews-cta {
    display: flex;
    flex-direction: column;
    gap: 15px;
  }
  
  .btn-primary, .btn-secondary {
    margin: 0;
    width: 100%;
    max-width: 300px;
    margin: 0 auto;
  }
}

@media (max-width: 480px) {
  .section-header .section-title {
    font-size: 28px;
  }
  
  .section-header .section-subtitle {
    font-size: 16px;
  }
  
  .review-card {
    padding: 20px;
  }
  
  .reviews-stats {
    flex-direction: column;
    gap: 30px;
  }
  
  .stat-item {
    padding: 15px;
  }
}

</style>
<style>
.categories-section {
  padding: 80px 0;
  background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
  font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

.section-header {
  text-align: center;
  margin-bottom: 60px;
}



.section-title::after {
  content: '';
  position: absolute;
  bottom: -10px;
  left: 50%;
  transform: translateX(-50%);
  width: 100px;
  height: 4px;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  border-radius: 2px;
}

.section-subtitle {
  font-size: 1.125rem;
  color: #64748b;
  max-width: 600px;
  margin: 0 auto;
  line-height: 1.6;
}

.categories-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 30px;
  max-width: 1000px;
  margin: 0 auto;
}

.category-card {
  display: block;
  background: white;
  border-radius: 20px;
  padding: 30px;
  text-decoration: none;
  color: inherit;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
  transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  position: relative;
  overflow: hidden;
  border: 1px solid rgba(255, 255, 255, 0.2);
}

.category-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.category-card:nth-child(1):hover {
  background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
  border-color: #38bdf8;
}

.category-card:nth-child(2):hover {
  background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
  border-color: #34d399;
}

.category-card:nth-child(3):hover {
  background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
  border-color: #f87171;
}

.card-inner {
  position: relative;
  z-index: 2;
}

.category-icon {
  width: 70px;
  height: 70px;
  border-radius: 18px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 25px;
  transition: all 0.3s ease;
}

.category-card:nth-child(1) .category-icon {
  background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
  color: white;
}

.category-card:nth-child(2) .category-icon {
  background: linear-gradient(135deg, #10b981 0%, #059669 100%);
  color: white;
}

.category-card:nth-child(3) .category-icon {
  background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
  color: white;
}

.category-card:hover .category-icon {
  transform: scale(1.1) rotate(5deg);
}

.category-icon svg {
  width: 32px;
  height: 32px;
}

.category-content {
  position: relative;
}

.category-title {
  font-size: 1.75rem;
  font-weight: 700;
  margin-bottom: 12px;
  color: #1e293b;
}

.category-description {
  font-size: 1rem;
  color: #64748b;
  line-height: 1.6;
  margin-bottom: 25px;
}

.category-stats {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 20px;
  border-top: 1px solid #e2e8f0;
  color: #64748b;
  font-size: 0.95rem;
}

.category-stats i {
  margin-right: 8px;
  color: #94a3b8;
}

.category-stats span:last-child {
  color: #3b82f6;
  font-weight: 600;
  transition: transform 0.3s ease;
}

.category-card:hover .category-stats span:last-child {
  transform: translateX(5px);
}

.category-hover-effect {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(135deg, transparent 30%, rgba(255, 255, 255, 0.4) 100%);
  opacity: 0;
  transition: opacity 0.3s ease;
}

.category-card:hover .category-hover-effect {
  opacity: 1;
}

@media (max-width: 768px) {
  .categories-grid {
    grid-template-columns: 1fr;
    max-width: 400px;
  }
  
  .section-title {
    font-size: 2.5rem;
  }
  
  .section-subtitle {
    font-size: 1rem;
    padding: 0 20px;
  }
}
</style>
<main>
<section class="hero">
  <div class="hero-container">

    {{-- Left Content --}}
    <div class="hero-content">
      <h1>{{ $latestBlog->name }}</h1>
@php
  $desc = $latestBlog->Description;

  // 1️⃣ All headings convert to <p>
  $desc = preg_replace('/<(\/)?h[1-6][^>]*>/i', '<$1p>', $desc);

  // 2️⃣ div → p
  $desc = preg_replace('/<(\/)?div[^>]*>/i', '<$1p>', $desc);

  // 3️⃣ Extra tags remove, only <p> & formatting allowed
  $desc = strip_tags($desc, '<p><b><strong><i><em>');

@endphp

    <p>
 {!! Str::limit($desc, 1200) !!}
</p>

        <a href="{{ route('blogs.view', [$latestBlog->id, Str::slug($latestBlog->name)]) }}" class="btn-readmore">
            Read More about "{{ $latestBlog->name }}"
        </a>
    </div>

    {{-- Right Image --}}
   <div class="hero-image">
  <img 
    src="{{ asset($latestBlog->Thumbnail_Image) }}" 
    alt="{{ $latestBlog->name }}"
     width="1200"
  height="720"
  loading="eager"
  fetchpriority="high"
  decoding="async">
</div>

  </div>
</section>

<section class="hero">
  <div class="hero-container">
    {{-- Right Image --}}
   <div class="hero-image">
  <img 
    src="{{ asset($secondLatestBlog->Thumbnail_Image) }}" 
    alt="{{ $secondLatestBlog->name }}"
    width="1200"
    height="720"
    loading="eager">
</div>
    {{-- Left Content --}}
    <div class="hero-content">
      <h1>{{ $secondLatestBlog->name }}</h1>

      <p>
          @php
  $desc = $secondLatestBlog->Description;

  // 1️⃣ All headings convert to <p>
  $desc = preg_replace('/<(\/)?h[1-6][^>]*>/i', '<$1p>', $desc);

  // 2️⃣ div → p
  $desc = preg_replace('/<(\/)?div[^>]*>/i', '<$1p>', $desc);

  // 3️⃣ Extra tags remove, only <p> & formatting allowed
  $desc = strip_tags($desc, '<p><b><strong><i><em>');

@endphp
         {!! Str::limit($desc, 1200) !!}
      </p>

        <a href="{{ route('blogs.view', [$secondLatestBlog->id, Str::slug($secondLatestBlog->name)]) }}" class="btn-readmore">
         
         Read More about {{ Str::limit(strip_tags($secondLatestBlog->name ?? ''), 200) }}
        </a>
    </div>



  </div>
</section>

{{-- ================= LATEST BLOGS SECTION ================= --}}
<section class="blogs-section">
  <div class="container">

    <h2 class="section-title">Latest Blogs</h2>

    <div class="blogs-grid">
      @foreach ($latestBlogs as $blog)
        <div class="blog-card">

          <div class="blog-image">
    <img 
    src="{{ asset($blog->resize_image) }}"

    alt="{{ $blog->name }}"
   >
          </div>

          <h3 class="blog-title">
            <a href="{{ route('blogs.view', [$blog->id, Str::slug($blog->name)]) }}">
              {{ Str::limit($blog->name, 50) }}
            </a>
          </h3>

          <p class="blog-excerpt">
            {{ Str::limit(strip_tags($blog->Description), 50) }}
          </p>

          <a href="{{ route('blogs.view', [$blog->id, Str::slug($blog->name)]) }}"
             class="read-more">
             Read More →
          </a>

        </div>
      @endforeach
    </div>

  </div>
</section>
<section class="categories-section">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title">Explore <span class="highlight">Categories</span></h2>
      <p class="section-subtitle">
        Browse through our diverse collection of topics and find what interests you most
      </p>
    </div>

    <div class="categories-grid">
      <!-- Tech -->
      <a href="{{ route('frontend.Categories', 'Tech') }}" class="category-card">
        <div class="card-inner">
          <div class="category-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
              <path d="M16.5 7.5h-9v9h9v-9z" opacity="0.3"/>
              <path d="M20 3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-3.5 7.5h-9v9h9v-9zM20 5v2.5h-2.5V5H20zm-2.5 11.5V19H20v-2.5h-2.5zM6.5 5v2.5H4V5h2.5zM4 16.5V19h2.5v-2.5H4z"/>
            </svg>
          </div>
          <div class="category-content">
            <h3 class="category-title">Tech</h3>
            <p class="category-description">Latest technology & innovations</p>
            <div class="category-stats">
              <span><i class="fas fa-layer-group"></i> {{$techCount}} Topics</span>
              <span><i class="fas fa-arrow-right"></i></span>
            </div>
          </div>
          <div class="category-hover-effect"></div>
        </div>
      </a>

      <!-- Information -->
      <a href="{{ route('frontend.Categories', 'Information') }}" class="category-card">
        <div class="card-inner">
          <div class="category-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
              <path d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
            </svg>
          </div>
          <div class="category-content">
            <h3 class="category-title">Information</h3>
            <p class="category-description">Useful knowledge & updates</p>
            <div class="category-stats">
              <span><i class="fas fa-layer-group"></i> {{$techinfo}} Topics</span>
              <span><i class="fas fa-arrow-right"></i></span>
            </div>
          </div>
          <div class="category-hover-effect"></div>
        </div>
      </a>

      <!-- Health & Wellness -->
      <a href="{{ route('frontend.Categories', 'HealthWellness') }}" class="category-card">
        <div class="card-inner">
          <div class="category-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
              <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM7 7h4V5.28c-.6-.34-1.3-.5-2-.5-2.2 0-4 1.8-4 4 0 1.1.45 2.1 1.17 2.83L7 10.83V7zm6 0h4v3.83l-1.17-1.17C14.55 9.1 15 8.1 15 7c0-2.2-1.8-4-4-4-.7 0-1.4.16-2 .5V7zm-1 11c-2.2 0-4-1.8-4-4 0-.7.16-1.4.5-2H5.28c-.34.6-.5 1.3-.5 2 0 3.31 2.69 6 6 6 .7 0 1.4-.16 2-.5V18h-1.5c-.6.34-1.3.5-2 .5z"/>
            </svg>
          </div>
          <div class="category-content">
            <h3 class="category-title">Health & Wellness</h3>
            <p class="category-description">Healthy living & wellbeing</p>
            <div class="category-stats">
              <span><i class="fas fa-layer-group"></i> {{$techhealth}} Topics</span>
              <span><i class="fas fa-arrow-right"></i></span>
            </div>
          </div>
          <div class="category-hover-effect"></div>
        </div>
      </a>
    </div>
  </div>
</section>

{{-- ================= CATEGORIES / ALL BLOGS ================= --}}
<section class="blogs-section">
  <div class="container">

    <h2 class="section-title">Top Trand Blogs</h2>

    <div class="blogs-grid">
      @foreach ($trankBlogs as $blog)
        <div class="blog-card">

          <div class="blog-image">
    <img 
    src="{{ asset($blog->resize_image) }}"

    alt="{{ $blog->name }}"
   >
          </div>

          <h3 class="blog-title">
            <a href="{{ route('blogs.view', [$blog->id, Str::slug($blog->name)]) }}">
              {{ Str::limit($blog->name, 50) }}
            </a>
          </h3>

          <p class="blog-excerpt">
            {{ Str::limit(strip_tags($blog->Description), 50) }}
          </p>

          <a href="{{ route('blogs.view', [$blog->id, Str::slug($blog->name)]) }}"
             class="read-more">
             Read More →
          </a>

        </div>
      @endforeach
    </div>

  </div>
</section>
<!-- Daily Blog Reviews Section -->
<section class="blog-reviews">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title">What Our Readers Say 📝</h2>
      <p class="section-subtitle">Discover why thousands of readers trust our daily insights and expert advice</p>
    </div>

    <div class="reviews-container">
      <!-- Review 1 -->
      <div class="review-card">
        <div class="review-rating">
          <span class="stars">★★★★★</span>
          <span class="rating-text">5.0</span>
        </div>
        <p class="review-text">"I love the daily tips and insights! The content is consistently valuable and helps me stay updated with industry trends. The writing style makes complex topics easy to understand."</p>
        <div class="reviewer-info">
          <div class="reviewer-avatar">
            <img src="https://ui-avatars.com/api/?name=Sarah+J.&background=ff7700&color=fff&size=50" alt="Sarah J.">
          </div>
          <div class="reviewer-details">
            <h4>Sarah J.</h4>
            <span class="reviewer-role">Marketing Professional</span>
            <span class="review-date">2 days ago</span>
          </div>
        </div>
      </div>

      <!-- Review 2 -->
      <div class="review-card">
        <div class="review-rating">
          <span class="stars">★★★★☆</span>
          <span class="rating-text">4.5</span>
        </div>
        <p class="review-text">"The articles are incredibly informative and well-researched. I've implemented several strategies from your tech blogs that have saved our team hours of work each week!"</p>
        <div class="reviewer-info">
          <div class="reviewer-avatar">
            <img src="https://ui-avatars.com/api/?name=David+K.&background=0066cc&color=fff&size=50" alt="David K.">
          </div>
          <div class="reviewer-details">
            <h4>David K.</h4>
            <span class="reviewer-role">Tech Lead</span>
            <span class="review-date">1 week ago</span>
          </div>
        </div>
      </div>

      <!-- Review 3 -->
      <div class="review-card highlight">
        <div class="review-badge">Featured Review</div>
        <div class="review-rating">
          <span class="stars">★★★★★</span>
          <span class="rating-text">5.0</span>
        </div>
        <p class="review-text">"Amazing content every single day! The morning blog has become part of my daily routine. The variety of topics keeps things fresh and engaging. Highly recommended!"</p>
        <div class="reviewer-info">
          <div class="reviewer-avatar">
            <img src="https://ui-avatars.com/api/?name=Emily+R.&background=00aa55&color=fff&size=50" alt="Emily R.">
          </div>
          <div class="reviewer-details">
            <h4>Emily R.</h4>
            <span class="reviewer-role">Content Creator</span>
            <span class="review-date">3 days ago</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Reviews Stats -->
    <div class="reviews-stats">
      <div class="stat-item">
        <span class="stat-number">4.8</span>
        <span class="stat-label">Average Rating</span>
      </div>
      <div class="stat-item">
        <span class="stat-number">1.2K+</span>
        <span class="stat-label">Monthly Readers</span>
      </div>
      <div class="stat-item">
        <span class="stat-number">98%</span>
        <span class="stat-label">Satisfaction Rate</span>
      </div>
    </div>

    <!-- CTA Button -->
    <div class="reviews-cta">
      <p>Join our community of satisfied readers today!</p>
      <a href="{{ route('frontend.blogs') }}" class="btn-primary">Explore All Blogs</a>
      <a href="{{ route('frontend.contect') }}" class="btn-secondary">Share Your Experience</a>
    </div>
  </div>
  
</section>

</main>


@include('frontend.footer')