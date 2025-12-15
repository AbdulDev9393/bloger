
@include('frontend.header')
<style>
.blog-detail{
    width:100%;
    background:#f7f7f7;
    padding:60px 0;
}

.blog-detail-container{
    width:80%;
    margin:auto;
    background:#fff;
    padding:30px;
    border-radius:10px;
    box-shadow:0 5px 15px rgba(0,0,0,0.12);
}

/* Title */
.blog-detail h1{
    font-size:28px;
    margin-bottom:10px;
    color:#222;
}

/* Meta info */
.blog-meta{
    font-size:14px;
    color:#888;
    margin-bottom:20px;
}

.blog-main-img img{
    width:100%;
    height:auto;
    max-height:450px;
    object-fit:contain;
    background:#f1f1f1;
    border-radius:8px;
    margin-bottom:25px;
}

/* Content */
.blog-content p{
    font-size:16px;
    line-height:1.8;
    color:#444;
    margin-bottom:18px;
}

/* Sub heading */
.blog-content h2{
    margin:30px 0 15px;
    color:#ff5500;
}

/* Multiple images */
.blog-gallery{
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(220px, 1fr));
    gap:15px;
    margin:30px 0;
}

.blog-gallery img{
    width:100%;
    height:180px;
    object-fit:contain;
   
    border-radius:8px;
    padding:6px;
}
.blog-gallery img:hover{
    transform:scale(1.03);
}

/* Back button */
.back-btn{
    display:inline-block;
    margin-top:30px;
    padding:10px 22px;
    background:#ff5500;
    color:#fff;
    text-decoration:none;
    border-radius:6px;
    transition:0.3s;
}

.back-btn:hover{
    background:#e64a00;
}
</style>
<section class="blog-detail">
    <div class="blog-detail-container">

        <h1>Laravel Advanced Search System</h1>

        <div class="blog-meta">
            By Admin | 14 Dec 2025
        </div>

        <!-- Main Image -->
        <div class="blog-main-img">
            <img src="{{ asset('storage/sitelogo.png') }}" alt="blog">
        </div>

        <!-- Blog Content -->
        <div class="blog-content">
            <p>
                Laravel me advanced search system banana har developer ke liye bohat important hota hai.
                Is article me hum step by step complete system explain karain ge.
            </p>

            <p>
                Search system user experience ko improve karta hai aur website ki usability ko strong banata hai.
            </p>

            <h2>Why Search System is Important?</h2>

            <p>
                Acha search system users ko quickly content tak pohanchata hai aur bounce rate kam karta hai.
            </p>

            <!-- Multiple Images -->
            <div class="blog-gallery">
                <img src="{{ asset('storage/sitelogo.png') }}">
                <img src="{{ asset('storage/sitelogo.png') }}">
                <img src="{{ asset('storage/sitelogo.png') }}">
            </div>

            <h2>Conclusion</h2>

            <p>
                Agar aap Laravel blog ya job portal bana rahe ho to advanced search system must hai.
                Is se user engagement aur revenue dono increase hotay hain.
            </p>
        </div>

        <a href="{{route('frontend.blogs')}}" class="back-btn">← Back to Blogs</a>

    </div>
</section>
@include('frontend.footer')
