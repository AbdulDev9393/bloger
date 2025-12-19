
@include('frontend.header')
<style>
.search_system{
    width:100%;
    height:80px;
    display:flex;
    justify-content:center;
    align-items:center;
}

.search-box{
    width:500px;
    height:55px;
    display:flex;
    border-radius:8px;
    overflow:hidden;
    box-shadow:0 4px 10px rgba(0,0,0,0.15);
    border:2px solid transparent;
    transition:all 0.3s ease;
}

/* Hover Effect */
.search-box:hover{
    border:2px solid #ff5500;
    box-shadow:0 0 12px rgba(255,85,0,0.6);
}
.search-box:focus-within{
    border:2px solid #ff5500;
    box-shadow:0 0 12px rgba(255,85,0,0.6);
}
.seach_engin{
    width:85%;
    height:100%;
    padding:0 15px;
    font-size:16px;
    border:none;
    outline:none;
    background:#f1f1f1;
}

.icon{
    width:15%;
    height:100%;
    display:flex;
    justify-content:center;
    align-items:center;
    background:#ff5500;
    cursor:pointer;
}

.icon i{
    font-size:22px;
    color:#ff5500;
}
</style>

<section class="search_system">
    <div class="search-box">
        <form action="{{ route('frontend.search') }}" method="GET" style="display: flex; width: 100%;">
            <input type="text" name="query" class="seach_engin" placeholder="Search here..." value="{{ request('query') }}">
            <button type="submit" class="icon" style="background: none; border: none; cursor: pointer;">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
</section>

@include('frontend.blogs.list')
@include('frontend.footer')

