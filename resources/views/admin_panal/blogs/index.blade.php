@extends('admin_panal.mainbar')

@section('title', 'blogs')

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
</style>


<!-- Page Content -->
<div class="page-content">
    <!-- Page Actions -->
    <div class="page-actions">
        <div class="filter-options">
            <button class="filter-btn active" data-filter="all">All (24)</button>
            <button class="filter-btn" data-filter="published">Published (18)</button>
            <button class="filter-btn" data-filter="draft">Drafts (4)</button>
            <button class="filter-btn" data-filter="scheduled">Scheduled (2)</button>
        </div>
        <button class="btn btn-primary" id="add-blog-btn">
            <i class="fas fa-plus"></i> Add New Blog
        </button>
    </div>

    <!-- Blogs Table -->
    <div class="blogs-table-container">
        <div class="table-header">
            <h3>All Blog Posts</h3>
            <div class="table-actions">
                <div class="bulk-actions">
                    <div class="select-all">
                        <input type="checkbox" id="select-all">
                        <label for="select-all">Select All</label>
                    </div>
                    <select class="form-control" style="width: auto; padding: 8px 15px;">
                        <option>Bulk Actions</option>
                        <option>Publish</option>
                        <option>Move to Draft</option>
                        <option>Delete</option>
                    </select>
                    <button class="btn btn-primary" style="padding: 8px 15px;">Apply</button>
                </div>
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
                    <!-- Blog rows will be populated here -->
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <ul class="pagination-list">
                <li class="page-item"><i class="fas fa-chevron-left"></i></li>
                <li class="page-item active">1</li>
                <li class="page-item">2</li>
                <li class="page-item">3</li>
                <li class="page-item">4</li>
                <li class="page-item"><i class="fas fa-chevron-right"></i></li>
            </ul>
        </div>
    </div>
</div>

<!-- Add Blog Modal -->
<div class="modal" id="add-blog-modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3><i class="fas fa-plus"></i> Add New Blog Post</h3>
            <button class="close-modal" id="close-add-modal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="add-blog-form">
                <div class="form-group">
                    <label for="blog-title">Blog Title</label>
                    <input type="text" id="blog-title" class="form-control" placeholder="Enter blog title" required>
                </div>
                <div class="form-group">
                    <label for="blog-category">Category</label>
                    <select id="blog-category" class="form-control" required>
                        <option value="">Select Category</option>
                        <option value="Technology">Technology</option>
                        <option value="Lifestyle">Lifestyle</option>
                        <option value="Business">Business</option>
                        <option value="Travel">Travel</option>
                        <option value="Food">Food</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="blog-status">Status</label>
                    <select id="blog-status" class="form-control" required>
                        <option value="draft">Draft</option>
                        <option value="published">Published</option>
                        <option value="scheduled">Scheduled</option>
                    </select>
                </div>
                <div class="form-group" id="schedule-date-group" style="display: none;">
                    <label for="publish-date">Schedule Date & Time</label>
                    <input type="datetime-local" id="publish-date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="blog-content">Short Description</label>
                    <textarea id="blog-content" class="form-control" rows="4" placeholder="Enter a short description or excerpt" required></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn" id="cancel-add-btn">Cancel</button>
            <button class="btn btn-primary" id="save-blog-btn">Save Blog</button>
        </div>
    </div>
</div>

<!-- Edit Blog Modal -->
<div class="modal" id="edit-blog-modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3><i class="fas fa-edit"></i> Edit Blog Post</h3>
            <button class="close-modal" id="close-edit-modal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="edit-blog-form">
                <div class="form-group">
                    <label for="edit-blog-title">Blog Title</label>
                    <input type="text" id="edit-blog-title" class="form-control" value="The Future of Web Development" required>
                </div>
                <div class="form-group">
                    <label for="edit-blog-category">Category</label>
                    <select id="edit-blog-category" class="form-control" required>
                        <option value="Technology" selected>Technology</option>
                        <option value="Lifestyle">Lifestyle</option>
                        <option value="Business">Business</option>
                        <option value="Travel">Travel</option>
                        <option value="Food">Food</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit-blog-status">Status</label>
                    <select id="edit-blog-status" class="form-control" required>
                        <option value="draft">Draft</option>
                        <option value="published" selected>Published</option>
                        <option value="scheduled">Scheduled</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit-blog-content">Content</label>
                    <textarea id="edit-blog-content" class="form-control" rows="6" required>Web development is evolving rapidly with new frameworks and technologies emerging every day. In this post, we explore what the future holds for web developers.</textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn" id="cancel-edit-btn">Cancel</button>
            <button class="btn btn-primary" id="update-blog-btn">Update Blog</button>
        </div>
    </div>
</div>

<script>
    // Sample blog data
    const blogs = [
        {
            id: 1,
            title: "The Future of Web Development",
            author: "John Doe",
            category: "Technology",
            date: "Oct 15, 2023",
            status: "published",
            views: 2847,
            comments: 42
        },
        {
            id: 2,
            title: "10 Tips for Better Blogging",
            author: "Jane Smith",
            category: "Lifestyle",
            date: "Oct 14, 2023",
            status: "published",
            views: 2145,
            comments: 38
        },
        {
            id: 3,
            title: "Understanding JavaScript Closures",
            author: "Mike Johnson",
            category: "Technology",
            date: "Oct 13, 2023",
            status: "draft",
            views: 0,
            comments: 0
        },
        {
            id: 4,
            title: "SEO Best Practices for 2023",
            author: "Sarah Williams",
            category: "Business",
            date: "Oct 12, 2023",
            status: "published",
            views: 1893,
            comments: 29
        },
        {
            id: 5,
            title: "Interview with a Senior Developer",
            author: "Robert Brown",
            category: "Technology",
            date: "Oct 10, 2023",
            status: "draft",
            views: 0,
            comments: 0
        },
        {
            id: 6,
            title: "Travel Diaries: Exploring Japan",
            author: "Emily Davis",
            category: "Travel",
            date: "Oct 8, 2023",
            status: "published",
            views: 1520,
            comments: 18
        },
        {
            id: 7,
            title: "Healthy Breakfast Recipes",
            author: "Lisa Miller",
            category: "Food",
            date: "Oct 5, 2023",
            status: "published",
            views: 1280,
            comments: 24
        },
        {
            id: 8,
            title: "Starting Your Own Business",
            author: "David Wilson",
            category: "Business",
            date: "Oct 20, 2023",
            status: "scheduled",
            views: 0,
            comments: 0
        }
    ];

    // DOM Elements
    const blogsTableBody = document.getElementById('blogs-table-body');
    const addBlogBtn = document.getElementById('add-blog-btn');
    const addBlogModal = document.getElementById('add-blog-modal');
    const editBlogModal = document.getElementById('edit-blog-modal');
    const closeAddModal = document.getElementById('close-add-modal');
    const closeEditModal = document.getElementById('close-edit-modal');
    const cancelAddBtn = document.getElementById('cancel-add-btn');
    const cancelEditBtn = document.getElementById('cancel-edit-btn');
    const saveBlogBtn = document.getElementById('save-blog-btn');
    const updateBlogBtn = document.getElementById('update-blog-btn');
    const searchInput = document.getElementById('search-blogs');
    const filterButtons = document.querySelectorAll('.filter-btn');
    const statusSelect = document.getElementById('blog-status');
    const scheduleDateGroup = document.getElementById('schedule-date-group');
    const selectAllHeader = document.getElementById('select-all-header');
    const selectAll = document.getElementById('select-all');

    // Initialize page
    document.addEventListener('DOMContentLoaded', function() {
        renderBlogs(blogs);
        setupEventListeners();
    });

    // Render blogs to the table
    function renderBlogs(blogsToRender) {
        blogsTableBody.innerHTML = '';
        
        if (blogsToRender.length === 0) {
            blogsTableBody.innerHTML = `
                <tr>
                    <td colspan="7">
                        <div class="empty-state">
                            <i class="fas fa-newspaper"></i>
                            <h3>No Blogs Found</h3>
                            <p>No blog posts match your current filters. Try adjusting your search or filters.</p>
                            <button class="btn btn-primary" id="add-blog-empty">
                                <i class="fas fa-plus"></i> Add Your First Blog
                            </button>
                        </div>
                    </td>
                </tr>
            `;
            document.getElementById('add-blog-empty').addEventListener('click', () => {
                openAddBlogModal();
            });
            return;
        }
        
        blogsToRender.forEach(blog => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>
                    <div class="blog-item">
                        <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" alt="Blog thumbnail" class="blog-thumbnail">
                        <div class="blog-info">
                            <h4>${blog.title}</h4>
                            <div class="blog-meta">
                                <span><i class="far fa-eye"></i> ${blog.views}</span>
                                <span><i class="far fa-comment"></i> ${blog.comments}</span>
                            </div>
                        </div>
                    </div>
                </td>
                <td>${blog.author}</td>
                <td><span class="blog-category">${blog.category}</span></td>
                <td>${blog.date}</td>
                <td><span class="status-badge status-${blog.status}">${blog.status.charAt(0).toUpperCase() + blog.status.slice(1)}</span></td>
                <td>
                    <div class="blog-actions">
                        <button class="action-btn edit-btn" data-id="${blog.id}"><i class="fas fa-edit"></i></button>
                        <button class="action-btn view-btn" data-id="${blog.id}"><i class="fas fa-eye"></i></button>
                        <button class="action-btn delete-btn" data-id="${blog.id}"><i class="fas fa-trash"></i></button>
                    </div>
                </td>
            `;
            blogsTableBody.appendChild(row);
        });
        
        // Add event listeners to action buttons
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const blogId = parseInt(this.getAttribute('data-id'));
                openEditBlogModal(blogId);
            });
        });
        
        document.querySelectorAll('.view-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const blogId = parseInt(this.getAttribute('data-id'));
                alert(`Viewing blog with ID: ${blogId}`);
            });
        });
        
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const blogId = parseInt(this.getAttribute('data-id'));
                if (confirm('Are you sure you want to delete this blog post?')) {
                    deleteBlog(blogId);
                }
            });
        });
        
        // Add event listeners to checkboxes
        document.querySelectorAll('.blog-select').forEach(checkbox => {
            checkbox.addEventListener('change', updateSelectAllState);
        });
    }

    // Set up event listeners
    function setupEventListeners() {
        // Add blog button
        addBlogBtn.addEventListener('click', openAddBlogModal);
        
        // Close modal buttons
        closeAddModal.addEventListener('click', closeAddBlogModal);
        closeEditModal.addEventListener('click', closeEditBlogModal);
        cancelAddBtn.addEventListener('click', closeAddBlogModal);
        cancelEditBtn.addEventListener('click', closeEditBlogModal);
        
        // Save/Update blog buttons
        saveBlogBtn.addEventListener('click', saveNewBlog);
        updateBlogBtn.addEventListener('click', updateBlog);
        
        // Search functionality
        searchInput.addEventListener('input', filterBlogs);
        
        // Filter buttons
        filterButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                filterButtons.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                filterBlogs();
            });
        });
        
        // Status select change
        statusSelect.addEventListener('change', function() {
            if (this.value === 'scheduled') {
                scheduleDateGroup.style.display = 'block';
            } else {
                scheduleDateGroup.style.display = 'none';
            }
        });
        
        // Select all functionality
        selectAllHeader.addEventListener('change', function() {
            const isChecked = this.checked;
            document.querySelectorAll('.blog-select').forEach(checkbox => {
                checkbox.checked = isChecked;
            });
            selectAll.checked = isChecked;
        });
        
        selectAll.addEventListener('change', function() {
            const isChecked = this.checked;
            document.querySelectorAll('.blog-select').forEach(checkbox => {
                checkbox.checked = isChecked;
            });
            selectAllHeader.checked = isChecked;
        });
        
        // Close modal when clicking outside
        window.addEventListener('click', function(event) {
            if (event.target === addBlogModal) {
                closeAddBlogModal();
            }
            if (event.target === editBlogModal) {
                closeEditBlogModal();
            }
        });
    }

    // Filter blogs based on search and filter criteria
    function filterBlogs() {
        const searchTerm = searchInput.value.toLowerCase();
        const activeFilter = document.querySelector('.filter-btn.active').getAttribute('data-filter');
        
        const filteredBlogs = blogs.filter(blog => {
            const matchesSearch = blog.title.toLowerCase().includes(searchTerm) || 
                                 blog.author.toLowerCase().includes(searchTerm) ||
                                 blog.category.toLowerCase().includes(searchTerm);
            
            const matchesFilter = activeFilter === 'all' || blog.status === activeFilter;
            
            return matchesSearch && matchesFilter;
        });
        
        renderBlogs(filteredBlogs);
    }

    // Open add blog modal
    function openAddBlogModal() {
        addBlogModal.style.display = 'flex';
        document.getElementById('blog-title').focus();
    }

    // Close add blog modal
    function closeAddBlogModal() {
        addBlogModal.style.display = 'none';
        document.getElementById('add-blog-form').reset();
        scheduleDateGroup.style.display = 'none';
    }

    // Open edit blog modal
    function openEditBlogModal(blogId) {
        const blog = blogs.find(b => b.id === blogId);
        if (blog) {
            document.getElementById('edit-blog-title').value = blog.title;
            document.getElementById('edit-blog-category').value = blog.category;
            document.getElementById('edit-blog-status').value = blog.status;
            editBlogModal.style.display = 'flex';
        }
    }

    // Close edit blog modal
    function closeEditBlogModal() {
        editBlogModal.style.display = 'none';
    }

    // Save new blog
    function saveNewBlog() {
        const title = document.getElementById('blog-title').value;
        const category = document.getElementById('blog-category').value;
        const status = document.getElementById('blog-status').value;
        const content = document.getElementById('blog-content').value;
        
        if (!title || !category || !content) {
            alert('Please fill in all required fields');
            return;
        }
        
        // Create new blog object
        const newBlog = {
            id: blogs.length + 1,
            title: title,
            author: "Admin User",
            category: category,
            date: new Date().toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' }),
            status: status,
            views: 0,
            comments: 0
        };
        
        // Add to blogs array
        blogs.unshift(newBlog);
        
        // Re-render table
        filterBlogs();
        
        // Close modal and show success message
        closeAddBlogModal();
        alert('Blog post saved successfully!');
    }

    // Update blog
    function updateBlog() {
        const title = document.getElementById('edit-blog-title').value;
        const category = document.getElementById('edit-blog-category').value;
        const status = document.getElementById('edit-blog-status').value;
        const content = document.getElementById('edit-blog-content').value;
        
        if (!title || !category || !content) {
            alert('Please fill in all required fields');
            return;
        }
        
        // In a real app, you would update the blog in your database
        // For this demo, we'll just show an alert
        closeEditBlogModal();
        alert('Blog post updated successfully!');
    }

    // Delete blog
    function deleteBlog(blogId) {
        // Find index of blog to delete
        const index = blogs.findIndex(blog => blog.id === blogId);
        
        if (index !== -1) {
            // Remove from array
            blogs.splice(index, 1);
            
            // Re-render table
            filterBlogs();
            
            // Show success message
            alert('Blog post deleted successfully!');
        }
    }

    // Update select all state
    function updateSelectAllState() {
        const checkboxes = document.querySelectorAll('.blog-select');
        const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
        const anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
        
        selectAllHeader.checked = allChecked;
        selectAll.checked = allChecked;
        
        // Update bulk actions UI if needed
        if (anyChecked) {
            // Enable bulk actions
        }
    }
</script>

@endsection