@extends('layout.app')

@section('content')
    @php
        $user = $user ?? ($teknisi ?? null);
        $isTeknisi = Request::is('teknisi/create') || Request::is('teknisi/*/edit');
    @endphp

    <div class="flex min-h-screen bg-gradient-to-br from-gray-50 via-[#F7F5F2] to-[#EDE6DF] text-gray-800">
        {{-- Sidebar --}}
        <x-sidebar />

        {{-- Main Content --}}
        <main class="flex-1 bg-[#F7F5F2]/60 backdrop-blur-md text-gray-800 overflow-auto flex flex-col relative">
            <div class="absolute top-1/4 right-16 w-56 h-56 bg-[#E5C49E]/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 left-10 w-44 h-44 bg-[#C0A785]/20 rounded-full blur-3xl"></div>

            {{-- Form --}}
            <div class="flex-1 flex items-center justify-center p-8 relative z-10">
                <div class="w-full max-w-md">
                    <div
                        class="bg-[#e9d8c3] border border-[#C0A785]/30 rounded-2xl p-8 shadow-lg w-full max-w-3xl ">
                        <form
                            action="{{ isset($user) ? ($isTeknisi ? route('teknisi.update', $user->id) : route('users.update', $user->id)) : ($isTeknisi ? route('teknisi.store') : route('users.store')) }}"
                            method="POST" class="space-y-5">
                            @csrf
                            @if (isset($user))
                                @method('PUT')
                            @endif
                            <input type="hidden" name="role" value="{{ $isTeknisi ? 'teknisi' : 'user' }}">

                            {{-- Nama --}}
                            <div>
                                <label class="block text-sm font-medium text-[#7A6C5D] mb-2" for="name">
                                    <i class="fas fa-user mr-2"></i>Nama Lengkap
                                </label>
                                <input type="text" name="name" id="name"
                                    class="w-full px-4 py-3 rounded-lg border border-[#C0A785]/40 bg-white/70 focus:outline-none focus:ring-2 focus:ring-[#C0A785]/60 focus:border-transparent transition-all"
                                    placeholder="Masukkan nama lengkap" value="{{ old('name', $user->name ?? '') }}"
                                    required>
                                @error('name')
                                    <p class="text-red-600 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div>
                                <label class="block text-sm font-medium text-[#7A6C5D] mb-2" for="email">
                                    <i class="fas fa-envelope mr-2"></i>Email
                                </label>
                                <input type="email" name="email" id="email"
                                    class="w-full px-4 py-3 rounded-lg border border-[#C0A785]/40 bg-white/70 focus:outline-none focus:ring-2 focus:ring-[#C0A785]/60 focus:border-transparent transition-all"
                                    placeholder="contoh@email.com" value="{{ old('email', $user->email ?? '') }}"
                                    required>
                                @error('email')
                                    <p class="text-red-600 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Telepon --}}
                            <div>
                                <label class="block text-sm font-medium text-[#7A6C5D] mb-2" for="phone">
                                    <i class="fas fa-phone mr-2"></i>No. Telepon
                                </label>
                                <input type="text" name="phone" id="phone"
                                    class="w-full px-4 py-3 rounded-lg border border-[#C0A785]/40 bg-white/70 focus:outline-none focus:ring-2 focus:ring-[#C0A785]/60 focus:border-transparent transition-all"
                                    placeholder="08xxxxxxxxxx" value="{{ old('phone', $user->phone ?? '') }}">
                            </div>

                            {{-- Departemen (jika teknisi) --}}
                            {{-- @if ($isTeknisi) --}}
                                <div>
                                    <label class="block text-sm font-medium text-[#7A6C5D] mb-2" for="departemen">
                                        <i class="fas fa-building mr-2"></i>Departemen
                                    </label>
                                    <select name="departemen" id="departemen"
                                        class="w-full px-4 py-3 rounded-lg border border-[#C0A785]/40 bg-white/70 focus:outline-none focus:ring-2 focus:ring-[#C0A785]/60 focus:border-transparent transition-all">
                                        <option value="">-- Pilih Departemen --</option>
                                        <option value="produksi" {{ old('departemen', $user->departemen ?? '') == 'produksi' ? 'selected' : '' }}>Produksi</option>
                                        <option value="pemeliharaan" {{ old('departemen', $user->departemen ?? '') == 'pemeliharaan' ? 'selected' : '' }}>Pemeliharaan</option>
                                        <option value="quality_control" {{ old('departemen', $user->departemen ?? '') == 'quality_control' ? 'selected' : '' }}>Quality Control</option>
                                        <option value="logistik" {{ old('departemen', $user->departemen ?? '') == 'logistik' ? 'selected' : '' }}>Logistik</option>
                                    </select>
                                </div>
                            {{-- @endif --}}

                            {{-- Password --}}
                            <div>
                                <label class="block text-sm font-medium text-[#7A6C5D] mb-2" for="password">
                                    <i class="fas fa-lock mr-2"></i>Password
                                    @if (isset($user))
                                        <span class="text-xs text-[#7A6C5D]/60">(Kosongkan jika tidak ingin mengubah)</span>
                                    @endif
                                </label>
                                <input type="password" name="password" id="password"
                                    class="w-full px-4 py-3 rounded-lg border border-[#C0A785]/40 bg-white/70 focus:outline-none focus:ring-2 focus:ring-[#C0A785]/60 focus:border-transparent transition-all"
                                    placeholder="Minimal 8 karakter" {{ isset($user) ? '' : 'required' }}>
                            </div>

                            {{-- Tombol Submit --}}
                            <div class="pt-4">
                                <button type="submit"
                                    class="w-full bg-gradient-to-r from-[#C0A785] to-[#E5C49E] hover:from-[#E5C49E] hover:to-[#C0A785] text-white font-semibold py-3 rounded-xl shadow-md transition-all transform hover:scale-[1.02] active:scale-[0.98]">
                                    <i class="fas fa-save mr-2"></i>
                                    {{ isset($user) ? ($isTeknisi ? 'Update Data Teknisi' : 'Update Data User') : ($isTeknisi ? 'Simpan Data Teknisi' : 'Simpan Data User') }}
                                </button>
                            </div>
                        </form>
                    </div>

                    <p class="text-center text-[#7A6C5D]/60 text-sm mt-4">
                        <i class="fas fa-info-circle mr-1"></i>
                        Pastikan semua data terisi dengan benar.
                    </p>
                </div>
            </div>

        </main>
    </div>
@endsection
