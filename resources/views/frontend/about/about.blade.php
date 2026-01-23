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
            <img src="https://techblogs.site//favicon.ico" alt="About Us">
        </div>

        <!-- Content Side -->
        <div class="about-content">
            <h1>Welcome to our tech blog!</h1>
            <p>
               We are passionate about sharing the latest tips, tricks, and tutorials in the world of technology. From laptops and smartphones to cutting-edge gadgets, we aim to provide our readers with easy-to-understand guides and insights to stay ahead in this fast-paced digital world.
            </p> <p>
Our team writes daily posts to keep you updated with the newest trends, product reviews, and practical tech advice. Whether you are a beginner or a tech enthusiast, our content is designed to help you make the most of your devices and digital lifestyle.<p>
            <p>Our key strengths:</p>
           <ul>
                    <li>I write blogs mostly focused on popular countries like the USA, UK, and others.</li>
                    <li>Providing useful information and tips to readers worldwide.</li>
                    <li>Sharing daily insights on technology, gadgets, and digital trends.</li>
                    <li>Covering topics that help people stay updated and informed.</li>
                    <li>Creating content that educates, informs, and engages tech enthusiasts.</li>
                </ul>

            <div class="about-cta">
                <a href="{{route('frontend.contect')}}">Contact Us</a>
            </div>
        </div>

    </div>
</section>

@include('frontend.footer')