@extends('layout.app')

@section('content')
    <div
        class="relative min-h-screen w-full overflow-hidden bg-gradient-to-br from-gray-50 via-white to-gray-100 text-gray-800">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0"
                style="background-image: radial-gradient(circle at 2px 2px, #C0A785 1px, transparent 0); background-size: 40px 40px;">
            </div>
        </div>

        <!-- Decorative Blurs -->
        <div class="absolute top-1/3 left-10 w-40 h-40 bg-[#C0A785]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/3 right-10 w-52 h-52 bg-[#E5C49E]/10 rounded-full blur-3xl"></div>

        <!-- Navigation -->
        <nav
            class="relative z-10 flex items-center justify-between px-8 py-6 border-b border-gray-200 bg-white/60 backdrop-blur-md shadow-sm">
            <div class="flex items-center gap-3">
                <img src="/astari.png" alt="logo" class="h-10 w-auto">
                <span class="text-xl font-bold text-[#7A6C5D] tracking-wide">ASTARI NIAGARA</span>
            </div>
            <div class="flex items-center gap-6">
                <a href="/" class="text-gray-600 hover:text-[#C0A785] transition text-sm font-medium">Home</a>
                <a href="/about" class="text-[#7A6C5D] text-sm font-medium">About</a>
                <a href="/contact" class="text-gray-600 hover:text-[#C0A785] transition text-sm font-medium">Contact</a>
                <a href="/login"
                    class="px-5 py-2 bg-gradient-to-r from-[#C0A785] to-[#E5C49E] text-white font-semibold rounded-lg hover:from-[#E5C49E] hover:to-[#C0A785] transition text-sm shadow-md">
                    Login
                </a>
            </div>
        </nav>

        <!-- About Content -->
        <section class="relative z-10 max-w-5xl mx-auto px-6 py-20">
            <div class="text-center mb-16">
                <h1 class="text-5xl font-bold text-[#7A6C5D] mb-4">Tentang Kami</h1>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
                    <span class="font-semibold text-[#7A6C5D]">PT Astari Niagara</span> adalah perusahaan manufaktur yang
                    berkomitmen untuk menyediakan
                    solusi inovatif di bidang pengelolaan dan pemeliharaan mesin industri. Kami mengembangkan sistem yang
                    efisien, terintegrasi, dan mudah digunakan untuk mendukung produktivitas serta keberlanjutan operasional
                    industri modern.
                </p>
            </div>

            <!-- Two Column Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div
                    class="bg-gradient-to-b from-[#EDE6DF]/30 to-[#F7F5F2] border border-[#C0A785]/20 rounded-2xl p-8 shadow-md hover:shadow-[#C0A785]/10 transition">
                    <h2 class="text-2xl font-bold text-[#7A6C5D] mb-4">Visi Kami</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Menjadi pelopor dalam pengelolaan pemeliharaan mesin industri berbasis digital yang
                        <span class="text-[#C0A785] font-semibold">efisien</span>, <span
                            class="text-[#E5C49E] font-semibold">berdaya saing</span>,
                        dan <span class="text-[#7A6C5D] font-semibold">berkelanjutan</span> untuk meningkatkan kualitas dan
                        produktivitas industri global.
                    </p>
                </div>

                <div
                    class="bg-gradient-to-b from-[#EDE6DF]/30 to-[#F7F5F2] border border-[#C0A785]/20 rounded-2xl p-8 shadow-md hover:shadow-[#C0A785]/10 transition">
                    <h2 class="text-2xl font-bold text-[#7A6C5D] mb-4">Misi Kami</h2>
                    <ul class="space-y-3 text-gray-600 leading-relaxed list-disc list-inside">
                        <li>Menyediakan sistem pelaporan dan pemeliharaan mesin yang cepat dan akurat.</li>
                        <li>Memfasilitasi kolaborasi antara operator, teknisi, dan manajemen.</li>
                        <li>Meningkatkan efisiensi melalui analitik data yang terintegrasi.</li>
                        <li>Mendukung transformasi digital menuju era industri 4.0.</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="relative z-10 text-center text-gray-500 py-6 border-t border-gray-200 bg-white/60">
            <p>© 2025 PT Astari Niagara. All rights reserved.</p>
        </footer>
    </div>
@endsection
