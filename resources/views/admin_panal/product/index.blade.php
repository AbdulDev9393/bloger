@extends('admin_panal.mainbar')

@section('title', 'Manage Products')

@section('main-section')

<div class="container mt-4">

    <!-- Header with Stats -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">📦 Product Inventory</h2>
            <p class="text-muted">Manage, edit, and monitor your product catalog</p>
        </div>
        <button class="btn btn-primary btn-lg shadow-sm" data-bs-toggle="modal" data-bs-target="#addProductModal">
            <i class="fas fa-plus-circle me-1"></i> Add New Product
        </button>
    </div>

    <!-- Products Grid -->
    <div class="row g-4">
        <!-- ✅ Example Product Card (Dynamic would come from backend) -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden transition-hover">
                <div class="position-relative">
                    <img src="https://www.techblogs.site/storage/blogs/webp/1776763949_resizeable_69e7442deed1a.webp"
                         class="card-img-top" alt="SoniCore Pro"
                         style="height: 220px; object-fit: cover;">
                    <span class="badge bg-danger position-absolute top-0 end-0 m-3 px-3 py-2 rounded-pill">
                        -36% Off
                    </span>
                </div>

                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="card-title fw-bold mb-0">SoniCore Pro</h5>
                        <div class="text-warning small">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>

                    <p class="card-text text-muted small">
                        Experience studio-grade sound with active noise cancellation and 40 hours of battery life.
                        Perfect for travel and daily use.
                    </p>

                    <div class="mt-auto">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <span class="fw-bold text-primary fs-5">$89.99</span>
                                <span class="text-muted text-decoration-line-through ms-2 small">$139.99</span>
                            </div>
                            <small class="text-success fw-semibold">🔥 Save $50</small>
                        </div>
                        <button class="btn btn-sm btn-outline-primary w-100 rounded-pill">
                            <i class="fas fa-eye me-1"></i> Quick View
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Repeat product cards dynamically here -->
    </div>

    <!-- Empty State (Optional - show when no products) -->
    {{-- <div class="text-center py-5">
        <i class="fas fa-box-open fa-4x text-muted mb-3"></i>
        <h4 class="text-muted">No products yet</h4>
        <p class="text-secondary">Click "Add New Product" to start building your catalog.</p>
    </div> --}}

</div>

<!-- ✅ Add Product Modal (Professional & Clean) -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg">

            <div class="modal-header bg-primary text-white rounded-top-4">
                <h5 class="modal-title fw-bold" id="addProductModalLabel">
                    <i class="fas fa-plus-circle me-2"></i> Add New Product
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <form action="" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body p-4">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Product Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="e.g., UltraBoost Wireless Headphones" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Write a compelling product description..."></textarea>
                        <div class="form-text">Briefly describe the features, benefits, and unique selling points.</div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Price ($) <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="price" class="form-control" placeholder="0.00" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Discount (%)</label>
                            <input type="number" step="1" name="discount" class="form-control" placeholder="e.g., 10">
                            <div class="form-text">Leave empty if no discount</div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Product Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        <div class="form-text">Upload a high-quality image (JPG, PNG, WebP). Max size: 2MB</div>
                    </div>

                </div>

                <div class="modal-footer bg-light border-0 rounded-bottom-4 p-3">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">
                        <i class="fas fa-save me-1"></i> Save Product
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<style>
    .transition-hover {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .transition-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 2rem rgba(0,0,0,.1) !important;
    }
    .rounded-4 {
        border-radius: 1rem !important;
    }
    .rounded-top-4 {
        border-top-left-radius: 1rem !important;
        border-top-right-radius: 1rem !important;
    }
    .rounded-bottom-4 {
        border-bottom-left-radius: 1rem !important;
        border-bottom-right-radius: 1rem !important;
    }
</style>

@endsection
