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

    <!-- Products Table -->
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-header bg-white border-0 pt-4 px-4">
            <h5 class="mb-0 fw-bold">📋 All Products</h5>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Final Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample Product Row 1 -->

                        <!-- Sample Product Row 2 -->
                        <tr>
                            <td>2</td>
                            <td>
                                <div class="bg-secondary rounded-2" style="width: 50px; height: 50px;"></div>
                            </td>
                            <td class="fw-semibold">UltraWatch Series 5</td>
                            <td style="max-width: 250px;">
                                <span class="text-muted small">
                                    Smartwatch with heart rate monitor, GPS, and 7-day battery life.
                                </span>
                            </td>
                            <td>$249.99</td>
                            <td><span class="badge bg-success">15%</span></td>
                            <td class="fw-bold text-primary">$212.49</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>

            <!-- Pagination (Optional) -->
            <div class="d-flex justify-content-between align-items-center mt-3">
                <small class="text-muted">Showing 3 of 3 products</small>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</div>

<!-- ✅ LARGER Add Product Modal (Spacious & Open) -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 shadow-lg">

            <div class="modal-header bg-primary text-white rounded-top-4 py-3">
                <h5 class="modal-title fw-bold fs-4" id="addProductModalLabel">
                    <i class="fas fa-plus-circle me-2"></i> Add New Product
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <form action="" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body p-5">

                    <!-- Product Name -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold fs-5">Product Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control form-control-lg" placeholder="e.g., UltraBoost Wireless Headphones" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold fs-5">Description</label>
                        <textarea name="description" class="form-control" rows="4" placeholder="Write a compelling product description..."></textarea>
                        <div class="form-text mt-2">Briefly describe the features, benefits, and unique selling points of your product.</div>
                    </div>

                    <!-- Price & Discount Row -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold fs-5">Price ($) <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="price" class="form-control form-control-lg" placeholder="0.00" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold fs-5">Discount (%)</label>
                            <input type="number" step="1" name="discount" class="form-control form-control-lg" placeholder="e.g., 10">
                            <div class="form-text mt-2">Leave empty if no discount</div>
                        </div>
                    </div>

                    <!-- Stock Quantity -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold fs-5">Stock Quantity</label>
                        <input type="number" name="stock" class="form-control form-control-lg" placeholder="e.g., 100">
                        <div class="form-text mt-2">Number of items available in stock</div>
                    </div>

                    <!-- Category -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold fs-5">Category</label>
                        <select name="category" class="form-select form-select-lg">
                            <option value="">Select Category</option>
                            <option value="electronics">Electronics</option>
                            <option value="audio">Audio</option>
                            <option value="wearables">Wearables</option>
                            <option value="accessories">Accessories</option>
                        </select>
                    </div>

                    <!-- Product Image Upload -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold fs-5">Product Image</label>
                        <input type="file" name="image" class="form-control form-control-lg" accept="image/*">
                        <div class="form-text mt-2">Upload a high-quality image (JPG, PNG, WebP). Max size: 2MB</div>
                    </div>

                    <!-- Additional Images (Optional) -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold fs-5">Additional Images</label>
                        <input type="file" name="additional_images[]" class="form-control form-control-lg" accept="image/*" multiple>
                        <div class="form-text mt-2">You can select multiple images (Hold Ctrl to select multiple)</div>
                    </div>

                    <!-- Status Toggle -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold fs-5">Product Status</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" checked style="width: 3rem; height: 1.5rem;">
                            <label class="form-check-label ms-2">Active (Visible to customers)</label>
                        </div>
                    </div>

                </div>

                <div class="modal-footer bg-light border-0 rounded-bottom-4 p-4">
                    <button type="button" class="btn btn-outline-secondary btn-lg px-5 rounded-pill" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm">
                        <i class="fas fa-save me-2"></i> Save Product
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

    /* Table hover effect */
    .table-hover tbody tr:hover {
        background-color: rgba(13, 110, 253, 0.05);
        transition: background-color 0.2s ease;
    }

    /* Larger form inputs for better UX */
    .form-control-lg, .form-select-lg {
        padding: 0.75rem 1rem;
        font-size: 1rem;
    }

    /* Modal animation */
    .modal-content {
        animation: slideIn 0.3s ease;
    }

    @keyframes slideIn {
        from {
            transform: translateY(-50px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
</style>

@endsection
