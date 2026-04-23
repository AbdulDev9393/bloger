@extends('admin_panal.mainbar')

@section('title', 'Manage Products')

@section('main-section')

<div class="container mt-4">

    <!-- Header with Stats -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">📦 Product Management</h2>
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
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <!-- Image -->
                        <td>
                            @if($product->image)
                                <img src="{{ asset($product->image) }}"
                                    style="width:50px; height:50px; object-fit:cover;"
                                    class="rounded">
                            @else
                                <div class="bg-secondary rounded-2" style="width:50px; height:50px;"></div>
                            @endif
                        </td>

                        <!-- Name -->
                        <td class="fw-semibold">
                            {{ \Illuminate\Support\Str::limit($product->name, 40) }}
                        </td>

                        <!-- Description -->
                        <td style="max-width: 250px;">
                            <span class="text-muted small">
                                {!! Str::limit(strip_tags($product->description), 80) !!}
                            </span>
                        </td>

                        <!-- Price -->
                        <td>
                            ${{ number_format($product->price, 2) }}
                        </td>

                        <!-- Discount -->
                        <td>
                            <span class="badge bg-success">
                                {{ $product->discount ?? 0 }}%
                            </span>
                        </td>


                        <!-- Actions -->
                        <td>
                            <a href="{{ route('admin.product.eid',$product->id) }}" class="btn btn-sm btn-outline-primary me-1">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="{{ route('admin.product.delete',$product->id) }}" class="btn btn-sm btn-outline-danger">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">
                            No products found 😔
                        </td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
           <div class="d-flex justify-content-between align-items-center mt-3">
                <small class="text-muted">
                    Showing {{ $products->firstItem() }} to {{ $products->lastItem() }}
                    of {{ $products->total() }} products
                </small>
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

</div>

<!-- ADD PRODUCT MODAL -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content rounded-4 border-0 shadow-lg">

            <div class="modal-header bg-primary text-white rounded-top-4 py-3">
                <h5 class="modal-title fw-bold fs-4" id="addProductModalLabel">
                    <i class="fas fa-plus-circle me-2"></i> Add New Product
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body p-5">

                    <!-- Product Name -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold fs-5">Product Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control form-control-lg" placeholder="e.g., UltraBoost Wireless Headphones" required>
                    </div>

                    <!-- Description with Summernote Text Pad -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold fs-5">Description <span class="text-danger">*</span></label>
                        <textarea name="description" id="summernote-description" class="form-control" required></textarea>
                        <div class="form-text mt-2">Write a detailed product description with formatting options (bold, italic, lists, links, etc.)</div>
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

                    <!-- Additional Images -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold fs-5">Additional Images</label>
                        <input type="file" name="additional_images[]" class="form-control form-control-lg" accept="image/*" multiple>
                        <div class="form-text mt-2">You can select multiple images (Hold Ctrl/Cmd to select multiple)</div>
                    </div>

                    <!-- Status Toggle -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold fs-5">Product Verified</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" checked style="width: 3rem; height: 1.5rem;">
                            <label class="form-check-label ms-2">Mark as verified/active</label>
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

    /* Summernote custom styling */
    .note-editor {
        border-radius: 0.5rem !important;
        border: 1px solid #dee2e6 !important;
    }

    .note-editor.note-frame {
        border-radius: 0.5rem;
    }

    .note-toolbar {
        border-top-left-radius: 0.5rem !important;
        border-top-right-radius: 0.5rem !important;
        background-color: #f8f9fa !important;
    }

    .note-editable {
        min-height: 250px !important;
        background-color: white;
        border-bottom-left-radius: 0.5rem;
        border-bottom-right-radius: 0.5rem;
    }
</style>

<!-- Required Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize Summernote with full toolbar
        $('#summernote-description').summernote({
            height: 300,
            placeholder: 'Write a detailed description of your product...',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'italic', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
                ['height', ['height']]
            ],
            callbacks: {
                onImageUpload: function(files) {
                    // Handle image upload to server (optional)
                    console.log('Image uploaded:', files);
                }
            }
        });
    });
</script>

@endsection
