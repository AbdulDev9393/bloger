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
        color: var(--dark-color);
    }

    .admin-dashboard {
        padding: 25px;
        max-width: 1400px;
        margin: 0 auto;
    }

    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 1px solid #e3e6f0;
    }

    .dashboard-header h1 {
        font-size: 28px;
        font-weight: 700;
        color: var(--dark-color);
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

    .stats-container {
        display: flex;
        flex-wrap: wrap;
        gap: 25px;
        margin-bottom: 40px;
    }

    .stat-card {
        flex: 1 1 250px;
        background: white;
        border-radius: 12px;
        padding: 15px;
        box-shadow: var(--shadow);
        border-left: 4px solid var(--primary-color);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        transition: transform 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
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
    }

    .stat-info p {
        font-size: 15px;
        color: var(--gray-color);
        margin-bottom: 0;
    }

    .dashboard-content {
       
        width: 90% !important;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        margin-bottom: 40px;
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
        border-bottom: 1px solid #e3e6f0;
        padding-bottom: 10px;
    }

    .card-header h3 {
        font-size: 20px;
        font-weight: 700;
    }

    .card-header a {
        color: var(--primary-color);
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
    }

    .posts-table {
        width: 100%;
        border-collapse: collapse;
    }

    .posts-table th {
        text-align: left;
        padding: 12px 0;
        color: var(--gray-color);
        font-weight: 600;
        font-size: 14px;
        border-bottom: 1px solid #e3e6f0;
    }

    .posts-table td {
        padding: 12px 0;
        border-bottom: 1px solid #f8f9fc;
    }

    .post-title {
        font-weight: 600;
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

    .quick-actions-container {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: var(--shadow);
    }

    .actions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
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
        color: white;
        transform: translateY(-5px);
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

    .action-card:hover .action-icon {
        background: white;
        color: var(--primary-color);
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
                <h3>{{$Blog}}</h3>
                <p>Total Posts</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background-color: #36b9cc;">
                <i class="fas fa-comments"></i>
            </div>
            <div class="stat-info">
                <h3>{{$Comment}}</h3>
                <p>Total Comments</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background-color: #1cc88a;">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-info">
                <h3>{{$Subscribr}}</h3>
                <p>Total Subscribers</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background-color: #f6c23e;">
                <i class="fas fa-list"></i>
            </div>
            <div class="stat-info">
                <h3>{{$Category}}</h3>
                <p>Total Categories</p>
            </div>
        </div>
    </div>

    <!-- Recent Posts -->
    <div class="dashboard-content">
        <div class="dashboard-card">
            <div class="card-header">
                <h3><i class="fas fa-newspaper"></i> Recent Posts</h3>
                <a href="{{route('admin.blogs')}}">View All <i class="fas fa-arrow-right"></i></a>
            </div>
            <table class="posts-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Create Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($RecentBlogs as $Blgs)
                      <tr>
                        <td class="post-title">
                            <a href="https://www.techblogs.site/blog/view/{{$Blgs->id}}/{{$Blgs->name}}" target="_blank" rel="noopener noreferrer">
                                {{$Blgs->name}}
                            </a>
                
                        
                        </td>
                            
                        <td><span class="post-status status-published">{{$Blgs->Status}}</span></td>
                     <td>{{ $Blgs->created_at->toDateString() }}</td>
                    </tr>  
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="quick-actions-container">
        <div class="card-header">
            <h3><i class="fas fa-bolt"></i> Quick Actions</h3>
        </div>
        <div class="actions-grid">
            <a href="{{route('admin.blogs')}}" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-pen"></i>
                </div>
                <h4>Write New Post</h4>
                <p>Create and publish a new blog post</p>
            </a>

            <a href="{{route('admin.emails')}}" class="action-card">
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

            <a href="{{route('admin.sitting')}}" class="action-card">
                <div class="action-icon" style="background-color: #e74a3b;">
                    <i class="fas fa-cog"></i>
                </div>
                <h4>Site Settings</h4>
                <p>Configure blog settings</p>
            </a>
        </div>
    </div>
</div>
@endsection
