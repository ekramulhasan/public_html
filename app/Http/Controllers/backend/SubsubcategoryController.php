<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use App\Models\SubsubCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubsubcategoryController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // $subCategory = Subcategory::latest('id')->select(['id','title', 'slug', 'created_at'])->with('category')->paginate();
        $subsubCategory = SubsubCategory::with( 'subcategory' )->latest( 'id' )->get();

        return view( 'backend.subsubcategory.index', compact( 'subsubCategory' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $subcategory = Subcategory::select( ['id', 'title'] )->get();
        return view( 'backend.subsubcategory.create', compact( 'subcategory' ) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        $request->validate( [

            'new_subsubcategory' => 'bail|required|string|unique:subsub_categories,title',
            'subcategory_id'     => 'bail|required',

        ] );

        SubsubCategory::create( [

            'title'          => $request->new_subsubcategory,
            'slug'           => Str::slug( $request->new_subsubcategory ),
            'subcategory_id' => $request->subcategory_id,
            // 'isActive' => $request->filled('is_active')
        ] );

        Toastr::success( 'successfully added new subsubcategory' );
        return redirect()->route( 'subsubcategory.index' );

    }

    /**
     * Display the specified resource.
     */
    public function show( string $id ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( string $slug ) {
        $subsubcategory_update = SubsubCategory::whereSlug( $slug )->first();
        $subcategory           = Subcategory::select( ['id', 'title'] )->get();
        return view( 'backend.subsubcategory.edit', compact( 'subsubcategory_update', 'subcategory' ) );

    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, string $slug ) {

        $update_subsubcategory = SubsubCategory::whereSlug( $slug )->first();

        $request->validate( [

            'update_subsubcategory' => 'bail|required|string|max:255',
            'update_subcategory_id' => 'bail|required',

        ] );

        $update_subsubcategory->update( [

            'title'          => $request->update_subsubcategory,
            'slug'           => Str::slug( $request->update_subsubcategory ),
            'subcategory_id' => $request->update_subcategory_id,
            'isActive'       => $request->filled( 'is_active' ),
        ] );

        Toastr::success( 'successfully update subsubcategory' );
        return redirect()->route( 'subsubcategory.index' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $slug ) {
        $delete_subsubcategory = SubsubCategory::whereSlug( $slug )->first();
        $delete_subsubcategory->delete();
        Toastr::success( 'successfully delete subsubcategory' );
        return back();
    }

    public function get_subsubcategory( Subcategory $subcategory ) {

        $subsubCategory = $subcategory->subsubcategories;
        return response()->json( $subsubCategory );
    }

}
