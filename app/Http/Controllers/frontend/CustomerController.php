<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Order;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRegisterRequest;

class CustomerController extends Controller {

    public function login_page() {

        return view( 'frontend.pages.login');
    }

    public function customer_register( UserRegisterRequest $request ) {



        DB::table( 'users' )->insert( [

            'name'     => $request->register_name,
            'email'    => $request->register_email,
            'phone'    => $request->register_number,
            'address'  => $request->register_address,
            'password' => Hash::make( $request->register_password ),

        ] );

        $credential = [

            'email'    => $request->register_email,
            'password' => $request->register_password,
        ];

        if ( Auth::attempt( $credential ) ) {

            $request->session()->regenerate();
            Toastr::success( 'successfully signup' );
            return redirect()->route( 'customer.profile' );
        }

    }

    public function customer_profile() {

        $user_data = Auth::user();
        $order     = Order::where( 'user_id', $user_data->id )->with( 'billing', 'orderDetails' )->latest( 'id' )->paginate( 5 );

        $invoice = view('frontend.pages.invoice',compact('user_data', 'order'));

        return view( 'frontend.pages.profile', compact( 'user_data', 'order' ) );

    }

    // for login
    public function customer_login( Request $request ) {

        // dd($request->all());

        $request->validate( [

            'email'    => 'bail|required|email',
            'password' => 'bail|required|min:4',

        ] );

        $credential = [

            'email'    => $request->email,
            'password' => $request->password,
        ];

        if ( Auth::attempt( $credential, $request->filled( 'remember' ) ) ) {

            $request->session()->regenerate();
            Toastr::success( 'successfully login' );
            return redirect()->route( 'customer.profile' );

        }

        return back()->withErrors( [
            'email' => 'wrong credential found!',
        ] )->onlyInput( 'email' );

    }

    public function update( Request $request, string $id ) {

        // dd($request->all());

        $customer_edit = User::where( 'role_id', 2 )->find( $id );

        $update_data = [

            'name'     => $request->customer_name,
            'email'    => $request->customer_email,
            'phone'    => $request->customer_phone,
            'address'  => $request->customer_address
        ];

        if (!empty($request->password)) {

            $update_data['password'] = Hash::make( $request->password );
        }


        $customer_edit->update($update_data);

        Toastr::success( 'successfully user updated' );
        return redirect()->route( 'customer.profile' );

    }

    // for logout
    public function customer_logout( Request $request ) {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Toastr::success( 'successfully logout' );
        return redirect()->route( 'home' );

    }

}
