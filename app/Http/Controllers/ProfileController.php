<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function uploadProfilePic(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:1024', // 1MB Max
        ]);

        $filePath = $request->file('file')->store('profile-pics', 'public');

        return response()->json(['filePath' => $filePath]);
    }
}
