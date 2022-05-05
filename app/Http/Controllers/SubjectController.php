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
        $cls = Classes::get();
        return view('admin.subject.create', compact('cls'));
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

        $subject = Subject::create([
            'name' => $request->name,
        ]);

        $subject->classes()->attach($request->cls);

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
        $cls = Classes::get();
        return view('admin.subject.edit', compact('subject','cls'));
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

        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $subject->classes()->sync($request->cls);
        
        if(!$subject->save()){
            return redirect()->back()->with('error', 'Sorry, there\' a problem while updating subject.');
        }
        return redirect()->route('subject.index')->with('success', 'Success, your subject have been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // dd($request->id);
        Subject::find($request->id)->delete();

        return response()->json([]);

        // return redirect()->back()->with('success','Subject deleted successfully');
    }

    // public function delete($id)
    // {
    //     dd($id);
    //     // $data = Subject::find($id);
    //     // $data->delete();
        
    //     // return redirect()->back()
    //     //                ->with('success','post deleted successfully');
    // }
}
