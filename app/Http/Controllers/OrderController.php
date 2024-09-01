<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShippingOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::query()
            ->whereHas('orderItems', function ($item) {
                $item->whereHas('product', function ($product) {
                    $product->where('user_id', Auth::id());
                });
            })
            ->where('status', 'success')->orderBy('updated_at', 'desc')
            ->with('customer')
            ->get();

        return view('seniman.order.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     */
    public function show($locale, $order)
    {
        $orderItems = OrderItem::query()
            ->join('karyas', 'karyas.id', 'order_items.product_id')
            ->join('orders', 'orders.id', 'order_items.order_id')
            ->join('users', 'users.id', 'orders.user_id')
            ->join('shipping_orders', function ($item) {
                $item->on('shipping_orders.order_id', 'order_items.order_id');
                $item->on('shipping_orders.product_id', 'karyas.id');
            })
            ->where('order_items.order_id', $order)
            ->where('karyas.user_id', Auth::id())
            ->select('shipping_orders.id', 'destination', 'courier', 'resi', 'karyas.name as karya', 'users.name as customer', 'quantity', 'order_items.price')
            ->get();

        return view('seniman.order.show', compact('orderItems'));
    }

    public function shipment($locale, ShippingOrder $shipment)
    {
        return view('seniman.order.shipment', compact('shipment'));
    }

    public function update(Request $request, $locale, ShippingOrder $shipment)
    {
        $request->validate([
            'resi' => 'required',
        ]);

        $shipment->update([
            'resi' => $request->input('resi'),
        ]);

        return redirect()->route('seniman.order.show', ['locale' => app()->getLocale(), 'order' => $shipment->order_id]);
    }
}
