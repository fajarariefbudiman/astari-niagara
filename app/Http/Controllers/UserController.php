<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $role = $request->get('role', 'user');
        $users = User::where('role', $role)->latest()->paginate(10);

        return view('admin.user-kelola-admin', compact('users', 'role'));
    }

    public function profileAdmin()
    {
        $admin = Auth::user();
        return view('akun-profil-admin', compact('admin'));
    }


    public function updateProfile(Request $request)
    {
        $admin = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->hasFile('foto')) {
            if ($admin->foto && Storage::exists('public/foto/' . $admin->foto)) {
                Storage::delete('public/foto/' . $admin->foto);
            }

            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '-admin-foto.' . $extension;

            $path = $file->storeAs('public/foto', $filename);

            // dd([
            //     'path' => $path,
            //     'exists' => Storage::exists($path),
            //     'absolute' => Storage::path($path),
            // ]);

            $admin->foto = $filename;
        }


        $admin->save();

        return back()->with('success', 'Profil berhasil diperbarui!');
    }

    public function create(Request $request)
    {
        $role = $request->get('role', 'user');
        return view('admin.user-tambah-admin', compact('role'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email' . (isset($user) ? ',' . $user->id : ''),
            'phone'      => 'string',
            'departemen' => $request->role === 'teknisi' ? 'required|string|max:255' : 'nullable|string|max:255',
            'password'   => isset($user) ? 'nullable|string|min:6' : 'required|string|min:6',
            'role'       => 'required|string|in:user,teknisi',
        ]);


        User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'departemen' => $request->departemen,
            'password'   => Hash::make($request->password),
            'role'       => $request->role,
        ]);

        return redirect()->route('users.index', ['role' => $request->role])
            ->with('success', 'User berhasil ditambahkan!');
    }

    public function edit(User $user)
    {
        return view('admin.user-tambah-admin', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'phone'      => 'string',
            'email'      => 'required|email|unique:users,email' . (isset($user) ? ',' . $user->id : ''),
            'departemen' => $request->role === 'teknisi' ? 'required|string|max:255' : 'nullable|string|max:255',
            'password'   => isset($user) ? 'nullable|string|min:6' : 'required|string|min:6',
            'role'       => 'required|string|in:user,teknisi',
        ]);


        $user->update([
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'departemen' => $request->departemen,
            'password'   => $request->filled('password') ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('users.index', ['role' => $user->role])
            ->with('success', 'User berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user =  User::findOrFail($id);
        $role = $user->role;
        $user->delete();

        return redirect()->route('users.index', ['role' => $role])
            ->with('success', 'User berhasil dihapus!');
    }
}
