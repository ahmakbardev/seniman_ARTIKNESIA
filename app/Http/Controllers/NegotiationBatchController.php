<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use App\Models\NegotiationBatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NegotiationBatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $negotiationBatches = NegotiationBatch::query()->whereHas('product', function ($query) {
            $query->where('user_id', Auth::id());
        })->with('product')->get();

        return view('seniman.batch.index', compact('negotiationBatches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karya = Karya::query()->where('user_id', Auth::id())->where('price', '>=', 5000000)->get();
        return view('seniman.batch.create', compact('karya'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'karya'            => 'required',
            'tanggal_berakhir' => 'required',
        ]);

        $count = NegotiationBatch::query()->where('product_id', $request->karya)->count();
        NegotiationBatch::query()->create([
            'product_id' => $request->karya,
            'batch'      => $count + 1,
            'finish_at'  => $request->tanggal_berakhir,
        ]);

        return redirect()->route('seniman.batch.index', ['locale' => app()->getLocale()])->with('success', 'Negosiasi periode berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
