<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Product;
use App\Models\Shipment;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getCreateOrder($id) {
        $product = Product::find($id);
        $shipments = Shipment::all();
        return view('createOrder', compact('product', 'shipments'));
    }

    public function storeOrder(Request $request, $id) {
        $request->validate([
            'Shipment' => 'required'
        ]);

        Order::create([
            'ProductId' => $id,
            'ShipmentId' => $request->Shipment
        ]);

        return redirect('/home');
    }

    function getAllOrders() {
        $orders = Order::all();
        return view('viewOrders', compact('orders'));
    }
}
