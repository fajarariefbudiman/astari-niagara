@extends('layout.app')

@section('content')
    <div
        class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100 text-gray-800 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0"
                style="background-image: radial-gradient(circle at 2px 2px, #C0A785 1px, transparent 0); background-size: 40px 40px;">
            </div>
        </div>

        <!-- Decorative Blurs -->
        <div class="absolute top-1/3 left-10 w-40 h-40 bg-[#C0A785]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/3 right-10 w-52 h-52 bg-[#E5C49E]/10 rounded-full blur-3xl"></div>

        <h1 class="text-3xl font-bold text-center text-[#7A6C5D] mb-5">Registrasi</h1>
        <!-- Card -->
        <div
            class="relative z-10 w-full max-w-lg bg-[#f7e9d7] border border-[#C0A785]/30 shadow-xl rounded-2xl p-8 backdrop-blur-md">

            <!-- Error message -->
            @if ($errors->any())
                <div class="mb-4 text-red-600 text-center font-medium">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ url('/registrasi') }}">
                @csrf

                <div class="mb-5">
                    <label for="name" class="block text-[#7A6C5D] font-medium mb-2">Nama Lengkap</label>
                    <input type="text" name="name" id="name"
                        class="w-full px-4 py-3 bg-white border border-[#C0A785]/40 text-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#C0A785] focus:border-[#C0A785] placeholder-gray-400 transition"
                        placeholder="Masukkan nama lengkap Anda" required>
                </div>

                <div class="mb-5">
                    <label for="email" class="block text-[#7A6C5D] font-medium mb-2">Email</label>
                    <input type="email" name="email" id="email"
                        class="w-full px-4 py-3 bg-white border border-[#C0A785]/40 text-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#C0A785] focus:border-[#C0A785] placeholder-gray-400 transition"
                        placeholder="Masukkan email Anda" required>
                </div>

                <div class="mb-5">
                    <label for="phone" class="block text-[#7A6C5D] font-medium mb-2">No. Telepon</label>
                    <input type="text" name="phone" id="phone"
                        class="w-full px-4 py-3 bg-white border border-[#C0A785]/40 text-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#C0A785] focus:border-[#C0A785] placeholder-gray-400 transition"
                        placeholder="Masukkan nomor telepon">
                </div>

                <div class="mb-5">
                    <label class="block text-sm font-medium text-[#7A6C5D] mb-2" for="departemen">
                        <i class="fas fa-building mr-2"></i>Departemen
                    </label>
                    <select name="departemen" id="departemen"
                        class="w-full px-4 py-3 rounded-lg border border-[#C0A785]/40 bg-white/70 focus:outline-none focus:ring-2 focus:ring-[#C0A785]/60 focus:border-transparent transition-all">
                        <option value="">-- Pilih Departemen --</option>
                        <option value="produksi"
                            {{ old('departemen', $user->departemen ?? '') == 'produksi' ? 'selected' : '' }}>Produksi
                        </option>
                        <option value="pemeliharaan"
                            {{ old('departemen', $user->departemen ?? '') == 'pemeliharaan' ? 'selected' : '' }}>
                            Pemeliharaan</option>
                        <option value="quality_control"
                            {{ old('departemen', $user->departemen ?? '') == 'quality_control' ? 'selected' : '' }}>Quality
                            Control</option>
                        <option value="logistik"
                            {{ old('departemen', $user->departemen ?? '') == 'logistik' ? 'selected' : '' }}>Logistik
                        </option>
                    </select>
                </div>

                <div class="mb-5">
                    <label for="password" class="block text-[#7A6C5D] font-medium mb-2">Password</label>
                    <input type="password" name="password" id="password"
                        class="w-full px-4 py-3 bg-white border border-[#C0A785]/40 text-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#C0A785] focus:border-[#C0A785] placeholder-gray-400 transition"
                        placeholder="Masukkan password" required>
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-[#7A6C5D] font-medium mb-2">Konfirmasi
                        Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="w-full px-4 py-3 bg-white border border-[#C0A785]/40 text-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#C0A785] focus:border-[#C0A785] placeholder-gray-400 transition"
                        placeholder="Ulangi password" required>
                </div>

                <div class="flex items-center justify-between mb-6">
                    <a href="{{ url('/login') }}"
                        class="text-sm text-[#C0A785] hover:text-[#7A6C5D] hover:underline font-medium transition">
                        Sudah punya akun? Login
                    </a>
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-[#C0A785] to-[#E5C49E] text-white font-bold py-3 rounded-lg hover:from-[#E5C49E] hover:to-[#C0A785] transition-all shadow-lg hover:shadow-[#C0A785]/40 transform hover:scale-105">
                    Daftar Sekarang
                </button>
            </form>
        </div>
    </div>
@endsection
