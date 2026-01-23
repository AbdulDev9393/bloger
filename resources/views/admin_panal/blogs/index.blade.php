@extends('admin_panal.mainbar')

@section('title', 'blogs')

@section('main-section')
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

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

    .filter-options {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .filter-btn {
        padding: 10px 20px;
        background: white;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .filter-btn:hover, .filter-btn.active {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
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

    /* Blogs Table */
    .blogs-table-container {
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

    .blogs-table {
        width: 100%;
        border-collapse: collapse;
    }

    .blogs-table thead {
        background: var(--light-color);
    }

    .blogs-table th {
        padding: 18px 20px;
        text-align: left;
        font-weight: 600;
        color: var(--dark-color);
        font-size: 14px;
        white-space: nowrap;
    }

    .blogs-table th:first-child {
        width: 50px;
        padding-left: 30px;
    }

    .blogs-table td {
        padding: 20px;
        border-bottom: 1px solid var(--border-color);
    }

    .blogs-table tr:last-child td {
        border-bottom: none;
    }

    .blogs-table tr:hover {
        background: #f9fafc;
    }

    .blogs-table td:first-child {
        padding-left: 30px;
    }

    /* Blog Item Styles */
    .blog-checkbox {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }

    .blog-item {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .blog-thumbnail {
        width: 60px;
        height: 50px;
        border-radius: 6px;
        object-fit: cover;
        flex-shrink: 0;
    }

    .blog-info h4 {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 5px;
        color: var(--dark-color);
    }

    .blog-meta {
        display: flex;
        gap: 15px;
        font-size: 13px;
        color: var(--gray-color);
    }

    .blog-meta span {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .blog-category {
        padding: 4px 12px;
        background: #f0f7ff;
        color: var(--primary-color);
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
    }

    .status-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
    }

    .status-published {
        background: rgba(28, 200, 138, 0.15);
        color: var(--success-color);
    }

    .status-draft {
        background: rgba(246, 194, 62, 0.15);
        color: var(--warning-color);
    }

    .status-scheduled {
        background: rgba(108, 117, 125, 0.15);
        color: #6c757d;
    }

    .blog-actions {
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

    .view-btn:hover {
        background: var(--success-color);
        color: white;
    }

    .delete-btn:hover {
        background: var(--danger-color);
        color: white;
    }

    /* Pagination */
    .pagination {
        display: flex;
        justify-content: center;
        padding: 25px;
        border-top: 1px solid var(--border-color);
    }

    .pagination-list {
        display: flex;
        gap: 8px;
        list-style: none;
    }

    .page-item {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .page-item:hover {
        background: var(--light-color);
    }

    .page-item.active {
        background: var(--primary-color);
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

  
    .modal-content {
        padding: 30px;
        background: white;
        border-radius: 12px;
         max-width: 100%;
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

    .modal-footer {
        padding: 20px 30px;
        border-top: 1px solid var(--border-color);
        display: flex;
        justify-content: flex-end;
        gap: 10px;
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
        
        .filter-options {
            width: 100%;
            justify-content: flex-start;
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
        
        .blogs-table th, .blogs-table td {
            padding: 12px 15px;
        }
    }

    @media (max-width: 576px) {
        .page-content {
            padding: 0 15px 15px;
        }
        
        .filter-options {
            justify-content: center;
        }
        
        .filter-btn {
            padding: 8px 15px;
            font-size: 13px;
        }
        
        .btn {
            padding: 10px 18px;
            font-size: 14px;
        }
    }
      .modal{
      margin-left: 250px;
      }
    @media (min-width: 400px) {
    #add-blog-modal .modal-dialog {
        margin-left: 0px  !important;
    }
}
</style>


<!-- Page Content -->
<div class="page-content">
    <!-- Page Actions -->
    <div class="page-actions">
        <div class="user-info d-flex align-items-center gap-3">
            <form action="{{ route('admin.blogs.search') }}" method="GET" class="search-box position-relative d-flex align-items-center gap-2">
                <i class="fas fa-search position-absolute top-50 translate-middle-y ms-3 text-muted"></i>
                <input type="text" name="query" class="form-control ps-5" placeholder="Search blogs..." value="{{ request('query') }}">
                <a href="{{ route('admin.blogs') }}" class="btn btn-secondary btn-sm">Reset</a>
            </form>
        </div>
        <div class="filter-options">
            <button class="filter-btn active" data-filter="all">All ({{$allblogs}})</button>
        </div>
       <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-blog-modal">
            <i class="fas fa-plus"></i> Add New Blog
        </button>
    </div>

    <!-- Blogs Table -->
    <div class="blogs-table-container">
        <div class="table-header">
            <h3>All Blog Posts</h3>
            <div class="table-actions">
               
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="blogs-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
<tbody id="blogs-table-body">
@foreach($blogs as $blog)
<tr>
    <!-- Thumbnail -->
    <td>
      <div class="blog-item">
            @if($blog->Thumbnail_Image)
                <img src="{{ asset( $blog->Thumbnail_Image) }}" alt="Thumbnail" class="blog-thumbnail">
            @else
                <img src="https://via.placeholder.com/60x50?text=No+Image" alt="No Image" class="blog-thumbnail">
            @endif
          <span>{{ Str::limit(strip_tags($blog->name), 10, '...') }}</span>
             
        </div>

    </td>

    <!-- Author -->
    <td>{{ $blog->author ?? 'Admin' }}</td>

    <!-- Category -->
    <td>{{ $blog->Category?->name ?? 'N/A' }}</td>

    <!-- Date -->
    <td>{{ $blog->created_at->format('d M Y') }}</td>

    <!-- Status -->
    <td>{{ ucfirst($blog->Status) }}</td>

   
    <td>
        <a href="{{route('admin.blogs.eid',$blog->id)}}" class="btn btn-sm btn-primary">Edit</a>
        <form action="{{route('admin.blog.delete',$blog->id)}}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
@if($blog->seo)
    <a href="{{ route('admin.blogs.seo', $blog->id) }}" class="btn btn-sm btn-warning">
        <i class="fas fa-search"></i> Already SEO
    </a>
@else
    <a href="{{ route('admin.blogs.seo', $blog->id) }}" class="btn btn-sm btn-warning">
        <i class="fas fa-search"></i> SEO
    </a>
@endif


        
    </td>

</tr>
@endforeach
</tbody>


            </table>
        </div>
 <div class="pagination">
       {{ $blogs->links('vendor.pagination.bootstrap-5') }}
    </div>
    </div>
</div>


<!-- Add Blog Modal -->
<div class="modal fade" id="add-blog-modal" tabindex="-1" aria-labelledby="addBlogModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fas fa-plus"></i> Add New Blog Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form id="add-blog-form" method="post" action="{{route('admin.blogs.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="blog-title" class="form-label">Blog Title</label>
                        <input type="text" name="name" class="form-control" id="blog-title" placeholder="Enter blog title" required>
                    </div>
                    <div class="col-md-6">
                        <label for="blog-category" class="form-label">Category</label>
                        <select class="form-select" name="category" id="blog-category" required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id }}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="blog-status" class="form-label">Status</label>
                        <select class="form-select" name="Status" id="blog-status" required>
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                            <option value="scheduled">Scheduled</option>
                        </select>
                    </div>

                    <!-- Schedule Date -->
                    <div class="col-md-6" id="schedule-date-group" style="display:none;">
                        <label for="schedule-date" class="form-label">Schedule Date</label>
                        <input type="datetime-local" class="form-control" name="schedule_date" id="schedule-date">
                    </div>
                    <div class="mt-2">
                        <span id="word-count">Word Count: 0</span>
                    </div>

                    <div class="col-md-12">
                        <label for="blog-content" class="form-label">Description</label>
                   <textarea name="description" id="editor"></textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Thumbnail Image</label>
                        <input type="file" name="Thumbnail_Image" class="form-control" id="blog-thumbnail" accept="image/*">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Banner Image</label>
                        <input type="file" class="form-control" name="Banner_Image" id="blog-banner" accept="image/*">
                    </div>
                     <div class="col-md-6">
                        <label class="form-label">Resizeable Image</label>
                        <input type="file" class="form-control" name="Resizeable_Image" id="blog-banner" accept="image/*">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Blog</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Add Blog Modal -->




<script>
document.addEventListener('DOMContentLoaded', function () {
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            const wordCountDisplay = document.getElementById('word-count');

            function countWords(text) {
                text = text.replace(/<[^>]*>/g, '');
                text = text.replace(/\s+/g, ' ').trim();
                return text ? text.split(' ').length : 0;
            }

            editor.model.document.on('change:data', () => {
                const data = editor.getData();
                const count = countWords(data);
                wordCountDisplay.textContent = `Word Count: ${count}`;
            });
        })
        .catch(error => {
            console.error(error);
        });
});
</script>
@endsection