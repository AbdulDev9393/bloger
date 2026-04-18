<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.header')
</head>
<body>

@php
use Illuminate\Support\Str;
@endphp

<style>
    /* ===== RESET & BASE ===== */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        background: #ffffff;
        color: #1e293b;
        line-height: 1.5;
        scroll-behavior: smooth;
    }
.hero-main-title {
    font-size: clamp(32px, 5vw, 56px);
    font-weight: 900;
    line-height: 1.1;
    margin-bottom: 20px;

    /* Gradient Text */
    background: linear-gradient(135deg, #4e83fa, #58c918);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;

    letter-spacing: -1px;

    /* Better rendering */
    text-wrap: balance;

    /* Smooth animation */
    animation: fadeUp 0.7s ease;
}

/* Optional highlight word */
.hero-main-title span {
    background: linear-gradient(135deg, #ff5500, #ff7700);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Animation */
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(25px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
    /* ===== TYPOGRAPHY ===== */
    h1, h2, h3, h4 {
        font-weight: 700;
        letter-spacing: -0.02em;
    }

    /* ===== HERO SECTION (Enhanced) ===== */
    .hero {
        padding: 80px 20px;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        position: relative;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #4e83fa, #58c918);
    }

    .hero-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        max-width: 1280px;
        margin: 0 auto;
        gap: 60px;
        flex-wrap: wrap;
    }

    .hero-content {
        flex: 1;
         min-width: 0;
    }

    .hero-content h1 {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        background: linear-gradient(135deg, #1e293b, #334155);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
        line-height: 1.2;
    }

    .hero-content p {
        font-size: 16px;
        color: #475569;
        margin-bottom: 2rem;
        line-height: 1.7;
    }

    .btn-readmore {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 14px 32px;
        background: linear-gradient(135deg, #4e83fa, #58c918);
        color: white;
        text-decoration: none;
        font-weight: 600;
        border-radius: 40px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(78, 131, 250, 0.2);
        font-size: 1rem;
    }

    .btn-readmore:hover {
        background: linear-gradient(135deg, #ff5500, #ff7700);
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(255, 85, 0, 0.3);
    }

    .hero-image {
        flex: 1;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 20px 35px -10px rgba(0, 0, 0, 0.15);
        transition: transform 0.4s ease;
    }

    .hero-image:hover {
        transform: scale(1.02);
    }

    .hero-image img {
        width: 100%;
        height: auto;
        display: block;
        object-fit: cover;
        aspect-ratio: 5 / 3;
    }

    /* ===== BLOGS SECTION ===== */
    .blogs-section {
        padding: 80px 20px;
        background: #ffffff;
    }

    .container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .section-title {
        text-align: center;
        font-size: 2.5rem;
        margin-bottom: 3rem;
        color: #0f172a;
        position: relative;
        padding-bottom: 1rem;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(135deg, #4e83fa, #58c918);
        border-radius: 4px;
    }

    .blogs-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
    }

    .blog-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.02);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        border: 1px solid #eef2ff;
    }

    .blog-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 30px -12px rgba(0, 0, 0, 0.15);
        border-color: #cbd5e1;
    }

    .blog-image {
        width: 100%;
        height: 220px;
        overflow: hidden;
        background: #f1f5f9;
    }

    .blog-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .blog-card:hover .blog-image img {
        transform: scale(1.05);
    }

    .blog-title {
        font-size: 1.25rem;
        margin: 1.25rem 1.25rem 0.5rem;
        line-height: 1.4;
    }

    .blog-title a {
        text-decoration: none;
        color: #0f172a;
        transition: color 0.2s;
    }

    .blog-title a:hover {
        color: #4e83fa;
    }

    .blog-excerpt {
        font-size: 0.875rem;
        color: #475569;
        margin: 0 1.25rem 1rem;
        line-height: 1.6;
    }

    .read-more {
        margin: 0 1.25rem 1.5rem;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-weight: 600;
        color: #4e83fa;
        text-decoration: none;
        transition: gap 0.2s;
    }

    .read-more:hover {
        gap: 10px;
        color: #ff5500;
    }

    /* ===== CATEGORY CARDS (Enhanced) ===== */
    .category-card {
        display: block;
        background: white;
        border-radius: 24px;
        padding: 32px;
        text-decoration: none;
        color: inherit;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        border: 1px solid #eef2ff;
        text-align: center;
    }

    .category-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 30px -12px rgba(0, 0, 0, 0.12);
        border-color: #4e83fa;
    }

    .category-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 12px;
        color: #0f172a;
    }

    .category-stats {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 20px;
        border-top: 1px solid #e2e8f0;
        color: #64748b;
        font-size: 0.9rem;
    }

    /* ===== REVIEWS SECTION (Premium) ===== */
    .blog-reviews {
        background: linear-gradient(135deg, #fefce8 0%, #fef9e3 100%);
        padding: 80px 20px;
        position: relative;
    }

    .blog-reviews::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #4e83fa, #58c918, #ff7700);
    }

    .section-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .section-header .section-title {
        margin-bottom: 1rem;
    }

    .section-subtitle {
        font-size: 1.125rem;
        color: #475569;
        max-width: 600px;
        margin: 0 auto;
    }

    .reviews-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 30px;
        margin-bottom: 50px;
    }

    .review-card {
        background: white;
        padding: 30px;
        border-radius: 28px;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        border: 1px solid #fff0db;
    }

    .review-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 30px -12px rgba(0, 0, 0, 0.1);
    }

    .review-card.highlight {
        background: linear-gradient(135deg, #ffffff, #fffaf0);
        border: 2px solid #4e83fa;
        position: relative;
    }

    .review-badge {
        position: absolute;
        top: -12px;
        left: 50%;
        transform: translateX(-50%);
        background: #4e83fa;
        color: white;
        padding: 4px 16px;
        border-radius: 40px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .review-rating {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    .stars {
        color: #fbbf24;
        font-size: 1.25rem;
        letter-spacing: 2px;
    }

    .rating-text {
        font-weight: 700;
        color: #0f172a;
    }

    .review-text {
        font-size: 1rem;
        line-height: 1.6;
        color: #334155;
        margin-bottom: 25px;
        font-style: italic;
    }

    .reviewer-info {
        display: flex;
        align-items: center;
        gap: 15px;
        padding-top: 20px;
        border-top: 1px solid #f1f5f9;
    }

    .reviewer-avatar img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }

    .reviewer-details h4 {
        font-size: 1rem;
        margin-bottom: 4px;
        color: #0f172a;
    }

    .reviewer-role, .review-date {
        font-size: 0.75rem;
        color: #64748b;
    }
    .stat-label {
        font-size: 0.875rem;
        color: #475569;
    }


    .btn-primary, .btn-secondary {
        display: inline-block;
        padding: 12px 32px;
        border-radius: 40px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s;
        margin: 0 8px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #4e83fa, #58c918);
        color: white;
        box-shadow: 0 2px 8px rgba(78, 131, 250, 0.2);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #ff5500, #ff7700);
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(255, 85, 0, 0.2);
    }

    .btn-secondary {
        background: transparent;
        color: #1e293b;
        border: 2px solid #cbd5e1;
    }

    .btn-secondary:hover {
        border-color: #4e83fa;
        background: #f8fafc;
        transform: translateY(-2px);
    }

    /* ===== NEWSLETTER (Clean) ===== */
    .newsletter {
        background: #f8fafc;
        border-radius: 32px;
        padding: 60px 40px;
        text-align: center;
        margin: 40px auto;
        max-width: 800px;
    }

    .subscribe-form {
        display: flex;
        gap: 12px;
        max-width: 500px;
        margin: 24px auto 0;
    }

    .subscribe-form input {
        flex: 1;
        padding: 14px 20px;
        border: 1px solid #e2e8f0;
        border-radius: 60px;
        font-size: 1rem;
    }

    .subscribe-form button {
        padding: 14px 28px;
        background: #4e83fa;
        border: none;
        border-radius: 60px;
        color: white;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
    }

    .subscribe-form button:hover {
        background: #ff5500;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 1024px) {
        .hero-container {
            flex-direction: column-reverse;
            text-align: center;
            gap: 40px;
        }
        .hero-content h1 {
            font-size: 2.25rem;
        }
        .blogs-grid {
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .hero {
            padding: 60px 20px;
        }
        .section-title {
            font-size: 2rem;
        }
        .reviews-container {
            grid-template-columns: 1fr;
        }

        .subscribe-form {
            flex-direction: column;
        }
        .btn-primary, .btn-secondary {
            margin: 6px;
            width: 100%;
            max-width: 280px;
        }
        h2 {
        font-size: 20px;
    }
    }
</style>

<main>
    <!-- HERO - First Blog -->
    <section class="hero">
       <h1 class="hero-main-title">
                Tech Blogs & <span>Technology Insights</span>
            </h1>
        <div class="hero-container">
            <div class="hero-content">
                <h2>{{ $latestBlog->name }}</h2>
                <p>{!! Str::limit($latestBlog->Description, 1200) !!}</p>
                <a href="{{ route('blogs.view', ['slug' => Str::slug($latestBlog->slug)]) }}" class="btn-readmore">
                    Read More about "{{ $latestBlog->name }}" →
                </a>
            </div>
            <div class="hero-image">
                <img src="{{ asset($latestBlog->Thumbnail_Image) }}" alt="{{ $latestBlog->name }}" width="1200" height="720" loading="eager" fetchpriority="high">
            </div>
        </div>
    </section>

    <!-- HERO - Second Blog -->
    <section class="hero" style="background: linear-gradient(135deg, #ffffff 0%, #fef9e3 100%);">
        <div class="hero-container">
            <div class="hero-image">
                <img src="{{ asset($secondLatestBlog->Thumbnail_Image) }}" alt="{{ $secondLatestBlog->name }}" width="1200" height="720" loading="eager">
            </div>
            <div class="hero-content">
                <h2>{{ $secondLatestBlog->name }}</h2>
                <p>{!! Str::limit($secondLatestBlog->Description, 1200) !!}</p>
                <a href="{{ route('blogs.view', ['slug' => Str::slug($secondLatestBlog->slug)]) }}" class="btn-readmore">
                    Read More about {{ Str::limit(strip_tags($secondLatestBlog->name ?? ''), 200) }} →
                </a>
            </div>
        </div>
    </section>

    <!-- Latest Blogs Grid -->
    <section class="blogs-section">
        <div class="container">
            <h2 class="section-title">Latest Blogs</h2>
            <div class="blogs-grid">
                @foreach ($latestBlogs as $blog)
                    <div class="blog-card">
                        <div class="blog-image">
                            <img src="{{ asset($blog->resize_image) }}" alt="{{ $blog->name }}" loading="lazy">
                        </div>
                        <h3 class="blog-title">
                            <a href="{{ route('blogs.view', ['slug' => Str::slug($blog->slug)]) }}">
                                {{ Str::limit($blog->name, 50) }}
                            </a>
                        </h3>
                        <p class="blog-excerpt">{{ Str::limit(strip_tags($blog->Description), 80) }}</p>
                        <a href="{{ route('blogs.view', ['slug' => Str::slug($blog->slug)]) }}" class="read-more">Read More →</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div style="text-align: center; margin-top: 30px;">
        <a href="{{ route('frontend.blogs') }}" class="btn-secondary">
            View All Blogs →
        </a>
    </div>
    <!-- Trending Blogs Grid -->
    <section class="blogs-section" style="background: #f8fafc;">
        <div class="container">
            <h2 class="section-title">Top Trending Blogs</h2>
            <div class="blogs-grid">
                @foreach ($trankBlogs as $blog)
                    <div class="blog-card">
                        <div class="blog-image">
                            <img src="{{ asset($blog->resize_image) }}" alt="{{ $blog->name }}" loading="lazy">
                        </div>
                        <h3 class="blog-title">
                            <a href="{{ route('blogs.view', ['slug' => Str::slug($blog->slug)]) }}">
                                {{ Str::limit($blog->name, 50) }}
                            </a>
                        </h3>
                        <p class="blog-excerpt">{{ Str::limit(strip_tags($blog->Description), 80) }}</p>
                        <a href="{{ route('blogs.view', ['slug' => Str::slug($blog->slug)]) }}" class="read-more">Read More →</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Reviews Section -->
    <section class="blog-reviews">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">What Our Readers Say 📝</h2>
                <p class="section-subtitle">Discover why thousands of readers trust our daily insights and expert advice</p>
            </div>
            <div class="reviews-container">
                <div class="review-card">
                    <div class="review-rating">
                        <span class="stars">★★★★★</span>
                        <span class="rating-text">5.0</span>
                    </div>
                    <p class="review-text">"I love the daily tips and insights! The content is consistently valuable and helps me stay updated with industry trends. The writing style makes complex topics easy to understand."</p>
                    <div class="reviewer-info">
                        <div class="reviewer-avatar"><img src="https://ui-avatars.com/api/?name=Sarah+J.&background=ff7700&color=fff&size=50" alt="Sarah J."></div>
                        <div class="reviewer-details"><h4>Ryan Mitchell</h4></div>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-rating">
                        <span class="stars">★★★★☆</span>
                        <span class="rating-text">4.5</span>
                    </div>
                    <p class="review-text">"The articles are incredibly informative and well-researched. I've implemented several strategies from your tech blogs that have saved our team hours of work each week!"</p>
                    <div class="reviewer-info">
                        <div class="reviewer-avatar"><img src="https://ui-avatars.com/api/?name=David+K.&background=0066cc&color=fff&size=50" alt="David K."></div>
                        <div class="reviewer-details"><h4>Zachary Reed</h4></div>
                    </div>
                </div>
                <div class="review-card highlight">
                    <div class="review-badge">Featured Review</div>
                    <div class="review-rating">
                        <span class="stars">★★★★☆</span>
                        <span class="rating-text">4.5</span>
                    </div>
                    <p class="review-text">"Amazing content every single day! The morning blog has become part of my daily routine. The variety of topics keeps things fresh and engaging. Highly recommended!"</p>
                    <div class="reviewer-info">
                        <div class="reviewer-avatar"><img src="https://ui-avatars.com/api/?name=Emily+R.&background=00aa55&color=fff&size=50" alt="Emily R."></div>
                        <div class="reviewer-details"><h4>Aaron Bennett</h4></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@include('frontend.footer')
</body>
</html>
