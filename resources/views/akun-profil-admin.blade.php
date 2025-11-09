@extends('layout.app')

@section('content')
    <div class="flex min-h-screen bg-[#F7F5F2] text-[#3D352B]">
        {{-- Sidebar --}}
        <x-sidebar />

        {{-- Main Content --}}
        <main class="flex-1 bg-[#FAF9F7] p-10">
            <h1 class="text-3xl font-bold mb-8 text-[#7A6C5D]">Profil Akun</h1>

            {{-- Alert --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
                class="bg-[#F5E6D3] border border-[#D2A679]/30 rounded-2xl shadow-md p-6 space-y-4 relative z-10">
                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div class="flex items-center gap-4">
                    <label class="w-56 font-semibold text-gray-700">No Induk Pegawai :</label>
                    <input type="text" name="name" value="{{ old('name', $admin->id) }}"
                        class="border border-gray-300 bg-white rounded-md px-3 py-2 flex-1 focus:ring-2 focus:ring-[#C0A785]"
                        required>
                </div>

                <div class="flex items-center gap-4">
                    <label class="w-56 font-semibold text-gray-700">Nama Lengkap :</label>
                    <input type="text" name="name" value="{{ old('name', $admin->name) }}"
                        class="border border-gray-300 bg-white rounded-md px-3 py-2 flex-1 focus:ring-2 focus:ring-[#C0A785]"
                        required>
                </div>

                {{-- Email --}}
                <div class="flex items-center gap-4">
                    <label class="w-56 font-semibold text-gray-700">Email :</label>
                    <input type="email" name="email" value="{{ old('email', $admin->email) }}"
                        class="border border-gray-300 bg-white rounded-md px-3 py-2 flex-1 focus:ring-2 focus:ring-[#C0A785]"
                        required>
                </div>

                {{-- Upload Foto --}}
                <div class="flex items-center gap-4">
                    <label class="w-56 font-semibold text-gray-700">Foto Profil :</label>
                    <input type="file" name="foto" accept="image/*"
                        class="border border-gray-300 bg-white rounded-md px-3 py-2 flex-1 text-sm focus:ring-2 focus:ring-[#C0A785]">
                </div>

                {{-- Tombol Simpan --}}
                <div class="flex items-center gap-4">
                    <label class="w-56"></label>
                    <button type="submit"
                        class="bg-[#C0A785] hover:bg-[#A9916F] text-white px-6 py-2.5 rounded-md shadow font-semibold">
                        Simpan Perubahan
                    </button>
                </div>
                {{-- Preview Foto --}}
                <div class="flex items-center gap-4">
                    <label class="w-56 font-semibold text-gray-700"></label>
                    <div>
                        @if ($admin->foto && file_exists(public_path('storage/foto/' . $admin->foto)))
                            <img src="{{ asset('storage/foto/' . $admin->foto) }}" alt="Foto Profil"
                                class="w-32 h-32 border border-gray-300 rounded-md object-cover">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($admin->name) }}&size=150&background=C0A785&color=fff"
                                alt="Foto Profil" class="w-32 h-32 border border-gray-300 rounded-md object-cover">
                        @endif
                    </div>
                </div>

            </form>

        </main>

    </div>
@endsection
