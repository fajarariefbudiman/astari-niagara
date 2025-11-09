@extends('layout.app')

@section('content')
    <div class="relative min-h-screen w-full overflow-hidden bg-gradient-to-br from-gray-50 via-white to-gray-100 text-gray-800">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0"
                style="background-image: radial-gradient(circle at 2px 2px, #C0A785 1px, transparent 0); background-size: 40px 40px;">
            </div>
        </div>

        <!-- Navigation -->
        <nav class="relative z-10 flex items-center justify-between px-8 py-6 border-b border-gray-200 bg-white/60 backdrop-blur-md shadow-sm">
            <div class="flex items-center gap-3">
                <img src="/astari.png" alt="Logo" class="h-10 w-auto">
                <span class="text-xl font-bold text-[#7A6C5D] tracking-wide">ASTARI NIAGARA</span>
            </div>
            <div class="flex items-center gap-6">
                <a href="/" class="text-[#7A6C5D] text-sm font-medium hover:text-[#C0A785] transition">Home</a>
                <a href="/about" class="text-gray-600 hover:text-[#C0A785] transition text-sm font-medium">About</a>
                <a href="/contact" class="text-gray-600 hover:text-[#C0A785] transition text-sm font-medium">Contact</a>
                <a href="/login"
                    class="px-5 py-2 bg-gradient-to-r from-[#C0A785] to-[#E5C49E] text-white font-semibold rounded-lg hover:from-[#E5C49E] hover:to-[#C0A785] transition text-sm shadow-md">
                    Login
                </a>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="relative z-10 flex flex-col items-center justify-center px-6 text-center py-20">
            <div class="max-w-3xl">
                <h1 class="text-5xl font-bold text-gray-800 mb-6 leading-tight">
                    <span class="text-[#7A6C5D]">Astari Niagara</span> Maintenance System
                </h1>
                <p class="text-lg text-gray-600 mb-4 leading-relaxed">
                    Sistem manajemen pemeliharaan mesin industri yang <span class="text-[#7A6C5D] font-semibold">efisien</span>,
                    <span class="text-[#C0A785] font-semibold">tepat waktu</span>, dan <span class="text-[#E5C49E] font-semibold">berstandar tinggi</span>.
                </p>
                <p class="text-md text-gray-500 mb-10 italic">
                    <span class="text-[#7A6C5D] font-semibold">PT Astari Niagara</span> – Tangerang, Banten, Indonesia
                </p>
                <div class="flex items-center justify-center gap-4">
                    <a href="/login"
                        class="px-8 py-4 bg-gradient-to-r from-[#7A6C5D] to-[#C0A785] text-white font-bold rounded-lg hover:from-[#C0A785] hover:to-[#E5C49E] transition shadow-lg hover:shadow-[#C0A785]/30 transform hover:scale-105">
                        Mulai Sekarang
                    </a>
                    <a href="/about"
                        class="px-8 py-4 border-2 border-[#C0A785] text-[#7A6C5D] font-semibold rounded-lg hover:bg-[#C0A785]/10 transition">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </div>

        <!-- Decorative Elements -->
        <div class="absolute top-1/3 left-20 w-40 h-40 bg-[#C0A785]/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/3 right-20 w-52 h-52 bg-[#E5C49E]/20 rounded-full blur-3xl"></div>
    </div>
@endsection
