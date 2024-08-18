<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\SubsubCategory;

class MenupageController extends Controller {
    public function allProduct() {

        $product = Product::where( 'is_active', 1 )->latest( 'id' )->with( 'category', 'sizes', 'subcategory' )->get();

        return view( 'frontend.menu_page.all_product', compact( 'product' ) );
    }

    public function mensProduct( $slug ) {

        $categories      = category::where( 'isActive', 1 )->with( 'product' )->latest( 'id' )->select( ['id', 'title', 'slug'] )->get();
        $categoryWithSub = category::where( [['isActive', 1], ['slug', 'mens']] )->with( ['subCategoryes.products.productImage'] )->latest( 'id' )->select( ['id', 'title', 'slug'] )->get();

        $subProduct    = Subcategory::where( [['isActive', 1], ['slug', $slug]] )->with( 'products.productImage' )->latest( 'id' )->paginate( 8 );
        $subsubProduct = SubsubCategory::where( [['isActive', 1], ['slug', $slug]] )->with( 'products.productImage' )->latest( 'id' )->get();

        return view( 'frontend.menu_page.categoryProduct', compact( 'subProduct' ) );
    }

    public function subsubProduct( $slug ) {

        $subsubProduct = SubsubCategory::where( [['isActive', 1], ['slug', $slug]] )->with( 'products.productImage' )->latest( 'id' )->get();

        return view( 'frontend.menu_page.subsubCategory', compact( 'subsubProduct' ) );

    }

    public function categoryProduct( $slug ) {

        $category_product = category::where( [['isActive', 1], ['slug', $slug]] )->with( ['product.productImage'] )->latest( 'id' )->paginate( 8 );

        // dd( $category_product );

        return view( 'frontend.menu_page.categorywishPro', compact( 'category_product' ) );

    }
}
