<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.header')
</head>
<body>

@php
use Illuminate\Support\Str;
@endphp

<style>
    /* ===== RESET & BASE ===== */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        background: #ffffff;
        color: #1e293b;
        line-height: 1.5;
        scroll-behavior: smooth;
    }
.hero-main-title {
    font-size: clamp(32px, 5vw, 56px);
    font-weight: 900;
    line-height: 1.1;
    margin-bottom: 20px;

    /* Gradient Text */
    background: linear-gradient(135deg, #4e83fa, #58c918);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;

    letter-spacing: -1px;

    /* Better rendering */
    text-wrap: balance;

    /* Smooth animation */
    animation: fadeUp 0.7s ease;
}

/* Optional highlight word */
.hero-main-title span {
    background: linear-gradient(135deg, #ff5500, #ff7700);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Animation */
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(25px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
    /* ===== TYPOGRAPHY ===== */
    h1, h2, h3, h4 {
        font-weight: 700;
        letter-spacing: -0.02em;
    }

    /* ===== HERO SECTION (Enhanced) ===== */
    .hero {
        padding: 80px 20px;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        position: relative;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #4e83fa, #58c918);
    }

    .hero-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        max-width: 1280px;
        margin: 0 auto;
        gap: 60px;
        flex-wrap: wrap;
    }

    .hero-content {
        flex: 1;
         min-width: 0;
    }

    .hero-content h1 {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        background: linear-gradient(135deg, #1e293b, #334155);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
        line-height: 1.2;
    }

    .hero-content p {
        font-size: 16px;
        color: #475569;
        margin-bottom: 2rem;
        line-height: 1.7;
    }

    .btn-readmore {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 14px 32px;
        background: linear-gradient(135deg, #4e83fa, #58c918);
        color: white;
        text-decoration: none;
        font-weight: 600;
        border-radius: 40px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(78, 131, 250, 0.2);
        font-size: 1rem;
    }

    .btn-readmore:hover {
        background: linear-gradient(135deg, #ff5500, #ff7700);
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(255, 85, 0, 0.3);
    }

    .hero-image {
        flex: 1;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 20px 35px -10px rgba(0, 0, 0, 0.15);
        transition: transform 0.4s ease;
    }

    .hero-image:hover {
        transform: scale(1.02);
    }

    .hero-image img {
        width: 100%;
        height: auto;
        display: block;
        object-fit: cover;
        aspect-ratio: 5 / 3;
    }

    /* ===== BLOGS SECTION ===== */
    .blogs-section {
        padding: 80px 20px;
        background: #ffffff;
    }

    .container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .section-title {
        text-align: center;
        font-size: 2.5rem;
        margin-bottom: 3rem;
        color: #0f172a;
        position: relative;
        padding-bottom: 1rem;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(135deg, #4e83fa, #58c918);
        border-radius: 4px;
    }

    .blogs-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
    }

    .blog-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.02);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        border: 1px solid #eef2ff;
    }

    .blog-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 30px -12px rgba(0, 0, 0, 0.15);
        border-color: #cbd5e1;
    }

    .blog-image {
        width: 100%;
        height: 220px;
        overflow: hidden;
        background: #f1f5f9;
    }

    .blog-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .blog-card:hover .blog-image img {
        transform: scale(1.05);
    }

    .blog-title {
        font-size: 1.25rem;
        margin: 1.25rem 1.25rem 0.5rem;
        line-height: 1.4;
    }

    .blog-title a {
        text-decoration: none;
        color: #0f172a;
        transition: color 0.2s;
    }

    .blog-title a:hover {
        color: #4e83fa;
    }

    .blog-excerpt {
        font-size: 0.875rem;
        color: #475569;
        margin: 0 1.25rem 1rem;
        line-height: 1.6;
    }

    .read-more {
        margin: 0 1.25rem 1.5rem;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-weight: 600;
        color: #4e83fa;
        text-decoration: none;
        transition: gap 0.2s;
    }

    .read-more:hover {
        gap: 10px;
        color: #ff5500;
    }

    /* ===== CATEGORY CARDS (Enhanced) ===== */
    .category-card {
        display: block;
        background: white;
        border-radius: 24px;
        padding: 32px;
        text-decoration: none;
        color: inherit;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        border: 1px solid #eef2ff;
        text-align: center;
    }

    .category-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 30px -12px rgba(0, 0, 0, 0.12);
        border-color: #4e83fa;
    }

    .category-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 12px;
        color: #0f172a;
    }

    .category-stats {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 20px;
        border-top: 1px solid #e2e8f0;
        color: #64748b;
        font-size: 0.9rem;
    }
    .section-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .section-header .section-title {
        margin-bottom: 1rem;
    }

    .section-subtitle {
        font-size: 1.125rem;
        color: #475569;
        max-width: 600px;
        margin: 0 auto;
    }




    .stat-label {
        font-size: 0.875rem;
        color: #475569;
    }


    .btn-primary, .btn-secondary {
        display: inline-block;
        padding: 12px 32px;
        border-radius: 40px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s;
        margin: 0 8px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #4e83fa, #58c918);
        color: white;
        box-shadow: 0 2px 8px rgba(78, 131, 250, 0.2);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #ff5500, #ff7700);
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(255, 85, 0, 0.2);
    }

    .btn-secondary {
        background: transparent;
        color: #1e293b;
        border: 2px solid #cbd5e1;
    }

    .btn-secondary:hover {
        border-color: #4e83fa;
        background: #f8fafc;
        transform: translateY(-2px);
    }

    /* ===== NEWSLETTER (Clean) ===== */
    .newsletter {
        background: #f8fafc;
        border-radius: 32px;
        padding: 60px 40px;
        text-align: center;
        margin: 40px auto;
        max-width: 800px;
    }

    .subscribe-form {
        display: flex;
        gap: 12px;
        max-width: 500px;
        margin: 24px auto 0;
    }

    .subscribe-form input {
        flex: 1;
        padding: 14px 20px;
        border: 1px solid #e2e8f0;
        border-radius: 60px;
        font-size: 1rem;
    }

    .subscribe-form button {
        padding: 14px 28px;
        background: #4e83fa;
        border: none;
        border-radius: 60px;
        color: white;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
    }

    .subscribe-form button:hover {
        background: #ff5500;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 1024px) {
        .hero-container {
            flex-direction: column-reverse;
            text-align: center;
            gap: 40px;
        }
        .hero-content h1 {
            font-size: 2.25rem;
        }
        .blogs-grid {
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .hero {
            padding: 60px 20px;
        }
        .section-title {
            font-size: 2rem;
        }


        .subscribe-form {
            flex-direction: column;
        }
        .btn-primary, .btn-secondary {
            margin: 6px;
            width: 100%;
            max-width: 280px;
        }
        h2 {
        font-size: 20px;
    }
    }


        /* ===== TEAM SECTION STYLES ===== */
    .team-section {
        padding: 90px 20px;
        background: #ffffff;
        position: relative;
        overflow: hidden;
    }

    .team-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #4e83fa, #58c918, #f59e0b, #8b5cf6);
        background-size: 300% 100%;
        animation: gradientMove 6s ease infinite;
    }

    @keyframes gradientMove {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .team-section .container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Section Header */
    .team-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .team-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, rgba(78, 131, 250, 0.1), rgba(88, 201, 24, 0.1));
        border: 1px solid rgba(78, 131, 250, 0.2);
        color: #4e83fa;
        padding: 6px 18px;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-bottom: 16px;
    }

    .team-title {
        font-size: clamp(2rem, 4vw, 2.8rem);
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 16px;
        line-height: 1.2;
    }

    .team-title span {
        background: linear-gradient(135deg, #4e83fa, #58c918);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .team-subtitle {
        font-size: 1.1rem;
        color: #64748b;
        max-width: 560px;
        margin: 0 auto;
        line-height: 1.7;
    }

    /* Team Grid */
    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 30px;
        margin-bottom: 50px;
    }

    /* Team Card */
    .team-card {
        background: #ffffff;
        border-radius: 24px;
        padding: 36px 28px;
        text-align: center;
        border: 1px solid #eef2ff;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .team-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #4e83fa, #58c918);
        transform: scaleX(0);
        transition: transform 0.4s ease;
        transform-origin: left;
    }

    .team-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(78, 131, 250, 0.12);
        border-color: rgba(78, 131, 250, 0.2);
    }

    .team-card:hover::before {
        transform: scaleX(1);
    }

    /* Avatar */
    .team-avatar-wrap {
        position: relative;
        display: inline-block;
        margin-bottom: 20px;
    }

    .team-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid transparent;
        background: linear-gradient(white, white) padding-box,
                    linear-gradient(135deg, #4e83fa, #58c918) border-box;
        transition: transform 0.4s ease;
    }

    .team-card:hover .team-avatar {
        transform: scale(1.08);
    }

    /* Online badge */
    .team-status {
        position: absolute;
        bottom: 4px;
        right: 4px;
        width: 18px;
        height: 18px;
        background: #22c55e;
        border-radius: 50%;
        border: 3px solid white;
        box-shadow: 0 0 0 2px rgba(34, 197, 94, 0.3);
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% { box-shadow: 0 0 0 2px rgba(34, 197, 94, 0.3); }
        50% { box-shadow: 0 0 0 6px rgba(34, 197, 94, 0.1); }
    }

    /* Member Info */
    .team-name {
        font-size: 1.2rem;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 6px;
    }

    .team-role {
        display: inline-block;
        background: linear-gradient(135deg, rgba(78, 131, 250, 0.1), rgba(88, 201, 24, 0.08));
        color: #4e83fa;
        font-size: 0.78rem;
        font-weight: 600;
        padding: 4px 14px;
        border-radius: 50px;
        letter-spacing: 0.5px;
        margin-bottom: 14px;
    }

    .team-bio {
        font-size: 0.875rem;
        color: #64748b;
        line-height: 1.65;
        margin-bottom: 20px;
    }

    /* Stats row */
    .team-stats {
        display: flex;
        justify-content: center;
        gap: 20px;
        padding: 14px 0;
        border-top: 1px solid #f1f5f9;
        border-bottom: 1px solid #f1f5f9;
        margin-bottom: 20px;
    }

    .team-stat {
        text-align: center;
    }

    .team-stat-num {
        display: block;
        font-size: 1.1rem;
        font-weight: 800;
        color: #0f172a;
        line-height: 1;
    }

    .team-stat-label {
        font-size: 0.7rem;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-top: 3px;
        display: block;
    }

    /* Social links */
    .team-socials {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .team-social-link {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #64748b;
        font-size: 14px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .team-social-link:hover {
        background: linear-gradient(135deg, #4e83fa, #58c918);
        color: white;
        border-color: transparent;
        transform: translateY(-3px);
        box-shadow: 0 6px 12px rgba(78, 131, 250, 0.25);
    }

    /* Join CTA */
    .team-cta {
        text-align: center;
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        border-radius: 24px;
        padding: 50px 30px;
        border: 1px dashed #cbd5e1;
        transition: all 0.3s ease;
    }

    .team-cta:hover {
        border-color: #4e83fa;
        background: linear-gradient(135deg, rgba(78, 131, 250, 0.03), rgba(88, 201, 24, 0.03));
    }

    .team-cta h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 10px;
    }

    .team-cta p {
        color: #64748b;
        font-size: 0.95rem;
        margin-bottom: 24px;
        max-width: 480px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.6;
    }

    .btn-join {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 14px 32px;
        background: linear-gradient(135deg, #4e83fa, #58c918);
        color: white;
        text-decoration: none;
        font-weight: 600;
        border-radius: 40px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 14px rgba(78, 131, 250, 0.25);
    }

    .btn-join:hover {
        background: linear-gradient(135deg, #ff5500, #ff7700);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(255, 85, 0, 0.3);
        color: white;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .team-section {
            padding: 60px 20px;
        }
        .team-grid {
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 20px;
        }
    }

    @media (max-width: 480px) {
        .team-grid {
            grid-template-columns: 1fr;
        }
        .team-cta {
            padding: 36px 20px;
        }
    }
.pro-section {
    padding: 17px 20px;
    background: #ffffff;
    position: relative;
}

.pro-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Section Header - Professional */
.pro-header {
    text-align: center;
    margin-bottom: 60px;
}

.pro-badge {
    display: inline-block;
    background: #f1f5f9;
    color: #4e83fa;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    padding: 6px 16px;
    border-radius: 30px;
    margin-bottom: 20px;
}

.pro-title {
    font-size: clamp(28px, 4vw, 42px);
    font-weight: 700;
    color: #0a0a0a;
    margin-bottom: 16px;
    letter-spacing: -0.02em;
}

.pro-title span {
    color: #4e83fa;
}


/* Filter Tabs */
.pro-tabs {
    display: flex;
    justify-content: center;
    gap: 12px;
    flex-wrap: wrap;
    margin-bottom: 48px;
}

.pro-tab-btn {
    background: transparent;
    border: 1px solid #e2e8f0;
    padding: 10px 24px;
    border-radius: 40px;
    font-size: 0.85rem;
    font-weight: 500;
    color: #475569;
    cursor: pointer;
    transition: all 0.25s ease;
    font-family: inherit;
}

.pro-tab-btn:hover {
    border-color: #4e83fa;
    color: #4e83fa;
}

.pro-tab-btn.active {
    background: #0f172a;
    border-color: #0f172a;
    color: white;
}

/* Product Grid - 4 columns professional */
.pro-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 28px;
    margin-bottom: 50px;
}

/* Product Card - Clean & Professional */
.pro-card {
    background: #ffffff;
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 1px solid #edf2f7;
    position: relative;
}

.pro-card:hover {
    transform: translateY(-6px);
    border-color: #e2e8f0;
    box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.08);
}

/* Image Container */
.pro-card-img {
    position: relative;
    background: #fafbfc;
    padding: 24px;
    text-align: center;
    border-bottom: 1px solid #f0f2f5;
}

.pro-card-img img {
    width: 100%;
    max-width: 180px;
    height: auto;
    aspect-ratio: 1 / 1;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.pro-card:hover .pro-card-img img {
    transform: scale(1.03);
}


.pro-new-badge {
    background: #4e83fa;
}

/* Content */
.pro-card-content {
    padding: 20px 20px 24px;
}

.pro-product-name {
    font-size: 1rem;
    font-weight: 600;
    color: #0a0a0a;
    margin-bottom: 8px;
    line-height: 1.4;
}

.pro-product-desc {
    font-size: 0.8rem;
    color: #6c7a8a;
    line-height: 1.5;
    margin-bottom: 16px;
}

/* Rating */
.pro-rating {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 12px;
}

.pro-stars {
    color: #f5b042;
    font-size: 0.7rem;
    letter-spacing: 2px;
}


/* Price */
.pro-price-row {
    display: flex;
    align-items: baseline;
    gap: 10px;
    margin-bottom: 18px;
    flex-wrap: wrap;
}

.pro-current-price {
    font-size: 1.3rem;
    font-weight: 700;
    color: #0a0a0a;
}

.pro-discount {
    font-size: 0.7rem;
    color: #10b981;
    font-weight: 600;
}

/* Buttons */
.pro-btn-group {
    display: flex;
    gap: 12px;
}

.pro-btn-cart {
    flex: 1;
    background: #0f172a;
    border: none;
    padding: 10px 0;
    border-radius: 30px;
    color: white;
    font-size: 0.8rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.25s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    font-family: inherit;
}

.pro-btn-cart:hover {
    background: #4e83fa;
}

.pro-btn-wishlist {
    width: 38px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 30px;
    cursor: pointer;
    transition: all 0.2s;
    color: #8a99aa;
}

.pro-btn-wishlist:hover {
    background: #fee2e2;
    color: #ef4444;
    border-color: #fecaca;
}

/* View All Button */
.pro-view-all {
    text-align: center;
    margin-top: 20px;
}

.pro-view-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 32px;
    background: transparent;
    border: 2px solid #e2e8f0;
    border-radius: 40px;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.85rem;
    color: #1e293b;
    transition: all 0.25s ease;
}

.pro-view-link:hover {
    border-color: #4e83fa;
    color: #4e83fa;
    gap: 12px;
}


/* Responsive */
@media (max-width: 1100px) {
    .pro-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }
}

@media (max-width: 800px) {
    .pro-grid {
        grid-template-columns: repeat(2, 1fr);
    }

}

@media (max-width: 500px) {
    .pro-grid {
        grid-template-columns: 1fr;
    }
    .pro-section {
        padding: 60px 16px;
    }
}

/* Animation */
.pro-card {
    opacity: 0;
    transform: translateY(20px);
    animation: proFadeUp 0.5s ease forwards;
}

@keyframes proFadeUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.pro-card:nth-child(1) { animation-delay: 0.05s; }
.pro-card:nth-child(2) { animation-delay: 0.1s; }
.pro-card:nth-child(3) { animation-delay: 0.15s; }
.pro-card:nth-child(4) { animation-delay: 0.2s; }
</style>

<main>
    <!-- HERO - First Blog -->
    <section class="hero">
       <h1 class="hero-main-title">
                Tech Blogs & <span>Tech Product Discount</span>
            </h1>
        <div class="hero-container">
            <div class="hero-content">
                <p>{!! Str::limit($latestBlog->Description, 1200) !!}</p>
                <a href="{{ route('blogs.view', ['slug' => Str::slug($latestBlog->slug)]) }}" class="btn-readmore">
                    Read More about "{{ $latestBlog->name }}" →
                </a>
            </div>
            <div class="hero-image">
                <img src="{{ asset($latestBlog->Thumbnail_Image) }}" alt="{{ $latestBlog->name }}" width="1200" height="720" loading="eager" fetchpriority="high">
            </div>
        </div>
    </section>
<section class="pro-section">
    <div class="pro-container">
        <!-- Header -->
        <div class="pro-header">
            <h2 class="pro-title">Top<span>Tech Products</span></h2>
        </div>

        <!-- Filter Tabs (Optional) -->

        <!-- Products Grid -->
        <div class="pro-grid" id="proGrid">
            <!-- Product 1 - Headphones -->
            <div class="pro-card" data-category="audio">
                <div class="pro-card-img">
                    <img src="https://placehold.co/400x400/eef2ff/4e83fa?text=🎧&font=awesome" alt="Wireless Headphones">
                </div>
                <div class="pro-card-content">
                    <h3 class="pro-product-name">SoniCore Pro</h3>
                    <p class="pro-product-desc">Wireless ANC headphones with 40h battery life</p>
                    <div class="pro-rating">
                        <span class="pro-stars">★★★★★</span>
                    </div>
                    <div class="pro-price-row">
                        <span class="pro-current-price">$89.99</span>
                        <span class="pro-discount">Save $50</span>
                    </div>
                    <div class="pro-btn-group">
                        <button class="pro-btn-cart" > <i class="fas fa-info-circle"></i> View Details</button>
                    </div>
                </div>
            </div>



        </div>

        <!-- View All Button -->
        <div class="pro-view-all">
            <a href="#" class="pro-view-link" onclick="alert('Full catalog coming soon'); return false;">
                View All Products <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
    <!-- HERO - Second Blog -->
    <section class="hero" style="background: linear-gradient(135deg, #ffffff 0%, #fef9e3 100%);">
        <div class="hero-container">
            <div class="hero-image">
                <img src="{{ asset($secondLatestBlog->Thumbnail_Image) }}" alt="{{ $secondLatestBlog->name }}" width="1200" height="720" loading="eager">
            </div>
            <div class="hero-content">
                <p>{!! Str::limit($secondLatestBlog->Description, 1200) !!}</p>
                <a href="{{ route('blogs.view', ['slug' => Str::slug($secondLatestBlog->slug)]) }}" class="btn-readmore">
                    Read More about {{ Str::limit(strip_tags($secondLatestBlog->name ?? ''), 200) }} →
                </a>
            </div>
        </div>
    </section>

    <!-- Latest Blogs Grid -->
    <section class="blogs-section">
        <div class="container">
            <h2 class="section-title">Latest Blogs</h2>
            <div class="blogs-grid">
                @foreach ($latestBlogs as $blog)
                    <div class="blog-card">
                        <div class="blog-image">
                            <img src="{{ asset($blog->resize_image) }}" alt="{{ $blog->name }}" loading="lazy">
                        </div>
                        <h3 class="blog-title">
                            <a href="{{ route('blogs.view', ['slug' => Str::slug($blog->slug)]) }}">
                                {{ Str::limit($blog->name, 50) }}
                            </a>
                        </h3>
                        <p class="blog-excerpt">{{ Str::limit(strip_tags($blog->Description), 80) }}</p>
                        <a href="{{ route('blogs.view', ['slug' => Str::slug($blog->slug)]) }}" class="read-more">Read More →</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div style="text-align: center; margin-top: 30px;">
        <a href="{{ route('frontend.blogs') }}" class="btn-secondary">
            View All Blogs →
        </a>
    </div>
    <!-- Trending Blogs Grid -->
    <section class="blogs-section" style="background: #f8fafc;">
        <div class="container">
            <h2 class="section-title">Top Trending Blogs</h2>
            <div class="blogs-grid">
                @foreach ($trankBlogs as $blog)
                    <div class="blog-card">
                        <div class="blog-image">
                            <img src="{{ asset($blog->resize_image) }}" alt="{{ $blog->name }}" loading="lazy">
                        </div>
                        <h3 class="blog-title">
                            <a href="{{ route('blogs.view', ['slug' => Str::slug($blog->slug)]) }}">
                                {{ Str::limit($blog->name, 50) }}
                            </a>
                        </h3>
                        <p class="blog-excerpt">{{ Str::limit(strip_tags($blog->Description), 80) }}</p>
                        <a href="{{ route('blogs.view', ['slug' => Str::slug($blog->slug)]) }}" class="read-more">Read More →</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
<section class="team-section">
    <div class="container">

        {{-- Section Header --}}
        <div class="team-header">
            <div class="team-badge">
                <i class="fa-solid fa-users"></i>
                Our Writers
            </div>
            <h2 class="team-title">Meet the <span>Team</span> Behind TechBlogs</h2>
            <p class="team-subtitle">Real people. Real expertise. We research, test, and write every article to help you stay ahead in the world of technology.</p>
        </div>

        {{-- Team Grid --}}
        <div class="team-grid">

            {{-- Member 1 --}}
            <div class="team-card">
                <div class="team-avatar-wrap">
                    <img src="https://ui-avatars.com/api/?name=Abdul+Sial&background=4e83fa&color=fff&size=200" alt="Abdul Sial" class="team-avatar" />
                    <span class="team-status"></span>
                </div>
                <h3 class="team-name">Abdul Sial</h3>
                <span class="team-role">Founder & Lead Writer</span>
                <p class="team-bio">Tech enthusiast with 5+ years of experience in web development and AI. Passionate about making complex tech simple for everyone.</p>
                <div class="team-stats">
                    <div class="team-stat">
                        <span class="team-stat-num">50+</span>
                        <span class="team-stat-label">Articles</span>
                    </div>
                    <div class="team-stat">
                        <span class="team-stat-num">5 yrs</span>
                        <span class="team-stat-label">Experience</span>
                    </div>
                    <div class="team-stat">
                        <span class="team-stat-num">AI</span>
                        <span class="team-stat-label">Specialty</span>
                    </div>
                </div>
                <div class="team-socials">
                    <a href="https://www.facebook.com/share/17jW53gkza/" target="_blank" class="team-social-link" title="Facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="https://x.com/techblogssite" target="_blank" class="team-social-link" title="Twitter">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="https://www.instagram.com/abdulsial93" target="_blank" class="team-social-link" title="Instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
            </div>

            {{-- Member 2 - Aap yahan doosra member add karein --}}
            <div class="team-card">
                <div class="team-avatar-wrap">
                    <img src="https://ui-avatars.com/api/?name=Tech+Writer&background=58c918&color=fff&size=200" alt="Tech Writer" class="team-avatar" />
                    <span class="team-status"></span>
                </div>
                <h3 class="team-name">Team Writer</h3>
                <span class="team-role">Senior Tech Blogger</span>
                <p class="team-bio">Covers the latest in mobile technology, gadgets, and software reviews. Always testing the newest devices so you don't have to.</p>
                <div class="team-stats">
                    <div class="team-stat">
                        <span class="team-stat-num">30+</span>
                        <span class="team-stat-label">Articles</span>
                    </div>
                    <div class="team-stat">
                        <span class="team-stat-num">3 yrs</span>
                        <span class="team-stat-label">Experience</span>
                    </div>
                    <div class="team-stat">
                        <span class="team-stat-num">Mobile</span>
                        <span class="team-stat-label">Specialty</span>
                    </div>
                </div>

            </div>

            {{-- Member 3 --}}
            <div class="team-card">
                <div class="team-avatar-wrap">
                    <img src="https://ui-avatars.com/api/?name=SEO+Expert&background=f59e0b&color=fff&size=200" alt="SEO Expert" class="team-avatar" />
                    <span class="team-status"></span>
                </div>
                <h3 class="team-name">SEO Specialist</h3>
                <span class="team-role">Content Strategist</span>
                <p class="team-bio">Ensures every article reaches the right audience. Expert in digital marketing, SEO strategies, and growing online presence.</p>
                <div class="team-stats">
                    <div class="team-stat">
                        <span class="team-stat-num">20+</span>
                        <span class="team-stat-label">Articles</span>
                    </div>
                    <div class="team-stat">
                        <span class="team-stat-num">4 yrs</span>
                        <span class="team-stat-label">Experience</span>
                    </div>
                    <div class="team-stat">
                        <span class="team-stat-num">SEO</span>
                        <span class="team-stat-label">Specialty</span>
                    </div>
                </div>

            </div>

        </div>
        {{-- End Team Grid --}}

        {{-- Join CTA --}}
        <div class="team-cta">
            <h3>✍️ Want to Write for TechBlogs?</h3>
            <p>We are always looking for passionate tech writers to join our growing team. Share your knowledge with thousands of readers.</p>
            <a href="{{ route('frontend.contect') ?? 'https://www.techblogs.site/contact-us' }}" class="btn-join">
                <i class="fa-solid fa-paper-plane"></i>
                Get In Touch
            </a>
        </div>

    </div>
</section>
@include('frontend.footer')
</body>
</html>
