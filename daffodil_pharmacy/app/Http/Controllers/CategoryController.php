<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MedicineDetails;
use App\Models\MedicineList;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $category = Category::all();
        return view('backend.category',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;

        $image_path = $request->file('photo')->store('image', 'public');
        $FileKey = "http://".$_SERVER['HTTP_HOST']."/storage/".$image_path;
        $category = new Category();
        $category->category_name = $name;
        $category->category_img = $FileKey;
        $category->save();
        return redirect()->route('category.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.category_edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->name;

        $image_path = $request->file('photo')->store('image', 'public');
        $FileKey = "http://".$_SERVER['HTTP_HOST']."/storage/".$image_path;
        $category = Category::find($id);
        $category->category_name = $name;
        $category->category_img = $FileKey;
        $category->save();
        return redirect()->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if(is_null($category)){
            return redirect()->route('category.index');
        }

        $category->delete();

        return redirect()->route('category.index');
    }
}
