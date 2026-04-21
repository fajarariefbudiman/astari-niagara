@extends('layout.app')

@section('content')
    <div class="flex min-h-screen bg-gradient-to-br from-gray-50 via-[#F7F5F2] to-[#EDE6DF] text-gray-800">
        <x-sidebar />

        <main class="flex-1 p-8 bg-[#F7F5F2]/60 backdrop-blur-md overflow-auto flex items-center justify-center relative">
            <div class="absolute top-1/4 right-16 w-52 h-52 bg-[#E5C49E]/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 left-10 w-40 h-40 bg-[#C0A785]/20 rounded-full blur-3xl"></div>

            <div class="w-full max-w-md relative z-10">
                <h1 class="text-3xl font-extrabold text-[#7A6C5D] mb-6">Ganti Password</h1>

                @if (session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 rounded-lg px-4 py-3">
                        <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                    </div>
                @endif

                <div class="bg-[#e9d8c3] border border-[#C0A785]/30 rounded-2xl p-8 shadow-lg">
                    <form method="POST" action="{{ route('password.change') }}" class="space-y-5">
                        @csrf

                        {{-- Password Lama --}}
                        <div>
                            <label class="block text-sm font-medium text-[#7A5A33] mb-1">
                                <i class="fas fa-lock mr-2"></i>Password Lama
                            </label>
                            <input type="password" name="password_lama"
                                class="w-full px-4 py-3 rounded-lg border border-[#C0A785]/40 bg-white/70 focus:outline-none focus:ring-2 focus:ring-[#C0A785]/60 transition-all"
                                placeholder="Masukkan password lama" required>
                            @error('password_lama')
                                <p class="text-red-600 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Password Baru --}}
                        <div>
                            <label class="block text-sm font-medium text-[#7A5A33] mb-1">
                                <i class="fas fa-lock mr-2"></i>Password Baru
                            </label>
                            <input type="password" name="password_baru"
                                class="w-full px-4 py-3 rounded-lg border border-[#C0A785]/40 bg-white/70 focus:outline-none focus:ring-2 focus:ring-[#C0A785]/60 transition-all"
                                placeholder="Minimal 8 karakter" required>
                            @error('password_baru')
                                <p class="text-red-600 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Konfirmasi Password Baru --}}
                        <div>
                            <label class="block text-sm font-medium text-[#7A5A33] mb-1">
                                <i class="fas fa-lock mr-2"></i>Konfirmasi Password Baru
                            </label>
                            <input type="password" name="password_baru_confirmation"
                                class="w-full px-4 py-3 rounded-lg border border-[#C0A785]/40 bg-white/70 focus:outline-none focus:ring-2 focus:ring-[#C0A785]/60 transition-all"
                                placeholder="Ulangi password baru" required>
                        </div>

                        <div class="pt-2">
                            <button type="submit"
                                class="w-full bg-gradient-to-r from-[#C0A785] to-[#E5C49E] hover:from-[#E5C49E] hover:to-[#C0A785] text-white font-semibold py-3 rounded-xl shadow-md transition-all">
                                <i class="fas fa-save mr-2"></i> Simpan Password Baru
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection