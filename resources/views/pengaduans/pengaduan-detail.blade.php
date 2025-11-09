@extends('layout.app')

@section('content')
    <div class="flex min-h-screen bg-gradient-to-br from-[#F7F5F2] via-[#F0ECE6] to-[#EAE6DF] text-[#3E2F1C]">

        {{-- Sidebar --}}
        <x-sidebar />

        {{-- Main Content --}}
        <main class="flex-1 p-10 bg-[#F7F5F2] text-[#3E2F1C] overflow-auto">
            <h1 class="text-4xl font-bold mb-8 pb-2 text-[#7A6C5D]">
                @if (Auth::user()->role === 'teknisi')
                    Update Pengaduan {{ 'NP' . str_pad($pengaduan->id, 4, '0', STR_PAD_LEFT) }}
                @else
                    Detail Pengaduan {{ 'NP' . str_pad($pengaduan->id, 4, '0', STR_PAD_LEFT) }}
                @endif
            </h1>

            @if (session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 rounded-lg px-4 py-3">
                    <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                </div>
            @endif

            @if (Auth::user()->role === 'teknisi')
                <form method="POST" action="{{ url('/pengaduan/' . $pengaduan->id) }}"
                    class="bg-[#e9d8c3] border border-[#C0A785]/30 rounded-2xl p-8 shadow-lg w-full max-w-5xl">
                    @csrf
                    @method('PUT')
                @else
                    <div class="bg-[#e9d8c3] border border-[#C0A785]/30 rounded-2xl p-8 shadow-lg w-full max-w-5xl">
            @endif

            {{-- Grid Informasi --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                @foreach ([
            'ID Pengaduan' => 'NP' . str_pad($pengaduan->id, 4, '0', STR_PAD_LEFT),
            'Tanggal Laporan' => $pengaduan->tanggal_laporan,
            'Nama Pelapor' => $pengaduan->user->name ?? '-',
            'Jabatan' => $pengaduan->jabatan_pelapor ?? '-',
            'Departemen' => $pengaduan->departemen ?? '-',
            'Nama Mesin' => $pengaduan->nama_mesin ?? '-',
        ] as $label => $value)
                    <div>
                        <label class="block text-sm font-medium text-[#7A5A33] mb-1">{{ $label }}</label>
                        <input type="text" readonly value="{{ $value }}"
                            class="w-full bg-[#FAF9F7] border border-[#D9C6A5]/60 text-[#3E2F1C] rounded-lg px-4 py-2">
                    </div>
                @endforeach
            </div>

            {{-- Keterangan --}}
            <div class="mb-6">
                <label class="block text-sm font-medium text-[#7A5A33] mb-1">Keterangan</label>
                <textarea rows="3" readonly
                    class="w-full bg-[#FAF9F7] border border-[#D9C6A5]/60 text-[#3E2F1C] rounded-lg px-4 py-2">{{ $pengaduan->keterangan }}</textarea>
            </div>

            {{-- Status --}}
            <div class="mb-6">
                <label class="block text-sm font-medium text-[#7A5A33] mb-2">Status Pengaduan</label>

                @if (Auth::user()->role === 'teknisi')
                    <div
                        class="flex flex-col sm:flex-row gap-6 bg-[#FAF9F7] border border-[#D9C6A5]/60 rounded-lg px-4 py-3">
                        <label class="inline-flex items-center text-[#3E2F1C]">
                            <input type="radio" name="status" value="menunggu"
                                {{ $pengaduan->status == 'menunggu' ? 'checked' : '' }}
                                class="appearance-none w-4 h-4 border-2 border-[#3E2F1C] rounded-full checked:bg-[#3E2F1C] checked:border-[#3E2F1C] focus:ring-2 focus:ring-[#7A5A33] transition-all duration-150">
                            <span class="ml-2">Sedang Diajukan</span>
                        </label>

                        <label class="inline-flex items-center text-[#3E2F1C]">
                            <input type="radio" name="status" value="diproses"
                                {{ $pengaduan->status == 'diproses' ? 'checked' : '' }}
                                class="appearance-none w-4 h-4 border-2 border-[#3E2F1C] rounded-full checked:bg-[#3E2F1C] checked:border-[#3E2F1C] focus:ring-2 focus:ring-[#7A5A33] transition-all duration-150">
                            <span class="ml-2">Sedang Diproses</span>
                        </label>

                        <label class="inline-flex items-center text-[#3E2F1C]">
                            <input type="radio" name="status" value="selesai"
                                {{ $pengaduan->status == 'selesai' ? 'checked' : '' }}
                                class="appearance-none w-4 h-4 border-2 border-[#3E2F1C] rounded-full checked:bg-[#3E2F1C] checked:border-[#3E2F1C] focus:ring-2 focus:ring-[#7A5A33] transition-all duration-150">
                            <span class="ml-2">Selesai Diproses</span>
                        </label>
                    </div>
                @else
                    <div class="bg-[#FAF9F7] border border-[#D9C6A5]/60 rounded-lg px-4 py-3">
                        <div class="flex flex-col sm:flex-row gap-6 text-[#3E2F1C]">
                            <label class="inline-flex items-center">
                                <input type="radio" disabled {{ $pengaduan->status == 'menunggu' ? 'checked' : '' }}
                                    class="appearance-none w-4 h-4 border-2 border-[#3E2F1C] rounded-full checked:bg-[#3E2F1C] checked:border-[#3E2F1C]">
                                <span class="ml-2">Sedang Diajukan</span>
                            </label>

                            <label class="inline-flex items-center">
                                <input type="radio" disabled {{ $pengaduan->status == 'diproses' ? 'checked' : '' }}
                                    class="appearance-none w-4 h-4 border-2 border-[#3E2F1C] rounded-full checked:bg-[#3E2F1C] checked:border-[#3E2F1C]">
                                <span class="ml-2">Sedang Diproses</span>
                            </label>

                            <label class="inline-flex items-center">
                                <input type="radio" disabled {{ $pengaduan->status == 'selesai' ? 'checked' : '' }}
                                    class="appearance-none w-4 h-4 border-2 border-[#3E2F1C] rounded-full checked:bg-[#3E2F1C] checked:border-[#3E2F1C]">
                                <span class="ml-2">Selesai Diproses</span>
                            </label>
                        </div>
                    </div>
                @endif
            </div>


            {{-- Catatan Petugas --}}
            <div class="mb-6">
                <label class="block text-sm font-medium text-[#7A5A33] mb-1">
                    Catatan dari Petugas
                    @if (Auth::user()->role === 'teknisi')
                        <span class="text-[#A87E52] text-xs ml-1">(Wajib diisi)</span>
                    @endif
                </label>

                @if (Auth::user()->role === 'teknisi')
                    <textarea name="hasil_perbaikan" rows="4" required
                        class="w-full bg-[#FAF9F7] border border-[#D9C6A5]/60 text-[#3E2F1C] rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#C0A785]"
                        placeholder="Masukkan hasil perbaikan atau catatan...">{{ $pengaduan->hasil_perbaikan ?? '' }}</textarea>
                @else
                    <textarea rows="4" readonly
                        class="w-full bg-[#FAF9F7] border border-[#D9C6A5]/60 text-[#3E2F1C] rounded-lg px-4 py-2">{{ $pengaduan->hasil_perbaikan ?? 'Belum ada catatan dari petugas.' }}</textarea>
                @endif
            </div>

            {{-- Tombol --}}
            <div class="mt-8 flex gap-3">
                <a href="/riwayat-pengaduan"
                    class="bg-[#EDE7DE] hover:bg-[#E2D8CC] text-[#3E2F1C] font-semibold px-6 py-2 rounded-lg shadow-md transition-all">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>

                @if (Auth::user()->role === 'teknisi')
                    <button type="submit"
                        class="bg-[#C0A785] hover:bg-[#B08E65] text-white font-semibold px-6 py-2 rounded-lg shadow-md transition-all">
                        <i class="fas fa-save mr-2"></i> Simpan Perubahan
                    </button>
                @endif
            </div>

            @if (Auth::user()->role === 'teknisi')
                </form>
            @else
    </div>
    @endif
    </main>
    </div>
@endsection
