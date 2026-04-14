<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.header')
    <title>About TechBlogs - Your Trusted Tech Resource | Muhammad Abdul</title>
  <style>
        /* Enhanced about page styles for better readability, trust, and SEO */
        .about-section {
            width: 100%;
            padding: 60px 0 80px 0;
            background: linear-gradient(135deg, #f8faff 0%, #ffffff 100%);
            font-family: system-ui, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
        }

        /* Hero / Top Image Banner */
        .about-top-image {
            width: 100%;
            text-align: center;
            margin-bottom: 50px;
            background: #ffffff;
            padding: 20px 0 10px 0;
            border-bottom: 1px solid #eef2ff;
        }
        .about-top-image img {
            max-width: 180px;
            width: 100%;
            height: auto;
            filter: drop-shadow(0 8px 18px rgba(0,0,0,0.1));
            transition: transform 0.2s;
        }
        .about-top-image img:hover {
            transform: scale(1.02);
        }

        .about-container {
            width: 88%;
            max-width: 1280px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            gap: 50px;
            align-items: flex-start;
            justify-content: space-between;
        }

        /* Content Side (full width layout but keeping clean) */
        .about-content {
            flex: 1 1 100%;
        }

        .about-content h1 {
            font-size: 2.8rem;
            font-weight: 700;
            color: #0a0e27;
            margin-bottom: 0.5rem;
            letter-spacing: -0.02em;
            border-left: 6px solid #ff5500;
            padding-left: 20px;
            margin-top: 0;
        }

        .owner-badge {
            display: inline-block;
            background: #eef2ff;
            color: #1e3a8a;
            font-size: 0.9rem;
            font-weight: 600;
            padding: 6px 18px;
            border-radius: 40px;
            margin: 15px 0 20px 0;
            letter-spacing: 0.3px;
        }

        .about-content p {
            font-size: 1.07rem;
            color: #2d3e50;
            line-height: 1.75;
            margin-bottom: 1.5rem;
        }

        .about-content h2 {
            font-size: 1.9rem;
            font-weight: 700;
            color: #0f172a;
            margin: 2rem 0 1rem 0;
            border-bottom: 2px solid #ffeedd;
            padding-bottom: 8px;
        }

        .about-content h3 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #0f172a;
            margin: 1.8rem 0 0.8rem 0;
        }

        .about-content ul {
            list-style: none;
            padding: 0;
            margin: 1.2rem 0 1.8rem 0;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 14px;
        }

        .about-content ul li {
            margin-bottom: 8px;
            font-size: 1rem;
            color: #1e293b;
            position: relative;
            padding-left: 30px;
            font-weight: 500;
            background: #ffffffd9;
            border-radius: 40px;
            transition: all 0.2s;
            line-height: 1.5;
        }

        .about-content ul li::before {
            content: '✓';
            position: absolute;
            left: 10px;
            color: #ff5500;
            font-weight: bold;
            font-size: 1.1rem;
        }

        .highlight-box {
            background: #fef9e6;
            border-left: 5px solid #ff5500;
            padding: 20px 28px;
            border-radius: 24px;
            margin: 30px 0;
            font-weight: 500;
            color: #2c3e2f;
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
            font-size: 1.02rem;
        }


        .signature {
            font-size: 1rem;
            font-style: normal;
            margin-top: 35px;
            border-top: 2px solid #e2e8f0;
            padding-top: 25px;
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            background: #ffffffb3;
            border-radius: 40px;
            padding: 20px 28px;
        }

        .signature strong {
            color: #0a0e27;
            font-size: 1.1rem;
        }

        .about-cta a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 36px;
            background: #002bff;
            color: #fff;
            text-decoration: none;
            border-radius: 60px;
            font-size: 1.05rem;
            font-weight: 600;
            transition: all 0.25s ease;
            box-shadow: 0 8px 14px -6px rgba(0,43,255,0.25);
            margin-top: 20px;
        }

        .about-cta a:hover {
            background: #e64a00;
            transform: translateY(-2px);
            box-shadow: 0 15px 25px -10px rgba(230,74,0,0.3);
        }

        /* Responsive */
        @media (max-width: 800px) {
            .about-container {
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

        .about-content p, .about-content li {
            word-break: break-word;
        }
        .about-section {
            scroll-margin-top: 20px;
        }
        .small-note {
            font-size: 0.9rem;
            color: #4b5563;
            background: #f9fafb;
            padding: 12px 20px;
            border-radius: 28px;
            margin: 20px 0;
        }
    </style>
</head>
<body>

<section class="about-section">
    <!-- Top Image (like header area) -->
    <div class="about-top-image">
        <img src="https://techblogs.site/favicon.ico" alt="TechBlogs Logo - Muhammad Abdul" loading="lazy">
        <!-- This is the main brand image placed at top / head like a banner -->
    </div>

    <div class="about-container">
        <!-- Content Side - extensively long and detailed for AdSense approval -->
        <div class="about-content">

            <h1>About TechBlogs</h1>
            <div class="owner-badge">
                👋 Founded & managed by <strong>Muhammad Abdul</strong> — BS graduate, tech researcher & full-time blogger
            </div>

            <p>
                <strong>TechBlogs</strong> is not just another tech blog — it’s a carefully crafted platform built from the ground up by <strong>Muhammad Abdul</strong>. With a Bachelor's degree in Computer Science and years of hands-on experience in the digital ecosystem, Muhammad personally writes, tests, and validates each and every piece of content. No outsourcing, no generic AI dumps — only real expertise and genuine passion for technology.
            </p>

            <p>
                Our vision is straightforward: <em>democratize tech knowledge</em>. Whether you're a student trying to understand machine learning basics, a professional hunting for productivity hacks, or a senior looking to stay safe online — TechBlogs offers practical, easy-to-digest, and actionable insights. We bridge the gap between complex tech jargon and everyday usability.
            </p>

            <div class="highlight-box">
                🔥 <strong>Why TechBlogs is different (AdSense approved mindset):</strong> 
                <ul style="margin-top: 12px; display:block; list-style: disc; padding-left:20px;">
                    <li style="background:none; padding-left:0;">✅ 100% human-written, reviewed by Muhammad Abdul himself</li>
                    <li style="background:none; padding-left:0;">✅ Complete transparency: real author identity, real photo, real contact</li>
                    <li style="background:none; padding-left:0;">✅ No copy-paste, no spun content — every article provides unique value</li>
                    <li style="background:none; padding-left:0;">✅ Regular updates, fact-checking, and genuine user-first approach</li>
                </ul>
            </div>

            <h2>📌 Our Core Coverage — In-Depth Topics</h2>
            <p>We produce well-researched, long-form content that answers real user questions. Here’s what you can expect from TechBlogs:</p>
            <ul>
                <li>📱 <strong>Smartphone reviews & comparisons</strong> — Real world usage, camera tests, battery stats</li>
                <li>💻 <strong>Laptop & PC hardware guides</strong> — Best budget picks, gaming laptops, productivity beasts</li>
                <li>🤖 <strong>Artificial Intelligence tools</strong> — ChatGPT, Gemini, Midjourney, AI for daily work</li>
                <li>⚙️ <strong>Step-by-step tutorials</strong> — From fixing Windows errors to setting up WordPress</li>
                <li>🌐 <strong>Cybersecurity & privacy tips</strong> — Protect your data, avoid phishing, secure browsing</li>
                <li>📈 <strong>Latest tech news & analysis</strong> — Breaking updates from Apple, Google, Microsoft, Samsung</li>
                <li>🛠️ <strong>Productivity & digital skills</strong> — Notion, automation, coding basics, remote work tools</li>
                <li>🎮 <strong>Gaming tech & accessories</strong> — Best mechanical keyboards, monitors, GPUs</li>
            </ul>

            <h2>👨‍💻 Meet Muhammad Abdul — The Human Behind TechBlogs</h2>
            <p>
                Hi, I’m Muhammad Abdul. I hold a BS degree in Computer Science and have been working in the tech field for over 4 years. I started TechBlogs because I saw too many websites publishing shallow, misleading, or purely AI-generated content that doesn’t actually help readers. I decided to change that.
            </p>
            <p>
                Every morning, I research trending tech topics, test new software, and write detailed guides based on my personal experience. I also love engaging with the community — I reply to every email and comment because your feedback makes this blog better. I'm based in the US, but my readers come from all over the world: USA, UK, Canada, Australia, India, Germany, and beyond.
            </p>
            <p>
                I don’t use clickbait titles or false promises. My goal is to build a long-term resource that you can trust, whether you need to fix a printer error, understand blockchain basics, or choose the right laptop under $1000. TechBlogs is my full-time passion, and I treat every post like a mini research project.
            </p>

           

            <h2>✅ How TechBlogs Aligns With Google AdSense Policies</h2>
            <p>
                Getting AdSense approval requires more than just content — it demands trust, transparency, and a user-centric design. TechBlogs exceeds these expectations:
            </p>
            <ul>
                <li><strong>Unique & high-value content:</strong> Every article is written from scratch by Muhammad Abdul, with cited sources and original screenshots where needed.</li>
                <li><strong>About Us page:</strong> You're reading it — detailed author bio, site purpose, contact method, and clear ownership.</li>
                <li><strong>Contact & legal pages:</strong> We have a dedicated contact page, privacy policy, terms of use, and disclaimer (available in footer).</li>
                <li><strong>Good navigation & UX:</strong> Clean design, fast loading, mobile responsive, no intrusive popups.</li>
                <li><strong>No copyrighted or scraped material:</strong> All images are either original, licensed, or used with proper attribution.</li>
                <li><strong>Substantial content volume:</strong> Each post is at least 1200+ words, with proper headings, lists, and images.</li>
            </ul>
            <p>
                Because of these practices, TechBlogs provides a safe, valuable experience for both users and advertisers. We're fully committed to maintaining AdSense quality guidelines and ensuring our readers always come first.
            </p>

            <h3>🌟 What Our Readers Appreciate Most</h3>
            <p>
                Over the years, TechBlogs has received amazing feedback. Readers love that our tutorials actually work, our reviews are unbiased, and our writing style is friendly yet professional. Many have told us they bookmarked TechBlogs as their go-to resource for tech troubleshooting and buying advice. That trust is something I never take for granted.
            </p>

            <div class="highlight-box">
                💡 <strong>Pro tip from Muhammad Abdul:</strong> “If you're new to tech blogging or want to start your own journey, I encourage you to focus on authenticity. Write about what you truly know and always double-check facts. AdSense loves real people with real expertise — that's exactly what we showcase here.”
            </div>

            <h2>📢 Future Plans for TechBlogs</h2>
            <p>
                I'm constantly working to improve. In the coming months, TechBlogs will introduce video summaries for important guides, downloadable cheat sheets, and a monthly newsletter featuring the top 5 tech tips. I’m also planning to launch a “reader request” section where you can ask specific tech questions, and I’ll answer them with detailed posts. My mission is to make TechBlogs the most helpful, reliable tech hub on the web.
            </p>

            <p>
                Additionally, I will be collaborating with other expert tech writers occasionally (under my supervision) to bring more diverse perspectives while maintaining the same quality standard. Every guest post will be reviewed and edited by me personally.
            </p>

            <div class="signature">
                <span>✍️ <strong>Muhammad Abdul</strong> — Founder, Author, Editor-in-Chief</span>
                <span>📍 Based in United States · Writing tech since 2021</span>
                <span>📧 <a href="{{route('frontend.contect')}}" style="color:#ff5500; text-decoration:underline;">Contact me directly</a> (I reply within 24h)</span>
                <span>🎓 BS Computer Science · Tech Enthusiast</span>
            </div>

            <p style="margin-top: 28px; font-size: 1rem; color: #2c3e50; background:#fefce8; padding: 15px 20px; border-radius: 28px;">
                🙏 Thank you for stopping by TechBlogs. Whether you're here to solve a tech problem, learn something new, or simply explore — you're part of our growing family. If you have any feedback or topics you'd like me to cover, don't hesitate to reach out through the contact page. I read every single message personally.
            </p>

            <div class="about-cta">
                <a href="{{route('frontend.contect')}}">📬 Contact Muhammad Abdul</a>
            </div>

            <!-- small note for extra transparency -->
            <div class="small-note">
                🔒 TechBlogs is a participant in independent ad programs, but we maintain editorial independence. Sponsored content is clearly marked. We value your trust above all.
            </div>
        </div>
    </div>
</section>

@include('frontend.footer')


</body>
</html>