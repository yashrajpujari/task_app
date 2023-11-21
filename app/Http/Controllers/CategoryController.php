<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $categories=Category::all();
        return view('category/index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required','status'=>'required']);
        $data=$request->all();
        Category::create($data);
        return redirect()->route('category.index')->with('sucess','category Created Successfully');
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
    public function edit(string $id)
    {   $category=Category::where('id',$id)->first();
        return view('category/edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(['name'=>'required','status'=>'required']);
        $data=$request->only('name','status');
        Category::where('id',$id)->update($data);
        return redirect()->route('category.index')->with('sucess','category Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::where('id',$id)->delete();
        return redirect()->route('category.index')->with('sucess','category Deleted Successfully');
    }
}
