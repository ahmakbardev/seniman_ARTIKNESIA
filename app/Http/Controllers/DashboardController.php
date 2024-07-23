<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        if ($this->checkPassword(Auth::user()->password)) {
            return view('seniman.index', ['showModal' => true]);
        }
        return view('seniman.index', ['showModal' => false]);
    }

    private function checkPassword($hashedPassword)
    {
        return Hash::check('senimanpassword', $hashedPassword);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $hashedPassword = Hash::make($request->new_password);

        DB::table('users')
            ->where('id', Auth::id())
            ->update(['password' => $hashedPassword]);

        return redirect()->route('dashboard.seniman', ['locale' => app()->getLocale()])
            ->with('success', 'Password berhasil diperbarui.');
    }
}
