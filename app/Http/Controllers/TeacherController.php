<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Teacher;
use Illuminate\Support\Str;
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
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->phone = $request->phone;
        $teacher->address = $request->address;
        $teacher->email = $request->email;
        $teacher->start_date = $request->start_date;
        $teacher->end_date = $request->end_date;
        $teacher->slug = Str::slug($request->name);
        $teacher->save();

        $teacher->classes()->attach($request->cls);

        if(!$teacher->save()){
            return redirect()->back()->with('error', 'Sorry, there\' a problem while updating subject.');
        }
        return redirect()->route('teacher.index')->with('success', 'Success, your subject have been updated.');
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
        $teacher->phone = $request->phone;
        $teacher->address = $request->address;
        $teacher->email = $request->email;
        $teacher->start_date = $request->start_date;
        $teacher->end_date = $request->end_date;

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $teacher->classes()->sync($request->cls);
        
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
    public function destroy(Request $request)
    {
       Teacher::find($request->id)->delete();

       return response()->json([]);
    }

    // public function delete($id)
    // {
    //     $data = Teacher::find($id);
    //     $data->delete();
        
    //     return redirect()->back()
    //                    ->with('success','post deleted successfully');
    // }
}
