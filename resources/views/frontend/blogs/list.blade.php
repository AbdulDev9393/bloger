@php
use Illuminate\Support\Str;
@endphp

<style>
.blog-section{
    width:100%;
    padding: 80px 0;
    background: linear-gradient(135deg, #f9f7ff 0%, #f0f9ff 100%);
    position: relative;
    overflow: hidden;
}

.blog-section::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: 
        radial-gradient(circle at 10% 20%, rgba(255, 200, 124, 0.15) 0%, transparent 20%),
        radial-gradient(circle at 90% 80%, rgba(120, 220, 255, 0.1) 0%, transparent 20%);
    z-index: 0;
}

.blog-container{
    width: 90%;
    max-width: 1200px;
    margin: auto;
    display: grid;
     grid-template-columns: repeat(4, 1fr);
    gap: 30px;
    position: relative;
    z-index: 1;
}

.blog-card{
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
    border: 1px solid #f0f0f0;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.blog-card:hover{
    transform: translateY(-12px) scale(1.02);
    box-shadow: 0 20px 40px rgba(255, 107, 53, 0.2);
    border-color: #ffc8a4;
}

.blog-img {
    height: 200px;
    overflow: hidden;
    position: relative;
}

.blog-img::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 40%;
    background: linear-gradient(to top, rgba(255,255,255,0.9) 0%, transparent 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.blog-card:hover .blog-img::after {
    opacity: 1;
}

.blog-img img{
    width:100%;
    height:100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.blog-card:hover .blog-img img{
    transform: scale(1.05);
}

.blog-content{
    padding: 25px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.blog-content h3{
    font-size: 15px;
    margin-bottom: 12px;
    color: #005aff;
    line-height: 1.4;
    font-weight: 500;
    transition: color 0.3s ease;
}

.blog-content a:hover h3 {
    color: #ff6b35;
}

.blog-content p{
    font-size: 15px;
    color: #666;
    line-height: 1.7;
    margin-bottom: 20px;
    flex-grow: 1;
}

.blog-footer{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-top: auto;
    padding-top: 15px;
    border-top: 1px dashed #eee;
}

.blog-date{
    font-size: 14px;
    color: #888;
    display: flex;
    align-items: center;
    gap: 6px;
}

.blog-date::before {
    content: "📅";
    font-size: 12px;
}

.read-more{
    text-decoration: none;
    font-size: 15px;
    color: #ff6b35;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.3s ease;
    padding: 8px 16px;
    border-radius: 16px;
    background-color: rgba(255, 107, 53, 0.1);
}

.read-more::after {
    content: "→";
    transition: transform 0.3s ease;
}

.read-more:hover{
    background-color: rgba(255, 107, 53, 0.2);
    color: #ff5500;
    padding-right: 20px;
}

.read-more:hover::after {
    transform: translateX(4px);
}

.blog-empty {
    grid-column: 1 / -1;
    text-align: center;
    padding: 80px 20px;
    color: #666;
    font-size: 20px;
    font-weight: 500;
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
}

.blog-empty i {
    font-size: 60px;
    color: #ffb347;
    margin-bottom: 20px;
    display: block;
    animation: bounce 2s infinite;
}

.blog-empty p {
    margin-bottom: 20px;
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

/* Happy decorative elements */
.happy-decoration {
    position: absolute;
    font-size: 24px;
    z-index: 0;
    opacity: 0.7;
    animation: float 6s infinite ease-in-out;
}

.happy-decoration:nth-child(1) { top: 10%; left: 5%; animation-delay: 0s; }
.happy-decoration:nth-child(2) { top: 15%; right: 8%; animation-delay: 1s; }
.happy-decoration:nth-child(3) { bottom: 20%; left: 7%; animation-delay: 2s; }
.happy-decoration:nth-child(4) { bottom: 15%; right: 5%; animation-delay: 3s; }

@keyframes float {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(5deg); }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .blog-container {
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
    }
    
    .blog-section {
        padding: 50px 0;
    }
    
    .blog-content {
        padding: 20px;
    }
}

/* Card color variations */
.blog-card:nth-child(3n+1) .read-more {
    background-color: rgba(255, 107, 53, 0.1);
    color: #ff6b35;
}

.blog-card:nth-child(3n+2) .read-more {
    background-color: rgba(74, 144, 226, 0.1);
    color: #4a90e2;
}

.blog-card:nth-child(3n+3) .read-more {
    background-color: rgba(106, 176, 76, 0.1);
    color: #6ab04c;
}
</style>

<section class="blog-section">
    <!-- Happy decorative elements -->
    <div class="happy-decoration">🌟</div>
    <div class="happy-decoration">✨</div>
    <div class="happy-decoration">😊</div>
    <div class="happy-decoration">📚</div>
    
    <div class="blog-container">
        <!-- Blog Card -->
        @forelse ($getBlogs as $blog)
            <div class="blog-card">
                <div class="blog-img">
                    <img src="{{ asset($blog->resize_image) }}" alt="{{ $blog->name }}">
                </div>
                <div class="blog-content">
                    <a href="{{ route('blogs.view', [$blog->id, Str::slug($blog->name)]) }}" class="read-more">
                        <h3>{{ Str::limit($blog->name, 30) }}</h3>
                    </a>
                    <p>{{ Str::limit(strip_tags($blog->Description), 120) }}</p>

                    <div class="blog-footer">
                        <span class="blog-date">{{ $blog->created_at->format('M d, Y') }}</span>
                        <a href="{{ route('blogs.view', [Str::slug($blog->slug)]) }}" class="read-more">
                            Read More
                        </a>
                    </div>
                </div>
            </div>  
        @empty
            <div class="blog-empty">
                <i class="fas fa-exclamation-circle"></i>
                <p>No blogs found at the moment.</p>
                <p style="font-size: 16px; color: #888;">Check back soon for new content!</p>
            </div>
        @endforelse
    </div>
</section>