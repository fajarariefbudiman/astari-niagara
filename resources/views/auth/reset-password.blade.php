@extends('layout.app')

@section('content')
    <div
        class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100 text-gray-800 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0"
                style="background-image: radial-gradient(circle at 2px 2px, #C0A785 1px, transparent 0); background-size: 40px 40px;">
            </div>
        </div>
        <div class="absolute top-1/3 left-10 w-40 h-40 bg-[#C0A785]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/3 right-10 w-52 h-52 bg-[#E5C49E]/10 rounded-full blur-3xl"></div>

        <h1 class="text-3xl font-bold text-center text-[#7A6C5D] mb-2">Reset Password</h1>
        <p class="text-sm text-[#7A6C5D]/70 mb-5">Buat password baru untuk akun Anda</p>

        <div
            class="relative z-10 w-full max-w-md bg-[#f7e9d7] border border-[#C0A785]/30 shadow-xl rounded-2xl p-8 backdrop-blur-md">

            @if ($errors->any())
                <div class="mb-4 text-red-600 text-center font-medium text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-5">
                    <label for="email" class="block text-[#7A6C5D] font-medium mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', request('email')) }}"
                        class="w-full px-4 py-3 bg-white border border-[#C0A785]/40 text-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#C0A785] placeholder-gray-400 transition"
                        placeholder="Masukkan email Anda" required>
                </div>

                <div class="mb-5">
                    <label for="password" class="block text-[#7A6C5D] font-medium mb-2">Password Baru</label>
                    <input type="password" name="password" id="password"
                        class="w-full px-4 py-3 bg-white border border-[#C0A785]/40 text-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#C0A785] placeholder-gray-400 transition"
                        placeholder="Minimal 6 karakter" required>
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-[#7A6C5D] font-medium mb-2">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="w-full px-4 py-3 bg-white border border-[#C0A785]/40 text-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#C0A785] placeholder-gray-400 transition"
                        placeholder="Ulangi password baru" required>
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-[#C0A785] to-[#E5C49E] text-white font-bold py-3 rounded-lg hover:from-[#E5C49E] hover:to-[#C0A785] transition-all shadow-lg transform hover:scale-105">
                    <i class="fas fa-key mr-2"></i> Reset Password
                </button>
            </form>
        </div>
    </div>
@endsection