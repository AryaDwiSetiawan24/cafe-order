<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js']) 
</head>

<body class="bg-gray-100">

    @include('partials.admin-sidebar')

    <div class="ml-64 p-6">
        @yield('content')
    </div>
</body>

</html>
