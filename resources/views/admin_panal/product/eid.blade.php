@extends('admin_panal.mainbar')

@section('title', 'Edit Product')

@section('main-section')

<div class="container mt-4">

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">✏️ Edit Product</h4>
        </div>

        <div class="card-body p-4">

            <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Product Name -->
                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ $product->name }}">
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                </div>

                <!-- Price & Discount -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" name="price" class="form-control"
                               value="{{ $product->price }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Discount (%)</label>
                        <input type="number" name="discount" class="form-control"
                               value="{{ $product->discount }}">
                    </div>
                </div>

                <!-- Stock -->
                <div class="mb-3">
                    <label class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control"
                           value="{{ $product->stock }}">
                </div>

                <!-- Category -->
             <div class="mb-4">
    <label class="form-label fw-semibold fs-5">Category</label>

    <select name="category" class="form-select form-select-lg">

        <option value="">Select Category</option>

        <option value="electronics" {{ $product->category == 'electronics' ? 'selected' : '' }}>
            Electronics
        </option>

        <option value="audio" {{ $product->category == 'audio' ? 'selected' : '' }}>
            Audio
        </option>

        <option value="wearables" {{ $product->category == 'wearables' ? 'selected' : '' }}>
            Wearables
        </option>

        <option value="accessories" {{ $product->category == 'accessories' ? 'selected' : '' }}>
            Accessories
        </option>

    </select>
</div>
                <!-- Current Image -->
                <div class="mb-3">
                    <label class="form-label">Current Image</label><br>

                    @if($product->image)
                        <img src="{{ asset($product->image) }}" width="80" class="rounded">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </div>

                <!-- New Image -->
                <div class="mb-3">
                    <label class="form-label">Change Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.product') }}" class="btn btn-secondary me-2">
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-success">
                        Update Product
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
