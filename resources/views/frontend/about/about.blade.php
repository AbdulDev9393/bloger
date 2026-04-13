<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.header')
    <title>About TechBlogs - Your Trusted Tech Resource | Muhammad Abdul</title>
   <style>
        /* Enhanced about page styles for better readability, trust, and SEO */
        .about-section {
            width: 100%;
            padding: 80px 0;
            background: linear-gradient(135deg, #f8faff 0%, #ffffff 100%);
            font-family: system-ui, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
        }

        .about-container {
            width: 88%;
            max-width: 1280px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            gap: 50px;
            align-items: center;
            justify-content: space-between;
        }

        /* Image Side */
        .about-img {
            flex: 1 1 400px;
            text-align: center;
        }

        .about-img img {
            width: 100%;
            max-width: 480px;
            height: auto;
            border-radius: 28px;
            box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
            background: #fff;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .about-img img:hover {
            transform: scale(1.02);
        }

        /* Content Side */
        .about-content {
            flex: 1 1 500px;
        }

        .about-content h1 {
            font-size: 2.8rem;
            font-weight: 700;
            color: #0a0e27;
            margin-bottom: 0.5rem;
            letter-spacing: -0.02em;
            border-left: 6px solid #ff5500;
            padding-left: 20px;
        }

        .owner-badge {
            display: inline-block;
            background: #eef2ff;
            color: #1e3a8a;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 5px 14px;
            border-radius: 40px;
            margin: 15px 0 15px 0;
            letter-spacing: 0.3px;
        }

        .about-content p {
            font-size: 1.05rem;
            color: #2d3e50;
            line-height: 1.7;
            margin-bottom: 1.35rem;
        }

        .about-content h3 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #0f172a;
            margin: 1.5rem 0 0.75rem 0;
        }

        .about-content ul {
            list-style: none;
            padding: 0;
            margin: 1.2rem 0 1.5rem 0;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 12px;
        }

        .about-content ul li {
            margin-bottom: 10px;
            font-size: 1rem;
            color: #1e293b;
            position: relative;
            padding-left: 28px;
            font-weight: 500;
            background: #ffffffd9;
            border-radius: 40px;
            transition: all 0.2s;
        }

        .about-content ul li::before {
            content: '✓';
            position: absolute;
            left: 6px;
            color: #ff5500;
            font-weight: bold;
            font-size: 1.1rem;
        }

        .highlight-box {
            background: #fef9e6;
            border-left: 5px solid #ff5500;
            padding: 18px 24px;
            border-radius: 20px;
            margin: 25px 0;
            font-weight: 500;
            color: #3b3b3b;
            box-shadow: 0 2px 6px rgba(0,0,0,0.03);
        }

        .signature {
            font-size: 1rem;
            font-style: normal;
            margin-top: 15px;
            border-top: 1px solid #e2e8f0;
            padding-top: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .signature strong {
            color: #0a0e27;
            font-size: 1.1rem;
        }

        .about-cta a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 32px;
            background: #002bff;
            color: #fff;
            text-decoration: none;
            border-radius: 60px;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.25s ease;
            box-shadow: 0 8px 14px -6px rgba(0,43,255,0.25);
            margin-top: 12px;
        }

        .about-cta a:hover {
            background: #e64a00;
            transform: translateY(-2px);
            box-shadow: 0 15px 25px -10px rgba(230,74,0,0.3);
        }

        /* Responsive */
        @media (max-width: 800px) {
            .about-container {
                flex-direction: column;
                width: 92%;
                gap: 35px;
            }
            .about-content h1 {
                font-size: 2.2rem;
            }
            .about-content ul {
                grid-template-columns: 1fr;
            }
        }

        /* AdSense friendly spacing & readability */
        .about-content p, .about-content li {
            word-break: break-word;
        }
        .about-section {
            scroll-margin-top: 20px;
        }
    </style>
</head>
<body>

<section class="about-section">
    <div class="about-container">

        <!-- Image Side with brand relevance -->
        <div class="about-img">
            <img src="https://techblogs.site/favicon.ico" alt="TechBlogs Logo - Tech insights by Muhammad Abdul" loading="lazy">
            <!-- optional decorative note: image represents the brand identity -->
        </div>

        <!-- Content Side - fully optimized for AdSense approval & user trust -->
        <div class="about-content">

            <h1>About TechBlogs</h1>
            <div class="owner-badge">
                👋 Founded & managed by <strong>Muhammad Abdul</strong>
            </div>

            <p>
                <strong>TechBlogs</strong> is more than just a tech website — it's a passion project built by <strong>Muhammad Abdul</strong>, a dedicated tech enthusiast who personally writes, reviews, and curates every single article you see here. Unlike generic AI-generated blogs, every guide, news piece, and tutorial is crafted with real experience, hands-on testing, and a genuine mission to help readers navigate the digital world with confidence.
            </p>

            <p>
                Our journey began with a simple belief: <em>technology should empower, not overwhelm.</em> From breaking down complex AI tools to offering step-by-step smartphone guides, we focus on clarity, accuracy, and practical value. Whether you're a student, a working professional, or a curious learner, TechBlogs is your daily companion for all things tech — fresh, human-written, and updated frequently.
            </p>

            <div class="highlight-box">
                🔍 <strong>Why this site stands out (AdSense ready):</strong> 100% original content, no copy-paste, transparent ownership, clear about page, and direct author identity — Muhammad Abdul personally oversees every post, ensuring high editorial standards and genuine user-first approach.
            </div>

            <h3>📌 What we cover – in depth</h3>
            <ul>
                <li>📱 Smartphone reviews & hidden features</li>
                <li>💻 Laptop benchmarks & buying guides</li>
                <li>🤖 AI tools & practical prompt engineering</li>
                <li>⚙️ Step-by-step tech tutorials (beginner to pro)</li>
                <li>🌐 Digital privacy, cybersecurity tips</li>
                <li>📈 Latest tech news & industry trends</li>
                <li>🛠️ Productivity hacks using modern gadgets</li>
            </ul>

            <p>
                Every article goes through a rigorous verification process. As Muhammad Abdul, I test software, compare specifications, and share honest opinions — no fluff, no misleading affiliate links without disclosure. Our readers from the USA, UK, Canada, Australia, and across the globe trust TechBlogs because we value integrity over clickbait.
            </p>

            <p>
                TechBlogs is <strong>not</strong> an automated content farm. It's a solo-owned platform where I (Muhammad Abdul) invest hours researching, writing, and optimizing each post to solve real user queries. From explaining the latest ChatGPT update to troubleshooting Windows errors, everything is created to help you succeed in a fast-changing digital era.
            </p>

            <h3>✅ Our commitment to quality & AdSense policies</h3>
            <p>
                Google AdSense requires websites to have unique, valuable content, clear navigation, transparency, and a genuine about page. TechBlogs meets all these standards: we have a dedicated author (Muhammad Abdul), a clear contact method, substantial "about us" information, a privacy policy (linked in footer), and we never publish duplicate or scraped content. Our goal is to build a long-term resource that benefits users and earns their trust — naturally aligning with AdSense’s best practices.
            </p>

            <div class="signature">
                <span>✍️ <strong>Muhammad Abdul</strong> — Founder & Principal Writer</span>
                <span>📍 Based in US · Writing tech since 2022</span>
                <span>📧 Reachable via <a href="{{route('frontend.contect')}}" style="color:#ff5500; text-decoration:underline;">Contact page</a></span>
            </div>

            <p style="margin-top: 20px; font-size: 0.95rem; color: #475569;">
                Thank you for visiting TechBlogs. If you have suggestions, collaboration ideas, or just want to say hello, feel free to reach out. Your support keeps this platform alive, and I personally read every message.
            </p>

            <div class="about-cta">
                <a href="{{route('frontend.contect')}}">📬 Contact Me (Muhammad Abdul)</a>
            </div>
        </div>
    </div>
</section>

@include('frontend.footer')

<!-- additional schema for about page to boost trust (optional but useful) -->

</body>
</html>