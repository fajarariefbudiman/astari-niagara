@extends('layout.app')

@section('content')
    {{-- Sidebar --}}
    <div class="flex min-h-screen bg-gradient-to-br from-gray-50 via-[#F7F5F2] to-[#EDE6DF] text-gray-800">
        <x-sidebar />

        {{-- Main Content --}}

        <main class="flex-1 p-8 bg-[#F7F5F2]/60 backdrop-blur-md text-gray-800 overflow-auto relative">
            {{-- Decorative Blurs --}}
            <div class="absolute top-1/4 right-16 w-52 h-52 bg-[#E5C49E]/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 left-10 w-40 h-40 bg-[#C0A785]/20 rounded-full blur-3xl"></div>

            {{-- Header --}}
            <div class="mb-10 relative z-10">
                <h1 class="text-4xl font-extrabold text-[#7A6C5D] mb-2">Dashboard</h1>
                <p class="text-[#7A6C5D]/70 text-sm">Selamat datang di sistem monitoring mesin</p>
            </div>

            {{-- Cards Statistik --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8 relative z-10">
                {{-- Sedang Diajukan --}}
                <div
                    class="bg-[#F5E6D3] border border-[#D2A679] rounded-2xl p-6 shadow-md hover:shadow-lg hover:scale-[1.02] transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-[#C9996B] rounded-xl flex items-center justify-center">
                            <i class="fas fa-clock text-white text-xl"></i>
                        </div>
                        <span class="text-xs font-semibold text-[#7A6C5D] bg-[#F5E6D3]/80 px-3 py-1 rounded-full">
                            Pending
                        </span>
                    </div>
                    <h2 class="font-semibold text-[#7A6C5D] mb-2 text-sm uppercase tracking-wide">Sedang Diajukan</h2>
                    <p class="text-3xl font-bold text-[#C9996B]">{{ $pendingCount ?? 0 }} Data</p>
                </div>

                {{-- Sedang Diproses --}}
                <div
                    class="bg-[#F5E6D3] border border-[#D2A679] rounded-2xl p-6 shadow-md hover:shadow-lg hover:scale-[1.02] transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-[#E5B76B] rounded-xl flex items-center justify-center">
                            <i class="fas fa-cog fa-spin text-white text-xl"></i>
                        </div>
                        <span class="text-xs font-semibold text-[#7A6C5D] bg-[#F5E6D3]/80 px-3 py-1 rounded-full">
                            Processing
                        </span>
                    </div>
                    <h2 class="font-semibold text-[#7A6C5D] mb-2 text-sm uppercase tracking-wide">Sedang Diproses</h2>
                    <p class="text-3xl font-bold text-[#E5B76B]">{{ $processingCount ?? 0 }} Data</p>
                </div>

                {{-- Selesai Diproses --}}
                <div
                    class="bg-[#F5E6D3] border border-[#D2A679] rounded-2xl p-6 shadow-md hover:shadow-lg hover:scale-[1.02] transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-[#A5B878] rounded-xl flex items-center justify-center">
                            <i class="fas fa-check-circle text-white text-xl"></i>
                        </div>
                        <span class="text-xs font-semibold text-[#7A6C5D] bg-[#F5E6D3]/80 px-3 py-1 rounded-full">
                            Completed
                        </span>
                    </div>
                    <h2 class="font-semibold text-[#7A6C5D] mb-2 text-sm uppercase tracking-wide">Selesai Diproses</h2>
                    <p class="text-3xl font-bold text-[#A5B878]">{{ $completedCount ?? 0 }} Data</p>
                </div>
            </div>

        </main>

    </div>
@endsection
