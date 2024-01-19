<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;; // Pastikan namespace model sesuai dengan struktur Anda
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $users = User::all(); // Fetch users from the database or any other data source
        $users = User::orderBy('role')->get();

        return view('user.index', ['users' => $users]);
    }
   

    public function showForm()

    {
        $users = User::all(); // Mengambil semua data pengguna dari tabel "users"
        dd($users);
        return view('projects.create', compact('users'));
    }

    public function store(Request $request)
{
    // Validasi input sesuai kebutuhan
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'role' => 'required|in:GH,MGR,SPV,Staff,QA',
        'password' => 'required|string|min:8',
        // Tambahkan validasi input lainnya sesuai dengan database
    ], [
        'name.required' => 'Nama harus diisi.',
        'email.required' => 'Email harus diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email sudah digunakan.',
        'role.required' => 'Role harus dipilih.',
        'role.in' => 'Role harus salah satu dari GH, MGR, SPV, Staff, atau QA.',
        'password.required' => 'Password harus diisi.',
        'password.min' => 'Password minimal harus 8 karakter.',
    ]);

    // Buat data user baru dengan password yang di-hash
    $user = new User([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'role' => $request->input('role'),
        'password' => bcrypt($request->input('password')),
    ]);
    
    $user->save();
    
    
    return redirect()->route('user.index')->with('success', 'User baru berhasil ditambahkan.');
}

public function someAction()
{
    // Memuat pengguna yang saat ini masuk dengan hubungan UserAkses
    $user = Auth::user()->with('userAkses')->first();

    // Sekarang Anda dapat menggunakan $user dan hubungan UserAkses
    if ($user->userAkses->hasAnyRole(['GH', 'MGR'])) {
        // Lakukan sesuatu jika pengguna memiliki peran GH atau MGR
    }
}
}