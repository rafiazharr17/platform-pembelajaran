<nav x-data="{ open: false }" class="bg-blue-700 border-b border-blue-800 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- KIRI: Sidebar toggle + Judul -->
            <div class="flex items-center space-x-4">
                <!-- Toggle (Mobile only) -->
                <button @click="open = !open" class="sm:hidden focus:outline-none">
                    <span class="material-icons text-white text-2xl">menu</span>
                </button>

                <!-- Judul -->
                <span class="text-lg font-semibold tracking-wide">Materi App</span>

                <!-- Menu utama (Desktop) -->
                <div class="hidden sm:flex space-x-6 ml-6">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                        class="text-white hover:text-white hover:bg-blue-600/80 px-3 py-2 rounded-md transition-colors duration-150">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @if (Auth::user()->role->name_role === 'Guru' || Auth::user()->role->name_role === 'Murid')
                        <x-nav-link :href="route('materi.index')" :active="request()->routeIs('materi.*')" 
                            class="text-white hover:text-white hover:bg-blue-600/80 px-3 py-2 rounded-md transition-colors duration-150">
                            {{ __('Materi') }}
                        </x-nav-link>
                    @endif

                    @if (Auth::user()->role->name_role === 'Guru' || Auth::user()->role->name_role === 'Murid')
                        <x-nav-link :href="route('tugas.index')" :active="request()->routeIs('tugas.*')" 
                            class="text-white hover:text-white hover:bg-blue-600/80 px-3 py-2 rounded-md transition-colors duration-150">
                            {{ __('Tugas') }}
                        </x-nav-link>
                    @endif

                    @if (Auth::user()->role->name_role === 'Admin')
                        <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')" 
                            class="text-white hover:text-white hover:bg-blue-600/80 px-3 py-2 rounded-md transition-colors duration-150">
                            {{ __('Kelola User') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- KANAN: Akun -->
            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-800 rounded-md text-sm font-medium focus:outline-none transition">
                            <span>{{ Auth::user()->name }}</span>
                            <span class="material-icons ml-1 text-sm">expand_more</span>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" 
                            class="text-white hover:text-white hover:bg-blue-600/80 px-4 py-2 block transition-colors duration-150">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" 
                                onclick="event.preventDefault(); this.closest('form').submit();" 
                                class="text-white hover:text-white hover:bg-blue-600/80 px-4 py-2 block transition-colors duration-150">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>

    <!-- Responsive Mobile Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden bg-blue-800 text-white px-4 pt-2 pb-4 space-y-1">
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
            class="text-white hover:text-white hover:bg-blue-600/80 px-3 py-2 rounded-md transition-colors duration-150">
            {{ __('Dashboard') }}
        </x-responsive-nav-link>

        @if (Auth::user()->role->name_role === 'Guru' || Auth::user()->role->name_role === 'Murid')
            <x-responsive-nav-link :href="route('materi.index')" :active="request()->routeIs('materi.*')" 
                class="text-white hover:text-white hover:bg-blue-600/80 px-3 py-2 rounded-md transition-colors duration-150">
                {{ __('Materi') }}
            </x-responsive-nav-link>
        @endif

        @if (Auth::user()->role->name_role === 'Guru' || Auth::user()->role->name_role === 'Murid')
            <x-responsive-nav-link :href="route('tugas.index')" :active="request()->routeIs('tugas.*')" 
                class="text-white hover:text-white hover:bg-blue-600/80 px-3 py-2 rounded-md transition-colors duration-150">
                {{ __('Tugas') }}
            </x-responsive-nav-link>
        @endif

        @if (Auth::user()->role->name_role === 'Admin')
            <x-responsive-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')" 
                class="text-white hover:text-white hover:bg-blue-600/80 px-3 py-2 rounded-md transition-colors duration-150">
                {{ __('Kelola User') }}
            </x-responsive-nav-link>
        @endif

        <x-responsive-nav-link :href="route('profile.edit')" 
            class="text-white hover:text-white hover:bg-blue-600/80 px-3 py-2 rounded-md transition-colors duration-150">
            {{ __('Profile') }}
        </x-responsive-nav-link>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link :href="route('logout')" 
                onclick="event.preventDefault(); this.closest('form').submit();" 
                class="text-white hover:text-white hover:bg-blue-600/80 px-3 py-2 rounded-md transition-colors duration-150">
                {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>
    </div>
</nav>
