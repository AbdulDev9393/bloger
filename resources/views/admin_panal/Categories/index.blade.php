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
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        justify-content: center;
        align-items: center;
    }

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
<div class="top-header">
    <h1 class="page-title"><i class="fas fa-folder"></i> Manage Categories</h1>
    <div class="user-info">
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" id="search-categories" placeholder="Search categories...">
        </div>
        
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
                    <h3 id="total-categories">12</h3>
                    <p>Total Categories</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(28, 200, 138, 0.1); color: var(--success-color);">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="stat-info">
                    <h3 id="total-posts">156</h3>
                    <p>Total Posts</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(246, 194, 62, 0.1); color: var(--warning-color);">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stat-info">
                    <h3 id="most-used">Technology</h3>
                    <p>Most Used Category</p>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" id="add-category-btn">
            <i class="fas fa-plus"></i> Add New Category
        </button>
    </div>

    <!-- Categories Table -->
    <div class="categories-container">
        <div class="table-header">
            <h3>All Categories</h3>
            <div class="table-actions">
                <div class="bulk-actions">
                    <div class="select-all">
                        <input type="checkbox" id="select-all">
                        <label for="select-all">Select All</label>
                    </div>
                    <select class="form-control" style="width: auto; padding: 8px 15px;" id="bulk-action-select">
                        <option>Bulk Actions</option>
                        <option>Delete Selected</option>
                        <option>Merge Categories</option>
                    </select>
                    <button class="btn btn-primary" style="padding: 8px 15px;" id="apply-bulk-action">Apply</button>
                </div>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="categories-table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all-header" class="category-checkbox"></th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Slug</th>
                        <th>Posts</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="categories-table-body">
                    <!-- Category rows will be populated here -->
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <ul class="pagination-list">
                <li class="page-item"><i class="fas fa-chevron-left"></i></li>
                <li class="page-item active">1</li>
                <li class="page-item">2</li>
                <li class="page-item"><i class="fas fa-chevron-right"></i></li>
            </ul>
        </div>
    </div>
</div>

<!-- Add Category Modal -->
<div class="modal" id="add-category-modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3><i class="fas fa-plus"></i> Add New Category</h3>
            <button class="close-modal" id="close-add-modal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="add-category-form">
                <div class="form-group">
                    <label for="category-name">Category Name *</label>
                    <input type="text" id="category-name" class="form-control" placeholder="Enter category name" required>
                </div>
                <div class="form-group">
                    <label for="category-slug">Category Slug</label>
                    <input type="text" id="category-slug" class="form-control" placeholder="auto-generated-slug">
                    <div class="slug-preview">URL will be: <strong>/category/<span id="slug-preview">auto-generated-slug</span></strong></div>
                </div>
                <div class="form-group">
                    <label for="category-description">Description</label>
                    <textarea id="category-description" class="form-control" rows="3" placeholder="Enter a brief description (optional)"></textarea>
                </div>
                <div class="form-group">
                    <label>Category Color</label>
                    <div class="color-picker-container">
                        <div class="color-preview" id="color-preview" style="background-color: #4e73df;"></div>
                        <input type="color" id="category-color" class="form-control color-input" value="#4e73df">
                    </div>
                    <div class="color-options">
                        <div class="color-option active" style="background-color: #4e73df;" data-color="#4e73df"></div>
                        <div class="color-option" style="background-color: #1cc88a;" data-color="#1cc88a"></div>
                        <div class="color-option" style="background-color: #36b9cc;" data-color="#36b9cc"></div>
                        <div class="color-option" style="background-color: #f6c23e;" data-color="#f6c23e"></div>
                        <div class="color-option" style="background-color: #e74a3b;" data-color="#e74a3b"></div>
                        <div class="color-option" style="background-color: #6f42c1;" data-color="#6f42c1"></div>
                        <div class="color-option" style="background-color: #fd7e14;" data-color="#fd7e14"></div>
                        <div class="color-option" style="background-color: #20c9a6;" data-color="#20c9a6"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label>
                        <input type="checkbox" id="featured-category" checked>
                        Mark as Featured Category
                    </label>
                    <small style="display: block; color: var(--gray-color); margin-top: 5px;">Featured categories appear prominently on the website.</small>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn" id="cancel-add-btn">Cancel</button>
            <button class="btn btn-primary" id="save-category-btn">Save Category</button>
        </div>
    </div>
</div>

<!-- Edit Category Modal -->
<div class="modal" id="edit-category-modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3><i class="fas fa-edit"></i> Edit Category</h3>
            <button class="close-modal" id="close-edit-modal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="edit-category-form">
                <div class="form-group">
                    <label for="edit-category-name">Category Name *</label>
                    <input type="text" id="edit-category-name" class="form-control" value="Technology" required>
                </div>
                <div class="form-group">
                    <label for="edit-category-slug">Category Slug</label>
                    <input type="text" id="edit-category-slug" class="form-control" value="technology">
                    <div class="slug-preview">URL will be: <strong>/category/<span id="edit-slug-preview">technology</span></strong></div>
                </div>
                <div class="form-group">
                    <label for="edit-category-description">Description</label>
                    <textarea id="edit-category-description" class="form-control" rows="3">All about technology, programming, and web development.</textarea>
                </div>
                <div class="form-group">
                    <label>Category Color</label>
                    <div class="color-picker-container">
                        <div class="color-preview" id="edit-color-preview" style="background-color: #4e73df;"></div>
                        <input type="color" id="edit-category-color" class="form-control color-input" value="#4e73df">
                    </div>
                    <div class="color-options" id="edit-color-options">
                        <div class="color-option active" style="background-color: #4e73df;" data-color="#4e73df"></div>
                        <div class="color-option" style="background-color: #1cc88a;" data-color="#1cc88a"></div>
                        <div class="color-option" style="background-color: #36b9cc;" data-color="#36b9cc"></div>
                        <div class="color-option" style="background-color: #f6c23e;" data-color="#f6c23e"></div>
                        <div class="color-option" style="background-color: #e74a3b;" data-color="#e74a3b"></div>
                        <div class="color-option" style="background-color: #6f42c1;" data-color="#6f42c1"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label>
                        <input type="checkbox" id="edit-featured-category" checked>
                        Mark as Featured Category
                    </label>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn" id="cancel-edit-btn">Cancel</button>
            <button class="btn btn-primary" id="update-category-btn">Update Category</button>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal" id="delete-confirm-modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3><i class="fas fa-exclamation-triangle"></i> Confirm Deletion</h3>
            <button class="close-modal" id="close-delete-modal">&times;</button>
        </div>
        <div class="modal-body">
            <div style="text-align: center; padding: 20px 0;">
                <i class="fas fa-trash-alt" style="font-size: 48px; color: var(--danger-color); margin-bottom: 20px;"></i>
                <h3 style="margin-bottom: 10px;">Delete Category?</h3>
                <p id="delete-message">Are you sure you want to delete this category? This action cannot be undone.</p>
                <p style="color: var(--danger-color); font-weight: 600;" id="posts-warning"></p>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" id="cancel-delete-btn">Cancel</button>
            <button class="btn btn-danger" id="confirm-delete-btn">Delete Category</button>
        </div>
    </div>
</div>

<script>
    // Sample category data
    const categories = [
        {
            id: 1,
            name: "Technology",
            slug: "technology",
            description: "All about technology, programming, and web development.",
            color: "#4e73df",
            posts: 47,
            featured: true
        },
        {
            id: 2,
            name: "Lifestyle",
            slug: "lifestyle",
            description: "Life tips, habits, and personal development.",
            color: "#1cc88a",
            posts: 32,
            featured: true
        },
        {
            id: 3,
            name: "Business",
            slug: "business",
            description: "Entrepreneurship, marketing, and business strategies.",
            color: "#36b9cc",
            posts: 28,
            featured: true
        },
        {
            id: 4,
            name: "Travel",
            slug: "travel",
            description: "Travel guides, tips, and destination reviews.",
            color: "#f6c23e",
            posts: 19,
            featured: false
        },
        {
            id: 5,
            name: "Food",
            slug: "food",
            description: "Recipes, cooking tips, and restaurant reviews.",
            color: "#e74a3b",
            posts: 15,
            featured: false
        },
        {
            id: 6,
            name: "Health & Fitness",
            slug: "health-fitness",
            description: "Wellness, exercise, and healthy living tips.",
            color: "#6f42c1",
            posts: 12,
            featured: false
        },
        {
            id: 7,
            name: "Entertainment",
            slug: "entertainment",
            description: "Movies, music, games, and pop culture.",
            color: "#fd7e14",
            posts: 8,
            featured: false
        },
        {
            id: 8,
            name: "Education",
            slug: "education",
            description: "Learning resources, tutorials, and study tips.",
            color: "#20c9a6",
            posts: 5,
            featured: false
        }
    ];

    // DOM Elements
    const categoriesTableBody = document.getElementById('categories-table-body');
    const addCategoryBtn = document.getElementById('add-category-btn');
    const addCategoryModal = document.getElementById('add-category-modal');
    const editCategoryModal = document.getElementById('edit-category-modal');
    const deleteConfirmModal = document.getElementById('delete-confirm-modal');
    const closeAddModal = document.getElementById('close-add-modal');
    const closeEditModal = document.getElementById('close-edit-modal');
    const closeDeleteModal = document.getElementById('close-delete-modal');
    const cancelAddBtn = document.getElementById('cancel-add-btn');
    const cancelEditBtn = document.getElementById('cancel-edit-btn');
    const cancelDeleteBtn = document.getElementById('cancel-delete-btn');
    const saveCategoryBtn = document.getElementById('save-category-btn');
    const updateCategoryBtn = document.getElementById('update-category-btn');
    const confirmDeleteBtn = document.getElementById('confirm-delete-btn');
    const searchInput = document.getElementById('search-categories');
    const selectAllHeader = document.getElementById('select-all-header');
    const selectAll = document.getElementById('select-all');
    const applyBulkAction = document.getElementById('apply-bulk-action');
    const bulkActionSelect = document.getElementById('bulk-action-select');
    
    // Stats elements
    const totalCategoriesEl = document.getElementById('total-categories');
    const totalPostsEl = document.getElementById('total-posts');
    const mostUsedEl = document.getElementById('most-used');
    
    // Variables
    let currentEditId = null;
    let currentDeleteId = null;

    // Initialize page
    document.addEventListener('DOMContentLoaded', function() {
        updateStats();
        renderCategories(categories);
        setupEventListeners();
        setupSlugGeneration();
    });

    // Update statistics
    function updateStats() {
        totalCategoriesEl.textContent = categories.length;
        
        // Calculate total posts
        const totalPosts = categories.reduce((sum, category) => sum + category.posts, 0);
        totalPostsEl.textContent = totalPosts;
        
        // Find most used category
        const mostUsed = categories.reduce((max, category) => 
            category.posts > max.posts ? category : max, categories[0]);
        mostUsedEl.textContent = mostUsed.name;
    }

    // Render categories to the table
    function renderCategories(categoriesToRender) {
        categoriesTableBody.innerHTML = '';
        
        if (categoriesToRender.length === 0) {
            categoriesTableBody.innerHTML = `
                <tr>
                    <td colspan="6">
                        <div class="empty-state">
                            <i class="fas fa-folder-open"></i>
                            <h3>No Categories Found</h3>
                            <p>No categories match your search. Try adjusting your search or add a new category.</p>
                            <button class="btn btn-primary" id="add-category-empty">
                                <i class="fas fa-plus"></i> Add Your First Category
                            </button>
                        </div>
                    </td>
                </tr>
            `;
            document.getElementById('add-category-empty').addEventListener('click', () => {
                openAddCategoryModal();
            });
            return;
        }
        
        categoriesToRender.forEach(category => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td><input type="checkbox" class="category-checkbox category-select" data-id="${category.id}"></td>
                <td>
                    <div class="category-item">
                        <div class="category-color" style="background-color: ${category.color};"></div>
                        <div class="category-info">
                            <h4>${category.name} ${category.featured ? '<i class="fas fa-star" style="color: #f6c23e; font-size: 12px;"></i>' : ''}</h4>
                            <p>${category.description}</p>
                        </div>
                    </div>
                </td>
                <td>${category.description}</td>
                <td><span class="category-slug">${category.slug}</span></td>
                <td><span class="posts-count">${category.posts}</span> posts</td>
                <td>
                    <div class="category-actions">
                        <button class="action-btn edit-btn" data-id="${category.id}"><i class="fas fa-edit"></i></button>
                        <button class="action-btn delete-btn" data-id="${category.id}"><i class="fas fa-trash"></i></button>
                    </div>
                </td>
            `;
            categoriesTableBody.appendChild(row);
        });
        
        // Add event listeners to action buttons
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const categoryId = parseInt(this.getAttribute('data-id'));
                openEditCategoryModal(categoryId);
            });
        });
        
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const categoryId = parseInt(this.getAttribute('data-id'));
                openDeleteConfirmModal(categoryId);
            });
        });
        
        // Add event listeners to checkboxes
        document.querySelectorAll('.category-select').forEach(checkbox => {
            checkbox.addEventListener('change', updateSelectAllState);
        });
    }

    // Set up event listeners
    function setupEventListeners() {
        // Add category button
        addCategoryBtn.addEventListener('click', openAddCategoryModal);
        
        // Close modal buttons
        closeAddModal.addEventListener('click', closeAddCategoryModal);
        closeEditModal.addEventListener('click', closeEditCategoryModal);
        closeDeleteModal.addEventListener('click', closeDeleteConfirmModal);
        cancelAddBtn.addEventListener('click', closeAddCategoryModal);
        cancelEditBtn.addEventListener('click', closeEditCategoryModal);
        cancelDeleteBtn.addEventListener('click', closeDeleteConfirmModal);
        
        // Save/Update/Delete buttons
        saveCategoryBtn.addEventListener('click', saveNewCategory);
        updateCategoryBtn.addEventListener('click', updateCategory);
        confirmDeleteBtn.addEventListener('click', deleteCategory);
        
        // Search functionality
        searchInput.addEventListener('input', filterCategories);
        
        // Select all functionality
        selectAllHeader.addEventListener('change', function() {
            const isChecked = this.checked;
            document.querySelectorAll('.category-select').forEach(checkbox => {
                checkbox.checked = isChecked;
            });
            selectAll.checked = isChecked;
        });
        
        selectAll.addEventListener('change', function() {
            const isChecked = this.checked;
            document.querySelectorAll('.category-select').forEach(checkbox => {
                checkbox.checked = isChecked;
            });
            selectAllHeader.checked = isChecked;
        });
        
        // Bulk actions
        applyBulkAction.addEventListener('click', applyBulkActions);
        
        // Color picker
        document.querySelectorAll('.color-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('.color-option').forEach(opt => opt.classList.remove('active'));
                this.classList.add('active');
                const color = this.getAttribute('data-color');
                document.getElementById('color-preview').style.backgroundColor = color;
                document.getElementById('category-color').value = color;
            });
        });
        
        document.getElementById('category-color').addEventListener('input', function() {
            document.getElementById('color-preview').style.backgroundColor = this.value;
        });
        
        // Edit modal color options
        document.querySelectorAll('#edit-color-options .color-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('#edit-color-options .color-option').forEach(opt => opt.classList.remove('active'));
                this.classList.add('active');
                const color = this.getAttribute('data-color');
                document.getElementById('edit-color-preview').style.backgroundColor = color;
                document.getElementById('edit-category-color').value = color;
            });
        });
        
        document.getElementById('edit-category-color').addEventListener('input', function() {
            document.getElementById('edit-color-preview').style.backgroundColor = this.value;
        });
        
        // Close modal when clicking outside
        window.addEventListener('click', function(event) {
            if (event.target === addCategoryModal) {
                closeAddCategoryModal();
            }
            if (event.target === editCategoryModal) {
                closeEditCategoryModal();
            }
            if (event.target === deleteConfirmModal) {
                closeDeleteConfirmModal();
            }
        });
    }

    // Set up slug generation
    function setupSlugGeneration() {
        const nameInput = document.getElementById('category-name');
        const slugInput = document.getElementById('category-slug');
        const slugPreview = document.getElementById('slug-preview');
        
        nameInput.addEventListener('input', function() {
            if (!slugInput.dataset.userEdited) {
                const slug = generateSlug(this.value);
                slugInput.value = slug;
                slugPreview.textContent = slug;
            }
        });
        
        slugInput.addEventListener('input', function() {
            this.dataset.userEdited = 'true';
            slugPreview.textContent = this.value;
        });
        
        // For edit modal
        const editNameInput = document.getElementById('edit-category-name');
        const editSlugInput = document.getElementById('edit-category-slug');
        const editSlugPreview = document.getElementById('edit-slug-preview');
        
        editNameInput.addEventListener('input', function() {
            if (!editSlugInput.dataset.userEdited) {
                const slug = generateSlug(this.value);
                editSlugInput.value = slug;
                editSlugPreview.textContent = slug;
            }
        });
        
        editSlugInput.addEventListener('input', function() {
            this.dataset.userEdited = 'true';
            editSlugPreview.textContent = this.value;
        });
    }

    // Generate slug from text
    function generateSlug(text) {
        return text
            .toLowerCase()
            .replace(/[^\w\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/--+/g, '-')
            .trim();
    }

    // Filter categories based on search
    function filterCategories() {
        const searchTerm = searchInput.value.toLowerCase();
        
        const filteredCategories = categories.filter(category => {
            return category.name.toLowerCase().includes(searchTerm) || 
                   category.description.toLowerCase().includes(searchTerm) ||
                   category.slug.toLowerCase().includes(searchTerm);
        });
        
        renderCategories(filteredCategories);
    }

    // Open add category modal
    function openAddCategoryModal() {
        addCategoryModal.style.display = 'flex';
        document.getElementById('category-name').focus();
        
        // Reset form
        document.getElementById('add-category-form').reset();
        document.getElementById('category-slug').dataset.userEdited = false;
        
        // Reset color
        document.querySelectorAll('.color-option').forEach(opt => opt.classList.remove('active'));
        document.querySelector('.color-option[data-color="#4e73df"]').classList.add('active');
        document.getElementById('color-preview').style.backgroundColor = '#4e73df';
        document.getElementById('category-color').value = '#4e73df';
        
        // Reset slug preview
        const slugPreview = document.getElementById('slug-preview');
        slugPreview.textContent = 'auto-generated-slug';
    }

    // Close add category modal
    function closeAddCategoryModal() {
        addCategoryModal.style.display = 'none';
    }

    // Open edit category modal
    function openEditCategoryModal(categoryId) {
        const category = categories.find(c => c.id === categoryId);
        if (category) {
            currentEditId = categoryId;
            
            document.getElementById('edit-category-name').value = category.name;
            document.getElementById('edit-category-slug').value = category.slug;
            document.getElementById('edit-category-slug').dataset.userEdited = true;
            document.getElementById('edit-category-description').value = category.description;
            document.getElementById('edit-category-color').value = category.color;
            document.getElementById('edit-featured-category').checked = category.featured;
            
            // Update color preview
            document.getElementById('edit-color-preview').style.backgroundColor = category.color;
            
            // Update color options
            document.querySelectorAll('#edit-color-options .color-option').forEach(opt => opt.classList.remove('active'));
            const matchingColor = document.querySelector(`#edit-color-options .color-option[data-color="${category.color}"]`);
            if (matchingColor) {
                matchingColor.classList.add('active');
            }
            
            // Update slug preview
            document.getElementById('edit-slug-preview').textContent = category.slug;
            
            editCategoryModal.style.display = 'flex';
        }
    }

    // Close edit category modal
    function closeEditCategoryModal() {
        editCategoryModal.style.display = 'none';
        currentEditId = null;
    }

    // Open delete confirmation modal
    function openDeleteConfirmModal(categoryId) {
        const category = categories.find(c => c.id === categoryId);
        if (category) {
            currentDeleteId = categoryId;
            
            document.getElementById('delete-message').textContent = `Are you sure you want to delete the category "${category.name}"? This action cannot be undone.`;
            
            if (category.posts > 0) {
                document.getElementById('posts-warning').textContent = `Warning: This category has ${category.posts} posts. Deleting it will remove these posts from this category.`;
            } else {
                document.getElementById('posts-warning').textContent = '';
            }
            
            deleteConfirmModal.style.display = 'flex';
        }
    }

    // Close delete confirmation modal
    function closeDeleteConfirmModal() {
        deleteConfirmModal.style.display = 'none';
        currentDeleteId = null;
    }

    // Save new category
    function saveNewCategory() {
        const name = document.getElementById('category-name').value;
        const slug = document.getElementById('category-slug').value || generateSlug(name);
        const description = document.getElementById('category-description').value;
        const color = document.getElementById('category-color').value;
        const featured = document.getElementById('featured-category').checked;
        
        if (!name) {
            alert('Please enter a category name');
            return;
        }
        
        // Check if slug already exists
        if (categories.some(cat => cat.slug === slug)) {
            alert('A category with this slug already exists. Please choose a different slug.');
            return;
        }
        
        // Create new category object
        const newCategory = {
            id: categories.length > 0 ? Math.max(...categories.map(c => c.id)) + 1 : 1,
            name: name,
            slug: slug,
            description: description,
            color: color,
            posts: 0,
            featured: featured
        };
        
        // Add to categories array
        categories.push(newCategory);
        
        // Update stats
        updateStats();
        
        // Re-render table
        filterCategories();
        
        // Close modal and show success message
        closeAddCategoryModal();
        alert('Category added successfully!');
    }

    // Update category
    function updateCategory() {
        const name = document.getElementById('edit-category-name').value;
        const slug = document.getElementById('edit-category-slug').value;
        const description = document.getElementById('edit-category-description').value;
        const color = document.getElementById('edit-category-color').value;
        const featured = document.getElementById('edit-featured-category').checked;
        
        if (!name || !slug) {
            alert('Please fill in all required fields');
            return;
        }
        
        // Check if slug already exists (excluding current category)
        if (categories.some(cat => cat.slug === slug && cat.id !== currentEditId)) {
            alert('A category with this slug already exists. Please choose a different slug.');
            return;
        }
        
        // Update category in array
        const index = categories.findIndex(c => c.id === currentEditId);
        if (index !== -1) {
            categories[index] = {
                ...categories[index],
                name: name,
                slug: slug,
                description: description,
                color: color,
                featured: featured
            };
        }
        
        // Update stats (in case most used category changed)
        updateStats();
        
        // Re-render table
        filterCategories();
        
        // Close modal and show success message
        closeEditCategoryModal();
        alert('Category updated successfully!');
    }

    // Delete category
    function deleteCategory() {
        const index = categories.findIndex(c => c.id === currentDeleteId);
        
        if (index !== -1) {
            // Remove from array
            categories.splice(index, 1);
            
            // Update stats
            updateStats();
            
            // Re-render table
            filterCategories();
            
            // Close modal and show success message
            closeDeleteConfirmModal();
            alert('Category deleted successfully!');
        }
    }

    // Apply bulk actions
    function applyBulkActions() {
        const selectedCategories = Array.from(document.querySelectorAll('.category-select:checked'))
            .map(checkbox => parseInt(checkbox.getAttribute('data-id')));
        
        if (selectedCategories.length === 0) {
            alert('Please select at least one category');
            return;
        }
        
        const action = bulkActionSelect.value;
        
        switch (action) {
            case 'Delete Selected':
                if (confirm(`Are you sure you want to delete ${selectedCategories.length} category(ies)?`)) {
                    // Remove selected categories
                    selectedCategories.forEach(id => {
                        const index = categories.findIndex(c => c.id === id);
                        if (index !== -1) {
                            categories.splice(index, 1);
                        }
                    });
                    
                    updateStats();
                    filterCategories();
                    alert(`${selectedCategories.length} category(ies) deleted successfully!`);
                }
                break;
                
            case 'Merge Categories':
                alert('Merge categories functionality would be implemented here. This would combine selected categories into one.');
                break;
                
            default:
                alert('Please select a bulk action');
        }
        
        // Reset checkboxes
        document.querySelectorAll('.category-select').forEach(checkbox => {
            checkbox.checked = false;
        });
        selectAllHeader.checked = false;
        selectAll.checked = false;
    }

    // Update select all state
    function updateSelectAllState() {
        const checkboxes = document.querySelectorAll('.category-select');
        const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
        const anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
        
        selectAllHeader.checked = allChecked;
        selectAll.checked = allChecked;
    }
</script>

@endsection