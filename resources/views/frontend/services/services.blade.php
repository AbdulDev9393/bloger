@include('frontend.header')
<style>
.services-section{
    width:100%;
    padding:70px 0;
    background:#f7f7f7;
}

.services-container{
    width:90%;
    margin:auto;
}

.services-header{
    text-align:center;
    margin-bottom:50px;
}

.services-header h1{
    font-size:32px;
    color:#222;
}

.services-header p{
    font-size:16px;
    color:#666;
    max-width:600px;
    margin:10px auto 0;
}

/* Cards */
.services-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(260px, 1fr));
    gap:25px;
}

.service-card{
    background:#fff;
    padding:30px 22px;
    border-radius:10px;
    text-align:center;
    box-shadow:0 5px 15px rgba(0,0,0,0.12);
    transition:0.3s;
    border:2px solid transparent;
}

.service-card:hover{
    border:2px solid #ff5500;
    transform:translateY(-6px);
    box-shadow:0 10px 25px rgba(255,85,0,0.3);
}

.service-icon{
    width:70px;
    height:70px;
    margin:0 auto 20px;
    background:#ff5500;
    color:#fff;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:28px;
}

.service-card h3{
    font-size:20px;
    margin-bottom:12px;
    color:#222;
}

.service-card p{
    font-size:15px;
    color:#555;
    line-height:1.6;
}

/* CTA */
.services-cta{
    text-align:center;
    margin-top:50px;
}

.services-cta a{
    display:inline-block;
    padding:12px 30px;
    background:#ff5500;
    color:#fff;
    text-decoration:none;
    border-radius:6px;
    font-size:16px;
    transition:0.3s;
}

.services-cta a:hover{
    background:#e64a00;
}
</style>
<section class="services-section">
    <div class="services-container">

        <!-- Heading -->
        <div class="services-header">
            <h1>Our Services</h1>
            <p>
                We provide professional blogging, SEO, and web development services
                to help your business grow online.
            </p>
        </div>

        <!-- Services Cards -->
        <div class="services-grid">

            <!-- Entertainment -->
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-film"></i>
                </div>
                <h3>Entertainment</h3>
                <p>
                    Latest movies, dramas, celebrity news, reviews
                    and entertainment trends.
                </p>
            </div>

            <!-- Technology -->
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-microchip"></i>
                </div>
                <h3>Technology</h3>
                <p>
                    Tech news, gadgets reviews, AI updates,
                    and latest innovations.
                </p>
            </div>

            <!-- Digital -->
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-globe"></i>
                </div>
                <h3>Digital</h3>
                <p>
                    Digital marketing, blogging, SEO,
                    online earning and trends.
                </p>
            </div>

            <!-- Culture -->
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Culture</h3>
                <p>
                    Lifestyle, traditions, social topics,
                    and modern cultural discussions.
                </p>
            </div>

            <!-- Business -->
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>Business</h3>
                <p>
                    Startups, online business ideas,
                    finance and growth strategies.
                </p>
            </div>

            <!-- Lifestyle -->
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3>Lifestyle</h3>
                <p>
                    Health, fitness, motivation,
                    daily life tips and inspiration.
                </p>
            </div>
            <!-- Gaming -->
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-gamepad"></i>
                </div>
                <h3>Gaming</h3>
                <p>
                    Latest game reviews, walkthroughs,
                    esports news, and trending games.
                </p>
            </div>

            <!-- Travel -->
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-plane"></i>
                </div>
                <h3>Travel</h3>
                <p>
                    Travel guides, tips, destination reviews,
                    and adventure experiences.
                </p>
            </div>

        </div>


        <!-- CTA -->
        <div class="services-cta">
            <a href="{{route('frontend.contect')}}">Contact Us</a>
        </div>

    </div>
</section>
@include('frontend.footer')
