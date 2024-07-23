<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function show()
    {
        // Retrieve the authenticated user's data
        $user = Auth::user();

        // Fetch related data using DB::table
        $role = DB::table('roles')->where('id', $user->role_id)->first();
        $jenisKarya = DB::table('jenis_karyas')->where('id', $user->jenis_karya)->first();
        $subkategori = DB::table('subkategoris')->where('id', $user->subkategori)->first();
        $kota = DB::table('kotas')->where('id', $user->alamat)->first();
        $provinsi = $kota ? DB::table('provinsis')->where('id', $kota->provinsi_id)->first() : null;

        // Pass the user's data to the view
        return view('seniman.profile.index', compact('user', 'role', 'jenisKarya', 'subkategori', 'kota', 'provinsi'));
    }

    public function uploadProfilePic(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:1024', // 1MB Max
        ]);

        $filePath = $request->file('file')->store('profile-pics', 'public');

        return response()->json(['filePath' => $filePath]);
    }
}
