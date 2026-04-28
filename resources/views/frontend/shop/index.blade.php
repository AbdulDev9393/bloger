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

    <!-- Hidden template for 'no results' empty state -->
    <div id="noResultsTemplate" style="display: none;">
        <div class="empty-state">
            <div class="empty-state-icon">🔍</div>
            <h4 class="fw-semibold">No matching products</h4>
            <p class="text-muted">We couldn't find any products matching your search. Try different keywords or browse all items.</p>
            <button id="resetSearchBtn" class="btn btn-primary rounded-pill mt-2">Clear Search & Show All</button>
        </div>
    </div>
</div>

@include('frontend.footer')

<script>
    (function() {
        // DOM elements
        const searchInput = document.getElementById('searchInput');
        const searchButton = document.getElementById('searchButton');
        const clearBtn = document.getElementById('clearSearchBtn');
        const searchFeedback = document.getElementById('searchFeedback');
        const productsGrid = document.getElementById('productsGrid');
        const initialEmptyState = document.getElementById('initialEmptyState');
        const productsContainer = document.getElementById('productsContainer');
        const paginationLinks = document.getElementById('paginationLinks');
        const productCountDisplay = document.getElementById('product-count-display');
        const noResultsTemplate = document.getElementById('noResultsTemplate');

        // Helper: get all product items (current visible items in grid)
        function getProductItems() {
            if (!productsGrid) return [];
            return Array.from(productsGrid.querySelectorAll('.product-item'));
        }

        // Update product count display and handle pagination visibility
        function updateUIAfterFilter(visibleCount, totalOriginalCount) {
            if (productCountDisplay) {
                if (visibleCount === 1) {
                    productCountDisplay.innerText = `1 item`;
                } else {
                    productCountDisplay.innerText = `${visibleCount} items`;
                }
            }

            // Hide pagination if filtering active (since we only show filtered subset)
            if (paginationLinks) {
                const isFilteringActive = searchInput.value.trim() !== '';
                if (isFilteringActive) {
                    paginationLinks.style.display = 'none';
                } else {
                    paginationLinks.style.display = 'flex';
                }
            }
        }

        // Main filter function
        function filterProducts() {
            let query = searchInput.value.trim();
            const normalizedQuery = query.toLowerCase();

            // Show/hide clear button
            if (clearBtn) {
                clearBtn.style.display = normalizedQuery.length > 0 ? 'flex' : 'none';
            }

            // If there is no productsGrid (no products at all initially)
            if (!productsGrid) {
                // if no product grid exists but we have initial empty state, handle search display
                if (initialEmptyState && productsContainer) {
                    if (normalizedQuery !== '') {
                        // Show "no results" from template if there are zero products anyway
                        const clone = noResultsTemplate.cloneNode(true);
                        clone.style.display = 'block';
                        clone.id = 'dynamicNoResults';
                        // hide initial empty state and show no results for search
                        initialEmptyState.style.display = 'none';
                        const existingNoResult = document.getElementById('dynamicNoResults');
                        if (existingNoResult) existingNoResult.remove();
                        productsContainer.appendChild(clone);
                        const resetBtn = clone.querySelector('#resetSearchBtn');
                        if (resetBtn) {
                            resetBtn.addEventListener('click', () => {
                                searchInput.value = '';
                                filterProducts();
                            });
                        }
                        if (searchFeedback) {
                            searchFeedback.innerHTML = `<span class="search-results-info">🔍 No results for “${escapeHtml(query)}”</span>`;
                        }
                    } else {
                        // show original empty state
                        initialEmptyState.style.display = 'block';
                        const dynNoRes = document.getElementById('dynamicNoResults');
                        if (dynNoRes) dynNoRes.remove();
                        if (searchFeedback) searchFeedback.innerHTML = '';
                    }
                }
                return;
            }

            // --- Normal flow: we have actual product items ---
            const productItems = getProductItems();
            if (productItems.length === 0) return;

            let visibleCount = 0;
            const lowerQuery = normalizedQuery;

            // Loop through each product card and filter based on name or description
            productItems.forEach(item => {
                const nameAttr = item.getAttribute('data-product-name') || '';
                const descAttr = item.getAttribute('data-product-description') || '';
                let matches = false;

                if (lowerQuery === '') {
                    matches = true;
                } else {
                    if (nameAttr.includes(lowerQuery) || descAttr.includes(lowerQuery)) {
                        matches = true;
                    }
                }

                if (matches) {
                    item.style.display = '';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            // Update feedback message and count display
            const totalProducts = productItems.length;
            if (searchFeedback) {
                if (lowerQuery !== '') {
                    if (visibleCount === 0) {
                        searchFeedback.innerHTML = `<span class="search-results-info">😞 No products match “${escapeHtml(query)}”</span>`;
                    } else {
                        searchFeedback.innerHTML = `<span class="search-results-info">✅ Found ${visibleCount} product${visibleCount !== 1 ? 's' : ''} matching “${escapeHtml(query)}”</span>`;
                    }
                } else {
                    searchFeedback.innerHTML = '';
                }
            }

            // Show/hide no-result placeholder within grid row
            const noResultMsgId = 'gridNoResultMessage';
            let noResultDiv = document.getElementById(noResultMsgId);
            if (visibleCount === 0 && lowerQuery !== '') {
                if (!noResultDiv) {
                    noResultDiv = document.createElement('div');
                    noResultDiv.id = noResultMsgId;
                    noResultDiv.className = 'col-12 text-center py-5';
                    noResultDiv.innerHTML = `
                        <div class="empty-state" style="background: transparent; padding: 2rem;">
                            <div class="empty-state-icon">🔍</div>
                            <h5 class="fw-semibold">No matching items</h5>
                            <p class="text-muted">Try adjusting your search or browse all products.</p>
                            <button class="btn btn-sm btn-outline-secondary rounded-pill" id="inlineResetBtn">Clear Search</button>
                        </div>
                    `;
                    if (productsGrid) productsGrid.appendChild(noResultDiv);
                    const inlineReset = document.getElementById('inlineResetBtn');
                    if (inlineReset) {
                        inlineReset.addEventListener('click', () => {
                            searchInput.value = '';
                            filterProducts();
                            searchInput.focus();
                        });
                    }
                } else {
                    noResultDiv.style.display = '';
                }
            } else {
                if (noResultDiv) noResultDiv.style.display = 'none';
            }

            // Update product count in header
            updateUIAfterFilter(visibleCount, totalProducts);

            // Also if any additional empty state from initial was visible, hide it
            if (initialEmptyState) initialEmptyState.style.display = 'none';
            const dynamicNoRes = document.getElementById('dynamicNoResults');
            if (dynamicNoRes) dynamicNoRes.remove();
        }

        // Helper to escape HTML to avoid injection
        function escapeHtml(str) {
            if (!str) return '';
            return str.replace(/[&<>]/g, function(m) {
                if (m === '&') return '&amp;';
                if (m === '<') return '&lt;';
                if (m === '>') return '&gt;';
                return m;
            }).replace(/[\uD800-\uDBFF][\uDC00-\uDFFF]/g, function(c) {
                return c;
            });
        }

        // Debounce for smooth typing experience
        let debounceTimer;
        function debounceFilter(delay = 300) {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                filterProducts();
            }, delay);
        }

        // Event listeners
        if (searchInput) {
            searchInput.addEventListener('input', () => {
                debounceFilter(300);
            });
            searchInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    clearTimeout(debounceTimer);
                    filterProducts();
                }
            });
        }

        if (searchButton) {
            searchButton.addEventListener('click', (e) => {
                e.preventDefault();
                clearTimeout(debounceTimer);
                filterProducts();
            });
        }

        if (clearBtn) {
            clearBtn.addEventListener('click', () => {
                if (searchInput) {
                    searchInput.value = '';
                    filterProducts();
                    searchInput.focus();
                }
            });
        }

        // On page load, set the original data attributes for each product item
        function initializeDataAttributes() {
            if (productsGrid) {
                const items = getProductItems();
                items.forEach(item => {
                    const titleElem = item.querySelector('.product-title');
                    const descElem = item.querySelector('.product-description');
                    let prodName = titleElem ? titleElem.innerText.trim() : '';
                    let prodDesc = descElem ? descElem.innerText.trim() : '';
                    item.setAttribute('data-product-name', prodName.toLowerCase());
                    item.setAttribute('data-product-description', prodDesc.toLowerCase());
                });
            }
        }

        // Also observe if there is any image loading that could affect but not needed
        initializeDataAttributes();

        // For initial empty state scenario: if no product grid but there is an empty state with "resetSearchBtn" from template,
        // we dynamically attach behavior for 'clear search' button that could exist in cloned version. But we also watch.
        if (!productsGrid && initialEmptyState && noResultsTemplate) {
            // ensure that when user types in search even with zero products, we show the 'no results' version
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const val = searchInput.value.trim();
                    if (val !== '' && initialEmptyState.style.display !== 'none') {
                        // hide initial empty state and inject no-results template
                        initialEmptyState.style.display = 'none';
                        let existingNoResult = document.getElementById('dynamicNoResults');
                        if (!existingNoResult) {
                            const clone = noResultsTemplate.cloneNode(true);
                            clone.style.display = 'block';
                            clone.id = 'dynamicNoResults';
                            productsContainer.appendChild(clone);
                            const resetBtnClone = clone.querySelector('#resetSearchBtn');
                            if (resetBtnClone) {
                                resetBtnClone.addEventListener('click', () => {
                                    searchInput.value = '';
                                    if (initialEmptyState) initialEmptyState.style.display = 'block';
                                    const dyn = document.getElementById('dynamicNoResults');
                                    if (dyn) dyn.remove();
                                    filterProducts();
                                    searchInput.focus();
                                });
                            }
                            if (searchFeedback) {
                                searchFeedback.innerHTML = `<span class="search-results-info">🔍 No results for “${escapeHtml(val)}”</span>`;
                            }
                        }
                    } else if (val === '' && initialEmptyState) {
                        initialEmptyState.style.display = 'block';
                        const dyn = document.getElementById('dynamicNoResults');
                        if (dyn) dyn.remove();
                        if (searchFeedback) searchFeedback.innerHTML = '';
                    }
                });
            }
        }

        // expose for eventual pagination re-trigger (in case of livewire or ajax reload)
        window.refreshProductSearchAttributes = function() {
            initializeDataAttributes();
            filterProducts();
        };
    })();
</script>
</body>
</html>
