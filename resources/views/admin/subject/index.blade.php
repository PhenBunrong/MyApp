@extends('layouts.master')
@section('subject.index', 'active')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-2">
                <h1 class="m-0">List Subject</h1>
            </div>
            <div class="col-sm-4">
                <a href="{{route('subject.create')}}" class="btn btn-primary">Add Subject</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">List Subject</li>
                </ol>
            </div>
        </div>
    </div>
</div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th width="40%">Subject Name</th>
                                <th width="30%">Class Name</th>
                                <th width="30%" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($subject as $items)
                            <tr>
                                <td>{{$items->name}}</td>
                                <td>
                                    <ul>
                                        @foreach($items->class as $cls)
                                            <li>{{$cls->name}}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="text-right">
                                    <a class="btn btn-info" href="{{ route('subject.show',$items->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('subject.edit',$items) }}">Edit</a>
                                    <a class="btn btn-danger" href="{{ route('subject_delete',$items->id)}}">Delete</a>

                                    <!-- <button class="btn btn-danger btn-delete"  data-url="{{ route('subject.destroy',$items->id)}}" >Delete</button> -->
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>    
        </div>
    </section>

@endsection