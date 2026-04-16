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

        <h1 class="text-3xl font-bold text-center text-[#7A6C5D] mb-2">Lupa Password</h1>
        <p class="text-sm text-[#7A6C5D]/70 mb-5">Masukkan email Anda untuk mereset password</p>

        <!-- Card -->
        <div
            class="relative z-10 w-full max-w-md bg-[#f7e9d7] border border-[#C0A785]/30 shadow-xl rounded-2xl p-8 backdrop-blur-md">

            @if (session('status'))
                <div class="mb-4 text-green-700 bg-green-100 border border-green-300 rounded-lg px-4 py-3 text-sm text-center">
                    <i class="fas fa-check-circle mr-1"></i> {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 text-red-600 text-center font-medium text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-6">
                    <label for="email" class="block text-[#7A6C5D] font-medium mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="w-full px-4 py-3 bg-white border border-[#C0A785]/40 text-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#C0A785] focus:border-[#C0A785] placeholder-gray-400 transition"
                        placeholder="Masukkan email Anda" required autofocus>
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-[#C0A785] to-[#E5C49E] text-white font-bold py-3 rounded-lg hover:from-[#E5C49E] hover:to-[#C0A785] transition-all shadow-lg hover:shadow-[#C0A785]/40 transform hover:scale-105">
                    <i class="fas fa-paper-plane mr-2"></i> Kirim Link Reset
                </button>
            </form>

            <div class="mt-5 text-center">
                <a href="{{ url('/login') }}"
                    class="text-sm text-[#C0A785] hover:text-[#7A6C5D] hover:underline font-medium transition">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali ke Login
                </a>
            </div>
        </div>
    </div>
@endsection