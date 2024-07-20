<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KaryaController extends Controller
{
    public function index()
    {
        $karyas = Karya::all();
        return view('seniman.karya.index', compact('karyas'));
    }

    public function create()
    {
        // Mendapatkan data user yang sedang login
        $user = Auth::user();
        $subkategori = DB::table('subkategoris')->where('id', $user->subkategori)->first();
        $jenisKarya = DB::table('jenis_karyas')->where('id', $subkategori->jenis_karya_id)->first();

        $maxPrice = null;
        switch ($user->paket_id) {
            case 1:
                $maxPrice = 500000;
                break;
            case 2:
                $maxPrice = 10000000;
                break;
            case 3:
                $maxPrice = 50000000;
                break;
            default:
                break;
        }

        return view('seniman.karya.create', [
            'category_id' => $subkategori->id,
            'jenisKarya' => $jenisKarya->nama,
            'maxPrice' => $maxPrice
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $maxPrice = null;
        switch ($user->paket_id) {
            case 1:
                $maxPrice = 500000;
                break;
            case 2:
                $maxPrice = 10000000;
                break;
            case 3:
                $maxPrice = 50000000;
                break;
            default:
                break;
        }

        $request->validate([
            'name' => 'required',
            'images.*' => 'image|max:10240', // Max 10MB per image
            'size_x' => 'required|integer',
            'size_y' => 'required|integer',
            'weight' => 'required|numeric',
            'material' => 'required|string',
            'philosophy' => 'required|string',
            'price' => ['required', 'numeric', "max:$maxPrice"], // Add max validation rule
            'stock' => 'required|integer',
            'category_id' => 'required',
        ]);

        $mediaFiles = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $mediaFiles[] = $file->store('media', 'public');
            }
        }

        Karya::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'images' => json_encode($mediaFiles),
            'size_x' => $request->size_x,
            'size_y' => $request->size_y,
            'weight' => $request->weight,
            'material' => $request->material,
            'philosophy' => $request->philosophy,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'status' => 'pending',
        ]);

        return redirect()->route('seniman.karya.index', ['locale' => app()->getLocale()])->with('success', 'Karya berhasil ditambahkan');
    }

    public function edit($locale, Karya $karya)
    {
        // Mendapatkan data user yang sedang login
        $user = Auth::user();
        $subkategori = DB::table('subkategoris')->where('id', $user->subkategori)->first();
        $jenisKarya = DB::table('jenis_karyas')->where('id', $subkategori->jenis_karya_id)->first();

        $maxPrice = null;
        switch ($user->paket_id) {
            case 1:
                $maxPrice = 500000;
                break;
            case 2:
                $maxPrice = 10000000;
                break;
            case 3:
                $maxPrice = 50000000;
                break;
            default:
                break;
        }

        return view('seniman.karya.edit', [
            'karya' => $karya,
            'category_id' => $subkategori->id,
            'jenisKarya' => $jenisKarya->nama,
            'maxPrice' => $maxPrice
        ]);
    }

    public function update(Request $request, $locale, Karya $karya)
    {
        $user = Auth::user();

        $maxPrice = null;
        switch ($user->paket_id) {
            case 1:
                $maxPrice = 500000;
                break;
            case 2:
                $maxPrice = 10000000;
                break;
            case 3:
                $maxPrice = 50000000;
                break;
            default:
                break;
        }

        $request->validate([
            'name' => 'required',
            'images.*' => 'image|max:10240', // Max 10MB per image
            'size_x' => 'required|integer',
            'size_y' => 'required|integer',
            'weight' => 'required|numeric',
            'material' => 'required|string',
            'philosophy' => 'required|string',
            'price' => ['required', 'numeric', "max:$maxPrice"], // Add max validation rule
            'stock' => 'required|integer',
            'category_id' => 'required',
        ]);

        $mediaFiles = json_decode($karya->images, true) ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $mediaFiles[] = $file->store('media', 'public');
            }
        }

        $karya->update([
            'name' => $request->name,
            'images' => json_encode($mediaFiles),
            'size_x' => $request->size_x,
            'size_y' => $request->size_y,
            'weight' => $request->weight,
            'material' => $request->material,
            'philosophy' => $request->philosophy,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('seniman.karya.index', ['locale' => app()->getLocale()])->with('success', 'Karya berhasil diperbarui');
    }
}
