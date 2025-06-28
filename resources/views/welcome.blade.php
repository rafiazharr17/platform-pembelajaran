<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MateriKu - Platform Edukasi Modern</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .fade-in-section {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .fade-in-section.visible {
            opacity: 1;
            transform: none;
        }
    </style>
</head>

<body class="bg-gradient-to-b from-blue-100 via-white to-blue-50 text-gray-800 font-sans antialiased">

    <!-- Navbar Transparan -->
    <nav class="fixed top-0 w-full z-50 border-b border-blue-100 bg-white/80 backdrop-blur-md shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-2xl font-bold text-blue-700">📘 MateriKu</div>
            <div class="space-x-6">
                <a href="#fitur" class="text-sm text-gray-700 hover:text-blue-600 font-medium">Fitur</a>
                <a href="#fitur" class="text-sm text-gray-700 hover:text-blue-600 font-medium">Tentang</a>
                <a href="{{ route('login') }}" class="text-sm text-blue-700 font-semibold hover:underline">Masuk</a>
                <a href="{{ route('register') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition">
                    Daftar Gratis
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="pt-32 min-h-screen flex items-center bg-gradient-to-b from-blue-100 via-white to-white">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center gap-10 fade-in-section">
            <div class="md:w-1/2 space-y-6">
                <h1 class="text-4xl md:text-5xl font-extrabold text-blue-900">
                    Belajar Lebih Cerdas <br> Bersama <span class="text-blue-600">MateriKu</span>
                </h1>
                <p class="text-gray-700 text-lg">
                    Platform pembelajaran daring modern untuk guru & siswa dalam berbagi dan memahami materi dengan
                    interaktif.
                </p>
                <div class="flex gap-4 mt-6">
                    <a href="{{ route('register') }}"
                        class="bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-800 transition shadow">
                        Mulai Sekarang
                    </a>
                    <a href="#fitur" class="text-blue-700 font-semibold hover:underline pt-3">Lihat Fitur</a>
                </div>
            </div>
            <div class="md:w-1/2">
                <img src="/images/sekolah.jpeg" alt="Ilustrasi belajar"
                    class="w-full max-w-md mx-auto drop-shadow-xl rounded-xl border border-blue-100">
            </div>
        </div>
    </section>

    <!-- Fitur -->
    <section id="fitur" class="py-20 bg-gradient-to-b from-white via-blue-50 to-blue-100 fade-in-section">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-blue-800 mb-10">Fitur Unggulan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-blue-50 p-6 rounded-xl shadow hover:shadow-lg transition">
                    <div class="text-4xl mb-4">📚</div>
                    <h3 class="text-xl font-semibold mb-2">Materi Interaktif</h3>
                    <p class="text-gray-600">Guru dapat membuat dan membagikan materi dengan format menarik dan mudah
                        dipahami.</p>
                </div>
                <div class="bg-blue-50 p-6 rounded-xl shadow hover:shadow-lg transition">
                    <div class="text-4xl mb-4">📝</div>
                    <h3 class="text-xl font-semibold mb-2">Manajemen Tugas</h3>
                    <p class="text-gray-600">Atur tugas siswa, nilai otomatis, dan pantau perkembangan secara efisien.
                    </p>
                </div>
                <div class="bg-blue-50 p-6 rounded-xl shadow hover:shadow-lg transition">
                    <div class="text-4xl mb-4">💬</div>
                    <h3 class="text-xl font-semibold mb-2">Forum Diskusi</h3>
                    <p class="text-gray-600">Tempat guru & murid berdiskusi, bertanya, dan berbagi ilmu.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-20 bg-gradient-to-b from-blue-100 to-blue-200 fade-in-section">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-blue-800 mb-6">Bergabung Sekarang!</h2>
            <p class="text-gray-700 mb-6">Jadilah bagian dari komunitas pembelajaran terbaik dan modern.</p>
            <a href="{{ route('register') }}"
                class="inline-block bg-blue-700 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-blue-800 transition">
                Daftar Sekarang Gratis
            </a>
        </div>
    </section>

    <!-- Footer -->
    <!-- Footer -->
    <footer class="bg-white border-t border-blue-100 shadow-inner fade-in-section">
        <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-10 text-sm text-gray-700">
            <!-- Kolom 1: Logo dan deskripsi -->
            <div>
                <div class="text-2xl font-bold text-blue-700 mb-3">📘 MateriKu</div>
                <p class="text-gray-600">Platform pembelajaran daring modern untuk guru dan siswa. Mudah, cepat, dan
                    interaktif.</p>
            </div>

            <!-- Kolom 2: Navigasi -->
            <div>
                <h3 class="font-semibold text-blue-800 mb-3">Navigasi</h3>
                <ul class="space-y-2">
                    <li><a href="#fitur" class="hover:underline">Fitur</a></li>
                    <li><a href="#tentang" class="hover:underline">Tentang</a></li>
                    <li><a href="{{ route('login') }}" class="hover:underline">Masuk</a></li>
                    <li><a href="{{ route('register') }}" class="hover:underline">Daftar</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Kontak -->
            <div>
                <h3 class="font-semibold text-blue-800 mb-3">Kontak</h3>
                <ul class="space-y-2">
                    <li>Email: <a href="mailto:support@materiku.id"
                            class="hover:underline text-blue-700">support@materiku.id</a></li>
                    <li>WhatsApp: <a href="https://wa.me/6281234567890" class="hover:underline text-blue-700">+62
                            812-3456-7890</a></li>
                    <li>Instagram: <a href="https://instagram.com/materiku" target="_blank"
                            class="hover:underline text-blue-700">@materiku</a></li>
                </ul>
            </div>
        </div>

        <!-- Copyright di bagian bawah footer -->
        <div class="px-6 py-4 text-center text-xs text-gray-500 bg-white/80">
            &copy; {{ date('Y') }} MateriKu. Semua Hak Dilindungi.
        </div>
    </footer>



    <!-- Script Animasi Fade -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const faders = document.querySelectorAll('.fade-in-section');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });

            faders.forEach(el => observer.observe(el));
        });
    </script>

</body>

</html>