@extends('admin_panal.mainbar')

@section('title', 'Edit Category')

@section('main-section')

<div class="container mt-4">

    <h2>Edit Category</h2>
    <hr>

    <form action="{{ route('admin.Categories.update', $Category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="category-name" class="form-label">Category Name</label>
            <input type="text" name="name" id="category-name" class="form-control" 
                   value="{{ $Category->name }}" required>
        </div>

       
       

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Update Category
        </button>
        <a href="{{ route('admin.Categories') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>

    </form>

</div>

@endsection
