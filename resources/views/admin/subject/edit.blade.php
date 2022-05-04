@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Create Subject</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Create Subject</li>
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
        <h3 class="card-title">Form Subject</h3>
    </div>
    <form method="POST" action="{{route('subject.update',$subject->id)}}" enctype="multipart/form-data">
        @csrf

        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name Subject</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $subject->name }}" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label>Select Class</label>
                <select name="class_id" class="form-control" id="class_id">
                    @foreach ($class as $item)
                        <option value="{{ old('class_id', $item->id)}}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</section>
    
@endsection