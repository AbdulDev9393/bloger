@extends('admin_panal.mainbar')

@section('title', 'Dashboard')

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
            --success-color: #1cc88a;
            --info-color: #36b9cc;
            --warning-color: #f6c23e;
            --danger-color: #e74a3b;
            --dark-color: #2c3e50;
            --light-color: #f8f9fc;
            --gray-color: #858796;
            --shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        body {
            background-color: #f5f7fa;
            color: #333;
        }

        .admin-dashboard {
            padding: 25px;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Dashboard Header */
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e3e6f0;
        }

        .dashboard-header h1 {
            color: var(--dark-color);
            font-size: 28px;
            font-weight: 700;
        }

        .dashboard-header h1 i {
            color: var(--primary-color);
            margin-right: 10px;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .date-display {
            display: flex;
            align-items: center;
            gap: 8px;
            background: white;
            padding: 10px 15px;
            border-radius: 8px;
            box-shadow: var(--shadow);
            color: var(--gray-color);
        }

        .date-display i {
            color: var(--primary-color);
        }

        .btn {
            padding: 10px 20px;
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
            background-color: #3a5ccc;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(78, 115, 223, 0.3);
        }

        /* Stats Cards */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 15px;
            box-shadow: var(--shadow);
            border-left: 4px solid var(--primary-color);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
                width: 250px;
               height: 210px;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(58, 59, 69, 0.2);
        }

        .stat-card:nth-child(2) {
            border-left-color: var(--success-color);
        }

        .stat-card:nth-child(3) {
            border-left-color: var(--info-color);
        }

        .stat-card:nth-child(4) {
            border-left-color: var(--warning-color);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 22px;
            margin-bottom: 20px;
        }

        .stat-info h3 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 5px;
            color: var(--dark-color);
        }

        .stat-info p {
            color: var(--gray-color);
            font-size: 15px;
            margin-bottom: 20px;
        }

        .stat-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: gap 0.3s ease;
        }

        .stat-link:hover {
            gap: 10px;
        }

        /* Recent Posts and Activity Section */
        .dashboard-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 40px;
        }

        @media (max-width: 1024px) {
            .dashboard-content {
                grid-template-columns: 1fr;
            }
        }

        .dashboard-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: var(--shadow);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e3e6f0;
        }

        .card-header h3 {
            color: var(--dark-color);
            font-size: 20px;
            font-weight: 700;
        }

        .card-header a {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        /* Recent Posts Table */
        .posts-table {
            width: 100%;
            border-collapse: collapse;
        }

        .posts-table th {
            text-align: left;
            padding: 12px 0;
            color: var(--gray-color);
            font-weight: 600;
            border-bottom: 1px solid #e3e6f0;
            font-size: 14px;
        }

        .posts-table td {
            padding: 15px 0;
            border-bottom: 1px solid #f8f9fc;
        }

        .posts-table tr:last-child td {
            border-bottom: none;
        }

        .post-title {
            font-weight: 600;
            color: var(--dark-color);
        }

        .post-status {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-published {
            background-color: rgba(28, 200, 138, 0.2);
            color: var(--success-color);
        }

        .status-draft {
            background-color: rgba(246, 194, 62, 0.2);
            color: var(--warning-color);
        }

        .post-actions {
            display: flex;
            gap: 10px;
        }

        .action-btn {
            width: 32px;
            height: 32px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fc;
            color: var(--gray-color);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .action-btn:hover {
            background: var(--primary-color);
            color: white;
        }

        /* Activity Feed */
        .activity-feed {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .activity-item {
            display: flex;
            gap: 15px;
            padding-bottom: 20px;
            border-bottom: 1px solid #f8f9fc;
        }

        .activity-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .activity-icon {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            flex-shrink: 0;
        }

        .icon-blue {
            background-color: var(--primary-color);
        }

        .icon-green {
            background-color: var(--success-color);
        }

        .icon-orange {
            background-color: var(--warning-color);
        }

        .icon-red {
            background-color: var(--danger-color);
        }

        .activity-details h4 {
            color: var(--dark-color);
            font-size: 16px;
            margin-bottom: 5px;
        }

        .activity-details p {
            color: var(--gray-color);
            font-size: 14px;
            margin-bottom: 5px;
        }

        .activity-time {
            font-size: 12px;
            color: #b0b3c1;
        }

        /* Popular Posts */
        .popular-posts-container {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: var(--shadow);
            margin-bottom: 40px;
        }

        .popular-post {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px 0;
            border-bottom: 1px solid #f8f9fc;
        }

        .popular-post:last-child {
            border-bottom: none;
        }

        .post-thumbnail {
            width: 80px;
            height: 60px;
            border-radius: 8px;
            object-fit: cover;
            flex-shrink: 0;
        }

        .post-meta {
            flex-grow: 1;
        }

        .post-meta h4 {
            color: var(--dark-color);
            margin-bottom: 8px;
            font-size: 16px;
        }

        .post-stats {
            display: flex;
            gap: 15px;
            color: var(--gray-color);
            font-size: 13px;
        }

        .post-stat {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .views-count {
            font-weight: 700;
            color: var(--dark-color);
        }

        /* Quick Actions */
        .quick-actions-container {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: var(--shadow);
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .action-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 25px 15px;
            border-radius: 10px;
            background: #f8f9fc;
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }

        .action-card:hover {
            background: var(--primary-color);
            transform: translateY(-5px);
            color: white;
        }

        .action-card:hover .action-icon {
            background: white;
            color: var(--primary-color);
        }

        .action-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--primary-color);
            color: white;
            font-size: 24px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        .action-card h4 {
            font-size: 16px;
            margin-bottom: 8px;
            text-align: center;
        }

        .action-card p {
            font-size: 13px;
            text-align: center;
            opacity: 0.8;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .admin-dashboard {
                padding: 15px;
            }
            
            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .header-actions {
                width: 100%;
                justify-content: space-between;
            }
            
            .stats-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }
            
            .actions-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .stats-container {
                grid-template-columns: 1fr;
            }
            
            .actions-grid {
                grid-template-columns: 1fr;
            }
            
            .posts-table {
                display: block;
                overflow-x: auto;
            }
        }
    </style>

    <div class="admin-dashboard">
        <!-- Dashboard Header -->
        <div class="dashboard-header">
            <h1><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
            <div class="header-actions">
                <div class="date-display">
                    <i class="far fa-calendar"></i>
                    <span id="current-date">October 16, 2023</span>
                </div>
          
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-icon" style="background-color: #4e73df;">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="stat-info">
                    <h3 id="total-posts">47</h3>
                    <p>Total Posts</p>
                </div>
                <a href="#" class="stat-link">View All <i class="fas fa-arrow-right"></i></a>
            </div>
            
         
            
            <div class="stat-card">
                <div class="stat-icon" style="background-color: #36b9cc;">
                    <i class="fas fa-comments"></i>
                </div>
                <div class="stat-info">
                    <h3 id="total-comments">324</h3>
                    <p>Total Comments</p>
                </div>
                <a href="#" class="stat-link">Manage <i class="fas fa-arrow-right"></i></a>
            </div>
            
           
        </div>

        <!-- Recent Posts and Activity Section -->
        <div class="dashboard-content">
            <!-- Recent Posts -->
            <div class="dashboard-card">
                <div class="card-header">
                    <h3><i class="fas fa-newspaper"></i> Recent Posts</h3>
                    <a href="#">View All <i class="fas fa-arrow-right"></i></a>
                </div>
                <table class="posts-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Status</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="post-title">The Future of Web Development</td>
                            <td><span class="post-status status-published">Published</span></td>
                          
                        </tr>
                        
                        
                       
                       
                    </tbody>
                </table>
            </div>

            <!-- Recent Activity -->
            <div class="dashboard-card">
                <div class="card-header">
                    <h3><i class="fas fa-history"></i> Recent Activity</h3>
                    <a href="#">View All <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="activity-feed">
                    <div class="activity-item">
                        <div class="activity-icon icon-blue">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div class="activity-details">
                            <h4>New Post Published</h4>
                            <p>"The Future of Web Development" was published</p>
                            <div class="activity-time">2 hours ago</div>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon icon-green">
                            <i class="fas fa-comment"></i>
                        </div>
                        <div class="activity-details">
                            <h4>New Comment</h4>
                            <p>John Doe commented on "10 Tips for Better Blogging"</p>
                            <div class="activity-time">5 hours ago</div>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon icon-orange">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="activity-details">
                            <h4>New User Registered</h4>
                            <p>Jane Smith registered on the website</p>
                            <div class="activity-time">Yesterday, 4:30 PM</div>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon icon-red">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="activity-details">
                            <h4>Post Liked</h4>
                            <p>"SEO Best Practices for 2023" received 15 likes</p>
                            <div class="activity-time">2 days ago</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popular Posts -->
       

        <!-- Quick Actions -->
        <div class="quick-actions-container">
            <div class="card-header">
                <h3><i class="fas fa-bolt"></i> Quick Actions</h3>
            </div>
            <div class="actions-grid">
                <a href="#" class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-pen"></i>
                    </div>
                    <h4>Write New Post</h4>
                    <p>Create and publish a new blog post</p>
                </a>
                <a href="#" class="action-card">
                    <div class="action-icon" style="background-color: #1cc88a;">
                        <i class="fas fa-images"></i>
                    </div>
                    <h4>Manage Media</h4>
                    <p>Upload and organize images</p>
                </a>
           
           <a href="https://search.google.com/search-console" target="_blank" class="action-card">
    <div class="action-icon" style="background-color: #f6c23e;">
        <i class="fas fa-chart-bar"></i>
    </div>
    <h4>View Analytics</h4>
    <p>Check website performance</p>
</a>
                <a href="#" class="action-card">
                    <div class="action-icon" style="background-color: #e74a3b;">
                        <i class="fas fa-cog"></i>
                    </div>
                    <h4>Site Settings</h4>
                    <p>Configure blog settings</p>
                </a>
               
            </div>
        </div>
    </div>


<script>
    // Get the current date
    const dateElement = document.getElementById('current-date');
    const today = new Date();

    // Format options (e.g., October 16, 2023)
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    dateElement.textContent = today.toLocaleDateString('en-US', options);
</script>
@endsection
