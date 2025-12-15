<style>
.blog-section{
    width:100%;
    padding:60px 0;
    background:#f7f7f7;
}

.blog-container{
    width:90%;
    margin:auto;
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(280px, 1fr));
    gap:25px;
}

.blog-card{
    background:#fff;
    border-radius:10px;
    overflow:hidden;
    box-shadow:0 5px 15px rgba(0,0,0,0.12);
    transition:all 0.3s ease;
    border:2px solid transparent;
}

.blog-card:hover{
    border:2px solid #ff5500;
    transform:translateY(-6px);
    box-shadow:0 10px 25px rgba(255,85,0,0.3);
}

.blog-img img{
    width:100%;
    height:180px;
    object-fit:cover;
}

.blog-content{
    padding:18px;
}

.blog-content h3{
    font-size:18px;
    margin-bottom:10px;
    color:#222;
}

.blog-content p{
    font-size:14px;
    color:#555;
    line-height:1.6;
}

.blog-footer{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-top:15px;
}

.blog-date{
    font-size:13px;
    color:#999;
}

.read-more{
    text-decoration:none;
    font-size:14px;
    color:#ff5500;
    font-weight:600;
}
.blog-img img{
    width:100%;
    height:180px;
    object-fit:contain;
    
}

.read-more:hover{
    text-decoration:underline;
}
</style>
<section class="blog-section">
    <div class="blog-container">

        <!-- Blog Card -->
        <div class="blog-card">
            <div class="blog-img">
                <img src="{{ asset('storage/sitelogo.png') }}" alt="blog">
            </div>
            <div class="blog-content">
                <h3>Laravel Search System</h3>
                <p>Laravel me advanced search system kaise banayein with filters aur pagination.</p>

                <div class="blog-footer">
                    <span class="blog-date">12 Dec 2025</span>
                    <a href="{{route('frontend.bogs-view')}}" class="read-more">Read More</a>
                </div>
            </div>
        </div>

        <!-- Blog Card -->
        <div class="blog-card">
            <div class="blog-img">
                <img src="{{ asset('storage/sitelogo.png') }}" alt="blog">
            </div>
            <div class="blog-content">
                <h3>SEO Friendly Blog Design</h3>
                <p>SEO optimized blog layout jo Google ranking improve kare.</p>

                <div class="blog-footer">
                    <span class="blog-date">10 Dec 2025</span>
                    <a href="{{route('frontend.bogs-view')}}" class="read-more">Read More</a>
                </div>
            </div>
        </div>

        <!-- Blog Card -->
        <div class="blog-card">
            <div class="blog-img">
                <img src="{{ asset('storage/sitelogo.png') }}" alt="blog">
            </div>
            <div class="blog-content">
                <h3>AdSense Approval Tips</h3>
                <p>AdSense approve karwane ke liye best practices aur common mistakes.</p>

                <div class="blog-footer">
                    <span class="blog-date">08 Dec 2025</span>
                    <a href="{{route('frontend.bogs-view')}}" class="read-more">Read More</a>
                </div>
            </div>
        </div>

    </div>
</section>
