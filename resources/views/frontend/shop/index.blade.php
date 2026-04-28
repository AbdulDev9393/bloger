<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.header')
    <style>
        /* Additional modern styling enhancements */
        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 1rem;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 30px -12px rgba(0, 0, 0, 0.15);
        }

        .product-img {
            height: 220px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-img {
            transform: scale(1.03);
        }

        .card-body {
            padding: 1.25rem;
        }

        .product-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #1e293b;
            line-height: 1.4;
        }

        .product-description {
            font-size: 0.85rem;
            color: #475569;
            margin-bottom: 1rem;
            line-height: 1.5;
        }

        .price-tag {
            font-size: 1.3rem;
            font-weight: 700;
            color: #0f172a;
            letter-spacing: -0.5px;
            margin-bottom: 1rem;
        }

        .btn-view {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            border: none;
            border-radius: 2rem;
            padding: 0.5rem 1.25rem;
            font-weight: 500;
            font-size: 0.85rem;
            transition: all 0.2s ease;
            width: 100%;
            text-align: center;
        }

        .btn-view:hover {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            transform: scale(0.98);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        /* Empty state styling */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: #f8fafc;
            border-radius: 2rem;
        }

        .empty-state-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.6;
        }

        /* Badge for sale or featured (optional enhancement) */
        .card-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: #ef4444;
            color: white;
            font-size: 0.7rem;
            font-weight: 600;
            padding: 0.25rem 0.75rem;
            border-radius: 2rem;
            z-index: 2;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        /* Responsive fine-tuning */
        @media (max-width: 768px) {
            .product-img {
                height: 180px;
            }
            .product-title {
                font-size: 1rem;
            }
            .price-tag {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>

<!-- MAIN CONTENT with subtle background -->
<div class="container py-5">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 pb-2 border-bottom">
        <h2 class="mb-0 fw-bold" style="color: #0f172a;">✨ Our Products</h2>
        <p class="text-muted mb-0 mt-2 mt-sm-0">
            {{-- Optional: show product count if $products is a collection --}}
            @if(isset($products) && count($products) > 0)
                {{ count($products) }} {{ Str::plural('item', count($products)) }}
            @endif
        </p>
    </div>

    @if(isset($products) && count($products) > 0)
        <div class="row g-4">
            @foreach ($products as $product)
                <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                    <div class="card product-card h-100 position-relative">
                        <!-- Optional badge example: if product has a 'featured' or 'sale' flag you can use it -->
                        {{-- Uncomment below if you have a condition like $product->is_sale --}}
                        {{-- @if($product->sale_price || $product->is_featured)
                            <div class="card-badge">⭐ Best Seller</div>
                        @endif --}}

                        <div class="overflow-hidden">
                            <img src="{{ asset($product->image) }}"
                                 class="card-img-top product-img"
                                 alt="{{ $product->name }}"
                                 onerror="this.src='https://via.placeholder.com/300x220?text=No+Image'">
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h5 class="product-title">
                                {{ \Illuminate\Support\Str::limit($product->name, 28) }}
                            </h5>
                            <p class="product-description">
                                {{ \Illuminate\Support\Str::limit(strip_tags($product->description), 70) }}
                            </p>
                            <div class="mt-auto">
                                <div class="price-tag">
                                    ${{ number_format($product->price, 2) }}
                                    {{-- Optionally show old price for discount (if any) --}}
                                    {{-- @if($product->compare_price)
                                        <small class="text-muted text-decoration-line-through ms-2">${{ number_format($product->compare_price, 2) }}</small>
                                    @endif --}}
                                </div>
                                <a href="{{ route('frontend.product', $product->slug) }}"
                                   class="btn btn-view text-white">
                                    View Details →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Optional: Pagination (add if you have pagination) -->
        @if(method_exists($products, 'links') && $products->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $products->links() }}
            </div>
        @endif

    @else
        <!-- Empty state with friendly message -->
        <div class="empty-state">
            <div class="empty-state-icon">📦</div>
            <h4 class="fw-semibold">No products found</h4>
            <p class="text-muted">Check back later for new arrivals or explore our collection soon.</p>
            <a href="/" class="btn btn-outline-primary rounded-pill mt-2">Return Home</a>
        </div>
    @endif
</div>

@include('frontend.footer')

<!-- Optional: Add a tiny script for hover or lazy load (no extra complexity) -->
<script>
    // smooth image loading enhancement (optional fade-in)
    document.querySelectorAll('.product-img').forEach(img => {
        img.style.opacity = '0';
        img.addEventListener('load', function() {
            this.style.transition = 'opacity 0.3s ease';
            this.style.opacity = '1';
        });
        if(img.complete) {
            img.style.opacity = '1';
        }
    });
</script>

</body>
</html>
