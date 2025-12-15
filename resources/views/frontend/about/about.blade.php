@include('frontend.header')
<style>
.about-section{
    width:100%;
    padding:80px 0;
    background:#f7f7f7;
}

.about-container{
    width:85%;
    margin:auto;
    display:flex;
    flex-wrap:wrap;
    gap:40px;
    align-items:center;
}

/* Image Side */
.about-img{
    flex:1 1 400px;
}

.about-img img{
    width:100%;
    height:auto;
    border-radius:12px;
    box-shadow:0 5px 20px rgba(0,0,0,0.12);
}

/* Content Side */
.about-content{
    flex:1 1 400px;
}

.about-content h1{
    font-size:32px;
    color:#222;
    margin-bottom:15px;
}

.about-content p{
    font-size:16px;
    color:#555;
    line-height:1.8;
    margin-bottom:20px;
}

.about-content ul{
    list-style:none;
    padding:0;
}

.about-content ul li{
    margin-bottom:12px;
    font-size:16px;
    color:#444;
    position:relative;
    padding-left:25px;
}

.about-content ul li::before{
    content:'✔';
    position:absolute;
    left:0;
    color:#ff5500;
}

/* CTA */
.about-cta a{
    display:inline-block;
    padding:12px 28px;
    background:#ff5500;
    color:#fff;
    text-decoration:none;
    border-radius:6px;
    font-size:16px;
    transition:0.3s;
}

.about-cta a:hover{
    background:#e64a00;
}
</style>
<section class="about-section">
    <div class="about-container">

        <!-- Image Side -->
        <div class="about-img">
            <img src="{{ asset('storage/sitelogo.png') }}" alt="About Us">
        </div>

        <!-- Content Side -->
        <div class="about-content">
            <h1>About Our Website</h1>
            <p>
                Our mission is to provide high-quality, SEO-friendly blogs and guides
                that help businesses and bloggers grow online. We focus on creating
                content that ranks on Google and drives traffic naturally.
            </p>

            <p>Our key strengths:</p>
            <ul>
                <li>SEO-optimized blog articles for better ranking</li>
                <li>Guides on blogging, affiliate marketing, and AdSense</li>
                <li>Latest trends in Technology, Entertainment, Digital, and Culture</li>
                <li>Professional web development using Laravel</li>
                <li>Speed and performance optimization for websites</li>
            </ul>

            <div class="about-cta">
                <a href="{{route('frontend.contect')}}">Contact Us</a>
            </div>
        </div>

    </div>
</section>

@include('frontend.footer')