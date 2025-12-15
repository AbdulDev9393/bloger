<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" href="{{ asset('storage/sitelogo.png') }}" type="image/x-icon">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

    <!-- Sidebar -->
    @include('admin_panal.sidebar')

    <!-- Flash Messages -->
    @if(session('success'))
        <script>
            swal("Success!", "{{ session('success') }}", "success");
        </script>
    @endif

    @if(session('error'))
        <script>
            swal("Error!", "{{ session('error') }}", "error");
        </script>
    @endif

    <!-- Main Content -->
    <div class="main-content">
        @yield('main-section')
    </div>

</body>
</html>
