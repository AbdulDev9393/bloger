@extends('admin_panal.mainbar')

@section('title', 'Categories')

@section('main-section')

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    :root {
        --primary-color: #4e73df;
        --primary-hover: #3a5ccc;
        --success-color: #1cc88a;
        --warning-color: #f6c23e;
        --danger-color: #e74a3b;
        --dark-color: #2c3e50;
        --light-color: #f8f9fc;
        --gray-color: #858796;
        --border-color: #e3e6f0;
        --shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
    }

    body {
        background-color: #f5f7fa;
        color: var(--dark-color);
    }

    /* Top Header */
    .top-header {
        background: white;
        padding: 20px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        position: sticky;
        top: 0;
        z-index: 100;
        margin-bottom: 30px;
    }

    .page-title {
        font-size: 24px;
        font-weight: 700;
        color: var(--dark-color);
    }

    .page-title i {
        color: var(--primary-color);
        margin-right: 10px;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .search-box {
        position: relative;
    }

    .search-box input {
        padding: 10px 15px 10px 40px;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        width: 300px;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .search-box input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(78, 115, 223, 0.1);
    }

    .search-box i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--gray-color);
    }

    .user-profile {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 15px;
        background: var(--light-color);
        border-radius: 8px;
        cursor: pointer;
    }

    .avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: var(--primary-color);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
    }

    /* Page Content */
    .page-content {
        padding: 0 30px 30px;
    }

    /* Page Actions */
    .page-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .stats-overview {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .stat-card {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px 25px;
        background: white;
        border-radius: 10px;
        box-shadow: var(--shadow);
        min-width: 200px;
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(78, 115, 223, 0.1);
        color: var(--primary-color);
        font-size: 22px;
    }

    .stat-info h3 {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .stat-info p {
        color: var(--gray-color);
        font-size: 14px;
    }

    .btn {
        padding: 12px 24px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background-color: var(--primary-color);
        color: white;
    }

    .btn-primary:hover {
        background-color: var(--primary-hover);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(78, 115, 223, 0.3);
    }

    .btn-success {
        background-color: var(--success-color);
        color: white;
    }

    .btn-danger {
        background-color: var(--danger-color);
        color: white;
    }

    /* Categories Grid */
    .categories-container {
        background: white;
        border-radius: 12px;
        box-shadow: var(--shadow);
        overflow: hidden;
    }

    .table-header {
        padding: 25px 30px;
        border-bottom: 1px solid var(--border-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .table-header h3 {
        font-size: 20px;
        font-weight: 700;
    }

    .table-actions {
        display: flex;
        gap: 10px;
    }

    .bulk-actions {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .select-all {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .categories-table {
        width: 100%;
        border-collapse: collapse;
    }

    .categories-table thead {
        background: var(--light-color);
    }

    .categories-table th {
        padding: 18px 20px;
        text-align: left;
        font-weight: 600;
        color: var(--dark-color);
        font-size: 14px;
        white-space: nowrap;
    }

    .categories-table th:first-child {
        width: 50px;
        padding-left: 30px;
    }

    .categories-table td {
        padding: 20px;
        border-bottom: 1px solid var(--border-color);
    }

    .categories-table tr:last-child td {
        border-bottom: none;
    }

    .categories-table tr:hover {
        background: #f9fafc;
    }

    .categories-table td:first-child {
        padding-left: 30px;
    }

    /* Category Item Styles */
    .category-checkbox {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }

    .category-item {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .category-color {
        width: 24px;
        height: 24px;
        border-radius: 6px;
        flex-shrink: 0;
    }

    .category-info h4 {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 5px;
        color: var(--dark-color);
    }

    .category-info p {
        font-size: 13px;
        color: var(--gray-color);
    }

    .category-slug {
        background: #f8f9fc;
        padding: 4px 10px;
        border-radius: 4px;
        font-family: monospace;
        font-size: 12px;
        color: var(--dark-color);
    }

    .posts-count {
        font-weight: 700;
        color: var(--dark-color);
    }

    .category-actions {
        display: flex;
        gap: 8px;
    }

    .action-btn {
        width: 36px;
        height: 36px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--light-color);
        color: var(--gray-color);
        cursor: pointer;
        transition: all 0.2s ease;
        border: none;
    }

    .action-btn:hover {
        transform: translateY(-2px);
    }

    .edit-btn:hover {
        background: var(--primary-color);
        color: white;
    }

    .delete-btn:hover {
        background: var(--danger-color);
        color: white;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }

    .empty-state i {
        font-size: 60px;
        color: var(--border-color);
        margin-bottom: 20px;
    }

    .empty-state h3 {
        font-size: 24px;
        margin-bottom: 10px;
        color: var(--dark-color);
    }

    .empty-state p {
        color: var(--gray-color);
        margin-bottom: 25px;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Modal Styles */
   
    .modal-content {
        background: white;
        border-radius: 12px;
        width: 500px;
        max-width: 90%;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    }

    .modal-header {
        padding: 25px 30px;
        border-bottom: 1px solid var(--border-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-header h3 {
        font-size: 20px;
        font-weight: 700;
    }

    .close-modal {
        background: none;
        border: none;
        font-size: 24px;
        cursor: pointer;
        color: var(--gray-color);
        transition: color 0.3s ease;
    }

    .close-modal:hover {
        color: var(--danger-color);
    }

    .modal-body {
        padding: 30px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: var(--dark-color);
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(78, 115, 223, 0.1);
    }

    .color-picker-container {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .color-preview {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        border: 2px solid var(--border-color);
        cursor: pointer;
    }

    .color-input {
        flex: 1;
    }

    .slug-preview {
        margin-top: 10px;
        padding: 8px 12px;
        background: #f8f9fc;
        border-radius: 6px;
        font-size: 13px;
        color: var(--gray-color);
    }

    .slug-preview strong {
        color: var(--dark-color);
        font-family: monospace;
    }

    .modal-footer {
        padding: 20px 30px;
        border-top: 1px solid var(--border-color);
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    /* Color Palette */
    .color-options {
        display: flex;
        gap: 10px;
        margin-top: 10px;
        flex-wrap: wrap;
    }

    .color-option {
        width: 30px;
        height: 30px;
        border-radius: 6px;
        cursor: pointer;
        border: 2px solid transparent;
        transition: transform 0.2s ease;
    }

    .color-option:hover {
        transform: scale(1.1);
    }

    .color-option.active {
        border-color: var(--dark-color);
        transform: scale(1.1);
    }

    /* Responsive Styles */
    @media (max-width: 992px) {
        .search-box input {
            width: 200px;
        }
        
        .page-actions {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .stats-overview {
            width: 100%;
            justify-content: space-between;
        }
        
        .stat-card {
            flex: 1;
            min-width: auto;
        }
    }

    @media (max-width: 768px) {
        .top-header {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
            padding: 15px 20px;
        }
        
        .user-info {
            width: 100%;
            justify-content: space-between;
        }
        
        .search-box input {
            width: 100%;
        }
        
        .page-content {
            padding: 0 20px 20px;
        }
        
        .table-header {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
        }
        
        .bulk-actions {
            width: 100%;
            justify-content: space-between;
        }
        
        .categories-table th, .categories-table td {
            padding: 12px 15px;
        }
    }

    @media (max-width: 576px) {
        .page-content {
            padding: 0 15px 15px;
        }
        
        .stat-card {
            flex-direction: column;
            text-align: center;
            padding: 15px;
        }
        
        .stat-icon {
            margin: 0 auto;
        }
        
        .btn {
            padding: 10px 18px;
            font-size: 14px;
        }
    }
</style>


<!-- Top Header -->
<div class="top-header d-flex justify-content-between align-items-center p-3 bg-white shadow-sm mb-4">
    <h1 class="page-title m-0">
        <i class="fas fa-folder text-primary me-2"></i> Manage Categories
    </h1>

    <!-- Search Form -->
    <div class="user-info d-flex align-items-center gap-3">
        <form action="{{ route('admin.categories.search') }}" method="GET" class="search-box position-relative d-flex align-items-center gap-2">
            <i class="fas fa-search position-absolute top-50 translate-middle-y ms-3 text-muted"></i>
            <input type="text" name="query" class="form-control ps-5" placeholder="Search categories...">
            <!-- Reset Button -->
            <a href="{{ route('admin.Categories') }}" class="btn btn-secondary btn-sm">Reset</a>
        </form>
    </div>
</div>


<!-- Page Content -->
<div class="page-content">
    <!-- Page Actions & Stats -->
    <div class="page-actions">
        <div class="stats-overview">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-folder"></i>
                </div>
                <div class="stat-info">
                    <h3 id="total-categories">{{$totalCategories}}</h3>
                    <p>Total Categories</p>
                </div>
            </div>
          
           
        </div>
<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
    <i class="fas fa-plus"></i> Add New Category
</button>
    </div>

    <!-- Categories Table -->
    <div class="categories-container">
        <div class="table-header">
            <h3>All Categories</h3>
           
        </div>
        
        <div class="table-responsive">
            <table class="categories-table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                      
                        <th>Actions</th>
                    </tr>
                </thead>
              <tbody>
                @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{route('admin.Categories.delete',$category->id)}}" class="btn btn-sm btn-danger">Delete</a>
                 <a href="{{ route('admin.Categories.edit', $category->id) }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i> Edit
                </a>

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">No Categories Found</td>
                </tr>
                @endforelse
                </tbody>

            </table>
        </div>

    </div>
</div>

<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('admin.Categoryadd') }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" name="category" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>





@endsection