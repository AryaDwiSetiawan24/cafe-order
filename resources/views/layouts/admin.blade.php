<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CafeKu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <!-- NAVBAR -->
    <nav class="flex items-center justify-between p-4 shadow bg-white">
        <div class="font-bold text-xl text-yellow-600">CafeKu</div>
        <ul class="flex gap-6">
            <li><a href="/home2" class="hover:text-yellow-600">Home</a></li>
            <li><a href="/menu1" class="hover:text-yellow-600">Menu</a></li>
            <li><a href="/cart" class="hover:text-yellow-600">Keranjang</a></li>
        </ul>
    </nav>

    <main>
        @yield('content')
    </main>
</body>

</html>
