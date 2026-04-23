@extends('admin_panal.mainbar')

@section('title', 'Products')

@section('main-section')

<div class="container mt-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Manage Products</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
            <i class="fas fa-plus"></i> Add Product
        </button>
    </div>

    <!-- Products Grid -->
    <div class="row">

        <!-- Product Card -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <img src="https://www.techblogs.site/storage/blogs/webp/1776763949_resizeable_69e7442deed1a.webp" class="card-img-top" alt="Product">

                <div class="card-body">
                    <h5 class="card-title">SoniCore Pro</h5>
                    <p class="card-text">Wireless ANC headphones with 40h battery life</p>

                    <div class="mb-2">
                        ⭐⭐⭐⭐⭐
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold text-primary">$89.99</span>
                        <small class="text-success">Save $50</small>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-sm btn-outline-primary w-100">
                            <i class="fas fa-info-circle"></i> View Details
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- ✅ Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <!-- Product Name -->
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" name="price" class="form-control" required>
                    </div>

                    <!-- Discount -->
                    <div class="mb-3">
                        <label class="form-label">Discount</label>
                        <input type="text" name="discount" class="form-control">
                    </div>

                    <!-- Image -->
                    <div class="mb-3">
                        <label class="form-label">Product Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save Product</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection
