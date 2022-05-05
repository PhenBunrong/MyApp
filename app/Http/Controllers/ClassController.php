<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = Classes::get();
        return view('admin.class.index',compact('class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);
    
        $class = Classes::create([
            'name' => $request->name,
        ]);

        if (!$class) {
            return redirect()->back()->with('error', 'Sorry, there a problem while creating class.');
        }
        return redirect()->route('class.index')->with('success', 'Success, you class have been create.');
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
    public function edit(Classes $class)
    {
        return view('admin.class.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Classes $class)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $class->update($request->all());

        return redirect()->route('class.index')->with('success','class created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classes $class)
    {
    //   $class->delete();

    //    return redirect()->route('class.index')
    //                    ->with('success','class deleted successfully');
    }
    public function delete($id)
    { 
        $class = Classes::find($id);

        $class->delete();

        return redirect()->back()->with('success','class deleted successfully');
    }
}
