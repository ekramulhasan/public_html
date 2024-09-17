<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrderController extends Controller {

    public function index() {

        $order = Order::with( 'billing', 'orderDetails' )->latest( 'id' )->paginate( 15 );
        return view( 'backend.order.orderData', compact( 'order' ) );

    }

    

    public function orderStatus( Request $request ) {

        $request->validate( [
            'order_id' => 'required|integer',
            'status'   => 'required|string',
        ] );

        OrderStatus::updateOrCreate(
            ['order_id' => $request->order_id],
            ['status' => $request->status],
        );

        return back();
    }
}
