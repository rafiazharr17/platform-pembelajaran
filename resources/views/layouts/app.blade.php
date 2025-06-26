<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-tr from-blue-200 to-blue-50 text-gray-800 font-sans antialiased">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-800 text-white shadow-xl">
            <div class="p-6 text-2xl font-bold border-b border-blue-700">
                <span class="material-icons align-middle">menu_book</span>
                <span class="ml-2 align-middle">Materi Dashboard</span>
            </div>

            <nav class="p-4 space-y-2">
                @php
                    $role = Auth::user()->role->name_role;
                @endphp

                {{-- Forum --}}
                @if ($role === 'Guru' || $role === 'Murid')
                    <a href="{{ route('dashboard') }}"
                       class="flex items-center gap-2 px-4 py-2 rounded-lg transition-all duration-200 hover:bg-white hover:text-blue-700 {{ request()->is('dashboard') ? 'bg-white text-blue-600' : '' }}">
                        <span class="material-icons">forum</span> Forum
                    </a>
                @endif

                {{-- Materi --}}
                @if ($role === 'Guru' || $role === 'Murid')
                    <a href="{{ route('materi.index') }}"
                       class="flex items-center gap-2 px-4 py-2 rounded-lg transition-all duration-200 hover:bg-white hover:text-blue-700 {{ request()->is('materi*') ? 'bg-white text-blue-600' : '' }}">
                        <span class="material-icons">menu_book</span> Materi
                    </a>
                @endif

                {{-- Manajemen Role (khusus Admin) --}}
                @if ($role === 'Admin')
                    <a href="{{ route('admin.users.index') }}"
                       class="flex items-center gap-2 px-4 py-2 rounded-lg transition-all duration-200 hover:bg-white hover:text-blue-700 {{ request()->is('admin/users*') ? 'bg-white text-blue-600' : '' }}">
                        <span class="material-icons">admin_panel_settings</span> Kelola Role
                    </a>
                @endif

                {{-- Profil --}}
                <a href="{{ route('profile.edit') }}"
                   class="flex items-center gap-2 px-4 py-2 rounded-lg transition-all duration-200 hover:bg-white hover:text-blue-700 {{ request()->is('profile*') ? 'bg-white text-blue-600' : '' }}">
                    <span class="material-icons">person</span> Profile
                </a>

                {{-- Logout --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="flex items-center gap-2 px-4 py-2 w-full text-left rounded-lg transition-all duration-200 hover:bg-white hover:text-blue-700">
                        <span class="material-icons">logout</span> Logout
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8 bg-gradient-to-br from-blue-50 via-white to-blue-100 min-h-screen">
            {{ $header ?? '' }}
            <div class="mt-6">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>
</html>
