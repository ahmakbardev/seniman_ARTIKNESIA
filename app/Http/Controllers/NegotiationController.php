<?php

namespace App\Http\Controllers;

use App\Models\Negotiation;
use App\Models\NegotiationBatch;
use App\Services\RajaOngkir;
use Illuminate\Http\Request;

class NegotiationController extends Controller
{
    public function index($id, NegotiationBatch $batch)
    {
        $batch->load(['negotiations' => function ($query) {
            $query->orderBy('price', 'desc');
        }, 'negotiations.customer', 'negotiations.artist']);
        $allStatus = $batch->negotiations->pluck('status')->toArray();
        $status    = true;
        if (in_array('accept', $allStatus)) {
            $status = false; // Or do something else if all are accepted
        }
        return view('seniman.negotiation.index', compact('batch', 'status'));
    }

    public function accept($id, Negotiation $negotiation)
    {
        $negotiation->status = 'accept';
        $negotiation->save();

        /**
         * !!Please input send email for notification!!
         *
         * @TODO
         */

        $batchId = $negotiation->negotiation_batch_id;
        $batch   = NegotiationBatch::query()->find($batchId);
        $batch->negotiations()->where('status', '!=', 'accept')->update(['status' => 'rejected']);
        $batch->status = 'close';
        $batch->save();

        return to_route('seniman.negotiation.index', [app()->getLocale(), $batchId]);
    }
}
