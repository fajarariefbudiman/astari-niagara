@extends('layout.app')

@section('content')
    <div class="flex min-h-screen bg-gradient-to-br from-[#F7F5F2] via-[#F0ECE6] to-[#EAE6DF] text-[#3E2F1C]">

        <x-sidebar />
        {{-- Main Form --}}
        <main class="flex-1 p-10 bg-[#F7F5F2] text-[#3E2F1C] overflow-auto">

            <h1 class="text-4xl font-bold mb-8 pb-3 text-[#7A6C5D]">
                Form Pengaduan Kerusakan Mesin
            </h1>

            <form action="/input-pengaduan" method="POST"
                class="bg-[#e9d8c3] border border-[#C0A785]/30 rounded-2xl p-8 shadow-lg w-full max-w-3xl ">
                @csrf

                {{-- ID --}}
                <div class="mb-5">
                    <label class="block text-sm font-medium text-[#7A5A33] mb-1">ID Laporan</label>
                    <input type="text" name="kode" value="NP{{ str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT) }}" readonly
                        class="w-full bg-[#FAF9F7] border border-[#D9C6A5]/60 text-[#3E2F1C] rounded-lg px-4 py-2">
                </div>

                {{-- Nama Pelapor --}}
                <div class="mb-5">
                    <label class="block text-sm font-medium text-[#7A5A33] mb-1">Nama Pelapor</label>
                    <input type="text" name="nama_pelapor" value="{{ Auth::user()->name }}" readonly
                        class="w-full bg-[#FAF9F7] border border-[#D9C6A5]/60 text-[#3E2F1C] rounded-lg px-4 py-2">
                </div>

                {{-- Tanggal Laporan --}}
                <div class="mb-5">
                    <label class="block text-sm font-medium text-[#7A5A33] mb-1">Tanggal Laporan</label>
                    <input type="date" name="tanggal_laporan" required
                        class="w-full bg-[#FAF9F7] border border-[#D9C6A5]/60 text-[#3E2F1C] rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#C0A785] focus:border-transparent">
                </div>

                {{-- Jabatan --}}
                <div class="mb-5">
                    <label class="block text-sm font-medium text-[#7A5A33] mb-1">Jabatan Pelapor</label>
                    <input type="text" name="jabatan_pelapor" placeholder="Contoh: Operator Mesin" required
                        class="w-full bg-[#FAF9F7] border border-[#D9C6A5]/60 text-[#3E2F1C] rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#C0A785] focus:border-transparent">
                </div>

                {{-- Departemen --}}
                <div class="mb-5">
                    <label class="block text-sm font-medium text-[#7A5A33] mb-1">Departemen</label>
                    <input type="text" name="departemen" placeholder="Contoh: Produksi" required
                        class="w-full bg-[#FAF9F7] border border-[#D9C6A5]/60 text-[#3E2F1C] rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#C0A785] focus:border-transparent">
                </div>

                {{-- Nama Mesin --}}
                <div class="mb-5">
                    <label class="block text-sm font-medium text-[#7A5A33] mb-1">Nama Mesin</label>
                    <input type="text" name="nama_mesin" placeholder="Contoh: Mesin Potong A12" required
                        class="w-full bg-[#FAF9F7] border border-[#D9C6A5]/60 text-[#3E2F1C] rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#C0A785] focus:border-transparent">
                </div>

                {{-- Keterangan --}}
                <div class="mb-6">
                    <label class="block text-sm font-medium text-[#7A5A33] mb-1">Keterangan</label>
                    <textarea name="keterangan" rows="4" placeholder="Jelaskan kerusakan yang terjadi..." required
                        class="w-full bg-[#FAF9F7] border border-[#D9C6A5]/60 text-[#3E2F1C] rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#C0A785] focus:border-transparent"></textarea>
                </div>

                {{-- Tombol --}}
                <div class="mt-8 flex flex-wrap gap-3">
                    <button type="submit"
                        class="bg-[#C0A785] hover:bg-[#B08E65] text-white font-semibold px-6 py-2 rounded-lg shadow-md transition-all">
                        <i class="fas fa-save mr-2"></i> Simpan
                    </button>

                    <button type="reset"
                        class="bg-[#EDE7DE] hover:bg-[#E2D8CC] text-[#3E2F1C] font-semibold px-6 py-2 rounded-lg shadow-md transition-all">
                        <i class="fas fa-redo mr-2"></i> Reset
                    </button>
                </div>
            </form>


        </main>
    </div>
@endsection
