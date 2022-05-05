@extends('layouts.master')
@section('student.index', 'active')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-2">
                <h1 class="m-0">List Student</h1>
            </div>
            <div class="col-sm-4">
                <a href="{{route('student.create')}}" class="btn btn-primary">Add Student</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">List Student</li>
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
                                <th>Student Name</th>
                                <th>Class Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Date Of Birth</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($student as $items)
                            <tr>
                                <td>{{$items->name}}</td>
                                <td>
                                    <ul>
                                        @foreach($items->class as $cls)
                                            <li>{{$cls->name}}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{$items->address}}</td>
                                <td>{{$items->phone}}</td>
                                <td>{{$items->db}}</td>
                                <td class="text-right">
                                    <a class="btn btn-info" href="{{ route('student.show',$items->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('student.edit',$items) }}">Edit</a>
                                    <a class="btn btn-danger" href="{{ route('student_delete',$items->id)}}">Delete</a>

                                    <!-- <button class="btn btn-danger btn-delete"  data-url="{{ route('student.destroy',$items->id)}}" >Delete</button> -->
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

<script>
    
</script>