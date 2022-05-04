<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Classes;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject = Subject::get();
        return view('admin.subject.index',compact('subject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class = Classes::get();
        return view('admin.subject.create', compact('class'));
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
        ]);

        $subject = new Subject();
        $subject->name = $request->name;
        $subject->save();

        $subject->class()->attach($request->cls);

        if(!$subject->save()){
            return redirect()->back()->with('error', 'Sorry, there\' a problem while updating subject.');
        }
        return redirect()->route('subject.index')->with('success', 'Success, your subject have been updated.');
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
    public function edit(Subject $subject)
    {
        $class = Classes::get();
        return view('admin.subject.edit', compact('subject','class'));
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
        $subject = Subject::find($id);
        
        $subject->name = $request->name;
        $subject->class_id = $request->class_id;

        $this->validate($request, [
            'name' => ['required'],
            'class_id' => ['required'],
        ]);

        $subject->class()->sync($request->cls);

        if(!$subject->save()){
            return redirect()->back()->with('error', 'Sorry, there\' a problem while updating categoriess.');
        }
        return redirect()->route('subject.index')->with('success', 'Success, your categoriess have been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $data = Subject::find($id);
        // $data->delete();
        
        // return redirect()->route('subject.index')
        //                ->with('success','post deleted successfully');
    }
    public function delete($id)
    {
        $data = Subject::find($id);
        $data->delete();
        
        return redirect()->back()
                       ->with('success','post deleted successfully');
    }
}
