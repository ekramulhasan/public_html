<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\orderRequest;
use App\Models\Billing;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\Size;
use App\Models\Upazila;
use App\Notifications\InvoiceNotification;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller {

    public function checkoutPage() {

        $carts       = \Cart::getContent();
        $total_price = \Cart::getSubTotal();
        $district    = District::select( 'id', 'district_name_en')->get();
        $user_data   = Auth::user();

        // dd( $district );

        return view( 'frontend.pages.checkout', compact( 'carts', 'total_price', 'district', 'user_data' ) );

    }

    public function addTodirect( Request $request ) {

        // dd($request->all());
        $product_slug = $request->product_slug;
        $product_qty  = $request->quantity;
        $product_size = $request->size;

        $product = Product::whereSlug( $product_slug )->first();
        $size    = Size::where( 'id', $product_size )->select( 'size_name' )->first();

        \Cart::add( [

            'id'         => $product->id,
            'name'       => $product->title,
            'price'      => $product->price,
            'quantity'   => $product_qty,
            'attributes' => [

                'product_img'   => $product->product_img,
                'weight'        => 0,
                'product_stock' => $product->product_stock,
                'size'          => $size['size_name'],

            ],

        ] );

        $carts       = \Cart::getContent();
        $total_price = \Cart::getSubTotal();
        $district    = District::select( 'id', 'district_name_en' )->get();
        $user_data   = Auth::user();

        // dd($carts);

        return view( 'frontend.pages.order', compact( 'carts', 'total_price', 'district', 'user_data' ) );

    }

    // public function directOrder() {

    //     $carts       = \Cart::getContent();
    //     $total_price = \Cart::getSubTotal();
    //     $district    = District::select( 'id', 'name', 'bn_name' )->get();
    //     $user_data   = Auth::user();

    //     return view( 'frontend.pages.wholeSale_checkout', compact( 'carts', 'total_price', 'district', 'user_data' ) );

    // }

    public function loadAjax( $district_id ) {

        $upazila = Upazila::where( 'district_id', $district_id )->select( 'id', 'upazila_name_en' )->get();
        return response()->json( $upazila, 200 );

    }

    public function placeOrder( orderRequest $request ) {

        // dd( $request->all() );

        foreach ( \Cart::getContent() as $value ) {

            $product_stock = Product::find( $value->id );

            if ( $product_stock->product_stock < $value->quantity ) {
                //cart destroy
                \Cart::remove( $value->id );
                //session destroy
                Session::forget( 'coupon' );
                Toastr::error( 'this product stock out', 'sorry' );
                return redirect()->route( 'home' );
            }

        }

        $billing = Billing::create( [

            'name'        => $request->name,
            'email'       => $request->email,
            'mobile'      => $request->phone,
            'district_id' => $request->district_id,
            'upazila_id'  => $request->upazila_id,
            'address'     => $request->address,
            'message'     => $request->massage,

        ] );

        $order = Order::create( [

            'user_id'         => auth()->id(),
            'billing_id'      => $billing->id,
            'sub_total'       => Session::get( 'coupon' )['cart_total'] ?? \Cart::getSubTotal(),
            'delivery_charge' => $request->deliveryCharge,
            'discount_amount' => Session::get( 'coupon' )['discount_amount'] ?? 0,
            'coupon_name'     => Session::get( 'coupon' )['coupon_name'] ?? 0,
            'total'           => $request->totalValue,

        ] );

        foreach ( \Cart::getContent() as $value ) {

            OrderDetails::create( [

                'order_id'      => $order->id,
                'user_id'       => auth()->id(),
                'product_id'    => $value->id,
                'product_qty'   => $value->quantity,
                'product_price' => $value->price,
                'product_size'  => $value->attributes->size,
                'product_img'   => $value->attributes->product_img,

            ] );

            //product strock decrement
            Product::find( $value->id )->decrement( 'product_stock', $value->quantity );
            //cart destroy
            \Cart::remove( $value->id );
            //session destroy
            Session::forget( 'coupon' );
        }

        $order_data = Order::whereId( $order->id )->with( 'billing', 'orderDetails' )->first();
        $user_data  = Auth::user();

        // dd($order_confirm);

        // Mail::to( $request->email )->send( new OrderConfirm( $order_confirm, $user_data ) );
        // Notification::route('mail','ekramulshawon1@gmail.con')->notify();
        $user = Auth::user();
        // $user->notify(new InvoiceNotification());
        Notification::send( $user, new InvoiceNotification( $order_data, $user_data ) );

        Toastr::success( 'your order placed successfully', 'success' );
        return redirect()->route( 'home' );
    }

    public function directOrder( orderRequest $request ) {

        foreach ( \Cart::getContent() as $value ) {

            $product_stock = Product::find( $value->id );

            if ( $product_stock->product_stock < $value->quantity ) {
                //cart destroy
                \Cart::remove( $value->id );
                //session destroy
                Session::forget( 'coupon' );
                Toastr::error( 'this product stock out', 'sorry' );
                return redirect()->route( 'home' );
            }

        }

        // dd( $request->all() );

        $billing = Billing::create( [

            'name'        => $request->name,
            'email'       => $request->email,
            'mobile'      => $request->phone,
            'district_id' => $request->district_id,
            'upazila_id'  => $request->upazila_id,
            'address'     => $request->address,
            'message'     => $request->massage,

        ] );

        $order = Order::create( [

            'user_id'         => auth()->check() ? auth()->id() : null,
            'billing_id'      => $billing->id,
            'sub_total'       => Session::get( 'coupon' )['cart_total'] ?? \Cart::getSubTotal(),
            'discount_amount' => Session::get( 'coupon' )['discount_amount'] ?? 0,
            'delivery_charge' => $request->deliveryCharge,
            'coupon_name'     => Session::get( 'coupon' )['coupon_name'] ?? 0,
            'total'           => $request->totalValue,

        ] );

        foreach ( \Cart::getContent() as $value ) {

            OrderDetails::create( [

                'order_id'      => $order->id,
                'user_id'       => auth()->check() ? auth()->id() : null,
                'product_id'    => $value->id,
                'product_qty'   => $value->quantity,
                'product_price' => $value->price,
                'product_size'  => $value->attributes->size,
                'product_img'   => $value->attributes->product_img,

            ] );

            //product strock decrement
            Product::find( $value->id )->decrement( 'product_stock', $value->quantity );
            //cart destroy
            \Cart::remove( $value->id );
            //session destroy
            Session::forget( 'coupon' );
        }

        $order_data = Order::whereId( $order->id )->with( 'billing', 'orderDetails' )->first();
        $user_data  = Auth::user();

        // dd($order_confirm);

        // Mail::to( $request->email )->send( new OrderConfirm( $order_confirm, $user_data ) );
        // Notification::route('mail','ekramulshawon1@gmail.con')->notify();

        Toastr::success( 'order successfully done', 'success' );
        return redirect()->route( 'home' );
    }

    public function orderPage() {

        return view( 'frontend.pages.order' );
    }

}
