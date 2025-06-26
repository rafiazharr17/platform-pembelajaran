<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
                 alt="Avatar"
                 class="w-14 h-14 rounded-full border-2 border-blue-500 shadow">
            <div>
                <h2 class="text-2xl font-bold text-blue-700">{{ Auth::user()->name }}</h2>
                <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
            </div>
        </div>
    </x-slot>

    <div class="py-10 bg-blue-50 min-h-screen space-y-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Sidebar / Info Akun --}}
            <div class="col-span-1 bg-white border border-blue-100 rounded-xl shadow p-6">
                <h3 class="text-lg font-semibold text-blue-700 mb-4">Info Akun</h3>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li><strong>Nama:</strong> {{ Auth::user()->name }}</li>
                    <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
                    <li><strong>Role:</strong> {{ Auth::user()->role->name_role ?? 'Pengguna' }}</li>
                </ul>
            </div>

            {{-- Update Profil --}}
            <div class="col-span-2 bg-white border border-blue-100 rounded-xl shadow p-6">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

        </div>

        {{-- Ubah Password - Full Width --}}
        <div class="max-w-7xl mx-auto bg-white border border-blue-100 rounded-xl shadow p-6">
            <div class="max-w-3xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        {{-- Hapus Akun - Full Width --}}
        <div class="max-w-7xl mx-auto bg-white border border-red-200 rounded-xl shadow p-6">
            <div class="max-w-3xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

    </div>
</x-app-layout>
