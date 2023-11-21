<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks=Task::all();
        return view('task.index',compact('tasks'));
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   $categories=Category::all();
        return view('task.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'status'=>'required',
            'description'=>'required',
            'dedline'=>'required'
        ]);
        $data=$request->all();
    
       $task= Task::create($data);
       $task->categories()->sync($request->input('category'));
        return redirect()->route('tasks.index')->with('success','Task Added Sucessfully');
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
    {   $categories=Category::all();
        $task =Task::where('id',$id)->first();
        return view('task/edit',compact('task','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'required',
            'status'=>'required',
            'description'=>'required',
            'dedline'=>'required'
        ]);
        $data=$request->except(['_token','_method','category']);
       $task= Task::where('id',$id)->update($data);
       $task=Task::find($id);
        $task->categories()->sync($request->input('category'));

        return redirect()->route('tasks.index')->with('success','Task Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Task::where('id',$id)->delete();
        return redirect()->back()->with('success','Record Deleted Successfully..');
    }
}
