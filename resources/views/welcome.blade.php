<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MateriKu - Platform Edukasi Modern</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 font-sans antialiased">

    <!-- Navbar -->
    <nav class="bg-white shadow-md fixed w-full z-10 top-0">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-2xl font-bold text-blue-700">📘 MateriKu</div>
            <div class="space-x-4">
                <a href="#fitur" class="text-sm text-gray-700 hover:text-blue-600">Fitur</a>
                <a href="#tentang" class="text-sm text-gray-700 hover:text-blue-600">Tentang</a>
                <a href="{{ route('login') }}" class="text-sm text-blue-700 font-semibold hover:underline">Masuk</a>
                <a href="{{ route('register') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition">
                    Daftar Gratis
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="pt-32 bg-gradient-to-br from-blue-50 to-white min-h-screen flex items-center">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center gap-10">
            <div class="md:w-1/2 space-y-6">
                <h1 class="text-4xl md:text-5xl font-extrabold text-blue-800">
                    Belajar Lebih Cerdas <br> Bersama <span class="text-blue-600">MateriKu</span>
                </h1>
                <p class="text-gray-600 text-lg">
                    Platform pembelajaran daring yang dirancang untuk guru & siswa dalam berbagi, mengelola, dan memahami materi dengan mudah dan interaktif.
                </p>
                <div class="flex gap-4 mt-6">
                    <a href="{{ route('register') }}"
                       class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                        Mulai Sekarang
                    </a>
                    <a href="#fitur" class="text-blue-700 font-semibold hover:underline pt-3">Lihat Fitur</a>
                </div>
            </div>
            <div class="md:w-1/2">
                <img src="https://undraw.co/api/illustrations/online_learning" alt="Ilustrasi belajar" class="w-full max-w-md mx-auto drop-shadow-lg">
            </div>
        </div>
    </section>

    <!-- Fitur -->
    <section id="fitur" class="bg-white py-20">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-blue-800 mb-10">Fitur Unggulan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-blue-50 p-6 rounded-lg shadow hover:shadow-lg transition">
                    <div class="text-4xl mb-4">📚</div>
                    <h3 class="text-xl font-semibold mb-2">Materi Interaktif</h3>
                    <p class="text-gray-600">Guru dapat membuat dan membagikan materi dengan format yang menarik dan mudah dipahami siswa.</p>
                </div>
                <div class="bg-blue-50 p-6 rounded-lg shadow hover:shadow-lg transition">
                    <div class="text-4xl mb-4">📝</div>
                    <h3 class="text-xl font-semibold mb-2">Manajemen Tugas</h3>
                    <p class="text-gray-600">Atur tugas untuk siswa, nilai secara langsung, dan pantau progress mereka dengan mudah.</p>
                </div>
                <div class="bg-blue-50 p-6 rounded-lg shadow hover:shadow-lg transition">
                    <div class="text-4xl mb-4">💬</div>
                    <h3 class="text-xl font-semibold mb-2">Forum Diskusi</h3>
                    <p class="text-gray-600">Tempat interaksi guru dan murid untuk berdiskusi, bertanya, dan berbagi pengetahuan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-20 bg-blue-100">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-blue-800 mb-6">Ayo Bergabung dengan Ribuan Pengguna Lainnya!</h2>
            <p class="text-gray-700 mb-6">Mulai perjalanan belajarmu dengan pengalaman yang lebih modern dan menyenangkan.</p>
            <a href="{{ route('register') }}"
               class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-blue-700 transition">
                Daftar Sekarang Gratis
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white py-6 border-t">
        <div class="max-w-6xl mx-auto px-6 text-center text-sm text-gray-600">
            &copy; {{ date('Y') }} MateriKu. Semua Hak Dilindungi.
        </div>
    </footer>

</body>
</html>
