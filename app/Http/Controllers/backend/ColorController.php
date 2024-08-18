<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $color = Color::latest('id')->select(['id','color_name','created_at'])->paginate();
        return view('backend.color.index', compact('color'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([

            'new_color' => 'bail|required|string|unique:colors,color_name',

        ]);

        Color::create([

            'color_name' => $request->new_color,
        ]);

        Toastr::success('successfully added new category');
        return redirect()->route('color.index');

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
        $color_update = Color::where('id',$id)->first();
        return view('backend.color.edit', compact('color_update'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $update_color = Color::where('id',$id)->first();

        $request->validate([

            'update_color' => 'bail|required|string|unique:colors,color_name',

        ]);

        $update_color->update([

            'color_name' => $request->update_color,
        ]);

        Toastr::success('successfully update category');
        return redirect()->route('color.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete_color = Color::where('id',$id)->first();
        $delete_color->delete();
        Toastr::success('successfully delete category');
        return back();
    }
}
