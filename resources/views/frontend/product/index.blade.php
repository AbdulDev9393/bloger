<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Product Detail | Modern Commerce</title>
    <!-- Google Fonts + Font Awesome 6 (free) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Bootstrap 5.3 with clean theme overrides -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f9fafc;
            color: #1e293b;
            line-height: 1.5;
        }

        /* modern container & spacing */
        .product-page {
            padding: 2rem 1rem;
        }

        @media (min-width: 768px) {
            .product-page {
                padding: 3rem 2rem;
            }
        }

        /* card / image styling */
        .product-gallery {
            position: relative;
            background: #ffffff;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.08), 0 1px 2px rgba(0,0,0,0.02);
            transition: transform 0.2s ease;
        }

        .main-image {
            width: 100%;
            object-fit: cover;
            transition: transform 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            display: block;
        }

        .product-gallery:hover .main-image {
            transform: scale(1.02);
        }

        /* thumbnail strip (if we have additional images, but we keep it modern) */
        .thumbnail-strip {
            display: flex;
            gap: 12px;
            margin-top: 18px;
            flex-wrap: wrap;
        }

        .thumb {
            width: 70px;
            height: 70px;
            border-radius: 16px;
            object-fit: cover;
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.2s;
            opacity: 0.8;
        }

        .thumb.active, .thumb:hover {
            border-color: #3b82f6;
            opacity: 1;
            box-shadow: 0 8px 18px rgba(59,130,246,0.2);
        }

        /* product info card */
        .info-card {
            background: white;
            border-radius: 32px;
            padding: 1.8rem;
            box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.05);
            height: 100%;
            transition: all 0.2s;
        }

        .product-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #f1f5f9;
            padding: 0.3rem 0.9rem;
            border-radius: 40px;
            font-size: 0.75rem;
            font-weight: 500;
            color: #334155;
        }

        .rating-stars {
            color: #fbbf24;
            letter-spacing: 2px;
            font-size: 1rem;
        }

        .price-wrapper {
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
            border-radius: 28px;
            padding: 1rem 1.2rem;
            border: 1px solid #eef2ff;
        }

        .final-price {
            font-size: 2.2rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.01em;
        }

        .original-price {
            font-size: 1rem;
            color: #64748b;
            text-decoration: line-through;
            margin-left: 10px;
            font-weight: 500;
        }

        .discount-chip {
            background: #dcfce7;
            color: #15803d;
            font-weight: 700;
            font-size: 0.8rem;
            padding: 0.25rem 0.75rem;
            border-radius: 30px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        /* stock indicator */
        .stock-status {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #f1f5f9;
            border-radius: 40px;
            padding: 0.4rem 1rem;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .stock-instock {
            color: #15803d;
            background: #e0f2e7;
            border-radius: 20px;
            padding: 0.2rem 0.7rem;
        }

        .stock-low {
            color: #b45309;
            background: #ffedd5;
        }

        /* quantity selector */
        .qty-selector {
            display: inline-flex;
            align-items: center;
            border: 1px solid #e2e8f0;
            border-radius: 60px;
            background: white;
            overflow: hidden;
        }

        .qty-btn {
            background: #f8fafc;
            border: none;
            width: 44px;
            height: 44px;
            font-size: 1.3rem;
            font-weight: 600;
            transition: 0.15s;
            color: #1e293b;
        }

        .qty-btn:hover {
            background: #eef2ff;
        }

        .qty-input {
            width: 60px;
            text-align: center;
            border: none;
            font-weight: 600;
            font-size: 1rem;
            background: white;
        }

        .qty-input:focus {
            outline: none;
        }

        /* buttons */
        .btn-primary-custom {
            background: #0f172a;
            border: none;
            padding: 0.85rem 1.8rem;
            font-weight: 600;
            border-radius: 44px;
            transition: 0.2s;
            box-shadow: 0 4px 8px rgba(0,0,0,0.02);
        }

        .btn-primary-custom:hover {
            background: #1e293b;
            transform: translateY(-2px);
            box-shadow: 0 12px 20px -12px rgba(15,23,42,0.3);
        }

        .btn-outline-custom {
            border: 1.5px solid #cbd5e1;
            background: white;
            padding: 0.85rem 1.8rem;
            font-weight: 600;
            border-radius: 44px;
            transition: 0.2s;
            color: #1e293b;
        }

        .btn-outline-custom:hover {
            background: #f1f5f9;
            border-color: #94a3b8;
            transform: translateY(-2px);
        }

        /* description area */
        .description-box {
            background: #ffffff;
            border-radius: 28px;
            padding: 1.8rem;
            margin-top: 2rem;
            box-shadow: 0 8px 20px rgba(0,0,0,0.02);
            border: 1px solid #edf2f7;
        }

        .desc-title {
            font-weight: 700;
            font-size: 1.2rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .product-description {
            color: #334155;
            line-height: 1.6;
            font-size: 1rem;
        }

        /* additional section meta */
        .meta-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin: 1rem 0;
        }

        hr {
            background: #eef2ff;
            opacity: 0.6;
        }

        footer {
            margin-top: 3rem;
            text-align: center;
            padding: 1.5rem;
            color: #5b6e8c;
            border-top: 1px solid #e9edf2;
            font-size: 0.8rem;
        }

        @media (max-width: 768px) {
            .final-price {
                font-size: 1.8rem;
            }
            .info-card {
                padding: 1.4rem;
            }
        }
    </style>
</head>
<body>

<div class="container product-page">
    <div class="row g-4 align-items-start">
        <!-- LEFT COLUMN: IMAGE GALLERY (with fallback for additional_images) -->
        <div class="col-lg-6">
            <div class="product-gallery">
                <img id="mainProductImage"
                     src="https://placehold.co/800x800/f1f5f9/475569?text=Product+Image"
                     class="main-image img-fluid rounded-4"
                     alt="Product main visual">
            </div>
            <!-- Thumbnails for additional images if any (dynamic) -->
            <div class="thumbnail-strip mt-3" id="thumbnailContainer">
                <!-- populated via JS if additional_images exists -->
            </div>
        </div>

        <!-- RIGHT COLUMN: PRODUCT INFO -->
        <div class="col-lg-6">
            <div class="info-card">
                <!-- breadcrumb / category chip -->
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
                    <span class="product-badge" id="productCategory">
                        <i class="fas fa-tag fa-fw"></i> <span id="categoryText">Category</span>
                    </span>
                    <div class="rating-stars" id="ratingStars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i>
                    </div>
                </div>

                <h2 class="fw-bold display-6" id="productName">Product Name</h2>

                <!-- stock & sku vibe -->
                <div class="d-flex flex-wrap gap-3 my-3">
                    <div class="stock-status" id="stockIndicator">
                        <i class="fas fa-boxes"></i> <span id="stockText">Checking stock...</span>
                    </div>
                    <div class="stock-status">
                        <i class="fas fa-truck-fast"></i> Free Shipping
                    </div>
                </div>

                <!-- PRICE section -->
                <div class="price-wrapper mt-2 mb-4">
                    <div class="d-flex align-items-center flex-wrap gap-3">
                        <span class="final-price" id="finalPriceDisplay">$0.00</span>
                        <span class="original-price" id="originalPriceDisplay"></span>
                        <span class="discount-chip" id="discountChip" style="display: none;">
                            <i class="fas fa-fire"></i> Save <span id="discountPercent">0</span>%
                        </span>
                    </div>
                </div>

                <!-- Quantity selector & action buttons -->
                <div class="d-flex flex-wrap align-items-center gap-4 mb-4">
                    <div class="qty-selector">
                        <button class="qty-btn" id="decrementQty"><i class="fas fa-minus"></i></button>
                        <input type="number" id="quantityInput" class="qty-input" value="1" min="1" max="99" step="1">
                        <button class="qty-btn" id="incrementQty"><i class="fas fa-plus"></i></button>
                    </div>
                    <div>
                        <span class="text-muted small"><i class="fas fa-check-circle text-success"></i> In stock</span>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3 mt-2">
                    <button class="btn btn-primary-custom" id="addToCartBtn">
                        <i class="fas fa-shopping-cart me-2"></i> Add to Cart
                    </button>
                    <button class="btn btn-outline-custom" id="buyNowBtn">
                        <i class="fas fa-bolt me-2"></i> Buy Now
                    </button>
                </div>

                <!-- product meta short info -->
                <hr class="my-4">
                <div class="meta-grid">
                    <div><i class="fas fa-rotate-right text-secondary me-2"></i> 30-day returns</div>
                    <div><i class="fas fa-shield-alt text-secondary me-2"></i> Secure payment</div>
                    <div><i class="fas fa-gem text-secondary me-2"></i> Premium quality</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Description & details row -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="description-box">
                <div class="desc-title">
                    <i class="fas fa-align-left text-primary"></i> Product Details
                </div>
                <div class="product-description" id="productDescription">
                    <!-- rich text description will be injected here -->
                </div>
                <!-- extra row: additional product attributes -->
                <div class="mt-3 pt-2 small text-muted d-flex flex-wrap gap-4">
                    <span><i class="far fa-calendar-alt"></i> Last updated: <span id="updatedDate">—</span></span>
                    <span><i class="fas fa-database"></i> SKU: <span id="productSkuRef">#PDT-001</span></span>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <p class="mb-0">© 2025 ModernCommerce — Premium product experience</p>
</footer>

<!-- Bootstrap JS bundle (optional for toasts) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // --------------------------------------------------------------
    // MOCK DATABASE OBJECT based on the provided schema (id, name, slug, description, price, discount, final_price, stock, category, image, additional_images, is_active, rating)
    // This represents the $product passed from Laravel backend (emulated)
    // In real Blade, you'd do: const product = @json($product);
    // For demo purposes, we simulate a rich product matching your schema fields.
    // --------------------------------------------------------------
    const product = {
        id: 1,
        name: "Aether Pulse Wireless Headphones",
        slug: "aether-pulse-headphones",
        description: "<strong>Immersive audio experience</strong> with adaptive noise cancellation and 40h battery life. <br> Experience studio-quality sound with deep bass and crystal highs. Compatible with all devices via Bluetooth 5.3.",
        price: 249.99,
        discount: 20,          // 20% off
        final_price: 199.99,
        stock: 34,
        category: "Electronics / Audio",
        image: "https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=800&h=800&fit=crop",  // high-res headphones aesthetic
        additional_images: [
            "https://images.unsplash.com/photo-1583394838336-acd977736f90?w=300&h=300&fit=crop",
            "https://images.unsplash.com/photo-1484704849700-f032a568e944?w=300&h=300&fit=crop",
            "https://images.unsplash.com/photo-1546435770-a3e426bf472b?w=300&h=300&fit=crop"
        ],
        is_active: 1,
        rating: 4,          // 4 out of 5 (tinyint)
        created_at: "2024-11-10 12:00:00",
        updated_at: "2025-02-18 09:34:00"
    };

    // helper: format price
    function formatPrice(value) {
        return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD', minimumFractionDigits: 2 }).format(value);
    }

    // render rating stars (tinyint rating from 0-5)
    function renderRatingStars(ratingVal) {
        const fullStars = Math.floor(ratingVal);
        const hasHalf = (ratingVal - fullStars) >= 0.5;
        let starsHtml = '';
        for (let i = 1; i <= 5; i++) {
            if (i <= fullStars) {
                starsHtml += '<i class="fas fa-star"></i>';
            } else if (hasHalf && i === fullStars + 1) {
                starsHtml += '<i class="fas fa-star-half-alt"></i>';
            } else {
                starsHtml += '<i class="far fa-star"></i>';
            }
        }
        return starsHtml;
    }

    // update stock display based on stock quantity
    function updateStockUI(stockQty) {
        const stockSpan = document.getElementById('stockText');
        const stockDiv = document.getElementById('stockIndicator');
        if (stockQty <= 0) {
            stockSpan.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Out of Stock';
            stockDiv.classList.add('stock-low');
            stockDiv.style.background = "#fee2e2";
        } else if (stockQty < 10) {
            stockSpan.innerHTML = `Only ${stockQty} left · Order soon`;
            stockDiv.classList.add('stock-low');
            stockDiv.style.background = "#ffedd5";
        } else {
            stockSpan.innerHTML = `In stock (${stockQty} units)`;
            stockDiv.classList.remove('stock-low');
            stockDiv.style.background = "#e0f2e7";
        }
    }

    // populate thumbnails if additional_images exists
    function populateThumbnails(imagesArray, mainImageUrl) {
        const container = document.getElementById('thumbnailContainer');
        container.innerHTML = '';
        if (!imagesArray || imagesArray.length === 0) return;
        // also add main image as first thumb? usually main image thumb can be separate, but we add all additional images
        // Optionally also include the main image as clickable thumbnail
        const allImages = [mainImageUrl, ...imagesArray];
        // but avoid duplicates if main already there? we just show extra thumbs but also main can be selected.
        // Provide all distinct images:
        const uniqueImages = [...new Set(allImages)];
        uniqueImages.forEach(imgSrc => {
            const thumb = document.createElement('img');
            thumb.src = imgSrc;
            thumb.classList.add('thumb');
            if (imgSrc === mainImageUrl) thumb.classList.add('active');
            thumb.addEventListener('click', () => {
                document.getElementById('mainProductImage').src = imgSrc;
                document.querySelectorAll('.thumb').forEach(t => t.classList.remove('active'));
                thumb.classList.add('active');
            });
            container.appendChild(thumb);
        });
    }

    // generate a SKU based on id and category
    function generateSku(id, category) {
        const catPrefix = category.substring(0, 3).toUpperCase().replace(/\s/g, '');
        return `${catPrefix || 'PRD'}-${String(id).padStart(4, '0')}`;
    }

    // update entire UI from product object
    function renderProductPage(productData) {
        // Basic fields
        document.getElementById('productName').innerText = productData.name;
        document.getElementById('categoryText').innerText = productData.category || "Uncategorized";
        // description: use raw HTML (rich text allowed)
        const descElem = document.getElementById('productDescription');
        if (productData.description) {
            descElem.innerHTML = productData.description;
        } else {
            descElem.innerHTML = "No description available.";
        }
        // prices & discount
        const finalPrice = productData.final_price !== null && productData.final_price !== undefined ? productData.final_price : productData.price;
        const originalPrice = productData.price;
        document.getElementById('finalPriceDisplay').innerText = formatPrice(finalPrice);
        if (originalPrice && originalPrice > finalPrice) {
            document.getElementById('originalPriceDisplay').innerText = formatPrice(originalPrice);
            document.getElementById('originalPriceDisplay').style.display = 'inline-block';
            const discountPercent = productData.discount || Math.round(((originalPrice - finalPrice) / originalPrice) * 100);
            const discountSpan = document.getElementById('discountPercent');
            if (discountSpan) discountSpan.innerText = discountPercent;
            document.getElementById('discountChip').style.display = 'inline-flex';
        } else {
            document.getElementById('originalPriceDisplay').style.display = 'none';
            document.getElementById('discountChip').style.display = 'none';
        }
        // stock
        const stockQty = productData.stock !== undefined ? productData.stock : 0;
        updateStockUI(stockQty);
        // rating
        const ratingValue = productData.rating ? productData.rating : 0;
        document.getElementById('ratingStars').innerHTML = renderRatingStars(ratingValue);
        // main image
        const mainImg = productData.image && productData.image.trim() !== "" ? productData.image : "https://placehold.co/800x800/e2e8f0/334155?text=Product";
        document.getElementById('mainProductImage').src = mainImg;
        // additional images thumbs
        let additional = [];
        if (typeof productData.additional_images === 'string') {
            try {
                const parsed = JSON.parse(productData.additional_images);
                if (Array.isArray(parsed)) additional = parsed;
            } catch(e) { console.warn(e); }
        } else if (Array.isArray(productData.additional_images)) {
            additional = productData.additional_images;
        }
        populateThumbnails(additional, mainImg);
        // update date field
        if (productData.updated_at) {
            const dateObj = new Date(productData.updated_at);
            document.getElementById('updatedDate').innerText = dateObj.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
        } else {
            document.getElementById('updatedDate').innerText = 'Recently';
        }
        // SKU
        const skuText = generateSku(productData.id, productData.category);
        document.getElementById('productSkuRef').innerText = skuText;

        // handle max quantity from stock
        const qtyInput = document.getElementById('quantityInput');
        const maxStock = stockQty > 0 ? stockQty : 0;
        qtyInput.setAttribute('max', maxStock);
        if (maxStock === 0) {
            qtyInput.disabled = true;
            document.getElementById('addToCartBtn').disabled = true;
            document.getElementById('buyNowBtn').disabled = true;
        } else {
            qtyInput.disabled = false;
            document.getElementById('addToCartBtn').disabled = false;
            document.getElementById('buyNowBtn').disabled = false;
        }
        // also if current quantity > max, reset to max
        let currentQty = parseInt(qtyInput.value);
        if (currentQty > maxStock && maxStock > 0) qtyInput.value = maxStock;
        if (currentQty < 1) qtyInput.value = 1;
    }

    // quantity handlers
    function initQuantityControls() {
        const decrement = document.getElementById('decrementQty');
        const increment = document.getElementById('incrementQty');
        const qtyInput = document.getElementById('quantityInput');
        const maxStock = product.stock || 0;

        const updateValue = () => {
            let val = parseInt(qtyInput.value);
            if (isNaN(val)) val = 1;
            if (val < 1) val = 1;
            if (maxStock > 0 && val > maxStock) val = maxStock;
            qtyInput.value = val;
        };

        decrement.addEventListener('click', () => {
            let val = parseInt(qtyInput.value);
            if (val > 1) qtyInput.value = val - 1;
            updateValue();
        });
        increment.addEventListener('click', () => {
            let val = parseInt(qtyInput.value);
            if (maxStock === 0) return;
            if (val < maxStock) qtyInput.value = val + 1;
            updateValue();
        });
        qtyInput.addEventListener('change', updateValue);
        qtyInput.addEventListener('input', updateValue);
    }

    // add to cart simulation (user feedback)
    function showNotification(message, isError = false) {
        // simple alert replacement but more elegant: we can create a floating toast using bootstrap? but quick approach: temporary div
        const toastDiv = document.createElement('div');
        toastDiv.className = 'position-fixed bottom-0 end-0 m-3 p-3 rounded-3 shadow-lg bg-white border-start border-4 border-primary';
        toastDiv.style.zIndex = '9999';
        toastDiv.style.maxWidth = '320px';
        toastDiv.innerHTML = `<div class="d-flex gap-2"><i class="fas ${isError ? 'fa-circle-exclamation text-danger' : 'fa-check-circle text-success'} fa-lg"></i><span>${message}</span></div>`;
        document.body.appendChild(toastDiv);
        setTimeout(() => { toastDiv.style.opacity = '0'; setTimeout(() => toastDiv.remove(), 400); }, 2800);
    }

    function addToCart() {
        const qty = parseInt(document.getElementById('quantityInput').value);
        if (product.stock <= 0) {
            showNotification("Sorry, this product is out of stock!", true);
            return;
        }
        if (qty > product.stock) {
            showNotification(`Only ${product.stock} items available.`, true);
            return;
        }
        showNotification(`✓ Added ${qty} × ${product.name} to your cart.`);
        // In real implementation you'd call backend
    }

    function buyNow() {
        const qty = parseInt(document.getElementById('quantityInput').value);
        if (product.stock <= 0 || qty > product.stock) {
            showNotification("Insufficient stock to proceed.", true);
            return;
        }
        showNotification(`Proceeding to checkout with ${qty} item(s)...`);
        // redirect or open checkout simulation
    }

    // initialization
    renderProductPage(product);
    initQuantityControls();
    document.getElementById('addToCartBtn').addEventListener('click', addToCart);
    document.getElementById('buyNowBtn').addEventListener('click', buyNow);

    // Edge: if additional_images JSON longtext: in real scenario it's parsed, but we already covered.
</script>
</body>
</html>
