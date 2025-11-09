@extends('layout.app')

@section('content')
    <div class="flex min-h-screen bg-gradient-to-br from-gray-50 via-[#F7F5F2] to-[#EDE6DF] text-gray-800">

        {{-- Sidebar --}}
        <x-sidebar />

        {{-- Main Content --}}
        <main class="flex-1 p-10 bg-[#F7F5F2]/60 backdrop-blur-md text-gray-800 overflow-auto relative">

            <div class="absolute top-1/4 right-16 w-56 h-56 bg-[#E5C49E]/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 left-10 w-44 h-44 bg-[#C0A785]/20 rounded-full blur-3xl"></div>

            <div class="mb-10 relative z-10">
                <h1 class="text-4xl font-extrabold text-[#7A6C5D] mb-2">Laporan Pengaduan</h1>
                <p class="text-[#7A6C5D]/70 text-sm">Filter dan ekspor laporan berdasarkan tanggal</p>
            </div>

            {{-- Filter Form --}}
            <div
                class="bg-[#F5E6D3] border border-[#D2A679]/30 rounded-2xl shadow-md p-6 mb-10 relative z-10">
                <form action="/laporan" method="GET" class="space-y-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm text-[#7A6C5D] mb-1">Dari Tanggal</label>
                            <input type="date" name="tanggal_awal" value="{{ request('tanggal_awal') }}" required
                                class="w-full bg-white border border-[#C0A785]/40 rounded-lg px-3 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#C0A785]/60">
                        </div>
                        <div>
                            <label class="block text-sm text-[#7A6C5D] mb-1">Ke Tanggal</label>
                            <input type="date" name="tanggal_akhir" value="{{ request('tanggal_akhir') }}" required
                                class="w-full bg-white border border-[#C0A785]/40 rounded-lg px-3 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#C0A785]/60">
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-4">
                        <button type="submit"
                            class="bg-gradient-to-r from-[#C0A785] to-[#E5C49E] hover:from-[#E5C49E] hover:to-[#C0A785] text-white font-semibold px-5 py-2.5 rounded-xl shadow-md transition-all flex items-center space-x-2">
                            <i class="fas fa-search"></i>
                            <span>Cari</span>
                        </button>

                        <a href="/laporan"
                            class="bg-[#EDE6DF] hover:bg-[#E5C49E]/30 text-[#7A6C5D] font-semibold px-5 py-2.5 rounded-xl shadow-md transition-all flex items-center space-x-2">
                            <i class="fas fa-undo"></i>
                            <span>Reset</span>
                        </a>
                    </div>
                </form>

                @if (isset($laporan) && count($laporan) > 0)
                    <div class="mt-6 flex flex-wrap gap-3">
                        <a href="/laporan/export/pdf?tanggal_awal={{ request('tanggal_awal') }}&tanggal_akhir={{ request('tanggal_akhir') }}"
                            target="_blank"
                            class="bg-[#A12020] hover:bg-red-700 text-white px-5 py-2.5 rounded-xl shadow-md flex items-center space-x-2 transition-all">
                            <i class="fas fa-file-pdf"></i>
                            <span>Export PDF</span>
                        </a>

                        <a href="/laporan/export/excel?tanggal_awal={{ request('tanggal_awal') }}&tanggal_akhir={{ request('tanggal_akhir') }}"
                            class="bg-[#C0A785] hover:bg-[#E5C49E] text-white px-5 py-2.5 rounded-xl shadow-md flex items-center space-x-2 transition-all">
                            <i class="fas fa-file-excel"></i>
                            <span>Export Excel</span>
                        </a>
                    </div>
                @endif
            </div>

            {{-- Hasil Laporan --}}
            @if (isset($laporan))
                <div
                    class="bg-[#F5E6D3] border border-[#D2A679]/30 rounded-2xl shadow-md p-6 relative z-10">
                    <h2 class="text-lg font-semibold text-[#7A6C5D] mb-4">Hasil Laporan</h2>

                    <table class="min-w-full text-sm text-left border-collapse">
                        <thead class="bg-[#C0A785]/10 text-[#7A6C5D] uppercase text-xs tracking-wider">
                            <tr>
                                <th class="px-4 py-3 border-b border-[#C0A785]/30">No</th>
                                <th class="px-4 py-3 border-b border-[#C0A785]/30">ID</th>
                                <th class="px-4 py-3 border-b border-[#C0A785]/30">Nama</th>
                                <th class="px-4 py-3 border-b border-[#C0A785]/30">Mesin</th>
                                <th class="px-4 py-3 border-b border-[#C0A785]/30">Tanggal</th>
                                <th class="px-4 py-3 border-b border-[#C0A785]/30">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($laporan as $index => $data)
                                <tr class="hover:bg-[#EDE6DF]/70 transition-all">
                                    <td class="px-4 py-2 border-b border-[#C0A785]/20">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2 border-b border-[#C0A785]/20">
                                        NP{{ str_pad($data->id, 4, '0', STR_PAD_LEFT) }}</td>
                                    <td class="px-4 py-2 border-b border-[#C0A785]/20">{{ $data->nama_pelapor }}</td>
                                    <td class="px-4 py-2 border-b border-[#C0A785]/20">{{ $data->nama_mesin }}</td>
                                    <td class="px-4 py-2 border-b border-[#C0A785]/20">{{ $data->tanggal_laporan }}</td>
                                    <td class="px-4 py-2 border-b border-[#C0A785]/20 capitalize">{{ $data->status }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-[#7A6C5D]/60 py-6">Tidak ada data ditemukan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @endif

        </main>
    </div>
@endsection
