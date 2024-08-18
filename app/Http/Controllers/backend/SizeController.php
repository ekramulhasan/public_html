<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $size = Size::latest('id')->select(['id','size_name','created_at'])->paginate();
        return view('backend.size.index', compact('size'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.size.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([

            'new_size' => 'bail|required|string|unique:sizes,size_name',

        ]);

        Size::create([

            'size_name' => $request->new_size,
        ]);

        Toastr::success('successfully added new category');
        return redirect()->route('size.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $size_update = Size::where('id',$id)->first();
        return view('backend.size.edit', compact('size_update'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $update_size = Size::where('id',$id)->first();

        $request->validate([

            'update_size' => 'bail|required|string|unique:sizes,size_name',

        ]);

        $update_size->update([

            'size_name' => $request->update_size,
        ]);

        Toastr::success('successfully update category');
        return redirect()->route('size.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete_size = Size::where('id',$id)->first();
        $delete_size->delete();
        Toastr::success('successfully delete category');
        return back();
    }
}
