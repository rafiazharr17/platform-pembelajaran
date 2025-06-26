<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Selamat Datang</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700" rel="stylesheet" />

    <!-- Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-tr from-blue-100 via-white to-blue-200 text-gray-800 flex items-center justify-center min-h-screen font-sans antialiased">

    <div class="w-full max-w-md text-center bg-white shadow-xl rounded-2xl p-10 border border-blue-100">
        <!-- Logo Edukasi -->
        <div class="flex justify-center mb-6">
            <div class="bg-blue-600 text-white w-16 h-16 rounded-full flex items-center justify-center text-3xl font-bold shadow-md">
                <span>📘</span>
            </div>
        </div>

        <h1 class="text-2xl font-bold text-blue-700 mb-2">Selamat Datang di MateriKu</h1>
        <p class="text-sm text-gray-600 mb-6">Platform pembelajaran online untuk berbagi dan mengakses materi dengan mudah.</p>

        <!-- Tombol Aksi -->
        <div class="space-y-4">
            <a href="{{ route('login') }}"
               class="block w-full bg-blue-600 text-white hover:bg-blue-700 hover:text-white  py-2 px-4 rounded-lg font-semibold transition duration-200">
                Masuk
            </a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                   class="block w-full border border-blue-600 text-blue-600 hover:bg-blue-50 py-2 px-4 rounded-lg font-semibold transition duration-200">
                    Daftar
                </a>
            @endif
        </div>
    </div>

</body>
</html>
