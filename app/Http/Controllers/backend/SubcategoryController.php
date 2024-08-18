<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\category;
use App\Models\Subcategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $subCategory = Subcategory::latest('id')->select(['id','title', 'slug', 'created_at'])->with('category')->paginate();
        $subCategory = Subcategory::with('category')->latest('id')->get();


        return view('backend.subcategory.index',compact('subCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = category::select(['id','title'])->get();
        return view('backend.subcategory.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'new_subcategory' => 'bail|required|string|unique:subcategories,title',

        ]);

        Subcategory::create([

            'title' => $request->new_subcategory,
            'slug' =>Str::slug($request->new_subcategory),
            'category_id' => $request->category_id,
            // 'isActive' => $request->filled('is_active')
        ]);

        Toastr::success('successfully added new subcategory');
        return redirect()->route('subcategory.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $subcategory_update = Subcategory::whereSlug($slug)->first();
        $category = category::select(['id','title'])->get();
        return view('backend.subcategory.edit', compact('subcategory_update','category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {

        $update_category = Subcategory::whereSlug($slug)->first();

        $request->validate([

            'update_subcategory' => 'bail|required|string|max:255',

        ]);

        $update_category->update([

            'title' => $request->update_subcategory,
            'slug' =>Str::slug($request->update_subcategory),
            'category_id' => $request->update_category_id,
            'isActive' => $request->filled('is_active')
        ]);

        Toastr::success('successfully update subcategory');
        return redirect()->route('subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $delete_category = Subcategory::whereSlug($slug)->first();
        $delete_category->delete();
        Toastr::success('successfully delete subcategory');
        return back();
    }


    public function get_subcategory(category $category){

        $subCategory = $category->subCategoryes;
        return response()->json($subCategory);
    }
}
