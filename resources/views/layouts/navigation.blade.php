@php
$role = Auth::user()->role->name_role ?? '';
@endphp

<nav x-data="{ open: false }" class="bg-blue-700 border-b border-blue-800 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Kiri -->
            <div class="flex items-center space-x-4">
                <button @click="open = !open" class="sm:hidden focus:outline-none">
                    <span class="material-icons text-white text-2xl">menu</span>
                </button>

                <div class="flex items-center space-x-2 text-lg font-semibold tracking-wide">
                    <img src="{{ asset('images/logo-materi-app.png') }}" alt="Logo Materi App" class="w-12 h-12">
                    <span>Materi App</span>
                </div>

                <div class="hidden sm:flex space-x-6 ml-6">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:bg-blue-600/80 px-3 py-2 rounded-md transition">
                        Dashboard
                    </x-nav-link>

                    @if (in_array($role, ['Guru', 'Murid']))
                    <x-nav-link :href="route('materi.index')" :active="request()->routeIs('materi.*')" class="text-white hover:bg-blue-600/80 px-3 py-2 rounded-md transition">
                        Materi
                    </x-nav-link>
                    @endif

                    @if ($role === 'Guru')
                    <x-nav-link :href="route('tugas.index')" :active="request()->routeIs('tugas.*')" class="text-white hover:bg-blue-600/80 px-3 py-2 rounded-md transition">
                        Tugas
                    </x-nav-link>
                    @elseif ($role === 'Murid')
                    <x-nav-link :href="route('tugas-user.index')" :active="request()->routeIs('tugas-user.*')" class="text-white hover:bg-blue-600/80 px-3 py-2 rounded-md transition">
                        Tugas
                    </x-nav-link>
                    @endif

                    @if ($role === 'Admin')
                    <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')" class="text-white hover:bg-blue-600/80 px-3 py-2 rounded-md transition">
                        Kelola User
                    </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Kanan -->
            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-800 rounded-md text-sm font-medium focus:outline-none transition">
                            <span>{{ Auth::user()->name }}</span>
                            <span class="material-icons ml-1 text-sm">expand_more</span>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>

    <!-- Mobile -->
    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden bg-blue-800 text-white px-4 pt-2 pb-4 space-y-1">
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            Dashboard
        </x-responsive-nav-link>

        @if (in_array($role, ['Guru', 'Murid']))
        <x-responsive-nav-link :href="route('materi.index')" :active="request()->routeIs('materi.*')">
            Materi
        </x-responsive-nav-link>
        @endif

        @if ($role === 'Guru')
        <x-responsive-nav-link :href="route('tugas.index')" :active="request()->routeIs('tugas.*')">
            Tugas
        </x-responsive-nav-link>
        @elseif ($role === 'Murid')
        <x-responsive-nav-link :href="route('tugas-user.index')" :active="request()->routeIs('tugas-user.*')">
            Tugas
        </x-responsive-nav-link>
        @endif

        @if ($role === 'Admin')
        <x-responsive-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
            Kelola User
        </x-responsive-nav-link>
        @endif

        <x-responsive-nav-link :href="route('profile.edit')">
            Profile
        </x-responsive-nav-link>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                Log Out
            </x-responsive-nav-link>
        </form>
    </div>
</nav>