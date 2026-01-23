@php
use App\Models\ApiCollection;

$collections = ApiCollection::with([
    'resources.endpoints'
])->get();
@endphp
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
   
<style>
    
   
    
    /* Sidebar Styles */
    .sidebar {
        width: 300px;
          border-right: none !important;
        height: 100vh;
        position: sticky;
        top: 0;
        overflow-y: auto;
        padding: 10px 0;
        background-color: #ffffff;
        border-radius: 5px;
        
    }
    
    .sidebar-header {
        padding: 0 24px 24px 24px;
       
        margin-bottom: 24px;
    }
    
    .site-title {
        color: #ffffff;
        font-size: 28px;
        font-weight: 700;
        letter-spacing: 1.5px;
        margin-bottom: 8px;
    }
    
    .site-subtitle {
        color: #888;
        font-size: 14px;
        font-weight: 400;
    }
    
    .sidebar-content {
        padding: 0 24px;
        background-color: white
    }
    
    .section-title {
        color: black;
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 20px;
        letter-spacing: 0.5px;
    }
    
    .section-subtitle {
        color: black;
        font-size: 15px;
        font-weight: 600;
        margin-bottom: 16px;
        margin-top: 24px;
    }
    
    .jump-to-list {
        list-style: none;
        margin-bottom: 30px;
    }
    
    .jump-to-item {
        margin-bottom: 8px;
    }
    
    .jump-to-link {
        color: black;
        font-size: 14px;
        font-weight: 500;
        text-decoration: none;
        display: flex;
        align-items: center;
        padding: 8px 12px;
        border-radius: 6px;
        transition: all 0.2s ease;
    }
    
 
    
    .jump-to-link.active {
        color: #6a11cb;
        background-color: rgba(106, 17, 203, 0.1);
        font-weight: 600;
        font-size: 12px;
    }
    
    .jump-to-link i {
        margin-right: 10px;
        font-size: 12px;
        width: 16px;
        text-align: center;
    }
    
    /* API Endpoints Section */
    .api-section {
        margin-top: 30px;
    }
    
    .api-category {
        margin-bottom: 24px;
    }
    
    .api-category-title {
        color: #4f5a66;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 12px;
        padding-bottom: 8px;
       text-transform: uppercase;
    }
    
    .api-endpoint-list {
        list-style: none;
    }
    
    .api-endpoint-item {
        margin-bottom: 10px;
        position: relative;
        padding-left: 16px;
    }
    
    .api-endpoint-item::before {
        content: "";
        position: absolute;
        left: 0;
        top: 12px;
        width: 6px;
        height: 6px;
        border-radius: 50%;
    }
    
    .api-endpoint-link {
        color: black;
        font-size: 13px;
        font-weight: 500;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 8px 12px;
        border-radius: 6px;
        transition: all 0.2s ease;
    }
    
    .api-endpoint-link:hover {
      
        background-color: #e0dddd;
    }
    
    .api-method {
        font-size: 11px;
        font-weight: 700;
        padding: 3px 8px;
        border-radius: 4px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .method-post {
        background-color: rgba(37, 117, 252, 0.2);
        color: #6a11cb;
    }
    
    .method-get {
        background-color: rgba(46, 204, 113, 0.2);
        color: #2ecc71;
    }
    
    /* Main Content Area */
    .main-content {
        flex: 1;
        padding: 40px;
        overflow-y: auto;
        max-width: 1000px;
        background-color: #ffffff;
    }
    
    .content-header {
        margin-bottom: 40px;
    }
    
    .content-title {
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 12px;
        color: #ffffff;
    }
    
    .content-subtitle {
        font-size: 18px;
        color: #cccccc;
        font-weight: 400;
        line-height: 1.6;
        max-width: 800px;
    }
    
    .api-overview {
        background-color: #1a1a1a;
        border-radius: 12px;
        padding: 30px;
        margin-bottom: 40px;
        border-left: 4px solid #6a11cb;
    }
    
    .api-overview-title {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 20px;
        color: #ffffff;
    }
    
    .api-overview-text {
        color: #cccccc;
        line-height: 1.8;
        margin-bottom: 20px;
    }
    
    .code-block {
    
        border-radius: 8px;
        padding: 20px;
        font-family: 'Courier New', monospace;
        font-size: 14px;
        color: #2ecc71;
        margin-top: 20px;
        overflow-x: auto;
    }
    
    /* Responsive Design */
    @media (max-width: 1024px) {
        .sidebar {
            width: 280px;
        }
        
        .main-content {
            padding: 30px;
        }
    }
    
    @media (max-width: 768px) {
        body {
            flex-direction: column;
        }
        
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
            border-right: none;
           
        }
        
        .main-content {
            padding: 24px;
        }
    }
    
   /* Scrollbar width */
.sidebar::-webkit-scrollbar {
    width: 6px;
}

/* Track (background) */
.sidebar::-webkit-scrollbar-track {
    background: transparent;
}

/* Thumb (scroll handle) */
.sidebar::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    transition: background-color 0.3s ease;
}

/* On hover – more visible */

.jum_input{
    
   cursor: pointer;
   
    display: flex;
    height: 30px;
  padding: 1px 10px;
     border: 1px solid #b9b8b9ee;
    width: 100%;
    border-radius: 5px;
    margin-bottom: 10px;
}
.jum_input::placeholder {
    font-weight: 700;   /* bold */
   
}
.jump-wrapper{
    position: relative;
    width: 260px;
}

.jum_input{
    width: 100%;
    padding: 10px 60px 10px 14px; /* right side space for button */

 outline: none;
    border-radius: 8px;
    color: #fff;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
}

.jum_input::placeholder{
    font-weight: 600; /* JUMP TO bold */
    color: #aaa;
}

.jump-key{
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 9px;
    font-weight: 600;
    color: #637288;
    height: 60%;
    border: 1px solid #c0c0c0;
    padding: 4px 8px;
    border-radius: 6px;
    pointer-events: none; /* click input pe hi rahe */
    background: #f8f8f8;

}
.jum_input:focus{
    border: 1px solid #018ef5;
    box-shadow: 0 0 0 3px rgba(1, 142, 245, 0.35);
 
}
.api-category-title.toggle-title{
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    user-select: none;
}

.api-endpoint-list {
    max-height: 0;      /* Start closed */
    overflow: hidden;
    transition: max-height 0.4s ease;
    margin-top: 10px;
    padding-left: 0;
}

.api-endpoint-list.open {
    max-height: 1000px; /* Adjust as needed */
}

.toggle-icon {
    font-size: 12px;
    transition: transform 0.3s ease;
}

.toggle-icon.rotate {
    transform: rotate(180deg);
}
.toggle-title .toggle-link {
    display: flex;
    justify-content: space-between; /* Name left, icon right */
    align-items: center;
    text-decoration: none;
    color: #4f5a66;
    font-weight: 600;
    cursor: pointer;
}

.toggle-icon {
    font-size: 12px;
    transition: transform 0.3s ease;
}

.toggle-icon.rotate {
    transform: rotate(180deg);
}
</style>

<div class="sidebar">
    <div class="sidebar-content">

        <!-- JUMP TO Search -->
        <div class="jump-wrapper">
            <input type="text" id="jumpInput" class="jum_input" placeholder="JUMP TO">
            <span class="jump-key">Ctrl -\</span>
        </div>

        <ul class="jump-to-list">
            <li class="jump-to-item"><a href="#api-overview" class="jump-to-link">API Overview</a></li>
            <li class="jump-to-item"><a href="#getting-started" class="jump-to-link active">Getting Started</a></li>
        </ul>

        <!-- API Section -->
        <div class="api-section">

            @foreach($collections as $collection)
                <div class="api-category">
                    <div class="api-category-title" style="font-size: 15px">{{ strtoupper($collection->name) }}</div>

                    @foreach($collection->resources as $resource)
                        <div class="api-category">
                        <div class="api-category-title toggle-title">
                                <a href="#res-{{ $resource->id }}" class="toggle-link" onclick="toggleApis('res-{{ $resource->id }}', this); return false;">
                                    {{ $resource->name }}
                                    <i class="fas fa-chevron-down toggle-icon" style="margin-left: 89px;"></i>
                                </a>
                            </div>

                            <ul class="api-endpoint-list" id="res-{{ $resource->id }}">
                                @foreach($resource->endpoints as $endpoint)
                                    <li class="api-endpoint-item">
                                       <a href="{{route('view.enfpoint',$endpoint->id)}}" class="api-endpoint-link">
                                            {{ \Illuminate\Support\Str::limit($endpoint->url, 20, '...') }}
                                            <span class="api-method method-post">{{ $endpoint->actions }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            @endforeach

        </div>
    </div>
</div>

<script>
// Toggle API Endpoints
function toggleApis(listId, elem) {
    const list = document.getElementById(listId);
    const icon = elem.querySelector('.toggle-icon');
    list.classList.toggle('open');
    icon.classList.toggle('rotate');
}

// Ctrl + \ shortcut for search
document.addEventListener('keydown', function(e) {
    if (e.ctrlKey && e.key === "\\") {
        e.preventDefault();
        document.getElementById('jumpInput').focus();
    }
});
</script>