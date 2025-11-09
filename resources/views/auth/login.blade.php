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

        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="/astari.png" alt="Logo" class="h-20 w-auto">
        </div>
        <h1 class="text-3xl font-bold text-center text-[#7A6C5D] mb-8">Selamat Datang</h1>
        <!-- Card -->
        <div
            class="relative z-10 w-full max-w-sm bg-[#f7e9d7] border border-[#C0A785]/30 shadow-xl rounded-2xl p-8 backdrop-blur-md">

            <h1 class="text-2xl font-bold text-center text-[#7A6C5D] mb-8">Maintenance Machines</h1>
            <!-- Error message -->
            @if ($errors->any())
                <div class="mb-4 text-red-600 text-center font-medium">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ url('/login') }}">
                @csrf
                <!-- Input Email -->
                <div class="mb-5 relative">
                    <label for="email" class="block text-[#7A6C5D] font-medium mb-2">Email</label>
                    <input type="email" name="email" id="email"
                        class="w-full px-4 py-3 pr-10 bg-white border border-[#C0A785]/40 text-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#C0A785] focus:border-[#C0A785] placeholder-gray-400 transition"
                        placeholder="Masukkan email Anda" required autofocus>
                    <!-- Icon Surat -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#C0A785"
                        class="w-5 h-5 absolute right-3 top-14 transform -translate-y-1/2 pointer-events-none">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25H4.5a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5H4.5a2.25 2.25 0 00-2.25 2.25m19.5 0L12 12.75 2.25 6.75" />
                    </svg>
                </div>

                <!-- Input Password -->
                <div class="mb-5 relative">
                    <label for="password" class="block text-[#7A6C5D] font-medium mb-2">Password</label>
                    <input type="password" name="password" id="password"
                        class="w-full px-4 py-3 pr-10 bg-white border border-[#C0A785]/40 text-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#C0A785] focus:border-[#C0A785] placeholder-gray-400 transition"
                        placeholder="Masukkan password" required>
                    <!-- Icon Gembok -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#C0A785"
                        class="w-5 h-5 absolute right-3 top-14 transform -translate-y-1/2 pointer-events-none">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 10.5V7.125a4.125 4.125 0 10-8.25 0V10.5m10.125 0H5.625A1.125 1.125 0 004.5 11.625v8.25c0 .621.504 1.125 1.125 1.125h13.5c.621 0 1.125-.504 1.125-1.125v-8.25A1.125 1.125 0 0018.75 10.5z" />
                    </svg>
                </div>

                <!-- Link Registrasi -->
                <div class="flex items-center justify-between mb-6">
                    <a href="{{ url('/registrasi') }}"
                        class="text-sm text-[#C0A785] hover:text-[#7A6C5D] hover:underline font-medium transition">
                        Belum punya akun? Registrasi
                    </a>
                </div>

                <!-- Tombol Login -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-[#C0A785] to-[#E5C49E] text-white font-bold py-3 rounded-lg hover:from-[#E5C49E] hover:to-[#C0A785] transition-all shadow-lg hover:shadow-[#C0A785]/40 transform hover:scale-105">
                    Login
                </button>
            </form>
        </div>
    </div>
@endsection
