<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = Teacher::get();

        return view('admin.teacher.index',compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cls = Classes::all();
        return view('admin.teacher.create', compact('cls'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $teacher = Teacher::create([
            'name' => $request->name,
        ]);

        $teacher->class()->attach($request->cls);

        return redirect()->route('teacher.index')->with('success','Teacher created successfully.');
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
    public function edit(Teacher $teacher)
    {
        $cls = Classes::all();
        return view('admin.teacher.edit', compact('teacher','cls'));
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

        $teacher = Teacher::find($id);

        $teacher->name = $request->name;

        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $teacher->class()->sync($request->cls);
        
        if(!$teacher->save()){
            return redirect()->back()->with('error', 'Sorry, there\' a problem while updating teacher.');
        }
        return redirect()->route('teacher.index')->with('success', 'Success, your teacher have been updated.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
    //   $teacher->delete();

    //    return redirect()->route('teacher.index')
    //                    ->with('success','teacher deleted successfully');
    }

    public function delete($id)
    {
        $data = Teacher::find($id);
        $data->delete();
        
        return redirect()->back()
                       ->with('success','post deleted successfully');
    }
}
