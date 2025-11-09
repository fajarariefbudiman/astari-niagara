@extends('layout.app')

@section('content')
    <div class="flex min-h-screen bg-gradient-to-br from-gray-50 via-[#F7F5F2] to-[#EDE6DF] text-gray-800">

        {{-- Sidebar --}}
        <x-sidebar />

        {{-- Main Content --}}
        <main class="flex-1 p-8 bg-[#F7F5F2]/60 backdrop-blur-md text-gray-800 overflow-auto relative">

            <div class="absolute top-1/4 right-16 w-52 h-52 bg-[#E5C49E]/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 left-10 w-40 h-40 bg-[#C0A785]/20 rounded-full blur-3xl"></div>

            <div class="mb-10 relative z-10">
                @if (Auth::user()->role === 'admin')
                    <h1 class="text-4xl font-extrabold text-[#7A6C5D] mb-2">Data Pengaduan Kerusakan Mesin</h1>
                @elseif (Auth::user()->role === 'user')
                    <h1 class="text-4xl font-extrabold text-[#7A6C5D] mb-2">Riwayat Pengaduan</h1>
                @endif
                <p class="text-[#7A6C5D]/70 text-sm">Daftar laporan kerusakan mesin yang telah diajukan</p>
            </div>
            <div class="mb-6">
                @if (Auth::user()->role === 'admin')
                    <a href="/input-pengaduan"
                        class="bg-gradient-to-r from-[#C0A785] to-[#E5C49E] hover:from-[#E5C49E] hover:to-[#C0A785] text-white font-semibold px-5 py-2.5 rounded-xl shadow-md transition-all flex items-center space-x-2 inline-flex">
                        <i class="fas fa-user-plus"></i>
                        <span>Tambah Data</span>
                    </a>
                @endif
            </div>

            <div class="bg-[#F5E6D3] border border-[#D2A679]/30 rounded-2xl shadow-md p-6 overflow-x-auto relative z-10">
                <table class="min-w-full text-sm text-left border-collapse">
                    <thead class="bg-[#D2A679]/10 text-[#7A6C5D] uppercase text-xs tracking-wider">
                        <tr>
                            <th class="px-4 py-3 border-b border-[#D2A679]/30">ID</th>
                            <th class="px-4 py-3 border-b border-[#D2A679]/30">Nama</th>
                            <th class="px-4 py-3 border-b border-[#D2A679]/30">Mesin</th>
                            <th class="px-4 py-3 border-b border-[#D2A679]/30">Keterangan</th>
                            <th class="px-4 py-3 border-b border-[#D2A679]/30">Tanggal</th>
                            <th class="px-4 py-3 border-b border-[#D2A679]/30">Status</th>
                            <th class="px-4 py-3 border-b border-[#D2A679]/30 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pengaduans as $p)
                            <tr class="hover:bg-[#EBDCC2] transition-all">
                                <td class="px-4 py-2 border-b border-[#D2A679]/20">
                                    NP{{ str_pad($p->id, 4, '0', STR_PAD_LEFT) }}</td>
                                <td class="px-4 py-2 border-b border-[#D2A679]/20">{{ $p->user->name ?? '-' }}</td>
                                <td class="px-4 py-2 border-b border-[#D2A679]/20">{{ $p->nama_mesin }}</td>
                                <td class="px-4 py-2 border-b border-[#D2A679]/20">{{ Str::limit($p->keterangan, 40) }}</td>
                                <td class="px-4 py-2 border-b border-[#D2A679]/20">{{ $p->created_at->format('Y-m-d') }}
                                </td>
                                <td class="px-4 py-2 border-b border-[#D2A679]/20">
                                    @if ($p->status == 'menunggu')
                                        <span
                                            class="bg-[#C9996B]/30 text-[#7A6C5D] px-2 py-1 rounded-lg text-xs font-semibold">Sedang
                                            Diajukan</span>
                                    @elseif($p->status == 'diproses')
                                        <span
                                            class="bg-[#C9996B]/20 text-[#7A6C5D] px-2 py-1 rounded-lg text-xs font-semibold">Diproses</span>
                                    @else
                                        <span
                                            class="bg-[#C9996B]/30 text-[#7A6C5D] px-2 py-1 rounded-lg text-xs font-semibold">Selesai</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border-b border-[#D2A679]/20 text-center space-x-3">
                                    <a href="/pengaduan/{{ $p->id }}"
                                        class="text-[#C9996B] hover:text-[#7A6C5D] font-semibold transition-all">Detail</a>
                                    @if (Auth::user()->role === 'admin')
                                        <button onclick="openDeleteModal({{ $p->id }})"
                                            class="text-[#A12020] hover:text-red-700 font-semibold transition-all">Hapus</button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-[#7A6C5D]/60 py-6">Belum ada pengaduan yang
                                    dikirim.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="mt-6 flex justify-center">
                    @if ($pengaduans->hasPages())
                        <div
                            class="inline-flex items-center space-x-1 bg-[#F5E6D3]/60 backdrop-blur-md border border-[#D2A679]/30 rounded-xl px-3 py-2 shadow-sm">
                            {{-- Tombol Sebelumnya --}}
                            @if ($pengaduans->onFirstPage())
                                <span
                                    class="px-3 py-1 text-[#7A6C5D]/40 text-sm font-semibold cursor-not-allowed">&laquo;</span>
                            @else
                                <a href="{{ $pengaduans->previousPageUrl() }}"
                                    class="px-3 py-1 rounded-lg text-[#7A6C5D] hover:bg-[#D2A679]/40 hover:text-[#7A6C5D] font-semibold text-sm transition-all">&laquo;</a>
                            @endif

                            {{-- Nomor Halaman --}}
                            @foreach ($pengaduans->links()->elements[0] ?? [] as $page => $url)
                                @if ($page == $pengaduans->currentPage())
                                    <span
                                        class="px-3 py-1 rounded-lg bg-[#C9996B] text-white font-semibold text-sm shadow transition-all">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}"
                                        class="px-3 py-1 rounded-lg text-[#7A6C5D] hover:bg-[#F5E6D3] font-semibold text-sm transition-all">{{ $page }}</a>
                                @endif
                            @endforeach

                            {{-- Tombol Selanjutnya --}}
                            @if ($pengaduans->hasMorePages())
                                <a href="{{ $pengaduans->nextPageUrl() }}"
                                    class="px-3 py-1 rounded-lg text-[#7A6C5D] hover:bg-[#D2A679]/40 hover:text-[#7A6C5D] font-semibold text-sm transition-all">&raquo;</a>
                            @else
                                <span
                                    class="px-3 py-1 text-[#7A6C5D]/40 text-sm font-semibold cursor-not-allowed">&raquo;</span>
                            @endif
                        </div>
                    @endif
                </div>
            </div>

        </main>
    </div>

    {{-- Modal Konfirmasi Delete --}}
    <div id="deleteModal" class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">
        <div class="bg-white rounded-2xl shadow-xl p-8 max-w-sm w-full text-center border border-[#C0A785]/30">
            <h2 class="text-lg font-semibold text-[#7A6C5D] mb-3">Hapus Pengaduan?</h2>
            <p class="text-sm text-[#7A6C5D]/70 mb-6">Apakah kamu yakin ingin menghapus pengaduan ini? Tindakan ini tidak
                dapat dibatalkan.</p>

            <div class="flex justify-center space-x-4">
                <button onclick="closeDeleteModal()"
                    class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 text-[#7A6C5D] font-semibold transition-all">Batal</button>
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 rounded-lg bg-[#A12020] hover:bg-red-700 text-white font-semibold transition-all">Hapus</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(id) {
            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');
            form.action = `/pengaduan/${id}`;
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
