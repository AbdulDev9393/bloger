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
                <!-- Rating -->
<div class="mb-3">
    <label class="form-label">Rating (1 - 5 Stars)</label>

    <select name="rating" class="form-select">
        <option value="0">No Rating</option>
        <option value="1" {{ $product->rating == 1 ? 'selected' : '' }}>1 Star</option>
        <option value="2" {{ $product->rating == 2 ? 'selected' : '' }}>2 Stars</option>
        <option value="3" {{ $product->rating == 3 ? 'selected' : '' }}>3 Stars</option>
        <option value="4" {{ $product->rating == 4 ? 'selected' : '' }}>4 Stars</option>
        <option value="5" {{ $product->rating == 5 ? 'selected' : '' }}>5 Stars</option>
    </select>
</div>
<div class="text-warning">
    @for($i = 1; $i <= 5; $i++)
        @if($i <= $product->rating)
            ★
        @else
            ☆
        @endif
    @endfor
</div>
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
<script src="https://cdn.tiny.cloud/1/2fn2qok1i074fbk2msagi14crpyw9jr99nnw7grj0swaatwa/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  });
</script>

@endsection
