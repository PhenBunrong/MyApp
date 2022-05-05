@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Create Student</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Create Student</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
<div class="container-fluid">
<div class="row">

<div class="col-md-6">

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Student</h3>
    </div>
    <form method="POST" action="{{route('student.update',$student->id)}}" enctype="multipart/form-data">
        @csrf

        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Name Student</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $student->name }}" placeholder="Enter Name">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" value="{{ $student->phone }}" placeholder="Enter Phone">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="address" value="{{ $student->address }}" placeholder="Enter Address">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="db">Date of Birth</label>
                        <input type="date" name="db" class="form-control" id="db" value="{{ $student->db }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Select Class</label>
                        <select name="class_id" class="form-control" id="class_id">
                            @foreach ($class as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

            
    </form>
</section>
    
@endsection