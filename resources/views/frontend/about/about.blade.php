
<!DOCTYPE html>
<html lang="en">
<head>
  
@include('frontend.header')
</head>
<body>
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
    background:#002bff;
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
            <img src="https://techblogs.site/favicon.ico" alt="About TechBlogs">
        </div>

        <!-- Content Side -->
        <div class="about-content">

            <h1>About TechBlogs</h1>

            <p>
                Welcome to TechBlogs, your trusted source for the latest technology news, tutorials, and digital insights. 
                Our mission is to simplify technology and make it easy for everyone to understand, whether you're a beginner or an advanced user.
            </p>

            <p>
                We regularly publish articles about smartphones, laptops, gadgets, software updates, AI tools, and emerging digital trends. 
                Our goal is to keep you updated with accurate, helpful, and easy-to-follow tech information.
            </p>

            <p>
                At TechBlogs, we focus on delivering high-quality content that helps users solve real problems, learn new skills, and stay ahead in the fast-changing tech world.
            </p>

            <p><strong>What we cover:</strong></p>

            <ul>
                <li>Latest technology news and updates</li>
                <li>Smartphone and gadget reviews</li>
                <li>AI tools and digital innovations</li>
                <li>Step-by-step tutorials and guides</li>
                <li>Tips to improve digital skills and productivity</li>
            </ul>

            <p>
                Our content is written for a global audience, including readers from the USA, UK, Canada, and other countries who are passionate about technology.
            </p>

            <div class="about-cta">
                <a href="{{route('frontend.contect')}}">Contact Us</a>
            </div>

        </div>

    </div>
</section>
@include('frontend.footer')

</body>
</html>