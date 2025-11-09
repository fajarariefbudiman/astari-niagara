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
                <a href="/about" class="text-gray-600 hover:text-[#C0A785] transition text-sm font-medium">About</a>
                <a href="/contact" class="text-[#7A6C5D] text-sm font-medium">Contact</a>
                <a href="/login"
                    class="px-5 py-2 bg-gradient-to-r from-[#C0A785] to-[#E5C49E] text-white font-semibold rounded-lg hover:from-[#E5C49E] hover:to-[#C0A785] transition text-sm shadow-md">
                    Login
                </a>
            </div>
        </nav>

        <!-- Contact Section -->
        <section class="relative z-10 max-w-6xl mx-auto px-6 py-20">
            <div class="text-center mb-16">
                <h1 class="text-5xl font-bold text-[#7A6C5D] mb-4">Hubungi Kami</h1>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
                    Punya pertanyaan, saran, atau ingin bekerja sama dengan <span class="font-semibold text-[#7A6C5D]">PT
                        Astari Niagara</span>?
                    Kami siap membantu Anda. Silakan isi formulir di bawah ini atau hubungi kami melalui media sosial resmi.
                </p>
            </div>

            <!-- Form dan Tim -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-stretch">
                <!-- Form -->
                <form action="#" method="POST"
                    class="bg-gradient-to-b from-[#EDE6DF]/30 to-[#F7F5F2] border border-[#C0A785]/30 rounded-2xl p-8 shadow-md hover:shadow-[#C0A785]/10 transition flex flex-col justify-between h-full">
                    @csrf
                    <div>
                        <div class="mb-5">
                            <label for="name" class="block text-[#7A6C5D] font-medium mb-2">Nama</label>
                            <input type="text" name="name" id="name"
                                class="w-full px-4 py-3 bg-white border border-[#C0A785]/30 text-gray-700 rounded-lg focus:ring-2 focus:ring-[#C0A785] placeholder-gray-400"
                                placeholder="Nama lengkap Anda" required>
                        </div>
                        <div class="mb-5">
                            <label for="email" class="block text-[#7A6C5D] font-medium mb-2">Email</label>
                            <input type="email" name="email" id="email"
                                class="w-full px-4 py-3 bg-white border border-[#C0A785]/30 text-gray-700 rounded-lg focus:ring-2 focus:ring-[#C0A785] placeholder-gray-400"
                                placeholder="Alamat email aktif" required>
                        </div>
                        <div class="mb-5">
                            <label for="message" class="block text-[#7A6C5D] font-medium mb-2">Pesan</label>
                            <textarea name="message" id="message" rows="5"
                                class="w-full px-4 py-3 bg-white border border-[#C0A785]/30 text-gray-700 rounded-lg focus:ring-2 focus:ring-[#C0A785] placeholder-gray-400"
                                placeholder="Tulis pesan Anda di sini..." required></textarea>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full mt-4 bg-gradient-to-r from-[#C0A785] to-[#E5C49E] text-white font-bold py-3 rounded-lg hover:from-[#E5C49E] hover:to-[#C0A785] transition-all shadow-lg hover:shadow-[#C0A785]/40 transform hover:scale-105">
                        Kirim Pesan
                    </button>
                </form>

                <!-- Tim Pengembang -->
                <div class="flex flex-col justify-between h-full">
                    <h2 class="text-2xl font-bold text-[#7A6C5D] mb-8 text-center md:text-left">Tim Pengembang</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 flex-grow">
                        <!-- Rahman -->
                        <div
                            class="bg-white border border-[#C0A785]/30 rounded-2xl p-6 shadow-md hover:shadow-[#C0A785]/40 transition-all hover:scale-105 flex flex-col justify-between">
                            <div>
                                <img src="boy.png" alt="Rahman"
                                    class="w-24 h-24 rounded-full mx-auto mb-4 border-2 border-[#C0A785] object-cover">
                                <h3 class="text-lg font-semibold text-[#7A6C5D] text-center">Rahman</h3>
                                <p class="text-sm text-gray-600 mb-2 text-center">Programmer</p>
                                <p class="text-gray-600 text-sm mb-3 text-center">Ahli API dan keamanan server, memastikan
                                    sistem berjalan optimal.</p>
                                <blockquote class="italic text-[#C0A785] text-sm text-center">“Konsistensi adalah kunci
                                    keberhasilan.”</blockquote>
                            </div>
                        </div>

                        <!-- Riska -->
                        <div
                            class="bg-white border border-[#C0A785]/30 rounded-2xl p-6 shadow-md hover:shadow-[#C0A785]/40 transition-all hover:scale-105 flex flex-col justify-between">
                            <div>
                                <img src="girl.png" alt="Rahayu"
                                    class="w-24 h-24 rounded-full mx-auto mb-4 border-2 border-[#C0A785] object-cover">
                                <h3 class="text-lg font-semibold text-[#7A6C5D] text-center">Rahayu</h3>
                                <p class="text-sm text-gray-600 mb-2 text-center">UI/UX Designer</p>
                                <p class="text-gray-600 text-sm mb-3 text-center">Mendesain antarmuka yang estetis, modern,
                                    dan mudah digunakan.</p>
                                <blockquote class="italic text-[#C0A785] text-sm text-center">“Setiap detail memiliki
                                    makna.”</blockquote>
                            </div>
                        </div>

                        <!-- Ridho -->
                        <div
                            class="bg-white border border-[#C0A785]/30 rounded-2xl p-6 shadow-md hover:shadow-[#C0A785]/40 transition-all hover:scale-105 flex flex-col justify-between">
                            <div>
                                <img src="girl.png" alt="Firyal"
                                    class="w-24 h-24 rounded-full mx-auto mb-4 border-2 border-[#C0A785] object-cover">
                                <h3 class="text-lg font-semibold text-[#7A6C5D] text-center">Firyal</h3>
                                <p class="text-sm text-gray-600 mb-2 text-center">System Analyst</p>
                                <p class="text-gray-600 text-sm mb-3 text-center">Analisis kebutuhan &
                                    dokumentasi sistem.</p>
                                <blockquote class="italic text-[#C0A785] text-sm text-center">“Kreativitas tumbuh dari
                                    kesederhanaan.”</blockquote>
                            </div>
                        </div>

                        <!-- Rizki -->
                        <div
                            class="bg-white border border-[#C0A785]/30 rounded-2xl p-6 shadow-md hover:shadow-[#C0A785]/40 transition-all hover:scale-105 flex flex-col justify-between">
                            <div>
                                <img src="girl.png" alt="Sheilla"
                                    class="w-24 h-24 rounded-full mx-auto mb-4 border-2 border-[#C0A785] object-cover">
                                <h3 class="text-lg font-semibold text-[#7A6C5D] text-center">Sheilla</h3>
                                <p class="text-sm text-gray-600 mb-2 text-center">Project Manager</p>
                                <p class="text-gray-600 text-sm mb-3 text-center">Mengelola strategi, koordinasi tim, dan
                                    memastikan visi proyek tercapai.</p>
                                <blockquote class="italic text-[#C0A785] text-sm text-center">“Kolaborasi menciptakan
                                    keajaiban.”</blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="relative z-10 text-center text-gray-500 py-6 border-t border-gray-200 bg-white/60">
            <p>© 2025 PT Astari Niagara. All rights reserved.</p>
        </footer>
    </div>
@endsection
