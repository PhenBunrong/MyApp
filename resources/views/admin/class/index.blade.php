@extends('layouts.master')
@section('class.index', 'active')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-2">
                <h1 class="m-0">List Class</h1>
            </div>
            <div class="col-sm-4">
                <a href="{{route('class.create')}}" class="btn btn-primary">Add Class</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">List Class</li>
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
                                <th width="20%">Class Name</th>
                                <th width="20%">Teacher Name</th>
                                <th width="20%">Subject Name</th>
                                <th width="40%" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($class as $items)
                            <tr>
                                <td>{{$items->name}}</td>
                                <td>
                                    <ul>
                                        @foreach ($items->teachers as $teach)
                                            <li>{{ $teach->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        @foreach($items->subj as $sub)
                                            <li>{{ $sub->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="text-right">
                                    <a class="btn btn-info" href="{{ route('class.show',$items->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('class.edit',$items->id) }}">Edit</a>
                                    <a class="btn btn-danger" href="{{ route('class_destroy',$items->id) }}">Delete</a>
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