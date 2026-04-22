<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\UserController;
use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Forgot Password
Route::get('/forgot-password', fn () => view('auth.forgot-password'))->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink($request->only('email'));

    return $status === Password::RESET_LINK_SENT
        ? back()->with('status', 'Link reset password telah dikirim ke email Anda.')
        : back()->withErrors(['email' => 'Email tidak ditemukan.']);
})->name('password.email');

// Reset Password
Route::get('/reset-password/{token}', fn ($token) => view('auth.reset-password', ['token' => $token]))
    ->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password),
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect('/login')->with('status', 'Password berhasil direset, silakan login.')
        : back()->withErrors(['email' => __($status)]);
})->name('password.update');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        $pendingCount = Pengaduan::where('status', 'menunggu')->where('user_id', Auth::id())->count();
        $processingCount = Pengaduan::where('status', 'diproses')->where('user_id', Auth::id())->count();
        $completedCount = Pengaduan::where('status', 'selesai')->where('user_id', Auth::id())->count();

        return view('dashboard', compact('pendingCount', 'processingCount', 'completedCount'));
    });

    Route::get('/ganti-password', [UserController::class, 'showChangePassword']);
    Route::post('/ganti-password', [UserController::class, 'changePassword'])->name('password.change');

    Route::get('/admin/profile', function () {
        $admin = Auth::user();

        return view('akun-profil-admin', compact('admin'));
    });

    Route::get('/dashboard-admin', function () {
        $pengaduanCount = Pengaduan::count();
        $userCount = User::where('role', 'user')->count();
        $teknisiCount = User::where('role', 'teknisi')->count();

        return view('dashboard-admin', compact('pengaduanCount', 'userCount', 'teknisiCount'));
    });

    Route::get('/dashboard-teknisi', function () {
        $pendingCount = Pengaduan::where('status', 'menunggu')->count();
        $processingCount = Pengaduan::where('status', 'diproses')->count();
        $completedCount = Pengaduan::where('status', 'selesai')->count();

        return view('dashboard-teknisi', compact('pendingCount', 'processingCount', 'completedCount'));
    });

    Route::get('/riwayat-pengaduan', [PengaduanController::class, 'index']);
    Route::get('/input-pengaduan', [PengaduanController::class, 'create']);
    Route::post('/input-pengaduan', [PengaduanController::class, 'store']);
    Route::get('/pengaduan/{id}', [PengaduanController::class, 'show']);
    Route::put('/pengaduan/{id}', [PengaduanController::class, 'update']);
    Route::delete('/pengaduan/{id}', [PengaduanController::class, 'destroy']);

    Route::get('/laporan', [PengaduanController::class, 'laporan']);
    Route::get('/laporan/export/pdf', [PengaduanController::class, 'exportPdf'])->name('laporan.export.pdf');
    Route::get('/laporan/export/excel', [PengaduanController::class, 'exportExcel'])->name('laporan.export.excel');

    Route::get('/akun-profil-admin', [UserController::class, 'profileAdmin']);
    Route::put('/akun-profil-admin', [UserController::class, 'updateProfile'])->name('profile.update');

    Route::resource('/users', UserController::class);
    Route::resource('/teknisi', TeknisiController::class);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
