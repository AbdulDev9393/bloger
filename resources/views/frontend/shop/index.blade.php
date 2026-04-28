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

        /* Search bar styling */
        .search-wrapper {
            background: #fff;
            border-radius: 3rem;
            padding: 0.25rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            transition: all 0.2s ease;
        }
        .search-wrapper:focus-within {
            box-shadow: 0 4px 16px rgba(59, 130, 246, 0.15);
        }
        .search-input {
            border: 1px solid #e2e8f0;
            border-radius: 3rem;
            padding: 0.7rem 1.2rem;
            font-size: 0.9rem;
            transition: all 0.2s;
            background: #fefefe;
        }
        .search-input:focus {
            border-color: #3b82f6;
            box-shadow: none;
            outline: none;
        }
        .search-btn {
            border-radius: 3rem;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            background: #0f172a;
            border: none;
            transition: all 0.2s;
        }
        .search-btn:hover {
            background: #1e293b;
            transform: scale(0.96);
        }
        .clear-search {
            position: absolute;
            right: 110px;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            color: #94a3b8;
            font-size: 1.1rem;
            cursor: pointer;
            padding: 0 8px;
            transition: color 0.2s;
        }
        .clear-search:hover {
            color: #ef4444;
        }
        .search-results-info {
            font-size: 0.85rem;
            background: #f1f5f9;
            padding: 0.4rem 1rem;
            border-radius: 2rem;
            display: inline-block;
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
            .clear-search {
                right: 80px;
            }
        }
    </style>
</head>
<body>

<!-- MAIN CONTENT with subtle background -->
<div class="container py-5">


    <!-- SEARCH BAR SECTION (client-side live search with smooth filtering) -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8 col-md-10">
                <form action="">

            <div class="search-wrapper d-flex align-items-center position-relative">
                  <div class="flex-grow-1 position-relative">
                    <input type="text"
                           id="searchInput"
                           class="form-control search-input w-100"
                           placeholder="🔍 Search products by name, description..."
                           autocomplete="off">
                    <button id="clearSearchBtn" class="clear-search" style="display: none;" aria-label="Clear search">✕</button>
                </div>
                <button id="searchButton" class="btn search-btn ms-2 text-white">Search</button>

            </div>
                </form>

            <div id="searchFeedback" class="mt-2 text-center"></div>
        </div>
    </div>

    <!-- PRODUCTS GRID (dynamic container) -->
    <div id="productsContainer">
        @if(isset($products) && count($products) > 0)
            <div class="row g-4" id="productsGrid">
                @foreach ($products as $product)
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4 product-item"
                         data-product-name="{{ strtolower($product->name) }}"
                         data-product-description="{{ strtolower(strip_tags($product->description)) }}">
                        <div class="card product-card h-100 position-relative">
                            <!-- Optional badge example: if product has a 'featured' or 'sale' flag you can use it -->
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
            <!-- Pagination container (if needed) -->
            @if(method_exists($products, 'links') && $products->hasPages())
                <div class="d-flex justify-content-center mt-5" id="paginationLinks">
                    {{ $products->links() }}
                </div>
            @endif
        @else
            <div id="initialEmptyState" class="empty-state">
                <div class="empty-state-icon">📦</div>
                <h4 class="fw-semibold">No products found</h4>
                <p class="text-muted">Check back later for new arrivals or explore our collection soon.</p>
                <a href="/" class="btn btn-outline-primary rounded-pill mt-2">Return Home</a>
            </div>
        @endif
    </div>


</div>

@include('frontend.footer')

</body>
</html>
