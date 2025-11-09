<aside class="w-64 bg-[#F7F5F2]/80 backdrop-blur-md border-r border-[#C0A785]/30 shadow-lg relative">
    {{-- Pattern --}}
    <div class="absolute inset-0 opacity-[0.08] pointer-events-none"
        style="background-image: radial-gradient(circle at 2px 2px, #C0A785 1px, transparent 0); background-size: 35px 35px;">
    </div>

    {{-- Logo/Header --}}
    <div class="relative p-6 border-b border-[#C0A785]/30">
        <div class="flex items-center space-x-3">
            <img src="/astari.png" alt="Logo" class="w-10 h-10 object-contain">

            <p class="text-sm text-[#7A6C5D]/80">
                Halo, <span class="font-semibold text-[#C0A785]">{{ Auth::user()->name }}</span>
            </p>
        </div>
    </div>

    {{-- Navigation --}}
    @if (Auth::user()->role === 'admin')
        <nav class="relative p-4" x-data="{ openMenu: {{ Request::is('users', 'teknisi', 'admin/profile') ? 'true' : 'false' }} }">
            <ul class="space-y-1.5">
                <li>
                    <a href="/dashboard-admin"
                        class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ Request::is('dashboard-admin') ? 'bg-gradient-to-r from-[#C0A785] to-[#E5C49E] text-white font-semibold shadow hover:from-[#E5C49E] hover:to-[#C0A785]' : 'text-[#7A6C5D] hover:bg-[#EDE6DF]/70' }} transition-all hover:scale-[1.02]">
                        <i class="fas fa-home text-lg"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="/riwayat-pengaduan"
                        class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ Request::is('riwayat-pengaduan') ? 'bg-gradient-to-r from-[#C0A785] to-[#E5C49E] text-white font-semibold shadow hover:from-[#E5C49E] hover:to-[#C0A785]' : 'text-[#7A6C5D] hover:bg-[#EDE6DF]/70' }} transition-all hover:scale-[1.02]">
                        <i class="fas fa-database text-lg"></i>
                        <span>Data Pengaduan</span>
                    </a>
                </li>

                <li>
                    <a href="/laporan"
                        class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ Request::is('laporan') ? 'bg-gradient-to-r from-[#C0A785] to-[#E5C49E] text-white font-semibold shadow hover:from-[#E5C49E] hover:to-[#C0A785]' : 'text-[#7A6C5D] hover:bg-[#EDE6DF]/70' }} transition-all hover:scale-[1.02]">
                        <i class="fas fa-file-alt text-lg"></i>
                        <span>Laporan</span>
                    </a>
                </li>

                {{-- Dropdown Kelola Data --}}
                <li>
                    <button @click="openMenu = !openMenu"
                        class="w-full flex items-center justify-between px-4 py-3 rounded-lg text-[#7A6C5D] hover:bg-[#EDE6DF]/70 transition-all">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-folder-open text-lg"></i>
                            <span>Kelola Data</span>
                        </div>
                        <i class="fas fa-chevron-down text-sm transition-transform duration-200"
                            :class="{ 'rotate-180': openMenu }"></i>
                    </button>

                    {{-- Submenu --}}
                    <ul x-show="openMenu" x-transition class="pl-12 mt-1 space-y-1 text-[#7A6C5D]/90 text-sm">
                        <li>
                            <a href="/users"
                                class="block px-3 py-2 rounded-lg {{ Request::is('users') ? 'bg-gradient-to-r from-[#C0A785] to-[#E5C49E] text-white font-semibold' : 'hover:bg-[#EDE6DF]/70' }} transition-all">
                                <i class="fas fa-user mr-2 text-xs"></i> Data User
                            </a>
                        </li>
                        <li>
                            <a href="/teknisi"
                                class="block px-3 py-2 rounded-lg {{ Request::is('teknisi') ? 'bg-gradient-to-r from-[#C0A785] to-[#E5C49E] text-white font-semibold' : 'hover:bg-[#EDE6DF]/70' }} transition-all">
                                <i class="fas fa-user-cog mr-2 text-xs"></i> Data Teknisi
                            </a>
                        </li>
                        <li>
                            <a href="/admin/profile"
                                class="block px-3 py-2 rounded-lg {{ Request::is('admin/profile') ? 'bg-gradient-to-r from-[#C0A785] to-[#E5C49E] text-white font-semibold' : 'hover:bg-[#EDE6DF]/70' }} transition-all">
                                <i class="fas fa-id-badge mr-2 text-xs"></i> Profil Akun
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            {{-- Logout --}}
            <div class="mt-8 pt-4 border-t border-[#C0A785]/20">
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit"
                        class="flex items-center space-x-3 px-4 py-3 rounded-lg text-[#7A6C5D]/80 hover:text-[#A12020] hover:bg-[#EDE6DF]/70 transition-all w-full">
                        <i class="fas fa-sign-out-alt text-lg"></i>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </nav>
    @elseif (Auth::user()->role === 'user')
        <nav class="relative p-4" x-data="{ openMenu: {{ Request::is('users', 'teknisi', 'admin/profile') ? 'true' : 'false' }} }">
            <ul class="space-y-1.5">
                <li>
                    <a href="/dashboard"
                        class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ Request::is('dashboard') ? 'bg-gradient-to-r from-[#C0A785] to-[#E5C49E] text-white font-semibold shadow hover:from-[#E5C49E] hover:to-[#C0A785]' : 'text-[#7A6C5D] hover:bg-[#EDE6DF]/70' }} transition-all hover:scale-[1.02]">
                        <i class="fas fa-home text-lg"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="/riwayat-pengaduan"
                        class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ Request::is('riwayat-pengaduan') ? 'bg-gradient-to-r from-[#C0A785] to-[#E5C49E] text-white font-semibold shadow hover:from-[#E5C49E] hover:to-[#C0A785]' : 'text-[#7A6C5D] hover:bg-[#EDE6DF]/70' }} transition-all hover:scale-[1.02]">
                        <i class="fas fa-clipboard-list text-lg"></i>
                        <span>Riwayat Pengaduan</span>
                    </a>
                </li>

                <li>
                    <a href="/input-pengaduan"
                        class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ Request::is('input-pengaduan') ? 'bg-gradient-to-r from-[#C0A785] to-[#E5C49E] text-white font-semibold shadow hover:from-[#E5C49E] hover:to-[#C0A785]' : 'text-[#7A6C5D] hover:bg-[#EDE6DF]/70' }} transition-all hover:scale-[1.02]">
                        <i class="fas fa-file-alt text-lg"></i>
                        <span>Input Pengaduan</span>
                    </a>
                </li>


            </ul>

            {{-- Logout --}}
            <div class="mt-8 pt-4 border-t border-[#C0A785]/20">
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit"
                        class="flex items-center space-x-3 px-4 py-3 rounded-lg text-[#7A6C5D]/80 hover:text-[#A12020] hover:bg-[#EDE6DF]/70 transition-all w-full">
                        <i class="fas fa-sign-out-alt text-lg"></i>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </nav>
    @elseif (Auth::user()->role === 'teknisi')
        <nav class="relative p-4" x-data="{ openMenu: {{ Request::is('users', 'teknisi', 'admin/profile') ? 'true' : 'false' }} }">
            <ul class="space-y-1.5">
                <li>
                    <a href="/dashboard-teknisi"
                        class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ Request::is('dashboard-teknisi') ? 'bg-gradient-to-r from-[#C0A785] to-[#E5C49E] text-white font-semibold shadow hover:from-[#E5C49E] hover:to-[#C0A785]' : 'text-[#7A6C5D] hover:bg-[#EDE6DF]/70' }} transition-all hover:scale-[1.02]">
                        <i class="fas fa-home text-lg"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="/riwayat-pengaduan"
                        class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ Request::is('riwayat-pengaduan') ? 'bg-gradient-to-r from-[#C0A785] to-[#E5C49E] text-white font-semibold shadow hover:from-[#E5C49E] hover:to-[#C0A785]' : 'text-[#7A6C5D] hover:bg-[#EDE6DF]/70' }} transition-all hover:scale-[1.02]">
                        <i class="fas fa-database text-lg"></i>
                        <span>Data Pengaduan</span>
                    </a>
                </li>
            </ul>

            {{-- Logout --}}
            <div class="mt-8 pt-4 border-t border-[#C0A785]/20">
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit"
                        class="flex items-center space-x-3 px-4 py-3 rounded-lg text-[#7A6C5D]/80 hover:text-[#A12020] hover:bg-[#EDE6DF]/70 transition-all w-full">
                        <i class="fas fa-sign-out-alt text-lg"></i>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </nav>
    @endif
</aside>
