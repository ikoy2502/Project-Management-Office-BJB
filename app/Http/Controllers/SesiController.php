<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    public function index()
    {
       return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'GH') {
                return redirect('admin/GH');
            } elseif (Auth::user()->role == 'MGR') {
                return redirect('admin/MGR');
            } elseif (Auth::user()->role == 'SPV') {
                return redirect('admin/SPV');
            } elseif (Auth::user()->role == 'Staff') {
                return redirect('admin/Staff');
            } elseif (Auth::user()->role == 'QA') {
                return redirect('admin/QA');
            }
        } else {
            return redirect()->route('login')->withErrors([
                'email' => 'Invalid email or password.',
            ])->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('welcome');
    }
}
