<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zpayd Documentation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @stack('styles')
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            color: #fff;
        }

        /* Header */
        .header-wrapper { width: 100%; position: sticky; top: 0; z-index: 1000; }

        /* Sidebar + Main content container */
        .content-wrapper { display: flex; width: 100%; min-height: calc(100vh - 120px); }

        /* Sidebar */
        .sidebar { width: 300px; overflow-y: auto; padding: 24px 0; }

        /* Main content */
        .main-content { flex: 1; padding: 24px; overflow-y: auto; }

        /* Responsive */
        @media (max-width: 768px) {
            .content-wrapper { flex-direction: column; }
            .sidebar { width: 100%; border-right: none; border-bottom: 1px solid #2a2a2a; }
        }
    </style>
</head>
<body>
    <div class="header-wrapper">
        @include('VopaySetup.header')
    </div>

    <div class="content-wrapper">
        <div class="sidebar">
            @include('VopaySetup.sidebar')
        </div>

        <div class="main-content">
            @yield('content')  <!-- Page content appears here -->
        </div>
    </div>

    @stack('scripts')
</body>
</html>
