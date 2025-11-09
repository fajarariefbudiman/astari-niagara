@extends('layout.app')

@section('content')
    <div class="flex min-h-screen bg-gradient-to-br from-gray-50 via-[#F7F5F2] to-[#EDE6DF] text-gray-800">
        {{-- Sidebar --}}
        <x-sidebar />

        {{-- Main Content --}}
        <main class="flex-1 p-8 bg-[#F7F5F2]/60 backdrop-blur-md text-gray-800 overflow-auto relative">
            {{-- Decorative Blurs --}}
            <div class="absolute top-1/4 right-16 w-52 h-52 bg-[#E5C49E]/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 left-10 w-40 h-40 bg-[#C0A785]/20 rounded-full blur-3xl"></div>

            {{-- Header --}}
            <div class="mb-10 relative z-10">
                <h1 class="text-4xl font-extrabold text-[#7A6C5D] mb-2">Dashboard Admin</h1>
                <p class="text-[#7A6C5D]/70 text-sm">Selamat datang di sistem monitoring pengaduan mesin</p>
            </div>

            {{-- Cards Statistik --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8 relative z-10">
                {{-- Data Pengaduan --}}
                <div
                    class="bg-[#F5E6D3] border border-[#D2A679] rounded-2xl p-6 shadow-md hover:shadow-lg hover:scale-[1.02] transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-[#C9996B] rounded-xl flex items-center justify-center">
                            <i class="fas fa-clipboard-list text-white text-xl"></i>
                        </div>
                        <span class="text-xs font-semibold text-[#7A6C5D] bg-[#F5E6D3]/80 px-3 py-1 rounded-full">
                            Pengaduan
                        </span>
                    </div>
                    <h2 class="font-semibold text-[#7A6C5D] mb-2 text-sm uppercase tracking-wide">Total Pengaduan</h2>
                    <p class="text-3xl font-bold text-[#C9996B]">{{ $pengaduanCount ?? 0 }}</p>
                </div>

                {{-- Users --}}
                <div
                    class="bg-[#F5E6D3] border border-[#D2A679] rounded-2xl p-6 shadow-md hover:shadow-lg hover:scale-[1.02] transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-[#C9996B] rounded-xl flex items-center justify-center">
                            <i class="fas fa-users text-white text-xl"></i>
                        </div>
                        <span class="text-xs font-semibold text-[#7A6C5D] bg-[#F5E6D3]/80 px-3 py-1 rounded-full">
                            Users
                        </span>
                    </div>
                    <h2 class="font-semibold text-[#7A6C5D] mb-2 text-sm uppercase tracking-wide">Total User</h2>
                    <p class="text-3xl font-bold text-[#C9996B]">{{ $userCount ?? 0 }}</p>
                </div>

                {{-- Teknisi --}}
                <div
                    class="bg-[#F5E6D3] border border-[#D2A679] rounded-2xl p-6 shadow-md hover:shadow-lg hover:scale-[1.02] transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-[#C9996B] rounded-xl flex items-center justify-center">
                            <i class="fas fa-user-cog text-white text-xl"></i>
                        </div>
                        <span class="text-xs font-semibold text-[#7A6C5D] bg-[#F5E6D3]/80 px-3 py-1 rounded-full">
                            Teknisi
                        </span>
                    </div>
                    <h2 class="font-semibold text-[#7A6C5D] mb-2 text-sm uppercase tracking-wide">Total Teknisi</h2>
                    <p class="text-3xl font-bold text-[#C9996B]">{{ $teknisiCount ?? 0 }}</p>
                </div>
            </div>


        </main>
    </div>
@endsection
