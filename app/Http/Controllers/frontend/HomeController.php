<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller {

    public function home() {

        $testimonial     = Testimonial::where( 'is_active', 1 )->latest( 'id' )->limit( 3 )->select( ['id', 'client_name', 'client_designation', 'client_msg', 'client_img'] )->get();
        $categories      = category::where( 'isActive', 1 )->with( 'product' )->latest( 'id' )->select( ['id', 'title', 'slug'] )->get();
        $categoryWithSub = category::where( 'isActive', 1 )->with( ['subCategoryes.subsubcategories'] )->latest( 'id' )->select( ['id', 'title', 'slug'] )->get();
        // return $testimonial;
        // return view('frontend.pages.home', compact('testimonial'));

        $product = Product::where( 'is_active', 1 )->latest( 'id' )->with( 'category', 'sizes', 'subcategory' )->paginate( 12 );
        // dd($categoryWithSub);
        // return $product;
        $master = view( 'frontend.master', compact( 'testimonial', 'product', 'categories', 'categoryWithSub' ) );
        return view( 'frontend.pages.home', compact( 'testimonial', 'product', 'categories', 'categoryWithSub' ) );

    }

    public function shopePage() {

        $allProduct = Product::where( 'is_active', 1 )->latest( 'id' )->select( 'id', 'title', 'slug', 'price', 'product_stock', 'product_rating', 'product_img' )->paginate( 10 );
        $categories = category::where( 'isActive', 1 )->with( 'product' )->latest( 'id' )->limit( 5 )->select( ['id', 'title', 'slug'] )->get();

        // dd($categories->all());
        return view( 'frontend.include_file.trading', compact( 'allProduct', 'categories' ) );

    }

    public function productDetails( $product_slug ) {

        $product = Product::whereSlug( $product_slug )->with( 'category', 'sizes', 'subcategory', 'colors' )->first();

        // return $product;
        $related_product = Product::whereNot( 'slug', $product_slug )->latest( 'id' )->with( 'category', 'sizes', 'subcategory' )->limit( 7 )->get();

        return view( 'frontend.pages.singleProduct', compact( 'product', 'related_product' ) );
    }

    public function search( Request $request ) {

        $query = $request->input( 'search' );
        // dd($query);
        $product         = Product::where( 'title', 'LIKE', "%$query%" )->latest( 'id' )->with( 'category', 'sizes', 'subcategory' )->paginate( 8 );
        $categories      = category::where( 'isActive', 1 )->latest( 'id' )->with( 'product' )->select( ['id', 'title', 'slug'] )->get();
        $categoryWithSub = category::where( 'isActive', 1 )->with( ['subCategoryes.subsubcategories'] )->latest( 'id' )->select( ['id', 'title', 'slug'] )->get();

        return view( 'frontend.pages.searchProduct', compact( 'product', 'categories', 'categoryWithSub' ) );

    }

}
