<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller {

    public function generate_pdf( $id ) {

        $user_data = Auth::user();
        $order     = Order::where( 'id', $id )->with( 'billing', 'orderDetails' )->first();

        return view( 'frontend.pages.invoice', compact( 'user_data', 'order' ) );

    }

    public function download( $id ) {

        set_time_limit( 300 );

        $user_data = Auth::user();
        $order     = Order::where( 'id', $id )->with( 'billing', 'orderDetails' )->first();

        $data = [

            'user_data' => $user_data,
            'order'     => $order,
        ];

        $pdf = Pdf::loadView( 'frontend.pages.invoice', $data )->setOptions( ['defaultFont' => 'sans-serif'] );
        return $pdf->download( 'invoice.pdf' );

    }
}
