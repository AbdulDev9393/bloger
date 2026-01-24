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
    grid-template-columns:1fr; /* Full width */
    gap:15px;
    margin:30px 0;
}

.blog-gallery img{
    width:100%;
    height:auto;
    max-height:450px;
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

/* Social Share Buttons */
.blog-share{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:16px;
    margin:35px 0 10px;
    flex-wrap:wrap;
}



.blog-share a{
    width:48px;
    height:48px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:50%;
    color:#fff;
    font-size:20px;
    transition:all 0.3s ease;
    box-shadow:0 6px 15px rgba(0,0,0,0.15);
}

/* Hover Effect */
.blog-share a:hover{
    transform:translateY(-4px) scale(1.08);
}

.share-facebook{ background:#1877f2; }
.share-facebook:hover{ background:#145dbf; }

.share-twitter{ background:#1da1f2; }
.share-twitter:hover{ background:#0d8ddc; }

.share-instagram{
    background: radial-gradient(circle at 30% 30%, #feda75, #d62976, #962fbf, #4f5bd5);
}
.share-whatsapp{
    background:#25D366;
}
.share-whatsapp:hover{
    background:#1ebe5d;
}
.share-tiktok{ background:#000; }
.share-tiktok:hover{ background:#222; }

/* ===== Tablet (iPad etc) ===== */
@media(max-width:1024px){
    .blog-share{
        gap:14px;
    }
    .blog-share a{
        width:46px;
        height:46px;
        font-size:19px;
    }
}

/* ===== Mobile ===== */
@media(max-width:600px){
    .blog-share{
        gap:12px;
    }
    .blog-share a{
        width:42px;
        height:42px;
        font-size:18px;
    }
    .blog-detail-container{
        width:95%;
    }
}
h4{
    font-size: 17px;
}
</style>

<section class="blog-detail">
    <div class="blog-detail-container">

        <h1>{{$Blog_info->name}}</h1>

        <div class="blog-meta">
           {{$Blog_info->created_at}}
        </div>

        <!-- Main Image -->
        <div class="blog-main-img">
             <img 
                        src="{{ asset($Blog_info->Thumbnail_Image) }}" 
                        alt="{{ $Blog_info->name ?? 'Blog Image' }}"
                        title="{{ $Blog_info->name ?? 'Blog Image' }}"
                        loading="lazy"
                    >
        </div>

        <!-- Blog Content -->
        <div class="blog-content">
         {!! $Blog_info->Description !!}

            <!-- Multiple Images -->
            <div class="blog-gallery">
              
                @if($Blog_info->Banner_mage)
                 <img 
                        src="{{ asset($Blog_info->Banner_mage) }}" 
                        alt="{{ $Blog_info->name ?? 'Blog Image' }}"
                        title="{{ $Blog_info->name ?? 'Blog Image' }}"
                        loading="lazy"
                    >
                @endif
            </div>

        </div>

        <!-- Stylish Share Buttons -->
      <div class="blog-share">

    <!-- Facebook -->
    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
       target="_blank"
       class="share-facebook"
       title="Share on Facebook">
        <i class="fab fa-facebook-f"></i>
    </a>

    <!-- Twitter -->
    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($Blog_info->name) }}"
       target="_blank"
       class="share-twitter"
       title="Share on Twitter">
        <i class="fab fa-twitter"></i>   
    </a>

    <!-- Instagram (copy/open) -->
    <a href="https://www.instagram.com/"
       target="_blank"
       class="share-instagram"
       title="Share on Instagram">
        <i class="fab fa-instagram"></i>
    </a>

    <!-- TikTok -->
    <a href="https://www.tiktok.com/"
       target="_blank"
       class="share-tiktok"
       title="Share on TikTok">
        <i class="fab fa-tiktok"></i>
    </a>
<a href="https://api.whatsapp.com/send?text={{ urlencode($Blog_info->name . ' ' . url()->current()) }}"
   target="_blank"
   class="share-whatsapp"
   title="Share on WhatsApp">
    <i class="fab fa-whatsapp"></i>
</a>
</div>
</section>

@include('frontend.footer')
