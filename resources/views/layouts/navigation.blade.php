@php
    $role = Auth::user()->role->name_role ?? '';
@endphp

<nav 
    x-data="{ open: false, show: false }" 
    x-init="setTimeout(() => show = true, 100)" 
    x-show="show"
    x-transition:enter="transition ease-out duration-700"
    x-transition:enter-start="opacity-0 -translate-y-3"
    x-transition:enter-end="opacity-100 translate-y-0"
    class="bg-blue-700 border-b border-blue-800 text-white shadow-md transition-all duration-300"
>
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

                <!-- Desktop Menu -->
                <div class="hidden sm:flex space-x-6 ml-6">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                        class="text-white px-3 py-2 rounded-md transition duration-200 hover:ring-2 hover:ring-white/30 hover:scale-105">
                        Dashboard
                    </x-nav-link>

                    @if (in_array($role, ['Guru', 'Murid']))
                        <x-nav-link :href="route('materi.index')" :active="request()->routeIs('materi.*')"
                            class="text-white px-3 py-2 rounded-md transition duration-200 hover:ring-2 hover:ring-white/30 hover:scale-105">
                            Materi
                        </x-nav-link>
                    @endif

                    @if ($role === 'Guru')
                        <x-nav-link :href="route('tugas.index')" :active="request()->routeIs('tugas.*')"
                            class="text-white px-3 py-2 rounded-md transition duration-200 hover:ring-2 hover:ring-white/30 hover:scale-105">
                            Tugas
                        </x-nav-link>
                    @elseif ($role === 'Murid')
                        <x-nav-link :href="route('tugas-user.index')" :active="request()->routeIs('tugas-user.*')"
                            class="text-white px-3 py-2 rounded-md transition duration-200 hover:ring-2 hover:ring-white/30 hover:scale-105">
                            Tugas
                        </x-nav-link>
                    @endif

                    @if ($role === 'Admin')
                        <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')"
                            class="text-white px-3 py-2 rounded-md transition duration-200 hover:ring-2 hover:ring-white/30 hover:scale-105">
                            Kelola User
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Kanan -->
            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-800 rounded-full text-sm font-semibold focus:outline-none transition-all duration-150">
                            <div
                                class="w-8 h-8 bg-white text-blue-600 rounded-full flex items-center justify-center font-bold uppercase">
                                {{ strtoupper(Auth::user()->name[0]) }}
                            </div>
                            <span>{{ Auth::user()->name }}</span>
                            <span class="material-icons text-sm">expand_more</span>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')"
                            class="flex items-center gap-2 px-4 py-2 hover:bg-blue-100 rounded-md transition">
                            <span>Profile</span>
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="flex items-center gap-2 px-4 py-2 hover:bg-red-100 text-red-600 rounded-md transition">
                                <span>Log Out</span>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{ 'block': open, 'hidden': !open }"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="sm:hidden bg-blue-800 text-white px-4 pt-2 pb-4 space-y-1 rounded-b-md shadow-md">
        
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
            <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault(); this.closest('form').submit();">
                Log Out
            </x-responsive-nav-link>
        </form>
    </div>
</nav>
