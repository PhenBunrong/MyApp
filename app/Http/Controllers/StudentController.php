<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::get();
        return view('admin.student.index',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class = Classes::get();
        return view('admin.student.create', compact('class'));
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
            'name' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
            'db' => ['required'],
            'class_id' => ['required'],
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->db = $request->db;
        $student->class_id = $request->class_id;
        $student->save();


        if(!$student->save()){
            return redirect()->back()->with('error', 'Sorry, there\' a problem while updating student.');
        }
        return redirect()->route('student.index')->with('success', 'Success, your student have been updated.');
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
    public function edit(student $student)
    {
        $class = Classes::get();
        return view('admin.student.edit', compact('student','class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $student = Student::find($id);
        
        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->db = $request->db;
        $student->class_id = $request->class_id;

        $this->validate($request, [
            'name' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
            'db' => ['required'],
            'class_id' => ['required'],
        ]);


        if(!$student->save()){
            return redirect()->back()->with('error', 'Sorry, there\' a problem while updating categoriess.');
        }
        return redirect()->route('student.index')->with('success', 'Success, your categoriess have been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $data = Student::find($id);
        // $data->delete();
        
        // return redirect()->route('student.index')
        //                ->with('success','post deleted successfully');
    }
    public function delete($id)
    {
        $data = Student::find($id);
        $data->delete();
        
        return redirect()->back()
                       ->with('success','post deleted successfully');
    }
}
