@php
use Illuminate\Support\Str;
@endphp

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

.blog-empty {
    grid-column: 1 / -1; /* Span full width */
    text-align: center;
    padding: 60px 20px;
    color: #555;
    font-size: 18px;
    font-weight: 500;
}

.blog-empty i {
    font-size: 50px;
    color: #ff5500;
    margin-bottom: 15px;
    display: block;
}
</style>
<section class="blog-section">
    <div class="blog-container">

        <!-- Blog Card -->
        @forelse ($getBlogs as $blog)
            <div class="blog-card">
                <div class="blog-img">
                    <img src="{{ asset($blog->Thumbnail_Image) }}" alt="blog">
                </div>
                <div class="blog-content">
                    <h3>{{ Str::limit($blog->name, 50) }}</h3>
                    <p>{{ Str::limit(strip_tags($blog->Description), 100) }}</p>

                    <div class="blog-footer">
                        <!-- <span class="blog-date">{{ $blog->created_at->diffForHumans() }}</span> -->
                        <a href="{{ route('admin.blogs.view', $blog->id) }}" class="read-more">Read More</a>
                    </div>
                </div>
            </div>  
        @empty
             <div class="blog-empty">
                <i class="fas fa-exclamation-circle"></i>
                No blogs found.
            </div>
        @endforelse

    </div>
</section>

