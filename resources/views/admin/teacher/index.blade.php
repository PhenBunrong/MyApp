@extends('layouts.master')
@section('teacher.index', 'active')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-2">
                <h1 class="m-0">List Teacher</h1>
            </div>
            <div class="col-sm-4">
                <a href="{{route('teacher.create')}}" class="btn btn-primary">Add Teacher</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">List Teacher</li>
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
                                <th width="40%">Teacher Name</th>
                                <th width="30%">Class Name</th>
                                <th width="30%" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($teacher as $items)
                            <tr>
                                <td>{{$items->name}}</td>
                                <td>
                                    <ul>
                                        @foreach ($items->class as $cls)
                                            <li>{{ $cls->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="text-right">
                                    <a class="btn btn-info" href="{{ route('teacher.show',$items->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('teacher.edit',$items->id) }}">Edit</a>
                                    <a class="btn btn-danger" href="{{ route('teacher_destroy',$items->id) }}">Delete</a>
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