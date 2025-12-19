@extends('admin_panal.mainbar')

@section('title', 'Edit Blog')

@section('main-section')

<style>
/* Reset & Variables */
:root {
    --primary-color: #4e73df;
    --primary-hover: #3a5ccc;
    --success-color: #1cc88a;
    --danger-color: #e74a3b;
    --dark-color: #2c3e50;
    --light-color: #f8f9fc;
    --border-color: #e3e6f0;
}

/* Main Content */
.main-content {
    
    padding: 30px;
    transition: all 0.3s;
    margin-left: 110px;
}
    @media (min-width: 600px) {
    #add-blog-modal .modal-dialog {
        margin-left: 0px  !important;
    }
}
/* Page Header */
.page-header { display:flex; justify-content:space-between; align-items:center; margin-bottom:30px; }
.page-header h2 { font-size:24px; font-weight:700; color:var(--dark-color); }
.btn-primary { background-color: var(--primary-color); color:white; padding:10px 18px; border-radius:8px; border:none; }
.btn-primary:hover { background-color: var(--primary-hover); }

/* Form Styles */
.form-container {
    background: white;
    padding: 30px;
    border-radius:12px;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
}
.form-group { margin-bottom:20px; }
.form-label { font-weight:500; margin-bottom:5px; display:block; }
.form-control, .form-select { width:100%; padding:10px 15px; border:1px solid var(--border-color); border-radius:8px; }
.form-control:focus, .form-select:focus { outline:none; border-color:var(--primary-color); box-shadow:0 0 0 3px rgba(78,115,223,0.1); }
</style>

<div class="main-content">
    <div class="page-header">
        <h2><i class="fas fa-edit"></i> Edit Blog</h2>
        <a href="{{ route('admin.blogs') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="form-container">
        <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <!-- Blog Title -->
            <div class="form-group">
                <label class="form-label" for="blog-title">Blog Title</label>
                <input type="text" name="name" id="blog-title" class="form-control" value="{{ $blog->name }}" required>
            </div>

            <!-- Category -->
            <div class="form-group">
                <label class="form-label" for="blog-category">Category</label>
                <select name="category" id="blog-category" class="form-select" required>
          <option value="{{$blog->Category->id }}" {{ $blog->Category->id == $blog->Category->id ? 'selected' : '' }}>
    {{ $blog->Category->name }}
</option>

                </select>
            </div>

            <!-- Status -->
            <div class="form-group">
                <label class="form-label" for="blog-status">Status</label>
                <select name="Status" id="blog-status" class="form-select" required>
                    <option value="draft" {{ $blog->Status=='draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ $blog->Status=='published' ? 'selected' : '' }}>Published</option>
                    <option value="scheduled" {{ $blog->Status=='scheduled' ? 'selected' : '' }}>Scheduled</option>
                </select>
            </div>

            <!-- Short Description -->
            <div class="form-group">
                <label class="form-label" for="blog-description">Short Description</label>
                <textarea name="Description" id="blog-description" class="form-control" rows="5" required>{{ $blog->Description }}</textarea>
            </div>

            <!-- Thumbnail Image -->
            <div class="form-group">
                <label class="form-label">Thumbnail Image</label>
                <input type="file" name="Thumbnail_Image" class="form-control" accept="image/*">
@if($blog->Thumbnail_Image)
    <img src="{{ asset($blog->Thumbnail_Image) }}" alt="Thumbnail" style="margin-top:10px; width:100px; height:auto;">
@endif
            </div>

            <!-- Banner Image -->
            <div class="form-group">
                <label class="form-label">Banner Image</label>
                <input type="file" name="Banner_Image" class="form-control" accept="image/*">

                @if($blog->Banner_mage)
                    <img src="{{ asset($blog->Banner_mage) }}" alt="Banner" style="margin-top:10px; width:200px; height:auto;">
                @endif

            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Blog</button>
        </form>
    </div>
</div>

@endsection
