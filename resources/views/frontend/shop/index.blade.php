<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.header')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>


        /* ── Hero / Header ── */
        .shop-hero {
            background: #ffffff;
            border-bottom: 1px solid #e8e6e1;
            padding: 2.5rem 2.5rem 1.75rem;
        }

        .hero-eyebrow {
            font-size: 11px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #888780;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            font-weight: 600;
            color: #1a1a18;
            line-height: 1.2;
        }

        .hero-sub {
            font-size: 13px;
            color: #888780;
            margin-top: 6px;
            font-weight: 300;
        }

        /* ── Filter chips ── */
        .filter-bar {
            display: flex;
            gap: 8px;
            margin-top: 1.25rem;
            flex-wrap: wrap;
        }

        .filter-chip {
            font-size: 12px;
            padding: 5px 16px;
            border-radius: 20px;
            border: 1px solid #d3d1c7;
            background: #ffffff;
            color: #5f5e5a;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            transition: all 0.15s ease;
        }

        .filter-chip.active,
        .filter-chip:hover {
            background: #f1efe8;
            color: #1a1a18;
            border-color: #888780;
        }

        /* ── Body ── */
        .shop-body {
            padding: 1.75rem 2.5rem 3rem;
        }

        .results-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.25rem;
        }

        .results-count {
            font-size: 12px;
            color: #888780;
        }

        .sort-select {
            font-size: 12px;
            border: 1px solid #d3d1c7;
            background: #ffffff;
            color: #1a1a18;
            padding: 6px 12px;
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            outline: none;
        }

        .sort-select:focus {
            border-color: #888780;
        }

        /* ── Products Grid ── */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 18px;
        }

        /* ── Product Card ── */
        .product-card {
            background: #ffffff;
            border: 1px solid #e8e6e1;
            border-radius: 12px;
            overflow: hidden;
            transition: border-color 0.2s ease, transform 0.2s ease;
            text-decoration: none;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            border-color: #b4b2a9;
            transform: translateY(-2px);
        }

        .product-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
            background: #f1efe8;
        }

        .product-body {
            padding: 1rem 1.125rem 1.125rem;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .product-category {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #b4b2a9;
            font-weight: 500;
            margin-bottom: 4px;
        }

        .product-name {
            font-family: 'Playfair Display', serif;
            font-size: 15px;
            font-weight: 500;
            color: #1a1a18;
            line-height: 1.35;
            margin-bottom: 6px;
        }

        .product-desc {
            font-size: 12px;
            color: #888780;
            line-height: 1.55;
            font-weight: 300;
            flex: 1;
            margin-bottom: 12px;
        }

        .product-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .product-price {
            font-size: 17px;
            font-weight: 500;
            color: #1a1a18;
        }

        .product-price sup {
            font-size: 11px;
            font-weight: 400;
            color: #888780;
            vertical-align: top;
            margin-top: 3px;
            display: inline-block;
        }

        .btn-view {
            font-size: 12px;
            font-weight: 500;
            padding: 7px 16px;
            border-radius: 8px;
            border: 1px solid #d3d1c7;
            background: transparent;
            color: #1a1a18;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            text-decoration: none;
            transition: all 0.15s ease;
            display: inline-block;
        }

        .btn-view:hover {
            background: #f1efe8;
            border-color: #888780;
            color: #1a1a18;
        }

        /* ── Badge ── */
        .badge-new {
            font-size: 10px;
            font-weight: 500;
            background: #eaf3de;
            color: #3b6d11;
            padding: 2px 8px;
            border-radius: 10px;
            margin-left: 6px;
            vertical-align: middle;
            font-family: 'DM Sans', sans-serif;
        }

        /* ── Empty state ── */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #888780;
        }

        .empty-state p {
            font-size: 14px;
            margin-top: 8px;
        }

        /* ── Responsive ── */
        @media (max-width: 640px) {
            .shop-hero { padding: 1.5rem; }
            .shop-body { padding: 1.25rem 1.5rem 2rem; }
            .products-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
            .hero-title { font-size: 26px; }
        }

        @media (max-width: 400px) {
            .products-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<!-- ── Products Page ── -->
<div class="shop-hero">
    <div class="hero-eyebrow">Collection {{ date('Y') }}</div>
    <h1 class="hero-title">Our Products</h1>
    <p class="hero-sub">Curated selection &mdash; updated weekly</p>

    <div class="filter-bar">
        <button class="filter-chip active" onclick="filterCategory(this, 'all')">All</button>
        <button class="filter-chip" onclick="filterCategory(this, 'electronics')">Electronics</button>
        <button class="filter-chip" onclick="filterCategory(this, 'clothing')">Clothing</button>
        <button class="filter-chip" onclick="filterCategory(this, 'home')">Home</button>
        <button class="filter-chip" onclick="filterCategory(this, 'books')">Books</button>
    </div>
</div>

<div class="shop-body">

    <div class="results-meta">
        <span class="results-count">{{ $products->count() }} products</span>
        <select class="sort-select" onchange="window.location.href='?sort='+this.value">
            <option value="featured" {{ request('sort') == 'featured' ? 'selected' : '' }}>Sort: Featured</option>
            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
        </select>
    </div>

    @if ($products->count())
        <div class="products-grid">
            @foreach ($products as $product)
                <div class="product-card" data-category="{{ strtolower($product->category ?? 'general') }}">

                    <img
                        src="{{ asset($product->image) }}"
                        class="product-img"
                        alt="{{ $product->name }}"
                        onerror="this.style.background='#f1efe8'; this.src=''"
                    >

                    <div class="product-body">

                        @if ($product->category)
                            <div class="product-category">{{ $product->category }}</div>
                        @endif

                        <div class="product-name">
                            {{ \Illuminate\Support\Str::limit($product->name, 40) }}
                            @if ($product->created_at->isCurrentMonth())
                                <span class="badge-new">New</span>
                            @endif
                        </div>

                        <div class="product-desc">
                            {{ \Illuminate\Support\Str::limit(strip_tags($product->description), 80) }}
                        </div>

                        <div class="product-footer">
                            <div class="product-price">
                                <sup>$</sup>{{ number_format($product->price, 2) }}
                            </div>
                            <a href="{{ route('frontend.product', $product->slug) }}" class="btn-view">
                                View &rarr;
                            </a>
                        </div>

                    </div>

                </div>
            @endforeach
        </div>

    @else
        <div class="empty-state">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#b4b2a9" stroke-width="1.5" style="margin: 0 auto; display:block;"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
            <p>No products found.</p>
        </div>
    @endif

</div>

@include('frontend.footer')

<script>
    function filterCategory(el, category) {
        document.querySelectorAll('.filter-chip').forEach(c => c.classList.remove('active'));
        el.classList.add('active');

        document.querySelectorAll('.product-card').forEach(card => {
            if (category === 'all' || card.dataset.category === category) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>

</body>
</html>
