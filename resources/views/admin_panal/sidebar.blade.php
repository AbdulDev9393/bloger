 <style>
    /* Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      display: flex;
      min-height: 100vh;
      background: #f8f9fa;
    }

    /* Sidebar */
    .admin-sidebar {
      width: 250px;
      background: #fff8f0;
      padding: 20px;
      height: 100vh;
      box-shadow: 2px 0 8px rgba(0,0,0,0.1);
      position: fixed;
      top: 0;
      left: 0;
      overflow-y: auto;
      transition: all 0.3s;
    }

    .sidebar-header {
      text-align: center;
      margin-bottom: 30px;
    }

    .sidebar-header .logo {
      width: 80px;
      border-radius: 10px;
      margin-bottom: 10px;
    }

    .sidebar-header h2 {
      font-size: 20px;
      color: #ff7700;
    }

    .sidebar-menu {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .sidebar-menu li {
      margin-bottom: 15px;
    }

    .sidebar-menu li a {
      display: flex;
      align-items: center;
      gap: 10px;
      color: #333;
      text-decoration: none;
      font-weight: 500;
      padding: 10px 15px;
      border-radius: 8px;
      transition: all 0.3s;
    }

    .sidebar-menu li a i {
      width: 20px;
      text-align: center;
    }

    .sidebar-menu li a:hover {
      background: #ff7700;
      color: #fff;
      transform: translateX(3px);
    }

    /* Main Content */
    .main-content {
      margin-left: 250px;
      padding: 30px;
      flex: 1;
      transition: all 0.3s;
    }

    .main-content h1 {
      color: #333;
      margin-bottom: 20px;
    }

    .card {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 6px 18px rgba(0,0,0,0.06);
      margin-bottom: 20px;
    }

    /* Responsive */
    @media (max-width: 768px) {
      body {
        flex-direction: column;
      }

      .admin-sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }

      .main-content {
        margin-left: 0;
      }
    }
  </style>


  <!-- Sidebar -->
  <aside class="admin-sidebar">
    <div class="sidebar-header">
      <img src="{{ asset('storage/sitelogo.png') }}" alt="Admin Logo" class="logo">
      <h2>Blog Admin</h2>
    </div>

    <ul class="sidebar-menu">
      <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
      <li><a href="{{route('admin.blogs')}}"><i class="fas fa-newspaper"></i> Manage Blogs</a></li>
      <li><a href="{{route('admin.Categories')}}"><i class="fas fa-tags"></i> Categories</a></li>
      <li><a href="{{route('admin.Comments')}}"><i class="fas fa-comments"></i> Comments</a></li>
      <li><a href="{{route('admin.emails')}}"><i class="fas fa-users"></i> Users Subcribe</a></li>
      <li><a href="{{route('admin.sitting')}}"><i class="fas fa-cog"></i> Settings</a></li>
      <li><a href=""><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
  </aside>

