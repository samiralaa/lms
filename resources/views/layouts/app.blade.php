<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MCCL Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    @include('layouts.layout') <!-- Include the Sidebar -->

    <main class="main-content">
        @yield('content')  <!-- Content Section for Pages -->
    </main>

    <script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>
</html>
