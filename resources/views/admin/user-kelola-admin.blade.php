@extends('layout.app')

@section('content')
    <div class="flex min-h-screen bg-gradient-to-br from-gray-50 via-[#F7F5F2] to-[#EDE6DF] text-gray-800">

        {{-- Sidebar --}}
        <x-sidebar />

        {{-- Main Content --}}
        <main class="flex-1 p-10 bg-[#F7F5F2]/60 backdrop-blur-md text-gray-800 overflow-auto relative">

            <div class="absolute top-1/4 right-16 w-56 h-56 bg-[#E5C49E]/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 left-10 w-44 h-44 bg-[#C0A785]/20 rounded-full blur-3xl"></div>

            {{-- Header --}}
            <div class="mb-10 relative z-10">
                @if (Request::is('teknisi'))
                    <h1 class="text-4xl font-extrabold text-[#7A6C5D] mb-2">Kelola Data Teknisi</h1>
                @elseif (Request::is('users'))
                    <h1 class="text-4xl font-extrabold text-[#7A6C5D] mb-2">Kelola Data User</h1>
                @endif
                <p class="text-[#7A6C5D]/70 text-sm">Daftar seluruh pengguna sistem</p>
            </div>

            {{-- Tombol Tambah --}}
            <div class="mb-6">
                @if (Request::is('teknisi'))
                    <a href="/teknisi/create"
                        class="bg-gradient-to-r from-[#C0A785] to-[#E5C49E] hover:from-[#E5C49E] hover:to-[#C0A785] text-white font-semibold px-5 py-2.5 rounded-xl shadow-md transition-all flex items-center space-x-2 inline-flex">
                        <i class="fas fa-user-plus"></i>
                        <span>Tambah Teknisi</span>
                    </a>
                @else
                    <a href="/users/create"
                        class="bg-gradient-to-r from-[#C0A785] to-[#E5C49E] hover:from-[#E5C49E] hover:to-[#C0A785] text-white font-semibold px-5 py-2.5 rounded-xl shadow-md transition-all flex items-center space-x-2 inline-flex">
                        <i class="fas fa-user-plus"></i>
                        <span>Tambah User</span>
                    </a>
                @endif
            </div>

            {{-- Table --}}
            <div class="bg-[#F5E6D3] border border-[#D2A679]/30 rounded-2xl shadow-md p-6 overflow-x-auto relative z-10">
                <table class="min-w-full text-sm text-left border-collapse">
                    <thead class="bg-[#D2A679]/10 text-[#7A6C5D] uppercase text-xs tracking-wider">
                        <tr>
                            <th class="px-4 py-3 border-b border-[#C0A785]/30">No</th>
                            <th class="px-4 py-3 border-b border-[#C0A785]/30">Nama</th>
                            <th class="px-4 py-3 border-b border-[#C0A785]/30">Email</th>
                            <th class="px-4 py-3 border-b border-[#C0A785]/30">No. Telepon</th>
                            <th class="px-4 py-3 border-b border-[#C0A785]/30">Departemen</th>
                            <th class="px-4 py-3 border-b border-[#C0A785]/30">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $index => $user)
                            <tr class="hover:bg-[#EDE6DF]/70 transition-all">
                                <td class="px-4 py-2 border-b border-[#C0A785]/20">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 border-b border-[#C0A785]/20">{{ $user->name }}</td>
                                <td class="px-4 py-2 border-b border-[#C0A785]/20">{{ $user->email }}</td>
                                <td class="px-4 py-2 border-b border-[#C0A785]/20">{{ $user->phone }}</td>
                                <td class="px-4 py-2 border-b border-[#C0A785]/20">
                                    {{ $user->departemen }}
                                </td>
                                <td class="px-4 py-2 border-b border-[#C0A785]/20 space-x-3">
                                    <a href="{{ Request::is('teknisi') ? route('teknisi.edit', $user->id) : route('users.edit', $user->id) }}"
                                        class="text-[#C0A785] hover:text-[#A12020] font-semibold transition-all">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button type="button" onclick="openDeleteModal({{ $user->id }})"
                                        class="text-[#A12020] hover:text-red-700 font-semibold transition-all">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-[#7A6C5D]/60 py-6">Belum ada data user.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-6">
                    {{ $users->links() }}
                </div>
            </div>

            {{-- Modal Hapus --}}
            <div id="deleteModal" class="fixed inset-0 bg-black/50 hidden justify-center items-center z-50">
                <div class="bg-[#F7F5F2] border border-[#C0A785]/40 rounded-2xl p-6 w-full max-w-md shadow-xl">
                    <h2 class="text-xl font-bold text-[#7A6C5D] mb-3">Konfirmasi Hapus</h2>
                    <p class="text-[#7A6C5D]/80 mb-6">Apakah kamu yakin ingin menghapus user ini? Tindakan ini tidak bisa
                        dibatalkan.</p>

                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeDeleteModal()"
                            class="bg-[#EDE6DF] hover:bg-[#E5C49E]/40 text-[#7A6C5D] px-4 py-2 rounded-lg transition-all">Batal</button>

                        <form id="deleteForm" method="POST" action="">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-[#A12020] hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-all">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Footer --}}
            <div class="mt-90 pt-6 border-t border-[#C0A785]/20 text-center text-sm text-[#7A6C5D]/70">
                © 2025 PT Astari Niagara. All rights reserved.
            </div>
        </main>
    </div>

    <script>
        function openDeleteModal(id) {
            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');
            form.action = `/users/${id}`;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>
@endsection
