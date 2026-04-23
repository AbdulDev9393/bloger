<style>
  * { margin:0; padding:0; box-sizing:border-box; font-family:Arial,sans-serif;}
  body { display:flex; min-height:100vh; background:#f8f9fa; transition: all 0.3s;}

  /* Sidebar */
  .admin-sidebar {
    width: 260px;
    background: #fff8f0;
    padding: 20px;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    overflow-y: auto;
    box-shadow: 2px 0 8px rgba(0,0,0,0.1);
    transition: all 0.3s;
    z-index: 1000;
  }
  .sidebar-header { text-align:center; margin-bottom:30px;}
  .sidebar-header .logo { width:80px; border-radius:10px; margin-bottom:10px;}
  .sidebar-header h2 { font-size:20px; color:#ff7700;}
  .sidebar-menu { list-style:none; padding:0; margin:0;}
  .sidebar-menu li { margin-bottom:15px;}
  .sidebar-menu li a { display:flex; align-items:center; gap:10px; color:#333; text-decoration:none; padding:10px 15px; border-radius:8px; transition:all 0.3s; font-weight:500;}
  .sidebar-menu li a i { width:20px; text-align:center;}
  .sidebar-menu li a:hover { background:#ff7700; color:#fff; transform:translateX(3px);}
  .sidebar-menu li a.active { background: #ff7700; color: #fff; box-shadow: 0 4px 10px rgba(255,119,0,0.3);
}

  /* Main Content */
  .main-content { margin-left:250px; padding:30px; flex:1; transition: all 0.3s;}

  /* Toggle button */
  #sidebarToggle {
    display:none;
    position:fixed; top:15px; left:15px;
    z-index:1100;
    padding:10px 15px; background:#ff7700; border:none; color:#fff; border-radius:5px; cursor:pointer;
  }

  /* Responsive */
  @media (max-width:768px){
    .admin-sidebar { left:-250px; width:250px; }
    .main-content { margin-left:0; }
    #sidebarToggle { display:block; }
    body.sidebar-open .admin-sidebar { left:0; }
    body.sidebar-open .main-content { margin-left:250px; }
  }
</style>

<button id="sidebarToggle"><i class="fas fa-bars"></i></button>

<aside class="admin-sidebar">
  <div class="sidebar-header">
    <img src="https://techblogs.site//favicon.ico" alt="Admin Logo" class="logo">
    <h2>Blog Admin</h2>
  </div>
  <ul class="sidebar-menu">
    <li><a href="{{ route('admin.dashboard') }}" class="{{request()->routeIs('admin.dashboard') ? 'active' : ''}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
    <li><a href="{{route('admin.blogs')}}" class="{{request()->routeIs('admin.blogs') ? 'active' : ''}}"><i class="fas fa-newspaper"></i> Manage Blogs</a></li>
    <li><a href="{{route('admin.blogs')}}" class="{{request()->routeIs('admin.blogs') ? 'active' : ''}}"><i class="fas fa-box"></i> Manage Product</a></li>
    <li><a href="{{route('admin.developers.index')}}" class="{{request()->routeIs('admin.developers.index') ? 'active' : ''}}"><i class="fas fa-users"></i> Manage Developers</a></li>
    <li><a href="{{route('admin.Categories')}}"  class="{{request()->routeIs('admin.Categories') ? 'active' : ''}}"><i class="fas fa-tags"></i> Categories</a></li>
    <li><a href="{{route('admin.Comments')}}"  class="{{request()->routeIs('admin.Comments') ? 'active' : ''}}"><i class="fas fa-comments"></i> Comments</a></li>
    <li><a href="{{route('admin.emails')}}"  class="{{request()->routeIs('admin.emails') ? 'active' : ''}}"><i class="fas fa-users"></i> Users Subcribe</a></li>
    <li><a href="{{route('admin.sitting')}}"  class="{{request()->routeIs('admin.sitting') ? 'active' : ''}}"><i class="fas fa-cog"></i> Settings</a></li>
    <li>
      <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
      <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i> Logout
      </a>
    </li>
  </ul>
</aside>


<script>
  const toggleBtn = document.getElementById('sidebarToggle');
  toggleBtn.addEventListener('click', () => {
    document.body.classList.toggle('sidebar-open');
  });

  // Optional: close sidebar when clicking outside
  document.addEventListener('click', function(e){
    if(window.innerWidth <= 768){
      const sidebar = document.querySelector('.admin-sidebar');
      if(!sidebar.contains(e.target) && !toggleBtn.contains(e.target)){
        document.body.classList.remove('sidebar-open');
      }
    }
  });
</script>
