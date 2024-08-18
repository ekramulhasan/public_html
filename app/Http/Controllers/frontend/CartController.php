<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Size;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller {
    public function cartPage() {

        $items    = \Cart::getContent();
        $total    = \Cart::getTotal();
        $subTotal = \Cart::getSubTotal();

        return view( 'frontend.pages.cart', compact( 'items', 'subTotal', 'total' ) );
    }

    public function addTocart( Request $request ) {

        // dd($request->all());
        $product_slug = $request->product_slug;
        $product_qty  = $request->quantity;
        $size         = Size::where( 'id', $request->size )->select( 'size_name' )->first();

        $product = Product::whereSlug( $product_slug )->first();

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

        Toastr::success( 'successfully added' );
        return back();

    }

    public function addWish( string $slug, ) {

        // $product = Product::whereSlug($slug)->first();

        // \Cart::instance('wishlist')->add([
        //     'id' => $product->id,
        //     'name' => $product->title,
        //     'price' => $product->price,
        //     'quantity' => 1,
        //     'attributes' => [
        //         'wishlist' => true,
        //     ],
        // ]);

        // \Cart::add([

        //     'id' => $product->id,
        //     'name' => $product->title,
        //     'price' => $product->price,
        //     'quantity' => 2,
        //     'attributes' => [

        //         'product_img' => $product->product_img,
        //         'weight' => 0,
        //         'product_stock' => $product->product_stock,
        //         'size' => 2,

        //     ],

        // ]);

        Toastr::success( 'successfully added' );
        return back();

    }

    public function removeFromcart( $cart_id ) {

        \Cart::remove( $cart_id );

        Toastr::info( 'delete item' );
        return back();

    }

    public function couponApply( Request $request ) {

        // if(!Auth::check()){
        //     Toastr::error('must be needed login');
        //     return redirect()->route('login.page');
        // }

        $check = Coupon::where( 'coupon_name', $request->coupon_code )->first();

        if ( Session::get( 'coupon' ) ) {

            Toastr::error( 'Already applied this coupon!!!' );
            return redirect()->back();

        }

        if ( $check != null ) {

            $check_validity = $check->validity_till > Carbon::now()->format( 'Y-m-d' );

            if ( $check_validity ) {

                Session::put( 'coupon', [

                    'coupon_name'     => $check->coupon_name,
                    'discount_amount' => ( \Cart::getSubTotal() * $check->discount_amount ) / 100,
                    'cart_total'      => \Cart::getSubTotal(),
                    'balance'         => \Cart::getSubTotal() - ( \Cart::getSubTotal() * $check->discount_amount ) / 100,

                ] );

                Toastr::success( 'successfully coupon code applied !!!' );
                return redirect()->back();
            } else {
                Toastr::error( 'coupon code expire' );
                return redirect()->back();
            }

        } else {
            Toastr::error( 'invalid coupon code' );
            return redirect()->back();
        }

    }

    public function couponRemove( $coupon_name ) {

        Session::forget( 'coupon' );
        Toastr::success( 'successfully coupon remove' );
        return redirect()->back();

    }
}
